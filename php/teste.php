<?php

require_once('../vendor/autoload.php');

// echo uniqid(rand(), true);

use Carbon\Carbon;

Carbon::setLocale('pt_BR');


printf("Now: %s", Carbon::now(new DateTimeZone('America/Recife')));

$agora = Carbon::now();
echo \Carbon\Carbon::parse($agora)->format('d/m/Y');

echo "<br>";
echo "<br>";
echo "<br>";


// echo strtolower(str_replace('/', ' de ', $date->format('d/F, l')));


echo "<br>";
echo "<br>";
echo "<br>";
echo "<br>";

?>