
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Pedido</title>
    <?php 

        include_once('../fav-icon.php');

    ?>
    <link rel="stylesheet" href="<?php echo PATH?>/style/style.css">
    <link rel="stylesheet" href="<?php echo PATH?>/style/fim-pedido.css">
    <script src="https://kit.fontawesome.com/91e791a30b.js" crossorigin="anonymous"></script>
</head>
<body>
<?php 
include_once('../header.php');
?>

<!-- Só mostra se tiver itens no carrinho -->
<?php if(!isset($_SESSION['cart']) || @count($_SESSION['cart']) != 0){
    ?>

<div class="div-chamada-finalizar">
    <h2 class="chamada-finalizar">Finalize o Seu Pedido!</h2>
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
    <button>Pagar Agora!</button>
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


<?php 
include_once('../footer.php');
?>

</body>
</html>











