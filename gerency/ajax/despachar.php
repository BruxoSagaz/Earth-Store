<?php

include_once('PDO.php');

$cod = $_POST['cod-rastreio'];
$id = $_POST['id'];

$result = normalDbQuery("UPDATE `usuarios_pedidos`  SET  `rastreio`='$cod', `status` = 'Enviado' WHERE `transaction-id` = '$id'");

foreach ($_POST['query'] as $key => $value) {
    // echo 'nome:'.$value[1]." e quantidade: ".$value[0]."\n\n\n";

    $nome = $value[1]; 
    $query = "SELECT `estoque` FROM `produto` WHERE `nome` = '$nome'";
    $estoque = normalDbQuery($query,[]);
    $estoque = (int)$estoque[0]['estoque'];
    
    $res = $estoque - (int)$value[0]; 
    $query = "UPDATE `produto` SET `estoque`= $res WHERE `nome` = '$nome'";
    normalDbQuery($query,[]);
}

if(isset($result)){
    die(json_encode(['retorno' => 'sucesso']));
}else{
    die(json_encode(['retorno' => 'falha']));
}










?>