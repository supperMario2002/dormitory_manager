<?php
require_once "core/database.php";
class m_student extends DB
{

    public function get_all_students()
    {
        $sql = "SELECT students.*, contracts.room_id,contracts.date_start, contracts.date_end FROM students INNER JOIN contracts ON students.id = contracts.student_id ";
        return $this->get_list($sql);
    }

    public function get_all_room()
    {
        $sql = "SELECT * FROM rooms";
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
                if ($resulst2) {
                    return false;
                }
            } else {
                return true;
            }
        }
        return false;
    }

    public function get_student_by_id($id)
    {
        $sql = "SELECT students.*, contracts.room_id,contracts.date_start, contracts.date_end  FROM students INNER JOIN contracts ON students.id = contracts.student_id WHERE students.id = $id";
        return $this->get_row($sql);
    }

    public function update_student_by_id($id, $name, $sex, $date_birth, $address, $email, $phone, $class, $room_id, $date_start, $date_end, $avatar_url, $id_edit)
    {
        $sql = "UPDATE students 
                SET id=$id,name='$name',sex=$sex,date_birth='$date_birth',address='$address',email='$email',
                phone='$phone',class='$class',avatar='$avatar_url' WHERE id = $id_edit";
        $sql1 = "UPDATE contracts SET room_id=$room_id,date_start='$date_start',date_end='$date_end' WHERE student_id = $id_edit";
        $resulst =  $this->query($sql);
        if(!$resulst){
            return false;
        }else{
            return $this->query($sql1);
        }
    }

    public function delete_student($id){
        $sql = "DELETE FROM students WHERE id=$id";
        return $this->query($sql);
    }
}
