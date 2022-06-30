<?php

include("../config.php");


// CORRETO
//https://ws.sandbox.pagseguro.uol.com.br/v2/sessions?

$email = PAGEMAIL;
$token = PAGTOKEN; 

ini_set('max_execution_time','0');

if(isset($_POST['gerar_sessao'])){
    $url = "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions?email=$email&token=$token";

    //echo $url;

    $curl = curl_init($url);
    curl_setopt($curl,CURLOPT_POST,1);
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
    
    $retorno = curl_exec($curl);
    curl_close($curl);

    $session = simplexml_load_string($retorno);

    die(json_encode($session));

}


?>