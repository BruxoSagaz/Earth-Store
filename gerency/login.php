<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?php echo PATH_GERENCY ?>style/login.css">
    <script src="https://kit.fontawesome.com/91e791a30b.js" crossorigin="anonymous"></script>
</head>
<body>

    <section>
        <h2 class="letter">Efetue o Login!</h2>
        <div class="form-area">
            <?php
                if(isset($_POST['acao'])){
                    $user = $_POST['usuario'];
                    $senha = $_POST['senha'];
                    $sql = Mysql::conectar()->prepare("SELECT * FROM `admin` WHERE login_admin = ? AND senha_admin = ? ");
                    $sql->execute(array($user,$senha));

                    if($sql->rowCount() == 1){
                        $info = $sql->fetch();
                        //logamos
                        $_SESSION['login'] = true;
                        $_SESSION['usuario'] = $user;
                        $_SESSION['senha'] = $senha;
                        $_SESSION['nome'] = $info['nome_admin'];
                        $_SESSION['cargo'] = $info['cargo_admin'];

                        header('Location:'.PATH_GERENCY);
                        die();
                    }else{
                        echo '<div class="error-box"><i class="fa-solid fa-circle-xmark"></i>Usuário ou senha incorretos!</div>';
                    }

                }
            ?>
            <form method="post">
                <input type="text" name="usuario" placeholder="Usuario..." required>
                <input type="password" name="senha" placeholder="Senha..." required>
                <input type="submit" name="acao" value="Logar!">
            </form>
        </div>
    </section>

</body>
</html>