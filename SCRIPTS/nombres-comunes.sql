CREATE DATABASE  IF NOT EXISTS `bd_fudebiol_digital` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bd_fudebiol_digital`;
-- MySQL dump 10.13  Distrib 8.0.22, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bd_fudebiol_digital
-- ------------------------------------------------------
-- Server version	8.0.22

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `fudebiol_nombres_comunes`
--

DROP TABLE IF EXISTS `fudebiol_nombres_comunes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fudebiol_nombres_comunes` (
  `FNC_ID` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del nombre común de un árbol.',
  `FNC_ARBOL_ID` int unsigned NOT NULL COMMENT 'Identificador (foránea) del árbol.\n',
  `FNC_NOMBRE` varchar(30) NOT NULL COMMENT 'Nombre común del árbol.\n',
  PRIMARY KEY (`FNC_ID`),


  KEY `FK_NOMBRES_COMUNES_ARBOL` (`FNC_ARBOL_ID`),


  CONSTRAINT `Relationship4` FOREIGN KEY (`FNC_ARBOL_ID`) REFERENCES `fudebiol_arboles` (`FA_ID`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fudebiol_nombres_comunes`
--

LOCK TABLES `fudebiol_nombres_comunes` WRITE;
/*!40000 ALTER TABLE `fudebiol_nombres_comunes` DISABLE KEYS */;
INSERT INTO `fudebiol_nombres_comunes` VALUES 
(1,75,'Abrojo'),

(2,75,'Achotón'),

(3,60,'Aguacatillo'),

(4,61,'Aguacatillo blanco'),

(5,18,'Ajillo'),

(6,18,'Ajo'),

(7,18,'Ajo negro'),

(8,68,'Alcanfor'),

(9,88,'Almendro de playa'),

(10,4,'Almendro de río'),

(11,87,'Amarillón'),

(12,25,'Ardillo'),

(13,4,'Arenillo'),

(14,11,'Baco'),

(15,59,'Balsa'),

(16,57,'Bálsamo'),

(17,57,'Bálsamo del Perú'),

(18,13,'Cabello de ángel'),

(19,91,'Cacao'),

(20,62,'Cachimbo'),

(21,79,'Cacho'),

(22,26,'Camibar'),

(23,92,'Candelo'),

(24,69,'Canfín'),

(25,19,'Caña fistola'),

(26,80,'Caoba'),

(27,17,'Caobilla'),

(28,20,'Carao'),

(29,4,'Carne asada'),

(30,52,'Cascarilla'),

(31,22,'Cashá'),

(32,94,'Cebo'),

(33,21,'Cedro amargo'),

(34,17,'Cedro macho'),

(35,14,'Cedro María'),

(36,73,'Cenízaro'),

(37,71,'Cenízaro macho'),

(38,94,'Chancho blanco'),

(39,54,'Chaperno'),

(40,44,'Chiricano alegre'),

(41,57,'Chirraca'),

(42,33,'Cocobolo'),

(43,47,'Cola de pavo'),

(44,45,'Comenegro'),

(45,69,'Copal'),

(46,70,'Copalillo'),

(47,84,'Corteza amarilla'),

(48,42,'Corteza de chivo'),

(49,83,'Corteza negro'),

(50,62,'Cristúbal'),

(51,93,'Cuajada'),

(52,9,'Cucaracho'),

(53,28,'Cymosa'),

(54,3,'Espavel'),

(55,35,'Fosforillo'),

(56,7,'Fruta de pan'),

(57,93,'Fruta dorada'),

(58,74,'Gallinazo'),

(59,73,'Genízaro'),

(60,48,'Guaba chilillo'),

(61,49,'Guaba costa'),

(62,37,'Guachipelín'),

(63,5,'Guanábana'),

(64,38,'Guanacaste'),

(65,39,'Guanacaste macho'),

(66,46,'Guapinol'),

(67,32,'Guapinol negro'),

(68,63,'Guayaba de mono'),

(69,90,'Guayabón'),

(70,82,'Guayacán'),

(71,2,'Guayacán carboncillo'),

(72,71,'Guayaquil'),

(73,43,'Hule'),

(74,36,'Iguano'),

(75,16,'Ilang-ilang'),

(76,60,'Ira'),

(77,50,'Jacaranda'),

(78,41,'Jorco'),

(79,51,'Lagarto negro'),

(80,27,'Laurel'),

(81,28,'Laurel negro'),

(82,24,'Lechillo'),

(83,11,'Lechoso'),

(84,19,'Lluvia de oro'),

(85,25,'Lorito'),

(86,49,'Machete'),

(87,95,'Malagueto'),

(88,34,'Malinche'),

(89,78,'Malvecino'),

(90,65,'Mamey de montaña'),

(91,64,'Mameycillo'),

(92,56,'Mamón'),

(93,18,'Manú'),

(94,93,'Manú platano'),

(95,81,'Manzana de agua'),

(96,14,'María'),

(97,94,'Mayo'),

(98,15,'Modroño'),

(100,23,'Naranja'),

(101,79,'Naranjito'),

(102,1,'Ojo de gringo'),

(103,10,'Ojoche'),

(104,53,'Orgullo de la India'),

(105,75,'Paleta'),

(106,12,'Palo azul'),

(107,55,'Palo cuadrado'),

(108,12,'Palo de papa'),

(109,77,'Panamá'),

(110,77,'Papa'),

(111,45,'Pilón'),

(112,18,'Plomillo'),

(113,40,'Poró gigante'),

(114,71,'Quebracho'),

(115,58,'Quizarrá oloroso'),

(116,3,'Rabito'),

(117,87,'Roble coral'),

(118,85,'Roble de sabana'),

(119,89,'Roblemarfil'),

(120,8,'Ron-ron'),

(121,15,'Sálamo'),

(122,72,'Sangrillo'),

(123,30,'Soncoya'),

(124,96,'Sotacaballo'),

(125,90,'Surá'),

(126,89,'Terminalia'),

(127,29,'Tres dedos'),

(128,6,'Tucuico'),

(129,86,'Vainillo'),

(130,31,'Veraniega'),

(131,45,'Zapatero'),

(132,67,'Zapotillo'),

(133,66,'Zapotón');
/*!40000 ALTER TABLE `fudebiol_nombres_comunes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-05 15:27:55
