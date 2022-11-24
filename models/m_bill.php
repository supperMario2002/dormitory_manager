<?php
include "core/database.php";
class m_bill extends DB{

    public function getAllRooms(){
        $sql = "SELECT * FROM rooms";
        return $this->get_list($sql);
    }

    public function insertBillEW($room_id, $e_first, $e_last, $price_per_e, $w_first, $w_last, $price_per_w, $start_date, $end_date, $status, $payment){
        $sql = "INSERT INTO electric_water 
                VALUES (null,$e_first, $e_last, $price_per_e, $w_first, $w_last, $price_per_w, $room_id, '$start_date', '$end_date', $status, $payment)";

        return $this->query($sql);
    }
}
?>