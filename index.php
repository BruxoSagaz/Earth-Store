<?php 
include('config.php');
include("./ajax/PDO.php");
?>

<?php
        if(isset($_GET['loggout'])){
            Loja::loggout();
        }
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
    <link rel="stylesheet" href="style/style_2.css">

 

    <script src="https://kit.fontawesome.com/91e791a30b.js" crossorigin="anonymous"></script>

    <?php
        if(!isset($_GET['page'])){
            $_GET['page'] = 'home';
        }
    ?>
</head>
<body>

    <!-- Header -->
        <?php
            include_once("header.php");
        ?>
    <!-- Header -->



    <!-- Nav  general -->
    <nav class="primary-nav">
        <div class="container">
            <ul class="w100 nav-list">



                <!-- 
                <li><a href="&page=filtros&filter=terços"><button>Terços</button></a></li> -->

 


            </ul>
        </div>
    </nav> <!-- Nav  general -->


    <!-- MAIN  -->

    <?php 
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
    <script src="js/home.js"></script>


    <?php } ?>
</body>
</html>