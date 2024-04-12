<?php

include 'telefoon.php';

$dbtelefoon = new Telefoon(new DB());

try {
    $dbtelefoon->deleteTelefoon($_GET['Telefoon_id']);
    header("Location:add-view-telefoon.php");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }


?>