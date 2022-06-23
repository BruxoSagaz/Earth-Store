


<!-- Só mostra se tiver itens no carrinho -->
<?php if(!isset($_SESSION['cart']) || @count($_SESSION['cart']) != 0){
    ?>

<div class="div-chamada-finalizar">
    <h2 class="chamada-finalizar">Revise seu Carrinho!</h2>
</div>





<div class="tabela-pedidos">
    <div class="container">
    <h2><i class="fa-solid fa-cart-shopping"></i>Carrinho</h2>
    
    <table>

        <tr>
            <td>Imagem</td>
            <td>Nome do Produto</td>
            <td>Quantidade</td>
            <td>Valor</td>
            <td>Retirar</td>
        </tr>


        <!-- Gerar Itens -->
<?php
  
    
    foreach ($_SESSION['cart'] as $key => $value) {
        echo "
        
        <tr>
        <td class='case-img-finalizar'><a href='".PATH."individual&id=".$value[0]."'><img src='".PATH.$value[4]."' alt='imagem-item' class='imagem-finalizar'></a></td>

        <td>".$value[1]."</td>

        <td><input type='number' name='quantidade' class='final-quant' value='".$value[2]."' min='1' max=".$value[5]." ref=".$value[0]." ></td>
        
        <td>".$value[3]."</td>
        <td><i class='fa-solid fa-trash-can apagar-item'></i></td>
        <td class='cart-id ".$value[0]."' style='display:none;' value='".$value[0]." '>".$value[0]."</td>
        <td class='numero-ordem' style='display:none;'>".$key."</td>
        </tr>";

    }










?>
        <!-- <tr>
            <td class="case-img-finalizar"><img src="../images/terco.jpg" alt="imagem-item" class="imagem-finalizar"></td>
            <td>Terço de Madeira</td>
            <td>3</td>
            <td>R$ 300,00</td>
        </tr> -->


    </table>
    </div>

</div><!-- Tabela Pedidos -->

<div class="container">
<div class="finalizar-pedido">

    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_51LC4N0GIUmR0keuMuVnYtSJMCyrMiP0HSMZPYqyYg7nRLf6qG92it6HDcAFYaBglTnSmNVOxDP36iJAIZJcWBsAv00ODmcQMgZ"
    data-amount= "<?php echo $_SESSION['total']*100 ?>"
    data-name="Terço de Madeira"
    data-label="Pagar com cartão"
    data-currency ="brl"
    data-panel-label = "Pagar"
    data-description = "Pagamento de Carrinho"
    data-image="<?php echo PATH?>images/Logo.png"
    data-locale="auto"
    ></script>

    <?php
        

        if(isset($_SESSION['login'])){
            echo '
            <div class="w100 flex-end">
            <button id="get-paid-redirect" style="margin-right: 15px;">Pagar pelo Pagseguro!</button>
            
            
            <button id="get-paid-here"><a href="finalizar">Pagar aqui mesmo!</a></button>
            
            </div>';
        }else{
            echo '<a href="'.PATH.'./cadastro/"><button id="login" style="width: 94%;">Faça Login Para comprar!</button></a>';
        }
    ?>
    
    <h2 class="total-price-cart">Total: R$ <?php echo number_format($_SESSION['total'],2,",",".") ?></h2>
    
</div>
</div><!-- Só mostra se tiver itens no carrinho -->
<?php  }else{
    echo "
        <div class='space'></div>
        <div class='alert-empty-cart'>
        <h2>Seu carrinho está vazio!</h2>
        <a href='".PATH."'><button class='return-home'> Voltar para página inicial</button></a>
        </div>
        ";

       
}?>

<script type="text/javascript" src=
"https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
<script src="<?php echo PATH?>js/config.js"></script>
<script src="<?php echo PATH?>js/jquery-3.6.0.js"></script>
<script src="<?php echo PATH?>js/jquery.mask.js"></script>
<script src="<?php echo PATH?>js/header.js"></script>
<script src="<?php echo PATH?>js/home.js"></script>
<script src="<?php echo PATH?>js/finalizar-cart.js"></script>












