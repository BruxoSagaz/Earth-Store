<?php 
include('config.php');
include("./ajax/PDO.php");
?>

<?php
        if(isset($_GET['loggout'])){
            Loja::loggout();
        }
        if(@$_GET['page']=='filtros'){
            include("pages/filtros.php");
        }else if(@$_GET['page']=='individual'){
            include("pages/individual.php");
        }else{
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!--Favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="images/favicon/">
    <link rel="apple-touch-icon" sizes="60x60" href="images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">
    <link rel="manifest" href="images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#e30613">
    <meta name="msapplication-TileImage" content="images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#e30613">
    <!--Favicon-->


    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/style_2.css">

 

    <script src="https://kit.fontawesome.com/91e791a30b.js" crossorigin="anonymous"></script>

    <?php
        if(!isset($_GET['page'])){
            $_GET['page'] = 'home';
        }
    ?>
</head>
<body>

    <!-- Header -->
        <?php
            include_once("header.php");
        ?>
    <!-- Header -->



    <!-- Nav  general -->
    <nav class="primary-nav">
        <div class="container">
            <ul class="w100 nav-list">



                <!-- 
                <li><a href="&page=filtros&filter=terços"><button>Terços</button></a></li> -->

 


            </ul>
        </div>
    </nav> <!-- Nav  general -->


    <!-- MAIN  -->

    <?php 
        Loja::loadPage();
    ?>
    <!-- MAIN -->


    <?php
        include_once("footer.php")
    ?>



    <!-- Script -->
    <script src="js/jquery-3.6.0.js"></script>
    <script src="js/functions.js"></script>
    <script src="js/home.js"></script>


    <?php } ?>
</body>
</html>