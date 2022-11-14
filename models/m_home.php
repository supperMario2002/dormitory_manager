<?php
include "core/database.php";

class m_home extends DB{


    public function getAllStudent(){
        $sql = "SELECT * FROM contracts";
        return $this->get_list($sql);
    }
}