
    <link rel="stylesheet" href="style/variacao.css">
<!-- Modal Bg -->
<div class="modal-bg">
<div class="form-modal">
    <div class="modal-shadow"></div>
    <!-- close Button -->
    <div class="close-btn">x</div>


    <!-- FORM   -->
    <form action="" id="form_edit_item">
        <div class="modal-grouper"><!--  Grouper -->

            <div class="allign-p">
            <label for="">Categoria: </label>
            <p list="categorias" name="categoria" id="categ-get"></p>
            </div>
        </div>

        <div class="modal-grouper" style="margin-top: 8%;"><!--  Grouper -->
            <label for="divisions" class="div-label">Divisões</label>
            <div class="divisions">
                <div class="square-input">
                    <i class="fa-solid fa-square-plus" numero="1"></i>
                </div>
            </div>
        </div>

        <input type="submit" class="salvar" style="right: 35px;left: auto;  bottom: 30px;" id="send-variations"></input>
    </form>
</div>
</div><!-- modal bg  -->




<div class="container">
    <div class="work-area">

    <div class="var-buttons">
    <button>Variação de Gênero</button>

    <button>Estoque Variado</button>
    </div>

    <div class="var-block">
        <!-- Area total -->
        <div class="total-area overflow">
            <!-- Area 1 Container Esquerdo-->
            <div class="cont-esquerdo  cont-esq-adjust">


            <form action="" class="filter-config fil-config-adjust">
            <div class="configurations flex-conf">
                <div style="height: 10%;"></div>
                <!-- Filtros -->
                <div class="filters">
                <div class="input-area">
                        <label for="">Categoria: </label>
                        <input list="categorias" name="categoria" class="list" id="categoria">
                        <!-- Datalist    -->
                        <datalist id="categorias">
                            <option value="Terços"></option>
                        </datalist>
                    </div>
                </div>

                <div class="input-area">
                <button id="start-gen-search"><i class="fa-solid fa-magnifying-glass" id="glass" style="margin: 0 6px;"></i >Pesquisar</button>
                </div>

            </div>
            </form>
            </div><!-- Area 1 Container Esquerdo-->


            <!-- Area 2 -->
            <div class="cont-direito cont-direito-adjust">

            <!-- Lista de Items -->
            <div class="case">
                    <table class="items-var">

                        <thead>
                        <tr class="index">
                            <th class="w33">Categoria</th>
                            <th class="w33">Divisões</th>
                            <th class="w33">Operações</th>
                        </tr>
                        </thead>

                        <tbody id="item-list-body">

                            <!-- Items teste -->

                            <!-- Fim Items Teste -->
                            
                        </tbody>    
                    </table>
                    </div> 

            </div>

        </div>
    </div>
</div>

<div class='container'>
    <div class="comment">
    <p>* Aqui definimos uma variação de estoque para cada gênero de item se necessário. e podemos manipular esse estoque livremente:
        <p class="line-comment">
        A variação de gênero é onde pode-se definir quais variantes são possíveis para determinado item;
        </p>
        <p class="line-comment">
        O estoque variado é onde definimos a quantidade de cada variação, a soma das variações não pode execer a quantidade de items;
        </p>
    </p>
    </div>


</div>

<script src="../js/jquery-3.6.0.js"></script>
<script  src="js/variacao.js"></script>
