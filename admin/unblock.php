<?php
namespace project;
require('adminaction.php');
$action =  new getCustomerlist;
$log=$_REQUEST['userid'];
$res=$action->unblock($log);
if($res==1){
    header("location:customerdetails.php");
}
 
?>