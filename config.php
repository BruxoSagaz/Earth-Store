<?php



$autoload = function($class){
    if($class == 'Email'){
        include('classes/phpmailer/src/PHPMailer.php');
    }
    include('classes/'.$class.'php');
};

spl_autoload_register($autoload);

?>

<!-- CREATE TABLE IF NOT EXISTS `mydb`.`produto` (
  `idproduto` INT NOT NULL AUTO_INCREMENT,
  `nome_produto` VARCHAR(100) NULL,
  `categoria_produto` VARCHAR(45) NULL,
  `preco_produto` FLOAT(30) NULL,
  `promocao_produto` BIT(1) NOT NULL,
  `valor_em_promocao` FLOAT(30) NULL,
  `parcelas_produto` INT(2) NULL,
  `estoque_produto` INT(64) NULL,
  `filtros_produto` VARCHAR(128) NULL,
  `imagens_produto` VARCHAR(128) NULL,
  PRIMARY KEY (`idproduto`))
ENGINE = InnoDB -->