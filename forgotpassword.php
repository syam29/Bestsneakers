<?php
NAMESPACE project;
require('registration.php');
$chang= new login;
if(isset($_POST['Update'])){
    $res=$chang->changepass($_POST['email'],md5($_POST['new_password']));

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>forgot password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="customer/home.css" rel="stylesheet">
    <style>
        body{
            background-image: url("image/sneaker.jpg");
        }
    </style>
</head>
<body >
<div class="container h-100"> 
    <div class="card text-dark">
        <div class="card-body p-md-5">
           <div class="row justify-content-center">
               <div class="col-md-10 col-lg-10 col-xl-10 ">
                    <div class=row>
                        <center> <h1> Forgot password ?</h1></center>
                        <br><br>
                    </div>
                    <div class= p-5 >
                            <form method="POST" action="?" name="forgotpass">
                            
                                <div class="row mt-md-4 ">
                                    <div class="col-6  d-flex">Enter your email</div>
                                    <div class="col-6  d-flex"><input type=text name=email placeholder='Enter your email' class="form-control" ></div>
                                </div>
                                <div class="row  mt-md-2">
                                    <div class="col  "> </div>
                                    <div class="col  "> <?php if(isset($_REQUEST['msg'])){echo "<h6 style='color:red'>*".$_REQUEST['msg']."</h6>";}?> </div>
                                </div>
                                <div class="row  mt-md-4">
                                    <div class="col  ">Enter your new password </div>
                                    <div class="col  "> <input type=password name=new_password id=pass1 placeholder='New Password' class="form-control" ></div>
                                </div>
                                <div class="row mt-md-4">
                                    <div class="col ">Confirm your password</div>
                                    <div class="col "><input type=password name=conf_password id=pass2 placeholder='Confirm new password' class="form-control" ></div>
                                </div>  
                                <div class="row mt-md-4">
                                    <div class="col  "> <a href="login.php"><button type="button"  class="btn btn-primary" style="width:150px">Back to login</button></a> </div>
                                    <div class="col  "> <button type="submit"  name = Update value = update class="btn btn-info" style="width:100px">Update</button></div>
                                </div>
                            </form>
                    </div>
               </div>
            </div>
        </div>
    </div>
</div>
 

<script src="jquery/jquery-3.6.0.min.js"></script>
<script src="jquery/jquery.validate.js"></script>
<script src="jquery/regscript.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>  

</body>
</html>