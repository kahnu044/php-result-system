<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width">
<title>Result View - Kanha Result Sytem</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
<style type="text/css">
    .ifsc-result{margin-top: 20px;}
    .ifsc-result tr th{padding-left: 10px; width: 120px;}
</style>
</head>
<body>

<?php
//DONE 17-12-2020 By Kanha
include 'config.php';
$student_id = $_POST['id'];
$sql = "SELECT * FROM student_info WHERE id= '$student_id' ";
$result = mysqli_query($conn, $sql);
$CheckRollNo = mysqli_num_rows($result);
$row= mysqli_fetch_array($result);
echo '  <div class="container">
            <div class="ifsc-result" style="border:1px solid #726d6f;background-color:#f3f9f2;">
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
 include 'counter.php';           
?>
<center>
    <input type="button" onclick="window.print()" value="Print">
</center>
</body>
</html>