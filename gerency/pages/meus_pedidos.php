<!-- css -->   
<link rel="stylesheet" href="style/pedidos.css">
<link rel="stylesheet" href="style/cad_item.css">
<?php
include_once('../config.php');
include_once('../ajax/PDO.php');


$dadosCompras = normalDbQuery("SELECT * FROM `usuarios_pedidos` WHERE `status`='Paga' AND `responsavel` = '".$_SESSION['id_admin']."'",[]);
?>


<!-- MAIN -->
<div class="modal-bg" >

    <div class="form-modal" id="form-modal-pedido" style="display:block">
        <!-- <div class="modal-shadow"></div> -->
        <!-- close Button -->
        <div style="display: flex;justify-content: center;">
        <h2 style="margin-right: 10px;">ID do pedido: </h2>
        <h2 style="text-align: center;" id="id-do-pedido"></h2>
        </div>
        
        <div class="close-btn">x</div>

        <!-- FORM   -->
        <form action="" id="form_edit_item">
            <!-- info-produto -->
            <div class='info-produto'>
            <!-- itens -->
                <table class="display-ind-pedido">
                    <thead>
                    <tr class="letter">
                        <th>Nome</th>
                        <th>Preço</th>
                    </tr>
                    </thead>

                    <tbody class='information-area'>


                    </tbody>


                </table>
                <!-- itens -->
                <!-- Endereço de entrega -->
                <div class="place-entrega">
                    <p id="nome-comprador"></p>
                    <p id="endereco-entrega"></p>
                    <div style="display: flex;justify-content: center;">
                    <p>Serviço de Entrega:</p>
                    <span  id="servico-entrega" style="color: red;margin-left: 10px;"></span>
                    </div>
                    <p id="data-pedido"></p>


                </div>
                <!-- Endereço de entrega -->


                <div class="rastreio">
                    <div>
                    <label for="cod-rastreio">Insira o Código de Rastreio para despachar o Pacote: </label>
                    <input type="text" name="cod-rastreio" id="cod-rastreio" required>
                    </div>

                    <button style="margin-top: 15px;">DESPACHAR!</button>

                </div>

       



            </div><!-- info-produto -->
        </form>
    </div> 
</div><!-- MODAL BG -->


<div class="container">

    <div class="form-area">

    <div class="flex-center" style="height:32px"><h2>Meus Pedidos</h2></div>

    <div class="container" >
    
        <div class="lista-pedido">

            <table class="pedidos">
                <thead>
                    <tr class="index">
                        <th class="ind-th">Id-transação</th>
                        <th class="ind-th">Comprador</th>
                        <th class="ind-th">Status</th>
                        <th class="ind-th">Data</th>
                        <th class="ind-th">Alterar</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($dadosCompras as $key => $value) {
                        # code...
                    ?>
                    <tr>
                        <td><?php echo $value['transaction-id']?></td>
                        <td><?php echo $value['nome_comprador']?></td>
                        <td><?php echo $value['status']?></td>
                        <td><?php echo $value['data']?></td>
                        <td><i class="fa-solid fa-pen-to-square" id='<?php echo $value['transaction-id'] ?>'></i></td>
                       
                    </tr>
                    <?php } ?>
                </tbody>




            </table>

        </div>
    </div>
</div>






<script src="../js/jquery-3.6.0.min.js"></script>
<script src="js/meus_pedidos.js"></script>
