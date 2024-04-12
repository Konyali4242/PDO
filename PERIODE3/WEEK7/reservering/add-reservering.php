<?php
    include "reservering.php";
    include "../db/header.php";

    $dbreservering = new Reservering($myDb);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try{
            $dbreservering->insertReservering($_POST["Reservering_begin_tijd"], $_POST["Reservering_eind_tijd"], $_POST["Klant_id"]);
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
    <title>Add reservering</title>
</head>
<body>
    <form method="POST">
    <input type="text" name="Reservering_begin_tijd" placeholder="Naam">
    <input type="text" name="Reservering_eind_tijd" placeholder="Naam">
    <input type="submit"> 
    </form>
</body>
</html>