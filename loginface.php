<?php

?>

<!DOCTYPE html>
<html>
<head>
	<title>Access Account</title>
	<link rel="stylesheet" type="text/css" href="styles/offaccount.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="javascript/accessaccount.js"></script>
</head>
<body>
<header>
	
</header>
<div id="playground">
<div class="accessform">
		<fieldset style="width: 34%;position: absolute;top: 13%;left: 33%;" >
			<form action="" method="" id="formaccess">
			<table>
				<tr>
					<td>Email</td>
				</tr>
				<tr>
					<td><input type="email" name="accessemail" id="loginemail" placeholder="Your Email" autocomplete="off" /></td>
					<td><span class="useraccesserror"></span></td>
				</tr>
				</table>
				<table>
				<tr>
					<td>Password</td>
				</tr>
				<tr>
					<td><input type="password" name="accesspassword" id="loginpassword" placeholder="Your Password" autocomplete="off"></td>
				</tr>
				</table>
				<table>
				<tr>
					<td><input type="submit" name="accessaccount" id="loginsubmit" value="Log In"/></td>
					<td><span class="submiterror"></span></td>
				</tr>
				</table>
				<table>
				<tr>
					<td><a href="recoverpass_one.php" target="_blank" style="font-family: calibri;text-decoration: none;">Recover Password</a></td>
				</tr>
				</table>
				<table>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td></td>
				</tr>
				<tr>
					<td></td>
				</tr>
				
				</table>
			</form>
				<table>
					<tr>
						<td><div id="activate"></div></td>
						<td><span class='activemessage'></span></td>
					</tr>
				</table>
		</fieldset>		
</div>
</div>
</body>
</html>