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