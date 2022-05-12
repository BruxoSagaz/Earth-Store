<?php

    define("PATH","https://localhost/Lojinha/");
    echo "<path value='<?php echo PATH ?>'></path>";

    if(isset($_GET['url'])){
        if(file_exists($_GET['url'].'.html')){
            include($_GET['url'].'.html');
        }else if(file_exists($_GET['url'].'.php')){
            include($_GET['url'].'.php');
        }else{
            include('404.html');
        }
    }else{
        include('home.html');
    }
    

    




?>