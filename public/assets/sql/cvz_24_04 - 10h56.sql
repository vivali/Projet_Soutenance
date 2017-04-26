-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 24 Avril 2017 à 10:56
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `cvz`
--

-- --------------------------------------------------------

--
-- Structure de la table `buildings`
--

CREATE TABLE IF NOT EXISTS `buildings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `food_farm` int(11) NOT NULL,
  `wood_farm` int(11) NOT NULL,
  `water_farm` int(11) NOT NULL,
  `cabanon` int(11) NOT NULL,
  `food_stock` int(11) NOT NULL,
  `wood_stock` int(11) NOT NULL,
  `wate_stock` int(11) NOT NULL,
  `wall` int(11) NOT NULL,
  `radio` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `param`
--

CREATE TABLE IF NOT EXISTS `param` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `speed` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ressources`
--

CREATE TABLE IF NOT EXISTS `ressources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `water` int(11) NOT NULL,
  `food` int(11) NOT NULL,
  `wood` int(11) NOT NULL,
  `camper` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `email` varchar(120) NOT NULL,
  `birthday` date NOT NULL,
  `role` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `date_create` datetime NOT NULL,
  `date_last_connexion` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `birthday`, `role`, `password`, `date_create`, `date_last_connexion`) VALUES
(1, 'Vivali', 'ryzommaster@hotmail.fr', '1995-03-01', '0', '0', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
