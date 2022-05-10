<?php
session_start();
define("PATH","https://localhost/Lojinha/");

$autoload = function($class){
    if($class == 'Email'){
        include('classes/phpmailer/src/PHPMailer.php');
    }
    include('classes/'.$class.'.php');
};

spl_autoload_register($autoload);

?>
