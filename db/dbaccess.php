<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "codewazimu";
$startdate = 1990;
$year = 0;
$conn = mysqli_connect($server,$username,$password,$dbname);
if(!$conn)
	echo "Database Connection Failed";




?>