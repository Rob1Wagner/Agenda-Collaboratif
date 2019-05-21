-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 21-05-2019 a las 15:32:47
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `l2_gr3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evenement`
--

DROP TABLE IF EXISTS `evenement`;
CREATE TABLE IF NOT EXISTS `evenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `createur` int(11) DEFAULT NULL,
  `nom` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `debut` datetime NOT NULL,
  `fin` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `createur` (`createur`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evenement`
--

INSERT INTO `evenement` (`id`, `createur`, `nom`, `description`, `debut`, `fin`) VALUES
(47, 13, 'Projet MARTY : BDD', 'la crÃ©ation de la base de donnÃ©es', '2019-05-23 12:00:00', '2019-05-23 17:00:00'),
(48, 13, 'Projet MARTY : Brain storming', 'Echange d\'idÃ©es sur le project.', '2019-05-22 12:00:00', '2019-05-22 17:00:00'),
(49, 13, 'Projet MARTY : Architecture et dÃ©but de conception de l\'application', 'Mise en place de l\'architecture globale du projet + dÃ©but de conception s\'il reste du temps.', '2019-05-24 12:00:00', '2019-05-24 17:00:00'),
(50, 13, 'PrÃ©sentation', 'c\'est une prÃ©sentation du project Marty en prÃ©sence du groupe responsable et du chef d\'entreprise.\r\nAdresse: Vanoise, USMB, campus scientifique du Bourget-du-Lac 73370 France, Europe, PlanÃ¨te Terre, Voie LactÃ©e, oeil d\'un gÃ©ant aux yeux bleus.', '2019-05-27 12:00:00', '2019-05-27 17:00:00'),
(52, 18, 'ouloulou', 'FTRHTRY', '2019-05-25 12:00:00', '2019-05-25 17:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evenementgroupe`
--

DROP TABLE IF EXISTS `evenementgroupe`;
CREATE TABLE IF NOT EXISTS `evenementgroupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idEvenement` int(11) NOT NULL,
  `idGroupe` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idEvenement` (`idEvenement`),
  KEY `idGroupe` (`idGroupe`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `evenementgroupe`
--

INSERT INTO `evenementgroupe` (`id`, `idEvenement`, `idGroupe`) VALUES
(17, 50, 52),
(18, 47, 52),
(19, 48, 52),
(20, 49, 52);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `createur` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `createur` (`createur`),
  KEY `admin` (`admin`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `groupe`
--

INSERT INTO `groupe` (`id`, `nom`, `createur`, `admin`) VALUES
(50, 'TEST', 13, 13),
(51, 'RTT', 16, 16),
(52, 'projet', 13, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitationevenement`
--

DROP TABLE IF EXISTS `invitationevenement`;
CREATE TABLE IF NOT EXISTS `invitationevenement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `idEvenement` int(11) NOT NULL,
  `importance` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`),
  KEY `idEvenement` (`idEvenement`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitationgroupe`
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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `invitationgroupe`
--

INSERT INTO `invitationgroupe` (`id`, `idUser`, `idGroupe`, `responsable`) VALUES
(19, 16, 50, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expediteur` int(11) NOT NULL,
  `destinataire` int(11) NOT NULL,
  `sujet` text NOT NULL,
  `message` text NOT NULL,
  `lu` tinyint(2) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `expediteur` (`expediteur`),
  KEY `destinataire` (`destinataire`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `message`
--

INSERT INTO `message` (`id`, `expediteur`, `destinataire`, `sujet`, `message`, `lu`) VALUES
(4, 13, 14, 'lolo', 'zdazdaz', 1),
(19, 13, 16, 'test', 'test', NULL),
(20, 13, 16, 'TEST2', 'TEST2', NULL),
(22, 16, 14, 'SMSGroupeJOnthanROBIN', '1', 1),
(23, 16, 16, 'testJonathan', '1', NULL),
(25, 16, 16, 'Prueba', 'este es un mensaje', NULL),
(26, 16, 16, 'test23', '12', NULL),
(27, 16, 16, 'ty', 'ty', NULL),
(31, 16, 16, '1234', '1234', NULL),
(33, 13, 18, 'yolo', 'yolo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` varchar(50) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `mdp` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `prenom`, `nom`, `mdp`, `mail`) VALUES
(13, 'hamze', 'hamze', 'hamze', 'hamze@hamze'),
(14, 'robin', 'robin', 'robin', 'robin@robin'),
(15, 'remi', 'remi', 'remi', 'remi@remi'),
(16, 'Jonathan', 'MARIN', '1234', 'jjj@gmail.com'),
(17, 'Monique', 'monique', 'monique', 'monique@monique'),
(18, 'greg', 'c', 'moi', 'g@c.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `userevenement`
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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `userevenement`
--

INSERT INTO `userevenement` (`id`, `idEvenement`, `idUser`, `importance`) VALUES
(59, 50, 14, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usergroupe`
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
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usergroupe`
--

INSERT INTO `usergroupe` (`id`, `idUser`, `idGroupe`, `responsable`) VALUES
(91, 18, 52, 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `evenementgroupe`
--
ALTER TABLE `evenementgroupe`
  ADD CONSTRAINT `evenementgroupe_ibfk_1` FOREIGN KEY (`idEvenement`) REFERENCES `evenement` (`id`),
  ADD CONSTRAINT `evenementgroupe_ibfk_2` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`id`);

--
-- Filtros para la tabla `groupe`
--
ALTER TABLE `groupe`
  ADD CONSTRAINT `groupe_ibfk_1` FOREIGN KEY (`createur`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `groupe_ibfk_2` FOREIGN KEY (`admin`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `invitationevenement`
--
ALTER TABLE `invitationevenement`
  ADD CONSTRAINT `invitationevenement_ibfk_1` FOREIGN KEY (`idEvenement`) REFERENCES `evenement` (`id`),
  ADD CONSTRAINT `invitationevenement_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `invitationgroupe`
--
ALTER TABLE `invitationgroupe`
  ADD CONSTRAINT `invitationgroupe_ibfk_1` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`id`),
  ADD CONSTRAINT `invitationgroupe_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`expediteur`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`destinataire`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `userevenement`
--
ALTER TABLE `userevenement`
  ADD CONSTRAINT `userevenement_ibfk_1` FOREIGN KEY (`idEvenement`) REFERENCES `evenement` (`id`),
  ADD CONSTRAINT `userevenement_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Filtros para la tabla `usergroupe`
--
ALTER TABLE `usergroupe`
  ADD CONSTRAINT `usergroupe_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `usergroupe_ibfk_3` FOREIGN KEY (`idGroupe`) REFERENCES `groupe` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
