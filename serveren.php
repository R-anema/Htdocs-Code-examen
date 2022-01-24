<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serveren</title>
</head>
<body>
    <h1>Serveren</h1>
    <div name="navigatie">
        <li> <a href="index2.php"> Home </a></li>
        <li> <a href="reserveringen.php"> Reserveringen </a></li>
        <li> <a href="serveren.php"> Serveren </a></li>
        <li> <a href="gegevens.php"> Gegevens </a></li>
    </div>

<?php if (isset($_GET["diner"])) { ?>
    <p id="sorting"> Active Sorting : <?php echo $_GET["bestelling"] ?> </p>
<?php } ?>

<?php
//in deze pagina zien obers, koks en barmanned wat ze moeten serveren.
//A la dranken, eten en bestellingen. Zie gegevens voor die te bewerken.

//pdo, databse oproepen
include 'database.php';

//krijg gegevens voor de bestellingen etc
$id = isset($_GET['id']) ? $_GET['id'] : '';
$sql = "SELECT * from bestellingen WHERE menuitems_id = $id";

echo 'Aantal bestellingen';
echo '<td>';
echo "<br>";

//drinken voor een barman
$drink = $pdo->query('SELECT naam FROM menuitems WHERE code=2');
foreach ($drink as $row) {
    echo "<tr>";
    echo "<td>" . $row['naam'] . "</td>";
}

echo 'Aantal Eten';
echo '<td>';
echo "<br>";

//eten voor kok
$eten = $pdo->query('SELECT naam FROM gerechtcategorien WHERE code=1');
foreach ($eten as $rowb) {
    echo "<tr>";
    echo "<td>" . $rowb['naam'] . "</td>";
}

echo 'Aantal overzichten';
echo '<td>';
echo "<br>";

//Door naar de edit pagina!
$edit = $pdo->query('SELECT reserveringen_id FROM reserveringen');
foreach ($edit as $entry){
    echo "<a href='gegevens.php'>Aanpassen</a>";
}

?><body></html>