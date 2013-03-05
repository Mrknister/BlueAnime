-- MySQL dump 10.13  Distrib 5.5.28, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: BlueAnime
-- ------------------------------------------------------
-- Server version	5.5.28-0ubuntu0.12.10.2

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
-- Table structure for table `Folgen`
--
CREATE DATABASE /*!32312 IF NOT EXISTS*/ `BlueAnime` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `BlueAnime`;

DROP TABLE IF EXISTS `Folgen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Folgen` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `SerienId` int(11) NOT NULL,
  `Folge` int(11) NOT NULL,
  `Titel` text NOT NULL,
  `Dateipfad` text NOT NULL,
  KEY `Id` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Folgen`
--

LOCK TABLES `Folgen` WRITE;
/*!40000 ALTER TABLE `Folgen` DISABLE KEYS */;
/*!40000 ALTER TABLE `Folgen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Genres`
--

DROP TABLE IF EXISTS `Genres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Genres` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(32) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Genres`
--

LOCK TABLES `Genres` WRITE;
/*!40000 ALTER TABLE `Genres` DISABLE KEYS */;
INSERT INTO `Genres` VALUES (1,'Action'),(2,'Adventure'),(3,'Fantasy');
/*!40000 ALTER TABLE `Genres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `News`
--

DROP TABLE IF EXISTS `News`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `News` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(64) NOT NULL,
  `Text` text NOT NULL,
  `CreationDate` date NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `News`
--

LOCK TABLES `News` WRITE;
/*!40000 ALTER TABLE `News` DISABLE KEYS */;
INSERT INTO `News` VALUES (1,'Eine Sehr Randome erste Nachricht','Dönerbuden haben sich in Deutschland zu einer Animefangemeinde zusammen geschlossen','2012-12-30'),(2,'Zweite sehr Randome Nachricht','Die erste Nachricht wahr eine erfundene Testnachricht ( aber verrats keinem!)','2012-12-30'),(3,'3. Nachricht','Für Testnachrichten gehen mir langsam die Ideen aus','2012-12-30'),(4,'test4','Ein ZufÃ¤lliger text mit Ã„s und Ã–s und Ãœs und ÃŸ','2012-12-30');
/*!40000 ALTER TABLE `News` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `SerieInGenre`
--

DROP TABLE IF EXISTS `SerieInGenre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `SerieInGenre` (
  `S_ID` int(11) NOT NULL,
  `G_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `SerieInGenre`
--

LOCK TABLES `SerieInGenre` WRITE;
/*!40000 ALTER TABLE `SerieInGenre` DISABLE KEYS */;
INSERT INTO `SerieInGenre` VALUES (11,2);
/*!40000 ALTER TABLE `SerieInGenre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Serien`
--

DROP TABLE IF EXISTS `Serien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Serien` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Userlevel` int(11) NOT NULL,
  `Shortdescription` text NOT NULL,
  `Picturename` text NOT NULL,
  `Year` varchar(16) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Id` (`Id`),
  KEY `Userlevel` (`Userlevel`),
  KEY `Id_2` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Serien`
--

LOCK TABLES `Serien` WRITE;
/*!40000 ALTER TABLE `Serien` DISABLE KEYS */;
INSERT INTO `Serien` VALUES (1,'awefawe3',0,'awefawef','default.png','','awfawf');
/*!40000 ALTER TABLE `Serien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Users`
--

DROP TABLE IF EXISTS `Users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` text NOT NULL,
  `Password` text NOT NULL,
  `email` text NOT NULL,
  `UserLevel` int(11) NOT NULL,
  UNIQUE KEY `Id_2` (`Id`),
  KEY `Id` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Users`
--

LOCK TABLES `Users` WRITE;
/*!40000 ALTER TABLE `Users` DISABLE KEYS */;
INSERT INTO `Users` VALUES (1,'jan','598d4c200461b81522a3328565c25f7c','amenophisthegod@googlemail.com',100);
/*!40000 ALTER TABLE `Users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Verificationqueue`
--

DROP TABLE IF EXISTS `Verificationqueue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Verificationqueue` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` text NOT NULL,
  `Password` text NOT NULL,
  `email` text NOT NULL,
  `ActivationKey` int(20) NOT NULL,
  KEY `Id` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Verificationqueue`
--

LOCK TABLES `Verificationqueue` WRITE;
/*!40000 ALTER TABLE `Verificationqueue` DISABLE KEYS */;
INSERT INTO `Verificationqueue` VALUES (3,'jan','598d4c200461b81522a3328565c25f7c','blabla@aewdsfae.de',1210215015),(4,'jan23','598d4c200461b81522a3328565c25f7c','jan.herlyn@live.de',1201256330);
/*!40000 ALTER TABLE `Verificationqueue` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-01-16 19:16:06
