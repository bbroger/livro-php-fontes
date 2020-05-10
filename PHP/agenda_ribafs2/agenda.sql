DROP TABLE IF EXISTS `amigos`;
CREATE TABLE `amigos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` char(50) NOT NULL,
  `email` char(60) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `fone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `obs` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT;

INSERT INTO `amigos` (`id`, `nome`, `email`, `nascimento`, `endereco`, `fone`, `celular`, `obs`) VALUES
(3,	'Ribamar Ferreira de Sousa',	'ola@ribafs.org',	'1956-08-03',	'Rua vasco da gama, 538, Montese',	'3491-2786',	'',	'Obs'),
(4,	'Tiago Evangelista Ferreira',	'tiagoef92@gmail.com',	'1992-06-12',	'Rua vasco da gama, 538',	'3491-2786',	'',	'');

DROP TABLE IF EXISTS `compromissos`;
CREATE TABLE `compromissos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` char(50) NOT NULL,
  `compromisso` text NOT NULL,
  `data` date NOT NULL,
  `obs` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT;

