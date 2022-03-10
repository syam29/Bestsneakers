<?php
NAMESPACE project;
session_start();
require('customeraction.php');
$pid=$_SESSION['product_id'];
$qty=$_POST['quantity'];
$log_id=$_SESSION['log_id'];
$odr=new order;
$res=$odr->confirm_order($pid,$log_id,$qty);
if($res==1){ 
    header('location:home.php?sucess=1');
}
?>
