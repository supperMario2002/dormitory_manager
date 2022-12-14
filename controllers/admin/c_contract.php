<?php
include "models/m_contract.php";
class contract extends controller {

    function __construct()
    {
        $this->auth();
        $this->permission(0);
    }

    public function index(){
        
    }
}