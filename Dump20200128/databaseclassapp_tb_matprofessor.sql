CREATE DATABASE  IF NOT EXISTS `databaseclassapp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `databaseclassapp`;
-- MySQL dump 10.16  Distrib 10.1.36-MariaDB, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: databaseclassapp
-- ------------------------------------------------------
-- Server version	10.1.36-MariaDB

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
-- Table structure for table `tb_matprofessor`
--

DROP TABLE IF EXISTS `tb_matprofessor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_matprofessor` (
  `idmatprofessor` int(11) NOT NULL AUTO_INCREMENT,
  `idmateria` int(11) NOT NULL,
  `idclassroom` int(11) DEFAULT NULL,
  `idprofessor` int(11) NOT NULL,
  `descolor` varchar(45) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`idmatprofessor`),
  KEY `FK_materia` (`idmateria`),
  KEY `FK_professor` (`idprofessor`),
  KEY `FK_classroom` (`idclassroom`),
  CONSTRAINT `FK_classroom` FOREIGN KEY (`idclassroom`) REFERENCES `tb_classroom` (`idclassroom`),
  CONSTRAINT `FK_materia` FOREIGN KEY (`idmateria`) REFERENCES `tb_materia` (`idmateria`),
  CONSTRAINT `FK_professor` FOREIGN KEY (`idprofessor`) REFERENCES `tb_professor` (`idprofessor`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_matprofessor`
--

LOCK TABLES `tb_matprofessor` WRITE;
/*!40000 ALTER TABLE `tb_matprofessor` DISABLE KEYS */;
INSERT INTO `tb_matprofessor` VALUES (11,32,NULL,1,'#0000cc'),(12,33,NULL,1,'#0000cc'),(13,34,NULL,1,'#0000cc'),(14,35,NULL,1,'#0000cc'),(15,36,NULL,1,'#0000cc'),(16,37,NULL,1,'#0000cc'),(17,38,NULL,1,'#0000cc'),(20,39,NULL,1,'#0000cc'),(21,40,NULL,1,'#0000cc'),(24,3,NULL,2,'#00ff00'),(25,2,NULL,2,'#ffff00');
/*!40000 ALTER TABLE `tb_matprofessor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-28  1:58:30
