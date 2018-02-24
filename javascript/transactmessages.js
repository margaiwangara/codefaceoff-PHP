
var msg_id, messages,receiver,sender,status,msgtype,msgtime;
$(document).ready(function(){
    function FetchMessages(e){
        //e.preventDefault();

        $.ajax({

            url:'messages_redo.php' ,
            type: 'POST' ,

            dataType :'json', //Added

            data: $('form#msgform').serialize(),

            success: function(data){
                $('#messageresponse').html(data.commentbox);
                alert("I actually work");
                //prepare variable for use as they come in
                //store all acquired data into arrays
                //alert("Why do i choose when to work and when to not work");
                var umsg_id = Array(data.msg_id);
                var umsg = Array(data.msg_u);
                var umsg_sender = Array(data.msg_sender_u);
                var umsg_receiver = Array(data.msg_receiver_u);
                var umsg_type = Array(data.msg_type_u);
                var umsg_status = Array(data.msg_status_u);
                var umsg_time = Array(data.msg_time_u);

                umsg_id[0].forEach(function (value, key)
                {
                    $('#msgcontainer').append("<table><tr><th>"+umsg_sender[0][key]+" > "+umsg_receiver[0][key]+"</th></tr><tr><td>"+umsg[0][key]+"</td></tr><tr><td>"+umsg_time[0][key]+"</td></tr>");

                })

            }
        });

        //$("#msgform")[0].reset();

    };
    $('form#msgform').on('submit' ,function (e) {
       e.preventDefault();
       FetchMessages();
    });


});
