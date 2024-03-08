<?php

include "db.php";

echo $_GET['ID'] . "<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['merk']) || empty($_POST['model']) || empty($_POST['opslag']) || empty($_POST['prijs'])) {

        echo "Vul alle velden in";

    } else {

        $merk = $_POST["merk"];
        $model = $_POST["model"];
        $opslag = $_POST["opslag"];
        $prijs = $_POST["prijs"];

        $sql = "UPDATE telefoon SET merk=:merk, model=:model, opslag=:opslag, prijs=:prijs
                WHERE ID=:ID";
        $stmt= $pdo->prepare($sql);

        $data = [
            'merk' => $merk,
            'model' => $model,
            'opslag' => $opslag,
            'prijs' => $prijs,
            'ID' => $_GET['ID'],
        ];

        $stmt->execute($data);
        echo "telefoon gewijzigd!" . "<br>";

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bewerk Telefoons</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>

        <form method="POST">
        <h2> <span style="color:blue">Telefoons bewerken</span> </h2>
            <input type="text" name="merk" placeholder="Merk">
            <input type="text" name="model" placeholder="Model">
            <input type="text" name="opslag" placeholder="Opslag">
            <input type="text" name="prijs" placeholder="Prijs">
            <input type="submit" name="knop" value="Verzend">
        </form>
    
</body>
</html>