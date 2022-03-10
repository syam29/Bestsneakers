<?php
NAMESPACE project;
require('registration.php');
session_start();
$obj= new changelanguage;
$product = new productdetails;
if(isset($_POST['submit'])){
    if($_POST['language']==2){
    $lang=$obj->germ();
    $res=$product->getDetailsGerman();
    $_SESSION['lang']=2;
    }
    else{
        $lang=$obj->engl();  
        $res=$product->getDetailsEnglish();
        $_SESSION['lang']=1;
    }
}
else if(isset($_SESSION['lang']) && $_SESSION['lang']=="2"){
    $lang=$obj->germ();
    $res=$product->getDetailsGerman();
}
else{
    $lang=$obj->engl();
    $res=$product->getDetailsEnglish();
    $_SESSION['lang']="1";
}
if(isset($_REQUEST['flag']) && $_REQUEST['flag']=='signout'){
    session_destroy();
    header("location:http://localhost/syam/Project/login.php");
}
if(isset($_POST['search']) && !empty($_POST['serh'])){
     $res=$product->getsearchdata($_POST['serh']);
 }
 else{
    $res=$product->getDetailsEnglish();
}

if(isset($_POST['searchBtn']) && !empty($_POST['searchValue'])){
    if($_SESSION['lang']==2){
        $res=$product->getSearchdataGerman($_POST['searchValue']);
    }
    else{
        $res=$product->getSearchdataEnglish($_POST['searchValue']);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Guest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="customer/home.css" rel="stylesheet">
</head>
<body style="background-color:#eee" >
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><?php echo $lang['2']; ?></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"><?php echo $lang['3']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registration page.php"><?php echo $lang['7']; ?></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">login</a>
                    </li>
                     
                </ul>
                <form class="d-flex"  action="?" method=POST style='color:white;margin-right:50px;'>
                        <label> <?php echo $lang['15']; ?></label>
                        <select name=language class="form-control me-2" style="width:50px" >
                         <option disabled selected hidden> <?php echo $lang['17']; ?></option>
                         <option value=1 default>En</option>
                         <option value=2>De</option>
                        </select>
                        <button class="btn btn-outline-success" type="submit" name=submit><?php echo $lang['16']; ?></button>
                </form>
                <form method='post' action="?" class="d-flex">  
                    <input class="form-control me-2" name="searchValue" placeholder="<?php echo $lang['8']; ?>" >
                    <button class="btn btn-outline-success" type="submit" name=searchBtn><?php echo $lang['8']; ?></button>
                </form>
            </div>
        </div>
    </nav>
     <div class="head d-flex justify-content-center" style="background-image: url('image/sneaker.jpg');"> 
         <div class="head_cont p-5" style="color:white"><br><br><br><br><br>
                <h3> <?php echo $lang['10']; ?></h3>
                <h5> <?php echo $lang['11']; ?></h5> 
                <a href="#content"><button type=button class="btn btn-primary"> <?php echo $lang['9']; ?></button></a>
        </div>
     </div>
    <div class="container-fluid" >
        <div class="p-5 bg-light " id=content>
            <?php  
             echo "<div class=row  style=margin-top:10px>"; 
             while($row= mysqli_fetch_array($res)){
                echo "   <div class='col-xl-3 col-lg-4 col-md-6'>
                            <div class='card' style='width: 18rem;'>  
                                <img class='card-img-top' src='product_img/".htmlspecialchars($row['product_image'])."'/>  
                                <div class='card-body'>  
                             
                                    <h5 class='card-title'>".htmlspecialchars($row['name'])."</h5>  
                                    <p class='card-text'>".htmlspecialchars($row['description'])."</p>                                   
                                    <p class='card-text'>".htmlspecialchars($row['product_brand'])."</p> 
                                    <p class='card-heading'><h4>".htmlspecialchars($lang['14'])." : &#8377;" .htmlspecialchars($row['product_price'])." RS</h4></p>  
                                    <a href='registration page.php' class='btn btn-warning'>".htmlspecialchars($lang['12'])."</a> 
                                    <a href='registration page.php' class='btn btn-dark'>".htmlspecialchars($lang['13'])."</a>  
                                </div> 
                            </div>
                        </div>";
             }
            echo "</div>";
            ?>
       </div> 
    </div>
<footer class="bg-dark d-flex justify-content-center"><h6 class=p-5>@pitsolutions<br><br>
    <a href="admin/adminLogin.php" style="color:blue;">Login into admin</a></h6>
</footer>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>  

</body>
</html>