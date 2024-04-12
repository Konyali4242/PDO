<?php
include "../db/db.php";

class Factuur {
    var $dbh;

    public function __construct(DB $dbh)
    {
        $this->dbh = $dbh;
    }
    public function insertFactuur ($F_Datum, $Btw6, $Btw19, $Totaal_excl_BTW, $Totaal_incl_BTW, $Prijs_totaal, $Aantal_producten, $Tafel_id, $Product_id){
        $stmt= $this->dbh->pdo->prepare("INSERT INTO factuur (F_Datum, `6%Btw`, `19%Btw`, Totaal_excl_BTW, Totaal_incl_BTW, Prijs_totaal, aantal_producten, Tafel_id, Product_id) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute( [$F_Datum, $Btw6, $Btw19, $Totaal_excl_BTW, $Totaal_incl_BTW, $Prijs_totaal, $Aantal_producten, $Tafel_id, $Product_id]);
    }
    public function selectFactuur() : array {
        $stmt = $this->dbh->pdo->query("SELECT * FROM factuur");
        $result = $stmt->fetchAll();
        return $result; 
    }

    public function updateFactuur($F_Datum, $Btw6, $Btw19, $Totaal_excl_BTW, $Totaal_incl_BTW, $Prijs_totaal, $Aantal_producten, $Tafel_id, $Product_id, $Factuur_id) {
        $stmt = $this->dbh->pdo->prepare("UPDATE factuur SET F_Datum = ?, `6%Btw` = ?, `19%Btw` = ?, Totaal_excl_BTW = ?, Totaal_incl_BTW = ?, Prijs_totaal = ?, Aantal_producten = ?, Tafel_id = ?, Product_id = ?
        WHERE Factuur_id = ?");
        $stmt->execute([$F_Datum, $Btw6, $Btw19, $Totaal_excl_BTW, $Totaal_incl_BTW, $Prijs_totaal, $Aantal_producten, $Tafel_id, $Product_id, $Factuur_id]);
    }

    public function deleteFactuur(int $Factuur_id) {
        $stmt = $this->dbh->pdo->prepare("DELETE from factuur WHERE Factuur_id = ?");
        $stmt->execute([$Factuur_id]);
    }
}

?>