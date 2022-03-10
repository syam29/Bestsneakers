<?php
NAMESPACE project;
session_start();
require('../config/config.php');
class cart extends Connection{
    public function addtocart($log_id,$pid){
        $sql="INSERT INTO `cart_detail` (`cart_id`, `product_id`, `login_id`) VALUES (NULL,'$pid','$log_id')";
        $res =mysqli_query($this->conn, $sql);         
        if($res==true){
            return 1;
        }
    }
}
if($_SESSION['lang']==1 ||$_SESSION['lang']==""){   
    $value=1;
}
else if($_SESSION['lang']==2){  
    $value=2;
}
$pid=$_REQUEST['pid'];
 $log_id=$_SESSION['log_id'];
 $crt= new cart;
 $result=$crt->addtocart($log_id,$pid);
 if($result==1){
    header("location:home.php?val= $value");
 }
?>