

    <?php
        include_once('./php/get_item.php');
        

        // Get Item
        $item = getItemFromID($_GET['id']);
        
        if($item){
        
        $divisoes = pegarDivisoes($item);

        $variat = getVariations($item['categoria']);
        
    // Tratamento das divisoes

       
    ?>
 
    <!-- Content -->
    <main>


        <section class="details-section">
            <div class="container">
                <div class="details-box">

                    <div class="breadcrumbs">
                        <a href="index">Home</a><i class="fa-solid fa-chevron-right"></i>
                        <?php
                            echo "<a href='&page=filtros&filter=".$item['categoria']."'>".$item['categoria']."</a>"
                        ?>
                        
                    </div>

                    <div class="item-box">

                        <div class="images">

                            <div class="nav-images">
                                <!-- 
                                <div class="thumbnail">
                                    <img src="images/terco.jpg" alt="">
                                </div> -->
                                <!-- Thumbs -->
                                <?php
                                    $separate = explode(" ",$item['imagens']);
                                    // print_r($separate);
                                    foreach ($separate as $key => $value) {

                                        echo "                                <div class='thumbnail'>
                                        <img src='uploads/".$value."' alt='item_image'>
                                        </div> ";
                                    }
                                    
                                ?>

                            </div>

                            <div class="image-show">

                                <!-- Princiaal -->
                                <?php
                                    echo "<img src='uploads/".$separate[0]."' alt='img_principal' id='img-principal'>
                                    <img src='uploads/".$separate[0]."' alt='img_principal' class='img' style='display:none;'>
                                    ";
                                ?>
                                
                            </div>

                        </div>

                        <div class="details">

                            <div class="item-seal">
                                <p class="tag">
                                    <?php
                                        if($item['promocao'] != 0){
                                            echo "Em Promoção!";
                                        }
                                    ?>
                                </p>
                            </div>

                            <div class="space-details">

                            <!-- Nome do produto -->
                            <h1 class="product-name">
                               <?php
                                echo $item['nome'];
                               ?>
                            </h1>

                            <div class="line-info">
                                <span class="ref item-id" id="<?php echo $item['id'];?>">
                                <?php
                                echo $item['id'];
                                ?>
                                </span>
                            </div>

                            <div class="product-quantity">

                                <div class="quantity">
                                <label for="">Quantidade:</label>

                                <div class="positioner">
                                    <input type="number" value="1" max="<?php echo $item['estoque'] ?>" min="1">
                                </div>
                                </div>


                                <div class="variations-container">

                                    <?php
                                        $variat = explode(',',$variat);
                                        
                                        if(count($variat) > 1){
                                            // variacoes
                                            echo '
                                            <div class="variation-select">
                                            <span>Variacao do Protudo</span>
                                            <select name="variation" class="select-varia">';
                                    
                                                foreach ($variat as $key => $value) {
                                                    echo "<option value='$value'>$value</option>";
                                                }
                                                // <option value="vari-1">Vari 1</option>
                                            echo '</select>
                                            </div>';
                                            // variacoes
                                        }
                                    ?>

                                </div>
                                
                            </div>

                            <div class="price-and-buy">

                                <div class="price-ind-case">
                                    <div class="price">
                                        <!-- preco -->
                                        <p class="sans price-off">
                                            <?php 
                                            if($item['promocao'] != 0){
                                                echo "R$ ".number_format($item['valor_em_promocao'],2,",",".");
                                            }else{
                                                echo "R$ ".number_format($item['preco'],2,",",".");
                                            }


                                            ?>

                                        </p>
                                        <span>Ou até 
                                            <?php echo $item['parcelas']."x de R$ ".$divisoes;
                                            ?> 
                                        </span>
                                        <!-- <a href="#">saiba mais</a> -->
                                    </div>
                                </div>
                                
                                <div class="buy-action">
                                    <button class="button-add-cart">Adicionar ao Carrinho</button>  
                                </div>

                            </div>

                            <div class="cep-area">

                                <div class="cep-text">
                                    <i class="fa-solid fa-truck"></i>
                                    <span>INFORME SEU CEP</span>
                                </div>

                                <div class="submit-area">
                                    <input type="text" id="ceps" placeholder="00000-000" >
                                    <button type="submit" id="calcular-cep">Calcular</button>
                                </div>

                                <div id='loadingmessage' style='display:none'>
                                    <img src='./ajax/loading.gif'/>
                                </div>

                                <div class="alert-cep-area">
                                    <div class="alert-cep">
                                        Este Cep não é válido!
                                    </div>
                                </div>

                                
                                <div class="w100 hide-result">
                                <div class="result-cep">
                                    <table>
                                        <tr class="letter">
                                            <td>Serviço</td>
                                            <td>Preço</td>
                                            <td>Prazo</td>
                                        </tr>
                                        
                                        <!-- <tr id="retorno1">
                                            <td>SEDEX</td>
                                            <td>R$20,00</td>
                                            <td>5 dias</td>
                                        </tr> -->

                                    </table>
                                </div>
                                </div>


                            </div>
                            </div><!-- Space Details -->
                        </div>

                    </div>

                </div>
            </div>
        </section>

        <section class="description-section">

            <div class="container">
                <div class="lettering">
                    <div class="banner-l"><div><h2>Descrição Geral!</h2></div></div>
                </div>
            
                <div class="descript-general">
                    <!-- NOME -->
                    <?php 
                        echo "<h2>".$item['nome']."</h2>";

                        
                        // Descrição

                        echo "<p>".$item['descricao-geral']."</p>";
                    ?>
                    

                    
                    
                </div>

                <div class="lettering">
                    <div class="banner-l"><h2>Especificações!</h2></div>
                </div>

                <div class="especify">
                    <div>
                        <!-- Especificações -->
                        <?php 
                            echo "<h2>".$item['especificacoes']."</h2>";
                        ?>
                    </div>
                </div>

            </div>
        </section>

        <section class="indications">
            <div class="container">
                <div class="banner-p"></div>
                <h2>Outros Produtos!</h2>

                <div class="offers">
                    
                <?php
                    selectCateg($item['categoria']);
                ?>
                </div>
            </div>
        </section>

    </main>


    



    
    <?php
        }else{
            include_once('no-item.php');
        }
    ?>
</body>
</html>