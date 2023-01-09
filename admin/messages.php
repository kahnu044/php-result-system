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
    <title>Message Box - Kanha Result System</title>';

//done 19-12-2020
include 'config.php';
include('header_meta.php');
echo ' <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
';
echo '</head>
<body>';
include('left_panel.php');
include('right_panel.php');

  echo '<div class="breadcrumbs">
            <div class="col-sm-8">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-left">
                            <li><a href="./">Dashboard</a></li>
                            <li class="active">Message For Admin</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>';

//delete message
$msgID = $_GET['msgID'];
$delete = mysqli_query($conn,"DELETE FROM contact_us WHERE id=$msgID");
mysqli_query($conn,"ALTER TABLE contact_us AUTO_INCREMENT = $msgID");
if ($delete) 
{
  echo ' <div class="content mt-3">
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        Message Successfully <strong>Deleted</strong>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>';
}
// else
// {
//   echo ' <div class="content mt-3">
//             <div class="col-sm-12">
//                 <div class="alert  alert-danger alert-dismissible fade show" role="alert">
//                     <strong>Error!</strong> To Delete Message.
//                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
//                         <span aria-hidden="true">&times;</span>
//                     </button>
//                 </div>
//             </div>';
// }


//main content start here
//count total messages 
$sql = "SELECT * FROM contact_us";
$result = mysqli_query($conn, $sql);
$totalMessages = mysqli_num_rows($result);
  echo '<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>Total '.$msgID.' Messages</strong> 
                            </div>
                        <div class="card-body card-block">
                    </div>';

             echo ' <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">All Visitors Details</strong>
                            </div>
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Message Date</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Phone</th>
                                        <th>Messages</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>';
$i = 1;
//shows all visitors data by their IP                                     
$sql = "SELECT * FROM contact_us";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
$msgDate = date("d-m-Y g:i A", strtotime($row['msg_date']));
                            echo '  <tr>
                                        <td><b>'.$i.'</b></td>
                                        <td>'.$msgDate.'</td>
                                        <td>'.$row['name'].'</td>
                                        <td>'.$row['email'].'</td>
                                        <td>'.$row['subject'].'</td>
                                        <td>'.$row['phone'].'</td> 
                                        <td>'.$row['message'].'</td>
                                        <td><a href="./messages.php?msgID='.$row['id'].' "><button type="submit" class="btn btn-danger">Delete</button></a></td>
                                    </tr>';
                              $i= $i+1;    
                                }            
                           echo '</tbody>
                            </table>
                        </div>
                    </div>                          
                </div>';
//end content here by kanha
include('footer.php');
}
?>