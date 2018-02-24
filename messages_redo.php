<?php
session_start();
require_once('db/dbaccess.php');

$commentbox = "";
$msgstotal = 0;

if($_SERVER["REQUEST_METHOD"] == "POST"){
//prevent sql injection
    function user_input($input){
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        $input = @mysql_real_escape_string($input);
        return $input;
    }

    $message = user_input($_POST['msgcontent']);
    $receiver_id = user_input($_POST['recepientemail']);
    $msgtype = user_input($_POST['msgtype']);
    $sender_id = $_SESSION['emaildata'];

    //confirm textarea is not empty
    if(empty($message) || empty($receiver_id) || empty($msgtype))
        $commentbox = "<font color='red'>Please input all fields</font>";
    else if($receiver_id == $sender_id)
        $commentbox = "<font color='red'>You cannot send a message to yourself</font>";
    else
    {
        $sendmessage = mysqli_query($conn,"INSERT INTO messages(msg_id,sender_id,receiver_id,message,type,status) 
								VALUES('','$sender_id','$receiver_id','$message','$msgtype','unread')");
        if(!$sendmessage)
            $commentbox = "<font color='red'>Message not sent</font>";
        else
        {

                //unread messages from and to user
                $unreadmessages = mysqli_query($conn, "SELECT * FROM messages WHERE receiver_id='$sender_id' OR sender_id='$sender_id'");

                if(mysqli_num_rows($unreadmessages)>0)
                {
                    while($fetchdata = mysqli_fetch_assoc($unreadmessages))
                    {
                        $msg_id[] = $fetchdata['msg_id'];
                        $msg_u[] = $fetchdata['message'];
                        $msg_sender_u[] = $fetchdata['sender_id'];
                        $msg_receiver_u[] = $fetchdata['receiver_id'];
                        $msg_type_u[] = $fetchdata['type'];
                        $msg_status_u[] = $fetchdata['status'];
                        $msg_time_u[] = $fetchdata['msgtime'];
                    }
                }
                else
                    $commentbox = "<font color='red'>Nothing to see here folks. Move along</font>";

        }

    }
    //$fullname = ucfirst($_SESSION['firstnamedata'])." ".ucfirst($_SESSION['lastnamedata']);
    if($commentbox)
        echo json_encode(array('commentbox'=>$commentbox));
    else
        echo json_encode(array('msg_id'=>$msg_id,'msg_u'=>$msg_u,'msg_sender_u'=>$msg_sender_u,'msg_receiver_u'=>$msg_receiver_u,'msg_type_u'=>$msg_type_u,
                        'msg_status_u'=>$msg_status_u,'msg_time_u'=>$msg_time_u));


    }

?>