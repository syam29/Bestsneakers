<?php
NAMESPACE project;
session_start();
require('customeraction.php');
$log=$_SESSION['log_id'];
$cart= new viewcart;
if(isset($_REQUEST['product_id'])){
    $pid=$_REQUEST['product_id'];
    $cart->removeCart($pid);
}
$result=$cart->view($log);
$num=mysqli_num_rows($result);
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
    <title>cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="cart.css" rel="stylesheet">
</head>
<body>
<div class="card">
    <div class="row">
        <div class="col cart">
            <div class="title">
                <div class="row bg-dark " style="color:white; height:100px"">
                    <div class="col p-4">
                        <h2><b><?php echo $lang['34']; ?></b></h2>
                    </div>
                    <div class="col align-self-center text-right text-muted p-5"><?php echo $num;  echo $lang['35']; ?></div>
                    <div class="col align-self-center text-right text-muted p-5"> 
                      <a href='home.php?val=<?php echo $value;?>' style='text-decoration:none; color:white'><?php echo $lang['32']; ?></a> 
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
                                    <div class='col-4'>&#8377;".htmlspecialchars($row2['product_price'])."</div>
                                    <div class='col-2'>
                                        <div class=p-1><a href='order.php?pid=".htmlspecialchars($row['product_id'])."' class='btn btn-warning' style='width:120px'>".htmlspecialchars($lang['12'])."</a> </div>
                                        <div class=p-1> <a href='cart.php?product_id=".htmlspecialchars($row['product_id'])."' class='btn btn-dark' style='width:120px'>".htmlspecialchars($lang['36'])."</a> </div>
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