<?php

include 'factuur.php';

$dbfactuur = new Factuur(new DB());

try {
    $dbfactuur->deleteFactuur($_GET['Factuur_id']);
    header("Location:view-factuur.php");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }

?>