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
    <title>All Visitors Details - Kanha Result System</title>';

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
                            <li class="active">All Visitors </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>';
//main content start here
//count unique visitors
$sql = "SELECT DISTINCT user_ip FROM visitors";
$result = mysqli_query($conn, $sql);
$uniqueVisitors = mysqli_num_rows($result);
  echo '<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong>'.$uniqueVisitors.' Unique Visitor</strong> 
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
                                        <th>User IP</th>
                                        <th>1st Date</th>
                                        <th>Last Date</th>
                                        <th>Page(Hits)</th>
                                        <th>Refer Link</th>
                                    </tr>
                                </thead>
                                <tbody>';
// $i = 1;
//shows all visitors data by their IP                                     
$sql = "SELECT * FROM visitors GROUP BY user_ip";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_array($result)){
$visit_date = date("d-m-Y g:i A", strtotime($row['visit_date']));
$last_visit = date("d-m-Y g:i A", strtotime($row['last_visit']));
                            echo '  <tr>
                                        <td><a href="./visitors_info.php?user_ip='.$row['user_ip'].'"><font color="blue" >'.$row['user_ip'].'</font></a></td>
                                        <td>'.$visit_date.'</td>
                                        <td>'.$last_visit.'</td>
                                        <td>'.$row['page_url'].' ('.$row['total_visit'].')</td>
                                        <td>'.$row['user_referer_link'].'</td> 
                                    </tr>';
                              // $i= $i+1;    
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