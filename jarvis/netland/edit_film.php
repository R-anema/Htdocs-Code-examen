<!DOCTYPE html>
<html>
<head>
<title>Edit Film</title>
</head>
<body>

<h1>Edit Films</h1><br>
<p>This is a paragraph. ID is belangrijk voor elke serie in de url. (GET)</p>

<form action="index.php" method="get"> <br> </form>


Form with input fields for text:

<form method ="post" action ="">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname">
  <input type="button" id="button">
</form>
  
 
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
    $id = $_GET["volgnummer"];
    $movies = $pdo->query('SELECT * FROM netland.films WHERE volgnummer=' . $id)->fetchAll();
} catch (\PDOException $e) {
      throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

function setUserUpdate($filmtitel, $filmduur, $filmdatum, $filmuitkomst, $filmomschrijving)
{
    $sql = "UPDATE films SET filmtitel=?, filmduur=?, fildatum=?, filmuitkomst=?, filmomschrijving+? WHERE volgnummer=?";
    $stmt = $pdo->connect()->prepare($sql);
    $stmt->execute([$filmtitel, $filmduur, $filmdatum, $filmuitkomst, $filmomschrijving]);
}

if ($stmt->execute()) {
    echo 'The table has been succesfully updated!';
}

?> </body> </html>