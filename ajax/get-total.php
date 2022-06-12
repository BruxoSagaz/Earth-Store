
<?php
session_start();

header('Content-Type: application/json');

$json = json_encode(['total' => $_SESSION['total']]);

exit($json);
?>