var success, error,name, email,code,recover_email_error,recover_email_success;
$(document).ready(function(){
	function GetData(){
		 //e.preventDefault();

	   $.ajax({
	   	async: false,
		url:"accountaccess.php" , 
		type: "POST" ,

        dataType :"json", //Added 

		data: $('form#formaccess').serialize(),
					
		success: function(data){
			window.success = data.successlogin;
			window.error = data.loginerror;
			//window.name = data.firstname;
			window.email = data.email;
			//window.code = data.actconfirmed;

		}
		

		});

	   //$("#formaccess")[0].reset();
	  
	};

	$('form#formaccess').on('submit' , function(e)
	{
		e.preventDefault();

		//get useremail and password to validate
		var username = $('#loginemail').val();
		var password = $('#loginpassword').val();

		if(username == "" || password == "")
			$('.submiterror').html("<font color='red'>Username and Password Required</font>");
		else
		{
		GetData();
		//$('#submiterror').html(window.success);
		//$('#submiterror').html(window.error);
			if(window.error)
				$('.submiterror').html(window.error);
			else
			{
				$('.submiterror').html(window.success);
				$(location).attr('href',"home.php");
				//$('#activate').append("<button id='accntactive' name='btnactivate' onClick='UpdateData()'>Activate Account</button> or <a href=''>Activate Later</a>");
			}
				
				//alert(window.success+"Firstname: "+window.name+"Email: "+window.email+"Confirm Code: "+window.code);
		}
		
	});


});