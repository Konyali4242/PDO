<?php
include "../db/db.php";

class Tafel {
    var $dbh;

    public function __construct(DB $dbh)
    {
        $this->dbh = $dbh;
    }
    public function insertTafel ($Max_aantal_personen){
        $stmt= $this->dbh->pdo->prepare("INSERT INTO tafel (Max_aantal_personen) 
        VALUES (?)");
        $stmt->execute( [$Max_aantal_personen]);
    }

    public function selectTafel() : array {
        $stmt = $this->dbh->pdo->query("SELECT * FROM tafel");
        $result = $stmt->fetchAll();
        return $result; 
    }

    public function updateTafel($Max_aantal_personen, $Tafel_id) {
        $stmt = $this->dbh->pdo->prepare("UPDATE tafel SET Max_aantal_personen = ?,
        WHERE Tafel_id = ?");
        $stmt->execute([$Max_aantal_personen, $Tafel_id]);
    }

    public function deleteTafel(int $Tafel_id) {
        $stmt = $this->dbh->pdo->prepare("DELETE from tafel WHERE Tafel_id = ?");
        $stmt->execute([$Tafel_id]);
    }
}
?>