<?php
//acquire the header
require_once('header.php');

?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<script type="text/javascript">
		$(document).ready(function()
		{
			$('#settings').on('mouseover', function()
			{
				$('#drop_down').slideDown(1000);
				$('#settings').on('mouseleave', function()
				{
					$('#drop_down').slideUp(1000);
				});
			});
		});
	</script>
</head>
<body>
<div id="drop_down">
		<table>
			<tr>
				<td><a href="" id="privset">Privacy Settings</a></td>
			</tr>
			<tr>
				<td><a href="">Account Settings</a></td>
			</tr>
			<tr>
				<td><a href="">Page</a></td>
			</tr>
			<tr>
				<td style="border-bottom: none;"><a href="">About Us</a></td>
			</tr>
		</table>
	</div>
<div id="pitch">
	<div class="pitchplayers">
		
	</div>
</div>

</body>
</html>