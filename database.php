<?php
//deze file is handig als ik de database connectie niet in de file zelf wil aanroepen.
//In andere pagina's waar de pdo wel staat, worden er waarschijnlijk veel andere dingen aangeroepen.
$host = '127.0.0.1';
$user = "root";
$pass = "";
$dbname = "rentacar";
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
$options = [ 
    PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES      => false,
];

//basis try-catch.
try {
    $conn = new PDO("mysql:host=$host;dbname=rentacar", $user,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOexception $e) {
    throw new PDOexception($e->getMessage(), (int)$e->getCode());
}

//try-catch die gebruikt word in reverservingen.php
try {
    $conn = new PDO("mysql:host=$host;dbname=rentacar", $user,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $sql = "SELECT * from reserveringen WHERE reservering_id = $id";
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOexception $e) {
    echo "Connection failed:" . $e->getMessage();
}

?>