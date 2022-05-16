<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta e Gerência</title>

    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="../images/favicon/">
    <link rel="apple-touch-icon" sizes="60x60" href="../images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../images/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon/favicon-16x16.png">
    <link rel="manifest" href="../images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#e30613">
    <meta name="msapplication-TileImage" content="images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#e30613">
    <!--Favicon-->

    <link rel="stylesheet" href="style/cad_item.css">
    <link rel="stylesheet" href="style/home.css">
    <link rel="stylesheet" href="style/visitas.css">
    <script src="https://kit.fontawesome.com/91e791a30b.js" crossorigin="anonymous"></script>
</head>
<body style="height: 1000px;">
    
    <?php 
        if(!isset($_SESSION['usuario'])){
            header("Location: index.php");
        }
        if(isset($_GET['loggout'])){
            Painel::loggout();
        }
        if(!isset($_GET['page'])){
            $_GET['page'] = 'edit_item';
        }
    ?>

    <!-- Header -->
    <header>
        <div class="container" style="height:50px;position: absolute;
    width: 100%;">
            <div class="header">
                <div class="logo">
                    <h2 >Tela de Administração</h2>
                    <img src="../images/Icon_Ft.svg" alt="Logo-Fundacao" >
                </div>
                <div class="header-account">
                    <i class="bi bi-person"></i>
                    <?php echo "<span>".$_SESSION['nome']."</span>";?>
                    
                </div>
            </div>
            <div class="modal-user">
                <div class="modal-contents">
                    <h2>Seja bem vindo: <?php echo $_SESSION['nome'] ?></h2>

                </div>
                
                <div class="exit">
                    <a href="<?php echo PATH_GERENCY ?>&loggout">
                    <i class="fa-solid fa-right-from-bracket"></i>Sair
                    </a>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </header>
    <!-- Nav de configurações -->
    <nav class="config-nav">
        <div class="align-nav">
            <ul class="config-list">
                <!-- Botao cad item -->
                <li><a href="<?php echo PATH_GERENCY ?>&page=cad_item"><button <?php if($_GET['page']=='cad_item'){ echo 'style="background-color: #cccccc;font-weight: bolder;color: #757575;cursor: default;"';} ?>>Cadastrar Item</button></a></li>

                <!-- Botao edit item -->
                <li><a href="<?php echo PATH_GERENCY ?>&page=edit_item"><button <?php if($_GET['page']=='edit_item'){ echo 'style="background-color: #cccccc;font-weight: bolder;color: #757575;cursor: default;"';} ?>>Consultar Banco</button></a></li>

                <!-- Botao visitas -->
                <li><a href="<?php echo PATH_GERENCY ?>&page=visitas"><button <?php if($_GET['page']=='visitas'){ echo 'style="background-color: #cccccc;font-weight: bolder;color: #757575;cursor: default;"';} ?>>Visitas</button></a></li>
            
            </ul>
        </div>
    </nav>



    <!-- MAIN -->

    <?php

        if(isset($_GET['page'])){
            include("./pages/".$_GET['page'].".php");
        }
    
    ?>
    <!--  -->

    <script  src="js/home.js"></script>

</body>
</html>