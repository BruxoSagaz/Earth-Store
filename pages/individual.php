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
    <!-- <link rel="stylesheet" href="style/style_2.css"> -->
    <script src="https://kit.fontawesome.com/91e791a30b.js" crossorigin="anonymous"></script>

</head>
<body>

    <?php
        include_once('./php/get_item.php');
        
        // Get Item
        $item = getItemFromID($_GET['id']);
        $divisoes = pegarDivisoes($item);
        
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
                                    echo "<img src='uploads/".$separate[0]."' alt='img_principal'>
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
                                <span class="ref item-id">
                                <?php
                                echo $item['id'];
                                ?>
                                </span>
                            </div>

                            <div class="product-quantity">

                                <label for="">Quantidade:</label>

                                <div class="positioner">
                                    <input type="number" value="1" max="<?php echo $item['estoque'] ?>" min="1">
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
                                        <a href="#">saiba mais</a>
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
                                    <button type="submit">Calcular</button>
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


    




    </script>
</body>
</html>