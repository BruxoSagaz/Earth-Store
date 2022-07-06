<?php 
include_once('../config.php')
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Pedido</title>
    <?php 

        include_once('../fav-icon.php');

    ?>
    <link rel="stylesheet" href="<?php echo PATH?>/style/style.css">
    <link rel="stylesheet" href="<?php echo PATH?>/style/fim-pedido.css">
    <script src="https://kit.fontawesome.com/91e791a30b.js" crossorigin="anonymous"></script>
</head>
<body>

<?php 
include_once('../header.php');
?>

<section style="min-height: 66.5vh;">
<?php


if(isset($_GET['url'])){

    if(is_file("./pages/".$_GET['url'].".php")){
       
        include("./pages/".$_GET['url'].".php");
    }else{
        include("finalizar-pedido.php");
    }
    
    //include("finalizar-pedido.php");
}else{
    include("finalizar-pedido.php");
};



?>
</section>

<?php 
include_once('../footer.php');
?>

</body>
</html>




