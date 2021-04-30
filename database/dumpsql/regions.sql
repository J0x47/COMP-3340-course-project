/*
 Navicat Premium Data Transfer

 Source Server         : local_mysql
 Source Server Type    : MySQL
 Source Server Version : 50620
 Source Host           : localhost:3306
 Source Schema         : laravel_course_job

 Target Server Type    : MySQL
 Target Server Version : 50620
 File Encoding         : 65001

 Date: 03/08/2019 01:46:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for regions
-- ----------------------------
DROP TABLE IF EXISTS `regions`;
CREATE TABLE `regions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=126 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of regions
-- ----------------------------
BEGIN;
INSERT INTO `regions` VALUES (113, 38, 'Ontario', 'ON', '2019-08-03 00:20:22', '2019-08-03 00:20:22');
INSERT INTO `regions` VALUES (114, 38, 'Alberta', 'AB', '2019-08-03 00:20:22', '2019-08-03 00:20:22');
INSERT INTO `regions` VALUES (115, 38, 'British Columbia', 'BC', '2019-08-03 00:20:22', '2019-08-03 00:20:22');
INSERT INTO `regions` VALUES (116, 38, 'Manitoba ', 'MB', '2019-08-03 00:20:22', '2019-08-03 00:20:22');
INSERT INTO `regions` VALUES (117, 38, 'New Brunswick', 'NB', '2019-08-03 00:20:22', '2019-08-03 00:20:22');
INSERT INTO `regions` VALUES (118, 38, 'Newfoundland and Labrador', 'NL', '2019-08-03 00:20:22', '2019-08-03 00:20:22');
INSERT INTO `regions` VALUES (119, 38, 'Yukon', 'YT', '2019-08-03 00:20:22', '2019-08-03 00:20:22');
INSERT INTO `regions` VALUES (120, 38, 'Saskatchewan', 'SK', '2019-08-03 00:20:22', '2019-08-03 00:20:22');
INSERT INTO `regions` VALUES (121, 38, 'Québec', 'QC', '2019-08-03 00:20:22', '2019-08-03 00:20:22');
INSERT INTO `regions` VALUES (122, 38, 'Prince Edward Island', 'PE', '2019-08-03 00:20:22', '2019-08-03 00:20:22');
INSERT INTO `regions` VALUES (123, 38, 'Nunavut', 'NU', '2019-08-03 00:20:22', '2019-08-03 00:20:22');
INSERT INTO `regions` VALUES (124, 38, 'Nova Scotia', 'NS', '2019-08-03 00:20:22', '2019-08-03 00:20:22');
INSERT INTO `regions` VALUES (125, 38, 'Northwest Territories', 'NT', '2019-08-03 00:20:22', '2019-08-03 00:20:22');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
