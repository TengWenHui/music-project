<?php
$hostname = "localhost";
$dbUser = "root";
$dbPassword = "";
$db = "musicproject";

$mysqli = new mysqli($hostname,$dbUser,$dbPassword,$db); 
// Check connection
if ($mysqli -> connect_errno) {
   echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
   exit();
}
?>