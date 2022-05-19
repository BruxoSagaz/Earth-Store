<?php
include("PDO.php");

$categoria = $_POST['select'];
$variations = $_POST['variations'];
$data = array();

if($variations == ''){
    $variations = "Sem Variações";
}

$querys = "UPDATE `variacoes` SET `variacoes` = '$variations' WHERE `categoria` = '$categoria'";

function dbQuery($query){
    global $pdo;
    $sql = $pdo->prepare($query);

    try{
        $sql->execute();
        $data['sucesso']='true';
        die(json_encode($data));
    }catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
}

dbQuery($querys);
?>