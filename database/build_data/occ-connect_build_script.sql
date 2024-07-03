-- ----------------------------------------------------------------------------
-- MySQL Workbench Migration
-- Migrated Schemata: geary
-- Source Schemata: geary
-- Created: Tue Jul  2 17:18:53 2024
-- Workbench Version: 8.0.36
-- ----------------------------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------------------------------------------------------
-- Schema geary
-- ----------------------------------------------------------------------------
DROP SCHEMA IF EXISTS `occ-connect` ;
CREATE SCHEMA IF NOT EXISTS `occ-connect` ;

-- ----------------------------------------------------------------------------
-- Table geary.comments
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `occ-connect`.`comments` (
  `comment_id` INT(11) NOT NULL AUTO_INCREMENT,
  `thread_id` INT(11) NOT NULL,
  `body` VARCHAR(500) NOT NULL,
  `post_date` DATETIME NOT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`comment_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table geary.forums
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `occ-connect`.`forums` (
  `forum_id` INT(11) NOT NULL AUTO_INCREMENT,
  `forum_name` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`forum_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table geary.threads
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `occ-connect`.`threads` (
  `thread_id` INT(11) NOT NULL AUTO_INCREMENT,
  `forum_id` INT(11) NULL DEFAULT NULL,
  `thread_name` VARCHAR(100) NULL DEFAULT NULL,
  `body` VARCHAR(3000) NULL DEFAULT NULL,
  `post_date` DATETIME NULL DEFAULT NULL,
  `user_id` INT(11) NOT NULL,
  PRIMARY KEY (`thread_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 19
DEFAULT CHARACTER SET = latin1;

-- ----------------------------------------------------------------------------
-- Table geary.users
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `occ-connect`.`users` (
  `user_name` VARCHAR(30) NOT NULL,
  `last_name` VARCHAR(30) NOT NULL,
  `first_name` VARCHAR(30) NOT NULL,
  `date_joined` DATE NOT NULL,
  `last_login` DATETIME NULL DEFAULT NULL,
  `user_passwd` CHAR(40) NOT NULL,
  `email` CHAR(40) NOT NULL,
  `profile_pic` VARCHAR(255) NULL DEFAULT NULL,
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`user_id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = latin1;
SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO `occ-connect`.`forums` (`forum_name`)
VALUES ('Anouncments');
INSERT INTO `occ-connect`.`forums` (`forum_name`)
VALUES ('HW Help');
INSERT INTO `occ-connect`.`forums` (`forum_name`)
VALUES ('Discussion');