<?php

include 'login.php';

?>

<!DOCTYPE html>
<html>
<form action="index.php" method="POST">

		<input id="gebruikersnaam" value="" name="gebruikersnaam" type="text" required="required"><br>
		<input id="wachtwoord" value="" name="wachtwoord" type="text" required="required"><br>
		<input id="voornaam" value="" name="voornaam" type="text" required="required"><br>
		<input id="tussenvoegsel" value="" name="tussenvoegsel" type="text" required=""><br>
		<input id="achternaam" value="" name="achternaam" type="text" required="required"><br>
		<input id="adres" value="" name="adres" type="text" required="required"><br>
		<input id="postcode" value="" name="postcode" type="text" required="required"><br>
		<input id="woonplaats" value="" name="woonplaats" type="text" required="required"><br>
		<input id="geboortedatum" value="" name="geboortedatum" type="text" required="required"><br>

		<input type="sumbit" name="login" value="login"><span>Login</span></button>

<a href="lostpsw.php"> Watchwoord veloren?</a>
<a href="signup.php"> Ik heb nog geen account.</a>

</form>
</html>
