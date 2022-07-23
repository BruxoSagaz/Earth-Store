<?php

include_once('aux-func.php');

function selectCateg(){
    global $pdo;
    

    $categ = @$_GET['filter'];
    $query = "SELECT * FROM `produto` WHERE  `categoria` LIKE ? ORDER BY RAND() LIMIT 30";
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

function selectNome(){
    global $pdo;
    

    $nome = @$_GET['nome'];
    $query = "SELECT * FROM `produto` WHERE  `nome` LIKE ? ORDER BY RAND() LIMIT 30";
    $valores = ["%".$nome."%"];

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


function gerarFiltros($metodo,$fonte){

    global $pdo;

    $list = [];
   
    $query = "SELECT `tags` FROM `produto` WHERE  `nome` LIKE ? OR `categoria` LIKE ? ORDER BY RAND() LIMIT 30";
    $valores = ["%".$metodo."%","%".$metodo."%"];

    $sql = $pdo->prepare($query);
    $sql->execute($valores);
   
    
    if($sql->rowCount() > 0 ){
        
        foreach($sql->fetchAll() as $value){
            array_push($list,ripTags($value[0],$fonte));
        }
        // echo count($list);
        // print_r($list);
        if($list[0] != ''){
            
            foreach ($list as $key => $value) {
                echo "
                <div class='block'>
                    <input type='radio' name='".$fonte."' value='".$value."'><span> ".ucfirst($value)."</span>
                </div>";
            }
        }else{
            echo "<span>sem filtros para ".$metodo." </span>";
        }

    }else{
        echo "<span>sem filtros para ".$metodo." </span>";
    }


}

function pegarSubfiltros($array){
    
    global $pdo;
    $str = "";
    $tam = count($array);
    $options = ['cor','material','tema'];

    
    if($tam == 1){
        foreach ($array as $key => $value) {
        
            if($key == 'preco'){
                $str .= " `$key` $value "; 
                // verifca se o valor é uma tag
            }else if (in_array($key,$options)){
                $str .= " `tags` LIKE '%$key:$value%'";
            }else{
                $str .= " `$key` LIKE '%$value%'";
            }

        }
    }else{
        $i = 0;
        foreach ($array as $key => $value) {
            if($i == 0){

                if($key == 'preco'){
                    $str .= "`$key` $value "; 
                }else if (in_array($key,$options)){
                    $str .= " `tags` LIKE '%$key:$value%'";
                }else{
                    $str .= " `$key` LIKE '%$value%'";
                }

            }else{

                if($key == 'preco'){
                    $str .= " AND `$key` $value "; 
                }else if (in_array($key,$options)){
                $str .= " AND `tags` LIKE '%$key:$value%'";
                }else{
                    $str .= "AND `$key` LIKE '%$value%'";
                }
            }
            $i++;
        }
        
    }

   
   
    $query = "SELECT * FROM `produto` WHERE $str ORDER BY RAND() LIMIT 30";
 
    // echo $query;

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
    }else{
        echo "<h1 class='alert-filter' style='margin: 0 auto;'>Não foram encontrados produtos com essas características</h1> ";
    }
   
}

function ripTags($tags,$fonte){
    if(strpos($tags,' ')){
        $tags = explode(" ",$tags);
        
        foreach($tags as $key => $value){
            
            $value =  explode(":",$value);
            // print_r($value);
            
           
            if($value[0] == $fonte){
                return trim($value[1]);
            }
            
        }
        return false;
    }

    
    $tags =  explode(":",$tags);
    if($tags[0] == $fonte){
        return trim($tags[1]);
    }

    return false;
}


function gerarAleatorio(){
    global $pdo;
    $query = "SELECT * FROM `produto` ORDER BY RAND() LIMIT 30";


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