<?php 
include("./php/gerar_item_home.php");
include_once('./banners.php'); 
?>

    <!-- Banner CTA -->
    <?php
        banner_1();
    ?>

    <!-- Desk -->
    <section class="desk">
        <div class="container">
            <div class="desk-box">

                <div class="align">
                    <div class="alert-icon"><i class="fa-solid fa-truck-fast"></i><span>Frete para todo Brasil</span></div>
                </div>

                <div class="align">
                    <div class="alert-icon"><i class="fa-solid fa-credit-card"></i><span>Divisão de até  12x</span></div>
                </div>

                <div class="align">
                    <div class="alert-icon"><i class="fa-solid fa-comments"></i>
                        <div class="p-balance"><p class="text-desk" >Atendimento</p><p class="text-desk zapzap">Whatsapp</p></div>
                    </div>
                </div>

                <div class="align">
                    <div class="alert-icon"><i class="fa-solid fa-shield"></i><span >Site Seguro</span></div>
                </div>

            </div>
        </div>
    </section>

    <!-- Main Content -->
    <!-- Promotions -->
    <main>
        <!-- Promotions -->
        <section class="promo-section">
            <div class="container" id="metric">

                <div class="banner-p"></div>
                <h2>Veja Nosso Estoque!</h2>
                
                <div class="offers">
                    
                    <!-- Item na promoção -->
                    <!-- <div class="item promotion">
                        <div class="product">
                            <div class="product-allign">
                                <div class="product-image">
                                    <a href="individual">
                                        <div class="discount">48%</div>
                                        <div class="prom-value"></div>
                                        <div class="img-field">
                                            <img src="images/terco2.jpg" alt="Terço" class="img">
                                            <img src="images/terco.jpg" alt="Terço" class="sec_img">
                                        </div>
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
                    </div> -->
                    <div class="c-carousel car-a">
                        <div class="slides js-slides">
                            <?php
                                gerarAleatorio();
                                gerarAleatorio();
                                gerarAleatorio();
                                gerarAleatorio();
                                gerarAleatorio();
                            ?>
                        </div>

                        <div style="width:100%;position:absolute" class="b-allign">
                        <button class="pag prev car-a-prev" ><i class="fa-solid fa-angle-left"></i></button>
                        <button class="pag next car-a-next" ><i class="fa-solid fa-angle-right"></i></button>
                        </div>

                        <!-- <div class="car-a-dots"></div> -->
                    </div>
                       
                </div>
            </div>
        </section>
    </main>

    <!-- Banner CTA -->
    <?php
        banner_2();
    ?>
    <!-- Main Content -->
    <!-- Best Sellers -->
    <main>
        <!-- Promotions -->
        <section class="promo-section">
            <div class="container">

                <div class="banner-p"></div>
                <h2>Mais Comprados!</h2>
                

                <div class="offers">
                    
                    <!-- Item normal
                    <div class="item">
                        
                        <div class="product">
                            <div class="product-allign">
                                <div class="product-image">
                                    <a href="individual">
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
                                        <div class="price-off"> R$ 25,00</div>
                                        
                                        
                                    </div>

                                    <div  class="divisions">
                                        <span>Ou 2x de R$ 13,00</span>
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
                    </div> -->

                    <div class="c-carousel car-b">
                        <div class="slides js-slides">
                            <?php
                                gerarMaisVendidos();
                                gerarMaisVendidos();
                                gerarMaisVendidos();
                                gerarMaisVendidos();
                                gerarMaisVendidos();
                            ?>
                        </div>

                        <div style="width:100%;position:absolute" class="b-allign">
                        <button class="pag prev car-b-prev" ><i class="fa-solid fa-angle-left"></i></button>
                        <button class="pag next car-b-next" ><i class="fa-solid fa-angle-right"></i></button>
                        </div>

                        <!-- <div class="car-a-dots"></div> -->
                    </div>

                </div>

            </div>
        </section>
    </main>


    <!-- <script src="./js/jquery-3.6.0.min.js"></script> -->
    <script>

    </script>