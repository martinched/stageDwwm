-- MariaDB dump 10.19-11.3.2-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: petassou
-- ------------------------------------------------------
-- Server version	11.3.2-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_categorie` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES
(1,'meuble'),
(2,'textile'),
(3,'vaisselle'),
(4,'divers');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produits`
--

DROP TABLE IF EXISTS `produits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produits` (
  `id_produit` int(11) NOT NULL AUTO_INCREMENT,
  `nom_produit` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `date_enregistrement` datetime NOT NULL DEFAULT current_timestamp(),
  `cout_reparation` float DEFAULT 0,
  `temps_passe` time DEFAULT NULL,
  `vendu` tinyint(4) NOT NULL DEFAULT 0,
  `id_sous_categorie` int(11) NOT NULL,
  PRIMARY KEY (`id_produit`),
  KEY `id_categorie` (`id_sous_categorie`),
  CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`id_sous_categorie`) REFERENCES `sous_categories` (`id_sous_categorie`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produits`
--

LOCK TABLES `produits` WRITE;
/*!40000 ALTER TABLE `produits` DISABLE KEYS */;
INSERT INTO `produits` VALUES
(1,'deux-corps','en bois d&#039;arbre','2024-04-12 17:54:19',20,'00:00:02',1,2),
(2,'machine a coudre','','2024-04-12 18:05:36',12,'00:00:02',1,9),
(5,'jean','','2024-04-16 12:40:07',0,'00:00:00',1,5),
(7,'armoire en carton','ikea','2024-04-16 13:58:33',20,'01:00:00',1,2),
(8,'draps','en satin','2024-04-16 13:59:09',0,'00:00:00',1,4),
(17,'ghj','','2024-04-16 00:00:00',0,'00:00:00',1,9),
(59,'24 couverts en argent','','2024-04-17 00:00:00',0,'00:00:00',1,7),
(60,'sdf','','2024-04-17 00:00:00',0,'00:00:00',1,2),
(63,'er','srf','2024-04-17 00:00:00',0,'00:00:00',1,2),
(64,'ert','','2024-04-17 00:00:00',10,'00:00:00',1,3),
(65,'ert','','2024-04-17 00:00:00',10,'00:00:00',1,3),
(66,'ert','','2024-04-17 00:00:00',10,'00:00:00',1,3),
(67,'ert','','2024-04-17 00:00:00',10,'00:00:00',1,3),
(68,'ert','','2024-04-17 00:00:00',10,'00:00:00',1,3),
(69,'ert','','2024-04-17 00:00:00',10,'00:00:00',1,3),
(70,'(r§uzuzu','uy§uy§rt','2024-04-18 10:15:31',0,'00:00:00',1,2),
(71,'drtg','erg','2024-04-18 14:33:39',0,'00:00:00',1,2),
(73,'bnv','bnv','2024-04-18 15:09:02',0,'00:00:00',1,2),
(74,'bnv','bnv','2024-04-18 15:15:14',0,'00:00:00',1,2),
(75,'ert','ert','2024-04-18 15:16:23',0,'00:00:00',1,2),
(76,'fh','gd','2024-04-18 15:32:56',0,'00:00:00',1,2),
(77,'jg','jg','2024-04-18 15:33:35',0,'00:00:00',1,2),
(78,'jg','jg','2024-04-18 15:36:39',0,'00:00:00',1,2),
(79,'rt','rt','2024-04-18 15:38:03',0,'00:00:00',1,2),
(80,'rt','rt','2024-04-18 15:38:25',0,'00:00:00',1,2),
(81,'rt','rt','2024-04-18 15:39:51',0,'00:00:00',1,2),
(82,'rt','rt','2024-04-18 15:40:27',0,'00:00:00',1,2),
(83,'rt','rt','2024-04-18 15:42:24',0,'00:00:00',1,2),
(84,'rt','rt','2024-04-18 15:42:34',0,'00:00:00',1,2),
(85,'rt','rt','2024-04-18 15:45:28',0,'00:00:00',1,2),
(86,'rt','rt','2024-04-18 15:45:41',0,'00:00:00',1,2),
(87,'rt','rt','2024-04-18 15:46:59',0,'00:00:00',1,2),
(88,'rt','rt','2024-04-18 15:48:16',0,'00:00:00',1,2),
(89,'dfg','dfg','2024-04-18 15:49:10',0,'00:00:00',1,2),
(90,'dfg','dfg','2024-04-18 15:49:44',0,'00:00:00',1,2),
(91,'tyty','tyty','2024-04-18 15:51:48',0,'00:00:00',1,7),
(92,'tyty','tyty','2024-04-18 15:53:00',0,'00:00:00',1,7),
(93,'coco','coco','2024-04-18 15:53:58',0,'00:00:00',1,9),
(94,'tete','tete','2024-04-18 15:54:17',0,'00:00:00',1,4),
(95,'iouiuo','uiuiou','2024-04-18 15:57:45',0,'00:00:00',1,7),
(96,'iouiuo','uiuiou','2024-04-18 15:58:20',0,'00:00:00',1,7),
(97,'iouiuo','uiuiou','2024-04-18 16:00:18',0,'00:00:00',1,7),
(98,'dddd','dddd','2024-04-18 16:56:27',0,'00:00:00',1,2),
(99,'ffff','ffff','2024-04-18 16:56:51',0,'00:00:00',1,2),
(100,'gggg','gggg','2024-04-18 16:57:33',0,'00:00:00',1,2),
(101,'gggg2','gggg2','2024-04-18 16:58:12',0,'00:00:00',1,2),
(102,'jjj','jjjjj','2024-04-18 16:58:50',0,'00:00:00',1,2),
(103,'uuuu','uuuu','2024-04-18 17:33:43',0,'00:00:00',1,2),
(104,'oooo','ooooo','2024-04-18 17:35:15',0,'00:00:00',1,2),
(106,'455555545','4545545455','2024-04-20 11:15:50',45,'45:00:00',1,2),
(107,'12','12','2024-04-20 11:18:25',12,'12:00:00',1,3),
(108,'333','333','2024-04-20 14:51:16',333,'00:33:00',1,2),
(114,'ccc','ccc','2024-04-23 13:24:35',1,'10:00:00',1,2),
(115,'ddd','ddd','2024-04-23 14:55:43',12,'00:35:00',1,9),
(118,'fff','fff','2024-04-23 16:30:10',0,'00:00:00',1,2),
(136,'kjkj','kjkj','2024-04-23 17:28:00',0,'00:00:00',0,2),
(138,'popo','popo','2024-04-23 17:30:33',0,'00:00:00',0,2),
(139,'lk','lk','2024-04-23 17:37:46',0,'00:00:00',0,2),
(143,'tyty','tyty','2024-04-23 17:44:48',0,'00:00:00',1,2),
(144,'tata','tata','2024-04-23 17:45:52',0,'00:00:00',1,2),
(145,'tutu','tutu','2024-04-23 17:47:10',0,'00:00:00',1,2),
(146,'mùl','klh','2024-04-23 17:48:05',0,'00:00:00',1,2),
(147,'uiui','uiuiu','2024-04-23 17:51:34',0,'00:00:00',1,2),
(148,'jgjg','jdfjg','2024-04-23 17:55:30',0,'00:00:00',1,2),
(149,'fuifui','fuifui','2024-04-24 10:56:30',123,'12:00:00',0,4),
(150,'sd','sd','2024-04-24 10:56:57',0,'00:00:00',0,2),
(151,'df','df','2024-04-24 10:58:51',0,'00:00:00',0,2),
(152,'dddd','dd','2024-04-24 11:20:16',0,'00:00:00',0,2);
/*!40000 ALTER TABLE `produits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sous_categories`
--

DROP TABLE IF EXISTS `sous_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sous_categories` (
  `id_sous_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nom_sous_categorie` varchar(50) NOT NULL,
  `id_categorie` int(11) NOT NULL,
  `poids` int(11) DEFAULT NULL COMMENT 'en gramme',
  PRIMARY KEY (`id_sous_categorie`),
  KEY `id_categorie` (`id_categorie`),
  CONSTRAINT `sous_categories_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categories` (`id_categorie`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sous_categories`
--

LOCK TABLES `sous_categories` WRITE;
/*!40000 ALTER TABLE `sous_categories` DISABLE KEYS */;
INSERT INTO `sous_categories` VALUES
(1,'table',1,5000),
(2,'armoire',1,20000),
(3,'chaise',1,5000),
(4,'drap ',2,300),
(5,'pantalon',2,500),
(6,'manteau',2,1500),
(7,'assiette',3,200),
(8,'verre',3,50),
(9,'machin élec',4,3000);
/*!40000 ALTER TABLE `sous_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventes`
--

DROP TABLE IF EXISTS `ventes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventes` (
  `id_vente` int(11) NOT NULL AUTO_INCREMENT,
  `quantite` int(11) NOT NULL DEFAULT 1,
  `date_vente` datetime NOT NULL DEFAULT current_timestamp(),
  `prix_libre` float DEFAULT NULL,
  `id_produit` int(11) NOT NULL,
  PRIMARY KEY (`id_vente`),
  KEY `id_produit` (`id_produit`),
  CONSTRAINT `ventes_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produits` (`id_produit`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventes`
--

LOCK TABLES `ventes` WRITE;
/*!40000 ALTER TABLE `ventes` DISABLE KEYS */;
INSERT INTO `ventes` VALUES
(5,1,'2024-04-16 14:18:19',10,8),
(6,1,'2024-04-16 14:21:16',10,7),
(18,1,'2024-04-17 11:19:17',25,59),
(23,2,'2024-04-18 15:53:58',2,93),
(24,1,'2024-04-18 17:35:15',1,104),
(39,21,'2024-04-23 17:51:34',21,147);
/*!40000 ALTER TABLE `ventes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-04-24 11:45:49
