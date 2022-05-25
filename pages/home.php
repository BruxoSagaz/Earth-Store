<?php include("./php/gerar_item_home.php"); ?>
    <!-- Banner CTA -->
    <section class="banner">
        <img src="images/Banneriluminar.png" alt="Campanha Iluminar">
    </section>

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
            <div class="container">

                <div class="banner-p"></div>
                <h2>Promoções do Momento!</h2>
                
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
                    
                    <?php
                        gerarAleatorio();
                    ?>
            
                </div>
            </div>
        </section>
    </main>

    <!-- Banner CTA -->
    <section class="banner">
        <img src="images/banner_2.jpg" alt="Campanha Iluminar">
    </section>

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

                    <?php

                        gerarMaisVendidos();

                    ?>
                </div>

            </div>
        </section>
    </main>


    <script src="./js/jquery-3.6.0.min.js"></script>
    <script>

    </script>