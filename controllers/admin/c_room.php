<?php
include "core/controller.php";
include "models/m_room.php";
class c_room extends controller{

    public function __construct()
    {
        $this->auth();
    }

    public function index(){
        $select = new m_room();
        $list_room = $select->select_room();
        $students = $select->select_student();

        $this->view("admin/room/index", compact('list_room', 'students'));
    }

    public function create(){
        $insert = new m_room();
        $users = $insert->getAllUser();
        if(isset($_POST["submit"])){
            $name = $_POST["name"];
            $status= $_POST["status"];
            $user_id = $_POST["user_id"];
            $price  = $_POST["price"];
            $max_num = $_POST["max_num"];

            $result = $insert->insert_room($name, $price,$user_id, $status, $max_num);
            if(!$result){
                setcookie("err", "Tên phòng đã có!", time()+1, "/","", 0);
            }else{
                setcookie("suc", "Thêm phòng thành công", time()+1, "/","", 0);
                $this->redirect($this->base_url("admin/room/index"));
            }
        }
        $this->view("admin/room/create", compact('users'));
    }

    public function edit(){
        if(isset($_GET["id"])){
            $room_id = $_GET["id"];
            $select = new m_room();
            $room = $select->get_room_by_id($room_id);
            $user = $select->select_all_user();
            if(isset($_POST["submit"])){
                $name = $_POST["name"];
                $user_id = $_POST["user_id"];
                $status= $_POST["status"];
                $price  = $_POST["price"];
                $max_num = $_POST["max_num"];
                $update = $select->update_room($_GET["id"],$name, $price, $user_id, $status, $max_num);
                if(!$update){
                    setcookie("err", "Tên phòng đã có!", time()+1, "/","", 0);
                }else{
                    setcookie("suc", "Sửa phòng thành công", time()+1, "/","", 0);
                    $this->redirect($this->base_url("admin/room/index"));
                }
            }
        }
        $this->view("admin/room/edit", compact('room','user'));
    }

    public function delete(){
        if(isset($_GET["id"])){
            $result = new m_room();

            $students = $result->getStudentByRoomId($_GET["id"]);
            if(count($students) == 0){
                $del = $result->delete_room($_GET["id"]);
                if(!$del){
                    setcookie("err", "Không được xóa!", time()+1, "/","", 0);
                }else{
                    setcookie("suc", "Xóa thành công!", time()+1, "/","", 0);
                }
            }else{
                setcookie("err", "Không được xóa!! Vẫn còn người ở trong phòng!!", time()+1, "/","", 0);
            }
            
            $this->redirect($this->base_url("admin/room/index"));
        }
    }

    public function editstudent(){
        if(isset($_GET["editStudent"])){
            $room_id = $_GET["id"];
            $select = new m_room();
            $students = $select->select_student_by_id($room_id);
        }
        return $this->view("admin/room/editStudent", compact('students'));
    }

}
?>