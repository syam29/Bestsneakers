<?php
NAMESPACE project;
require('adminaction.php');
$action =  new getCustomerlist;
$log=$_REQUEST['userid'];
$res=$action->block($log);
if($res==1){
    header("location:customerdetails.php");
}
 
?>