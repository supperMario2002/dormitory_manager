<?php 
require_once "database.php";
class m_register extends database{

    function insert_account($a,$b,$c){
        $sql = "INSERT INTO `users`(`id`, `username`, `password`, `email`) VALUES (null,?,?,?)";
        $this->setQuery($sql);
        return $this->loadRow(array($a,$b,$c));
    }
}