<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
include "models/m_home.php";
include_once "core/controller.php";
class c_home extends controller{

    public function __construct()
    {
        $this->auth();
    }

    public function index(){

        $today = date("Y-m-d");
        $result = new m_home();
        $students = $result->getAllStudent();

        $students_end = [];
        foreach($students as $key => $value){
            if(strtotime($value["date_end"]) < strtotime($today) ){
                array_push($students_end, $value);
            }
        }
        $this->view("home/index", compact('students','students_end'));
    }
}