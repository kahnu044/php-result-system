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
    <title>Edit Student : Kanha Result System</title>';

//done 18-12-2020
include 'config.php';
include('header_meta.php');
echo ' <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
';
echo '</head>
<body>';
include('left_panel.php');
include('right_panel.php');

//show breadcrumbs
echo   '<div class="breadcrumbs"> 
            <div class="col-sm-8">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-left">
                            <li><a href="./">Dashboard</a></li>
                            <li class="active">Edit Student</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>';
//main content start here

if(isset($_POST['submit']))
{
  $rollno = $_POST['rollno'];
  $sql = "SELECT * FROM student_info WHERE student_rollno= '$rollno' ";
  $result = mysqli_query($conn, $sql);
  $recordFound = mysqli_num_rows($result);
  if ($recordFound) {
     echo ' <div class="content mt-3">
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <strong>'.$recordFound.'</strong> Record Found.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>';
  }
  else
  {
    echo  ' <div class="content mt-3">
              <div class="col-sm-12">
                  <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                      <strong>Sorry!</strong> No Record Found.
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
              </div>';
    }
}
        echo '<div class="content mt-3">
                 <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong>Search</strong> Student By Roll Number
                                </div>
                            <div class="card-body card-block">
                                <form action="" method="post" class="form-horizontal">
                                     <div class="row form-group">
                                          <div class="col col-md-12">
                                              <div class="input-group">
                                                  <input type="text"  name="rollno" placeholder="Enter Roll Number" class="form-control">
                                                    <div class="input-group-btn">
                                                      <button name="submit" class="btn btn-primary">Search</button>
                                                    </div>
                                              </div>
                                          </div>
                                      </div>
                                  </form>
                            </div>';
      if ($recordFound) {
                     echo ' <div class="col-md-12">
                                <div class="card">
                                     <div class="card-header">
                                          <strong class="card-title">Sl. Number : Student Name</strong>
                                      </div>
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Class</th>
                                            <th>Exam Type</th>
                                            <th>Edit Details</th>
                                        </tr>
                                    </thead>
                                  <tbody>';
      $i = 1;
      $sql1 = "SELECT * FROM student_info WHERE student_rollno= '$rollno' ";
      $result1 = mysqli_query($conn, $sql1);
      while($row= mysqli_fetch_array($result1)){
                             echo '     <tr>
                                            <td>'.$i.' . '.$row['student_name'].'</td>
                                            <td>'.$row['class_type'].'</td>
                                            <td>'.$row['exam_type'].'</td>
                                            <td><a href="edit_studentDetails.php?id='.$row['id'].'"><button type="button" class="btn btn-primary">Edit</button></a></td>   
                                        </tr>';
                                   $i= $i+1;    
                                    } 
                           echo '</tbody>
                            </table>
                        </div>
                    </div>                        
                </div>';   
                 }
include('footer.php');
}
?>