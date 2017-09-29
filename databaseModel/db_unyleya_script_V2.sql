-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema db_unyleya
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `db_unyleya` ;

-- -----------------------------------------------------
-- Schema db_unyleya
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_unyleya` DEFAULT CHARACTER SET utf8 ;
USE `db_unyleya` ;

-- -----------------------------------------------------
-- Table `db_unyleya`.`tb_format`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_unyleya`.`tb_format` ;

CREATE TABLE IF NOT EXISTS `db_unyleya`.`tb_format` (
  `id_format` INT NOT NULL AUTO_INCREMENT,
  `tx_nme_format` VARCHAR(60) NOT NULL,
  `status_format` CHAR(1) NOT NULL COMMENT 'A = Ativo\nD = Deletado\nI  = Inativo',
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id_format`),
  UNIQUE INDEX `tx_nme_format_UNIQUE` (`tx_nme_format` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_unyleya`.`tb_color_list`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_unyleya`.`tb_color_list` ;

CREATE TABLE IF NOT EXISTS `db_unyleya`.`tb_color_list` (
  `id_color_list` INT NOT NULL AUTO_INCREMENT,
  `tx_nme_color` VARCHAR(60) NOT NULL,
  `tx_hex_color` VARCHAR(60) NOT NULL,
  `status_color_list` CHAR(1) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id_color_list`),
  UNIQUE INDEX `tx_nme_color_UNIQUE` (`tx_nme_color` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_unyleya`.`tb_table`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_unyleya`.`tb_table` ;

CREATE TABLE IF NOT EXISTS `db_unyleya`.`tb_table` (
  `id_table` INT NOT NULL AUTO_INCREMENT,
  `cod_format` INT NOT NULL,
  `cod_color_list` INT NOT NULL,
  `tx_nme_model` VARCHAR(60) NOT NULL,
  `tx_measures` VARCHAR(60) NOT NULL,
  `status_table` CHAR(1) NOT NULL COMMENT 'A = Ativo\nD = Deletado\nI = Inativo\n',
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id_table`),
  INDEX `fk_tb_table_tb_format_idx` (`cod_format` ASC),
  INDEX `fk_tb_table_tb_color_list1_idx` (`cod_color_list` ASC),
  CONSTRAINT `fk_tb_table_tb_format`
    FOREIGN KEY (`cod_format`)
    REFERENCES `db_unyleya`.`tb_format` (`id_format`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tb_table_tb_color_list1`
    FOREIGN KEY (`cod_color_list`)
    REFERENCES `db_unyleya`.`tb_color_list` (`id_color_list`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `db_unyleya`.`tb_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `db_unyleya`.`tb_user` ;

CREATE TABLE IF NOT EXISTS `db_unyleya`.`tb_user` (
  `id_user` INT NOT NULL AUTO_INCREMENT,
  `tx_nme_user` VARCHAR(60) NOT NULL,
  `tx_psw_user` VARCHAR(200) NOT NULL,
  `status_user` CHAR(1) NOT NULL,
  `created_at` DATETIME NULL,
  `updated_at` DATETIME NULL,
  PRIMARY KEY (`id_user`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `db_unyleya`.`tb_format`
-- -----------------------------------------------------
START TRANSACTION;
USE `db_unyleya`;
INSERT INTO `db_unyleya`.`tb_format` (`id_format`, `tx_nme_format`, `status_format`, `created_at`, `updated_at`) VALUES (1, 'Quadrada', 'A', '2017-09-26 12:00', NULL);
INSERT INTO `db_unyleya`.`tb_format` (`id_format`, `tx_nme_format`, `status_format`, `created_at`, `updated_at`) VALUES (2, 'Retangular', 'A', '2017-09-26 12:00', NULL);
INSERT INTO `db_unyleya`.`tb_format` (`id_format`, `tx_nme_format`, `status_format`, `created_at`, `updated_at`) VALUES (3, 'Redonda', 'A', '2017-09-26 12:00', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `db_unyleya`.`tb_color_list`
-- -----------------------------------------------------
START TRANSACTION;
USE `db_unyleya`;
INSERT INTO `db_unyleya`.`tb_color_list` (`id_color_list`, `tx_nme_color`, `tx_hex_color`, `status_color_list`, `created_at`, `updated_at`) VALUES (DEFAULT, 'Azul', '#0000FF', 'A', '2017-09-26 12:00', NULL);
INSERT INTO `db_unyleya`.`tb_color_list` (`id_color_list`, `tx_nme_color`, `tx_hex_color`, `status_color_list`, `created_at`, `updated_at`) VALUES (DEFAULT, 'Céu profundo Azul', '#00BFFF', 'A', '2017-09-26 12:00', NULL);
INSERT INTO `db_unyleya`.`tb_color_list` (`id_color_list`, `tx_nme_color`, `tx_hex_color`, `status_color_list`, `created_at`, `updated_at`) VALUES (DEFAULT, 'Rosa Profundo', '#FF1493', 'A', '2017-09-26 12:00', NULL);
INSERT INTO `db_unyleya`.`tb_color_list` (`id_color_list`, `tx_nme_color`, `tx_hex_color`, `status_color_list`, `created_at`, `updated_at`) VALUES (DEFAULT, 'Rosa Quente', '#FF69B4', 'A', '2017-09-26 12:00', NULL);
INSERT INTO `db_unyleya`.`tb_color_list` (`id_color_list`, `tx_nme_color`, `tx_hex_color`, `status_color_list`, `created_at`, `updated_at`) VALUES (DEFAULT, 'Vermelho', '#FF0000', 'A', '2017-09-26 12:00', NULL);
INSERT INTO `db_unyleya`.`tb_color_list` (`id_color_list`, `tx_nme_color`, `tx_hex_color`, `status_color_list`, `created_at`, `updated_at`) VALUES (DEFAULT, 'Laranja', '#FFA500', 'A', '2017-09-26 12:00', NULL);
INSERT INTO `db_unyleya`.`tb_color_list` (`id_color_list`, `tx_nme_color`, `tx_hex_color`, `status_color_list`, `created_at`, `updated_at`) VALUES (DEFAULT, 'Amarelo', '#FFFF00	', 'A', '2017-09-26 12:00', NULL);
INSERT INTO `db_unyleya`.`tb_color_list` (`id_color_list`, `tx_nme_color`, `tx_hex_color`, `status_color_list`, `created_at`, `updated_at`) VALUES (DEFAULT, 'Verde', '#008000', 'A', '2017-09-26 12:00', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `db_unyleya`.`tb_table`
-- -----------------------------------------------------
START TRANSACTION;
USE `db_unyleya`;
INSERT INTO `db_unyleya`.`tb_table` (`id_table`, `cod_format`, `cod_color_list`, `tx_nme_model`, `tx_measures`, `status_table`, `created_at`, `updated_at`) VALUES (DEFAULT, 1, 1, 'Mesa de Jantar', '40x50x30', 'A', '2017-09-26 12:00', NULL);
INSERT INTO `db_unyleya`.`tb_table` (`id_table`, `cod_format`, `cod_color_list`, `tx_nme_model`, `tx_measures`, `status_table`, `created_at`, `updated_at`) VALUES (DEFAULT, 3, 2, 'Mesa de Escritorio', '40x30x20', 'A', '2017-09-26 12:00', NULL);
INSERT INTO `db_unyleya`.`tb_table` (`id_table`, `cod_format`, `cod_color_list`, `tx_nme_model`, `tx_measures`, `status_table`, `created_at`, `updated_at`) VALUES (DEFAULT, 2, 3, 'Mesa de Bar', '10x10x10', 'A', '2017-09-26 12:00', NULL);
INSERT INTO `db_unyleya`.`tb_table` (`id_table`, `cod_format`, `cod_color_list`, `tx_nme_model`, `tx_measures`, `status_table`, `created_at`, `updated_at`) VALUES (DEFAULT, 2, 4, 'Mesa Rústica', '30x30x30', 'A', '2017-09-26 12:00', NULL);
INSERT INTO `db_unyleya`.`tb_table` (`id_table`, `cod_format`, `cod_color_list`, `tx_nme_model`, `tx_measures`, `status_table`, `created_at`, `updated_at`) VALUES (DEFAULT, 1, 5, 'Mesa de Apoio', '10x15x20', 'A', '2017-09-26 12:00', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `db_unyleya`.`tb_user`
-- -----------------------------------------------------
START TRANSACTION;
USE `db_unyleya`;
INSERT INTO `db_unyleya`.`tb_user` (`id_user`, `tx_nme_user`, `tx_psw_user`, `status_user`, `created_at`, `updated_at`) VALUES (DEFAULT, 'alex.alexandre', '123123', 'A', '2017-09-28 20:30:00', NULL);

COMMIT;

