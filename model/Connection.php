<?php
class Connection{
    protected $con;
    private $host ="localhost";
    private $dbname = "veritabani";
    private $username = "kullaniciadi";
    private $password = "parolaniz";

    function __construct()
    {
        try{
            $this->con = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname.";charset=utf8", $this->username,$this->password);
        }
        catch (PDOException $e){
            die("Veritabanına bağlantı sağlanamadı.". $e->getMessage());
        }
    }
}
