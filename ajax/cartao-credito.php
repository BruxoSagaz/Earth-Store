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

}else if(isset($_POST['fechar_pedido'])){

    $data = [
        'email' => $email,
        'token' => $token,
        'paymentMode' => 'defalt',
        'paymentMethod' => 'creditCard',
        'receiverEmail' => $email,
        'currency' => 'BRL',
        'extraAmount' => '0.00'
    ];

    


    //     'itenId1' => '1',
    //     'itemDescripion'=> 'Camiseta',
    //     'itemAmount1'=>number_format()
    // ];

    // die(json_encode(['status'=>'sucesso']));
}


?>