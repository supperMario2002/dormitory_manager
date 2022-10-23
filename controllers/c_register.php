<?php
include_once "models/m_register.php";
class c_register{

    function index(){
        
        if(isset($_POST["submit"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];

            $insert = new m_register();
            $result = $insert->insert_account($username,md5($password),$email);

            if($result){
                echo "them thanh cong";
                die();
            }else{
                echo "them that bai";
                die();
            }

        }
        include "views/auth/register.php";
    }
}
?>