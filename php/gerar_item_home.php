<?php
include_once('aux-func.php');

function gerarAleatorio(){
    global $pdo;
    $query = "SELECT * FROM `produto` ORDER BY RAND() LIMIT 10";


    $sql = $pdo->prepare($query);
    $sql->execute();

    if($sql->rowCount() > 0 ){
        foreach($sql->fetchAll() as $value){
            construirItem($value);
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
            construirItem($value);
        }
    }
}






?>