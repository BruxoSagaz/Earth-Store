<?php
include("PDO.php");

$select = $_POST['select'];
$final = array();

if($select == "all"){
    $query = "SELECT * FROM `variacoes` LIMIT 0,25";
    $sql = $pdo->prepare($query);
    $sql->execute();

    if($sql->rowCount() > 0 ){
        foreach($sql->fetchAll() as $value){
            construir($value);
        }
    }
}else{
    $query = "SELECT * FROM `variacoes` WHERE `categoria` LIKE ? LIMIT 0,25";
    $valores = ["%".$select."%"];
    $sql = $pdo->prepare($query);
    $sql->execute($valores);

    if($sql->rowCount() > 0 ){
        foreach($sql->fetchAll() as $value){
            construir($value);
        }
    }
}




function construir($value){

    echo "<tr>";
    echo "<td class='categoria'>".$value['categoria']."</td>";
    echo "<td>".$value['variacoes']."</td>";
    echo "<th><i class='fa-solid fa-pen'></i></th>";
    echo "</tr>";
}

?>