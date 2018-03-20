-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ControlBodega
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `ControlBodega` ;

-- -----------------------------------------------------
-- Schema ControlBodega
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ControlBodega` DEFAULT CHARACTER SET utf8 ;
USE `ControlBodega` ;

-- -----------------------------------------------------
-- Table `ControlBodega`.`Equipo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ControlBodega`.`Equipo` (
  `idEquipo` INT NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(45) NOT NULL,
  `marca` VARCHAR(45) NULL,
  `modelo` VARCHAR(45) NULL,
  PRIMARY KEY (`idEquipo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ControlBodega`.`Solicitante`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ControlBodega`.`Solicitante` (
  `idSolicitante` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `cargo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idSolicitante`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ControlBodega`.`Reserva`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ControlBodega`.`Reserva` (
  `idReserva` INT NOT NULL AUTO_INCREMENT,
  `fechaReserva` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idReserva`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ControlBodega`.`Pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ControlBodega`.`Pedido` (
  `idPedido` INT NOT NULL AUTO_INCREMENT,
  `fechaEntrega` DATETIME NOT NULL,
  `fechaDevolucion` VARCHAR(45) NOT NULL,
  `comentario` VARCHAR(45) NULL,
  `isReserva` TINYINT NULL,
  `idEquipo` INT NOT NULL,
  `idSolicitante` INT NOT NULL,
  `idReserva` INT NOT NULL,
  PRIMARY KEY (`idPedido`),
  INDEX `fk_Pedido_Equipo_idx` (`idEquipo` ASC),
  INDEX `fk_Pedido_Solicitante1_idx` (`idSolicitante` ASC),
  INDEX `fk_Pedido_Reserva1_idx` (`idReserva` ASC),
  CONSTRAINT `fk_Pedido_Equipo`
    FOREIGN KEY (`idEquipo`)
    REFERENCES `ControlBodega`.`Equipo` (`idEquipo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedido_Solicitante1`
    FOREIGN KEY (`idSolicitante`)
    REFERENCES `ControlBodega`.`Solicitante` (`idSolicitante`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Pedido_Reserva1`
    FOREIGN KEY (`idReserva`)
    REFERENCES `ControlBodega`.`Reserva` (`idReserva`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
