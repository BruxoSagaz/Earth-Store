<?php
session_start();


$data = array();

unset($_SESSION['cart']);


$data['sucesso'] = "true";
die(json_encode($data));
?>