<?php
include("../config.php");
include("../ajax/PDO.php");




$numCard = $_POST['num-card'];
$cvv = $_POST['cvv'];
$validade = $_POST['validade'];
$return = array();

$id = $_SESSION['dados']['id'];

// print_r($_SESSION['local']);


$query = "SELECT * FROM `usuarios-cards` WHERE `id` = $id";
$result = normalDbQuery($query);

if(count($result) > 0){
    // echo "oii";
    $query = "UPDATE `usuarios-cards` SET `num-card`='$numCard',`cvv`='$cvv',`validade`='$validade' WHERE `id`=$id";
    $return['salvo'] = 'true';

    $result = normalDbQuery($query);

    die(json_encode(['retorno'=>"Cartão atualizado com sucesso"]));

}else{
    $query = "INSERT INTO `dblojinha`.`usuarios-cards` (`id`,`num-card`, `cvv`, `validade`) VALUES ('$id','$numCard','$cvv','$validade')";

    // echo $query;
    if(count(normalDbQuery($query)) > 0){
        die(json_encode(['retorno'=>"Cartão nâo salvo"]));
    }
    
}


die(json_encode(['retorno'=>"Cartão nâo salvo"]))




?>