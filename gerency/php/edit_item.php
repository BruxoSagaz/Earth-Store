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

$querys = "UPDATE `produto` SET `nome`='$nome',`imagens`='$image_names',`categoria`='$categoria',`descricao-geral`='$descricaoGeral',`especificacoes`='$especificacoes',`tags`='$tags',`preco`='$basePrice',`promocao`=$prom_ver,`valor_em_promocao`='$prom_val',`parcelas`='$parcelas',`estoque`='$estoque',`peso`='$peso',`comprimento`='$comprimento',`altura`='$altura',`largura`='$largura' WHERE `id` = $id";

// echo "<br>";
// echo $querys;
// echo "<br>";

function dbQuery($query){
    global $pdo;
    $sql = $pdo->prepare($query);

    try{
        $sql->execute();
        $data['sucesso']='true';
        die(json_encode($data));
    }catch (Exception $e) {
        echo 'Exceção capturada: ',  $e->getMessage(), "\n";
    }
}

dbQuery($querys);
?>