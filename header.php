<header>
        
        <!-- Container -->
        <div class="container">
  
            <!-- Header Desktop -->
            <div class="desktop-header">
                <!-- Logo -->
                <div class="logo-desktop"><a href="home"><img src="images/Logo.png" alt=""></a></div>
                <!-- Logo -->

                <!-- Nav -->
                <nav class="nav-desktop">

                    <ul class="list-nav">                      
                        <input type="input" class="form-field" placeholder="Pesquisa..." name="name" id='keysearch' autocomplete="off" />
                        <i class="fa-solid fa-magnifying-glass" id="glass"></i ><li>Pesquisar</li>
                    </ul>

                    <ul class="list-nav">
                        <i class="fa-solid fa-comment-dots"></i><li>Fale Conosco</li>
                    </ul>

                    <ul class="list-nav">
                        <?php 
                        if(isset($_SESSION['login'])){
                            echo '<a href="./cadastro/">
                            <i class="fa-solid fa-arrow-right-to-bracket" ></i><li>Minha Conta</li>
                            </a>';
                        }else{
                            echo '<a href="./cadastro/">
                            <i class="fa-solid fa-arrow-right-to-bracket" ></i><li>Cadastrar-se</li>
                            </a>';
                        }
                        
                        
                        ?>

                    </ul>

                    <ul>
                        <div class="bag-shipping">
                            <div class="num-cart">0</div>
                            <div>
                                <i class="fa-solid fa-bag-shopping"></i>
                            </div>

                        </div>
                    </ul>
                </nav><!-- Nav -->

            </div>
            
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

                <div class="cart-itens">
                   
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

                    <?php   
                        if(isset($_SESSION['cart'])){

                            $_SESSION['total'] = 0;
                            
                            foreach ($_SESSION['cart'] as $key => $value) {
                                echo "<div class='cart-item-individual'>
                                <div class='item-img-box'>
                                    <img src='".$value[4]."' alt='img_do_banco'>
                                </div>
                                <div class='cart-especificacoes'>
                                    <span class='cart-item-name'>".$value[1]."</span>
                                    <span class='cart-preco'>".$value[3]."</span>
        
                                    <div>
                                    <label for='quantidade'>Quantidade:</label>
                                    <input type='number' name='quantidade' id='' value='".$value[2]."' min='1'>
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
                            $preco = str_replace(",",".",$preco[2]);


                            $_SESSION['total'] = $_SESSION['total'] + floatval($preco); 

                            
                            }
                        }
                        if(count($_SESSION['cart']) == 0){
                            echo "<h2 style='color: #ef5350;font-size: 19px;'>- Carrinho Vazio -</h2>";
                        }else{
                            echo '<div class="total-div">
                            <span>Total do pedido (sem frete): </span>
                            <h3 class="total-price-cart">R$ '.number_format($_SESSION['total'],2,",",".").'</h3>
                        </div>';
                        }

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
                <div class="logo-mobile"><a href="home"><img src="images/Logo.png" alt=""></a></div>
                <!-- Logo -->

                <ul class="list-nav">
                   <a href="cadastro"><i class="fa-solid fa-arrow-right-to-bracket" ></i></a> <!--<li>Minha Conta</li> -->
                </ul>
                
            </div>

        </div>
    </header>