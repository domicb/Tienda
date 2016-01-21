

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


CREATE SCHEMA IF NOT EXISTS `tienda` DEFAULT CHARACTER SET utf8 ;
USE `tienda` ;


CREATE TABLE IF NOT EXISTS `tienda`.`categoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT,
  `cod_categoria` VARCHAR(15) NULL,
  `nombre` VARCHAR(45) NULL,
  `descripcion` TEXT NULL,
  `anuncio` TEXT NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `tienda`.`producto` (
  `idproducto` INT NOT NULL AUTO_INCREMENT,
  `categoria_idcategoria` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `precio` DECIMAL(3,2) NULL,
  `descuento` DECIMAL(3,2) NULL,
  `imagen` VARCHAR(150) NULL,
  `iva` DECIMAL(3,2) NULL,
  `descripcion` TEXT NULL,
  `anuncio` TEXT NULL,
  `seleccion` CHAR(1) NULL,
  `mostrar` CHAR(1) NULL,
  `inicio` DATE NULL,
  `fin` DATE NULL,
  PRIMARY KEY (`idproducto`),
  INDEX `fk_producto_categoria_idx` (`categoria_idcategoria` ASC),
  CONSTRAINT `fk_producto_categoria`
    FOREIGN KEY (`categoria_idcategoria`)
    REFERENCES `tienda`.`categoria` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `tienda`.`provincia` (
  `idprovincia` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idprovincia`))
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `tienda`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `provincia_idprovincia` INT NOT NULL,
  `username` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `dni` VARCHAR(10) NULL,
  `email` VARCHAR(45) NULL,
  `nombre` VARCHAR(45) NULL,
  `apellidos` VARCHAR(60) NULL,
  `direccion` VARCHAR(150) NULL,
  `cp` DECIMAL(5) NULL,
  `estado` CHAR(1) NULL,
  PRIMARY KEY (`idusuario`),
  INDEX `fk_usuario_provincia1_idx` (`provincia_idprovincia` ASC),
  CONSTRAINT `fk_usuario_provincia1`
    FOREIGN KEY (`provincia_idprovincia`)
    REFERENCES `tienda`.`provincia` (`idprovincia`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `tienda`.`pedido` (
  `idpedido` INT NOT NULL AUTO_INCREMENT,
  `usuario_idusuario` INT NOT NULL,
  `importe` DECIMAL(10,2) NULL,
  `estado` CHAR(1) NULL,
  `fecha` DATE NULL,
  `direccion` VARCHAR(150) NULL,
  `cp` DECIMAL(5) NULL,
  `cod_provincia` INT NULL,
  `nombre_persona` VARCHAR(150) NULL,
  `apellidos_persona` VARCHAR(150) NULL,
  `dni` VARCHAR(10) NULL,
  `email` VARCHAR(45) NULL,
  PRIMARY KEY (`idpedido`),
  INDEX `fk_pedido_usuario1_idx` (`usuario_idusuario` ASC),
  CONSTRAINT `fk_pedido_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `tienda`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `tienda`.`linea` (
  `idlinea` INT NOT NULL AUTO_INCREMENT,
  `pedido_idpedido` INT NOT NULL,
  `iva` DECIMAL(3,2) NULL,
  `precio` DECIMAL(3,2) NULL,
  `cantidad` INT NULL,
  `producto_idproducto` INT NOT NULL,
  PRIMARY KEY (`idlinea`),
  INDEX `fk_linea_pedido1_idx` (`pedido_idpedido` ASC),
  INDEX `fk_linea_producto1_idx` (`producto_idproducto` ASC),
  CONSTRAINT `fk_linea_pedido1`
    FOREIGN KEY (`pedido_idpedido`)
    REFERENCES `tienda`.`pedido` (`idpedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_linea_producto1`
    FOREIGN KEY (`producto_idproducto`)
    REFERENCES `tienda`.`producto` (`idproducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
