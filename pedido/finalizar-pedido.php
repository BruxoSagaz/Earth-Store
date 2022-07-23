
<!-- <div class="modal-bg" style='max-height: 2296.46px;'></div> -->

<!-- Só mostra se tiver itens no carrinho -->
<?php if(isset($_SESSION['cart']) || @count($_SESSION['cart']) != 0){
    include_once("../ajax/PDO.php");
    $id = $_SESSION['dados']['id'];
    $query = "SELECT * FROM `usuarios-cards` WHERE `id` = $id";
    $cardData = normalDbQuery($query,[]);
    $cardData = $cardData[0];
   
    ?>

<div class="div-chamada-finalizar">
    <h2 class="chamada-finalizar">Revise seu Carrinho!</h2>
</div>





<div class="tabela-pedidos" ordem="1">
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
        <td class='case-img-finalizar'><a href='".PATH."individual&id=".$value['id']."'><img src='".PATH.$value['images']."' alt='imagem-item' class='imagem-finalizar'></a></td>

        <td class='nome-item-banco'>".$value['nome']."</td>

        <td><input type='number' name='quantidade' class='final-quant' value='".$value['quant']."' min='1' max=".$value['max']." ref=".$value['id']." ></td>
        
        <td class = 'valorFinal' valor='".$value['precoOrig']."' >".$value['precoFormat']."</td>

        <td><i class='fa-solid fa-trash-can apagar-item'></i></td>
        <td class='cart-id ".$value['id']."' style='display:none;' value='".$value['id']." '>".$value['id']."</td>
        <td class='numero-ordem' style='display:none;' valor='$key'></td>
        </tr>";

    }
?>
    </table>
    </div>



<!-- Total Cart -->
<div class="container">
<div style="float: right;width: 310px;">
<div class="total-price-area">
    <h2 style="font-size: 27px;">Total do Carrinho:</h2>
    <h2 class="total-price-cart" id ="quant-final-carr" valor="<?php echo $_SESSION['total'] ?>">R$ <?php echo number_format($_SESSION['total'],2,",",".") ?></h2>

    <?php if(isset($_SESSION['login'])){ ?>
    <button class="continue-shipping" style="width: 100%;margin: 20px 0px;" ordem="1">Continuar <i class="fa-regular fa-circle-right"></i></button>
    <?php } ?>
</div>
</div>
<div class="clear"></div>
</div>
<!-- Total Cart -->

</div><!-- Tabela Pedidos -->

<?php if(isset($_SESSION['login'])){ ?>

<!-- Localização -->

<div class="tabela-form" ordem="2" style='display:none'>
    

    <div class="container">
        <h2><i class="fa-solid fa-truck-ramp-box"></i>Entrega</h2>
    </div>

    <div class="container">

    <div class="container">

    <form action="" class="finalizar-form local-form">


        <div class='row'><!-- Row -->

        <div class="individual">
        <label for="cep">CEP:</label>
        <input type="text" name="cep" id="ceps" placeholder="00000-000" style="width: 115px;" value="<?php echo @$_SESSION['local']['cep']?>">

        <a class="btn-link" id='oho' target="_blank" href="https://buscacepinter.correios.com.br/" style="text-decoration: underline;
        margin-left: 8px;">
        Não sei meu CEP
        </a>
        </div>

        <div class="individual">
        <span>O CEP irá preencher os dados automaticamente</span>
        </div>

        <div class="individual">
        <label for="endereco">Endereço (Rua, Avenida, Quadra, Lote): </label>
        <input type="text" name="endereco" id="endereco" style="width: 300px;" value="<?php echo @$_SESSION['local']['endereco']?>">
        </div>


        <div class="individual">
        <label for="numero">Número: </label>
        <input type="text" name="numero" id="numero" style="width: 75px;" value="<?php echo @$_SESSION['local']['numero']?>">
        </div>



        </div><!-- Row -->
        
        <div class="row"><!-- Row -->

        <div class="individual">
        <label for="complement">Complemento (Opcional): </label>
        <input type="text" name="complement" id="complement" style="width: 235px;" value="<?php echo @$_SESSION['local']['comp']?>">
        </div>

        </div><!-- Row -->


        <div class="row"><!-- Row -->

        <div class="individual">
        <label for="bairro">Bairro: </label>
        <input type="text" name="bairro" id="bairro" style="width: 218px;" value="<?php echo @$_SESSION['local']['bairro']?>">
        </div>

        </div><!-- Row -->

        
        <div class="row"><!-- Row -->

        <div class="individual">
        <label for="estado">Estado: </label>
        <!-- <input type="text" name="estado" id="estado" style="width: 70px;" value="<?php echo @$_SESSION['local']['estado']?>" list="estados_list"> -->
        <select name="estado" id="estado" >
            <option value="<?php echo @$_SESSION['local']['estado']?>"  selected="selected"><?php echo @$_SESSION['local']['estado']?></option>
        </select>
        </div>


        <div class="individual">
        <label for="cidade">Cidade: </label>
        <select name="cidade" id="cidade" style="min-width: 125px;" >
            <option value="<?php echo @$_SESSION['local']['cidade']?>"  selected="selected"><?php echo @$_SESSION['local']['cidade']?></option>
        </select>
        </div>




        </div><!-- Row -->

        <div class="row"><!-- Row -->
        <div class="individual">
            <label for="salvar-end">Salvar Meu Endereço!</label>
            <input type="checkbox" name="salvar-end" id="salvar-end" <?php echo @$_SESSION['local']['salvar']?>>
        </div>
        </div><!-- Row -->



    </form><!-- Local-Form -->

    <div class="center-row-button">
    <button class="continue-shipping" style="width: 33%;
    margin: 0 auto;" ordem="2">Continuar <i class="fa-regular fa-circle-right"></i></button>
    <button class="go-back" style="width: 33%;
    margin: 19px auto;" ordem="2">Voltar <i class="fa-regular fa-circle-left"></i></button>
    </div>

    </div>
    </div>
</div>
<!-- Localização -->






<!-- FRETE -->

<div class="tabela-form" ordem="3" style='display:none'>
    

    <div class="container">
        <h2><i class="fa-solid fa-truck-fast"></i>FRETE</h2>
    </div>

    <div class="container">

    <div class="container">

    <form action="" class="finalizar-form frete-form">


    <div id='loadingmessage' style='display:none'>
        <img src='<?php echo PATH?>/ajax/loading.gif'/>
    </div>
                                
    <div class="w100 hide-result">
        <div class="result-cep" style="margin-bottom: 40px;">
            <div id="servic" style="display:none"></div>
            <table>
                <tr class="letter">
                    <td>Selecionar</td>
                    <td>Serviço</td>
                    <td>Preço</td>
                    <td>Prazo</td>
                </tr>
                
                <!-- <tr id="retorno1">
                    <td>SEDEX</td>
                    <td>R$20,00</td>
                    <td>5 dias</td>
                </tr> -->

            </table>
        </div>
    </div>

    <div class="center-row-button w100">
    <button class="continue-shipping" style="margin: 0;width: 35%;"  ordem="3">Continuar <i class="fa-regular fa-circle-right"></i></button>
    <button class="go-back" style="width: 35%;
    margin: 0;" ordem="3">Voltar <i class="fa-regular fa-circle-left"></i></button>
    </div>

    </form><!-- Local-Form -->

    

    </div>
    </div>
</div>
<!-- FRETE -->



<!-- PRECO FINAL -->
<section ordem="4" style='display:none'>

<div class="container center">

<div class="div-chamada-finalizar div-final-price">
    <h2 class="chamada-finalizar">PREÇO FINAL!</h2>
</div>

<table class="display-final-payment">

    <tr class="letter">
        <th>Nome</th>
        <th>Preço</th>
    </tr>
    
    <!-- <tr class="retorno1">
        <td>Item-1:</td>
        <td>R$20,00</td>
    </tr> -->



</table>

<div class="center-row">

<h2 style="margin-right: 15px;">Total Final Com Frete:</h2>
<h2 class="total-price" id ="quant-final-total" style="margin: 50px 0px;" valor="<?php echo @$_SESSION['totalFinal'] ?>"> R$ <?php echo @number_format($_SESSION['totalFinal'],2,",",".") ?></h2>
</div>
</div>


<div class="container center-row">
<div id="get-total-final-response" style="display:none" valor=""></div>
<button class="go-back"  style="margin: 10px 21px;"  ordem="4">Voltar <i class="fa-regular fa-circle-left"></i></button>

<button class="get-paid-here" valor='boleto' style="margin: 10px 21px;"  ordem="4"> Pagar com Boleto! <i class="fa-solid fa-barcode"></i></button>

<button class="get-paid-here paid-card-trig" valor='credit-card' style="margin: 10px 21px;"  ordem="4"> Pagar com Crédito! <i class="fa-solid fa-credit-card"></i></button>

<div class="center" style="justify-content: normal;">

<button class="get-paid-here" valor='credit-card' style="margin: 10px 21px;    width: 100%;"  ordem="4" disabled> Pagar com PIX! <i class="fa-brands fa-pix"></i></button>
<span style="position: absolute;
    background: #352829;
    color: white;
    width: 100px;
    text-align: center;
    border-radius: 6px;">Em Breve!</span>
</div>

</div>  


</div>

</section>

<!-- PRECO FINAL -->



















<!-- Dados Pagamento -->

<div class="tabela-form" style="display:none;"  ordem="5">
    

    <div class="container">
        <h2><i class="fa-solid fa-credit-card"></i>Dados de Pagamento</h2>
    </div>

    <div class="container">

    <div class="container">
    <div class="credit-card once" style="display:none"> 
    <form action="" class="finalizar-form payment-information apagar" id = "credit-card-form">


        <div class='row'><!-- Row -->

        <div class="individual">
        <label for="NomeCompra">Nome:</label>
        <input type="text" name="NomeCompra" id="nomeCompra" style="width: 330px;" value="<?php echo @$_SESSION['dados']['nome']?>">

        </div>


        <div class="individual">
        <label for="cpf">CPF: </label>
        <input type="text" name="cpf" id="cpf" style="width: 300px;" value="<?php echo @$_SESSION['dados']['cpf']?>">
        </div>

        
        <div class="individual">
        <label for="celular">celular: </label>
        <input type="text" name="celular" id="celular" style="width: 300px;" value="<?php echo @$_SESSION['dados']['celular']?>">
        </div>

        </div><!-- Row -->

        <div class="row"><!-- Row -->

        <div class="individual">
        <label for="num-card">numero do cartão: </label>
        <input type="text" name="num-card" id="num-card" style="width: 300px;" class="card" value="<?php echo @$cardData['num-card'] ?>">
        </div>

        </div><!-- Row -->


        <div class='row'><!-- Row -->
        <div class="individual">
        <label for="bandeira">Bandeiras: </label>
        <select name="bandeiras" id="bandeiras"  style="width: 175px;" class="card"  value="<?php echo @$cardData['bandeira'] ?>">
            <!-- <option value="visa">Visa</option> -->
            <option value=""></option>
            <?php 
            if(isset($cardData['bandeira'])){
                $bandeira = $cardData['bandeira'];
                $upper = strtoupper($bandeira);
                echo "<option value='$bandeira' selected>$upper</option>";
            }
            ?>
        </select>
        </div>

        <div class="individual">
        <label for="valores">divisões: </label>
        <select name="valores" id="divisions-values"  style="width: 240px;" >
            <!-- <option value="199.00">1x de R$ 190.00</option> -->
        </select>
        </div>

        </div><!-- Row -->

       
        


        <div class="row"><!-- Row -->

        <div class="individual">
        <label for="cvv">CVV: </label>
        <input type="text" name="cvv" id="cvv" style="width: 75px;" class="card"  value="<?php echo @$cardData['cvv'] ?>">
        </div>

        <div class="individual">
        <label for="validade">Validade(MM/AAAA): </label>
        <input type="text" name="validade" id="validade" style="width: 100px;" class="card"  value="<?php echo @$cardData['validade'] ?>">
        </div>

        </div><!-- Row -->

        <div class="row"><!-- Row -->
        <div class="individual">
            <label for="salvar-card">Salvar Meu Cartão!</label>
            <input type="checkbox" name="salvar-card" id="salvar-card"  <?php echo @$_SESSION['salvar-card'] ?>>
        </div>
        </div><!-- Row -->

                    


    </form><!-- card-Form -->
    </div>
    <!-- Credit Card -->

    <div class="boleto once" style="display:none">
    <form action="" class="finalizar-form payment-information apagar">

        <div class='row'><!-- Row -->

        <div class="individual">
        <label for="NomeCompra">Nome:</label>
        <input type="text" name="NomeCompra" id="nomeCompraBoleto" style="width: 330px;" value="<?php echo @$_SESSION['dados']['nome']?>">

        </div>


        <div class="individual">
        <label for="cpf">CPF: </label>
        <input type="text" name="cpf" id="cpfBoleto" style="width: 300px;" value="<?php echo @$_SESSION['dados']['cpf']?>">
        </div>


        <div class="individual">
        <label for="celular">celular: </label>
        <input type="text" name="celular" id="celularBoleto" style="width: 300px;" value="<?php echo @$_SESSION['dados']['celular']?>">
        </div>

        </div><!-- Row -->
    </form>
    </div>


    <button id="proceed-payment" class="apagar" style="float: right;width: 142px;"><i class="fa-solid fa-credit-card" valor="CreditCard"></i> Prosseguir</button>

    <div class="aparecer-success-buy" style="display:none">
        <div class='success-buy'>
            <i class="fa-regular fa-circle-check"></i>
            <p class="p-fade">Sua Compra Foi Efetuada com sucesso!</p>
            <p class="p-fade">Você será notificado com as etapas do pagamento</p>
            
            <p class="boleto-show" style='display:none;'>Seu Boleto Foi gerado!</p>
        

            <a href='<?php echo PATH ?>'  class="p-fade"><button class='return-home'> Voltar para página inicial</button></a>

            <a href="" class="boleto-show"><button style="width: 100%;margin-right: 20px;">Clique Aqui Para Imprimir O Boleto</button></a>
        </div>
    </div>

    </div>
    </div>
</div>
<!-- Dados Pagamento -->

<?php } ?>

<div class="container">
<div class="finalizar-pedido">

    <?php
        

        if(!isset($_SESSION['login'])){
    ?>
    <?php
        
            echo '<a href="'.PATH.'./cadastro/"><button id="login" style="width: 94%;">Faça Login Para comprar!</button></a>';
        }
    ?>
    

    
</div>
</div><!-- Só mostra se tiver itens no carrinho -->
<?php  }else if(isset($_SESSION['login'])){
    echo "
        <div class='space'></div>
        <div class='alert-empty-cart'>
        <h2>Seu carrinho está vazio!</h2>
        <a href='".PATH."'><button class='return-home'> Voltar para página inicial</button></a>
        </div>
        ";

       
}else{
    echo "
    <div class='space'></div>
    <div class='alert-empty-cart'>
    <h2>Faça Login para realizar a compra!</h2>
    <a href='".PATH."/cadastro'><button class='return-home'> Ir para a tela de entrada</button></a>
    </div>
    ";
}


?>

<script src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"></script>
<script src="<?php echo PATH?>js/config.js"></script>
<script src="<?php echo PATH?>js/jquery-3.6.0.js"></script>
<script src="<?php echo PATH?>js/jquery.mask.js"></script>
<script src="<?php echo PATH?>js/header.js"></script>
<script src="<?php echo PATH?>js/home.js"></script>
<script src="<?php echo PATH?>js/finalizar-cart.js"></script>
<script src="<?php echo PATH?>js/finalizar-frete-calc.js"></script>












