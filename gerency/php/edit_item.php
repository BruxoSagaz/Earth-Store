<?php
include("PDO.php");

$nome = $_POST['nome'];
$categoria = $_POST['categoria'];
$basePrice = $_POST['basePrice'];
$parcelas = $_POST['parcelas'];
$estoque = $_POST['estoque'];
$tags = $_POST['tags'];
$image_names = $_POST['image_names'];
$id =$_POST['id'];
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

echo "Nome = ",$nome,"  Categoria = ",$categoria," BasePrice = ",$basePrice," Parcelas = ",$parcelas," Estoque = ",$estoque,"  Tags = ",$tags," IMG-Names = ",$image_names," PROM_VER: ",
$prom_ver,$prom_val," Descricao = ",$descricaoGeral,"  Especificacoes = ", $especificacoes,"ID = ",$id;

$querys = "INSERT INTO `produto`( `nome`, `imagens`, `categoria`, `descricao_geral`, `especificacoes`, `tags`, `preco`, `promocao`, `valor_em_promocao`, `parcelas`, `estoque`) VALUES ('$nome','$image_names','$categoria','$descricaoGeral','$especificacoes','$tags','$basePrice',$prom_ver,'$prom_val','$parcelas','$estoque')";

echo "<br>";
echo $querys;
echo "<br>";

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

// dbQuery($querys);
?>