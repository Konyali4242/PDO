<?php

include "database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST['naam']) || empty($_POST['achternaam']) || empty($_POST['geboortedatum']) || empty($_POST['email']) || empty($_POST['telefoonnummer'])){
        echo "Vul alstublieft alle velden in";
    } else {

        $naam = $_POST["naam"];
        $achternaam = $_POST["achternaam"];
        $geboortedatum = $_POST["geboortedatum"];
        $email = $_POST["email"];
        $telefoonnummer = $_POST["telefoonnummer"];

        $sql = "INSERT INTO deklant (ID, naam, achternaam, geboortedatum, email, telefoonnummer) VALUES (NULL, :naam, :achternaam, :geboortedatum, :email, :telefoonnummer)";
        // : zijn named parameters
        $stmt= $pdo->prepare($sql);

        $data = [
        'naam' => $naam,
        'achternaam' => $achternaam,
        'geboortedatum' => $geboortedatum,
        'email' => $email,
        'telefoonnummer' => $telefoonnummer,
        ];
       $stmt->execute($data);
       echo "Gegevens opgeslagen!" . "<br>";
    }   
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contacten</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    
    <h1> <span style="color:blue">Contacten lijst</span> </h1>
    <div class="box">
        <table class="table table-dark table-striped">
          <tr>
            <th>ID</th>
            <th>Voornaam</th>
            <th>Achternaam</th>
            <th>Geboortedatum</th>
            <th>Email</th>
            <th>Number</th>
            <th>Action</th>
          </tr>
          
          <?php

          $stmt = $pdo->query("SELECT * FROM deklant");
          $result = $stmt->fetchAll();
          foreach ($result as $row) {
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['naam'] . "</td>";
            echo "<td>" . $row['achternaam'] . "</td>";
            echo "<td>" . $row['geboortedatum'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['telefoonnummer'] . "</td>";
            echo "<td> <a href='edit.php?ID=". $row['ID'] ."'>Edit</a> <a href=''>Delete</a></td>";
            echo "</tr>";
          }

          ?>
        </table>
    </div>

    <div class="deform">
        <form method="POST">
            <h1> <span style="color:blue">Contacten toevoegen</span> </h1>
            <input type="text" name="naam" placeholder="Naam">
            <input type="text" name="achternaam" placeholder="Achternaam">
            <input type="date" name="geboortedatum" placeholder="Geboortedatum">
            <input type="text" name="email" placeholder="Email">
            <input type="text" name="telefoonnummer" placeholder="Telefoonnummer">
            <input type="submit" name="knopje" value="Verzend">
        </form>
    </div>

</body>

</html>