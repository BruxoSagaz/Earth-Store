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

    <?php include("./php/gerar_item_home.php"); ?>
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


                        <!-- Preços -->
                        <div class="filter-case" onclick="slidingToggle(2)">
                            <h3>Preços</h3><i class="fa-solid fa-angle-down"></i>
                        </div>

                        <div class="filter-options-price" id="filter-cases2">

                            <div class="block">
                                <input type="radio" name="preco" value="5"><span> Até R$ 4,99</span>
                            </div>

                            <div class="block">
                                <input type="radio" name="preco" value="15"><span> Até R$ 14,99</span>
                            </div>

                            <div class="block">
                                <input type="radio" name="preco" value="25"><span> Até R$ 24,99</span>
                            </div>

                            <div class="block">
                                <input type="radio" name="preco" value="50"><span> Até R$ 49,99</span>
                            </div>

                            <div class="block">
                                <input type="radio" name="preco" value="100"><span>Até R$ 99,99</span>
                            </div>

                            <div class="block">
                                <input type="radio" name="preco" value="500"><span> Acima de R$ 500,00 </span>
                            </div>
                        </div>

                        <!-- marca -->
                        <div class="filter-case" onclick="slidingToggle(3)">
                            <h3>Marca</h3><i class="fa-solid fa-angle-down"></i>
                        </div>

                        <div class="filter-options" id="filter-cases3">
                            <div class="block">
                                <input type="checkbox"><span> Fundação Terra</span>
                            </div>
                        </div>


                        <!-- Cor -->
                        <div class="filter-case" onclick="slidingToggle(4)">
                            <h3>Cor</h3><i class="fa-solid fa-angle-down"></i>
                        </div>

                        <div class="filter-options" id="filter-cases4">

                            <div class="block">
                                <input type="checkbox"><span> Azul</span>
                            </div>

                            <div class="block">
                                <input type="checkbox"><span> Amarelo</span>
                            </div>

                            <div class="block">
                                <input type="checkbox"><span> Marrom</span>
                            </div>

                            <div class="block">
                                <input type="checkbox"><span> Preto</span>
                            </div>

                            <div class="block">
                                <input type="checkbox"><span> Colorido</span>
                            </div>

                        </div>

                        <!-- Material -->
                        <div class="filter-case" onclick="slidingToggle(5)">
                            <h3>Material</h3><i class="fa-solid fa-angle-down"></i>
                        </div>

                        <div class="filter-options" id="filter-cases5">

                            <div class="block">
                                <input type="checkbox"><span> Madeira</span>
                            </div>

                            <div class="block">
                                <input type="checkbox"><span> Acrílico</span>
                            </div>

                            <div class="block">
                                <input type="checkbox"><span> Pérola</span>
                            </div>

                            <div class="block">
                                <input type="checkbox"><span> Cristal</span>
                            </div>
                        </div>

                        <!-- Tema -->
                        <div class="filter-case" onclick="slidingToggle(6)">
                            <h3>Tema</h3><i class="fa-solid fa-angle-down"></i>
                        </div>

                        <div class="filter-options" id="filter-cases6">

                            <div class="block">
                                <input type="checkbox"><span> 1ª Comunhão</span>
                            </div>

                            <div class="block">
                                <input type="checkbox"><span> Divina Misericórdia</span>
                            </div>

                            <div class="block">
                                <input type="checkbox"><span> Infantil</span>
                            </div>

                        </div>

                    </div>




                    <!-- Result Items -->
                    <div class="result-items">

                        <div class="breadcrumbs">
                            <a href="#">Home</a><i class="fa-solid fa-chevron-right"></i><a href="#">Terços</a>
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

                            gerarMaisVendidos();

                            ?>

                        </div>
            
                </div>
            </div>
        </section>
    </main>



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


        <footer class="F2">
            todos os direitos reservados
        </footer>

    </section><!-- Footer -->

    
    <!-- Script -->
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/home.js"></script>
  
</body>
</html>