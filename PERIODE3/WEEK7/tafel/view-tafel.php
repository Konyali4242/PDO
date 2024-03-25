<?php
    include "tafel.php";
    include "../header.php";

    $dbtafel = new Tafel($myDb);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Overzicht Tafels</title>
</head>
<body>
    <table class="table dark">
        <tr>
            <th>Tafel_id</th>
            <th>Max_aantal_personen</th>
            <th colspan="2">Action</th>
        </tr>

        <tr> <?php
            $tafels = $dbtafel->selectTafel(); 
            if ($tafels) { 
                foreach ($tafels as $tafel) {?>
            <td><?php echo $tafel['Tafel_id']?></td>
            <td><?php echo $tafel['Max_aantal_personen']?></td>
            <td><a href="edit-tafel.php?Tafel_id=<?php echo $tafel['Tafel_id']; ?>">Edit</a></td>
            <td><a href="delete-tafel.php?Tafel_id=<?php echo $tafel['Tafel_id']; ?>">Delete</a></td>
           <td></td>
        </tr> <?php } }?>
    </table>
</body>
</html>