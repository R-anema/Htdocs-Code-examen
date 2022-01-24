<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gegevens</title>
</head>
<body>
    <h1>Gegevens</h1>
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
//Op deze Gegevens pagina kan je bestellingen, drinken en eten aanpassen en toevoegen volgends de CRUD methode.

//links naar reserveringen toevoegen en de delete pagina.
//Door naar de edit pagina!
$edit = $pdo->query('SELECT reserveringen_id FROM reserveringen');
foreach ($edit as $entry){
    echo "<a href='gegevens.php'>Aanpassen</a>";
    echo "<br>";
}

//Reserveringen toevoegen.
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

//pdo oproepen.
include 'database.php';

//alles laten zien rijtje:
echo 'Aantal bestellingen';
echo '<td>';
echo "<br>";

$items = $pdo->query('SELECT * FROM gerechtcategorien');
foreach ($items as $row) {
    echo "<tr>";
    echo "<td>" . $row['naam'] . "</td>";
}

//Eten en Drinken toevoegen in menu met de sql query.
function insertFood($menuitems_id, $code, $naam, $gerechtsoorten_id, $prijs) {
    $sql = "INSERT INTO 'menuitems'('menuitems_id', 'code', 'gerechtsoorten_id', 'prijs') VALUES (menuitems_id=?, code=?, gerechtsoorten_id=?, prijs=?)";
}if ($stmt-execute()) {
    echo 'Bijgewerkt.';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//Bewerken van de reservering. (DEZE FUNCTIE WORD AANGEROEPEN IN DE RESERVERINGEN.PHP via de bijwerken knop.)
function setReserveringUpdate($tafel, $datum, $tijd, $klant_id, $aantal, $status, $datum_toegevoegd, $aantal_k, $allergien, $opmerkingen){
    $sql = "UPDATE reserveringen SET tafel=?, datum=?, tijd=?, klant_id=?, aantal=?, status=?, datum_toegevoegd=?, aantal_k=?, allergien=?, opmerkingen=? WHERE reserveringen_id=?";
    $stmt = $pdo->connect()->prepare($sql);
    $stmt->execute([$tafel, $datum, $tijd, $klant_id, $aantal, $status, $datum_toegevoegd, $aantal_k, $allergien, $opmerkingen]);
} if ($stmt-execute()) {
    echo 'Bijgewerkt.';
}

//Bewerken van klanten.
function setKlantenUpdate($klanten_id, $naam, $telefoon, $email){
    $sql = "UPDATE klanten SET klanten_id=?, naam=?, telefoon=?, email=? WHERE klanten_id=?";
    $stmt = $pdo->connect()->prepare($sql);
    $stmt->execute([$klanten_id, $naam, $telefoon, $email]);
} if ($stmt-execute()) {
    echo 'Bijgewerkt.';
}

//Bewerken van gerechten.
function setGerechtenUpdate($menuitems_id, $code, $naam, $gerechtsoorten_id, $prijs){
    $sql = "UPDATE menuitems SET menuitems_id=?, code=?, gerechtsoorten_id=?, prijs=? WHERE menuitems_id=?";
    $stmt = $pdo->connect()->prepare($sql);
    $stmt->execute([$menuitems_id, $code, $naam, $gerechtsoorten_id, $prijs]);
} if ($stmt-execute()) {
    echo 'Bijgewerkt.';
}

//Bewerken van menu hoofgroepen.
function setMenuUpdate($menuitems_id, $code, $naam, $gerechtsoorten_id, $prijs){
    $sql = "UPDATE menuitems SET menuitems_id=?, code=?, gerechtsoorten_id=?, prijs=? WHERE menuitems_id=?";
    $stmt = $pdo->connect()->prepare($sql);
    $stmt->execute([$menuitems_id, $code, $naam, $gerechtsoorten_id, $prijs]);
} if ($stmt-execute()) {
    echo 'Bijgewerkt.';
}

//Bewerken menu subgroepen.
function setSubgroepenUpdate($gerechtsoorten_id, $code, $naam, $gerechtscategorie_id){
    $sql = "UPDATE gerechtsoorten SET gerechtsoorten_id=?, code=?, naam=?, gerechtscategorie_id=? WHERE gerechtsoorten_id=?";
    $stmt = $pdo->connect()->prepare($sql);
    $stmt->execute([$gerechtsoorten_id, $code, $naam, $gerechtscategorie_id]);
} if ($stmt-execute()) {
    echo 'Bijgewerkt.';
}

?><body> </html>