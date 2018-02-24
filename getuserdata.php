<?php
session_start();
//require database
require_once('db/dbaccess.php');

$msgcomment = "";

//initialize sender id
$sender_id = $_SESSION['emaildata'];

//unread messages to user but not from user
$msgs_receiverside = mysqli_query($conn, "SELECT * FROM messages WHERE receiver_id='$sender_id' AND sender_id != '$sender_id' ORDER BY sender_id ASC");

if(mysqli_num_rows($msgs_receiverside)>0)
{
    while($getmsgs = mysqli_fetch_assoc($msgs_receiverside))
    {
        $msg_id_c[] = $getmsgs['msg_id'];
        $msgs_c[] = $getmsgs['message'];
        $msg_sender_c[] = $getmsgs['sender_id'];
        $msg_receiver_c[] = $getmsgs['receiver_id'];
        $msg_type_c[] = $getmsgs['type'];
        $msg_status_c[] = $getmsgs['status'];
        $msg_time_c[] = $getmsgs['msgtime'];
    }
}
else
    $msgcomment = "<font color='red'>No messages to display. Move along</font>";

if($msgcomment)
    echo json_encode(array('msgcomment'=>$msgcomment));
else
    echo json_encode(array('msg_id_a'=>$msg_id_c,'msgs_a'=>$msgs_c,'msg_sender_a'=>$msg_sender_c,'msg_receiver_a'=>$msg_receiver_c,'msg_type_a'=>$msg_type_c,'msg_status_a'=>$msg_status_c,'msg_time_a'=>$msg_time_c));

?>