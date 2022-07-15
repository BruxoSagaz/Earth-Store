<?php
include("../config.php");
include("../ajax/PDO.php");
$data = array();


$numCard = $_POST['num-card'];
$bandeira = $_POST['bandeiras'];
$cvv = $_POST['cvv'];
$validade = $_POST['validade'];
$salvar = 'checked';
$id = $_SESSION['dados']['id'];

$_SESSION['salvar-card'] = 'checked';

$query = "SELECT * FROM `usuarios-cards` WHERE `id` = $id";
$res = normalDbQuery($query);

if(count($res) == 0){
    // Não salvo Card

    $query = "INSERT INTO `usuarios-cards` (`id`, `num-card`, `bandeira`, `cvv`, `validade`) VALUES ($id,'$numCard','$bandeira','$cvv','$validade')";
    $res = normalDbQuery($query);

    print_r($res);
}else{
    $query = "UPDATE `usuarios-cards` SET `num-card`='$numCard',`bandeira`='$bandeira',`cvv`='$cvv',`validade`='$validade'";
    $res = normalDbQuery($query);

    print_r($res);
}

die();
?>