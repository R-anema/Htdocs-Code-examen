<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
</head>
<body>
    <h1>Home</h1>
    <div name="navigatie">
        <li> <a href="index.php"> Home </a></li>
        <li> <a href="magazijnen.php"> Magazijnen </a></li>
        <li> <a href="bloemen.php"> Bloemen </a></li>
    </div>

<?php
include 'pdo.php';

//Login leid hiernaar. Dit deel heeft de overzicht.
echo "<h1>Media control panel</h1><table><tr><th>Titel</th></tr>";
$overzicht = $pdo->query('SELECT bloemen.bloem_id, bloemen.locatie, bloemen.magazijn_id FROM bloemen INNER JOIN magazijnen ON bloemen.magazijn_id = magazijnen.magazijn_id;');

foreach ($overzicht as $row => $bloemen) {
    echo $bloemen['bloem_id'];
    echo "<tr>";
    echo $bloemen['magazijn_id'];
    echo "<tr>";
    echo $bloemen['locatie'];
}

?></body> </html>