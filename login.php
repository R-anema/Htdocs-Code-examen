<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lijst</title>
    </head>
    <body>
        <h1><?php echo $opslaan["bestellingen"];?></h1>
<table>
        <tr> <td>Datum</td> <td> <?php echo $opslaan["datum"];?></tr>
        <tr> <td>Tijd</td> <td> <?php echo $opslaan["tijd"];?></tr>
        <tr> <td>Tafel</td> <td> <?php echo $opslaan["tafel"];?></tr>
        <tr> <td>Aantal</td> <td> <?php echo $opslaan["aantal"];?></tr>
</table>

<?php
//dit is de login. Die checkt of een klant of mederwerker heeft ingelogd en stuurt ze door naar hun pagina.
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

try {
    $conn = new PDO("mysql:host=$host;dbname=remtacar", $user,$pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $sql = "SELECT * from medewerker WHERE medewerker_id = $id";
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOexception $e) {
    throw new PDOexception($e->getMessage(), (int)$e->getCode());
}

class Login{
//functie die kijkt hoe de account werkt (moet in Class later, in login?)
function account($voornaam, $telefoon, $email){
    try {
        $this->$db->beginTransaction();
        echo "Succesfully connected.";
        //wachtwoord en username ophalen/registreren.
        $this->$db = new PDO($dsn, $this->$user, $this->$pass);
    } catch (\PDOexception $e) {
        //die to tell it the connection didn't work.
        exit('Unable to connect:' . $e-getMessage()); 
    }
}

    public function account($voornaam, $telefoon, $email){
    try {
        $this->db->beginTransaction();
        echo "Begin transaction please."

        //wachtwoord en username ophalen/registreren
        $this->db = new PDO($dsn, $$this->$username)
    } catch (\Throwable $th) {
        //throw $th;
    }
};
    
};


//dit is de login. Die checkt of een klant of mederwerker heeft ingelogd en stuurt ze door naar hun pagina.
session_start();
    function select($query){
            $firstResult = array();

            $secondResult = $pdo->query($query);
            while ($row = $theResult->fetch()) {
                $thirdResult = array();

                foreach ($row as $key => $value) {
                    $thirdResult[$key] = $value;
                }
            
                $firstResult[] = $rowResult;
            }
        };
   
session_start();
    if (isset($_SESSION['loggedIn'])){
        header('Locatoin: serveren.php');
};
?> </body> </html>