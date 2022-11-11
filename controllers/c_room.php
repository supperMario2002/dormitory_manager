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

        $this->view("room/index", compact('list_room', 'students'));
    }

    public function create(){
        if(isset($_POST["submit"])){
            $name = $_POST["name"];
            $status= $_POST["status"];
            $user_id = $_POST["user_id"];
            $describes = $_POST["describes"];

            $insert = new m_room();
            $result = $insert->insert_room($name, $user_id, $status, $describes);

            if(!$result){
                setcookie("err", "Tên phòng đã có!", time()+1, "/","", 0);
            }else{
                setcookie("suc", "Thêm phòng thành công", time()+1, "/","", 0);
                $this->redirect($this->base_url("room/index"));
            }
        }
        $this->view("room/create");
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
                $describes = $_POST["describes"];
                $update = $select->update_room($_GET["id"],$name, $user_id, $status, $describes);
                if(!$update){
                    setcookie("err", "Tên phòng đã có!", time()+1, "/","", 0);
                }else{
                    setcookie("suc", "Sửa phòng thành công", time()+1, "/","", 0);
                    $this->redirect($this->base_url("room/index"));
                }
            }
        }
        $this->view("room/edit", compact('room','user'));
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
            
            $this->redirect($this->base_url("room/index"));
        }
    }

}
?>