<?php
include("../config.php");
include("../ajax/PDO.php");

$nome = trim($_POST['nome']);
$date = trim($_POST['data']);
$cpf = trim($_POST['cpf']);
$cell = trim($_POST['cell']);
$email = trim($_POST['email']);
$senha = trim($_POST['senha']);

// $date =  explode('-',$date);
// $date = "{$date[2]}-{$date[1]}-{$date[0]}";

$dbReturn;

$data = array();

$query = "INSERT INTO `dblojinha`.`usuario` (`cpf`, `senha`, `nome`, `dataNascimento`, `celular`, `email`) VALUES ('{$cpf}','{$senha}','{$nome}','{$date}','{$cell}','{$email}'); SELECT LAST_INSERT_ID()";

function dbQuery($query){
    global $pdo;
    global $dbReturn;

    $sql = $pdo->prepare($query);
    if($sql->execute()){
        if (strpos($query, 'SELECT') !== false) {
            $result = $sql->fetchAll();
            //print_r($result);
            $dbReturn = $result;
            return $result;
        }
        return false;
    }else{
        return false;
    };
}





try{
    if(dbQuery($query)){

        $query = "INSERT INTO `dblojinha`.`usuarios-compras` (`id`,`cpf`) VALUES ('{$dbReturn[0][0]}','{$cpf}')";

        $data['retorno'] = "sucesso";
    }else{
        $invalidos = "";
        // $query = "SELECT * FROM `usuario` WHERE `cpf` ='{$cpf}' OR `senha` ='{$senha}' OR `email` ='{$email}'";
        // echo $query;
        // echo "SELECT * FROM `usuario` WHERE `senha` ='{$senha}'";
        if(dbQuery("SELECT `cpf` FROM `usuario` WHERE `cpf` ='{$cpf}'")){
            // tem cpf iguais na tabela
            $invalidos .= ",cpf";
        }
        if(dbQuery("SELECT `senha` FROM `usuario` WHERE `senha` ='{$senha}'")){
            // tem senhas iguais na tabela
            $invalidos .= ",senha";
        };
        if(dbQuery("SELECT `email` FROM `usuario` WHERE `email` ='{$email}'")){
            // tem emails iguais na tabela
            $invalidos .= ",email";
        };

        $data['retorno'] = "falha";
        $data['invalidos'] = $invalidos;
    };
}catch (Exception $e) {
    echo 'Exceção capturada: ',  $e->getMessage(), "\n";   
}





die(json_encode($data));
?>