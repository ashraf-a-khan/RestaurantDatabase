<?php
include 'db.php';

$item_id = $_GET['id'];

echo $_SESSION['universal_menu_id'];


$sql_delete = "DELETE FROM
  items
	WHERE
  id = '".$item_id."'";


if($conn->query($sql_delete) === TRUE)
{
	header('Location: view_menu.php?id='.$_SESSION['universal_menu_id'].'');
}
else
{
	echo "Something went wrong";
}

?>