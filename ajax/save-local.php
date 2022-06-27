<?php

include("../ajax/PDO.php");
include("../config.php");



$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$complement = $_POST['complement'];


$id = $_SESSION['dados']['id'];

$local = array("cep"=>$cep,"endereco"=>$endereco,"numero"=>$numero,"bairro"=>$bairro,"cidade"=>$cidade,"estado"=>$estado,"comp"=>$complement,"salvar"=>"checked");

$_SESSION['local'] = $local;

print_r($_SESSION['dados']);


$query = "SELECT * FROM `enderecos` WHERE `id` = $id";

if(dbQuery($query)->rowCount() > 0){
    echo "oii";
}else{
    $query = "INSERT INTO `dblojinha`.`enderecos` (`id`,`cep`, `logradouro`, `bairro`, `cidade`, `estado`, `numero`, `complemento`) VALUES ('$id','$cep','$endereco','$bairro','$cidade','$estado','$numero','$complement')";

    // echo $query;
    if(dbQuery($query)->rowCount() > 0){
        die(json_encode(['sucesso'=>"true"]));
    }
    
}


function dbQuery($query){
    global $pdo;
    $sql = $pdo->prepare($query);
    $sql->execute();
    $sql->fetchAll();
    return $sql;
}


?>