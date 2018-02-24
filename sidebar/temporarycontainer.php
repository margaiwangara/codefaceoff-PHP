
//unread messages from and to user
$unreadmessages = mysqli_query($conn, "SELECT * FROM messages WHERE (receiver_id='$sender_id' OR sender_id='$sender_id') AND status='unread'");
//read messages from and to user
$readmessages = mysqli_query($conn, "SELECT * FROM messages WHERE (receiver_id !='$sender_id' OR sender_id !='$sender_id') AND status='read'");
//unread messages to user but not from user
$receiver_side_unread = mysqli_query($conn, "SELECT * FROM messages WHERE (receiver_id='$sender_id' AND sender_id != '$sender_id') AND status='unread'");
//read messages to user but not from user
$receiver_side_read = mysqli_query($conn, "SELECT * FROM messages WHERE (receiver_id='$sender_id' AND sender_id !='$sender_id') AND status='read'");

if (mysqli_num_rows($unreadmessages) > 0)
{
//$commentbox = "<font color='green'>Some looping was done right after this</font>";
while ($fetchdata = mysqli_fetch_assoc($unreadmessages)) {
$message_id[] = $fetchdata['msg_id'];
$messages[] = $fetchdata['message'];
$sender[] = $fetchdata['sender_id'];
$receiver[] = $fetchdata['receiver_id'];
$type[] = $fetchdata['type'];
$msgtime[] = $fetchdata['msgtime'];
$status[] = $fetchdata['status'];
}

}
else
$commentbox = "<font color='red'>There are no unread msgs to see here. Move along</font>";

if (mysqli_num_rows($readmessages) > 0)
{
while ($fetchread = mysqli_fetch_assoc($readmessages)) {
$readmessage_id[] = $fetchread['msg_id'];
$readmessages_msg[] = $fetchread['message'];
$readmessage_sender[] = $fetchread['sender_id'];
$readmessage_receiver[] = $fetchread['receiver_id'];
$readmessage_type[] = $fetchread['type'];
$readmessage_time[] = $fetchread['msgtime'];
$readmessage_status[] = $fetchread['status'];
}
}
else
$commentbox = "<font color='red'>There are no read msgs to see here. Move along</font>";

if (mysqli_num_rows($receiver_side_unread) > 0)
{
while ($msgreceiver_side_unread = mysqli_fetch_assoc($receiver_side_unread)) {
$msgreceiver_id[] = $msgreceiver_side_unread['msg_id'];
$msgreceiver_msg[] = $msgreceiver_side_unread['message'];
$msgreceiver_sender[] = $msgreceiver_side_unread['sender_id'];
$msgreceiver_receiver[] = $msgreceiver_side_unread['receiver_id'];
$msgreceiver_type[] = $msgreceiver_side_unread['type'];
$msgreceiver_time[] = $msgreceiver_side_unread['msgtime'];
$msgreceiver_status[] = $msgreceiver_side_unread['status'];

}
}
//else
//$commentbox = "<font color='red'>There are no unreads to see here. Move along</font>";

if (mysqli_num_rows($receiver_side_read) > 0)
{
while ($msgreceiver_side_read = mysqli_fetch_assoc($receiver_side_read)) {
$rcvside_id[] = $msgreceiver_side_read['msg_id'];
$rcvside_msg[] = $msgreceiver_side_read['message'];
$rcvside_sender[] = $msgreceiver_side_read['sender_id'];
$rcvside_receiver[] = $msgreceiver_side_read['receiver_id'];
$rcvside_type[] = $msgreceiver_side_read['type'];
$rcvside_time[] = $msgreceiver_side_read['msgtime'];
$rcvside_status[] = $msgreceiver_side_read['status'];
}
}
//else
//$commentbox = "<font color='red'>There are no reads to see here. Move along</font>";

}

}
//$fullname = ucfirst($_SESSION['firstnamedata'])." ".ucfirst($_SESSION['lastnamedata']);
if($commentbox)
echo json_encode(array('commentbox'=>$commentbox));

else
{





/*
//all read messages from user and to user
var msgbox_id_r = Array(data.message_id_r);
var msgbox_r = Array(data.messages_r);
var msgbox_sender_r = Array(data.messages_sender_r);
var msgbox_receiver_r = Array(data.message_receiver_r);
var msgbox_type_r = Array(data.message_type_r);
var msgbox_status_r = Array(data.message_time_r);
var msgbox_time_r = Array(data.message_status_r);

//all unread messages to user from other people
var msgcont_id_u = Array(data.msgcont_id_u);
var msgcont_u = Array(data.msgcont_u);
var msgcont_sender_u = Array(data.msgcont_sender_u);
var msgcont_receiver_u = Array(data.msgcont_receiver_u);
var msgcont_type_u = Array(data.msgcont_type_u);
var msgcont_status_u = Array(data.msgcont_status_u);
var msgcont_time_u = Array(data.msgcont_time_u);

//all read messages to user from other people
var msgcont_id_r = Array(data.msgcont_id_r);
var msgcont_r = Array(data.msgcont_r);
var msgcont_sender_r = Array(data.msgcont_sender_r);
var msgcont_receiver_r = Array(data.msgcont_receiver_r);
var msgcont_type_r = Array(data.msgcont_type_r);
var msgcont_status_r = Array(data.msgcont_status_r);
var msgcont_time_r = Array(data.msgcont_time_r);
for(var i=0;i<msgcont_id_u.length;i++)
{
$('#msgcontainer').append(msgcont_u[0][i]);
$('#msgcontainer').append(msgcont_r[0][i]);
$('#msgcontainer').append(msgbox_r[0][i]);
$('#msgcontainer').append(msg_box[0][i]);
}
*/


/*for(var i=0;i<msg_box[0].length;i++)
{
if(box_sender[0][i])
$('#msgcontainer').append("<table cellspacing='5'><tr><th>"+box_sender[0][i]+" > "+box_receiver[0][i]+"</th></tr><tr><td>"+msg_box[0][i]+"</td></tr><tr><td>"+box_time[0][i]+"</td></tr></table>");
}
*/

//read messages from and to user
$readmessages = mysqli_query($conn, "SELECT * FROM messages WHERE (receiver_id !='$sender_id' OR sender_id !='$sender_id') AND status='read'");
//unread messages to user but not from user
$receiver_side_unread = mysqli_query($conn, "SELECT * FROM messages WHERE (receiver_id='$sender_id' AND sender_id != '$sender_id') AND status='unread'");
//read messages to user but not from user
$receiver_side_read = mysqli_query($conn, "SELECT * FROM messages WHERE (receiver_id='$sender_id' AND sender_id !='$sender_id') AND status='read'");


var msgbox_id = Array(data.message_id);
var msg_box = Array(data.messages);
var box_sender = Array(data.sender);
var box_receiver = Array(data.receiver);
var box_type = Array(data.msgtype);
var box_status = Array(data.msgstatus);
var box_time = Array(data.msgtime);
alert(msg_box[0][0]);
//alert(data);


for(var i=0;i<msgs_a[0].length;i++)
{
for(var j=0;j<msgs_a[0].length;i++)
{
if(msg_sender_a[0][j] = emailcheck[i])
count++;
//$('#msgcontainer').html(msg_sender_a[0][j]+" already exists");
else
emailcheck[i] = msg_sender_a[0][j];
}
}

var k=0;
for(var i=0;i<msgs_a[0].length;i++)
{
for(var j=0;j<msgs_a[0].length;j++)
{
if(msg_sender_a[0][j] == emailcheck[i])
break;
else
{
emailcheck[k] = msg_sender_a[0][j];
$('.messagesreception').append("<table cellspacing='3'><tr><td>"+msg_sender_a[0][i]+"</td></tr><tr><td>"+msgs_a[0][i]+"</td></tr><tr><td>"+msg_time_a[0][i]+"</td></tr></table>");

}

}
}

/*
for(var i=0;i<msgs_a[0].length;i++)
{
if(msg_status_a[0][i] == 'read')
alert("Read: "+msgs_a[0][i]);
else if(msg_status_a[0][i] == 'unread')
{
$('.messagesreception').html("<table cellspacing='3'><tr><th>"+msg_sender_a[0][i]+"<br/></th></tr><tr><td>"+msgs_a[0][i]+"<br/></td></tr><tr><td>"+msg_time_a[0][i]+"</td></tr>");
    }
    else
    alert("Nothing to see here. Move along");
    }
    */