<?php
$pdo = new PDO('mysql:host=localhost;dbname=dblojinha','root','');

$nome = $_POST['nome'];
$date = $_POST['data'];
$cpf = $_POST{'cpf'};
$cell = $_POST{'cell'};
$email = $_POST{'email'};
$senha = $_POST{'senha'};

$date =  explode('-',$date);
$date = "{$date[2]}-{$date[1]}-{$date[0]}";

$data = array();

$query = "INSERT INTO `dblojinha`.`usuario` (`cpf`, `senha`, `nome`, `dataNascimento`, `celular`, `email`) VALUES ('{$cpf}','{$senha}','{$nome}','{$date}','{$cell}','{$email}')";

function dbQuery($query){
    global $pdo;
    $sql = $pdo->prepare($query);
    if($sql->execute()){
        if (strpos($query, 'SELECT') !== false) {
            $result = $sql->fetchAll();
            //print_r($result);
            return $result;
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