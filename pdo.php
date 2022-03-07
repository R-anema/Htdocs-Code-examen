<?php
//de database en functies voor create en delete zitten in de DB class.
class Database {

private $host = '127.0.0.1';
private $user = 'root';
private $pass = '';
private $db = 'tennisbond';
private $charset = 'utf8mb4';

private $pdo;

/* private $options = [
    PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES      => FALSE,
]; */

//construct verbinden met de DB
    public function __construct(string $host = 'localhost', string $user = 'root', string $pass = '', string $db = 'tennisbond', string $charset = 'utf8'){
        $this->host = $host;
        $this->user = $user;
        $this->pass = $pass;
        $this->db = $db;
        $this->charset = $charset;

        try {
            $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
            $conn = new PDO("mysql:host=$host;dbname=tennisbond;charset=$charset", $user,$pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = new PDO($dsn, $user, $pass, /*$options*/);
        } catch (\PDOException $e) {
            throw new PDOException($e-getMessage(), (int)$e->getCODE());
        }
    }

    //overzicht van alle spelers.
    public function speler_overview() //: array. heeft andere naam ivm switch van code half door het project
    {
        $statement = $this->pdo->prepare('SELECT spelerID AS TYPE, schoolID, roepnaam, tus, achternaam FROM spelers');
        //$statement->bindParam(//idk wat hier moet :D);
        $statement->execute();
        while ($result = $statement->fetch()) {
            print_r($result);
        }
    }

    //overzicht van alle aanmeldingen
    public function aanmeldingOverzicht() {
        $statement = $this->pdo->prepare('SELECT aanmeldingID AS TYPE, spelerID, toernooiID FROM aanmeldingen');
        $statement->execute();
        while ($result = $statement->fetch()) {
            print_r($result);
        }
    }

    //overzicht van alle toernooien
    public function toernooiOverzicht() {
        $statement = $this->pdo->prepare('SELECT toernooiID AS TYPE, omschrijving, datum, updated FROM toernooien');
        $statement->execute();
        while ($result = $statement->fetch()) {
            print_r($result);
        }
    }

    //overzicht van alle wedstrijden
    public function wedstrijdOverzicht() {
        $statement = $this->pdo->prepare('SELECT wedstrijdID AS TYPE, toernooiID, ronde, speler1, speler2, score1, score2, winnaarID FROM wedstrijden');
        $statement->execute();
        while ($result = $statement->fetch()) {
            print_r($result);
        }
    }

    //overzicht van alle scholen
    public function schoolOverzicht() {
        $statement = $this->pdo->prepare('SELECT schoolID AS TYPE, naam FROM scholen');
        $statement->execute();
        while ($result = $statement->fetch()) {
            print_r($result);
        }
    }

//speler toevoegen WERKT, check DB naar invoeren
    public function addSpeler($spelerID, $schoolID, $roepnaam, $tus, $achternaam)//: array (niet verwijderen, breekt code XD)
    {
        $sql = "INSERT INTO spelers (spelerID, schoolID, roepnaam, tus, achternaam) VALUES (:spelerID, :schoolID, :roepnaam, :tus, :achternaam)";
        if ($stmt = $this->pdo->prepare($sql)){
            //linkies
            $stmt->bindParam(":spelerID", $param_spelerID);
            $stmt->bindParam(":schoolID", $param_schoolID);
            $stmt->bindParam(":roepnaam", $param_roepnaam);
            $stmt->bindParam(":tus", $param_tus);
            $stmt->bindParam(":achternaam", $param_achternaam);

            //set de parameters
            $param_spelerID = $spelerID;
            $param_schoolID = $schoolID;
            $param_roepnaam = $roepnaam;
            $param_tus = $tus;
            $param_achternaam = $achternaam;

            return $stmt->execute();

            if (isset($_POST['addSpeler'])) {
                $spelerID = $_POST['spelerID'];
                $schoolID = $_POST['schoolID'];
                $roepnaam = $_POST['roepnaam'];
                $tus = $_POST['tus'];
                $achternaam = $_POST['achternaam'];
                        
                //probeer om de statement uivoeren & alt versie indien nodig: $this->statement_execute
                if($stmt->execute()){
                //records created succesfull, go back to spelers.php
                header('Location: spelers.php');
            } else {
                echo "Iets ging fout!";
                }
            }
        }
    }

 //updateSpeler WERKT, CHECK DB
    public function updateSpeler($spelerID, $schoolID, $roepnaam, $tus, $achternaam)//: array (niet verwijderen, breekt code XD)
    {
        $sql = "UPDATE spelers SET spelerID=:spelerID, schoolID=:schoolID, roepnaam=:roepnaam, tus=:tus, achternaam=:achternaam WHERE spelerID=:spelerID";
         if ($stmt = $this->pdo->prepare($sql)){
            //linkies
            $stmt->bindParam(":spelerID", $param_spelerID);
            $stmt->bindParam(":schoolID", $param_schoolID);
            $stmt->bindParam(":roepnaam", $param_roepnaam);
            $stmt->bindParam(":tus", $param_tus);
            $stmt->bindParam(":achternaam", $param_achternaam);

            //set de parameters
            $param_spelerID = $spelerID;
            $param_schoolID = $schoolID;
            $param_roepnaam = $roepnaam;
            $param_tus = $tus;
            $param_achternaam = $achternaam;

            return $stmt->execute();

            if (isset($_POST['updateSpeler'])) {
                $spelerID = $_POST['spelerID'];
                $schoolID = $_POST['schoolID'];
                $roepnaam = $_POST['roepnaam'];
                $tus = $_POST['tus'];
                $achternaam = $_POST['achternaam'];
                        
                //probeer om de statement uivoeren & alt versie indien nodig: $this->statement_execute
                if($stmt->execute()){
                //records created succesfull, go back to spelers.php
                header('Location: spelers.php');
            } else {
                echo "Iets ging fout!";
                }
            }
        }
    }

//deleteSpeler. Verwijderen van gegevens!
public function deleteSpeler($spelerID){
    $sql = "DELETE FROM spelers WHERE spelerID=:spelerID";
     if ($stmt = $this->pdo->prepare($sql)){
        //linkies
        $stmt->bindParam(":spelerID", $param_spelerID);

        //set de parameters
        $param_spelerID = $spelerID;

        return $stmt->execute();

        if (isset($_POST['deleteSpeler'])) {
            $spelerID = $_POST['spelerID'];
                   
            //probeer om de statement uivoeren & alt versie indien nodig: $this->statement_execute
            if($stmt->execute()){
            //records deleted, go back to deletespeler.php
            header('Location: deletespeler.php');
        } else {
            echo "Iets ging fout!";
            }
        }
    }
}

//toevoegen van Toernooien
    public function addToernooi($toernooiID, $omschrijving, $datum) //: array
    {
        $sql = "INSERT INTO toernooien(toernooiID, omschrijving, datum) VALUES(:toernooiID, :omschrijving, :datum)";
            if ($stmt = $this->pdo->prepare($sql)) {
                $stmt->bindParam(":toernooiID",$param_toernooiID);
                $stmt->bindParam(":omschrijving",$param_omschrijving);
                $stmt->bindParam(":datum",$param_datum);

                //set de parameters
                $param_toernooiID = $toernooiID;
                $param_datum = $datum;
                $param_omschrijving = $omschrijving;

                return $stmt->execute();
                
                if (isset($_POST['addToernooi'])){
                    $toernooiID = $_POST['toernooiID'];
                    $omschrijving = $_POST['omschrijving'];
                    $datum = $_POST['datum'];
                if($stmt->execute()){
                    //records created succesfull, go back to spelers.php
                    header('Location: toernooien.php');
                    } else {
                        echo "Iets ging fout!";
                }
                           
            }
        }   
    }

//edit Toernooi - editToernooi
    public function editToernooi($toernooiID, $omschrijving, $datum) //: array
    {
        $sql = "UPDATE toernooien SET toernooiID=:toernooiID, omschrijving=:omschrijving, datum=:datum WHERE toernooiID=:toernooiID";   
            if ($stmt = $this->pdo->prepare($sql)) {
                $stmt->bindParam(":toernooiID",$param_toernooiID);
                $stmt->bindParam(":omschrijving",$param_omschrijving);
                $stmt->bindParam(":datum",$param_datum);

                //set de parameters
                $param_toernooiID = $toernooiID;
                $param_datum = $datum;
                $param_omschrijving = $omschrijving;

                return $stmt->execute();
                
                if (isset($_POST['editToernooi'])){
                    $toernooiID = $_POST['toernooiID'];
                    $omschrijving = $_POST['omschrijving'];
                    $datum = $_POST['datum'];
                if($stmt->execute()){
                    //records created succesfull
                    header('Location: toernooien.php');
                    } else {
                        echo "Iets ging fout!";
                    }
                        
                }
            }   
    }

//deleteToernooi. Verwijderen van gegevens!
public function deleteToernooi($toernooiID){
    $sql = "DELETE FROM toernooien WHERE toernooiID=:toernooiID";
     if ($stmt = $this->pdo->prepare($sql)){
        //linkies
        $stmt->bindParam(":toernooiID",$param_toernooiID);
        $param_toernooiID = $toernooiID;
        return $stmt->execute();

        if (isset($_POST['deleteToernooi'])) {
            $spelerID = $_POST['toernooiID'];
            //probeer om de statement uivoeren & alt versie indien nodig: $this->statement_execute
            if($stmt->execute()){
            //records deleted, go back to deletespeler.php
            header('Location: deletetoernooi.php');
        } else {
            echo "Iets ging fout!";
            }
        }
    }
}

//aanmeldingen toevoegen addAanmelding
public function addAanmelding($aanmeldingID, $spelerID, $toernooiID){
    $sql = "INSERT INTO aanmeldingen(aanmeldingID, spelerID, toernooiID) VALUES(:aanmeldingID, :spelerID, :toernooiID)";
        if ($stmt = $this->pdo->prepare($sql)) {

            $stmt->bindParam(":aanmeldingID",$param_aanmeldingID);
            $stmt->bindParam(":toernooiID",$param_toernooiID);
            $stmt->bindParam(":spelerID",$param_spelerID);

            //set de parameters
            $param_aanmeldingID = $aanmeldingID;
            $param_spelerID = $spelerID;
            $param_toernooiID = $toernooiID;

            return $stmt->execute();
            
            if (isset($_POST['addAanmelding'])){
                $aanmeldingID = $_POST['aanmeldingID'];
                $spelerID = $_POST['spelerID'];
                $toernooiID = $_POST['toernooiID'];
            if($stmt->execute()){
                //records created succesfull, go back.
                header('Location: aanmeldingen.php');
                } else {
                    echo "Iets ging fout!";
            }
                       
        }
    }   
}

//update aanmelding updateAanmelding
public function updateAanmelding($aanmeldingID, $spelerID, $toernooiID){
    $sql = "UPDATE aanmeldingen SET aanmeldingID=:aanmeldingID, spelerID=:spelerID, toernooiID=:toernooiID WHERE aanmeldingID=:aanmeldingID";
        if ($stmt = $this->pdo->prepare($sql)) {

            $stmt->bindParam(":aanmeldingID",$param_aanmeldingID);
            $stmt->bindParam(":toernooiID",$param_toernooiID);
            $stmt->bindParam(":spelerID",$param_spelerID);

            //set de parameters
            $param_aanmeldingID = $aanmeldingID;
            $param_spelerID = $spelerID;
            $param_toernooiID = $toernooiID;

            return $stmt->execute();
            
            if (isset($_POST['updateAanmelding'])){
                $aanmeldingID = $_POST['aanmeldingID'];
                $spelerID = $_POST['spelerID'];
                $toernooiID = $_POST['toernooiID'];
            if($stmt->execute()){
                //records created succesfull, go back.
                header('Location: aanmeldingen.php');
                } else {
                    echo "Iets ging fout!";
            }            
        }
    }   
}


//school toevoegen HIER WAS DE TIJD OM, MOET NOG AANPASSEN
public function addSchool($schoolID, $spelerID, $toernooiID){
    $sql = "INSERT INTO aanmeldingen(aanmeldingID, spelerID, toernooiID) VALUES(:aanmeldingID, :spelerID, :toernooiID)";
        if ($stmt = $this->pdo->prepare($sql)) {

            $stmt->bindParam(":aanmeldingID",$param_aanmeldingID);
            $stmt->bindParam(":toernooiID",$param_toernooiID);
            $stmt->bindParam(":spelerID",$param_spelerID);

            //set de parameters
            $param_aanmeldingID = $aanmeldingID;
            $param_spelerID = $spelerID;
            $param_toernooiID = $toernooiID;

            return $stmt->execute();
            
            if (isset($_POST['addAanmelding'])){
                $aanmeldingID = $_POST['aanmeldingID'];
                $spelerID = $_POST['spelerID'];
                $toernooiID = $_POST['toernooiID'];
            if($stmt->execute()){
                //records created succesfull, go back.
                header('Location: aanmeldingen.php');
                } else {
                    echo "Iets ging fout!";
            }
                       
        }
    }   
}




};

?>