<?php
include "core/database.php";

class m_room extends DB{

    public function insert_room($name, $user_id, $status, $describes){
        $sql = "INSERT INTO rooms VALUES (null,'$name',$user_id,'$status','$describes')";
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

    public function update_room($id, $name, $user_id, $status, $describes)
    {
        $sql = "UPDATE rooms SET name = '$name', user_id = '$user_id', status = '$status', describes = '$describes' WHERE id = '$id'";
        return $this->query($sql);
    }

    public function select_student(){
        $sql = "SELECT students.*, contracts.room_id,contracts.date_start, contracts.date_end FROM students INNER JOIN contracts ON students.id = contracts.student_id ";
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
}

?>