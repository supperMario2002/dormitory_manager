<?php
include "core/database.php";

class m_contract extends DB{


    public function getAllRooms(){
        $sql = "SELECT * FROM rooms";
        return $this->get_list($sql);
    }

    public function getAllStudent(){
        $sql = "SELECT * FROM users WHERE role = 1";
        return $this->get_list($sql);
    }

    public function getAllContract(){
        $sql = "SELECT * FROM contracts";
        return $this->get_list($sql);
    }

    public function getRoomByIdUser($id){
        $sql = "SELECT t1.*, users.name , users.sex, users.email, users.phone FROM users INNER JOIN
        (SELECT rooms.*, contracts.room_id , contracts.student_id , contracts.id as contract_id , contracts.date_start,contracts.date_end
         FROM contracts  INNER JOIN rooms  ON contracts.room_id = rooms.id
         WHERE student_id = $id) as t1
         ON users.id = t1.user_id";

        return $this->get_row($sql);

    }

    public function getStudentByRoomsId($id){
        $sql = "SELECT * FROM users WHERE username = $id";
        return $this->get_row($sql);
    }


}
