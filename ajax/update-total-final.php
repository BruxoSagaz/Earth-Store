<?php

session_start();
header('Access-Control-Allow-Origin: *');

$total = $_POST['total'];
$servico = $_POST['servico'];
$frete = $_POST['frete'];

$_SESSION['totalFinal'] = $total;
$_SESSION['servicoEntrega'] = $servico;
$_SESSION['frete'] = $frete;


$data['sucesso'] = "true";
die(json_encode($data));
?>