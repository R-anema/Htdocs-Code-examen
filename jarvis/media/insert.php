<!DOCTYPE html>
<html>
<head>
<title>Insert</title>
</head>
<body>

<h1>Rianne's Insert pagina.</h1><br>
<p>This is a paragraph. ID is belangrijk voor elke serie in de url. (GET)</p>
<li> <a href="index.php">Home</a></li>
    <li> <a href="edit.php">Edit</a></li>
    <li> <a href="insert.php">Insert</a></li>
    <li> <a href="login.php">Log In</a></li>
    <li> <a href="signup.php">Sign Up</a></li>

    <?php if (isset($_GET["items"])) { ?>
    <p id="sorting">Active sorting: <?php echo $_GET["items"] ?> </p>
    <?php     } ?>
 
<?php
$host = 'localhost';
$db   = 'media';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $dbh = new PDO("mysql:host=$host;dbname=media", $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = $_GET['items_id'];
    $pdo = new PDO($dsn, $username, $password, $options);
    $sql = $pdo->query('SELECT * FROM media.items WHERE id=' . $id)->fetchAll();
} catch (\PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

function setUserUpdate($titel, $rating, $samenvatting, $awards, $lengte, $releasedatum, $seizoenen, $land, $taal, $trailerid, $mediatype)
{
    $sql = "INSERT INTO items SET titel=?, rating=?, samenvatting=?, awards=?, lengte=?, releasedatum=?, seizoenen=?, land=?, taal=?, trailerid=?, mediatype+? WHERE id=?";
    $stmt = $pdo->connect()->prepare($sql);
    $stmt->execute([$titel, $rating, $samenvatting, $awards, $lengte, $releasedatum, $seizoenen, $land, $taal, $trailerid, $mediatype]);
}

if ($stmt->execute()) {
    echo 'The table has been succesfully updated!';
}

?> </body> </html>
