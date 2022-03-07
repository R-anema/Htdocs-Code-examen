<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
            <img src="logo.png" alt="" width="30" height="24">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="spelers.php">Spelers</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
            </li>
            <li class="nav-item">
            <a class="nav-link disabled">Disabled</a>
            </li>
        </ul>
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
    </nav>
<br><br>

<div>
  <a href="addspeler.php">Aanmaken</a>
  <a href="updatespeler.php">Update</a>
  <a href="deletespeler.php">Verwijderen</a>
  <a href="spelers.php">Terug</a>
</div>

<br><br>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <input type="text" name="spelerID" placeholder="spelerID" required></input>
    <input type="text" name="schoolID" placeholder="schoolID" required></input>
    <input type="text" name="roepnaam" placeholder="roepnaam" required></input>
    <input type="text" name="tus" placeholder="tus" required></input>
    <input type="text" name="achternaam" placeholder="achternaam" required></input>
    <input type="submit" value="submit" name="addSpeler"></input>
</form>

<?php   
//connect to DB
include 'pdo.php';
$db = new Database();

//voeg een leeg array toe.
$spelerID = $schoolID = $roepnaam = $tus = $achternaam = "";

//form data wanner submit is gedrukt
if ($_SERVER ["REQUEST_METHOD"] == "POST") {

    //spelerID toevoegen
    $imput_spelerID = trim($_POST['spelerID']);
    if (empty($imput_spelerID)){
        echo "please enter a id!";
    } else {
        $spelerID = $imput_spelerID;
    }

    //schoolID toevoegen
    $imput_schoolID = trim($_POST['schoolID']);
        if (empty($imput_schoolID)){
            echo "please enter a id!";
        } else {
            $schoolID = $imput_schoolID;
        }
    
    //roepnaam toevoegen
    $imput_roepnaam = trim($_POST['roepnaam']);
        if (empty($imput_roepnaam)){
            echo "please enter a roepnaam!";
        } else {
            $roepnaam = $imput_roepnaam;
        }
    
    //tus toevoegen
    $imput_tus = trim($_POST['tus']);
        if (empty($imput_tus)){
            echo "please enter a tussennaam!";
        } else {
            $tus = $imput_tus;
        }

    //achternaam toevoegen
    $imput_achternaam = trim($_POST['achternaam']);
        if (empty($imput_achternaam)){
            echo "please enter a achternaam!";
        } else {
            $achternaam = $imput_achternaam;
        }
}

//de query en gegevens oproepen/invoeren ivm error
$addSpeler = $db->addSpeler($spelerID, $schoolID, $roepnaam, $tus, $achternaam);


?></body></html>