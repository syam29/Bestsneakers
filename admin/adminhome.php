<?php
NAMESPACE project;
require('../config/config.php');
if(isset($_REQUEST['flag']) && $_REQUEST['flag']=='signout'){
    header('location:http://localhost/syam/Project/index.php');
}
?>
<html lang="en">
<head>
    <title>Detailsdisplay</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="admin.css" rel="stylesheet">
</head>
<body >
    <div class="container h-100"> 
        <div class="card text-dark">
            <div class="card-body p-md-5">
                <div class="row justify-content-center">
                    <div class="col-md-10 col-lg-10 col-xl-10 ">
                        <div class=row>
                            <div class="col-10"> <center> <h1>  WELCOME TO ADMIN PAGE</h1></center></div>
                            <div class="col-2 "> 
                                <a href="http://localhost/syam/Project/admin/adminhome.php?flag=signout">
                                    <button type="button" class="btn btn-primary" style="width:100px"> sign out</button> 
                                </a>
                            </div>
                        </div>

                        <br><br>

                        <div class="row container-fluid">
                            <div class= "col-6 row-10" id=div1 style="height:200px">
                                <a href="customerdetails.php" ><div class=cen><h2>CUSTOMER DETAILS<h2></div></a>                     
                            </div> 

                            <div class= "col-6 row-10" id=div2>
                                <a href="orderdetail.php" ><div class=cen><h2>ORDER DETAILS</h2></div></a>
                            </div>
                        </div>

                        <div class="row container-fluid">
                            <div class= "col-6 row-10" id=div1>
                                <a href="insertproduct.php"><div class=cen><h2>PRODUCT DETAILS</h2></div></a>
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