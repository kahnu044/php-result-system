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
    <title>Add New Student : Kanha Result System</title>';

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
                            <li><a href="./">Dashboard</a></li>
                            <li class="active">Add Student</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

<?php
if (isset($_POST['submit'])) 
{
  $rollNo = $_POST['rollNo'];
  $name = $_POST['studentName'];

  $institute = $_POST['instituteName'];
  $class = $_POST['className'];

  $examType = $_POST['examType'];
  $subjectType = $_POST['subjectName'];

  $fullMark = $_POST['fullMark'];
  $securedMark = $_POST['securedMark'];

  $StudentResult = $_POST['StudentResult'];

  $sql = "SELECT * FROM student_info WHERE student_rollno= '$rollNo' AND exam_type = '$examType' ";
  $result = mysqli_query($conn, $sql);
  $check = mysqli_num_rows($result);

  if ($check>=1) {
     echo ' <div class="content mt-3">
            <div class="col-sm-12">
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    <strong>Sorry!</strong> This Student Is Already Exist.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>';
  }
  else
  {
  $sql = "INSERT INTO student_info 
  (institute_name,student_name,student_rollno,class_type,exam_type,subject_type,full_mark,secured_mark,result) VALUES ('$institute','$name','$rollNo','$class','$examType','$subjectType','$fullMark','$securedMark','$StudentResult')";
  $result = mysqli_query($conn, $sql);
  echo ' <div class="content mt-3">
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    New Student Added <strong>Successfully</strong>.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>';
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
                                Add <strong>New Student</strong>
                            </div>
                        <div class="card-body card-block">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">

                                <div class="row form-group">
                                    <div class="col col-md-3">
                                    	<label class=" form-control-label">Roll Number </label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="rollNo" placeholder="Enter Roll Number" class="form-control" required="">
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-3">
                                    	<label class=" form-control-label">Student Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                    	<input type="text" name="studentName" placeholder="Enter Student Name" class="form-control" required="">
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-3">
                                    	<label class=" form-control-label">Institute Name</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="instituteName" class="form-control">
                                            <option value="0">Select Institute Name</option>
                                                <?php
                                                    $sql = "SELECT * FROM institute";
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($result))
                                                        {
                                                            echo '<option value="'.$row['instituteName'].'">'.$row['instituteName'].'</option>';
                                                        }
                                                 ?>
										</select>
                                    </div>
                                </div>


								<div class="row form-group">
                                    <div class="col col-md-3">
                                    	<label class=" form-control-label">Class</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="className" class="form-control">
                                            <option value="0">Select Clsss</option>
                                                <?php
                                                    $sql = "SELECT * FROM class";
                                                    $result = mysqli_query($conn, $sql);
                                                    while ($row = mysqli_fetch_array($result))
                                                        {
                                                            echo '<option value="'.$row['class_type'].'">'.$row['class_type'].'</option>';
                                                        }
                                                ?>
										</select>
                                    </div>
                                </div>

								<div class="row form-group">
                                    <div class="col col-md-3">
                                        <label for="disabled-input" class=" form-control-label">Exam Type</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="examType" class="form-control">
                                            <option value="0">Select Exam Type</option>
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
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-3">
                                    	<label class=" form-control-label">Subject</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="subjectName" class="form-control">
                                                <option value="0">Select Subject</option>
                                                    <?php
                                                        $sql = "SELECT * FROM subject";
                                                        $result = mysqli_query($conn, $sql);
                                                        while ($row = mysqli_fetch_array($result))
                                                            {
                                                                echo '<option value="'.$row['subjectName'].'">'.$row['subjectName'].'</option>';
                                                            }
                                                    ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-3">
                                    	<label class=" form-control-label">Full Mark </label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" name="fullMark" placeholder="Enter Full Mark" class="form-control" required="">
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-3">
                                    	<label class=" form-control-label">Obtained Mark</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                    	<input type="text" name="securedMark" placeholder="Enter Obtained Mark" class="form-control" required="">
                                    </div>
                                </div>


                                <div class="row form-group">
                                    <div class="col col-md-3">
                                    	<label class=" form-control-label">Result</label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <select name="StudentResult" class="form-control">
                                            <option value="0">Select Result</option>
                                            <option value="PASS">PASS</option>
                                            <option value="FAIL">FAIL</option>
                                            <option value="BACK">BACK</option>
                                        </select>
									</div>
                                </div>
         

								<hr>
                                <div class="text-right">
                                    <button type="submit" name="submit" class="btn btn-primary btn-sm">
                                        Add Student
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-sm">
                                        <i class="fa fa-ban"></i> 
                                        	Reset
                                    </button>
                                </div>                              
                            </form>
                        </div>
                    </div>            
                </div>
            </div>
<?php
include('footer.php');
}
?>