<?php

try{
    $pdo = new PDO('mysql:host=localhost;dbname=dblojinha','root','');
}catch(PDOException $e){
    echo "Error: ".$e->getMessage();
}
?>