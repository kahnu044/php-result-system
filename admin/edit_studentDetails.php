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
    <title>Edit Student Details - Kanha Result System</title>';

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
                            <li class="active">Edit Student</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>';
if (isset($_POST['submit'])) 
{
  $studentId = $_GET['id'];

  $rollNo = $_POST['rollNo'];
  $name = $_POST['studentName'];

  $institute = $_POST['instituteName'];
  $class = $_POST['className'];

  $examType = $_POST['examType'];
  $subject = $_POST['subjectName'];

  $fullMark = $_POST['fullMark'];
  $securedMark = $_POST['securedMark'];

  $StudentResult = $_POST['StudentResult'];
//updating data
$sql = "UPDATE student_info SET    
    student_rollno = '$rollNo',
    student_name = '$name',
    institute_name = '$institute',
    class_type = '$class',
    exam_type = '$examType',
    subject_type = '$subject',
    full_mark = '$fullMark',
    secured_mark = '$securedMark',
    result = '$StudentResult' WHERE id= '$studentId' ";
$result = mysqli_query($conn, $sql);
    if ($result) 
      {
        echo '<div class="content mt-3">
                <div class="col-sm-12">
                    <div class="alert  alert-success alert-dismissible fade show" role="alert">
                        Student Record Updated <strong>Successfully</strong>.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>';
            }
         else
            {
        echo '<div class="content mt-3">
                <div class="col-sm-12">
                    <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                        <strong>Error!</strong> Update Failed.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>';
      }
}
//fetch student data by id
  $studentId = $_GET['id'];
  $sql = "SELECT * FROM student_info WHERE id= '$studentId' ";
  $result = mysqli_query($conn, $sql);
  $rows = mysqli_fetch_array($result);
 //start basic form elements kanha
        echo '<div>    
                <div class="content mt-3">
                    <div class="animated fadeIn">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Edit Student Record ('.$rows['student_name'].')</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            <div class="row form-group">
                                                <div class="col col-md-3"><label class=" form-control-label">Roll Number </label></div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="text" name="rollNo" class="form-control" value="'.$rows['student_rollno'].'">
                                                    </div>
                                                </div>

                                                <div class="row form-group">
                                                    <div class="col col-md-3"><label class=" form-control-label">Student Name</label></div>
                                                    <div class="col-12 col-md-9"><input type="text" name="studentName"  class="form-control" value="'.$rows['student_name'].'" >
                                                    </div>
                                                </div>';


                                        echo   '<div class="row form-group">
                                                    <div class="col col-md-3"><label class=" form-control-label">Institute Name</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="instituteName" class="form-control">
                                                                <option value="'.$rows['institute_name'].'">'.$rows['institute_name'].' </option>';
                                                                    $sql = "SELECT * FROM institute";
                                                                    $result = mysqli_query($conn, $sql);
                                                                    while ($row = mysqli_fetch_array($result))
                                                                        {
                                                                            echo '<option value="'.$row['instituteName'].'">'.$row['instituteName'].'</option>';
                                                                        }
                                                    echo    '</select>
                                                        </div>
                                                    </div>';


                                                                           
                                        echo   '<div class="row form-group">
                                                    <div class="col col-md-3"><label class=" form-control-label">Class Name</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="className" class="form-control">
                                                                <option value="'.$rows['class_type'].'">'.$rows['class_type'].' </option>';
                                                                    $sql = "SELECT * FROM class";
                                                                    $result = mysqli_query($conn, $sql);
                                                                    while ($row = mysqli_fetch_array($result))
                                                                        {
                                                                            echo '<option value="'.$row['class_type'].'">'.$row['class_type'].'</option>';
                                                                        }
                                                    echo   '</select>
                                                        </div>
                                                    </div>';

                                        echo   '<div class="row form-group">
                                                    <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Exam Type</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="examType" class="form-control">
                                                                <option value="'.$rows['exam_type'].'">'.$rows['exam_type'].' </option>
                                                                <option value="1st Semester">1st Semester</option>
                                                                <option value="2nd Semester">2nd Semester</option>
                                                                <option value="3rd Semester">3rd Semester</option>
                                                                <option value="4th Semester">4th Semester</option>
                                                                <option value="5th Semester">5th Semester</option>
                                                                <option value="6th Semester">6th Semester</option>
                                                                <option value="Practical Exam">Practical Exam</option>
                                                                <option value="Unit Test">Unit Test</option>
                                                                <option value="Unit Test">Half Yearly Exam</option>
                                                                <option value="Annual Exam">Annual Exam</option>
                                                            </select>
                                                        </div>
                                                    </div>';


                                        echo   '<div class="row form-group">
                                                    <div class="col col-md-3"><label class=" form-control-label">Subject Name</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="subjectName" class="form-control">
                                                                <option value="'.$rows['subject_type'].'">'.$rows['subject_type'].' </option>';
                                                                    $sql = "SELECT * FROM subject";
                                                                    $result = mysqli_query($conn, $sql);
                                                                    while ($row = mysqli_fetch_array($result))
                                                                        {
                                                                            echo '<option value="'.$row['subjectName'].'">'.$row['subjectName'].'</option>';
                                                                        }
                                                    echo   '</select>
                                                        </div>
                                                    </div>';



                                        echo   '<div class="row form-group">
                                                    <div class="col col-md-3"><label class=" form-control-label">Full Mark </label></div>
                                                        <div class="col-12 col-md-9">
                                                            <input type="text" name="fullMark" class="form-control" value="'.$rows['full_mark'].'" >
                                                        </div>
                                                    </div>';


                                        echo   '<div class="row form-group">
                                                    <div class="col col-md-3"><label class=" form-control-label">Obtained Mark</label></div>
                                                        <div class="col-12 col-md-9"><input type="text" name="securedMark" class="form-control" value="'.$rows['secured_mark'].'">
                                                        </div>
                                                    </div>';


                                        echo   '<div class="row form-group">
                                                    <div class="col col-md-3"><label class=" form-control-label">Result</label></div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="StudentResult" class="form-control">
                                                                <option value="'.$rows['result'].'">'.$rows['result'].' </option>
                                                                <option value="PASS">PASS</option>
                                                                <option value="FAIL">FAIL</option>
                                                                <option value="BACK">BACK</option>
                                                            </select>
                                                        </div>
                                                    </div>';
  
                                        echo   '<hr>
                                                    <div class="text-right">
                                                        <button type="submit" name="submit" class="btn-lg btn-success btn-sm" style="cursor: pointer"">
                                                                    Update Data
                                                        </button>
                                                    </div>       
                                            </form>
                                        </div>    
                                    </div>            
                                </div>
                            </div>';
        include('footer.php');
    }
?>