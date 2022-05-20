<?php
include("PDO.php");

$id = $_POST['id'];
$variations = $_POST['variations'];

$variations = implode(",",$variations);

$data = array();

if($variations == ''){
    $variations = "0";
}

$querys = "UPDATE `produto` SET `variacoes` = '$variations' WHERE `id` = '$id'";

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