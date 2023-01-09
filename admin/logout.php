<?php
include 'if_admin.php';
if (!$admin) {
header("location:./"); // not admin redirect to home page 
}
else // if admin destroy the session logouted and redirected to homepage 
{
session_start();  
session_unset();
session_destroy();
header("location:./");
}
?>