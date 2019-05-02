<?php
include 'db.php';

$rest_id = $_GET['id'];
$open_hours_id = "";

$days_open_err = "";
$working_hours_err = "";
$specials_error = "";

$update_days_open = "";
$update_working_hours = "";
$update_specials = "";

function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = addslashes($data);
    return $data;
}


$sql_get_open_hrs_id = "SELECT open_hours_id FROM restaurant_info WHERE id = '".$rest_id."'";
$result_get_open_hrs_id = $conn->query($sql_get_open_hrs_id);
while($row = $result_get_open_hrs_id->fetch_assoc()){
	$open_hours_id = $row['open_hours_id'];
}
// echo $open_hours_id;

$sql_update_open_hours = "SELECT * from open_hours_info WHERE id = '".$open_hours_id."'";
$result_update_open_hours = $conn->query($sql_update_open_hours);
if($result_update_open_hours->num_rows > 0)
{
    while( $row = $result_update_open_hours->fetch_assoc()) 
    {
	    $days_open = $row['days_open'];
	    $working_hours = $row['working_hours'];
	    $specials = $row['specials'];
   } 
}else{
	echo "nOt gooD";
}
if(isset($_POST['update']))
{
	$update_days_open = sanitize_input($_POST['days_open']);
	$update_working_hours = sanitize_input($_POST['working_hours']);
	$update_specials = addslashes($_POST['specials']);
	if(empty($update_days_open)){
		$days_open_err = "Days open cannot be empty!";
	}else if(empty($update_working_hours)){
		$working_hours_err = "Working hours cannot be empty!";
	}else if(empty($update_specials)){
		// $specials_error = "Specials name cannot be empty!";
	}else{
		$sql_update = "UPDATE open_hours_info SET days_open = '".$update_days_open."', working_hours = '". $update_working_hours ."', specials = '".$update_specials."' WHERE id = '".$open_hours_id."';";
		if($conn->query($sql_update)){
			header('Location: view_menu.php?id='.$_SESSION['universal_menu_id'].'');

		}
		else
		{
			echo "Something went wrong";
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


		<div id="login">
        <h3 class="text-center text-white pt-5">CS 370 Restaurant Menu User Interface</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <!-- <form id="login-form" class="form" action="DisplayRestaurantsAdmin.php" method="post"> -->
                            <h3 class="text-center text-info">Edit open hours info</h3>
                        	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                            <div class="form-group">
                                <label for="username" class="text-info">days_open:</label><br>
                                <input type="text"  name="days_open" value = "<?php echo $days_open; ?>" class="form-control">
                                <span class = "error"> &nbsp*<?php if (empty($update_days_open)) {echo "<p><em><font color=red>" . $days_open_err . "</font></em></p>";}?>
		    					</span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Working Hours</label><br>
                                <input type="text"  name="working_hours" value = "<?php echo $working_hours; ?>"  class="form-control">
                                <span class = "error"> &nbsp*<?php if (empty($update_working_hours)) {echo "<p><em><font color=red>" . $working_hours_err . "</font></em></p>";}?>
		    					</span>
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Specials</label><br>
                                <input type="text"  name="specials" value = "<?php echo $specials; ?>"  class="form-control">
                                <span class = "error"> &nbsp*<?php if (empty($update_specials)) {echo "<p><em><font color=red>" . $specials_error . "</font></em></p>";}?>
		    					</span>
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