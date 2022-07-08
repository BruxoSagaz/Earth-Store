<?php

require_once('../vendor/autoload.php');

// echo uniqid(rand(), true);

$client = new \GuzzleHttp\Client();

$response = $client->request('PUT', 'https://secure.sandbox.api.pagseguro.com/instant-payments/cob/139215948762c82505157e0668846565', [
    'body' => '{"calendario":{"expiracao":"14/07/2022"},"devedor":{"cpf":"14176547405","nome":"Gabriel Pereira Bezerra"},"valor":{"original":"50"},"chave":"21227123094","solicitacaopagador":"Chuchu Beleza!"}',
    'headers' => [
      'Accept' => 'application/json',
      'Content-Type' => 'application/json',
      'Password' => '<password>',
      'Username' => '<username>',
    ],
]);

echo $response->getBody();

?>