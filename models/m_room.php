<?php
include "core/database.php";

class m_room extends DB{

    public function insert_room($name, $price,$user_id, $status , $max_num,$area){
        $sql = "INSERT INTO rooms VALUES (null,'$name',$price, $max_num,$user_id,$status,$area)";
        return $this->query($sql);
    }

    public function select_room(){
        $sql = "SELECT t1.*, users.name AS user_name
        FROM users
        RIGHT JOIN (
            SELECT rooms.*, COUNT(DISTINCT CASE WHEN contracts.liquidation IS NULL THEN contracts.student_id END) AS count
            FROM rooms
            LEFT JOIN contracts ON rooms.id = contracts.room_id
            GROUP BY rooms.id
        ) AS t1 ON users.id = t1.user_id LIMIT 0, 25";
        return $this->get_list($sql);
    }

    public function get_room_by_id($id)
    {
        $sql = "SELECT * FROM rooms WHERE id = $id";
        return $this->get_row($sql);
    }

    public function update_room($id, $name, $price, $user_id, $status, $max_num,$area)
    {
        $sql = "UPDATE rooms SET room_name = '$name', price = $price, max_num = $max_num, user_id = $user_id, status = $status, area = $area WHERE id = $id";

        return $this->query($sql);
    }

    public function select_student(){
        $sql = "SELECT users.*, contracts.room_id,contracts.date_start, contracts.date_end, contracts.liquidation FROM users INNER JOIN contracts ON users.username = contracts.student_id WHERE contracts.liquidation IS NULL";
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

    public function getRoomByIdUser($id){
        // $sql = "SELECT t1.*, users.* FROM users INNER JOIN
        // (SELECT rooms.*, contracts.room_id 
        //  FROM contracts  INNER JOIN rooms  ON contracts.room_id = rooms.id
        //  WHERE student_id = $id AND contracts.liquidation IS NULL) as t1
        //  ON users.id = t1.user_id";
        $sql = "SELECT t1.*, users.status AS user_status, users.* FROM users INNER JOIN
        (SELECT rooms.*, contracts.room_id, rooms.status AS room_status
         FROM contracts INNER JOIN rooms ON contracts.room_id = rooms.id
         WHERE student_id = $id AND contracts.liquidation IS NULL) AS t1
         ON users.id = t1.user_id;";

        return $this->get_row($sql);

    }

    public function getStudentByRoomsId($room_id){
        // echo $room_id;
        // die();
        $sql = "SELECT users.*, contracts.room_id,contracts.date_start, contracts.date_end, contracts.liquidation FROM users INNER JOIN contracts ON users.username = contracts.student_id WHERE contracts.liquidation IS NULL AND contracts.room_id = $room_id";
        return $this->get_list($sql);
    }

}