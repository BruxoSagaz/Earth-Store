<?php
session_start();
define("PATH","http://localhost/Lojinha/");
define("PATH_GERENCY","http://localhost/Lojinha/gerency/");

ini_set('display_errors','1');
header('Access-Control-Allow-Origin: *');

//tamanho do pacote e CEP de Origem

define("COMPRIMENTO","15");
define("ALTURA","1");
define("LARGURA","10");
define("CEP_DE_ORIGEM","56512590");

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
