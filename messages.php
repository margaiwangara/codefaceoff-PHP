<?php

//header
require_once('header.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Messages</title>
</head>
<body>
<div id="pitchbox">
	<div class="receptionbox">
		<div class="partitions">
			<table>
				<tr>
					<td>Unread</td>
					<td>Messages</td>
					<td style="border-right: none;">Everything</td>
				</tr>
			</table>
		</div>
		<div class="messagesreception"></div>
	</div>
	<div class="messagebox">
		<div class="username">
			<table>
				<tr>
					<th><?php echo ucfirst($_SESSION['firstnamedata'])." ".ucfirst($_SESSION['lastnamedata']);?></th>
				</tr>
				<tr>
					<td></td>
				</tr>
			</table>
			
		</div>
		<div class="messagesdisplay">
		<form action="" method="post" id="msgform">
			<table cellspacing="5">
				<tr>
					<td><input type="email" name="recepientemail" id="receiverbox" placeholder="Recepient E-mail"/></td>
				</tr>
				<tr>
					<td><textarea rows="8" cols="80" name="msgcontent" id="txtareacontent"></textarea></td>
				</tr>
				<tr>
					<td>
						<select name="msgtype" id="msgprivacy" style="width: 70px;" autofocus="yes">
							<option value="public" selected="selected">Public</option>
							<option value="private">Private</option>
							<option value="friends">Friends</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><input type="submit" name="sendmessage" id="btnsendmsg" value="Send" style="width: 70px;" /></td>
				</tr>
                <tr>
                    <td><button id="explode">Show All</button></td>
                </tr>
				<tr>
					<td><span id="messageresponse"></span></td>
				</tr>
                <tr>
                    <td><span id="msgcontainer"></span></td>
                </tr>
			</table>
		</form>
		</div>
	</div>
</div>

</body>
</html>