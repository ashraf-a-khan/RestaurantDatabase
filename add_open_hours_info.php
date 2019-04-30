<?php
include 'db.php';

$days_open = $working_hours = $specials =""; 
//$exists_error = "";
$max_open_hours_id="";

function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if(isset($_POST['submit']))
{	
	// $days_open = sanitize_input($_POST['days_open']);
	// $working_hours = sanitize_input($_POST['working_hours']);
	// $specials = sanitize_input($_POST['specials']);
	// if($_SERVER['REQUEST_METHOD'] == "POST")
	// {
	// 	$sql_if_exists = "SELECT * FROM restaurant_info WHERE title = '".$title."' OR address_x = '".$address_x."' OR address_y = '".$address_y."' ";	
	// 	$result_if_exists = mysqli_query($conn, $sql_if_exists);
	// 	if (mysqli_num_rows($result_if_exists)) {
	// 	  // Rows are there.
	// 	  $exists_error = "You have entered a value for the primary keys which exist in the database";
	// 	} else {
		  // No rows are there.
		  // echo '<br>nothing found';
		  // echo $_POST['title'];
			mysqli_autocommit($conn, true);
			$flag = true;

			$sql_insert_into_open_hours = "INSERT INTO `open_hours_info` (`days_open`, `working_hours`, `specials`) VALUES ('".$days_open."', '".$working_hours."', '".$specials."')";
			$result_insert_into_open_hours = mysqli_query($conn, $sql_insert_into_open_hours);
			if (!$result_insert_into_open_hours){
				$flag = false;
			    echo "Error details: " . mysqli_error($conn) . ".";
			} 
			$sql_get_max_open_hours_id = "SELECT MAX(id) FROM open_hours_info";
			$result_get_max_open_hours_id = $conn->query($sql_get_max_open_hours_id);
			if($result_get_max_open_hours_id->num_rows > 0){
				while($row = $result_get_max_open_hours_id->fetch_assoc()){
					$max_open_hours_id = $row['MAX(id)'];
				}
			}
			else
			{
				echo "no max id";
			}
			$sql_insert_hours_to_restaurant = "UPDATE restaurant_info SET open_hours_id = '".$max_open_hours_id."' WHERE id = '".$_GET['id']."'";
			$result_insert_hours_to_restaurant = mysqli_query($conn, $sql_insert_hours_to_restaurant);
			if (!$result_insert_hours_to_restaurant) {
				$flag = false;
			    echo "Error details: " . mysqli_error($conn) . ".";
			}
			if ($flag) {
			    mysqli_commit($conn);
				header('Location: create_menu_new_restaurant.php?rest_id='.$_GET['id'].'');
			    // echo "All queries were executed successfully";
			} else {
				mysqli_rollback($conn);
			    echo "All queries were rolled back";
			} 
		//}	
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
					Add Open Hours for Restaurant
				</span>
				<span class="label-input100">Restaurant -> <strong>Hours</strong> -> Menu</span>
				<?php
				if(isset($exists_error)){
					echo $exists_error;
				}
				?>
				<br>
				<!-- <form class="login100-form validate-form" action = "index.php" method="post">
					<?php
					$sql_open_hours = "SELECT * FROM open_hours_info";
					$result_open_hours = $conn->query($sql_open_hours);

					echo "<select name='days_open'>"; // Open your drop down box
					while ($row = $result_open_hours->fetch_assoc()) {
						echo "<option value='" . $row['id'] . "'>".$row['days_open']." " .$row['working_hours']. "</option>";
					}
					echo "</select>";


					?>
					<br>
					<br>
					<br>
					<br>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button name="save" type = "submit" class="login100-form-btn">
								Submit selected open hours
							</button>
						</div>
					</div>
				</form> -->
					<br>
					<br>
					<br>
					<br>
				<form class="login100-form validate-form" action = "<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
					<div class="wrap-input100" >
						<span class="label-input100">Days open</span>
						<input class="input100" type="text" name="days_open" placeholder="Monday to Friday">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100" >
						<span class="label-input100">Working hours</span>
						<input class="input100" type="text" name="working_hours" placeholder="9:00am to 5:00pm" >
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100" >
						<span class="label-input100">Specials</span>
						<input class="input100" type="text" name="specials" placeholder="30 Minutes or Free">
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