<?php
session_start();

if(isset($_SESSION['user_id']))
{
	if(strtolower($_SESSION['gender']) == 'male')
		$welcome = " Welcome Mr. ".$_SESSION['lastnamedata'];
	else
		$welcome = " Welcome Ms. ".$_SESSION['lastnamedata'];
}
else
	$welcome = " Welcome Guest";
if($_SESSION['userpropic'] != '')
    $userpic = $_SESSION['userpropic'];
else
    $userpic = "images/avatar.png";
	

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="styles/offaccount.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="javascript/ajaxdb.js"></script>
	<script type="text/javascript" src="javascript/transactmessages.js"></script>
	<script type="text/javascript" src="javascript/messagesfinal.js"></script>
	<script type="text/javascript" src="javascript/propicfinalajax.js"></script>
</head>
<body>
<header>

</header>
<div id="links">
	<div id="usersalute">
        <?php echo "<table cellspacing='5'><tr><td><img src='".$userpic."' alt='wangara' width='20px' height='20px'/>".$welcome."</td></tr></table>";?>
    </div>
	<div class="linkplayers">
		<table>
			<tr>
				<td><a href="home.php" id="home">Home</a></td>
				<td><a href="" id="notifications">Notifications</a></td>
				<td><a href="messages.php" id="messages">Messages</a></td>
				<td><a href="" id="settings">Settings</a></td>
				<td style="border-right: none;align-content: right;"><a href="signout.php"><img src="images/signoutbtntwo.png" alt="End Session" width="30" height="23" title="Sign Out" /></a></td>
			</tr>
		</table>
	</div>
</div>	
