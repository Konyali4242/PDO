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
    public function data($email, $wachtwoord) {
        $sql = "INSERT INTO users (ID, email, wachtwoord) VALUES (NULL, :email, :wachtwoord)";

        $stmt= $this->pdo->prepare($sql);

        $data = [
            "email" => $email,
            "wachtwoord" => $wachtwoord,
        ];
        $stmt->execute($data);
    }

    public function selectAllUsers() : array {
        $stmt = $this->pdo->query("SELECT * FROM users");
        $result = $stmt->fetchAll();
        return $result; 
    }
    public function selectOneUser($id) : array {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE ID = ?");
        $stmt->execute([$ID]);
        $result = $stmt->fetch();
        return $result;
    }
    
    public function updateUser(string $naam, string $achternaam, int $ID) {
    $stmt = $this->pdo->prepare("UPDATE users SET email = ?, wachtwoord = ? WHERE ID = ?");
    $stmt->execute([$naam, $achternaam, $ID]);
    }

    public function deleteUser(int $ID) {
    $stmt = $this->pdo->prepare("DELETE FROM users WHERE ID = ?");
    $stmt->execute([$ID]);
    }

    public function aanmelden($email, $wachtwoord) {
        $stmt = $this->pdo->prepare("INSERT INTO users (email, wachtwoord) values (?, ?)");
        $stmt->execute([$email, $wachtwoord]);
    }

    public function login($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM users where email = ?");
        $stmt->execute([$email]);
        $result = $stmt->fetch();
        return $result;
    }
}

?>