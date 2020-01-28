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
-- Table structure for table `tb_materia`
--

DROP TABLE IF EXISTS `tb_materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_materia` (
  `idmateria` int(11) NOT NULL AUTO_INCREMENT,
  `desmateria` varchar(45) CHARACTER SET latin1 NOT NULL,
  `desjustify` varchar(45) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`idmateria`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_materia`
--

LOCK TABLES `tb_materia` WRITE;
/*!40000 ALTER TABLE `tb_materia` DISABLE KEYS */;
INSERT INTO `tb_materia` VALUES (1,'Português',NULL),(2,'Matemática',NULL),(3,'Geografia',NULL),(4,'História',NULL),(5,'Biologia',NULL),(6,'Química',NULL),(7,'Fisíca',NULL),(8,'Sociologia',NULL),(9,'Educação Física',NULL),(10,'Bioquímica',NULL),(11,'Bioética',NULL),(12,'Inglês',NULL),(13,'Espanhol',NULL),(14,'Fundametos de Química',NULL),(15,'Genética Aplicada',NULL),(16,'Análise Físico-Químico',NULL),(17,'Biotecnologia',NULL),(18,'Literatura',NULL),(19,'Artes',NULL),(20,'Biologia Celular',NULL),(21,'Toxicologia',NULL),(22,'Tecnologia Enzimática',NULL),(23,'Tecnologia de Cultivo',NULL),(24,'Microbiologia',NULL),(25,'Parasitologia',NULL),(26,'Cultura de Tecidos',NULL),(27,'Tecnologia de Biocombustiveis',NULL),(28,'Cultura de células',NULL),(29,'Controle de Qualidade',NULL),(30,'Produção de Biofarma',NULL),(31,'Tecnologia de Fermentações',NULL),(32,'Aula 1 *',NULL),(33,'Aula 2 *',NULL),(34,'Aula 3 *',NULL),(35,'Aula 4 *',NULL),(36,'Aula 5 *',NULL),(37,'Aula 6 *',NULL),(38,'Aula 7 *',NULL),(39,'Aula 8 *',NULL),(40,'Aula 9 *',NULL);
/*!40000 ALTER TABLE `tb_materia` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-01-28  1:58:29
