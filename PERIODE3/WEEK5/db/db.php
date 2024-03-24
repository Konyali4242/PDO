<?php

class DB {
    private $dbh;
    protected $stmt;
    
    public function __construct($db = "les2", $host = "localhost:3307", $user = "root", $pass = "")
    {
        try {
            $this->dbh = new PDO("mysql:host=$host;dbname=$db;", $user, $pass);
            $this->dbh->setAttribute(PDO::ATTR_EARMODE, PDO::EARMODE_EXCEPRION);
        } catch (PDOException $e) {
            die ("Connection error: " . $e->getMessage());
        }
    }

    function pdo($sql, $placeholders = NULL){
        $stmt = $this->$dbh->prepare($sql);
        $stmt->execute($placeholders);
        return $stmt;
    }   

}
$myDb = new DB('les2');
?>