<?php
    include "tafel.php";
    include "../header.php";

    $tafel = new Tafel($myDb);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try{
            $tafel->insertTafel($_POST["Max_aantal_personen"]);
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
    <title>Add tafel info</title>
</head>
<body>
    <form method="POST">
    <input type="text" name="Max_aantal_personen" placeholder="Max aantal personen">
    <input type="submit"> 
    </form>
</body>
</html>