<?php
require_once "core/database.php";
class m_student extends DB
{

    public function insert_student($id, $name, $sex, $date_birth, $address, $email, $phone, $class, $faculty, $room_id, $date_start, $date_end, $avatar_url, $user_id)
    {
        $slq = "INSERT INTO students VALUES ($id, '$name', $sex, '$date_birth', '$address', '$email', '$phone', '$class', '$faculty', '$avatar_url')";
        $slq1 = "INSERT INTO contracts VALUES (null,'$id','$room_id','$user_id','$date_start','$date_end',1,null)";

        $resulst = $this->query($slq);
        if ($resulst) {
            $resulst1 = $this->query($slq1);
            if ($resulst1) {
                return true;
            }else{
                $sql2 = "DELETE FROM students WHERE id = $id";
                $resulst2 = $this->query($sql2);
                if($resulst2){
                    return false;
                }
            }
        }
        return false;
    }
}
