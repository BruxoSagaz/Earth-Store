<?php
session_start();
define("PATH","http://localhost/Lojinha/");
define("PATH_GERENCY","http://localhost/Lojinha/gerency/");

ini_set('display_errors','1');
header('Access-Control-Allow-Origin: *');

//PAGSEGURO

define("PAGEMAIL", "umpoucodetudogr@gmail.com");
define("PAGTOKEN", "0DFF9092B2FA4B4F9557C353EB3A0E2B");
define("NOME_EMPRESA","Fundação Terra");
define("SENDER_EMAIL","berserker18th@gmail.com");
define("SENDER_CPF", '14176547405');
define("SENDER_AREA_CODE", '87');
define("SENDER_PHONE", "991358619");

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
