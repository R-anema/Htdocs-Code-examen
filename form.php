<?php 
require_once('pdo.php');
session_start();

$fieldnames = array('voornaam', 'achternaam', 'email', 'username', 'password');
$error = False;

if (isset($_POST['login'])) {
    try {
        $user = $_POST['user'];
        $loginController = new LoginController();
        if ($loginController->$_POST['password']) {
            echo 'Ingelogd';
            $_SESSION['user'] = $user;
        }
    } catch (\Throwable $th) {
        //throw $th;
    }
}


foreach($fieldnames as $fieldname){
   if (!isset($_POST[$fieldnames]) || empty($_POST[$fieldname])){
     $error = True;
   } try {
       //code...
   } catch (exception $ex) {
       echo $ex->getMessage()."<br/>";
   }
}

foreach ($array as $item) {
    echo "<options value =" .$item['naam'].">";
};

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
</head>
    <body>
        <h1>Navigatie</h1>
        <div name="navigatie">
            <li> <a href="index.php"> Index TBA </a></li>
            <li> <a href="form.html"> Home </a></li>
        </div>

    <p>Kies welke fiets je wil reserveren:</p>
        <form method="POST" action='pdo.php'>

            <select id="fietsen" name="fietsen" size="3" multiple>
                <option value="damesfiets">Damesfiets</option>
                <option value="herenfiets">Herenfiets</option>
                <option value="mountainbike">Mountainbike</option>
            </select>

            <label for="naam"> Naam: <input type="text" name="naam" id="naam"><br>
            <label for="datum"> Datum: <input type="text" name="datum" id="datum"><br>
            <label for="tijd"> Tijd: <input type="text" name="tijd" id="tijd"><br>
            <label for="aantal"> Aantal: <input type="text" name="aantal" id="aantal"><br>
            <label for="opmerkingen"> Opmerkingen: <input type="text" name="opmerkingen" id="opmerkingen"><br>
            <input type="submit" name="login" value="login">
        </form>
    <body>
</html>