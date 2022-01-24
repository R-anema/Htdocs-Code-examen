<?php
$host = 'localhost';
$db   = 'netland';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $series     = isset($_GET['series']) && !empty($_GET['series'])  ? 'series=' . $_GET['series'] . '&'     : '';
    $films      = isset($_GET['films']) && !empty($_GET['films'])    ? 'films=' . $_GET['films'] . '&'       : '';

    $get_series = isset($_GET['series']) && !empty($_GET['series']) ? $_GET['series'] : 'id';
    $get_film = isset($_GET['films']) && !empty($_GET['films']) ? $_GET['films'] : 'id';

    $get_film_dir = isset($_GET['....']) && !empty($_GET['....']) ? $_GET['.....'] : 'id';

    $queryFilms = "select title, length_in_minutes, id from movies ORDER BY " . $get_film . " DESC";
    $querySeries = "select title, rating, id from series ORDER BY " . $get_series . " DESC";

    $pdo = new PDO($dsn, $user, $pass, $options);
    $querySeriesDone = $pdo->query($querySeries);
    $queryFilmsDone = $pdo->query($queryFilms);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int) $e->getCode());
}
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
    <h1>Welkom op het netland beheerderspaneel</h1>
    <h2>Series</h2>
    <table>
        <tr>
            <th><a href="index.php?<?php echo $films; ?>series=title">Titel</a></th>
            <th><a href="index.php?<?php echo $films; ?>series=rating">Rating</a></th>
        </tr>
        <?php foreach ($querySeriesDone as $serieRow) { ?>
            <tr>
                <td><?php echo $serieRow['title']; ?></td>
                <td><?php echo $serieRow['rating']; ?> ★</td>
                <td><a href="series.php?id=<?php echo $serieRow['id']; ?>">Bekijk details</a></td>
            </tr>
        <?php } ?>
    </table>
    <?php if (isset($_GET["series"])) { ?>
        <p id="sorting">Active sorting: <?php echo $_GET["series"] ?> </p>
    <?php } ?>

    <h2>Films</h2>
    <table>
        <tr>
            <th><a href="index.php?<?php echo $series; ?>films=title">Titel</a></th>
            <th><a href="index.php?<?php echo $series; ?>films=length_in_minutes">Duur</a></th>
        </tr>
        <?php foreach ($queryFilmsDone as $movieRow) { ?>
            <tr>
                <td><?php echo $movieRow['title']; ?></td>
                <td><?php echo $movieRow['length_in_minutes']; ?> minuten</td>
                <td><a href="films.php?id=<?php echo $movieRow['id']; ?>">Bekijk details</a></td>
            </tr>
        <?php } ?>
    </table>
    <?php if (isset($_GET["films"])) { ?>
        <p id="sorting">Active sorting: <?php echo $_GET["films"] ?> </p>
    <?php } ?>
    <form action="index.php">
        <button>Reset sorting</button>
    </form>

</body>

</html>
