<?php
NAMESPACE project;
require('../config/config.php');

class getCustomerlist Extends Connection{
    public function getSearchedlist($search){
            $name=$search ;
            $sql="SELECT `login_id`, `name`, `email`, `phone_no`, `nationality`, `address`, `pincode`, `status` FROM  `register` WHERE `name`LIKE '%$name%'";
            $res=mysqli_query($this->conn,$sql);
            return($res);
    }
    public function getlist(){
            $sql="SELECT `login_id`, `name`, `email`, `phone_no`, `nationality`,  `address`, `pincode`, `status` FROM  `register`";
            $res=mysqli_query($this->conn,$sql);
            return($res);
    }
    public function getsingledata($id){
        $sql="SELECT * FROM  `register` WHERE `reg_id`='$id'";
        $res=mysqli_query($this->conn,$sql);
        return($res);

    }
    public function getsingledataa($id){
        $sql="SELECT * FROM  `register` WHERE `login_id`='$id'";
        $res=mysqli_query($this->conn,$sql);
        return($res);

    }
    public function block($id){
        $sql="UPDATE `register` SET `status`=0 WHERE `login_id`='$id'";
        $res=mysqli_query($this->conn,$sql);
        $sql1="UPDATE `login` SET `status`=0 WHERE `login_id`='$id'";
        $res1=mysqli_query($this->conn,$sql1);
        return(1);
    }
    public function unblock($id){
        $sql="UPDATE `register` SET `status`=1 WHERE `login_id`='$id'";
        $res=mysqli_query($this->conn,$sql);
        $sql1="UPDATE `login` SET `status`=1 WHERE `login_id`='$id'";
        $res1=mysqli_query($this->conn,$sql1);
        return(1);
    }
    public function orderBy($val){
        if($val==1){
             $sql="SELECT * FROM  register ORDER BY  `name` ASC";
             $res=mysqli_query($this->conn,$sql);
        }
        else{
            $sql="SELECT * FROM  register ORDER BY  `name` DESC";
            $res=mysqli_query($this->conn,$sql);
        }
        return $res;

    }

}

class product Extends Connection{
        public function addproduct($name_en,$name_de,$price,$description_en,$description_de,$brand,$file,$tye,$qty){
                $sql="INSERT INTO `product_detail` (`product_id`, `product_price`, `product_brand`, `product_image`, `product_quantity`, `product_type`) VALUES (NULL, '$price', '$brand', '$file', '$qty', '$tye')";
                $res=mysqli_query($this->conn,$sql);

                $pid= mysqli_insert_id($this->conn);

                $sql1="INSERT INTO `product_detail_i18n` (`name`, `description`, `product_id`, `language_id`) VALUES ('$name_en', '$description_en', '$pid', '1')";
                $res1=mysqli_query($this->conn,$sql1);

                $sql2="INSERT INTO `product_detail_i18n` (`name`, `description`, `product_id`, `language_id`) VALUES ('$name_de', '$description_de', '$pid', '2')";
                $res2=mysqli_query($this->conn,$sql2);
                
        }
    }
class admin_order Extends Connection{
        public function orderdeatils(){
                $sql="SELECT * FROM `order_detail`";
                $res=mysqli_query($this->conn,$sql);
                return $res;
        }
        public function orderSingledata($oid){
            $sql="SELECT * FROM `order_detail` WHERE `order_id`='$oid'";
            $res=mysqli_query($this->conn,$sql);
            return $res;
    }
        public function remove_order($order_id){
                $sql= "DELETE FROM `order_detail` WHERE `order_id`='$order_id'";
                $res= mysqli_query($this->conn, $sql);
                return $res;
            }
        public function getproduct($id){
            $query="SELECT product_detail.product_id,product_detail.product_image,product_detail.product_price,product_detail.product_brand, product_detail.product_quantity, product_detail_i18n.name,product_detail_i18n.description FROM product_detail,product_detail_i18n WHERE product_detail_i18n.language_id='1' AND product_detail.product_id='$id' AND product_detail_i18n.product_id=product_detail.product_id";
            $res=mysqli_query($this->conn, $query);
            return($res);
        }
        public function update($order_id,$status){
        $query="UPDATE `order_detail`  SET `order_status`='$status' WHERE `order_id`=$order_id";
        $res=mysqli_query($this->conn, $query);
        }
        
}
class invoice Extends Connection{
    public function insertInvoice($order_id,$file){
    $sql="INSERT INTO `invoice_details` (`order_id`, `invoide_name`) VALUES ('$order_id', '$file')";
    $res=mysqli_query($this->conn, $sql);
    return 1;
    }
}
?>