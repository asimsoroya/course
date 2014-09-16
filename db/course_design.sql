SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `course_design` ;
CREATE SCHEMA IF NOT EXISTS `course_design` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `course_design` ;

-- -----------------------------------------------------
-- Table `course_design`.`course_category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `course_design`.`course_category` ;

CREATE TABLE IF NOT EXISTS `course_design`.`course_category` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` TEXT NOT NULL,
  `description` TEXT NULL,
  `parent_id` BIGINT UNSIGNED NULL,
  `node_left` INT UNSIGNED NULL,
  `node_right` INT UNSIGNED NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `course_design`.`book_category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `course_design`.`book_category` ;

CREATE TABLE IF NOT EXISTS `course_design`.`book_category` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` TEXT NOT NULL,
  `description` TEXT NULL,
  `parent_category` BIGINT UNSIGNED NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_parent_category0`
    FOREIGN KEY (`parent_category`)
    REFERENCES `course_design`.`book_category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `idx_parent_category` ON `course_design`.`book_category` (`parent_category` ASC);


-- -----------------------------------------------------
-- Table `course_design`.`book`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `course_design`.`book` ;

CREATE TABLE IF NOT EXISTS `course_design`.`book` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` TEXT NULL,
  `description` TEXT NULL,
  `category` BIGINT UNSIGNED NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_book_bookcategory1`
    FOREIGN KEY (`category`)
    REFERENCES `course_design`.`book_category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `idx_book_bookcategory1` ON `course_design`.`book` (`category` ASC);


-- -----------------------------------------------------
-- Table `course_design`.`table_of_contents`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `course_design`.`table_of_contents` ;

CREATE TABLE IF NOT EXISTS `course_design`.`table_of_contents` (
  `id` BIGINT UNSIGNED NOT NULL,
  `name` TEXT NULL,
  `description` VARCHAR(45) NULL,
  `bookid` BIGINT UNSIGNED NULL,
  `leveldepth` INT UNSIGNED NULL,
  `parentlevel` BIGINT NULL COMMENT 'Parent entry of table of content ',
  `level_left` BIGINT UNSIGNED NULL,
  `level_right` BIGINT UNSIGNED NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_tableofcontents_book1`
    FOREIGN KEY (`bookid`)
    REFERENCES `course_design`.`book` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `idx_tableofcontents_book1` ON `course_design`.`table_of_contents` (`bookid` ASC);


-- -----------------------------------------------------
-- Table `course_design`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `course_design`.`user` ;

CREATE TABLE IF NOT EXISTS `course_design`.`user` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `user_name` VARCHAR(400) NULL,
  `password` VARCHAR(45) NULL,
  `secret_question` TEXT NULL,
  `secret_answer` TEXT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `course_design`.`course`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `course_design`.`course` ;

CREATE TABLE IF NOT EXISTS `course_design`.`course` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` TEXT NULL,
  `description` TEXT NULL,
  `prerent_id` BIGINT UNSIGNED NULL,
  `category_id` BIGINT UNSIGNED NULL,
  `designer_id` BIGINT UNSIGNED NULL,
  `likes` INT NULL,
  `left` INT UNSIGNED NULL,
  `right` INT UNSIGNED NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_course_coursecategory1`
    FOREIGN KEY (`category_id`)
    REFERENCES `course_design`.`course_category` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_course_user1`
    FOREIGN KEY (`designer_id`)
    REFERENCES `course_design`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `ind_course_coursecategory1` ON `course_design`.`course` (`category_id` ASC);

CREATE INDEX `ind_course_user1` ON `course_design`.`course` (`designer_id` ASC);


-- -----------------------------------------------------
-- Table `course_design`.`course_section`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `course_design`.`course_section` ;

CREATE TABLE IF NOT EXISTS `course_design`.`course_section` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` TEXT NULL,
  `descripiton` TEXT NULL,
  `entry_type` VARCHAR(20) NULL,
  `course_id` BIGINT UNSIGNED NULL,
  `content` BLOB NULL COMMENT 'This column should provide storage to the entry means uploaded file video or image',
  `referred_entry_id` BIGINT UNSIGNED NULL COMMENT 'This is soft foreign key pointing to any linked entry like it can point to a book record or any record in table.',
  `parent_id` BIGINT NULL COMMENT 'Parent section',
  `left` INT NULL,
  `right` INT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_course_entry_course1`
    FOREIGN KEY (`course_id`)
    REFERENCES `course_design`.`course` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `idx_course_entry_course1` ON `course_design`.`course_section` (`course_id` ASC);


-- -----------------------------------------------------
-- Table `course_design`.`term`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `course_design`.`term` ;

CREATE TABLE IF NOT EXISTS `course_design`.`term` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` TEXT NULL,
  `description` TEXT NULL,
  `duration` VARCHAR(20) NULL COMMENT 'Duration of term means day month quarter year',
  `start_date` DATETIME NULL,
  `end_date` DATETIME NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `course_design`.`term_course`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `course_design`.`term_course` ;

CREATE TABLE IF NOT EXISTS `course_design`.`term_course` (
  `id` BIGINT NOT NULL,
  `course_id` BIGINT UNSIGNED NULL,
  `term_id` BIGINT UNSIGNED NULL,
  `is_mandatory` TINYINT NULL,
  `credit_hour` INT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_term_course_course1`
    FOREIGN KEY (`course_id`)
    REFERENCES `course_design`.`course` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_term_course_term1`
    FOREIGN KEY (`term_id`)
    REFERENCES `course_design`.`term` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE UNIQUE INDEX `id_UNIQUE` ON `course_design`.`term_course` (`id` ASC);

CREATE INDEX `idx_term_course_course1` ON `course_design`.`term_course` (`course_id` ASC);

CREATE INDEX `idx_term_course_term1` ON `course_design`.`term_course` (`term_id` ASC);


-- -----------------------------------------------------
-- Table `course_design`.`course_designer`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `course_design`.`course_designer` ;

CREATE TABLE IF NOT EXISTS `course_design`.`course_designer` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` BIGINT UNSIGNED NULL,
  `description` TEXT NULL,
  `facebook_page` VARCHAR(255) NULL,
  `linkedin_profile` VARCHAR(400) NULL,
  `twitter_account` VARCHAR(400) NULL,
  `course_designer` BIGINT UNSIGNED NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_course_designer_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `course_design`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `ind_course_designer_user1` ON `course_design`.`course_designer` (`user_id` ASC);


-- -----------------------------------------------------
-- Table `course_design`.`course_comments`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `course_design`.`course_comments` ;

CREATE TABLE IF NOT EXISTS `course_design`.`course_comments` (
  `id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `comments` TEXT NULL,
  `course_id` BIGINT UNSIGNED NULL,
  `user_id` BIGINT UNSIGNED NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_course_comments_course1`
    FOREIGN KEY (`course_id`)
    REFERENCES `course_design`.`course` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_course_comments_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `course_design`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `ind_course_comments_course1` ON `course_design`.`course_comments` (`course_id` ASC);

CREATE INDEX `ind_course_comments_user1` ON `course_design`.`course_comments` (`user_id` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
