var recoveremail_correct, recoveremail_wrong;
$(document).ready(function(){
	function RecoveryData(){
		 //e.preventDefault();

	   $.ajax({

		url:"recoverpass_php.php" , 
		type: "POST" ,

        dataType :"json", //Added 

		data: $('form#recoverpass_one_form').serialize(),
					
		success: function(data){
			window.recoveremail_correct = data.recoveremailsuccess;
			window.recoveremail_wrong = data.recoveremailerror;
		}
					

		});

	   //$("#inputform")[0].reset();
	  
	};

	$('form#recoverpass_one_form').on('submit' , function(e)
	{
		e.preventDefault();
		RecoveryData();
		if(window.recoveremail_correct)
		{
			$('.recoverycomment').html(window.recoveremail_correct);
			TransitionPage();
			
		}
		else
			$('.recoverycomment').html(window.recoveremail_wrong);

	});

	function TransitionPage()
	{
		//slide in the next page after message is displayed
		$(".recoverpass_one_form").fadeOut(3000,function(){
    		$('body').load('recoverpass_two.php', function () {
    			$(".recoverpass_two_form").fadeIn(1000);
    			
    			});
			});
	}

});




