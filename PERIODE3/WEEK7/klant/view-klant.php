<?php
    include "klant.php";
    include "../db/header.php";

    $dbklant = new Klant(new DB());
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Klanten</title>
</head>
<body>
    <table class="table dark">
        <tr>
            <th>Klant_id</th>
            <th>Klantnaam</th>
            <th>Adres</th>
            <th>Telefoonnummer</th>
            <th>Leeftijd</th>
            <th>Email</th>
            <th colspan="2">Action</th>
        </tr>

        <tr> <?php
            $kalnten = $dbklant->selectKlant(); 
            if ($klanten) { 
                foreach ($klanten as $klant) {?>
            <td><?php echo $klant['Klant_id']?></td>
            <td><?php echo $klant['Klantnaam']?></td>
            <td><?php echo $klant['Adres']?></td>
            <td><?php echo $klant['Telefoonnummer']?></td>
            <td><?php echo $klant['Leeftijd ']?></td>
            <td><?php echo $klant['Email']?></td>
            <td><a href="edit-klant.php?Klant_id=<?php echo $klant['Klant_id']; ?>">Edit</a></td>
            <td><a href="delete-klant.php?Klant_id=<?php echo $klant['Klant_id']; ?>">Delete</a></td>
           <td></td>
        </tr> <?php } }?>
    </table>
</body>
</html>