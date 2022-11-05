<?php
include_once "core/controller.php";
class c_home extends controller{

    public function __construct()
    {
        $this->auth();
    }

    public function index(){
        $this->view("home/index");
    }
}