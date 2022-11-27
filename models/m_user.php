<?php 
require_once "core/database.php";
class m_user extends DB{

    function login_account($a,$b){
        $sql = "SELECT *  FROM users WHERE username = '$a' AND password = '$b'";
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

    public function insert_user($name, $sex, $date_birth, $address, $email, $phone, $username, $password, $avatar_url){
        $sql = "INSERT INTO users VALUES (null, '$username', '$password','$name', $sex, '$date_birth', '$address', '$email', '$phone',  '$avatar_url', 0, 1)";

        return $this->query($sql);
    }
}