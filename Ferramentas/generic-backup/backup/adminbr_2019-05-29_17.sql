SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;


CREATE TABLE `admin_br_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO admin_br_phinxlog( `version`, `migration_name`, `start_time`, `end_time`, `breakpoint` ) VALUES
("20190524233434","AdminBr","2019-05-26 16:14:58","2019-05-26 16:14:58","0");




CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `phone` varchar(14) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `observation` text COLLATE utf8mb4_unicode_ci,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO customers( `id`, `name`, `birthday`, `phone`, `observation`, `created`, `modified` ) VALUES
("1","Brennan G. Wilcox","2016-04-15","(851) 190-1314","ante. Maecenas mi felis, adipiscing","",""),
("2","Chase Summers","2016-08-27","(846) 297-4733","Sed molestie. Sed id risus","",""),
("3","Sonia L. Mckay","2015-12-02","(131) 453-1690","fermentum vel, mauris. Integer sem","",""),
("4","Isadora L. Bowers","2015-10-24","(939) 798-4625","consequat, lectus sit amet luctus","",""),
("5","Sophia Cochran","2017-06-15","(811) 687-0491","Aliquam tincidunt, nunc ac mattis","",""),
("6","Maxwell T. Burton","2016-01-12","(147) 962-3265","at arcu. Vestibulum ante ipsum","",""),
("7","Desiree Y. Henry","2017-07-21","(148) 711-3747","vitae dolor. Donec fringilla. Donec","",""),
("8","Asher Key","2015-11-07","(355) 668-5871","a, aliquet vel, vulputate eu,","",""),
("9","Tyler Castro","2016-08-31","(567) 793-5061","nec tempus mauris erat eget","",""),
("10","Rudyard Weber","2015-10-26","(445) 457-4552","Morbi vehicula. Pellentesque tincidunt tempus","",""),
("11","Allen Austin","2016-04-15","(758) 867-2179","ipsum. Phasellus vitae mauris sit","",""),
("12","Octavius Cooper","2015-10-13","(101) 625-3985","ipsum non arcu. Vivamus sit","",""),
("13","Dustin M. Oneill","2016-04-24","(276) 722-0976","magnis dis parturient montes, nascetur","",""),
("14","Giacomo K. Horton","2016-07-03","(773) 532-7468","neque. Sed eget lacus. Mauris","",""),
("15","Signe T. Weaver","2016-06-17","(210) 895-3664","dui nec urna suscipit nonummy.","",""),
("16","Avram O. Delaney","2016-08-05","(609) 552-7572","Donec luctus aliquet odio. Etiam","",""),
("17","Cara Parker","2016-07-24","(854) 169-4797","ornare lectus justo eu arcu.","",""),
("18","Chelsea Mcclain","2016-08-06","(363) 636-1560","mollis lectus pede et risus.","",""),
("19","Wesley Garner","2016-06-11","(578) 231-2389","Fusce feugiat. Lorem ipsum dolor","",""),
("20","Irene P. Arnold","2016-02-12","(253) 631-9830","accumsan laoreet ipsum. Curabitur consequat,","",""),
("21","Austin S. Wall","2016-01-21","(225) 694-9511","Sed eget lacus. Mauris non","","");




CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO groups( `id`, `name`, `created`, `modified` ) VALUES
("1","Supers","2016-08-30 21:15:01","2016-08-30 21:15:01"),
("2","Admins","2016-08-30 21:15:01","2016-08-30 21:15:01"),
("3","Managers","2016-08-30 21:15:01","2016-08-30 21:15:01"),
("4","Users","2016-08-30 21:15:01","2016-08-30 21:15:01");




CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `controller` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_id` (`group_id`,`controller`,`action`),
  KEY `group_id_2` (`group_id`),
  CONSTRAINT `permissions_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO permissions( `id`, `group_id`, `controller`, `action`, `created`, `modified` ) VALUES
("1","1","AdminBr","index","",""),
("2","1","AdminBr","view","",""),
("3","1","AdminBr","add","",""),
("4","1","AdminBr","edit","",""),
("5","1","AdminBr","delete","",""),
("6","1","Customers","index","",""),
("7","1","Customers","view","",""),
("8","1","Customers","add","",""),
("9","1","Customers","edit","",""),
("10","1","Customers","delete","",""),
("11","1","Groups","index","",""),
("12","1","Groups","view","",""),
("13","1","Groups","add","",""),
("14","1","Groups","edit","",""),
("15","1","Groups","delete","",""),
("16","1","Permissions","index","",""),
("17","1","Permissions","view","",""),
("18","1","Permissions","add","",""),
("19","1","Permissions","edit","",""),
("20","1","Permissions","delete","",""),
("21","1","Users","index","",""),
("22","1","Users","view","",""),
("23","1","Users","add","",""),
("24","1","Users","edit","",""),
("25","1","Users","delete","",""),
("26","2","Groups","index","",""),
("27","2","Groups","view","",""),
("28","2","Groups","add","",""),
("29","2","Groups","edit","",""),
("30","2","Groups","delete","",""),
("31","2","Permissions","index","",""),
("32","2","Permissions","view","",""),
("33","2","Permissions","add","",""),
("34","2","Permissions","edit","",""),
("35","2","Permissions","delete","",""),
("36","2","Users","index","",""),
("37","2","Users","view","",""),
("38","2","Users","add","",""),
("39","2","Users","edit","",""),
("40","2","Users","delete","",""),
("41","3","AdminBr","index","",""),
("42","3","AdminBr","view","",""),
("43","3","AdminBr","add","",""),
("44","3","AdminBr","edit","",""),
("45","3","AdminBr","delete","",""),
("46","3","Customers","index","",""),
("47","3","Customers","view","",""),
("48","3","Customers","add","",""),
("49","3","Customers","edit","",""),
("50","3","Customers","delete","","");




CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users( `id`, `username`, `password`, `group_id`, `created`, `modified` ) VALUES
("1","super","$2y$10$JSDAQhVzicXNOPsiFxSqL.w0tAO6GDCxUMxR.uP3yWMYUTBtv6W8.","1","2016-09-15 15:57:16","2019-04-06 09:53:44"),
("2","admin","$2y$10$TGZG6d.9XCIh.y0qAuvNlupylnG7CR8fP7OvD1tGesNmbXdPLhyYi","2","2016-09-15 15:57:28","2019-05-24 20:33:02"),
("3","manager","$2y$10$fx0/o/XU3WPO5.nnP7cnCeSuFsFjxCMkk72DciLqABzHp50cOFnre","3","2016-09-15 15:57:39","2019-05-24 20:33:15"),
("4","user","$2y$10$BFj76H6cjH7D7pDxFFtEmu57HlJfKGPfmUEnl5zeRwxVtCMRCyxNG","4","2016-09-15 15:58:21","2019-05-24 20:33:31");


SET FOREIGN_KEY_CHECKS=1;
COMMIT;