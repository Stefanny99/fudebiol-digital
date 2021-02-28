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
  `FA_ID` int unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador del árbol.',
  `FA_NOMBRE_CIENTIFICO` varchar(30) NOT NULL COMMENT 'Nombre científico del árbol.',
  `FA_JIFFYS` int NOT NULL COMMENT 'Cantidad de Jiffys.',
  `FA_BOLSAS` int NOT NULL COMMENT 'Cantidad de bolsas.',
  `FA_ELEVACION_MINIMA` int DEFAULT NULL COMMENT 'Elevación en metros sobre el nivel del mar (msnm) mínima.',
  `FA_ELEVACION_MAXIMA` int DEFAULT NULL COMMENT 'Elevación en metros sobre el nivel del mar (msnm) máxima.',
  `FA_IMAGEN_FORMATO` varchar(15) NULL COMMENT 'Formato de la imagen del árbol',
  `FA_NOMBRES_COMUNES` varchar(150) NOT NULL COMMENT 'Nombres comunes del árbol',
  PRIMARY KEY (`FA_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fudebiol_arboles`
--

LOCK TABLES `fudebiol_arboles` WRITE;
/*!40000 ALTER TABLE `fudebiol_arboles` DISABLE KEYS */;
INSERT INTO `fudebiol_arboles` VALUES 
(1,'Abarema adenophora',0,0,50,500,'','Ojo de gringo'),
(2,'Acosmium panamense',0,0,10,400,'','Guayacán carboncillo'),
(3,'Anacardium excelsum ',0,0,10,800,'','Espavel-Rabito'),
(4,'Andira inermis',0,0,0,1000,'','Almendro de río-Arenillo-Carne asada'),
(5,'Annona muricata',0,0,0,0,'','Guanábana'),
(6,'Ardisia brenesii',0,0,50,1200,'','Tucuico'),
(7,'Artocarpus altilis',0,0,0,0,'','Fruta de pan'),
(8,'Astronium graveolens',0,0,10,1000,'','Ron-ron'),
(9,'Billia rosea',0,0,100,2800,'','Cucaracho'),
(10,'Brosimum alicastrum',0,0,0,900,'','Ojoche'),
(11,'Brosimum utile',0,0,0,0,'','Baco-Lechoso'),
(12,'Calatola costaricensis',0,0,50,2300,'','Palo azul-Palo de papa'),
(13,'Calliandra surinamensis ',0,0,0,1000,'','Cabello de ángel'),
(14,'Calophyllum brasiliense',0,0,0,0,'','Cedro María-María'),
(15,'Calycophyllum candidissimum',0,0,0,0,'','Modroño-Sálamo'),
(16,'Cananga odorata ',0,0,0,1000,'','Ilang-ilang'),
(17,'Carapa guianensis',0,0,500,900,'','Caobilla-Cedro macho'),
(18,'Caryocar costaricense',0,0,0,0,'','Ajillo-Ajo-Ajo negro-Manú-Plomillo'),
(19,'Cassia fistula ',0,0,0,700,'','Caña fistola-Lluvia de oro'),
(20,'Cassia grandis',0,0,0,700,'','Carao'),
(21,'Cedrela odorata',0,0,0,900,'','Cedro amargo'),
(22,'Chloroleucon eurycyclum',0,0,0,1500,'','Cashá'),
(23,'Citrus sp',0,0,0,0,'','Naranja'),
(24,'Clarisia biflora',0,0,0,1300,'','Lechillo'),
(25,'Cojoba arborea',0,0,0,1125,'','Lorito-Ardillo'),
(26,'Copaifera aromatica ',0,0,0,700,'','Camibar'),
(27,'Cordia alliodora',0,0,0,1300,'','Laurel'),
(28,'Cordia cymosa',0,0,20,1800,'','Cymosa-Laurel negro'),
(29,'Crateva tapia ',0,0,0,0,'','Tres dedos'),
(30,'Cratylia argentea',0,0,0,0,'','Soncoya'),
(31,'Crotylia argentea',0,0,0,0,'','Veraniega'),
(32,'Cynometra hemitomophylla',0,0,0,0,'','Guapinol negro'),
(33,'Dalbergia retusa',0,0,50,300,'','Cocobolo'),
(34,'Delonix regia',0,0,0,1000,'','Malinche'),
(35,'Dendropanax arboreus ',0,0,0,1700,'','Fosforillo'),
(36,'Dilodendron costaricense',0,0,10,1000,'','Iguano'),
(37,'Diphysa americana',0,0,0,0,'','Guachipelín'),
(38,'Enterolobium cyclocarpum ',0,0,0,1000,'','Guanacaste'),
(39,'Enterolobium schomburgkii',0,0,0,0,'','Guanacaste macho'),
(40,'Erythrina poeppigiana',0,0,0,0,'','Poró gigante'),
(41,'Garcinia madruno',0,0,0,1200,'','Jorco'),
(42,'Godmania aesculifolia',0,0,0,0,'','Corteza de chivo'),
(43,'Hevea brasiliensis',0,0,0,0,'','Hule'),
(44,'Humiriastrum diguense',0,0,0,700,'','Chiricano alegre'),
(45,'Hyeronima alchorneoides',0,0,0,1000,'','Pilón-Comenegro-Zapatero'),
(46,'Hymenaea courbaril',0,0,0,800,'','Guapinol'),
(47,'Hymenolobium mesoamericanum',0,0,30,700,'','Cola de pavo'),
(48,'Inga edulis',0,0,0,0,'','Guaba chilillo'),
(49,'Inga spectabilis',0,0,0,0,'','Guaba costa-Machete'),
(50,'Jacaranda caucana ',0,0,0,0,'','Jacaranda'),
(51,'Lacmellea panamensis',0,0,0,700,'','Lagarto negro'),
(52,'Lafoensia punicifolia',0,0,200,1400,'','Cascarilla'),
(53,'Lagerstroemia speciosa',0,0,0,0,'','Orgullo de la India'),
(54,'Lonchocarpus heptaphyllus',0,0,0,800,'','Chaperno'),
(55,'Macrocnemum roseum',0,0,0,1600,'','Palo cuadrado'),
(56,'Melicoccus bijugatus ',0,0,0,0,'','Mamón'),
(57,'Myroxylon balsamum ',0,0,0,700,'','Bálsamo-Bálsamo del Perú-Chirraca'),
(58,'Nectandra martinicensis',0,0,0,1300,'','Quizarrá oloroso'),
(59,'Ochroma pyramidale',0,0,0,0,'','Balsa'),
(60,'Ocotea sp',0,0,0,1500,'','Aguacatillo-Ira'),
(61,'Ocotea whitei',0,0,800,1600,'','Aguacatillo blanco'),
(62,'Platymiscium sp',0,0,0,600,'','Cachimbo-Cristúbal'),
(63,'Posoqueria latifolia',0,0,0,0,'','Guayaba de mono'),
(64,'Pouteria buenaventurensis',0,0,0,600,'','Mameycillo'),
(65,'Pouteria fossicola',0,0,10,1620,'','Mamey de montaña'),
(66,'Pouteria multiflora',0,0,700,2000,'','Zapotón'),
(67,'Pouteria viridis',0,0,100,1500,'','Zapotillo'),
(68,'Protium ravenii ',0,0,0,0,'','Alcanfor'),
(69,'Protium sp',0,0,0,0,'','Canfín-Copal'),
(70,'Protium tenuifolium',0,0,0,1000,'','Copalillo'),
(71,'Pseudosamanea guachapele',0,0,0,0,'','Cenízaro macho-Guayaquil-Quebracho'),
(72,'Pterocarpus rohrii',0,0,0,0,'','Sangrillo'),
(73,'Samanea saman ',0,0,0,800,'','Cenízaro'),
(74,'Schizolobium parahyba',0,0,0,0,'','Gallinazo'),
(75,'Sloanea medusula',0,0,0,0,'','Achotón-Abrojo-Paleta'),
(77,'Sterculia recordiana',0,0,0,1100,'','Papa-Panamá'),
(78,'Swartzia panamensis',0,0,10,400,'','Malvecino'),
(79,'Swartzia simplex',0,0,0,0,'','Cacho-Naranjito'),
(80,'Swietenia macrophylla',0,0,0,600,'','Caoba'),
(81,'Syzygium malaccense',0,0,0,0,'','Manzana de agua'),
(82,'Tabebuia guayacan',0,0,0,1200,'','Guayacán'),
(83,'Tabebuia impetiginosa',0,0,0,300,'','Corteza negro'),
(84,'Tabebuia ochracea',0,0,0,900,'','Corteza amarilla'),
(85,'Tabebuia rosea',0,0,10,1000,'','Roble de sabana'),
(86,'Tecoma stans',0,0,50,1300,'','Vainillo'),
(87,'Terminalia amazonia',0,0,0,0,'','Amarillón-Roble coral'),
(88,'Terminalia catappa',0,0,0,600,'','Almendro de playa'),
(89,'Terminalia ivorensis',0,0,0,600,'','Roblemarfil-Terminalia'),
(90,'Terminalia oblonga',0,0,5,1000,'','Surá-Guayabón'),
(91,'Theobroma cacao',0,0,0,0,'','Cacao'),
(92,'Virola surinamensis',0,0,0,1000,'','Candelo'),
(93,'Vitex cooperi',0,0,10,1200,'','Fruta dorada-Cuajada-Manú platano'),
(94,'Vochysia guatemalensis',0,0,0,950,'','Mayo-Cebo-Chancho blanco'),
(95,'Xylopia sp',0,0,0,0,'','Malagueto'),
(96,'Zygia longifolia ',0,0,0,1125,'','Sotacaballo');
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

-- Dump completed on 2021-02-27  8:20:22
