-- https://stackoverflow.com/questions/1916392/how-can-i-get-rid-of-these-comments-in-a-mysql-dump
-- MySQL dump 10.13  Distrib 5.6.41, for Linux (x86_64)
--
-- Host: localhost    Database: company
-- ------------------------------------------------------
-- Server version	5.6.41

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
-- Table structure for table `audittrail`
--

DROP TABLE IF EXISTS `audittrail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `audittrail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `action` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=229 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audittrail`
--

LOCK TABLES `audittrail` WRITE;
/*!40000 ALTER TABLE `audittrail` DISABLE KEYS */;
INSERT INTO `audittrail` VALUES (203,'14.198.234.104','User:admin(10) Login admin','2018-09-16 23:40:21','2018-09-16 23:40:21',NULL),(204,'14.198.234.104','Login fail','2018-09-17 10:00:32','2018-09-17 10:00:32',NULL),(205,'14.198.234.104','User:admin(10) Login admin','2018-09-17 10:00:44','2018-09-17 10:00:44',NULL),(206,'14.198.234.104','User:admin(10) Login admin','2018-09-17 11:35:21','2018-09-17 11:35:21',NULL),(207,'14.198.234.104','User:admin(10) Login admin','2018-09-17 12:38:17','2018-09-17 12:38:17',NULL),(208,'223.197.178.59','Login fail','2018-11-01 17:53:29','2018-11-01 17:53:29',NULL),(209,'223.197.178.59','Login fail','2018-11-01 17:54:52','2018-11-01 17:54:52',NULL),(210,'223.197.178.59','Login fail','2018-11-02 16:34:52','2018-11-02 16:34:52',NULL),(211,'223.197.178.59','Login fail','2018-11-02 16:35:03','2018-11-02 16:35:03',NULL),(212,'223.197.178.59','Login fail','2018-11-02 16:35:36','2018-11-02 16:35:36',NULL),(213,'223.197.178.59','Login fail','2018-11-03 02:12:13','2018-11-03 02:12:13',NULL),(214,'223.197.178.59','Login fail','2018-11-03 02:12:24','2018-11-03 02:12:24',NULL),(215,'223.197.178.59','Login fail','2018-11-03 02:14:46','2018-11-03 02:14:46',NULL),(216,'14.198.234.104','Login fail','2018-11-03 02:16:52','2018-11-03 02:16:52',NULL),(217,'14.198.234.104','Login fail','2018-11-03 02:17:00','2018-11-03 02:17:00',NULL),(218,'14.198.234.104','Login fail','2018-11-03 02:19:49','2018-11-03 02:19:49',NULL),(219,'14.198.234.104','User:admin(10) Login admin','2018-11-03 02:40:13','2018-11-03 02:40:13',NULL),(220,'219.79.67.97','Login fail','2018-11-03 02:50:38','2018-11-03 02:50:38',NULL),(221,'219.79.67.97','User:admin(10) Login admin','2018-11-03 02:51:02','2018-11-03 02:51:02',NULL),(222,'14.198.234.104','Login fail','2018-11-05 18:05:18','2018-11-05 18:05:18',NULL),(223,'14.198.234.104','Login fail','2018-11-05 18:05:23','2018-11-05 18:05:23',NULL),(224,'14.198.234.104','User:admin(10) Login admin','2018-11-05 18:05:41','2018-11-05 18:05:41',NULL),(225,'14.198.234.104','User:admin(10) Login admin','2018-11-05 18:15:42','2018-11-05 18:15:42',NULL),(226,'14.198.234.104','User:admin(10) Login admin','2018-11-05 18:16:13','2018-11-05 18:16:13',NULL),(227,'14.198.234.104','User:admin(id: 10) Create user account normal','2018-11-05 18:16:28','2018-11-05 18:16:28',NULL),(228,'14.198.234.104','User:normal(12) Login normal','2018-11-05 18:16:37','2018-11-05 18:16:37',NULL);
/*!40000 ALTER TABLE `audittrail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faillogin`
--

DROP TABLE IF EXISTS `faillogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faillogin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `IP` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faillogin`
--

LOCK TABLES `faillogin` WRITE;
/*!40000 ALTER TABLE `faillogin` DISABLE KEYS */;
INSERT INTO `faillogin` VALUES (23,'223.197.178.59','2018-11-01 17:53:29','2018-11-01 17:53:29',NULL),(24,'223.197.178.59','2018-11-01 17:54:52','2018-11-01 17:54:52',NULL),(25,'223.197.178.59','2018-11-02 16:34:52','2018-11-02 16:34:52',NULL),(26,'223.197.178.59','2018-11-02 16:35:03','2018-11-02 16:35:03',NULL),(27,'223.197.178.59','2018-11-02 16:35:36','2018-11-02 16:35:36',NULL),(28,'223.197.178.59','2018-11-03 02:12:13','2018-11-03 02:12:13',NULL),(29,'223.197.178.59','2018-11-03 02:12:24','2018-11-03 02:12:24',NULL),(30,'223.197.178.59','2018-11-03 02:14:46','2018-11-03 02:14:46',NULL),(33,'14.198.234.104','2018-11-03 02:19:49','2018-11-03 02:40:13','2018-11-03 02:40:13'),(34,'219.79.67.97','2018-11-03 02:50:38','2018-11-03 02:51:02','2018-11-03 02:51:02'),(35,'14.198.234.104','2018-11-05 18:05:18','2018-11-05 18:05:41','2018-11-05 18:05:41'),(36,'14.198.234.104','2018-11-05 18:05:23','2018-11-05 18:05:41','2018-11-05 18:05:41');
/*!40000 ALTER TABLE `faillogin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ipfilter`
--

DROP TABLE IF EXISTS `ipfilter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ipfilter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ipfilter`
--

LOCK TABLES `ipfilter` WRITE;
/*!40000 ALTER TABLE `ipfilter` DISABLE KEYS */;
/*!40000 ALTER TABLE `ipfilter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customername` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `customertel` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `memberno` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28671 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (1,'CUSTOMER1','60000001','00000001','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(2,'CUSTOMER2','60000002','00000002','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL),(3,'CUSTOMER3','60000003','00000003','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questionnaire`
--

DROP TABLE IF EXISTS `questionnaire`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questionnaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shops_id` int(11) NOT NULL,
  `shopnamechi` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shopnameng` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `shopnamejap` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `visiteddate` date NOT NULL,
  `type` varchar(10) NOT NULL,
  `lifeexplanation` smallint(6) DEFAULT NULL,
  `lifetechnique` smallint(6) DEFAULT NULL,
  `lifecomfort` smallint(6) DEFAULT NULL,
  `lifecourtesy` smallint(6) DEFAULT NULL,
  `lifeefficiency` smallint(6) DEFAULT NULL,
  `lifeappearance` smallint(6) DEFAULT NULL,
  `medicalprofessionalism` smallint(6) DEFAULT NULL,
  `medicaltechnique` smallint(6) DEFAULT NULL,
  `medicalexplanation` smallint(6) DEFAULT NULL,
  `medicalattitude` smallint(6) DEFAULT NULL,
  `callcourtesy` smallint(6) NOT NULL,
  `callexplanation` smallint(6) NOT NULL,
  `callefficiency` smallint(6) NOT NULL,
  `reception` smallint(6) NOT NULL,
  `room` smallint(6) NOT NULL,
  `customername` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `customertel` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `memberno` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `staffname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `IP` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questionnaire`
--

LOCK TABLES `questionnaire` WRITE;
/*!40000 ALTER TABLE `questionnaire` DISABLE KEYS */;
INSERT INTO `questionnaire` VALUES (7,28,'SHOP1',NULL,NULL,'2018-09-16','life',1,3,2,1,2,3,NULL,NULL,NULL,NULL,4,2,1,3,2,'CUSTOMER1','60000001','','STAFF1','','2018-09-16 23:30:01','2018-09-16 23:30:01',NULL,''),(8,30,'SHOP3',NULL,NULL,'2018-09-17','life',5,5,4,3,4,4,NULL,NULL,NULL,NULL,4,4,4,3,3,'CUSTOMER1','60000001','','STAFF4','Good','2018-09-17 12:12:31','2018-09-17 12:12:31',NULL,''),(9,30,'SHOP3',NULL,NULL,'2018-09-17','life',5,5,4,3,5,5,NULL,NULL,NULL,NULL,4,4,5,4,4,'CUSTOMER1','60000001','','STAFF4','2222','2018-09-17 12:15:07','2018-09-17 12:15:07',NULL,''),(10,30,'SHOP3',NULL,NULL,'2018-09-17','life',5,5,4,3,5,5,NULL,NULL,NULL,NULL,4,4,5,4,4,'CUSTOMER1','60000001','','STAFF5','2222','2018-09-17 12:15:07','2018-09-17 12:15:07',NULL,''),(11,30,'SHOP3',NULL,NULL,'2018-09-17','life',5,5,4,3,5,5,NULL,NULL,NULL,NULL,4,4,5,4,4,'CUSTOMER1','60000001','','STAFF1','2222','2018-09-17 12:15:07','0000-00-00 00:00:00',NULL,''),(12,30,'SHOP3',NULL,NULL,'2018-09-17','medical',NULL,NULL,NULL,NULL,NULL,NULL,1,2,1,3,2,4,2,3,2,'CUSTOMER1','60000001','','STAFF4','1212','2018-09-17 12:16:49','2018-09-17 12:16:49',NULL,''),(13,30,'SHOP3',NULL,NULL,'2018-09-17','medical',NULL,NULL,NULL,NULL,NULL,NULL,1,2,1,3,2,4,2,3,2,'CUSTOMER1','60000001','','STAFF5','1212','2018-09-17 12:16:49','2018-09-17 12:16:49',NULL,''),(14,30,'SHOP3',NULL,NULL,'2018-09-17','medical',NULL,NULL,NULL,NULL,NULL,NULL,1,2,1,3,2,4,2,3,2,'CUSTOMER1','60000001','','STAFF2','1212','2018-09-17 12:16:49','2018-09-17 12:16:49',NULL,''),(15,30,'SHOP3',NULL,NULL,'2018-09-17','medical',NULL,NULL,NULL,NULL,NULL,NULL,5,4,4,4,5,4,3,4,3,'CUSTOMER1','60000001','','STAFF5','test','2018-09-17 12:31:13','2018-09-17 12:31:13',NULL,''),(16,30,'SHOP3',NULL,NULL,'2018-09-17','medical',NULL,NULL,NULL,NULL,NULL,NULL,5,4,4,4,5,4,3,4,3,'CUSTOMER1','60000001','','STAFF2','test','2018-09-17 12:31:13','2018-09-17 12:31:13',NULL,''),(17,30,'SHOP3',NULL,NULL,'2018-09-17','medical',NULL,NULL,NULL,NULL,NULL,NULL,5,4,4,4,5,4,3,4,3,'CUSTOMER1','60000001','','STAFF1','test','2018-09-17 12:31:13','2018-09-17 12:31:13',NULL,'');
/*!40000 ALTER TABLE `questionnaire` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Key` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `Value` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ID` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `setting`
--

LOCK TABLES `setting` WRITE;
/*!40000 ALTER TABLE `setting` DISABLE KEYS */;
INSERT INTO `setting` VALUES (3,'ipfilter','N','0000-00-00 00:00:00','2015-02-05 03:12:41',NULL),(4,'ipfilter','Y','2015-02-02 14:57:12','2015-02-02 14:57:12',NULL);
/*!40000 ALTER TABLE `setting` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shops`
--

DROP TABLE IF EXISTS `shops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shopnamechi` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shopnameeng` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shopnamejap` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `position` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shops`
--

LOCK TABLES `shops` WRITE;
/*!40000 ALTER TABLE `shops` DISABLE KEYS */;
INSERT INTO `shops` VALUES (28,'SHOP1','','','2015-02-02 15:02:01','2015-02-02 15:02:01',NULL,1),(29,'SHOP2','','','2015-02-02 15:02:11','2015-02-02 15:16:26','2015-02-02 15:16:26',2),(30,'SHOP3','','','2015-02-02 15:16:17','2015-02-02 15:17:29',NULL,3);
/*!40000 ALTER TABLE `shops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staffname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `shopname` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,'STAFF1','2015-02-02 15:18:32','2015-02-02 15:18:32',NULL,'SHOP1'),(2,'STAFF2','2015-02-02 15:18:32','2015-02-02 15:18:32',NULL,'SHOP1'),(3,'STAFF3','2015-02-02 15:18:32','2015-02-02 15:18:32',NULL,'SHOP2'),(4,'STAFF4','2015-02-02 15:18:32','2015-02-02 15:18:32',NULL,'SHOP3'),(5,'STAFF5','2015-02-02 15:18:32','2015-02-02 15:18:32',NULL,'SHOP3');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` int(2) DEFAULT NULL,
  `code` varchar(60) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `remember_token` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (10,'','admin','$2y$10$nKS.cAUbZzg6iFxGJFrt5eiAFHSb19YTRGYDxUtm0ULa7UlVZh456',1,'',0,'2015-02-02 15:01:14','2018-11-05 18:16:29',NULL,'0000-00-00 00:00:00'),(12,'','normal','$2y$10$CJ1gpxRVenXRa39eQd1aIeIG73SNhM.mV2DsqDqEFc6yEJNeQi1yi',2,'',0,'2018-11-05 18:16:28','2018-11-05 18:16:28',NULL,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'company'
--

--
-- Final view structure for view `vw_audittraillist`
--

/*!50001 DROP VIEW IF EXISTS `vw_audittraillist`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_audittraillist` AS select `audittrail`.`IP` AS `IP`,`audittrail`.`action` AS `action`,`audittrail`.`created_at` AS `created_at`,`audittrail`.`updated_at` AS `updated_at` from `audittrail` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_faillogincount`
--

/*!50001 DROP VIEW IF EXISTS `vw_faillogincount`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_faillogincount` AS select `faillogin`.`id` AS `id`,`faillogin`.`IP` AS `IP`,`faillogin`.`created_at` AS `created_at`,`faillogin`.`updated_at` AS `updated_at`,`faillogin`.`deleted_at` AS `deleted_at` from `faillogin` where ((`faillogin`.`created_at` + interval 15 minute) > now()) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_ipfilterlist`
--

/*!50001 DROP VIEW IF EXISTS `vw_ipfilterlist`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_ipfilterlist` AS select `ipfilter`.`id` AS `id`,`ipfilter`.`ip` AS `ip`,`ipfilter`.`created_at` AS `created_at`,`ipfilter`.`updated_at` AS `updated_at`,`ipfilter`.`deleted_at` AS `deleted_at` from `ipfilter` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_memberlist`
--

/*!50001 DROP VIEW IF EXISTS `vw_memberlist`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_memberlist` AS select `member`.`customername` AS `customername`,`member`.`customertel` AS `customertel`,`member`.`memberno` AS `memberno`,`member`.`created_at` AS `created_at`,`member`.`updated_at` AS `updated_at`,`member`.`deleted_at` AS `deleted_at` from `member` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_questionnairelist`
--

/*!50001 DROP VIEW IF EXISTS `vw_questionnairelist`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_questionnairelist` AS select `questionnaire`.`id` AS `id`,`questionnaire`.`visiteddate` AS `visiteddate`,`questionnaire`.`shopnamechi` AS `shopnamechi`,`questionnaire`.`staffname` AS `staffname`,`questionnaire`.`customername` AS `customername`,`questionnaire`.`memberno` AS `memberno`,`questionnaire`.`type` AS `type`,`questionnaire`.`lifeexplanation` AS `lifeexplanation`,`questionnaire`.`lifetechnique` AS `lifetechnique`,`questionnaire`.`lifecomfort` AS `lifecomfort`,`questionnaire`.`lifecourtesy` AS `lifecourtesy`,`questionnaire`.`lifeefficiency` AS `lifeefficiency`,`questionnaire`.`lifeappearance` AS `lifeappearance`,`questionnaire`.`medicalprofessionalism` AS `medicalprofessionalism`,`questionnaire`.`medicaltechnique` AS `medicaltechnique`,`questionnaire`.`medicalattitude` AS `medicalattitude`,`questionnaire`.`medicalexplanation` AS `medicalexplanation`,`questionnaire`.`callcourtesy` AS `callcourtesy`,`questionnaire`.`callexplanation` AS `callexplanation`,`questionnaire`.`callefficiency` AS `callefficiency`,`questionnaire`.`reception` AS `reception`,`questionnaire`.`room` AS `room`,`questionnaire`.`customertel` AS `customertel`,`questionnaire`.`comment` AS `comment`,`questionnaire`.`updated_at` AS `updated_at` from `questionnaire` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_questionnairestatistic`
--

/*!50001 DROP VIEW IF EXISTS `vw_questionnairestatistic`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_questionnairestatistic` AS select `questionnaire`.`visiteddate` AS `惠顧日期`,`questionnaire`.`shopnamechi` AS `店舖名稱`,`questionnaire`.`staffname` AS `員工名稱`,`questionnaire`.`customername` AS `顧客名稱`,`questionnaire`.`customertel` AS `顧客電話`,`questionnaire`.`memberno` AS `會員編號`,`questionnaire`.`comment` AS `意見`,`questionnaire`.`lifeexplanation` AS `講解(生活)`,`questionnaire`.`lifetechnique` AS `技術(生活)`,`questionnaire`.`lifecomfort` AS `舒適度(生活)`,`questionnaire`.`lifecourtesy` AS `禮貌(生活)`,`questionnaire`.`lifeefficiency` AS `效率(生活)`,`questionnaire`.`lifeappearance` AS `儀容(生活)`,`questionnaire`.`medicalprofessionalism` AS `專業性(醫學)`,`questionnaire`.`medicaltechnique` AS `技術(醫學)`,`questionnaire`.`medicalattitude` AS `態度(醫學)`,`questionnaire`.`medicalexplanation` AS `講解(醫學)`,`questionnaire`.`callcourtesy` AS `禮貌(預約)`,`questionnaire`.`callexplanation` AS `講解(預約)`,`questionnaire`.`callefficiency` AS `效率(預約)`,`questionnaire`.`reception` AS `接待處`,`questionnaire`.`room` AS `房間`,`questionnaire`.`updated_at` AS `最後更新` from `questionnaire` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_report1sheet1`
--

/*!50001 DROP VIEW IF EXISTS `vw_report1sheet1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_report1sheet1` AS select `questionnaire`.`shopnamechi` AS `shopnamechi`,round(((((((avg(((`questionnaire`.`lifeexplanation` - 3) * 50)) + avg(((`questionnaire`.`lifetechnique` - 3) * 50))) + avg(((`questionnaire`.`lifecomfort` - 3) * 50))) + avg(((`questionnaire`.`lifecourtesy` - 3) * 50))) + avg(((`questionnaire`.`lifeefficiency` - 3) * 50))) + avg(((`questionnaire`.`lifeappearance` - 3) * 50))) / 6),2) AS `average`,year(`questionnaire`.`visiteddate`) AS `Year`,month(`questionnaire`.`visiteddate`) AS `Month`,concat(year(`questionnaire`.`visiteddate`),'-',month(`questionnaire`.`visiteddate`)) AS `Date` from `questionnaire` where (`questionnaire`.`type` = 'life') group by `questionnaire`.`shopnamechi`,`Year`,`Month`,`Date` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_report1sheet2`
--

/*!50001 DROP VIEW IF EXISTS `vw_report1sheet2`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_report1sheet2` AS select `questionnaire`.`shopnamechi` AS `shopnamechi`,round(((((avg(((`questionnaire`.`medicalprofessionalism` - 3) * 50)) + avg(((`questionnaire`.`medicaltechnique` - 3) * 50))) + avg(((`questionnaire`.`medicalattitude` - 3) * 50))) + avg(((`questionnaire`.`medicalexplanation` - 3) * 50))) / 4),2) AS `average`,year(`questionnaire`.`visiteddate`) AS `Year`,month(`questionnaire`.`visiteddate`) AS `Month`,concat(year(`questionnaire`.`visiteddate`),'-',month(`questionnaire`.`visiteddate`)) AS `Date` from `questionnaire` where (`questionnaire`.`type` = 'medical') group by `questionnaire`.`shopnamechi`,`Year`,`Month`,`Date` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_report1sheet3`
--

/*!50001 DROP VIEW IF EXISTS `vw_report1sheet3`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_report1sheet3` AS select `questionnaire`.`shopnamechi` AS `shopnamechi`,round((((avg(((`questionnaire`.`callcourtesy` - 3) * 50)) + avg(((`questionnaire`.`callexplanation` - 3) * 50))) + avg(((`questionnaire`.`callefficiency` - 3) * 50))) / 3),2) AS `average`,year(`questionnaire`.`visiteddate`) AS `Year`,month(`questionnaire`.`visiteddate`) AS `Month`,concat(year(`questionnaire`.`visiteddate`),'-',month(`questionnaire`.`visiteddate`)) AS `Date` from `questionnaire` group by `questionnaire`.`shopnamechi`,`Year`,`Month`,`Date` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_report1sheet4`
--

/*!50001 DROP VIEW IF EXISTS `vw_report1sheet4`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_report1sheet4` AS select `questionnaire`.`shopnamechi` AS `shopnamechi`,round(((avg(((`questionnaire`.`reception` - 3) * 50)) + avg(((`questionnaire`.`room` - 3) * 50))) / 2),2) AS `average`,year(`questionnaire`.`visiteddate`) AS `Year`,month(`questionnaire`.`visiteddate`) AS `Month`,concat(year(`questionnaire`.`visiteddate`),'-',month(`questionnaire`.`visiteddate`)) AS `Date` from `questionnaire` group by `questionnaire`.`shopnamechi`,`Year`,`Month`,`Date` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_report2sheet1`
--

/*!50001 DROP VIEW IF EXISTS `vw_report2sheet1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_report2sheet1` AS select `questionnaire`.`staffname` AS `staffname`,round(((((((avg(((`questionnaire`.`lifeexplanation` - 3) * 50)) + avg(((`questionnaire`.`lifetechnique` - 3) * 50))) + avg(((`questionnaire`.`lifecomfort` - 3) * 50))) + avg(((`questionnaire`.`lifecourtesy` - 3) * 50))) + avg(((`questionnaire`.`lifeefficiency` - 3) * 50))) + avg(((`questionnaire`.`lifeappearance` - 3) * 50))) / 6),2) AS `average`,year(`questionnaire`.`visiteddate`) AS `Year`,month(`questionnaire`.`visiteddate`) AS `Month`,concat(year(`questionnaire`.`visiteddate`),'-',month(`questionnaire`.`visiteddate`)) AS `Date`,`questionnaire`.`shopnamechi` AS `shopnamechi` from `questionnaire` where (`questionnaire`.`type` = 'life') group by `questionnaire`.`shopnamechi`,`questionnaire`.`staffname`,`Year`,`Month`,`Date` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_report2sheet2`
--

/*!50001 DROP VIEW IF EXISTS `vw_report2sheet2`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_report2sheet2` AS select `questionnaire`.`staffname` AS `staffname`,round(((((avg(((`questionnaire`.`medicalprofessionalism` - 3) * 50)) + avg(((`questionnaire`.`medicaltechnique` - 3) * 50))) + avg(((`questionnaire`.`medicalattitude` - 3) * 50))) + avg(((`questionnaire`.`medicalexplanation` - 3) * 50))) / 4),2) AS `average`,year(`questionnaire`.`visiteddate`) AS `Year`,month(`questionnaire`.`visiteddate`) AS `Month`,concat(year(`questionnaire`.`visiteddate`),'-',month(`questionnaire`.`visiteddate`)) AS `Date`,`questionnaire`.`shopnamechi` AS `shopnamechi` from `questionnaire` where (`questionnaire`.`type` = 'medical') group by `questionnaire`.`shopnamechi`,`questionnaire`.`staffname`,`Year`,`Month`,`Date` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_report2sheet3`
--

/*!50001 DROP VIEW IF EXISTS `vw_report2sheet3`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_report2sheet3` AS select `questionnaire`.`staffname` AS `staffname`,round((((avg(((`questionnaire`.`callcourtesy` - 3) * 50)) + avg(((`questionnaire`.`callexplanation` - 3) * 50))) + avg(((`questionnaire`.`callefficiency` - 3) * 50))) / 2),2) AS `average`,year(`questionnaire`.`visiteddate`) AS `Year`,month(`questionnaire`.`visiteddate`) AS `Month`,concat(year(`questionnaire`.`visiteddate`),'-',month(`questionnaire`.`visiteddate`)) AS `Date`,`questionnaire`.`shopnamechi` AS `shopnamechi` from `questionnaire` group by `questionnaire`.`shopnamechi`,`questionnaire`.`staffname`,`Year`,`Month`,`Date` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_report2sheet4`
--

/*!50001 DROP VIEW IF EXISTS `vw_report2sheet4`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_report2sheet4` AS select `questionnaire`.`staffname` AS `staffname`,round(((avg(((`questionnaire`.`room` - 3) * 50)) + avg(((`questionnaire`.`reception` - 3) * 50))) / 2),2) AS `average`,year(`questionnaire`.`visiteddate`) AS `Year`,month(`questionnaire`.`visiteddate`) AS `Month`,concat(year(`questionnaire`.`visiteddate`),'-',month(`questionnaire`.`visiteddate`)) AS `Date`,`questionnaire`.`shopnamechi` AS `shopnamechi` from `questionnaire` group by `questionnaire`.`shopnamechi`,`questionnaire`.`staffname`,`Year`,`Month`,`Date` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_report3sheet1`
--

/*!50001 DROP VIEW IF EXISTS `vw_report3sheet1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_report3sheet1` AS select `questionnaire`.`staffname` AS `staffname`,round((((((((avg((`questionnaire`.`lifeexplanation` - 3)) * 50) + avg(((`questionnaire`.`lifetechnique` - 3) * 50))) + avg(((`questionnaire`.`lifecomfort` - 3) * 50))) + avg(((`questionnaire`.`lifecourtesy` - 3) * 50))) + avg(((`questionnaire`.`lifeefficiency` - 3) * 50))) + avg(((`questionnaire`.`lifeappearance` - 3) * 50))) / 6),2) AS `average`,year(`questionnaire`.`visiteddate`) AS `Year`,month(`questionnaire`.`visiteddate`) AS `Month`,concat(year(`questionnaire`.`visiteddate`),'-',month(`questionnaire`.`visiteddate`)) AS `Date` from `questionnaire` where (`questionnaire`.`type` = 'life') group by `questionnaire`.`staffname`,`Year`,`Month`,`Date` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_report3sheet2`
--

/*!50001 DROP VIEW IF EXISTS `vw_report3sheet2`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_report3sheet2` AS select `questionnaire`.`staffname` AS `staffname`,round((((((avg((`questionnaire`.`medicalprofessionalism` - 3)) * 50) + avg(((`questionnaire`.`medicaltechnique` - 3) * 50))) + avg(((`questionnaire`.`medicalattitude` - 3) * 50))) + avg(((`questionnaire`.`medicalexplanation` - 3) * 50))) / 4),2) AS `average`,year(`questionnaire`.`visiteddate`) AS `Year`,month(`questionnaire`.`visiteddate`) AS `Month`,concat(year(`questionnaire`.`visiteddate`),'-',month(`questionnaire`.`visiteddate`)) AS `Date` from `questionnaire` where (`questionnaire`.`type` = 'medical') group by `questionnaire`.`staffname`,`Year`,`Month`,`Date` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_report3sheet3`
--

/*!50001 DROP VIEW IF EXISTS `vw_report3sheet3`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_report3sheet3` AS select `questionnaire`.`staffname` AS `staffname`,round((((avg(((`questionnaire`.`callcourtesy` - 3) * 50)) + avg(((`questionnaire`.`callexplanation` - 3) * 50))) + avg(((`questionnaire`.`callefficiency` - 3) * 50))) / 3),2) AS `average`,year(`questionnaire`.`visiteddate`) AS `Year`,month(`questionnaire`.`visiteddate`) AS `Month`,concat(year(`questionnaire`.`visiteddate`),'-',month(`questionnaire`.`visiteddate`)) AS `Date` from `questionnaire` where (`questionnaire`.`type` = 'medical') group by `questionnaire`.`staffname`,`Year`,`Month`,`Date` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_shopslist`
--

/*!50001 DROP VIEW IF EXISTS `vw_shopslist`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_shopslist` AS select `shops`.`id` AS `id`,`shops`.`shopnamechi` AS `shopnamechi`,`shops`.`shopnameeng` AS `shopnameeng`,`shops`.`shopnamejap` AS `shopnamejap`,`shops`.`created_at` AS `created_at`,`shops`.`updated_at` AS `updated_at`,`shops`.`deleted_at` AS `deleted_at`,`shops`.`position` AS `position` from `shops` order by `shops`.`position` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_stafflist`
--

/*!50001 DROP VIEW IF EXISTS `vw_stafflist`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_stafflist` AS select `staff`.`id` AS `id`,`staff`.`staffname` AS `staffname`,`staff`.`created_at` AS `created_at`,`staff`.`updated_at` AS `updated_at`,`staff`.`deleted_at` AS `deleted_at`,`staff`.`shopname` AS `shopname` from `staff` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `vw_userslist`
--

/*!50001 DROP VIEW IF EXISTS `vw_userslist`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_userslist` AS select `users`.`id` AS `id`,`users`.`username` AS `username`,`users`.`password` AS `password`,`users`.`type` AS `type`,`users`.`code` AS `code`,`users`.`active` AS `active`,`users`.`updated_at` AS `updated_at`,`users`.`created_at` AS `created_at`,`users`.`deleted_at` AS `deleted_at` from `users` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-05 15:44:44
