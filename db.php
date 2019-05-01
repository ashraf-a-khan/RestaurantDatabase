<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "MyAspirationE15";
$db = "backup_restaurant";
// $db = "restaurant";

$conn = new mysqli($servername, $username, $password, $db);

if($conn -> connect_error){
	echo $conn->connect_error;
	echo "Error";
} else {
	// echo "Successful 2";
} 

