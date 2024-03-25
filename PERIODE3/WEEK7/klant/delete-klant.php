<?php

include 'klant.php';

try {
   $db = new Database();
    $db->deleteKlant($_GET['Klant_id']);
    header("Location:view-klant.php");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }

?>