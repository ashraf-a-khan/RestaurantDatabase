

<?php
include 'db.php';

$sql_restaurant = "SELECT * FROM restaurant_info WHERE id = '".$_GET['id']."'";
$result_restaurant = $conn->query($sql_restaurant);

$sql_get_menu = "SELECT * FROM restaurant_menu WHERE restaurant_id = '".$_GET['id']."'";
$result_get_menu_id = $conn->query($sql_get_menu);

$_SESSION['universal_menu_id'] = $_GET['id'];

$menu_id = "";

$menu_id_array = array();
if($result_get_menu_id->num_rows > 0)
{
  while($row = $result_get_menu_id->fetch_assoc()){
    $menu_id = $row['menu_id'];
    array_push($menu_id_array, $row['menu_id']);
  }
}


// print_r($menu_id_array);
$menu_arr = implode(",",$menu_id_array);
// echo "fkffaa";
// $category = array();
// // echo $menu_id;
// $sql_category = "SELECT category.id, category.name from category where id in 
//                   (SELECT category_name from items WHERE id in 
//                     (SELECT item_id FROM menu_items WHERE menu_id = '".$menu_id."'))";
// $result_sql_category = $conn->query($sql_category);
// if($result_sql_category->num_rows > 0){
//   while($row = $result_sql_category->fetch_assoc()){
//     // echo $row['name'];
//     // echo "<br>";
//     array_push($category,$row['name']);  
//   }
// }


// echo $menu_arr;
// print_r($category);

$sql_menu_new = "SELECT * FROM items WHERE id IN (SELECT item_id FROM `menu_items` WHERE menu_id IN ($menu_arr))  order BY category_name";

// $sql_menu_new = "SELECT * FROM items WHERE id IN (SELECT item_id FROM `menu_items` WHERE menu_id = '".$menu_id."')  order BY category_name";
$result_menu_new = $conn->query($sql_menu_new);

// $sql_get_rowcount_menu = "SELECT COUNT(*) FROM `menu_items` WHERE menu_id = '".$menu_id."'
// ";
// $result_get_rowcount_menu = $conn->query($sql_get_rowcount_menu);

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
  <style type="text/css">
    h1 
    {
      color:red;
      font-family: Poppins-Regular;
      font-size: 35px;
      line-height: 1.7;
      /*color: #666666;*/
      margin: 0px;
      transition: all 0.4s;
      -webkit-transition: all 0.4s;
      -o-transition: all 0.4s;
      -moz-transition: all 0.4s;
    }
  </style>
</head>
<body>

<a href = "DisplayRestaurantsAdmin.php?title=title">Go to Restaurant List</a>

<div class="container">
<br>
<br>
  <?php


  if($result_restaurant->num_rows > 0)
{
  while($row = $result_restaurant->fetch_assoc()) 
    {
    	echo "<h1>". $row['title']. "</h1>";
    	echo "<p>" . $row['address_x'] . "-" . $row['address_y'] . " ";
    	echo $row['address_verbal']. "</p>";
    	echo "<p>" ."Restaurant Rating: ".$row['rating']. "</p>";
    }
 }else{

 } 
echo "<button><a href = 'edit_open_hours.php?id=".$_GET['id']."'>Edit open hours for this restaurant</a></button>";
echo "<br>";
if($result_openHours->num_rows > 0)
{
	while($row = $result_openHours->fetch_assoc())
	{
		echo "<p>Days Open: " . $row['days_open'] . "</p>";
		echo "<p>Working Hours: " . $row['working_hours'] ."</p>";
		echo "<p> Specials: " . $row['specials'] ."</p>";
	}
}         

         echo "<br>";
         echo "<button><a href = 'add_to_menu.php?id=".$menu_id."'>Add items to this menu</a></button>";  //ADD it from that particular MENU and not RESTAURANT table... 
    // echo "<p>Categories available in this menu: ".implode(", ", $category)."</p>";
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
// $row_remaining="";
// if($result_get_rowcount_menu > 0){
//   $row_remaining = $result_get_rowcount_menu;
// }

// echo $row_remaining;

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
        echo "<td><a href = 'edit_menu.php?id=".$row["id"]."'>Edit</a></td>"; 
        echo "<td><a href = 'delete_menu_item.php?id=".$row["id"]."'>Delete</a></td>";
     }
}     


$sql_get_rowcount_menu = "SELECT COUNT(*) AS num FROM `menu_items` WHERE menu_id = '".$menu_id."'
";
$row = mysql_fetch_assoc($sql_get_rowcount_menu);
$row_remaining = $row['num'];

echo $row_remaining;
 ?>
      </tr>

    </tbody>
  </table>
  </div>
</div>

</body>
</html>