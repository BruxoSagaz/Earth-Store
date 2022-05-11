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
                                    <input type="radio" name="ordem" id="ordem" value="cres" checked>
                                    <span>ID Crescente</span>
                                </div>
                                
                                
                                <div class="blocks">
                                    <input type="radio" name="ordem" value="decres" id="ordem">
                                    <span>ID Decrescente</span>
                                </div>
                                </div>

                                <div class="space">
                                <div class="blocks">
                                    <input type="radio" name="ordem" value="alfa" id="ordem">
                                    <span>Alfabética (A-Z)</span>
                                </div>
                                </div>


                                <div class="space">
                                <div class="blocks">
                                    <input type="radio" name="ordem" value="maiorpreco" id="ordem">
                                    <span>Maior Preço</span>
                                </div>

                                <div class="blocks">
                                    <input type="radio" name="ordem" value="menorpreco" id="ordem">
                                    <span>Menor Preço</span>
                                </div>
                                </div>

                                <div class="space">
                                <div class="blocks">
                                    <input type="radio" name="ordem" value="maisvendidos" id="ordem">
                                    <span>Mais Vendidos</span>
                                </div>

                                <div class="blocks">
                                    <input type="radio" name="ordem" value="menosvendidos" id="ordem">
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
                            <input type="checkbox" name="are-prom" id="are-prom">
                        </ul>

                        <ul>
                            <label for="gender">genero:</label>
                            <input list="genders" name="gender" class="list">
                            <!-- Datalist    -->
                            <datalist id="genders">
                                <option value="todos"></option>
                            </datalist>
                        </ul>
                        <ul>
                            <label for="id-search">Pesquisar Em:</label>
                            <select name="id-search" id="id-search">
                                <option value="nome">nome</option>
                                <option value="categoria">categoria</option>
                                <option value="id">id</option>
                                <option value="preco">preço</option>   
                            </select>
                        </ul>

                        <ul>                      
                            <input type="text" placeholder="Pesquisa..." name="name" id='keysearch' autocomplete="off" />
                            <i class="fa-solid fa-magnifying-glass" id="glass"></i >
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