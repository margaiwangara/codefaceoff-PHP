<?php

session_start();
require_once('db/dbaccess.php');

$errormessage = "";

	if(!isset($_SESSION['recoveryemail']))
		$errormessage = "<font color = red>Your session doesn't exist.You need to follow the correct procedure</font>";
	else
		$useremail = $_SESSION['recoveryemail'];


//prevent sql injection
function user_input($input){
	$input = trim($input);
	$input = stripslashes($input);
	$input = htmlspecialchars($input);
	$input = @mysql_real_escape_string($input);
	return $input;
}

if($_SERVER["REQUEST_METHOD"] == "POST")
{

	//get data from form
	$password = user_input($_POST['recoverpass_two_password']);
	$cpassword = user_input($_POST['recoverpass_two_cpassword']);

	if(empty($password) || empty($cpassword))
		$errormessage = "<font color = red>Password is required</font>";
	else if(strlen($password)<8)
		$errormessage = "<font color = red>Password must be 8 or more chars</font>";
	else if($password != $cpassword)
		$errormessage = "<font color = red>Passwords don't match</font>";
	else
	{
		//password encryption and salting 
		$salt1 = "!@^%^*+-#";
		$salt2 = "#-+wash!^li";
		$encpass = hash("md5", $salt1.$password.$salt2);
	}

	//so much code for no particular reason, i wish i could write functions to shorten them//
	if(!$errormessage)
	{
		$updatepassword = mysqli_query($conn,"UPDATE memberise SET password = '$encpass' WHERE email='$useremail'");

		//check to see if update is complete
		if($updatepassword)
			$errormessage = "<font color='green'>Password for ".$useremail." updated successful. Redirecting to your account...</font>";
		else
			$errormessage = "<font color='red'>Password update failed due to error ".mysqli_error().". Please try again";

	
	}

	echo json_encode(array('message'=>$errormessage));
	
}
?>