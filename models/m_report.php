<?php
include "core/database.php";
class m_report extends DB{

    public function create_report($student_id,$title, $message){
        $sql = "INSERT INTO reports VALUES (NULL,NULL,'$student_id','$title', '$message',NULL,0)";
        return $this->query($sql);
    }
}