/*
Navicat MySQL Data Transfer

Source Server         : ./localhost
Source Server Version : 50626
Source Host           : localhost:3306
Source Database       : uas_eksekutif

Target Server Type    : MYSQL
Target Server Version : 50626
File Encoding         : 65001

Date: 2020-05-01 21:37:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `giat`
-- ----------------------------
DROP TABLE IF EXISTS `giat`;
CREATE TABLE `giat` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `kode_tanggal` int(8) NOT NULL,
  `tanggal` date NOT NULL,
  `kegiatan` varchar(255) NOT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of giat
-- ----------------------------
INSERT INTO `giat` VALUES ('1', '20200501', '2020-05-01', 'Awal Bulan', null);
INSERT INTO `giat` VALUES ('2', '20200502', '2020-05-02', 'Hari Pendidikan Nasional', null);
INSERT INTO `giat` VALUES ('3', '0', '2020-05-02', 'asd', '');
INSERT INTO `giat` VALUES ('4', '0', '2020-05-02', 'Hari guru', '');
INSERT INTO `giat` VALUES ('5', '0', '2020-05-02', 'Hari guru', '');
INSERT INTO `giat` VALUES ('6', '0', '2020-05-02', 'Hari guru', 'C:/xampp/htdocs/calender/upload/');
INSERT INTO `giat` VALUES ('7', '0', '2020-05-02', 'Hari guru', 'C:/xampp/htdocs/calender/upload/WhatsApp_Image_2020-04-27_at_20.45.215.jpeg');
