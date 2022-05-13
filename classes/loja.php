<?php


class Loja 
{
    public static function logado(){
        return isset($_SESSION['login']) ? true : false;
    }

    public static function loggout(){
        session_destroy();
        header("Location: ".PATH);
    }

    public static function loadPage(){
        if(isset($_GET['url'])){
            $url = explode('/',$_GET['url']);
            if(file_exists('pages/'.$url[0].'.php')){
                include('pages/'.$url[0].'.php');
            }else{
                include('pages/home.php');
            }
        }else{
            include('pages/home.php');
        }
    }
}





?>