<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>
<body>

<h1>Rianne's Login pagina.</h1><br>
<p>Zoals altijd de ID is belangrijk voor de GET serie. Niet vergeten om Gebruikers in te voegen.</p>

    <li> <a href="index.php">Home</a></li>
    <li> <a href="edit.php">Edit</a></li>
    <li> <a href="insert.php">Insert</a></li>
    <li> <a href="login.php">Log In</a></li>
    <li> <a href="signup.php">Sign Up</a></li>
 
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
    $dbh = new PDO("mysql:host=$host;dbname=media", $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = $_GET['items_id'];
    $gebruikersid = $_GET['gebruikers_id'];
    $pdo = new PDO($dsn, $username, $password, $options);
    $sql = $pdo->query('SELECT * FROM media.items WHERE id=' . $id)->fetchAll();
} catch (\PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

	//if signup word aangeroepen: account aanmaken moet in signup en insert into ook gebruiken. TBA Singup checken of hij word aangeroepen, en afstemmen met.
function addAcount($voornaam, $tussenvoegsel, $achternaam, $email, $username, $password)
{
    try{
	$this->db->beginTransaction();
	echo "Begin Transactie pls";
	//TODO: wachtwoord en username ophalen/registeren. 
	$this->db = new PDO($dsn, $this->$username, $this->$password);
		}
    catch(\PDOException $e){
		// die and exit are equivalent exit-> Output a message and terminate the current script
		exit('Unable to connect:' . $e->getMessage());
	}
}

function setUserUpdate($titel, $rating, $samenvatting, $awards, $lengte, $releasedatum, $seizoenen, $land, $taal, $trailerid, $mediatype)
{
    $sql = "INSERT INTO items SET titel=?, rating=?, samenvatting=?, awards=?, lengte=?, releasedatum=?, seizoenen=?, land=?, taal=?, trailerid=?, mediatype+? WHERE id=?";
    $stmt = $pdo->connect()->prepare($sql);
    $stmt->execute([$titel, $rating, $samenvatting, $awards, $lengte, $releasedatum, $seizoenen, $land, $taal, $trailerid, $mediatype]);
}

if ($stmt->execute()) {
    echo 'The table has been succesfully updated!';
}

?>

<form action="index.php" method="post">
    <input id="gebruikersnaam" type="text" name="gebruikersnaam" placeholder="Username" required="required"/><br>
    <input id="wachtwoord" type="password" name="wachtwoord" placeholder="Password" required="required"/><br>
    <span><?php echo ((isset($loginError) && $loginError != '') ? $loginError . "<br>" : '')?></span>
    <input type="sumbit" name="login" value="login"><span>Login</span></button><br>
    <a href="lostpsw.php"> Watchwoord veloren?</a><br>
    <a href="signup.php"> New user? Sign up!</a><br>
</form>

</body> </html>
