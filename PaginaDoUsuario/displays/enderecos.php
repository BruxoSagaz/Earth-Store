<!-- Enderecos -->
<section class="config-display" page='enderecos'>

<div class="user-data flex column center">
    <div class="user-icon"><i class="fa-regular fa-user"></i></div>

    <h2><?php echo $userData['nome'] ?></h2>
    <span><?php echo $userData['celular'] ?></span>
</div>

<?php
    $endereco = normalDbQuery("SELECT * FROM `enderecos` WHERE id='".$_SESSION['dados']['id']."'",[]);
    $endereco = $endereco[0];

    // print_r($endereco);
?>

<form action="" class="user-local-form local-form">
    <div class="flex row center wrap space-top">


        <div class="enter enter-first" style="">

            
            
            <label for="cep">CEP:</label>
            <input type="text" name="cep" id="ceps" placeholder="00000-000" style="width: 115px;margin-left: 12px;" value="<?php echo @$endereco['cep']?>">
            

            
            

       
         
         
        </div>
        <div class="enter">
        <a class="btn-link" id='oho' target="_blank" href="https://buscacepinter.correios.com.br/" style="text-decoration: underline; color:red;">
            Não sei meu CEP
        </a>
        <span>O CEP irá preencher os dados automaticamente</span>
        </div>

 
        <div class="enter">
        <label for="endereco">Endereço (Rua, Avenida, Quadra, Lote): </label>
        <input type="text" name="endereco" id="endereco" style="width: 300px;" value="<?php echo @$endereco['logradouro']?>">
        </div>
        

 
        <div class="enter">
        <label for="numero">Número: </label>
        <input type="text" name="numero" id="numero" style="width: 75px;" value="<?php echo @$endereco['numero']?>">
        </div>
        
        
        

        <div class="enter">
        <label for="complement">Complemento (Opcional): </label>
        <input type="text" name="complement" id="complement" style="width: 235px;" value="<?php echo @$endereco['complemento']?>">
        </div>

        


        

        <div class="enter">
        <label for="bairro">Bairro: </label>
        <input type="text" name="bairro" id="bairro" style="width: 218px;" value="<?php echo @$endereco['bairro']?>">
        </div>

        
        <div class="enter">
        <label for="estado">Estado: </label>

        <select name="estado" id="estado" >
            <option value="<?php echo  @$endereco['estado']?>"  selected="selected"><?php echo @$endereco['estado']?></option>
        </select>
        </div>

        
        

        <div class="enter">
        <label for="cidade">Cidade: </label>

        <select name="cidade" id="cidade" style="min-width: 125px;" >
            <option value="<?php echo @$endereco['cidade']?>"  selected="selected"><?php echo @$endereco['cidade']?></option>
        </select>
        </div>



        



    </div>

    <div class="flex row center wrap space-top">
        <button style="width: 12%;">Salvar</button>
    </div>
</form>
    
</section>
<!-- Enderecos -->