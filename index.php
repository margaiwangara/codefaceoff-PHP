<?php
if(isset($_SESSION['user_id'])) session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Memberise</title>
	<link rel="stylesheet" type="text/css" href="styles/offaccount.css"/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="javascript/ajaxdb.js"></script>
</head>
<body>
<header>
	
</header>
<div id="playground">
	<div class="introtext" style="position: absolute;top: 3%;left: 33%;font-size: 35px;font-weight: bold;font-family: calibri;color: #a42f15;">Memberise Yourself...Now</div>
	<div class="memberiseform">
		<fieldset style="width: 34%;position: absolute;top: 13%;left: 33%;" >
			<form action="" method="" id="formmemberise">
				<table>
					<tr>
						<td>Name</td>
						<td>Surname</td>
					</tr>
					<tr>
						<td><input type="text" name="firstname" id="fname" placeholder="Name" autocomplete="off" /></td>
						<td><input type="text" name="surname" id="lastname" placeholder="Surname" autocomplete="off" /></td>
					</tr>
					<tr>
						<td>Email</td>
					</tr>
					<tr>
						<td><input type="email" name="memberisemail" id="signupemail" placeholder="Email" autocomplete="off" /></td>
						<td><span id="exemailshow"></span></td>
					</tr>
					<tr>
						<td>Password</td>
						<td>Confirm Password</td>
					</tr>
					<tr>
						<td><input type="password" name="memberisepass" id="signuppass" placeholder="Password"/></td>
						<td><input type="password" name="memberisecpass" id="signupcpass" placeholder="Confirm Password"/></td>
					</tr>
				</table>
				<table>
					<tr>
						<td>Date of Birth</td>
					</tr>
				</table>
				<table>
					<tr>
						<td><div id="daysection"></div></td>
						<td><div id="monthsection"></div></td>
						<td><div id="yearsection"></div></td>
						<td><div id="dateerrors"></div></td>
					</tr>
				</table>
				<table>
					<tr>
						<td>Gender</td>
						<td><input type="radio" name="gender" value="male" id="rdmale"checked> Male</td>
						<td><input type="radio" name="gender" value="female" id="rdfemale"> Female</td>
					</tr>
				</table>
				<table>
					<tr>
						<td><input type="checkbox" name="agreement" value="yes"/>I accept the Terms and Conditions</td>
						
					</tr>
				</table>
				<table>
					<tr>
						<td><input type="submit" id="submitsignup" name="signup" value="Sign Up"/></td>
						<td><span class="comment" ></span></td>
					</tr>
				</table>
				<table>
					<tr>
						<td><div class="storehere"></div></td>
					</tr>
				</table>
			</form>
		</fieldset>	
	</div>
</div>
<script type="text/javascript">
	//create html comboboxes

	var dayvalues = "<select name='dobday' id='signupdobday'><option value='' selected='selected' disabled='disabled'>Day";
	var monthvalues = "<select name='dobmonth' id='signupdobmonth'><option value='' selected='selected' disabled='disabled'>Month";
	var yearvalues = "<select name='dobyear' id='signupdobyear'><option value='' selected='selected' disabled='disabled'>Year";
	var oldyear = 1979;
	var nowyear = new Date();
	var yeartoday = nowyear.getFullYear();

	for (var i = 1; i <= (yeartoday-oldyear); i++)
	{
		if(i>0 && i<=12)
		{
			monthvalues += "<option value="+i+">"+i+"</option>";
			dayvalues +="<option value="+i+">"+i+"</option>";
			yearvalues += "<option value="+(i+oldyear)+">"+(i+oldyear)+"</option>";
		}
		else if(i>12 && i<=31)
		{
			dayvalues +="<option value="+i+">"+i+"</option>";
			yearvalues += "<option value="+(i+oldyear)+">"+(i+oldyear)+"</option>";
		}
		else 
			yearvalues += "<option value="+(i+oldyear)+">"+(i+oldyear)+"</option>";
		
	}
	dayvalues +="</option></select>";
	monthvalues +="</option></select>";
	yearvalues +="</option></select>";

	//append it to the div tags
	$('#daysection').append(dayvalues);
	$('#monthsection').append(monthvalues);
	$('#yearsection').append(yearvalues);

$('#signupdobyear,#signupdobmonth,#signupdobday').on('change', function()
{
	var getday = $('#signupdobday').val();
	var getmonth =$('#signupdobmonth').val();
	var getyear = $('#signupdobyear').val();

	if(getmonth == 2 && getday > 29)
		$('#dateerrors').html("<font color='red'>February has 29 days max");

	else if(getmonth == 2 && (getyear%4) != 0 && getday >28)
			$('#dateerrors').html("<font color='red'>It is not a leap year</font>");

	else if((getmonth == 4 || getmonth == 6 || getmonth == 9 || getmonth == 11) && getday >30)
		$('#dateerrors').html("<font color='red'>This month has only 30 days");

	else
		$('#dateerrors').html('');
});
	
</script>
</body>
</html>
