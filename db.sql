-- MySQL dump 10.13  Distrib 5.5.35, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: diffproj
-- ------------------------------------------------------
-- Server version	5.5.35-0ubuntu0.12.04.2

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
-- Table structure for table `bills`
--

DROP TABLE IF EXISTS `bills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bills` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `order_id` int(11) DEFAULT '0',
  `trip_id` int(11) DEFAULT '0',
  `amount` float NOT NULL,
  `file_name` tinytext NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bills`
--

LOCK TABLES `bills` WRITE;
/*!40000 ALTER TABLE `bills` DISABLE KEYS */;
INSERT INTO `bills` VALUES (16,'2014-02-20',11,NULL,12.11,'excel-invoice-template.gif'),(17,'2014-02-19',NULL,15,22.22,'excel-invoice-template.gif'),(24,'2014-02-12',NULL,17,22.22,'1.png'),(35,'2014-02-18',19,NULL,33.33,'excel-invoice-template.gif'),(36,'2014-02-15',20,NULL,22.22,'excel-invoice-template.gif');
/*!40000 ALTER TABLE `bills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cerereordins`
--

DROP TABLE IF EXISTS `cerereordins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cerereordins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `TripID` int(11) NOT NULL,
  `cci` tinytext,
  `date1` tinytext,
  `dlocality` tinytext,
  `dcountry` tinytext,
  `dscop` tinytext,
  `droute` tinytext,
  `preiod` tinytext,
  `dgo` tinytext,
  `dcome` tinytext,
  `cheltuieli` tinytext,
  `csalariale` tinytext,
  `datecreated` tinytext,
  `nrgf` tinytext,
  `namef` tinytext,
  `transpif` tinytext,
  `transpintf` tinytext,
  `diaurinaf` tinytext,
  `cazaref` tinytext,
  `taxaf` tinytext,
  `altchelf` tinytext,
  `totalf` tinytext,
  `datef` tinytext,
  `nrgd` tinytext,
  `named` tinytext,
  `tranpsid` tinytext,
  `transpintd` tinytext,
  `diaurnad` tinytext,
  `cazared` tinytext,
  `taxad` tinytext,
  `altcheld` tinytext,
  `totald` tinytext,
  `dated` tinytext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cerereordins`
--

LOCK TABLES `cerereordins` WRITE;
/*!40000 ALTER TABLE `cerereordins` DISABLE KEYS */;
INSERT INTO `cerereordins` VALUES (12,12,'84498','2014-02-08','asd','asd','asd','asd','asd','2014-02-19','2014-02-04','asd','asd','2014-02-05','4894489','asd','asd','asd','asd','asd','asd','asd','asd','2014-02-04','Someth','Someth','asd','asd','asd','asd','asd','asd','asd','2014-02-18'),(13,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(14,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(15,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(16,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(17,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(18,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(19,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(20,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(21,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(22,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(23,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(24,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(25,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(26,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(27,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(28,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(29,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(30,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(31,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(32,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(33,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(34,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(35,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(36,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(37,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(38,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(39,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(40,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(41,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(42,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(43,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(44,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(45,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(46,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(47,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(48,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(49,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19'),(50,29,'1231','2014-02-21','Destinate Budapest','Hungari','TestTex','TestTex','2014-01-24','2014-02-19','2014-02-12','123','213213','2014-02-21','121','TestTex','TestTex','TestTex','TestTex','TestTex','12','1231','12411','2014-02-18','Someth','Someth','TestTex','TestTex','TestTex','TestTex','TestTex','21121','1211','2014-02-19');
/*!40000 ALTER TABLE `cerereordins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `declaratie`
--

DROP TABLE IF EXISTS `declaratie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `declaratie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tripid` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `declaratie`
--

LOCK TABLES `declaratie` WRITE;
/*!40000 ALTER TABLE `declaratie` DISABLE KEYS */;
INSERT INTO `declaratie` VALUES (9,10,'Diff Proj','Farkas Csaba','2009-01-01'),(10,10,'Diff Proj','Farkas Csaba','2009-01-01'),(11,10,'Diff Proj','Farkas Csaba','2009-01-01'),(12,10,'Diff Proj','Farkas Csaba','2009-01-01'),(13,10,'Diff Proj','Farkas Csaba','2009-01-01'),(14,10,'Diff Proj','Farkas Csaba','2009-01-01'),(15,10,'Diff Proj','Farkas Csaba','2009-01-01'),(16,10,'Diff Proj','Farkas Csaba','2009-01-01'),(17,10,'Diff Proj','Farkas Csaba','2009-01-01'),(18,10,'Diff Proj','Farkas Csaba','2009-01-01'),(19,10,'Diff Proj','Farkas Csaba','2009-01-01'),(20,10,'Diff Proj','Farkas Csaba','2009-01-01'),(21,10,'Diff Proj','Farkas Csaba','2009-01-01'),(22,10,'Diff Proj','Farkas Csaba','2009-01-01'),(23,10,'Diff Proj','Farkas Csaba','2009-01-01'),(24,10,'Diff Proj','Farkas Csaba','2009-01-01'),(25,10,'Diff Proj','Farkas Csaba','2009-01-01'),(26,10,'Diff Proj','Farkas Csaba','2009-01-01'),(27,10,'Diff Proj','Farkas Csaba','2009-01-01'),(28,10,'Diff Proj','Farkas Csaba','2009-01-01'),(29,10,'Diff Proj','Farkas Csaba','2009-01-01'),(30,10,'Diff Proj','Farkas Csaba','2009-01-01'),(31,10,'Diff Proj','Farkas Csaba','2009-01-01'),(32,10,'Diff Proj','Farkas Csaba','2009-01-01'),(33,10,'Diff Proj','Farkas Csaba','2009-01-01'),(34,10,'Diff Proj','Farkas Csaba','2009-01-01'),(35,10,'Diff Proj','Farkas Csaba','2009-01-01'),(36,10,'Diff Proj','Farkas Csaba','2009-01-01'),(37,10,'Diff Proj','Farkas Csaba','2009-01-01'),(38,10,'Diff Proj','Farkas Csaba','2009-01-01'),(39,10,'Diff Proj','Farkas Csaba','2009-01-01'),(40,10,'Diff Proj','Farkas Csaba','2009-01-01'),(41,29,'Proiect Test','Test MIster','2014-03-12');
/*!40000 ALTER TABLE `declaratie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` tinytext NOT NULL,
  `trip_id` int(11) DEFAULT '0',
  `order_id` int(11) DEFAULT '0',
  `desription` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (8,'[kickass.to]f1.2013.reloaded.torrent',10,NULL,'sdf'),(9,'s_n01_nursingm.jpg',29,NULL,'This is a File ');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `global`
--

DROP TABLE IF EXISTS `global`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `global` (
  `GlobalTrip` float NOT NULL,
  `GlobalOrder` float NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `global`
--

LOCK TABLES `global` WRITE;
/*!40000 ALTER TABLE `global` DISABLE KEYS */;
INSERT INTO `global` VALUES (9997,10023,1);
/*!40000 ALTER TABLE `global` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Created` datetime NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProvidedAmount` float NOT NULL,
  `Finalized` tinyint(1) DEFAULT '0',
  `PDF_Name` tinytext,
  `BillFileName` tinytext,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (16,'2014-02-04 00:00:00',1,11,1,'Orders_NR_16.pdf',NULL),(19,'2014-02-12 00:00:00',3,140,NULL,NULL,NULL),(20,'2014-02-14 00:00:00',1,145,NULL,NULL,NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` tinytext NOT NULL,
  `Price` float NOT NULL,
  `ProductURL` text NOT NULL,
  `OrderID` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (18,'Kecske',12,'http://localhost/Symfony/web/app_dev.php/trips/finalize/2',13),(29,'Samasung Galaxy S4',25,'http://www.smsgratis.ws/index.php',15),(31,'Csokolade',11,'http://www.smsgratis.ws/index.php#.Us7WTPQW13s',15);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trips`
--

DROP TABLE IF EXISTS `trips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trips` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `StartDate` datetime NOT NULL,
  `EndDate` datetime DEFAULT NULL,
  `UserID` int(11) NOT NULL,
  `finalize` tinyint(1) DEFAULT '0',
  `ProvidedAmount` float DEFAULT '0',
  `destination` tinytext,
  PRIMARY KEY (`ID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trips`
--

LOCK TABLES `trips` WRITE;
/*!40000 ALTER TABLE `trips` DISABLE KEYS */;
INSERT INTO `trips` VALUES (11,'2014-02-15 00:00:00',NULL,3,NULL,99.9,'Cluj Napoca'),(25,'2014-02-05 00:00:00','2014-02-13 00:00:00',4,1,11,'Budapest'),(26,'2014-02-20 00:00:00',NULL,1,NULL,145,'Budapest');
/*!40000 ALTER TABLE `trips` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(40) NOT NULL,
  `password` varchar(260) NOT NULL,
  `firstName` tinytext NOT NULL,
  `lastName` tinytext NOT NULL,
  `role` varchar(6) NOT NULL DEFAULT 'USER',
  `email` varchar(60) NOT NULL,
  `tel` tinytext,
  `university` tinytext,
  `GlobalTrip` float DEFAULT '0',
  `GlobalOrder` float DEFAULT '0',
  PRIMARY KEY (`ID`),
  UNIQUE KEY `userName` (`userName`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Admin','admin','Admin','Admin','ADMIN','admin@gmail.com','0748985496','Admin',523.77,313.78),(3,'nemeszol','akarmi','Zoltan','Nemes','USER','valami@valami.com',NULL,NULL,123,398.67),(4,'nagyszab','electro001','Nagy','Szabolcs','USER','nszabika2007@gmail.com','0030749824942','Sapietia Informatika',300,200);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-02-14 20:36:16
