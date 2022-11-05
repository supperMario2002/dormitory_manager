<?php 
require_once "core/database.php";
class m_user extends DB{


    function insert_account($a,$b,$c){
        $data = [
            'username' => $a,
            'password' => $b,
            'email' => $c,
        ];
        $b = $this->insert('users', $data);
        return $b;
    }

    function login_account($a,$b){
        $sql = "SELECT * FROM users WHERE username = '$a' AND password = '$b'";
        $b = $this->get_row($sql);
        return $b;
    }
    

}