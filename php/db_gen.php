
<?php 
 

function queries($query){
    $pdo = new PDO('mysql:host=localhost;dbname=dblojinha','root','');
    $sql = $pdo->prepare($query);
    $sql->execute();
    sleep(1);
}



queries("CREATE TABLE `dblojinha`.`produto` ( `id` INT(64) NOT NULL AUTO_INCREMENT , `nome` VARCHAR(128) NOT NULL , `imagens` VARCHAR(264) NOT NULL , `categoria` VARCHAR(64) NULL ,`descricao_geral` VARCHAR(2500) NULL,`especificacoes` VARCHAR(1000) NULL,`tags` VARCHAR(400) NULL, `preco` FLOAT(32) NOT NULL , `promocao` BIT(1) NULL , `valor_em_promocao` FLOAT(32) NULL , `parcelas` INT(2) NOT NULL , `estoque` INT(64) NOT NULL ,`vendas` INT(64) NULL ,PRIMARY KEY (`id`)) ENGINE = InnoDB;");


queries("CREATE TABLE IF NOT EXISTS `dblojinha`.`usuario` (
  `id` INT(64) NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(14) UNIQUE NOT NULL,
  `senha` VARCHAR(128) UNIQUE NOT NULL,
  `nome` VARCHAR(128) NULL,
  `dataNascimento` VARCHAR(10) NULL,
  `celular` VARCHAR(14) NULL,
  `email` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;
");


queries("CREATE TABLE IF NOT EXISTS `dblojinha`.`enderecos` (
    `id` INT NOT NULL AUTO_INCREMENT,
    `cep` VARCHAR(8) NULL,
    `rua` VARCHAR(128) NULL,
    `bairro` VARCHAR(32) NULL,
    `cidade` VARCHAR(45) NULL,
    `unidadefederal` VARCHAR(3) NOT NULL,
    `usuario_cpf` VARCHAR(14) NOT NULL,
    `usuario_id` INT(64) NOT NULL,
    PRIMARY KEY (`id`),
    INDEX `fk_enderecos_usuario_idx` (`usuario_cpf` ASC, `usuario_id` ASC) VISIBLE,
    CONSTRAINT `fk_enderecos_usuario`
      FOREIGN KEY (`usuario_cpf` , `usuario_id`)
      REFERENCES `dblojinha`.`usuario` (`cpf` , `id`)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION)
  ENGINE = InnoDB;");


queries("CREATE TABLE IF NOT EXISTS `dblojinha`.`admin` (
    `admin_id` INT(64) NOT NULL AUTO_INCREMENT,
    `senha_admin` VARCHAR(64) UNIQUE NOT NULL,
    `login_admin` VARCHAR(128) NULL,
    `nome_admin` VARCHAR(128) NULL,
    `cargo_admin` VARCHAR(128) NULL,
    `nivel` TINYINT(20) NOT NULL DEFAULT '1',
    PRIMARY KEY (`admin_id`))
  ENGINE = InnoDB;
  ");

  queries("CREATE TABLE `dblojinha`.`admin_online` ( `id` INT(30) NOT NULL , `ip` VARCHAR(255) NOT NULL , `ultima_acao` DATETIME NOT NULL , `token` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");

  queries("CREATE TABLE `dblojinha`.`variacoes` ( `categoria` VARCHAR(64) NOT NULL , `variacoes` VARCHAR(128) NOT NULL , PRIMARY KEY (`categoria`)) ENGINE = InnoDB;");



  queries("ALTER TABLE `variacoes` CHANGE `variacoes` `variacoes` VARCHAR(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Sem Variações';");
 ?>