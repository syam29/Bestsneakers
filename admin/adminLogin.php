<?php
namespace project;
require("../registration.php");
$log= new login;
if(isset($_POST['login'])){
    $result= $log->adminLogin($_POST["email"], md5($_POST["password"]));

    if($result==1){
        header("location:syam/Project/admin/adminhome.php ");
    }
    else if($result==10){
        echo "<script>alert('already a user exist in this user name') </script>";
      }
}

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
        <div class="card-body  p-md-5">
           <div class="row justify-content-center">
               <div class="col-md-8 col-lg-8 col-xl-8 ">
                    <div class="row p-5 justify-content-center">
                        <div class="col-10">
                            <h1>ENTER INTO ADMIN</h1><br>
                            <form method="POST" action="?">
                                <div class="form-outline mb-4">
                                    <label class="form-label" >Email</label>
                                <input type="text"   name="email" class="form-control form-control-lg" />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label">Password</label>
                                <input type="password"   name="password" class="form-control form-control-lg" />
                                </div>

                                <div class="pt-1 mb-4">
                                <button class="btn btn-primary btn-lg btn-block form-control" type="submit" name="login" value="Login" >Login</button>
                                </div>
                                <h4><a class="link" href="../index.php" style="color:blue;font-family:serif;">Back to home</a></h4>
                            </form>  
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