<?php
include_once('PDO.php');


$id = $_SESSION['id_admin'];
$trans = $_POST['id'];

$query = "UPDATE `usuarios_pedidos` SET `responsavel` = ?  WHERE `transaction-id` = ? ";

// echo $query;

$res = normalDbQuery($query,[$id,$trans]);
// print_r(count($res));
if(count($res) == 0 ){
    die(json_encode(['retorno'=>'sucesso']));
}else{
    die(json_encode(['retorno'=>'falha']));
}


?>