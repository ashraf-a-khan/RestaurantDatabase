<?php
include 'db.php';
session_start();



if($_SERVER["REQUEST_METHOD"] == "POST") 
{
    $myusername = mysqli_real_escape_string($conn,$_POST['username']);
    $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
    $sql = "SELECT * FROM administrator WHERE user_id ='".$_POST['username']."' AND password = '".$_POST['password']."' ";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);

    if($count == 1) 
    {
        header("location: EnterLocationAdmin.php");
    }
    else 
    {
        $error = "Your Login Name or Password is invalid";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<title></title>
	<style type="text/css">
	body {
	  margin: 0;
	  padding: 0;
	  background-color: #17a2b8;
	  height: 100vh;
	}
	#login .container #login-row #login-column #login-box {
	  margin-top: 120px;
	  max-width: 600px;
	  height: 320px;
	  border: 1px solid #9C9C9C;
	  background-color: #EAEAEA;
	}
	#login .container #login-row #login-column #login-box #login-form {
	  padding: 20px;
	}
	#login .container #login-row #login-column #login-box #login-form #register-link {
	  margin-top: -85px;
	}
	</style>
</head>
<body>
	<div id="login">
        <h3 class="text-center text-white pt-5">CS 370 Restaurant Menu User Interface</h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                            <h3 class="text-center text-info">Admin Login below</h3>
                            <div class="form-group">
                                <label class="text-info">Username:</label>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div id="register-link" class="text-center">
                            	<br>
                            	<br>
                            	<br>
                            	<input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                                
                            </div>
                            <div class="form-group">
                                <h4 class="text-center text-info"><a href="EnterLocationCustomer.php">Customer access here</a></h4>
                                <br>
                            </div>

                        <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

                        </form>

                            
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>