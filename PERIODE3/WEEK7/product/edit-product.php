<?php
    include "product.php";
    include "../header.php";

    
        try {
           $db = new Database();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $db->updateProduct($_POST["omschrijving"], $_POST["Prijs_per_stuk"],
                    $_GET['Product_id']);
                header("Location:view-product.php");
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
          }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update Product</title>
</head>
<body>
<form method="POST">
        <input type="text" name="omschrijving" placeholder="Omschrijving"> 
        <input type="text" name="Prijs_per_stuk" placeholder="Prijs per stuk"> 
        <input type="submit">
</form>
</body>
</html>