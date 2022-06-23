

<div class="div-chamada-finalizar">
    <h2 class="chamada-finalizar">Finalize o Seu Pedido!</h2>
</div>


<div class="container tabela-pedidos">
    <h2><i class="fa-solid fa-check"></i>Dados de Pagamento</h2>
</div>


<div class="container">
    <form action="" class="form-buy">


        <div class="personal-data">

        <div class="container tabela-pedidos">
            <h2><i class="fa-solid fa-person"></i>Dados Pessoais</h2>
        </div>


        <div class="line-align">


        <div class="item-align">
        <label for="nome">Nome Completo: </label>
        <input type="text" name="nome" value="<?php echo $_SESSION['dados']['nome']?>" placeholder="Insira Seu Nome" style="width: 250px;">
        </div>

        <div class="item-align">
        <label for="cpf">Seu CPF: </label>
        <input type="text" name="cpf" value="<?php echo $_SESSION['dados']['cpf']?>" placeholder="Insira Seu CPF" style="width: 150px;">
        </div>

        <div class="item-align">
        <label for="nasc">Sua data de Nascimento: </label>
        <input type="text" name="nasc" value="<?php echo $_SESSION['dados']['dataNascimento']?>" style="width: 120px;">
        </div>

        <div class="item-align">
        <label for="cpf">Seu CPF: </label>
        <input type="text" name="cpf" value="<?php echo $_SESSION['dados']['cpf']?>" placeholder="Insira Seu CPF" style="width: 150px;">
        </div>

        </div><!-- line-align -->
        </div><!-- personal-data -->
        
    </form>
</div>



<script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
<script src="https://js.stripe.com/v3/"></script>



<script src="<?php echo PATH?>js/config.js"></script>
<script src="<?php echo PATH?>js/jquery-3.6.0.js"></script>
<script src="<?php echo PATH?>js/jquery.mask.js"></script>
<script src="<?php echo PATH?>js/header.js"></script>
<script src="<?php echo PATH?>js/finalizar-transparente.js"></script>

<script>
    $(document).ready(function(){
    // console.log($('tbody tr').length);
    if($('tbody tr').length <= 2){
        $('.sec-footer').css('position','absolute');
        $('.sec-footer').css('bottom','0');
    };
    });
</script>