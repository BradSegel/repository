-- MySQL Script generated by MySQL Workbench
-- 05/19/15 21:29:24
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema FirearmsDB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `FirearmsDB` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `FirearmsDB` ;

-- -----------------------------------------------------
-- Table `FirearmsDB`.`Firearms`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `FirearmsDB`.`Firearms` (
  `idFirearms` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `caliber` VARCHAR(45) NULL,
  `sernum` VARCHAR(45) NULL,
  `manuf` VARCHAR(45) NULL,
  `price` DECIMAL NULL,
  `owner_id` VARCHAR(45) NULL,
  PRIMARY KEY (`idFirearms`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;




------------------------------------------------------------------------------------

CREATE DATABASE IF NOT EXISTS FirearmsDB ;
USE `FirearmsDB` ;

CREATE TABLE IF NOT EXISTS Firearms (
  `idFirearms` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `caliber` VARCHAR(45) NULL,
  `sernum` VARCHAR(45) NULL,
  `manuf` VARCHAR(45) NULL,
  `price` DECIMAL NULL,
  `owner_id` VARCHAR(45) NULL,
  PRIMARY KEY (`idFirearms`))
ENGINE = InnoDB;



CREATE TABLE IF NOT EXISTS `FirearmsDB`.`Person` (
`userid` INT NOT NULL,
  `name` VARCHAR(45) NULL,
  `level` VARCHAR(45) NULL,
  PRIMARY KEY (`userid`))
ENGINE = InnoDB;
-----------------------------------------------------------
V2


DROP IF EXISTS FirearmsDB;
CREATE DATABASE IF NOT EXISTS FirearmsDB ;
USE `FirearmsDB` ;

CREATE TABLE IF NOT EXISTS Firearms (
  `idFirearms` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(45) NULL,
  `caliber` VARCHAR(45) NULL,
  `sernum` VARCHAR(45) NULL,
  `manuf` VARCHAR(45) NULL,
  `price` DECIMAL NULL,
  `owner_id` INT NULL,
  PRIMARY KEY (`idFirearms`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `FirearmsDB`.`Person` (
`userid` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(45) NULL,
  `level` VARCHAR(128) NULL,
  PRIMARY KEY (`userid`))
ENGINE = InnoDB;

INSERT INTO Firearms (name, caliber, sernum, manuf, price, owner_id)
VALUES ('1911','45ACP','97F2A96','Springfield',1200.00,0);



-----------------------------------------------------------------------------------
v3

DROP database IF EXISTS firearmsdb;
CREATE DATABASE IF NOT EXISTS FirearmsDB ;
USE `FirearmsDB` ;

CREATE TABLE IF NOT EXISTS Firearms (
  `idFirearms` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(45) NULL,
  `caliber` VARCHAR(45) NULL,
  `sernum` VARCHAR(45) NULL,
  `manuf` VARCHAR(45) NULL,
  `price` DECIMAL NULL,
  `owner_id` INT NULL)
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `FirearmsDB`.`Person` (
`userid` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(45) NULL,
  `level` VARCHAR(128) NULL)
ENGINE = InnoDB;

INSERT INTO Firearms (name, caliber, sernum, manuf, price, owner_id)
VALUES ('1911','45ACP','97F2A96','Springfield',1200.00,0);