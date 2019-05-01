<?php
include 'db.php';

$title = $rating = $address_x = $address_y = $address_verbal =""; 
$exists_error = "";
$max_restaurant_id = "";

function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['submit']))
{	
	$title = addslashes($_POST['title']);
	$address_x = sanitize_input($_POST['address_x']);
	$address_y = sanitize_input($_POST['address_y']);
	$address_verbal = sanitize_input($_POST['address_verbal']);
	// echo mysqli_real_escape_string($title);
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$sql_if_exists = "SELECT * FROM restaurant_info WHERE title = '".$title."' AND address_x = '".$address_x."' AND address_y = '".$address_y."' ";	
		$result_if_exists = mysqli_query($conn, $sql_if_exists);
		if (mysqli_num_rows($result_if_exists)) {
		  // Rows are there.
		  $exists_error = "You have entered a value for the primary keys which exist in the database";
		} else {
		  // No rows are there.
		  // echo '<br>nothing found';
		  // echo $_POST['title'];
			$sql_insert_into_items = "INSERT INTO `restaurant_info` (`title`, `rating`, `address_x`, `address_y`, `address_verbal`) VALUES ('".$title."', '".$_POST['rating']."', '".$address_x."', '". $address_y ."', '".$address_verbal."')";
			$result_insert_into_items = mysqli_query($conn, $sql_insert_into_items);
			if (!$result_insert_into_items){
			    echo "Error details: " . mysqli_error($conn) . ".";
			} else {
				$sql_get_max_restaurant_id = "SELECT MAX(id) FROM restaurant_info"; //RETRIEVING LATEST INSERTED ITEM ID FOR MENU_ITEMS TABLE
				$result_get_max_restaurant_id = $conn->query($sql_get_max_restaurant_id);
				if($result_get_max_restaurant_id->num_rows > 0){
					while($row = $result_get_max_restaurant_id->fetch_assoc()){
						$max_restaurant_id = $row['MAX(id)'];
					}
				}
				else
				{
					echo "no max id";
				}
				echo "Successfully inserted values for restaurant_info";
				header('Location: add_open_hours_info.php?id='.$max_restaurant_id.'');
			}
		}	
	}
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
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
</head>
<body style="background-color: #999999;">	
	<div class="limiter">
		<div class="container-login100">
			<div class="login100-more" style="background-image: url('images/bg-01.jpg');"></div>

			<div class="wrap-login100 p-l-50 p-r-50 p-t-72 p-b-50">
				<form class="login100-form validate-form" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
					<span class="login100-form-title p-b-59">
						Add New Restaurant
					</span>
					<span class="label-input100"><strong>Restaurant</strong> -> Hours -> Menu</span>
					<?php
					if(isset($exists_error)){
						echo $exists_error;
					}
					?>
					<br>
					<div class="wrap-input100 validate-input" data-validate="Title is required">
						<span class="label-input100">Restaurant Title</span>
						<input class="input100" type="text" name="title" placeholder="Title...">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Rating is required">
						<span class="label-input100">Rating</span>
						<input class="input100" type="number" name="rating" placeholder="Rating..." min="1" max="10">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="X coordinate">
						<span class="label-input100">X axis</span>
						<input class="input100" type="text" name="address_x" placeholder="X axis" min="1" max="100">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Y coordinate">
						<span class="label-input100">Y axis</span>
						<input class="input100" type="text" name="address_y" placeholder="Y axis" min="1" max="100">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100" >
						<span class="label-input100">Full Address with text (Optional)</span>
						<input class="input100" type="text" name="address_verbal" placeholder="Full Address...">
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button name="submit" type = "submit" class="login100-form-btn">
								Set open hours info
							</button>
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>