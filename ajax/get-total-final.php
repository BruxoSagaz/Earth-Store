<?php
session_start();
header('Access-Control-Allow-Origin: *');

header('Content-Type: application/json');

if(isset($_SESSION['totalFinal'])){
    $send = ['total' => $_SESSION['totalFinal']];
}else{
    $send = ['total' => '0'];
}

$json = json_encode($send);

exit($json);
?>