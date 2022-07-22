<?php
include_once('PDO.php');

$id = $_POST['id'];


$dadosIndivid = normalDbQuery("SELECT * FROM `tickets_ajuda` WHERE `id`='$id'");
$dadosIndivid = $dadosIndivid[0];

die(json_encode($dadosIndivid))



?>