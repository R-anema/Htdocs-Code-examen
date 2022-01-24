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

<?php
//Op deze  pagina kan je bestellingen etc verwijderen volgends de CRUD methode.
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

//Eten en Drinken Verwijderen
function deleteFood($menuitems_id, $code, $naam, $gerechtsoorten_id, $prijs) {
    $sql = "DELETE FROM menuitems WHERE menuitems_id=?, code=?, gerechtsoorten_id=?, prijs=?";
}if ($stmt-execute()) {
    echo 'Bijgewerkt.';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//Reservering verwijderen. (Word aangeroepen in de gegevens en Reserveringen page.)
function setDeleteReservering($tafel, $datum, $tijd, $klant_id, $aantal, $status, $datum_toegevoegd, $aantal_k, $allergien, $opmerkingen){
    $sql = "DELETE FROM reserveringen WHERE tafel=?, datum=?, tijd=?, klant_id=?, aantal=?, status=?, datum_toegevoegd=?, aantal_k=?, allergien=?, opmerkingen=?";
    $stmt = $pdo->connect()->prepare($sql);
    $stmt->execute([$tafel, $datum, $tijd, $klant_id, $aantal, $status, $datum_toegevoegd, $aantal_k, $allergien, $opmerkingen]);
} if ($stmt-execute()) {
    echo 'Bijgewerkt.';
}


//Klanten Verwijderen.
function setDeleteKlanten($klanten_id, $naam, $telefoon, $email){
    $sql = "DELETE FROM klanten WHERE klanten_id=?, naam=?, telefoon=?, email=?";
    $stmt = $pdo->connect()->prepare($sql);
    $stmt->execute([$klanten_id, $naam, $telefoon, $email]);
} if ($stmt-execute()) {
    echo 'Bijgewerkt.';
}

//Gerechten verwijderen.
function setDeleteGerechten($menuitems_id, $code, $naam, $gerechtsoorten_id, $prijs){
    $sql = "DELETE FROM menuitems WHERE menuitems_id=?, code=?, gerechtsoorten_id=?, prijs=?";
    $stmt = $pdo->connect()->prepare($sql);
    $stmt->execute([$menuitems_id, $code, $naam, $gerechtsoorten_id, $prijs]);
} if ($stmt-execute()) {
    echo 'Bijgewerkt.';
}

//Menu Hoofdgroepen verwijderen.
function setDeleteHoofdgroepen($menuitems_id, $code, $naam, $gerechtsoorten_id, $prijs){
    $sql = "DELETE FROM menuitems WHERE menuitems_id=?, code=?, gerechtsoorten_id=?, prijs=?";
    $stmt = $pdo->connect()->prepare($sql);
    $stmt->execute([$menuitems_id, $code, $naam, $gerechtsoorten_id, $prijs]);
} if ($stmt-execute()) {
    echo 'Bijgewerkt.';
}

//wijzigen menu subgroepen.
function setDeleteSubgroepen($gerechtsoorten_id, $code, $naam, $gerechtscategorie_id){
    $sql = "DELETE FROM gerechtsoorten WHERE gerechtsoorten_id=?, code=?, naam=?, gerechtscategorie_id=?";
    $stmt = $pdo->connect()->prepare($sql);
    $stmt->execute([$gerechtsoorten_id, $code, $naam, $gerechtscategorie_id]);
} if ($stmt-execute()) {
    echo 'Bijgewerkt.';
}

?><body> </html>