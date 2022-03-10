<?php
NAMESPACE project;
require('adminaction.php');
$product= new product;
if(isset($_POST['insert']))
{
    if(isset($_FILES['file'])){
        $filename = $_FILES['file']['name'];
        $filesize = $_FILES['file']['size'];
        $filetype = $_FILES['file']['type'];
        $tempFile = $_FILES['file']['tmp_name'];
        if(empty($error) == true) {
            move_uploaded_file($tempFile, '../product_img/'.$filename);
        } else {
            print_r($error);
        } 
    }
    $product->addproduct($_POST['pdt_name_en'],$_POST['pdt_name_de'],$_POST['pdt_price'],$_POST['pdt_des_en'],$_POST['pdt_des_de'],$_POST['pdt_brand'],$filename,$_POST['pdt_type'],$_POST['pdt_qty']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>edit details</title>
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
                   <h1> ENTER NEW PRODUCT</h1>
              </div>

              <form method="POST" action="?" enctype = "multipart/form-data">
              <div class=box >
               
              <div class="row mt-md-4" p-5>
                   <div class="col  d-flex">PRODUCT NAME En</div>
                   <div class="col  d-flex"> <input type=text name=pdt_name_en class=form-control></div>
              </div>
              <div class="row mt-md-4" p-5>
                   <div class="col  d-flex">PRODUCT NAME De</div>
                   <div class="col  d-flex"> <input type=text name=pdt_name_de class=form-control></div>
              </div>
              <div class="row  mt-md-4" p-5>
                   <div class="col  ">PRODUCT PRICE </div>
                   <div class="col  "> <input type=text name=pdt_price class=form-control></div>
              </div>
              <div class="row mt-md-4" p-5>
                   <div class="col ">PRODUCT DESCRIPTION En</div>
                   <div class="col "> <textarea name=pdt_des_en class=form-control ></textarea></div>
              </div>  
              <div class="row mt-md-4" p-5>
                   <div class="col ">PRODUCT DESCRIPTION De</div>
                   <div class="col "> <textarea name=pdt_des_de class=form-control ></textarea></div>
              </div> 
              <div class="row mt-md-4" p-5>
                   <div class="col ">PRODUCT BRAND</div>
                   <div class="col "> <input type=text name=pdt_brand class=form-control></div>
              </div>   

              <div class="row mt-md-4" p-5>
                   <div class="col  ">PRODUCT IMAGE </div>
                   <div class="col  "> <input type=file name=file  class=form-control></div>
              </div> 
              <div class="row mt-md-4" p-5>
                   <div class="col  ">PRODUCT TYPE</div>
                   <div class="col  "> <select class="form-control" name=pdt_type><option value=1>Regular</option>
                                <option value=2>Running</option>
                                <option value=3>Smooth</option>
                                <option value4>Brethable</option>
                            </select></div>
              </div> 
              <div class="row mt-md-4" p-5>
                   <div class="col ">PRODUCT QUANTITY</div>
                   <div class="col ">  <input type=text name=pdt_qty class=form-control> </div>
              </div>  
              <div class="row mt-md-4" p-5>
                   <div class="col  "><a href="adminhome.php "><button type="button"  class="btn btn-primary" style="width:100px">Back to home</button></a> </div>
                   <div class="col  "> <a href=" "><button type="submit"  name =insert value = insert class="btn btn-primary" style="width:100px">INSERT</button></a></div>
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