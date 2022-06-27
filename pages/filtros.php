<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filter</title>

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

</head>
<body>
    
    <!-- Header -->
    <?php
        include_once("./header.php");
    ?>
    <!-- Header -->

    <?php include("./php/filters.php");

    
    ?>
    <!-- Nav  general -->
    <nav class="primary-nav">
        <div class="container">
            <ul class="w100 nav-list">

            </ul>
        </div>
    </nav> <!-- Nav  general -->

    <!-- Filter-Contents -->
    <main>
        <section class="filter-contents">
            <div  class="container">
                <div class="filter-columns">
                    <!-- Filters -->
                    <div class="filters">

                        <form action="filtros?page='filtros'" method="get">

                        <!-- Preços -->
                        <div class="filter-case" onclick="slidingToggle(2)">
                            <h3>Preços</h3><i class="fa-solid fa-angle-down"></i>
                        </div>

                        <div class="filter-options-price" id="filter-cases2">

                            <div class="block">
                                <input type="radio" name="preco" value="< 15"><span> Até R$ 14,99</span>
                            </div>

                            <div class="block">
                                <input type="radio" name="preco" value="< 25"><span> Até R$ 24,99</span>
                            </div>

                            <div class="block">
                                <input type="radio" name="preco" value="< 50"><span> Até R$ 49,99</span>
                            </div>

                            <div class="block">
                                <input type="radio" name="preco" value="< 100"><span>Até R$ 99,99</span>
                            </div>

                            <div class="block">
                                <input type="radio" name="preco" value="> 500"><span> Acima de R$ 500,00 </span>
                            </div>
                        </div>



                        <!-- Cor -->
                        <div class="filter-case" onclick="slidingToggle(4)">
                            <h3>Cor</h3><i class="fa-solid fa-angle-down"></i>
                        </div>

                        <div class="filter-options" id="filter-cases4">

                            <!-- <div class="block">
                                <input type="checkbox" name="cor" value="preto"><span> Preto</span>
                            </div> -->

                            <?php
                            if(isset($_GET['filter'])){
                                gerarFiltros($_GET['filter'],'cor');
                            }else if(isset($_GET['nome'])){
                                gerarFiltros($_GET['nome'],'cor');
                            }
                            ?>

                        </div>

                        <!-- Material -->
                        <div class="filter-case" onclick="slidingToggle(5)">
                            <h3>Material</h3><i class="fa-solid fa-angle-down"></i>
                        </div>

                        <div class="filter-options" id="filter-cases5">
                            <!-- 
                            <div class="block">
                                <input type="checkbox"><span> Madeira</span>
                            </div> -->

                            
                            <?php
                            if(isset($_GET['filter'])){
                                gerarFiltros($_GET['filter'],'material');
                            }else if(isset($_GET['nome'])){
                                gerarFiltros($_GET['nome'],'material');
                            }
                            ?>
                        </div>

                        <!-- Tema -->
                        <div class="filter-case" onclick="slidingToggle(6)">
                            <h3>Tema</h3><i class="fa-solid fa-angle-down"></i>
                        </div>

                        <div class="filter-options" id="filter-cases6">

                            <!-- <div class="block">
                                <input type="checkbox"><span> 1ª Comunhão</span>
                            </div> -->

                            <?php
                            if(isset($_GET['filter']    )){
                                gerarFiltros($_GET['filter'],'tema');
                            }else if(isset($_GET['nome'])){
                                gerarFiltros($_GET['nome'],'tema');
                            }
                            ?>

                        </div>
                        <div class="filter-case">
                        <button class="filter-submit" type="submit">Filtrar!</button>
                        </div>
                        <input type="radio" name="subfilter" value="on" checked style="display:none;">
                        <input type="radio" name="page" value="filtros" checked style="display:none;">
                        <?php 
                        if(isset($_GET['nome'])){
                            echo ' <input type="radio" name="nome" value="'.$_GET['nome'].'" checked style="display:none;">';
                        }

                        if(isset($_GET['filter'])){
                            echo ' <input type="radio" name="filter" value="'.$_GET['filter'].'" checked style="display:none;">';
                        }
                        
                        ?>

                        </form>
                    </div>




                    <!-- Result Items -->
                    <div class="result-items">

                        <div class="breadcrumbs">
                            <a href="index">Home</a><i class="fa-solid fa-chevron-right"></i><a href="#"><?php 
                            if(isset($_GET['filter'])){
                                echo ucfirst($_GET['filter']);
               
                            }else if(isset($_GET['nome'])){
                                echo ucfirst($_GET['nome']);
                            }
                            
                            ?></a>
                        </div>


                        <div class="offers">
                    
                            <!-- Item na promoção
                            <div class="item promotion">
                                
                                <div class="product">
                                    <div class="product-allign">
                                        <div class="product-image">
                                            <a href="individual">
                                                <div class="discount">48%</div>
                                                <div class="prom-value"></div>
                                                <img src="images/terco.jpg" alt="Terço">
                                            </a>
                                        </div>
                                    
                                        <div class="product-name">
                                            Terço Exemplo
                                        </div>
                                    </div>
                                
                                    <div class="under-area">
                                        <div class="price-cart-allign">
                                            <div class="price-box">
                                                <div class="price-item">
                                                    <div class="price-before">R$ 30,00</div>
                                                    <div class="price-off"> R$ 25,00</div>
                                                    
                                                </div>
        
                                                <div  class="divisions">
                                                    <span>Ou 2x de R$ 13,00  </span>
                                                    <span>+ Frete</span>
                                                </div>
        
                                            </div>
        
                                            <div class="add-to-cart">
                                                <input type="number" value="1">
                                                <button>Adicionar ao Carrinho</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            -->
 
                            <?php

                            // gerarMaisVendidos();
                            if(!isset($_GET['subfilter'])){
                                if(isset($_GET['filter']  )){
                                    selectCateg();
                                }else if(isset($_GET['nome'])){
                                    selectNome();
                                }else{
                                    gerarAleatorio();
                                }
                            }else{
                                $info = [];

                                if(isset($_GET['filter'])){
                                    $info['categoria'] =  $_GET['filter'];
                                }

                                if(isset($_GET['nome'])){
                                    $info['nome'] = $_GET['nome'];
                                }

                                if(isset($_GET['preco'])){
                                    $info['preco'] = $_GET['preco'];
                                }

                                if(isset($_GET['cor'])){
                                    $info['cor'] = $_GET['cor'];
                                }

                                if(isset($_GET['material'])){
                                    $info['material'] = $_GET['material'];
                                }

                                if(isset($_GET['tema'])){
                                    $info['tema'] = $_GET['tema'];
                                }

                               

                                pegarSubfiltros($info);
                            }

                           
                            ?>

                        </div>
                            
                </div>
            </div>
        </section>
    </main>

    <?php
        include_once("./footer.php")
    ?>


    
    <!-- Script -->
    <script src="<?php echo PATH?>js/config.js"></script>
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/home.js"></script>
    <script src="<?php echo PATH?>js/header.js"></script>
  
</body>
</html>