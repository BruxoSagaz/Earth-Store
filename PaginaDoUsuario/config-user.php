

<?php
include_once('../config.php');
include_once('../ajax/PDO.php');

if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 'geral';
}

?>



<?php
// carregar dados

$dadosCompras = normalDbQuery("SELECT * FROM `usuarios-compras` WHERE id='".$_SESSION['dados']['id']."'");
$dadosCompras = $dadosCompras[0];
$userData = normalDbQuery("SELECT * FROM `usuario` WHERE id='".$_SESSION['dados']['id']."'");
$userData = $userData[0];

?>
<div class="container w100" style="margin-top: 35px;">

    <div class="user-table">
        <div id="page-chosen" page="<?php echo $page ?>"></div>
        <div class="opts-left">
            <div class="opt-row">
                <a href="?page=geral" page="geral">

                <div class="opt-icon"><i class="fa-solid fa-user-gear"></i></div>
                <div class="opt-description">
                    <p>Geral</p>
                </div>

                </a>
            </div>

            <div class="opt-row">
                <a href="?page=pedidos" page="pedidos">

                <div class="opt-icon"><i class="fa-solid fa-clipboard-user"></i></div>
                <div class="opt-description">
                    <p>Meus Pedidos</p>
                </div>

                </a>
            </div>

            <div class="opt-row">
                <a href="?page=dados" page="dados">

                <div class="opt-icon"><i class="fa-solid fa-circle-info"></i></div>
                <div class="opt-description">
                    <p>Meus Dados</p>
                </div>

                </a>
            </div>

            <div class="opt-row">
                <a href="?page=senha" page="senha">

                <div class="opt-icon"><i class="fa-solid fa-unlock"></i></div>
                <div class="opt-description">
                    <p>Alterar Senha</p>
                </div>

                </a>
            </div>

            

            <div class="opt-row" style="margin-top: 334px;">
                <a href="<?php echo PATH ?>">

                <div class="opt-icon"><i class="fa-solid fa-person-walking-arrow-loop-left"></i></div>
                <div class="opt-description">
                    <p>Sair</p>
                </div>

                </a>
            </div>


        </div>

        <!-- DISPLAY -->
        <div class="display-right">
            <div class="container" style="padding: 24px 2%;">

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
                        $totalConf = $totalConf['Paga'];
                    }else{
                        $totalConf = '0';
                    }
                   
                ?>

                <div class="data-button flex center neutral-color">Pedidos Totais: <?php echo $totalPed ?></div>
                <div class="data-button flex center wait-color">Pedidos Confirmados: <?php echo $totalConf ?></div>
                <div class="data-button flex center correct-color" >Pedidos Recebidos: 0</div>

                </div>

                <!-- testes -->
                <?php print_r("") ?>
            </section>
            <!-- Geral -->

            <!-- Pedidos -->
            <section class="config-display" page='pedidos' style="display:none">

            <div class="user-data flex column center">
                <div class="user-icon"><i class="fa-regular fa-user"></i></div>

                <h2><?php echo $userData['nome'] ?></h2>
                <span><?php echo $userData['celular'] ?></span>
            </div>

                <!-- Tabelas -->
                <div class="w100 space-top flex column">

                    <!-- individual -->
                    <div class="w100  pedido-individual">

                        <div class="flex row pedido-status-top correct-color" style="float:left">
                            <div class="status-bar "></div>
                            <div class="transaction-id">
                                <p>ID:</p>
                                <p>#62c88e2216b4e</p>
                            </div>
                            
                        </div>
                        <div class="pedido-status-date flex center column" style="float:right">
                            <p>Pedido</p>
                            <p>Realizado:</p>
                            <p>14/07/2002</p>
                        </div>
                        <div class="clear"></div>
                        <!-- DIV Full information -->

                        <div class="info-area" >

                        </div>

                        <div class="line-separation"></div>
                        <div class="slide-indicator w100"><i class="fa-solid fa-angle-down"></i></div>
                    </div>
                    <!-- individual -->

                    <!-- individual -->
                    <div class="w100  pedido-individual">

                    </div>
                    <!-- individual -->

                    <!-- individual -->
                    <div class="w100  pedido-individual">

                    </div>
                    <!-- individual -->
                    
                </div>
                
            </section>
            <!-- Pedidos -->


            <!-- Dados -->
            <section class="config-display" page='dados' style="display:none">

            <div class="user-data flex column center">
                <div class="user-icon"><i class="fa-regular fa-user"></i></div>

                <h2><?php echo $userData['nome'] ?></h2>
                <span><?php echo $userData['celular'] ?></span>
            </div>

            <form action="">
            <div class="flex row center wrap space-top">

                
                <div class="enter">
                <label for="">Nome Completo:</label>
                <input  type="text" name="nome" placeholder="Nome" 
                value = "<?php echo $userData['nome'] ?>">
                </div>

                <div class="enter">
                <label for="data" style="">Data de Nascimento:</label>
                <input  type="text" name="data"  id="data"
                 value = "<?php echo $userData['dataNascimento']?>">

                </div>

                <div class="enter">
                <label for="">CPF:</label>
                <input  type="tel" name="cpf" placeholder="CPF" id="cpf"
                value = "<?php echo @$userData['cpf'] ?>">
                </div>

                <div class="enter">
                <label for="">Celular:</label>
                <input  type="tel" name="cell" placeholder="(xx) xxxxx-xxxx " id="cell" value = "<?php echo $userData['celular'] ?>">
                </div>

                <div class="enter"> 
                <label for="">Email:</label>
                <input  type="email" name="email" placeholder="Email" value = "<?php echo $userData['email'] ?>">
                </div> 

            </div>
            </form>
            </section>
            <!-- Dados -->

            <!-- SENHA -->
            <section class="config-display" page='senha' style="display:none">

            <div class="user-data flex column center">
                <div class="user-icon"><i class="fa-regular fa-user"></i></div>

                <h2><?php echo $userData['nome'] ?></h2>
                <span><?php echo $userData['celular'] ?></span>
            </div>
            
            <form action="">
            <div class="flex row center wrap space-top">

                <div class="enter">
                    <label for="">Senha Atual:</label>
                    <input type="password" name="senhaAtual" placeholder="Senha Atual" id="senhaAtual">
                </div>

                <div class="enter">
                    <label for="">Nova Senha:</label>
                    <input type="password" name="senhaNova" placeholder="Senha Nova" id="senhaNova"> <div class="password-area"><span style="display:none">Força da senha: </span><p class="seg-senha" id="segtotal"></p></div>
                </div>
            </div>
            </form>
            </section>
            <!-- SENHA -->

            </div> 
        </div>
    </div>
</div>





<script src="<?php echo PATH?>js/config.js"></script>
<script src="<?php echo PATH?>js/jquery-3.6.0.js"></script>
<script src="<?php echo PATH?>js/jquery.mask.js"></script>
<script src="<?php echo PATH?>js/header.js"></script>
<script src="<?php echo PATH?>js/config-user.js"></script>

<script>
    $('#data').mask('00/00/0000')
</script>