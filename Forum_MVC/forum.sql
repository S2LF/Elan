-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour forum
CREATE DATABASE IF NOT EXISTS `forum` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `forum`;

-- Listage de la structure de la table forum. message
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_topic` int(11) NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `FK_message_visiteur` (`id_user`),
  KEY `FK_message_sujet` (`id_topic`),
  CONSTRAINT `FK_message_sujet` FOREIGN KEY (`id_topic`) REFERENCES `topic` (`id_topic`),
  CONSTRAINT `FK_message_visiteur` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table forum. topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `creation_date` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_topic`),
  KEY `FK_sujet_visiteur` (`id_user`),
  CONSTRAINT `FK_sujet_visiteur` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la table forum. user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `date_inscription` datetime NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Les données exportées n'étaient pas sélectionnées.

-- Listage de la structure de la vue forum. view_creatortopic
-- Création d'une table temporaire pour palier aux erreurs de dépendances de VIEW
CREATE TABLE `view_creatortopic` (
	`id_topic` INT(11) NOT NULL,
	`username` VARCHAR(50) NULL COLLATE 'utf8_bin'
) ENGINE=MyISAM;

-- Listage de la structure de la vue forum. view_onetopic
-- Création d'une table temporaire pour palier aux erreurs de dépendances de VIEW
CREATE TABLE `view_onetopic` (
	`id_topic` INT(11) NOT NULL,
	`title` VARCHAR(50) NULL COLLATE 'utf8_bin',
	`username` VARCHAR(50) NULL COLLATE 'utf8_bin',
	`text` VARCHAR(50) NULL COLLATE 'utf8_bin'
) ENGINE=MyISAM;

-- Listage de la structure de la vue forum. view_creatortopic
-- Suppression de la table temporaire et création finale de la structure d'une vue
DROP TABLE IF EXISTS `view_creatortopic`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_creatortopic` AS SELECT  topic.id_topic, user.username
FROM topic, user
WHERE topic.id_user = user.id_user ;

-- Listage de la structure de la vue forum. view_onetopic
-- Suppression de la table temporaire et création finale de la structure d'une vue
DROP TABLE IF EXISTS `view_onetopic`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_onetopic` AS SELECT topic.id_topic, topic.title, user.username, message.text FROM topic, user, message
WHERE topic.id_topic = message.id_topic
AND user.id_user = message.id_user ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
