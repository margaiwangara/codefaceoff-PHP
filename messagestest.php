<?php

require_once('db/dbaccess.php');

$sender_id = "ckent@dailyplanet.com";

//unread messages from and to user
$unreadmessages = mysqli_query($conn,"SELECT * FROM messages WHERE (receiver_id='$sender_id' OR sender_id='$sender_id') AND status='unread'");
//read messages from and to user
$readmessages = mysqli_query($conn, "SELECT * FROM messages WHERE (receiver_id ='$sender_id' OR sender_id ='$sender_id') AND status='read'");
//unread messages to user but not from user
$receiver_side_unread = mysqli_query($conn,"SELECT * FROM messages WHERE (receiver_id='$sender_id' AND sender_id != '$sender_id') AND status='unread'");
//read messages to user but not from user
$receiver_side_read = mysqli_query($conn, "SELECT * FROM messages WHERE (receiver_id='$sender_id' AND sender_id !='$sender_id') AND status='read'");

echo "<br/><font color='brown'><b>Unread Messages</b></font><br/>";
if(mysqli_num_rows($unreadmessages)>0)
{
    //$commentbox = "<font color='green'>Some looping was done right after this</font>";
    while($fetchdata = mysqli_fetch_assoc($unreadmessages)) {
        $message_id[] = $fetchdata['msg_id'];
        $messages[] = $fetchdata['message'];
        $sender[] = $fetchdata['sender_id'];
        $receiver[] = $fetchdata['receiver_id'];
        $type[] = $fetchdata['type'];
        $msgtime[] = $fetchdata['msgtime'];
        $status[] = $fetchdata['status'];
    }

    for($i=0;$i<count($messages);$i++)
    {
        echo $messages[$i]."\t:::<font color='orange'>Sender:</font> ".$sender[$i]."::::<font color='green'>Receiver:</font> ".$receiver[$i]."::::<font color='red'>Status:</font> ".$status[$i]."<br/>";
    }

}
else
    echo "<br/><font color='red'>No messages to display</font>";

echo "<br/><font color='brown'><b>Read Messages</b></font><br/>";
if(mysqli_num_rows($readmessages)>0)
{
    while($fetchread = mysqli_fetch_assoc($readmessages))
    {
        $readmessage_id[] = $fetchread['msg_id'];
        $readmessages_msg[] = $fetchread['message'];
        $readmessage_sender[] = $fetchread['sender_id'];
        $readmessage_receiver[] = $fetchread['receiver_id'];
        $readmessage_type[] = $fetchread['type'];
        $readmessage_time[] = $fetchread['msgtime'];
        $readmessage_status[] = $fetchread['status'];
    }


    for($i=0;$i<count($readmessages_msg);$i++)
    {
        echo $readmessages_msg[$i]."\t:::<font color='orange'>Sender:</font> ".$readmessage_sender[$i]."::::<font color='green'>Receiver:</font> ".$readmessage_receiver[$i]."::::<font color='red'>Status:</font> ".$readmessage_status[$i]."<br/>";
    }
}
else
    echo "<br/><font color='red'>No messages to display</font>";

echo "<br/><font color='brown'><b>Unread Messages. Only to user</b></font><br/>";
if(mysqli_num_rows($receiver_side_unread)>0)
{
    while($msgreceiver_side_unread=mysqli_fetch_assoc($receiver_side_unread))
    {
        $msgreceiver_id[] = $msgreceiver_side_unread['msg_id'];
        $msgreceiver_msg[] = $msgreceiver_side_unread['message'];
        $msgreceiver_sender[] = $msgreceiver_side_unread['sender_id'];
        $msgreceiver_receiver[] = $msgreceiver_side_unread['receiver_id'];
        $msgreceiver_type[] = $msgreceiver_side_unread['type'];
        $msgreceiver_time[] = $msgreceiver_side_unread['msgtime'];
        $msgreceiver_status[] = $msgreceiver_side_unread['status'];

    }


    for($i=0;$i<count($msgreceiver_msg);$i++)
    {
        echo $msgreceiver_msg[$i]."\t:::<font color='orange'>Sender:</font> ".$msgreceiver_sender[$i]."::::<font color='green'>Receiver:</font> ".$msgreceiver_receiver[$i]."::::<font color='red'>Status:</font> ".$msgreceiver_status[$i]."<br/>";
    }
}
else
    echo "<br/><font color='red'>No messages to display</font>";

echo "<br/><font color='brown'><b>Read Messages. Only to user</b></font><br/>";
if(mysqli_num_rows($receiver_side_read)>0)
{
    while($msgreceiver_side_read = mysqli_fetch_assoc($receiver_side_read))
    {
        $rcvside_id[] = $msgreceiver_side_read['msg_id'];
        $rcvside_msg[] = $msgreceiver_side_read['message'];
        $rcvside_sender[] = $msgreceiver_side_read['sender_id'];
        $rcvside_receiver[] = $msgreceiver_side_read['receiver_id'];
        $rcvside_type[] = $msgreceiver_side_read['type'];
        $rcvside_time[] = $msgreceiver_side_read['msgtime'];
        $rcvside_status[] = $msgreceiver_side_read['status'];
    }


    for($i=0;$i<count($rcvside_msg);$i++)
    {
        echo $rcvside_msg[$i]."\t:::<font color='orange'>Sender:</font> ".$rcvside_sender[$i]."::::<font color='green'>Receiver:</font> ".$rcvside_receiver[$i]."::::<font color='red'>Status:</font> ".$rcvside_status[$i]."<br/>";
    }
}
else
    echo "<br/><font color='red'>No messages to display</font>";

?>