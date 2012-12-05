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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bf_activities`
--

LOCK TABLES `bf_activities` WRITE;
/*!40000 ALTER TABLE `bf_activities` DISABLE KEYS */;
INSERT INTO `bf_activities` VALUES (1,1,'logged in from: 127.0.0.1','users','2012-10-01 03:39:39',0),(2,1,'modified user: hortelanobruno','users','2012-10-01 03:40:10',0),(3,1,'Created Module: PruebaModule : 127.0.0.1','modulebuilder','2012-10-01 03:42:36',0),(4,1,'Created Module: PruebaModuleDos : 127.0.0.1','modulebuilder','2012-10-01 03:45:54',0),(5,1,'Created Module: PruebaModuleTres : 127.0.0.1','modulebuilder','2012-10-01 03:47:19',0),(6,1,'Created record with ID: 1 : 127.0.0.1','pruebamoduletres','2012-10-01 03:47:32',0),(7,1,'Created Module: PruebaModuleCuatro : 127.0.0.1','modulebuilder','2012-10-01 03:51:23',0),(8,1,'Created record with ID: 1 : 127.0.0.1','pruebamodulecuatro','2012-10-01 04:05:39',0),(9,1,'logged in from: 127.0.0.1','users','2012-12-02 16:04:31',0),(10,1,'logged in from: 127.0.0.1','users','2012-12-05 17:23:13',0),(11,1,'Updated record with ID: 1 : 127.0.0.1','pruebamodulecuatro','2012-12-05 17:26:39',0),(12,1,'Updated record with ID: 1 : 127.0.0.1','pruebamodulecuatro','2012-12-05 17:33:02',0),(13,1,'Deleted Module: PruebaModule : 127.0.0.1','builder','2012-12-05 17:34:21',0),(14,1,'Deleted Module: PruebaModuleDos : 127.0.0.1','builder','2012-12-05 17:34:26',0),(15,1,'Deleted Module: PruebaModuleTres : 127.0.0.1','builder','2012-12-05 17:34:32',0),(16,1,'Created Module: Noticias : 127.0.0.1','modulebuilder','2012-12-05 17:36:44',0),(17,1,'Deleted Module: Pruebamodule : 127.0.0.1','builder','2012-12-05 17:36:57',0),(18,1,'Created record with ID: 1 : 127.0.0.1','noticias','2012-12-05 17:45:57',0),(19,1,'Updated record with ID: 1 : 127.0.0.1','noticias','2012-12-05 17:46:07',0),(20,1,'Updated record with ID: 1 : 127.0.0.1','noticias','2012-12-05 17:47:46',0);
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
-- Table structure for table `bf_noticias`
--

DROP TABLE IF EXISTS `bf_noticias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bf_noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `noticias_titulo` varchar(1000) NOT NULL,
  `noticias_fecha` date NOT NULL DEFAULT '0000-00-00',
  `noticias_texto` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bf_noticias`
--

LOCK TABLES `bf_noticias` WRITE;
/*!40000 ALTER TABLE `bf_noticias` DISABLE KEYS */;
INSERT INTO `bf_noticias` VALUES (1,'qweqwe','2012-12-17','<p>\r\n	asdasdasdad3.</p>\r\n<p>\r\n	as</p>\r\n<p>\r\n	<span style=\"color:#ffd700;\">da</span></p>\r\n<p>\r\n	<span style=\"color:#ffd700;\">sd</span></p>\r\n<p>\r\n	asdasdasd</p>\r\n<p>\r\n	asdasd1</p>\r\n');
/*!40000 ALTER TABLE `bf_noticias` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bf_permissions`
--

LOCK TABLES `bf_permissions` WRITE;
/*!40000 ALTER TABLE `bf_permissions` DISABLE KEYS */;
INSERT INTO `bf_permissions` VALUES (2,'Site.Content.View','Allow users to view the Content Context','active'),(3,'Site.Reports.View','Allow users to view the Reports Context','active'),(4,'Site.Settings.View','Allow users to view the Settings Context','active'),(5,'Site.Developer.View','Allow users to view the Developer Context','active'),(6,'Bonfire.Roles.Manage','Allow users to manage the user Roles','active'),(7,'Bonfire.Users.Manage','Allow users to manage the site Users','active'),(8,'Bonfire.Users.View','Allow users access to the User Settings','active'),(9,'Bonfire.Users.Add','Allow users to add new Users','active'),(10,'Bonfire.Database.Manage','Allow users to manage the Database settings','active'),(11,'Bonfire.Emailer.Manage','Allow users to manage the Emailer settings','active'),(12,'Bonfire.Logs.View','Allow users access to the Log details','active'),(13,'Bonfire.Logs.Manage','Allow users to manage the Log files','active'),(14,'Bonfire.Emailer.View','Allow users access to the Emailer settings','active'),(15,'Site.Signin.Offline','Allow users to login to the site when the site is offline','active'),(16,'Bonfire.Permissions.View','Allow access to view the Permissions menu unders Settings Context','active'),(17,'Bonfire.Permissions.Manage','Allow access to manage the Permissions in the system','active'),(18,'Bonfire.Roles.Delete','Allow users to delete user Roles','active'),(19,'Bonfire.Modules.Add','Allow creation of modules with the builder.','active'),(20,'Bonfire.Modules.Delete','Allow deletion of modules.','active'),(21,'Permissions.Administrator.Manage','To manage the access control permissions for the Administrator role.','active'),(22,'Permissions.Editor.Manage','To manage the access control permissions for the Editor role.','active'),(24,'Permissions.User.Manage','To manage the access control permissions for the User role.','active'),(25,'Permissions.Developer.Manage','To manage the access control permissions for the Developer role.','active'),(27,'Activities.Own.View','To view the users own activity logs','active'),(28,'Activities.Own.Delete','To delete the users own activity logs','active'),(29,'Activities.User.View','To view the user activity logs','active'),(30,'Activities.User.Delete','To delete the user activity logs, except own','active'),(31,'Activities.Module.View','To view the module activity logs','active'),(32,'Activities.Module.Delete','To delete the module activity logs','active'),(33,'Activities.Date.View','To view the users own activity logs','active'),(34,'Activities.Date.Delete','To delete the dated activity logs','active'),(35,'Bonfire.UI.Manage','Manage the Bonfire UI settings','active'),(36,'Bonfire.Settings.View','To view the site settings page.','active'),(37,'Bonfire.Settings.Manage','To manage the site settings.','active'),(38,'Bonfire.Activities.View','To view the Activities menu.','active'),(39,'Bonfire.Database.View','To view the Database menu.','active'),(40,'Bonfire.Migrations.View','To view the Migrations menu.','active'),(41,'Bonfire.Builder.View','To view the Modulebuilder menu.','active'),(42,'Bonfire.Roles.View','To view the Roles menu.','active'),(43,'Bonfire.Sysinfo.View','To view the System Information page.','active'),(44,'Bonfire.Translate.Manage','To manage the Language Translation.','active'),(45,'Bonfire.Translate.View','To view the Language Translate menu.','active'),(46,'Bonfire.UI.View','To view the UI/Keyboard Shortcut menu.','active'),(47,'Bonfire.Update.Manage','To manage the Bonfire Update.','active'),(48,'Bonfire.Update.View','To view the Developer Update menu.','active'),(49,'Bonfire.Profiler.View','To view the Console Profiler Bar.','active'),(50,'Bonfire.Roles.Add','To add New Roles','active'),(51,'Site.ContextPrueba.View','Allow user to view the ContextPrueba Context.','active'),(112,'PruebaModuleCuatro.Contextprueba.View','','active'),(113,'PruebaModuleCuatro.Contextprueba.Create','','active'),(114,'PruebaModuleCuatro.Contextprueba.Edit','','active'),(115,'PruebaModuleCuatro.Contextprueba.Delete','','active'),(116,'PruebaModuleCuatro.Content.View','','active'),(117,'PruebaModuleCuatro.Content.Create','','active'),(118,'PruebaModuleCuatro.Content.Edit','','active'),(119,'PruebaModuleCuatro.Content.Delete','','active'),(120,'PruebaModuleCuatro.Reports.View','','active'),(121,'PruebaModuleCuatro.Reports.Create','','active'),(122,'PruebaModuleCuatro.Reports.Edit','','active'),(123,'PruebaModuleCuatro.Reports.Delete','','active'),(124,'PruebaModuleCuatro.Settings.View','','active'),(125,'PruebaModuleCuatro.Settings.Create','','active'),(126,'PruebaModuleCuatro.Settings.Edit','','active'),(127,'PruebaModuleCuatro.Settings.Delete','','active'),(128,'PruebaModuleCuatro.Developer.View','','active'),(129,'PruebaModuleCuatro.Developer.Create','','active'),(130,'PruebaModuleCuatro.Developer.Edit','','active'),(131,'PruebaModuleCuatro.Developer.Delete','','active'),(132,'Noticias.Contextprueba.View','','active'),(133,'Noticias.Contextprueba.Create','','active'),(134,'Noticias.Contextprueba.Edit','','active'),(135,'Noticias.Contextprueba.Delete','','active'),(136,'Noticias.Content.View','','active'),(137,'Noticias.Content.Create','','active'),(138,'Noticias.Content.Edit','','active'),(139,'Noticias.Content.Delete','','active'),(140,'Noticias.Reports.View','','active'),(141,'Noticias.Reports.Create','','active'),(142,'Noticias.Reports.Edit','','active'),(143,'Noticias.Reports.Delete','','active'),(144,'Noticias.Settings.View','','active'),(145,'Noticias.Settings.Create','','active'),(146,'Noticias.Settings.Edit','','active'),(147,'Noticias.Settings.Delete','','active'),(148,'Noticias.Developer.View','','active'),(149,'Noticias.Developer.Create','','active'),(150,'Noticias.Developer.Edit','','active'),(151,'Noticias.Developer.Delete','','active');
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
INSERT INTO `bf_pruebamodulecuatro` VALUES (1,'<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p style=\"text-align: center;\">\r\n	<img src=\"http://2.bp.blogspot.com/_3V-cuRYgYX8/TKJTArbOeTI/AAAAAAAABvg/t7lG4k6LT1Q/s320/estres1.jpg\" /></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<br />\r\n	ENFERMEDAD LABORAL. Trabajador que padeci&oacute; un accidente cerebrovascular. ESTR&Eacute;S LABORAL. Influencia en el evento traum&aacute;tico. Valoraci&oacute;n de las posibilidades. REALIZACI&Oacute;N DE TAREAS QUE REQUER&Iacute;AN ESFUERZO Y EXIGENCIA. RESPONSABILIDAD CIVIL DE LA EMPLEADORA. Procedencia. Citaci&oacute;n de terceros. ART. Responsabilidad limitada al contrato de seguro. Procedencia. DISIDENCIA: Estr&eacute;s. Inexistencia de un factor objetivo de atribuci&oacute;n. Enfermedad resarcible en el marco de la normativa especial<br />\r\n	<br />\r\n	&nbsp;</p>\r\n<p>\r\n	&ldquo;R. J. C. c/ Sig Marine S.A. s/ accidente acci&oacute;n civil&rdquo; &ndash; CNTRAB &ndash; 09/08/2010</p>\r\n<p>\r\n	<br />\r\n	&ldquo;El experto desinsaculado en autos ha dicho que aquel factor (stress) pudo haber influido en la producci&oacute;n del evento traum&aacute;tico, y las accionadas fundan su impugnaci&oacute;n en la utilizaci&oacute;n del vocablo &ldquo;pudo&rdquo; que, seg&uacute;n su parecer, exhibir&iacute;a una imprecisi&oacute;n e insuficiencia que impedir&iacute;a relacionar causal o concausalmente la &iacute;ndole de las tareas con la afecci&oacute;n. Ahora bien, el an&aacute;lisis de las apreciaciones presentadas revela que el mismo t&eacute;rmino &ldquo;pudo&rdquo;, adquiere tambi&eacute;n una fase positiva, tal como es que el stress resulta ser una de las causas determinantes de estos padecimientos, y en el caso se advierte que, esta causa, se encontraba presente en las tareas a cargo del actor.&rdquo; (Del voto de la mayor&iacute;a)<br />\r\n	<br />\r\n	&ldquo;En efecto, los testimonios brindados por compa&ntilde;eros de trabajo, son certeros y coincidentes al relatar el esfuerzo y la exigencia de las tareas que ten&iacute;an a cargo, as&iacute; como tambi&eacute;n la presi&oacute;n que se derivaba del cumplimiento de aquellas en tiempo y forma, tal como aconteci&oacute; con la inspecci&oacute;n que iban a tener el d&iacute;a del accidente.&rdquo; (Del voto de la mayor&iacute;a)<br />\r\n	<br />\r\n	&ldquo;Corresponde compartir la decisi&oacute;n de grado, que ha entendido que la condena a la aseguradora de riesgos de trabajo responde a su estricta funci&oacute;n que es, justamente, la de responder por el evento da&ntilde;oso producido en ocasi&oacute;n del trabajo y que, decidir su eximici&oacute;n de responsabilidad ser&iacute;a admitir un enriquecimiento sin causa&hellip;Por otra parte, no es cierto que se hubiere fallado extra petita, toda vez que la citaci&oacute;n como tercero, requerida por la demandada, se fund&oacute; en la existencia de un contrato de seguro de riesgos de trabajo, que es, precisamente el que la apelante acord&oacute; con aqu&eacute;lla, y el que fue considerado como l&iacute;mite de responsabilidad de la recurrente.&rdquo; (Del voto de la mayor&iacute;a)<br />\r\n	<br />\r\n	&ldquo;El actor, sufri&oacute; un accidente cerebrovascular, afecci&oacute;n que relacion&oacute; gen&eacute;ricamente, con el &ldquo;trabajo&rdquo; y las tareas de esfuerzo y no con cosas riesgosas o viciosas de la que su empleador sea due&ntilde;o o guardi&aacute;n. A&uacute;n sin soslayar las consideraciones efectuadas por el perito m&eacute;dico en su informe, entiendo que el stress -al que el profesional dijo que dicho factor pudo haber influido en la producci&oacute;n del evento traum&aacute;tico- no constituye un factor objetivo, sino que, en su aspecto negativo, traduce el modo en que diferentes sujetos reaccionan ante est&iacute;mulos externos, generalmente en funci&oacute;n de su propia estructura de personalidad.&rdquo; (Del voto en disidencia del Dr. Morando)<br />\r\n	<br />\r\n	&ldquo;Por lo dem&aacute;s, el &ldquo;stress propio de sus tareas&rdquo; no ha sido certeramente descripto, afirmaci&oacute;n gen&eacute;rica que por insuficiente impide determinar la vinculaci&oacute;n que se persigue. Igualmente, si bien las situaciones de stress pueden relacionarse con accesos de hipertensi&oacute;n, ello no equivale a afirmar que son aptas para generarlos, esto es que constituyen causas adecuadas de la enfermedad, antecedente l&oacute;gico y jur&iacute;dico imprescindible para su admisi&oacute;n como causas relevantes (art&iacute;culos 901/906 del C&oacute;digo Civil).&rdquo; (Del voto en disidencia del Dr. Morando)<br />\r\n	<br />\r\n	&ldquo;En reiteradas oportunidades he se&ntilde;alado que el stress no es, en s&iacute; mismo, una enfermedad. Se trata de un s&iacute;ndrome general de adaptaci&oacute;n que es manifestado por el organismo cuando responde a ciertas variaciones del entorno. En la medida en que la vida misma es un proceso de adaptaci&oacute;n permanente, con el objeto de mantener el equilibrio din&aacute;mico dentro de un marco que permita la continuidad funcional del sistema viviente, el estr&eacute;s se halla en cualquiera de los actos que componen la vida y s&oacute;lo se detiene con la muerte. Desde luego, la necesidad de adaptarse a cambios dr&aacute;sticos o de superar dificultades graves provoca una mayor tensi&oacute;n capaz de desencadenar o agravar diversas patolog&iacute;as.&rdquo; (Del voto en disidencia del Dr. Morando)<br />\r\n	<br />\r\n	&ldquo;Lo que el pretensor ha descripto es una enfermedad que, en el caso de resultar resarcible, s&oacute;lo hubiera sido en el marco de la legislaci&oacute;n especial, del tipo de leyes de accidentes de trabajo 9688, 24.028 y 24.557, no, en la normativa civil, ya que no encuadra en ninguno de los supuestos regulados por el Libro II, Secci&oacute;n Segunda.&rdquo; (Del voto en disidencia del Dr. Morando)<br />\r\n	&nbsp;</p>\r\n<p>\r\n	Citar:&nbsp;[elDial.com - AA6357]</p>\r\n<p>\r\n	&nbsp;</p>\r\n');
/*!40000 ALTER TABLE `bf_pruebamodulecuatro` ENABLE KEYS */;
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
INSERT INTO `bf_role_permissions` VALUES (1,2),(1,3),(1,4),(1,5),(1,6),(1,7),(1,8),(1,9),(1,10),(1,11),(1,12),(1,13),(1,14),(1,15),(1,16),(1,17),(1,18),(1,19),(1,20),(1,21),(1,22),(1,24),(1,25),(1,27),(1,28),(1,29),(1,30),(1,31),(1,32),(1,33),(1,34),(1,35),(1,36),(1,37),(1,38),(1,39),(1,40),(1,41),(1,42),(1,43),(1,44),(1,45),(1,46),(1,47),(1,48),(1,49),(1,50),(1,51),(1,112),(1,113),(1,114),(1,115),(1,116),(1,117),(1,118),(1,119),(1,120),(1,121),(1,122),(1,123),(1,124),(1,125),(1,126),(1,127),(1,128),(1,129),(1,130),(1,131),(1,132),(1,133),(1,134),(1,135),(1,136),(1,137),(1,138),(1,139),(1,140),(1,141),(1,142),(1,143),(1,144),(1,145),(1,146),(1,147),(1,148),(1,149),(1,150),(1,151),(2,2),(2,3),(4,51),(6,2),(6,3),(6,4),(6,5),(6,6),(6,7),(6,8),(6,9),(6,10),(6,11),(6,12),(6,13),(6,49);
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
INSERT INTO `bf_schema_version` VALUES ('app_',0),('core',35),('noticias_',2),('pruebamodulecuatro_',2);
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
INSERT INTO `bf_users` VALUES (1,1,'hortelanobruno@gmail.com','hortelanobruno','d0b1fe8480628dadee7d934ada5c69675ded3449',NULL,'xXs3cNj','2012-12-05 17:23:13','127.0.0.1','0000-00-00 00:00:00',0,0,NULL,NULL,'',NULL,'UM3','english',1,'');
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

-- Dump completed on 2012-12-05 13:50:24
