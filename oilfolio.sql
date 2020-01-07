-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Σύστημα: localhost
-- Χρόνος δημιουργίας: 21 Ιουνίου 2018 στις 18:18:15
-- Έκδοση Διακομιστή: 5.1.53
-- Έκδοση PHP: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Βάση: `oilfolio`
--

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `oil_stations`
--

CREATE TABLE IF NOT EXISTS `oil_stations` (
  `id_st` int(10) NOT NULL AUTO_INCREMENT,
  `st_name` varchar(25) NOT NULL,
  `phone` varchar(25) CHARACTER SET latin1 NOT NULL,
  `city` varchar(20) NOT NULL,
  `address` varchar(25) NOT NULL,
  `longitude` varchar(25) CHARACTER SET latin1 NOT NULL,
  `latitude` varchar(25) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_st`),
  UNIQUE KEY `st_name` (`st_name`),
  UNIQUE KEY `st_name_2` (`st_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Άδειασμα δεδομένων του πίνακα `oil_stations`
--

INSERT INTO `oil_stations` (`id_st`, `st_name`, `phone`, `city`, `address`, `longitude`, `latitude`) VALUES
(1, 'Ελαιοτριβείο Αχαΐας', '2610324166', 'Πάτρα', 'Ανδρικοπούλου 11', '21.775617702127647', '38.31614072506796'),
(2, 'Ελαιοτριβείο Αρκαδίας', '2610355855', 'Τρίπολη', 'Κολοκοτρώνη 13', '22.372631966033396', '37.51001348114702'),
(3, 'Ελαιοτριβείο Αιγίου', '2610332018', 'Αίγιο', 'Αιγίου 15', '22.09238866406247', '38.22595758136105'),
(4, 'Ελαιοτριβείο Αγρινίου', '2622041578', 'Αγρίνιο', 'Αγρινίου 13', '21.408751356082007', '38.62243470047533'),
(5, 'Ελαιοτριβείο Λαρίσης', '225041741', 'Λάρισα', 'Λάρισας 28 ', '22.452209897565126', '39.599789832218505'),
(6, 'Ελαιοτριβείο Βάρδας', '261541555', 'Βάρδα', 'Βάρδα 2', '21.35081151562497', '38.012036722206936');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id_pr` int(10) NOT NULL AUTO_INCREMENT,
  `pr_name` varchar(25) NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`id_pr`),
  UNIQUE KEY `pr_name` (`pr_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Άδειασμα δεδομένων του πίνακα `products`
--

INSERT INTO `products` (`id_pr`, `pr_name`, `description`) VALUES
(3, 'Παρθένο Ελαιόλαδο', 'Οξύτητα 0.1% γνήσιο.'),
(4, 'Άγουρο Ελαιόλαδο', 'Οξύτητα 0.5% ξινό.'),
(5, 'Έξτρα παρθένο Ελαιόλαδο', 'Οξύτητα 0.1% Α΄ποιότητος.'),
(6, 'Λαμπάντε Ελαιόλαδο', 'Οξύτητα 1.2% για καθημερινή χρήση.'),
(7, 'Μούργα Ελαιόλαδου', 'Οξύτητα 20% για ειδικές χρήσεις.');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
  `id_sale` int(10) NOT NULL AUTO_INCREMENT,
  `date1` datetime NOT NULL,
  `email` varchar(25) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(25) NOT NULL,
  `id_st` int(10) NOT NULL,
  `id_pr` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` varchar(25) NOT NULL,
  PRIMARY KEY (`id_sale`),
  KEY `saleoilst` (`id_st`),
  KEY `prodsale` (`id_pr`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Άδειασμα δεδομένων του πίνακα `sales`
--

INSERT INTO `sales` (`id_sale`, `date1`, `email`, `phone`, `id_st`, `id_pr`, `quantity`, `price`) VALUES
(15, '2018-06-11 20:01:40', 'admin@admin.gr', '2610332018', 1, 3, 150, '750'),
(11, '2018-06-11 19:51:55', 'apostolo-d@hotmail.com', '6978054717', 1, 3, 150, '750'),
(12, '2018-06-11 19:53:40', 'apostolo-d@hotmail.com', '6978054717', 1, 5, 150, '1500'),
(13, '2018-06-11 19:55:10', 'apostolo-d@hotmail.com', '2610332018', 1, 3, 150, '750'),
(14, '2018-06-11 20:00:47', 'apostolo-d@hotmail.com', '6978054717', 1, 3, 150, '750'),
(10, '2018-06-11 19:49:41', 'apostolo-d@hotmail.com', '6978054717', 1, 3, 150, '750'),
(16, '2018-06-11 20:02:08', 'apostolo-d@hotmail.com', '6978054717', 1, 3, 150, '750'),
(17, '2018-06-11 20:13:17', 'apostolo-d@hotmail.com', '6978054717', 1, 4, 200, '600'),
(18, '2018-06-11 20:16:05', 'apostolo-d@hotmail.com', '2610332018', 1, 5, 150, '1500'),
(19, '2018-06-11 20:44:10', 'user@user.gr', '6978054717', 1, 3, 200, '1000'),
(20, '2018-06-16 12:01:13', 'admin@admin.gr', '2610332018', 2, 7, 200, '400'),
(21, '2018-06-19 16:53:41', 'd@in.gr', '2610332018', 1, 4, 200, '600');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `station_product`
--

CREATE TABLE IF NOT EXISTS `station_product` (
  `id_st_pr` int(10) NOT NULL AUTO_INCREMENT,
  `id_st` int(10) NOT NULL,
  `id_pr` int(10) NOT NULL,
  `quantity` int(20) DEFAULT NULL,
  `cost_per_kilo` int(10) DEFAULT NULL,
  `st_bank` varchar(25) NOT NULL,
  PRIMARY KEY (`id_st_pr`),
  UNIQUE KEY `id_pr` (`id_pr`),
  UNIQUE KEY `id_pr_2` (`id_pr`),
  KEY `prostpr` (`id_pr`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Άδειασμα δεδομένων του πίνακα `station_product`
--

INSERT INTO `station_product` (`id_st_pr`, `id_st`, `id_pr`, `quantity`, `cost_per_kilo`, `st_bank`) VALUES
(1, 1, 3, 2300, 5, '2500'),
(2, 1, 5, 1000, 10, '1500'),
(4, 1, 4, 4800, 3, '1200'),
(6, 2, 7, 1800, 2, '400');

-- --------------------------------------------------------

--
-- Δομή Πίνακα για τον Πίνακα `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_usr` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(25) DEFAULT NULL,
  `type` enum('user','admin') DEFAULT NULL,
  `id_st` int(10) NOT NULL,
  PRIMARY KEY (`id_usr`),
  UNIQUE KEY `username` (`username`),
  KEY `usroilst` (`id_st`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`id_usr`, `username`, `password`, `type`, `id_st`) VALUES
(1, 'admin', 'admin', 'admin', 0),
(2, 'user', 'user', 'user', 1),
(3, 'user1', 'user1', 'user', 2),
(30, 'polyd', '1234', 'user', 2),
(5, 'dionysios', '1234', 'user', 2),
(16, 'apostolopo', '1234', 'user', 1),
(33, 'user3', 'user3', 'user', 6);
