<?php
    include "telefoon.php";

    $dbtelefoon = new Telefoon(new DB());

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try{
        $dbtelefoon->updateTelefoon($_POST['merk'], $_POST['model'], $_POST["opslag"], $_POST["prijs"],
                $_GET['Telefoon_id']);
            header("Location:add-view-telefoon.php");
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit phone</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="merk" placeholder="Merk"> 
        <input type="text" name="model" placeholder="Model"> 
        <input type="text" name="opslag" placeholder="Opslag"> 
        <input type="text" name="prijs" placeholder="Prijs">
        <input type="submit">
    </form>
</body>
</html>