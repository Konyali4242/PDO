<?php

$host = 'localhost:3307';
$db   = 'pdo';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try 
{
     $pdo = new PDO($dsn, $user, $pass, $options);
     echo "connectie gemaakt lmao";
} 
catch (\PDOException $e) 
{
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if (isset($_POST['knopje'])) {
    $Naam = $_POST["Naam"];
    $Email = $_POST["Email"];
    $Telefoonnummer = $_POST["Telefoonnummer"];

    $sql = "INSERT INTO klanten (KlantenID, Naam, Email, Telefoonnummer) VALUES (NULL, :Naam, :Email, :Telefoonnummer)";
    // : zijn named parameters
    $stmt= $pdo->prepare($sql);


    $data = [
        'Naam' => $Naam,
        'Email' => $Email,
        'Telefoonnummer' => $Telefoonnummer,
    ];
    $stmt->execute($data);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test</title>
</head>

<body>
    <form method="POST">
        <input type="text" name="Naam" placeholder="Naam">
        <input type="text" name="Email" placeholder="Email">
        <input type="text" name="Telefoonnummer" placeholder="Telefoonnummer">
        <input type="submit" name="knopje" value="Verzend">
    </form>
</body>

</html>