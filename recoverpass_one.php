<?php



?>

<!DOCTYPE html>
<html>
<head>
	<title>Recover Password</title>
	<link rel="stylesheet" type="text/css" href="styles/offaccount.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="javascript/recoverpass_ajax.js"></script>
</head>
<body>
<header>
	
</header>
<div id="playground">
<div class="recoverpass_one_form">
		<fieldset style="width: 34%;position: absolute;top: 13%;left: 33%;" >
			<form action="" method="" id="recoverpass_one_form">
			<table cellspacing="5">
				<tr>
					<td>Enter Email</td>
				</tr>
				<tr>
					<td><input type="email" name="recoverpass_one_email" id="email_recoverpass_one" placeholder="Your Email"/></td>
				</tr>
			</table>
			<table>
				<tr>
					<td><input type="submit" id="submit_recoverpass_one" name="recoverpass_one_submit" value="Recover Password"</td>
					<td><span class="recoverycomment"></span></td>
				</tr>
			</table>
			</form>
		</fieldset>
</div>
</div>
</body>
</html>
