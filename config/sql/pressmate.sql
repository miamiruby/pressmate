-- MySQL dump 10.11
--
-- Host: localhost    Database: pressmate
-- ------------------------------------------------------
-- Server version	5.0.67
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO,MYSQL40' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `acos`
--

DROP TABLE IF EXISTS `acos`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `acos` (
  `id` int(10) NOT NULL auto_increment,
  `parent_id` int(10) default NULL,
  `model` varchar(255) default NULL,
  `foreign_key` int(10) default NULL,
  `alias` varchar(255) default NULL,
  `lft` int(10) default NULL,
  `rght` int(10) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `aros`
--

DROP TABLE IF EXISTS `aros`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `aros` (
  `id` int(10) NOT NULL auto_increment,
  `parent_id` int(10) default NULL,
  `model` varchar(255) default NULL,
  `foreign_key` int(10) default NULL,
  `alias` varchar(255) default NULL,
  `lft` int(10) default NULL,
  `rght` int(10) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=42;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `aros_acos`
--

DROP TABLE IF EXISTS `aros_acos`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `aros_acos` (
  `id` int(10) NOT NULL auto_increment,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL default '0',
  `_read` varchar(2) NOT NULL default '0',
  `_update` varchar(2) NOT NULL default '0',
  `_delete` varchar(2) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) TYPE=MyISAM;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(200) default NULL,
  `lft` int(11) default NULL,
  `rght` int(11) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `categories_contents`
--

DROP TABLE IF EXISTS `categories_contents`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `categories_contents` (
  `id` int(11) NOT NULL auto_increment,
  `content_id` int(11) default NULL,
  `category_id` int(11) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=30;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL auto_increment,
  `body` text,
  `email` varchar(200) default NULL,
  `name` varchar(200) default NULL,
  `content_id` int(11) default NULL,
  `url` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=4;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `configs`
--

DROP TABLE IF EXISTS `configs`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `configs` (
  `id` int(11) NOT NULL auto_increment,
  `site_name` varchar(200) default NULL,
  `avatar_url` varchar(200) default NULL,
  `google_analytics` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=11;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `contents`
--

DROP TABLE IF EXISTS `contents`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `contents` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(200) default NULL,
  `body` text,
  `status_id` int(1) default NULL,
  `user_id` int(11) default NULL,
  `created` datetime default NULL,
  `updated` datetime default NULL,
  `slug` varchar(200) default NULL,
  `commentable` int(11) default NULL,
  `redirect_code` int(3) default NULL,
  `redirecet_url` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=31;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `links` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) default NULL,
  `url` varchar(200) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=5;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `statuses`
--

DROP TABLE IF EXISTS `statuses`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `statuses` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=4;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(50) default NULL,
  `password` varchar(50) default NULL,
  `first_name` varchar(100) default NULL,
  `last_name` varchar(100) default NULL,
  `email` varchar(200) default NULL,
  `avatar_url` varchar(200) default NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `uk_username` (`username`),
  UNIQUE KEY `uk_email` (`email`)
) TYPE=MyISAM AUTO_INCREMENT=43;
SET character_set_client = @saved_cs_client;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2008-12-14 19:01:05
