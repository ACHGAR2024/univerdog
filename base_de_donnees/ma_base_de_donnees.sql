-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 16 Mai 2024 à 12:13
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ma_base_de_donnees`
--

-- --------------------------------------------------------

--
-- Structure de la table `chiens`
--

CREATE TABLE IF NOT EXISTS `chiens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `race` varchar(50) DEFAULT NULL,
  `mot_de_passe` varchar(255) NOT NULL,
  `message` text,
  `accepte_reglement` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Contenu de la table `chiens`
--

INSERT INTO `chiens` (`id`, `nom`, `email`, `date_naissance`, `telephone`, `race`, `mot_de_passe`, `message`, `accepte_reglement`) VALUES
(36, 'reks', 'test3@hotmail.com', '2024-05-01', '0659725412', 'Chien de berger', '557c81814fbc5db6137337a0d911b8f3fd3e5a25f00946877a10725ef6f3a7c2', 'Chien Sympa ', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
