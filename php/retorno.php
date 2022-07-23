
<?php
header("access-control-allow-origin: https://sandbox.pagseguro.uol.com.br");

include('../config.php');
include('../ajax/PDO.php');


if(isset($_POST['notificationType']) && $_POST['notificationType'] == 'transaction'){
    //Todo resto do código iremos inserir aqui.
    // echo 'enviando';
    $email = PAGEMAIL;
    $token = PAGTOKEN;

    $url = 'https://ws.sandbox.pagseguro.uol.com.br/v2/transactions/notifications/' . $_POST['notificationCode'] . '?email=' . $email . '&token=' . $token;

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $transaction= curl_exec($curl);
    curl_close($curl);

    if($transaction == 'Unauthorized'){
       die('Um erro ocorreu!');
    }
    $transaction = simplexml_load_string($transaction);


    $transactionStatus = $transaction->status;
    $reference = (string)$transaction->reference;


    if($transactionStatus == '1'){
        $transactionStatus = 'Aguardando pagamento';
    } elseif($transactionStatus == 2){
        $transactionStatus = 'Em análise';
    } elseif($transactionStatus == 3){ // :)
        $transactionStatus = 'Paga';
    } elseif($transactionStatus == 4){ // :D
        $transactionStatus = 'Disponível';
    } elseif($transactionStatus == 5){
        $transactionStatus = 'Em disputa';
    } elseif($transactionStatus == 6){
        $transactionStatus = 'Devolvida';
    } elseif($transactionStatus == 7){
        $transactionStatus = 'Cancelada';
    }

    // $pedido = array(
    //     'code' => $adapt['code']['value'],
    //     'referencia' => $adapt['reference']['value'],
    //     'status' => $transactionStatus,
    //     'valor' => $adapt['grossAmount']['value'],
    //     'itens' => $adapt['itens'],
    //     'comprador' => $adapt['sender'],
    //     'entrega' => $adapt['shipping']['address'],
    //     'frete' => $adapt['shipping']['cost'],

    // );

    // print_r($pedido);


    $references = dbQuery("SELECT * FROM  `usuarios_compras` WHERE `transaction-id` LIKE ?",["%".$reference."%"]);

    $references = $references[0];
    

    $transactionIdBank = deCompress($references['transaction-id']);

    $casa = array_search($reference, $transactionIdBank);

   
    // print_r($casa);


    $notificationCodeBank = deCompress($references['notification-code']);

    $notificationCodeBank[$casa] = $_POST['notificationCode'];

    $notificationCodeBank = compress($notificationCodeBank);



    $transactionStatusBank = deCompress($references['transaction-status']);

    $transactionStatusBank[$casa] = $transactionStatus;
    
    $transactionStatusBank = compress($transactionStatusBank);



    $queryy = "UPDATE `usuarios_compras` SET `notification-code`= ?, `transaction-status`= ? WHERE `transaction-id` LIKE ?";
    $valores = [$notificationCodeBank,$transactionStatus,"%".$reference."%"];

    dbQuery($queryy,$valores);
  

    $queryy = "UPDATE `usuarios_pedidos` SET `status`= ? WHERE `transaction-id` = ?";
    $valores = [$transactionStatus,$reference];

    dbQuery($queryy,$valores);



}

function deCompress($item){
    if($item != '0'){
        // echo $item;
        $item = explode(",",$item);
        return $item;
    }
}

function compress($item){
    if($item != '0'){
        $item = implode(",",$item);
        return $item;
    }
}

function dbQuery($query,$valores){
    global $pdo;
    $sql = $pdo->prepare($query);
    ;
    if($sql->execute($valores)){
        $result = $sql->fetchAll();
        return $result;
    }else{
        return false;
    };
}






// function xmlToArray(SimpleXMLElement $xml): array
// {
//     $parser = function (SimpleXMLElement $xml, array $collection = []) use (&$parser) {
//         $nodes = $xml->children();
//         $attributes = $xml->attributes();

//         if (0 !== count($attributes)) {
//             foreach ($attributes as $attrName => $attrValue) {
//                 $collection['attributes'][$attrName] = strval($attrValue);
//             }
//         }

//         if (0 === $nodes->count()) {
//             $collection['value'] = strval($xml);
//             return $collection;
//         }

//         foreach ($nodes as $nodeName => $nodeValue) {
//             if (count($nodeValue->xpath('../' . $nodeName)) < 2) {
//                 $collection[$nodeName] = $parser($nodeValue);
//                 continue;
//             }

//             $collection[$nodeName][] = $parser($nodeValue);
//         }

//         return $collection;
//     };

//     return [
//         $xml->getName() => $parser($xml)
//     ];
// }
?>