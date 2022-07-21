<?php



class Loja 
{
    public static function logado(){
        return isset($_SESSION['login']) ? true : false;
    }

    public static function loggout(){
        session_destroy();
        setcookie('lembrar','false',time()-10,'/');
        header("Location: ".PATH);
    }

    public static function loadPage(){
        if(isset($_GET['page'])){
            // $url = explode('/',$_GET['url']);
            if(file_exists('pages/'.$_GET['page'].'.php')){
                include('pages/'.$_GET['page'].'.php');
            }else{
                include('pages/home.php');
            }
        }else{
            include('pages/home.php');
        }
    }
}





?>