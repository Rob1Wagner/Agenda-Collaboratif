-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 12, 2019 at 06:55 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `l2_gr3`
--

-- --------------------------------------------------------

--
-- Table structure for table `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createur` int(11) DEFAULT NULL,
  `nom` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `idGroupe` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `createur` (`createur`) USING BTREE,
  KEY `idGroupe` (`idGroupe`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evenement`
--

INSERT INTO `evenement` (`id`, `createur`, `nom`, `description`, `debut`, `fin`, `idGroupe`) VALUES
(1, 15, 'associe', 'grgr', '2019-04-03 16:44:00', '2019-04-04 05:55:00', NULL),
(2, 14, 'ski', 'dzaazd', '2019-04-03 16:44:00', '2019-04-04 05:55:00', NULL),
(3, 13, 'aza', 'zrfr', '2019-04-18 16:44:00', '2019-04-19 20:08:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `evenementgroupe`
--

DROP TABLE IF EXISTS `evenementgroupe`;
CREATE TABLE IF NOT EXISTS `evenementgroupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEvenement` int(11) NOT NULL,
  `idGroupe` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idEvenement` (`idEvenement`),
  KEY `idGroupe` (`idGroupe`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `evenementgroupe`
--

INSERT INTO `evenementgroupe` (`id`, `idEvenement`, `idGroupe`) VALUES
(2, 1, 30),
(3, 2, 31),
(4, 3, 31),
(5, 2, 30);

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `createur` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `createur` (`createur`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupe`
--

INSERT INTO `groupe` (`id`, `nom`, `createur`) VALUES
(30, 'groupeski', 14),
(31, 'fernandoc', 13),
(32, 'ferds', 13);

-- --------------------------------------------------------

--
-- Table structure for table `invitationgroupe`
--

DROP TABLE IF EXISTS `invitationgroupe`;
CREATE TABLE IF NOT EXISTS `invitationgroupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idGroupe` int(11) NOT NULL,
  `responsable` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`),
  KEY `idGroupe` (`idGroupe`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUserEvenement` int(11) NOT NULL,
  `texte` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUserEvenement` (`idUserEvenement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `prenom`, `nom`, `mdp`, `mail`) VALUES
(13, 'hamze', 'hamze', 'hamze', 'hamze@hamze'),
(14, 'robin', 'robin', 'robin', 'robin@robin'),
(15, 'remi', 'remi', 'remi', 'remi@remi');

-- --------------------------------------------------------

--
-- Table structure for table `userevenement`
--

DROP TABLE IF EXISTS `userevenement`;
CREATE TABLE IF NOT EXISTS `userevenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEvenement` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `importance` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`),
  KEY `idEvenement` (`idEvenement`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usergroupe`
--

DROP TABLE IF EXISTS `usergroupe`;
CREATE TABLE IF NOT EXISTS `usergroupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idGroupe` int(11) NOT NULL,
  `responsable` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idGroupeId` (`idUser`),
  KEY `idGroupe` (`idGroupe`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usergroupe`
--

INSERT INTO `usergroupe` (`id`, `idUser`, `idGroupe`, `responsable`) VALUES
(54, 13, 30, 1),
(56, 15, 31, 1),
(60, 15, 32, 1),
(61, 13, 31, 1),
(62, 14, 31, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evenement`
--
ALTER TABLE `evenement`
  ADD CONSTRAINT `evenement_ibfk_1` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`id`);

--
-- Constraints for table `evenementgroupe`
--
ALTER TABLE `evenementgroupe`
  ADD CONSTRAINT `evenementgroupe_ibfk_1` FOREIGN KEY (`idEvenement`) REFERENCES `evenement` (`id`),
  ADD CONSTRAINT `evenementgroupe_ibfk_2` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`id`);

--
-- Constraints for table `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `groupe_ibfk_1` FOREIGN KEY (`createur`) REFERENCES `user` (`id`);

--
-- Constraints for table `invitationgroupe`
--
ALTER TABLE `invitationgroupe`
  ADD CONSTRAINT `invitationgroupe_ibfk_1` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`id`),
  ADD CONSTRAINT `invitationgroupe_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `notification_ibfk_1` FOREIGN KEY (`idUserEvenement`) REFERENCES `userevenement` (`id`);

--
-- Constraints for table `userevenement`
--
ALTER TABLE `userevenement`
  ADD CONSTRAINT `userevenement_ibfk_1` FOREIGN KEY (`idEvenement`) REFERENCES `evenement` (`id`),
  ADD CONSTRAINT `userevenement_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Constraints for table `usergroupe`
--
ALTER TABLE `usergroupe`
  ADD CONSTRAINT `usergroupe_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `usergroupe_ibfk_3` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
