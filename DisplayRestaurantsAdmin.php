<?php
include 'db.php';
session_start();
$x2=$_POST['x'];
$y2=$_POST['y'];

function distanceFormula($x1, $x2, $y1, $y2) {
    return sqrt(($y2 - $y1) * ($y2 - $y1) + ($x2 - $x1) * ($x2 - $x1));
}

function Combine($array1, $array2){ 
    return(array_combine($array1, $array2)); 
} 

$sql = "SELECT * FROM restaurant_info";
$result = $conn->query($sql);

$xArray = array();
$yArray = array();
if ($result->num_rows > 0) 
{   // output data of each row
    while($row = $result->fetch_assoc()) 
    {
        array_push($xArray, $row["address_x"]);
        array_push($yArray, $row["address_y"]);

    }
} else {
    // echo "0 results";
}

$master = Combine($xArray, $yArray);

$execXArray = array();
$distArr = array();
$distArr2 = array();
if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $myXAxis = mysqli_real_escape_string($conn,$_POST['x']);
    $myYAxis = mysqli_real_escape_string($conn,$_POST['y']); 
    

    foreach ($master as $key=>$value){
    	array_push($distArr, distanceFormula($key, $myXAxis, $value, $myYAxis));	
    }
	echo "<br>";
	$distArr2 = Combine($xArray, $distArr);
    //print_r($distArr2);
	echo "<br>";
    asort($distArr2); 
    foreach($distArr2 as $key=>$value){
    	//echo "X coordinate= ". $key .", Distance= " . $value;
    	// echo "Distance= " . $value;
    	// echo "<br>";
    	// echo "<br>";
    	array_push($execXArray, $key);
    }

    $iterateThroughX = implode(", ", $execXArray);
    $restaurant_id_arr = array();
    $restaurant_id_arrFinal = array();

    $sqlSortRestaurants = "SELECT * FROM restaurant_info WHERE address_x IN ($iterateThroughX) ORDER BY FIELD (address_x, $iterateThroughX)";
    $result2 = $conn->query($sqlSortRestaurants);
	if ($result2->num_rows > 0) 
	{   // output data of each row
	    while($row = $result2->fetch_assoc()) 
	    {
	       	// echo "X axis: " . $row['address_x'] . " Y Axis " .$row['address_y'] . " Restaurant_id: " .$row['restaurant_id'] ;
	       	// echo "<br>";
	        array_push($restaurant_id_arr, $row['id']);
	    }

	} else {
	    echo "0 results";
	}

	$restaurant_id_arrFinal = implode(", ", $restaurant_id_arr);
	$sqlDisplayRestaurants = "SELECT * FROM restaurant_info WHERE id IN ($restaurant_id_arrFinal) ORDER BY FIELD (id, $restaurant_id_arrFinal)";
	$result3 = $conn->query($sqlDisplayRestaurants);
	if ($result3->num_rows > 0) 
	{   // output data of each row
	    while($row = $result3->fetch_assoc()) 
	    {
	       	//echo $row['title'] . " " . $row['address_x'] . " " .$row['address_y'];
	       	//echo "<br>";

	    }

	} else {
	    echo "0 resulsts";
	}
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Style the header */
.header {
  background-color: #f1f1f1;
  padding: 10px;
  text-align: center;
  font-size: 15px;
}

/* Container for flexboxes */
.row {
  display: -webkit-flex;
  display: flex;
}

/* Create three unequal columns that sits next to each other */
.column {
  padding: 10px;
  height: 60px; /* Should be removed. Only for demonstration */
  background-color:white;
}

/* Left and right column */
.column.side {
    padding-left: 180px;
   -webkit-flex: 3;
   -ms-flex: 3;
   flex: 3;
   background-color:#EAEAEA;
}

/* Middle column */
.column.middle {
  padding-right: 90px;
  -webkit-flex: 1;
  -ms-flex: 1;
  flex: 1;
  background-color:#EAEAEA;
}

/* Style the footer */
.footer {
  background-color: #f1f1f1;
  padding: 10px;
  text-align: center;
}

div.column.side:hover{
    background-color: #E3E3E3;

}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media (max-width: 300px) {
  .row {
    -webkit-flex-direction: column;
    flex-direction: column;
  }
}
</style>
</head>
<body>

<h2>Select Restaurants</h2>
<p>Here is a list of restaurants for you to choose from.</p>
<p><strong>Note:</strong> This interface allows you to select the menu of individual restaurants, edit them and delete them. Also, you can add restaurants here.</p>

<div class="header">
  <h2>Restaurant List</h2>
</div>


<?php

if(isset($_GET['title']))
{
  $sql_display_restaurants = "SELECT * FROM restaurant_info ORDER BY title";
}else{
  $sql_display_restaurants = "SELECT * FROM restaurant_info WHERE id IN ($restaurant_id_arrFinal) ORDER BY FIELD (id, $restaurant_id_arrFinal)";
}
$sql_menu_id = "SELECT menu_id from restaurant_menu where restaurant_id in 
     (select id from restaurant_info WHERE id IN ($restaurant_id_arrFinal) ORDER BY FIELD (id, $restaurant_id_arrFinal))";


$result4 = $conn -> query($sql_display_restaurants);



$result5 = $conn ->query($sql_menu_id);


if($result5->num_rows > 0){
  while($row = $result5->fetch_assoc()){
    // echo $row['menu_id'];
    // echo "<br>";
  }
}

?>

<div class="row">
  <div class="column side"><a href = "DisplayRestaurantsAdmin.php?title=title">Restaurant Titles(tap to sort by name)</a></div>
  <div class="column middle">Restaurant Addresses</div>
  <div class="column middle">Restaurant Rating</div>
</div>

<?php
if($result4->num_rows > 0)
{
   while($row = $result4->fetch_assoc())
    {
?>        
  <div class="row">
<?php
        echo  "<div class = 'column side'><a href='view_menu.php?id=".$row['id']."'>". $row['title']."</a></div>";
        echo "<div class = 'column middle'>". $row['address_x'] . "-" . $row['address_y'] . "</div>";
        echo "<div class = 'column middle'>". $row['rating'] . " Star</div>";
?>
        </div>
<?php        
    }
}
else
{
    echo "0 results";
}
?>

<div class="footer">
  <p>END</p>
</div>

</body>
</html>
