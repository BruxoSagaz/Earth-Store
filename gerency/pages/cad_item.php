        <!-- CSS -->
    <link rel="stylesheet" href="style/cad_item.css">
    <!-- Main -->
    <main>
        <div class="container">
            <!-- Div de form -->
            <div class="form-area">
                <div class="flex-center"><h2>Cadastro de Item</h2></div>


                <form action="#"  enctype="multipart/form-data" id="form_cad_item">
                    <div class="flex-center">
                    <div class="input-area">
                        <label for="nome">Nome do Produto: </label>
                        <input type="text" name="nome" id="nome">
                    </div>

                    <div class="input-area">
                        <label for="">Categoria: </label>
                        <input list="categorias" name="categoria" class="list" id="categoria">
                        <!-- Datalist    -->
                        <datalist id="categorias">
                            <option value="Terços"></option>
                        </datalist>
                    </div>

                    <div class="input-area">
                        <label for="preco">Preço Base: </label>
                        <input type="text" step="0.01" name="basePrice" min="0.01" class="valor" placeholder="0,00 R$" style="width: 100px; padding-left: 5px; margin-left: 5px;" id="base-price">
                    </div>

                    
                    <div class="input-area">
                        <label for="prom">aplicar promoção:</label>
                        <input type="checkbox" name="prom_ver" id="aply_prom">
                    
                        <input type="text" step="0.01" name="prom_val" min="0.01" class="valor" placeholder="0,00 R$" style="width: 100px; padding-left: 5px;background: #b5b5b5;" id="prom_val" disabled>
                        <label for="prom_val">(valor em promoção)</label>
                    </div>

                    </div>

                    <div class="flex-center">

                        <div class="input-area">
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
                        </div>

                        <div class="input-area">
                            <label for="quantity">Quantidade em estoque</label>
                            <input type="number" name="estoque" id="" min="0">
                        </div>

                        <div class="input-area inp-filters">

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

                        </div>


                    </div>

                    <div class="flex-center">

                        <div class="input-area">
                            <label for="peso">Peso (Kg): </label>
                            <input type="text" step="0.01" name="peso" min="0.01" class="dimensao" placeholder="0,00" style="width: 100px; padding-left: 5px; margin-left: 5px;" id="peso">
                        </div>

                        
                        <!-- <div class="input-area">
                            <label for="comprimento">comprimento (Cm): </label>
                            <input type="text" step="0.01" name="comprimento" min="0.01" class="dimensao" placeholder="0,00" style="width: 100px; padding-left: 5px; margin-left: 5px;" id="comprimento">
                        </div>

                        <div class="input-area">
                            <label for="altura">altura (Cm): </label>
                            <input type="text" step="0.01" name="altura" min="0.01" class="dimensao" placeholder="0,00" style="width: 100px; padding-left: 5px; margin-left: 5px;" id="altura">
                        </div>

                        <div class="input-area">
                            <label for="largura">largura (Cm): </label>
                            <input type="text" step="0.01" name="largura" min="0.01" class="dimensao" placeholder="0,00" style="width: 100px; padding-left: 5px; margin-left: 5px;" id="largura">
                        </div> -->

                    </div>


                    <div class="flex-center">

                        <div class="input-area tagcont" style="">
                            <div class="tag-container">
                                
                            </div>
                        </div>

                    </div>

                    

                    <div class="flex-center">
                        <label id="label-up" for="file_to_upload">Escolher Imagens </label>
                        <input type="file"  name="file_to_upload" id="file_to_upload" accept=".jpg, .png, .jpeg, .webp" multiple>
                        <p id="file_name">arquivos: </p>
                        <p id="progress_status"></p>
                    </div>

                    <div class="flex-center">
                        <span>Barra de progresso: </span>
                        <progress id="progress_bar" value="0" max="100"></progress>
                    </div>


                    <div id="img-label"><label for="images-show">Item Final:</label></div>
                    
                    <!-- Display item -->
                    <div class="flex-center">
                        <div class="offers">
                            <div class="images-show">
                                <div class="item promotion">
                                    <div class="product">
                                        <div class="product-align">
                                            <div class="product-image">
                                                
                                                <!-- Discount -->
                                                <div class="discount hide" ></div>
                                                <div class="prom-value"></div>

                                                <div class="img-field">
                                                <!-- Image -->
                                                <img src="../images/example.png" alt="Terço" id="img">
                                                <img src="../images/example_2.png" alt="Terço" id="sec_img">
                                                </div>
                                            </div>
                                            <!-- Product Name -->
                                            <div class="product-name">
                                                Nome Exemplo
                                            </div>
                                        </div>
                                    
                                        <div class="under-area">
                                            <div class="price-cart-align">
                                                <div class="price-box">
                                                    <div class="price-item">
                                                        <!-- Price Before -->
                                                        <div class="price-before hide">R$ 11,11</div>
                                                        <div class="price-off"> R$ 00,00</div>
                                                        
                                                    </div>
                                                    
                                                    <!-- Divisions -->
                                                    <div  class="divisions">
                                                        <span id="divisions-par">Ou até </span>
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
                            </div>
                        </div>
                    </div><!-- Display item -->


                    <div class="flex-center w100">
                        <label for="descricaoGeral">Descrição Geral: </label>
                        <textarea name="descricaoGeral" id="descricaoGeral" cols="30" rows="10"></textarea>
                    </div>

                    <div class="flex-center w100">
                        <label for="especificacoes">Especficações: </label>
                        <textarea name="especificacoes" id="especificacoes" cols="30" rows="10" style=""></textarea>
                    </div>

                    <input type="submit" value="Mandar para o Servidor" id="upload_file_button">

                    <input id="responseAjax" style="display: none;" type="text"></input>
                </form> <!-- form -->

            </div>
        </div>
    </main>


    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/functions.js"></script>
    <script src="../js/jquery.mask.js"></script>
    <!-- <script src="../js/validatons.js"></script> -->
    <script  src="js/cad_item.js"></script>

    <script>

    </script>
