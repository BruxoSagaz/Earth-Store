<?php
include_once('PDO.php');


$dadosAtendimento = normalDbQuery("SELECT `transaction-id`,`nome_comprador`,`status`,`data`,`responsavel` FROM `usuarios_pedidos` WHERE 1",[]);

print_r($dadosAtendimento);
?>

<table class="buy">
    <thead>
        <tr class="index">
            <th class="ind-th">Id</th>
            <th class="ind-th">Comprador</th>
            <th class="ind-th">data</th>
            <th class="ind-th">status</th>
            <th class="ind-th">responsável</th>
        </tr>
    </thead>

    <tbody id="itens-banco">
        <?php foreach ($dadosAtendimento as $key => $value) { 
            $nome = $value['responsavel'];
            $nome = normalDbQuery("SELECT `nome_admin` FROM `admin` WHERE `admin_id` = '".$value['responsavel']."'",[]);
            if(count($nome) == 0){
                $nome = "*livre*";
            }else{
                $nome = $nome[0]['nome_admin'];
            }
            
        ?>
        <tr id= "<?php echo $key ?>">
            <td><?php echo $value['transaction-id']?></td>
            <td><?php echo $value['nome_comprador']?></td>
            <td><?php echo $value['status']?></td>
            <td><?php echo $value['data']?></td>
            <td><?php 
            // print_r($nome);
            echo $nome;     

            ?></td>
            
        </tr>
        <?php } ?>
    </tbody>
</table>