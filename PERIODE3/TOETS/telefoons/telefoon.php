<?php
include "../db/db.php";

class Telefoon{
    var $dbh;

    public function __construct(DB $dbh){
        $this->dbh = $dbh;
    }

    public function insertTelefoon($merk, $model, $opslag, $prijs) {
        $stmt= $this->dbh->pdo->prepare("INSERT INTO telefoon (merk, model, opslag, prijs) VALUES (?, ?, ?, ?) ");
        $stmt->execute( [$merk, $model, $opslag, $prijs]);
    }

    public function selectTelefoon() : array {
        $stmt = $this->dbh->pdo->query("SELECT * from telefoon");
        $result = $stmt->fetchAll();
        return $result; 
    }

    public function updateTelefoon($merk, $model, $opslag, $prijs) {
        $stmt = $this->dbh->pdo->prepare("UPDATE Telefoon SET Merk = ?, Model = ?, Opslag = ?, Prijs = ? 
        WHERE Telefoon_id = ?");
        $stmt->execute([$merk, $model, $opslag, $prijs]);
    }

    public function deleteTelefoon(int $Telefoon_id) {
        $stmt = $this->dbh->pdo->prepare("DELETE from telefoon WHERE Telefoon_id = ?");
        $stmt->execute([$Telefoon_id]);
    }
}
?>