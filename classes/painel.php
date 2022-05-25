<?php


class Painel 
{
    public static function logado(){
        return isset($_SESSION['login_admin']) ? true : false;
    }

    public static function loggout(){
        session_destroy();
        setcookie('lembrar','false',time()-10,'/');
        header("Location: ".PATH_GERENCY);
    }

    public static function loadPage(){
        if(isset($_GET['url'])){
            $url = explode('/',$_GET['url']);
            if(file_exists('pages/'.$url[0].'.php')){
                include('pages/'.$url[0].'.php');
            }else{
                header('Location: '.PATH_GERENCY);
            }
        }else{
            include('pages/home.php');
        }
    }
}





?>