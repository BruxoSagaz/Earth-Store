<?php
session_start();
$data = array();
header('Access-Control-Allow-Origin: *');

if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

$id = $_POST['id'];

$nome = $_POST['nome'];

$quant = $_POST['quantidade'];

$precoOrig = $_POST['precoOrig'];
// echo $precoOrig;
$precoFormat = $_POST['precoFormat'];

$img = $_POST['img'];

$max = $_POST['max'];



$info = ["id"=>$id,
    "nome" => $nome,
    "quant" => $quant,
    "precoOrig"=>$precoOrig,
    "precoFormat"=>$precoFormat,
    "images"=>$img,
    "max"=>$max];

if(array_push($_SESSION['cart'],$info)){
    $data['sucesso']='true';
}else{
    $date['falha'] ='true';
};

die(json_encode($data));

?>