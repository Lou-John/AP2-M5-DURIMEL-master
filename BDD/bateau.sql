-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 16 fév. 2021 à 09:13
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `oceanm2`
--

-- --------------------------------------------------------

--
-- Structure de la table `bateau`
--

DROP TABLE IF EXISTS `bateau`;
CREATE TABLE IF NOT EXISTS `bateau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `longueur` float DEFAULT NULL,
  `largeur` float DEFAULT NULL,
  `vitesse` float DEFAULT NULL,
  `nbPassager` int(11) DEFAULT NULL,
  `nbVehicule` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `bateau`
--

INSERT INTO `bateau` (`id`, `nom`, `longueur`, `largeur`, `vitesse`, `nbPassager`, `nbVehicule`) VALUES
(2, 'Kerdonis', 30.75, 7.9, 20, 295, 0),
(3, 'Bangor', 46, 12, 12, 450, 32),
(4, 'Vindilis', 48, 12.5, 12.5, 39, 39),
(5, 'Breizh Nevez I', 43.5, 12, 11.5, 300, 18),
(6, 'Île de Groix', 46, 12, 12, 450, 32),
(13, 'dfghj', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `lieu`
--

DROP TABLE IF EXISTS `lieu`;
CREATE TABLE IF NOT EXISTS `lieu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `informations` varchar(100) NOT NULL,
  `ile` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `lieu`
--

INSERT INTO `lieu` (`id`, `nom`, `informations`, `ile`) VALUES
(1, 'Continent', 'n', 0),
(2, 'Ile de Groix', 'n', 1),
(3, 'Belle-Ile', 'n', 1),
(4, 'Ile de Houat', 'n', 1),
(5, 'Ile de Hoedic', 'n', 1);

-- --------------------------------------------------------

--
-- Structure de la table `port`
--

DROP TABLE IF EXISTS `port`;
CREATE TABLE IF NOT EXISTS `port` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `codePostale` char(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `id_Lieu` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Port_Lieu_FK` (`id_Lieu`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `port`
--

INSERT INTO `port` (`id`, `nom`, `adresse`, `codePostale`, `ville`, `id_Lieu`) VALUES
(2, 'Quiberon  ', 'Gare maritime Lorient', '56170', 'Quiberon', 1),
(3, 'Port Tudy ', 'Gare maritime Ile de Groix', '56590', 'Port Tudy', 2),
(4, 'Sauzon ', 'Gare maritime Sauzon', '56360', 'Sauzon', 3),
(5, 'Le Palais ', 'Gare maritime Le palais', '56360', 'Le Palais', 3),
(6, 'Houat ', 'Gare maritime Houat', '56170', 'Houat', 4),
(7, 'Hoedic ', 'Gare maritime Hoedic', '56170', 'Hoedic', 5);

-- --------------------------------------------------------

--
-- Structure de la table `trajet`
--

DROP TABLE IF EXISTS `trajet`;
CREATE TABLE IF NOT EXISTS `trajet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_Port` int(11) NOT NULL,
  `id_Port_Arrivee` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `Trajet_Port_FK` (`id_Port`),
  KEY `Trajet_Port0_FK` (`id_Port_Arrivee`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `utiliser`
--

DROP TABLE IF EXISTS `utiliser`;
CREATE TABLE IF NOT EXISTS `utiliser` (
  `id` int(11) NOT NULL,
  `id_Trajet` int(11) NOT NULL,
  `duree` time NOT NULL,
  PRIMARY KEY (`id`,`id_Trajet`),
  KEY `Utiliser_Trajet0_FK` (`id_Trajet`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `port`
--
ALTER TABLE `port`
  ADD CONSTRAINT `Port_Lieu_FK` FOREIGN KEY (`id_Lieu`) REFERENCES `lieu` (`id`);

--
-- Contraintes pour la table `trajet`
--
ALTER TABLE `trajet`
  ADD CONSTRAINT `Trajet_Port0_FK` FOREIGN KEY (`id_Port_Arrivee`) REFERENCES `port` (`id`),
  ADD CONSTRAINT `Trajet_Port_FK` FOREIGN KEY (`id_Port`) REFERENCES `port` (`id`);

--
-- Contraintes pour la table `utiliser`
--
ALTER TABLE `utiliser`
  ADD CONSTRAINT `Utiliser_Bateau_FK` FOREIGN KEY (`id`) REFERENCES `bateau` (`id`),
  ADD CONSTRAINT `Utiliser_Trajet0_FK` FOREIGN KEY (`id_Trajet`) REFERENCES `trajet` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
