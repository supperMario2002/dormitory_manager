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
}