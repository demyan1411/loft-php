-- MySQL dump 10.13  Distrib 5.7.16, for Win64 (x86_64)
--
-- Host: localhost    Database: loft_php
-- ------------------------------------------------------
-- Server version	5.7.16

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
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `street` varchar(100) DEFAULT NULL,
  `home` int(11) DEFAULT NULL,
  `part` int(11) DEFAULT NULL,
  `appt` int(11) DEFAULT NULL,
  `floor` int(11) DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `payment` varchar(20) DEFAULT NULL,
  `callback` varchar(20) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (4,'qwqwe',56,34,567,9,'qwe qwe q weqw e','Оплата по карте','Не перезванивать',2),(5,'qwqwe',56,34,567,9,'qwe qwe q weqw e','Оплата по карте','Не перезванивать',2),(17,'werwer',567,45,567,3,'werwer','Оплата по карте','Не перезванивать',24),(18,'werwer',567,45,567,3,'werwer','Оплата по карте','Не перезванивать',24),(19,'werwer',567,45,567,3,'werwer','Оплата по карте','Не перезванивать',24),(20,'werwer',567,45,567,3,'werwer','Оплата по карте','Не перезванивать',24),(21,'werwer',567,45,567,3,'werwer','Оплата по карте','Не перезванивать',24),(22,'werwer',567,45,567,3,'werwer','Оплата по карте','Не перезванивать',24),(23,'werwer',567,45,567,3,'werwer','Оплата по карте','Не перезванивать',24),(24,'werwer',567,45,567,3,'werwer','Оплата по карте','Не перезванивать',24),(25,'werwer',567,45,567,3,'werwer','Оплата по карте','Не перезванивать',24),(26,'qweqwe',234,234,324,43,'wer we r','Потребуется сдача','Не перезванивать',25),(27,'qweqwe',234,234,324,43,'wer we r','Потребуется сдача','Не перезванивать',25),(28,'rtyrty',456,45,56,6,NULL,'Потребуется сдача',NULL,26),(29,NULL,NULL,NULL,NULL,NULL,NULL,'Потребуется сдача',NULL,27),(30,NULL,NULL,NULL,NULL,NULL,NULL,'Потребуется сдача',NULL,27),(31,NULL,NULL,NULL,NULL,NULL,NULL,'Потребуется сдача',NULL,27),(32,'tyutuy',567,567,56,6,'tytyuuy','Оплата по карте',NULL,28),(33,'tyutuy',567,567,56,6,'tytyuuy','Оплата по карте',NULL,28),(34,'tyutuy',567,567,56,6,'tytyuuy','Оплата по карте',NULL,29),(35,'tyutuy',567,567,56,6,'tytyuuy er e edf df','Оплата по карте',NULL,29);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ivan','ivan@mail.ru',NULL),(2,'demjan','qwe@qwe.qwe',NULL),(3,'Андрей','andrey@qwe.qwe',NULL),(4,'elena','elena@qwe.qwe','8985345'),(23,NULL,'qwe@qwe.tre',NULL),(24,'wer','test@tst.qwe','+7 (234) ___ __ __'),(25,'qwe','zxc@zxc.zxc','+7 (123) ___ __ __'),(26,'rtyrty','ghj@fgh.fgh','+7 (456) 545 46 45'),(27,NULL,'dfg@rgdf.g',NULL),(28,'tyu','jkl@ghj.ghj','+7 (567) ___ __ __'),(29,'test','test3@test.qwe','+7 (567) ___ __ __');
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

-- Dump completed on 2017-10-27 22:09:05
