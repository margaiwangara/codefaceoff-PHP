<td>
							
								<?php 
									//instead of long code and typing use loop to display the days
									$oldyear = 1989;
									echo "<select name='dobday' id='signupdobday'><option value='' selected='selected' disabled='disabled'><font color='grey'>DD"; 
									for ($i=$oldyear; $i <= date('Y'); $i++)
									{ 
										echo "<option value='" .$i. "'>" .$i. "</option>";
									}
									echo "</font></option></select>";
								?>
							</select>
						</td>
						<td>
							
								<?php 
									//instead of long code and typing use loop to display the months
									$oldyear = 1989;
									echo "<select name='dobmonth' id='signupdobmonth'><option value='' selected='selected' disabled='disabled'>MM"; 
									for ($i=$oldyear; $i <= date('Y'); $i++)
									{ 
										echo "<option value='" .$i. "'>" .$i. "</option>";
									}
									echo "</option></select>";
								?>
							</select>
						</td>
						<td>
								<?php 
									//instead of long code and typing use loop to display the years
									$oldyear = 1989;
									echo "<select name='dobyear' id='signupdobyear'><option value='' selected='selected' disabled='disabled'>YYYY"; 
									for ($i=$oldyear; $i <= date('Y'); $i++)
									{ 
										echo "<option value='" .$i. "'>" .$i. "</option>";
									}
									echo "</option></select>";

									$wordmonths = '';
switch ($dobmonth) {
	case 1:$wordmonths = "january";
		break;
	case 2:$wordmonths = "february";
		break;
	case 3:$wordmonths = "march";
		break;
	case 4:$wordmonths = "april";
		break;
	case 5:$wordmonths = "may";
		break;
	case 6:$wordmonths = "june";
		break;
	case 7:$wordmonths = "july";
		break;
	case 8:$wordmonths = "august";
		break;
	case 9:$wordmonths = "september";
		break;
	case 10:$wordmonths = "october";
		break;
	case 11:$wordmonths = "november";
		break;
	case 12:$wordmonths = "december";
		break;
	default:echo "Invalid entry";
		break;
}
								?>
						</td>




					</tr>