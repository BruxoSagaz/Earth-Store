<?php
include("PDO.php");

$id = $_POST['id'];
$variations = $_POST['variations'];

$variations = implode(",",$variations);

$data = array();

if($variations == ''){
    $variations = "0";
}

$querys = "UPDATE `produto` SET `variacoes` = '?' WHERE `id` = '?'";
$valores = [$variations,$id];

function dbQuery($query,$valores){
    global $pdo;
    $sql = $pdo->prepare($query);

    try{
        $sql->execute($valores);
        $data['sucesso']='true';
        die(json_encode($data));
    }catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
}

dbQuery($querys,$valores);
?>