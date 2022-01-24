<?php
include_once 'pdo.php';

//$row = $stmt->fetch(PDO::FETCH_ASSOC);
// echo $row;

class Fietsen {
    //stuff goes here
}

$fietsen = $pdo->query('SELECT * FROM fietsen')->fetchAll(PDO::FETCH_CLASS, 'Fietsen');
echo '<pre>';
print_r($fietsen);

?>