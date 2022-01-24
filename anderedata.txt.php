Andere queries en informatie!

$tabel = 'SELECT datum, tijd, tafel, klantnaam, telefoonummer, aantal FROM reserveringen INNER JOIN klanten ON reserveringen.klant_id = klanten.klanten_id';
$q = $pdo->query($tabel);
$q->setFetchMode(PDO::FETCH_ASSOC);


$stmt = $pdo->query("SELECT * FROM reseveringen");
$reserveringen = $stmt->fetchALL(PDO::FETCH_COLUMN);
$selectie = $pdo->query("SELECT * FROM reserveringen");
$selectie->execute();


$reservering = $conn->query("select * from diner where reservering_id=" . $reserveringid);
$opslaan = $reservering->fetch();
$klantid = $_GET["klant_id"];
$reserveringid = $_GET["reservering_id"];
$timestamp = $_GET["timestamp"];
$bestellingen = $conn->query('select * from diner where timestamp=' . $timestamp);
$opslaan = $bestellingen->fetch();

$timestamp = $_GET["timestamp"];
$bestellingen = $conn->query('select * from diner where timestamp=' . $timestamp);
$opslaan = $bestellingen->fetch();

//check wie er op de pagina is.
$user = $dbname->get_current_user($_GET['admin']);
//andere queries en informatie.
$tabel = 'SELECT datum, tijd, tafel, klantnaam, telefoonummer, aantal FROM reserveringen INNER JOIN klanten ON reserveringen.klant_id = klanten.klanten_id';
$q = $pdo->query($tabel);
$q->setFetchMode(PDO::FETCH_ASSOC);


$stmt = $pdo->query("SELECT * FROM reseveringen");
$reserveringen = $stmt->fetchALL(PDO::FETCH_COLUMN);
$selectie = $pdo->query("SELECT * FROM reserveringen");
$selectie->execute();


$reservering = $conn->query("select * from diner where reservering_id=" . $reserveringid);
$opslaan = $reservering->fetch();
$klantid = $_GET["klant_id"];
$reserveringid = $_GET["reservering_id"];
$timestamp = $_GET["timestamp"];
$bestellingen = $conn->query('select * from diner where timestamp=' . $timestamp);
$opslaan = $bestellingen->fetch();

//andere queries en informatie.
$stmt = $pdo->query("SELECT * FROM reseveringen");
$reserveringen = $stmt->fetchALL(PDO::FETCH_COLUMN);
$selectie = $pdo->query("SELECT * FROM reserveringen");
$selectie->execute();

$reservering = $conn->query("select * from diner where reservering_id=" . $reserveringid);
$opslaan = $reservering->fetch();
$klantid = $_GET["klant_id"];
$reserveringid = $_GET["reservering_id"];
$timestamp = $_GET["timestamp"];
$bestellingen = $conn->query('select * from diner where timestamp=' . $timestamp);
$opslaan = $bestellingen->fetch();

$timestamp = $_GET["timestamp"];
$bestellingen = $conn->query('select * from diner where timestamp=' . $timestamp);
$opslaan = $bestellingen->fetch();