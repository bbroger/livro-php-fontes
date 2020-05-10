
CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `name` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `name`, `email`) VALUES
(1, 'yssyogesh', 'Yogesh Singh', 'yogesh@makitweb.com'),
(2, 'sona', 'Sonarika Bhadoria', 'bsonarika@makitweb.com'),
(3, 'vishal', 'Vishal Sahu', 'vishal@makitweb.com'),
(4, 'sunil', 'Sunil singh', 'sunil@makitweb.com'),
(5, 'vijay', 'Vijay mourya', 'vijay@makitweb.com'),
(6, 'anil', 'Anil singh', 'anil@makitweb.com'),
(7, 'jiten', 'jitendra singh', 'jiten@makitweb.com');
