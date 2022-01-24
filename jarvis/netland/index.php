<!DOCTYPE html><html lang="en"><head>
<meta charset="UTF-8">
<title>netland</title></head>
<body>
    <h1>Welkom op het netland beheerpaneel.</h1>

    <?php if (isset($_GET["series"])) { ?>
    <p id="sorting">Active sorting: <?php echo $_GET["series"] ?> </p>
    <?php
    } ?>

    <?php if (isset($_GET["films"])) { ?>
    <p id="sorting">Active sorting: <?php echo $_GET["films"] ?> </p>
    <?php   } ?>


<?php
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
    $dbh = new PDO("mysql:host=$host;dbname=netland",$username,$password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = $_GET['id'];
    $volgnummer = $_GET['volgnummer'];
    $sql = "SELECT * FROM series WHERE id = $id";
    $sql = "SELECT * FROM films WHERE volgnummer = $volgnummer";
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$titles = $pdo->query('SELECT title FROM series');
$rating = $pdo->query('SELECT rating FROM series');

echo "<h1>Netland control panel</h1><h2>Series</h2><table><tr><th>Titel</th><th>Rating</th></tr>";
foreach ($titles as $row) {
    echo "<tr>";
    echo "<td>" . $row['title'] . "</td>";
} 

foreach ($rating as $rowa) {
    echo "<tr>";
    echo "<td>" . $rowa['rating'] . "</td>";
}

$filmtitel = $pdo->query('SELECT filmtitel FROM films');
$filmduur = $pdo->query('SELECT filmduur FROM films');

echo "<h2>Films</h2><table><tr><th>Filmtitel</th><th>Filmduur</th></tr>";
foreach ($filmtitel as $rowb) {
    echo "<tr>";
    echo "<td>" . $rowb['filmtitel'] . "</td>";
}

foreach ($filmduur as $rowc) {
    echo "<tr>";
    echo "<td>" . $rowc['filmduur'] . "</td>";
}

$serieid = $pdo->query('SELECT id FROM series');
$filmid = $pdo->query('SELECT trailerid FROM films');

foreach ($filmid as $rowd) {
    echo "<tr>";
    echo "<td>" . $rowd['filmid'] . "</td>";
}

foreach ($serieid as $rowe) {
    echo "<tr>";
    echo "<td>" . $rowe['serieid'] . "</td>";
}

//Zet Details erin die leid naar edit-film or edit-serie

while ($row = $stmt->fetch()) {
    echo $row['title'];
    echo $row['duur'];
    echo '<a href="edit_film.php">Click here</a>';
    echo '<a href="create_film.php"Click here</a>';
}

?> </body></html>