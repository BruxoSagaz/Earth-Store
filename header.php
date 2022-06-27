<header>
        
        <!-- Container -->
        <div class="container">
  
            <!-- Header Desktop -->
            <div class="desktop-header">
                <!-- Logo -->
                <div class="logo-desktop"><a href="<?php echo PATH?>home"><img src="<?php echo PATH?>images/Logo.png" alt=""></a></div>
                <!-- Logo -->

                <!-- Nav -->
                <nav class="nav-desktop">

                    <ul class="list-nav">   
                        <form action="<?php echo PATH ?>filtros" method="get">                 
                        <input type="input" class="form-field" placeholder="Pesquisa..." name="nome" id='keysearch' autocomplete="on" />
                        <input type="radio" value='filtros' name='page' style="display:none;" checked>

                        </form>  
                        <i class="fa-solid fa-magnifying-glass" id="glass"></i ><li>Pesquisar</li>
                    </ul>

                    <ul class="divlist-nav">
                        <i class="fa-solid fa-comment-dots"></i><li>Fale Conosco</li>
                    </ul>

                    <ul class="list-nav">
                        <?php 
                        if(isset($_SESSION['login'])){
                            echo '<div class="account-head">
                            <i class="fa-solid fa-user"></i><li>Minha Conta</li>
                            </div>
                            ';
                        }else{
                            echo '<a href="'.PATH.'./cadastro/">
                            <i class="fa-solid fa-arrow-right-to-bracket" ></i><li>Cadastrar-se</li>
                            </a>';
                        }
                        
                        
                        ?>

                    </ul>

                    <ul>
                        <div class="bag-shipping">
                            <div class="num-cart">
                                <?php
                                 if(isset($_SESSION['cart'])){
                                    $totalItem = 0;
                                    foreach ($_SESSION['cart'] as $key => $value) {
                                        $totalItem++;
                                    }
                                    echo $totalItem;
                                 }else{
                                     echo "0";
                                 }

                                ?>
                            </div>
                            <div>
                                <i class="fa-solid fa-bag-shopping"></i>
                            </div>

                        </div>
                    </ul>
                </nav><!-- Nav -->

            </div>
            <div class="cart-sidebar2"></div>
            <div class="cart-sidebar">
                
                <?php 
                if(isset($_SESSION['login'])){
                    $nome = explode(" ", $_SESSION['nome']);
                    echo '<div class="welcome">';
                    echo '<h2>Seja bem vindo: </h2>';
                    echo '<h2>'; 
                    echo "$nome[0]";
                    echo '</h2>';
                    echo '</div>';

                }         
                ?>
                
                <h2 style="margin-bottom: 8px;">Carrinho de compras</h2>
                <!-- <div class='cart-item-individual'>
                        <div class='item-img-box'>
                            <img src='images/terco.jpg' alt='img_do_banco'>
                        </div>
                        <div class='cart-especificacoes'>
                            <span class='cart-item-name'>Item de nome muito grande mesmo pode acreditar</span>
                            <span class='cart-preco'>R$ 50,00</span>

                            <div>
                            <label for='quantidade'>Quantidade:</label>
                            <input type='number' name='quantidade' id=' value='2' min='1'>
                            </div>
                        </div>

                        <div class='cart-opcoes'>
                            <i class='fa-solid fa-trash-can'></i>
                        </div>
                    </div>
                     -->
                <div class="cart-itens">
                   
    

                    <?php   
                        if(isset($_SESSION['cart'])){

                            $_SESSION['total'] = 0;
                            
                            foreach ($_SESSION['cart'] as $key => $value) {
                                echo "<div class='cart-item-individual'>
                                <div class='item-img-box'>
                                    <a href='".PATH."individual&id=".$value[0]."'>
                                    <img src='".PATH.$value[4]."' alt='img_do_banco'>
                                    </a>
                                </div>
                                <div class='cart-especificacoes'>
                                    <span class='cart-item-name'>".$value[1]."</span>
                                    <span class='cart-preco'>".$value[3]."</span>
        
                                    <div>
                                    <label for='quantidade'>Quantidade:</label>
                                    <input type='number' name='quantidade' id='' value='".$value[2]."' min='1' max=".$value[5]." ref='".$value[0]."' >
                                    </div>
                                </div>
        
                                <div class='cart-opcoes'>
                                    <i class='fa-solid fa-trash-can'></i>
                                </div>
                                <div class='cart-id ".$value[0]."' style='display:none;' value='".$value[0]." '>".$value[0]."</div>
                            </div>";
                            //calulando total
                            $preco = explode(" ",$value[3]);
                            // var_dump($preco);
                            $preco = str_replace(".","",$preco[2]);
                            
                            $preco = str_replace(",",".",$preco);
                            


                            $_SESSION['total'] = $_SESSION['total'] + (floatval($preco)*intval($value[2])); 


                            }

                            

 
                        }

                        if(@count($_SESSION['cart']) == 0 || !isset($_SESSION['cart'])){
                            echo "<h2 id = 'empty-cart' style='color: #ef5350;font-size: 19px;'>- Carrinho Vazio -</h2>";
                        }
                        if(!isset($_SESSION['total'])){
                            $_SESSION['total'] = 0;
                        }
                        echo '<div class="total-div">
                        <span>Total do pedido (sem frete): </span>
                        <h3 class="total-price-cart">R$ '.number_format($_SESSION['total'],2,",",".").'</h3>

                        <a href="'.PATH.'./pedido/" style="width: 56%;">
                        <button id="finalizar-pedido">Finalizar pedido</button>
                        </div>
                        </a>
                        ';
                        
                    ?>
                        
                </div>


                <?php 
                if(isset($_SESSION['login'])){
                    echo "<div class='exit'>";
                    echo "<a href=".PATH."&loggout>";
                    echo "<i class='fa-solid fa-right-from-bracket'></i>Sair
                    </a>
                    </div>";
                }
                ?>
                
            </div>

        </div><!-- Container --><!-- Header Desktop -->

        <div class="container">
            <div class="mobile-header">
            
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="fa-solid fa-bars"></i></a>

                
                <!-- Logo -->
                <div class="logo-mobile"><a href="<?php echo PATH?>home"><img src="<?php echo PATH?>images/Logo.png" alt=""></a></div>
                <!-- Logo -->

                <ul class="list-nav">
                   <a href="<?php echo PATH?>cadastro"><i class="fa-solid fa-arrow-right-to-bracket" ></i></a> <!--<li>Minha Conta</li> -->
                </ul>
                
            </div>

        </div>
    </header>