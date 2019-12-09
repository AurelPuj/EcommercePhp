-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 09 déc. 2019 à 19:24
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
CREATE DATABASE IF NOT EXISTS `ecommerce` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ecommerce`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

DROP TABLE IF EXISTS `article`;
CREATE TABLE IF NOT EXISTS `article` (
  `Ref` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Quantite` int(11) NOT NULL,
  `Marque` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Catégorie` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Prix` int(255) NOT NULL,
  `TVA` int(11) NOT NULL,
  PRIMARY KEY (`Ref`)
) ENGINE=MyISAM AUTO_INCREMENT=9792667 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`Ref`, `Nom`, `Image`, `Description`, `Quantite`, `Marque`, `Catégorie`, `Prix`, `TVA`) VALUES
(9792659, 'Pull gris', 'http://www.menga-medium.fr/images/category_47/Pull%20en%20coton%20mlang%20%20Gris%20chin%20%20HOMME%20%20HampM%200515769003.jpg', 'pull gris en laine', 30, 'H&M', 'Haut', 15, 10),
(9792664, 'Jean ', 'https://ba-sh.com/dw/image/v2/BBTP_PRD/on/demandware.static/-/Sites-master-bash/default/dwf88e2075/allImages/H18NEW/1H17SAND_BRUT_2.jpg?sw=870&sh=1389&sm=fit', 'Jean pour femme Slim', 40, 'H&M', 'Haut', 10, 10),
(9792660, 'Basket Blanche', 'https://lp2.hm.com/hmgoepprod?set=source[/5a/be/5abeb00f96b213419c94407604d35fe8d6cf8959.jpg],origin[dam],category[],type[DESCRIPTIVESTILLLIFE],res[m],hmver[1]&call=url[file:/product/main]', 'Basket immitation cuir', 20, 'H&M', 'Haut', 15, 10),
(9792666, 'veste en lin', 'https://www.lamattaabbigliamento.it/wp-content/uploads/2019/06/Giacca-Lino-Uomo-XAGON-MAN-2.jpg', 'veste', 30, 'H&M', 'Haut', 20, 0),
(9792665, 'tee shirt', 'https://lp2.hm.com/hmgoepprod?set=source[/30/93/309311d66c8bcb9cf0f49b7eb20fe33d8e9876ce.jpg],origin[dam],category[men_tshirtstanks_shortsleeve],type[LOOKBOOK],res[m],hmver[1]&call=url[file:/product/main]', 'tee shirt pour homme de couleur rouge', 30, 'H&M', 'Haut', 7, 0);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `NumCommande` int(11) NOT NULL AUTO_INCREMENT,
  `Nom` varchar(256) NOT NULL,
  `Image` text NOT NULL,
  `PrixAchat` int(255) NOT NULL,
  `QuantiteAchat` int(255) NOT NULL,
  `Etat` tinyint(1) NOT NULL,
  `EmailClient` varchar(255) NOT NULL,
  PRIMARY KEY (`NumCommande`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `commentaire` text COLLATE utf8_unicode_ci NOT NULL,
  `reponse` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'aucune',
  `id_com` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_com`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`email`, `nom`, `prenom`, `commentaire`, `reponse`, `id_com`) VALUES
('axelle@zd.fr', 'Axelle', 'Watrin', 'aaaaaaa', 'aucune', 4);

-- --------------------------------------------------------

--
-- Structure de la table `compte`
--

DROP TABLE IF EXISTS `compte`;
CREATE TABLE IF NOT EXISTS `compte` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `situation` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id`, `type`, `email`, `password`, `nom`, `prenom`, `numero`, `sexe`, `zip`, `adresse`, `situation`, `date_naissance`) VALUES
(1, 'Manager', 'userA@gmail.com', 'alibaba123', '', '', '', '', '', '', NULL, NULL),
(33, 'Client', 'antoine.eded@ff.fr', 'Antoinette', 'Antoine', 'Picot', '06781101', NULL, '31500', 'Limayrac', NULL, NULL),
(34, 'Client', 'axelle@zd.fr', 'Logitech', 'Axelle', 'Watrin', '05454545', 'Feminin', '12345', '50zzaeaze', 'value1', '2019-12-13'),
(38, 'Client', 'blanche@gmail.com', 'bb', 'B', 'Blanche', '01010101', 'Autre', '93160', '3 avesdgf', 'V', '5555-05-05');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
