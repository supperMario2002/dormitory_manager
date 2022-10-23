<?php
require_once("config.php");
class database{
    protected $conn = NULL;
    protected $result = NULL;

    public function __construct() {
        try
        {
            $this->conn = new mysqli(DB_HOST,DB_NAME,DB_USER,DB_PWD);
            mysqli_set_charset($this->conn, 'utf8');

        }
        catch(PDOException $ex )
        {
            die($ex->getMessage());
        }
    }

    //thực thi truy vấn 
    public function execute($sql){
        $this->result = $this->conn->query($sql);
        return $this->result;
    }

    //Phương thức lấy dữ liệu
    public function getData(){
        if($this->resullt){
            $data = mysqli_fetch_array($this->result);
        }else{
            $data = 0;
        }
        return $data;
    }

    //Phuong thuc lay toan bo du lieu
    public function getAllData(){
        if(!$this->result){
           $data = 0;
        }else{
            while($datas = $this->getData()){
                $data[] = $datas;
            }
        }
        return $data;
    }
}