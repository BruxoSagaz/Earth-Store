<?php
session_start();
header('Access-Control-Allow-Origin: *');
$data = array();

$id = $_POST['id'];

if(isset($_SESSION['cart'])){

    foreach ($_SESSION['cart'] as $key => $value) {
        if($value[0]==$id){
            unset($_SESSION['cart'][$key]);
        }
    }
}
$data['sucesso'] = "true";

die(json_encode($data));
?>