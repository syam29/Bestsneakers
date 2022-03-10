<?php
namespace project;
require('adminaction.php');
require('../vendor/autoload.php');
$order= new admin_order;
$oid=$_REQUEST['order_id'];
$result= $order->orderSingledata($oid);
$row=mysqli_fetch_array($result);
$product= new admin_order;
$result1=$product->getproduct($row['product_id']);
$row2=mysqli_fetch_array($result1);
$total= $row['order_quantity'] * $row2['product_price'];
$html='<h5>Best sneakers<br>
           South delhi<br>
           652412<br>
           9544212895<br>
           bestsneakers14@gamil.com</h5><br><br>
        <h2>Best Sneakers pvt.ltd</h2>
        <br><br>
        <h4>Product name = '.htmlspecialchars($row2['name']).'</h4>
        <h4>Product Brand = '.htmlspecialchars($row2['product_brand']).'</h4>
        <h4>Product Price = '.htmlspecialchars($row2['product_price']).'</h4>
        <h4>Product Qunatity = '.htmlspecialchars($row['order_quantity']).'</h4>
        <h4>Order date = '.htmlspecialchars($row['order_date']).'</h4><br><hr>
        <h4> Total amount = '.$total.'RS only</h4><br>
        <br><h6>KindlyBest sneakers</h6><br>';
$mpdf= new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file='../invoicepdf/'.time().'.pdf';
$filename=time();
$mpdf->output($file,'F');
$insert= new invoice;
$res=$insert-> insertInvoice($oid,$filename);
if($res==1){
    header("location:orderdetail.php");
}
?>