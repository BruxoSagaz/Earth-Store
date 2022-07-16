<?php
include_once('../../config.php');
include_once('../../ajax/PDO.php');


$dadosCompras = normalDbQuery("SELECT * FROM `usuarios_pedidos` WHERE `status`='Paga' AND `responsavel` = ''");

foreach ($dadosCompras as $key => $value) {
    # code...
?>

<tr id= "<?php echo $key ?>">
    <td><?php echo $value['transaction-id']?></td>
    <td><?php echo $value['nome_comprador']?></td>
    <td><?php echo $value['status']?></td>
    <td><?php echo $value['data']?></td>
    <td><i class="fa-solid fa-dolly" id='<?php echo $value['transaction-id'] ?>'
    onclick="pegarPedido('<?php echo $value['transaction-id'] ?>', '<?php echo $key ?>')"
    ></i></td>
    
</tr>
<?php } ?>


