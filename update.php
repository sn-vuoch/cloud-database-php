<?php
require_once "utility/db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id = (int)$_POST["id"];
  $name = mysqli_real_escape_string($conn, $_POST["name"]);
  $price = $_POST["price"];

  $sql = "UPDATE products SET name='$name', price='$price' WHERE id=$id";

  mysqli_query($conn, $sql);
}

header("Location: index.php");
exit();
