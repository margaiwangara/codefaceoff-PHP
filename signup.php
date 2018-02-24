<?php

//connect to inputbase
require_once('db/dbaccess.php');

//prevent sql injection
function user_input($input){
	$input = trim($input);
	$input = stripslashes($input);
	$input = htmlspecialchars($input);
	$input = @mysql_real_escape_string($input);
	return $input;
}
if($_SERVER["REQUEST_METHOD"] == "POST"){
//acquire form input
$firstname = user_input($_POST['firstname']);
$surname = user_input($_POST['surname']);
$email = user_input($_POST['memberisemail']);
$password = user_input($_POST['memberisepass']);
$confirmpass = user_input($_POST['memberisecpass']);
$gender = user_input($_POST['gender']);
$dobday = user_input($_POST['dobday']);
$dobmonth = user_input($_POST['dobmonth']);
$dobyear = user_input($_POST['dobyear']);
$confirmcode = rand(1,1000000);

//input validation
if(empty($email))
{
    $erroremail = "<font color='red'>Input email please</font>";
    echo json_encode(array('erroremail'=>$erroremail));
}

if(empty($firstname) || empty($surname) || empty($gender) || empty($dobday) || empty($dobmonth) || empty($dobyear))
{
	$error = "<font color='red'>Every input is required</font>";
}
else if(empty($password) && empty($confirmpass))
	$error = "<font color='red'>Every input is required</font>";
else if(strlen($password)<8)
	$error = "<font color='red'>Minimum password characters = 8</font>";
else if($password != $confirmpass)
	$error = "<font color='red'> Passwords don't match</font>";
else
{
	//password encryption and salting 
	$salt1 = "!@^%^*+-#";
	$salt2 = rand(65,199665);
	$encpass = hash("md5", $salt1.$password.$salt2);
}

if($error)
	echo $error;
else
{
	$query = "INSERT INTO memberise(firstname,lastname,gender,email,password,dobday,dobmonth,dobyear,confirmcode,confirmed) 
			  VALUES('$firstname','$surname','$gender','$email','$encpass','$dobday','$dobmonth','$dobyear','$confirmcode','0')";
	$sql = mysqli_query($conn,$query);

	if(!$sql)
		echo "<font color='red'>The ship is falling, over</font>";
	else
		echo "<font color='green'>Everything is under control captain</font>";
}

}

?>