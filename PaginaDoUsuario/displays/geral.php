    <!-- Geral -->
    <section class="config-display" page='geral' style="display:none">

        <div class="user-data flex column center">
            <div class="user-icon"><i class="fa-regular fa-user"></i></div>

            <h2><?php echo $userData['nome'] ?></h2>
            <span><?php echo $userData['celular'] ?></span>
        </div>

        <div class="flex row center space-top">
        <!-- calcular -->
        <?php 
            $totalPed = unpackDb($dadosCompras['transaction-id']);
            
            if( $totalPed[0]  != '0'){
                
                $totalPed = count($totalPed);
            
            }else{
                $totalPed = '0';
            }
            $totalConf = unpackDb($dadosCompras['transaction-status']);
            if($totalConf[0] != '0'){
                
                $totalConf = array_count_values($totalConf);
                if(isset($totalConf['Paga'])){
                    $totalConf = $totalConf['Paga'];
                }else{
                    $totalConf = '0';   
                }
                
            }else{
                $totalConf = '0';
            }
            
            ?>

        <div class="data-button flex center neutral-color">Pedidos Totais: <?php echo $totalPed ?></div>
        <div class="data-button flex center wait-color">Pedidos Confirmados: <?php echo $totalConf ?></div>
        <div class="data-button flex center correct-color" >Pedidos Entregues: 0</div>

        </div>

        <!-- testes -->
        <?php print_r("") ?>
    </section>
    <!-- Geral -->