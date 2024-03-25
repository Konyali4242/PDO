<?php

include 'Tafel.php';

try {
   $db = new Database();
    $db->deleteTafel($_GET['Tafel_id']);
    header("Location:view-tafel.php");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }

?>