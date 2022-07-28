<?php
include_once('aux-func.php');

function gerarAleatorio(){
    global $pdo;
    $query = "SELECT * FROM `produto` ORDER BY RAND() LIMIT 10";


    $sql = $pdo->prepare($query);
    $sql->execute();

    if($sql->rowCount() > 0 ){
        foreach($sql->fetchAll() as $value){
            // PEGAR VARIACOES
            $query = "SELECT `variacoes` FROM  `variacoes` WHERE `categoria` = ?";
            $valores = [$value['categoria']];
            $res = normalDbQuery($query,$valores);
            $res = $res[0];
            $res = $res['variacoes'];

            construirItem($value,$res);
        }
    }
}

function gerarMaisVendidos(){
    global $pdo;
    $query = "SELECT * FROM `produto` ORDER BY `vendas` DESC LIMIT 10";


    $sql = $pdo->prepare($query);
    $sql->execute();

    if($sql->rowCount() > 0 ){
        foreach($sql->fetchAll() as $value){

            // PEGAR VARIACOES
            $query = "SELECT `variacoes` FROM  `variacoes` WHERE `categoria` = ?";
            $valores = [$value['categoria']];
            $res = normalDbQuery($query,$valores);
            $res = $res[0];
            $res = $res['variacoes'];

            construirItem($value,$res);
        }
    }
}

 



?>