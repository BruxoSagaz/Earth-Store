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

$preco = $_POST['preco'];

$img = $_POST['img'];

$max = $_POST['max'];


$info = [$id,$nome,$quant,$preco,$img,$max];

if(array_push($_SESSION['cart'],$info)){
    $data['sucesso']='true';
}else{
    $date['falha'] ='true';
};

die(json_encode($data));

?>