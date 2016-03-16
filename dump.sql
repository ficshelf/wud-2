-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: production
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

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
-- Current Database: `production`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `production` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `production`;

--
-- Table structure for table `claim_status_codes`
--

DROP TABLE IF EXISTS `claim_status_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `claim_status_codes` (
  `claim_status` char(2) NOT NULL,
  `claim_status_desc` varchar(255) DEFAULT NULL,
  `claim_seq` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`claim_status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `claim_status_codes`
--

LOCK TABLES `claim_status_codes` WRITE;
/*!40000 ALTER TABLE `claim_status_codes` DISABLE KEYS */;
INSERT INTO `claim_status_codes` VALUES ('AP','Awaiting panel review',1),('CL','Closed',4),('OR','Panel opinion rendered',2),('SF','Suit filed',3);
/*!40000 ALTER TABLE `claim_status_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `claims`
--

DROP TABLE IF EXISTS `claims`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `claims` (
  `claim_id` int(10) unsigned NOT NULL,
  `patient` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`claim_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `claims`
--

LOCK TABLES `claims` WRITE;
/*!40000 ALTER TABLE `claims` DISABLE KEYS */;
INSERT INTO `claims` VALUES (10,'Smith'),(20,'Jones'),(30,'Brown');
/*!40000 ALTER TABLE `claims` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `defendants`
--

DROP TABLE IF EXISTS `defendants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `defendants` (
  `id` int(10) unsigned NOT NULL,
  `claim_id` int(10) unsigned DEFAULT NULL,
  `defendant` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_defendants_` (`claim_id`),
  CONSTRAINT `FK_defendants_` FOREIGN KEY (`claim_id`) REFERENCES `claims` (`claim_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `defendants`
--

LOCK TABLES `defendants` WRITE;
/*!40000 ALTER TABLE `defendants` DISABLE KEYS */;
INSERT INTO `defendants` VALUES (1,10,'Johnson'),(2,10,'Meyer'),(3,10,'Dow'),(4,20,'Baker'),(5,20,'Meyer'),(6,30,'Johnson');
/*!40000 ALTER TABLE `defendants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `legal_events`
--

DROP TABLE IF EXISTS `legal_events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `legal_events` (
  `id` int(10) unsigned NOT NULL,
  `claim_id` int(10) unsigned DEFAULT NULL,
  `defendant` varchar(255) DEFAULT NULL,
  `claim_status` char(2) DEFAULT NULL,
  `change_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_legal_events_ClaimStatus` (`claim_status`),
  KEY `FK_legal_events_claims` (`claim_id`),
  CONSTRAINT `FK_legal_events_ClaimStatus` FOREIGN KEY (`claim_status`) REFERENCES `claim_status_codes` (`claim_status`),
  CONSTRAINT `FK_legal_events_claims` FOREIGN KEY (`claim_id`) REFERENCES `claims` (`claim_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `legal_events`
--

LOCK TABLES `legal_events` WRITE;
/*!40000 ALTER TABLE `legal_events` DISABLE KEYS */;
INSERT INTO `legal_events` VALUES (1,10,'Johnson','AP','2015-01-01'),(2,10,'Johnson','OR','2015-02-01'),(3,10,'Johnson','SF','2015-03-01'),(4,10,'Johnson','CL','2015-04-01'),(5,10,'Meyer','AP','2015-01-01'),(6,10,'Meyer','OR','2015-02-01'),(7,10,'Meyer','SF','2015-03-01'),(8,10,'Dow','AP','2015-01-01'),(9,10,'Dow','OR','2015-02-01'),(10,20,'Meyer','AP','2015-01-01'),(11,20,'Meyer','OR','2015-02-01'),(12,20,'Baker','AP','2015-01-01'),(13,30,'Johnson','AP','2015-01-01'),(14,30,'Johnson','OR','2015-02-01');
/*!40000 ALTER TABLE `legal_events` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-15 16:08:30
