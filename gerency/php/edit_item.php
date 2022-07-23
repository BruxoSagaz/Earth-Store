<?php
include("PDO.php");

$nome = $_POST['nome'];
$categoria = $_POST['categoria'];
$basePrice = $_POST['basePrice'];
$parcelas = $_POST['parcelas'];
$estoque = $_POST['estoque'];

$peso = $_POST['peso'];


$tags = $_POST['tags'];
$image_names = $_POST['image_names'];
$id =$_POST['id'];
$data = array();

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

// echo "Nome = ",$nome," <br>  Categoria = ",$categoria," <br> BasePrice = ",$basePrice," <br> Parcelas = ",$parcelas," <br> Estoque = ",$estoque," <br> Tags = ",$tags," <br> IMG-Names = ",$image_names," <br> PROM_VER: ",
// $prom_ver,$prom_val," <br> Descricao = ",$descricaoGeral,"  <br>Especificacoes = ", $especificacoes," <br> ID = ",$id;

$querys = "UPDATE `produto` SET `nome`= ?,`imagens`= ?,`categoria`= ?,`descricao-geral`= ?,`especificacoes`= ?,`tags`= ?,`preco`= ?,`promocao`= ?,`valor_em_promocao`= ?,`parcelas`= ?,`estoque`= ?,`peso`= ? WHERE `id` = ?";
$valores = [$nome,$image_names,$categoria,$descricaoGeral,$especificacoes,$tags,$basePrice,$prom_ver,$prom_val,$parcelas,$estoque,$peso,$id];

// echo "<br>";
// echo $prom_ver;
// echo "<br>";

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

dbQuery($querys,$valores);
?>