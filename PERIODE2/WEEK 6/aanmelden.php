<?php
include 'db.php';
$db = new Database();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $hash = password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);
    $db->aanmelden($_POST['email'], $hash);
    echo "gelukt";
    header('Location:login.php');
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>aanmelden</title>
</head>
<body>
    <form method="POST">
        <intput type="text" name="email" placeholder="E-mail">
        <intput type="text" name="wachtwoord" placeholder="Wachtwoord">
</body>
    <div class="d-flex flex-column align-items-center">
        <h1>Register</h1>
        <form method="POST">
            <div class="mb-3">
                <input type="text" name="email" placeholder="E-mail"required>
            </div>

            <div class="mb-3">
                <input type="password" name="wachtwoord" placeholder="Wachtwoord" required>
            </div>
            
            <input type="submit" class="btn btn-primary">
            <p>Nog geen account?</p> <a href="login.php">inloggen</a>
    </div>

</html>
