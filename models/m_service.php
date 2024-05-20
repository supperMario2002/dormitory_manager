<?php
include "core/database.php";

class m_service extends DB
{
    public function insert_service($name, $describe, $price, $status)
    {
        $sql = "INSERT INTO `services`(`id`, `name`, `describe`, `price`, `status`) 
                VALUES (null,'$name','$describe',$price,$status)";
        return $this->query($sql);
    }

    public function getAllService()
    {
        $sql = "SELECT * FROM `services` WHERE 1";
        return $this->get_list($sql);
    }

    public function getAllServiceByID($id)
    {
        $sql = "SELECT * FROM `services` WHERE id = $id";
        return $this->get_row($sql);
    }

    public function update_service($id, $name, $describe, $price, $status)
    {
        $sql = "UPDATE `services` SET `name`='$name',`describe`='$describe',`price`=$price,`status`=$status WHERE id = $id";
        return $this->query($sql);
    }

    public function delete_service($id)
    {
        $sql = "DELETE FROM `services` WHERE id=$id";
        return $this->query($sql);
    }

    public function getAllOderServices() {
        $sql ="SELECT 
        order_service.id AS order_id,
        users.id AS student_id,
        users.name AS student_name,
        users.email AS student_email,
        services.id AS service_id,
        services.name AS service_name,
        services.price AS service_price,
        rooms.id AS room_id,
        rooms.room_name AS room_name,
        order_service.quanlity,
        order_service.total_price,
        order_service.oder_date,
        order_service.order_status,
        order_service.status
    FROM 
        order_service
    JOIN 
        users ON order_service.student_id = users.id
    JOIN 
        services ON order_service.service_id = services.id
    JOIN 
        rooms ON order_service.room_id = rooms.id";
    
    return $this->get_list($sql);
    }

    public function update_oder_status_acceot($id) {
        $sql = "UPDATE `order_service` SET `order_status` = 1 WHERE id = $id";
        return $this->query($sql);
    }

    public function update_oder_status_deactive($id) {
        $sql = "UPDATE `order_service` SET `order_status` = 2 WHERE id = $id";
        return $this->query($sql);
    }
}
