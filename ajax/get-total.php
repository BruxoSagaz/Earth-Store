
<?php
session_start();
header('Access-Control-Allow-Origin: *');

header('Content-Type: application/json');

$json = json_encode(['total' => $_SESSION['total']]);

exit($json);
?>