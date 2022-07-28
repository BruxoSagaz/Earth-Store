<?php
include("../config.php");
include("../ajax/PDO.php");




$numCard = $_POST['num-card'];
$cvv = $_POST['cvv'];
$validade = $_POST['validade'];
$return = array();

$id = $_SESSION['dados']['id'];

// print_r($_SESSION['local']);


$query = "SELECT * FROM `usuarios-cards` WHERE `id` = ?";
$valores = [$id];
$result = normalDbQuery($query,$valores);

if(count($result) > 0){
    // echo "oii";
    $query = "UPDATE `usuarios-cards` SET `num-card`= ?,`cvv`= ?,`validade`= ? WHERE `id`=?";
    $valores = [$numCard,$cvv,$validade,$id];
    $return['salvo'] = 'true';
    $result = normalDbQuery($query,$valores);

    die(json_encode(['retorno'=>"Cartão atualizado com sucesso"]));

}else{
    $query = "INSERT INTO `dblojinha`.`usuarios-cards` (`id`,`num-card`, `cvv`, `validade`) VALUES ( ?, ?, ?, ?)";
    $valores = [$id,$numCard,$cvv,$validade];
    // echo $query;
    if(count(normalDbQuery($query,$valores)) > 0){
        die(json_encode(['retorno'=>"Cartão nâo salvo"]));
    }
    
}


die(json_encode(['retorno'=>"Cartão nâo salvo"]))




?>