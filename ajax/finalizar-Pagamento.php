<?php
    session_start();
    header('Access-Control-Allow-Origin: *');
    $data['token'] =  '0DFF9092B2FA4B4F9557C353EB3A0E2B';
    $data['email'] = 'umpoucodetudogr@gmail.com';
    $data['currency'] = 'BRL';
    $data['reference'] = uniqid();
    $data['shippingAddressRequired'] = "true";
    $index = 1;

    //[$id,$nome,$quant,$preco,$img,$max];
    foreach ($_SESSION['cart'] as $key => $value) {
        $data["itemId$index"] = (string)$value[0];
        $data["itemQuantity$index"] = (string)$value[2];
        $data["itemWeight$index"] = "1000";
       

        $data["itemDescription$index"] = trim((string)$value[1]);
        
        $preco = explode(" ",$value[3]);
        $preco[2] = str_replace(",",".",$preco[2]);

       
        $preco = number_format($preco[2],2,'.','');


        $data["itemAmount$index"] = (string)$preco;
        $index++;
    }


    // print_r($data);
    // https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/
    // https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/
    // https://ws.sandbox.pagseguro.uol.com.br/v2/checkout/?email=umpoucodetudogr%40gmail.com&token-sandbox=0DFF9092B2FA4B4F9557C353EB3A0E2


    $url = "https://ws.sandbox.pagseguro.uol.com.br/v2/checkout/?";
    $data = http_build_query($data);

    $curl = curl_init($url);
    curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,false);
    curl_setopt($curl,CURLOPT_POST,true);
    curl_setopt($curl,CURLOPT_POSTFIELDS,$data);
    curl_setopt($curl,CURLOPT_HTTP_VERSION,CURL_HTTP_VERSION_1_1);

    $xml = curl_exec($curl);

    curl_close($curl);

    
    $xml = simplexml_load_string($xml);

    echo $xml->code


      
?>