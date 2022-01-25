<?php
//new user form
include 'database.php';

$fieldnames = array(
  'voornaam', 'achternaam', 'email', 'username', 'password'
);

$error = False;

foreach($fieldnames as $fieldname){
 if (!isset($_POST[$fieldname]) || empty($_POST[$fieldname])){
   $error = True;
 }
}

if(!$error){
    $db = new database('localhost', 'root', '', 'project1', 'utf8_decode(data)');
} else {
    if(isset ($_POST)['submit']) {
      
      //call signup
      $msg = $db->sign_up($uname, $db::USER, $fname, $mname, $lname, $email, $pwd);
    }
}


try {
  //indented with tab, beginnen aan connectie Database
  $dsn = "mysql:host-$this->$host;dbname-$this->$database;charset-$this->charset";
  $this->db = new PDO($dsn, $this->$username, $this->$password);
  echo 'Succesfully connected';
} //error opvangen
catch(PDOexception $e){
  $e->getMessage();
  exit('an error occured');
}

if (isset($_POST ['signup.php'])) {
  //hier alle input values van de form. Dit misschien naar signup sturen.

}
//if signup word aangeroepen: account aanmaken moet in signup en insert into ook gebruiken. TBA Singup checken of hij word aangeroepen, en afstemmen met.
public function addAcount($voornaam, $tussenvoegsel, $achternaam, $email, $username, $password){
  try{
    $this->db = new PDO($dsn, $this->$username, $this->$password); //nog bijwerken voor deze functie.
    $username = $_POST['username']) // de varaiable "In deze if statement zorg je ervoor dat de database class instance word aangemaakt en insert method aanroept"
  }

}

$db ->addAccount($voornaam, $tussenvoegsel, $achternaam, $email, $username, $password);


?>


<html>
  <form action="signup.php" method="POST">

      <label> Username </label>
        <input id="username" value="" name="username" type="text" required="required"><br>

    <label> Tussenvoegsel </label>
        <input id="tussenvoegsel" value="" name="tussenvoegsel" type="text"><br>

    <label> Achternaam </label>
        <input id="achternaam" value="" name="achternaam" type="text" required="required"><br>

    <label> Email </label>
        <input id="email" value="" name="email" type="text" required="required"><br>

    <label> Gebruikersnaam </label>
       <input id="gebruikersnaam" value="" name="gebruikersnaam" type="text" required="required"><br>

    <label> wachtwoord </label>
       <input id="wachtwoord" value="" name="wachtwoord" type="text" required="required"><br>

    <label> herhaal wachtwoord </label>
       <input id="hwachtwoord" value="" name="hwachtwoord" type="text" required="required"><br>

  <button type="submit"><span>Word Gebruiker</span></button>
  <a href="index.php"> Ik heb al een account. </a>
</form>
</html>
