
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


CREATE SCHEMA IF NOT EXISTS `2daw1516_domingo02` DEFAULT CHARACTER SET utf8 ;
USE `2daw1516_domingo02` ;


CREATE TABLE IF NOT EXISTS `2daw1516_domingo02`.`categoria` (
  `idcategoria` INT NOT NULL AUTO_INCREMENT,
  `cod_categoria` VARCHAR(15) NULL,
  `nombre` VARCHAR(45) NULL,
  `descripcion` TEXT NULL,
  `anuncio` TEXT NULL,
  PRIMARY KEY (`idcategoria`))
ENGINE = InnoDB;


CREATE TABLE IF NOT EXISTS `2daw1516_domingo02`.`producto` (
  `idproducto` INT NOT NULL AUTO_INCREMENT,
  `categoria_idcategoria` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `cantidad` NUMERIC(5) NULL,
  `precio` NUMERIC(7,2) NULL,
  `descuento` NUMERIC(7,2) NULL,
  `imagen` VARCHAR(150) NULL,
  `iva` NUMERIC(7,2) NULL,
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
    REFERENCES `2daw1516_domingo02`.`categoria` (`idcategoria`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `2daw1516_domingo02`.`provincia` (
  `idprovincia` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  PRIMARY KEY (`idprovincia`))
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `2daw1516_domingo02`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `provincia` VARCHAR (25) NULL,
  `username` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `dni` VARCHAR(10) NULL,
  `email` VARCHAR(45) NULL,
  `nombre` VARCHAR(45) NULL,
  `apellidos` VARCHAR(60) NULL,
  `direccion` VARCHAR(150) NULL,
  `cp` NUMERIC(5) NULL,
  `estado` CHAR(1) NULL,
  `aleatorio` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `2daw1516_domingo02`.`pedido` (
  `idpedido` INT NOT NULL AUTO_INCREMENT,
  `usuario_idusuario` INT NOT NULL,
  `importe` NUMERIC(10,2) NULL,
  `estado` CHAR(1) NULL,
  `fecha` DATE NULL,
  `direccion` VARCHAR(150) NULL,
  `cp` NUMERIC(7) NULL,
  `cod_provincia` INT NULL,
  `nombre_persona` VARCHAR(150) NULL,
  `apellidos_persona` VARCHAR(150) NULL,
  `dni` VARCHAR(10) NULL,
  `email` VARCHAR(45) NULL,
  PRIMARY KEY (`idpedido`),
  INDEX `fk_pedido_usuario1_idx` (`usuario_idusuario` ASC),
  CONSTRAINT `fk_pedido_usuario1`
    FOREIGN KEY (`usuario_idusuario`)
    REFERENCES `2daw1516_domingo02`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `2daw1516_domingo02`.`linea` (
  `idlinea` INT NOT NULL AUTO_INCREMENT,
  `pedido_idpedido` INT NOT NULL,
  `iva` NUMERIC(7,2) NULL,
  `precio` NUMERIC(7,2) NULL,
  `cantidad` INT NULL,
  `producto_idproducto` INT NOT NULL,
  PRIMARY KEY (`idlinea`),
  INDEX `fk_linea_pedido1_idx` (`pedido_idpedido` ASC),
  INDEX `fk_linea_producto1_idx` (`producto_idproducto` ASC),
  CONSTRAINT `fk_linea_pedido1`
    FOREIGN KEY (`pedido_idpedido`)
    REFERENCES `2daw1516_domingo02`.`pedido` (`idpedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_linea_producto1`
    FOREIGN KEY (`producto_idproducto`)
    REFERENCES `2daw1516_domingo02`.`producto` (`idproducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO `categoria`(`idcategoria`, `cod_categoria`, `nombre`, `descripcion`, `anuncio`) VALUES (
  NULL,'1','Filosofia','Biografias de los grandes pensadores de la historia','Descubre el mundo de la filosofia a través de su historia');

INSERT INTO `categoria`(`idcategoria`, `cod_categoria`, `nombre`, `descripcion`, `anuncio`) VALUES (
  NULL,'2','Economia','La historia de la economia por los mejores autores','Lográ entender el pasado presente y futuro de la economia mundial a traves de estos grandes bests sellers');

