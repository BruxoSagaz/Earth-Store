<?php

include_once('PDO.php');

$cod = $_POST['cod-rastreio'];
$id = $_POST['id'];

$result = normalDbQuery("UPDATE `usuarios_pedidos`  SET  `rastreio`='$cod', `status` = 'Enviado' WHERE `transaction-id` = '$id'");

if(isset($result)){
    die(json_encode(['retorno' => 'sucesso']));
}else{
    die(json_encode(['retorno' => 'falha']));
}










?>