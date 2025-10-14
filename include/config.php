<?php

// Database connection
$dsn = "mysql:host=localhost;dbname=SalesPilot;charset=utf8mb4";
$username = "root";
$password = ""; // update if needed
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>