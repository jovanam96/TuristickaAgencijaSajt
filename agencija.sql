/*
SQLyog Community v12.5.0 (64 bit)
MySQL - 10.1.28-MariaDB : Database - agencija
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`agencija` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `agencija`;

/*Table structure for table `drzava` */

DROP TABLE IF EXISTS `drzava`;

CREATE TABLE `drzava` (
  `drzavaid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nazivdrzave` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gradid` int(11) unsigned NOT NULL,
  PRIMARY KEY (`drzavaid`),
  KEY `gradid` (`gradid`),
  CONSTRAINT `drzava_ibfk_1` FOREIGN KEY (`gradid`) REFERENCES `grad` (`gradid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `drzava` */

/*Table structure for table `grad` */

DROP TABLE IF EXISTS `grad`;

CREATE TABLE `grad` (
  `gradid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nazivgrada` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `drzavaid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`gradid`),
  KEY `drzavaid` (`drzavaid`),
  CONSTRAINT `grad_ibfk_1` FOREIGN KEY (`drzavaid`) REFERENCES `drzava` (`drzavaid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `grad` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
