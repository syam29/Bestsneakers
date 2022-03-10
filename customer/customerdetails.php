<?php
NAMESPACE project;
session_start();
require('customeraction.php');
$login=$_SESSION['log_id'];
$customer = new getCustomerdetail;
$res=$customer->getlist($login);
$row= mysqli_fetch_array($res);
if(isset($_REQUEST['msg'])){
     echo "<h2>".$_REQUEST['msg']."</h2>";
}

$_SESSION['name']        =$row['name'];
$_SESSION['email']       =$row['email'];
$_SESSION['address']     =$row['address'];
$_SESSION['phone_no']    =$row['phone_no'];
$_SESSION['pincode']     =$row['pincode'];
$_SESSION['nationality'] =$row['nationality'];
$_SESSION['state']       =$row['state'];
$_SESSION['city']        =$row['city'];

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
    <title>Detailsdisplay</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="customer.css" rel="stylesheet">
</head>
<body >
<div class="container h-100"> 
    <div class="card text-dark">
        <div class="card-body p-md-5">
           <div class="row justify-content-center">
               <div class="col-md-10 col-lg-10 col-xl-10 ">
               <div class=row>
                <h2><?php echo $lang['21']; ?></h2>
              </div>
              <div class=box >
               <div class="row mt-md-4" p-5>
                    <div class="col "><?php echo $lang['22']; ?></div>
                    <div class="col "> <?php echo  $row['reg_id'] ;?></div>
                </div>
              <div class="row mt-md-4" p-5>
                   <div class="col  d-flex"><?php echo $lang['23']; ?></div>
                   <div class="col  d-flex"> <?php echo  $row['name']  ;?></div>
              </div>
              <div class="row  mt-md-4" p-5>
                   <div class="col  "><?php echo $lang['2']; ?></div>
                   <div class="col  "> <?php echo  $row['email']  ;?></div>
              </div>
                
              <div class="row mt-md-4" p-5>
                   <div class="col  "><?php echo $lang['24']; ?></div>
                   <div class="col  "> <?php echo  $row['address']  ;?></div>
              </div> 
              <div class="row mt-md-4" p-5>
                   <div class="col  "><?php echo $lang['25']; ?></div>
                   <div class="col  "> <?php echo  $row['phone_no']  ;?></div>
              </div> 
              <div class="row mt-md-4" p-5>
                   <div class="col  "><?php echo $lang['26']; ?></div>
                   <div class="col  "> <?php echo  $row['pincode']  ;?></div>
              </div>
              <div class="row mt-md-4" p-5>
                   <div class="col  "><?php echo $lang['27']; ?></div>
                   <div class="col  "> <?php echo  $row['nationality']  ;?></div>
              </div>
              <div class="row mt-md-4" p-5>
                   <div class="col  "><?php echo $lang['28']; ?></div>
                   <div class="col  "> <?php echo  $row['state']  ;?></div>
              </div>
              <div class="row mt-md-4" p-5>
                   <div class="col  "><?php echo $lang['29']; ?></div>
                   <div class="col  "> <?php echo  $row['city']  ;?></div>
              </div>
              
              
              <div class="row mt-md-4" p-5>
                   <div class="col-4 "> <a href="edit.php"><button type="button" class="btn btn-warning" style="width:100px"><?php echo $lang['30']; ?></button></a></div>
                   <div class="col-4 "> <a href="passwordchange.php"><button type="button" class="btn btn-dark"  ><?php echo $lang['31']; ?></button></a></div>
                  <?php echo " <div class='col-4 '> <a href='home.php?val=$value'><button type='button' class='btn btn-primary' >".htmlspecialchars($lang['32'])."</button></a></div>"; ?>
              </div>
             </div>
       
               </div>
            </div>
        </div>
    </div>
</div>
 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>  

</body>
</html>