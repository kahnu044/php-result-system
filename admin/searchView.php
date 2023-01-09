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
    <title>View Result : Kanha Result System</title>
    <style type="text/css">
    .ifsc-result{margin-top: 20px;}
    .ifsc-result tr th{padding-left: 10px; width: 120px;}
</style>';

//done 17-12-2020 by Kanha
include 'config.php';
include 'header_meta.php';
echo '</head>
<body>';
include 'left_panel.php';
include 'right_panel.php';
?>
<!-- show breadcrumbs -->
        <div class="breadcrumbs">
            <div class="col-sm-8">
                <div class="page-header float-left">
                    <div class="page-title">
                        <ol class="breadcrumb text-left">
                            <li><a href="./">Dashboard</a></li>
                            <li><a onclick="goBack()" style="cursor: pointer;">Back</a></li>
                            <li class="active">View Result</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
<!-- alert message start -->
<?php
$student_id = $_GET['id'];
$sql = "SELECT * FROM student_info WHERE id= '$student_id' ";
$result = mysqli_query($conn, $sql);
$CheckRollNo = mysqli_num_rows($result);
$row= mysqli_fetch_array($result);
 
echo '  <div class="container">
            <div class="ifsc-result" style="border:1px solid #726d6f;background-color:#fff;">
                <div style="text-align:center;color:#000;font-weight:bold;font-size: 20px">'.$row["institute_name"].'</div>
                    <div style="text-align:center;color:#000;font-weight:bold;font-size: 20px">'. $row["class_type"] .' '. $row["exam_type"] .'</div>
                        <hr>
                            <table style=" width: 100%">
                                <tbody style="border:none">
                                    <tr><th style="font-weight:bold;color:#676769">Name</th> <td style="color:red;font-size:18px;">:<b> '. $row["student_name"] .' </b></td></tr><br>

                                    <tr><th style="font-weight:bold;color:#676769;"><br>Roll Number</th><td style="color:red;font-size:18px;"><br>:<b> '. $row["student_rollno"] .'</b></td></tr>

                                    <tr><th style="font-weight:bold;color:#676769;"><br>Class </th><td style="font-size:14px;"><br><b>: '. $row["class_type"] .'</b></td></tr>

                                    <tr><th style="font-weight:bold;color:#676769;"><br>Exam Type</th><td style="font-size:14px;"><br><b>: '. $row["exam_type"] .'</b></td></tr>

                                    <tr><th style="font-weight:bold;color:#676769;"><br>Full Mark</th><td style="font-size:14px;"><br><b>: '. $row["full_mark"] .'</b></td></tr>

                                    <tr><th style="font-weight:bold;color:#676769;"><br>Obtained Mark</th><td style="font-size:14px;"><br><b>: '. $row["secured_mark"] .'</b></td></tr>

                                    <tr><th style="font-weight:bold;color:#676769;"><br>Result</th><td style="font-size:14px;"><br><b>: '. $row["result"] .'</b></td></tr>
                                </tbody> 
                            </table>
                        <br>
                    </div> 
                </div>
            <br>';
    include('footer.php');
}
?>