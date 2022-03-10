<?php
NAMESPACE project;
require('../config/config.php');

class changelang extends Connection{
    public $english= array('login','email','Best Product','Home','Profile Details','Your Cart','Your order','Sign Out','Search','Go shoping','Here we provide our best product','Enjoy our service','Buy Now','Cart','Price','Language','Change','En','Profile Details','Add to the Cart','Available Stock','DETAILS OF THE REGISTERD MEMBER','Registration Id','Name','Address','Phone no.','Pincode','Nationality','State','City','Edit','Change Password','Back to home','Update','My Cart','Items','Remove','My Order','Order Placed','Order Canceled','Cancel Order','Order Deliverd','Order processing');

    public $german= array('login','email','Bestes Produkt','Home','Profil Details','Ihr Warenkorb','Ihre Bestellung','Abmelden','Suchen','Einkaufen gehen','Hier bieten wir unser bestes Produkt','Genießen Sie unseren Service','Jetzt kaufen','Warenkorb','Preis','Sprache','Ändern Sie','De',' Profil Detail','In den Warenkorb legen','Verfügbarer Bestand','DETAILS DES REGISTRIERTEN MITGLIEDS','Registrierungsnummer','Name','Anschrift','Telefon Nr.','Postleitzahl','Staatsangehörigkeit','Bundesland','Stadt','Bearbeiten','Passwort ändern','Zurück zur Startseite','Aktualisierung','Mein Warenkorb','Artikel','Entfernen Sie','Meine Bestellung','Bestellung aufgegeben','Bestellung storniert','Bestellung stornieren','Bestellung schwebend','Auftragsabwicklung');
    public function eng(){
        return $this->english;
    }
    public function ger(){
        return $this->german;
    }

}

class getCustomerdetail Extends Connection{
    public function getlist($log){
            $login=$log;
            $sql="SELECT * FROM  `register` WHERE `login_id`='$login'";
            $res=mysqli_query($this->conn,$sql);
            return($res);
    }

}
class updatedetail Extends Connection{
    public function update($name,$email,$address,$phone,$pincode,$nationality,$state,$city,$logid){
        $sql= "UPDATE `register` SET `name` ='$name',  `email` = '$email',`address`='$address', `phone_no`='$phone',
        `pincode` = '$pincode', `state` = '$state', `nationality` = '$nationality', `city`='$city' WHERE login_id = '$logid'";
        $res=mysqli_query($this->conn,$sql);

        $sql2= "UPDATE `login` SET `email_id`='$email' WHERE login_id = '$logid'";
        $res2=mysqli_query($this->conn,$sql2);
         if($res==True){
             header('location:customerdetails.php?msg=Profile updated!');
         }else{
             echo mysqli_error($this->conn);die;
         }   
    }

}
class productdetail Extends Connection{
    public function getDetailsEnglish(){
        $query="SELECT product_detail.product_id,product_detail.product_image,product_detail.product_price,product_detail.product_brand, product_detail.product_quantity, product_detail_i18n.name,product_detail_i18n.description FROM product_detail,product_detail_i18n WHERE product_detail_i18n.language_id='1' AND product_detail_i18n.product_id=product_detail.product_id ";
        $res=mysqli_query($this->conn, $query);
        return($res);
        }
    public function getDetailsGerman(){
        $query="SELECT product_detail.product_id,product_detail.product_image,product_detail.product_price,product_detail.product_brand, product_detail.product_quantity, product_detail_i18n.name,product_detail_i18n.description FROM product_detail,product_detail_i18n WHERE product_detail_i18n.language_id='2' AND product_detail_i18n.product_id=product_detail.product_id; ";
        $res=mysqli_query($this->conn, $query);
        return($res);
        }
    public function getSingledataEnglish($id){
        $query="SELECT product_detail.product_id,product_detail.product_image,product_detail.product_price,product_detail.product_brand, product_detail.product_quantity, product_detail_i18n.name,product_detail_i18n.description FROM product_detail,product_detail_i18n WHERE product_detail_i18n.language_id='1' AND product_detail.product_id='$id' AND product_detail_i18n.product_id=product_detail.product_id";
        $res=mysqli_query($this->conn, $query);
        return($res);
        }
    public function getSingledataGerman($id){
        $query="SELECT product_detail.product_id,product_detail.product_image,product_detail.product_price,product_detail.product_brand, product_detail.product_quantity, product_detail_i18n.name,product_detail_i18n.description FROM product_detail,product_detail_i18n WHERE product_detail_i18n.language_id='2' AND product_detail.product_id='$id' AND product_detail_i18n.product_id=product_detail.product_id";
        $res=mysqli_query($this->conn, $query);
        return($res);
        }
    public function getSearchdataEnglish($search){
       $query=" SELECT product_detail.product_id,product_detail.product_image,product_detail.product_price,product_detail.product_brand, product_detail.product_quantity, product_detail_i18n.name,product_detail_i18n.description FROM product_detail,product_detail_i18n WHERE product_detail_i18n.name LIKE '%$search%' AND product_detail.product_id=product_detail_i18n.product_id OR product_detail.product_brand LIKE'%$search%' AND product_detail_i18n.language_id ='1' AND product_detail.product_id=product_detail_i18n.product_id";
       $res=mysqli_query($this->conn, $query);
       return($res);
        }
    public function getSearchdataGerman($search){
        $query="SELECT product_detail.product_id,product_detail.product_image,product_detail.product_price,product_detail.product_brand, product_detail.product_quantity, product_detail_i18n.name,product_detail_i18n.description FROM product_detail,product_detail_i18n WHERE product_detail_i18n.name LIKE '%$search%' AND product_detail.product_id=product_detail_i18n.product_id OR product_detail.product_brand LIKE '%$search%' AND product_detail_i18n.language_id ='2' AND product_detail.product_id=product_detail_i18n.product_id";
        $res=mysqli_query($this->conn, $query);
        return($res);
        }

}

class viewcart Extends Connection{
    public function view($log){
        $sql="SELECT `product_id` FROM `cart_detail` WHERE `login_id`=$log";
        $res=mysqli_query($this->conn, $sql);
        return $res;
    }
    public function removeCart($pid){
        $sql="DELETE FROM `cart_detail` WHERE `product_id`='$pid'";
        $res=mysqli_query($this->conn, $sql);
            return $res;
    }
}

class order Extends Connection{
    public function confirm_order($pid,$log_id,$qty){
        $sql= "INSERT INTO `order_detail` (`order_id`, `product_id`, `login_id`, `order_date`, `order_status`,`order_quantity`) VALUES (NULL, '$pid', '$log_id', current_timestamp(), '4','$qty')";
        $res= mysqli_query($this->conn, $sql);
        if($res==true){
            return 1;
        }
    }
    public function get_order($log){
        $sql= "SELECT * FROM `order_detail` WHERE login_id='$log'";
        $res= mysqli_query($this->conn, $sql);
        return $res;
    }
    public function invoice($oid){
        $sql= "SELECT * FROM `invoice_details` WHERE order_id='$oid'";
        $res= mysqli_query($this->conn, $sql);
        return $res;
    }
    public function remove($order_id){
        $sql= "DELETE FROM `order_detail` WHERE `order_id`='$order_id'";
        $res= mysqli_query($this->conn, $sql);
        return $res;
    }
}
?>