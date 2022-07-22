<?php
include("../config.php");
include("../ajax/PDO.php");

$id = $_POST['id'];
$retorno = array();


$query ="UPDATE `usuarios_pedidos` SET `status`= 'Recebido' WHERE `transaction-id` = '?'";
$valores = [$id];

$result = normalDbQuery($query,$valores);


if($result != false){
    $retorno['msg'] = "Confirmação de Recebimento Realizada";
    $retorno['retorno'] = 'sucesso';

    die(json_encode($retorno));
}else{
    $retorno['msg'] = "Confirmação de Recebimento Falhou!";
    $retorno['retorno'] = 'sucesso';

    die(json_encode($retorno));
}


?>