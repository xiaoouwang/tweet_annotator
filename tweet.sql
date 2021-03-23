-- phpMyAdmin SQL
-- version 4.9.3
-- Serveur: localhost
-- Généré le : Dim 18 octobre 2020
-- Version du database serveur: 5.7.26
-- Version de PHP: 7.4.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `projet`
--

-- --------------------------------------------------------

-- Structure de la table `tweet`


CREATE TABLE IF NOT EXISTS `tweet` (
  `id_tweet` int(3) NOT NULL,
  `tweet` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tweet`)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
