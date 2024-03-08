<?php
include "../db.php";

class Factuur {
    private $dbh;

    public function __construct(DB $dbh)
    {
        $this->dbh = $dbh;
    }
    public function insertFactuur ($F_Datum, $Btw6, $Btw19, $Totaal_excl_BTW, $Totaal_incl_BTW, $Prijs_totaal, $Aantal_producten, $Tafel_id, $Product_id){
        return $this->dbh->execute("INSERT INTO factuur (F_Datum, '6%Btw', '19%Btw', Totaal_excl_BTW, Totaal_incl_BTW, Prijs_totaal, Aantal_producten, Tafel_id, Product_id) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)", [$F_Datum, $Btw6, $Btw19, $Totaal_excl_BTW, $Totaal_incl_BTW, $Prijs_totaal, $Aantal_producten, $Tafel_id, $Product_id]);
    }
}
?>