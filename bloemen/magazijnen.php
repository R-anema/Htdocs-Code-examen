<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <h1>Home</h1>
    <div name="navigatie">
        <li> <a href="index.php"> Home </a></li>
        <li> <a href="magazijnen.php"> Magazijnen </a></li>
        <li> <a href="bloemen.php"> Bloemen </a></li>
    </div>
<?php
include 'pdo.php';

$magazijn = $pdo->query('SELECT * FROM magazijnen');

foreach ($magazijn as $row) {
    echo "<tr>";
    echo "<td>" . $row['magazijn_id'] . "</td>";
}

//Eten en Drinken toevoegen in menu met de sql query.
function insertFood($menuitems_id, $code, $naam, $gerechtsoorten_id, $prijs) {
    $sql = "INSERT INTO 'menuitems'('menuitems_id', 'code', 'gerechtsoorten_id', 'prijs') VALUES (menuitems_id=?, code=?, gerechtsoorten_id=?, prijs=?)";
}if ($stmt-execute()) {
    echo 'Bijgewerkt.';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//Bewerken. (DEZE FUNCTIE WORD AANGEROEPEN IN DE RESERVERINGEN.PHP via de bijwerken knop.)
function setReserveringUpdate($tafel, $datum, $tijd, $klant_id, $aantal, $status, $datum_toegevoegd, $aantal_k, $allergien, $opmerkingen){
    $sql = "UPDATE reserveringen SET tafel=?, datum=?, tijd=?, klant_id=?, aantal=?, status=?, datum_toegevoegd=?, aantal_k=?, allergien=?, opmerkingen=? WHERE reserveringen_id=?";
    $stmt = $pdo->connect()->prepare($sql);
    $stmt->execute([$tafel, $datum, $tijd, $klant_id, $aantal, $status, $datum_toegevoegd, $aantal_k, $allergien, $opmerkingen]);
} if ($stmt-execute()) {
    echo 'Bijgewerkt.';
}

?></body> </html>

