<?php

class DB {
    public $pdo;
    
    public function __construct($db = "pdotoets2", $host = "localhost:3306", $user = "root", $pass = "")
    {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die ("Connection error: " . $e->getMessage());
        }
    }

}
?>