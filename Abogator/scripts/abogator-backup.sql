-- MySQL dump 10.13  Distrib 5.5.16, for Win32 (x86)
--
-- Host: localhost    Database: abogator_dev
-- ------------------------------------------------------
-- Server version	5.5.16

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
-- Table structure for table `bf_activities`
--

DROP TABLE IF EXISTS `bf_activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bf_activities` (
  `activity_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `activity` varchar(255) NOT NULL,
  `module` varchar(255) NOT NULL,
  `created_on` datetime NOT NULL,
  `deleted` tinyint(12) NOT NULL DEFAULT '0',
  PRIMARY KEY (`activity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bf_activities`
--

LOCK TABLES `bf_activities` WRITE;
/*!40000 ALTER TABLE `bf_activities` DISABLE KEYS */;
INSERT INTO `bf_activities` VALUES (1,1,'logged in from: 127.0.0.1','users','2012-10-01 03:39:39',0),(2,1,'modified user: hortelanobruno','users','2012-10-01 03:40:10',0),(3,1,'Created Module: PruebaModule : 127.0.0.1','modulebuilder','2012-10-01 03:42:36',0),(4,1,'Created Module: PruebaModuleDos : 127.0.0.1','modulebuilder','2012-10-01 03:45:54',0),(5,1,'Created Module: PruebaModuleTres : 127.0.0.1','modulebuilder','2012-10-01 03:47:19',0),(6,1,'Created record with ID: 1 : 127.0.0.1','pruebamoduletres','2012-10-01 03:47:32',0),(7,1,'Created Module: PruebaModuleCuatro : 127.0.0.1','modulebuilder','2012-10-01 03:51:23',0),(8,1,'Created record with ID: 1 : 127.0.0.1','pruebamodulecuatro','2012-10-01 04:05:39',0);
/*!40000 ALTER TABLE `bf_activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bf_email_queue`
--

DROP TABLE IF EXISTS `bf_email_queue`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bf_email_queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_email` varchar(128) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `alt_message` text,
  `max_attempts` int(11) NOT NULL DEFAULT '3',
  `attempts` int(11) NOT NULL DEFAULT '0',
  `success` tinyint(1) NOT NULL DEFAULT '0',
  `date_published` datetime DEFAULT NULL,
  `last_attempt` datetime DEFAULT NULL,
  `date_sent` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bf_email_queue`
--

LOCK TABLES `bf_email_queue` WRITE;
/*!40000 ALTER TABLE `bf_email_queue` DISABLE KEYS */;
/*!40000 ALTER TABLE `bf_email_queue` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bf_login_attempts`
--

DROP TABLE IF EXISTS `bf_login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bf_login_attempts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) NOT NULL,
  `login` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bf_login_attempts`
--

LOCK TABLES `bf_login_attempts` WRITE;
/*!40000 ALTER TABLE `bf_login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `bf_login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bf_permissions`
--

DROP TABLE IF EXISTS `bf_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bf_permissions` (
  `permission_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(100) NOT NULL,
  `status` enum('active','inactive','deleted') DEFAULT 'active',
  PRIMARY KEY (`permission_id`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bf_permissions`
--

LOCK TABLES `bf_permissions` WRITE;
/*!40000 ALTER TABLE `bf_permissions` DISABLE KEYS */;
INSERT INTO `bf_permissions` VALUES (2,'Site.Content.View','Allow users to view the Content Context','active'),(3,'Site.Reports.View','Allow users to view the Reports Context','active'),(4,'Site.Settings.View','Allow users to view the Settings Context','active'),(5,'Site.Developer.View','Allow users to view the Developer Context','active'),(6,'Bonfire.Roles.Manage','Allow users to manage the user Roles','active'),(7,'Bonfire.Users.Manage','Allow users to manage the site Users','active'),(8,'Bonfire.Users.View','Allow users access to the User Settings','active'),(9,'Bonfire.Users.Add','Allow users to add new Users','active'),(10,'Bonfire.Database.Manage','Allow users to manage the Database settings','active'),(11,'Bonfire.Emailer.Manage','Allow users to manage the Emailer settings','active'),(12,'Bonfire.Logs.View','Allow users access to the Log details','active'),(13,'Bonfire.Logs.Manage','Allow users to manage the Log files','active'),(14,'Bonfire.Emailer.View','Allow users access to the Emailer settings','active'),(15,'Site.Signin.Offline','Allow users to login to the site when the site is offline','active'),(16,'Bonfire.Permissions.View','Allow access to view the Permissions menu unders Settings Context','active'),(17,'Bonfire.Permissions.Manage','Allow access to manage the Permissions in the system','active'),(18,'Bonfire.Roles.Delete','Allow users to delete user Roles','active'),(19,'Bonfire.Modules.Add','Allow creation of modules with the builder.','active'),(20,'Bonfire.Modules.Delete','Allow deletion of modules.','active'),(21,'Permissions.Administrator.Manage','To manage the access control permissions for the Administrator role.','active'),(22,'Permissions.Editor.Manage','To manage the access control permissions for the Editor role.','active'),(24,'Permissions.User.Manage','To manage the access control permissions for the User role.','active'),(25,'Permissions.Developer.Manage','To manage the access control permissions for the Developer role.','active'),(27,'Activities.Own.View','To view the users own activity logs','active'),(28,'Activities.Own.Delete','To delete the users own activity logs','active'),(29,'Activities.User.View','To view the user activity logs','active'),(30,'Activities.User.Delete','To delete the user activity logs, except own','active'),(31,'Activities.Module.View','To view the module activity logs','active'),(32,'Activities.Module.Delete','To delete the module activity logs','active'),(33,'Activities.Date.View','To view the users own activity logs','active'),(34,'Activities.Date.Delete','To delete the dated activity logs','active'),(35,'Bonfire.UI.Manage','Manage the Bonfire UI settings','active'),(36,'Bonfire.Settings.View','To view the site settings page.','active'),(37,'Bonfire.Settings.Manage','To manage the site settings.','active'),(38,'Bonfire.Activities.View','To view the Activities menu.','active'),(39,'Bonfire.Database.View','To view the Database menu.','active'),(40,'Bonfire.Migrations.View','To view the Migrations menu.','active'),(41,'Bonfire.Builder.View','To view the Modulebuilder menu.','active'),(42,'Bonfire.Roles.View','To view the Roles menu.','active'),(43,'Bonfire.Sysinfo.View','To view the System Information page.','active'),(44,'Bonfire.Translate.Manage','To manage the Language Translation.','active'),(45,'Bonfire.Translate.View','To view the Language Translate menu.','active'),(46,'Bonfire.UI.View','To view the UI/Keyboard Shortcut menu.','active'),(47,'Bonfire.Update.Manage','To manage the Bonfire Update.','active'),(48,'Bonfire.Update.View','To view the Developer Update menu.','active'),(49,'Bonfire.Profiler.View','To view the Console Profiler Bar.','active'),(50,'Bonfire.Roles.Add','To add New Roles','active'),(51,'Site.ContextPrueba.View','Allow user to view the ContextPrueba Context.','active'),(52,'PruebaModule.Contextprueba.View','','active'),(53,'PruebaModule.Contextprueba.Create','','active'),(54,'PruebaModule.Contextprueba.Edit','','active'),(55,'PruebaModule.Contextprueba.Delete','','active'),(56,'PruebaModule.Content.View','','active'),(57,'PruebaModule.Content.Create','','active'),(58,'PruebaModule.Content.Edit','','active'),(59,'PruebaModule.Content.Delete','','active'),(60,'PruebaModule.Reports.View','','active'),(61,'PruebaModule.Reports.Create','','active'),(62,'PruebaModule.Reports.Edit','','active'),(63,'PruebaModule.Reports.Delete','','active'),(64,'PruebaModule.Settings.View','','active'),(65,'PruebaModule.Settings.Create','','active'),(66,'PruebaModule.Settings.Edit','','active'),(67,'PruebaModule.Settings.Delete','','active'),(68,'PruebaModule.Developer.View','','active'),(69,'PruebaModule.Developer.Create','','active'),(70,'PruebaModule.Developer.Edit','','active'),(71,'PruebaModule.Developer.Delete','','active'),(72,'PruebaModuleDos.Contextprueba.View','','active'),(73,'PruebaModuleDos.Contextprueba.Create','','active'),(74,'PruebaModuleDos.Contextprueba.Edit','','active'),(75,'PruebaModuleDos.Contextprueba.Delete','','active'),(76,'PruebaModuleDos.Content.View','','active'),(77,'PruebaModuleDos.Content.Create','','active'),(78,'PruebaModuleDos.Content.Edit','','active'),(79,'PruebaModuleDos.Content.Delete','','active'),(80,'PruebaModuleDos.Reports.View','','active'),(81,'PruebaModuleDos.Reports.Create','','active'),(82,'PruebaModuleDos.Reports.Edit','','active'),(83,'PruebaModuleDos.Reports.Delete','','active'),(84,'PruebaModuleDos.Settings.View','','active'),(85,'PruebaModuleDos.Settings.Create','','active'),(86,'PruebaModuleDos.Settings.Edit','','active'),(87,'PruebaModuleDos.Settings.Delete','','active'),(88,'PruebaModuleDos.Developer.View','','active'),(89,'PruebaModuleDos.Developer.Create','','active'),(90,'PruebaModuleDos.Developer.Edit','','active'),(91,'PruebaModuleDos.Developer.Delete','','active'),(92,'PruebaModuleTres.Contextprueba.View','','active'),(93,'PruebaModuleTres.Contextprueba.Create','','active'),(94,'PruebaModuleTres.Contextprueba.Edit','','active'),(95,'PruebaModuleTres.Contextprueba.Delete','','active'),(96,'PruebaModuleTres.Content.View','','active'),(97,'PruebaModuleTres.Content.Create','','active'),(98,'PruebaModuleTres.Content.Edit','','active'),(99,'PruebaModuleTres.Content.Delete','','active'),(100,'PruebaModuleTres.Reports.View','','active'),(101,'PruebaModuleTres.Reports.Create','','active'),(102,'PruebaModuleTres.Reports.Edit','','active'),(103,'PruebaModuleTres.Reports.Delete','','active'),(104,'PruebaModuleTres.Settings.View','','active'),(105,'PruebaModuleTres.Settings.Create','','active'),(106,'PruebaModuleTres.Settings.Edit','','active'),(107,'PruebaModuleTres.Settings.Delete','','active'),(108,'PruebaModuleTres.Developer.View','','active'),(109,'PruebaModuleTres.Developer.Create','','active'),(110,'PruebaModuleTres.Developer.Edit','','active'),(111,'PruebaModuleTres.Developer.Delete','','active'),(112,'PruebaModuleCuatro.Contextprueba.View','','active'),(113,'PruebaModuleCuatro.Contextprueba.Create','','active'),(114,'PruebaModuleCuatro.Contextprueba.Edit','','active'),(115,'PruebaModuleCuatro.Contextprueba.Delete','','active'),(116,'PruebaModuleCuatro.Content.View','','active'),(117,'PruebaModuleCuatro.Content.Create','','active'),(118,'PruebaModuleCuatro.Content.Edit','','active'),(119,'PruebaModuleCuatro.Content.Delete','','active'),(120,'PruebaModuleCuatro.Reports.View','','active'),(121,'PruebaModuleCuatro.Reports.Create','','active'),(122,'PruebaModuleCuatro.Reports.Edit','','active'),(123,'PruebaModuleCuatro.Reports.Delete','','active'),(124,'PruebaModuleCuatro.Settings.View','','active'),(125,'PruebaModuleCuatro.Settings.Create','','active'),(126,'PruebaModuleCuatro.Settings.Edit','','active'),(127,'PruebaModuleCuatro.Settings.Delete','','active'),(128,'PruebaModuleCuatro.Developer.View','','active'),(129,'PruebaModuleCuatro.Developer.Create','','active'),(130,'PruebaModuleCuatro.Developer.Edit','','active'),(131,'PruebaModuleCuatro.Developer.Delete','','active');
/*!40000 ALTER TABLE `bf_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bf_pruebamodulecuatro`
--

DROP TABLE IF EXISTS `bf_pruebamodulecuatro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bf_pruebamodulecuatro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pruebamodulecuatro_coluno` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bf_pruebamodulecuatro`
--

LOCK TABLES `bf_pruebamodulecuatro` WRITE;
/*!40000 ALTER TABLE `bf_pruebamodulecuatro` DISABLE KEYS */;
INSERT INTO `bf_pruebamodulecuatro` VALUES (1,'<p>\r\n	hghfghfaa<span style=\"color:#00ff00;\">sfasdfas</span>df sd fsf adfsdfs</p>\r\n');
/*!40000 ALTER TABLE `bf_pruebamodulecuatro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bf_pruebamoduledos`
--

DROP TABLE IF EXISTS `bf_pruebamoduledos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bf_pruebamoduledos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pruebamoduledos_coluno` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bf_pruebamoduledos`
--

LOCK TABLES `bf_pruebamoduledos` WRITE;
/*!40000 ALTER TABLE `bf_pruebamoduledos` DISABLE KEYS */;
/*!40000 ALTER TABLE `bf_pruebamoduledos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bf_pruebamoduletres`
--

DROP TABLE IF EXISTS `bf_pruebamoduletres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bf_pruebamoduletres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pruebamoduletres_coluno` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bf_pruebamoduletres`
--

LOCK TABLES `bf_pruebamoduletres` WRITE;
/*!40000 ALTER TABLE `bf_pruebamoduletres` DISABLE KEYS */;
INSERT INTO `bf_pruebamoduletres` VALUES (1,'sdfs');
/*!40000 ALTER TABLE `bf_pruebamoduletres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bf_role_permissions`
--

DROP TABLE IF EXISTS `bf_role_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bf_role_permissions` (
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  PRIMARY KEY (`role_id`,`permission_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bf_role_permissions`
--

LOCK TABLES `bf_role_permissions` WRITE;
/*!40000 ALTER TABLE `bf_role_permissions` DISABLE KEYS */;
INSERT INTO `bf_role_permissions` VALUES (1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(1,9),(1,10),(1,11),(1,12),(1,13),(1,14),(1,15),(1,16),(1,17),(1,18),(1,19),(1,20),(1,21),(1,22),(1,24),(1,25),(1,27),(1,28),(1,29),(1,30),(1,31),(1,32),(1,33),(1,34),(1,35),(1,36),(1,37),(1,38),(1,39),(1,40),(1,41),(1,42),(1,43),(1,44),(1,45),(1,46),(1,47),(1,48),(1,49),(1,50),(1,51),(1,52),(1,53),(1,54),(1,55),(1,56),(1,57),(1,58),(1,59),(1,60),(1,61),(1,62),(1,63),(1,64),(1,65),(1,66),(1,67),(1,68),(1,69),(1,70),(1,71),(1,72),(1,73),(1,74),(1,75),(1,76),(1,77),(1,78),(1,79),(1,80),(1,81),(1,82),(1,83),(1,84),(1,85),(1,86),(1,87),(1,88),(1,89),(1,90),(1,91),(1,92),(1,93),(1,94),(1,95),(1,96),(1,97),(1,98),(1,99),(1,100),(1,101),(1,102),(1,103),(1,104),(1,105),(1,106),(1,107),(1,108),(1,109),(1,110),(1,111),(1,112),(1,113),(1,114),(1,115),(1,116),(1,117),(1,118),(1,119),(1,120),(1,121),(1,122),(1,123),(1,124),(1,125),(1,126),(1,127),(1,128),(1,129),(1,130),(1,131),(2,2),(2,3),(4,51),(6,2),(6,3),(6,4),(6,5),(6,6),(6,7),(6,8),(6,9),(6,10),(6,11),(6,12),(6,13),(6,49);
/*!40000 ALTER TABLE `bf_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bf_roles`
--

DROP TABLE IF EXISTS `bf_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bf_roles` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(60) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `can_delete` tinyint(1) NOT NULL DEFAULT '1',
  `login_destination` varchar(255) NOT NULL DEFAULT '/',
  `deleted` int(1) NOT NULL DEFAULT '0',
  `default_context` varchar(255) NOT NULL DEFAULT 'content',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bf_roles`
--

LOCK TABLES `bf_roles` WRITE;
/*!40000 ALTER TABLE `bf_roles` DISABLE KEYS */;
INSERT INTO `bf_roles` VALUES (1,'Administrator','Has full control over every aspect of the site.',0,0,'',0,'content'),(2,'Editor','Can handle day-to-day management, but does not have full power.',0,1,'',0,'content'),(4,'User','This is the default user with access to login.',1,0,'',0,'content'),(6,'Developer','Developers typically are the only ones that can access the developer tools. Otherwise identical to Administrators, at least until the site is handed off.',0,1,'',0,'content');
/*!40000 ALTER TABLE `bf_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bf_schema_version`
--

DROP TABLE IF EXISTS `bf_schema_version`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bf_schema_version` (
  `type` varchar(40) NOT NULL,
  `version` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bf_schema_version`
--

LOCK TABLES `bf_schema_version` WRITE;
/*!40000 ALTER TABLE `bf_schema_version` DISABLE KEYS */;
INSERT INTO `bf_schema_version` VALUES ('app_',0),('core',35),('pruebamodulecuatro_',2),('pruebamoduledos_',2),('pruebamoduletres_',2),('pruebamodule_',1);
/*!40000 ALTER TABLE `bf_schema_version` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bf_sessions`
--

DROP TABLE IF EXISTS `bf_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bf_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bf_sessions`
--

LOCK TABLES `bf_sessions` WRITE;
/*!40000 ALTER TABLE `bf_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `bf_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bf_settings`
--

DROP TABLE IF EXISTS `bf_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bf_settings` (
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `module` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`name`),
  UNIQUE KEY `unique - name` (`name`),
  KEY `index - name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bf_settings`
--

LOCK TABLES `bf_settings` WRITE;
/*!40000 ALTER TABLE `bf_settings` DISABLE KEYS */;
INSERT INTO `bf_settings` VALUES ('auth.allow_name_change','core','1'),('auth.allow_register','core','1'),('auth.allow_remember','core','1'),('auth.do_login_redirect','core','1'),('auth.login_type','core','email'),('auth.name_change_frequency','core','1'),('auth.name_change_limit','core','1'),('auth.password_force_mixed_case','core','0'),('auth.password_force_numbers','core','0'),('auth.password_force_symbols','core','0'),('auth.password_min_length','core','8'),('auth.password_show_labels','core','0'),('auth.remember_length','core','1209600'),('auth.use_extended_profile','core','0'),('auth.use_usernames','core','1'),('auth.user_activation_method','core','0'),('form_save','core.ui','ctrl+s/⌘+s'),('goto_content','core.ui','alt+c'),('mailpath','email','/usr/sbin/sendmail'),('mailtype','email','text'),('protocol','email','mail'),('sender_email','email','hortelanobruno@gmail.com'),('site.languages','core','a:3:{i:0;s:7:\"english\";i:1;s:10:\"portuguese\";i:2;s:7:\"persian\";}'),('site.list_limit','core','25'),('site.show_front_profiler','core','1'),('site.show_profiler','core','1'),('site.status','core','1'),('site.system_email','core','hortelanobruno@gmail.com'),('site.title','core','Abogados del rey'),('smtp_host','email',''),('smtp_pass','email',''),('smtp_port','email',''),('smtp_timeout','email',''),('smtp_user','email',''),('updates.bleeding_edge','core','1'),('updates.do_check','core','1');
/*!40000 ALTER TABLE `bf_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bf_user_cookies`
--

DROP TABLE IF EXISTS `bf_user_cookies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bf_user_cookies` (
  `user_id` bigint(20) NOT NULL,
  `token` varchar(128) NOT NULL,
  `created_on` datetime NOT NULL,
  KEY `token` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bf_user_cookies`
--

LOCK TABLES `bf_user_cookies` WRITE;
/*!40000 ALTER TABLE `bf_user_cookies` DISABLE KEYS */;
/*!40000 ALTER TABLE `bf_user_cookies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bf_user_meta`
--

DROP TABLE IF EXISTS `bf_user_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bf_user_meta` (
  `meta_id` int(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) NOT NULL DEFAULT '',
  `meta_value` text,
  PRIMARY KEY (`meta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bf_user_meta`
--

LOCK TABLES `bf_user_meta` WRITE;
/*!40000 ALTER TABLE `bf_user_meta` DISABLE KEYS */;
INSERT INTO `bf_user_meta` VALUES (1,1,'state','SC'),(2,1,'country','AR'),(3,1,'type','small');
/*!40000 ALTER TABLE `bf_user_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bf_users`
--

DROP TABLE IF EXISTS `bf_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bf_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '4',
  `email` varchar(120) NOT NULL,
  `username` varchar(30) NOT NULL DEFAULT '',
  `password_hash` varchar(40) NOT NULL,
  `reset_hash` varchar(40) DEFAULT NULL,
  `salt` varchar(7) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_ip` varchar(40) NOT NULL DEFAULT '',
  `created_on` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_message` varchar(255) DEFAULT NULL,
  `reset_by` int(10) DEFAULT NULL,
  `display_name` varchar(255) DEFAULT '',
  `display_name_changed` date DEFAULT NULL,
  `timezone` char(4) NOT NULL DEFAULT 'UM6',
  `language` varchar(20) NOT NULL DEFAULT 'english',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `activate_hash` varchar(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bf_users`
--

LOCK TABLES `bf_users` WRITE;
/*!40000 ALTER TABLE `bf_users` DISABLE KEYS */;
INSERT INTO `bf_users` VALUES (1,1,'hortelanobruno@gmail.com','hortelanobruno','d0b1fe8480628dadee7d934ada5c69675ded3449',NULL,'xXs3cNj','2012-10-01 03:39:39','127.0.0.1','0000-00-00 00:00:00',0,0,NULL,NULL,'',NULL,'UM3','english',1,'');
/*!40000 ALTER TABLE `bf_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-10-02  8:53:11
