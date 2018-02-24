
var mydata,emaildata,successmsg,regconfirm;
$(document).ready(function(){
		//ajax code, handle with care
		function ConnectDatabase(){
		 	//e.preventDefault();

	   	$.ajax({
	   	async: false,
		url:"regacess.php" , 
		type: "POST" ,

        dataType :"json", //Added 

		data: $('form#formmemberise').serialize(),
					
		success: function(data){
			//$('#exemailshow').html(data.error);
			window.mydata = data.error;
			window.emaildata = data.erroremail;
			window.successmsg = data.success;
			window.regconfirm = data.confirmtext;
		}
					
		});
	  
	};
		$('#signupemail').on('blur', function()
		{
			ConnectDatabase();
			//declare variables to store the error messages
			var emailerror = window.emaildata;

			//if(errormessage = window.mydata)
				
			//else
				//$('.comment').html('');

			if(emailerror)
				$('#exemailshow').html(emailerror);
			else
				$('#exemailshow').html("<font color='green'>&#10003; Available</font>");//showing a tick just to show off //thick: &#10004; thin: &#10003;
				
			
		});
		$('form#formmemberise').on('submit', function(e)
		{
			e.preventDefault();
			ConnectDatabase();

			//get messages
			var msgsuccess = window.successmsg;
			var errormessage = window.mydata;

			//show it to the user
			$('.comment').html(errormessage);
			$('.comment').html(msgsuccess);

			//when submition is successfull reset the fields
			if(msgsuccess)
			{
				$("form#formmemberise")[0].reset();
				$('#exemailshow').html('');
				if(window.regconfirm)
					alert(window.regconfirm);
				//$('.comment').fadeOut('slow');
			}
		})

});

