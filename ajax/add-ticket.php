<?php
include_once("../config.php");
include_once("../ajax/PDO.php");

$nome = $_POST['nome'];
$assunto = $_POST['assunto'];
$email = $_POST['email'];
$celular = $_POST['celular'];
$relato = $_POST['relato'];

$celular = preg_replace("/\D/", "", $celular);


$query = "INSERT INTO `tickets_ajuda` (`assunto`, `email`, `celular`, `relato`) VALUES ('$assunto','$email','$celular','$relato')";

normalDbQuery($query);

die(json_encode(['retorno'=>'sucesso']));
?>