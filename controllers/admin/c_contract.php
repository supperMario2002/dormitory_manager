<?php
include "models/m_contract.php";
class c_contract extends controller {

    function __construct()
    {
        $this->auth();
        $this->permission(0);
    }

    public function index(){
        $result = new m_contract();
        $contract = $result->getAllContract();
        $this->view("admin/contract/index", compact('contract'));
    }

    public function create(){
        $result = new m_contract();
        $students = $result->getAllStudent();
        $rooms = $result->getAllRooms();
        
        $this->view("admin/contract/create", compact('students','rooms'));
    }
    public function update(){
        $result = new m_contract();
        if(isset($_GET['id'])){
            $update = $result->updateLiqui($_GET['id']);
            if(!$update){
                setcookie("err", "Thanh lý không thành công!", time()+1, "/","", 0);
            }else{
                setcookie("suc", "Thanh lý thành công", time()+1, "/","", 0);
                $this->redirect($this->base_url("admin/contract/index"));
            }
        }
    }
}