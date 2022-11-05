<?php
include_once "models/m_user.php";
include_once "core/controller.php";
class c_user extends controller {

    public function register(){
        
        if(isset($_POST["submit"])){
            $username = $_POST["username"];
            $password = $_POST["password"];
            $email = $_POST["email"];

            $insert = new m_user();
            $result = $insert->insert_account($username,md5($password),$email);

            if($result){
                $this->redirect($this->base_url("login"));
                die();
            }else{
                echo "them that bai"; 
                die();
            }

        }
        include "views/auth/register.php";
    }

    public function login(){
        
        if(isset($_POST["submit"])){
            $username = $_POST["username"];
            $password = $_POST["password"];

            $insert = new m_user();
            $result = $insert->login_account($username,md5($password));

            if(!$result){
                $_SESSION['error_login'] = "Tài khoản hoặc mật khẩu không đúng";
                $this->redirect($this->base_url("login"));
                
                
            }else{
                $_SESSION['auth_login'] = $result['username'];
                $_SESSION['user_id'] = $result['id'];
                $this->redirect($this->base_url(""));
            }

        }
        include "views/auth/login.php";
    }

    public function logout(){
        unset($_SESSION['auth_login']);
        $this->redirect($this->base_url("login"));
    }

}
