
<?php
session_start();
header('Access-Control-Allow-Origin: *');

header('Content-Type: application/json');

if(isset($_SESSION['total'])){
    $send = ['total' => $_SESSION['total']];
}else{
    $send = ['total' => '0'];
}

$json = json_encode($send);

exit($json);
?>