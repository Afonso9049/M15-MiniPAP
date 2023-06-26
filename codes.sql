CREATE TABLE IF NOT EXISTS `users_has_funcao` (
  `users_id` INT NOT NULL,
  `funcao_id` INT NOT NULL,
  PRIMARY KEY (`users_id`, `funcao_id`),
  CONSTRAINT `fk_users_has_funcao_users`
    FOREIGN KEY (`users_id`)
    REFERENCES `users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_funcao_funcao1`
    FOREIGN KEY (`funcao_id`)
    REFERENCES `funcao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
) DEFAULT CHARACTER SET = latin1;
--------------------------------------------------------------

CREATE TABLE IF NOT EXISTS `funcao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `descricao` VARCHAR(300) NULL,
  PRIMARY KEY (`id`)
);

------------------------------------------------------------

CREATE DATABASE `db_2i_9049_loginsystem`;

USE `db_2i_9049_loginsystem`;

CREATE TABLE `users` (
  `id` int(11) AUTO_INCREMENT PRIMARY KEY,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL
);