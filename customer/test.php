<?php
session_start();
$_SESSION['log_id']=$_REQUEST['msg'];
header('location:home.php');
?>