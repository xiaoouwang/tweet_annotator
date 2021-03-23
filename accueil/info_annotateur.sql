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

-- Structure de la table `info_annotateur`


CREATE TABLE IF NOT EXISTS `info_annotateur` (
  `n_etudiant` varchar(8) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `pass` varchar(6) NOT NULL,
  PRIMARY KEY (`n_etudiant`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Contenu de la table `info_annotateur`
--

INSERT INTO `info_annotateur` (`n_etudiant`, `nom`, `prenom`, `pass`) VALUES
('40014075', 'LIU', 'Xingyu', '123456'),
('40014089', 'WANG', 'Xiaoou', '123457'),
('4001499', 'YUDENKOVA', 'Kristina', '123458'),
('4001488', 'LEE', 'Nalae', '123459');