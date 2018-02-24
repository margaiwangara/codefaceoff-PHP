<!DOCTYPE html>
<html>
<head>
	<title>Recover Password</title>
	<link rel="stylesheet" type="text/css" href="styles/offaccount.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="javascript/recoverpass_two_ajax.js"></script>
</head>
<body>
<header>
	
</header>
<div id="playground">
<div class="recoverpass_two_form">
		<fieldset style="width: 34%;position: absolute;top: 13%;left: 33%;" >
			<form action="" method="post" id="recoverpass_two_form">
				<table cellspacing="5">
					<tr>
						<td>New Password</td>
					</tr>
					<tr>
						<td><input type="password" name="recoverpass_two_password" id="password_recoverpass_two" placeholder="Your Password"/></td>
					</tr>
					<tr>
						<td>Confirm New Password</td>
					</tr>
					<tr>
						<td><input type="password" name="recoverpass_two_cpassword" id="cpassword_recoverpass_two" placeholder="Confirm Password"/></td>
					</tr>
					</table>
				<table cellspacing="5">
					<tr>
						<td><input type="submit" name="recoverpass_two_submit" id="submit_recoverpass_two" value="Change Password"/></td>
						<td><span class="recoverpass_two_display"></span></td>
					</tr>
				</table>
			</form>
		</fieldset>
</div>
</div>
</body>
</html>