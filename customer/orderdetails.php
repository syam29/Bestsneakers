<?php
NAMESPACE project;
session_start();
require('customeraction.php');
if(isset($_REQUEST['flag'])){
    $order_id=$_REQUEST['flag'];
    $ord=new order;
    $ord->remove($order_id);
}
$log=$_SESSION['log_id'];
$order= new order;
$result=$order->get_order($log);
$obj= new changelang;
if($_SESSION['lang']==1 ||$_SESSION['lang']==""){
    $lang=$obj->eng();
    $value=1;
}
else if($_SESSION['lang']==2){
    $lang=$obj->ger();
    $value=2;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>order details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="cart.css" rel="stylesheet">
</head>
<body>
<div class="card">
    <div class="row">
        <div class="col cart">
            <div class="title">
                <div class="row bg-dark " style="color:white; height:100px" >
                    <div class="col p-4">
                        <h1><b><?php echo $lang['37'] ;?></b></h1>
                    </div>
                    <div class="col p-5 text-right text-muted"> 
                      <a href='home.php?val=<?php echo $value ;?>' style="text-decoration:none; color:white" ><?php echo $lang['32'] ;?></a> 
                    </div>
                </div>
            </div>
            <div class="row border-top border-bottom">
                <div class="row main align-items-center">
                    <?php
                        while($row=mysqli_fetch_array($result))
                        {
                            $pid= $row['product_id'];
                            $order_id=$row['order_id'];
                            $status=$row['order_status'];
                            if($status==1){
                                $stat= $lang['38'] ;
                            }
                            else if($status==2)
                            {
                                $stat= $lang['39'] ;
                            }
                            else if($status==3){
                               $stat= $lang['41']; 
                            }
                            else if($status==4){
                                $stat= $lang['42'];
                            }
                            $invoice= new order;
                            $result1=$invoice->invoice($order_id);
                            $row1=mysqli_fetch_array($result1);
                            if(isset($row1['invoide_name'])){
                               $file=$row1['invoide_name'].'.pdf';
                            }
                            $product= new productdetail;
                            if($_SESSION['lang']==2){
                                $res= $product->getSingledataGerman($pid);
                              }
                              else if($_SESSION['lang']==1 || $_SESSION['lang']=="" ){
                                  $res= $product->getSingledataEnglish($pid);
                              }
                            $row2 = mysqli_fetch_array($res);
                            echo   "<div class='col-2'><img class='img-fluid' src='../product_img/".htmlspecialchars($row2['product_image'])."'></div>
                                    <div class='col-4'>
                                        <div class='row text-muted'>".htmlspecialchars($row2['name'])."</div>  
                                        <div class='row'>".htmlspecialchars($row2['description'])."</div>
                                    </div>
                                    <div class='col-4'>&#8377;".htmlspecialchars($row2['product_price'])." <br><h6> quantity: ".htmlspecialchars($row['order_quantity'])."</h6></div>
                                    <div class='col-2'>
                                        <div class=p-1>$stat</div>
                                        <div class=p-1> <a href=orderdetails.php?flag=$order_id  style='width:120px;text-decoration:none; '> ".htmlspecialchars($lang['40'])."</a> </div>";
                                        if(isset($row1['invoide_name'])){
                                       echo " <div class=p-1> <a href='../invoicepdf/$file' class='btn btn-danger'  style='width:120px;text-decoration:none; '> Download invoice</a> </div>";
                                        }
                           echo"         </div>";
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