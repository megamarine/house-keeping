/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : db_hk

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 20/10/2023 15:45:21
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_master_bagian
-- ----------------------------
DROP TABLE IF EXISTS `tbl_master_bagian`;
CREATE TABLE `tbl_master_bagian`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_bagian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `devisi_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 118 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_master_bagian
-- ----------------------------
INSERT INTO `tbl_master_bagian` VALUES (1, 'GA - GA', 4);
INSERT INTO `tbl_master_bagian` VALUES (2, 'GA - VEHICLE', 4);
INSERT INTO `tbl_master_bagian` VALUES (3, 'HRM - PAYROLL', 4);
INSERT INTO `tbl_master_bagian` VALUES (4, 'GA - HK', 4);
INSERT INTO `tbl_master_bagian` VALUES (5, 'HSE - ENVIRONMENT', 4);
INSERT INTO `tbl_master_bagian` VALUES (6, 'HRM - RECRUITMENT', 4);
INSERT INTO `tbl_master_bagian` VALUES (7, 'GA', 4);
INSERT INTO `tbl_master_bagian` VALUES (8, 'HRM - PEOPLE DEVELOPMENT', 4);
INSERT INTO `tbl_master_bagian` VALUES (9, 'HRM', 4);
INSERT INTO `tbl_master_bagian` VALUES (10, 'HSE - HEALTH AND SAFETY', 4);
INSERT INTO `tbl_master_bagian` VALUES (11, 'HSE', 4);
INSERT INTO `tbl_master_bagian` VALUES (12, 'HRM - IR', 4);
INSERT INTO `tbl_master_bagian` VALUES (13, 'IT', 1);
INSERT INTO `tbl_master_bagian` VALUES (14, 'IT - HARDWARE / NETWORKING', 1);
INSERT INTO `tbl_master_bagian` VALUES (15, 'IT- IT DOCUMENTATION & WAREHOUSE', 1);
INSERT INTO `tbl_master_bagian` VALUES (16, 'IT - SOFTWARE', 1);
INSERT INTO `tbl_master_bagian` VALUES (17, 'MARKETING - EXPORT', 9);
INSERT INTO `tbl_master_bagian` VALUES (18, 'MARKETING - LOCAL', 9);
INSERT INTO `tbl_master_bagian` VALUES (19, 'MARKETING - EXPORT - COMMODITY PRODUCT', 9);
INSERT INTO `tbl_master_bagian` VALUES (20, 'MARKETING - EXPORT - JAPAN PRODUCT', 9);
INSERT INTO `tbl_master_bagian` VALUES (21, 'WAREHOUSE', 5);
INSERT INTO `tbl_master_bagian` VALUES (22, 'PPIC', 5);
INSERT INTO `tbl_master_bagian` VALUES (23, 'ENGINEERING - WELDING & STEEL CONSTRUCTION', 5);
INSERT INTO `tbl_master_bagian` VALUES (24, 'ENGINEERING - ELECTRICAL', 5);
INSERT INTO `tbl_master_bagian` VALUES (25, 'ENGINEERING - MECHANICAL', 5);
INSERT INTO `tbl_master_bagian` VALUES (26, 'CIVIL ENGINEERING', 5);
INSERT INTO `tbl_master_bagian` VALUES (27, 'ENGINEERING - REFRIGATION SYSTEM', 5);
INSERT INTO `tbl_master_bagian` VALUES (28, 'COLD STORAGE', 5);
INSERT INTO `tbl_master_bagian` VALUES (29, 'ENGINEERING - WTP AND BOILER', 5);
INSERT INTO `tbl_master_bagian` VALUES (30, 'ENGINEERING', 5);
INSERT INTO `tbl_master_bagian` VALUES (31, 'PPIC - FINISH PRODUCT DOCUMENTATION', 5);
INSERT INTO `tbl_master_bagian` VALUES (32, 'PPIC - JAPAN PRODUCT', 5);
INSERT INTO `tbl_master_bagian` VALUES (33, 'PPIC - IC PACKAGING & INGREDIENTS FOR CMMDTY PRDCT', 5);
INSERT INTO `tbl_master_bagian` VALUES (34, 'PPIC - INVENTORY CONTROL OF FINISH PRODUCT', 5);
INSERT INTO `tbl_master_bagian` VALUES (35, 'WAREHOUSE - WAREHOUSE A/B/C', 5);
INSERT INTO `tbl_master_bagian` VALUES (36, 'PPIC - RAW COMMODITY PRODUCT', 5);
INSERT INTO `tbl_master_bagian` VALUES (37, 'PPIC - COOKED COMMODITY PRODUCT', 5);
INSERT INTO `tbl_master_bagian` VALUES (38, 'PPIC - CUSTOM PROCESS PRODUCT', 5);
INSERT INTO `tbl_master_bagian` VALUES (39, 'PPIC - IC PACKAGING & INGREDIENTS FOR JAPAN PRDCT', 5);
INSERT INTO `tbl_master_bagian` VALUES (40, 'SHRIMP LOW RISK - DEHEADING (A)', 2);
INSERT INTO `tbl_master_bagian` VALUES (41, 'SHRIMP HIGH RISK - CIS (A)', 2);
INSERT INTO `tbl_master_bagian` VALUES (42, 'SHRIMP LOW RISK - RECEIVING (A)', 2);
INSERT INTO `tbl_master_bagian` VALUES (43, 'SHRIMP LOW RISK - RECEIVING (B)', 2);
INSERT INTO `tbl_master_bagian` VALUES (44, 'SHRIMP HIGH RISK', 2);
INSERT INTO `tbl_master_bagian` VALUES (45, 'CUSTOM PROCESS - RM PREP & PEELING SHRIMP CSTM (B)', 2);
INSERT INTO `tbl_master_bagian` VALUES (46, 'SHRIMP LOW RISK - BELLY & STRETCHING', 2);
INSERT INTO `tbl_master_bagian` VALUES (47, 'SHRIMP LOW RISK - SOAKING (A) LINE 1', 2);
INSERT INTO `tbl_master_bagian` VALUES (48, 'CUSTOM PROCESS - SHRIMP CUSTOM LAYERING (A)', 2);
INSERT INTO `tbl_master_bagian` VALUES (49, 'SHRIMP HIGH RISK - CIS (B)', 2);
INSERT INTO `tbl_master_bagian` VALUES (50, 'SHRIMP LOW RISK - RAW PEEL (A) LINE 2', 2);
INSERT INTO `tbl_master_bagian` VALUES (51, 'CUSTOM PROCESS - CRAB BARASHI', 2);
INSERT INTO `tbl_master_bagian` VALUES (52, 'SHRIMP LOW RISK - RAW PEEL (A) LINE 1', 2);
INSERT INTO `tbl_master_bagian` VALUES (53, 'SHRIMP LOW RISK - RAW PEEL (B) LINE 2', 2);
INSERT INTO `tbl_master_bagian` VALUES (54, 'CUSTOM PROCESS - DARKROOM / MEAT & HIRARKI PRODUCT', 2);
INSERT INTO `tbl_master_bagian` VALUES (55, 'SHRIMP LOW RISK - GRADING (B)', 2);
INSERT INTO `tbl_master_bagian` VALUES (56, 'SHRIMP LOW RISK - GRADING (A)', 2);
INSERT INTO `tbl_master_bagian` VALUES (57, 'SHRIMP LOW RISK - SIZING (B)', 2);
INSERT INTO `tbl_master_bagian` VALUES (58, 'CUSTOM PROCESS - CRAB FINISH PRODUCT (A)', 2);
INSERT INTO `tbl_master_bagian` VALUES (59, 'SANITATION & ADMINISTRATION - PRODUCTION ADM', 2);
INSERT INTO `tbl_master_bagian` VALUES (60, 'SHRIMP LOW RISK', 2);
INSERT INTO `tbl_master_bagian` VALUES (61, 'SHRIMP HIGH RISK - COOKED FREEZING (B)', 2);
INSERT INTO `tbl_master_bagian` VALUES (62, 'SHRIMP HIGH RISK - COOKED FREEZING (A)', 2);
INSERT INTO `tbl_master_bagian` VALUES (63, 'SHRIMP LOW RISK - SIZING (A)', 2);
INSERT INTO `tbl_master_bagian` VALUES (64, 'SHRIMP LOW RISK - RAW PEEL (B) LINE 1', 2);
INSERT INTO `tbl_master_bagian` VALUES (65, 'SHRIMP LOW RISK - SOAKING (B) LINE 1', 2);
INSERT INTO `tbl_master_bagian` VALUES (66, 'SHRIMP LOW RISK - NE PACKING (A)', 2);
INSERT INTO `tbl_master_bagian` VALUES (67, 'SHRIMP LOW RISK - PEELING NE', 2);
INSERT INTO `tbl_master_bagian` VALUES (68, 'SANITATION & ADMINISTRATION - SANITATION', 2);
INSERT INTO `tbl_master_bagian` VALUES (69, 'CUSTOM PROCESS', 2);
INSERT INTO `tbl_master_bagian` VALUES (70, 'SHRIMP HIGH RISK - BOIL (A)', 2);
INSERT INTO `tbl_master_bagian` VALUES (71, 'SHRIMP LOW RISK -  TIMBANG PDP', 2);
INSERT INTO `tbl_master_bagian` VALUES (72, 'CUSTOM PROCESS - SHRIMP CSTM FREEZING & PCKNG (A)', 2);
INSERT INTO `tbl_master_bagian` VALUES (73, 'SHRIMP HIGH RISK - COOKED PACKING (A)', 2);
INSERT INTO `tbl_master_bagian` VALUES (74, 'SHRIMP HIGH RISK - SHRIMP RING', 2);
INSERT INTO `tbl_master_bagian` VALUES (75, 'SHRIMP LOW RISK - SOAKING NE', 2);
INSERT INTO `tbl_master_bagian` VALUES (76, 'SHRIMP LOW RISK - RAW FREEZING COMMODITY PRODUCT', 2);
INSERT INTO `tbl_master_bagian` VALUES (77, 'SHRIMP LOW RISK - RAW FREEZING JAPAN PRODUCT', 2);
INSERT INTO `tbl_master_bagian` VALUES (78, 'SHRIMP LOW RISK - DEHEADING (B)', 2);
INSERT INTO `tbl_master_bagian` VALUES (79, 'CUSTOM PROCESS - CRAB PEELING', 2);
INSERT INTO `tbl_master_bagian` VALUES (80, 'SANITATION & ADMINISTRATION - REPAIR', 2);
INSERT INTO `tbl_master_bagian` VALUES (81, 'SHRIMP HIGH RISK - BOIL (B)', 2);
INSERT INTO `tbl_master_bagian` VALUES (82, 'SHRIMP LOW RISK - SOAKING (A) LINE 2', 2);
INSERT INTO `tbl_master_bagian` VALUES (83, 'CUSTOM PROCESS - SHRIMP CUSTOM LAYERING (B)', 2);
INSERT INTO `tbl_master_bagian` VALUES (84, 'CUSTOM PROCESS - RM PREP & PEELING SHRIMP CSTM (A)', 2);
INSERT INTO `tbl_master_bagian` VALUES (85, 'LABORATORY', 3);
INSERT INTO `tbl_master_bagian` VALUES (86, 'QA', 3);
INSERT INTO `tbl_master_bagian` VALUES (87, 'QC - QC FP RAW COMMODITY PRODUCT (A)', 3);
INSERT INTO `tbl_master_bagian` VALUES (88, 'LABORATORY - PREPARATION SMPLE, MEDIA & EQUIPMENT', 3);
INSERT INTO `tbl_master_bagian` VALUES (89, 'RND - PRODUCT SAMPLE FOR CUSTOMER', 3);
INSERT INTO `tbl_master_bagian` VALUES (90, 'QC - QC CS & INSPECTION', 3);
INSERT INTO `tbl_master_bagian` VALUES (91, 'QC', 3);
INSERT INTO `tbl_master_bagian` VALUES (92, 'QA - PRODUCT SPEC', 3);
INSERT INTO `tbl_master_bagian` VALUES (93, 'QC - QC COOKED COMMODITY PRODUCT', 3);
INSERT INTO `tbl_master_bagian` VALUES (94, 'QC - QC CRAB PRODUCT', 3);
INSERT INTO `tbl_master_bagian` VALUES (95, 'RND', 3);
INSERT INTO `tbl_master_bagian` VALUES (96, 'QC - QC FP COOKED CMMDTY PRDCT & CSTM PROCESS (A)', 3);
INSERT INTO `tbl_master_bagian` VALUES (97, 'RND - DEVELOPMENT FORMULA', 3);
INSERT INTO `tbl_master_bagian` VALUES (98, 'QC - QC NOBASHI EBI', 3);
INSERT INTO `tbl_master_bagian` VALUES (99, 'QA - PACKAGING SPEC', 3);
INSERT INTO `tbl_master_bagian` VALUES (100, 'QC - QC RECEIVING-RAW PEEL (A)', 3);
INSERT INTO `tbl_master_bagian` VALUES (101, 'QA - QA QC WAREHOUSE', 3);
INSERT INTO `tbl_master_bagian` VALUES (102, 'LABORATORY - ANALYST MICROBIOLOGY', 3);
INSERT INTO `tbl_master_bagian` VALUES (103, 'QC - QC RECEIVING-RAW PEEL (B)', 3);
INSERT INTO `tbl_master_bagian` VALUES (104, 'QC - QC CUSTOM PROCESS PRODUCT (A)', 3);
INSERT INTO `tbl_master_bagian` VALUES (105, 'LABORATORY - CHEMICAL ANALYST & ANTIBIOTIC', 3);
INSERT INTO `tbl_master_bagian` VALUES (106, 'QC - QC SOAKING (A)', 3);
INSERT INTO `tbl_master_bagian` VALUES (107, 'QC - QC FP COOKED CMMDTY PRDCT & CSTM PROCESS (B)', 3);
INSERT INTO `tbl_master_bagian` VALUES (108, 'QC -  CUSTOM PROCESS PRODUCT (B)', 3);
INSERT INTO `tbl_master_bagian` VALUES (109, 'QC - QC FP RAW COMMODITY PRODUCT (B)', 3);
INSERT INTO `tbl_master_bagian` VALUES (110, 'QC - QC SOAKING (B)', 3);
INSERT INTO `tbl_master_bagian` VALUES (111, 'QA - QA DOCUMENTATION & CUSTOMER COMPLAIN', 3);
INSERT INTO `tbl_master_bagian` VALUES (112, 'QUALITY MANAGEMENT SYSTEM', 10);
INSERT INTO `tbl_master_bagian` VALUES (113, 'QUALITY MANAGEMENT SYSTEM - QMS CORE', 10);
INSERT INTO `tbl_master_bagian` VALUES (114, 'SECRETARIAL - SECRETARY BOE', 10);
INSERT INTO `tbl_master_bagian` VALUES (115, 'LEGAL - LEGAL ADMINISTRATION', 10);
INSERT INTO `tbl_master_bagian` VALUES (116, 'LEGAL - LEGAL', 10);
INSERT INTO `tbl_master_bagian` VALUES (117, 'QUALITY MANAGEMENT SYSTEM - QMS NON CORE', 10);

-- ----------------------------
-- Table structure for tbl_master_category
-- ----------------------------
DROP TABLE IF EXISTS `tbl_master_category`;
CREATE TABLE `tbl_master_category`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `company_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_master_category
-- ----------------------------
INSERT INTO `tbl_master_category` VALUES (1, 'APD', 1);
INSERT INTO `tbl_master_category` VALUES (2, 'APD', 2);

-- ----------------------------
-- Table structure for tbl_master_company
-- ----------------------------
DROP TABLE IF EXISTS `tbl_master_company`;
CREATE TABLE `tbl_master_company`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `aliases` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_master_company
-- ----------------------------
INSERT INTO `tbl_master_company` VALUES (1, 'PT. Mega Marine Pride', 'MMP');
INSERT INTO `tbl_master_company` VALUES (2, 'PT. Baramuda Bahari', 'BB');

-- ----------------------------
-- Table structure for tbl_master_devisi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_master_devisi`;
CREATE TABLE `tbl_master_devisi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `devisi_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_master_devisi
-- ----------------------------
INSERT INTO `tbl_master_devisi` VALUES (1, 'IT');
INSERT INTO `tbl_master_devisi` VALUES (2, 'PRODUCTION');
INSERT INTO `tbl_master_devisi` VALUES (3, 'QUALITY');
INSERT INTO `tbl_master_devisi` VALUES (4, 'HRM/GA-HSE');
INSERT INTO `tbl_master_devisi` VALUES (5, 'OPERATIONAL');
INSERT INTO `tbl_master_devisi` VALUES (6, 'FA-CUSTOMS');
INSERT INTO `tbl_master_devisi` VALUES (7, 'PURCHASING');
INSERT INTO `tbl_master_devisi` VALUES (8, 'EXIM');
INSERT INTO `tbl_master_devisi` VALUES (9, 'MARKETING');
INSERT INTO `tbl_master_devisi` VALUES (10, 'CORPORATE');

-- ----------------------------
-- Table structure for tbl_master_item
-- ----------------------------
DROP TABLE IF EXISTS `tbl_master_item`;
CREATE TABLE `tbl_master_item`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL,
  `categ_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_master_item
-- ----------------------------
INSERT INTO `tbl_master_item` VALUES (1, 'APD', 'Jilbab, Ciput, Topi (MMP)', 1);

-- ----------------------------
-- Table structure for tbl_master_karyawan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_master_karyawan`;
CREATE TABLE `tbl_master_karyawan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `no_badge` bigint NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `rfid_no` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `bagian_id` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10229 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_master_karyawan
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_transaksi
-- ----------------------------
DROP TABLE IF EXISTS `tbl_transaksi`;
CREATE TABLE `tbl_transaksi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `rfid_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `item_id` int NULL DEFAULT NULL,
  `tgl_pinjam` datetime NULL DEFAULT NULL,
  `tgl_kembali` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_transaksi
-- ----------------------------
INSERT INTO `tbl_transaksi` VALUES (1, '0002247970', 1, '2023-10-19 02:43:21', '2023-10-19 03:05:49');
INSERT INTO `tbl_transaksi` VALUES (2, '0001743404', 1, '2023-10-19 02:44:23', '2023-10-19 03:05:19');
INSERT INTO `tbl_transaksi` VALUES (3, '0009949922', 1, '2023-10-19 02:49:26', '2023-10-19 03:05:36');
INSERT INTO `tbl_transaksi` VALUES (4, '0002247970', 1, '2023-10-19 16:09:31', NULL);
INSERT INTO `tbl_transaksi` VALUES (5, '0001743404', 1, '2023-10-20 02:47:08', NULL);

SET FOREIGN_KEY_CHECKS = 1;
