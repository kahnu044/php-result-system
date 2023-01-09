<?php
include 'if_admin.php';
if (!$admin) {
header("location:./");
}
else
{



include 'config.php';

//find user referer link added(18-12-2020) 
if(isset($_SERVER['HTTP_REFERER'])) 
{
  $user_referer_link = $_SERVER['HTTP_REFERER'];
}

//delete student 
$id = $_GET['id'];
$delete = mysqli_query($conn,"DELETE FROM student_info WHERE id=$id");
mysqli_query($conn,"ALTER TABLE student_info AUTO_INCREMENT = $id");
if ($delete) 
{
  mysqli_close($conn);
  header("location:$user_referer_link");
  exit;
}
else
{
  echo "Error Deleting Record";
}


//delete institute 
$ins_id = $_GET['ins_id'];
$delete = mysqli_query($conn,"DELETE FROM institute WHERE ins_id=$ins_id");
mysqli_query($conn,"ALTER TABLE institute AUTO_INCREMENT = $ins_id");
if ($delete) 
{
  mysqli_close($conn);
  header("location:$user_referer_link");
  exit;
}
else
{
  echo "Error Deleting Record";
}


//delete subject 
$sid = $_GET['sid'];
$delete = mysqli_query($conn,"DELETE FROM subject WHERE sid=$sid");
mysqli_query($conn,"ALTER TABLE subject AUTO_INCREMENT = $sid");
if ($delete) 
{
  mysqli_close($conn);
  header("location:$user_referer_link");
  exit;
}
else
{
  echo "Error Deleting Record";
}



//delete class 
$cid = $_GET['cid'];
$delete = mysqli_query($conn,"DELETE FROM class WHERE cid=$cid"); 
mysqli_query($conn,"ALTER TABLE class AUTO_INCREMENT = $cid");
if ($delete) 
{
  mysqli_close($conn);
  header("location:$user_referer_link");
  exit;
}
else
{
  echo "Error Deleting Record";
}

}
?>