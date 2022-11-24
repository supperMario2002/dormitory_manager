<?php 
require_once "core/database.php";
class m_user extends DB{


    function insert_account($a,$b,$c){
        // $data = [
        //     'username' => $a,
        //     'password' => $b,
        //     'email' => $c,
        // ];
        // $b = $this->insert('users', $data);
        // return $b;
        return false;
    }

    function login_account($a,$b){
        $sql = "SELECT * FROM users WHERE username = '$a' AND password = '$b'";
        $b = $this->get_row($sql);
        return $b;
    }

    public function getAllUser(){
        $sql = "SELECT * FROM users";
        return $this->get_list($sql);
    }

    public function editStatus($id, $status){
        $sql = "UPDATE users SET status = $status WHERE id = $id";
        return $this->query($sql);
    }

    public function getStatusByUserId($id){
        $sql = "SELECT status FROM users WHERE id = $id";
        return $this->get_row($sql);
    }

    public function checkEmail($email){
        $sql = "SELECT * FROM users WHERE email = '$email'";
        return $this->get_list($sql);
    }
}