SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE buildings (
  `id` int(10) UNSIGNED NOT NULL,
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
  `wall` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO buildings (id, id_user, rank, camp, wood_farm, food_farm, water_farm, wood_stock, food_stock, water_stock, cabanon, radio, wall) VALUES
(1, 1, 0, 0, 10, 10, 10, 0, 0, 0, 0, 0, 0),
(2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

CREATE TABLE construct (
  `id` int(10) UNSIGNED NOT NULL,
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
  `wall` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO construct (id, id_user, camp, wood_farm, food_farm, water_farm, wood_stock, food_stock, water_stock, cabanon, radio, wall) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

CREATE TABLE param (
  `id` int(10) UNSIGNED NOT NULL,
  `speed` int(11) NOT NULL,
  `z_atk_proba` tinyint(3) UNSIGNED NOT NULL DEFAULT '40'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO param (id, speed, z_atk_proba) VALUES
(1, 1, 40);

CREATE TABLE reports (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `report` text NOT NULL,
  `report_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `seen` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO reports (id, id_user, `name`, report, report_date, seen) VALUES
(1, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\n            Vous avez perdu :<br>108 eau,791 nourritures,1050 bois.', '2017-04-27 09:55:36', 1),
(3, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Votre mur vous a permis de vous defendre sans perdre de ressources.', '2017-04-27 09:55:45', 1),
(4, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Votre mur vous a permis de vous defendre sans perdre de ressources.', '2017-04-27 09:55:47', 1),
(5, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Votre mur vous a permis de vous defendre sans perdre de ressources.', '2017-04-27 09:55:49', 1),
(6, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Votre mur vous a permis de vous defendre sans perdre de ressources.', '2017-04-27 09:55:51', 1),
(7, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Vous avez perdu :<br>162 eau,<br>475 nourritures,<br>1050 bois.<br>', '2017-04-27 09:55:54', 1),
(8, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Votre mur vous a permis de vous defendre sans perdre de ressources.', '2017-04-27 09:55:55', 1),
(9, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Votre mur vous a permis de vous defendre sans perdre de ressources.', '2017-04-27 09:56:44', 1),
(10, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Votre mur vous a permis de vous defendre sans perdre de ressources.', '2017-04-27 09:56:44', 1),
(11, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Votre mur vous a permis de vous defendre sans perdre de ressources.', '2017-04-27 09:56:44', 1),
(12, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Vous avez perdu :<br>315 eau,<br>921 nourritures,<br>2268 bois.<br>', '2017-04-27 11:37:31', 1),
(13, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Vous avez perdu :<br>1271 eau,<br>2542 nourritures,<br>4460 bois.<br>', '2017-04-27 12:33:01', 0),
(14, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Votre mur vous a permis de vous defendre sans perdre de ressources.', '2017-04-27 12:33:01', 0),
(15, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Vous avez perdu :<br>1023 eau,<br>1688 nourritures,<br>3078 bois.<br>', '2017-04-27 12:33:01', 0),
(16, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Votre mur vous a permis de vous defendre sans perdre de ressources.', '2017-04-27 12:33:01', 0),
(17, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Votre mur vous a permis de vous defendre sans perdre de ressources.', '2017-04-27 12:33:01', 0),
(18, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Votre mur vous a permis de vous defendre sans perdre de ressources.', '2017-04-27 12:33:01', 0),
(19, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Votre mur vous a permis de vous defendre sans perdre de ressources.', '2017-04-27 12:33:01', 0),
(20, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Votre mur vous a permis de vous defendre sans perdre de ressources.', '2017-04-27 12:33:01', 0),
(21, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Vous avez perdu :<br>679 eau,<br>3208 nourritures,<br>3375 bois.<br>', '2017-04-27 12:33:01', 0),
(22, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Votre mur vous a permis de vous defendre sans perdre de ressources.', '2017-04-27 12:33:01', 0),
(23, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Votre mur vous a permis de vous defendre sans perdre de ressources.', '2017-04-27 12:33:01', 0),
(24, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Votre mur vous a permis de vous defendre sans perdre de ressources.', '2017-04-27 12:33:01', 0),
(25, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Vous avez perdu :<br>1162 eau,<br>2310 nourritures,<br>2690 bois.<br>', '2017-04-27 12:33:01', 0),
(26, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Votre mur vous a permis de vous defendre sans perdre de ressources.', '2017-04-27 12:33:01', 0),
(27, 1, 'Attaque de zombies', 'Vous avez subi une attaque de zombies.<br>\r\n                Votre mur vous a permis de vous defendre sans perdre de ressources.', '2017-04-27 12:33:01', 0);

CREATE TABLE ressources (
  `id` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `water` bigint(20) NOT NULL,
  `food` bigint(20) NOT NULL,
  `wood` bigint(20) NOT NULL,
  `camper` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO ressources (id, id_user, water, food, wood, camper) VALUES
(1, 1, 15989, 36522, 56072, 10),
(2, 2, 1000, 3000, 5000, 5),
(3, 3, 1000, 3000, 5000, 1);

CREATE TABLE users (
  `id` int(10) UNSIGNED NOT NULL,
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
  `refresh_camper` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO users (id, username, email, birthday, role, `password`, refresh_wood, refresh_water, refresh_food, token, date_create, date_last_connexion, refresh_camper) VALUES
(1, 'Zboby', 'philippe.gruet@outlook.fr', '1995-10-20', '1', '$2y$10$7Kc7uhZtI7H4goJF27nSz.//Iz.RQ3HfOEUy9QkPmIu7uwic.KQFu', 1493296437, 1493296437, 1493296437, 0, '2017-04-26 14:50:40', 1493296500, 0),
(2, 'Toto', 'toto@ok.fr', '1934-03-12', '0', '$2y$10$LXEy5sX7Ey2CqkJrQKcN..7rO8XoQ1VCR4emyyWgwMH/0o518TI3K', 1493279680, 0, 1493279680, 0, '2017-04-26 14:51:10', 1493280306, 0),
(3, 'Toto3', 'toto3@ok.fr', '1984-07-26', '0', '$2y$10$B9aPPLXLTc/qv1hUmP5JuObikcyJRmOJLizx0MaLiInW.KEhdDubO', 1493211094, 1493211094, 1493211094, 0, '2017-04-26 14:51:34', 1491211094, 0);


ALTER TABLE buildings
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`);

ALTER TABLE construct
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`);

ALTER TABLE param
  ADD PRIMARY KEY (`id`);

ALTER TABLE reports
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

ALTER TABLE ressources
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_user` (`id_user`);

ALTER TABLE users
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);


ALTER TABLE buildings
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE construct
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE param
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE reports
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
ALTER TABLE ressources
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE users
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
