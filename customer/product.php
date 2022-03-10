<?php
NAMESPACE project;
require('customeraction.php');
session_start();
$login=$_SESSION['log_id'];
$id=$_REQUEST['pid'];
$product = new productdetail;
$obj= new changelang;
if($_SESSION['lang']==1 ||$_SESSION['lang']==""){
    $lang=$obj->eng();
    $res=$product->getSingledataEnglish($id);
    $value=1;
}
else if($_SESSION['lang']==2){
    $lang=$obj->ger();
    $res=$product->getSingledataGerman($id);
    $value=2;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>product detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href=".css" rel="stylesheet">
    <style>
        body{
           background-image: url("../image/sneakers.jpg"); 
        }
        img{
            width:500px;
            height:480px;
             
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><?php echo $lang['2']; ?></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <?php echo " <a class='nav-link active' aria-current='page' href='home.php?val=$value'>".htmlspecialchars($lang['3'])."</a>" ;?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="customerdetails.php"><?php echo $lang['18']; ?></a>
                    </li>
                     
                </ul>
                
            </div>
        </div>
    </nav>
    <div class='row justify-content-center p-5'>
        <?php 
        $row=mysqli_fetch_array($res);
        $_SESSION['product_id']=$row['product_id'];
        echo "   <div class='col-4'style='margin-top:10px;background-color:#eee'>
                    <div class=card-img-left>
                        <img src='../product_img/".htmlspecialchars($row['product_image'])."'>
                    </div>
                </div>
                <div class='col-4'style='margin-top:10px; background-color:#eee'>
                    <div class='card-body'  >  
                        <h1 class='card-title' style='color:red'>".htmlspecialchars($row['name'])."</h1>  
                        <p class='card-text'><h3 style='color:black;font-family:serif;'>".htmlspecialchars($row['description'])."</h3></p>   
                        <p class='card-text'><h3>".htmlspecialchars($row['product_brand'])."</h3></p> 
                        <p class='card-heading'><h3>".htmlspecialchars($lang['14'])." : &#8377;" .htmlspecialchars($row['product_price'])." RS</h3></p>
                        <p class='card-heading'><h4>".htmlspecialchars($lang['20'])." : " .htmlspecialchars($row['product_quantity'])."</h4></p>
                        <form method=post action='order.php' >
                         <h4>Quantity:<input type=int name=quantity style='width:50px'/></h4> 
                        <button type=submit class='btn btn-warning'>".htmlspecialchars($lang['12'])."</button> 
                        </form><br>
                        <a href=addtocart.php?pid=".htmlspecialchars($row['product_id'])." class='btn btn-dark'>".htmlspecialchars($lang['19'])."</a>  
                    </div>       
                </div>";
        ?>
    </div> 
    
    

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>  

</body>
</html>