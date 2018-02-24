<?php

require_once('db/dbaccess.php');


$getdata = "SELECT memberise.email,memberise.firstname,memberise.lastname,messages.message FROM messages INNER JOIN memberise ON messages.receiver_id = memberise.email";
$query = mysqli_query($conn,$getdata);

if(mysqli_num_rows($query)>0)
{
	$count = 0;
	while($data = mysqli_fetch_assoc($query))
	{
		$emails[] = $data['email'];
		$messages[] = $data['message'];
		echo "<table border='1'><tr><th>Emails</th><th>Messages</th></tr><tr><td>".$emails[$count]."</td><td>".$messages[$count]."</td></tr></table>";
		$count++;
	}
}
else 
	echo "No messages found";

?>