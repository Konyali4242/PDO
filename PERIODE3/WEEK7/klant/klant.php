<?php
include "../db.php";

class Klant {
    private $dbh;

    public function __construct(DB $dbh)
    {
        $this->dbh = $dbh;
    }
    public function insertKlant ($Klantnaam, $Adres, $Telefoonnummer, $Leeftijd, $Email){
        return $this->dbh->execute("INSERT INTO klant (Klantnaam, Adres, Telefoonnummer, Leeftijd, Email) 
        VALUES (?,?,?,?,?)", [$Klantnaam, $Adres, $Telefoonnummer, $Leeftijd, $Email]);
    }

    public function selectKlant() : array {
        $stmt = $this->pdo->query("SELECT * FROM klant");
        $result = $stmt->fetchAll();
        return $result; 
    }

    public function updateKlant($Klantnaam, $Adres, $Telefoonnummer, $Leeftijd, $Email, $Klant_id) {
        $stmt = $this->pdo->prepare("UPDATE klant SET Klantnaam = ?, Adres = ?, Telefoonnummer = ?, Leeftijd = ?, Email = ?,
        WHERE Klant_id = ?");
        $stmt->execute([$Klantnaam, $Adres, $Telefoonnummer, $Leeftijd, $Email, $Klant_id]);
    }

    public function deleteKlant(int $Klant_id) {
        $stmt = $this->pdo->prepare("DELETE from klant WHERE Klant_id = ?");
        $stmt->execute([$Klant_id]);
    }
}
?>