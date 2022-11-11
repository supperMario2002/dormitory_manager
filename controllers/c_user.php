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
                $_SESSION['status_user'] = $result['status'];
                $this->redirect($this->base_url(""));
            }

        }
        include "views/auth/login.php";
    }

    public function logout(){
        unset($_SESSION['auth_login']);
        $this->redirect($this->base_url("login"));
    }

    public function index(){
        $result = new m_user();
        $user = $result->getAllUser();
        $this->view("user/index",compact('user'));
    }

    public function edit(){
        if(isset($_GET['id'])){
            $result = new m_user();
            $check_status = $result->getStatusByUserId($_GET["id"]);
            if($check_status["status"] == 0){
                $edit = $result->editStatus($_GET["id"], 1);
            }else{
                $edit = $result->editStatus($_GET["id"], 0);
            }
            if(!$edit){
                $_SESSION["err"] = "Lỗi không đổi trạng thái đc!!";
            }else{
                $_SESSION["suc"] = "Thay đổi trạng thái thành công!";
            }
            $this->redirect($this->base_url("user/index"));
        }
    }
}
