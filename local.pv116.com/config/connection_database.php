<?php
// Database configuration
$host = 'localhost';
//$dbname = 'pv116';
$dbname = 'id21656514_morkovka';
//$username = 'root';
$username = 'id21656514_semen';
//$password = '';
$password = 'Qwerty1-';

// Connection to MySQL using PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;
}
