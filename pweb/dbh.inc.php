<?php

$server = "localhost";
$database = "db_user";
$user = "root";
$pass = "";

try {
    $pdo = new PDO("mysql:host=$server;dbname=$database", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

?>