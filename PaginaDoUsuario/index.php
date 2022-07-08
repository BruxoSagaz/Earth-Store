<?php 
include_once('../config.php')
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha Conta</title>
    <?php 

        include_once('../fav-icon.php');

    ?>
    <link rel="stylesheet" href="<?php echo PATH?>/style/style.css">
    <link rel="stylesheet" href="<?php echo PATH?>/style/user-area.css">
    <script src="https://kit.fontawesome.com/91e791a30b.js" crossorigin="anonymous"></script>
</head>
<body>


<?php 
include_once('../header.php');
?>


<section style="min-height: 66.5vh;display: flex;
    align-items: center;">
<?php


if(isset($_GET['url'])){

    if(is_file("./pages/".$_GET['url'].".php")){
       
        include("./pages/".$_GET['url'].".php");
    }else{
        include("config-user.php");
    }
    
    //include("config-user.php");
}else{
    include("config-user.php");
};



?>
</section>

<?php 
include_once('../footer.php');
?>

</body>
</html>