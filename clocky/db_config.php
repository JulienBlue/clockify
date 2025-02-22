<?php
$host = '127.0.0.1';
$dbname = 'clockify';
$username = 'root';
$password = '1234';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Setze den PDO-Fehlermodus auf Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>