

<?php
include 'db.php';

$sql_restaurant = "SELECT * FROM restaurant_info WHERE id = '".$_GET['id']."'";
$result_restaurant = $conn->query($sql_restaurant);

$sql_Menu = "SELECT menu.id, menu.food, menu.price, menu.category_id FROM restaurant_menu, menu WHERE menu.food != '' AND menu.id = restaurant_menu.menu_id AND restaurant_menu.restaurant_id = '".$_GET['id']."' ORDER BY menu.category_id";
$result_menu = $conn->query($sql_Menu);

$sql_openHours = "SELECT open_hours_info.days_open, open_hours_info.working_hours, open_hours_info.specials FROM restaurant_info, open_hours_info WHERE restaurant_info.open_hours_id = open_hours_info.id AND restaurant_info.id = '".$_GET['id']."'";
$result_openHours = $conn->query($sql_openHours);

?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<title></title>
</head>
<body>

<form action="EnterLocationAdmin.php">
    <input type="submit" value="Back to Selecting Address" >
</form>

<div class="container">
<br>
<br>
  <?php
  if($result_restaurant->num_rows > 0)
{
  while($row = $result_restaurant->fetch_assoc()) 
    {
    	echo "<h1>". $row['title']. "</h1>";
    	echo "<h4>" . $row['address_x'] . "-" . $row['address_y'] . " ";
    	echo $row['address_verbal']. "</h4>";
    	echo "<h4>" ."Restaurant Rating: ".$row['rating']. "</h4>";
    }
 }else{

 } 

if($result_openHours->num_rows > 0)
{
	while($row = $result_openHours->fetch_assoc())
	{
		echo "Days Open: " . $row['days_open'];
		echo "<br>";
		echo "Working Hours: " . $row['working_hours'];
		echo "<br>";
		echo "Specials: " . $row['specials'];
	}
}
echo "<br>";
echo "<br>";
echo "<br>";


         echo "<button><a href = 'add_to_menu.php?id=".$_GET["id"]."'>Add items to this menu</a></button>"; 

                                  ?>
      
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Category</th>
        <th>Food Item</th>
        <th>Price</th>
        <th>Edit Records</th>
        <th>Delete Records</th>
      </tr>
    </thead>
    <tbody>
<?php

if ($result_menu->num_rows > 0) 
{
   while($row = $result_menu->fetch_assoc()) 
    {
?>

      <tr>
        <td><?php echo $row["category_id"] ?></td>
        <td><?php echo $row["food"] ?></td>
        <td><?php echo "$". $row["price"] ?></td>
        <?php
         echo "<td><a href = 'edit_menu.php?id=".$row["id"]."&food=".$row["food"]."&price=".$row["price"]."&category_id=".$row['category_id']."'>Edit</a></td>"; 
        ?>
        <td><a href = "delete_menu_item.php">Delete</a></td>
      </tr>
<?php


    }
} else {
    // echo "0 results";
}


?>

    </tbody>
  </table>
  </div>
</div>

</body>
</html>