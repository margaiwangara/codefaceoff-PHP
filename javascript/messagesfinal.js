$(document).ready(function() {
    function FetchMessages(e) {
        //e.preventDefault();

        $.ajax({

            url: 'getuserdata.php',
            type: 'POST',

            dataType: 'json', //Added

            data: "",

            success: function (data) {
                //$('#msgcontainer').html(data.msg_id_a);
                var msg_id_a = Array(data.msg_id_a);
                var msgs_a = Array(data.msgs_a);
                var msg_sender_a = Array(data.msg_sender_a);
                var msg_receiver_a = Array(data.msg_receiver_a);
                var msg_type_a = Array(data.msg_type_a);
                var msg_status_a = Array(data.msg_status_a);
                var msg_time_a = Array(data.msg_time_a);

                //array to store emails and check if they already exist
                var emailcheck = Array();
                var msgcount = Array();

                msg_sender_a[0].forEach(function (value, key)
                {
                    if((emailcheck.indexOf(msg_sender_a[0][key]) > -1))
                        alert("Exists");
                    else
                    {
                        if(msg_status_a[0][key] == 'unread')
                        {
                            if((emailcheck.push(msg_sender_a[0][key])))
                            {
                                //alert("Key "+key+" Pushed. Exists now");
                                $('.messagesreception').append("<table cellspacing='3' id="+key+"><tr><td>"+msg_sender_a[0][key]+"</td></tr><tr><td>"+msgs_a[0][key]+"</td></tr><tr><td>"+msg_time_a[0][key]+"</td></tr></table>");
                                //$('.messagesreception table').css('background-color','fffaf0');
                            }
                            else
                                alert("Push failed");
                        }
                    }
                });
                function DisplayMessages(key, msgs)
                {

                    $('#msgcontainer').append("<table><tr><th>"+msg_sender_a[0][key]+" > "+msg_receiver_a[0][key]+"</th></tr><tr><td>"+msgs_a[0][key]+"</td></tr><tr><td>"+msg_time_a[0][key]+"</td></tr>");
                    //$('#msgcontainer').empty();

                };
            }
        });
    }

    $('#explode').on('click', function (e) {
        e.preventDefault();
        FetchMessages();
    });


});


