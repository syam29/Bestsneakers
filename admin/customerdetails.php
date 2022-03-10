<?php
NAMESPACE project;
require('adminaction.php');
$action =  new getCustomerlist;

if(isset($_POST['searchBtn']) && !empty($_POST['searchValue'])){
    $res=$action->getSearchedlist($_POST['searchValue']);
}
else{
   $res=$action->getlist();
}
if(isset($_POST['sort'])){
     $res=$action->orderBy( $_POST['order']);
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
                    <div class=row  >
                        <h2 > Details of all customers</h2>
                         <br>
                         <form action="?" method=POST>
                            <table>
                                <tr>
                                    <td> 
                                        <input type=text name=searchValue placeholder=search> 
                                        <button type=submit  name=searchBtn value=search style='background-color:gray;'>Search</button>
                                    </td>
                                    <td><select name="order" >
                                            <option value="1">Assending</option>
                                            <option value="2">Dessending</option>
                                        </select>
                                        <button type=submit  name=sort style='height:25px;background-color:skyblue;' > SORTS</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div>
                        <?php
                            echo "<table>";
                            echo "<tr><th>Name</th><th>Email</th><th>Phone.no</th><th>Nationality</th><th>Pincode</th></tr>";
                            while($row = mysqli_fetch_array($res))
                            {
                                $r=$row['login_id'];
                                if($row['status']==0){
                                    $unblock='UNBLOCK';
                                    $block="";
                                }
                                else if($row['status']==1){
                                    $unblock="";
                                    $block='BLOCK';

                                }
                                echo    "<tr>
                                            <td>".htmlspecialchars($row['name'])."</td>
                                            <td>".htmlspecialchars($row['email'])."</td>
                                            <td>".htmlspecialchars($row['phone_no'])."</td>
                                            <td>".htmlspecialchars($row['nationality'])."</td>
                                            <td>".htmlspecialchars($row['pincode'])."</td>
                                            <td><a href='moredetail.php?userid=$r'> MORE</a></td>  
                                            <td><a href='block.php?userid=$r' onclick='block( $r )'>$block</a>
                                            <a href='unblock.php?userid=$r'>$unblock</a></td>
                                        <tr>" ;
                            }
                            echo "<tr>
                                    <td colspan=2> <a href='adminhome.php'>
                                    <button type='button' class='btn btn-primary'  > back to admin</button></td>
                                    </tr>";
                            echo "</table>";
                        ?>
                    </div>     
               </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
function block(userid){
    var res= confirm( "do you wants to block the user?");
    if(res == true){
      location('');
    } 
    else{
        alert("not cool");
    }
}

</script>
<script src="../jquery/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>  

</body>
</html>