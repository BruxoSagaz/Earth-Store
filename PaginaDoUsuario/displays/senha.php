
    <!-- SENHA -->
    <section class="config-display" page='senha'>

    <div class="user-data flex column center">
        <div class="user-icon"><i class="fa-regular fa-user"></i></div>

        <h2><?php echo $userData['nome'] ?></h2>
        <span><?php echo $userData['celular'] ?></span>
    </div>
    
    <form action="" id="user-pass-form">
    <div class="flex row center wrap space-top">

        <div class="enter">
            <label for="">Senha Atual:</label>
            <input type="password" name="senhaAtual" placeholder="Senha Atual" id="senhaAtual">
        </div>

        <div class="enter">
            <label for="">Nova Senha:</label>
            <input type="password" name="senhaNova" placeholder="Senha Nova" id="senhaNova"> <div class="password-area"><span style="display:none">Força da senha: </span><p class="seg-senha" id="segtotal"></p></div>
        </div>
        
        <input type="text" value="<?php echo  $userData['id'] ?>" style="display:none" name="id">
        
    </div>
    <div class="flex row center wrap space-top">
        <button style="width: 12%;">Mudar</button>
    </div>
    </form>
    </section>
    <!-- SENHA -->