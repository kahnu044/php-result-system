<?php
//this page created by kanha @01-09-2020(08:07am) all are set(08:46am)
error_reporting(0); //remove all the error
session_start(); //start the session
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) { //check you are logged in or not
	$admin = false; //set admin to true
}
else
{
	$admin = true;
}
?>