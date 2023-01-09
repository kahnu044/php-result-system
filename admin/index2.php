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
    <title>Kanha Result System</title>';

include('header_meta.php');
echo '</head>
<body>';
include('left_panel.php');
include('right_panel.php');
?>
<!-- show breadcrumbs -->
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


<!-- main content start here  -->
 






<!-- end content here by kanha -->


<?php

include('footer.php');
}
?>
