CREATE DATABASE  IF NOT EXISTS `e_diary` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `e_diary`;
-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: e_diary
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `status_id_status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `fk_admin_status1_idx` (`status_id_status`),
  CONSTRAINT `fk_admin_status1` FOREIGN KEY (`status_id_status`) REFERENCES `status` (`id_status`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (2,'Jovan','Jovanov','admin','202cb962ac59075b964b07152d234b70',1);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classes` (
  `id_cl` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(45) NOT NULL,
  PRIMARY KEY (`id_cl`),
  UNIQUE KEY `class_UNIQUE` (`class`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classes`
--

LOCK TABLES `classes` WRITE;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
INSERT INTO `classes` VALUES (1,'1a'),(2,'1b'),(3,'1c'),(20,'1d'),(4,'2a'),(5,'2b'),(6,'2c'),(7,'3a'),(8,'3b'),(9,'3c'),(10,'4a'),(11,'4b'),(15,'5a'),(17,'5b'),(18,'5c'),(21,'6a');
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `days`
--

DROP TABLE IF EXISTS `days`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `days` (
  `id_days` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(10) NOT NULL,
  PRIMARY KEY (`id_days`),
  UNIQUE KEY `day_UNIQUE` (`day`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `days`
--

LOCK TABLES `days` WRITE;
/*!40000 ALTER TABLE `days` DISABLE KEYS */;
INSERT INTO `days` VALUES (5,'Friday'),(1,'Monday'),(4,'Thursday'),(2,'Tuesday'),(3,'Wednesday');
/*!40000 ALTER TABLE `days` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grades` (
  `id_g` int(11) NOT NULL AUTO_INCREMENT,
  `term1` varchar(255) DEFAULT NULL,
  `term2` varchar(255) DEFAULT NULL,
  `term3` varchar(255) DEFAULT NULL,
  `term4` varchar(255) DEFAULT NULL,
  `final1` varchar(255) DEFAULT NULL,
  `final2` varchar(255) DEFAULT NULL,
  `id_student` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  PRIMARY KEY (`id_g`),
  UNIQUE KEY `UI_Grades` (`id_student`,`id_subject`),
  KEY `fk_grades_student_idx` (`id_student`),
  KEY `fk_grades_subject_idx` (`id_subject`),
  CONSTRAINT `fk_grades_student` FOREIGN KEY (`id_student`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_grades_subject` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subj`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
INSERT INTO `grades` VALUES (1,'5','4,4','3','4','5','4',2,1),(2,'5','','5','','5','5',2,2),(3,'4','4','4','4','4','4',2,4),(7,'5','','','','','',3,1),(9,'','','','','','',3,3),(11,'','','','','','',2,3),(12,'','','','','','',2,12),(13,'5','','','','','',3,2),(16,'5','','','','','',3,5),(18,'4','4','','','','',2,5),(19,'5,4','','','','','',3,4),(21,'5','','','','','',4,1),(22,'5','5','','','','',2,7),(24,'5','','','','','',6,1),(25,'4','','','','','',6,7),(26,'5','5','','','','',7,1),(27,'5','','','','','',7,7),(28,'5','','','','','',25,1),(31,'5','5','','','','',25,2),(34,'5','5','','','','',26,6),(35,'5','4','','','','',26,11),(36,'5,4','5','','','','',27,1),(37,'5','5','','','5','',23,5),(38,'5','','','','','',23,8),(39,'5','5','5','','5','',23,2),(40,'5','','','','','',28,11),(41,'4','','','','','',27,11),(42,'5','','','','','',28,1),(46,'5','5','5','','5','',26,1),(48,'5','','','','','',29,1);
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `headmaster`
--

DROP TABLE IF EXISTS `headmaster`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `headmaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `status_id_status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `fk_headmaster_status1_idx` (`status_id_status`),
  CONSTRAINT `fk_headmaster_status1` FOREIGN KEY (`status_id_status`) REFERENCES `status` (`id_status`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `headmaster`
--

LOCK TABLES `headmaster` WRITE;
/*!40000 ALTER TABLE `headmaster` DISABLE KEYS */;
INSERT INTO `headmaster` VALUES (2,'Jelena','Radovic','headmaster','202cb962ac59075b964b07152d234b70',2);
/*!40000 ALTER TABLE `headmaster` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hours`
--

DROP TABLE IF EXISTS `hours`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hours` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hour` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `hour_UNIQUE` (`hour`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hours`
--

LOCK TABLES `hours` WRITE;
/*!40000 ALTER TABLE `hours` DISABLE KEYS */;
INSERT INTO `hours` VALUES (1,'01'),(2,'02'),(3,'03'),(4,'04'),(5,'05'),(6,'06'),(7,'07'),(8,'08'),(9,'09'),(10,'10'),(11,'11'),(12,'12');
/*!40000 ALTER TABLE `hours` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lessons`
--

DROP TABLE IF EXISTS `lessons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lessons` (
  `id_l` int(11) NOT NULL AUTO_INCREMENT,
  `lesson` int(11) NOT NULL,
  PRIMARY KEY (`id_l`),
  UNIQUE KEY `lesson_UNIQUE` (`lesson`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lessons`
--

LOCK TABLES `lessons` WRITE;
/*!40000 ALTER TABLE `lessons` DISABLE KEYS */;
INSERT INTO `lessons` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7);
/*!40000 ALTER TABLE `lessons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `senderId` int(11) NOT NULL,
  `recieverId` int(11) NOT NULL,
  `body` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (1,12,26,'Hello','2019-07-17 16:58:59','0'),(2,26,12,'Hello ','2019-07-17 17:00:26','0');
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `minutes`
--

DROP TABLE IF EXISTS `minutes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `minutes` (
  `id_min` int(11) NOT NULL AUTO_INCREMENT,
  `min` varchar(10) NOT NULL,
  PRIMARY KEY (`id_min`),
  UNIQUE KEY `min_UNIQUE` (`min`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `minutes`
--

LOCK TABLES `minutes` WRITE;
/*!40000 ALTER TABLE `minutes` DISABLE KEYS */;
INSERT INTO `minutes` VALUES (1,'00'),(2,'10'),(3,'20'),(4,'30'),(5,'40'),(6,'50');
/*!40000 ALTER TABLE `minutes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id_news` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(45) NOT NULL,
  `message` varchar(45) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_news`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES (4,'The third notice','Yes, it works!','2019-07-18 16:20:57'),(6,'Notice','The queen is here!','2019-07-18 16:35:33');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opendoor`
--

DROP TABLE IF EXISTS `opendoor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opendoor` (
  `id_o` int(11) NOT NULL AUTO_INCREMENT,
  `id_tos` int(11) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_o`),
  KEY `fk_opendoor_student_idx` (`id_parent`),
  KEY `fk_opendoor_id_tos_idx` (`id_tos`),
  CONSTRAINT `fk_opendoor_id_tos` FOREIGN KEY (`id_tos`) REFERENCES `teacher_openslot` (`id_tos`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_opendoor_student` FOREIGN KEY (`id_parent`) REFERENCES `students` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opendoor`
--

LOCK TABLES `opendoor` WRITE;
/*!40000 ALTER TABLE `opendoor` DISABLE KEYS */;
INSERT INTO `opendoor` VALUES (12,4,26,'2019-07-16 15:50:09'),(75,5,2,'2019-07-16 19:03:52'),(76,1,2,'2019-07-16 19:57:47'),(77,5,2,'2019-07-16 19:57:49'),(79,1,2,'2019-07-17 14:29:54'),(80,5,2,'2019-07-17 14:29:55'),(84,7,2,'2019-07-17 14:38:51'),(85,7,2,'2019-07-17 14:40:16'),(86,7,2,'2019-07-17 14:42:24'),(89,4,26,'2019-07-18 20:22:09'),(90,4,26,'2019-07-18 20:28:17'),(91,10,26,'2019-07-18 22:46:31'),(92,12,7,'2019-07-18 23:19:16'),(93,13,2,'2019-07-19 19:29:38'),(94,13,2,'2019-07-19 19:44:53');
/*!40000 ALTER TABLE `opendoor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `opendoor_response`
--

DROP TABLE IF EXISTS `opendoor_response`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `opendoor_response` (
  `id_odr` int(11) NOT NULL AUTO_INCREMENT,
  `id_opendoor` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_odr`),
  KEY `fk_opendoor_response_opendoor_idx` (`id_opendoor`),
  CONSTRAINT `fk_opendoor_response_opendoor` FOREIGN KEY (`id_opendoor`) REFERENCES `opendoor` (`id_o`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opendoor_response`
--

LOCK TABLES `opendoor_response` WRITE;
/*!40000 ALTER TABLE `opendoor_response` DISABLE KEYS */;
/*!40000 ALTER TABLE `opendoor_response` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `period`
--

DROP TABLE IF EXISTS `period`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `period` (
  `id_period` int(11) NOT NULL AUTO_INCREMENT,
  `period` varchar(45) NOT NULL,
  PRIMARY KEY (`id_period`),
  UNIQUE KEY `period_UNIQUE` (`period`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `period`
--

LOCK TABLES `period` WRITE;
/*!40000 ALTER TABLE `period` DISABLE KEYS */;
INSERT INTO `period` VALUES (1,'AM'),(2,'PM');
/*!40000 ALTER TABLE `period` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`id_status`),
  UNIQUE KEY `role_UNIQUE` (`role`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'admin'),(2,'headmaster'),(4,'parent'),(3,'teacher');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `surname` varchar(45) NOT NULL,
  `jmbg` int(11) NOT NULL,
  `pname` varchar(45) NOT NULL,
  `psurname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `class` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_students_UNIQUE` (`id`),
  UNIQUE KEY `pusername_UNIQUE` (`username`),
  KEY `fk_students_classes_idx` (`class`),
  KEY `fk_students_status_idx` (`status`),
  CONSTRAINT `fk_students_class` FOREIGN KEY (`class`) REFERENCES `classes` (`id_cl`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_students_status` FOREIGN KEY (`status`) REFERENCES `status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (2,'Jana','Jovanovic',123,'Tara','Jovanovic','tarara','123',1,4),(3,'Ana','Jovanovic',123,'Ana','Jovanovic','ana','123',1,4),(4,'Ivan','Jovanovic',1234567,'Ivana','Jovanovic','ivana','123',2,4),(5,'Milan','Jovanovic',1234567,'Lina','Jovanovic','lina','123',2,4),(6,'Vukan','Jovanovic',1234567,'Vuk','Jovanovic','vuk','123',3,4),(7,'Vuksan','Jovanovic',1234567,'Mitar','Jovanovic','mita','123',3,4),(8,'Timon','Jovanovic',12345678,'Lidija','Jovanovic','lidija','123',4,4),(9,'Gorana','Jovanovic',123,'Aneta','Jovanovic','aneta','1234567',4,4),(10,'Gogi','Jovanovic',1234567,'Aca','Jovanovic','aca','123',5,4),(12,'Nemanja','Jovanovic',123,'Snezana','Jovanovic','sneza','123',2,4),(22,'Milan','Jelic',123,'Milica','Jelic','milica','123',10,4),(23,'Marina','Maric',123,'Marija','Maric','marija','123',1,4),(24,'Nikola','Nikolic',123,'Nadja','Nikolic','nadja','123',2,4),(25,'Lidija','Lidija',123,'Anita','Lidija','anita','123',1,4),(26,'Neda','Mirkovic',123,'Neda','Mirkovic','parent','202cb962ac59075b964b07152d234b70',15,4),(27,'Luka','Lukic',1233123,'Luka','Lukic','luka','123',17,4),(28,'Aleksa','Aleksic',123,'Brana','Aleksic','bojana','123',17,4),(29,'Tara','Tara',123,'Milan','Tara','vitas','123',17,4),(31,'Iva','Ivkov',123,'Ivana','Ivkov','iva','123',4,4);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `id_subj` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(45) NOT NULL,
  PRIMARY KEY (`id_subj`),
  UNIQUE KEY `subject_name_UNIQUE` (`subject`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (34,'Astronomija'),(11,'Biology'),(3,'Engleski jezik'),(29,'Filologija'),(18,'Filozofija'),(8,'Fizicko'),(12,'Hemija'),(33,'Istorija'),(32,'Istorija umetnosti'),(10,'Istorijska geografija'),(7,'Likovno'),(37,'Logika'),(1,'Matematika'),(6,'Muzicka kultura'),(4,'Nemacki jezik'),(2,'Srpski jezik'),(5,'Svet oko nas'),(28,'Teologija');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher_class`
--

DROP TABLE IF EXISTS `teacher_class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher_class` (
  `id_tc` int(11) NOT NULL AUTO_INCREMENT,
  `id_teacher` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  PRIMARY KEY (`id_tc`),
  KEY `fk_teacher_idx` (`id_teacher`),
  KEY `fk_class_idx` (`id_class`),
  CONSTRAINT `fk_class` FOREIGN KEY (`id_class`) REFERENCES `classes` (`id_cl`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_teacher` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher_class`
--

LOCK TABLES `teacher_class` WRITE;
/*!40000 ALTER TABLE `teacher_class` DISABLE KEYS */;
INSERT INTO `teacher_class` VALUES (3,1,1),(6,2,2),(7,5,3),(16,12,15),(17,11,15),(18,7,15),(19,12,17),(21,11,17),(24,12,18);
/*!40000 ALTER TABLE `teacher_class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher_openslot`
--

DROP TABLE IF EXISTS `teacher_openslot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher_openslot` (
  `id_tos` int(11) NOT NULL AUTO_INCREMENT,
  `id_teacher` int(11) NOT NULL,
  `id_day` int(11) NOT NULL,
  `id_hour` int(11) NOT NULL,
  `id_minute` int(11) NOT NULL,
  `id_period` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tos`),
  KEY `fk_teacher_openday_teacher_idx` (`id_teacher`),
  KEY `fk_teacher_openslot_day_idx` (`id_day`),
  KEY `fk_teacher_openslot_hour_idx` (`id_hour`),
  KEY `fk_teacher_openslot_minute_idx` (`id_minute`),
  KEY `fk_teacher_openslot_period_idx` (`id_period`),
  CONSTRAINT `fk_teacher_openslot_day` FOREIGN KEY (`id_day`) REFERENCES `days` (`id_days`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_teacher_openslot_hour` FOREIGN KEY (`id_hour`) REFERENCES `hours` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_teacher_openslot_minute` FOREIGN KEY (`id_minute`) REFERENCES `minutes` (`id_min`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_teacher_openslot_period` FOREIGN KEY (`id_period`) REFERENCES `period` (`id_period`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_teacher_openslot_teacher` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher_openslot`
--

LOCK TABLES `teacher_openslot` WRITE;
/*!40000 ALTER TABLE `teacher_openslot` DISABLE KEYS */;
INSERT INTO `teacher_openslot` VALUES (1,1,1,1,1,1,'2019-07-16 15:49:25'),(4,11,1,2,2,2,'2019-07-16 15:49:25'),(5,1,3,2,3,1,'2019-07-16 19:01:47'),(7,1,4,1,4,1,'2019-07-17 14:37:24'),(10,12,1,1,5,1,'2019-07-18 21:21:34'),(11,2,1,1,6,1,'2019-07-18 23:13:48'),(12,5,1,2,4,1,'2019-07-18 23:19:02'),(13,1,3,1,2,2,'2019-07-19 19:13:35');
/*!40000 ALTER TABLE `teacher_openslot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teacher_subject`
--

DROP TABLE IF EXISTS `teacher_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher_subject` (
  `id_ts` int(11) NOT NULL AUTO_INCREMENT,
  `id_teacher` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  PRIMARY KEY (`id_ts`),
  UNIQUE KEY `id_ts_UNIQUE` (`id_ts`),
  KEY `fk_teacher_subject_teacher_idx` (`id_teacher`),
  KEY `fk_teacher_subject_subject_idx` (`id_subject`),
  CONSTRAINT `fk_teacher_subject_subject` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subj`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_teacher_subject_teacher` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher_subject`
--

LOCK TABLES `teacher_subject` WRITE;
/*!40000 ALTER TABLE `teacher_subject` DISABLE KEYS */;
INSERT INTO `teacher_subject` VALUES (2,1,2),(4,1,4),(5,1,5),(8,1,1),(10,2,1),(11,2,5),(14,5,1),(15,5,2),(22,5,7),(29,2,2),(30,5,5),(31,7,6),(40,11,11),(41,12,1),(47,14,18),(48,1,3);
/*!40000 ALTER TABLE `teacher_subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tname` varchar(45) NOT NULL,
  `tsurname` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `status_id_status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `id_teachers_UNIQUE` (`id`),
  KEY `fk_teachers_status1_idx` (`status_id_status`),
  CONSTRAINT `fk_teachers_status1` FOREIGN KEY (`status_id_status`) REFERENCES `status` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` VALUES (1,'Milena','Petkov','milena','123',3),(2,'Jelena','Petkov','jelena','123',3),(5,'Matija','Ivanovic','matija','123',3),(7,'Sonja','Ivanovic','sonja','123',3),(11,'Zorica','Ivanovic','zorica','123',3),(12,'Rade','Ivanovic','teacher','202cb962ac59075b964b07152d234b70',3),(14,'Janko','Ivanovic','janko','123',3);
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timetable`
--

DROP TABLE IF EXISTS `timetable`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timetable` (
  `id_time` int(11) NOT NULL AUTO_INCREMENT,
  `day` int(11) NOT NULL,
  `lesson` int(11) NOT NULL,
  `id_subject` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  `id_teacher` int(11) NOT NULL,
  PRIMARY KEY (`id_time`),
  UNIQUE KEY `id_UNIQUE` (`id_time`),
  UNIQUE KEY `UI_Timetable` (`day`,`lesson`,`id_teacher`),
  KEY `fk_timetable_day_idx` (`day`),
  KEY `fk_timetable_lesson_idx` (`lesson`),
  KEY `fk_timetable_subject_idx` (`id_subject`),
  KEY `fk_timetable_class_idx` (`id_class`),
  KEY `fk_timetable_teacher_idx` (`id_teacher`),
  CONSTRAINT `fk_timetable_class` FOREIGN KEY (`id_class`) REFERENCES `classes` (`id_cl`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_timetable_day` FOREIGN KEY (`day`) REFERENCES `days` (`id_days`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_timetable_lesson` FOREIGN KEY (`lesson`) REFERENCES `lessons` (`id_l`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_timetable_subject` FOREIGN KEY (`id_subject`) REFERENCES `subjects` (`id_subj`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_timetable_teacher` FOREIGN KEY (`id_teacher`) REFERENCES `teachers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timetable`
--

LOCK TABLES `timetable` WRITE;
/*!40000 ALTER TABLE `timetable` DISABLE KEYS */;
INSERT INTO `timetable` VALUES (2,2,2,2,2,0),(3,1,1,1,1,0),(4,2,1,2,1,0),(7,2,3,11,1,0),(8,1,7,11,15,0),(10,1,3,18,15,0),(11,4,1,18,15,0),(13,3,1,2,1,0),(14,4,2,3,1,0),(24,5,1,8,1,0),(25,2,6,7,1,0),(32,5,2,2,1,0),(33,2,2,1,17,12);
/*!40000 ALTER TABLE `timetable` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-07 19:18:01
