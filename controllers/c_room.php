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
        $this->view("room/index", $list_room);
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
                $_SESSION["err"] = "Tên phòng đã có";
            }else{
                $_SESSION["suc"] = "Thêm phòng thành công";
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
            $this->view("room/edit", $room);
        }
    }
}
?>