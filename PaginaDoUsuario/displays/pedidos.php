
<!-- Pedidos -->
<section class="config-display" page='pedidos' style="display:none">

<div class="user-data flex column center">
    <div class="user-icon"><i class="fa-regular fa-user"></i></div>

    <h2><?php echo $userData['nome'] ?></h2>
    <span><?php echo $userData['celular'] ?></span>
</div>

    <!-- Tabelas -->
    <div class="w100 space-top flex column">

    <!-- constructor -->
        <?php 
        $dataPedidosInd = array_reverse($dataPedidosInd); 
        foreach ($dataPedidosInd as $key => $value) {
            // seprar os itens
            // print_r($value['itens']);
            // print_r(explode(",",$value['itens']));
            $teste = explode(",",$value['itens']);
            $itensSeparados = array_chunk($teste,4);
            
            ?>
        <!-- individual -->
        <div class="w100  pedido-individual">

            <div class="flex row pedido-status-top <?php
            echo (isset($dictStatus[$value['status']])) ? $dictStatus[$value['status']] : "pgto-generic"; 
            ?>" style="float:left">
                <div class="status-bar "></div>
                <div class="transaction-id">
                    <p>ID:</p>
                    <p>#<?php echo $value['transaction-id'] ?></p>
                </div>
                
            </div>
            <div class="pedido-status-date flex center column" style="float:right">
                <p>Pedido</p>
                <p>Realizado:</p>
                <p><?php echo $value['data'] ?></p>
            </div>
            <div class="clear"></div>
            <!-- DIV Full information -->
            
            <div class="info-area" >

                <div class="info-comprador">

                    <div class='info-nome info'>
                    <p>Nome do Comprador:</p> 
                    <p><?php echo $value['nome_comprador'] ?></p>
                    </div>

                    <div class="info-endereco info">
                    <p>Endereço de entrega: </p>
                    <p><?php echo $value['endereco_entrega'] ?></p>
                    </div>

                    <div class="info-endereco info">
                    <p>Modalidade de Entrega: </p>
                    <p><?php echo $value['servico'] ?></p>
                    </div>

                    <div class="info-endereco info">
                    <p>Método de Pagamento: </p>
                    <p><?php echo $value['metodo_pagamento'] ?></p>
                    </div>

                </div>

                <div class="info-produto">
                    <table class="display-final-payment">

                    <tr class="letter">
                        <th>Nome</th>
                        <th>Preço</th>
                    </tr>
                    <?php
                    $acumu = 0;
                    foreach ($itensSeparados as $key2 => $valuess) {
                        $acumu += (int)$valuess[3] * (float)$valuess[2]
                    ?>
                    <tr class="retorno<?php echo $key2 ?>">
                        <td><?php echo $valuess[1]." ($valuess[3])" ?>:</td>
                        <td>R$ <?php echo number_format($valuess[2],2,",",".") ?></td>
                    </tr>
                    <?php  
                    } 
                    $frete = (float)$value['custo'] - (float)$acumu;
                    
                    ?>
                    <tr class="rentorno-frete">
                        <td>Frete:</td>
                        <td>R$ <?php echo number_format($frete,2,",",".") ?></td>
                    </tr>

                    <tr class="retorno-total">
                        <td>Total: </td>
                        <td>R$ <?php echo number_format($value['custo'],2,",",".") ?></td>
                    </tr>
                    </table>
                </div>

                <div class="clear"></div>
                <div class="estado-atual flex center">
                    <p>Estado do Pedido:</p>
                    <P><?php echo $value['status'] ?></P>
                    <div class="color-ind <?php echo (isset($dictStatus[$value['status']])) ? $dictStatus[$value['status']] : "pgto-generic";?>"></div>
                </div>

            </div>

            <div class="line-separation"></div>
            <div class="slide-indicator w100"><i class="fa-solid fa-angle-down"></i></div>
        </div>
        <?php } ?>
        <!-- individual -->
        <!-- constructor -->

    </div>
    
</section>
<!-- Pedidos -->