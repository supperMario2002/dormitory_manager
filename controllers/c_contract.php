<?php
include "models/m_contract.php";
class c_contract extends controller{
    public function __construct()
    {
        $this->auth();
    }

    public function index(){
        $result = new m_contract();
        $contract = $result->getRoomByIdUser($_SESSION["login"]["username"]);
        $student = $result->getStudentByRoomsId($contract["student_id"]);
        $checkContract = $result->checkContract($_SESSION["login"]["username"]);
        $this->view("contract/index", compact('contract','student','checkContract'));
    }


}
?>