-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema bd_resto
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema bd_resto
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `bd_resto` DEFAULT CHARACTER SET utf8 ;
USE `bd_resto` ;

-- -----------------------------------------------------
-- Table `bd_resto`.`admistrador`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_resto`.`admistrador` (
  `adm_id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `email` VARCHAR(150) NOT NULL,
  `senha` VARCHAR(250) NULL,
  PRIMARY KEY (`adm_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_resto`.`cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_resto`.`cliente` (
  `cli_id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(150) NOT NULL,
  `sexo` VARCHAR(1) NOT NULL,
  `dt_nasc` DATE NOT NULL,
  `nickname` VARCHAR(20) NOT NULL,
  `senha` VARCHAR(250) NOT NULL,
  `whatsapp` VARCHAR(11) NOT NULL,
  PRIMARY KEY (`cli_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_resto`.`tipo_prato`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_resto`.`tipo_prato` (
  `tipo_cod` INT NOT NULL,
  `tipo_nome` VARCHAR(150) NOT NULL,
  PRIMARY KEY (`tipo_cod`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_resto`.`produto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_resto`.`produto` (
  `codigo` INT NOT NULL AUTO_INCREMENT,
  `tipo_cod` INT NOT NULL,
  `nome` VARCHAR(50) NOT NULL,
  `decricao` VARCHAR(150) NOT NULL,
  `preco` DOUBLE NOT NULL,
  `promo` TINYINT(1) NULL,
  PRIMARY KEY (`codigo`),
  INDEX `fk_pratos_tipo_prato_idx` (`tipo_cod` ASC) VISIBLE,
  CONSTRAINT `fk_pratos_tipo_prato`
    FOREIGN KEY (`tipo_cod`)
    REFERENCES `bd_resto`.`tipo_prato` (`tipo_cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_resto`.`pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_resto`.`pedido` (
  `ped_num` INT NOT NULL AUTO_INCREMENT,
  `ped_data` DATE NOT NULL,
  PRIMARY KEY (`ped_num`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_resto`.`cliente_pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_resto`.`cliente_pedido` (
  `cliente_cli_id` INT NOT NULL,
  `pedido_ped_cod` INT NOT NULL,
  `produto_codigo` INT NOT NULL,
  `qtde` INT NOT NULL,
  `deconto` DOUBLE NULL,
  `total` DOUBLE NOT NULL,
  PRIMARY KEY (`cliente_cli_id`, `pedido_ped_cod`, `produto_codigo`),
  INDEX `fk_cliente_has_pedido_pedido1_idx` (`pedido_ped_cod` ASC) VISIBLE,
  INDEX `fk_cliente_has_pedido_cliente1_idx` (`cliente_cli_id` ASC) VISIBLE,
  INDEX `fk_cliente_has_pedido_produto1_idx` (`produto_codigo` ASC) VISIBLE,
  CONSTRAINT `fk_cliente_has_pedido_cliente1`
    FOREIGN KEY (`cliente_cli_id`)
    REFERENCES `bd_resto`.`cliente` (`cli_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_has_pedido_pedido1`
    FOREIGN KEY (`pedido_ped_cod`)
    REFERENCES `bd_resto`.`pedido` (`ped_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_cliente_has_pedido_produto1`
    FOREIGN KEY (`produto_codigo`)
    REFERENCES `bd_resto`.`produto` (`codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_resto`.`endereco`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_resto`.`endereco` (
  `end_cod` INT NOT NULL,
  `cep` VARCHAR(9) NOT NULL,
  `logradouro` VARCHAR(50) NOT NULL,
  `numero` VARCHAR(20) NOT NULL,
  `comp` VARCHAR(45) NOT NULL,
  `bairro` VARCHAR(100) NOT NULL,
  `cliente_cli_id` INT NOT NULL,
  PRIMARY KEY (`end_cod`),
  INDEX `fk_endereco_cliente1_idx` (`cliente_cli_id` ASC) VISIBLE,
  CONSTRAINT `fk_endereco_cliente1`
    FOREIGN KEY (`cliente_cli_id`)
    REFERENCES `bd_resto`.`cliente` (`cli_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_resto`.`tipo_pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_resto`.`tipo_pagamento` (
  `cod` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`cod`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `bd_resto`.`pagamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bd_resto`.`pagamento` (
  `idpagamento` INT NOT NULL AUTO_INCREMENT,
  `dt_pgto` DATE NOT NULL,
  `valor` DOUBLE NOT NULL,
  `pedido_ped_num` INT NOT NULL,
  `tipo_pagamento_cod` INT NOT NULL,
  PRIMARY KEY (`idpagamento`, `tipo_pagamento_cod`),
  INDEX `fk_pagamento_pedido1_idx` (`pedido_ped_num` ASC) VISIBLE,
  INDEX `fk_pagamento_tipo_pagamento1_idx` (`tipo_pagamento_cod` ASC) VISIBLE,
  CONSTRAINT `fk_pagamento_pedido1`
    FOREIGN KEY (`pedido_ped_num`)
    REFERENCES `bd_resto`.`pedido` (`ped_num`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pagamento_tipo_pagamento1`
    FOREIGN KEY (`tipo_pagamento_cod`)
    REFERENCES `bd_resto`.`tipo_pagamento` (`cod`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
