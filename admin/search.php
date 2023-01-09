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
    <title>View Data</title>';

//done 17-12-2020 by Kanha
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
                            <li class="active">Result</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
<!-- alert message start -->
        <div class="content mt-3">
<?php
if(isset($_POST['submit']))
{
  $rollno = $_POST['rollno'];
  $sql = "SELECT * FROM student_info WHERE student_rollno= '$rollno' ";
  $result = mysqli_query($conn, $sql);
  $rollNoFound = mysqli_num_rows($result);
}
// when roll no found
if($rollNoFound)
{
  echo '<div class="col-sm-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <strong>'.$rollNoFound.'</strong> Record Found In The Database.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>';

 echo ' <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Roll Number : Student Name</strong>
                            </div>
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                     <tr>
                                        <th>Name</th>
                                        <th>Class</th>
                                        <th>Exam Type</th>
                                        <th>View Result</th>
                                    </tr>
                                </thead>
                                <tbody>';
                         // i used for print 1- to end of the data one by one           
                         $i = 1;
                         $sql1 = "SELECT * FROM student_info WHERE student_rollno= '$rollno' ";
                              $result1 = mysqli_query($conn, $sql1);
                              while($row= mysqli_fetch_array($result1)){
                       echo '   <tr>
                                    <td>'.$i.' . '.$row['student_name'].'</td>
                                    <td>'.$row['class_type'].'</td>
                                    <td>'.$row['exam_type'].'</td>
                                    <td><a href="searchView.php?id='.$row['id'].'">
                                    <button type="button" class="btn btn-primary">View</button></a></td>
                                </tr>';
                        $i= $i+1; //incremanet 1 to 2  
                            }            
                        echo ' </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>';
}
else
{
echo'<div class="col-sm-12">
        <div class="alert  alert-danger alert-dismissible fade show" role="alert">
            <strong>Sorry!</strong> No Data Found , Enter A Valid Roll No.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>';
}
echo '
</div>';
include('footer.php');
}
?>