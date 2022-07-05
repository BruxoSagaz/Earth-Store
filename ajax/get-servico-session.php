<?php

session_start();

if(isset($_SESSION['servicoEntrega'])){
    $retorno = $_SESSION['servicoEntrega'];
}else{
    $retorno = 'SEDEX';
}


die(json_encode($retorno));

?>