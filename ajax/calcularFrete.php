<?php
include("../config.php");
include("../ajax/PDO.php");

// ordem: SEDEX À Vista / PAC à visa


$serv = array('04014','04510');
$ids = $_POST['id'];
$cep = $_POST['cep'];
$retorno = array();
$pesos = [];
$pesoFinal = 0;


$ids = explode(",",$ids);

if(count($ids) > 1){
    foreach ($ids as  $chave => $id) {

        $cep = str_replace("-","",$cep);
        $query = "SELECT `peso` FROM `produto` WHERE `id` = ?";
        $valores = [$id];
        
        
        $sql = $pdo->prepare($query);
        $sql->execute($valores);
        $item = $sql->fetchAll();
        $item = $item[0];

        array_push($pesos,$item['peso']);
    }
}else{
    $cep = str_replace("-","",$cep);
    $query = "SELECT `peso` FROM `produto` WHERE `id` = $id";
    $valores = [$id];
    
    
    $sql = $pdo->prepare($query);
    $sql->execute($valores);
    $item = $sql->fetchAll();
    $item = $item[0];

    array_push($pesos,$item['peso']);
}



foreach ($pesos as  $chave => $peso) {
    $pesoFinal += floatval($peso);
}



//Pegando do config as dimensoes do pacote
// $comprimento = COMPRIMENTO;
// $altura = ALTURA;
// $largura = LARGURA;

function buildArray($cod){
    global $cep;
    global $pesoFinal;
    $info = array(
        'nCdEmpresa' => '',
        'sDsSenha' => '',
        'nVlValorDeclarado' => '0',
        'sCdMaoPropria' => 'n',
        'sCdAvisoRecebimento' => 'n',
        'nCdServico' => "$cod",
        'sCepOrigem' => CEP_DE_ORIGEM,
        'sCepDestino' => $cep,
        'nVlPeso' => strval($pesoFinal),
        'nVlComprimento' => COMPRIMENTO,
        'nVlAltura' => ALTURA,
        'nVlLargura' => LARGURA, 
        'StrRetorno' => 'xml',
        'nCdFormato' => '1',  
    );

    return $info;
}



$varias = http_build_query(buildArray($serv[0]));
$url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?".$varias;

$unparsed = file_get_contents($url);
$parsed = simplexml_load_string($unparsed);

$item1 = array(
    'servico'=> "SEDEX",
    'preco' => strval($parsed->cServico->Valor),
    'prazo' => strval($parsed->cServico->PrazoEntrega),
);

array_push($retorno,$item1);

$varias = http_build_query(buildArray($serv[1]));
$url = "http://ws.correios.com.br/calculador/CalcPrecoPrazo.aspx?".$varias;

$unparsed = file_get_contents($url);
$parsed = simplexml_load_string($unparsed);

$item2 = array(
    'servico'=> "PAC",
    'preco' => strval($parsed->cServico->Valor),
    'prazo' => strval($parsed->cServico->PrazoEntrega),
);

array_push($retorno,$item2);


die(json_encode($retorno));


?>
