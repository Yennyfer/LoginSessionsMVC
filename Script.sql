-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema users
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema users
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `users` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `users` ;

-- -----------------------------------------------------
-- Table `users`.`Usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `users`.`Usuarios` (
  `idUsuarios` INT UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '',
  `Nombres` VARCHAR(60) NOT NULL COMMENT '',
  `Apellidos` VARCHAR(60) NOT NULL COMMENT '',
  `Telefono` BIGINT NOT NULL COMMENT '',
  `Tipo` ENUM('Administrador', 'Cliente', 'Empleado') NOT NULL COMMENT '',
  `Estado` ENUM('Activo', 'Inactivo') NOT NULL DEFAULT 'Activo' COMMENT '',
  PRIMARY KEY (`idUsuarios`)  COMMENT '')
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
