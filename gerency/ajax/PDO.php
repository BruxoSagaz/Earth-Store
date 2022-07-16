<?php
include_once('../../config.php');

try{
    $pdo = new PDO("mysql:host=".HOST.";dbname=".DATABASE."",USER,PASSWORD);
}catch(PDOException $e){
    echo "Error: ".$e->getMessage();
}





function unpackDb($item){
    $arr = array('0');
    if($item != '0'){
        // echo $item;
        $item = explode(",",$item);
        return $item;
    }else{
        return $arr;
    }
}

function packDb($item){
    $arr = array('0');
    if($item != '0'){
        $item = implode(",",$item);
        return $item;
    }else{
        return $arr;
    }
}

function normalDbQuery($query){
    global $pdo;
    $sql = $pdo->prepare($query);

    if($sql->execute()){
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }else{
        return false;
    };
}
?>