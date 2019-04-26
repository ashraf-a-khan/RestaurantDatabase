<?php
include 'db.php';

$id = $_GET['id'];
$food = $_GET['food'];
$price =  $_GET['price'];
$category_id = $_GET['category_id'];

echo $id;
echo $food;
echo $price; 
echo $category_id;

// $sql_delete = "DELETE FROM
//   menu
// WHERE
//   food = '".$food."'
//   AND price = '".$price."'
//   AND category_id = '".$category_id."'
// ";


if($conn->query($sql_delete) === TRUE)
{
	header('Location: view_menu.php?id='.$id.'');
}
else
{
	echo "Something went wrong";
}

?>