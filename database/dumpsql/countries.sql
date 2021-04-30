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

 Date: 03/08/2019 01:45:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for countries
-- ----------------------------
DROP TABLE IF EXISTS `countries`;
CREATE TABLE `countries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of countries
-- ----------------------------
BEGIN;
INSERT INTO `countries` VALUES (1, 'AF', 'Afghanistan', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (2, 'AL', 'Albania', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (3, 'DZ', 'Algeria', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (4, 'DS', 'American Samoa', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (5, 'AD', 'Andorra', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (6, 'AO', 'Angola', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (7, 'AI', 'Anguilla', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (8, 'AQ', 'Antarctica', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (9, 'AG', 'Antigua and Barbuda', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (10, 'AR', 'Argentina', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (11, 'AM', 'Armenia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (12, 'AW', 'Aruba', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (13, 'AU', 'Australia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (14, 'AT', 'Austria', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (15, 'AZ', 'Azerbaijan', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (16, 'BS', 'Bahamas', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (17, 'BH', 'Bahrain', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (18, 'BD', 'Bangladesh', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (19, 'BB', 'Barbados', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (20, 'BY', 'Belarus', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (21, 'BE', 'Belgium', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (22, 'BZ', 'Belize', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (23, 'BJ', 'Benin', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (24, 'BM', 'Bermuda', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (25, 'BT', 'Bhutan', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (26, 'BO', 'Bolivia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (27, 'BA', 'Bosnia and Herzegovina', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (28, 'BW', 'Botswana', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (29, 'BV', 'Bouvet Island', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (30, 'BR', 'Brazil', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (31, 'IO', 'British Indian Ocean Territory', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (32, 'BN', 'Brunei Darussalam', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (33, 'BG', 'Bulgaria', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (34, 'BF', 'Burkina Faso', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (35, 'BI', 'Burundi', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (36, 'KH', 'Cambodia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (37, 'CM', 'Cameroon', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (38, 'CA', 'Canada', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (39, 'CV', 'Cape Verde', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (40, 'KY', 'Cayman Islands', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (41, 'CF', 'Central African Republic', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (42, 'TD', 'Chad', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (43, 'CL', 'Chile', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (44, 'CN', 'China', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (45, 'CX', 'Christmas Island', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (46, 'CC', 'Cocos (Keeling) Islands', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (47, 'CO', 'Colombia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (48, 'KM', 'Comoros', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (49, 'CD', 'Democratic Republic of the Congo', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (50, 'CG', 'Republic of Congo', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (51, 'CK', 'Cook Islands', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (52, 'CR', 'Costa Rica', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (53, 'HR', 'Croatia (Hrvatska)', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (54, 'CU', 'Cuba', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (55, 'CY', 'Cyprus', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (56, 'CZ', 'Czech Republic', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (57, 'DK', 'Denmark', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (58, 'DJ', 'Djibouti', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (59, 'DM', 'Dominica', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (60, 'DO', 'Dominican Republic', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (61, 'TP', 'East Timor', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (62, 'EC', 'Ecuador', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (63, 'EG', 'Egypt', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (64, 'SV', 'El Salvador', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (65, 'GQ', 'Equatorial Guinea', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (66, 'ER', 'Eritrea', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (67, 'EE', 'Estonia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (68, 'ET', 'Ethiopia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (69, 'FK', 'Falkland Islands (Malvinas)', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (70, 'FO', 'Faroe Islands', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (71, 'FJ', 'Fiji', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (72, 'FI', 'Finland', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (73, 'FR', 'France', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (74, 'FX', 'France, Metropolitan', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (75, 'GF', 'French Guiana', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (76, 'PF', 'French Polynesia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (77, 'TF', 'French Southern Territories', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (78, 'GA', 'Gabon', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (79, 'GM', 'Gambia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (80, 'GE', 'Georgia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (81, 'DE', 'Germany', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (82, 'GH', 'Ghana', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (83, 'GI', 'Gibraltar', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (84, 'GK', 'Guernsey', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (85, 'GR', 'Greece', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (86, 'GL', 'Greenland', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (87, 'GD', 'Grenada', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (88, 'GP', 'Guadeloupe', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (89, 'GU', 'Guam', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (90, 'GT', 'Guatemala', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (91, 'GN', 'Guinea', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (92, 'GW', 'Guinea-Bissau', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (93, 'GY', 'Guyana', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (94, 'HT', 'Haiti', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (95, 'HM', 'Heard and Mc Donald Islands', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (96, 'HN', 'Honduras', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (97, 'HK', 'Hong Kong', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (98, 'HU', 'Hungary', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (99, 'IS', 'Iceland', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (100, 'IN', 'India', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (101, 'IM', 'Isle of Man', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (102, 'ID', 'Indonesia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (103, 'IR', 'Iran (Islamic Republic of)', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (104, 'IQ', 'Iraq', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (105, 'IE', 'Ireland', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (106, 'IL', 'Israel', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (107, 'IT', 'Italy', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (108, 'CI', 'Ivory Coast', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (109, 'JE', 'Jersey', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (110, 'JM', 'Jamaica', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (111, 'JP', 'Japan', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (112, 'JO', 'Jordan', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (113, 'KZ', 'Kazakhstan', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (114, 'KE', 'Kenya', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (115, 'KI', 'Kiribati', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (116, 'KP', 'Korea, Democratic People\'s Republic of', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (117, 'KR', 'Korea, Republic of', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (118, 'XK', 'Kosovo', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (119, 'KW', 'Kuwait', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (120, 'KG', 'Kyrgyzstan', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (121, 'LA', 'Lao People\'s Democratic Republic', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (122, 'LV', 'Latvia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (123, 'LB', 'Lebanon', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (124, 'LS', 'Lesotho', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (125, 'LR', 'Liberia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (126, 'LY', 'Libyan Arab Jamahiriya', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (127, 'LI', 'Liechtenstein', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (128, 'LT', 'Lithuania', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (129, 'LU', 'Luxembourg', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (130, 'MO', 'Macau', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (131, 'MK', 'North Macedonia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (132, 'MG', 'Madagascar', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (133, 'MW', 'Malawi', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (134, 'MY', 'Malaysia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (135, 'MV', 'Maldives', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (136, 'ML', 'Mali', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (137, 'MT', 'Malta', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (138, 'MH', 'Marshall Islands', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (139, 'MQ', 'Martinique', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (140, 'MR', 'Mauritania', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (141, 'MU', 'Mauritius', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (142, 'TY', 'Mayotte', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (143, 'MX', 'Mexico', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (144, 'FM', 'Micronesia, Federated States of', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (145, 'MD', 'Moldova, Republic of', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (146, 'MC', 'Monaco', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (147, 'MN', 'Mongolia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (148, 'ME', 'Montenegro', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (149, 'MS', 'Montserrat', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (150, 'MA', 'Morocco', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (151, 'MZ', 'Mozambique', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (152, 'MM', 'Myanmar', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (153, 'NA', 'Namibia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (154, 'NR', 'Nauru', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (155, 'NP', 'Nepal', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (156, 'NL', 'Netherlands', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (157, 'AN', 'Netherlands Antilles', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (158, 'NC', 'New Caledonia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (159, 'NZ', 'New Zealand', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (160, 'NI', 'Nicaragua', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (161, 'NE', 'Niger', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (162, 'NG', 'Nigeria', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (163, 'NU', 'Niue', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (164, 'NF', 'Norfolk Island', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (165, 'MP', 'Northern Mariana Islands', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (166, 'NO', 'Norway', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (167, 'OM', 'Oman', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (168, 'PK', 'Pakistan', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (169, 'PW', 'Palau', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (170, 'PS', 'Palestine', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (171, 'PA', 'Panama', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (172, 'PG', 'Papua New Guinea', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (173, 'PY', 'Paraguay', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (174, 'PE', 'Peru', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (175, 'PH', 'Philippines', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (176, 'PN', 'Pitcairn', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (177, 'PL', 'Poland', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (178, 'PT', 'Portugal', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (179, 'PR', 'Puerto Rico', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (180, 'QA', 'Qatar', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (181, 'RE', 'Reunion', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (182, 'RO', 'Romania', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (183, 'RU', 'Russian Federation', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (184, 'RW', 'Rwanda', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (185, 'KN', 'Saint Kitts and Nevis', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (186, 'LC', 'Saint Lucia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (187, 'VC', 'Saint Vincent and the Grenadines', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (188, 'WS', 'Samoa', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (189, 'SM', 'San Marino', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (190, 'ST', 'Sao Tome and Principe', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (191, 'SA', 'Saudi Arabia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (192, 'SN', 'Senegal', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (193, 'RS', 'Serbia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (194, 'SC', 'Seychelles', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (195, 'SL', 'Sierra Leone', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (196, 'SG', 'Singapore', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (197, 'SK', 'Slovakia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (198, 'SI', 'Slovenia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (199, 'SB', 'Solomon Islands', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (200, 'SO', 'Somalia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (201, 'ZA', 'South Africa', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (202, 'GS', 'South Georgia South Sandwich Islands', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (203, 'SS', 'South Sudan', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (204, 'ES', 'Spain', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (205, 'LK', 'Sri Lanka', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (206, 'SH', 'St. Helena', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (207, 'PM', 'St. Pierre and Miquelon', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (208, 'SD', 'Sudan', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (209, 'SR', 'Suriname', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (210, 'SJ', 'Svalbard and Jan Mayen Islands', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (211, 'SZ', 'Swaziland', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (212, 'SE', 'Sweden', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (213, 'CH', 'Switzerland', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (214, 'SY', 'Syrian Arab Republic', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (215, 'TW', 'Taiwan', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (216, 'TJ', 'Tajikistan', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (217, 'TZ', 'Tanzania, United Republic of', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (218, 'TH', 'Thailand', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (219, 'TG', 'Togo', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (220, 'TK', 'Tokelau', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (221, 'TO', 'Tonga', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (222, 'TT', 'Trinidad and Tobago', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (223, 'TN', 'Tunisia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (224, 'TR', 'Turkey', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (225, 'TM', 'Turkmenistan', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (226, 'TC', 'Turks and Caicos Islands', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (227, 'TV', 'Tuvalu', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (228, 'UG', 'Uganda', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (229, 'UA', 'Ukraine', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (230, 'AE', 'United Arab Emirates', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (231, 'GB', 'United Kingdom', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (232, 'US', 'United States', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (233, 'UM', 'United States minor outlying islands', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (234, 'UY', 'Uruguay', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (235, 'UZ', 'Uzbekistan', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (236, 'VU', 'Vanuatu', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (237, 'VA', 'Vatican City State', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (238, 'VE', 'Venezuela', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (239, 'VN', 'Vietnam', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (240, 'VG', 'Virgin Islands (British)', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (241, 'VI', 'Virgin Islands (U.S.)', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (242, 'WF', 'Wallis and Futuna Islands', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (243, 'EH', 'Western Sahara', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (244, 'YE', 'Yemen', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (245, 'ZM', 'Zambia', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
INSERT INTO `countries` VALUES (246, 'ZW', 'Zimbabwe', '2019-08-02 23:47:38', '2019-08-02 23:47:38');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
