-- MySQL dump 10.13  Distrib 5.5.36, for Linux (x86_64)
--
-- Host: localhost    Database: log
-- ------------------------------------------------------
-- Server version	5.5.36

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
-- Table structure for table `dungeonHistoryLog`
--

use log;

CREATE TABLE `userApplyLog` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT COMMENT 'シーケンス番号',
  `uid` bigint NOT NULL COMMENT 'ユーザーID',
  `lot_id` int(11) NOT NULL DEFAULT '0' COMMENT '抽選種類のID',
  `user_apply_id` int(10) unsigned NOT NULL COMMENT '応募のID',
  `pointid` int(10) unsigned NOT NULL COMMENT 'ポイントID',
  `point` int(10) unsigned NOT NULL COMMENT 'ポイント',
  `createtime` datetime NOT NULL COMMENT '作成日',
  PRIMARY KEY ( `id` , `createtime` ),
  KEY `index1` ( `uid`, `lot_id` )
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

