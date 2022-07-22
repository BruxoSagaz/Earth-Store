<?php
include("PDO.php");

$categoria = $_POST['select'];
$variations = $_POST['variations'];
$data = array();

if($variations == ''){
    $variations = "Sem Variações";
}

$querys = "UPDATE `variacoes` SET `variacoes` = '?' WHERE `categoria` = '?'";
$valores = [$variations,$categoria];

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