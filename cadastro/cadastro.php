<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo PATH?>images/favicon/">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo PATH?>images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo PATH?>images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo PATH?>images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo PATH?>images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo PATH?>images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo PATH?>images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo PATH?>images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo PATH?>images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo PATH?>images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo PATH?>images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo PATH?>images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo PATH?>images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo PATH?>images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#e30613">
    <meta name="msapplication-TileImage" content="images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#e30613">
    <!--Favicon-->


    <link rel="stylesheet" href="<?php echo PATH?>style/log_screen.css">

    <script src="https://kit.fontawesome.com/91e791a30b.js" crossorigin="anonymous"></script>
</head>
<body>


<?php
    if(isset($_COOKIE['lembrar'])){
        $email = $_COOKIE['email'];
        $senha = $_COOKIE['senha'];
        $sql = Mysql::conectar()->prepare("SELECT * FROM `usuario` WHERE email = ? AND senha = ? ");
        $sql->execute(array($email,$senha));

        if($sql->rowCount() == 1){
            $info = $sql->fetch();
            //logamos
            $_SESSION['login'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['nome'] = $info['nome'];
           
            header('Location:'.PATH);
            die();
        }
    }
 ?>


        <section>
            <div class="screen"> <!--Screen-->

                <div class="form-div">

                    <div class="title">
                        <div class="w50 login" id="log"><h2>Entrar</h2></div>
                        <div class="w50 sign_area" id="cad"><h2>Cadastrar</h2></div>
                    </div>
                    


                    <!--Form1-->
                    <div class="form" id="elem" >
                    <?php
                if(isset($_POST['acao'])){
                    $email = $_POST['email_login'];
                    $senha = $_POST['senha_login'];
                    $sql = Mysql::conectar()->prepare("SELECT `cpf`,`nome`,`dataNascimento`,`celular`,`email` FROM `usuario` WHERE email = ? AND senha = ? ");
                    $sql->execute(array($email,$senha));

                    if($sql->rowCount() == 1){
                        $info = $sql->fetch();
                        //logamos
                        $_SESSION['login'] = true;
                        $_SESSION['email'] = $email;
                        $_SESSION['senha'] = $senha;
                        $_SESSION['dados'] = $info;
                        $_SESSION['nome'] = $info['nome'];

                        if(isset($_POST['lembrar_login'])){
                            setcookie('lembrar',true,time()+(60*60*24),'/');
                            setcookie('email',$email,time()+(60*60*24),'/');
                            setcookie('senha',$senha,time()+(60*60*24),'/');
                        }

                        header('Location:'.PATH);
                        die();
                    }else{
                        echo '<div class="error-box"><i class="fa-solid fa-circle-xmark"></i>Usuário ou senha incorretos!</div>';
                    }

                }
                ?>
                        <h1>Seja Bem Vindo!</h1>
                        
                        <form action="" method="post">

                            <div class="enter">
                                <label for="">Email:</label>
                                <input type="text" placeholder="Email" name="email_login">
                            </div>

                            <div class="enter">
                                <label for="">Senha:</label>
                                <input type="text" placeholder="Senha" name="senha_login">
                                <div>
                                    <input type="checkbox" name="lembrar_login" >
                                    <span>lembrar senha</span>
                                </div>
                            </div>


                            <div class="sub-button">
                                <button class="enter" type="submit" name="acao">Entrar</button>

                                <!-- <button class="sign-up" id="troc_cad">Cadastrar</button> -->
                            </div>
                            <div class="sub-button" style="margin-top: 18px;">
                            <a href="../index.php">
                            <button class="enter" type="button" name="nada">Convidado</button>
                            </a>
                            </div>
                        </form>
                        <div class="social-media">
                            <a href="https://www.facebook.com/FundacaoTerra/" target="blank"><i class="fa-brands fa-facebook"></i></a>

                            <a href="https://www.instagram.com/fundacaoterra/" target="blank"><i class="fa-brands fa-instagram"></i></a>

                            <a href="https://twitter.com/fundacaoterra"><i class="fa-brands fa-twitter" target="blank"></i></a>

                            <a href="https://www.youtube.com/channel/UCqGWLotw2C2k2MjrHQHIoDA" target="blank"><i class="fa-brands fa-youtube"></i></a>
                        </div>

                        <div class="forgot"><a href="">Esqueci Minha Senha</a></div>
                    </div><!--Form-->




                    <!--Form2-->
                    <div class="form2">

                        <span> Todos os campos são obrigatórios</span>

                        <form action="" method="GET" id="cadForm">

                            <div class="enter">

                                
                                <label for="">Nome Completo:</label>
                                <input  type="text" name="nome" placeholder="Nome" >
                                

                                
                                <label for="data" style="margin:8px 0">Data de Nascimento:</label>
                                <input  type="date" name="data"  id="data">
                                
                            </div>

                            <div class="enter">
                                <label for="">CPF:</label>
                                <input  type="tel" name="cpf" placeholder="CPF" id="cpf">
                            </div>

                            <div class="enter">
                                <label for="">Celular:</label>
                                <input  type="tel" name="cell" placeholder="(xx) xxxxx-xxxx " id="cell">
                            </div>

                            <div class="enter"> 
                                <label for="">Email:</label>
                                <input  type="email" name="email" placeholder="Email">
                            </div> 

                            <div class="enter">
                                <label for="">Senha:</label>
                                <input type="password" name="senha" placeholder="Senha" id="senha"> <div class="password-area"><span>Força da senha: </span><p class="seg-senha" id="segtotal"></p></div>
                            </div>

                            <div class="sub-button">
                                
                                <!-- <button class="enter" type="button" id="troc_log">Entrar</button> -->
                                
                                <button type="submit" class="sign-up" id="cadSubBtn">Cadastrar</button>
                            </div>

                        </form>

                        


                        
                        
                        <div class="social-media">
                            <a href="https://www.facebook.com/FundacaoTerra/" target="blank"><i class="fa-brands fa-facebook"></i></a>

                            <a href="https://www.instagram.com/fundacaoterra/" target="blank"><i class="fa-brands fa-instagram"></i></a>

                            <a href="https://twitter.com/fundacaoterra"><i class="fa-brands fa-twitter" target="blank"></i></a>

                            <a href="https://www.youtube.com/channel/UCqGWLotw2C2k2MjrHQHIoDA" target="blank"><i class="fa-brands fa-youtube"></i></a>
                        </div>

                    </div><!--Form2-->

                </div><!--Form-div -->
   
            </div><!--Screen-->

            <div class="space">

            </div>

        </section><!--Seciton-->




    
    <!-- Script -->
   <script src="<?php echo PATH?>js/jquery-3.6.0.js"></script>
   <script src="<?php echo PATH?>js/functions.js"></script>
   <script src="<?php echo PATH?>js/jquery.mask.js"></script>
   <script src="<?php echo PATH?>js/validatons.js"></script>

</body>
</html>