<?php
include 'db.php';


// let's pretend that a user wants to create a new "group". we will do so
// while at the same time creating a "membership" for the group which
// consists solely of the user themselves (at first). accordingly, the group
// and membership records should be created together, or not at all.
// this sounds like a job for: TRANSACTIONS! (*cue music*)

// note: this is meant for InnoDB tables. won't work with MyISAM tables.

$id = $_GET['id'];  
// $new_item_id = "";
// mysqli_begin_transaction($conn, MYSQLI_TRANS_START_READ_ONLY);

// try {

//     //$conn->autocommit(FALSE); // i.e., start transaction
// 	mysqli_autocommit($conn, FALSE);

//     // assume that the TABLE groups has an auto_increment id field
//     $query = "INSERT INTO `items` (`category_id`, `name`, `price`) VALUES ('".$_POST['category_id']."', '".$_POST['name']."', '".$_POST['price']."')";

//     $result = $conn->query($query);
//     if ( !$result ) {
//         $result->free();
//         throw new Exception($conn->error);
//     }

// 	printf ("New Record has id %d.\n", mysqli_insert_id($conn));
//     $new_item_id = mysqli_insert_id($conn); // last auto_inc id from *this* connection
//     $query = "INSERT INTO menu_items (menu_id,item_id) ";
//     $query .= "VALUES ('".$id."', '".$new_item_id."')";
//     $result = $conn->query($query);
//     if ( !$result ) {
//         $result->free();
//         throw new Exception($conn->error);
//     }
//     // our SQL queries have been successful. commit them
//     // and go back to non-transaction mode.
//     $conn->commit();
//     $conn->autocommit(TRUE); // i.e., end transaction
// }
// catch ( Exception $e ) {

//     // before rolling back the transaction, you'd want
//     // to make sure that the exception was db-related
//     $conn->rollback(); 
//     $conn->autocommit(TRUE); // i.e., end transaction   
// }

//$salary = 5000;
// $salary = '$5000';

/* Change database details according to your database */
// $conn = mysqli_connect('localhost', 'robin', 'robin123', 'company_db');


















$name_err = ""; 
$price_err = ""; 
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//$sql_get_next_item_id = "SELECT AUTO_INCREMENT FROM information_schema.tables WHERE table_name = 'items' AND table_schema = 'restaurant_2'"


echo $max_item_id;


if(isset($_POST['update']))
{	

	$name = "";
	$price = "";  	
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{	$category_id = sanitize_input($_POST['category_id']);
		$name = sanitize_input($_POST['name']);
		$price = sanitize_input($_POST['price']);

		if(empty($name))
		{
			$name_err = "The name field cannot be empty";
		}
		else if(empty($price))
		{
			$price_err = "The price field cannot be empty";
		}
		else{
			// $sql = "INSERT INTO items ( 
			// category_id,
			// name,
			// price
			// )	
			// VALUES ('".$category_id."',
			// '".$name."',
			// '".$price."') ";

			// if ($conn->query($sql) === TRUE)
   //          {
			// 	header('Location: view_menu.php?id='.$id.'');
   //          }
   //          else
   //          {
   //             echo "Something went wrong!";
   //          }
			mysqli_autocommit($conn, true);
			$flag = true;
			$sql_insert_into_items = "INSERT INTO `items` (`category_id`, `name`, `price`) VALUES ('".$_POST['category_id']."', '".$_POST['name']."', '".$_POST['price']."')";
			$max_item_id="";



			$result = mysqli_query($conn, $sql_insert_into_items);  //INSERTING INTO THE ITEMS TABLE

			if (!$result) {
				$flag = false;

			    echo "Error details: " . mysqli_error($conn) . ".";
			}
		
			$sql_get_max_item_id = "SELECT MAX(id) FROM items"; //RETRIEVING LATEST INSERTED ITEM ID FOR MENU_ITEMS TABLE
			$result_get_max_item_id = $conn->query($sql_get_max_item_id);
			if($result_get_max_item_id->num_rows > 0){
				while($row = $result_get_max_item_id->fetch_assoc()){
					$max_item_id = $row['MAX(id)'];		
				}
			}
			else
			{
				echo "no max id";
			}

			echo $max_item_id;

			echo "<br>";
			echo $id;
			$sql_insert_into_menu_items = "INSERT INTO menu_items (menu_id, item_id)  VALUES ('".$id."', '".$max_item_id."')";


			$result = mysqli_query($conn, $sql_insert_into_menu_items);   //INSERTING ITEM_ID AND MENU_ID IN MENU_ITEMS table
			if (!$result) {
				$flag = false;
			    echo "Error details: " . mysqli_error($conn) . ".";
			}
			if ($flag) {
			    mysqli_commit($conn);
				header('Location: view_menu.php?id='.$id.'');
			    echo "All queries were executed successfully";
			} else {
				mysqli_rollback($conn);
			    echo "All queries were rolled back";
			} 

			// mysqli_close($conn);
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
                            <h3 class="text-center text-info">Add name to Menu</h3>
                        	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                            <div class="form-group">
                                <label for="username" class="text-info">name:</label><br>
                                <input type="text"  name="name" value = "" class="form-control">
                                <span class = "error"> &nbsp*<?php if (empty($update_food)) {echo "<p><em><font color=red>" . $name_err . "</font></em></p>";}?>
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