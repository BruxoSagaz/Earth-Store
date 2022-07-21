    <?php include_once('footer-constants.php');?>
    <!-- Footer -->
  
    <section class="sec-footer">
        <div class="container">
            <footer class="F1">
            
                <div class="footer-single">
                    <h2>Institucional</h2>
                    <ul>
                        <li><a href="<?php echo PATH?>empresa"> Sobre Nós</a></li>
                        <li><a href="<?php echo PATH?>seguranca"> Segurança</a></li>
                        <li><a href="<?php echo PATH?>envio"> Envio</a></li>
                        <li><a href="<?php echo PATH?>contato"> Contato</a></li>
                        <li><a href="https://www.fundacaoterra.org.br" target='blank'> Site da Instituição</a></li>
                   
                    </ul>
                </div>

                <div class="footer-single">
                    
                    <h2>Atendimento</h2>
                    <div class="box-footer">
                        <div class="phone">
                            <i class="fa-solid fa-phone"></i><p><?php echo PHONE?></p>
                        </div>

                        <!-- WHATSAPP -->
                        <div class="phone">
                            <a href="<?php echo $linkWhats ?>">
                            <i class="fa-brands fa-whatsapp "></i><p class="line_bot" style="margin-left: -2px;padding-bottom: 10px;"><?php echo WHATSAPP ?></p>
                            </a>
                        </div>

                    </div>

                    <div class="box-footer autow">
                        <div class="phone">
                            <i class="fa-solid fa-envelope"></i><p style="display: inline-block; padding: 3px;">
                        <?php echo EMAIL ?></p>
                        </div>
                    </div>

                </div>

                <div class="footer-single">
                    <h2>Formas de pagamento</h2>

                    <div class="payment">

                        <div class="payment-opt-div">
                            <span>Boleto</span>
                            <i class="fa-solid fa-barcode"></i>
                        </div>

                        <div class="payment-opt-div">
                            <span>Crédito</span>
                            <i class="fa-solid fa-credit-card"></i>
                        </div>
                    </div>

                </div>

                <div class="footer-single">
                    <h2 style="text-align: center;">Redes Sociais</h2>
                    <div class="icon-list">

                    <div>
                    <a href="https://www.facebook.com/FundacaoTerra/" target="blank"><i class="fa-brands fa-facebook"></i></a>

                    <a href="https://www.instagram.com/fundacaoterra/" target="blank"><i class="fa-brands fa-instagram"></i></a>
                    </div>

                    <div>
                    <a href="https://twitter.com/fundacaoterra"><i class="fa-brands fa-twitter" target="blank"></i></a>

                    <a href="https://www.youtube.com/channel/UCqGWLotw2C2k2MjrHQHIoDA" target="blank"><i class="fa-brands fa-youtube"></i></a>
                    </div>
                    
                    </div>
                </div>

                <!-- SELOS DE SEGURANÇA -->
                <?php 
                // if(isset($seal)){
                //     echo $seal;
                // }
                echo SEAL;
                ?>
        </div>
        </footer>

        <!-- footer 2 -->
        <footer class="F2">
            todos os direitos reservados
        </footer>

    </section><!-- Footer -->

    