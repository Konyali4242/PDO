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

    public function selectProduct() : array {
        $stmt = $this->pdo->query("SELECT * FROM product");
        $result = $stmt->fetchAll();
        return $result; 
    }

    public function updateProduct($omschrijving, $Prijs_per_stuk, $Product_id) {
        $stmt = $this->pdo->prepare("UPDATE Product SET omschrijving = ?, Prijs_per_stuk = ?,
        WHERE Product_id = ?");
        $stmt->execute([$omschrijving, $Prijs_per_stuk, $Product_id]);
    }

    public function deleteProduct(int $Product_id) {
        $stmt = $this->pdo->prepare("DELETE from Product WHERE Product_id = ?");
        $stmt->execute([$Product_id]);
    }
}
?>