<!DOCTYPE html>
<html>
<head>
<title>Series</title>
</head>
<body>

<h1>Series</h1><br>
<p>This is a paragraph. ID is belangrijk voor elke serie in de url. (GET)</p>

<form action="index.php" method="get"> <br> </form>
 
<?php

echo $_GET["id"];

$stmt = $pdo->query('SELECT id FROM series');

$serie = $stmt->fetchAll(PDO::FETCH_COLUMN);

$seriesid = $pdo->query('SELECT * FROM series');

foreach ($seriesid as $rowe) {
    echo "<tr>";
    echo "<td>" . $rowe['seriesid'] . "</td>";
}



</table>
<h3>Series</h3>
<?php
$stmt = $pdo->query('SELECT id, title, rating FROM series');
?>
<table>
    <thead>
        <tr>
            <th>Titel</th>
            <th>Rating</th>
            <th>change</th>
            <th>create</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
<?php
while ($row = $stmt->fetch()) {
?>
        <tr>
            <td><?php echo $row['title']; ?></td>
            <td><?php echo $row['rating']; ?></td>
            <td><a href="edit_serie.php?id=<?php echo $row['id']; ?>" target="_blank">Edit</a></td>
            <td><a href="create_serie.php=<?php echo $row['id']; ?>" target="_blank">Edit</a></td>
        </tr>
<?php
}
?>
    </tbody>
</table>

?> </body> </html>