<?php
    include "tafel.php";
    include "../header.php";

    
        try {
           $db = new Database();
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $db->updateTafel($_POST["Max_aantal_personen"],
                    $_GET['Tafel_id']);
                header("Location:view-tafel.php");
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
    <title>Update Tafel</title>
</head>
<body>
<form method="POST">
        <input type="text" name="Max_aantal_personen" placeholder="Max aantal personen"> 
        <input type="submit">
</form>
</body>
</html>