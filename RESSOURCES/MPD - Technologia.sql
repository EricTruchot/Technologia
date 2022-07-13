-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema technologia
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema technologia
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `technologia` ;
USE `technologia` ;

-- -----------------------------------------------------
-- Table `technologia`.`Utilisateur`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `technologia`.`Utilisateur` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(75) NULL,
  `mdp` VARCHAR(255) NULL,
  `type` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `technologia`.`Entreprise`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `technologia`.`Entreprise` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(75) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `technologia`.`Article`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `technologia`.`Article` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `titre` VARCHAR(150) NULL,
  `description` LONGTEXT NULL,
  `contenu` VARCHAR(255) NULL,
  `date` TIMESTAMP NULL,
  `Entreprise_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Article_Entreprise_idx` (`Entreprise_id` ASC) VISIBLE,
  CONSTRAINT `fk_Article_Entreprise`
    FOREIGN KEY (`Entreprise_id`)
    REFERENCES `technologia`.`Entreprise` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `technologia`.`Media`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `technologia`.`Media` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `lien` VARCHAR(255) NULL,
  `Article_id` INT UNSIGNED NOT NULL,
  `Entreprise_id` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Media_Article1_idx` (`Article_id` ASC) VISIBLE,
  INDEX `fk_Media_Entreprise1_idx` (`Entreprise_id` ASC) VISIBLE,
  CONSTRAINT `fk_Media_Article1`
    FOREIGN KEY (`Article_id`)
    REFERENCES `technologia`.`Article` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Media_Entreprise1`
    FOREIGN KEY (`Entreprise_id`)
    REFERENCES `technologia`.`Entreprise` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
