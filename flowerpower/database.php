<?php
//class database geindent volgens voorbeel PHP website
class database{

	//$db = mysql_connect('localhost', 'root', '', 'signup');

	private $host;
	private $username;
	private $password;
	private $database;
	private $charset;
	private $db;
	private $database_name;

	public function __construct($host, $username, $password, $database, $charset, $db){
		$this->$host = $host;
		$this->$username = $username;
		$this->$password = $password;
		$this->$database = $database;
		$this->$charset = $charset;
		$this->$db = $db; // weet niet of die moet blijven.

	try {
		//indented with tab, beginnen aan connectie Database
		$dsn = "mysql:host-$this->$host;dbname-$this->$database;charset-$this->charset";
		$this->db = new PDO($dsn, $this->$username, $this->$password);
		echo 'Succesfully connected';
	} //erroropvangen
		catch(PDOexception $e){
		$e->getMessage();
		exit('an error occured');
	}if (isset($_POST ['signup.php'])) {
		//hier alle input values van de form. Dit misschien naar signup sturen.
	}catch(PDOException $e){
		// die and exit are equivalent exit-> Output a message and terminate the current script
		exit('Unable to connect:' . $e->getMessage());
	}

	//if signup word aangeroepen: account aanmaken moet in signup en insert into ook gebruiken. TBA Singup checken of hij word aangeroepen, en afstemmen met.
	public function addAcount($voornaam, $tussenvoegsel, $achternaam, $email, $username, $password){
		try{
			$this->db->beginTransaction();
			echo "Begin Transactie pls";
			
			//TODO: wachtwoord en username ophalen/registeren. 
			$this->db = new PDO($dsn, $this->$username, $this->$password);
		}
	}

	private function is_admin($username){
        $sql = "SELECT type_id FROM account WHERE username = :username";

        $stmt = $this->dbh->prepare($sql);
        $stmt->execute(['username'=>$username]);

        // result is an associative array (key-value pair)
        $result = $stmt->fetch();
        
        if($result['type_id'] == self::ADMIN){
            return true;
        }
        // user is not admin
        return false;
    }
};

?>
