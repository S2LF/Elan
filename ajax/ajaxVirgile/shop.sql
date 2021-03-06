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


-- Listage de la structure de la base pour shop
CREATE DATABASE IF NOT EXISTS `shop` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `shop`;

-- Listage de la structure de la table shop. produit
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `prix_produit` float NOT NULL DEFAULT '0',
  `img_produit` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `description_produit` text COLLATE utf8_bin,
  PRIMARY KEY (`id_produit`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Listage des données de la table shop.produit : ~3 rows (environ)
DELETE FROM `produit`;
/*!40000 ALTER TABLE `produit` DISABLE KEYS */;
INSERT INTO `produit` (`id_produit`, `nom_produit`, `prix_produit`, `img_produit`, `description_produit`) VALUES
	(1, 'PlayStation 4', 399.9, 'ps4.png', 'Une console du feu ! Avec plein de jeux waouh pour faire du bruit la nuit dans sa chambre et subir du swatting de ses copains en mode Call of !!!'),
	(2, 'Xbox One S', 249.99, NULL, 'Une console mouais... ça va, ya des jeux pas mal mais ça vaut pas la PS4, hein ! On est d\'accord ?'),
	(3, 'Nintendo Switch', 319.99, 'nswi.png', 'Alors celle-la : tu branches sur ta télé et c\'est moche, tu débranches pour jouer en mode portable et c\'est lourd et ça n\'a que 3 heures d\'autonomie... On se croirait au temps de la Lynx ou de la Game Gear...');
/*!40000 ALTER TABLE `produit` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
