<?php
    include "factuur.php";
    include "../header.php";

    
        try {
           $db = new Database();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $db->updateFactuur($_POST['F_Datum'], $_POST['6%Btw'], $_POST['19%Btw'], $_POST['Totaal_excl_BTW'], $_POST['Totaal_incl_BTW'], 
                $_POST['Prijs_totaal'], $_POST["aantal_producten"], $_POST["Tafel_id"], $_POST["Product_id"],
                    $_GET['Factuur_id']);
                header("Location:view-factuur.php");
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
    <title>Update Factuur</title>
</head>
<body>
<form method="POST">
        <input type="text" name="F_Datum" placeholder="Datum"> 
        <input type="text" name="6%Btw" placeholder="6% BTW"> 
        <input type="text" name="19%Btw" placeholder="19% BTW"> 
        <input type="text" name="Totaal_excl_BTW" placeholder="Totaal (excl BTW)"> 
        <input type="text" name="Totaal_incl_BTW" placeholder="Totaal (incl BTW)"> 
        <input type="text" name="Prijs_totaal" placeholder="Totaal Prijs"> 
        <input type="text" name="aantal_producten" placeholder="Aantal Producten"> 
        <input type="text" name="Tafel_id" placeholder="Tafel ID"> 
        <input type="text" name="Product_id" placeholder="Producten">
        <input type="submit">
</form>
</body>
</html>