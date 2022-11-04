<?php
include "core/controller.php";
class c_student extends controller{

    public function index(){
        $this->view("student/index");
    }
}