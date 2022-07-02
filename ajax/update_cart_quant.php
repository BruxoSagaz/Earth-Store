<?php
session_start();
header('Access-Control-Allow-Origin: *');
$id = $_POST['id'];
$quant = $_POST['quant'];
$data = array();

if(isset($_SESSION['cart'])){

    foreach ($_SESSION['cart'] as $key => $value) {
        if($value['id']==$id){

            $_SESSION['cart'][$key]['quant'] = $quant;
        }
    }
}

$data['sucesso'] = "true";
die(json_encode($data));
?>