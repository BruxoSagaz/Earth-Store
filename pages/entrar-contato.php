<link rel="stylesheet" href="style/entrar-contato.css">

<section>
    <!-- CONTAINER -->
<div class="container">

<form action="" class="form-contact">
<fieldset class="outdooor-div">

    <legend>Criar Ticket de Contato</legend>

    <div class="itens-cont">
    
    <div class="individual">
    <label for="nome" class="left">Nome:</label>
    <input type="text" name="nome" id="nome" class="right">
    </div>

    <div class="individual">
    <label for="assunto" class="left">Assunto:</label>
    <input type="text"  name="assunto" id="assunto" class="right" maxlength="245">
    </div>


    <div class="individual">
    <label for="email" class="left">Email:</label>
    <input type="email" name="email" id="email" class="right" required>
    </div>

    <div class="individual">
    <label for="celular" class="left">Celular:</label>
    <input type="text" name="celular" id="celular" class="right">
    </div>

    <div class="individual" style="margin-bottom: 40px;">
    <label for="texto" class="left">Detalhe o problema:</label>
    <div class="right">
    <textarea name="relato" id="texto" cols="30" rows="10" spellcheck="true" maxlength="2000"></textarea>
    <span id="range-carac">0</span>
    <span>/2000</span>
    </div>
    </div>


    </div>
    <div class="clean"></div>
    <div class="input-area w100">
    <button>Enviar!</button>
    </div>
    

</fieldset>
</form>


</div>
<!-- CONTAINER -->
</section>

