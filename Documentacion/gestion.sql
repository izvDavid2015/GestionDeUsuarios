-- MySQL dump 10.13  Distrib 5.6.27, for Win64 (x86_64)
--
-- Host: localhost    Database: gestion
-- ------------------------------------------------------
-- Server version	5.6.27

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
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `email` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `clave` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `alias` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `fechaAlta` date NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '0',
  `administrador` tinyint(1) NOT NULL DEFAULT '0',
  `personal` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`email`),
  UNIQUE KEY `alias` (`alias`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('a@gmail.com','86f7e437faa5a7fce15d1ddcb9eaeaea377667b8','adsds','2016-01-03',1,1,1),('bbdavid77@gmail.com','86f7e437faa5a7fce15d1ddcb9eaeaea377667b8','bbdavid77','2016-01-03',1,1,1),('ds@gmail.com','cccrwd','ds','2016-01-03',1,1,1),('gf@gmail.com','cccd','pfdsfo','2015-03-10',0,0,0),('iu@gmail.com','cccd','pddo','2015-03-10',0,0,0),('izvdavid@gmail.com','0','izvdavid','2016-01-04',1,1,1),('lk@gmail.com','cccxd','sspo','2015-03-10',0,0,0),('nb@gmail.com','cxzcxccd','pso','2015-03-10',0,0,0),('po@gmail.com','cccd','po','2015-03-10',0,0,0),('re@gmail.com','cccfsdxzd','pwo','2015-03-10',0,0,0),('tr@gmail.com','cccxcd','pwwo','2015-03-10',0,0,0),('yt@gmail.com','cccrwerd','pod','2015-03-10',0,0,0);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-01-05 10:46:00
