<?php
include "core/database.php";

class m_contract extends DB{



    public function getAllRoomsByGender($sex){
        $sql = "SELECT t1.*, users.name AS user_name 
        FROM users 
        RIGHT JOIN (
            SELECT rooms.*, COUNT(DISTINCT CASE WHEN contracts.liquidation IS NULL THEN contracts.student_id END) AS count
            FROM rooms 
            LEFT JOIN contracts ON rooms.id = contracts.room_id 
            WHERE rooms.status = 1
            GROUP BY rooms.id
        ) AS t1
        ON users.id = t1.user_id WHERE area = $sex AND max_num != COUNT";
        return $this->get_list($sql);

    }
    public function getAllRooms(){
        $sql = "SELECT * FROM rooms";
        return $this->get_list($sql);
    }

    public function getAllStudent(){
        $sql = "SELECT users.*
        FROM users
        LEFT JOIN contracts ON users.username = contracts.student_id
        WHERE users.role = 1
          AND users.username NOT IN (
              SELECT student_id
              FROM contracts
              WHERE liquidation IS NULL)";
        return $this->get_list($sql);
    }

    public function getAllContract(){
        $sql = "SELECT contracts.*, users.username, users.name, users.sex
        FROM contracts
        JOIN users ON contracts.student_id = users.username
        WHERE liquidation is null";
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

    public function updateLiqui($id){
        $sql = "UPDATE contracts SET liquidation = '" . date('Y-m-d') . "' WHERE id = $id";
        return $this->query($sql);
    }

    public function insert_contract($admin_id, $user_id, $room_id, $date_start, $date_end, $method_payment){
        $sql = "INSERT INTO `contracts`(`id`, `student_id`, `room_id`, `user_id`, `date_start`, `date_end`, `method_payment`, `status`, `liquidation`) 
        VALUES (null,$user_id,$room_id,$admin_id,'$date_start','$date_end',$method_payment,0,null)";

        return $this->query($sql);
    }
    public function getAllContractLiqui(){
        $sql = "SELECT contracts.*, users.username, users.name, users.sex
        FROM contracts
        JOIN users ON contracts.student_id = users.username
        WHERE contracts.liquidation IS NOT NULL OR DATEDIFF(contracts.date_end, CURDATE()) < 0";
        return $this->get_list($sql);
    }
    public function checkContract($id){
        $sql = "SELECT * FROM contracts WHERE student_id = $id";
        die($sql);
        return $this->get_list($sql);
    }
    public function deleteContractLiqui($id){
        $sql = "DELETE FROM contracts WHERE id = $id";
        return $this->query($sql);
    }
}
