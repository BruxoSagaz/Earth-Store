<?php
include_once('PDO.php');

$id = $_POST['id'];


$dadosIndivid = normalDbQuery("SELECT * FROM `usuarios_pedidos` WHERE `transaction-id`='$id'",[]);
$dadosIndivid = $dadosIndivid[0];

die(json_encode($dadosIndivid))



?>