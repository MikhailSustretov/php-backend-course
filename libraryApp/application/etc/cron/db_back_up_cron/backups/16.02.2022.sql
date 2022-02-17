-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: library_app
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `pass` varchar(500) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'eugene','n0tail');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authors`
--

DROP TABLE IF EXISTS `authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `authors` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(500) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `author` (`author`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authors`
--

LOCK TABLES `authors` WRITE;
/*!40000 ALTER TABLE `authors` DISABLE KEYS */;
INSERT INTO `authors` VALUES (33,''),(22,'1'),(44,'d'),(47,'ewq'),(36,'q'),(38,'q1'),(39,'q2'),(40,'q3'),(46,'qwe'),(48,'rewq'),(32,'test1'),(41,'w1'),(42,'w2'),(43,'w3'),(11,'А. Белов'),(14,'Александр Сераков'),(5,'Гэри Маклин Холл'),(20,'Джей Макгаврен'),(6,'Джеймс Р. Грофф'),(10,'Джереми Блум'),(9,'Джон Вудкок'),(21,'Дрю Нейл'),(4,'Дэвид Флэнаган'),(7,'Люк Веллинг'),(2,'М. Вильямс'),(1,'Марк Саммерфильд'),(19,'Мартин Фаулер, Прамодкумар Дж. Садаладж'),(16,'Пол Дейтел, Харви Дейтел'),(17,'Роберт Мартин'),(8,'Сергей Мастицкий'),(13,'Сет Гринберг'),(12,'Сэмюэл Грингард'),(15,'Тим Кедлек'),(3,'Уэс Маккинни'),(18,'Энтони Грей');
/*!40000 ALTER TABLE `authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books`
--

DROP TABLE IF EXISTS `books`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `image_name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `pages_count` int NOT NULL DEFAULT '0',
  `publication_date` year NOT NULL DEFAULT '2000',
  `about_book` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `isbn` tinyint DEFAULT NULL,
  `book_webpage_visits` int unsigned NOT NULL DEFAULT '0',
  `number_of_button_clicks` int unsigned NOT NULL DEFAULT '0',
  `deleted` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books`
--

LOCK TABLES `books` WRITE;
/*!40000 ALTER TABLE `books` DISABLE KEYS */;
INSERT INTO `books` VALUES (2,'Программирование на языке Go!','Go_Programming!.jpg',280,2008,'',NULL,10,10,_binary '\0'),(3,'Толковый словарь сетевых терминов и аббревиатур','Explanatory_dictionary_of_network_terms_and_abbreviations.jpg',380,2006,'',NULL,1,0,_binary '\0'),(4,'Python for Data Analysis','Python_for_Data_Analysis.jpg',338,2014,'',NULL,1,0,_binary '\0'),(7,'JavaScript Pocket Reference','JavaScript_Pocket_Reference.jpg',377,2012,'',NULL,1,0,_binary '\0'),(8,'Adaptive Code via C#: Class and Interface Design, Design Patterns, and SOLID Principles','Adaptive_Code_via_C_sharp.jpg',340,2007,'',NULL,0,0,_binary '\0'),(9,'SQL: The Complete Reference','SQL_The_Complete_Reference.jpg',420,2009,'',NULL,0,0,_binary '\0'),(10,'PHP and MySQL Web Development','PHP_and_MySQL_Web_Development.jpg',344,2005,'',NULL,0,0,_binary '\0'),(11,'Статистический анализ и визуализация данных с помощью R','Statistical_analysis_and_data_visualization_with_R.jpg',280,2010,'',NULL,0,0,_binary '\0'),(12,'Computer Coding for Kid','Computer_Coding_for_Kid.jpg',260,2017,'',NULL,2,1,_binary '\0'),(13,'Exploring Arduino: Tools and Techniques for Engineering Wizardry','Exploring_Arduino.jpg',320,2013,'',NULL,0,0,_binary '\0'),(14,'Программирование микроконтроллеров для начинающих и не только','Microcontroller_programming_for_beginners_and_beyond.jpg',250,2012,'',NULL,2,0,_binary '\0'),(15,'The Internet of Things','The_Internet_of_Things.jpg',260,2005,'',NULL,0,0,_binary '\0'),(16,'Sketching User Experiences: The Workbook','Sketching_User_Experiences_The_Workbook.jpg',250,2016,'',NULL,0,0,_binary '\0'),(17,'InDesign CS6','InDesign_CS6.jpg',250,2017,'',NULL,0,0,_binary '\0'),(18,'Adaptive design','Adaptive_design.jpg',280,2016,'',NULL,0,0,_binary '\0'),(19,'Android для разработчиков','Android_for_Developers.jpg',300,2013,'',NULL,0,0,_binary '\0'),(20,'Clean Code: A Handbook of Agile Software Craftsmanship','Clean_Code_A_Handbook_of_Agile_Software_Craftsmanship.jpg',307,2016,'',NULL,0,0,_binary '\0'),(21,'Swift Pocket Reference: Programming for iOS and OS X','Swift_Pocket_Reference_Programming_for_iOS_and_OS_X.jpg',300,2018,'',NULL,0,0,_binary '\0'),(22,'NoSQL Distilled: A Brief Guide to the Emerging World of Polyglot Persistence','NoSQL_Distilled.jpg',360,2013,NULL,NULL,0,0,_binary '\0'),(23,'Head First Ruby','Head_First_Ruby.jpg',280,2018,NULL,NULL,0,0,_binary '\0'),(24,'Practical Vim','Practical_Vim.jpg',340,2017,NULL,NULL,0,0,_binary '\0'),(72,'l','Adaptive_Code_via_C_sharp.jpg',0,2001,'1',NULL,0,0,_binary '\0'),(73,'l','Adaptive_Code_via_C_sharp.jpg',0,2001,'1',NULL,0,0,_binary '\0'),(74,'l','test.png',0,2001,'1',NULL,0,0,_binary '\0');
/*!40000 ALTER TABLE `books` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `books_authors`
--

DROP TABLE IF EXISTS `books_authors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `books_authors` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `book_id` int unsigned DEFAULT NULL,
  `author_id` int unsigned DEFAULT NULL,
  `deleted` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`),
  KEY `book_id` (`book_id`),
  KEY `author_id` (`author_id`),
  CONSTRAINT `books_authors_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `books_authors_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `books_authors`
--

LOCK TABLES `books_authors` WRITE;
/*!40000 ALTER TABLE `books_authors` DISABLE KEYS */;
INSERT INTO `books_authors` VALUES (1,2,1,_binary '\0'),(2,3,2,_binary '\0'),(3,4,3,_binary '\0'),(4,7,4,_binary '\0'),(5,8,5,_binary '\0'),(6,9,6,_binary '\0'),(7,10,7,_binary '\0'),(8,11,8,_binary '\0'),(9,12,9,_binary '\0'),(10,13,10,_binary '\0'),(11,14,11,_binary '\0'),(12,15,12,_binary '\0'),(13,16,13,_binary '\0'),(14,17,14,_binary '\0'),(15,18,15,_binary '\0'),(16,19,16,_binary '\0'),(17,20,17,_binary '\0'),(18,21,18,_binary '\0'),(19,22,19,_binary '\0'),(20,23,20,_binary '\0'),(21,24,21,_binary '\0'),(22,72,22,_binary '\0'),(23,73,22,_binary '\0'),(24,74,22,_binary '\0'),(32,2,11,_binary '\0');
/*!40000 ALTER TABLE `books_authors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0000_base.sql','2022-02-15 07:38:16'),(2,'0001_created_authors.sql','2022-02-15 07:38:16'),(3,'0002_create_relation_table_books_authors.sql','2022-02-15 07:38:16');
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-02-16 11:31:37
