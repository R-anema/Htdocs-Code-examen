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