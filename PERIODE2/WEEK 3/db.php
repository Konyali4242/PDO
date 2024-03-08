<?php

class database {
    public $pdo;

    public function __construct ($db="pd2", $host="localhost:3307",  $user="root", $pass="") {
        try{
            $this->pdo = new PDO ("mysql:host=$host;dbname=$db;", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected";
        } catch (Exception $e) {
            echo "Error" . $e->getMessage();
        }
    }
    public function data($naam, $achternaam, $leeftijd, $land) {
        $sql = "INSERT INTO dittest (ID, naam, achternaam, leeftijd, land) VALUES (NULL, :naam, :achternaam, :leeftijd, :land)";

        $stmt= $this->pdo->prepare($sql);

        $data = [
            "naam" => $naam,
            "achternaam" => $achternaam,
            "leeftijd" => $leeftijd,
            "land" => $land,
        ];
        $stmt->execute($data);
    }

    public function select($ID = null) {
        if ($ID) {
            $stmt = $this->pdo->prepare("SELECT * FROM dittest WHERE id = ?");
            $stmt->execute ([$ID]);
            $result = $stmt->fetch();
            return $result;
        } else
        $stmt = $this->pdo->query("SELECT * FROM dittest");
        $result = $stmt->fetchAll();
        return $result;
    }
}

?>