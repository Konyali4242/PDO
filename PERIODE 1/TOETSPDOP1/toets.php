<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['merk']) || empty($_POST['model']) || empty($_POST['opslag']) || empty($_POST['prijs'])) {

        echo "Vul alle velden in";

    } else {

        $merk = $_POST["merk"];
        $model = $_POST["model"];
        $opslag = $_POST["opslag"];
        $prijs = $_POST["prijs"];

        $sql = "INSERT INTO telefoon (ID, merk, model, opslag, prijs) VALUES (NULL, :merk, :model, :opslag, :prijs)";
        $stmt= $pdo->prepare($sql);

        $data = [
            'merk' => $merk,
            'model' => $model,
            'opslag' => $opslag,
            'prijs' => $prijs,
        ];

        $stmt->execute($data);
        echo "telefoon opgeslagen!" . "<br>";

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Telefoons</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
<h1> <span style="color:blue">Telefoon lijst</span> </h1>
    <div class="box">
        <table class="table table-dark table-striped">
            
          <tr>
            <th>ID</th>
            <th>Merk</th>
            <th>Model</th>
            <th>Opslag</th>
            <th>Prijs</th>
            <th>Action</th>
          </tr>
          
          <?php

          $stmt = $pdo->query("SELECT * FROM telefoon");
          $result = $stmt->fetchAll();
          foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['merk'] . "</td>";
            echo "<td>" . $row['model'] . "</td>";
            echo "<td>" . $row['opslag'] . "</td>";
            echo "<td>" . $row['prijs'] . "</td>";
            echo "<td> <a href='edit.php?ID=". $row['ID'] ."'>Edit</a> </td>";
            echo "</tr>";
          }

          ?>
          </table>
    </div>

    <div class="form">
        <form method="POST">
            <h2> <span style="color:blue">Telefoons toevoegen</span> </h2>
            <input type="text" name="merk" placeholder="Merk">
            <input type="text" name="model" placeholder="Model">
            <input type="text" name="opslag" placeholder="Opslag">
            <input type="text" name="prijs" placeholder="Prijs">
            <input type="submit" name="knop" value="Verzend">
        </form>
    </div>

</body>

</html>