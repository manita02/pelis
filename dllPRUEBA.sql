-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema sesion
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema sesion
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sesionprueba` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci ;
USE `sesionprueba` ;

-- -----------------------------------------------------
-- Table `sesion`.`genero`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sesionprueba`.`genero` (
  `idgenero` INT NOT NULL,
  `nombre_genero` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idgenero`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sesion`.`pelicula`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sesionprueba`.`pelicula` (
  `idpelicula` INT NOT NULL,
  `titulo` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(1500) NOT NULL,
  `url_imagen` VARCHAR(1500) NOT NULL,
  `anio_estreno` YEAR NOT NULL,
  `pais` VARCHAR(45) NOT NULL,
  `director` VARCHAR(45) NOT NULL,
  `url_trailer` VARCHAR(1500) NOT NULL,
  `genero_idgenero` INT NOT NULL,
  PRIMARY KEY (`idpelicula`),
  INDEX `fk_pelicula_genero1_idx` (`genero_idgenero` ASC) VISIBLE,
  CONSTRAINT `fk_pelicula_genero1`
    FOREIGN KEY (`genero_idgenero`)
    REFERENCES `sesionprueba`.`genero` (`idgenero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `sesion`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sesionprueba`.`user` (
  `userid` INT NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`userid`))
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_0900_ai_ci;


-- -----------------------------------------------------
-- Table `sesion`.`likes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sesionprueba`.`likes` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idpelicula` INT NOT NULL,
  `iduser` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_likes_pelicula_idx` (`idpelicula` ASC) VISIBLE,
  INDEX `fk_likes_user1_idx` (`iduser` ASC) VISIBLE,
  CONSTRAINT `fk_likes_pelicula`
    FOREIGN KEY (`idpelicula`)
    REFERENCES `sesionprueba`.`pelicula` (`idpelicula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_likes_user1`
    FOREIGN KEY (`iduser`)
    REFERENCES `sesionprueba`.`user` (`userid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sesion`.`comentarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sesionprueba`.`comentarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `comentario` VARCHAR(1500) NOT NULL,
  `fecha` TIMESTAMP NOT NULL,
  `idpelicula` INT NOT NULL,
  `idusuario` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_comentarios_pelicula1_idx` (`idpelicula` ASC) VISIBLE,
  INDEX `fk_comentarios_user1_idx` (`idusuario` ASC) VISIBLE,
  CONSTRAINT `fk_comentarios_pelicula1`
    FOREIGN KEY (`idpelicula`)
    REFERENCES `sesionprueba`.`pelicula` (`idpelicula`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_comentarios_user1`
    FOREIGN KEY (`idusuario`)
    REFERENCES `sesionprueba`.`user` (`userid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
