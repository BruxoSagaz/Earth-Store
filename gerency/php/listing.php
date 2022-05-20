<?php 
include("PDO.php");

$select = $_POST['select'];
$promCheck = $_POST['check'];
$string = "SELECT * FROM `produto`";
$promCheckString = "";

if(isset($_POST['where']) == False || isset($_POST['equals']) == False){
    $_POST['where'] = "";
    $_POST['equals'] = "";
}

if($_POST['where'] != "" && $_POST['equals'] != ""){

    $baseWhere1 = $_POST['where'];
    $baseWhere2 =  $_POST['equals'];
    $where = " WHERE $baseWhere1 LIKE '%$baseWhere2%'";
}else{
    $where = "";
}




switch ($select){
    case 'all':
        $queryOrdem = " LIMIT 0,25";        
        break;
    case 'dec':
        $queryOrdem = "ORDER BY `id` DESC LIMIT 0,25 ";
        break;
    case 'alfa':
        $queryOrdem = "ORDER BY `nome` ASC LIMIT 0,25";
        break;
    case 'maiorpreco':
        $queryOrdem = "ORDER BY `preco` DESC LIMIT 0,25";
        break;
    case 'menorpreco':
        $queryOrdem = "ORDER BY `preco` ASC LIMIT 0,25";
        break;
    case 'maisvendidos':
        $queryOrdem = "ORDER BY `vendas` DESC LIMIT 0,25";
        break;
    case "menosvendidos":
        $queryOrdem = "ORDER BY `vendas` ASC LIMIT 0,25";
        break;
    default:
    $queryOrdem = " LIMIT 0,25";
        break;
}



if($where == '' && $promCheck == "true"){
    $where = " WHERE `promocao` = 1 ";
    $promCheckString = "";
}else if ($promCheck== "true"){
    $promCheckString = $promCheckString." AND `promocao` = 1 ";
}else{
    $promCheckString = "";
}


$query = "{$string}{$where}{$promCheckString}{$queryOrdem}";
// echo $query;
// echo "<br>";
// echo "<br>";
// echo "<br>";
gerarItemDefault($query);

function gerarItemDefault($query){
    global $sql;
    global $pdo;

    $sql = $pdo->prepare($query);
    $sql->execute();
    if($sql->rowCount() > 0 ){
        foreach($sql->fetchAll() as $value){
            construir($value);
        }
    }
}




function insertInPosition($str, $pos, $c){
    return substr($str, 0, $pos) . $c . substr($str, $pos);
}




function addZero($item){
    
    if(mb_strpos($item,",") !== false){
        $teste = explode(",",$item);

        $for = 2 - strlen($teste[1]);


        if(strlen($teste[1]) <= 2 ){
            for($i=0;$i < $for;$i++){
                $teste[1] = $teste[1]."0";
    
            }
        }
    
    
        $item = implode("",$teste);
        $tam = strlen($item);
        $tam = $tam - 2;
        $item = insertInPosition($item,$tam,',');
    
        return $item;
    }else{
        $final = $item.",00";
        return $final;
    }


}






function construir($value){
    echo "OISS".$value['preco'];

    $value['preco'] = str_replace(".",",",$value['preco']);


    echo "OI".$value['preco'];

    
    $value['valor_em_promocao'] = str_replace(".",",",$value['valor_em_promocao']);



    echo "HAI".$value['preco'];
    $value['preco'] = addZero($value['preco']);
   // $value['valor_em_promocao'] = addZero($value['valor_em_promocao']);


    echo "<tr>";
    echo "<td>".$value['nome']."</td>";
    echo "<td class='categoria'>".$value['categoria']."</td>";
    echo "<td>".$value['preco']."</td>";
    if($value['valor_em_promocao'] == 0){
        echo "<td> - </td>";
    }else{
        echo "<td>".$value['valor_em_promocao']."</td>";
    }
    echo "<td>".$value['estoque']."</td>";
    echo "<td>".$value['vendas']."</td>";
    echo "<td class='id'>".$value['id']."</td>";
    echo "<th><i class='fa-solid fa-pen'></i><i class='fa-solid fa-trash-can'></i></th>";
    echo "</tr>";
}


?>