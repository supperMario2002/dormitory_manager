<?php
include_once "core/controller.php";
class c_home extends controller{

    public function index(){
        
         $this->view("home/index");
    }
}