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




?>

<form action="index.php" method="POST">
    <input id="gebruikersnaam" type="text" name="gebruikersnaam" placeholder="Username" required="required"/><br>
    <input id="wachtwoord" type="password" name="wachtwoord" placeholder="Password" required="required"/><br>
    <span><?php echo ((isset($loginError) && $loginError != '') ? $loginError . "<br>" : '')?></span>
    <input type="sumbit" name="login" value="login"><span>Login</span></button><br>
    <a href="lostpsw.php"> Watchwoord veloren?</a><br>
    <a href="signup.php"> New user? Sign up!</a><br>
</form>

</body> </html>

//login handler
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Inloggen</h1>
<?php
session_start();
    function select($query){
        $host = '127.0.0.1';
        $db   = 'netland';
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
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }

        $formatResult = array();

        $rawResult = $pdo->query($query);
        while ($row = $rawResult->fetch()) {
            $rowResult = array();

            foreach ($row as $collum => $value) {
                $rowResult[$collum] = $value;
            }

            $formatResult[] = $rowResult;
        }

        return $formatResult;
    }

    if (!isset($_POST) || !isset($_POST['Naam']) || !isset($_POST['Wachtwoord'])){
        header('Location: inlog.php');
    }

    $result = select('SELECT * FROM netland.gebruikers WHERE Naam = "' . $_POST['Naam'] . '"');

    var_dump($result);

    switch (count($result)){
        case 0:
            $_SESSION["error"] = "Incorrecte gebruikersnaam";
            redirect("inlog.php");
            break;
        case 1:
            var_dump('er is een gebruiker');
            if ($_POST['Wachtwoord'] === $result[0]['Wachtwoord']) {
               $_SESSION["loggedInUser"] = $result[0]['id'];
                header('Location: index.php');
            } else {
               $_SESSION["error"] = "Verkeerd Wachtwoord";
                 header('Location: inlog.php');
            }
            break;
        default:
            $_SESSION["error"] = "Onbekende error";
            redirect("inlog.php");
            break;
    }
?>

</body>
</html>


//login
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h1>Inloggen</h1>
    <?php
session_start();
        if (isset($_SESSION['loggedInUser'])){
            header('Location: index.php');
        }
        if (isset($_SESSION['error'])){
            echo '<div class="error">' . $_SESSION['error'] .'</div>';
        }
    ?>
    <form action="login_handler.php" method="post">
        <div class="form-group">
            <label for="Naam">Gebruikersnaam:</label><br>
            <input type="text" name="Naam" id="Naam" required>
        </div>

        <div class="form-group">
            <label for="Wachtwoord">W:</label><br>
            <input type="Wachtwoord" name="Wachtwoord" id="Wachtwoord" required>
        </div>

        <div class="form-group">
            <input type="submit">
        </div>
    </form>
</body>
</html>