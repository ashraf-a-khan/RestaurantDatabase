<?php
include 'db.php';

$name = ""; 
//$exists_error = "";
$max_menu_id="";
$restaurant_id = $_GET['rest_id'];
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = addslashes($data);
    return $data;
}

// echo $restaurant_id;

if(isset($_POST['submit']))
{	
	$name = sanitize_input($_POST['name']);

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$sql_if_exists = "SELECT * FROM restaurant_info WHERE title = '".$title."' OR address_x = '".$address_x."' OR address_y = '".$address_y."' ";	
		$result_if_exists = mysqli_query($conn, $sql_if_exists);
		if (mysqli_num_rows($result_if_exists)) {
		  // Rows are there.
		  $exists_error = "You have entered a value for the primary keys which exist in the database";
		} else {

			mysqli_autocommit($conn, true);
			$flag = true;

			$sql_insert_into_new_menu = "INSERT INTO `menu` (`name`) VALUES ('".$name."')";
			$result_insert_into_new_menu = mysqli_query($conn, $sql_insert_into_new_menu);
			if (!$result_insert_into_new_menu){
				$flag = false;
			    echo "Error details: " . mysqli_error($conn) . ".";
			} 

			$sql_get_max_menu_id = "SELECT MAX(id) FROM menu";
			$result_get_max_menu_id = $conn->query($sql_get_max_menu_id);
			if($result_get_max_menu_id->num_rows > 0){
				while($row = $result_get_max_menu_id->fetch_assoc()){
					$max_menu_id = $row['MAX(id)'];
				}
			}
			else
			{
				echo "no max menu id";
			}
			echo $max_menu_id;

			$sql_insert_into_restaurant_menu = "INSERT INTO restaurant_menu (restaurant_id, menu_id) VALUES (".$restaurant_id.", ".$max_menu_id.")";
			$result_insert_into_restaurant_menu = mysqli_query($conn, $sql_insert_into_restaurant_menu);
			if (!$result_insert_into_restaurant_menu) {
				$flag = false;
			    echo "Error details: " . mysqli_error($conn) . ".";
			}
			if ($flag) {
			    mysqli_commit($conn);
				header('Location: add_to_menu.php?id='.$max_menu_id.'');
			    // echo "All queries were executed successfully for creating a new menu and connecting it to the restaurant";
			} else {
				mysqli_rollback($conn);
			    echo "All queries were rolled back";
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
				
				<span class="login100-form-title p-b-59">
					Add menu name for Restaurant
				</span>
				<span class="label-input100">Restaurant -> <strong>Hours</strong> -> Menu</span>
				<?php
				if(isset($exists_error)){
					echo $exists_error;
				}
				?>
				<br>
				
					<br>
					<br>
				<form class="login100-form validate-form" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
					<div class="wrap-input100" >
						<span class="label-input100">Enter menu name: </span>
						<input class="input100" type="text" name="name" placeholder="Lunch">
						<span class="focus-input100"></span>
					</div>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button name="submit" type = "submit" class="login100-form-btn">
								Submit
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