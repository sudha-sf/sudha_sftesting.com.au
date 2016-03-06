-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: testmate
-- ------------------------------------------------------
-- Server version	5.7.9

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
-- Table structure for table `assets`
--

DROP TABLE IF EXISTS `assets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `assets` (
  `assetID` int(11) NOT NULL AUTO_INCREMENT,
  `projectID` int(11) DEFAULT NULL,
  `uploadDate` date DEFAULT NULL,
  `name` varchar(450) DEFAULT NULL,
  `description` text,
  `url` varchar(500) DEFAULT NULL,
  `assetType` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`assetID`),
  UNIQUE KEY `assetID_UNIQUE` (`assetID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `assets`
--

LOCK TABLES `assets` WRITE;
/*!40000 ALTER TABLE `assets` DISABLE KEYS */;
INSERT INTO `assets` VALUES (1,1,'2016-02-15','WES_TM_0116_1_Path3_Tester5','Path 3 for tester 4','156218644','VIDEO','APPROVED'),(2,1,'2016-02-15','Test video 2','This is the 2nd description','156218644','VIDEO','PENDING'),(3,1,'2016-02-15','Final Report','This is the final report','https://drive.google.com/open?id=0B2xUBlk8YWYwQV9mcmlxdUJWeFE','DOCUMENT','APPROVED'),(4,1,'2016-02-10','Project Kick Off','Today we started the project!!!','','TIMELINE','APPROVED'),(5,1,'2016-02-14','Users testing in process','6 Testers are testing today the videos','','TIMELINE','APPROVED'),(6,1,'2016-03-15','XXXX','AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA','','DOCUMENT','APPROVED');
/*!40000 ALTER TABLE `assets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `commentID` int(11) NOT NULL AUTO_INCREMENT,
  `assetID` int(11) NOT NULL,
  `senderUserID` int(11) DEFAULT NULL,
  `receiverUserID` int(11) DEFAULT NULL,
  `comment` varchar(2000) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`commentID`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,2,1,2,'xxx','2016-03-05 12:08:29'),(2,2,1,2,'aaaa','2016-03-05 12:09:23'),(3,2,1,2,'aaaa','2016-03-05 12:09:57'),(4,2,1,2,'aaaa','2016-03-05 12:10:02'),(5,2,1,2,'aaaa','2016-03-05 12:10:10'),(6,2,1,2,'aaaa','2016-03-05 12:15:06'),(7,2,1,2,'aaaa','2016-03-05 12:15:16');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `companies` (
  `companyID` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) DEFAULT NULL,
  `logo` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`companyID`),
  UNIQUE KEY `companyID_UNIQUE` (`companyID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,'TestMate','testmate-logo.png'),(2,'Westpac','westpac-logo.jpg');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `projectID` int(11) NOT NULL AUTO_INCREMENT,
  `companyID` int(11) DEFAULT NULL,
  `name` varchar(450) DEFAULT NULL,
  `description` text,
  `startingDate` date DEFAULT NULL,
  `lastUpdateDate` date DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `code` varchar(45) NOT NULL,
  `userID` int(11) DEFAULT NULL,
  `adminID` int(11) DEFAULT NULL,
  PRIMARY KEY (`projectID`),
  UNIQUE KEY `projectID_UNIQUE` (`projectID`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,2,'Login','This project was xxxxx','2016-01-15','2016-01-29','Completed','WES-LOG',1,2),(2,2,'Wonder','This was the Wonder project!!!','2016-01-15','2016-01-29','Needs Approval','WES-WON',1,2);
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
  `companyID` int(11) DEFAULT NULL,
  `firstName` varchar(250) DEFAULT NULL,
  `lastName` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `enabled` bit(1) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `isCompanyAdmin` bit(1) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`userID`),
  UNIQUE KEY `userID_UNIQUE` (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,2,'Jhon','Wayne','gesseesse@gmail.com',NULL,'$2y$10$BaWhElKcLeoB5g54CXI7r.ymSMeYjO/9je19/kyHIRK/gTFz.Qsv6','','QEwV6AR37p6XheSHa953rMfL1GL6PNMmHpwbHF9klI8UW9f31UuNp0DdaYJ6','2016-03-06'),(2,1,'Gabriel','Esseesse','gabriel@testmate.com.au',NULL,'$2y$10$BaWhElKcLeoB5g54CXI7r.ymSMeYjO/9je19/kyHIRK/gTFz.Qsv6','\0','qQGf2n9HZriQZiak60UpjQOEnoxJ6tsaE89NxHFF2Ob3b67koA8cs9NgiROG','2016-03-06'),(3,1,'Harold','Clark','hclark2@360.cn',NULL,NULL,NULL,NULL,NULL),(4,1,'James','Banks','jbanks3@yelp.com',NULL,NULL,NULL,NULL,NULL),(5,1,'Mary','Hill','mhill4@ning.com',NULL,NULL,NULL,NULL,NULL),(6,1,'Louise','Harper','lharper5@cam.ac.uk',NULL,NULL,NULL,NULL,NULL),(7,1,'Carl','Williams','cwilliams6@livejournal.com',NULL,NULL,NULL,NULL,NULL),(8,1,'Joyce','Rice','jrice7@state.gov',NULL,NULL,NULL,NULL,NULL),(9,1,'Cheryl','Garza','cgarza8@wiley.com',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-06 23:13:00
