<?php
    include "factuur.php";
    include "../header.php";

    $dbfactuur = new Factuur($myDb);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Factuur</title>
</head>
<body>
    <table class="table dark">
        <tr>
            <th>Factuur_id</th>
            <th>F_Datum</th>
            <th>6%Btw</th>
            <th>19%Btw</th>
            <th>Totaal_excl_BTW</th>
            <th>Totaal_incl_BTW</th>
            <th>Prijs_totaal</th>
            <th>Aantal_producten</th>
            <th>Tafel_id</th>
            <th>Product_id</th>
            <th colspan="2">Action</th>
        </tr>

        <tr> <?php
            $facturen = $dbfactuur->selectFactuur(); 
            if ($facturen) { 
                foreach ($facturen as $factuur) {?>
            <td><?php echo $factuur['Factuur_id']?></td>
            <td><?php echo $factuur['F_Datum']?></td>
            <td><?php echo $factuur['6%Btw']?></td>
            <td><?php echo $factuur['19%Btw'];?></td>
            <td><?php echo $factuur['Totaal_excl_BTW']?></td>
            <td><?php echo $factuur['Totaal_incl_BTW']?></td>
            <td><?php echo $factuur['Prijs_totaal']?></td>
            <td><?php echo $factuur['Aantal_producten']?></td>
            <td><?php echo $factuur['Tafel_id']?></td>
            <td><?php echo $factuur['Product_id']?></td>
            <td><a href="">Edit</a></td>
            <td><a href="">delete</a></td>
           <td></td>
        </tr> <?php } }?>
    </table>
</body>
</html>