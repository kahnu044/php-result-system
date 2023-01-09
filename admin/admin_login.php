<?php 
include 'config.php';
$sql = "SELECT * FROM admin";
$result = mysqli_query($conn,$sql);
$exist_rows = mysqli_num_rows($result);

if ($exist_rows == 0) 
    {
       //if signup not done redirect to signup page
      header("location:./admin_signup.php");
    } 
	else
	{
	//if signup done signin page appear
		if (isset($_POST['submit'])) 
		{
		    $adminEmail = $_POST['adminEmail'];
		    $password = md5($_POST['password']);
		    $sql = "SELECT * FROM admin WHERE adminEmail='$adminEmail' AND password= '$password' ";
		    $result = mysqli_query($conn,$sql);
		    $num = mysqli_num_rows($result);

		        if ($num == 1) 
		        {
			        session_start();
			        $_SESSION['loggedin'] = true;
			        $_SESSION['adminEmail'] = $adminEmail;
			        header("location:./");
			        //echo "<meta http-equiv='refresh' content='0'>"; //refresh page after submit
			    }
			    else
			    {
                    
		        	$error = '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="background-color:red;color:white">
		                       <strong>Sorry!</strong> Wrong Username/Password.
		                       </div>';
		    	}
		}
echo '
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Login - Kanha Result System</title>';
    include 'header_meta.php';
    
echo'
</head>
<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="./">
                        <img class="align-content" src="images/logo.png" alt="">
                    </a>
                </div>
                <div class="login-form">
                '.$error.'
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="adminEmail" class="form-control" placeholder="Email" required="">
                        </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" required="">
                        </div>
                                <div class="checkbox">
                                    <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <!-- <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label> -->
                                </div>
                                <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>          
                    </form>
                </div>
            </div>
        </div>
    </div>';
echo '
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>';
// }
}
// include 'if_admin.php';
// if (!$admin) {


?>