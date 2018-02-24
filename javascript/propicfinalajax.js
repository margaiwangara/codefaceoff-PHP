var userpropic;
$(document).ready(function(){
    function GetImage(){
        //e.preventDefault();

        //var imgdata = $('#upload_ppic').val();
        var formdata = new FormData(this);

        $.ajax({

            url:'uploadppic.php' ,
            type: 'POST' ,

            dataType :'json', //Added

            data: formdata,
            processData: false,  // tell jQuery not to process the data
            contentType: false,   // tell jQuery not to set contentType

            success: function(data){
                //alert("I really work");
                alert(data.uploadsuccess);
                userpropic = data.userprofilepic;
                $('.errortexts').html(data.uploaderror);
                //$('.picdisplay').html("<img src='"+userpropic+"' alt='Profile Picture' style='height: 100%;width: 100%'/>");
                }


        });

        //$("#inputform")[0].reset();

    };
    $('form#propicform').on('submit' ,function (e)
    {
      e.preventDefault();
      GetImage();
    });

});

