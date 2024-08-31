<?php
$host = 'localhost';
$db = 'spaghetti_shop';
$user = 'root'; // Default XAMPP MySQL user
$pass = ''; // Default XAMPP MySQL password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>
