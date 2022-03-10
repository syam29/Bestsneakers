<?php
NAMESPACE project;
require('adminaction.php');
$action =  new getCustomerlist;
$log=$_REQUEST['userid'];
$res2=$action->getsingledata($log);
$row2= mysqli_fetch_assoc($res2);
 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Preferd customer data</title>
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
                <h2> DETAILS OF THE SELECTED CUSTOMER</h2>
              </div>
              <div class=box >
               <div class="row mt-md-4" p-5>
                    <div class="col ">Registration Id</div>
                    <div class="col "> <?php echo  $row2['reg_id'] ;?></div>
                </div>
              <div class="row mt-md-4" p-5>
                   <div class="col  d-flex">Name</div>
                   <div class="col  d-flex"> <?php echo  $row2['name']  ;?></div>
              </div>
              <div class="row  mt-md-4" p-5>
                   <div class="col  ">Email </div>
                   <div class="col  "> <?php echo  $row2['email']  ;?></div>
              </div>
              <div class="row mt-md-4" p-5>
                   <div class="col ">Phone</div>
                   <div class="col "> <?php echo  $row2['phone_no']  ;?></div>
              </div>  
              <div class="row mt-md-4" p-5>
                   <div class="col  ">Address </div>
                   <div class="col  "> <?php echo  $row2['address']  ;?></div>
              </div> 
              <div class="row mt-md-4" p-5>
                   <div class="col  ">State</div>
                   <div class="col  "> <?php echo  $row2['state']  ;?></div>
              </div> 
              <div class="row mt-md-4" p-5>
                   <div class="col  ">Pincode </div>
                   <div class="col  "> <?php echo  $row2['pincode']  ;?></div>
              </div>
              <div class="row mt-md-4" p-5>
                   <div class="col  ">Nationality </div>
                   <div class="col  "> <?php echo  $row2['nationality']  ;?></div>
              </div>
              <div class="row mt-md-4" p-5>
                   <div class="col  ">City</div>
                   <div class="col  "> <?php echo  $row2['city']  ;?></div>
              </div>
              <div class="row mt-md-4" p-5>
                   <div class="col  ">Status</div>
                   <div class="col  "> <?php echo  $row2['status']  ;?></div>
              </div>
              
              <div class="row mt-md-4" p-5>
                   <div class="col-6 "> <a href="customerdetails.php"><button type="button" class="btn btn-primary" style="width:100px">Back </button> </a></div>
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