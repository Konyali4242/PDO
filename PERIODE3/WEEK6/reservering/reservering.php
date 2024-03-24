<?php
include "../db.php";

class Reservering {
    private $dbh;

    public function __construct(DB $dbh)
    {
        $this->dbh = $dbh;
    }
    public function insertReservering ($Reservering_begin_tijd, $Reservering_eind_tijd, $Klant_id){
        return $this->dbh->execute("INSERT INTO reservering (Reservering_begin_tijd, Reservering_eind_tijd) 
        VALUES (?, ?, ?)", [$Reservering_begin_tijd, $Reservering_eind_tijd, $Klant_id]);
    }

    public function selectReservering() : array {
        $stmt = $this->pdo->query("SELECT * FROM reservering");
        $result = $stmt->fetchAll();
        return $result; 
    }

    public function updateProduct($Reservering_begin_tijd, $Reservering_eind_tijd, $Klant_id, $Reservering_id) {
        $stmt = $this->pdo->prepare("UPDATE reservering SET Reservering_begin_tijd = ?, Reservering_eind_tijd = ?, Klant_id = ?,
        WHERE Reservering_id = ?");
        $stmt->execute([$Reservering_begin_tijd, $Reservering_eind_tijd, $Klant_id, $Reservering_id]);
    }
}
?>