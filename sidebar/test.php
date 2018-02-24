<?php
$name = "abdul";
$combine = strrev($name).rand(1,100000);

echo $combine;
?>

//some ajax

$(document).ready(function(){
	$('form#inputform').on('submit' , function(e){
		 e.preventDefault();

	   $.ajax({

		url:"signup.php" , 
		type: "POST" ,

        dataType :"html", //Added 

		data: $('form#inputform').serialize(),
					
		success: function(data){
		$('#errormessage').html(data);}
					

		});

	   $("#inputform")[0].reset();
	  
	});

});

//some jquery and ajax
//dump code

$(document).ready(function(){

	function RecoveryOutput(){
		 //e.preventDefault();

	   $.ajax({

		url:"recoverypass_two_php.php" , 
		type: "POST" ,

        dataType :"json", //Added 

		data: $('form#recoverpass_two_form').serialize(),
					
		success: function(data){
			window.recoverpass_message = data.errormessage;
			alert("oldu mu?");
		}
					

		});

	   //$("#inputform")[0].reset();
	  
	};

	$('form#recoverpass_two_form').on('submit' , function(e)
	{
		e.preventDefault();
		RecoveryOutput();

		alert(window.recoverpass_message);
		$('.recoverpass_two_display').html(window.recoverpass_message);

	})

});

//temporary

$('form#msgform').on('submit' , function(e)
	{
		e.preventDefault();
		GetMessages();

		if(window.geterror)
			//display error message if exists
			$('#messageresponse').html(window.geterror);
	});


	$('#displaymsg').on('click', function()
	{
		GetMessages();
		var msgtable = "<table><tr><td>"+data.messagedata+"</td></tr><table>";
		for(var i=0;i<data.length;i++)
		{
			//display all the messages on the div element
			$('#messageresponse').html(msgtable);
		}

	});


        //stringify every single array that comes in
        var msg_id_cont = JSON.stringify(Array(data.message_id));
        var msgs_cont = JSON.stringify(Array(data.messages));
        var msgs_sender = JSON.stringify(Array(data.sender));
        var msgs_receiver = JSON.stringify(Array(data.receiver));
        var msgs_type = JSON.stringify(Array(data.msgtype));
        var msgs_time = JSON.stringify(Array(data.msgtime));
        var msgs_status = JSON.stringify(Array(data.msgstatus));

        //i can put them all in the same array but i dont want to//let me just give everyone a variable//Parse them all from json
        var msgbox_id = JSON.parse(Array(msg_id_cont));
        var msgs_box = JSON.parse(Array(msgs_cont));
        var box_sender = JSON.parse(Array(msgs_sender));
        var box_receiver = JSON.parse(Array(msgs_receiver));
        var box_type = JSON.parse(Array(msgs_type));
        var box_time = JSON.parse(Array(msgs_time));
        var box_status = JSON.parse(Array(msgs_status));

        alert(msgbox_id[0][0]);
        alert(box_sender[0][0]);

        /*//store the data into variables
        window.msg_id = msgsupdate.message_id;
        window.messages = msgsupdate.messages;
        window.sender = msgsupdate.sender;
        window.receiver = msgsupdate.receiver;
        window.msgtype = msgsupdate.type;
        window.msgtime = msgsupdate.msgtime;
        window.status = msgsupdate.status;

        //append it to a place
        var appenddata = "<table border='1'><tr><th>"+window.sender+" > "+window.receiver+"</th></tr><tr><td>ID: "+window.msg_id+"</td></tr><tr><td>"+window.messages+"</td></tr>" +
            "<tr><td>"+window.msgtype+"::::"+window.status+"</td></tr><tr><td>"+window.msgtime+"</td></tr></table>";

        //append data to the body
        $('#msgcontainer').append(appenddata);
        //$('#msgcontainer').html(msgsupdate.messages);
        $('#messageresponse').html(data.commentbox);
        alert(data.commentbox);
        */


        /*//store the data into variables
        window.msg_id = msgsupdate.message_id;
        window.messages = msgsupdate.messages;
        window.sender = msgsupdate.sender;
        window.receiver = msgsupdate.receiver;
        window.msgtype = msgsupdate.type;
        window.msgtime = msgsupdate.msgtime;
        window.status = msgsupdate.status;

        //append it to a place
        var appenddata = "<table border='1'><tr><th>"+window.sender+" > "+window.receiver+"</th></tr><tr><td>ID: "+window.msg_id+"</td></tr><tr><td>"+window.messages+"</td></tr>" +
            "<tr><td>"+window.msgtype+"::::"+window.status+"</td></tr><tr><td>"+window.msgtime+"</td></tr></table>";

        //append data to the body
        $('#msgcontainer').append(appenddata);
        //$('#msgcontainer').html(msgsupdate.messages);
        $('#messageresponse').html(data.commentbox);
        alert(data.commentbox);
        */



        /*$.each(msgbox_id[0], function(key, value) {
        $('#msgcontainer').append(value+"<br/>");
        //alert("Index ---> " + key + ' & length of item ---> ' + value);
        });*/

        /*for(var i=0;i<msg_box[0].length;i++)
        {
        if(box_sender[0][i])
        $('#msgcontainer').append("<table cellspacing='5'><tr><th>"+box_sender[0][i]+" > "+box_receiver[0][i]+"</th></tr><tr><td>"+msg_box[0][i]+"</td></tr><tr><td>"+box_time[0][i]+"</td></tr></table>");
        }
        */



        //echo first set of values//hope this works
        echo json_encode(array('message_id'=>$message_id,'messages'=>$messages,'sender'=>$sender,'receiver'=>$receiver,'msgtype'=>$type,'msgtime'=>$msgtime,'msgstatus'=>$status,'unreadcount'=>$unreadcount));
        echo json_encode(array('message_id_r'=>$readmessage_id,'messages_r'=>$readmessages_msg,'messages_sender_r'=>$readmessage_sender,'message_receiver_r'=>$readmessage_receiver,'message_type_r'=>$readmessage_type,'message_time_r'=>$readmessage_time,'message_status_r'=>$readmessage_status));

        //echo second set of values
        echo json_encode(array('msgcont_id_u'=>$msgreceiver_id,'msgcont_u'=>$msgreceiver_msg,'msgcont_sender_u'=>$msgreceiver_sender,'msgcont_receiver_u'=>$msgreceiver_receiver,'msgcont_type_u'=>$msgreceiver_type,'msgcont_time_u'=>$msgreceiver_time,'msgcont_status_u'=>$msgreceiver_status));
        echo json_encode(array('msgcont_id_r'=>$rcvside_id,'msgcont_r'=>$rcvside_msg,'msgcont_sender_r'=>$rcvside_sender,'msgcont_receiver_r'=>$rcvside_receiver,'msgcont_type_r'=>$rcvside_type,'msgcont_time_r'=>$rcvside_time,'msgcont_status_r'=>$rcvside_status));
