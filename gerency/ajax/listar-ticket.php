<?php
include_once('PDO.php');


$dadosCompras = normalDbQuery("SELECT * FROM `tickets_ajuda` WHERE `status`='Aberto' AND `responsavel` = ''",[]);

foreach ($dadosCompras as $key => $value) {
    # code...
?>

<tr id= "<?php echo $key ?>">
    <td><?php echo $value['id']?></td>
    <td><?php echo $value['assunto']?></td>
    <td><?php echo $value['email']?></td>
    <td><?php echo $value['status']?></td>
    <td><i class="fa-solid fa-note-sticky" id='<?php echo $value['id'] ?>' onclick="pegarTicket('<?php echo $value['id'] ?>', '<?php echo $key ?>')"></i></td>
</tr>
<?php } ?>
