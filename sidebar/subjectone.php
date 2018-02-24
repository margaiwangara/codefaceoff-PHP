<?php

$date = date("Y-m-d");
$blowupyear = explode("-",$date);

$day = $blowupyear[2];
$month = $blowupyear[1];
$year = $blowupyear[0];

echo "Full date: ".$date."<br/>Exploded<br/>Day: ".$day."<br/>Month: ".$month."<br/>Year: ".$year;

$mybday = 1996;
$mybmonth = "march";
$mybirth = 24;
$monthstring = "";

switch ($month)
{
    case 1:
        $monthstring = "January";break;
    case 2:
        $monthstring = "February";break;
    case 3:
        $monthstring = "March";break;
    case 4:
        $monthstring = "April";break;
    case 5:
        $monthstring = "May";break;
    case 6:
        $monthstring = "June";break;
    case 7:
        $monthstring = "July";break;
    case 8:
        $monthstring = "August";break;
    case 9:
        $monthstring = "September";break;
    case 10:
        $monthstring = "October";break;
    case 11:
        $monthstring = "November";break;
    case 12:
        $monthstring = "December";break;
}


$age = $year - $mybday;
echo "<br/>Your age: ".$age."<br/>";
if($mybirth == $day && ucfirst($mybmonth) == ucfirst($monthstring))
    echo "<font color='green'><marquee direction='right' behavior='alternate'><i>Happy birthday</i></marquee></font><br/>";
if($age > 18)
    echo "<font color='red'><marquee direction='right' behavior='alternate'><b>You can be put in a <i>real</i> person prison.</b></marquee></font>";
else
    echo "<font color='green'>You are too young to die</font>";

?>