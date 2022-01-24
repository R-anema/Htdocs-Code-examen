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
$host = 'localhost';
$db   = 'netland';
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
    $pdo = new PDO($dsn, $user, $pass, $options);
    $id = $_GET["id"];
    $movies = $pdo->query('SELECT * FROM netland.movies WHERE id=' . $id)->fetchAll();
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

$stmt = $pdo->query('SELECT id, title, duur FROM films');

while ($row = $stmt->fetch()) {
?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['duur']; ?></td>
            <td><a href="edit_film.php?id=<?php echo $row['id']; ?>" target="_blank">Edit</a></td>
            <td><a href="create_film.php?id=<?php echo $row['id']; ?>" target="_blank">Edit</a></td>
        </tr>
<?php
}
?>

?> </body> </html>