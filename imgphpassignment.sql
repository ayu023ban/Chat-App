-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: localhost    Database: imgphpassignment
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

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
-- Table structure for table `ayush_chat`
--

DROP TABLE IF EXISTS `ayush_chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ayush_chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `message` varchar(2000) DEFAULT NULL,
  `sent_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `sender_id` (`sender_id`),
  KEY `receiver_id` (`receiver_id`),
  CONSTRAINT `ayush_chat_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `ayush_user` (`id`),
  CONSTRAINT `ayush_chat_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `ayush_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ayush_chat`
--

LOCK TABLES `ayush_chat` WRITE;
/*!40000 ALTER TABLE `ayush_chat` DISABLE KEYS */;
INSERT INTO `ayush_chat` VALUES (28,1,2,'hello','2020-03-28 21:00:22'),(29,2,1,'hi','2020-03-28 21:01:16'),(30,1,2,'how are you','2020-03-28 21:01:22'),(31,2,1,'I am fine you tell about yourself','2020-03-28 21:01:29'),(32,1,2,'i am great what are you doing in this quarantine time','2020-03-28 21:01:51');
/*!40000 ALTER TABLE `ayush_chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ayush_profile`
--

DROP TABLE IF EXISTS `ayush_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ayush_profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `qualification` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `ayush_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `ayush_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ayush_profile`
--

LOCK TABLES `ayush_profile` WRITE;
/*!40000 ALTER TABLE `ayush_profile` DISABLE KEYS */;
INSERT INTO `ayush_profile` VALUES (1,'mango','apple','sec','images/1.png'),(2,'mango','mango','sec','images/2.jpg'),(3,'example','example','sec','images/3.png');
/*!40000 ALTER TABLE `ayush_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ayush_session`
--

DROP TABLE IF EXISTS `ayush_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ayush_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) DEFAULT NULL,
  `cookie_id` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `session_id` (`session_id`),
  CONSTRAINT `ayush_session_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `ayush_user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ayush_session`
--

LOCK TABLES `ayush_session` WRITE;
/*!40000 ALTER TABLE `ayush_session` DISABLE KEYS */;
/*!40000 ALTER TABLE `ayush_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ayush_user`
--

DROP TABLE IF EXISTS `ayush_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ayush_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `phonenumber` varchar(20) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ayush_user`
--

LOCK TABLES `ayush_user` WRITE;
/*!40000 ALTER TABLE `ayush_user` DISABLE KEYS */;
INSERT INTO `ayush_user` VALUES (1,'example@gmail.com','$2y$10$20mk7VcLSs6ih2PnC7Cch.RU0iP2jW10/HjSLz1.DjJRQE6yHFake','example','1234567890','male'),(2,'example2@gmail.com','$2y$10$/emlxkib9jXI/ks0FmyWyOai858OxLiLeHYxNHdpZurZckLh9IB1a','example2','1234567890','male'),(3,'example3@gmail.com','$2y$10$6FxAZq7hM.11gYopc/oMC.ROrl0Jnty1e/NUN8NIG0ZtGWKK4ktem','example3','1234567890','female');
/*!40000 ALTER TABLE `ayush_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-28 21:12:45
