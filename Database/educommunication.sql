-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2016 at 04:37 PM
-- Server version: 10.1.14-MariaDB
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `educommunication`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

DROP TABLE IF EXISTS `korisnici`;
CREATE TABLE IF NOT EXISTS `korisnici` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `cover` varchar(255) DEFAULT NULL,
  `skola` tinyint(4) NOT NULL DEFAULT '1',
  `razred` smallint(4) NOT NULL,
  `smjer` tinyint(1) DEFAULT NULL,
  `registracija` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `prezime`, `password`, `salt`, `email`, `avatar`, `cover`, `skola`, `razred`, `smjer`, `registracija`) VALUES
(1, 'Kerim', 'Campara', 'ffe6ea6b5e7f9ab507cf86a20f1a361c', 'd05b50bbe01ce9a81f2b7745f6cd525a6807f03cec75d64986e75619383314e4', 'kerimcampara@gmail.com', 'https://scontent-frt3-1.xx.fbcdn.net/v/t1.0-9/10276060_675402102495502_5123915577726532750_n.jpg?oh=838d16aa5cd1c084655a541da4c33868&oe=585F877E', 'https://s-media-cache-ak0.pinimg.com/originals/10/4f/42/104f42063d23673085a01333abd905f7.png', 1, 3, 1, 1476129372);

-- --------------------------------------------------------

--
-- Table structure for table `prijatelji`
--

DROP TABLE IF EXISTS `prijatelji`;
CREATE TABLE IF NOT EXISTS `prijatelji` (
  `korisnik_1` int(11) NOT NULL,
  `korisnik_2` int(11) NOT NULL,
  `stanje` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sesije`
--

DROP TABLE IF EXISTS `sesije`;
CREATE TABLE IF NOT EXISTS `sesije` (
  `id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ip` varchar(25) NOT NULL,
  `expires_at` int(11) NOT NULL,
  `browser` varchar(30) NOT NULL,
  `version` varchar(25) NOT NULL,
  `os` varchar(30) NOT NULL,
  `useragent` varchar(255) NOT NULL,
  `created` int(11) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sesije`
--

INSERT INTO `sesije` (`id`, `user_id`, `ip`, `expires_at`, `browser`, `version`, `os`, `useragent`, `created`) VALUES
('%4Kqt1476527008%SHpCN', 1, '::1', 1538735008, 'Google Chrome', '53.0.2785.89', 'Windows 8.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.89 Safari/537.36', 1476527008),
('){9Z#1476527371JYEZu}', 1, '::1', 1538735371, 'Google Chrome', '53.0.2785.89', 'Windows 8.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.89 Safari/537.36', 1476527371),
('6dtZ91476271551$ceEIe', 1, '::1', 1538479551, 'Google Chrome', '53.0.2785.89', 'Windows 8.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.89 Safari/537.36', 1476271551),
('aBvoK1476271704E8$cVZ', 1, '::1', 1538479704, 'Google Chrome', '53.0.2785.89', 'Windows 8.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.89 Safari/537.36', 1476271704),
('gpO}{147724492963CWW1', 1, '::1', 1539452929, 'Mozilla Firefox', '47.0', 'Windows 8.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 1477244929),
('Om$XC1476268995c6OyPA', 1, '::1', 1538476995, 'Google Chrome', '53.0.2785.89', 'Windows 8.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.89 Safari/537.36', 1476268995),
('PQaoY1477244934cciU7y', 1, '::1', 1539452934, 'Mozilla Firefox', '47.0', 'Windows 8.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 1477244934),
('QXcs41476271550XE=IFJ', 1, '::1', 1538479550, 'Google Chrome', '53.0.2785.89', 'Windows 8.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.89 Safari/537.36', 1476271550),
('R$JXR1476268757{Qx7s#', 1, '', 1538476757, 'Google Chrome', '', 'Windows 8.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.89 Safari/537.36', 1476268757),
('r2ogS1476481185O7vBQM', 1, '::1', 1538689185, 'Google Chrome', '53.0.2785.89', 'Windows 8.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.89 Safari/537.36', 1476481185),
('sIW&k1476473755Lt28Wt', 1, '::1', 1538681755, 'Google Chrome', '53.0.2785.89', 'Windows 8.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.89 Safari/537.36', 1476473755),
('w=0cc1477244946$XX8p5', 1, '::1', 1539452946, 'Mozilla Firefox', '47.0', 'Windows 8.1', 'Mozilla/5.0 (Windows NT 6.3; WOW64; rv:47.0) Gecko/20100101 Firefox/47.0', 1477244946),
('z%sgt147635068394PsT(', 1, '::1', 1538558683, 'Google Chrome', '53.0.2785.89', 'Windows 8.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.89 Safari/537.36', 1476350683),
('{Znh=1476386703D3nOf}', 1, '::1', 1538594703, 'Google Chrome', '53.0.2785.89', 'Windows 8.1', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/53.0.2785.89 Safari/537.36', 1476386703);

-- --------------------------------------------------------

--
-- Table structure for table `skole`
--

DROP TABLE IF EXISTS `skole`;
CREATE TABLE IF NOT EXISTS `skole` (
  `id` smallint(7) NOT NULL AUTO_INCREMENT,
  `naziv` varchar(255) NOT NULL,
  `drzava` varchar(128) NOT NULL,
  `grad` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `skole`
--

INSERT INTO `skole` (`id`, `naziv`, `drzava`, `grad`) VALUES
(1, 'Srednja Elektrotehnicka Skola', 'Bosna i Hercegovina', 'Sarajevo');

-- --------------------------------------------------------

--
-- Table structure for table `smjerovi`
--

DROP TABLE IF EXISTS `smjerovi`;
CREATE TABLE IF NOT EXISTS `smjerovi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_skole` smallint(7) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `smjerovi`
--

INSERT INTO `smjerovi` (`id`, `id_skole`, `naziv`) VALUES
(1, 1, 'Racunarstvo i Informatika'),
(2, 1, 'Telekomunikacije'),
(3, 1, 'Automatika i Elektronika'),
(4, 1, 'RTV tehnicar'),
(5, 1, 'Telekomunikacije sa marketingom');

-- --------------------------------------------------------

--
-- Table structure for table `statusi`
--

DROP TABLE IF EXISTS `statusi`;
CREATE TABLE IF NOT EXISTS `statusi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poster` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `lajkovi` int(11) NOT NULL,
  `komentari` int(11) NOT NULL,
  `tekst` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `statusi`
--

INSERT INTO `statusi` (`id`, `poster`, `timestamp`, `lajkovi`, `komentari`, `tekst`) VALUES
(1, 1, 1477775326, 1, 2, 'Nesta nesta nesta sta ne nessta tsta :D :) :P www.google.com xD hahahaha'),
(2, 1, 1477775326, 1, 2, 'Nesta nesta nesta sta ne nessta tsta :D :) :P www.google.com xD hahahaha');

-- --------------------------------------------------------

--
-- Table structure for table `stranica`
--

DROP TABLE IF EXISTS `stranica`;
CREATE TABLE IF NOT EXISTS `stranica` (
  `tip` varchar(100) NOT NULL,
  `vrijednost` float NOT NULL,
  PRIMARY KEY (`tip`),
  UNIQUE KEY `tip` (`tip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stranica`
--

INSERT INTO `stranica` (`tip`, `vrijednost`) VALUES
('execution', 0.0241);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
