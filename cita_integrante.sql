CREATE DATABASE  IF NOT EXISTS `cita` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cita`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: localhost    Database: cita
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `integrante`
--

DROP TABLE IF EXISTS `integrante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `integrante` (
  `idintegrante` int(11) NOT NULL AUTO_INCREMENT,
  `idIglesia` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `direccion` text,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `cargo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idintegrante`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `integrante`
--

LOCK TABLES `integrante` WRITE;
/*!40000 ALTER TABLE `integrante` DISABLE KEYS */;
INSERT INTO `integrante` VALUES (1,'1','Kevin','Hidalgo 6','9513981261','kevin@gmail.com','Director'),(2,'1','Daniel','Hidalgo 6','9513981261','kevin@gmail.com','Pastor'),(3,'1','Maria','Hidalgo 6','9513981261','kevin@gmail.com','pFemenil'),(4,'1','Mauricio','Hidalgo 6','9513981261','kevin@gmail.com','pVarones'),(5,'1','Karen','Hidalgo 6','9513981261','kevin@gmail.com','pJovenes'),(6,'1','Juana','Hidalgo 6','9513981261','kevin@gmail.com','pDirectiva'),(7,'1','Jesus','Hidalgo 6','9513981261','kevin@gmail.com','secretario'),(8,'1','Mario','Hidalgo 6','9513981261','kevin@gmail.com','tesorero'),(9,'2','Maricela','Hidalgo 6','9513981261','kevin@gmail.com','pDirectiva'),(10,'2','Octavio','Hidalgo 6','9513981261','kevin@gmail.com','pJovenes'),(11,'2','Rudi','Hidalgo 6','9513981261','kevin@gmail.com','pVarones'),(12,'2','Raquel','Hidalgo 6','9513981261','kevin@gmail.com','Director'),(13,'2','Juan José','Hidalgo 6','9513981261','kevin@gmail.com','Pastor'),(15,'3','Aemyn','Hidalgo 6','9513981261','kevin@gmail.com','pFemenil'),(16,'3','Elba','Hidalgo 6','9513981261','kevin@gmail.com','tesorero'),(17,'3','Yturiel','Hidalgo 6','9513981261','kevin@gmail.com','Pastor');
/*!40000 ALTER TABLE `integrante` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-27 14:19:51
