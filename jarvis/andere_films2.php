<!DOCTYPE html>
<html>
<head>
<title>Films</title>
</head>
<body>

<h1>Films</h1><br>
<p>This is a paragraph. ID is belangrijk voor elke serie in de url.</p>
<p>Gebruik GET om alles te printen.</p>


<form action="index.php" method="get"> <br> </form>
 
<?php

$pdo = require 'index.php';

$host = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "netland";
$charset = "utf8mb4";
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $conn = new PDO("mysql:host=$host;dbname=netland", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$pdo = new PDO($dsn, $username, $password, $options);
$stmt = $pdo->query('SELECT volgnummer FROM films');
$films = $stmt->fetchAll(PDO::FETCH_COLUMN);
$selectie = $pdo->query('SELECT * FROM films');
$selectie->execute();

echo "<tr>";




?> </body> </html>