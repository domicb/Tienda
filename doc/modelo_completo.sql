
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
  `cp` NUMERIC(5) NULL,
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
    REFERENCES `tienda`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `tienda`.`linea` (
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

INSERT INTO `categoria`(`idcategoria`, `cod_categoria`, `nombre`, `descripcion`, `anuncio`) VALUES (
  NULL,'1','Filosofia','Biografias de los grandes pensadores de la historia','Descubre el mundo de la filosofia a través de su historia');

INSERT INTO `categoria`(`idcategoria`, `cod_categoria`, `nombre`, `descripcion`, `anuncio`) VALUES (
  NULL,'2','Economia','La historia de la economia por los mejores autores','Lográ entender el pasado presente y futuro de la economia mundial a traves de estos grandes bests sellers');


INSERT INTO `provincia` VALUES ('01', 'Alava'),
('02', 'Albacete'),
('03', 'Alicante'),
('04', 'Almera'),
('05', 'Avila'),
('06', 'Badajoz'),
('07', 'Balears (Illes)'),
('08', 'Barcelona'),
('09', 'Burgos'),
('10', 'Cáceres'),
('11', 'Cádiz'),
('12', 'Castellón'),
('13', 'Ciudad Real'),
('14', 'Córdoba'),
('15', 'Coruña (A)'),
('16', 'Cuenca'),
('17', 'Girona'),
('18', 'Granada'),
('19', 'Guadalajara'),
('20', 'Guipzcoa'),
('21', 'Huelva'),
('22', 'Huesca'),
('23', 'Jaén'),
('24', 'León'),
('25', 'Lleida'),
('26', 'Rioja (La)'),
('27', 'Lugo'),
('28', 'Madrid'),
('29', 'Málaga'),
('30', 'Murcia'),
('31', 'Navarra'),
('32', 'Ourense'),
('33', 'Asturias'),
('34', 'Palencia'),
('35', 'Palmas (Las)'),
('36', 'Pontevedra'),
('37', 'Salamanca'),
('38', 'Santa Cruz de Tenerife'),
('39', 'Cantabria'),
('40', 'Segovia'),
('41', 'Sevilla'),
('42', 'Soria'),
('43', 'Tarragona'),
('44', 'Teruel'),
('45', 'Toledo'),
('46', 'Valencia'),
('47', 'Valladolid'),
('48', 'Vizcaya'),
('49', 'Zamora'),
('50', 'Zaragoza'),
('51', 'Ceuta'),
('52', 'Melilla');


INSERT INTO `usuario`(`idusuario`, `provincia_idprovincia`, `username`, `password`, `dni`, `email`, `nombre`, 
  `apellidos`, `direccion`, `cp`, `estado`)
 VALUES (NULL,'1','domi','1234','48930964m','domi1213@hotmail.com','domingo','carrasco','coquina','21100','1');