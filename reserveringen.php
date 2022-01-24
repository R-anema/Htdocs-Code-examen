<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserveringen</title>
</head>
<body>
    <h1>Reserveringen</h1>
    <div name="navigatie">
        <li> <a href="index2.php"> Home </a></li>
        <li> <a href="reserveringen.php"> Reserveringen </a></li>
        <li> <a href="serveren.php"> Serveren </a></li>
        <li> <a href="gegevens.php"> Gegevens </a></li>
    </div>

<?php if (isset($_GET["diner"])) { ?>
    <p id="sorting"> Active Sorting: <?php echo $_GET["bestelling"] ?> </p>
<?php } ?>

<?php
//in deze pagina ziet de receptie welke reserveringen er op de lijst staan.
//Dit is gesorteerd op dag.
$host = '127.0.0.1';
$user = "root";
$pass = "";
$dbname = "diner";
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [ 
    PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES      => false,
];

try {
    $conn = new PDO("mysql:host=$host;dbname=diner", $user,$pass);
    //set deze pdo to exception modus.
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $sql = "SELECT * from reserveringen WHERE reservering_id = $id";
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOexception $e) {
    echo "Connection failed:" . $e->getMessage();
}

//Datum, Tijd, Tafel, Klantnaam, Telefoonnummer, Aantal.
//Include een CRUD (specifiek Edit/Delete) indien mogelijk.
$datum = $pdo->query('SELECT datum FROM reserveringen ORDER BY datum');
$tijd = $pdo->query('SELECT tijd FROM reserveringen');
$tafel = $pdo->query('SELECT tafel FROM reserveringen');
$naam = $pdo->query('SELECT naam FROM klanten');
$telefoonnummer = $pdo->query('SELECT telefoon FROM klanten');
$aantal = $pdo->query('SELECT aantal FROM reserveringen');

foreach ($datum as $row) {
    echo "<tr>";
    echo "<td>" . $row['datum'] . "</td>";
    echo "<br>";
}

foreach ($tijd as $row) {
    echo "<tr>";
    echo "<td>" . $row['tijd'] . "</td>";
    echo "<br>";
}

foreach ($tafel as $row) {
    echo "<tr>";
    echo "<td>" . $row['tafel'] . "</td>";
    echo "<br>";
}

foreach ($naam as $row) {
    echo "<tr>";
    echo "<td>" . $row['naam'] . "</td>";
    echo "<br>";
}

foreach ($telefoonnummer as $row) {
    echo "<tr>";
    echo "<td>" . $row['telefoon'] . "</td>";
    echo "<br>";
}

foreach ($aantal as $row) {
    echo "<tr>";
    echo "<td>" . $row['aantal'] . "</td>";
    echo "<br>";
}

//Door naar de edit pagina!
$edit = $pdo->query('SELECT reserveringen_id FROM reserveringen');
foreach ($edit as $entry){
    echo "<a href='gegevens.php'>Aanpassen</a>";
    echo "<br>";
}

//Informatie toevoegen.
$add = $pdo->query('SELECT reserveringen_id FROM reserveringen');
foreach ($add as $entry){
    echo "<a href='toevoegen.html'>Toevoegen</a>";
    echo "<br>";
}

//Naar de delete!
$add = $pdo->query('SELECT reserveringen_id FROM reserveringen');
foreach ($add as $entry){
    echo "<a href='delete.php'>Verwijderen</a>";
    echo "<br>";
}

?></body> </html>