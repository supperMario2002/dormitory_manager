<?php
include "models/m_home.php";
class c_home extends controller {

    function __construct()
    {
        $this->auth();
    }

    public function index(){
        $this->view("home/index");
    }
}
?>