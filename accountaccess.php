<?php
session_start();
require_once('db/dbaccess.php');

//destroy session if session already exists
if($_SESSION['user_id']) session_destroy();


$error = $successlogin = $actconfirmed = "";
//prevent sql injection
function user_input($input){
	$input = trim($input);
	$input = stripslashes($input);
	$input = htmlspecialchars($input);
	$input = @mysql_real_escape_string($input);
	return $input;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
//get values from form
$useremail = user_input($_POST['accessemail']);
$userpass = user_input($_POST['accesspassword']);


//check for empty input or no input
if(empty($useremail) || empty($userpass))
	$error = "<font color='red'>All fields must be filled</font>";
else
{
	//password encryption and salting 
	$salt1 = "!@^%^*+-#";
	$salt2 = "#-+wash!^li";
	$encpass = hash("md5", $salt1.$userpass.$salt2);
}

	//check for availability of info in the database
	$logindata = "SELECT * FROM memberise WHERE email='$useremail' AND password='$encpass'";
	$sql = mysqli_query($conn,$logindata);
	$getimage = mysqli_query($conn,"SELECT *,profilepic FROM memberise WHERE email = '$useremail'");
	if(mysqli_num_rows($getimage)>0)
    {
        $imagedata = mysqli_fetch_assoc($getimage);
        $profileimage = $imagedata['profilepic'];
        $_SESSION['userpropic'] = $userprofpic;
    }

	if(mysqli_num_rows($sql)>0)
	{
		
		$getdata = mysqli_fetch_assoc($sql);
		$lastname = $getdata['lastname'];
		$confirmcode = $getdata['confirmcode'];
		$gender = $getdata['gender'];
		$firstname = $getdata['firstname'];
		$user_id = strtoupper(strrev($lastname)).rand(1,1000000);
		$_SESSION['emaildata'] = $useremail;
		$_SESSION['lastnamedata'] = ucfirst($lastname);
		$_SESSION['confirmcodedata'] = $confirmcode;
		$_SESSION['user_id'] = $user_id;
		$_SESSION['gender'] = $gender;
		$_SESSION['firstnamedata'] = $firstname;
		$success = "<font color='green'>Login Success</font>";
		//echo $success;
		$lastname = ucfirst($lastname);
		

	}
	else
		$error = "<font color='red'>Invalid Username/Password</font>";


	//data acquisition for login errors//still don't know why ajax is not responsive on these ones
	if($error)
		echo json_encode(array('loginerror'=>$error));
	else
	{
		echo json_encode(array('successlogin'=>$success,'lastname'=>$lastname,'confirmcode'=>$confirmcode,'email'=>$useremail));
	}









/* 	will come back for you later....
	//code to update the confirmation codes, it still does not work, yet, too much code
	$getcode = mysqli_query($conn,"SELECT *, confirmcode,email FROM memberise WHERE email='$useremail'");

	if(mysqli_num_rows($getcode)>0)
	{
		mysqli_query($conn,"UPDATE memberise SET confirmed = '1' WHERE email='$useremail'");
		mysqli_query($conn,"UPDATE memberise SET confirmcode = '0' WHERE email='$useremail'");
		$actconfirmed = "<font color='green'>Activation Confirmed</font>";
		echo json_encode(array('actconfirmed'=>$actconfirmed));
	}
*/		
}

?>