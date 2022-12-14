-- MySQL dump 10.13  Distrib 8.0.21, for Linux (x86_64)
--
-- Host: localhost    Database: efham_sa7
-- ------------------------------------------------------
-- Server version	8.0.21-0ubuntu0.20.04.4

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'admin','admin@admin.com','$2y$10$PYaNCvc6.fd0eyNfy0btDuyD27YksveeoC.PTS8IKKOHiDAjWcAOu','lYx9FPgBptSarcQGNns6tXhY4YW2B8MU7BpQfcXEaxjacAVUAAoBwGlm6hMS','2020-08-22 09:42:25','2020-08-22 09:42:25');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alerts`
--

DROP TABLE IF EXISTS `alerts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `alerts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alerts`
--

LOCK TABLES `alerts` WRITE;
/*!40000 ALTER TABLE `alerts` DISABLE KEYS */;
INSERT INTO `alerts` VALUES (3,'???? ????????????','???????? ?????????? ?????????? ?????? ?????? ???????? ?????? ???? ?????????????? ?????????????? ?????????? ???? ?????????? ???????????? ???? ?????????????? ?????? ?????????? ?????????????? ???????? ???? ?????? ???????? ??????????????','2020-09-02 07:25:11','2020-09-02 07:25:11'),(5,'test lesson','asdasdasdasdasdasdasdad','2020-09-08 12:11:15','2020-09-08 12:11:15'),(6,'test lesson','asdasdasdasdasdasd','2020-09-08 12:11:38','2020-09-08 12:11:38'),(7,'test lesson','asdasdasdasdasdasd','2020-09-08 12:11:50','2020-09-08 12:11:50'),(8,'test lesson','asdasdasdasdasdasd','2020-09-08 12:12:07','2020-09-08 12:12:07'),(9,'test lesson','asdasdasdasdasdasd','2020-09-08 12:12:16','2020-09-08 12:12:16'),(10,'test lesson','asdasdasdasdasdasd','2020-09-08 12:12:25','2020-09-08 12:12:25'),(11,'test lesson','asdasdasdasdasdasd','2020-09-08 12:12:47','2020-09-08 12:12:47'),(12,'test lesson','asdasdasdasdasdasd','2020-09-08 12:13:07','2020-09-08 12:13:07'),(13,'test lesson','asdasdasdasdasdasd','2020-09-08 12:13:32','2020-09-08 12:13:32'),(14,'test lesson','asdasdasdasdasdasd','2020-09-08 12:13:39','2020-09-08 12:13:39'),(15,'test lesson','asdasdasdasdasdasd','2020-09-08 12:13:48','2020-09-08 12:13:48'),(16,'test lesson','asdasdasdasdasdasd','2020-09-08 12:13:54','2020-09-08 12:13:54'),(17,'test lesson','asdasdasdasdasdasd','2020-09-08 12:14:22','2020-09-08 12:14:22'),(18,'test lesson','asdasdasdasdasdasd','2020-09-08 12:15:19','2020-09-08 12:15:19'),(19,'test lesson','asdasdasdasdasdasd','2020-09-08 12:15:32','2020-09-08 12:15:32'),(20,'test lesson','asdasdasdasdasdasd','2020-09-08 12:17:45','2020-09-08 12:17:45'),(21,'test lesson','asdasdasdasdasdasd','2020-09-08 12:19:05','2020-09-08 12:19:05'),(22,'test lesson','asdasdasdasdasdasd','2020-09-08 12:19:16','2020-09-08 12:19:16'),(23,'test lesson','asdasdasdasdasdasd','2020-09-08 12:19:23','2020-09-08 12:19:23'),(24,'test lesson','asdasdasdasdasdasd','2020-09-08 12:20:22','2020-09-08 12:20:22'),(25,'test lesson','asdasdasdasdasdasd','2020-09-08 12:21:26','2020-09-08 12:21:26'),(26,'test lesson','asdasdasdasdasdasd','2020-09-08 12:21:51','2020-09-08 12:21:51'),(27,'test lesson','asdasdasdasdasdasd','2020-09-08 12:22:17','2020-09-08 12:22:17'),(28,'test lesson','asdasdasdasdasdasd','2020-09-08 12:23:20','2020-09-08 12:23:20'),(29,'test lesson','asdasdasdasdasdasd','2020-09-08 12:23:35','2020-09-08 12:23:35'),(30,'test lesson','asdasdasdasdasdasdasdadsasdasd','2020-09-08 12:27:43','2020-09-08 12:27:43'),(31,'test lesson','asdasdasdasdasdasdasdadsasdasd','2020-09-08 12:28:48','2020-09-08 12:28:48'),(32,'test lesson','sdasdasdasdasdasd','2020-09-08 12:35:44','2020-09-08 12:35:44'),(33,'test lesson','sdasdasdasdasdasd','2020-09-08 12:35:58','2020-09-08 12:35:58'),(34,'test lesson','sdasdasdasdasdasd','2020-09-08 12:36:13','2020-09-08 12:36:13'),(35,'test lesson','sdasdasdasdasdasdasdasdasdasd','2020-09-08 12:37:08','2020-09-08 12:37:08'),(36,'test lesson','sasdasdasdasdasdasd','2020-09-08 12:37:37','2020-09-08 12:37:37'),(37,'test lesson','sasdasdasdasdasdasd','2020-09-08 12:37:52','2020-09-08 12:37:52');
/*!40000 ALTER TABLE `alerts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `answers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_id` bigint unsigned NOT NULL,
  `right_answer` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (27,'asd',10,0,'2020-08-25 09:21:17','2020-08-25 09:21:17'),(28,'das',10,1,'2020-08-25 09:21:17','2020-08-25 09:21:17'),(29,'asdasdasdasd',12,0,'2020-08-25 09:38:16','2020-08-25 09:38:16'),(30,'right',12,1,'2020-08-25 09:38:16','2020-08-25 09:38:16'),(31,'wewewew',12,0,'2020-08-25 09:38:16','2020-08-25 09:38:16'),(32,'sasdasdasdasd',35,0,'2020-08-26 08:39:25','2020-08-26 08:39:25'),(33,'momo',35,1,'2020-08-26 08:39:25','2020-08-26 08:39:25'),(34,'false',35,0,'2020-08-26 08:39:26','2020-08-26 08:39:26'),(35,'adsads',36,0,'2020-08-26 09:00:35','2020-08-26 09:00:35'),(36,'dsadas',36,1,'2020-08-26 09:00:35','2020-08-26 09:00:35'),(37,'dasdasdas',36,0,'2020-08-26 09:00:35','2020-08-26 09:00:35'),(38,'wdssdsdsd',38,0,'2020-08-26 10:57:56','2020-08-26 10:57:56'),(39,'wow',38,1,'2020-08-26 10:57:56','2020-08-26 10:57:56'),(40,'dasaasdasd',38,0,'2020-08-26 10:57:56','2020-08-26 10:57:56'),(41,'false',41,0,'2020-08-26 11:00:41','2020-08-26 11:00:41'),(42,'rigjht',41,1,'2020-08-26 11:00:41','2020-08-26 11:00:41'),(43,'false',41,0,'2020-08-26 11:00:41','2020-08-26 11:00:41'),(44,'qqqqqqq',43,0,'2020-08-26 11:42:39','2020-08-26 11:42:39'),(45,'dassdaqqqqqqqqqqqq',43,1,'2020-08-26 11:42:39','2020-08-26 11:42:39');
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chats`
--

DROP TABLE IF EXISTS `chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chats` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `admin_id` bigint unsigned NOT NULL,
  `student_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chats`
--

LOCK TABLES `chats` WRITE;
/*!40000 ALTER TABLE `chats` DISABLE KEYS */;
INSERT INTO `chats` VALUES (3,1,14,'2020-09-06 07:17:51','2020-09-06 07:17:51');
/*!40000 ALTER TABLE `chats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `video_id` bigint unsigned NOT NULL,
  `lesson_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (4,29,9,'2020-09-08 09:41:20','2020-09-08 09:41:20');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `devices`
--

DROP TABLE IF EXISTS `devices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `devices` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `student_id` bigint unsigned NOT NULL,
  `model` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `mac_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `devices`
--

LOCK TABLES `devices` WRITE;
/*!40000 ALTER TABLE `devices` DISABLE KEYS */;
INSERT INTO `devices` VALUES (1,12,'xaomi','6c:00:6b:a7:56:d9',0,'2020-09-03 13:30:00','2020-09-03 13:30:00'),(2,13,'xaomi','a9:12:9d:af:6f:9a',0,'2020-09-06 04:58:55','2020-09-06 04:58:55'),(3,13,'samsung a 31','a9:12:9d:af:6f:fa',1,'2020-09-06 05:01:55','2020-09-06 05:26:30'),(4,13,'Google Android SDK built for x86','02:00:00:44:55:66',0,'2020-09-06 05:02:12','2020-09-06 05:02:12'),(5,14,'Google Android SDK built for x86','02:00:00:44:55:66',1,'2020-09-06 05:09:09','2020-09-06 05:13:44'),(6,14,'samsung a 31','a9:12:9d:af:6f:fa',1,'2020-09-06 06:38:01','2020-09-06 07:16:56'),(7,2,'samsung a 31','a9:12:9d:af:6f:fa',1,'2020-09-06 08:03:08','2020-09-06 08:04:10'),(8,14,'Xiaomi M2004J19C','B2:60:44:01:8B:C8',1,'2020-09-06 08:05:44','2020-09-06 08:06:17');
/*!40000 ALTER TABLE `devices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fcm_tokens`
--

DROP TABLE IF EXISTS `fcm_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fcm_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `student_id` bigint unsigned NOT NULL,
  `token` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fcm_tokens`
--

LOCK TABLES `fcm_tokens` WRITE;
/*!40000 ALTER TABLE `fcm_tokens` DISABLE KEYS */;
INSERT INTO `fcm_tokens` VALUES (1,12,'d4s456das45asd456456','2020-09-03 13:30:00','2020-09-03 13:30:00'),(2,13,'d4s456das45asd456456','2020-09-06 04:58:55','2020-09-06 04:58:55'),(3,14,'eooFfZk-RgabSe7kjosMer:APA91bGl13Ub9mbgWDXGFKaXYPbLt83fC_7frqCOULTjDc5HcSF0aR51okJIFlgP7ewfSKexXYE8b3HFf_cIa7jSHtcYC788jtPWfGkSFrqObpdfLh0pGFd7T3lQuAvO1wKeOoNceLnu','2020-09-06 05:09:09','2020-09-06 05:09:09'),(4,14,'d5J_-jNgSYaotchENpW3hd:APA91bE5tXZwgr9eS601g8OqMSSjfKh4-bhpGsQZ_fWu23ocvcAFVYk_-CkPcq87S28TcbQILwR7UxDqew0V2yAf_aFM5TvP2kVG7-jBF6M2QQBYxA0igiz3XUgAPO-m9B6TP5SqkfXz',NULL,NULL);
/*!40000 ALTER TABLE `fcm_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `grades` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
INSERT INTO `grades` VALUES (1,'???????? ?????????? ??????????????','2020-08-22 11:03:10','2020-08-22 11:03:10'),(2,'???????? ???????????? ??????????????','2020-08-22 11:03:43','2020-08-22 11:03:43'),(3,'???????? ???????????? ??????????????','2020-08-22 11:03:53','2020-08-22 11:03:53');
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `groups` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (3,'???????????? ???????????? 11',3,'2020-08-23 07:00:05','2020-09-03 08:57:53'),(4,'???????????? ???????????? 12 ??????????',3,'2020-09-03 08:58:19','2020-09-03 08:58:19'),(5,'???????????? ???????????? 11',1,'2020-09-03 08:59:19','2020-09-03 08:59:19'),(6,'???????????? ???????????? 12 ??????????',1,'2020-09-03 09:03:26','2020-09-03 09:03:26');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lessons`
--

DROP TABLE IF EXISTS `lessons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lessons` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `month_id` bigint unsigned NOT NULL,
  `group_id` bigint unsigned NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lessons`
--

LOCK TABLES `lessons` WRITE;
/*!40000 ALTER TABLE `lessons` DISABLE KEYS */;
INSERT INTO `lessons` VALUES (3,5,3,'how to','lessons_covers/Jtqpf6M0Vd6eEOhodDqUAtkr5M51uJ28eJwrsYqA.jpeg','2020-08-26 11:40:33','2020-09-08 09:18:09'),(4,5,3,'products','lessons_covers/h0ZWLvn5OzkJUOt4rhYsLNnGczOrQ9SFQ7CgUMzd.jpeg','2020-08-26 11:50:04','2020-09-08 09:19:32'),(5,5,3,'test lesson','lessons_covers/3199QqvH700FEtD3aYTx75AnpCahkJiNCqzbaTlW.jpeg','2020-08-29 10:53:06','2020-09-08 09:23:59'),(9,6,3,'test lesson','lessons_covers/C8gHewtUCGNKnwQrMVebdbSLjqk2GR3AEoGXpqax.png','2020-09-06 06:22:50','2020-09-08 09:15:15');
/*!40000 ALTER TABLE `lessons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lessons_questions`
--

DROP TABLE IF EXISTS `lessons_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lessons_questions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lesson_id` bigint unsigned NOT NULL,
  `question_id` bigint unsigned NOT NULL,
  `status` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lessons_questions`
--

LOCK TABLES `lessons_questions` WRITE;
/*!40000 ALTER TABLE `lessons_questions` DISABLE KEYS */;
INSERT INTO `lessons_questions` VALUES (2,3,12,2,NULL,NULL),(5,4,6,1,NULL,NULL),(9,4,43,3,NULL,NULL),(10,5,6,1,NULL,NULL),(11,5,12,2,NULL,NULL),(12,5,38,3,NULL,NULL),(13,5,45,3,NULL,NULL),(14,6,10,3,NULL,NULL),(15,6,35,2,NULL,NULL),(16,6,36,2,NULL,NULL),(17,6,11,3,NULL,NULL),(18,7,10,3,NULL,NULL),(19,7,35,2,NULL,NULL),(20,7,36,2,NULL,NULL),(21,7,11,3,NULL,NULL),(22,8,10,3,NULL,NULL),(23,8,35,2,NULL,NULL),(24,8,36,2,NULL,NULL),(25,8,11,3,NULL,NULL),(26,8,47,1,NULL,NULL),(27,9,6,1,NULL,NULL),(28,9,12,1,NULL,NULL),(29,9,38,2,NULL,NULL),(30,9,39,2,NULL,NULL),(31,9,46,3,NULL,NULL),(32,9,48,3,NULL,NULL);
/*!40000 ALTER TABLE `lessons_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messages` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `chat_id` bigint unsigned NOT NULL,
  `details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_id` bigint unsigned NOT NULL,
  `admin_view` tinyint(1) NOT NULL DEFAULT '0',
  `student_view` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,1,'???????? ?????????? ?????????? ?????? ?????? ???????? ?????? ???? ?????????????? ?????????????? ?????????? ???? ?????????? ???????????? ???? ?????????????? ?????? ?????????? ?????????????? ???????? ???? ?????? ???????? ??????????????','App\\Models\\Student',1,1,0,'2020-09-02 10:10:20','2020-09-02 13:09:12'),(2,1,'???????? ?????????? ?????????? ?????? ?????? ???????? ?????? ???? ?????????????? ?????????????? ?????????? ???? ?????????? ???????????? ???? ?????????????? ?????? ?????????? ?????????????? ???????? ???? ?????? ???????? ??????????????','App\\Models\\Student',1,1,0,'2020-09-02 10:48:01','2020-09-02 13:09:12'),(3,2,'???????? ?????????? ?????????? ?????? ?????? ???????? ?????? ???? ?????????????? ?????????????? ?????????? ???? ?????????? ???????????? ???? ?????????????? ?????? ?????????? ?????????????? ???????? ???? ?????? ???????? ??????????????','App\\Models\\Student',3,1,0,'2020-09-02 11:05:11','2020-09-03 08:49:31'),(4,2,'???????? ?????????? ?????????? ?????? ?????? ???????? ?????? ???? ?????????????? ?????????????? ?????????? ???? ?????????? ???????????? ???? ?????????????? ?????? ?????????? ?????????????? ???????? ???? ?????? ???????? ??????????????','App\\Models\\Student',3,1,0,'2020-09-02 11:06:51','2020-09-03 08:49:31'),(5,1,'test messages','App\\Models\\Admin',1,1,0,'2020-09-02 13:03:16','2020-09-02 13:09:12'),(6,1,'lorem ipsum','App\\Models\\Admin',1,1,0,'2020-09-02 13:09:12','2020-09-02 13:09:12'),(7,2,'???????? ?????????? ?????????? ?????? ?????? ???????? ?????? ???? ?????????????? ?????????????? ?????????? ???? ?????????? ???????????? ???? ?????????????? ?????? ?????????? ?????????????? ???????? ???? ?????? ???????? ??????????????','App\\Models\\Student',3,1,0,'2020-09-03 06:37:01','2020-09-03 08:49:31'),(8,2,'??????????????????????????????????','App\\Models\\Admin',1,1,0,'2020-09-03 08:25:38','2020-09-03 08:49:31'),(9,2,'????????????????????????????????','App\\Models\\Admin',1,1,0,'2020-09-03 08:49:31','2020-09-03 08:49:31'),(10,3,'???????? ?????????? ?????????? ?????? ?????? ???????? ?????? ???? ?????????????? ?????????????? ?????????? ???? ?????????? ???????????? ???? ?????????????? ?????? ?????????? ?????????????? ???????? ???? ?????? ???????? ??????????????','App\\Models\\Student',14,1,0,'2020-09-06 07:17:51','2020-09-06 08:27:22'),(11,3,'???????? ?????????? ?????????? ?????? ?????? ???????? ?????? ???? ?????????????? ?????????????? ?????????? ???? ?????????? ???????????? ???? ?????????????? ?????? ?????????? ?????????????? ???????? ???? ?????? ???????? ??????????????','App\\Models\\Student',14,1,0,'2020-09-06 07:19:00','2020-09-06 08:27:22'),(12,3,'???????? ?????????? ?????????? ?????? ?????? ???????? ?????? ???? ?????????????? ?????????????? ?????????? ???? ?????????? ???????????? ???? ?????????????? ?????? ?????????? ?????????????? ???????? ???? ?????? ???????? ??????????????','App\\Models\\Student',14,1,0,'2020-09-06 07:35:31','2020-09-06 08:27:22'),(13,3,'???????? ?????????? ?????????? ?????? ?????? ???????? ?????? ???? ?????????????? ?????????????? ?????????? ???? ?????????? ???????????? ???? ?????????????? ?????? ?????????? ?????????????? ???????? ???? ?????? ???????? ??????????????','App\\Models\\Student',14,1,0,'2020-09-06 07:38:42','2020-09-06 08:27:22'),(14,3,'???????? ?????????? ?????????? ?????? ?????? ???????? ?????? ???? ?????????????? ?????????????? ?????????? ???? ?????????? ???????????? ???? ?????????????? ?????? ?????????? ?????????????? ???????? ???? ?????? ???????? ??????????????','App\\Models\\Student',14,1,0,'2020-09-06 07:40:53','2020-09-06 08:27:22'),(15,3,'???????? ?????????? ?????????? ?????? ?????? ???????? ?????? ???? ?????????????? ?????????????? ?????????? ???? ?????????? ???????????? ???? ?????????????? ?????? ?????????? ?????????????? ???????? ???? ?????? ???????? ??????????????','App\\Models\\Student',14,1,0,'2020-09-06 07:46:20','2020-09-06 08:27:22'),(16,3,'???????? ?????????? ?????????? ?????? ?????? ???????? ?????? ???? ?????????????? ?????????????? ?????????? ???? ?????????? ???????????? ???? ?????????????? ?????? ?????????? ?????????????? ???????? ???? ?????? ???????? ??????????????','App\\Models\\Student',14,1,0,'2020-09-06 08:10:44','2020-09-06 08:27:22'),(17,3,'???????? ?????????? ?????????? ?????? ?????? ???????? ?????? ???? ?????????????? ?????????????? ?????????? ???? ?????????? ???????????? ???? ?????????????? ?????? ?????????? ?????????????? ???????? ???? ?????? ???????? ??????????????','App\\Models\\Student',14,1,0,'2020-09-06 08:16:23','2020-09-06 08:27:22'),(18,3,'asdasdasdasdasdasdasd','App\\Models\\Admin',1,1,0,'2020-09-06 08:17:25','2020-09-06 08:27:22'),(19,3,'???????? ?????????? ?????????? ?????? ?????? ???????? ?????? ???? ?????????????? ?????????????? ?????????? ???? ?????????? ???????????? ???? ?????????????? ?????? ?????????? ?????????????? ???????? ???? ?????? ???????? ??????????????','App\\Models\\Student',14,1,0,'2020-09-06 08:25:29','2020-09-06 08:27:22');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_08_16_102315_create_admins_table',1),(5,'2020_08_17_095813_create_permission_tables',1),(10,'2020_08_22_124701_create_groups_table',2),(11,'2020_08_22_124714_create_grades_table',2),(12,'2020_08_22_124644_create_students_table',3),(13,'2020_08_22_150430_create_months_table',4),(14,'2020_08_23_082425_create_months_students',5),(15,'2020_08_23_091230_create_subscription_requests_table',6),(16,'2020_08_23_143937_create_questions_table',7),(17,'2020_08_23_144221_create_answers_table',7),(22,'2020_08_25_112617_create_lessons_table',8),(23,'2020_08_25_114947_create_pdf_files_table',8),(24,'2020_08_25_115004_create_videos_table',8),(25,'2020_08_25_115109_create_lessons_questions_table',8),(26,'2016_06_01_000001_create_oauth_auth_codes_table',9),(27,'2016_06_01_000002_create_oauth_access_tokens_table',9),(28,'2016_06_01_000003_create_oauth_refresh_tokens_table',9),(29,'2016_06_01_000004_create_oauth_clients_table',9),(30,'2016_06_01_000005_create_oauth_personal_access_clients_table',9),(31,'2020_09_02_090458_create_alerts_table',10),(33,'2020_09_02_090644_create_students_alerts',11),(38,'2020_09_02_103719_create_messages_table',12),(39,'2020_09_02_103944_create_chats_table',12),(41,'2020_09_03_143701_create_devices_table',14),(42,'2020_09_03_150315_create_fcm_tokens_table',15),(43,'2020_09_05_121335_create_notifications_table',16),(45,'2020_09_03_102404_create_comments_table',17),(46,'2020_09_08_095359_create_replies_table',17);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `months`
--

DROP TABLE IF EXISTS `months`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `months` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `grade_id` bigint unsigned NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `months`
--

LOCK TABLES `months` WRITE;
/*!40000 ALTER TABLE `months` DISABLE KEYS */;
INSERT INTO `months` VALUES (5,'?????? ????????????',20,1,'2020-09-01','2020-09-30','2020-08-26 10:37:40','2020-08-26 10:37:40'),(6,'?????? ????????????',300,2,'2020-12-01','2020-12-31','2020-09-06 04:10:16','2020-09-06 04:10:16'),(7,'?????? ????????????',200,3,'2020-09-01','2020-09-30','2020-09-06 04:55:57','2020-09-06 04:55:57'),(8,'?????? ????????????',200,2,'2020-10-01','2020-10-31','2020-09-06 04:56:32','2020-09-06 04:56:32');
/*!40000 ALTER TABLE `months` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `months_students`
--

DROP TABLE IF EXISTS `months_students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `months_students` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `student_id` bigint unsigned NOT NULL,
  `month_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `months_students`
--

LOCK TABLES `months_students` WRITE;
/*!40000 ALTER TABLE `months_students` DISABLE KEYS */;
INSERT INTO `months_students` VALUES (27,2,5,NULL,NULL),(32,14,5,NULL,NULL),(33,14,6,NULL,NULL);
/*!40000 ALTER TABLE `months_students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `notifications` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint unsigned NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
INSERT INTO `notifications` VALUES ('000c3663-ed96-4244-bc2e-8d2847056a86','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"sdasdasdasdasdasd\",\"url\":null}',NULL,'2020-09-08 12:35:44','2020-09-08 12:35:44'),('1971fdf5-462b-4a49-8234-145f87da0dd6','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"asdasdasdasdasdasd\",\"url\":null}',NULL,'2020-09-08 12:23:35','2020-09-08 12:23:35'),('1a3e0b3b-463b-46f3-a4d1-8821a56c2ad6','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"\\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629\",\"details\":\"asdasdasdasdasdasdasd\",\"url\":null}',NULL,'2020-09-06 08:17:25','2020-09-06 08:17:25'),('279633fd-d6e0-43bc-9d60-a81399f9f825','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"sdasdasdasdasdasd\",\"url\":null}',NULL,'2020-09-08 12:36:13','2020-09-08 12:36:13'),('4002aeb7-ad65-4ea4-ad8c-32bc99314532','App\\Notifications\\StudentAlerts','App\\Models\\Admin',1,'{\"title\":\"\\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629\",\"details\":\"\\u0647\\u0646\\u0627\\u0643 \\u062d\\u0642\\u064a\\u0642\\u0629 \\u0645\\u062b\\u0628\\u062a\\u0629 \\u0645\\u0646\\u0630 \\u0632\\u0645\\u0646 \\u0637\\u0648\\u064a\\u0644 \\u0648\\u0647\\u064a \\u0623\\u0646 \\u0627\\u0644\\u0645\\u062d\\u062a\\u0648\\u0649 \\u0627\\u0644\\u0645\\u0642\\u0631\\u0648\\u0621 \\u0644\\u0635\\u0641\\u062d\\u0629 \\u0645\\u0627 \\u0633\\u064a\\u0644\\u0647\\u064a \\u0627\\u0644\\u0642\\u0627\\u0631\\u0626 \\u0639\\u0646 \\u0627\\u0644\\u062a\\u0631\\u0643\\u064a\\u0632 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0634\\u0643\\u0644 \\u0627\\u0644\\u062e\\u0627\\u0631\\u062c\\u064a \\u0644\\u0644\\u0646\\u0635 \\u0623\\u0648 \\u0634\\u0643\\u0644 \\u062a\\u0648\\u0636\\u0639 \\u0627\\u0644\\u0641\\u0642\\u0631\\u0627\\u062a\",\"url\":\"http:\\/\\/efham-sa7.herokuapp.com\\/admin\\/chats\\/3\\/view\"}','2020-09-06 08:27:23','2020-09-06 08:25:30','2020-09-06 08:27:23'),('4247a473-53ff-4fdb-8857-455f71889bc4','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"sasdasdasdasdasdasd\",\"url\":null}',NULL,'2020-09-08 12:37:41','2020-09-08 12:37:41'),('58381b38-de99-4fbb-a1b2-462701850992','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"sdasdasdasdasdasdasdasdasdasd\",\"url\":null}',NULL,'2020-09-08 12:37:09','2020-09-08 12:37:09'),('658d42af-0b54-41d8-9975-317fe0f482f1','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"asdasdasdasdasdasd\",\"url\":null}',NULL,'2020-09-08 12:14:24','2020-09-08 12:14:24'),('6591be17-9783-49bb-9443-1e13084bfc97','App\\Notifications\\StudentAlerts','App\\Models\\Student',2,'{\"title\":\"\\u0627\\u0644\\u0625\\u0633\\u062a\\u0627\\u0630 \\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0639\\u0644\\u064a\\u0642\\u0643\",\"details\":\"test learning\",\"url\":null}',NULL,'2020-09-06 09:42:10','2020-09-06 09:42:10'),('6cf1357b-8472-4145-930f-4d00ebfe5efa','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"asdasdasdasdasdasd\",\"url\":null}',NULL,'2020-09-08 12:19:08','2020-09-08 12:19:08'),('79eb06dd-a63b-43c0-93e6-47b2347749ce','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"asdasdasdasdasdasd\",\"url\":null}',NULL,'2020-09-08 12:21:27','2020-09-08 12:21:27'),('79fdc5b0-5e10-4124-8260-e2751c33f906','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"sasdasdasdasdasdasd\",\"url\":null}',NULL,'2020-09-08 12:37:52','2020-09-08 12:37:52'),('7e7f4091-ae0f-4d32-831d-1985ee33f0be','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"asdasdasdasdasdasd\",\"url\":null}',NULL,'2020-09-08 12:20:23','2020-09-08 12:20:23'),('84e39fe6-4164-4b81-b14a-c023866feb8e','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"asdasdasdasdasdasd\",\"url\":null}',NULL,'2020-09-08 12:13:39','2020-09-08 12:13:39'),('8bd0b8d6-4dc9-4342-b053-766a6a2d6185','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"asdasdasdasdasdasd\",\"url\":null}',NULL,'2020-09-08 12:17:46','2020-09-08 12:17:46'),('b13c168a-3973-4a79-a13c-cf280fd5a929','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"sdasdasdasdasdasd\",\"url\":null}',NULL,'2020-09-08 12:35:58','2020-09-08 12:35:58'),('b807e9c5-9002-4cbf-b3bc-f61a20b82b45','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"asdasdasdasdasdasd\",\"url\":null}',NULL,'2020-09-08 12:13:48','2020-09-08 12:13:48'),('bf0563e6-212e-4161-8d04-891a4309bfa2','App\\Notifications\\StudentAlerts','App\\Models\\Student',2,'{\"title\":\"\\u0627\\u0644\\u0625\\u0633\\u062a\\u0627\\u0630 \\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0639\\u0644\\u064a\\u0642\\u0643\",\"details\":\"dsadasdasdas\",\"url\":null}',NULL,'2020-09-06 09:58:29','2020-09-06 09:58:29'),('d13f7199-137f-406e-95c3-f04e9f459d84','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"asdasdasdasdasdasd\",\"url\":null}',NULL,'2020-09-08 12:13:54','2020-09-08 12:13:54'),('e1193e0e-35e0-4e98-919d-3cae7e16d3c3','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"asdasdasdasdasdasd\",\"url\":null}',NULL,'2020-09-08 12:23:21','2020-09-08 12:23:21'),('e20b285f-d5cd-4c9a-84a6-9280b53e892a','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"asdasdasdasdasdasd\",\"url\":null}',NULL,'2020-09-08 12:22:18','2020-09-08 12:22:18'),('e93b5a51-12d6-4511-9c14-c101c42fa97d','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"asdasdasdasdasdasdasdadsasdasd\",\"url\":null}',NULL,'2020-09-08 12:28:51','2020-09-08 12:28:51'),('e99aae59-da4f-45d3-84ee-9471578dd568','App\\Notifications\\StudentAlerts','App\\Models\\Student',2,'{\"title\":\"\\u0627\\u0644\\u0625\\u0633\\u062a\\u0627\\u0630 \\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0639\\u0644\\u064a\\u0642\\u0643\",\"details\":\"\\u0631\\u062f \\u062a\\u0627\\u0646\\u064a\",\"url\":null}',NULL,'2020-09-08 10:18:22','2020-09-08 10:18:22'),('ec269da8-cce0-4429-af9b-6d0d07910a24','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"asdasdasdasdasdasd\",\"url\":null}',NULL,'2020-09-08 12:19:17','2020-09-08 12:19:17'),('ed48eaa1-cfb1-413f-aeb3-f9eabdef40b6','App\\Notifications\\StudentAlerts','App\\Models\\Admin',1,'{\"title\":\"\\u0631\\u0633\\u0627\\u0644\\u0629 \\u062c\\u062f\\u064a\\u062f\\u0629\",\"details\":\"\\u0647\\u0646\\u0627\\u0643 \\u062d\\u0642\\u064a\\u0642\\u0629 \\u0645\\u062b\\u0628\\u062a\\u0629 \\u0645\\u0646\\u0630 \\u0632\\u0645\\u0646 \\u0637\\u0648\\u064a\\u0644 \\u0648\\u0647\\u064a \\u0623\\u0646 \\u0627\\u0644\\u0645\\u062d\\u062a\\u0648\\u0649 \\u0627\\u0644\\u0645\\u0642\\u0631\\u0648\\u0621 \\u0644\\u0635\\u0641\\u062d\\u0629 \\u0645\\u0627 \\u0633\\u064a\\u0644\\u0647\\u064a \\u0627\\u0644\\u0642\\u0627\\u0631\\u0626 \\u0639\\u0646 \\u0627\\u0644\\u062a\\u0631\\u0643\\u064a\\u0632 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0634\\u0643\\u0644 \\u0627\\u0644\\u062e\\u0627\\u0631\\u062c\\u064a \\u0644\\u0644\\u0646\\u0635 \\u0623\\u0648 \\u0634\\u0643\\u0644 \\u062a\\u0648\\u0636\\u0639 \\u0627\\u0644\\u0641\\u0642\\u0631\\u0627\\u062a\",\"url\":\"http:\\/\\/efham-sa7.herokuapp.com\\/admin\\/chats\\/3\\/view\"}','2020-09-06 08:16:45','2020-09-06 08:16:24','2020-09-06 08:16:45'),('efd4aee5-7a44-4c7e-be42-d6a678583c1a','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"asdasdasdasdasdasd\",\"url\":null}',NULL,'2020-09-08 12:19:23','2020-09-08 12:19:23'),('f687843b-2390-47fb-9ff7-87c3b9566810','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"asdasdasdasdasdasd\",\"url\":null}',NULL,'2020-09-08 12:21:52','2020-09-08 12:21:52'),('f8be97cb-4285-43e0-9dca-900cbaf83675','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"asdasdasdasdasdasdasdadsasdasd\",\"url\":null}',NULL,'2020-09-08 12:27:48','2020-09-08 12:27:48'),('fb054dad-4b17-4c7e-b34e-8f006fae6e29','App\\Notifications\\StudentAlerts','App\\Models\\Student',2,'{\"title\":\"\\u0627\\u0644\\u0625\\u0633\\u062a\\u0627\\u0630 \\u0631\\u062f \\u0639\\u0644\\u0649 \\u062a\\u0639\\u0644\\u064a\\u0642\\u0643\",\"details\":\"new reply\",\"url\":null}',NULL,'2020-09-08 10:10:33','2020-09-08 10:10:33'),('ff15594b-b5bb-4a39-b677-29208591d0c5','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"asdasdasdasdasdasd\",\"url\":null}',NULL,'2020-09-08 12:15:19','2020-09-08 12:15:19'),('ff2c23d0-450b-4382-b4bb-3d5387e76b71','App\\Notifications\\StudentAlerts','App\\Models\\Student',14,'{\"title\":\"test lesson\",\"details\":\"asdasdasdasdasdasd\",\"url\":null}',NULL,'2020-09-08 12:15:32','2020-09-08 12:15:32');
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `client_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_access_tokens_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` VALUES ('00df6a0cca5023beeabc8feb4a47c3d76c8222d975ead18318ce90c6a972fd5c504c4c4d60f2d54a',14,1,'api_token','[]',0,'2020-09-08 10:03:52','2020-09-08 10:03:52','2021-09-08 12:03:52'),('01d2b7119b45d1745de1951d02ff3c54f36da68dcc066b8fe6d89549bb658412c0e7808e731e2955',14,1,'api_token','[]',0,'2020-09-08 10:13:01','2020-09-08 10:13:01','2021-09-08 12:13:01'),('03e6be54117ae8cfb4469b9907f0f66ff80a9268fc9c3835863742273daf19a368198f32384772cc',13,1,'api_token','[]',0,'2020-09-06 05:24:02','2020-09-06 05:24:02','2021-09-06 10:54:02'),('0450f875dad80f1154bbbbf84b425d59cbba4f75b42f7bc69be5955f1239d4b258c47517f51656c2',14,1,'api_token','[]',0,'2020-09-07 03:08:51','2020-09-07 03:08:51','2021-09-07 08:38:51'),('046ec4730f71d2234b5307702c68edd3a2fa7cb9d4f35c54f494bd13ae4c493de7c933aed9b4321f',1,1,'api_token','[]',0,'2020-08-29 08:29:24','2020-08-29 08:29:24','2021-08-29 10:29:24'),('0664e4fe324948d1ee68a0abd12f3c19a87acd663eb3f48c32431b10656812a62146873a31a6e2a5',14,1,'api_token','[]',0,'2020-09-08 10:02:16','2020-09-08 10:02:16','2021-09-08 12:02:16'),('075ca906b9484cb325049c802500ac52dccafdbe751eb0043a0ec87a17a3e6d4813ae1da632c976a',14,1,'api_token','[]',0,'2020-09-08 10:00:19','2020-09-08 10:00:19','2021-09-08 12:00:19'),('085302505fb3b954473236c79a81fdaef93e8c2f58dd16a72df04253ff078382e547b4576779fb1b',14,1,'api_token','[]',0,'2020-09-06 07:17:04','2020-09-06 07:17:04','2021-09-06 12:47:04'),('095e05477532fde3564daff6b1ec4d06ee20751b02386d23b0968579e279bb1ff0abdb1063911473',2,1,'api_token','[]',0,'2020-09-08 09:57:35','2020-09-08 09:57:35','2021-09-08 11:57:35'),('107805564c8c9f4fc4e462fb443326dfd374ecef6e89288aa91ffaf7f34d6612a804ae2e18745431',6,1,'api_token','[]',0,'2020-08-27 06:47:20','2020-08-27 06:47:20','2021-08-27 08:47:20'),('18ec56be7c99bb4a43191f76877473fe79a6328f14634bd4f802845467619af49ca9198a16ebd748',2,1,'api_token','[]',0,'2020-09-08 07:13:22','2020-09-08 07:13:22','2021-09-08 09:13:22'),('1ce567503d4f82940bb8a557d007a36c8fec50b30083c9b26882df25bc3b8a4565b6f0ba01952954',1,1,'api_token','[]',0,'2020-08-29 08:44:01','2020-08-29 08:44:01','2021-08-29 10:44:01'),('1d717162992b009fff27c69b5223ee466549466793a128298872f3a03231a74e77ed658abd1f243c',1,1,'api_token','[]',0,'2020-08-29 08:27:05','2020-08-29 08:27:05','2021-08-29 10:27:05'),('1ff25ae4baa7a6f2547183589d4c676f1f6b3f992dc1805139b87c56c24feafa3c110f0c8df0071e',14,1,'api_token','[]',0,'2020-09-08 10:03:11','2020-09-08 10:03:11','2021-09-08 12:03:11'),('23850af77e14a29ed73bffd670044453309feb97e56d853b99d882084913bf9f3ffdfa9fe5b07a02',1,1,'api_token','[]',0,'2020-08-29 08:27:55','2020-08-29 08:27:55','2021-08-29 10:27:55'),('2a8140463be124fae5b4b21084d6cb4d987da6d51c3dbcf995184ba0c5aa301ca8ace858c9a42adb',3,1,'api_token','[]',0,'2020-08-26 13:20:47','2020-08-26 13:20:47','2021-08-26 15:20:47'),('2d2984ab8688cf3b6faedb35815248184b136d61e345cb29097ce28caf25dbff7ff86f5d1022f88b',14,1,'api_token','[]',0,'2020-09-08 09:45:19','2020-09-08 09:45:19','2021-09-08 11:45:19'),('2d5de1134565b96032a8c7d41ec996bbea5c247bd3435bfb40987fb3c7b977cb8f5ae8cecc4e7e06',13,1,'api_token','[]',0,'2020-09-06 05:34:02','2020-09-06 05:34:02','2021-09-06 11:04:02'),('3d40b0191814d7f82847db73352ab119909b64d2c1149f297812668d60896b5448793fb8ce042a1c',8,1,'api_token','[]',0,'2020-08-27 11:17:59','2020-08-27 11:17:59','2021-08-27 13:17:59'),('3dd264c9b4940f6cf303854e2604cd1741bf868ab76c8d33e5c254b2d93da4eff950badd1671686b',2,1,'api_token','[]',0,'2020-09-08 07:14:19','2020-09-08 07:14:19','2021-09-08 09:14:19'),('3e7cbc2494b7ccce9641f6b6acd5b54f21b618fcbfd5188ae7ac1649eb3a19027c963beb5d2cc4fb',3,1,'api_token','[]',0,'2020-08-26 13:21:55','2020-08-26 13:21:55','2021-08-26 15:21:55'),('3f4c0a1fec852ec01138f79782f9c2d4379e655badbd6e995fb35f5c4f9c33968aaaa04dff996f9d',14,1,'api_token','[]',0,'2020-09-06 08:07:35','2020-09-06 08:07:35','2021-09-06 13:37:35'),('3f7998c4ce66bb86b521f9b9462857f344f58974a517e7667bcfd7dc80049dd6a4498dfbd1bced2d',14,1,'api_token','[]',0,'2020-09-08 09:41:33','2020-09-08 09:41:33','2021-09-08 11:41:33'),('4312e3a2b610c23054450f417b90c72f64403da90a3eeb5b57c7552e53a96f3e380937352cad20bf',10,1,'api_token','[]',0,'2020-09-03 11:55:27','2020-09-03 11:55:27','2021-09-03 13:55:27'),('4a101f97d4f1b606a775dbfa4396fb82046cfde5a6dba1c9003b26e9774fb772ee53fad114eedad3',1,1,'api_token','[]',0,'2020-08-29 08:33:00','2020-08-29 08:33:00','2021-08-29 10:33:00'),('4f4390d2c2b0df5faac037324d5a8cccd1db4814d235f6d9173e593bfce60edd0c49796434716bed',14,1,'api_token','[]',0,'2020-09-08 09:24:15','2020-09-08 09:24:15','2021-09-08 11:24:15'),('505ad934c9cc2c0961f7f6f32313b814e6034108481bdfc4e732841b53cc8cc21b82c7674c074abd',3,1,'api_token','[]',0,'2020-08-27 06:47:40','2020-08-27 06:47:40','2021-08-27 08:47:40'),('59beaf7d74b0e2c66027ec4a22163c5c8ff66edf558432482b9a4c27da5210ee8ea83369de903e80',14,1,'api_token','[]',0,'2020-09-08 09:59:28','2020-09-08 09:59:28','2021-09-08 11:59:28'),('5b06f546dcb4175ef825a41c997ec4906236ec017ead8906ae9d2d0e8d0d7261a7b31d700db8eb4a',14,1,'api_token','[]',0,'2020-09-06 05:34:15','2020-09-06 05:34:15','2021-09-06 11:04:15'),('61034c6f3d36816ddbe7fc7c3434f6a4ed03dbe7b93faeaf0e694f73e9ce75f8eec29d7907669ff2',1,1,'api_token','[]',0,'2020-08-29 08:30:29','2020-08-29 08:30:29','2021-08-29 10:30:29'),('62e639d8bcdba8cd5e98fe495939c9dd02ad42799ee89227c6e680df448cbcf2005f1166e6371cf7',14,1,'api_token','[]',0,'2020-09-08 09:57:54','2020-09-08 09:57:54','2021-09-08 11:57:54'),('6402cbb48cf8d6232635ba887892700939956b47d4877b8e59275499304b81062e626ce2307176f1',14,1,'api_token','[]',0,'2020-09-08 09:59:05','2020-09-08 09:59:05','2021-09-08 11:59:05'),('694beeb9554535761ea1ca2ab119b5184ebb08c00b497336f905702e7f3da5309007c0efb8162922',14,1,'api_token','[]',0,'2020-09-07 03:09:19','2020-09-07 03:09:19','2021-09-07 08:39:19'),('6b99444df8388474c44f83911cd4cb8c6bf374465bf877e27fbb8e55f5dce4b018b47ce82d3f2658',14,1,'api_token','[]',0,'2020-09-08 09:27:51','2020-09-08 09:27:51','2021-09-08 11:27:51'),('726472f3759138f01d8b93f9747b1cd3c0126bed6b28c75f7710c98a82fe61860e371792aceba56d',14,1,'api_token','[]',0,'2020-09-08 09:50:21','2020-09-08 09:50:21','2021-09-08 11:50:21'),('744d8c904c0298e82c9473de0d191ebc623009f37b163b7d1496a9a71ffa0a64103394883a757f69',14,1,'api_token','[]',0,'2020-09-08 11:44:19','2020-09-08 11:44:19','2021-09-08 13:44:19'),('750bbbb09989cdffbbedf7c525d2dd03bff3947293e2b0f510d547ea12d7c43c6a98e7c1bc248603',8,1,'api_token','[]',0,'2020-08-27 11:17:32','2020-08-27 11:17:32','2021-08-27 13:17:32'),('76f0c300fb0893ab2e433e5ab511bf53d91e1057d21800bcb3ef2e1f3903ce90e8b7ebba6096748d',3,1,'api_token','[]',0,'2020-08-26 13:23:30','2020-08-26 13:23:30','2021-08-26 15:23:30'),('7934c7b711a484d37f1ac741308c66ef876f76372db74713e77fadf1623c2a680afda1be9912f005',3,1,'api_token','[]',0,'2020-08-27 05:59:30','2020-08-27 05:59:30','2021-08-27 07:59:30'),('7c67346bc2249552d57bded69417096c69eab8095c62b5dcf50c6be362fe663c13a45c9597a67151',14,1,'api_token','[]',0,'2020-09-08 10:01:46','2020-09-08 10:01:46','2021-09-08 12:01:46'),('8c204470534e287790f23cebf9c1480a081de8d541494c42c140f731fdb714bc4ab6fbe0e58caf3c',14,1,'api_token','[]',0,'2020-09-08 09:57:56','2020-09-08 09:57:56','2021-09-08 11:57:56'),('8ce560f5f5aa2de2801492d1479e8df0f291b54e37f677fc680720bd87855c77f4ec92d0ff3ce1a4',13,1,'api_token','[]',0,'2020-09-06 05:26:01','2020-09-06 05:26:01','2021-09-06 10:56:01'),('8f2faf4f8d3cd8337620c03a53720b8c1052d2ba44fb4cd3ba39c9d3142b0d0d0fa6287403358d8c',14,1,'api_token','[]',0,'2020-09-08 10:48:00','2020-09-08 10:48:00','2021-09-08 12:48:00'),('8fea1b5abc55fedd3f2b916d6ff2b069aad8ae9de7852255908c1e87ead9e0886c32ff5f981cbfc6',1,1,'api_token','[]',0,'2020-08-27 11:29:18','2020-08-27 11:29:18','2021-08-27 13:29:18'),('90e56f7e9688f2d30ae98d9077059869f4de6bdb460b40d98c9141cc90c80f3e3d1dadeb5aa9f3d3',13,1,'api_token','[]',0,'2020-09-06 05:26:15','2020-09-06 05:26:15','2021-09-06 10:56:15'),('9b1886bf2753b8d05e6e8d096001bf790ac814c918ddabbfc43064d05976c71de00bf73d4f69fba7',2,1,'api_token','[]',0,'2020-09-08 07:12:21','2020-09-08 07:12:21','2021-09-08 09:12:21'),('9c8e4eb715d9604d05b44aafdb7ce56171d1b12d4973b57cd9300e5b8b12055fb7ebc7c7243cafb0',1,1,'api_token','[]',0,'2020-09-02 07:29:31','2020-09-02 07:29:31','2021-09-02 09:29:31'),('9d190dc92c6de5d5b586bd69b1185cfa2148d77b42b0a43cb83d8482872fad6131422302617a2bce',2,1,'api_token','[]',0,'2020-09-08 07:14:08','2020-09-08 07:14:08','2021-09-08 09:14:08'),('9f6aab448e036f588b4912913c0fb13251f42a5136cb164b1701714c8ca57c796a6407d86b5c2c6f',14,1,'api_token','[]',0,'2020-09-08 09:59:45','2020-09-08 09:59:45','2021-09-08 11:59:45'),('a26e0dc8524fa960a830f622d2ac8422005732675550b6b776032ddf07e15cae8dc5ea16f3a04775',14,1,'api_token','[]',0,'2020-09-08 12:26:54','2020-09-08 12:26:54','2021-09-08 14:26:54'),('a47267790a872a2eed032fe334c65ba6eb62e8936beb5359f7dd6581ea542c6f0c663a086aaa3202',14,1,'api_token','[]',0,'2020-09-08 10:02:23','2020-09-08 10:02:23','2021-09-08 12:02:23'),('a7a36d537b19eec1d9c2b006063ace5756009dd95d662706cd5d0190edbc57a1895a562b83c5479f',2,1,'api_token','[]',0,'2020-09-08 09:23:07','2020-09-08 09:23:07','2021-09-08 11:23:07'),('a805994c16f0afeb08dcd148570acd462a226abe0cfe156d196bd918d849d0d81a3b64c334db97ad',1,1,'api_token','[]',0,'2020-08-29 08:33:52','2020-08-29 08:33:52','2021-08-29 10:33:52'),('a922ed7332c169fb9d63e4fb7f4f854524a4e6f0f8de5c1e6df957f112cf843cafaa7394a08205ba',2,1,'api_token','[]',0,'2020-08-30 11:42:13','2020-08-30 11:42:13','2021-08-30 13:42:13'),('aca528813831e43d1c2f14bccc4ad48045a0e9a3e96165adccdf2969dad1ddc02ed04c41c2dbacaa',3,1,'api_token','[]',0,'2020-09-03 12:15:11','2020-09-03 12:15:11','2021-09-03 14:15:11'),('aeccb9eb081522809d33b5dade27c20992d70c1ab7a9e3782808e1086cd0ce3ed34b5b38b887758a',10,1,'api_token','[]',0,'2020-09-03 12:12:15','2020-09-03 12:12:15','2021-09-03 14:12:15'),('b6c7335a92ada8cf1237ff517896ece3bbfe100f0e24e8cd9d3e394e6043da23ac1be96719fea4e1',14,1,'api_token','[]',0,'2020-09-06 06:32:00','2020-09-06 06:32:00','2021-09-06 12:02:00'),('be2190f669fa99e6d7f47241def928aae7579e0c3d4d4b2a4764d1a8d03fdb94624b5732b0f2d767',2,1,'api_token','[]',0,'2020-09-07 08:50:05','2020-09-07 08:50:05','2021-09-07 10:50:05'),('be3e35b65d95c5564e3eecc4773529cee607021816a32d6a7c485eaedec5a4c1320746e786783be3',14,1,'api_token','[]',0,'2020-09-08 09:47:19','2020-09-08 09:47:19','2021-09-08 11:47:19'),('bedd930fd80c0529edb6f0082fe74f6bacce4f167dd72b38e78330d09616ace141b959ea681a27f7',3,1,'api_token','[]',0,'2020-09-02 11:04:42','2020-09-02 11:04:42','2021-09-02 13:04:42'),('bf45010696ccd46ec5062a9a68b7d992a796932429fba3623d9f27b4c7938a7c0aa8e41a0a677c16',14,1,'api_token','[]',0,'2020-09-06 08:09:15','2020-09-06 08:09:15','2021-09-06 13:39:15'),('c11fe9b37d6bddb3503a58bb16ff4d00eba0756e75d3edd7149feddddeb6f530175c84d37d4a95d2',14,1,'api_token','[]',0,'2020-09-06 08:09:24','2020-09-06 08:09:24','2021-09-06 13:39:24'),('c59914e188d8c7415e3d877c29811fc2a80cba0ec754474ab212cd2dd4357c9cacfcbd2ae9ba8a78',2,1,'api_token','[]',0,'2020-09-06 08:46:01','2020-09-06 08:46:01','2021-09-06 14:16:01'),('cf616b68193cf8878deec0a12575b99afe20b27664a3f67043a08f42197aa5fa6bed75dc75a1bc4f',2,1,'api_token','[]',0,'2020-08-30 10:46:15','2020-08-30 10:46:15','2021-08-30 12:46:15'),('d07b5d72e4988eb2866b0a5239885f240bce9eeb863c3b59dbc11935f750b6b7dffb33a23dccadea',14,1,'api_token','[]',0,'2020-09-06 08:07:44','2020-09-06 08:07:44','2021-09-06 13:37:44'),('d22080cd2f2df4aa1f789ceed7716cb7a99292a9cdcb48f33d47e850ac1acf04b6d339b10a8a76eb',1,1,'api_token','[]',0,'2020-08-29 08:27:17','2020-08-29 08:27:17','2021-08-29 10:27:17'),('d5837508a45774a7225ff890c83488d4225070a6eaccdebd39ee27d32cf84daf11fcf91a99060aeb',3,1,'api_token','[]',0,'2020-08-26 13:20:34','2020-08-26 13:20:34','2021-08-26 15:20:34'),('d63927899194c5e4f7e859275bf1e84654c64f04af2701e779a2207cf05eef3bea4fa1d11f1d09cd',14,1,'api_token','[]',0,'2020-09-06 08:08:00','2020-09-06 08:08:00','2021-09-06 13:38:00'),('dc273e28e8858bbed304c3ed7199e850dca0a212fd35718a4a00f5e1329584afc0e44e3dae99fe8d',14,1,'api_token','[]',0,'2020-09-08 09:42:25','2020-09-08 09:42:25','2021-09-08 11:42:25'),('ddcd5e1e2d39a07e170ad60948fff4461d22fbe028db227230d53b9bdb69e01c997d702e24f437f3',3,1,'api_token','[]',0,'2020-08-26 13:20:18','2020-08-26 13:20:18','2021-08-26 15:20:18'),('de1064a523d68623e4249d88e2e07b442b6b7cfd9b64595731a5e6ca63f2cef63b7bfd9819b13415',14,1,'api_token','[]',0,'2020-09-08 09:42:09','2020-09-08 09:42:09','2021-09-08 11:42:09'),('e35fa5943c1fef9c868b5f4cc963035135977f85844f184b86f46e83c4953a00493057a33071f041',1,1,'api_token','[]',0,'2020-08-29 08:30:40','2020-08-29 08:30:40','2021-08-29 10:30:40'),('e46a43e92d311c8f90436f63a3b546b24374b11b2bbea73faa8d1859dbf64882268b791611c754b9',1,1,'api_token','[]',0,'2020-08-29 08:44:40','2020-08-29 08:44:40','2021-08-29 10:44:40'),('e7fddcd72a17093321dfafe740074787e8fd4355d6b3d173ba3df92813b6060d8166a817b6e8f1f6',14,1,'api_token','[]',0,'2020-09-06 06:28:13','2020-09-06 06:28:13','2021-09-06 11:58:13'),('e8d03616fadacc362586534dbd97ce0d931b3d823c9ce19f08b225ae88c6fea854917578ef6233ec',14,1,'api_token','[]',0,'2020-09-08 09:42:45','2020-09-08 09:42:45','2021-09-08 11:42:45'),('e99f08e90921ab06a692a45046ee86c623e026abad4f81293a63a2e50fc57923073b90c04e02fcbe',14,1,'api_token','[]',0,'2020-09-08 09:56:58','2020-09-08 09:56:58','2021-09-08 11:56:58'),('ecd5f28ebc68f8a85d7bf5ebe917936e5caa0960bd79df856cb53e7ecde888b3d7d1ee7e0e469e8c',1,1,'api_token','[]',0,'2020-08-30 10:31:59','2020-08-30 10:31:59','2021-08-30 12:31:59'),('f2f34f797e28c4582f9c0bd3abf6ad3eadcc090469709f19d0eb2885681beec10499f54867d60cd9',14,1,'api_token','[]',0,'2020-09-08 09:23:36','2020-09-08 09:23:36','2021-09-08 11:23:36'),('f88b23dd4466402c20984633d9e9ff28e50be9af7b86ac4ddedc0623fc9620aacfb336e24ebaa7dc',14,1,'api_token','[]',0,'2020-09-08 10:03:15','2020-09-08 10:03:15','2021-09-08 12:03:15'),('fbee536768aad6e98061747408ed0c702009ae2b79daf6eada6bf4ac49aab1df06971e56629a8c4a',14,1,'api_token','[]',0,'2020-09-08 11:25:24','2020-09-08 11:25:24','2021-09-08 13:25:24'),('fe1683f43a9fe5716ef172dff6cc37bdc3dfee2eca28d0289c3d7e938a778578cb5ee66fb91b450f',14,1,'api_token','[]',0,'2020-09-08 09:58:52','2020-09-08 09:58:52','2021-09-08 11:58:52');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_auth_codes`
--

DROP TABLE IF EXISTS `oauth_auth_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `client_id` bigint unsigned NOT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_auth_codes_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_auth_codes`
--

LOCK TABLES `oauth_auth_codes` WRITE;
/*!40000 ALTER TABLE `oauth_auth_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_auth_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_clients_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES (1,NULL,'{\"en\" : \"promoclicks\", \"ar\" : \"????????????????????\"} Personal Access Client','fWeu0PgRaYMDDoaQtMZVrha34eeFn7VXGYGAarkF',NULL,'http://localhost',1,0,0,'2020-08-26 12:40:31','2020-08-26 12:40:31'),(2,NULL,'{\"en\" : \"promoclicks\", \"ar\" : \"????????????????????\"} Password Grant Client','dbhs2iXXvO9DxthC7An1qKm5FjHHqGvc13ZxCtQa','users','http://localhost',0,1,0,'2020-08-26 12:40:31','2020-08-26 12:40:31');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_personal_access_clients`
--

DROP TABLE IF EXISTS `oauth_personal_access_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `client_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_personal_access_clients`
--

LOCK TABLES `oauth_personal_access_clients` WRITE;
/*!40000 ALTER TABLE `oauth_personal_access_clients` DISABLE KEYS */;
INSERT INTO `oauth_personal_access_clients` VALUES (1,1,'2020-08-26 12:40:31','2020-08-26 12:40:31');
/*!40000 ALTER TABLE `oauth_personal_access_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pdf_files`
--

DROP TABLE IF EXISTS `pdf_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pdf_files` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `lesson_id` bigint unsigned NOT NULL,
  `file_src` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pdf_files`
--

LOCK TABLES `pdf_files` WRITE;
/*!40000 ALTER TABLE `pdf_files` DISABLE KEYS */;
INSERT INTO `pdf_files` VALUES (1,5,'lessons_files/MtbzOwr3d5oYkHtpBymuyLFZD2DiTZYHZDj3P6Sv.pdf','2020-08-29 10:53:08','2020-08-29 10:53:08'),(2,5,'lessons_files/6T5mX5z6Oi1jjq2xeE8a9tY0oADwl6Z7mcknPSud.pdf','2020-08-29 10:53:08','2020-08-29 10:53:08'),(3,5,'lessons_files/wql3P15uP2gXcT3R0wcaXWlxgzeUtl4fjjwH8lkm.pdf','2020-08-29 10:53:08','2020-08-29 10:53:08'),(4,6,'lessons_files/icT6B6ZgKyh9budTOoZAEUvCOOHprY3nDkrfrdDB.pdf','2020-08-30 08:09:46','2020-08-30 08:09:46'),(5,6,'lessons_files/DXRSMlBi0JYNRGyWQYKifHOHhGDFolsd4TXeYeEj.pdf','2020-08-30 08:09:46','2020-08-30 08:09:46'),(6,7,'lessons_files/bieq4i6WAcvXVReck2o8dSYWWFSZxp8JpIqEuyVx.pdf','2020-08-30 08:11:11','2020-08-30 08:11:11'),(7,7,'lessons_files/W9V21oQUZWVhz2XeWzWaA7dtWhAQHe3gcKwJ8qgD.pdf','2020-08-30 08:11:11','2020-08-30 08:11:11'),(10,8,'lessons_files/cJSJv6wJNXTTEUIJlpTvfxoMifrYkgY3qR4hEGAm.pdf','2020-08-30 09:07:34','2020-08-30 09:07:34'),(12,9,'lessons_files/ZJPJD3dlUHGpO8PvKjqShMAdFEPbmzs321h8yhOs.pdf','2020-09-06 06:22:52','2020-09-06 06:22:52'),(13,3,'lessons_files/YU2QqT2DAdrb1tF5utCunl0ARZ73xUMQvbC0u56Y.pdf','2020-09-08 08:58:24','2020-09-08 08:58:24'),(14,3,'lessons_files/6hgNx10qL3lnDt94v2dCIbdOI70WdYQuXfgRlBYd.pdf','2020-09-08 08:58:24','2020-09-08 08:58:24');
/*!40000 ALTER TABLE `pdf_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `questions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint NOT NULL,
  `lesson_id` bigint unsigned DEFAULT NULL,
  `true_false` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (6,'true false',1,NULL,0,'2020-08-25 05:55:46','2020-08-25 05:55:46'),(12,'choose',2,NULL,NULL,'2020-08-25 09:38:16','2020-08-25 09:38:16'),(37,'dasdasd',1,NULL,0,'2020-08-26 09:00:47','2020-08-26 09:00:47'),(38,'how to',2,NULL,NULL,'2020-08-26 10:57:56','2020-08-26 10:57:56'),(39,'right false',1,NULL,1,'2020-08-26 10:58:07','2020-08-26 10:58:07'),(40,'products',1,3,1,'2020-08-26 11:00:21','2020-08-26 11:40:33'),(41,'true false',2,3,NULL,'2020-08-26 11:00:41','2020-08-26 11:40:33'),(42,'create-admin',1,NULL,0,'2020-08-26 11:42:25','2020-08-26 11:42:25'),(43,'products',2,NULL,NULL,'2020-08-26 11:42:39','2020-08-26 11:42:39'),(44,'asdasdasdasdasd',1,NULL,0,'2020-08-26 11:46:38','2020-08-26 11:46:38'),(45,'music',1,4,0,'2020-08-26 11:47:30','2020-08-26 11:50:05'),(46,'true false specific',1,NULL,0,'2020-08-29 10:50:50','2020-08-29 10:50:50'),(48,'true false',1,8,0,'2020-08-30 08:08:30','2020-08-30 08:13:07');
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `replies`
--

DROP TABLE IF EXISTS `replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `replies` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `replies`
--

LOCK TABLES `replies` WRITE;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
INSERT INTO `replies` VALUES (1,'???? ????????','App\\Models\\Student',3,2,'2020-09-08 09:41:04','2020-09-08 09:41:04'),(2,'???? ????????','App\\Models\\Student',4,2,'2020-09-08 09:41:20','2020-09-08 09:41:20'),(3,'new reply','App\\Models\\Admin',4,1,'2020-09-08 09:52:55','2020-09-08 09:52:55'),(4,'new reply','App\\Models\\Admin',4,1,'2020-09-08 09:54:39','2020-09-08 09:54:39'),(5,'new reply','App\\Models\\Admin',4,1,'2020-09-08 09:55:44','2020-09-08 09:55:44'),(6,'new reply','App\\Models\\Admin',4,1,'2020-09-08 09:55:55','2020-09-08 09:55:55'),(7,'new reply','App\\Models\\Admin',4,1,'2020-09-08 10:06:31','2020-09-08 10:06:31'),(8,'new reply','App\\Models\\Admin',4,1,'2020-09-08 10:06:47','2020-09-08 10:06:47'),(9,'new reply','App\\Models\\Admin',4,1,'2020-09-08 10:06:55','2020-09-08 10:06:55'),(10,'new reply','App\\Models\\Admin',4,1,'2020-09-08 10:07:39','2020-09-08 10:07:39'),(11,'new reply','App\\Models\\Admin',4,1,'2020-09-08 10:07:59','2020-09-08 10:07:59'),(12,'new reply','App\\Models\\Admin',4,1,'2020-09-08 10:08:06','2020-09-08 10:08:06'),(13,'new reply','App\\Models\\Admin',4,1,'2020-09-08 10:10:23','2020-09-08 10:10:23'),(14,'new reply','App\\Models\\Admin',4,1,'2020-09-08 10:10:33','2020-09-08 10:10:33'),(15,'???? ?????? ??????????????','App\\Models\\Student',4,2,'2020-09-08 10:18:09','2020-09-08 10:18:09'),(16,'???? ????????','App\\Models\\Admin',4,1,'2020-09-08 10:18:22','2020-09-08 10:18:22');
/*!40000 ALTER TABLE `replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` bigint unsigned DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `students_email_unique` (`email`),
  UNIQUE KEY `students_phone_unique` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (2,'elfeqy','muhammed@gmail.com','$2y$10$MZ0jLLUytl1RaV4myAcEjezzNcMQ.mG4rRpY8S5WYl6951fO1k3CG','010624780932','cairo,egypt',3,1,NULL,'2020-08-30 10:44:04','2020-09-08 08:12:46'),(4,'Ali Al Fayed','ali@gmail.com','$2y$10$MgEqsfyej5h7R6CH..DvCu/5HK6Beo8RfCSa6l2amLLcK3KnllbfG','010147752015','cairo, egypt',3,0,NULL,'2020-09-02 11:55:28','2020-09-02 11:55:28'),(5,'Ali Al Fayed','ali1@gmail.com','$2y$10$4ajodCnAqfkEC.z14Lkp8OFcRzz3YaBHczY7Erge/CajeFXdwgx3q','0101477520152','cairo, egypt',3,0,NULL,'2020-09-03 06:28:47','2020-09-03 06:28:47'),(6,'Ali Al Fayed','alialfayed22@gmail.com','$2y$10$cketVROcwxV2HKRUMUT8iupIJcb4IWqBZjYVwRyiHtIc2izMhHZAa','01014775215','Zagazig , Egypt',3,0,NULL,'2020-09-03 09:50:17','2020-09-03 09:50:17'),(7,'Ali','ad@gmail.com','$2y$10$v3Kg5z5Xs783FfhCBZPnguVlABWmC91sHY085b608H.uzmsh6LaBW','01014475215','azzzaas',3,0,NULL,'2020-09-03 10:19:16','2020-09-03 10:19:16'),(8,'Ali','alialfayed1@gmail.com','$2y$10$2MgssCeSOlKpIZIGsVulxuKIIZbxS8qf6/LX1VaT2zNHLLmtVseG.','+101014775215','zagazig',3,0,NULL,'2020-09-03 11:27:20','2020-09-03 11:27:20'),(9,'Ali','elfayedgroup8@gmail.com','$2y$10$.ubwSenNDUyaxQH6lryAn.YFv2QOtimzU.bE0IpC/XU0KRHP4gPvC','+101277873750','12fggg',3,0,NULL,'2020-09-03 11:29:12','2020-09-03 11:29:12'),(10,'Muhammed Elfeqy','testmembe4r1@gmail.com','$2y$10$wlO0HTqupsmGaJbt8o6CX.1wBgiaLMiitykXP6tnWp1GX5hTXK8/G','0106247809235','cairo, egypt',3,1,NULL,'2020-09-03 11:54:47','2020-09-03 11:55:22'),(12,'Muhammed Elfeqy','testmembe@gmail.com','$2y$10$ZE9xXrDaoy0BDMOFLp403.OHWjxz7pFN79Yi2paRBk8q4vOcLSI2K','01062478092','cairo, egypt',3,0,NULL,'2020-09-03 13:30:00','2020-09-03 13:30:00'),(13,'Muhammed Elfeqy','test@gmail.com','$2y$10$8FJLgz3YraulESSLkkdQk.PhEqG/An209x16zdHLadzAUjj/s.aSi','7978987','cairo, egypt',3,1,NULL,'2020-09-06 04:58:55','2020-09-06 05:04:40'),(14,'Ali Al Fayed','alialfayed@gmail.com','$2y$10$188Ff4H0bMi8aCb0Zx1cJ.WNNrcb5aH9szjLvKWMqu9HS/VFvK5XK','0112775215','Zagazig, asdasdasdas',3,1,NULL,'2020-09-06 05:09:08','2020-09-06 05:13:03');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students_alerts`
--

DROP TABLE IF EXISTS `students_alerts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students_alerts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `student_id` bigint unsigned NOT NULL,
  `alert_id` bigint unsigned NOT NULL,
  `view_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students_alerts`
--

LOCK TABLES `students_alerts` WRITE;
/*!40000 ALTER TABLE `students_alerts` DISABLE KEYS */;
INSERT INTO `students_alerts` VALUES (2,2,3,0,NULL,NULL),(7,14,5,0,NULL,NULL),(8,14,13,0,NULL,NULL),(9,14,14,0,NULL,NULL),(10,14,15,0,NULL,NULL),(11,14,16,0,NULL,NULL),(12,14,17,0,NULL,NULL),(13,14,18,0,NULL,NULL),(14,14,19,0,NULL,NULL),(15,14,20,0,NULL,NULL),(16,14,21,0,NULL,NULL),(17,14,22,0,NULL,NULL),(18,14,23,0,NULL,NULL),(19,14,24,0,NULL,NULL),(20,14,25,0,NULL,NULL),(21,14,26,0,NULL,NULL),(22,14,27,0,NULL,NULL),(23,14,28,0,NULL,NULL),(24,14,29,0,NULL,NULL),(25,14,30,0,NULL,NULL),(26,14,31,0,NULL,NULL),(27,14,32,0,NULL,NULL),(28,14,33,0,NULL,NULL),(29,14,34,0,NULL,NULL),(30,14,35,0,NULL,NULL),(31,14,36,0,NULL,NULL),(32,14,37,0,NULL,NULL);
/*!40000 ALTER TABLE `students_alerts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription_requests`
--

DROP TABLE IF EXISTS `subscription_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `subscription_requests` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `student_id` bigint unsigned NOT NULL,
  `month_id` bigint unsigned NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT '0',
  `viewed_status` tinyint(1) NOT NULL DEFAULT '0',
  `payment_method` int NOT NULL DEFAULT '0',
  `attachement` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription_requests`
--

LOCK TABLES `subscription_requests` WRITE;
/*!40000 ALTER TABLE `subscription_requests` DISABLE KEYS */;
INSERT INTO `subscription_requests` VALUES (13,2,5,1,1,2,'subscription_attachements/chzgzZ16xyQ1bYRiPeClAkSk22BbWApUqcfA6qU6.png','2020-09-03 09:10:07','2020-09-03 09:10:29'),(18,14,5,1,1,1,NULL,'2020-09-06 08:31:15','2020-09-07 03:13:59'),(19,14,6,0,1,2,'subscription_attachements/7gb2DRnf3pSQG4f0o2J0Ks43zqEgHaPNgpiwRSTd.jpeg','2020-09-06 08:48:50','2020-09-06 08:54:49');
/*!40000 ALTER TABLE `subscription_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `videos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `video_src` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lesson_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (3,NULL,'https://www.youtube.com/watch?v=kg1BljLu9YY',4,'2020-08-26 11:50:05','2020-08-26 11:50:05'),(6,NULL,'https://www.youtube.com/watch?v=kg1BljLu9YY',5,'2020-08-29 10:53:07','2020-08-29 10:53:07'),(7,'lessons_videos/KYIz0mwr09rJsbEkmoYhp9GfJhBCGG4tuZXbOl5z.mp4',NULL,6,'2020-08-30 08:09:46','2020-08-30 08:09:46'),(8,'lessons_videos/j79S9rSrXNJgWbOzeeZoLNy6L8QEDUQ3vKjlKxMj.mp4',NULL,6,'2020-08-30 08:09:46','2020-08-30 08:09:46'),(9,NULL,'https://www.youtube.com/watch?v=kg1BljLu9YY',6,'2020-08-30 08:09:46','2020-08-30 08:09:46'),(10,'lessons_videos/Lb8iflnKjB3pnT4Dt2mqsHC0czO6waTFohk7C37x.mp4',NULL,7,'2020-08-30 08:11:11','2020-08-30 08:11:11'),(11,'lessons_videos/ptzZQxq7Slh2Ua44lz208afsRXq8UHC8WvdYemiq.mp4',NULL,7,'2020-08-30 08:11:11','2020-08-30 08:11:11'),(12,NULL,'https://www.youtube.com/watch?v=kg1BljLu9YY',7,'2020-08-30 08:11:11','2020-08-30 08:11:11'),(16,'lessons_videos/C79MOnQVWGxaFbxzACVHCxn4QH5useqPdhY176lz.mp4',NULL,8,'2020-08-30 09:07:34','2020-08-30 09:07:34'),(19,NULL,'https://www.youtube.com/watch?v=FwhzLR8jaYc',9,'2020-09-06 06:22:52','2020-09-06 06:22:52'),(22,NULL,'https://www.youtube.com/watch?v=FwhzLR8jaYc',3,'2020-09-08 08:58:24','2020-09-08 08:58:24'),(26,'lessons_videos/xhpsiqy68NAonVFbR6qVPRe5ShjovPytwfkpjtqv.mp4',NULL,3,'2020-09-08 09:08:18','2020-09-08 09:08:18'),(27,'lessons_videos/JwSNnmGfNHA7U6n1JPhuWzcANkZwEHwSIOAOidS4.mp4',NULL,4,'2020-09-08 09:18:57','2020-09-08 09:18:57'),(28,'lessons_videos/bUsPAAAUkAuQjJCiubUdYd5HFleCbO55FEr55GXw.mp4',NULL,5,'2020-09-08 09:24:01','2020-09-08 09:24:01'),(29,'lessons_videos/Z70aFPFWvHrtixN9IpnseEcR5Vf3BlIyDwyQzBhH.mp4',NULL,9,'2020-09-08 09:27:08','2020-09-08 09:27:08');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-09-08 16:41:00
