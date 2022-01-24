<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
    <h1>Inloggen</h1>
    <?php
session_start();
        if (isset($_SESSION['loggedInUser'])){
            header('Location: index.php');
        }
        if (isset($_SESSION['error'])){
            echo '<div class="error">' . $_SESSION['error'] .'</div>';
        }
    ?>
    <form action="login_handler.php" method="post">
        <div class="form-group">
            <label for="Naam">Gebruikersnaam:</label><br>
            <input type="text" name="Naam" id="Naam" required>
        </div>

        <div class="form-group">
            <label for="Wachtwoord">W:</label><br>
            <input type="Wachtwoord" name="Wachtwoord" id="Wachtwoord" required>
        </div>

        <div class="form-group">
            <input type="submit">
        </div>
    </form>
</body>
</html>