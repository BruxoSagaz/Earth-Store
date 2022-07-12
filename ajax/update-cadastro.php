<?php
include("../config.php");
include("../ajax/PDO.php");
$nome = trim($_POST['nome']);
$date = trim($_POST['data']);
$cpf = $_POST['cpf'];
$cell = $_POST['cell'];
$email = $_POST['email'];
$id = $_POST['id'];

// $date =  explode('/',$date);
// $date = "{$date[2]}/{$date[1]}/{$date[0]}";

$dbReturn;

$data = array();

$query = "UPDATE `usuario` SET `cpf`='{$cpf}',`nome`='{$nome}',`dataNascimento`='{$date}',`celular`='{$cell}',`email`='{$email}' WHERE `id` = {$id}";
// echo $query;
function dbQuery($query){
    global $pdo;
    global $dbReturn;

    $sql = $pdo->prepare($query);
    if($sql->execute()){
        if (strpos($query, 'SELECT') !== false) {
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            // print_r(count($result[0]));
            if(count($result[0]) > 1){
                return true;
            }else{
                return false;
            }
        }
        return true;
    }else{
        return false;
    };
}





try{
    if(dbQuery($query)){
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