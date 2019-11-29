-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 29 nov. 2019 à 12:18
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecommerce`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `Ref` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(20) NOT NULL,
  `Image` text NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`Ref`)
) ENGINE=MyISAM AUTO_INCREMENT=9792627 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`Ref`, `Nom`, `Image`, `Description`) VALUES
(9792625, 'pull à col roulé', 'https://cdn-images.farfetch-contents.com/13/81/67/67/13816767_20027093_1920.jpg', 'Pull à col roulé pour homme'),
(9792626, 'tee shirt', 'https://lp2.hm.com/hmgoepprod?set=source[/30/93/309311d66c8bcb9cf0f49b7eb20fe33d8e9876ce.jpg],origin[dam],category[men_tshirtstanks_shortsleeve],type[LOOKBOOK],res[m],hmver[1]&call=url[file:/product/main]', 'tee shirt pour homme de couleur rouge');

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `Id` varchar(255) NOT NULL,
  `Mdp` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
