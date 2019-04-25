<?php
include 'db.php';

$food_err = ""; 
$price_err = ""; 
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$id = $_GET['id'];

if(isset($_POST['update']))
{	

	$food = "";
	$price = "";  	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{	$category_id = sanitize_input($_POST['category_id']);
		$food = sanitize_input($_POST['food']);
		$price = sanitize_input($_POST['price']);

		if(empty($food))
		{
			$food_err = "The food field cannot be empty";
		}
		else if(empty($price))
		{
			$price_err = "The price field cannot be empty";
		}else{
			$sql = "INSERT into menu (id, 
			food,
			price,
			category_id
			)	
			VALUES ('".$id."',
			'".$food."',
			'".$price."',
			'".$category_id."') ";

			if ($conn->query($sql) === TRUE)
            {
				header('Location: view_menu.php?id='.$id.'');
            }
            else
            {
               echo "Something went wrong!";
            }
		}
	}
}


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
  

		<div id="login">
        <h3 class="text-center text-white pt-5">CS 370 Restaurant Menu User Interface</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <!-- <form id="login-form" class="form" action="DisplayRestaurantsAdmin.php" method="post"> -->
                            <h3 class="text-center text-info">Add Food to Menu</h3>
                        	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                            <div class="form-group">
                                <label for="username" class="text-info">Food:</label><br>
                                <input type="text"  name="food" value = "" class="form-control">
                                <span class = "error"> &nbsp*<?php if (empty($update_food)) {echo "<p><em><font color=red>" . $food_err . "</font></em></p>";}?>
		    					</span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Price:</label><br>
                                <input type="text"  name="price" value = ""  class="form-control">
                                <span class = "error"> &nbsp*<?php if (empty($update_price)) {echo "<p><em><font color=red>" . $price_err . "</font></em></p>";}?>
		    					</span>
                            </div>
                            <div style="text-align: center" class="form-group">
                                <label for="username" class="text-info">Category:</label><br>
                                <!-- <input type="text" name="x" id="username" class="form-control"> -->
		                    	<td>
							    <select style="text-align: center" name="category_id">
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