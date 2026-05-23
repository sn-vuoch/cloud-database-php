<?php
require_once "utility/db.php";

if (isset($_GET['id'])) {
  $id = (int)$_GET['id']; // Convert to integer for basic security
  $sql = "DELETE FROM products WHERE id = $id";
  mysqli_query($conn, $sql);
}

header("Location: index.php");
exit();
