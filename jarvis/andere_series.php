<?php

$id = $_GET["id"];

$servernaam = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servernaam;dbname=netland", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$series = $conn->query('select * from series where id=' . $id);

$opslaan = $series->fetch();
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netland!</title>
    <style>
        body {
            background-image: linear-gradient(120deg, #a6c0fe 0%, #f68084 100%);
        }

        #sorting {
            font-style: italic;
            color: grey
        }

        ;
    </style>
</head>
<body>
<h1><?php echo $opslaan["title"] . " - " . $opslaan["rating"];?></h1>

<table> 
<tr> <td>Awards?</td> <td> <?php echo $opslaan["has_won_awards"];?> </td></tr>
<tr> <td>Seasons</td> <td> <?php echo $opslaan["seasons"];?> </td></tr>
<tr> <td>country</td> <td> <?php echo $opslaan["country"];?> </td></tr>
<tr> <td>Language</td> <td> <?php echo $opslaan["spoken_in_language"];?> </td></tr>
</table>

<p><?php echo $opslaan["summary"];?></p>
    </body>
    </html>
