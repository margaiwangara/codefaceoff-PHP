<?php
session_start();
require_once('db/dbaccess.php');

$commentbox = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
//prevent sql injection
function user_input($input){
	$input = trim($input);
	$input = stripslashes($input);
	$input = htmlspecialchars($input);
	$input = @mysql_real_escape_string( $input);
	return $input;
}

$message = user_input($_POST['msgcontent']);
$receiver_id = user_input($_POST['recepientemail']);
$msgtype = user_input($_POST['msgtype']);
$sender_id = $_SESSION['emaildata'];


//confirm textarea is not empty
if(empty($message) || empty($receiver_id) || empty($msgtype))
	$commentbox = "<font color='red'>Please input all fields</font>";
else
{
	$sendmessage = mysqli_query($conn,"INSERT INTO messages(msg_id,sender_id,receiver_id,message,type,status) 
								VALUES('','$sender_id','$receiver_id','$message','$msgtype','unread')");
	if(!$sendmessage)
		$commentbox = "<font color='red'>Message not sent</font>";
	else
	{
		$getmessage = mysqli_query($conn,"SELECT * FROM messages WHERE (sender_id ='$sender_id' OR receiver_id='$sender_id') AND status='unread' ORDER BY msg_id ASC");
		if(mysqli_num_rows($getmessage)>0)
		{
			while($fetchdata = mysqli_fetch_assoc($getmessage))
			{
				//store all the information in array, i am not sure it will even work
				//$messagecollection = json_encode(array('message'=>$fetchdata['message'],'status'=>$fetchdata['status'],'type'=>$fetchdata['type'],
							//'msgtime'=>$fetchdata['time'],'sender'=>$fetchdata['sender_id']));
                $messages_id[] = $fetchdata['msg_id'];
                $messages[] = $fetchdata['messages'];
                $sender[] = $fetchdata['sender_id'];
                $receiver[] = $fetchdata['receiver_id'];
                $status[] = $fetchdata['status'];
                $type[] = $fetchdata['type'];
                $msgtime[] = $fetchdata['time'];

			}
            $messagedata = "<font color='green'>We're good to go captain!</font>";

		}
		else
			$commentbox = "<div style='color: red'>No messages to display</div>";
	}
}
if($commentbox)
	echo json_encode(array('error'=>$commentbox));
else
{
    echo json_encode(array('collection'=>$messagedata));
}

}

?>