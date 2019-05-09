<?php
include 'db.php';
session_start();
// $x2=$_POST['x'];
// $y2=$_POST['y'];

if($_SERVER["REQUEST_METHOD"] == "POST") 
{

if(isset($_POST['submit']))
{ 
  // echo $_POST['x'];
  // echo $_POST['y'];

  if($_POST['x'] > 100 || $_POST['y'] > 100){
    echo "ERROR: Coordinates need to be between 1 and 100";
  }else{
    $x2=$_POST['x'];
    $y2=$_POST['y'];
  }


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
  // echo $_GET['x'];
  // echo $_GET['y'];
    $myXAxis = mysqli_real_escape_string($conn,$x2);
    $myYAxis = mysqli_real_escape_string($conn,$y2); 

    foreach ($master as $key=>$value){
      array_push($distArr, distanceFormula($key, $myXAxis, $value, $myYAxis));  
    }
  // echo "<br>";
  $distArr2 = Combine($xArray, $distArr);
    //print_r($distArr2);
  // echo "<br>";
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

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- <title>Login V13</title> -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
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

<title>CSS Template</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
  /*padding-left: 20px;
  padding-right: 20px;*/

}

input[type=text], select {
  width: 10%;
  padding: 6px 10px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
div {
  border-radius: 2px;
  /*background-color: #f2f2f2;*/
  padding: 0px;
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
   background-color: #f1f1f1;
}

/* Middle column */
.column.middle {
  padding-right: 90px;
  -webkit-flex: 1;
  -ms-flex: 1;
  flex: 1;
  background-color: #f1f1f1;
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
@media (max-width: 200px) { 
  .row {
    -webkit-flex-direction: column;
    flex-direction: column;
  }
}
</style>
</head>
<body>
<a href = "index.php">Go to Admin/Customer selection</a>
<h2>Select Restaurants</h2>
<form action = "<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" name='myform' method="post">
  <p>What is your x and y axis:
  <div class="form-group">
    <label class="text-info">x axis:</label>
    <input type = 'text' name = 'x'>
  </div>
  <div class="form-group">
    <label class="text-info">y axis:</label>
    <input type = 'text' name = 'y'>
  </div>
  </p>
  <p><input type = 'submit' name = 'submit' onclick = 'check(); return false'></p>
  </p>
</form>




<p>Here is a list of restaurants for you to choose from.</p>
<p><strong>Note:</strong> You have logged in as a customer, you only have read privileges.</p>

<div class="header">
  <h2>Restaurant List</h2>
</div>


<?php


if(isset($_POST['submit'])){
  $sql_display_restaurants = "SELECT * FROM restaurant_info WHERE id IN ($restaurant_id_arrFinal) ORDER BY FIELD (id, $restaurant_id_arrFinal)";
}
else if(isset($_GET['title']))
{
  $sql_display_restaurants = "SELECT * FROM restaurant_info ORDER BY title";
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
  <div class="column side"><a href = "DisplayRestaurantsCustomer.php?title=title">Restaurant Titles(tap to sort by name)</a></div>
  <div class="column middle"><p>Restaurant Addresses</p></div>
  <div class="column middle"><p>Restaurant Rating</p></div>
</div>

<?php
if($result4->num_rows > 0)
{
   while($row = $result4->fetch_assoc())
    {
?>        
  <div class="row">
<?php
        echo  "<div class = 'column side'><a href='view_menu_customer.php?id=".$row['id']."'>". $row['title']."</a></div>";
        echo "<div class = 'column middle'><p>". $row['address_x'] . "-" . $row['address_y'] . "</p></div>";
        echo "<div class = 'column middle'><p>". $row['rating'] . " Star</p></div>";
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
