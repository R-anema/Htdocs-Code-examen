<?php
//check of alles erin een nieuwe gebruiker is.
class newUser{
    public function checkUser (){
        if (isset($_POST['newUser'])){
            try{
                $loginController = new LoginController();
                $loginController->CreateUser($_POST['user'], $_POST['password'], $_POST['repeatedPassword'], $_POST['userName'], $_POST['email']);
                echo 'Gebruiker opgeslagen<br/>';
            }
            catch (Exception $ex){echo $ex->getMessage() . "<br />";}   
        }
    }  
};

?>