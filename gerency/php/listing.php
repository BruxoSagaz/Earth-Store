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















function construir($value){
    echo "<tr>";
    echo "<td>".$value['nome']."</td>";
    echo "<td>".$value['categoria']."</td>";
    echo "<td>".$value['preco'].",00</td>";
    if($value['valor_em_promocao'] == 0){
        echo "<td> - </td>";
    }else{
        echo "<td>".$value['valor_em_promocao'].",00</td>";
    }
    echo "<td>".$value['estoque']."</td>";
    echo "<td>".$value['vendas']."</td>";
    echo "<td class='id'>".$value['id']."</td>";
    echo "<th><i class='fa-solid fa-pen'></i><i class='fa-solid fa-trash-can'></i></th>";
    echo "</tr>";
}


?>