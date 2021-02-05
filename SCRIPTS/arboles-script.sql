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
-- Table structure for table `fudebiol_arboles`
--

DROP TABLE IF EXISTS `fudebiol_arboles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fudebiol_arboles` (
  `FA_ID` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del árbol.\n',
  `FA_NOMBRE_CIENTIFICO` varchar(30) NOT NULL COMMENT 'Nombre científico del árbol.\n',
  `FA_JIFFYS` int NOT NULL COMMENT 'Cantidad de Jiffys. \n',
  `FA_BOLSAS` int NOT NULL COMMENT 'Cantidad de bolsas.',
  `FA_ELEVACION_MINIMA` int DEFAULT NULL COMMENT 'Elevación en metros sobre el nivel del mar (msnm) mínima.',
  `FA_ELEVACION_MAXIMA` int DEFAULT NULL COMMENT 'Elevación en metros sobre el nivel del mar (msnm) máxima.',
  PRIMARY KEY (`FA_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fudebiol_arboles`
--

LOCK TABLES `fudebiol_arboles` WRITE;
/*!40000 ALTER TABLE `fudebiol_arboles` DISABLE KEYS */;
INSERT INTO `fudebiol_arboles` VALUES (1,'Abarema adenophora',0,0,50,500),
(2,'Acosmium panamense',0,0,10,400),
(3,'Anacardium excelsum ',0,0,10,800),
(4,'Andira inermis',0,0,0,1000),
(5,'Annona muricata',0,0,0,0),
(6,'Ardisia brenesii',0,0,50,1200),
(7,'Artocarpus altilis',0,0,0,0),
(8,'Astronium graveolens',0,0,10,1000),
(9,'Billia rosea',0,0,100,2800),
(10,'Brosimum alicastrum',0,0,0,900),
(11,'Brosimum utile',0,0,0,0),
(12,'Calatola costaricensis',0,0,50,2300),
(13,'Calliandra surinamensis ',0,0,0,1000),
(14,'Calophyllum brasiliense',0,0,0,0),
(15,'Calycophyllum candidissimum',0,0,0,0),
(16,'Cananga odorata ',0,0,0,1000),
(17,'Carapa guianensis',0,0,500,900),
(18,'Caryocar costaricense',0,0,0,0),
(19,'Cassia fistula ',0,0,0,700),
(20,'Cassia grandis',0,0,0,700),
(21,'Cedrela odorata',0,0,0,900),
(22,'Chloroleucon eurycyclum',0,0,0,1500),
(23,'Citrus sp',0,0,0,0),
(24,'Clarisia biflora',0,0,0,1300),
(25,'Cojoba arborea',0,0,0,1125),
(26,'Copaifera aromatica ',0,0,0,700),
(27,'Cordia alliodora',0,0,0,1300),
(28,'Cordia cymosa',0,0,20,1800),
(29,'Crateva tapia ',0,0,0,0),
(30,'Cratylia argentea',0,0,0,0),
(31,'Crotylia argentea',0,0,0,0),
(32,'Cynometra hemitomophylla',0,0,0,0),
(33,'Dalbergia retusa',0,0,50,300),
(34,'Delonix regia',0,0,0,1000),
(35,'Dendropanax arboreus ',0,0,0,1700),
(36,'Dilodendron costaricense',0,0,10,1000),
(37,'Diphysa americana',0,0,0,0),
(38,'Enterolobium cyclocarpum ',0,0,0,1000),
(39,'Enterolobium schomburgkii',0,0,0,0),
(40,'Erythrina poeppigiana',0,0,0,0),
(41,'Garcinia madruno',0,0,0,1200),
(42,'Godmania aesculifolia',0,0,0,0),
(43,'Hevea brasiliensis',0,0,0,0),
(44,'Humiriastrum diguense',0,0,0,700),
(45,'Hyeronima alchorneoides',0,0,0,1000),
(46,'Hymenaea courbaril',0,0,0,800),
(47,'Hymenolobium mesoamericanum',0,0,30,700),
(48,'Inga edulis',0,0,0,0),
(49,'Inga spectabilis',0,0,0,0),
(50,'Jacaranda caucana ',0,0,0,0),
(51,'Lacmellea panamensis',0,0,0,700),
(52,'Lafoensia punicifolia',0,0,200,1400),
(53,'Lagerstroemia speciosa',0,0,0,0),
(54,'Lonchocarpus heptaphyllus',0,0,0,800),
(55,'Macrocnemum roseum',0,0,0,1600),
(56,'Melicoccus bijugatus ',0,0,0,0),
(57,'Myroxylon balsamum ',0,0,0,700),
(58,'Nectandra martinicensis',0,0,0,1300),
(59,'Ochroma pyramidale',0,0,0,0),
(60,'Ocotea sp',0,0,0,1500),
(61,'Ocotea whitei',0,0,800,1600),
(62,'Platymiscium sp',0,0,0,600),
(63,'Posoqueria latifolia',0,0,0,0),
(64,'Pouteria buenaventurensis',0,0,0,600),
(65,'Pouteria fossicola',0,0,10,1620),
(66,'Pouteria multiflora',0,0,700,2000),
(67,'Pouteria viridis',0,0,100,1500),
(68,'Protium ravenii ',0,0,0,0),
(69,'Protium sp',0,0,0,0),
(70,'Protium tenuifolium',0,0,0,1000),
(71,'Pseudosamanea guachapele',0,0,0,0),
(72,'Pterocarpus rohrii',0,0,0,0),
(73,'Samanea saman ',0,0,0,800),
(74,'Schizolobium parahyba',0,0,0,0),
(75,'Sloanea medusula',0,0,0,0),
(76,'Sterculia apetala',0,0,0,500),
(77,'Sterculia recordiana',0,0,0,1100),
(78,'Swartzia panamensis',0,0,10,400),
(79,'Swartzia simplex',0,0,0,0),
(80,'Swietenia macrophylla',0,0,0,600),
(81,'Syzygium malaccense',0,0,0,0),
(82,'Tabebuia guayacan',0,0,0,1200),
(83,'Tabebuia impetiginosa',0,0,0,300),
(84,'Tabebuia ochracea',0,0,0,900),
(85,'Tabebuia rosea',0,0,10,1000),
(86,'Tecoma stans',0,0,50,1300),
(87,'Terminalia amazonia',0,0,0,0),
(88,'Terminalia catappa',0,0,0,600),
(89,'Terminalia ivorensis',0,0,0,600),
(90,'Terminalia oblonga',0,0,5,1000),
(91,'Theobroma cacao',0,0,0,0),
(92,'Virola surinamensis',0,0,0,1000),
(93,'Vitex cooperi',0,0,10,1200),
(94,'Vochysia guatemalensis',0,0,0,950),
(95,'Xylopia sp',0,0,0,0),
(96,'Zygia longifolia ',0,0,0,1125);
/*!40000 ALTER TABLE `fudebiol_arboles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-02-04 19:01:04
