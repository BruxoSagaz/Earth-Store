<?php
session_start();

$total = 0;

if(isset($_SESSION['cart'])){
    foreach ($_SESSION['cart'] as $key => $value) {
        $total += $value['precoOrig'] * $value['quant'];
    }
};

$_SESSION['total'] = $total;

$data['sucesso'] = "true";

die(json_encode($data));
?>