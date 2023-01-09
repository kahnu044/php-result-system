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
    <title>Delete Institute : Kanha Result System</title>';

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
?>
<!-- show breadcrumbs -->
         <div class="breadcrumbs">
            <div class="col-sm-8">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-left">
                            <li><a href="./">Dashboard</a></li>
                            <li class="active">Delete Institute</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
<?php
  //php code by kanha@16-12-2020
  $sql = "SELECT * FROM institute";
  $result = mysqli_query($conn, $sql);
  $recordFound = mysqli_num_rows($result);
  echo '<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>'.$recordFound.' Institute Found</strong> 
                            </div>
                        <div class="card-body card-block">                                  
                    </div>';
  if ($recordFound) {
          echo '    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Sl. Number : Student Name</strong>
                            </div>
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Institute Name</th>
                                    <th>Delete Student</th>
                                </tr>
                            </thead>
                            <tbody>';
  $i = 1;
  $sql1 = "SELECT * FROM institute";
  $result1 = mysqli_query($conn, $sql1);
  while($row= mysqli_fetch_array($result1)){
                         echo ' <tr>
                                    <td>'.$i.' . '.$row['instituteName'].'</td>
                                    <td><a href="delete.php?ins_id='.$row['ins_id'].'"><button type="button" class="btn btn-danger">Delete</button></a></td>
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