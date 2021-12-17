CREATE SCHEMA IF NOT EXISTS `ifc` DEFAULT CHARACTER SET utf8mb4 ;
USE `ifc` ;


CREATE TABLE `ifc`.`salto` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(45) NOT NULL,
  `nota1` double NOT NULL,
  `nota2` double NOT NULL,
  `nota3` double NOT NULL,
  `nota4` double NOT NULL,
  `nota5` double NOT NULL,
  `nascimento` date NOT NULL,
  PRIMARY KEY (`id`)
  )ENGINE=InnoDB DEFAULT CHARSET=UTF8;

  INSERT INTO `ifc`.`salto` (`nome`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `nascimento`) VALUES ('Hannah', '7.6', '4.6', '9.8', '10', '7.5', '2004-05-23');
  INSERT INTO `ifc`.`salto` (`nome`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `nascimento`) VALUES ('João', '6.2', '4.5', '3.7', '10', '9.7', '2000-10-23');
  INSERT INTO `ifc`.`salto` (`nome`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `nascimento`) VALUES ('Pedro', '5', '6', '9', '2', '1', '1965-12-31');
  INSERT INTO `ifc`.`salto` (`nome`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `nascimento`) VALUES ('Júlio', '8.9', '3.4', '2.4', '1.2', '10', '2008-05-11');
  INSERT INTO `ifc`.`salto` (`nome`, `nota1`, `nota2`, `nota3`, `nota4`, `nota5`, `nascimento`) VALUES ('Garibaldo', '7.9', '10', '3.1', '5', '9', '1978-02-22');
