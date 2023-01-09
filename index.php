<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width">
<title>Search Result Here - Kanha Result Sytem</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
<style type="text/css">
  @media only screen and (min-width: 900px) {
  #mobileView {
    width: 30%;
  }
}
 @media only screen and (max-width: 600px) {
  #mobileView {
  width: 90%;
  }
}
</style>
</head>
<body>
<form action="" method="post">
    <div class="panel panel-info center-block" > 
      <div id ="mobileView" class="container text-center" style="border : 1px solid gray; margin-top: 40px">
        <div class="panel-heading">
          <h3 class="panel-title text-center"> Enter Your Roll Number To Get Your Result</h3>
        </div>
      <div class="panel-body">
        <table class="table table-striped table-hover" >
          <tbody>
            <tr>
              <td>Roll no :</td>
              <td>
                <input type="text" name="rollno" class="form-control" placeholder="Enter Roll No" required="">
                  <br>
                <input type="submit" class="btn btn-success" value="Find Result" name="submit" style="margin-right:30%">
              </td>
            </tr>
        </table>
      </form>
    </div>
  </div>
<br>
<?php
//done 17-12-2020 by Kanha
include 'config.php';
if(isset($_POST['submit']))
{
  $rollno = $_POST['rollno'];
  $sql = "SELECT * FROM student_info WHERE student_rollno= '$rollno' ";
  $result = mysqli_query($conn, $sql);
  $CheckRollNo = mysqli_num_rows($result);
  $row= mysqli_fetch_array($result);
  $student_name = $row['student_name'];
echo '<div class="container text-center">
        <h4 class="text-primary">'.$student_name.'</h4>
      </div>';
if ($CheckRollNo) {
echo '<div class="container">
        <table class="table table-bordered ">
          <thead>
            <tr>
              <th scope="col">S.N</th>
              <th scope="col">Class</th>  
              <th scope="col">Exam Type</th>
              <th scope="col">Subject</th>  
              <th scope="col">See Result</th>                
            </tr>
          </thead>
        <tbody>';
      //used to show data1,2,3......
$i = 1;
$result = mysqli_query($conn, $sql);
while($row= mysqli_fetch_array($result)){
echo   '<tr>
          <td scope="row">'.$i.'</td>
          <td scope="row">'.$row['class_type'].'</td>
          <td scope="row">'.$row['exam_type'].'</td>
          <td scope="row">'.$row['subject_type'].'</td>
          <td scope="row">
            <form action="resultView.php" method="post">
              <input type="hidden" name="id" value="'.$row['id'].'">
              <button type="submit" class="btn btn-success">View Result</button>
            </form>
          </td>
        </tr>';
$i= $i+1;    
  }            
echo  ' </tbody>   
      </table>
    </div>';
  }
  else
  {
echo'<div class="container text-center">
        <h4 class="text-warning" >Sorry! No Record Found</h4>
      </div>';
  }
}
include 'counter.php';
?>
</body>
</html>