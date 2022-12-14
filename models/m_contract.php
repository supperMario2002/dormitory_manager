<?php
include "core/database.php";

class m_contract extends DB{

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
