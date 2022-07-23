<?php
include_once('aux-func.php');

function getItemFromID($id){
    
    global $pdo;
    $query = "SELECT * FROM `produto` WHERE `id` = $id";

    try {

        $sql = $pdo->prepare($query);
        $sql->execute();
    
        if($sql->rowCount() > 0 ){
            $result = $sql->fetchAll();
            return $result[0];
        }else{
            return false;
        }

    } catch (Exception $e) {
        // echo 'Exceção capturada: ',  $e->getMessage(), "\n";
        return false;
    }

}

function pegarDivisoes($item){

    $parcelas = intval($item['parcelas']);
    
    if($item['promocao'] != 0){
        // echo '<div class="price-before">R$ '.$promFormatado.'</div>';
        // echo '<div class="price-off"> R$ '.$valFormatado.'</div>';
        // adicionando as divisoes
        $divisoes = floatval($item['valor_em_promocao']) / $parcelas;
        
    }else{
        // echo '<div class="price-off"> R$ '.$valFormatado.'</div>';
        $divisoes = floatval($item['preco']) / $parcelas;
           
    }

    $divisoes = strval($divisoes);
        
    // $divisoes = str_replace(".",",",$divisoes);

    $divisoes = number_format($divisoes,2,",",".");

    return $divisoes;
}



function selectCateg($categ){
    global $pdo;
    

    
    $query = "SELECT * FROM `produto` WHERE  `categoria` LIKE ? ORDER BY RAND() LIMIT 5";
    $valores = ["%".$categ."%"];

    $sql = $pdo->prepare($query);
    $sql->execute($valores);

    
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


    function getVariations($categoria){
        // PEGAR VARIACOES
        $query = "SELECT `variacoes` FROM  `variacoes` WHERE `categoria` = ?";
        $valores = [$categoria];
        $res = normalDbQuery($query,$valores);
        $res = $res[0];
        $res = $res['variacoes'];

        return $res;    
    }










?>