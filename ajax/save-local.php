<?php
include("../config.php");
include("../ajax/PDO.php");




$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$complement = $_POST['complement'];
$return = array();

$id = $_SESSION['dados']['id'];

$local = array("cep"=>$cep,"endereco"=>$endereco,"numero"=>$numero,"bairro"=>$bairro,"cidade"=>$cidade,"estado"=>$estado,"comp"=>$complement,"salvar"=>"checked");

$_SESSION['local'] = $local;

// print_r($_SESSION['local']);


$query = "SELECT * FROM `enderecos` WHERE `id` = $id";
$valores = [$id];

if(normalDbQuery($query,$valores)->rowCount() > 0){
    // echo "oii";
    $return['salvo'] = 'true';
}else{
    $query = "INSERT INTO `dblojinha`.`enderecos` (`id`,`cep`, `logradouro`, `bairro`, `cidade`, `estado`, `numero`, `complemento`) VALUES ('?','?','?','?','?','?','?','?')";
    $valores = [$id,$cep,$endereco,$bairro,$cidade,$estado,$numero,$complement];

    // echo $query;
    if(normalDbQuery($query,$valores)->rowCount() > 0){
        die(json_encode(['sucesso'=>"true"]));
    }
    
}






?>