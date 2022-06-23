    <!-- CSS -->
    <link rel="stylesheet" href="style/cad_item.css">
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

        <!-- MODAL INTERNO 3 -->
        <div class="modal_text_input" id="var_modal" style="display: none;" ative="0">
            
            <div class="flex-center">
                <h2>Divisão de Estoque Por Categoria</h2>
            </div>

            <div class="flex-center">
                <h2>Estoque:</h2>
                <h2 id="division-points"></h2>
            </div>
            <div class="flex-center">
                <div class="divisions-container">
                    <!-- <div class="select-divisions">
                         <span>G:</span>
                        <input type="number"> 
                    </div> -->
                </div>


                <div class="flex-center w100">
                <div class="alert_var_plus generic_alert"></div>
                </div>

                <h4 class="total_variacoes_display" style="display:block;"></h4>




                <div class="flex-center">
                <h3 class="alert_var" style="display:block;"><i class="fa-solid fa-circle-exclamation"></i> Caso a quantidade de variações não seja a mesma da quantidade de estoque, as variações serão salvas como "sem variacões"<i class="fa-solid fa-circle-exclamation"></i></h3>
                </div>
            </div>

            <button id="sair_var_clean">Sair</button>
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
        <input type="number" name="estoque" id="estoque_disp" maxlength="7">
        <button id="get-variations" style="width: 170px;"> Variação De Estoque </button>

        </div><!-- Grouper -->



        <div class="modal-grouper">
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


    <!-- Main -->
    <div class="container"> 
        <div class="form-area">
            <div class="flex-center"><h2>Consulta e Gerência</h2></div>

            <!-- Area total -->
            <div class="total-area">
    
                <!-- Area 1 Container Esquerdo-->
                <div class="cont-esquerdo">
                    <!-- Espaço -->
                    <div style="height: 5%;"></div>
                    <form action="" class="filter-config">
                    <div class="configurations">
                        <!-- Filtros -->
                        <div class="filters">

                            <div class="filter-case">
                                <h3>Ordem</h3><i class="fa-solid fa-angle-down"></i>
                            </div>

                            <div class="filter-options" id="filter-cases1">

                                <div class="space">
                                <div class="blocks">
                                    <input type="radio" name="ordem" id="ordem" value="cres" class="input-filter">
                                    <span>ID Crescente</span>
                                </div>
                                
                                
                                <div class="blocks">
                                    <input type="radio" name="ordem" value="dec" id="ordem" class="input-filter" checked>
                                    <span>ID Decrescente</span>
                                </div>
                                </div>

                                <div class="space">
                                <div class="blocks">
                                    <input type="radio" name="ordem" value="alfa" id="ordem" class="input-filter">
                                    <span>Alfabética (A-Z)</span>
                                </div>
                                </div>


                                <div class="space">
                                <div class="blocks">
                                    <input type="radio" name="ordem" value="maiorpreco" id="ordem" class="input-filter">
                                    <span>Maior Preço</span>
                                </div>

                                <div class="blocks">
                                    <input type="radio" name="ordem" value="menorpreco" id="ordem" class="input-filter">
                                    <span>Menor Preço</span>
                                </div>
                                </div>

                                <div class="space">
                                <div class="blocks">
                                    <input type="radio" name="ordem" value="maisvendidos" id="ordem" class="input-filter">
                                    <span>Mais Vendidos</span>
                                </div>

                                <div class="blocks">
                                    <input type="radio" name="ordem" value="menosvendidos" id="ordem" class="input-filter">
                                    <span>Menos Vendidos</span>
                                </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    </form>

                    <div style="height: 5%;"></div>
                </div>
        
                <!-- Area 2 -->
                <div class="cont-direito">

                    <div class="search-box ">

                        <ul>
                            <label for="are-prom">Em Promoção</label>
                            <input type="checkbox" name="are-prom" id="are-prom" value="on">
                        </ul>

                        <ul>
                            <label for="id-search">Pesquisar Em:</label>
                            <select name="id-search" id="id-search">
                                <option value="nome">nome</option>
                                <option value="categoria">categoria</option>
                                <option value="id">id</option>
                                <option value="preco">preço</option>   
                                <option value="valor_em_promocao">V. Promoção</option>   
                            </select>
                        </ul>

                        <ul>                      
                            <input type="text" placeholder="Pesquisa..." name="name" id='keysearch' autocomplete="off" />
                            <button style="height: 28px;" id="start-query-button">Pesquisar<i class="fa-solid fa-magnifying-glass" id="glass" style="margin: 0 6px;"></i ></button>
                            
                        </ul>

                    </div>


                    <!-- Lista de Items -->
                    <div class="case">
                    <table class="display-items ">

                        <thead>
                        <tr class="index">
                            <th style="padding: 0 135px;">Nome</th>
                            <th style="padding: 0 25px;">Categoria</th>
                            <th style="padding: 0 10px;">Preço</th>
                            <th style="padding: 0 10px;">Promoção</th>
                            <th style="padding: 0 15px;">Estoque</th>
                            <th style="padding: 0 15px;">Vendas</th>
                            <th style="padding: 0 25px;">ID</th>
                            <th style="padding: 0 25px;">Operações</th>
                        </tr>
                        </thead>

                        <tbody id="item-list-body">

                            <!-- Items teste -->

                            <!-- Fim Items Teste -->
                            
                        </tbody>    
                    </table>
                    </div>  <!-- Case -->  
                </div>
        
                </div><!-- Area total -->
            </div>
    </div>
    
    <script src="../js/jquery-3.6.0.js"></script>
    <script src="../js/functions.js"></script>
    <script src="../js/jquery.mask.js"></script>
    <script src="../js/validatons.js"></script>
    <script  src="js/edit_item.js"></script>
    <script  src="js/listing.js"></script>

    <script>

    </script>