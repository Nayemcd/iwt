<?php
/* Local Database*/

$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "iwtproject";

//$servername = "localhost";
//$username = "dailyear_root11";
//$password = "dailyearnings123456789";
//$dbname = "dailyear_dailyearnings";


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    //die("Connection failed: " . mysqli_connect_error());
    $conn = mysqli_connect($servername,$username,"",$dbname);
    if(!$conn){
    	die("Connection faile: " . mysqli_connect_error());
    }
}
?> 
