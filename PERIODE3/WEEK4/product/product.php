<?php
include "../db.php";

class Product {
    private $dbh;

    public function __construct(DB $dbh)
    {
        $this->dbh = $dbh;
    }
    public function insertProduct ($omschrijving, $Prijs_per_stuk){
        return $this->dbh->execute("INSERT INTO product (omschrijving, Prijs_per_stuk) 
        VALUES (?, ?)", [$omschrijving, $Prijs_per_stuk]);
    }
}
?>