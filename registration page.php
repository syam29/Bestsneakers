<?php
NAMESPACE project;
require('registration.php');
session_start();
$register= new register;
$public_key='6LfHPMMeAAAAAIPIP4cvg8c2s3dduyzp0RhVWeJm';
$secret_key='6LfHPMMeAAAAALbhUp-8hA6FNiZXbvLrHaz_RZnu';
$url='https://www.google.com/recaptcha/api/siteverify';
if(isset($_POST['btn'])){
  $response=file_get_contents($url.'?secret='.$secret_key.'&response='.$_POST['g-recaptcha-response']);
  $response=json_decode($response);
  if($response->success==1)
  {
    if(isset($_FILES['file']))
    {
      $filename = $_FILES['file']['name'];
      $filesize = $_FILES['file']['size'];
      $filetype = $_FILES['file']['type'];
      $tempFile = $_FILES['file']['tmp_name'];
      if(empty($error)==true && $filetype=='application/pdf') 
      {
        move_uploaded_file($tempFile, 'identity_document/'.$filename);
        $result= $register->registrat($_POST["name"], $_POST["email"], $_POST["phone"], $_POST["nationality"],$_POST["state"],$_POST["city"] ,$_POST["address"],$_POST["pin"], md5($_POST["password"]),$filename,$_POST["file_type"]);
        if($result==1)
        {
          header('location:login.php?mssg=4');
        }
        else if($result==10){
            echo "<script>alert('already a user exist in this user name') </script>";
        }
      }
      else{
        echo "<script> alert('The identity document must be in pdf format')</script>";
      }
    }
  }
}

$obj= new changelanguage;
if($_SESSION['lang']==1 ||$_SESSION['lang']==""){
    $lang=$obj->engl();
    $value=1;
}
else if($_SESSION['lang']==2){
    $lang=$obj->germ();
    $value=2;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>registration form</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href=" " rel="stylesheet">
    <style>
        .head{
                width:100%;
                height:200px;
                background-image: url("image/sneaker.jpg");
        }
        .des{
            background-image: url("image/sneakers.jpg");
        }
        .content{
            background-color:#eee;
            opacity:.7;
        }
        form .error {
    color: #ff0000;
  }
    </style>
</head>
<body style="background-color:#eee"> 
    <div class="head d-flex justify-content-center"> 
         <div class=" p-5" style="color:white">
            <h3><?php echo $lang['10'];?></h3>
            <h6><?php echo $lang['11'];?></h6> 
            <a href="login.php"><button type=button class="btn btn-primary">login</button></a>
        </div>
    </div>
    <div class="row justify-content-center h-100 p-5">
        <div class="col-md-8 col-lg-6 col-xl-5 order-2 order-lg-1" style="background-color:white">
            <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4"><?php echo $lang['22'];?></p>

              <form method='POST' action ="?" class="mx-1 mx-md-4" name="registration" enctype = "multipart/form-data">
                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="form3Example1c"><?php echo $lang['23'];?></label>
                          <input type="text" name ="name" id="form3Example1c" class="form-control" />
                      </div>
                    </div>
                    
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example3c"><?php echo $lang['1'];?></label>
                        <input type="email" name="email" id="form3Example3c" class="form-control" />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="phone"><?php echo $lang['25'];?></label>
                        <input type="text" name="phone"   class="form-control" />
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for=" address"><?php echo $lang['24'];?></label>
                        <textarea name="address" id="address" class="form-control"></textarea>
                      </div>
                    </div>

                    
                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="nationality"><?php echo $lang['27'];?></label>
                        <select class="form-control" name= nationality><option>India</option>
                          <option>America</option>
                          <option>japan</option>
                          <option>china</option>
                      </select>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" ><?php echo $lang['28'];?></label>
                        <input type="text" name="state"   class="form-control" />
                      </div>
                    </div>
                    

                    <div class="d-flex flex-row align-items-center mb-4">
                        <div class="form-outline flex-fill mb-0">
                          <label class="form-label" for="formCity"><?php echo $lang['29'];?></label>
                          <input type="text" name="city" id="city" class="form-control" />
                        </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="formPincode"><?php echo $lang['26'];?></label>
                        <input type="text" name="pin" id="formPincode" class="form-control" />
                      </div>
                    </div>

                    
                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline flex-fill mb-0">
                      <label class="form-label" for="nationality">Select your Identity file type</label>
                        <select class="form-control" name='file_type'><option>Identity card</option>
                          <option>Pan card</option>
                          <option>Aadhaarcard</option>
                          <option>Passport</option></select>
                        <label class="form-label" for="formFile"><?php echo $lang['34'];?></label>
                        <input type="file" name="file"  class="form-control"  accept="application/pdf,application/doc" />
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4c"><?php echo $lang['30'];?></label>
                        <input type="password" name="password" id="form3Example4c" class="form-control" />
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4">
                      <div class="form-outline flex-fill mb-0">
                        <label class="form-label" for="form3Example4cd"><?php echo $lang['31'];?></label>
                        <input type="password" name="conf_password" id="form3Example4cd" class="form-control" />
                      </div>
                    </div>
                    
                    <div class="d-flex flex-row align-items-left mb-4">
                    <div class="form-check d-flex justify-content-left mb-5">
                      <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c"  />
                      <label class="form-check-label" for="form2Example3">  <?php echo $lang['32'];?> </label>
                    </div>
                    </div>

                    <div class="g-recaptcha" data-sitekey="<?php print $public_key;?>"></div>
  
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <div class="d-flex flex-row justify-content-between">
                        <div class="p-2">
                          <button type="reset" name=btnre id=btnre class="btn btn-primary btn-lg"><?php echo $lang['33'];?></button>
                        </div>
                        <div class="p-2">
                          <button type="submit" name=btn id=btn class="btn btn-primary btn-lg"  disabled="disabled"><?php echo $lang['7'];?></button>
                        </div>
                      </div>
                    </div>
              </form>
        </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex   order-1 order-lg-2" style="background-color:#eee;">
                <div class="des col-12 ">                     
                </div>
              </div>
     </div>


<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="jquery/jquery-3.6.0.min.js"></script>
<script src="jquery/jquery.validate.js"></script>
<script src="jquery/regscript.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>  
</body>
</html>