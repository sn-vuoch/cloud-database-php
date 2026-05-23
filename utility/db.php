<?php

// Database information
$host = "my-sql-server-testing.mysql.database.azure.com";
$username = "AzureMySQL";
$password = "adminIsMyPassW@rd123";
$database = "mysql";

// Setting SSL
$conn = mysqli_init();

mysqli_ssl_set($conn, NULL, NULL, "/etc/ssl/certs/ca-certificates.crt", NULL, NULL);

// Connect to database
if (!mysqli_real_connect($conn, $host, $username, $password, $database, 3306, NULL, MYSQLI_CLIENT_SSL)) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create new database
mysqli_query($conn, "CREATE DATABASE IF NOT EXISTS cloud_store");

// Switch to new database
mysqli_select_db($conn, "cloud_store");

// Create products table if not exists
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    price DECIMAL(10,2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

mysqli_query($conn, $sql);
