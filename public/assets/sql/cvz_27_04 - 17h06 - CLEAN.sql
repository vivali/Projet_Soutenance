-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 27 Avril 2017 à 17:06
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
  `rank` tinyint(4) NOT NULL,
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
-- Structure de la table `construct`
--

CREATE TABLE IF NOT EXISTS `construct` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `camp` int(11) DEFAULT NULL,
  `wood_farm` int(11) DEFAULT NULL,
  `food_farm` int(11) DEFAULT NULL,
  `water_farm` int(11) DEFAULT NULL,
  `wood_stock` int(11) DEFAULT NULL,
  `food_stock` int(11) DEFAULT NULL,
  `water_stock` int(11) DEFAULT NULL,
  `cabanon` int(11) DEFAULT NULL,
  `radio` int(11) DEFAULT NULL,
  `wall` int(11) DEFAULT NULL,
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
  `z_atk_proba` tinyint(3) unsigned NOT NULL DEFAULT '40',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `param`
--

INSERT INTO `param` (`id`, `speed`, `z_atk_proba`) VALUES
(1, 1, 40);

-- --------------------------------------------------------

--
-- Structure de la table `reports`
--

CREATE TABLE IF NOT EXISTS `reports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `report` text NOT NULL,
  `report_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seen` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ressources`
--

CREATE TABLE IF NOT EXISTS `ressources` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `water` bigint(20) NOT NULL,
  `food` bigint(20) NOT NULL,
  `wood` bigint(20) NOT NULL,
  `camper` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_user` (`id_user`)
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
  `refresh_wood` int(11) NOT NULL,
  `refresh_water` int(11) NOT NULL,
  `refresh_food` int(11) NOT NULL,
  `token` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_last_connexion` int(11) NOT NULL,
  `refresh_camper` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
