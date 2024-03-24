<?php
    include "reservering.php";
    include "../header.php";

    
        try {
           $db = new Database();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $db->updateReservering($_POST["Reservering_begin_tijd"], $_POST["Reservering_eind_tijd"], $_POST["Klant_id"],
                    $_GET['Reservering_id']);
                header("Location:view-reservering.php");
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
    <title>Update Reservering</title>
</head>
<body>
<form method="POST">
        <input type="text" name="Reservering_begin_tijd" placeholder="Reservering_begin_tijd"> 
        <input type="text" name="Reservering_eind_tijd" placeholder="Reservering_eind_tijd"> 
        <input type="text" name="Klant_id" placeholder="Klant id"> 
        <input type="submit">
</form>
</body>
</html>