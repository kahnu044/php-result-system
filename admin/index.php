<?php
//define('SECURE_PAGE', true);
include 'if_admin.php';
if (!$admin) {
include 'admin_login.php';
}
else
{
echo '
<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard - Kanha Result System</title>';
//done 18-12-2020
include 'config.php';
include 'header_meta.php';
echo '</head>
<body>';
include 'left_panel.php';
include 'right_panel.php';

$sql = "SELECT * FROM student_info";
$result = mysqli_query($conn, $sql);
$totalStudents = mysqli_num_rows($result);


$sql = "SELECT * FROM institute";
$result = mysqli_query($conn, $sql);
$totalInstitute = mysqli_num_rows($result);


$sql = "SELECT * FROM subject";
$result = mysqli_query($conn, $sql);
$totalSubjects = mysqli_num_rows($result);


$sql = "SELECT * FROM class";
$result = mysqli_query($conn, $sql);
$totalClasses = mysqli_num_rows($result);

//show breadcrumbs -->
   echo'<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>';
//starting chart data
echo    '<div class="content mt-3">
            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-1">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton1" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="add_student.php">Add Student</a>
                                    <a class="dropdown-item" href="edit_student.php">Edit Student</a>
                                    <a class="dropdown-item" href="delete_student.php">Delete Student</a>
                                </div>
                            </div>
                        </div>
                        <p class="text-light">Total Students</p>
                            <h4 class="mb-0">
                                <span class="count">'.$totalStudents.'</span>
                            </h4>
                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart1"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-2">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton2" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                <div class="dropdown-menu-content"> 
                                    <a class="dropdown-item" href="add_institute.php">Add Institute</a>
                                    <a class="dropdown-item" href="edit_institute.php">Edit Institute</a>
                                    <a class="dropdown-item" href="delete_institute.php">Delete Institute</a>
                                </div>
                            </div>
                        </div>
                        <p class="text-light">Toral Institute</p>
                            <h4 class="mb-0">
                                <span class="count">'.$totalInstitute.'</span>
                            </h4>
                        <div class="chart-wrapper px-0" style="height:70px;" height="70">
                            <canvas id="widgetChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
       

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-3">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton3" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="add_subject.php">Add Subject</a>
                                    <a class="dropdown-item" href="edit_subject.php">Edit Subject</a>
                                    <a class="dropdown-item" href="delete_subject.php">Delete Subject</a>
                                </div>
                            </div>
                        </div>
                        <p class="text-light">Total Subjects</p>
                            <h4 class="mb-0">
                                <span class="count">'.$totalSubjects.'</span>
                            </h4>
                    </div>
                    <div class="chart-wrapper px-0" style="height:70px;" height="70">
                        <canvas id="widgetChart3"></canvas>
                    </div>
                </div>
            </div>
           

            <div class="col-sm-6 col-lg-3">
                <div class="card text-white bg-flat-color-4">
                    <div class="card-body pb-0">
                        <div class="dropdown float-right">
                            <button class="btn bg-transparent dropdown-toggle theme-toggle text-light" type="button" id="dropdownMenuButton4" data-toggle="dropdown">
                                <i class="fa fa-cog"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton4">
                                <div class="dropdown-menu-content">
                                    <a class="dropdown-item" href="add_class.php">Add Classes</a>
                                    <a class="dropdown-item" href="edit_class.php">Edit Classes</a>
                                    <a class="dropdown-item" href="delete_class.php">Delete Classes</a>
                                </div>
                            </div>
                        </div>
                        <p class="text-light">Total Classes</p>
                            <h4 class="mb-0">
                                <span class="count">'.$totalClasses.'</span>
                            </h4> 
                        <div class="chart-wrapper px-3" style="height:70px;" height="70">
                            <canvas id="widgetChart4"></canvas>
                        </div>
                    </div>
                </div>
            </div>';

//count total visitors
$sql = "SELECT * FROM visitors";
$result = mysqli_query($conn, $sql);
$totalVisitors = mysqli_num_rows($result);


//count unique visitors
$sql = "SELECT DISTINCT user_ip FROM visitors";
$result = mysqli_query($conn, $sql);
$uniqueVisitors = mysqli_num_rows($result);

//count total page views
$sql = "SELECT SUM(total_visit) AS totalPageViews FROM visitors";
$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_array($result);


//count total result page view
$sql = "SELECT * FROM visitors WHERE page_url = '/kanha/kanha_project/sufee-admin-dashboard-master/result.php' ";
$result = mysqli_query($conn, $sql);
$rows=mysqli_fetch_array($result);



    //end 1st row and starting of 2nd row
    echo   '<div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-bar-chart-alt text-success border-success"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Total Visitors</div>
                                <span class="count">'.$totalVisitors.'</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-user text-primary border-primary"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Uniqe Visitors</div>
                                <span class="count">'.$uniqueVisitors.'</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-eye text-warning border-warning"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Page Views</div>
                                <span class="count">'.$row['totalPageViews'].'</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-one">
                            <div class="stat-icon dib"><i class="ti-stats-up text-danger border-danger"></i></div>
                            <div class="stat-content dib">
                                <div class="stat-text">Total Result Views</div>
                                <span class="count">'.$rows['total_visit'].'</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

     //end 2nd row and starting of 3rd row

     echo ' <div class="col-lg-3 col-md-6">
                <div class="social-box facebook">
                    <i class="fa fa-facebook"></i>
                    <ul>
                        <li>
                            <span class="count">40</span> k
                            <span>friends</span>
                        </li>
                        <li>
                            <span class="count">450</span>
                            <span>feeds</span>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="social-box twitter">
                    <i class="fa fa-twitter"></i>
                    <ul>
                        <li>
                            <span class="count">30</span> k
                            <span>friends</span>
                        </li>
                        <li>
                            <span class="count">450</span>
                            <span>tweets</span>
                        </li>
                    </ul>
                </div>
            </div>
           

            <div class="col-lg-3 col-md-6">
                <div class="social-box linkedin">
                    <i class="fa fa-linkedin"></i>
                    <ul>
                        <li>
                            <span class="count">40</span>
                            <span>contacts</span>
                        </li>
                        <li>
                            <span class="count">250</span>
                            <span>feeds</span>
                        </li>
                    </ul>
                </div>
            </div>
            

            <div class="col-lg-3 col-md-6">
                <div class="social-box google-plus">
                    <i class="fa fa-google-plus"></i>
                    <ul>
                        <li>
                            <span class="count">94</span>
                            <span>follower</span>
                        </li>
                        <li>
                            <span class="count">92</span>
                            <span>circles</span>
                        </li>
                    </ul>
                </div>
            </div>';
include('footer.php');
}
?>