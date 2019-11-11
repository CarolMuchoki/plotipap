<?php
class Database{
 
    private $host = "localhost";
    private $db_name = "propertymanager";
    private $username = "root";
    private $password = "";
    public $conn;
 
    // get the database connection
    public  function getConnection(){
 
        $this->conn = null;
 
        // try{
        //     $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        //     $this->conn->exec("set names utf8");
        // }catch(PDOException $exception){
        //     echo "Connection error: " . $exception->getMessage();
        // }
        $this->conn = mysqli_connect($this->host,$this->username,$this->password,$this->db_name);
        return $this->conn;
    }
    public static function formatCurrency($value){
        return 'Ksh '.number_format($value,0,'.',',');
    }
}
?>