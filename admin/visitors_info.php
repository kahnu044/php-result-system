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
    <title>Visitors IP Details - Kanha Result System</title>';

//done 19-12-2020
include 'config.php';
include('header_meta.php');
echo ' <link rel="stylesheet" href="vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">';
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
                            <li><a href="./visitors.php">Visitors</a></li>
                            <li class="active">Visitors Details View</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>';
//main content start here
//get user ip from url
$user_ip = $_GET['user_ip'];
//count total visit by the ip
$sql = "SELECT * FROM visitors WHERE user_ip = '$user_ip' ";
$result = mysqli_query($conn, $sql);
$total_visit_by_ip = mysqli_num_rows($result);

  echo '<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>'.$total_visit_by_ip.' Times Visit</strong> 
                            </div>
                        <div class="card-body card-block">
                    </div>';

             echo ' <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Visitors IP : <font color="blue">'.$user_ip.'</font></strong>
                            </div>
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Page(Hits)</th>
                                        <th>Refer Link</th>
                                        <th>1st Date</th>
                                        <th>Last Date</th>
                                        <th>Browser</th>
                                        <th>Device</th>
                                        <th>Os</th>
                                    </tr>
                                </thead>
                                <tbody>';
$i = 1;
//shows all visitors data by their IP                                     
$sql = "SELECT * FROM visitors GROUP BY user_ip";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
$visit_date = date("d-m-Y g:i A", strtotime($row['visit_date']));
$last_visit = date("d-m-Y g:i A", strtotime($row['last_visit']));
                            echo '  <tr>
                                        <td>'.$row['page_url'].' ('.$row['total_visit'].')</td>
                                        <td>'.$row['user_referer_link'].'</td>
                                        <td>'.$visit_date.'</td>
                                        <td>'.$last_visit.'</td>
                                        <td>'.$row['user_browser'].'</td>
                                        <td>'.$row['user_device'].'</td>
                                        <td>'.$row['user_os'].'</td>
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