<?php

use FlyingLuscas\Correios\Client;

require '../vendor/autoload.php';

$cep = $_POST['cep'];

$correios = new Client;

$result = $correios->zipcode()->find($cep);



die(json_encode($result));


?>