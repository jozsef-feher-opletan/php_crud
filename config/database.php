<?php
$host = 'localhost';
$db = 'news_portal';
$user = 'root';
$pass = '';
$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    die("DB Connection failed: " . $e->getMessage());
}
