/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50523
Source Host           : localhost:3306
Source Database       : pabackend

Target Server Type    : MYSQL
Target Server Version : 50523
File Encoding         : 65001

Date: 2013-09-27 10:12:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cia_email
-- ----------------------------
DROP TABLE IF EXISTS `cia_email`;
CREATE TABLE `cia_email` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `email` varchar(128) NOT NULL DEFAULT '' COMMENT 'Email目的地址',
  `subject` varchar(128) NOT NULL DEFAULT '' COMMENT 'Email标题',
  `message` text COMMENT 'Email正文',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Email发送状态',
  `errcode` text NOT NULL COMMENT 'Email调试代码',
  `created` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cia_email
-- ----------------------------

-- ----------------------------
-- Table structure for cia_log
-- ----------------------------
DROP TABLE IF EXISTS `cia_log`;
CREATE TABLE `cia_log` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned DEFAULT '0',
  `method` varchar(64) NOT NULL DEFAULT '',
  `operate` varchar(255) NOT NULL DEFAULT '',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `debug_info` text,
  `created` int(10) unsigned NOT NULL DEFAULT '0',
  `ip_address` varchar(15) NOT NULL DEFAULT '0.0.0.0',
  PRIMARY KEY (`id`),
  KEY `uid` (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cia_log
-- ----------------------------

-- ----------------------------
-- Table structure for cia_member
-- ----------------------------
DROP TABLE IF EXISTS `cia_member`;
CREATE TABLE `cia_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `salt` varchar(6) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `realname` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `identity` enum('user','agent','superman') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'user',
  `status` enum('-1.suspend','0.standby','1.email_confirmed','2.admin_confirmed','9.active') CHARACTER SET utf8 NOT NULL DEFAULT '0.standby',
  `areaid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '区域ID',
  `group` tinyint(4) NOT NULL DEFAULT '0',
  `avatar` varchar(128) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'noavatar',
  `fc_color` varchar(7) COLLATE utf8_unicode_ci NOT NULL DEFAULT '#6d84b4',
  `login_ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.0.0.0',
  `login_time` int(10) unsigned NOT NULL DEFAULT '0',
  `login_count` smallint(5) unsigned NOT NULL DEFAULT '0',
  `reg_ip` varchar(15) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0.0.0.0',
  `reg_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`) USING BTREE,
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cia_member
-- ----------------------------
INSERT INTO `cia_member` VALUES ('1', 'admin', 'ba0a31167f4fe73570367eb9ca9cf6cd', 'IGdcUY', '系统管理员', 'admin@admin.com', 'superman', '9.active', '13', '0', '133a87a6a1b82b5436b7bebe10e67ab5', '#6d84b4', '127.0.0.1', '1380179835', '6', '127.0.0.1', '1379657287');
