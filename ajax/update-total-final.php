<?php

session_start();
header('Access-Control-Allow-Origin: *');

$total = $_POST['total'];
$servico = $_POST['servico'];

$_SESSION['totalFinal'] = $total;
$_SESSION['servicoEntrega'] = $servico;


$data['sucesso'] = "true";
die(json_encode($data));
?>