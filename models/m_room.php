<?php
include "core/database.php";

class m_room extends DB{

    public function insert_room($name, $price,$user_id, $status , $max_num){
        $sql = "INSERT INTO rooms VALUES (null,'$name',$price, $max_num,$user_id,$status)";
        return $this->query($sql);
    }

    public function select_room(){
        $sql = "SELECT rooms.*, users.name as name_user FROM rooms INNER JOIN users ON rooms.user_id = users.id  ";
        return $this->get_list($sql);
    }

    public function get_room_by_id($id)
    {
        $sql = "SELECT * FROM rooms WHERE id = $id";
        return $this->get_row($sql);
    }

    public function select_all_user(){
        $sql = "SELECT id,name FROM users";
        return $this->get_list($sql);
    }

    public function update_room($id, $name, $price, $user_id, $status, $max_num)
    {
        $sql = "UPDATE rooms SET room_name = '$name', price = $price, max_num = $max_num, user_id = $user_id, status = $status WHERE id = $id";

        return $this->query($sql);
    }

    public function select_student(){
        $sql = "SELECT students.*, contracts.room_id,contracts.date_start, contracts.date_end FROM students INNER JOIN contracts ON students.id = contracts.student_id ";
        return $this->get_list($sql);
    }

    public function select_student_by_id($id){
        $sql = "SELECT students.*, contracts.room_id,contracts.date_start, contracts.date_end FROM students INNER JOIN contracts ON students.id = contracts.student_id WHERE room_id = $id";
        return $this->get_list($sql);
    }

    public function delete_room($id){
        $sql = "DELETE FROM rooms WHERE id=$id";
        return $this->query($sql);
    }

    public function getStudentByRoomId($id){
        $sql = "SELECT * FROM contracts WHERE room_id = $id";
        return $this->get_list($sql);
    }

    public function getAllUser(){
        $sql = "SELECT * FROM users  WHERE role = 0 " ;
        return $this->get_list($sql);

    }
}

?>