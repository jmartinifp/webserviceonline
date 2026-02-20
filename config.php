<?php

$host = "localhost";
$dbname = "epastillero";
$username = "root";
$password = "";

$host = "sql100.infinityfree.com";
$dbname = "if0_41180799_epastillero_";
$username = "if0_41180799";
$password = "qei0k7nmYNknOs";


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error de connexió: " . $e->getMessage());
}
