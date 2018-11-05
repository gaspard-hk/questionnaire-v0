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
) ENGINE=InnoDB AUTO_INCREMENT=203 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audittrail`
--

LOCK TABLES `audittrail` WRITE;
/*!40000 ALTER TABLE `audittrail` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faillogin`
--

LOCK TABLES `faillogin` WRITE;
/*!40000 ALTER TABLE `faillogin` DISABLE KEYS */;
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
  `explanation` smallint(6) NOT NULL,
  `attitude` smallint(6) NOT NULL,
  `sincerity` smallint(6) NOT NULL,
  `manner` smallint(6) NOT NULL,
  `efficiency` smallint(6) NOT NULL,
  `tidiness` smallint(6) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questionnaire`
--

LOCK TABLES `questionnaire` WRITE;
/*!40000 ALTER TABLE `questionnaire` DISABLE KEYS */;
INSERT INTO `questionnaire` VALUES (1,30,'SHOP1',NULL,NULL,'2015-02-05',5,5,5,5,5,5,5,4,'CUSTOMER1','60000001','00000001','STAFF1','','2015-02-05 03:13:06','2015-02-05 03:13:06',NULL,''),(2,30,'SHOP2',NULL,NULL,'2015-02-05',5,5,5,5,5,5,5,2,'CUSTOMER3','60000003','00000003','STAFF2','comment','2015-02-05 03:13:06','2015-02-05 03:13:06',NULL,''),(3,31,'SHOP3',NULL,NULL,'2015-02-05',5,5,5,5,5,5,5,2,'CUSTOMER2','60000002','00000002','STAFF3','','2015-02-05 08:50:11','2015-02-05 08:50:11',NULL,'');
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (10,'','admin','$2y$10$YsaSQDATmgz2LiwcBftYUOS7xMbreUkdxmiXCw.fOu8coVpQ.vjy2',1,'',0,'2015-02-02 15:01:14','2018-11-05 17:16:37',NULL,'0000-00-00 00:00:00');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Structure for view `vw_audittraillist`
--
DROP TABLE IF EXISTS `vw_audittraillist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_audittraillist` AS select `audittrail`.`IP` AS `IP`,`audittrail`.`action` AS `action`,`audittrail`.`created_at` AS `created_at`,`audittrail`.`updated_at` AS `updated_at` from `audittrail`;

-- --------------------------------------------------------

--
-- Structure for view `vw_faillogincount`
--
DROP TABLE IF EXISTS `vw_faillogincount`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_faillogincount` AS select `faillogin`.`id` AS `id`,`faillogin`.`IP` AS `IP`,`faillogin`.`created_at` AS `created_at`,`faillogin`.`updated_at` AS `updated_at`,`faillogin`.`deleted_at` AS `deleted_at` from `faillogin` where ((`faillogin`.`created_at` + interval 15 minute) > now());

-- --------------------------------------------------------

--
-- Structure for view `vw_ipfilterlist`
--
DROP TABLE IF EXISTS `vw_ipfilterlist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_ipfilterlist` AS select `ipfilter`.`id` AS `id`,`ipfilter`.`ip` AS `ip`,`ipfilter`.`created_at` AS `created_at`,`ipfilter`.`updated_at` AS `updated_at`,`ipfilter`.`deleted_at` AS `deleted_at` from `ipfilter`;

-- --------------------------------------------------------

--
-- Structure for view `vw_memberlist`
--
DROP TABLE IF EXISTS `vw_memberlist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_memberlist` AS select `member`.`customername` AS `customername`,`member`.`customertel` AS `customertel`,`member`.`memberno` AS `memberno`,`member`.`created_at` AS `created_at`,`member`.`updated_at` AS `updated_at`,`member`.`deleted_at` AS `deleted_at` from `member`;

-- --------------------------------------------------------

--
-- Structure for view `vw_questionnairelist`
--
DROP TABLE IF EXISTS `vw_questionnairelist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_questionnairelist` AS select `questionnaire`.`id` AS `id`,`questionnaire`.`visiteddate` AS `visiteddate`,`questionnaire`.`shopnamechi` AS `shopnamechi`,`questionnaire`.`staffname` AS `staffname`,`questionnaire`.`customername` AS `customername`,`questionnaire`.`memberno` AS `memberno`,`questionnaire`.`explanation` AS `explanation`,`questionnaire`.`attitude` AS `attitude`,`questionnaire`.`sincerity` AS `sincerity`,`questionnaire`.`manner` AS `manner`,`questionnaire`.`efficiency` AS `efficiency`,`questionnaire`.`tidiness` AS `tidiness`,`questionnaire`.`reception` AS `reception`,`questionnaire`.`room` AS `room`,`questionnaire`.`customertel` AS `customertel`,`questionnaire`.`comment` AS `comment`,`questionnaire`.`updated_at` AS `updated_at` from `questionnaire`;

-- --------------------------------------------------------

--
-- Structure for view `vw_questionnairestatistic`
--
DROP TABLE IF EXISTS `vw_questionnairestatistic`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_questionnairestatistic` AS select `questionnaire`.`visiteddate` AS `惠顧日期`,`questionnaire`.`shopnamechi` AS `店舖名稱`,`questionnaire`.`staffname` AS `員工名稱`,`questionnaire`.`customername` AS `顧客名稱`,`questionnaire`.`customertel` AS `顧客電話`,`questionnaire`.`memberno` AS `會員編號`,`questionnaire`.`comment` AS `意見`,`questionnaire`.`explanation` AS `講解`,`questionnaire`.`attitude` AS `態度`,`questionnaire`.`sincerity` AS `熱誠`,`questionnaire`.`manner` AS `禮貌`,`questionnaire`.`efficiency` AS `效率`,`questionnaire`.`tidiness` AS `整潔`,`questionnaire`.`reception` AS `接待處`,`questionnaire`.`room` AS `房間`,`questionnaire`.`updated_at` AS `最後更新` from `questionnaire`;

-- --------------------------------------------------------

--
-- Structure for view `vw_report1sheet1`
--
DROP TABLE IF EXISTS `vw_report1sheet1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_report1sheet1` AS select `questionnaire`.`shopnamechi` AS `shopnamechi`,round((((avg(((`questionnaire`.`explanation` - 3) * 50)) + avg(((`questionnaire`.`attitude` - 3) * 50))) + avg(((`questionnaire`.`sincerity` - 3) * 50))) / 3),2) AS `average`,year(`questionnaire`.`visiteddate`) AS `Year`,month(`questionnaire`.`visiteddate`) AS `Month`,concat(year(`questionnaire`.`visiteddate`),'-',month(`questionnaire`.`visiteddate`)) AS `Date` from `questionnaire` group by `questionnaire`.`shopnamechi`,`Year`,`Month`,`Date`;

-- --------------------------------------------------------

--
-- Structure for view `vw_report1sheet2`
--
DROP TABLE IF EXISTS `vw_report1sheet2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_report1sheet2` AS select `questionnaire`.`shopnamechi` AS `shopnamechi`,round((((avg(((`questionnaire`.`manner` - 3) * 50)) + avg(((`questionnaire`.`efficiency` - 3) * 50))) + avg(((`questionnaire`.`tidiness` - 3) * 50))) / 3),2) AS `average`,year(`questionnaire`.`visiteddate`) AS `Year`,month(`questionnaire`.`visiteddate`) AS `Month`,concat(year(`questionnaire`.`visiteddate`),'-',month(`questionnaire`.`visiteddate`)) AS `Date` from `questionnaire` group by `questionnaire`.`shopnamechi`,`Year`,`Month`,`Date`;

-- --------------------------------------------------------

--
-- Structure for view `vw_report1sheet3`
--
DROP TABLE IF EXISTS `vw_report1sheet3`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_report1sheet3` AS select `questionnaire`.`shopnamechi` AS `shopnamechi`,round(((avg(((`questionnaire`.`reception` - 3) * 50)) + avg(((`questionnaire`.`room` - 3) * 50))) / 2),2) AS `average`,year(`questionnaire`.`visiteddate`) AS `Year`,month(`questionnaire`.`visiteddate`) AS `Month`,concat(year(`questionnaire`.`visiteddate`),'-',month(`questionnaire`.`visiteddate`)) AS `Date` from `questionnaire` group by `questionnaire`.`shopnamechi`,`Year`,`Month`,`Date`;

-- --------------------------------------------------------

--
-- Structure for view `vw_report2sheet1`
--
DROP TABLE IF EXISTS `vw_report2sheet1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_report2sheet1` AS select `questionnaire`.`staffname` AS `staffname`,round((((avg(((`questionnaire`.`explanation` - 3) * 50)) + avg(((`questionnaire`.`sincerity` - 3) * 50))) + avg(((`questionnaire`.`attitude` - 3) * 50))) / 3),2) AS `average`,year(`questionnaire`.`visiteddate`) AS `Year`,month(`questionnaire`.`visiteddate`) AS `Month`,concat(year(`questionnaire`.`visiteddate`),'-',month(`questionnaire`.`visiteddate`)) AS `Date`,`questionnaire`.`shopnamechi` AS `shopnamechi` from `questionnaire` group by `questionnaire`.`shopnamechi`,`questionnaire`.`staffname`,`Year`,`Month`,`Date`;

-- --------------------------------------------------------

--
-- Structure for view `vw_report2sheet2`
--
DROP TABLE IF EXISTS `vw_report2sheet2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_report2sheet2` AS select `questionnaire`.`staffname` AS `staffname`,round((((avg(((`questionnaire`.`manner` - 3) * 50)) + avg(((`questionnaire`.`efficiency` - 3) * 50))) + avg(((`questionnaire`.`tidiness` - 3) * 50))) / 3),2) AS `average`,year(`questionnaire`.`visiteddate`) AS `Year`,month(`questionnaire`.`visiteddate`) AS `Month`,concat(year(`questionnaire`.`visiteddate`),'-',month(`questionnaire`.`visiteddate`)) AS `Date`,`questionnaire`.`shopnamechi` AS `shopnamechi` from `questionnaire` group by `questionnaire`.`shopnamechi`,`questionnaire`.`staffname`,`Year`,`Month`,`Date`;

-- --------------------------------------------------------

--
-- Structure for view `vw_report2sheet3`
--
DROP TABLE IF EXISTS `vw_report2sheet3`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_report2sheet3` AS select `questionnaire`.`staffname` AS `staffname`,round(((avg(((`questionnaire`.`room` - 3) * 50)) + avg(((`questionnaire`.`reception` - 3) * 50))) / 2),2) AS `average`,year(`questionnaire`.`visiteddate`) AS `Year`,month(`questionnaire`.`visiteddate`) AS `Month`,concat(year(`questionnaire`.`visiteddate`),'-',month(`questionnaire`.`visiteddate`)) AS `Date`,`questionnaire`.`shopnamechi` AS `shopnamechi` from `questionnaire` group by `questionnaire`.`shopnamechi`,`questionnaire`.`staffname`,`Year`,`Month`,`Date`;

-- --------------------------------------------------------

--
-- Structure for view `vw_report3sheet1`
--
DROP TABLE IF EXISTS `vw_report3sheet1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_report3sheet1` AS select `questionnaire`.`staffname` AS `staffname`,round(((((avg((`questionnaire`.`explanation` - 3)) * 50) + avg(((`questionnaire`.`sincerity` - 3) * 50))) + avg(((`questionnaire`.`attitude` - 3) * 50))) / 3),2) AS `average`,year(`questionnaire`.`visiteddate`) AS `Year`,month(`questionnaire`.`visiteddate`) AS `Month`,concat(year(`questionnaire`.`visiteddate`),'-',month(`questionnaire`.`visiteddate`)) AS `Date` from `questionnaire` group by `questionnaire`.`shopnamechi`,`questionnaire`.`staffname`,`Year`,`Month`,`Date`;

-- --------------------------------------------------------

--
-- Structure for view `vw_report3sheet2`
--
DROP TABLE IF EXISTS `vw_report3sheet2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_report3sheet2` AS select `questionnaire`.`staffname` AS `staffname`,round(((((avg((`questionnaire`.`manner` - 3)) * 50) + avg(((`questionnaire`.`efficiency` - 3) * 50))) + avg(((`questionnaire`.`tidiness` - 3) * 50))) / 3),2) AS `average`,year(`questionnaire`.`visiteddate`) AS `Year`,month(`questionnaire`.`visiteddate`) AS `Month`,concat(year(`questionnaire`.`visiteddate`),'-',month(`questionnaire`.`visiteddate`)) AS `Date` from `questionnaire` group by `questionnaire`.`shopnamechi`,`questionnaire`.`staffname`,`Year`,`Month`,`Date`;

-- --------------------------------------------------------

--
-- Structure for view `vw_shopslist`
--
DROP TABLE IF EXISTS `vw_shopslist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_shopslist` AS select `shops`.`id` AS `id`,`shops`.`shopnamechi` AS `shopnamechi`,`shops`.`shopnameeng` AS `shopnameeng`,`shops`.`shopnamejap` AS `shopnamejap`,`shops`.`created_at` AS `created_at`,`shops`.`updated_at` AS `updated_at`,`shops`.`deleted_at` AS `deleted_at`,`shops`.`position` AS `position` from `shops` order by `shops`.`position`;

-- --------------------------------------------------------

--
-- Structure for view `vw_stafflist`
--
DROP TABLE IF EXISTS `vw_stafflist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_stafflist` AS select `staff`.`id` AS `id`,`staff`.`staffname` AS `staffname`,`staff`.`created_at` AS `created_at`,`staff`.`updated_at` AS `updated_at`,`staff`.`deleted_at` AS `deleted_at`,`staff`.`shopname` AS `shopname` from `staff`;

-- --------------------------------------------------------

--
-- Structure for view `vw_userslist`
--
DROP TABLE IF EXISTS `vw_userslist`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_userslist` AS select `users`.`id` AS `id`,`users`.`username` AS `username`,`users`.`password` AS `password`,`users`.`code` AS `code`,`users`.`active` AS `active`,`users`.`updated_at` AS `updated_at`,`users`.`created_at` AS `created_at`,`users`.`deleted_at` AS `deleted_at` from `users`;



--
-- Dumping routines for database 'company'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-05 10:05:48
