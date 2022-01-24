<?php
include 'database.php';

//prepare and bind the parameters to the form
$stmt = $conn->prepare("INSERT INTO reserveringen (tafel, datum, tijd, klant_id, aantal, status, aantal_k, allergien, opmerkingen) Values (:tafel, :datum, :tijd, :klant_id, :aantal, :status, :datum_toegevoegd, :aantal_k, :allergien, :opmerkingen)");
$stmt->bindParam(':tafel, $tafel');
$stmt->bindParam(':datum, $datum');
$stmt->bindParam(':tijd, $tijd');
$stmt->bindParam(':klant_id, $klant_id');
$stmt->bindParam(':aantal, $aantal');
$stmt->bindParam(':status, $status');
$stmt->bindParam(':aantal_k, $aantal_k');
$stmt->bindParam(':allergien, $allergien');
$stmt->bindParam(':opmerkingen, $opmerkingen');

//insert a row
$tafel = $_POST["tafel"];
$datum = $_POST["datum"];
$tijd = $_POST["tijd"];
$klant_id = $_POST["klant_id"];
$aantal = $_POST["aantal"];
$status = $_POST["status"];
$aantal_k = $_POST["aantal_k"];
$allergien = $_POST["allergien"];
$opmerkingen = $_POST["opmerkingen"];
$stmt->execute();
?>