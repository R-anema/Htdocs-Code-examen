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

$films = $conn->query('select * from movies where id=' . $id);

$opslaan = $films->fetch();
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
<h1><?php echo $opslaan["title"] . " - " . $opslaan["length_in_minutes"];?></h1>

<table> 
<tr> <td> <b>Datum van uitkomst </b></td> <td> <?php echo $opslaan["released_at"];?> </td></tr>
<tr> <td><b>Land van uitkomst</b></td> <td> <?php echo $opslaan["country_of_origin"];?> </td></tr>
</table>

<p><?php echo $opslaan["summary"];?></p>

<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $opslaan["youtube_trailer_id"]; ?>"
 title="YouTube video player" ></iframe>
</body>
</html>
