<?php
include 'db.php';

$food = "";
$price = "";
$category_name = "";
$id = $_GET['id'];
$getfood = $_GET['food'];


// echo $_SESSION['universal_menu_id'];

$food_err = "";
$price_err = "";
$category_id_err = "";

$update_food = "";
$update_price = "";
$update_category_name = "";

function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// echo $getfood;
// echo $_GET['category_name'];
//http://localhost/DatabaseRestaurant/edit_menu.php?id=3&food=Caprice%20Garlic%20Bread&price=10.99&category_name=2

$sql = "SELECT * FROM items WHERE id = '".$_GET['id']."'";

$result_1 = $conn->query($sql);
if($result_1->num_rows > 0)
{
    while( $row = $result_1->fetch_assoc()) 
    {
	    $food = $row['name'];
	    $price = $row['price'];
	    $category_name = addslashes($row['category_name']);
   } 
}else{
	echo "nOt gooD";
}
if(isset($_POST['update']))
{
	$update_id = sanitize_input($_POST['id']);
	$update_food = sanitize_input($_POST['food']);
	$update_price = sanitize_input($_POST['price']);
	$update_category_name = addslashes($_POST['category_name']);
	if(empty($update_food)){
		$food_err = "Food item cannot be empty!";
	}else if(empty($update_price)){
		$price_err = "Price cannot be empty!";
	}else if(empty($update_category_name)){
		$category_id_err = "Category name cannot be empty!";
	}else{
		$sql_update = "UPDATE items SET name = '".$update_food."', price = '". $update_price ."', category_name = '".$update_category_name."' WHERE id = '".$id."';";
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
                            <h3 class="text-center text-info">Edit menu item</h3>
                        	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                            <div class="form-group">
                                <label for="username" class="text-info">Food:</label><br>
                                <input type="text"  name="food" value = "<?php echo $food; ?>" class="form-control">
                                <span class = "error"> &nbsp*<?php if (empty($update_food)) {echo "<p><em><font color=red>" . $food_err . "</font></em></p>";}?>
		    					</span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Price in $:</label><br>
                                <input type="text"  name="price" value = "<?php echo $price; ?>"  class="form-control">
                                <span class = "error"> &nbsp*<?php if (empty($update_price)) {echo "<p><em><font color=red>" . $price_err . "</font></em></p>";}?>
		    					</span>
                            </div>
                            <div style="text-align: center" class="form-group">
                                <label for="username" class="text-info">Category:</label><br>
                                <!-- <input type="text" name="x" id="username" class="form-control"> -->
		                    	<td>
							    <select style="text-align: center" name="category_name">
							    	<option value="<?php echo $category_name ?>"><?php echo $category_name ?></option>
							    	<option value="All-day">All-day</option>
							        <option value="Appetizers">Appetizers</option>
							        <option value="Breakfast">Breakfast</option>
							        <option value="Burgers">Burgers</option>
							        <option value="Combos" >Combos</option>
							    	<option value="Cuisine">Cuisine</option>
							        <option value="Desserts">Desserts</option>
							        <option value="Dinner">Dinner</option>
							        <option value="Drinks">Drinks</option>
							        <option value="Entrees" >Entrees</option>
							        <option value="Kid's specials">Kid's specials</option>
							        <option value="Lunch">Lunch</option>
							        <option value="Salads">Salads</option>
							        <option value="Sauces">Sauces</option>
							        <option value="Side Dishes" >Side Dishes</option>
							        <option value="Smoothies">Smoothies</option>
							        <option value="Soups">Soups</option>
							        <option value="Vegan">Vegan</option>
							        <option value="Vegetarian">Vegetarian</option>	        
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