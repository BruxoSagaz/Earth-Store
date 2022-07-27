<?php
include_once('PDO.php');

$senha = $_POST['senha'];
$login = $_POST['login'];
$nivel = $_POST['nivel'];
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$nascimento = $_POST['nascimento'];
$celular = $_POST['celular'];
$id = $_POST['id'];

$query = "UPDATE `admin` SET `senha_admin` = ?, `login_admin` = ?,`nivel` = ?, `nome_admin` = ?,`cpf` = ?, `nascimento` = ?, `celular` = ? WHERE `admin_id` = $id ";
$valores = [$senha,$login,$nivel,$nome,$cpf,$nascimento,$celular];

// echo $query;

$res = normalDbQuery($query,$valores);
// print_r(count($res));

die(json_encode(['retorno'=>'sucesso']));



?>