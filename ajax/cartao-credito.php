<?php

include("../config.php");
include('../ajax/PDO.php');



// CORRETO
//https://ws.sandbox.pagseguro.uol.com.br/v2/sessions?


$idComprador = $_SESSION['dados']['id'];

$email = PAGEMAIL;
$token = PAGTOKEN;
$reference = uniqid();

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


    // //Pegar dados cadastrais
    // $query = "SELECT * FROM `dblojinha` WHERE `id` = '$idComprador'";


    // function pegarDados($query){
    //     global $pdo;


    //     $sql = $pdo->prepare($query);
    //     $sql->execute();

    //     if($sql->rowCount() > 0 ){
    //         return $sql->fetchAll();
    //     }
    // }

    // $dadosUser = pegarDados($query);


    // print_r($_POST['User']);


    
    if($_POST['metodo'] == 'CreditCard'){

        $areaCode = substr($_POST['User']['celular'],0,2);
        $phone = substr($_POST['User']['celular'],2);

        $data = [
            'email' => $email,
            'token' => $token,
            'paymentMode' => 'default',
            'paymentMethod' => $_POST['metodo'],
            'receiverEmail' => $email,
            'currency' => 'BRL',
            'extraAmount' => '0.00',
            'notificationURL' => PATH.'/php/receberDadosRetornoPagamento.php',
            'reference' => $reference,
            // COMPRADOR
            'senderName' => $_POST['User']['nome'],
            'senderCPF' => $_POST['User']['cpf'],
            'senderAreaCode' => $areaCode,
            'senderPhone' => $phone,
            'senderEmail'=> SENDER_EMAIL,
            'senderHash'=> $_POST['hash'],
            'shippingAddressStreet' => $_POST['local']['rua'],
            'shippingAddressNumber' => $_POST['local']['numero'],
            'shippingAddressComplement' => $_POST['local']['complemento'],
            'shippingAddressDistrict' => $_POST['local']['bairro'],
            'shippingAddressPostalCode' => $_POST['local']['cep'],
            'shippingAddressCity' => $_POST['local']['cidade'],
            'shippingAddressState' => $_POST['local']['estado'],
            'shippingAddressCountry' => 'BRA',
            'shippingType' => '3',
            'shippingCost'=> number_format($_SESSION['frete'],2,'.',''),
            'creditCardToken' => $_POST['token'],
            'installmentQuantity' => $_POST['parcelas'],
            'installmentValue' => number_format($_POST['valorParcela'],2,'.',''),
            'noInterestInstallmentQuantity' => 4,
            'creditCardHolderName' => strtoupper($_POST['User']['nome']) ,
            'creditCardHolderCPF' => $_POST['User']['cpf'],
            'creditCardHolderBirthDate' => '25/05/1993',
            'creditCardHolderAreaCode' => $areaCode,
            'creditCardHolderPhone'=>$phone,
            'billingAddressStreet' => $_POST['local']['rua'],
            'billingAddressNumber' => $_POST['local']['numero'],
            'billingAddressComplement' => $_POST['local']['complemento'],
            'billingAddressDistrict' => $_POST['local']['bairro'],
            'billingAddressPostalCode' => $_POST['local']['cep'],
            'billingAddressCity' => $_POST['local']['cidade'],
            'billingAddressState' => $_POST['local']['estado'],
            'billingAddressCountry' => 'BRA',
        ];
    }else if($_POST['metodo'] == 'BOLETO'){

        $areaCode = substr($_POST['celular'],0,2);
        $phone = substr($_POST['celular'],2);

        $data = [
            'email' => $email,
            'token' => $token,
            'paymentMode' => 'default',
            'paymentMethod' => $_POST['metodo'],
            'receiverEmail' => $email,
            'currency' => 'BRL',
            'extraAmount' => '0.00',
            'notificationURL' => PATH.'/php/receberDadosRetornoPagamento.php',
            'reference' => $reference,
            // COMPRADOR
            'senderName' => $_POST['nome'],
            'senderCPF' => $_POST['cpf'],
            'senderAreaCode' => $areaCode,
            'senderPhone' => $phone,
            'senderEmail'=> SENDER_EMAIL,
            'senderHash'=> $_POST['hash'],
            'shippingAddressStreet' => $_POST['local']['rua'],
            'shippingAddressNumber' => $_POST['local']['numero'],
            'shippingAddressComplement' => $_POST['local']['complemento'],
            'shippingAddressDistrict' => $_POST['local']['bairro'],
            'shippingAddressPostalCode' => $_POST['local']['cep'],
            'shippingAddressCity' => $_POST['local']['cidade'],
            'shippingAddressState' => $_POST['local']['estado'],
            'shippingAddressCountry' => 'BRA',
            'shippingType' => '3',
            'shippingCost'=> number_format($_SESSION['frete'],2,'.',''),
            'installmentQuantity' => '1',
            'installmentValue' => number_format($_POST['amount'],2,'.',''),
            'noInterestInstallmentQuantity' => 4,
            'billingAddressStreet' => $_POST['local']['rua'],
            'billingAddressNumber' => $_POST['local']['numero'],
            'billingAddressComplement' => $_POST['local']['complemento'],
            'billingAddressDistrict' => $_POST['local']['bairro'],
            'billingAddressPostalCode' => $_POST['local']['cep'],
            'billingAddressCity' => $_POST['local']['cidade'],
            'billingAddressState' => $_POST['local']['estado'],
            'billingAddressCountry' => 'BRA',
        ];
    }


    $itens = [];
    foreach ($_POST['itens'] as $key => &$value) {
        // entrou no primeiro arr
        $point = $key + 1;
        $construct = [
            'itemId'.$point => $value['id'],
            'itemDescription'.$point => $value['nome'],
            'itemAmount'.$point => number_format($value['preco'],2,'.',''),
            'itemQuantity'.$point => $value['quant']
        ];
        $itens = array_merge($itens,$construct);
    }
    
    $data = array_merge($data,$itens);

    //print_r($data);
    $query = http_build_query($data);
    // print_r($data);
    $url = "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions";

    //echo $url;

    $curl = curl_init($url);

    curl_setopt($curl,CURLOPT_HTTPHEADER,array('Content-Type : application/x-www-form-urlencoded;charset=UTF-8'));
    curl_setopt($curl,CURLOPT_POST,1);
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($curl,CURLOPT_POSTFIELDS,$query);
    
    $retorno = curl_exec($curl);
    curl_close($curl);

    $xml = json_encode(simplexml_load_string($retorno));

    function dbQuery($query){
        global $pdo;
        $sql = $pdo->prepare($query);
        ;
        if($sql->execute()){
            $result = $sql->fetchAll();
            return $result;
        }else{
            return false;
        };
    }

    $queryy = "SELECT `transaction-id` FROM `usuarios-compras` WHERE `id` = '".$_SESSION['dados']['id']."'";
    // echo $queryy;
    $dbRef = dbQuery($queryy);
    $dbRef = $dbRef[0][0];


    if($dbRef != '0'){


        if(strpos($dbRef, ',') == true){
            $dbRef = explode($dbRef,",");

            $dbRef = array_push($dbRef, $reference);
            
            $dbRef = implode($dbRef,",");
        }else{
            $dbRef = $dbRef.','.$reference;
        }

        $reference = $dbRef;  
    }


    $queryy = "UPDATE `usuarios-compras` SET `transaction-id` = '$reference' WHERE `id` = '".$_SESSION['dados']['id']."'";
    dbQuery($queryy);
    // echo $queryy;

    die($xml);


}


?>