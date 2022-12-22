<?php
class c_report extends controller {

    function __construct()
    {
        $this->auth();
        $this->permission(0);
    }

    public function index(){
        
        $this->view("admin/report/index");
    }
}