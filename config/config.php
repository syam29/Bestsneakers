<?php
NAMESPACE project;
    class  Connection{
        public $dbhost="localhost";
        public $dbuser="root";
        public $dbpassword="";
        public $db_name="project";
        public $port="4306";
        public $conn;


        public function __construct(){
            $this->conn=mysqli_connect($this->dbhost,$this->dbuser,$this->dbpassword,$this->db_name,$this->port);   
        }
        
    }
?>