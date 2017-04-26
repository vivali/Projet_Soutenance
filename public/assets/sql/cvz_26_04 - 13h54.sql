-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 26 Avril 2017 à 13:53
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
  `camp` tinyint(2) NOT NULL,
  `wood_farm` tinyint(2) NOT NULL,
  `food_farm` tinyint(2) NOT NULL,
  `water_farm` tinyint(2) NOT NULL,
  `wood_stock` tinyint(2) NOT NULL,
  `food_stock` tinyint(2) NOT NULL,
  `water_stock` tinyint(2) NOT NULL,
  `cabanon` tinyint(2) NOT NULL,
  `radio` tinyint(2) NOT NULL,
  `wall` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `buildings`
--

INSERT INTO `buildings` (`id`, `id_user`, `camp`, `wood_farm`, `food_farm`, `water_farm`, `wood_stock`, `food_stock`, `water_stock`, `cabanon`, `radio`, `wall`) VALUES
(1, 1, 1, 4, 6, 5, 2, 2, 1, 1, 1, 1),
(3, 2, 0, 0, 5, 1, 0, 0, 0, 0, 0, 0),
(4, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `construct`
--

CREATE TABLE IF NOT EXISTS `construct` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `camp` int(11) NOT NULL,
  `wood_farm` int(11) NOT NULL,
  `food_farm` int(11) NOT NULL,
  `water_farm` int(11) NOT NULL,
  `wood_stock` int(11) NOT NULL,
  `food_stock` int(11) NOT NULL,
  `water_stock` int(11) NOT NULL,
  `cabanon` int(11) NOT NULL,
  `radio` int(11) NOT NULL,
  `wall` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_user` (`id_user`)
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
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `water` int(11) NOT NULL,
  `food` int(11) NOT NULL,
  `wood` int(11) NOT NULL,
  `camper` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `ressources`
--

INSERT INTO `ressources` (`id`, `id_user`, `water`, `food`, `wood`, `camper`) VALUES
(1, 1, 3888, 26838, 65179, 3),
(3, 2, 99546692, 161761243, 248862503, 1),
(4, 3, 138, 559, 1088, 1);

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
  `refresh_wood` int(11) NOT NULL,
  `refresh_water` int(11) NOT NULL,
  `refresh_food` int(11) NOT NULL,
  `token` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_last_connexion` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `birthday`, `role`, `password`, `refresh_wood`, `refresh_water`, `refresh_food`, `token`, `date_create`, `date_last_connexion`) VALUES
(3, 'Vivali', 'ryzommaster@hotmail.fr', '2017-01-01', '0', '$2y$10$3jz..Esul9olbUdqv.zk8uoSSxDbtsj43Hh3p3Ngn6kJDwQ..s4k2', 1493207029, 1493207029, 1493207029, 0, '2017-04-26 13:18:29', 1493205509);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
