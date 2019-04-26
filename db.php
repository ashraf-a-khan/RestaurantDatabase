<?php
$servername = "localhost";
$username = "root";
$password = "MyAspirationE15";
$db = "restaurant_2";
// $db = "restaurant";

$conn = new mysqli($servername, $username, $password, $db);

if($conn -> connect_error){
	echo $conn->connect_error;
	echo "Error";
} else {
	// echo "Successful";
} 

