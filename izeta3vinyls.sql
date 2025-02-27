-- MySQL dump 10.13  Distrib 8.0.35, for Linux (x86_64)
--
-- Host: localhost    Database: izeta3php
-- ------------------------------------------------------
-- Server version	8.0.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_usuario` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_usuario` (`nombre_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (2,'izeta4','$2y$10$jXDvmsYJhgPJdL9dzIlJ5eC6cDIymxSXLWRapBj/xv2pUlmPI4.Xq','2025-02-12 16:03:34'),(7,'qqq','$2y$10$3JifsI45P0XDPimgL5o.c.5D56POAflrC6564up979KCXKPya0shu','2025-02-12 16:43:01'),(8,'pene','$2y$10$/JqW4OpAF/vmtzmrd.sAkepTWvSB67wWynPvTkhpKTbt92v/9glai','2025-02-18 18:43:56');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vinyls`
--

DROP TABLE IF EXISTS `vinyls`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vinyls` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_vinilo` varchar(255) NOT NULL,
  `nombre_artista` varchar(255) NOT NULL,
  `genero` varchar(100) DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `fecha_lanzamiento` date DEFAULT NULL,
  `url_imagen` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vinyls`
--

LOCK TABLES `vinyls` WRITE;
/*!40000 ALTER TABLE `vinyls` DISABLE KEYS */;
INSERT INTO `vinyls` VALUES (28,'Casanova Deluxe','Recycled J','Hip Hop',20.00,'2024-12-01','https://cdn.grupoelcorteingles.es/SGFM/dctm/MEDIA03/202309/04/00105112232672____2__1200x1200.jpg'),(31,'Casanova Deluxe','Recycled J','Hip Hop',20.00,'2024-12-01','https://cdn.grupoelcorteingles.es/SGFM/dctm/MEDIA03/202309/04/00105112232672____2__1200x1200.jpg'),(32,'eRefdSFASDF','ASDFASDFAS','DFASDFASDFASDF',123123.00,'2313-03-12','https://estaticos-cdn.prensaiberica.es/clip/8c18b983-86e8-4537-bd56-c16703503367_16-9-discover-aspect-ratio_default_0.webp'),(33,'Casanova Deluxe','Recycled J','Hip Hop',20.00,'2024-12-01','https://cdn.grupoelcorteingles.es/SGFM/dctm/MEDIA03/202309/04/00105112232672____2__1200x1200.jpg');
/*!40000 ALTER TABLE `vinyls` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-25 18:59:00
