<!-- css -->   
<link rel="stylesheet" href="style/pedidos.css">
<link rel="stylesheet" href="style/cad_item.css">
<link rel="stylesheet" href="style/meus_atendimentos.css">

<?php
include_once('../config.php');
include_once('../ajax/PDO.php');


$dadosAtendimento = normalDbQuery("SELECT * FROM `tickets_ajuda` WHERE `status`='Aberto' AND `responsavel` = '".$_SESSION['id_admin']."'");
?>


<div class="modal-bg" >

    <div class="form-modal" id="form-modal-pedido" style="display:block">
        <!-- <div class="modal-shadow"></div> -->
        <!-- close Button -->
        <div style="display: flex;justify-content: center;">
        <h2 style="margin-right: 10px;">ID do Atendimento: </h2>
        <h2 style="text-align: center;" id="id-do-atendimento"></h2>
        </div>
        
        <div class="close-btn">x</div>

        <!-- FORM   -->
        <form action="" class="atend-form">
            <!-- info-produto -->
            <div class='info-produto'>
                <div style="display: flex;justify-content: center;">
                <h2>Assunto:</h2>
                <h2 id="assunto"></h2>
                </div>

                <div class="relato">
                <h3>Relato:</h3>
                <div class="relato-case">
                <p id="relato"></p>
                </div>
                </div>

                <div class='info-ticket'>
                    <h3 id="info-nome">Nome:</h3>
                    <h3 id="info-email">Email:</h3>
                    <h3 id="info-celular">Celular:</h3>
                </div>



            </div><!-- info-produto -->
        </form>
    </div> 
</div><!-- MODAL BG -->




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
                    <th class="ind-th">Atender</th>
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
                    <td><i class="fa-solid fa-comment" id='<?php echo $value['id'] ?>'></i></td>
                    
                </tr>
                <?php } ?>
            </tbody>




        </table>

    </div>
 


    </div>
    </div>
</div>


<script src="../js/jquery-3.6.0.js"></script>
<script src="js/meus-atendimentos.js"></script>