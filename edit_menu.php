<?php
include 'db.php';

$food = "";
$price = "";
$category_id = "";
$id = $_GET['id'];
$getfood = $_GET['food'];


echo $_SESSION['universal_menu_id'];

$food_err = "";
$price_err = "";
$category_id_err = "";

$update_food = "";
$update_price = "";
$update_category_id = "";

function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// echo $getfood;
// echo $_GET['category_id'];
//http://localhost/DatabaseRestaurant/edit_menu.php?id=3&food=Caprice%20Garlic%20Bread&price=10.99&category_id=2

$sql = "SELECT * FROM items WHERE id = '".$_GET['id']."'";

$result_1 = $conn->query($sql);
if($result_1->num_rows > 0)
{
    while( $row = $result_1->fetch_assoc()) 
    {
	    $food = $row['name'];
	    $price = $row['price'];
	    $category_id = $row['category_id'];
   } 
}else{
	echo "nOt gooDO";
}
if(isset($_POST['update']))
{
	$update_id = sanitize_input($_POST['id']);
	$update_food = sanitize_input($_POST['food']);
	$update_price = sanitize_input($_POST['price']);
	$update_category_id = sanitize_input($_POST['category_id']);
	if(empty($update_food)){
		$food_err = "Food item cannot be empty!";
	}else if(empty($update_price)){
		$price_err = "Price cannot be empty!";
	}else if(empty($update_category_id)){
		$category_id_err = "Category id cannot be empty!";
	}else{
		$sql_update = "UPDATE items SET name = '".$_POST['food']."', price = '". $_POST['price'] ."', category_id = '".$_POST['category_id']."' WHERE id = '".$id."';";
		if($conn->query($sql_update)){
			header('Location: view_menu.php?id='.$_SESSION['universal_menu_id'].'');

		}
		else
		{
			echo "Something went wrong";
		}
	}
}



$sql_restaurant = "SELECT * FROM restaurant_info WHERE id = '".$_GET['id']."'";
$result_restaurant = $conn->query($sql_restaurant);

$sql_openHours = "SELECT open_hours_info.days_open, open_hours_info.working_hours, open_hours_info.specials FROM restaurant_info, open_hours_info WHERE restaurant_info.open_hours_id = open_hours_info.id AND restaurant_info.id = '".$_GET['id']."'";
$result_openHours = $conn->query($sql_openHours);

?>
<!DOCTYPE html>
<html>
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<style type="text/css">
	body {
	  margin: 0;
	  padding: 0;
/*	  background-color: #17a2b8;
*/	
	  background-color: white;	  
	  height: 130vh;
	}
	#login .container #login-row #login-column #login-box {
	  margin-top: 60px;
	  max-width: 600px;
	  height: 360px;
	  border: 1px solid #9C9C9C;
	  background-color: #EAEAEA;
	}
	#login .container #login-row #login-column #login-box #login-form {
	  padding: 20px;
	}
	#login .container #login-row #login-column #login-box #login-form #register-link {
	  margin-top: -45px;
	}
	</style>
</head>
<body>
   <input action="action" onclick="window.history.go(-1); return false;" type="button" value="Back" />

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


   ?>


		<div id="login">
        <h3 class="text-center text-white pt-5">CS 370 Restaurant Menu User Interface</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <!-- <form id="login-form" class="form" action="DisplayRestaurantsAdmin.php" method="post"> -->
                            <h3 class="text-center text-info">Edit form</h3>
                        	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                            <div class="form-group">
                                <label for="username" class="text-info">Food:</label><br>
                                <input type="text"  name="food" value = "<?php echo $food; ?>" class="form-control">
                                <span class = "error"> &nbsp*<?php if (empty($update_food)) {echo "<p><em><font color=red>" . $food_err . "</font></em></p>";}?>
		    					</span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Price:</label><br>
                                <input type="text"  name="price" value = "<?php echo $price; ?>"  class="form-control">
                                <span class = "error"> &nbsp*<?php if (empty($update_price)) {echo "<p><em><font color=red>" . $price_err . "</font></em></p>";}?>
		    					</span>
                            </div>
                            <div style="text-align: center" class="form-group">
                                <label for="username" class="text-info">Category:</label><br>
                                <!-- <input type="text" name="x" id="username" class="form-control"> -->
		                    	<td>
							    <select style="text-align: center" name="category_id">
							    	<option value="1">All-day</option>
							        <option value="2">Appetizers</option>
							        <option value="3">Breakfast</option>
							        <option value="4">Burgers</option>
							        <option value="5" >Combos</option>
							    	<option value="6">Cuisine</option>
							        <option value="7">Desserts</option>
							        <option value="8">Dinner</option>
							        <option value="9">Drinks</option>
							        <option value="10" >Entrees</option>
							        <option value="11">Kid's specials</option>
							        <option value="12">Lunch</option>
							        <option value="13">Salads</option>
							        <option value="14">Sauces</option>
							        <option value="15" >Side Dishes</option>
							        <option value="16">Smoothies</option>
							        <option value="17">Soups</option>
							        <option value="18">Vegan</option>
							        <option value="19">Vegetarian</option>	        
							    </select>
								</td>
                            </div>
                            
                                <input style="text-align: center" type="submit" name="update" class="btn btn-info btn-md" value="submit">
                            
                        </form>
                        <!-- </form> -->
		            </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>