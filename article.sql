-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 07 déc. 2019 à 22:50
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
  `Nom` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Quantite` int(11) NOT NULL,
  `Marque` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Catégorie` varchar(256) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Prix` int(255) NOT NULL,
  `TVA` int(11) NOT NULL,
  PRIMARY KEY (`Ref`)
) ENGINE=MyISAM AUTO_INCREMENT=9792656 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`Ref`, `Nom`, `Image`, `Description`, `Quantite`, `Marque`, `Catégorie`, `Prix`, `TVA`) VALUES
(9792647, 'Pull gris', 'http://www.menga-medium.fr/images/category_47/Pull%20en%20coton%20mlang%20%20Gris%20chin%20%20HOMME%20%20HampM%200515769003.jpg', 'pull gris en laine', 20, 'H&M', 'Haut', 15, 10),
(9792637, 'Basket Blanche', 'https://lp2.hm.com/hmgoepprod?set=source[/5a/be/5abeb00f96b213419c94407604d35fe8d6cf8959.jpg],origin[dam],category[],type[DESCRIPTIVESTILLLIFE],res[m],hmver[1]&call=url[file:/product/main]', 'Basket immitation cuir', 10, 'H&M', 'Chaussures', 15, 10),
(9792654, 'veste en lin', 'https://www.lamattaabbigliamento.it/wp-content/uploads/2019/06/Giacca-Lino-Uomo-XAGON-MAN-2.jpg', 'veste', 10, 'H&M', 'Haut', 7, 0),
(9792655, 'Jean ', 'https://ba-sh.com/dw/image/v2/BBTP_PRD/on/demandware.static/-/Sites-master-bash/default/dwf88e2075/allImages/H18NEW/1H17SAND_BRUT_2.jpg?sw=870&sh=1389&sm=fit', 'Jean pour femme Slim', 10, 'H&M', 'Bas', 20, 10),
(9792645, 'tee shirt', 'https://lp2.hm.com/hmgoepprod?set=source[/30/93/309311d66c8bcb9cf0f49b7eb20fe33d8e9876ce.jpg],origin[dam],category[men_tshirtstanks_shortsleeve],type[LOOKBOOK],res[m],hmver[1]&call=url[file:/product/main]', 'tee shirt pour homme de couleur rouge', 10, 'H&M', 'Haut', 20, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
