

<?php
include 'db.php';

$sql_restaurant = "SELECT * FROM restaurant_info WHERE id = '".$_GET['id']."'";
$result_restaurant = $conn->query($sql_restaurant);

$sql_get_menu = "SELECT * FROM restaurant_menu WHERE restaurant_id = '".$_GET['id']."'";
$result_get_menu_id = $conn->query($sql_get_menu);

$_SESSION['universal_menu_id'] = $_GET['id'];

$menu_id = "";
if($result_get_menu_id->num_rows > 0)
{
  while($row = $result_get_menu_id->fetch_assoc()){
    $menu_id = $row['menu_id'];
  }
}

$category = array();
// echo $menu_id;
// $sql_category = "SELECT category.id, category.name from category where id in 
//                   (SELECT category_id from items WHERE id in 
//                     (SELECT item_id FROM menu_items WHERE menu_id = '".$menu_id."'))";
// $result_sql_category = $conn->query($sql_category);
// if($result_sql_category->num_rows > 0){
//   while($row = $result_sql_category->fetch_assoc()){
//     // echo $row['name'];
//     // echo "<br>";
//     array_push($category,$row['name']);  
//   }
// }

// print_r($category);


$sql_menu_new = "SELECT * FROM items WHERE id IN (SELECT item_id FROM `menu_items` WHERE menu_id = '".$menu_id."')  order BY category_name";
$result_menu_new = $conn->query($sql_menu_new);
// if($result_menu_new->num_rows > 0){
//   while($row = $result_menu_new->fetch_assoc()){
//     echo $row['name'] . " $" . $row['price'];
//     echo "<br>";
//   }
// }


//$sql_Menu = "SELECT menu.id, menu.food, menu.price, menu.category_id FROM restaurant_menu, menu WHERE menu.food != '' AND menu.id = restaurant_menu.menu_id AND restaurant_menu.restaurant_id = '".$_GET['id']."' ORDER BY menu.category_id";
//$result_menu = $conn->query($sql_Menu);

$sql_openHours = "SELECT open_hours_info.days_open, open_hours_info.working_hours, open_hours_info.specials FROM restaurant_info, open_hours_info WHERE restaurant_info.open_hours_id = open_hours_info.id AND restaurant_info.id = '".$_GET['id']."'";
$result_openHours = $conn->query($sql_openHours);

?>

<!DOCTYPE html>
<html>
<head>
  <!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <title></title>
</head>
<body>

<a href = "DisplayRestaurantsCustomer.php?title=title">Go to Customer Restaurant List</a>

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



         // echo "<button><a href = 'add_to_menu.php?id=".$menu_id."'>Add items to this menu</a></button>";  //ADD it from that particular MENU and not RESTAURANT table... 
                                  ?>
      
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Category</th>
        <th>Food Item</th>
        <th>Price</th>
        <!-- <th>Edit Records</th>
        <th>Delete Records</th> -->
      </tr>
    </thead>
    <tbody>
<?php

if ($result_menu_new->num_rows > 0) 
{
   while($row = $result_menu_new->fetch_assoc()) 
    {
?>

      <tr>
        <td><p><?php echo $row["category_name"] ?></p></td>
        <td><p><?php echo $row["name"] ?></p></td>
        <td><p><?php echo "$". $row["price"] ?></p></td>
        <?php
        // echo "<td><a href = 'edit_menu.php?id=".$row["id"]."'>Edit</a></td>"; 
        // echo "<td><a href = 'delete_menu_item.php?id=".$row["id"]."'>Delete</a></td>";
      ?>
      </tr>
<?php


    }
} else {

}
// if($result_menu_new->num_rows > 0){
//   while($row = $result_menu_new->fetch_assoc()){
//     echo $row['name'] . " $" . $row['price'];
//     echo "<br>";
//   }
// }




?>

    </tbody>
  </table>
  </div>
</div>

</body>
</html>