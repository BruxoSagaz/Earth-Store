<?php
include("../config.php");
include("../ajax/PDO.php");
$senhaAtual = trim($_POST['senhaAtual']);
$senhaNova = trim($_POST['senhaNova']);
$id = $_POST['id'];

$dbReturn;

$data = array();



function dbQuery($query){
    global $pdo;
    global $dbReturn;

    $sql = $pdo->prepare($query);
    if($sql->execute()){
        if (strpos($query, 'SELECT') !== false) {
            $result = $sql->fetchAll(PDO::FETCH_ASSOC);
            // print_r(count($result[0]));
            return $result[0];
        }
        return true;
    }else{
        return false;
    };
}


$query = "SELECT `senha` FROM `usuario` WHERE `id` = {$id}";
// echo $query;

$senhaDb = dbQuery($query);
// print_r($senhaDb);
$senhaDb = $senhaDb['senha'];
// echo 'senhaDB : '. $senhaDb;
// echo '<br>';
// echo 'senhaAtual : '. $senhaAtual;
if($senhaDb == $senhaAtual){
    $query = "UPDATE `usuario` SET `senha`='{$senhaNova}' WHERE `id` = {$id}";

        
    try{
        if(dbQuery($query)){
            $data['status'] = 'login';
            $data['retorno'] = "Senha Alterada Com Sucesso, Refaça o Login!";
        }else{
            $data['retorno'] = "Sua Senha não foi alterada,falha no sistema";
        };
    }catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";   
    }
}else{
    $data['retorno'] = "Senha Atual Inválida";
}


die(json_encode($data));
?>