-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: php_1
-- ------------------------------------------------------
-- Server version	8.0.19

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
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `goods` varchar(4000) NOT NULL,
  `state` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (12,2,'2020-09-03 23:49:52','{\"1\":{\"name\":\"\\u0422\\u043e\\u0432\\u0430\\u04401\",\"price\":\"100\",\"count\":2}}','Завершен'),(13,2,'2020-09-03 23:50:18','{\"2\":{\"name\":\"\\u0422\\u043e\\u0432\\u0430\\u04402\",\"price\":\"2100\",\"count\":1},\"3\":{\"name\":\"\\u0422\\u043e\\u0432\\u0430\\u04403\",\"price\":\"3100\",\"count\":1},\"4\":{\"name\":\"\\u0422\\u043e\\u0432\\u0430\\u04404\",\"price\":\"4100\",\"count\":1}}','новый'),(14,4,'2020-09-03 23:53:09','{\"1\":{\"name\":\"\\u0422\\u043e\\u0432\\u0430\\u04401\",\"price\":\"100\",\"count\":1},\"2\":{\"name\":\"\\u0422\\u043e\\u0432\\u0430\\u04402\",\"price\":\"2100\",\"count\":1},\"3\":{\"name\":\"\\u0422\\u043e\\u0432\\u0430\\u04403\",\"price\":\"3100\",\"count\":1}}','новый'),(15,4,'2020-09-03 23:53:20','{\"2\":{\"name\":\"\\u0422\\u043e\\u0432\\u0430\\u04402\",\"price\":\"2100\",\"count\":3},\"4\":{\"name\":\"\\u0422\\u043e\\u0432\\u0430\\u04404\",\"price\":\"4100\",\"count\":3},\"5\":{\"name\":\"\\u0422\\u043e\\u0432\\u0430\\u04405\",\"price\":\"5100\",\"count\":2}}','Завершен'),(16,2,'2020-10-04 12:36:55','{\"1\":{\"name\":\"\\u0422\\u043e\\u0432\\u0430\\u04401\",\"count\":1,\"price\":\"100\"}}',NULL),(17,4,'2020-10-04 13:09:21','{\"1\":{\"name\":\"\\u0422\\u043e\\u0432\\u0430\\u04401\",\"count\":1,\"price\":\"100\"},\"5\":{\"name\":\"\\u0422\\u043e\\u0432\\u0430\\u04405\",\"count\":2,\"price\":\"5100\"},\"4\":{\"name\":\"\\u0422\\u043e\\u0432\\u0430\\u04404\",\"count\":2,\"price\":\"4100\"}}','Завершен'),(18,4,'2020-10-04 13:09:51','{\"1\":{\"name\":\"\\u0422\\u043e\\u0432\\u0430\\u04401\",\"count\":1,\"price\":\"100\"},\"5\":{\"name\":\"\\u0422\\u043e\\u0432\\u0430\\u04405\",\"count\":2,\"price\":\"5100\"},\"4\":{\"name\":\"\\u0422\\u043e\\u0432\\u0430\\u04404\",\"count\":2,\"price\":\"4100\"}}','Завершен'),(19,4,'2020-10-04 13:10:51','{\"1\":{\"name\":\"\\u0422\\u043e\\u0432\\u0430\\u04401\",\"count\":1,\"price\":\"100\"},\"5\":{\"name\":\"\\u0422\\u043e\\u0432\\u0430\\u04405\",\"count\":2,\"price\":\"5100\"},\"4\":{\"name\":\"\\u0422\\u043e\\u0432\\u0430\\u04404\",\"count\":2,\"price\":\"4100\"}}','Новый'),(20,2,'2020-10-04 13:59:34','{\"8\":{\"name\":\"\\u0422\\u043e\\u0432\\u0430\\u04405\",\"count\":1,\"price\":\"5100\"},\"9\":{\"name\":\"\\u0422\\u043e\\u0432\\u0430\\u0440 \\u0442\\u0442\",\"count\":2,\"price\":\"124\"}}','Завершен');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-04 17:02:10
