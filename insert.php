<?php

require_once "utility/db.php";

// Check form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $name = $_POST["name"];
  $price = $_POST["price"];

  // Insert product
  $sql = "INSERT INTO products(name, price)
            VALUES('$name', '$price')";

  if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
    exit();
  } else {
    echo "Insert failed";
  }
} else {

  header("Location: index.php");
  exit();
}
