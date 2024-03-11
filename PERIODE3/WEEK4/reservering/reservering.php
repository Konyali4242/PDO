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
}
?>