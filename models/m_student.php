<?php
require_once "core/database.php";
class m_student extends DB
{

    public function get_all_students(){
        $sql = "SELECT * FROM contracts INNER JOIN students ON contracts.student_id = students.id ";
        return $this->get_list($sql);
    }

    public function get_all_room(){
        $sql ="SELECT * FROM rooms";
        return $this->get_list($sql);
    }

    public function insert_student($id, $name, $sex, $date_birth, $address, $email, $phone, $class, $room_id, $date_start, $date_end, $avatar_url)
    {
        $sql = "INSERT INTO students VALUES ($id, '$name', $sex, '$date_birth', '$address', '$email', '$phone', '$class', '$avatar_url')";
        $sql1 = "INSERT INTO contracts VALUES (null, $id, $room_id,'$date_start','$date_end',1,null)";

        $resulst = $this->query($sql);
        if ($resulst) {
            $resulst1 = $this->query($sql1);
            if (!$resulst1) {
                $sql2 = "DELETE FROM students WHERE id = $id";
                $resulst2 = $this->query($sql2);
                // die($sql2);
                if($resulst2){
                    return false;
                }
            }else{
                return true;
            }
        }
        return false;
    }
}
