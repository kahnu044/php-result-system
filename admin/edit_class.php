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
    <title>Edit Class : Kanha Result System</title>';

//done 18-12-2020
include 'config.php';
include('header_meta.php');
echo ' <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">';
echo '</head>
<body>';
include('left_panel.php');
include('right_panel.php');
//show breadcrumbs
 echo  '<div class="breadcrumbs">
            <div class="col-sm-8">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-left">
                            <li><a href="./">Dashboard</a></li>
                            <li class="active">Edit Class</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>';
  //php code by kanha@16-12-2020
  $sql = "SELECT * FROM class";
  $result = mysqli_query($conn, $sql);
  $recordFound = mysqli_num_rows($result);

  if (isset($_POST['updateID'])) {
    $classID = $_POST['updateID'];
    $className = $_POST['className'];
    $sql = "UPDATE class SET class_type = '$className' WHERE cid = '$classID' ";
    $checkUpdate = mysqli_query($conn,$sql);

   if ($checkUpdate) {
     echo ' <div class="content mt-3">
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <strong>Congratulations!</strong> Record Updated.
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
                    <strong>Sorry!</strong> No Record Available For The Given Roll Number.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>';
     }   
}
//main content start here
      echo' <div class="content mt-3">
                <div class="animated fadeIn">
                    <div class="row">';
 if ($recordFound) {
                echo   '<div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <strong class="card-title">'.$recordFound.'</strong> Classes Found
                                </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Class Name</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                  <tbody>';
    $i = 1;
    $sql1 = "SELECT * FROM class";
    $result1 = mysqli_query($conn, $sql1);
    while($row= mysqli_fetch_array($result1)){
                                echo '  <tr><form action="" method="POST">
                                            <td><input type="text" name="className" value="'.$row['class_type'].'" class="form-control"></td>
                                            <td><button name="updateID" type="submit" value="'.$row['cid'].'" class="btn btn-success"  >Update</button></td>
                                            </form>
                                        </tr>';
                                    $i= $i+1;    
                                    }        
                            echo '</tbody>
                            </table>
                        </div>
                    </div>
                </div>';
                }
    echo'  </div>
        </div>';
include('footer.php');
}
?>