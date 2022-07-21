<?php 
// Constantes Para Configs do Footer
// +55 81 8588-5859
define('PHONE', '(81) 2698-4016');
define('WHATSAPP', '+55 81 8588-5859');
define('SEALS_ON', 'FALSE');
define('EMAIL','fundacaoterra@gmail.com');




// Tratamentos
if(SEALS_ON == 'TRUE'){   
    $seal = "<div class='footer-single'>
    <h2>Selos de Segurança</h2>
    
    <div class='seal'>
    
    </div>
    
    <div class='seal'>
    
    </div>
    
    </div>";
    define('SEAL',$seal);
}else{
    define('SEAL','');
}

$phoneON = preg_replace("/\D/", "", PHONE);
$whatsappON = preg_replace("/\D/", "",WHATSAPP);

$linkWhats = "https://api.whatsapp.com/send?phone=".$whatsappON."&text=Preciso%20de%20Ajuda";

define('LINK_WHATS',$linkWhats);




?>