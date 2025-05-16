-- Inicia la creación del esquema
CREATE SCHEMA `inventario_sistema` DEFAULT CHARACTER SET utf8;
USE `inventario_sistema`;

-- Tabla: roles
CREATE TABLE `roles` (
  `idRol` INT(2) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(15) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE = InnoDB;

-- Tabla: usuarios
CREATE TABLE `usuarios` (
  `idUsuario` INT(6) NOT NULL AUTO_INCREMENT,
  `idRol` INT(2) NOT NULL,
  `nombre` VARCHAR(100) NOT NULL,
  `correo` VARCHAR(50) NOT NULL,
  `contrasena` VARCHAR(25) NOT NULL, 
  `estatus` INT(1) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `fk_usuarios_idRol` (`idRol`),
  CONSTRAINT `fk_usuarios_idRol` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`)
    ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- Tabla: historicos
CREATE TABLE `historicos` (
  `idHistorico` INT(6) NOT NULL AUTO_INCREMENT,
  `idUsuario` INT(6) NOT NULL,
  `tipo_movimiento` VARCHAR(10) NOT NULL,
  `accion` VARCHAR(50),
  `fecha` DATETIME DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idHistorico`),
  KEY `fk_historicos_idUsuario` (`idUsuario`),
  CONSTRAINT `fk_historicos_idUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`)
    ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = InnoDB;

-- Tabla: productos
CREATE TABLE `productos` (
  `idProducto` INT(6) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(50) NOT NULL,
  `cantidad` INT(6) NOT NULL,
  `estatus` INT(1) NOT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE = InnoDB;
