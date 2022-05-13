<?php include('config.php') ?>

<?php
        if(@$_GET['page']=='filtros'){
            include("pages/filtros.php");
        }else if(@$_GET['page']=='individual'){
            include("pages/individual.php");
        }else{
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="images/favicon/">
    <link rel="apple-touch-icon" sizes="60x60" href="images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
    <link rel="manifest" href="images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#e30613">
    <meta name="msapplication-TileImage" content="images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#e30613">
    <!--Favicon-->


    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style2.css">

 

    <script src="https://kit.fontawesome.com/91e791a30b.js" crossorigin="anonymous"></script>

    <?php
        if(!isset($_GET['page'])){
            $_GET['page'] = 'home';
        }
    ?>
</head>
<body>

    <!-- Header -->
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
                        <a href="./cadastro/cadastro.php">
                            <i class="fa-solid fa-arrow-right-to-bracket" ></i><li>Minha Conta</li>
                        </a>
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
    </header><!-- Header -->



    <!-- Nav  general -->
    <nav class="primary-nav">
        <div class="container">
            <ul class="w100 nav-list">
                <li><button href="">Livros</button></li>
                <li><button href="">CDs</button></li>
                <li><a href="&page=filtros"><button>Terços</button></a></li>
                <li><button href="">Cruzes</button></li>
                <li><button href="">Colares</button></li>
                <li><button href="">Imagens em Resina</button></li>
                <li><button href="">Pulseiras</button></li>
                <li><button href="">Camisas</button></li>
                <li><button href="">adornos</button></li>
                <li><button href="">Chaveiros</button></li>
                <li><button href="">Cratões</button></li>
                <li><button href="">Pingentes</button></li>
                <li><button href="">Mais</button></li>
            </ul>
        </div>
    </nav> <!-- Nav  general -->


    <!-- MAIN  -->

    <?php 
    // if(isset($_GET['page'])){
    //     try{

    //         include("./pages/".$_GET['page'].".php");
            
    //     }catch (Exception $e){
    //         include("./pages/404.php");
    //     }
    // }

        Loja::loadPage();
    ?>
    <!-- MAIN -->



    <!-- Footer -->
    <section class="sec-footer">
        <div class="container">
            <footer class="F1">
            
                <div class="footer-single">
                    <h2>Institucional</h2>
                    <ul>
                        <li><a href=""> Empresa</a></li>
                        <li><a href=""> Segurança</a></li>
                        <li><a href=""> Envio</a></li>
                        <li><a href=""> Tempo de Garantia</a></li>
                        <li><a href=""> Contato</a></li>
                    </ul>
                </div>

                <div class="footer-single">
                    
                    <h2>Atendimento</h2>
                    <div class="box-footer">
                        <div class="phone">
                            <i class="fa-solid fa-phone"></i><p>(99)99999-9999</p>
                        </div>

                        <div class="phone">
                            <i class="fa-solid fa-phone"></i><p>(99)99999-9999</p>
                        </div>

                        <div class="phone">
                            <i class="fa-brands fa-whatsapp"></i>               <p class="line_bot" style="margin-left: -2px;padding-bottom: 10px;">(99)99999-9999</p>
                        </div>
                    </div>

                    <div class="box-footer autow">
                        <div class="phone">
                            <i class="fa-solid fa-envelope"></i><p style="display: inline-block; padding: 3px;">fundacaoterra@gmail.com</p>
                        </div>
                    </div>

                </div>

                <div class="footer-single">
                    <h2>Formas de pagamento</h2>

                    <div class="paiment">
                        <p style="padding-top: 60px;">ainda não implementado</p>
                    </div>
                </div>

                <div class="footer-single">
                    <h2 style="text-align: center;">Redes Sociais</h2>
                    <div class="icon-list">
                        <i class="fa-brands fa-facebook"></i>
                        <i class="fa-brands fa-twitter"></i>
                        <i class="fa-brands fa-instagram"></i>
                        <i class="fa-brands fa-youtube"></i>
                    </div>
                </div>

                <div class="footer-single">
                    <h2>Selos de Segurança</h2>

                    <div class="seal">

                    </div>

                    <div class="seal">

                    </div>

                </div>
        </div>
        </footer>

        <!-- footer 2 -->
        <footer class="F2">
            todos os direitos reservados
        </footer>

    </section><!-- Footer -->



    <!-- Script -->
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/functions.js"></script>
    

    <script>
        $(function () {

            //Header
            var iconSearch = $('#glass');
            var search = $('#keysearch');
 
            $('.mobile-header h3').click(function(){
                $('nav.mobile-header').slideToggle();
            })

            iconSearch.click(function(){

                if(search.val() == ""){
                    $('.form-field').toggle(500);
                }

            })

            // Abrir Popup do cart
            abrirJanela();
            function abrirJanela(){
                $('.bag-shipping').click(function(e){
                    e.stopPropagation();
                    $('.cart-sidebar').fadeToggle("slow");
                });

                $('body').click(function(){
                    $('.cart-sidebar').fadeOut("slow");
                });

            }
            //Escutar o evento de redimencionalização de tela
            window.addEventListener('resize', hideCartSideBar);

            function hideCartSideBar(){

                if($(window).width() < 768){
                    $('.cart-sidebar').replaceWith('<div class="cart-sidebar"></div>');
                }

            }
            
        })

    </script>
    <?php } ?>
</body>
</html>