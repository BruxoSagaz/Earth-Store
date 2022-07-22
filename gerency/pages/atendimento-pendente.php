<link rel="stylesheet" href="style/pedidos.css">
<link rel="stylesheet" href="style/cad_item.css">

<?php
include_once('../config.php');
include_once('../ajax/PDO.php');


$dadosAtendimento = normalDbQuery("SELECT * FROM `tickets_ajuda` WHERE `status`='Aberto' AND `responsavel` = ''",[]);


?>



<!-- MAIN -->

<div class="container">

    <div class="form-area">

    <div class="flex-center" style="height:32px"><h2>Atendimentos Lançados:</h2></div>

    <div class="container" >
    
    <div class="lista-pedido">

        <table class="pedidos">
            <thead>
                <tr class="index">
                    <th class="ind-th">Id</th>
                    <th class="ind-th">Assunto</th>
                    <th class="ind-th">Email</th>
                    <th class="ind-th">Status</th>
                    <th class="ind-th">Pegar</th>
                </tr>
            </thead>

            <tbody id="itens-banco">
                <?php foreach ($dadosAtendimento as $key => $value) {
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
            </tbody>




        </table>

    </div>
 


    </div>
    </div>
</div>


<script src="js/prototype.js"></script>
<script src="js/atendimento-pendente.js"></script>