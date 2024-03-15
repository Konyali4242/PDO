<?php
include "../db.php";

class Tafel {
    private $dbh;

    public function __construct(DB $dbh)
    {
        $this->dbh = $dbh;
    }
    public function insertTafel ($Max_aantal_personen){
        return $this->dbh->execute("INSERT INTO tafel (Max_aantal_personen) 
        VALUES (?)", [$Max_aantal_personen]);
    }

    public function selectTafel() : array {
        $stmt = $this->pdo->query("SELECT * FROM tafel");
        $result = $stmt->fetchAll();
        return $result; 
    }
}
?>