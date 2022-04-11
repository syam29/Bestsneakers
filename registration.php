<?php
NAMESPACE project;
require('config/config.php');
class Register Extends Connection{
        public function registrat($name,$email,$phone,$country,$state,$city,$address,$pincode,$password,$file,$file_type){
               $check = "SELECT * FROM `login` WHERE `email_id`='$email'";
                $duplicate=mysqli_query($this->conn, $check);
                if(mysqli_num_rows($duplicate)>0){
                    return 10;//
                } 
                else{
                    $querry = "INSERT INTO `login` (`login_id`,`email_id`,`password`,`user_type`) VALUES('','$email','$password','1')";
                    mysqli_query($this->conn,$querry);
                    $login= mysqli_insert_id($this->conn);
                    $sql = "INSERT INTO `register` (`reg_id`, `login_id`, `name`, `email`, `phone_no`, `nationality`, `state`, `city`, `address`, `pincode`, `status`,`identity_file`,`identity_file_type`) 
                    VALUES (NULL, '$login', '$name', '$email', '$phone', '$country', '$state', '$city', '$address', '$pincode', '1','$file','$file_type')";
                    mysqli_query($this->conn,$sql);
                    return 1;
                }
            }

    }

    class login Extends Connection{
        public $id;
        public function loginn($email,$password){
            $query="SELECT * FROM `login` WHERE `email_id`='$email' AND `user_type`='1' ";
            $res=mysqli_query($this->conn, $query);
            $row=mysqli_fetch_assoc($res);
            if(mysqli_num_rows($res)>0){
                if($row["status"]=='1'){
                    if($password==$row["password"]){
                        $this->id=$row["login_id"];
                            header("location:customer/test.php?msg=$this->id");
                    }  
                    else {
                    return 1 ;
                    }
                }
                else{
                    return 2;
                }
            }
        }
        public function adminLogin($email,$password){
            $query="SELECT * FROM `login` WHERE `email_id`='$email' AND `user_type`='2'";
            $res=mysqli_query($this->conn, $query);
            $row=mysqli_fetch_assoc($res);
            if(mysqli_num_rows($res)>0){
                    if($password==$row["password"]){
                        $this->id=$row["login_id"];
                            header("location:adminhome.php");
                    }   
            }
        }
        public function changepass($email,$pass){
           $sql="UPDATE `login` SET `password`='$pass' WHERE `email_id`='$email'";
           $res=mysqli_query($this->conn, $sql);
           return 1;
        }
    }
    class changelanguage extends Connection{
        public $english= array('login','Your Email','Best Product','Home','Profile Details','Your Cart','Your order','Register','Search','Go shoping','Here we provide our best product','Enjoy our service','Buy Now','Cart','Price','Language','Change','En','Profile Details','Add to the Cart','Available Stock','DETAILS OF THE REGISTERD MEMBER','Register Here','Your Name',' Address','Phone no.','Pincode','Nationality','State','City','Password','confirm Password','I agree all statements in  in the agreement','Reset','Your Identity Document');
    
        public $german= array('login','Ihr email','Bestes Produkt','Home','Profil Details','Ihr Warenkorb','Ihre Bestellung','Register','Suchen','Einkaufen gehen','Hier bieten wir unser bestes Produkt','Genießen Sie unseren Service','Jetzt kaufen','Warenkorb','Preis','Sprache','Ändern Sie','De',' Profil Detail','In den Warenkorb legen','Verfügbarer Bestand','DETAILS DES REGISTRIERTEN MITGLIEDS','Hier anmelden','Ihr Name','Anschrift','Telefon Nr.','Postleitzahl','Staatsangehörigkeit','Bundesland','Stadt','Passwort','Passwort bestätigen','Ich stimme allen Aussagen in der Vereinbarung zu','Zurücksetzen','Ihr Ausweisdokument');
        public function engl(){
            return $this->english;
        }
        public function germ(){
            return $this->german;
        }
    
    }
     
    class productdetails Extends Connection{
        public function getDetailsEnglish(){
            $query="SELECT product_detail.product_id,product_detail.product_image,product_detail.product_price,product_detail.product_brand, product_detail.product_quantity, product_detail_i18n.name,product_detail_i18n.description FROM product_detail,product_detail_i18n WHERE product_detail_i18n.language_id='1' AND product_detail_i18n.product_id=product_detail.product_id; ";
            $res=mysqli_query($this->conn, $query);
            return($res);
            }
        public function getDetailsGerman(){
            $query="SELECT product_detail.product_id,product_detail.product_image,product_detail.product_price,product_detail.product_brand, product_detail.product_quantity, product_detail_i18n.name,product_detail_i18n.description FROM product_detail,product_detail_i18n WHERE product_detail_i18n.language_id='2' AND product_detail_i18n.product_id=product_detail.product_id; ";
            $res=mysqli_query($this->conn, $query);
            return($res);
            }

        public function getsingledata($id){
            $query="SELECT * FROM `product_detail` WHERE `product_id`=$id";
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
?>