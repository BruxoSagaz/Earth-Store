<!-- css -->   
<link rel="stylesheet" href="style/pedidos.css">
<link rel="stylesheet" href="style/cad_item.css">
<?php
include_once('../config.php');
include_once('../ajax/PDO.php');


$dadosCompras = normalDbQuery("SELECT * FROM `usuarios_pedidos` WHERE `status`='Paga'");


?>


<!-- MAIN -->

<div class="container">

    <div class="form-area">

    <div class="flex-center" style="height:32px"><h2>Lista de Pedidos</h2></div>

    <div class="container" >
    
        <div class="lista-pedido">

            <table class="pedidos">
                <thead>
                    <tr class="index">
                        <th class="ind-th">Id-transação</th>
                        <th class="ind-th">Comprador</th>
                        <th class="ind-th">Status</th>
                        <th class="ind-th">Data</th>
                        <th class="ind-th">Pegar</th>
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
                        <td><i class="fa-solid fa-dolly"></i></td>
                    </tr>
                    <?php } ?>
                </tbody>




            </table>

        </div>
    </div>
    </div>
</div>



<script src="../js/jquery-3.6.0.js"></script>