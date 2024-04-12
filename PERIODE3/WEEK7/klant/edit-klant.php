<?php
    include "klant.php";
    include "../db/header.php";

    
        try {
           $db = new Database();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $db->updateKlant($_POST["Klantnaam"], $_POST["Adres"], $_POST["Telefoonnummer"], $_POST["Leeftijd"], $_POST["Email"],
                    $_GET['Klant_id']);
                header("Location:view-klant.php");
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
    <title>update Klant</title>
</head>
<body>
<form method="POST">
        <input type="text" name="Klantnaam" placeholder="Naam"> 
        <input type="text" name="Adres" placeholder="Adres"> 
        <input type="text" name="Telefoonnummer" placeholder="Telefoonnummer"> 
        <input type="text" name="Leeftijd" placeholder="Leeftijd"> 
        <input type="text" name="Email" placeholder="E-mail"> 
        <input type="submit">
</form>
</body>
</html>