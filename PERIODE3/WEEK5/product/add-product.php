<?php
    include "product.php";
    include "../header.php";

    $dbproduct = new Product($myDb);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try{
            $dbproduct->insertProduct($_POST["omschrijving"], $_POST["Prijs_per_stuk"]);
            ECHO "Success";
        } catch (Exception $e){
            echo "Error" . $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
</head>
<body>
    <form method="POST">
    <input type="text" name="omschrijving">
    <input type="text" name="Prijs_per_stuk">
    <input type="submit"> 
    </form>
</body>
</html>