<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <h1>Edit</h1>
    <div name="navigatie">
        <li> <a href="index2.php"> Home </a></li>
        <li> <a href="reserveringen.php"> Reserveringen </a></li>
        <li> <a href="serveren.php"> Serveren </a></li>
        <li> <a href="gegevens.php"> Gegevens </a></li>
    </div>

<?php if (isset($_GET["diner"])) { ?>
    <p $id="reserveringen_id"> Active Sorting : <?php echo $_GET["reserveringen_id"] ?> </p>
<?php } ?>

<?php
//Deze pagina is de edit pagina.

//pdo oproepen.
include 'database.php';

function setReserveringUpdate($tafel, $datum, $tijd, $klant_id, $aantal, $status, $datum_toegevoegd, $aantal_k, $allergien, $opmerkingen){
    $sql = "UPDATE reserveringen SET tafel=?, datum=?, tijd=?, klant_id=?, aantal=?, status=?, datum_toegevoegd=?, aantal_k=?, allergien=?, opmerkingen=? WHERE reserveringen_id=?";
    $stmt = $pdo->connect()->prepare($sql);
    $stmt->execute([$tafel, $datum, $tijd, $klant_id, $aantal, $status, $datum_toegevoegd, $aantal_k, $allergien, $opmerkingen]);
} if ($stmt-execute()) {
    echo 'De tabel is bijgewerkt!';
}
?><body></html>