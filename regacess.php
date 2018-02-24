<?php
session_start();
//connect to inputbase
require_once('db/dbaccess.php');

//set error variables to null
$erroremail = "";
$error = $success = $confirmtext = "";

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
$confirmcode = rand(1,1000000);

if(isset($_POST['dobday']))
	$dobday = user_input($_POST['dobday']);
else
	$error = "<font color='red' style='font-family: calibri;'>Input the DOB please</font>";

if(isset($_POST['dobmonth']))
	$dobmonth = user_input($_POST['dobmonth']);
else
	$error = "<font color='red' style='font-family: calibri;'>Input the DOB please</font>";

if(isset($_POST['dobyear']))
	$dobyear = user_input($_POST['dobyear']);
else
	$error = "<font color='red' style='font-family: calibri;'>Input the DOB please</font>";

//input validation
if(empty($firstname) || empty($surname) || empty($email) || empty($gender))
{
	$error = "<font color='red'>Every input is required</font>";
}
else if(empty($password) || empty($confirmpass))
	$error = "<font color='red'>Every input is required</font>";
else if(strlen($password)<8)
	$error = "<font color='red'>Minimum password characters = 8</font>";
else if($password != $confirmpass)
	$error = "<font color='red'>Passwords don't match</font>";
else
{
	//password encryption and salting 
	$salt1 = "!@^%^*+-#";
	$salt2 = "#-+wash!^li";
	$encpass = hash("md5", $salt1.$password.$salt2);
}

//get data from database to confirm availability of the entered email
	$getdata = "SELECT *, email FROM memberise WHERE email = '$email'";
	$confirm = mysqli_query($conn,$getdata);

//check to see if entered email already exists
if(mysqli_num_rows($confirm)>0)
{
	$erroremail = "<font color='red' style='font-family: calibri;'>Email already exists</font>";
	echo json_encode(array('erroremail'=>$erroremail));
}
else if($error)
		echo json_encode(array('error'=>$error));
else
{
		$query = "INSERT INTO memberise(user_id,firstname,lastname,gender,email,password,dobday,dobmonth,dobyear,confirmcode,confirmed) 
			  VALUES('','$firstname','$surname','$gender','$email','$encpass','$dobday','$dobmonth','$dobyear','$confirmcode','0')";
		$sql = mysqli_query($conn,$query);

		if(!$sql)
			echo "<font color='red'>The ship is falling, over</font>";
		else
		{
			//$confirmation = "<script type='text/javascript'>$('#formmemberise')[0].reset();</script>";
			//echo json_encode(array('confirmation'=>$confirmation));
			$success = "<font color='green'>&#10003; Account Created. Activate your account</font>";
			echo json_encode(array('success'=>$success));
			$to = $email;
			$from = "codefaceoff@noreply.com";
			$subject = "Welcome To CodefaceOff. Account Activation";

			//short salutation code depending on gender
			if(strtolower($gender) == 'male')
				$salutation = " Mr";
			else
				$salutation = " Ms";

			$message = "Dear".$salutation.". ".ucfirst($surname).", We are delighted that you joined us. Please click on the link to activate your account. http://localhost/codefaceoff/login.php?email=$email&&confirmcode=$confirmcode";

			$sendmessage = "INSERT INTO confirmationmessages(msg_id,receiveremail,msgsub,message,confirmcode) 
							VALUES('','$to','$subject','$message','$confirmcode')";
			$sql = mysqli_query($conn,$sendmessage);
				if(!$sql)
				{
					$confirmtext = "<font color='red'>Confirmation message not sent</font>";
					echo json_encode(array('confirmtext'=>$confirmtext));
				}
		}
	
	
}

}

?>