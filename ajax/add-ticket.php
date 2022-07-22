<?php
include_once("../config.php");
include_once("../ajax/PDO.php");

$nome = $_POST['nome'];
$assunto = $_POST['assunto'];
$email = $_POST['email'];
$celular = $_POST['celular'];
$relato = $_POST['relato'];

$idTicket = uniqid();

$celular = preg_replace("/\D/", "", $celular);


$query = "INSERT INTO `tickets_ajuda` ( `id`,`assunto`, `email`, `celular`, `relato`) VALUES ('?','?','?','?','?')";
$valores = [$id,$assunto,$email,$celular,$relato];
normalDbQuery($query,$valores);

die(json_encode(['retorno'=>'sucesso']));
?>