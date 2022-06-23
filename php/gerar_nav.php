<?php
include("../ajax/PDO.php");


$query = "SELECT DISTINCT `categoria` FROM `produto` LIMIT 15";

$sql = $pdo->prepare($query);
$sql->execute();


die(json_encode($sql->fetchAll()));

?>