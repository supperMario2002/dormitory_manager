<?php
include "core/database.php";

class m_room extends DB{

    public function insert_room($name, $price,$user_id, $status , $max_num){
        $sql = "INSERT INTO rooms VALUES (null,'$name',$price, $max_num,$user_id,$status)";
        return $this->query($sql);
    }

    public function select_room(){
        $sql = "SELECT t1.*, users.name as user_name FROM users RIGHT JOIN 
        (SELECT rooms.* ,COUNT(contracts.room_id) AS count 
         FROM rooms INNER JOIN contracts 
         ON rooms.id = contracts.room_id 
         GROUP BY rooms.id) AS t1
         ON users.id = t1.user_id";
        return $this->get_list($sql);
    }

    public function get_room_by_id($id)
    {
        $sql = "SELECT * FROM rooms WHERE id = $id";
        return $this->get_row($sql);
    }

    public function update_room($id, $name, $price, $user_id, $status, $max_num)
    {
        $sql = "UPDATE rooms SET room_name = '$name', price = $price, max_num = $max_num, user_id = $user_id, status = $status WHERE id = $id";

        return $this->query($sql);
    }

    public function select_student(){
        $sql = "SELECT users.*, contracts.room_id,contracts.date_start, contracts.date_end FROM users INNER JOIN contracts ON users.username = contracts.student_id ";
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