<?php


class Painel 
{
    public static function logado(){
        return isset($_SESSION['login']) ? true : false;
    }

    public static function loggout(){
        session_destroy();
        header("Location: ".PATH_GERENCY);
    }
}





?>