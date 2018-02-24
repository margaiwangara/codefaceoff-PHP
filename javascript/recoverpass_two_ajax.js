var recoverpass_message;

$(document).ready(function(){
	$('form#recoverpass_two_form').on('submit' , function(e){
		 e.preventDefault();

	   $.ajax({

		url:"recoverypass_two_php.php" , 
		type: "POST" ,

        dataType :"json", //Added 

		data: $('form#recoverpass_two_form').serialize(),
					
		success: function(data){
		$('.recoverpass_two_display').html(data.message);}
					

		});

	   //$("#inputform")[0].reset();
	  
	});

});