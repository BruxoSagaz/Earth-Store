<?php 
include("PDO.php");

$sql = $pdo->query("SELECT * FROM `produto` LIMIT 0,25");
if($sql->rowCount() > 0 ){
    foreach($sql->fetchAll() as $value){
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
}

?>