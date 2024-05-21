<?php
include "core/database.php";

class m_home extends DB{


    public function getAllStudent(){
        $sql = "SELECT * FROM contracts";
        return $this->get_list($sql);
    }

    public function getAllRooms(){
        $sql = "SELECT * FROM rooms";
        return $this->get_list($sql);
    }

    public function checkNumStudent(){
        $sql = "SELECT rooms.id, COUNT(contracts.room_id) AS count FROM `contracts` RIGHT JOIN rooms ON contracts.room_id = rooms.id GROUP BY contracts.room_id";
        return $this->get_list($sql);
    }

    public function getAllUsers(){
        $sql = "SELECT * FROM users";
        return $this->get_list($sql);
    }
    
    public function getBgColor($id){
        $sql = "SELECT color_scheme FROM users WHERE id = $id";
        return $this->get_row($sql);

    }

    public function updateBgColor($valBg, $id){
        $sql = "UPDATE users SET color_scheme = $valBg WHERE id = $id";
        return $this->query($sql);
    }

    public function getAllEW()
    {
        $sql = "SELECT electric_water.*, rooms.room_name FROM electric_water INNER JOIN rooms ON electric_water.rooms_id = rooms.id";
        return $this->get_list($sql);
    }

    public function getAllMoneyRoom() {
        $sql = "SELECT 
        IFNULL(monthly_data.total_room_price, 0) AS total_room_price
    FROM
        (SELECT 1 AS month UNION SELECT 2 UNION SELECT 3 UNION SELECT 4 UNION SELECT 5 UNION SELECT 6
         UNION SELECT 7 UNION SELECT 8 UNION SELECT 9 UNION SELECT 10 UNION SELECT 11 UNION SELECT 12) AS months
    LEFT JOIN
        (SELECT 
            MONTH(STR_TO_DATE(liquidation, '%Y-%m-%d')) AS month,
            SUM(r.price) AS total_room_price
        FROM
            contracts c
        INNER JOIN
            rooms r ON c.room_id = r.id
        WHERE
            c.liquidation IS NOT NULL
        GROUP BY
            MONTH(STR_TO_DATE(liquidation, '%Y-%m-%d'))) AS monthly_data ON months.month = monthly_data.month
    ORDER BY
        months.month";
        return $this->get_list($sql);
    }
}