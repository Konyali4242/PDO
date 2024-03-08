<?php

include "database.php";

echo $_GET['ID'] . "<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['naam']) || empty($_POST['achternaam']) || empty($_POST['geboortedatum']) || empty($_POST['email']) || empty($_POST['telefoonnummer'])){
        echo "Vul alstublieft alle velden in";
    } else {

        $naam = $_POST["naam"];
        $achternaam = $_POST["achternaam"];
        $geboortedatum = $_POST["geboortedatum"];
        $email = $_POST["email"];
        $telefoonnummer = $_POST["telefoonnummer"];

        $sql = "UPDATE deklant SET naam=:naam, achternaam=:achternaam, geboortedatum=:geboortedatum, email=:email, telefoonnummer=:telefoonnummer
                WHERE ID=:ID";
        $stmt= $pdo->prepare($sql);

        $data = [
        'naam' => $naam,
        'achternaam' => $achternaam,
        'geboortedatum' => $geboortedatum,
        'email' => $email,
        'telefoonnummer' => $telefoonnummer,
        'ID' => $_GET['ID'],
        ];
       $stmt->execute($data);
       echo "Gegevens opgeslaan!" . "<br>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

        <form method="POST">
            <h1> <span style="color:blue">Contacten bewerken</span> </h1>
            <input type="text" name="naam" placeholder="Naam">
            <input type="text" name="achternaam" placeholder="Achternaam">
            <input type="date" name="geboortedatum" placeholder="Geboortedatum">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="telefoonnummer" placeholder="Telefoonnummer">
            <input type="submit" name="knopje" value="Verzend">
        </form>
    
</body>
</html>