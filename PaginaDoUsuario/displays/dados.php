
            <!-- Dados -->
            <section class="config-display" page='dados' style="display:none">

            <div class="user-data flex column center">
                <div class="user-icon"><i class="fa-regular fa-user"></i></div>

                <h2><?php echo $userData['nome'] ?></h2>
                <span><?php echo $userData['celular'] ?></span>
            </div>

            <form action="" id="user-data-form">
            <div class="flex row center wrap space-top">

                
                <div class="enter">
                <label for="nome">Nome Completo:</label>
                <input  type="text" name="nome" placeholder="Nome" 
                value = "<?php echo $userData['nome'] ?>">
                </div>

                <div class="enter">
                <label for="data" style="">Data de Nascimento:</label>
                <input  type="text" name="data"  id="data"
                 value = "<?php echo $userData['dataNascimento']?>">

                </div>

                <div class="enter">
                <label for="">CPF:</label>
                <input  type="tel" name="cpf" placeholder="CPF" id="cpf"
                value = "<?php echo @$userData['cpf'] ?>">
                </div>

                <div class="enter">
                <label for="">Celular:</label>
                <input  type="tel" name="cell" placeholder="(xx) xxxxx-xxxx " id="cell" value = "<?php echo $userData['celular'] ?>">
                </div>

                <div class="enter"> 
                <label for="">Email:</label>
                <input  type="email" name="email" placeholder="Email" value = "<?php echo $userData['email'] ?>">
                </div> 

                <input type="text" value="<?php echo  $userData['id'] ?>" style="display:none" name="id">
            </div>
            <div class="flex row center wrap space-top">
                <button style="width: 12%;">Mudar</button>
            </div>
            </form>
            </section>
            <!-- Dados -->