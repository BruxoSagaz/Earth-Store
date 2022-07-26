

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
$dictStatus = array(
    'Aguardando pagamento' => "aguardando-pgto",
    'Paga' => 'pgto-realizado',
    'Cancelada' => 'pgto-cancelado',
    'Devolvida' => 'pgto-cancelado',
    'Recebido' => 'pedido-recebido'
);



$dadosCompras = normalDbQuery("SELECT * FROM `usuarios_compras` WHERE id='".$_SESSION['dados']['id']."'",[]);


$dadosCompras = $dadosCompras[0];
$userData = normalDbQuery("SELECT * FROM `usuario` WHERE id='".$_SESSION['dados']['id']."'",[]);
$userData = $userData[0];
// Array ( [id] => 1 [0] => 1 [cpf] => 141.765.474-05 [1] => 141.765.474-05 [notification-code] => 0 [2] => 0 [transaction-status] => 0 [3] => 0 [transaction-id] => 62c9aa40ae2de [4] => 62c9aa40ae2de )

$arrIds = unpackDb($dadosCompras['transaction-id']);
$dataPedidosInd = array();

// MONTANDO OS DADOS DOS PEDIDOS
foreach ($arrIds as $key => $value) {
    $query = normalDbQuery("SELECT * FROM `usuarios_pedidos` WHERE `transaction-id`='".$value."'",[]);
    if(count($query) > 0){
        $query = $query[0];

        array_push($dataPedidosInd,$query);
    }

    // Array ( [transaction-id] => 62c9aa40ae2de [nome_comprador] => Gabriel Pereira Bezerra [endereco_entrega] => R. Rio Capibaribe,50 ,Cordeiro-Recife/PE CEP: 50721-290 [servico] => PAC [custo] => 280.60 [itens] => 115,Terço de Madeira,50.50,4,116,Produto 2,10.00,3 [status] => Em Espera [data] => 2022-07-09 )
}



// $dataPedidosDB = normalDbQuery("SELECT * FROM `usuario_pedidos` WHERE id='".$_SESSION['dados']['id']."'")

?>
<div class="container w100" style="margin-top: 35px;" id="respose-balance">

    <div class="user-table">
        <div id="page-chosen" page="<?php echo $page ?>"></div>
        <div class="opts-left">


            <div class="opts-align-resp">
            <div class="opt-row">
                <a href="?page=geral" page="geral">

                <div class="opt-icon"><i class="fa-solid fa-user"></i></div>
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
                <a href="?page=enderecos" page="enderecos">

                <div class="opt-icon"><i class="fa-solid fa-location-dot"></i></div>
                <div class="opt-description">
                    <p>Meu Endereço</p>
                </div>

                </a>
            </div>

            <div class="opt-row">
                <a href="?page=cartoes" page="cartoes">

                <div class="opt-icon"><i class="fa-regular fa-credit-card"></i></div>
                <div class="opt-description">
                    <p>Meu Cartão</p>
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
            </div>

            

            <div class="opt-row" >
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

            <?php

                include_once("displays/".$page.".php");

            ?>

            </div> 
        </div>
    </div>
</div>





<script src="<?php echo PATH?>js/config.js"></script>
<script src="<?php echo PATH?>js/jquery-3.6.0.js"></script>
<script src="<?php echo PATH?>js/jquery.mask.js"></script>
<script src="<?php echo PATH?>js/verificacoes.js"></script>
<script src="<?php echo PATH?>js/header.js"></script>
<script src="<?php echo PATH?>js/config-user.js"></script>

<?php 
    $pathJs = PATH."PaginaDoUsuario/js/".$page.".js";

    echo "<script src=".$pathJs."></script>";
    
?>