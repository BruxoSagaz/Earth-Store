<?php

include("../ajax/PDO.php");
include("../config.php");
// ordem: SEDEX À Vista / PAC à visa


$serv = array('04014','04510');
$id = $_POST['id'];
$cep = $_POST['cep'];
$retorno = array();



// echo "Id = $id AND CEP = $cep";
$query = "SELECT * FROM `produto` WHERE `id` = $id";


$sql = $pdo->prepare($query);
$sql->execute();
$item = $sql->fetchAll();
$item = $item[0];

$peso = $item['peso'];

//Pegando do config as dimensoes do pacote
// $comprimento = COMPRIMENTO;
// $altura = ALTURA;
// $largura = LARGURA;

function buildArray($cod){

    $info = array(
        'nCdEmpresa' => '',
        'sDsSenha' => '',
        'nVlValorDeclarado' => '0',
        'sCdMaoPropria' => 'n',
        'sCdAvisoRecebimento' => 'n',
        'nCdServico' => "$cod",
        'sCepOrigem' => CEP_DE_ORIGEM,
        'sCepDestino' => '96083050',
        'nVlPeso' => "0.5",
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

// echo $parsed;
// print_r($parsed);
?>
