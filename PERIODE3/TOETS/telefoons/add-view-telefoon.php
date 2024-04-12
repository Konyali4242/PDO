<?php
    include "telefoon.php";

    $dbtelefoon = new Telefoon(new DB());

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try{
            $dbtelefoon->insertTelefoon($_POST["merk"], $_POST["model"], $_POST["opslag"], $_POST["prijs"]);
            echo "Success";
        } catch (Exception $e){
            echo "Error" . $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Telefoon</title>
</head>
<body>
    <h1>Insert a phone</h1>
    <form method="POST">
        <input type="text" name="merk" placeholder="Merk">
        <input type="text" name="model" placeholder="Model">
        <input type="text" name="opslag" placeholder="Opslag">
        <input type="text" name="prijs" placeholder="Prijs">
        <input type="submit"> 
    </form>

    <h1>View all phones</h1>
    <table class="table dark">
        <tr>
            <th>Telefoon_ID</th>
            <th>Merk</th>
            <th>Model</th>
            <th>Opslag</th>
            <th>Prijs</th>
            <th colspan="2">Action</th>
        </tr>

        <tr> <?php
            $telefoons = $dbtelefoon->selectTelefoon(); 
            if ($telefoons) { 
                foreach ($telefoons as $telefoon) {?>
            <td><?php echo $telefoon['Telefoon_id']?></td>
            <td><?php echo $telefoon['Merk']?></td>
            <td><?php echo $telefoon['Model']?></td>
            <td><?php echo $telefoon['Opslag'];?></td>
            <td><?php echo $telefoon['Prijs']?></td>
            <td><a href="edit-telefoon.php?Telefoon_id=<?php echo $telefoon['Telefoon_id']; ?>">Edit</a></td>
            <td><a href="delete-telefoon.php?Telefoon_id=<?php echo $telefoon['Telefoon_id']; ?>">Delete</a></td>
           <td></td>
        </tr> <?php } }?>
    </table>
</body>
</html> 