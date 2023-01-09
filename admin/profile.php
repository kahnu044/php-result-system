<?php
include 'if_admin.php';
if (!$admin) {
header("location:./");
}
else
{
echo '

<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Profile : Kanha Result System</title>';

//done 18-12-2020
include 'config.php';
include('header_meta.php');
echo '</head>
<body>';
include('left_panel.php');
include('right_panel.php');
//show breadcrumbs
  echo '<div class="breadcrumbs">
            <div class="col-sm-8">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-left">
                            <li><a href="./">Dashboard</a></li>
                            <li class="active">Admin Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>';
//if update button is pressed
if (isset($_POST['update'])) {
    $name = $_POST['adminName'];
    $email = $_POST['adminEmail'];
    $address = $_POST['adminAddress'];
    $oldPassword = $_POST['password'];
    $newPassword = $_POST['newPassword'];

    //it update name,email,address
    $sql = "UPDATE admin SET adminName='$name',adminEmail='$email',adminAddress='$address' ";
    $result = mysqli_query($conn,$sql);
        if ($result) 
            {
            $msg = "Updated Successfully";
            }

    //check previous password   
    $rows = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM admin"));
    if($rows['password'] == $oldPassword)//if old password same as entered password
    {
        $sql = "UPDATE admin SET password= '$newPassword' ";
        $result = mysqli_query($conn,$sql);
        if ($result) 
        {
            $msg = "Password";
        }  
    }
    else
    {
        //if entered password and old password are not same
        $passwordNotMatch = '<div class="col-sm-12">
                    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                        <strong>Old Password Not Match</strong>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>';
    }

    //if entered password is empty
     if (!$oldPassword == 0) 
        {
        echo $passwordNotMatch;
        }
        else
        {
        //if password matched then admin data and new password update message
        echo  '<div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        <strong>'.$msg1 .  $msg.'</strong>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>';
        }
}


$sql = "SELECT * FROM admin";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
// main content start from here
   echo'<div class="content mt-3">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header text-center">
                        <strong class="card-title mb-3">Admin Profile</strong>
                    </div>
                    <div class="card-body">
                        <div class="mx-auto d-block">
                            <img class="rounded-circle mx-auto d-block" src="images/admin.jpg" alt="Card image cap">
                            <h5 class="text-sm-center mt-2 mb-1">'.$row['adminName'].'</h5>
                            <div class="location text-sm-center"><i class="fa ti-email"></i> '.$row['adminEmail'].'</div>
                            <div class="location text-sm-center"><i class="fa fa-map-marker"></i> '.$row['adminAddress'].'</div>
                        </div>
                        <hr>
                        <div class="card-text text-sm-center">
                            <a href="#"><i class="fa fa-facebook pr-1"></i></a>
                            <a href="#"><i class="fa fa-twitter pr-1"></i></a>
                            <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
                            <a href="#"><i class="fa fa-pinterest pr-1"></i></a>
                        </div>
                    </div>
                </div>
            </div>';
    //form for address name and password upd     
    echo   '<div class="card">
                <div class="card-header text-center">
                    <strong>Admin Details </strong>
                </div>
                <div class="card-body card-block">
                    <form action="profile.php" method="post" class="form-horizontal">

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">Admin Name</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="adminName" class="form-control" value="'.$row['adminName'].'">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">Admin Email</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="email" name="adminEmail" class="form-control" value="'.$row['adminEmail'].'">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class="form-control-label">Address</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" name="adminAddress" class="form-control" value="'.$row['adminAddress'].'">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class="form-control-label">Password</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="password" name="password" placeholder="To Change Password Enter Old Password" class="form-control">
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3">
                                <label class=" form-control-label">New Password</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="password" name="newPassword" placeholder="Enter New Password" class="form-control">
                            </div>
                        </div>
                        <hr>
                        <div class="text-right">
                            <button type="submit" name="update" class="btn btn-success btn-sm">
                                <i class="fa fa-check"></i> Update
                            </button>
                        </div>
                    </form>
                </div>  
            </div>
        </div>';
    include('footer.php');
}
?>