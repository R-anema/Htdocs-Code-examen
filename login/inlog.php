<?php
require_once ('LoginController.php');
session_start();

if (isset($_POST['login']))
{
    try
    {
        $user = $_POST['user'];
        $loginController = new LoginController();
        if ($loginController->Login($user, $_POST['password']))
        {
            echo 'ingelogd<br/>';
            $_SESSION['user'] = $user;
        }
        else
        {
            echo 'ongeldig user id of wachtwoord<br/>';
            unset( $_SESSION['user']);
        }
    } catch (Exception $ex)
    {
        echo $ex->getMessage() . "<br/>";
    }
}

?>

<html> 
<head>
    <title>Nieuwe gebruiker maken</title>
</head>
<body>
    <form action="NewUser.php" method="post">
        <table>
            <tr>
                <td>Gebruiker</td>
                <td>
                    <input type="text" name="user" />
                </td>
            </tr>
            <tr>
                <td>Volledige naam</td>
                <td>
                    <input type="text" name="userName" />
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    <input type="text" name="email" />
                </td>
            </tr>
            <tr>
                <td>Wachtwoord</td>
                <td>
                    <input type="password" name="password" />
                </td>
            </tr>
            <tr>
                <td>Herhaal wachtwoord</td>
                <td>
                    <input type="password" name="repeatedPassword" />
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="newUser" value="Opslaan" />
                </td>
            </tr>
        </table>
    </form>
</body> </html>