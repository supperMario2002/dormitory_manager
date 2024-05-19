<?php
include "models/m_bill.php";
class c_bill extends controller{
    public function __construct()
    {
        $this->auth();
    }

    public function index(){
        $result = new m_bill();
        $contract = $result->getRoomId($_SESSION["login"]["username"]);
        $bills = !empty($contract["room_id"]) ? $result->getBillByRoomId($contract["room_id"]) : $result->getBillByRoomId(9999);
        $selectedPaymentMethod = isset($_POST['billingOptions']) ? $_POST['billingOptions'] : null;
        if($selectedPaymentMethod == 'momo'){
            $billId = $_POST["bill_id"];
            $update = $result->updateStatus($billId);
            include "api/momo.php";
            
        }
        if($selectedPaymentMethod == 'zalopay'){
            $total =  $_POST["total"];
            $billId = $_POST["bill_id"];
            $update = $result->updateStatus($billId);
            $appid = '554'; // lấy từ cấu hình trong .env
            $key1 = '8NdU5pG5R2spGHGhyO99HN1OhD8IQJBn';
            $key2 = 'uUfsWgfLkRLzq6W2uNXTCxrfxs51auny';
            $endpoint ='https://sandbox.zalopay.com.vn/v001/tpe/createorder';
            $redirecturl = 'http://localhost/dormitory_manager/bill/index';
            $embeddata = [
                "merchantinfo" => "embeddata123",
                "redirecturl" => "$redirecturl?code=" . rand(10,100) . "&order_ticket=" . rand(10,100),
            ];
            $items = [
                [
                    "Mã đơn hàng" => rand(10,100),
                    "Đơn giá" => $total,
                ]
            ];
            $order = [
                "appid" => $appid,
                "apptime" => round(microtime(true) * 1000), // miliseconds
                "apptransid" => date("ymd") . "_" . uniqid(), // mã giao dich có định dạng yyMMdd_xxxx
                "appuser" => "demo",
                "item" => json_encode($items, JSON_UNESCAPED_UNICODE),
                "embeddata" => json_encode($embeddata, JSON_UNESCAPED_UNICODE),
                "amount" =>  $total,
                "code" =>  rand(10,100),
                "description" => "WEBSITE QUẢN LÝ KÝ TÚC XÁ ĐHTNMT- Thanh toán đơn hàng : " . rand(10,100),
                "bankcode" => "zalopayapp",
            ];
            $data = $order["appid"] . "|" . $order["apptransid"] . "|" . $order["appuser"] . "|" . $order["amount"]
                . "|" . $order["apptime"] . "|" . $order["embeddata"] .  "|" . $order["item"];
            $order["mac"] = hash_hmac("sha256", $data, $key1);

            $context = stream_context_create([
                "http" => [
                    "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                    "method" => "POST",
                    "content" => http_build_query($order)
                ]
            ]);
            $resp = file_get_contents($endpoint, false, $context);
            $result = json_decode($resp, true);
            $url = $result['orderurl'];
            header("location: $url");
        }
        if($selectedPaymentMethod == 'cash'){
            $billId = $_POST["bill_id"];
            $update = $result->updateStatus($billId);
            header("location: http://localhost/dormitory_manager/bill/index");
        }
        $this->view("bill/bill", compact('bills'));
    }

    public function contracindex() {
        $result = new m_bill();
        $bill_contract = $result->getContracByStundet($_SESSION["login"]["username"]);
        $selectedPaymentMethod = isset($_POST['billingOptions']) ? $_POST['billingOptions'] : null;
        if($selectedPaymentMethod == 'momo'){
            $billId = $_POST["bill_id"];
            $update = $result->updateStatusContract($billId);
            include "api/momo.php";
            
        }
        if($selectedPaymentMethod == 'zalopay'){
            $total =  $_POST["total"];
            $billId = $_POST["bill_id"];
            $update = $result->updateStatusContract($billId);
            $appid = '554'; // lấy từ cấu hình trong .env
            $key1 = '8NdU5pG5R2spGHGhyO99HN1OhD8IQJBn';
            $key2 = 'uUfsWgfLkRLzq6W2uNXTCxrfxs51auny';
            $endpoint ='https://sandbox.zalopay.com.vn/v001/tpe/createorder';
            $redirecturl = 'http://localhost/dormitory_manager/bill/index';
            $embeddata = [
                "merchantinfo" => "embeddata123",
                "redirecturl" => "$redirecturl?code=" . rand(10,100) . "&order_ticket=" . rand(10,100),
            ];
            $items = [
                [
                    "Mã đơn hàng" => rand(10,100),
                    "Đơn giá" => $total,
                ]
            ];
            $order = [
                "appid" => $appid,
                "apptime" => round(microtime(true) * 1000), // miliseconds
                "apptransid" => date("ymd") . "_" . uniqid(), // mã giao dich có định dạng yyMMdd_xxxx
                "appuser" => "demo",
                "item" => json_encode($items, JSON_UNESCAPED_UNICODE),
                "embeddata" => json_encode($embeddata, JSON_UNESCAPED_UNICODE),
                "amount" =>  $total,
                "code" =>  rand(10,100),
                "description" => "WEBSITE QUẢN LÝ KÝ TÚC XÁ ĐHTNMT- Thanh toán đơn hàng : " . rand(10,100),
                "bankcode" => "zalopayapp",
            ];
            $data = $order["appid"] . "|" . $order["apptransid"] . "|" . $order["appuser"] . "|" . $order["amount"]
                . "|" . $order["apptime"] . "|" . $order["embeddata"] .  "|" . $order["item"];
            $order["mac"] = hash_hmac("sha256", $data, $key1);

            $context = stream_context_create([
                "http" => [
                    "header" => "Content-type: application/x-www-form-urlencoded\r\n",
                    "method" => "POST",
                    "content" => http_build_query($order)
                ]
            ]);
            $resp = file_get_contents($endpoint, false, $context);
            $result = json_decode($resp, true);
            $url = $result['orderurl'];
            header("location: $url");
        }
        if($selectedPaymentMethod == 'cash'){
            $billId = $_POST["bill_id"];
            $update = $result->updateStatusContract($billId);
            header("location: http://localhost/dormitory_manager/bill/index");
        }
        $this->view("bill/billContrac", compact('bill_contract'));
    }

    public function serviceindex() {
        $result = new m_bill();
        $oder_services = $result->getAllOderServices();
        $this->view("bill/billService", compact('oder_services'));
    }

    public function createservice() {
        $result = new m_bill();
        $services = $result->getAllOderServices();
        if(isset($_POST['submit'])){
            $service_id = $_POST['service_id'];
            $quanlity = $_POST['quanlity'];
            $total_price = str_replace(',', '', $_POST['total_price']);
            $create = $result->createServiceOrder($_SESSION["login"]["id"],$service_id,$quanlity,$total_price);
            if(!$create){
                setcookie("err", "Lỗi tạo đơn hàng!", time()+1, "/","", 0);
            }else{
                setcookie("suc", "Gửi đơn hàng thành công", time()+1, "/","", 0);
                $this->redirect($this->base_url("bill/serviceindex"));
            }
        }
        $this->view("bill/createService", compact("services"));
    }
}