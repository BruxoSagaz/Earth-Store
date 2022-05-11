<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta e Gerência</title>

    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="../images/favicon/">
    <link rel="apple-touch-icon" sizes="60x60" href="../images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../images/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon/favicon-16x16.png">
    <link rel="manifest" href="../images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#e30613">
    <meta name="msapplication-TileImage" content="images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#e30613">
    <!--Favicon-->

    <link rel="stylesheet" href="style/cad_item.css">
    <link rel="stylesheet" href="style/home.css">

    <script src="https://kit.fontawesome.com/91e791a30b.js" crossorigin="anonymous"></script>
</head>
<body style="height: 1000px;">
    

    <!-- Modal Bg -->
    <div class="modal-bg">
        <div class="form-modal">
            <div class="modal-shadow"></div>
            <!-- close Button -->
            <div class="close-btn">x</div>

            <!-- FORM   -->
            <form action="" id="form_edit_item">

            <!-- MODAL INTERNO 1-->
            <div class="modal_text_input" id="description_modal" style="display: none;" ative="0">
                
                <div class="flex-center">
                    <h2>Descrição Geral</h2>
                </div>

                <div class="flex-center">
                <textarea name="descricaoGeral" id="descricaoGeral" cols="30" rows="10" placeholder="Escreva Sua Descrição"></textarea>
                </div>

                <button class="exit_modal_input">Sair</button>
            </div>
            <!-- MODAL INTERNO 2 -->

            <div class="modal_text_input" id="spec_modal" style="display: none;" ative="0">
                
                <div class="flex-center">
                    <h2>Especficações</h2>
                </div>

                <div class="flex-center">
                <textarea name="especificacoes" id="especificacoes" cols="30" rows="10" placeholder="Escreva suas Especificações"></textarea>
                </div>

                <button class="exit_modal_input">Sair</button>
            </div>



            <!-- INICIO DO FORM -->
            <div class="modal-grouper"><!--  Grouper -->
                <label for="nome">Nome do Produto: </label>
                <input type="text" name="nome" id="nome">

                <label for="">Categoria: </label>
                <input list="categorias" name="categoria" class="list">
                <!-- Datalist    -->
                <datalist id="categorias">
                    <option value="Terços"></option>
                </datalist>
            </div><!-- Grouper -->

            <div class="modal-grouper"><!-- Grouper -->
            <label for="preco">Preço Base: </label>
            <input type="text" step="0.01"  min="0.01" class="valor" placeholder="0,00 R$" style="width: 100px; padding-left: 5px; margin-left: 5px;" id="base-price" name="basePrice">

            <label for="prom">aplicar promoção:</label>
            <input type="checkbox" name="prom_ver" id="aply_prom">

            <div class="input-area">
                <input type="text" step="0.01" name="prom_val" min="0.01" class="valor" placeholder="0,00 R$" style="width: 100px; padding-left: 5px;background: #b5b5b5;" id="prom_val" disabled>
                <label for="prom_val">(valor em promoção)</label>
            </div>
            </div><!-- Grouper -->

            <div class="modal-grouper"><!-- Grouper -->
            <label for="parcelas">Divisão de Parcelas</label>
            <select name="parcelas" id="par-div">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>

            <label for="estoque">Quantidade em estoque</label>
            <input type="number" name="estoque" id="" maxlength="7">

            </div><!-- Grouper -->
   

            <div class="modal-grouper"><!-- Grouper -->
            <label for="">Filtro: </label>
            <input list="filtro" name="filtro" class="list" id="filter">
            <!-- Datalist -->
            <datalist id="filtro">
                <option value="cor"></option>
            </datalist>

            <label for="">Valor: </label>
            <input list="valor" name="valor" class="list"  id="value">
            <!-- Datalist -->
            <datalist id="valor">
                <option value="preto"></option>
            </datalist>

            <button id="startTag"> OK </button>
            </div><!-- Grouper -->

        

            <div>

                <div class="input-area" style="width: 40%;">
                    <div class="tag-container">
                        
                    </div>
                </div>
    
            </div>

            <!-- Botoes modal -->
            <div style="margin: 10px 0;">
            <button id="description_button">Descrição</button>
            <button id="espec_button">Especificações</button>
            </div>

            <div>
            <label id="label-up" for="file_to_upload" style="margin: 12px 0;">Escolher Imagens </label>
            <div>
            <input type="file"  name="file_to_upload" id="file_to_upload" accept=".jpg, .png, .jpeg, .webp" multiple>
            <p id="file_name">arquivos: </p>
            <p id="progress_status"></p>
            </div>
            </div>

            <i>Barra de progresso: </i>
            <div> 
                <progress id="progress_bar" value="0" max="100" style="margin: 0;"></progress>
            </div>

            <input type="submit" class="salvar">Salvar</input>
            <button id="clear_imgs">Limpar Imagens</button>

            <!-- IMAGENS -->


            <ul class="slider">
                <div style="text-align: center;">
                    <span>imagens</span>
                </div>

                <div class="img-breaker">
                    <!-- <li>
                        <img src="../images/terco.jpg" alt="">
                    </li>

                    <li>
                        <img src="../images/terco.jpg" alt="">
                    </li> -->
                </div>
            </ul>

            <div id="responseAjax" style="display: none;"></div>

            </form> <!-- Form -->
            </div><!-- div form -->

        </div><!-- modal bg  -->



    </div>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="header">
                <div class="logo">
                    <h2 >Tela de Administração</h2>
                    <img src="../images/Icon_Ft.svg" alt="Logo-Fundacao" >
                </div>
                <div class="header-account">
                    <i class="bi bi-person"></i>
                    <?php echo "<span>".$_SESSION['usuario']."</span>";?>
                    
                </div>
            </div>
            <div class="modal-user"></div>
        </div>
    </header>
    <!-- Nav de configurações -->
    <nav class="config-nav">
        <div class="align-nav">
            <ul class="config-list">
                <li><a href=""><button>Cadastrar Item</button></a></li>
                <li><button style="background-color: #cccccc;font-weight: bolder;color: #757575;cursor: default;">Consultar Banco</button></li>
            </ul>
        </div>
    </nav>



    <!-- MAIN -->

    <?php
        if(isset($_POST['page'])){
            include("./pages/".$_POST['page']."php");
        }else{
            include("./pages/edit_item.php");
        }
    
    ?>
    <!--  -->

    <script  src="js/home.js"></script>
</body>
</html>