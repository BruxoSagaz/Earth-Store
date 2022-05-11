<?php
session_start();
define("PATH","https://localhost/Lojinha/");
define("PATH_GERENCY","https://localhost/Lojinha/gerency/");

// CONFIG BANCO DE DADOS
define("HOST",'localhost');
define("USER",'root');
define("PASSWORD",'');
define("DATABASE",'dblojinha');

$autoload = function($class){
    if($class == 'Email'){
        include('classes/phpmailer/src/PHPMailer.php');
    }
    include('classes/'.$class.'.php');
};

spl_autoload_register($autoload);

?>
