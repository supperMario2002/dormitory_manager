<?php
class c_service extends controller {

    function __construct()
    {
        $this->auth();
        $this->permission(0);
    }

    public function index(){
        $this->view("admin/service/index");
    }

    public function create(){
        $this->view("admin/service/create");
    }
}