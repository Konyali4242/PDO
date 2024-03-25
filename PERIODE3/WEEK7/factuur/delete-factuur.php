<?php

include 'factuur.php';

try {
   $db = new Database();
    $db->deleteFactuur($_GET['Factuur_id']);
    header("Location:view-factuur.php");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }

?>