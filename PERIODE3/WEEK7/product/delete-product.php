<?php

include 'product.php';

try {
   $db = new Database();
    $db->deleteProduct($_GET['Product_id']);
    header("Location:view-product.php");
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
  }

?>