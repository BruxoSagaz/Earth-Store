<?php

include_once('PDO.php');


$nome = $_POST['nome'];
$login = $_POST['login'];
$senha = $_POST['senha'];
$cpf = $_POST['cpf'];
$nivel = $_POST['nivel'];
$nascimento = $_POST['nascimento'];
$celular = $_POST['celular'];;

$result = normalDbQuery("INSERT INTO `admin`(`senha_admin`, `login_admin`, `nivel`, `nome_admin`, `cpf`, `nascimento`, `celular`) VALUES (?,?,?,?,?,?,?)",[$senha,$login,$nivel,$nome,$cpf,$nascimento,$celular]);



if(isset($result)){
    die(json_encode(['retorno' => 'sucesso']));
}else{
    die(json_encode(['retorno' => 'falha']));
}





?>