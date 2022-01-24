<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Edit</title>
    </head>
<body>
<h1>Rianne's Edit pagina.</h1><br>
<p>Vergeet de GET niet, Rianne, die is belangrijk voor elke serie in de URL. (GET)</p>
    <li> <a href="index.php">Home</a></li>
    <li> <a href="edit.php">Edit</a></li>
    <li> <a href="insert.php">Insert</a></li>
    <li> <a href="login.php">Log In</a></li>
    <li> <a href="signup.php">Sign Up</a></li>

    <?php if (isset($_GET["items"])) { ?>
    <p id="sorting">Active sorting: <?php echo $_GET["items"] ?> </p>
    <?php     } ?>
 
<?php
$host = 'localhost';
$db   = 'media';
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
    $id = isset($_GET['id']) ? $_GET['id'] : '';
} catch (\PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

//oude set
function setUserUpdate($titel, $rating, $samenvatting, $awards, $lengte, $releasedatum, $seizoenen, $land, $taal, $trailerid, $mediatype) 
{
    $sql = "UPDATE items SET titel=?, rating=?, samenvatting=?, awards=?, lengte=?, releasedatum=?, seizoenen=?, land=?, taal=?, trailerid=?, mediatype+? WHERE id=?";
    $stmt = $pdo->connect()->prepare($sql);
    $stmt->execute([$titel, $rating, $samenvatting, $awards, $lengte, $releasedatum, $seizoenen, $land, $taal, $trailerid, $mediatype]);
} if ($stmt->execute()) {
    echo 'The table has been succesfully updated!';
}

//set de info van de informatie die je oproept als je die nodig hebt.
function setUserUpdate2($titel, $rating, $samenvatting, $awards, $lengte, $releasedatum, $seizoenen, $land, $taal, $trailerid, $mediatype) 
{
    $sql = "UPDATE items SET titel=?, rating=?, samenvatting=?, awards=?, lengte=?, releasedatum=?, seizoenen=?, land=?, taal=?, trailerid=?, mediatype+? WHERE id=?";
    $stmt = $pdo->connect()->prepare($sql);
    $stmt->execute([$titel, $rating, $samenvatting, $awards, $lengte, $releasedatum, $seizoenen, $land, $taal, $trailerid, $mediatype]);
} if ($stmt->execute()) {
    echo 'The table has been succesfully updated!';
}

?>

//get user by id die je op heb geklikt. Die roep je op na 

<form action="index.php" method="POST">
    <input type="text" id="gebruikersnaam" type="text" name="gebruikersnaam" placeholder="Username" required="required"/><br>
    <input type="text" id="wachtwoord" type="password" name="wachtwoord" placeholder="Password" required="required"/><br>
    <span><?php echo ((isset($loginError) && $loginError != '') ? $loginError . "<br>" : '')?></span>
    <input type="sumbit" name="login" value="login"><span>Login</span></button><br>
    <a href="signup.php"> New user? Sign up!</a><br>
</form>

<?php ?> </body> </html>
