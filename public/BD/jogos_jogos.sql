CREATE DATABASE  IF NOT EXISTS `jogos` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `jogos`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 10.0.0.16    Database: jogos
-- ------------------------------------------------------
-- Server version	5.7.20-0ubuntu0.17.10.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `jogos`
--

DROP TABLE IF EXISTS `jogos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `jogos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `genero` int(11) NOT NULL,
  `desenvolvedor` varchar(45) NOT NULL,
  `editora` varchar(45) NOT NULL,
  `data` date NOT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `genero_idx` (`genero`),
  KEY `tipo_idx` (`tipo`),
  CONSTRAINT `genero` FOREIGN KEY (`genero`) REFERENCES `genero` (`id_genero`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tipo` FOREIGN KEY (`tipo`) REFERENCES `tipo` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jogos`
--

LOCK TABLES `jogos` WRITE;
/*!40000 ALTER TABLE `jogos` DISABLE KEYS */;
INSERT INTO `jogos` VALUES (1,'Uncharted',2,'Naughty Dog','Naughty Dog','2007-11-16',2),(2,'Fornite',4,'Epic Games','Epic Games','2017-07-25',2),(3,'Fornite - Battle Royale',10,'Epic Games','Epic Games','2017-09-23',1),(4,'PlayersUnknows Battlegrounds',10,'PUBG Corporation','PUBG Corporation','2017-12-21',2),(5,'Grand Theft Auto 5',9,'Rockstar North','Rockstar Games','2015-04-14',2),(6,'Path of Exile',11,'Grinding Gear Games','Grinding Gear Games','2013-10-23',1),(7,'Counter Strike: GO',7,'Valve','Valve','2012-08-21',2),(8,'Rocket League',8,'Psyonix','Psyonix','2015-07-07',2),(9,'Garrys Mod',9,'Facepunch Studios','Valve','2006-11-29',2),(10,'Football Manager 2018',5,'Sports Interactive','SEGA','2017-11-09',2),(11,'Mad Max',10,'Avalanche Studios','Warner Bros. Interactive Entertainment','2017-09-01',2),(12,'Rainbow Six Siege',7,'Ubisoft Montreal','Ubisoft','2017-12-12',2),(13,'Outlast',6,'Red Barrels','Red Barrels','2013-09-04',2),(14,'DayZ',3,'Bohemia Interactive','Bohemia Interactive','2013-12-16',3),(15,'Arma 3',7,'Bohemia Interactive','Bohemia Interactive','2013-07-12',2),(16,'Dragon Ball Z',1,'Arc System Works','Bandai Namco Entertainment','2018-01-25',2),(17,'Human: Fall Flat',2,'No Brakes Games','Curve Digital','2016-07-22',2),(18,'The Forest',2,'Endnight Games Ltd','Endnight Games Ltd','2014-05-30',3),(19,'Call of Duty: WWII',1,'Sledgehammer Games','Activision','2017-11-02',2),(20,'Pay Day 2',1,'Overkill','Starbreeze','2013-08-13',2),(21,'theHunter: Call of the Wild',2,'Expansive Worlds','Avalanche Studios','2017-02-16',2),(22,'Skyrim',11,'Bethesda','Bethesda','2016-10-28',2),(23,'Age of Empires HD',4,'Skybox Labs','Microsoft Studios','2013-04-10',2),(24,'Stick Fight: The Game',1,'Landfall West','Landfall','2018-09-28',2),(25,'Civilization VI',4,'Firaxis','2K Aspyr','2016-10-20',2),(26,'Warframe',7,'Digital Extremes','Digital Extremes','2013-03-25',1),(27,'Need for Speed',8,'Criterion Games','EA','2014-01-18',2),(28,'Dota 2',11,'Valve','Valve','2013-07-09',1),(29,'League of Legends',4,'Riot Games','Riot Games','2009-10-27',1),(30,'Forza 3 Horizon',8,'Turn 10 Studios','Microsoft Studios','2016-09-28',2),(31,'Shadow of War',11,'Monolith Productions','Warner Bros','2017-10-10',2),(32,'Shadow of War',11,'Monolith Productions','Warner Bros','2017-10-10',2);
/*!40000 ALTER TABLE `jogos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-01-16 22:11:58
