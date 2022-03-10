<?php
NAMESPACE project;
require('registration.php');
session_start();
if(isset($_REQUEST['mssg']) && $_REQUEST['mssg']==4){
  echo "<script>alert('Registration sucessfull. Now login into your account')</script>";
}
$log= new login;
$error_msg="";
$block_msg="";
if(isset($_POST['login'])){
$result= $log->loginn($_POST["email"], md5($_POST["password"]));
if($result==1){
  $error_msg="*enterd password is not valid";
}
else if($result==2){
  $block_msg="You are Blocked ";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
     div .ico{
      border-radius:50% ; 
      width:25%; 
      height:110px;
      background-color:#eee;
      box-shadow:1px 1px 2px;
      }
       
    </style>
</head>
<body>
    <section class="vh-200" style="background-image: url('image/sneakers.jpg');">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10 p-3">
              <div class="card p-2 " style="border-radius: 1rem;">
                <div class="row g-0 justify-content-center">
                  <div class="col-md-8 col-lg-5 d-flex d-md-block">
                    <img
                      src="image/sneaker.webp"
                      alt="login form"
                      class="img-fluid" style="border-radius: 1rem 0 0 1rem; width:100%; height:100%;"
                    />
                  </div>
                  <div class="col-md-8 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">
      
                      <form method="POST" action="?">

                        <div class= "pt-1 mb-6">

                          <center>
                            <div class="ico pt-1 mb-4" style=""><center> 
                              <i class="fa fa-user icon primary" style="font-size:50px;color:blue"></i><br><h3>Login</h3></center>
                            </div>
                          </center>
      
                    
                        
                          <div class="form-outline mb-4">
                              <label class="form-label" >Email</label>
                              <i class="fa fa-envelope icon"></i> <input type="text"   name="email" class="form-control form-control-lg" placeholder="Email"/>
                          </div>
        
                          <div class="form-outline mb-4">
                              <label class="form-label">Password</label>
                              <i class="fa fa-key icon"></i><input type="password"   name="password" class="form-control form-control-lg" placeholder="Password"/>
                          <h6 style="color:red"> <?php echo $error_msg; ?></h6>
                          <h5 style="color:red"> <?php echo $block_msg; ?></h5>
                          </div>
        
                          <div class="pt-1 mb-4">
                            <button class="btn btn-primary btn-lg btn-block form-control" type="submit" name="login" value="Login" >Login</button>
                          </div>
                          <div class="pt-1 mb-4  align-item-self-center" style="border-radius:50% ;">
                              <center>  <a href="index.php"> <button class="btn btn-light btn-lg btn-block align-self-center " type="button" style="border-radius:10%">Guest</button></a> </center>
                          </div>
                          <a class="small text-muted" href="forgotpassword.php">Forgot password?</a>
                          <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="registration page.php" style="color: #393f81;">Register here</a><br></p>
                       </div>
                      </form>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>  
</body>
</body>
</html>
