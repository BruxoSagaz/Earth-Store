<?php


include_once('PDO.php');


$dadosAtendimento = normalDbQuery("SELECT * FROM `admin` WHERE 1",[]);
?>

<table class="adm">
    <thead>
        <tr class="index">
            <th class="ind-th">Id</th>
            <th class="ind-th">Login</th>
            <th class="ind-th">Nivel</th>
            <th class="ind-th">celular</th>
            <th class="ind-th">detalhes</th>
        </tr>
    </thead>

    <tbody id="itens-banco">
        <?php foreach ($dadosAtendimento as $key => $value) {
            # code...
        ?>
        <tr id= "<?php echo $key ?>">
            <td><?php echo $value['admin_id']?></td>
            <td><?php echo $value['nome_admin']?></td>
            <td><?php echo $value['nivel']?></td>
            <td><?php echo $value['celular']?></td>
            <td><i class="fa-solid fa-info" id='<?php echo $value['admin_id'] ?>'></i></td>
            
        </tr>
        <?php } ?>
    </tbody>
</table>