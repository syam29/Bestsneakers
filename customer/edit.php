<?php
NAMESPACE project;
require('customeraction.php');
session_start();
if(isset($_POST['Update'])){
$update= new updatedetail;
$update->update($_POST['name'],$_POST['email'],$_POST['address'],$_POST['phone'],$_POST['pincode'],$_POST['nationality'],$_POST['state'],$_POST['city'],$_SESSION['log_id']);
}
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
    <title>edit details</title>
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
                   <h1> UPDATE YOUR PROFILE DETAILS</h1>
              </div>

              <form method="POST" action="?">
              <div class=box >
               
              <div class="row mt-md-4" p-5>
                   <div class="col  d-flex"><?php echo $lang['23']; ?></div>
                   <div class="col  d-flex"> <input type=text name=name value="<?php echo  $_SESSION['name']  ;?>"></div>
              </div>
              <div class="row  mt-md-4" p-5>
                   <div class="col  "><?php echo $lang['2']; ?></div>
                   <div class="col  "> <input type=text name=email value="<?php echo  $_SESSION['email']  ;?>"></div>
              </div>
                
              <div class="row mt-md-4" p-5>
                   <div class="col  "><?php echo $lang['24']; ?></div>
                   <div class="col  "> <input type=text name=address value="<?php echo  $_SESSION['address']  ;?>"></div>
              </div> 
              <div class="row mt-md-4" p-5>
                   <div class="col  "><?php echo $lang['25']; ?></div>
                   <div class="col  "> <input type=text name=phone value="<?php echo  $_SESSION['phone_no']  ;?>"></div>
              </div> 
              <div class="row mt-md-4" p-5>
                   <div class="col  "><?php echo $lang['26']; ?></div>
                   <div class="col  "> <input type=text name=pincode value="<?php echo  $_SESSION['pincode']  ;?>"></div>
              </div>
              <div class="row mt-md-4" p-5>
                   <div class="col  "><?php echo $lang['27']; ?></div>
                   <div class="col  "><select name=nationality>
                       <option <?php echo  $_SESSION['nationality'] == 'India'? 'selected' :'' ;?>>India</option>
                       <option <?php echo  $_SESSION['nationality'] == 'America'? 'selected' :'' ;?>>America</option>
                       <option <?php echo  $_SESSION['nationality'] == 'Japan'? 'selected' :'' ;?>>Japan</option>
                       <option <?php echo  $_SESSION['nationality'] == 'China'? 'selected' :'' ;?>>China</option>
                      </select>
                    </div>
              </div>
              <div class="row mt-md-4" p-5>
                   <div class="col  "><?php echo $lang['28']; ?></div>
                   <div class="col  "> <input type=text name=state value="<?php echo  $_SESSION['state']  ;?>"></div>
              </div> 
              <div class="row mt-md-4" p-5>
                   <div class="col  "><?php echo $lang['29']; ?> </div>
                   <div class="col  "> <input type=text name=city value="<?php echo  $_SESSION['city']  ;?>"></div>
              </div> 
              
              <div class="row mt-md-4" p-5>
                   <div class="col  "> </div>
                   <div class="col  "> <a href=" "><button type="submit"  name = Update value = update class="btn btn-primary" style="width:100px"><?php echo $lang['33']; ?></button></a></div>
              </div>
             </div>
         </form>
       
               </div>
            </div>
        </div>
    </div>
</div>
 
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>  

</body>
</html>