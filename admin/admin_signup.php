<?php
include 'config.php';
//check admin already registred or not
$sql = "SELECT * FROM admin";
$result = mysqli_query($conn,$sql);
$exist_rows = mysqli_num_rows($result);
if ($exist_rows > 0) 
    {
      //if admin already ragistred then redirect to homepage
     header("location:./");
    } 
else
{
//if not then take data and added to database
if (isset($_POST['submit'])) {
    $adminEmail = $_POST['adminEmail'];
    $password = md5($_POST['password']);
    $cpassword = md5($_POST['cpassword']);
   //check both password same or not
        if ($password  == $cpassword ) 
          {
        $sql = "INSERT INTO admin (adminEmail,password) VALUES ('$adminEmail', '$password')";
        $result = mysqli_query($conn,$sql);
        if ($result) 
            {           //show account created successfully
            $success = '<div class="alert alert-success alert-dismissible fade show" role="alert" style="background-color:#3b4;color:white">
                        <strong>Congratulations! ['.$adminEmail.'] - </strong> You Successfully Registred. Please login <a href="./" style="color:white"><strong> HERE</strong></a>
                        </div>';
            }
          }
        else
            {
                //show error for password not match
            $failed = '<div class="alert alert-warning alert-dismissible fade show" role="alert" style="background-color:red;color:white">
                       <strong>Sorry! ['.$adminEmail.'] - </strong> Your Passwords Are Not Matched.
                       </div>';
            }   
    }

}
echo '
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Signup - Kanha Result System</title>';
    include 'header_meta.php';
    echo '
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
                '.$success.'
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="adminEmail" class="form-control" placeholder="Email" required="">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" required="">
                        </div>
                        <div class="form-group">
                            <label>Repeat Password</label>
                            <input type="password" name="cpassword" class="form-control" placeholder="Password" required="">
                        </div>
                                
                        <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign Up</button>          
                    </form>
                </div>
            </div>
        </div>
    </div>';
    echo'
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>';
?>