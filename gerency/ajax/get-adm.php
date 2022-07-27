<?php
include_once('PDO.php');


$id = $_POST['id'];
$return = [];


$query = "SELECT * FROM `admin` WHERE `admin_id` = ? ";
$values = [$id];
$res = normalDbQuery($query,$values);
$adminID = $res[0]['admin_id'];
array_push($return,$res[0]);



// Pedidos Finalizados
$query = "SELECT COUNT(`transaction-id`) FROM `usuarios_pedidos` WHERE (`status`='Enviado' OR `status`='Recebido') AND `responsavel` = '".$adminID."' ";
$values = [];   
$res = normalDbQuery($query,$values);
array_push($return,[$res[0]['COUNT(`transaction-id`)']]);


// Pedidos Esperando
$query = "SELECT COUNT(`transaction-id`) FROM `usuarios_pedidos`  WHERE `status`='Paga' AND `responsavel` = '".$adminID."'";
$values = [];

$res = normalDbQuery($query,$values);
array_push($return,[$res[0]['COUNT(`transaction-id`)']]);


// Atendimentos finalizados
$query = "SELECT COUNT(`id`) FROM `tickets_ajuda` WHERE `status`='Finalizado' AND `responsavel` = '".$adminID."'";
$values = [];

$res = normalDbQuery($query,$values);
array_push($return,[$res[0]['COUNT(`id`)']]);



// Atendimentos finalizados
$query = "SELECT COUNT(`id`) FROM `tickets_ajuda` WHERE `status`='Aberto' AND `responsavel` = '".$adminID."'";
$values = [];

$res = normalDbQuery($query,$values);
array_push($return,[$res[0]['COUNT(`id`)']]);


// print_r(count($res));
die(json_encode($return))


?>