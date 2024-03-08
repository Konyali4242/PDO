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
}
?>