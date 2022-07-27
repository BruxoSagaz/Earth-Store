<!-- css -->   
<link rel="stylesheet" href="style/cad_item.css">
<link rel="stylesheet" href="style/gerenciar_adm.css">


<?php
include_once('../config.php');
include_once('../ajax/PDO.php');


$dadosAtendimento = normalDbQuery("SELECT * FROM `admin` WHERE 1",[]);

?>



<!-- MAIN -->

<!-- MODAIS -->
<div class="modal-bg" >


<div class="form-modal" id="form-modal-adm" style="display:none">
        <!-- <div class="modal-shadow"></div> -->
        <!-- close Button -->
        <div style="display: flex;justify-content: center;">
        <h2 style="margin-right: 10px;">detalhes do Administrador: </h2>
        <h2 style="text-align: center;" id="id-do-atendimento"></h2>
        </div>
        
        <div class="close-btn">x</div>

        <!-- FORM   -->
        <form action="" class="atend-form">

            <div class="container input-cont" style="height: auto;">
                <!-- Individual -->
                <div class="individual">
                <label for="nome" >Nome Completo:</label>
                <input type="text" name="nome" id="nome-edit">
                </div>
                <!-- Individual -->

                <!-- Individual -->
                <div class="individual">
                <label for="login" >Login:</label>
                <input type="text" name="login" id="login-edit">
                </div>
                <!-- Individual -->

                <!-- Individual -->
                <div class="individual">
                <label for="senha" >Senha:</label>
                <input type="text" name="senha" id="senha-edit">
                </div>
                <!-- Individual -->

                <!-- Individual -->
                <div class="individual">
                <label for="cpf" >CPF:</label>
                <input type="text" name="cpf" id="cpf-edit" style="width: 125px;" placeholder="000.000.000-00">

                <label for="nivel" >Nível:</label>
                <select name="nivel" id="nivel-edit">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                </select>


                </div>
                <!-- Individual -->

                <!-- Individual -->
                <div class="individual">
                <label for="nascimento" >Data de Nascimento:</label>
                <input type="text" name="nascimento" id="nascimento-edit" placeholder = "dd/mm/aaaa" style="width: 95px;">
                </div>
                <!-- Individual -->

                <!-- Individual -->
                <div class="individual">
                <label for="celular" >Celular:</label>
                <input type="text" name="celular" id="celular-edit" placeholder="(xx)xxxxx-xxxx" style="width: 125px;">
                </div>
                <!-- Individual -->

                <table class="adm">
                <!-- <thead>
                    <tr class="index">
                        <th class="ind-th">Id</th>
                        <th class="ind-th">Login</th>
                        <th class="ind-th">Nivel</th>
                        <th class="ind-th">celular</th>
                        <th class="ind-th">detalhes</th>
                    </tr>
                </thead> -->

                <tbody id="adm-values">
                    <tr class="indicators">
                        <td>Pedidos Finalidos</td>
                        <td>Pedidos Esperando</td>
                        <td>Atendimentos Realizados</td>
                        <td>Atendimentos Esperando</td>
                    </tr>
                    <tr id="resp-adm-val">
                        <td class="ped-fim">-</td>
                        <td class="ped-esp">-</td>
                        <td class="att-fim">-</td>
                        <td class="att-esp">-</td>
                    </tr>

                </tbody>
            </table>

                <div class="individual ">
                    <button class="edit-adm-button" valor="">Atualizar!</button>
                </div>
            </div>
        </form>
    </div> 


</div>
<!-- MODAIS -->



<div class="container">

    <div class="form-area">

    <div class="flex-center metallica" style="height:32px"><h2>Escolha A Atividade:</h2></div>

    <div class="container opts-show" >
    
        <div class="flex-center optadm-cont">
            <div class="opt-adm op1" valor="cad-display">Cadastrar Administrador</div>
            <div class="opt-adm op2" valor="adm-display">Gerenciar Administradores</div>
            <div class="opt-adm op3" valor="buy-display">Atividades Recentes</div>
        </div>
    
        <div class="cad-display hide">
            <div>
            <i class="fa-solid fa-arrow-left"></i>
            </div>
            
            <form action="" class="cad-adm-form">
                <fieldset>
                    <legend>Cadastrar Administrador</legend>
                    <div class="container input-cont">
                        
                        <!-- Individual -->
                        <div class="individual">
                        <label for="nome" >Nome Completo:</label>
                        <input type="text" name="nome" id="nome-cad">
                        </div>
                        <!-- Individual -->

                        <!-- Individual -->
                        <div class="individual">
                        <label for="login" >Login:</label>
                        <input type="text" name="login" id="login-cad">
                        </div>
                        <!-- Individual -->

                        <!-- Individual -->
                        <div class="individual">
                        <label for="senha" >Senha:</label>
                        <input type="text" name="senha" id="senha-cad">
                        </div>
                        <!-- Individual -->

                        <!-- Individual -->
                        <div class="individual">
                        <label for="cpf" >CPF:</label>
                        <input type="text" name="cpf" id="cpf-cad" style="width: 125px;" placeholder="000.000.000-00">

                        <label for="nivel" >Nível:</label>
                        <select name="nivel" id="nivel-cad">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>


                        </div>
                        <!-- Individual -->

                        <!-- Individual -->
                        <div class="individual">
                        <label for="nascimento" >Data de Nascimento:</label>
                        <input type="text" name="nascimento" id="nascimento-cad" placeholder = "dd/mm/aaaa" style="width: 95px;">
                        </div>
                        <!-- Individual -->

                        <!-- Individual -->
                        <div class="individual">
                        <label for="celular" >Celular:</label>
                        <input type="text" name="celular" id="celular-cad" placeholder="(xx)xxxxx-xxxx" style="width: 125px;">
                        </div>
                        <!-- Individual -->


                        <div class="individual">
                            <button>Cadastrar!</button>
                        </div>
                    </div>
                </fieldset>

            </form>
        </div>

        <div class="adm-display hide">
            <div class="navigators">
                <i class="fa-solid fa-arrow-left" style="margin-left:0;"></i>
                <i class="fa-solid fa-arrow-rotate-right" value="adm-display"></i>
            </div>

            
            <div class="lista-adm" id="adm-load-info">


            </div>
        </div>

        
        <div class="buy-display hide">
            <div class="navigators">
                <i class="fa-solid fa-arrow-left" style="margin-left:0;"></i>
                <i class="fa-solid fa-arrow-rotate-right" value="buy-display"></i>
            </div>

            
            <div class="lista-adm" id="buy-load-info">


            </div>
        </div>

    </div>


    </div>
   
</div>


<script src="../js/jquery-3.6.0.js"></script>
<script src="../js/jquery.mask.js"></script>
<script src="../js/verificacoes.js"></script>
<script src="js/gerenciar_adm.js"></script>


