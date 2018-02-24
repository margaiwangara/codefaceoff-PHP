<?php
session_start();
require_once('db/dbaccess.php');

//initialize variables to prevent later errors
$recoveremailerror = $recoveremailsuccess = "";

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
	//form recovery data //separate data
	$recoveryemail = user_input($_POST['recoverpass_one_email']);

	//check for availability of the user in the database for email recovery
	$recoverydata = mysqli_query($conn,"SELECT *,email FROM memberise WHERE email = '$recoveryemail'");

	if(mysqli_num_rows($recoverydata)>0)
		$recoveremailsuccess = "<font color='green'>Email found. Redirecting to change password page...</font>";

	else
		$recoveremailerror = "<font color='red'>Email not found. Invalid Entry</font>";

	//recovery email errors//still don't know why ajax is not responsive on these ones
	if($recoveremailsuccess)
	{
		echo json_encode(array('recoveremailsuccess'=>$recoveremailsuccess));
		$_SESSION['recoveryemail'] = $recoveryemail;
	}
	else
		echo json_encode(array('recoveremailerror'=>$recoveremailerror));
}



?>