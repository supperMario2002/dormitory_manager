<?php
include "models/m_student.php";
include "core/controller.php";
class c_student extends controller{

    public function __construct()
    {
        $this->auth();
    }

    public function index(){
        $this->view("student/index");
    }

    public function create(){
        if(isset($_POST["submit"])){
            $id = $_POST["id"];
            $name = $_POST["name"];
            $sex = $_POST["gender"];
            $date_birth = $_POST["date_birth"];
            $address = $_POST["address"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $class = $_POST["class"];
            $faculty = $_POST["faculty"];
            $room_id = $_POST["room_id"];
            $date_start = $_POST["date_start"];
            $date_end = $_POST["date_end"];
            $avatar_url = ($_FILES['avatar']['error'] == 0) ? rand(0,1000).$_FILES['avatar']['name'] : "";

            $student = new m_student();
            $insert = $student->insert_student($id, $name, $sex, $date_birth, $address, $email, $phone, $class, $faculty, $room_id, $date_start, $date_end,$avatar_url, $_SESSION['user_id']);

            if($insert){
                if ($avatar_url != "") {
    
                    $filename = "public/avatar";
    
                    if(!file_exists( $filename )){
                        mkdir( $filename ,  0777 ,  TRUE  );
                        move_uploaded_file($_FILES['avatar']['tmp_name'], "public/avatar/" . $avatar_url);
    
                    }else{
                        move_uploaded_file($_FILES['avatar']['tmp_name'], "public/avatar/" . $avatar_url);
                    }
                }
                $_SESSION['suc'] = "Thêm sinh viên thành công";
                $this->redirect($this->base_url("student/index"));
            }
        }
        $this->view("student/create");
    }
}