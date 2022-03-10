<?php
NAMESPACE project;
require('adminaction.php');
if(isset($_REQUEST['msg'])){
    $order_id=$_REQUEST['msg'];
    $ord=new admin_order;
    $ord->remove_order($order_id);
}
if(isset($_REQUEST['flag'])){
    $order_id=$_REQUEST['flag'];
    $ord=new admin_order;
    if(isset($_POST['submit'])){
        $stat=$_POST['status'];
        $ord->update($order_id,$stat);
    }
    
}
$customer= new  getCustomerlist;
$order= new admin_order;
$result=$order->orderdeatils();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>order details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="" rel="stylesheet">
  <style>
    img{
       width:400px;
       height:400px;s
    }
    </style>
</head>
<body>
<div class="card">
    <div class="row">
        <div class="col cart">
            <div class="title">
                <div class="row bg-dark " style="color:white; height:100px" >
                    <div class="col p-4">
                        <h1><b>All orders</b></h1>
                    </div>
                    <div class="col p-5 text-right text-muted"> 
                      <a href='adminhome.php' style="text-decoration:none; color:white" > Back to admin </a> 
                    </div>
                </div>
            </div>
            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <?php
                        while($row=mysqli_fetch_array($result))
                        {
                            echo "<br>";
                            $pid= $row['product_id'];
                            $log_id=$row['login_id'];
                            $res= $customer->getsingledataa($log_id);
                            $row1=mysqli_fetch_array($res);
                            $order_id=$row['order_id'];
                            $status=$row['order_status'];
                            if($status==1){
                                $stat="Order placed";
                            }
                            else if($status==2)
                            {
                                $stat="order canceld";
                            }
                            else if($status==3){
                               $stat="order deliverd"; 
                            }
                            else if($status==4){
                                $stat="Order on processing";
                            }
                            $product= new admin_order;
                            $res= $product->getproduct($pid);
                            $row2 = mysqli_fetch_array($res);
                            echo   "<div class='col-3'><img class='img-fluid' src='../product_img/".htmlspecialchars($row2['product_image'])."'></div>
                                    <div class=col-2>
                                        <h6> Name :".htmlspecialchars($row1['name'])."</h6>
                                        <h6> Email:".htmlspecialchars($row1['email'])."</h6>
                                    </div>
                                    <div class='col-3'>
                                        <div class='row text-muted'> ".htmlspecialchars($row2['name'])."</div>
                                        <div class='row'> ".htmlspecialchars($row2['description'])."</div>
                                    </div>
                                    <div class='col-2'>&#8377;".htmlspecialchars($row2['product_price'])."</div>
                                    <div class='col-2'>
                                            <div class=p-1>
                                            <div > Order Status: $stat</div><br>
                                                <form method=post action='orderdetail.php?flag=$order_id'>
                                                    <select class='form-control' name=status >
                                                        <option>select order status</option>
                                                        <option value=1>order placed</option>
                                                        <option value=2>order canceled</option>
                                                        <option value=3>order deliverd</option>
                                                        <option value=4>order processing</option>
                                                    </select>
                                                    <button class=btn-dark type=submit name=submit >confirm</submit>
                                                </form>
                                            </div>
                                            <a href=pdfinvoice.php?order_id=$order_id  class='btn btn-danger'>CREATE INVOICE</a>
                                        <div class=p-1> <a href=orderdetail.php?msg=$order_id  style='width:120px;text-decoration:none; '> Delete order </a> </div>
                                    </div>";
                        }
                ?>
                </div>
            </div>
            
        </div>
    </div>
</div>  

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>  

</body>
</html>