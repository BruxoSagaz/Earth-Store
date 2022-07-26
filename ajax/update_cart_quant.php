<?php
session_start();

$id = $_POST['id'];
$quant = $_POST['quant'];
$nome = $_POST['nome'];
$data = array();

if(isset($_SESSION['cart'])){

    foreach ($_SESSION['cart'] as $key => $value) {
        if($value['id']==$id && $value['nome']==$nome){
            $_SESSION['cart'][$key]['quant'] = $quant;
        }
    }
}

$data['sucesso'] = "true";
die(json_encode($data));
?>