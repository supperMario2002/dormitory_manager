<?php
include "models/m_bill.php";
include "core/controller.php";

class c_bill extends controller{
    
    public function __construct()
    {
        $this->auth();
    }

    public function createEWB(){
        $result = new m_bill();
        $rooms = $result->getAllRooms();
        if(isset($_POST["submit"])){
            $room_id = $_POST["room_id"];
            $e_first = $_POST["e_first"];
            $e_last = $_POST["e_last"];
            $price_per_e = $_POST["price_per_e"];
            $w_first = $_POST["w_first"];
            $w_last = $_POST["w_last"];
            $price_per_w = $_POST["price_per_w"];
            $start_date = $_POST["start_date"];
            $end_date = $_POST["end_date"];
            $status = $_POST["status"];
            $payment = isset($_POST["payment"]) ? $_POST["payment"] : 3;

            $insert = $result->insertBillEW($room_id, $e_first, $e_last, $price_per_e, $w_first, $w_last, $price_per_w, $start_date, $end_date, $status, $payment);
            
        }
        $this->view("admin/bill/createElectricWaterBill", compact('rooms'));
    }
}
?>