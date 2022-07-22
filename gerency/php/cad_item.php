<?php
include("PDO.php");

$nome = $_POST['nome'];
$categoria = $_POST['categoria'];
$basePrice = $_POST['basePrice'];
$parcelas = $_POST['parcelas'];
$estoque = $_POST['estoque'];
$tags = $_POST['tags'];
$peso = $_POST['peso'];


$image_names = trim($_POST['image_names']);
$dataRet = array();

if(isset($_POST['prom_ver'])){
    if($_POST['prom_ver']=='on'){
        $prom_ver=1;
    }else{
        $prom_ver=0;
    }
    
}else{
    $prom_ver=0;
}


if(isset($_POST['prom_val'])){
    $prom_val = $_POST['prom_val'];
}else{
    $prom_val = 0;
}

if(isset($_POST['descricaoGeral'])){
    $descricaoGeral = $_POST['descricaoGeral'];
}else{
    $descricaoGeral = "";
}

if(isset($_POST['especificacoes'])){
    $especificacoes = $_POST['especificacoes'];
}else{
    $especificacoes = "";
}

// echo $nome," ",$categoria," ",$basePrice," ",$parcelas," ",$estoque," ",$tags," ",$image_names," PROM_VER: ",
// $prom_ver,$prom_val," ",$descricaoGeral," ", $especificacoes;

$querys = "INSERT INTO `produto`( `nome`, `imagens`, `categoria`, `descricao-geral`, `especificacoes`, `tags`, `preco`, `promocao`, `valor_em_promocao`, `parcelas`, `estoque`, `peso`) VALUES ('?','?','?','?','?','?','?',?,'?','?','?','?')";
$valores1 = [$nome,$image_names,$categoria,$descricaoGeral,$especificacoes,$tags,$basePrice,$prom_ver,$prom_val,$parcelas,$estoque,$peso];
// echo "<br>";
// echo $querys;


$query2 = "SELECT * FROM `variacoes` WHERE categoria = '?'";
$valores2 = [$categoria];

$sql2 = $pdo->prepare($query2);

$sql2->execute($valores2);
$row = $sql2->rowCount();

if($sql2->rowCount() == 0 || $sql2->rowCount() == false ){
    $sql2 = $pdo->prepare("INSERT INTO `variacoes` (`categoria`) VALUES ('?')");
    $valoresX = [$categoria];
    $sql2->execute($valoresX);
}

function dbQuery($query,$valores){
    global $pdo;
    $sql = $pdo->prepare($query);

    try{
        $sql->execute($valores);
        $data['sucesso']='true';
        die(json_encode($data));
    }catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
}


dbQuery($querys,$valores1);
?>