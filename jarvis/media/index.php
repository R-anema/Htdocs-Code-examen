<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Media</title>
        <link rel="stylesheet" href="style.css">
    </head>
<body>
    <h1>Welkom op het Media beheerpaneel.</h1>
    <li> <a href="index.php">Home</a></li>
    <li> <a href="edit.php">Edit</a></li>
    <li> <a href="insert.php">Insert</a></li>
    <li> <a href="login.php">Log In</a></li>
    <li> <a href="signup.php">Sign Up</a></li>

    <?php if (isset($_GET["items"])) { ?>
    <p id="sorting">Active sorting: <?php echo $_GET["items"] ?> </p>
    <?php     } ?>

<?php

$host = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "media";
$charset = "utf8mb4";
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $dbh = new PDO("mysql:host=$host;dbname=media", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    //$id = $_GET['id'];
    $sql = "SELECT * FROM items WHERE item_id = $id";
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
        throw new PDOException($e->getMessage(), (int)$e->getCode());
}

$titles = $pdo->query('SELECT titel FROM items');
$rating = $pdo->query('SELECT rating FROM items');
$lengte = $pdo->query('SELECT lengte FROM items');
$items_id = $pdo->query('SELECT items_id FROM items');
$edits = $pdo->query('SELECT * FROM items');

//De panels, foreach en meer.
echo "<h1>Media control panel</h1><table><tr><th>Titel</th></tr>";

foreach ($titles as $row) {
    echo "<tr>";
    echo "<td>" . $row['titel'] . "</td>";
}

echo "<th>Rating</th>";

foreach ($rating as $rowa) {
    echo "<tr>";
    echo "<td>" . $rowa['rating'] . "</td>";
}

echo "<th>Lengte</th>";

foreach ($lengte as $rowb) {
    echo "<tr>";
    echo "<td>" . $rowb['lengte'] . "</td>";
}

echo "<th>Items</th>";

foreach ($items_id as $rowc) {
    echo "<tr>";
    echo "<td>" . $rowc['items_id'] . "</td>";
}

//edit voor elk item in tabel - GET
foreach ($edits as $rowd) {
    $user = $rowd->setUserUpdate($_GET['items_id']);
}

//voor de interger value
$id2 = intval($_GET['gebruikers_id']);

//voor de string value
$title = strval($_GET['titel']);

?></body></html>