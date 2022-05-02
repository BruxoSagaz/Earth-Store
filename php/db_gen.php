<!-- -- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema dblojinha
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dblojinha
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dblojinha` DEFAULT CHARACTER SET utf8 ;
USE `dblojinha` ;

-- -----------------------------------------------------
-- Table `dblojinha`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dblojinha`.`produto` (
  `id` INT(64) NOT NULL,
  `nome` VARCHAR(128) NULL,
  `categoria` VARCHAR(45) NULL,
  `preco` FLOAT(30) NULL,
  `promocao` BIT(1) NOT NULL,
  `valor_em_promocao` FLOAT(30) NULL,
  `parcelas` INT(2) NULL,
  `estoque` INT(64) NULL,
  `filtros` VARCHAR(128) NULL,
  `imagens` VARCHAR(128) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dblojinha`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dblojinha`.`usuario` (
  `id` INT(64) NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(14) NOT NULL,
  `senha` VARCHAR(128) NOT NULL,
  `nome` VARCHAR(128) NULL,
  `celular` VARCHAR(14) NULL,
  `email` VARCHAR(45) NULL COMMENT '123456789_123456789_123456789@1234567.123.12',
  PRIMARY KEY (`id`, `cpf`, `senha`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dblojinha`.`enderecos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dblojinha`.`enderecos` (
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
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dblojinha`.`admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dblojinha`.`admin` (
  `admin_id` INT(64) NOT NULL AUTO_INCREMENT,
  `senha_admin` VARCHAR(64) NOT NULL,
  `nome_admin` VARCHAR(128) NULL,
  PRIMARY KEY (`admin_id`, `senha_admin`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dblojinha`.`gestor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dblojinha`.`gestor` (
  `id` INT(64) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `nome` VARCHAR(45) NULL,
  `num_vendas` VARCHAR(45) NULL,
  PRIMARY KEY (`id`, `senha`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
 -->

 <?php 
 

function queries($query){
    $pdo = new PDO('mysql:host=localhost;dbname=dblojinha','root','');
    $sql = $pdo->prepare($query);
    $sql->execute();
    sleep(2);
}



queries("CREATE TABLE `dblojinha`.`produto` ( `id` INT(64) NOT NULL AUTO_INCREMENT , `nome` VARCHAR(128) NOT NULL , `imagens` VARCHAR(264) NOT NULL , `categoria` VARCHAR(48) NOT NULL , `preco` FLOAT(32) NOT NULL , `promocao` BIT(1) NOT NULL , `valor_em_promocao` FLOAT(32) NOT NULL , `parcelas` INT(2) NOT NULL , `estoque` INT(64) NOT NULL , `filtros` VARCHAR(128) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");


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
    `nome_admin` VARCHAR(128) NULL,
    PRIMARY KEY (`admin_id`))
  ENGINE = InnoDB;
  ");

 queries("CREATE TABLE IF NOT EXISTS `dblojinha`.`gestor` (
    `id` INT(64) NOT NULL,
    `senha` VARCHAR(45) UNIQUE NOT NULL,
    `nome` VARCHAR(45) NULL,
    `num_vendas` VARCHAR(45) NULL,
    PRIMARY KEY (`id`))
  ENGINE = InnoDB;
  ");
 ?>