<?php
include "../db.php";

class Klant {
    private $dbh;

    public function __construct(DB $dbh)
    {
        $this->dbh = $dbh;
    }
    public function insertKlant ($naam, $email, $password){
        return $this->dbh->execute("INSERT INTO klant (naam, email, password) VALUES (?,?,?)", [$naam, $email, $password]);
    }
}
?>