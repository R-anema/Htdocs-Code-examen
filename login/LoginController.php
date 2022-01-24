<?php
//Het officiele werkpaard van de inlog. Zet de functies in 1 Class. (CreateUser, ValidateRepeatedPassword, etc)....plaats hier alle methods en properties
class LoginController {
    public function __construct(){
        $server = '(local)';
        $database = 'netland';
        $user = 'sa';
        $password = '****';
        $this->connection = new PDO("sqlsrv:Server=$server;Database=$database", $user, $password);
}

private PDO $connection;
{
    $this->ValidateUser($user);
    $this->ValidatePassword($password);
    return $this->CheckPassword($user, $password);
}

Eerst wordt ValidateUser aangeroepen om te kijken of er een gebruikersnaam is ingevoerd, daarna hetzelfde grapje voor het wachtwoord en tot slot wordt gekeken of user en password bij elkaar passen. De beide validate functies zijn weer simpel:

private function ValidateUser(string $user)
{
    if (strlen(trim($user)) == 0)
    {
        throw new Exception('Geef een usernaam op');
    }
}

private function ValidatePassword(string $password)
{
    if (strlen(trim($password)) == 0)
    {
        throw new Exception('Geef een wachtwoord op');
    }
}

public function CreateUser(string $user, string $password, string $repeatedPasswword, string $fullName, string $email){
    $this->ValidateUser($user);
    $this->ValidatePassword($user);
    $this->ValidateRepeatedPassword($password, $repeatedPassword);
    $this->CheckIfUserExists($user);

private function ValidateRepeatedPassword(string $password, string $repeatedPassword){
        if (trim($password) != trim($repeatedPassword))
        {
            throw new Exception('Wachtwoorden moeten hetzelfde zijn');
        }
}
private function CheckIfUserExists(string $user){
        $statement = 
          $this->connection->Prepare("select 1 from $this->table where id = :id");
        $statement->execute([":id" => $user]);
        if ($statement->fetch() == 1)
        {
            throw new Exception("User $user bestaat al!");
        }
    } 
}
}

//Staat erbuiten voor het dubbel checken.

$statement = $this->connection->Prepare("insert into $this->table (id, password, name, email) values (:id, :password, :name, :email)");
$statement->execute(
    [":id" => trim($user),
     ":password" => password_hash(trim($password), PASSWORD_DEFAULT),
     ":name" => trim($fullName),
     ":email" => trim($email)
    ]);

?> 