<?php
include_once "models/m_user.php";
class c_user extends controller
{

    public function forgetPassword()
    {
        $insert = new m_user();
        if (isset($_POST["email"])) {
            $check = $insert->checkEmail($_POST["email"]);
            if(count($check) != 0){
                echo 0;
            }else{
                echo 1;
            }
            return 1;
        }
        include "views/admin/auth/forget-password.php";
    }

    // public function register()
    // {

    //     if (isset($_POST["submit"])) {
    //         $username = $_POST["username"];
    //         $password = $_POST["password"];
    //         $email = $_POST["email"];

    //         $insert = new m_user();
    //         $result = $insert->insert_account($username, md5($password), $email);

    //         if ($result) {
    //             $this->redirect($this->base_url("login"));
    //             die();
    //         } else {
    //             echo "them that bai";
    //             die();
    //         }
    //     }
    //     include "views/admin/auth/register.php";
    // }

    public function login()
    {

        if (isset($_POST["submit"])) {
            $username = $_POST["username"];
            $password = $_POST["password"];

            if (!empty($_POST["checkbox-signin"])) {
                setcookie("username", $_POST["username"], time() + 86400);
                setcookie("password", $_POST["password"], time() + 86400);
            } else {
                setcookie("username", $_POST["username"], time() - 86400);
                setcookie("password", $_POST["password"], time() - 86400);
            }

            $insert = new m_user();
            $result = $insert->login_account($username, md5($password));

            if (!$result) {
                setcookie("err", "Sai tài khoản hoặc mật khẩu!", time() + 1, "/", "", 0);
                $this->redirect($this->base_url("admin/login"));
            } else {
                $_SESSION['login'] = $result;
                $this->redirect($this->base_url("admin/"));
            }
        }
        include "views/admin/auth/login.php";
    }

    public function logout()
    {
        session_destroy();
        $this->redirect($this->base_url("admin/login"));
    }

    public function index()
    {
        $result = new m_user();
        $user = $result->getAllUser();
        $this->view("admin/user/index", compact('user'));
    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $result = new m_user();
            $check_status = $result->getStatusByUserId($_GET["id"]);
            if ($check_status["status"] == 0) {
                $edit = $result->editStatus($_GET["id"], 1);
            } else {
                $edit = $result->editStatus($_GET["id"], 0);
            }
            if (!$edit) {
                setcookie("err", "Lỗi không đổi trạng thái đc!!", time() + 1, "/", "", 0);
            } else {
                setcookie("suc", "Thay đổi trạng thái thành công!", time() + 1, "/", "", 0);
            }
            $this->redirect($this->base_url("admin/user/index"));
        }
    }


    public function profile()
    {
        $this->view("admin/user/profile");
    }

    public function create(){
        
        if(isset($_POST["submit"])){
            $result = new m_user();
            $name = $_POST["name"];
            $sex = $_POST["gender"];
            $date_birth = $_POST["date_birth"];
            $address = $_POST["address"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $avatar_url = ($_FILES['avatar']['error'] == 0) ? rand(0, 1000) . $_FILES['avatar']['name'] : "avatar-default.png";

            $insert = $result->insert_user($name, $sex, $date_birth, $address, $email, $phone, $username, md5($password), $avatar_url);

            if ($insert) {
                if ($avatar_url != "") {

                    $filename = "public/avatar";

                    if (!file_exists($filename)) {
                        mkdir($filename,  0777,  TRUE);
                        move_uploaded_file($_FILES['avatar']['tmp_name'], "public/avatar/" . $avatar_url);
                    } else {
                        move_uploaded_file($_FILES['avatar']['tmp_name'], "public/avatar/" . $avatar_url);
                    }
                }
                setcookie("suc", "Thêm quản trị viên thành công!", time()+1, "/","", 0);
                $this->redirect($this->base_url("admin/user/index"));
            }
        }
        $this->view("admin/user/create");
    }
}
