CREATE TABLE `customers` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

INSERT INTO `customers` (`id`, `name`, `email`) VALUES
(1, 'Jim Connor', 'jimconnor@yahoo.com'),
(2, 'Mark Higgins', 'mark.higgins21@yahoo.com'),
(3, 'Austin Joseph', 'austin.joseph.boston@gmail.com'),
(4, 'Sean Kennedy', 'seankennedy01@gmail.com'),
(5, 'Rose Harris', 'roseharris@gmail.com'),
(6, 'Lilly Whites', 'lillywhites@outlook.com'),
(7, 'Jennifer Winters', 'jennie.winters001@gmail.com'),
(8, 'Michael Bruce', 'michaelbruce78@yahoo.com'),
(9, 'John Alex', 'johnalex@example.com'),
(10, 'Demi Milan', 'demimilan@gmail.com'),
(11, 'Austin Joseph', 'austin.joseph.boston@gmail.com'),
(12, 'Mark Higgins', 'mark.higgins21@yahoo.com'),
(13, 'Sean Kennedy', 'seankennedy.boss@outlook.com');
