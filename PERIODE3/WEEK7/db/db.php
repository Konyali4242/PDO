<?php

class DB {
    public $pdo;
    
    public function __construct($db = "pdotoets", $host = "localhost:3306", $user = "root", $pass = "")
    {
        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die ("Connection error: " . $e->getMessage());
        }
    }

    // function pdo($sql, $placeholders = NULL){
    //     $stmt = $this->$dbh->prepare($sql);
    //     $stmt->execute($placeholders);
    //     return $stmt;
    // }   

}
?>