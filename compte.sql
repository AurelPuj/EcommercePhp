-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 03 déc. 2019 à 17:33
-- Version du serveur :  10.4.6-MariaDB
-- Version de PHP :  7.1.32

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
-- Structure de la table `compte`
--

CREATE TABLE `compte` (
  `id` int(100) NOT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `adresse` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `situation` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_naissance` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `compte`
--

INSERT INTO `compte` (`id`, `type`, `email`, `password`, `nom`, `prenom`, `numero`, `sexe`, `zip`, `adresse`, `situation`, `date_naissance`) VALUES
(1, 'Manager', 'userA@gmail.com', 'alibaba123', '', '', '', '', '', '', NULL, NULL),
(33, 'Client', 'antoine.eded@ff.fr', 'Antoinette', 'Antoine', 'Picot', '06781101', NULL, '31500', 'Limayrac', NULL, NULL),
(34, 'Client', 'axelle@zd.fr', 'Logitech', 'Axelle', 'Watrin', '05454545', 'Feminin', '12345', '50zzaeaze', 'value1', '2019-12-13');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `compte`
--
ALTER TABLE `compte`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
