/*Petar Finderle*/
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;

SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';


DROP SCHEMA IF EXISTS `lm` ;

CREATE SCHEMA IF NOT EXISTS `lm` DEFAULT CHARACTER SET cp1250 COLLATE cp1250_croatian_ci ;

USE `lm` ;


-- -----------------------------------------------------

-- Table `lm`.`lm_user`

-- -----------------------------------------------------

DROP TABLE IF EXISTS `lm`.`lm_user` ;


CREATE TABLE IF NOT EXISTS `lm`.`lm_user` (

  `id` INT NOT NULL AUTO_INCREMENT,

  `username` VARCHAR(20) NOT NULL,

  `password` VARCHAR(20) NOT NULL,

  `ime` VARCHAR(45) NOT NULL,

  `prezime` VARCHAR(45) NOT NULL,

  `email` VARCHAR(45) NOT NULL,

  PRIMARY KEY (`id`))

ENGINE = InnoDB;


CREATE UNIQUE INDEX `username_UNIQUE` ON `lm`.`lm_user` (`username` ASC);


CREATE UNIQUE INDEX `email_UNIQUE` ON `lm`.`lm_user` (`email` ASC);



-- -----------------------------------------------------

-- Table `lm`.`lm_sif_kvalif`

-- -----------------------------------------------------

DROP TABLE IF EXISTS `lm`.`lm_sif_kvalif` ;


CREATE TABLE IF NOT EXISTS `lm`.`lm_sif_kvalif` (

  `id` INT NOT NULL AUTO_INCREMENT,

  `sifra` VARCHAR(20) NOT NULL,

  `opis` VARCHAR(200) NOT NULL,

  PRIMARY KEY (`id`))

ENGINE = InnoDB;


CREATE UNIQUE INDEX `sifra_UNIQUE` ON `lm`.`lm_sif_kvalif` (`sifra` ASC);



-- -----------------------------------------------------

-- Table `lm`.`lm_zemlja`

-- -----------------------------------------------------

DROP TABLE IF EXISTS `lm`.`lm_zemlja` ;


CREATE TABLE IF NOT EXISTS `lm`.`lm_zemlja` (

  `id` INT NOT NULL AUTO_INCREMENT,

  `sifra` VARCHAR(3) NOT NULL,

  `naziv` VARCHAR(100) NOT NULL,

  PRIMARY KEY (`id`))

ENGINE = InnoDB;


CREATE UNIQUE INDEX `sifra_UNIQUE` ON `lm`.`lm_zemlja` (`sifra` ASC);


CREATE UNIQUE INDEX `naziv_UNIQUE` ON `lm`.`lm_zemlja` (`naziv` ASC);



-- -----------------------------------------------------

-- Table `lm`.`lm_lead`

-- -----------------------------------------------------

DROP TABLE IF EXISTS `lm`.`lm_lead` ;


CREATE TABLE IF NOT EXISTS `lm`.`lm_lead` (

  `id` INT NOT NULL AUTO_INCREMENT,

  `sifra` VARCHAR(20) NOT NULL,

  `ime` VARCHAR(45) NOT NULL,

  `prezime` VARCHAR(45) NOT NULL,

  `email` VARCHAR(45) NOT NULL,

  `naziv_tvrtke` VARCHAR(200) NULL,

  `telefon` VARCHAR(20) NULL,

  `mobitel` VARCHAR(20) NULL,

  `ulica` VARCHAR(100) NULL,

  `grad` VARCHAR(40) NULL,

  `zip` VARCHAR(45) NULL,

  `napomena` VARCHAR(2000) NULL,

  `lm_user_id` INT NOT NULL,

  `lm_sif_kvalif_id` INT NOT NULL,

  `lm_zemlja_id` INT NULL,

  PRIMARY KEY (`id`, `lm_user_id`, `lm_sif_kvalif_id`),

  CONSTRAINT `fk_lm_lead_lm_user`

    FOREIGN KEY (`lm_user_id`)

    REFERENCES `lm`.`lm_user` (`id`)

    ON DELETE NO ACTION

    ON UPDATE NO ACTION,

  CONSTRAINT `fk_lm_lead_lm_sif_kvalif1`

    FOREIGN KEY (`lm_sif_kvalif_id`)

    REFERENCES `lm`.`lm_sif_kvalif` (`id`)

    ON DELETE NO ACTION

    ON UPDATE NO ACTION,

  CONSTRAINT `fk_lm_lead_lm_zemlja1`

    FOREIGN KEY (`lm_zemlja_id`)

    REFERENCES `lm`.`lm_zemlja` (`id`)

    ON DELETE NO ACTION

    ON UPDATE NO ACTION)

ENGINE = InnoDB;


CREATE UNIQUE INDEX `sifra_UNIQUE` ON `lm`.`lm_lead` (`sifra` ASC);


CREATE UNIQUE INDEX `ime_UNIQUE` ON `lm`.`lm_lead` (`ime` ASC);


CREATE UNIQUE INDEX `prezime_UNIQUE` ON `lm`.`lm_lead` (`prezime` ASC);


CREATE UNIQUE INDEX `email_UNIQUE` ON `lm`.`lm_lead` (`email` ASC);


CREATE INDEX `fk_lm_lead_lm_user_idx` ON `lm`.`lm_lead` (`lm_user_id` ASC);


CREATE INDEX `fk_lm_lead_lm_sif_kvalif1_idx` ON `lm`.`lm_lead` (`lm_sif_kvalif_id` ASC);


CREATE INDEX `fk_lm_lead_lm_zemlja1_idx` ON `lm`.`lm_lead` (`lm_zemlja_id` ASC);



-- -----------------------------------------------------

-- Table `lm`.`lm_sif_aktivnost`

-- -----------------------------------------------------

DROP TABLE IF EXISTS `lm`.`lm_sif_aktivnost` ;


CREATE TABLE IF NOT EXISTS `lm`.`lm_sif_aktivnost` (

  `id` INT NOT NULL AUTO_INCREMENT,

  `sifra` VARCHAR(20) NOT NULL,

  `opis` VARCHAR(200) NOT NULL,

  PRIMARY KEY (`id`))

ENGINE = InnoDB;


CREATE UNIQUE INDEX `sifra_UNIQUE` ON `lm`.`lm_sif_aktivnost` (`sifra` ASC);


CREATE UNIQUE INDEX `opis_UNIQUE` ON `lm`.`lm_sif_aktivnost` (`opis` ASC);



-- -----------------------------------------------------

-- Table `lm`.`lm_status_akt`

-- -----------------------------------------------------

DROP TABLE IF EXISTS `lm`.`lm_status_akt` ;


CREATE TABLE IF NOT EXISTS `lm`.`lm_status_akt` (

  `id` INT NOT NULL AUTO_INCREMENT,

  `sifra` VARCHAR(20) NOT NULL,

  `opis` VARCHAR(200) NOT NULL,

  PRIMARY KEY (`id`))

ENGINE = InnoDB;


CREATE UNIQUE INDEX `sifra_UNIQUE` ON `lm`.`lm_status_akt` (`sifra` ASC);



-- -----------------------------------------------------

-- Table `lm`.`lm_aktivnost`

-- -----------------------------------------------------

DROP TABLE IF EXISTS `lm`.`lm_aktivnost` ;


CREATE TABLE IF NOT EXISTS `lm`.`lm_aktivnost` (

  `id` INT NOT NULL AUTO_INCREMENT,

  `rb` INT NULL,

  `datum` DATE NULL,

  `napomena` VARCHAR(2000) NULL,

  `lm_lead_id` INT NOT NULL,

  `lm_sif_aktivnost_id` INT NOT NULL,

  `lm_status_akt_id` INT NOT NULL,

  PRIMARY KEY (`id`, `lm_status_akt_id`, `lm_sif_aktivnost_id`, `lm_lead_id`),

  CONSTRAINT `fk_lm_aktivnost_lm_lead1`

    FOREIGN KEY (`lm_lead_id`)

    REFERENCES `lm`.`lm_lead` (`id`)

    ON DELETE NO ACTION

    ON UPDATE NO ACTION,

  CONSTRAINT `fk_lm_aktivnost_lm_sif_aktivnost1`

    FOREIGN KEY (`lm_sif_aktivnost_id`)

    REFERENCES `lm`.`lm_sif_aktivnost` (`id`)

    ON DELETE NO ACTION

    ON UPDATE NO ACTION,

  CONSTRAINT `fk_lm_aktivnost_lm_status_akt1`

    FOREIGN KEY (`lm_status_akt_id`)

    REFERENCES `lm`.`lm_status_akt` (`id`)

    ON DELETE NO ACTION

    ON UPDATE NO ACTION)

ENGINE = InnoDB;


CREATE INDEX `fk_lm_aktivnost_lm_sif_aktivnost1_idx` ON `lm`.`lm_aktivnost` (`lm_sif_aktivnost_id` ASC);


CREATE INDEX `fk_lm_aktivnost_lm_status_akt1_idx` ON `lm`.`lm_aktivnost` (`lm_status_akt_id` ASC);


CREATE UNIQUE INDEX `rb_UNIQUE` ON `lm`.`lm_aktivnost` (`rb` ASC);


CREATE UNIQUE INDEX `lm_lead_id_UNIQUE` ON `lm`.`lm_aktivnost` (`lm_lead_id` ASC);



SET SQL_MODE=@OLD_SQL_MODE;

SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

