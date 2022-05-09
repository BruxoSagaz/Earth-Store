<?php
include("PDO.php");

$id = $_POST['id'];
$data = array();


$querys = "DELETE FROM `produto` WHERE `id` = $id";


// $sql = $pdo->query("DELETE FROM `produto` WHERE `id` = $id");


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