<?php

include 'Reservering.php';

try {
   $db = new Database();
    $db->deleteReservering($_GET['Reservering_id']);
    header("Location:view-Reservering.php");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }

?>