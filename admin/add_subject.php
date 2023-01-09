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
    <title>Add New Subject : Kanha Result System</title>';

//done 18-12-2020
include 'config.php';
include('header_meta.php');
echo '</head>
<body>';
include('left_panel.php');
include('right_panel.php');
?>
<!-- show breadcrumbs -->
        <div class="breadcrumbs">
            <div class="col-sm-8">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-left">
                            <li><a href="#">Dashboard</a></li>
                            <li class="active">Add Subject</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
<?php
if (isset($_POST['submit'])) 
{
  $subjectName = $_POST['subjectName'];
  $sql = "SELECT * FROM subject WHERE subjectName= '$subjectName' ";
  $result = mysqli_query($conn, $sql);
  $check = mysqli_num_rows($result);

  if ($check>=1) {
     echo ' <div class="content mt-3">
            <div class="col-sm-12">
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    <strong>Sorry!</strong> This Is Already Exist.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>';
      }
        else
      {
      $sql = "INSERT INTO subject (subjectName) VALUES ('$subjectName') ";
      $result = mysqli_query($conn, $sql);

      if ($result) {
         echo ' <div class="content mt-3">
                <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        New Subject Added <strong>Successfully</strong>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>';
      }
      else
      {
         echo ' <div class="content mt-3">
                <div class="col-sm-12">
                    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> To Add New Subject.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>';
      }
  
  }
}
?>
<div>    
<!-- start basic form elements kanha-->
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                Add <strong>New Subject</strong>
                            </div>
                            <div class="card-body card-block">
                                <form action=" " method="post" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3"><label class=" form-control-label">Subject Name</label></div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="subjectName" placeholder="Enter New Subject Name" class="form-control" required="">
                                            </div>
                                        </div>
                                      <hr>
                                    <div class="text-right">
                                        <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                            Add Subject
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
<?php
include('footer.php');
}
?>