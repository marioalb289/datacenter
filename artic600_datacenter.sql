/*
Navicat MySQL Data Transfer

Source Server         : iepc
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : artic600_datacenter

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-04-27 15:50:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for areas
-- ----------------------------
DROP TABLE IF EXISTS `areas`;
CREATE TABLE `areas` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of areas
-- ----------------------------
INSERT INTO `areas` VALUES ('1', 'Presidencia', '1', 'PRES');
INSERT INTO `areas` VALUES ('2', 'Consejeros Electorales', '1', 'CE');
INSERT INTO `areas` VALUES ('3', 'Secretaria Ejecutiva', '1', 'SE');
INSERT INTO `areas` VALUES ('4', 'Contraloria', '1', 'CONT');
INSERT INTO `areas` VALUES ('5', 'Secrearia Técnica', '1', 'ST');
INSERT INTO `areas` VALUES ('6', 'Dirección de Organización Electoral', '1', 'DOE');
INSERT INTO `areas` VALUES ('7', 'Dirección de Servicio Profesional Electoral', '1', 'DSPE');
INSERT INTO `areas` VALUES ('8', 'Dirección Juridica', '1', 'DJ');
INSERT INTO `areas` VALUES ('9', 'Unidad Técnica de Vinculación con el INE', '1', 'UTVINE');
INSERT INTO `areas` VALUES ('10', 'Unidad Técnica de Servicio Profesional Electoral', '1', 'UTSPE');
INSERT INTO `areas` VALUES ('11', 'Unidad Técnica de Computo', '1', 'UTC');
INSERT INTO `areas` VALUES ('12', 'Unidad Técnica de Comunicación Social', '1', 'UTCS');
INSERT INTO `areas` VALUES ('13', 'Unidad Técnica de Transparencia y Acceso a la Información', '1', 'UTTAI');
INSERT INTO `areas` VALUES ('14', 'Unidad Técnica de Oficialía Electoral', '1', 'UTOE');

-- ----------------------------
-- Table structure for lugares
-- ----------------------------
DROP TABLE IF EXISTS `lugares`;
CREATE TABLE `lugares` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of lugares
-- ----------------------------
INSERT INTO `lugares` VALUES ('1', 'Sala de Presidentes', '1');
INSERT INTO `lugares` VALUES ('2', 'Sala de Sesiones del Consejo General', '1');
INSERT INTO `lugares` VALUES ('3', 'Sala de Sesiones de Reuniones Previas', '1');
INSERT INTO `lugares` VALUES ('4', 'Secretaria Ejecuiva', '1');
INSERT INTO `lugares` VALUES ('5', 'Presidencia', '1');
INSERT INTO `lugares` VALUES ('6', 'Estacionamiento del IEPC', '1');
INSERT INTO `lugares` VALUES ('7', 'Recepción', '1');

-- ----------------------------
-- Table structure for sigi_contador_folios
-- ----------------------------
DROP TABLE IF EXISTS `sigi_contador_folios`;
CREATE TABLE `sigi_contador_folios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sigi_contador_folios
-- ----------------------------
INSERT INTO `sigi_contador_folios` VALUES ('1');
INSERT INTO `sigi_contador_folios` VALUES ('2');
INSERT INTO `sigi_contador_folios` VALUES ('3');
INSERT INTO `sigi_contador_folios` VALUES ('4');
INSERT INTO `sigi_contador_folios` VALUES ('5');
INSERT INTO `sigi_contador_folios` VALUES ('6');
INSERT INTO `sigi_contador_folios` VALUES ('7');
INSERT INTO `sigi_contador_folios` VALUES ('8');
INSERT INTO `sigi_contador_folios` VALUES ('9');
INSERT INTO `sigi_contador_folios` VALUES ('10');
INSERT INTO `sigi_contador_folios` VALUES ('11');
INSERT INTO `sigi_contador_folios` VALUES ('12');
INSERT INTO `sigi_contador_folios` VALUES ('13');
INSERT INTO `sigi_contador_folios` VALUES ('14');
INSERT INTO `sigi_contador_folios` VALUES ('15');
INSERT INTO `sigi_contador_folios` VALUES ('16');
INSERT INTO `sigi_contador_folios` VALUES ('17');
INSERT INTO `sigi_contador_folios` VALUES ('18');
INSERT INTO `sigi_contador_folios` VALUES ('19');
INSERT INTO `sigi_contador_folios` VALUES ('20');
INSERT INTO `sigi_contador_folios` VALUES ('21');
INSERT INTO `sigi_contador_folios` VALUES ('22');
INSERT INTO `sigi_contador_folios` VALUES ('23');
INSERT INTO `sigi_contador_folios` VALUES ('24');
INSERT INTO `sigi_contador_folios` VALUES ('25');
INSERT INTO `sigi_contador_folios` VALUES ('26');
INSERT INTO `sigi_contador_folios` VALUES ('27');
INSERT INTO `sigi_contador_folios` VALUES ('28');
INSERT INTO `sigi_contador_folios` VALUES ('29');
INSERT INTO `sigi_contador_folios` VALUES ('30');
INSERT INTO `sigi_contador_folios` VALUES ('31');
INSERT INTO `sigi_contador_folios` VALUES ('32');
INSERT INTO `sigi_contador_folios` VALUES ('33');
INSERT INTO `sigi_contador_folios` VALUES ('34');
INSERT INTO `sigi_contador_folios` VALUES ('35');
INSERT INTO `sigi_contador_folios` VALUES ('36');
INSERT INTO `sigi_contador_folios` VALUES ('37');
INSERT INTO `sigi_contador_folios` VALUES ('38');
INSERT INTO `sigi_contador_folios` VALUES ('39');
INSERT INTO `sigi_contador_folios` VALUES ('40');
INSERT INTO `sigi_contador_folios` VALUES ('41');
INSERT INTO `sigi_contador_folios` VALUES ('42');
INSERT INTO `sigi_contador_folios` VALUES ('43');
INSERT INTO `sigi_contador_folios` VALUES ('44');
INSERT INTO `sigi_contador_folios` VALUES ('45');
INSERT INTO `sigi_contador_folios` VALUES ('46');
INSERT INTO `sigi_contador_folios` VALUES ('47');
INSERT INTO `sigi_contador_folios` VALUES ('48');
INSERT INTO `sigi_contador_folios` VALUES ('49');
INSERT INTO `sigi_contador_folios` VALUES ('50');
INSERT INTO `sigi_contador_folios` VALUES ('51');
INSERT INTO `sigi_contador_folios` VALUES ('52');
INSERT INTO `sigi_contador_folios` VALUES ('53');
INSERT INTO `sigi_contador_folios` VALUES ('54');
INSERT INTO `sigi_contador_folios` VALUES ('55');
INSERT INTO `sigi_contador_folios` VALUES ('56');
INSERT INTO `sigi_contador_folios` VALUES ('57');
INSERT INTO `sigi_contador_folios` VALUES ('58');
INSERT INTO `sigi_contador_folios` VALUES ('59');
INSERT INTO `sigi_contador_folios` VALUES ('60');
INSERT INTO `sigi_contador_folios` VALUES ('61');

-- ----------------------------
-- Table structure for sigi_documentos
-- ----------------------------
DROP TABLE IF EXISTS `sigi_documentos`;
CREATE TABLE `sigi_documentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `respuesta` tinyint(1) DEFAULT NULL,
  `ruta` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `create_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sigi_documentos
-- ----------------------------
INSERT INTO `sigi_documentos` VALUES ('1', 'S000000012017-04-24-13-45-19CONT', '0', 'documentos/', '2017-04-24 13:45:19', '10', '2017-04-24 13:45:19', '10');
INSERT INTO `sigi_documentos` VALUES ('2', 'S000000022017-04-24-14-33-27SE', '0', 'documentos/', '2017-04-24 14:33:27', '9', '2017-04-24 14:33:27', '9');
INSERT INTO `sigi_documentos` VALUES ('3', 'S000000032017-04-25-13-15-05SE', '0', 'documentos/', '2017-04-25 13:15:05', '10', '2017-04-25 13:15:05', '10');
INSERT INTO `sigi_documentos` VALUES ('4', 'R000000042017-04-25-13-20-18', '0', 'documentos/', '2017-04-25 13:20:18', '7', '2017-04-25 13:20:18', '7');
INSERT INTO `sigi_documentos` VALUES ('5', 'S000000052017-04-25-13-25-35SE', '0', 'documentos/', '2017-04-25 13:25:35', '10', '2017-04-25 13:25:35', '10');
INSERT INTO `sigi_documentos` VALUES ('6', 'S000000062017-04-25-13-28-37SE', '0', 'documentos/', '2017-04-25 13:28:37', '10', '2017-04-25 13:28:37', '10');
INSERT INTO `sigi_documentos` VALUES ('7', 'S000000072017-04-25-13-34-46CONT', '0', 'documentos/', '2017-04-25 13:34:46', '10', '2017-04-25 13:34:46', '10');
INSERT INTO `sigi_documentos` VALUES ('8', 'R000000082017-04-25-13-35-42', '0', 'documentos/', '2017-04-25 13:35:42', '9', '2017-04-25 13:35:42', '9');
INSERT INTO `sigi_documentos` VALUES ('9', 'S000000092017-04-25-13-37-07SE', '0', 'documentos/', '2017-04-25 13:37:07', '10', '2017-04-25 13:37:07', '10');
INSERT INTO `sigi_documentos` VALUES ('10', 'S000000102017-04-25-13-39-34SE', '0', 'documentos/', '2017-04-25 13:39:34', '10', '2017-04-25 13:39:34', '10');
INSERT INTO `sigi_documentos` VALUES ('11', 'S000000112017-04-25-13-50-42SE', '0', 'documentos/', '2017-04-25 13:50:42', '10', '2017-04-25 13:50:42', '10');
INSERT INTO `sigi_documentos` VALUES ('12', 'R000000122017-04-25-13-55-32', '0', 'documentos/', '2017-04-25 13:55:32', '7', '2017-04-25 13:55:32', '7');
INSERT INTO `sigi_documentos` VALUES ('13', 'S000000132017-04-25-13-57-09SE', '0', 'documentos/', '2017-04-25 13:57:09', '9', '2017-04-25 13:57:09', '9');
INSERT INTO `sigi_documentos` VALUES ('14', 'R000000142017-04-25-13-58-45', '0', 'documentos/', '2017-04-25 13:58:45', '7', '2017-04-25 13:58:45', '7');
INSERT INTO `sigi_documentos` VALUES ('15', 'R000000152017-04-25-14-02-39', '0', 'documentos/', '2017-04-25 14:02:39', '9', '2017-04-25 14:02:39', '9');
INSERT INTO `sigi_documentos` VALUES ('16', 'R000000162017-04-25-14-04-27', '0', 'documentos/', '2017-04-25 14:04:27', '7', '2017-04-25 14:04:27', '7');
INSERT INTO `sigi_documentos` VALUES ('17', 'R000000172017-04-25-14-07-47', '0', 'documentos/', '2017-04-25 14:07:47', '9', '2017-04-25 14:07:47', '9');
INSERT INTO `sigi_documentos` VALUES ('18', 'R000000182017-04-25-14-18-02', '0', 'documentos/', '2017-04-25 14:18:02', '7', '2017-04-25 14:18:02', '7');
INSERT INTO `sigi_documentos` VALUES ('19', 'R000000192017-04-25-14-21-04', '0', 'documentos/', '2017-04-25 14:21:04', '9', '2017-04-25 14:21:04', '9');
INSERT INTO `sigi_documentos` VALUES ('20', 'R000000202017-04-25-14-21-46', '0', 'documentos/', '2017-04-25 14:21:47', '7', '2017-04-25 14:21:47', '7');
INSERT INTO `sigi_documentos` VALUES ('21', 'R000000212017-04-25-14-29-00CONT', '0', 'documentos/', '2017-04-25 14:29:00', '9', '2017-04-25 14:29:00', '9');
INSERT INTO `sigi_documentos` VALUES ('22', 'R000000222017-04-25-14-29-48SE', '0', 'documentos/', '2017-04-25 14:29:48', '7', '2017-04-25 14:29:48', '7');
INSERT INTO `sigi_documentos` VALUES ('23', 'R000000232017-04-25-14-34-35CONT', '0', 'documentos/', '2017-04-25 14:34:35', '9', '2017-04-25 14:34:35', '9');
INSERT INTO `sigi_documentos` VALUES ('24', 'R000000242017-04-25-14-35-45SE', '0', 'documentos/', '2017-04-25 14:35:45', '7', '2017-04-25 14:35:45', '7');
INSERT INTO `sigi_documentos` VALUES ('25', 'R000000252017-04-25-14-40-31CONT', '0', 'documentos/', '2017-04-25 14:40:31', '9', '2017-04-25 14:40:31', '9');
INSERT INTO `sigi_documentos` VALUES ('26', 'R000000262017-04-25-14-43-04SE', '0', 'documentos/', '2017-04-25 14:43:04', '7', '2017-04-25 14:43:04', '7');
INSERT INTO `sigi_documentos` VALUES ('27', 'R000000272017-04-25-14-46-18CONT', '0', 'documentos/', '2017-04-25 14:46:18', '9', '2017-04-25 14:46:18', '9');
INSERT INTO `sigi_documentos` VALUES ('28', 'R000000282017-04-25-14-46-44SE', '0', 'documentos/', '2017-04-25 14:46:44', '7', '2017-04-25 14:46:44', '7');
INSERT INTO `sigi_documentos` VALUES ('29', 'R000000292017-04-25-14-49-20CONT', '0', 'documentos/', '2017-04-25 14:49:20', '9', '2017-04-25 14:49:20', '9');
INSERT INTO `sigi_documentos` VALUES ('30', 'R000000302017-04-25-14-50-04SE', '0', 'documentos/', '2017-04-25 14:50:04', '7', '2017-04-25 14:50:04', '7');
INSERT INTO `sigi_documentos` VALUES ('31', 'R000000312017-04-25-14-56-57CONT', '0', 'documentos/', '2017-04-25 14:56:57', '9', '2017-04-25 14:56:57', '9');
INSERT INTO `sigi_documentos` VALUES ('32', 'R000000322017-04-25-15-07-45SE', '0', 'documentos/', '2017-04-25 15:07:45', '7', '2017-04-25 15:07:45', '7');
INSERT INTO `sigi_documentos` VALUES ('33', 'R000000332017-04-25-15-21-45CONT', '0', 'documentos/', '2017-04-25 15:21:45', '9', '2017-04-25 15:21:45', '9');
INSERT INTO `sigi_documentos` VALUES ('34', 'R000000342017-04-25-15-22-21SE', '0', 'documentos/', '2017-04-25 15:22:21', '7', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_documentos` VALUES ('35', 'S000000352017-04-25-15-23-22SE', '0', 'documentos/', '2017-04-25 15:23:22', '9', '2017-04-25 15:23:22', '9');
INSERT INTO `sigi_documentos` VALUES ('36', 'R000000362017-04-25-15-23-49SE', '0', 'documentos/', '2017-04-25 15:23:49', '7', '2017-04-25 15:23:49', '7');
INSERT INTO `sigi_documentos` VALUES ('37', 'R000000372017-04-25-15-25-30CONT', '0', 'documentos/', '2017-04-25 15:25:30', '9', '2017-04-25 15:25:30', '9');
INSERT INTO `sigi_documentos` VALUES ('38', 'R000000382017-04-25-15-26-07SE', '0', 'documentos/', '2017-04-25 15:26:07', '7', '2017-04-25 15:26:07', '7');
INSERT INTO `sigi_documentos` VALUES ('39', 'S000000392017-04-25-15-27-41CONT', '0', 'documentos/', '2017-04-25 15:27:41', '10', '2017-04-25 15:27:41', '10');
INSERT INTO `sigi_documentos` VALUES ('40', 'R000000402017-04-25-15-28-41CONT', '0', 'documentos/', '2017-04-25 15:28:41', '9', '2017-04-25 15:28:41', '9');
INSERT INTO `sigi_documentos` VALUES ('41', 'S000000412017-04-25-15-29-56CONT', '0', 'documentos/', '2017-04-25 15:29:56', '10', '2017-04-25 15:29:56', '10');
INSERT INTO `sigi_documentos` VALUES ('42', 'R000000422017-04-25-15-30-25CONT', '0', 'documentos/', '2017-04-25 15:30:25', '9', '2017-04-25 15:30:25', '9');
INSERT INTO `sigi_documentos` VALUES ('43', 'S000000432017-04-25-15-31-01CONT', '0', 'documentos/', '2017-04-25 15:31:01', '10', '2017-04-25 15:31:01', '10');
INSERT INTO `sigi_documentos` VALUES ('44', 'S000000442017-04-25-15-33-12UTOE', '0', 'documentos/', '2017-04-25 15:33:12', '9', '2017-04-25 15:33:12', '9');
INSERT INTO `sigi_documentos` VALUES ('45', 'S000000452017-04-26-09-30-25CONT', '0', 'documentos/', '2017-04-26 09:30:25', '10', '2017-04-26 09:30:25', '10');
INSERT INTO `sigi_documentos` VALUES ('46', 'R000000462017-04-26-09-36-19CONT', '0', 'documentos/', '2017-04-26 09:36:19', '9', '2017-04-26 09:36:19', '9');
INSERT INTO `sigi_documentos` VALUES ('47', 'S000000472017-04-26-10-08-29SE', '0', 'documentos/', '2017-04-26 10:08:29', '9', '2017-04-26 10:08:29', '9');
INSERT INTO `sigi_documentos` VALUES ('48', 'R000000482017-04-26-10-09-25SE', '0', 'documentos/', '2017-04-26 10:09:25', '7', '2017-04-26 10:09:25', '7');
INSERT INTO `sigi_documentos` VALUES ('49', 'S000000492017-04-26-10-12-08SE', '0', 'documentos/', '2017-04-26 10:12:08', '9', '2017-04-26 10:12:08', '9');
INSERT INTO `sigi_documentos` VALUES ('50', 'S000000502017-04-26-10-51-21CONT', '0', 'documentos/', '2017-04-26 10:51:21', '10', '2017-04-26 10:51:21', '10');
INSERT INTO `sigi_documentos` VALUES ('51', 'R000000512017-04-26-11-04-55CONT', '0', 'documentos/', '2017-04-26 11:04:55', '9', '2017-04-26 11:04:55', '9');
INSERT INTO `sigi_documentos` VALUES ('52', 'S000000522017-04-26-11-17-53SE', '0', 'documentos/', '2017-04-26 11:17:53', '9', '2017-04-26 11:17:53', '9');
INSERT INTO `sigi_documentos` VALUES ('53', 'S000000532017-04-27-11-50-05UTC', '0', 'documentos/', '2017-04-27 11:50:05', '9', '2017-04-27 11:50:05', '9');
INSERT INTO `sigi_documentos` VALUES ('54', 'R000000542017-04-27-12-40-52UTC', '0', 'documentos/', '2017-04-27 12:40:52', '1', '2017-04-27 12:40:52', '1');
INSERT INTO `sigi_documentos` VALUES ('55', 'R000000552017-04-27-13-15-42CONT', '0', 'documentos/', '2017-04-27 13:15:42', '9', '2017-04-27 13:15:42', '9');
INSERT INTO `sigi_documentos` VALUES ('56', 'R000000562017-04-27-13-37-08UTC', '0', 'documentos/', '2017-04-27 13:37:08', '1', '2017-04-27 13:37:08', '1');
INSERT INTO `sigi_documentos` VALUES ('57', 'S000000572017-04-27-13-44-42CONT', '0', 'documentos/', '2017-04-27 13:44:42', '1', '2017-04-27 13:44:42', '1');
INSERT INTO `sigi_documentos` VALUES ('58', 'R000000582017-04-27-13-50-06CONT', '0', 'documentos/', '2017-04-27 13:50:06', '9', '2017-04-27 13:50:06', '9');
INSERT INTO `sigi_documentos` VALUES ('59', 'S000000592017-04-27-14-53-32UTOE', '0', 'documentos/', '2017-04-27 14:53:32', '9', '2017-04-27 14:53:32', '9');
INSERT INTO `sigi_documentos` VALUES ('60', 'S000000602017-04-27-15-15-44UTOE', '0', 'documentos/', '2017-04-27 15:15:44', '1', '2017-04-27 15:15:44', '1');
INSERT INTO `sigi_documentos` VALUES ('61', 'R000000612017-04-27-15-19-38UTOE', '0', 'documentos/', '2017-04-27 15:19:38', '10', '2017-04-27 15:19:38', '10');

-- ----------------------------
-- Table structure for sigi_oficios
-- ----------------------------
DROP TABLE IF EXISTS `sigi_oficios`;
CREATE TABLE `sigi_oficios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_oficio` enum('SOLICITUD','RESPUESTA') DEFAULT NULL,
  `folio` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `folio_institucion` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `origen` enum('INTERNO','EXTERNO') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_usuario_emisor` int(11) DEFAULT NULL,
  `nombre_emisor` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `institucion_emisor` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cargo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `asunto_emisor` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `asunto_receptor` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `respuesta` tinyint(1) DEFAULT NULL,
  `respondido` int(1) DEFAULT '0',
  `destino` enum('INTERNO','EXTERNO') DEFAULT 'INTERNO',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sigi_oficios
-- ----------------------------
INSERT INTO `sigi_oficios` VALUES ('1', 'SOLICITUD', '00000001', '', 'EXTERNO', '0', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR CMR', 'SE SOLICITA INFORME DE GASTOS DEL INSTITUTO', '', '1', null, 'INTERNO', '2017-04-24 13:45:19', '10', '2017-04-24 13:45:19', '10');
INSERT INTO `sigi_oficios` VALUES ('2', 'SOLICITUD', '00000002', 'IEPC-2012-123-12', 'INTERNO', '9', '', '', '', 'INFORME DE GASTOS 2012', '', '1', null, 'INTERNO', '2017-04-24 14:33:27', '9', '2017-04-24 14:33:27', '9');
INSERT INTO `sigi_oficios` VALUES ('3', 'SOLICITUD', '00000003', '', 'EXTERNO', '0', 'MANUEL SOTO HERRERA', 'PROTECCIÓN CIVIL', 'DIRECTOR OPERATIVO', 'SE SOLICITA INFORME DEL ESTADO DE EXTINTORES', '', '1', '1', 'INTERNO', '2017-04-25 13:15:05', '10', '2017-04-25 13:15:05', '10');
INSERT INTO `sigi_oficios` VALUES ('4', 'RESPUESTA', '00000004', 'IEPC-0019283', 'EXTERNO', '7', 'MANUEL SOTO HERRERA', 'PROTECCIÓN CIVIL', 'DIRECTOR OPERATIVO', 'Se envía informe del estado de los extintores', '', '1', '1', 'INTERNO', '2017-04-25 13:20:18', '7', '2017-04-25 13:20:18', '7');
INSERT INTO `sigi_oficios` VALUES ('5', 'SOLICITUD', '00000005', '', 'EXTERNO', '0', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR CMR', 'Se le invita a un evento', '', '0', null, 'INTERNO', '2017-04-25 13:25:35', '10', '2017-04-25 13:25:35', '10');
INSERT INTO `sigi_oficios` VALUES ('6', 'SOLICITUD', '00000006', '', 'EXTERNO', '0', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR CMR', 'SE INVITA DE NUEVO', '', '0', null, 'INTERNO', '2017-04-25 13:28:37', '10', '2017-04-25 13:28:37', '10');
INSERT INTO `sigi_oficios` VALUES ('7', 'SOLICITUD', '00000007', '', 'EXTERNO', '0', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR CMR', 'INFORME DE GASTOS', '', '1', '1', 'INTERNO', '2017-04-25 13:34:46', '10', '2017-04-25 13:34:46', '10');
INSERT INTO `sigi_oficios` VALUES ('8', 'RESPUESTA', '00000008', 'IEPC-13124345', 'EXTERNO', '9', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR CMR', 'se envía informe', '', '1', '1', 'INTERNO', '2017-04-25 13:35:42', '9', '2017-04-25 13:35:42', '9');
INSERT INTO `sigi_oficios` VALUES ('9', 'SOLICITUD', '00000009', '', 'EXTERNO', '0', 'MANUEL SOTO HERRERA', 'PROTECCIÓN CIVIL', 'DIRECTOR OPERATIVO', 'SE NOTIFICA', '', '0', null, 'INTERNO', '2017-04-25 13:37:07', '10', '2017-04-25 13:37:07', '10');
INSERT INTO `sigi_oficios` VALUES ('10', 'SOLICITUD', '00000010', '', 'EXTERNO', '0', 'MANUEL SOTO HERRERA', 'PROTECCIÓN CIVIL', 'DIRECTOR OPERATIVO', 'SE NOTIFICA2', '', '0', null, 'INTERNO', '2017-04-25 13:39:34', '10', '2017-04-25 13:39:34', '10');
INSERT INTO `sigi_oficios` VALUES ('11', 'SOLICITUD', '00000011', '', 'EXTERNO', '0', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR CMR', 'SE ENVIA MENSAJE 2 ESPERANDO RESPUESTA', '', '1', '1', 'INTERNO', '2017-04-25 13:50:43', '10', '2017-04-25 13:50:43', '10');
INSERT INTO `sigi_oficios` VALUES ('12', 'RESPUESTA', '00000012', 'wet546655', 'EXTERNO', '7', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR CMR', 'se envia respuesta al mensaje 2', '', '1', '1', 'INTERNO', '2017-04-25 13:55:32', '7', '2017-04-25 13:55:32', '7');
INSERT INTO `sigi_oficios` VALUES ('13', 'SOLICITUD', '00000013', 'IEPC-2012-12', 'INTERNO', '9', '', '', '', 'MENSAJE INTERNO 1', '', '1', '1', 'INTERNO', '2017-04-25 13:57:09', '9', '2017-04-25 13:57:09', '9');
INSERT INTO `sigi_oficios` VALUES ('14', 'RESPUESTA', '00000014', 'ISOR29F84', 'INTERNO', '7', '', '', '', 'Se envía respuesta al mensaje interno 1', '', '1', '1', 'INTERNO', '2017-04-25 13:58:45', '7', '2017-04-25 13:58:45', '7');
INSERT INTO `sigi_oficios` VALUES ('15', 'RESPUESTA', '00000015', 'IEPC201823', 'INTERNO', '9', '', '', '', 'No es la respuesta que se esperaba, esperando nuev', '', '1', '1', 'INTERNO', '2017-04-25 14:02:39', '9', '2017-04-25 14:02:39', '9');
INSERT INTO `sigi_oficios` VALUES ('16', 'RESPUESTA', '00000016', 'IEP893893', 'INTERNO', '7', '', '', '', 'Se envía respuesta correcta al mensaje 2', '', '1', '1', 'INTERNO', '2017-04-25 14:04:27', '7', '2017-04-25 14:04:27', '7');
INSERT INTO `sigi_oficios` VALUES ('17', 'RESPUESTA', '00000017', '2345675ewedds', 'INTERNO', '9', '', '', '', 'nuevo mensaje 3', '', '1', '1', 'INTERNO', '2017-04-25 14:07:47', '9', '2017-04-25 14:07:47', '9');
INSERT INTO `sigi_oficios` VALUES ('18', 'RESPUESTA', '00000018', '453sasssa', 'INTERNO', '7', '', '', '', 'respuesta al mensaje 3', '', '1', '1', 'INTERNO', '2017-04-25 14:18:02', '7', '2017-04-25 14:18:02', '7');
INSERT INTO `sigi_oficios` VALUES ('19', 'RESPUESTA', '00000019', '123456543asdfgh', 'INTERNO', '9', '', '', '', 'nuevo mensaje 4', '', '1', '1', 'INTERNO', '2017-04-25 14:21:04', '9', '2017-04-25 14:21:04', '9');
INSERT INTO `sigi_oficios` VALUES ('20', 'RESPUESTA', '00000020', 'asdfg435675', 'INTERNO', '7', '', '', '', 'respuesta mensaje4', '', '1', '1', 'INTERNO', '2017-04-25 14:21:47', '7', '2017-04-25 14:21:47', '7');
INSERT INTO `sigi_oficios` VALUES ('21', 'RESPUESTA', '00000021', '2345685732jhdff', 'INTERNO', '9', '', '', '', 'mensaje 5 nuevo', '', '1', '1', 'INTERNO', '2017-04-25 14:29:00', '9', '2017-04-25 14:29:00', '9');
INSERT INTO `sigi_oficios` VALUES ('22', 'RESPUESTA', '00000022', '23456edsds', 'INTERNO', '7', '', '', '', 'respuesta mensaje 5', '', '1', '1', 'INTERNO', '2017-04-25 14:29:48', '7', '2017-04-25 14:29:48', '7');
INSERT INTO `sigi_oficios` VALUES ('23', 'RESPUESTA', '00000023', '8948954uifdjkdf', 'INTERNO', '9', '', '', '', 'mensaje 6 nuevo', '', '1', '1', 'INTERNO', '2017-04-25 14:34:35', '9', '2017-04-25 14:34:35', '9');
INSERT INTO `sigi_oficios` VALUES ('24', 'RESPUESTA', '00000024', '44589djkdkjds', 'INTERNO', '7', '', '', '', 'respuesta mensaje 6', '', '1', '1', 'INTERNO', '2017-04-25 14:35:45', '7', '2017-04-25 14:35:45', '7');
INSERT INTO `sigi_oficios` VALUES ('25', 'RESPUESTA', '00000025', '1234567654wdfg', 'INTERNO', '9', '', '', '', 'nuevo mensaje 7', '', '1', '1', 'INTERNO', '2017-04-25 14:40:31', '9', '2017-04-25 14:40:31', '9');
INSERT INTO `sigi_oficios` VALUES ('26', 'RESPUESTA', '00000026', '23456ewdfgsd', 'INTERNO', '7', '', '', '', 'respuesta mensaje 7', '', '1', '1', 'INTERNO', '2017-04-25 14:43:04', '7', '2017-04-25 14:43:04', '7');
INSERT INTO `sigi_oficios` VALUES ('27', 'RESPUESTA', '00000027', '789878ssas', 'INTERNO', '9', '', '', '', 'nuevo mensaje 8', '', '1', '1', 'INTERNO', '2017-04-25 14:46:18', '9', '2017-04-25 14:46:18', '9');
INSERT INTO `sigi_oficios` VALUES ('28', 'RESPUESTA', '00000028', '8938932hjhsasaas', 'INTERNO', '7', '', '', '', 'respuesta mensaje 8', '', '1', '1', 'INTERNO', '2017-04-25 14:46:44', '7', '2017-04-25 14:46:44', '7');
INSERT INTO `sigi_oficios` VALUES ('29', 'RESPUESTA', '00000029', '234567esdf', 'INTERNO', '9', '', '', '', 'nuevo mensaje 9', '', '1', '1', 'INTERNO', '2017-04-25 14:49:20', '9', '2017-04-25 14:49:20', '9');
INSERT INTO `sigi_oficios` VALUES ('30', 'RESPUESTA', '00000030', '234wesds', 'INTERNO', '7', '', '', '', 'responder mensaje 9', '', '1', '1', 'INTERNO', '2017-04-25 14:50:04', '7', '2017-04-25 14:50:04', '7');
INSERT INTO `sigi_oficios` VALUES ('31', 'RESPUESTA', '00000031', '89438943djdssd', 'INTERNO', '9', '', '', '', 'nuevo mensaje 10', '', '1', '1', 'INTERNO', '2017-04-25 14:56:57', '9', '2017-04-25 14:56:57', '9');
INSERT INTO `sigi_oficios` VALUES ('32', 'RESPUESTA', '00000032', '323aasss', 'INTERNO', '7', '', '', '', 'respuesta mensaje 10', '', '1', '1', 'INTERNO', '2017-04-25 15:07:45', '7', '2017-04-25 15:07:45', '7');
INSERT INTO `sigi_oficios` VALUES ('33', 'RESPUESTA', '00000033', '9858945DFDFDF', 'INTERNO', '9', '', '', '', 'mensaje 11', '', '1', '1', 'INTERNO', '2017-04-25 15:21:45', '9', '2017-04-25 15:21:45', '9');
INSERT INTO `sigi_oficios` VALUES ('34', 'RESPUESTA', '00000034', '456fdsfd', 'INTERNO', '7', '', '', '', 'RESPUESTA MENSAJE 11', '', '1', '1', 'INTERNO', '2017-04-25 15:22:21', '7', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios` VALUES ('35', 'SOLICITUD', '00000035', '123456543', 'INTERNO', '9', '', '', '', 'MENSAJE NUEVO 1 DE PRUEBA', '', '1', '1', 'INTERNO', '2017-04-25 15:23:22', '9', '2017-04-25 15:23:22', '9');
INSERT INTO `sigi_oficios` VALUES ('36', 'RESPUESTA', '00000036', '48348943', 'INTERNO', '7', '', '', '', 'RESPUESTA AL MENSAJE 1', '', '1', '1', 'INTERNO', '2017-04-25 15:23:50', '7', '2017-04-25 15:23:50', '7');
INSERT INTO `sigi_oficios` VALUES ('37', 'RESPUESTA', '00000037', '2389328923', 'INTERNO', '9', '', '', '', 'NUEVO MENSAJE 2', '', '1', '1', 'INTERNO', '2017-04-25 15:25:30', '9', '2017-04-25 15:25:30', '9');
INSERT INTO `sigi_oficios` VALUES ('38', 'RESPUESTA', '00000038', '478437843', 'INTERNO', '7', '', '', '', 'RESPUESTA AL MENSAJE 2', '', '1', '1', 'INTERNO', '2017-04-25 15:26:07', '7', '2017-04-25 15:26:07', '7');
INSERT INTO `sigi_oficios` VALUES ('39', 'SOLICITUD', '00000039', '', 'EXTERNO', '0', 'MANUEL SOTO HERRERA', 'PROTECCIÓN CIVIL', 'DIRECTOR OPERATIVO', 'MENSAJE EXTERNO 1', '', '1', '1', 'INTERNO', '2017-04-25 15:27:41', '10', '2017-04-25 15:27:41', '10');
INSERT INTO `sigi_oficios` VALUES ('40', 'RESPUESTA', '00000040', '2345678654RTFDF', 'EXTERNO', '9', 'MANUEL SOTO HERRERA', 'PROTECCIÓN CIVIL', 'DIRECTOR OPERATIVO', 'RESPUESTA AL MENSAJE EXTERNO 1', '', '1', '1', 'INTERNO', '2017-04-25 15:28:41', '9', '2017-04-25 15:28:41', '9');
INSERT INTO `sigi_oficios` VALUES ('41', 'SOLICITUD', '00000041', '', 'EXTERNO', '0', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR CMR', 'MENSAJE SIN RESPUESTA 1', '', '1', '1', 'INTERNO', '2017-04-25 15:29:56', '10', '2017-04-25 15:29:56', '10');
INSERT INTO `sigi_oficios` VALUES ('42', 'RESPUESTA', '00000042', '7378327832872', 'EXTERNO', '9', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR CMR', 'SI RESPONDI', '', '1', '1', 'INTERNO', '2017-04-25 15:30:25', '9', '2017-04-25 15:30:25', '9');
INSERT INTO `sigi_oficios` VALUES ('43', 'SOLICITUD', '00000043', '', 'EXTERNO', '0', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR CMR', 'MENSAJE SIN RESPUESTA 1', '', '0', null, 'INTERNO', '2017-04-25 15:31:01', '10', '2017-04-25 15:31:01', '10');
INSERT INTO `sigi_oficios` VALUES ('44', 'SOLICITUD', '00000044', '2345676543', 'INTERNO', '9', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR CMR', 'PROBANDO DESTINO EXTERNO 1', '', '1', null, 'EXTERNO', '2017-04-25 15:33:12', '9', '2017-04-25 15:33:12', '9');
INSERT INTO `sigi_oficios` VALUES ('45', 'SOLICITUD', '00000045', '', 'EXTERNO', '0', 'MANUEL SOTO HERRERA', 'PROTECCIÓN CIVIL', 'DIRECTOR OPERATIVO', 'Informe de gastos en materia de seguridad', '', '1', '1', 'INTERNO', '2017-04-26 09:30:25', '10', '2017-04-26 09:30:25', '10');
INSERT INTO `sigi_oficios` VALUES ('46', 'RESPUESTA', '00000046', '12342asda', 'EXTERNO', '9', 'MANUEL SOTO HERRERA', 'PROTECCIÓN CIVIL', 'DIRECTOR OPERATIVO', 'SE ENVIA RESPUESTA AL MENSAJE 1', '', '1', '1', 'INTERNO', '2017-04-26 09:36:19', '9', '2017-04-26 09:36:19', '9');
INSERT INTO `sigi_oficios` VALUES ('47', 'SOLICITUD', '00000047', 'IEOS834983', 'INTERNO', '9', '', '', '', 'MENSAJE DE PRUEBA 1', '', '1', '1', 'INTERNO', '2017-04-26 10:08:29', '9', '2017-04-26 10:08:29', '9');
INSERT INTO `sigi_oficios` VALUES ('48', 'RESPUESTA', '00000048', '123456WET', 'INTERNO', '7', '', '', '', 'RESPUESTA MENSAJE 1', '', '1', '1', 'INTERNO', '2017-04-26 10:09:25', '7', '2017-04-26 10:09:25', '7');
INSERT INTO `sigi_oficios` VALUES ('49', 'SOLICITUD', '00000049', 'IEPC824372', 'INTERNO', '9', '', '', '', 'mensaje de prueba 1', '', '1', null, 'INTERNO', '2017-04-26 10:12:08', '9', '2017-04-26 10:12:08', '9');
INSERT INTO `sigi_oficios` VALUES ('50', 'SOLICITUD', '00000050', '', 'EXTERNO', '0', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR CMR', 'Se solicit informe de gastos', '', '1', '1', 'INTERNO', '2017-04-26 10:51:21', '10', '2017-04-26 10:51:21', '10');
INSERT INTO `sigi_oficios` VALUES ('51', 'RESPUESTA', '00000051', '5445EYGH', 'EXTERNO', '9', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR CMR', 'SE ENVIA RESPUESTA', '', '1', '1', 'INTERNO', '2017-04-26 11:04:55', '9', '2017-04-26 11:04:55', '9');
INSERT INTO `sigi_oficios` VALUES ('52', 'SOLICITUD', '00000052', 'IEPC738547387', 'INTERNO', '9', '', '', '', 'MENSAJE DE PRUEBA INTRNO', '', '1', null, 'INTERNO', '2017-04-26 11:17:53', '9', '2017-04-26 11:17:53', '9');
INSERT INTO `sigi_oficios` VALUES ('53', 'SOLICITUD', '00000053', '2322QSDDSQE', 'INTERNO', '9', '', '', '', 'MENSAJE DE PRUEBA A SUPER EJECUTIVO', '', '1', '1', 'INTERNO', '2017-04-27 11:50:05', '9', '2017-04-27 11:50:05', '9');
INSERT INTO `sigi_oficios` VALUES ('54', 'RESPUESTA', '00000054', '', 'INTERNO', '1', '', '', '', 'RESPUESTA AL MENSAJE SUPER EJECUTIVO', '', '1', '1', 'INTERNO', '2017-04-27 12:40:52', '1', '2017-04-27 12:40:52', '1');
INSERT INTO `sigi_oficios` VALUES ('55', 'RESPUESTA', '00000055', '2376673SSS', 'INTERNO', '9', '', '', '', 'NO ES LA RESPUESTA CORRECTA', '', '1', '1', 'INTERNO', '2017-04-27 13:15:42', '9', '2017-04-27 13:15:42', '9');
INSERT INTO `sigi_oficios` VALUES ('56', 'RESPUESTA', '00000056', '', 'INTERNO', '1', '', '', '', 'RESPUESTA A SU RESPUESTA', '', '1', '1', 'INTERNO', '2017-04-27 13:37:09', '1', '2017-04-27 13:37:09', '1');
INSERT INTO `sigi_oficios` VALUES ('57', 'SOLICITUD', '00000057', '23423WERASD', 'INTERNO', '1', '', '', '', 'YO SUPER USUARIO TE ENVIO MENSAJE', '', '1', '1', 'INTERNO', '2017-04-27 13:44:42', '1', '2017-04-27 13:44:42', '1');
INSERT INTO `sigi_oficios` VALUES ('58', 'RESPUESTA', '00000058', '34567876543wertytrew', 'INTERNO', '9', '', '', '', 'yo usuario mortal, te respondo a ti superusuario', '', '1', '1', 'INTERNO', '2017-04-27 13:50:06', '9', '2017-04-27 13:50:06', '9');
INSERT INTO `sigi_oficios` VALUES ('59', 'SOLICITUD', '00000059', '12345676543qasdf', 'INTERNO', '9', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR CMR', 'otra prueba externa', '', '1', null, 'EXTERNO', '2017-04-27 14:53:32', '9', '2017-04-27 14:53:32', '9');
INSERT INTO `sigi_oficios` VALUES ('60', 'SOLICITUD', '00000060', '123456543SDFGHGFD', 'INTERNO', '1', 'MIGUEL ALEMAN MADRID', 'AYUNTAMIENTO LERDO', 'PRESIDENTE MUNICIPAL', 'MENSAJE NUEVO EXTERNO DE SUPER USUARIOS', '', '1', '1', 'EXTERNO', '2017-04-27 15:15:44', '1', '2017-04-27 15:15:44', '1');
INSERT INTO `sigi_oficios` VALUES ('61', 'RESPUESTA', '00000061', '', 'INTERNO', '10', 'MIGUEL ALEMAN MADRID', 'AYUNTAMIENTO LERDO', 'PRESIDENTE MUNICIPAL', 'SE ENVIA LA RESPUESTA SUPERUSUARIO ', '', '1', '1', 'EXTERNO', '2017-04-27 15:19:38', '10', '2017-04-27 15:19:38', '10');

-- ----------------------------
-- Table structure for sigi_oficios_documentos_recepcion
-- ----------------------------
DROP TABLE IF EXISTS `sigi_oficios_documentos_recepcion`;
CREATE TABLE `sigi_oficios_documentos_recepcion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `id_oficio` int(11) NOT NULL,
  `id_documentos` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `ccp` int(1) DEFAULT '0',
  `fecha_visto` datetime DEFAULT NULL,
  `estatus_inicial` enum('Para el trámite que corresponda','Para conocimiento y archivo') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `estatus_final` enum('Cerrado','Abierto','Cancelado') CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sigi_oficios_documentos_recepcion
-- ----------------------------
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('1', null, '1', '1', '9', '0', '2017-04-24 14:33:35', 'Para el trámite que corresponda', 'Abierto', '2017-04-24 13:45:19', '10', '2017-04-24 13:45:19', '10');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('2', null, '1', '1', '2', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-04-24 13:45:19', '10', '2017-04-24 13:45:19', '10');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('3', null, '1', '1', '7', '1', '2017-04-24 14:46:41', 'Para el trámite que corresponda', 'Abierto', '2017-04-24 13:45:19', '10', '2017-04-24 13:45:19', '10');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('4', null, '2', '2', '7', '0', '2017-04-25 12:47:49', 'Para el trámite que corresponda', 'Abierto', '2017-04-24 14:33:27', '9', '2017-04-24 14:33:27', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('5', null, '2', '2', '5', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-04-24 14:33:27', '9', '2017-04-24 14:33:27', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('6', null, '3', '3', '7', '0', '2017-04-25 13:15:34', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 13:15:05', '10', '2017-04-25 13:20:18', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('7', '3', '4', '4', '0', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 13:20:18', '7', '2017-04-25 13:20:18', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('8', null, '5', '5', '7', '0', '2017-04-25 13:27:32', 'Para conocimiento y archivo', 'Cerrado', '2017-04-25 13:25:35', '10', '2017-04-25 13:27:32', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('9', null, '5', '5', '9', '1', '2017-04-25 13:26:18', 'Para conocimiento y archivo', 'Cerrado', '2017-04-25 13:25:35', '10', '2017-04-25 13:27:32', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('10', null, '6', '6', '7', '0', '2017-04-25 13:34:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 13:28:37', '10', '2017-04-25 13:34:00', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('11', null, '6', '6', '9', '1', '2017-04-25 13:29:02', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 13:28:37', '10', '2017-04-25 13:34:00', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('12', null, '7', '7', '9', '0', '2017-04-25 13:35:14', 'Para el trámite que corresponda', 'Abierto', '2017-04-25 13:34:46', '10', '2017-04-25 14:35:45', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('13', null, '7', '7', '9', '1', '2017-04-25 13:35:14', 'Para el trámite que corresponda', 'Abierto', '2017-04-25 13:34:46', '10', '2017-04-25 14:35:45', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('14', '7', '8', '8', '0', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-04-25 13:35:42', '9', '2017-04-25 14:35:45', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('15', null, '9', '9', '7', '0', '2017-04-25 13:38:57', 'Para conocimiento y archivo', 'Cerrado', '2017-04-25 13:37:07', '10', '2017-04-25 13:38:57', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('16', null, '9', '9', '9', '1', '2017-04-25 13:38:03', 'Para conocimiento y archivo', 'Cerrado', '2017-04-25 13:37:07', '10', '2017-04-25 13:38:57', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('17', null, '10', '10', '7', '0', '2017-04-25 13:49:50', 'Para conocimiento y archivo', 'Cerrado', '2017-04-25 13:39:34', '10', '2017-04-25 13:49:50', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('18', null, '10', '10', '9', '1', '2017-04-25 13:49:29', 'Para conocimiento y archivo', 'Cerrado', '2017-04-25 13:39:51', '7', '2017-04-25 13:49:29', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('19', null, '11', '11', '7', '0', '2017-04-25 13:51:49', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 13:50:43', '10', '2017-04-25 13:55:32', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('20', null, '11', '11', '9', '1', '2017-04-25 13:51:19', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 13:50:43', '10', '2017-04-25 13:55:32', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('21', '11', '12', '12', '0', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 13:55:32', '7', '2017-04-25 13:55:32', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('22', null, '13', '13', '7', '0', '2017-04-25 13:57:59', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 13:57:09', '9', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('23', null, '13', '13', '8', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 13:57:09', '9', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('24', '13', '14', '14', '9', '0', '2017-04-25 14:00:09', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 13:58:45', '7', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('25', '13', '15', '15', '7', '0', '2017-04-25 14:03:49', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 14:02:39', '9', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('26', '13', '16', '16', '9', '0', '2017-04-25 14:07:16', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 14:04:27', '7', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('27', '13', '17', '17', '7', '0', '2017-04-25 14:11:49', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 14:07:47', '9', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('28', '13', '18', '18', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 14:18:02', '7', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('29', '13', '19', '19', '7', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 14:21:04', '9', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('30', '13', '20', '20', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 14:21:47', '7', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('31', '13', '21', '21', '7', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 14:29:00', '9', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('32', '13', '22', '22', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 14:29:48', '7', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('33', '13', '23', '23', '7', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 14:34:35', '9', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('34', '13', '24', '24', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 14:35:45', '7', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('35', '13', '25', '25', '7', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 14:40:32', '9', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('36', '13', '26', '26', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 14:43:04', '7', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('37', '13', '27', '27', '7', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 14:46:18', '9', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('38', '13', '28', '28', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 14:46:44', '7', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('39', '13', '29', '29', '7', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 14:49:20', '9', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('40', '13', '30', '30', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 14:50:04', '7', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('41', '13', '31', '31', '7', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 14:56:57', '9', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('42', '13', '32', '32', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 15:07:45', '7', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('43', '13', '33', '33', '7', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 15:21:45', '9', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('44', '13', '34', '34', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 15:22:21', '7', '2017-04-25 15:22:21', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('45', null, '35', '35', '7', '0', '2017-04-25 15:24:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 15:23:22', '9', '2017-04-25 15:26:07', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('46', null, '35', '35', '8', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 15:23:22', '9', '2017-04-25 15:26:07', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('47', '35', '36', '36', '9', '0', '2017-04-25 15:25:01', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 15:23:50', '7', '2017-04-25 15:26:07', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('48', '35', '37', '37', '7', '0', '2017-04-25 15:25:51', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 15:25:30', '9', '2017-04-25 15:26:07', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('49', '35', '38', '38', '9', '0', '2017-04-25 15:26:43', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 15:26:07', '7', '2017-04-25 15:26:07', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('50', null, '39', '39', '9', '0', '2017-04-25 15:28:17', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 15:27:41', '10', '2017-04-25 15:28:41', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('51', null, '39', '39', '7', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 15:27:41', '10', '2017-04-25 15:28:41', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('52', '39', '40', '40', '0', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 15:28:41', '9', '2017-04-25 15:28:41', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('53', null, '41', '41', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 15:29:57', '10', '2017-04-25 15:30:25', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('54', null, '41', '41', '7', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 15:29:57', '10', '2017-04-25 15:30:25', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('55', '41', '42', '42', '0', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-25 15:30:25', '9', '2017-04-25 15:30:25', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('56', null, '43', '43', '9', '0', '2017-04-25 15:31:16', 'Para conocimiento y archivo', 'Cerrado', '2017-04-25 15:31:01', '10', '2017-04-25 15:31:16', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('57', null, '43', '43', '7', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-04-25 15:31:01', '10', '2017-04-25 15:31:01', '10');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('58', null, '44', '44', '10', '0', '2017-04-25 15:49:03', 'Para el trámite que corresponda', 'Cancelado', '2017-04-25 15:33:12', '9', '2017-04-27 15:12:19', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('59', null, '45', '45', '9', '0', '2017-04-26 09:35:49', 'Para el trámite que corresponda', 'Cerrado', '2017-04-26 09:30:25', '10', '2017-04-26 09:36:19', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('60', null, '45', '45', '7', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-26 09:30:25', '10', '2017-04-26 09:36:19', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('61', '45', '46', '46', '0', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-26 09:36:19', '9', '2017-04-26 09:36:19', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('62', null, '47', '47', '7', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-26 10:08:29', '9', '2017-04-26 10:09:25', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('63', '47', '48', '48', '9', '0', '2017-04-26 10:09:51', 'Para el trámite que corresponda', 'Cerrado', '2017-04-26 10:09:25', '7', '2017-04-26 10:09:25', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('64', null, '49', '49', '7', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cancelado', '2017-04-26 10:12:08', '9', '2017-04-26 10:12:15', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('65', null, '50', '50', '9', '0', '2017-04-26 10:52:23', 'Para el trámite que corresponda', 'Cerrado', '2017-04-26 10:51:21', '10', '2017-04-26 11:04:55', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('66', null, '50', '50', '7', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-26 10:51:21', '10', '2017-04-26 11:04:55', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('67', '50', '51', '51', '0', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-26 11:04:55', '9', '2017-04-26 11:04:55', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('68', null, '52', '52', '7', '0', '2017-04-26 11:18:28', 'Para el trámite que corresponda', 'Cancelado', '2017-04-26 11:17:53', '9', '2017-04-27 15:07:42', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('69', null, '52', '52', '8', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cancelado', '2017-04-26 15:29:03', '7', '2017-04-27 15:07:42', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('70', null, '53', '53', '1', '0', '2017-04-27 12:25:08', 'Para el trámite que corresponda', 'Cerrado', '2017-04-27 11:50:05', '9', '2017-04-27 13:37:09', '1');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('71', null, '53', '53', '7', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-27 12:24:56', '1', '2017-04-27 13:37:09', '1');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('72', '53', '54', '54', '9', '0', '2017-04-27 12:41:35', 'Para el trámite que corresponda', 'Cerrado', '2017-04-27 12:40:52', '1', '2017-04-27 13:37:09', '1');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('73', '53', '55', '55', '1', '0', '2017-04-27 13:36:35', 'Para el trámite que corresponda', 'Cerrado', '2017-04-27 13:15:42', '9', '2017-04-27 13:37:09', '1');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('74', '53', '56', '56', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-27 13:37:09', '1', '2017-04-27 13:37:09', '1');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('75', null, '57', '57', '9', '0', '2017-04-27 13:50:15', 'Para el trámite que corresponda', 'Cerrado', '2017-04-27 13:44:42', '1', '2017-04-27 13:50:06', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('76', null, '57', '57', '7', '1', '2017-04-27 13:45:49', 'Para el trámite que corresponda', 'Cerrado', '2017-04-27 13:44:42', '1', '2017-04-27 13:50:06', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('77', '57', '58', '58', '1', '0', '2017-04-27 13:50:48', 'Para el trámite que corresponda', 'Cerrado', '2017-04-27 13:50:06', '9', '2017-04-27 13:50:06', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('78', null, '59', '59', '10', '0', '2017-04-27 15:20:08', 'Para el trámite que corresponda', 'Abierto', '2017-04-27 14:53:32', '9', '2017-04-27 14:53:32', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('79', null, '60', '60', '10', '0', '2017-04-27 15:18:04', 'Para el trámite que corresponda', 'Cerrado', '2017-04-27 15:15:44', '1', '2017-04-27 15:19:38', '10');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('80', null, '60', '60', '7', '1', '2017-04-27 15:16:46', 'Para el trámite que corresponda', 'Cerrado', '2017-04-27 15:15:44', '1', '2017-04-27 15:19:38', '10');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('81', '60', '61', '61', '1', '0', '2017-04-27 15:20:02', 'Para el trámite que corresponda', 'Cerrado', '2017-04-27 15:19:38', '10', '2017-04-27 15:19:38', '10');

-- ----------------------------
-- Table structure for siu_coga
-- ----------------------------
DROP TABLE IF EXISTS `siu_coga`;
CREATE TABLE `siu_coga` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `folio` int(255) NOT NULL,
  `solicitante` varchar(255) NOT NULL,
  `fecha_solicitud` tinytext NOT NULL,
  `areaa` varchar(255) NOT NULL,
  `tipo_solicitud` varchar(255) NOT NULL,
  `tipo_falla` varchar(255) NOT NULL,
  `descripcion` tinytext NOT NULL,
  `evento` tinytext NOT NULL,
  `lugar` tinytext NOT NULL,
  `fecha_event` date NOT NULL,
  `quien_atiende` tinytext NOT NULL,
  `resuelto` tinyint(255) NOT NULL,
  `hora_de_resolucion` varchar(255) NOT NULL,
  `observaciones_de_soporte` tinytext NOT NULL,
  `calificacion_servicio` tinytext NOT NULL,
  `activo` tinyint(255) NOT NULL,
  `activo_evento` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of siu_coga
-- ----------------------------
INSERT INTO `siu_coga` VALUES ('1', '1000000001', '', '', '', '', '', '', '', '', '0000-00-00', '', '0', '', '', '', '0', '0');
INSERT INTO `siu_coga` VALUES ('2', '1000000002', 'Martin Contreras', 'Martes 28 de Marzo del 2017,  Hora: 15:34:55', 'Unidad Técnica de Transparencia y Acceso a la Información', 'Impresora', 'Soporte Técnico', 'No funciona para nada', '0', '0', '0000-00-00', '0', '0', '0', '', '0', '1', '0');
INSERT INTO `siu_coga` VALUES ('3', '1000000003', 'Juan Zamora', 'Martes 28 de Marzo del 2017,  Hora: 15:41:04', 'Unidad Técnica de Transparencia y Acceso a la Información', 'Computadora', 'Soporte Técnico', 'esta muy lenta y no funciona para mis utilitarias ', '0', '0', '0000-00-00', '0', '0', '0', '', '0', '1', '0');
INSERT INTO `siu_coga` VALUES ('4', '1000000004', 'Juan Zamora', 'Martes 28 de Marzo del 2017,  Hora: 15:48:18', 'Unidad Técnica de Oficialía Electoral', 'Laptop', 'Soporte Técnico', 'aaaa', '0', '0', '0000-00-00', '0', '0', '0', '', '0', '1', '0');
INSERT INTO `siu_coga` VALUES ('5', '1000000005', 'Juan Zamora', 'Martes 28 de Marzo del 2017,  Hora: 15:49:43', 'Unidad Técnica de Transparencia y Acceso a la Información', 'Laptop', 'Soporte Técnico', 'juan zamora', '0', '0', '0000-00-00', '0', '0', '0', '', '0', '1', '0');
INSERT INTO `siu_coga` VALUES ('6', '1000000006', 'Juan Zamora', 'Martes 28 de Marzo del 2017,  Hora: 16:22:26', 'Unidad Técnica de Transparencia y Acceso a la Información', 'Computadora', 'Soporte Técnico', 'no funciona para nada ', '0', '0', '0000-00-00', '0', '0', '0', '', '0', '1', '0');
INSERT INTO `siu_coga` VALUES ('7', '1000000007', 'Juan Zamora', 'Martes 28 de Marzo del 2017,  Hora: 16:23:49', 'Unidad Técnica de Transparencia y Acceso a la Información', 'Impresora', 'Soporte Técnico', 'meteco avanza ', '0', '0', '0000-00-00', '0', '0', '0', '', '0', '1', '0');
INSERT INTO `siu_coga` VALUES ('8', '1000000008', 'Juan Zamora', 'Martes 28 de Marzo del 2017,  Hora: 16:25:00', 'Unidad Técnica de Servicio Profesional Electoral', 'Laptop', 'Soporte Técnico', 'México\r\n', '0', '0', '0000-00-00', '0', '0', '0', '', '0', '1', '0');
INSERT INTO `siu_coga` VALUES ('9', '1000000009', 'Juan Zamora', 'Martes 28 de Marzo del 2017,  Hora: 16:26:09', 'Unidad Técnica de Transparencia y Acceso a la Información', 'Impresora', 'Soporte Técnico', 'NO FUNCIONA ', '0', '0', '0000-00-00', '0', '0', '0', '', '0', '1', '0');
INSERT INTO `siu_coga` VALUES ('10', '1000000010', 'Juan Zamora', 'Martes 28 de Marzo del 2017,  Hora: 16:26:55', 'Unidad Técnica de Vinculación con el INE', 'Impresora', 'Soporte Técnico', 'no funciona la impresora', '0', '0', '0000-00-00', '0', '0', '0', '', '0', '1', '0');
INSERT INTO `siu_coga` VALUES ('11', '1000000011', 'Martin Contreras', 'Martes 28 de Marzo del 2017,  Hora: 21:12:23', 'Unidad Técnica de Transparencia y Acceso a la Información', 'Computadora', 'Soporte Técnico', 'Estoy en mi casa y no funciona el internet súper rodo ayudame', '0', '0', '0000-00-00', '0', '0', '0', '', '0', '1', '0');
INSERT INTO `siu_coga` VALUES ('12', '1000000011', 'Martin Contreras', 'Martes 28 de Marzo del 2017,  Hora: 21:12:23', 'Unidad Técnica de Transparencia y Acceso a la Información', 'Computadora', 'Soporte Técnico', 'Estoy en mi casa y no funciona el internet súper rodo ayudame', '0', '0', '0000-00-00', '0', '0', '0', '', '0', '1', '0');
INSERT INTO `siu_coga` VALUES ('13', '1000000012', 'Martin Contreras', 'Viernes 31 de Marzo del 2017,  Hora: 10:28:10', 'Secrearia Técnica', 'Laptop', '', '', '0', '0', '0000-00-00', '0', '0', '0', '', '0', '1', '0');

-- ----------------------------
-- Table structure for solicitudes
-- ----------------------------
DROP TABLE IF EXISTS `solicitudes`;
CREATE TABLE `solicitudes` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_evento` text COLLATE utf8_spanish_ci NOT NULL,
  `lugar_evento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_evento` date NOT NULL,
  `fecha_evento_fin` date NOT NULL,
  `hora_evento_ini` time NOT NULL,
  `hora_evento_fin` time NOT NULL,
  `area_evento` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_solicita` int(255) NOT NULL,
  `fecha_soliciud` datetime NOT NULL,
  `color_fondo` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `color_texto` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_agenda` int(1) NOT NULL,
  `ediciones` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of solicitudes
-- ----------------------------
INSERT INTO `solicitudes` VALUES ('1', 'CE.jpg', 'xxx', '---', '2017-04-06', '2017-04-07', '00:00:01', '23:59:00', '11', '1', '2017-04-03 14:23:04', '#ff8040', null, '2', '----- La creaci?n de la publicaci?n se realizo corectamente: 2017-04-03 14:23:04 por el usuario Larry Vargas <br> \n----- La solicitud fue aceptada el 2017-04-03 14:23:04 por el usuario Larry Vargas <br> \n----- La edici?n se realizo corectamente en la fecha: 2017-04-03 14:23:35 por el usuario Larry Vargas <br> \n----- La solicitud fue aceptada el 2017-04-03 14:23:35 por el usuario Larry Vargas <br> \n----- La edición se realizo corectamente en la fecha: 2017-04-04 13:38:55 por el usuario Galo Solano <br> \n----- La solicitud fue aceptada el 2017-04-04 13:38:55 por el usuario Galo Solano <br> \n', '9');
INSERT INTO `solicitudes` VALUES ('2', 'e909be9d0c0468ad29155ecd942e59f7.jpg', 'PRESENTACIÓN DE LA ESTRATEGIA NACIONAL DE CULTURA CÍVICA 2017-2023', 'Estacionamiento del IEPC', '2017-04-04', '2017-04-04', '12:00:00', '13:00:00', '6', '6', '2017-04-04 12:11:06', '#8c1b67', null, '1', '----- La creación de la publicación se realizo corectamente: 2017-04-04 12:11:06 por el usuario Abisai Vargas <br> \n----- La solicitud fue aceptada el 2017-04-04 23:34:26 por el usuario   <br> \n', '9');
INSERT INTO `solicitudes` VALUES ('3', 'c12ffb5f4a5ad3c068e4b0ec60e9e88c.jpg', 'CULTURA CÍVICA 2017-2023', 'Presidencia', '2017-04-04', '2017-04-04', '13:00:00', '14:00:00', '6', '6', '2017-04-04 13:17:30', '#8c1b67', null, '1', '----- La creación de la publicación se realizo corectamente: 2017-04-04 13:17:30 por el usuario Abisai Vargas <br> \n----- La solicitud fue aceptada el 2017-04-05 00:17:39 por el usuario   <br> \n', '9');
INSERT INTO `solicitudes` VALUES ('4', '6a10f397b8864dcbb8d1c0f36aa91e21.jpg', 'TORNEO DE TERCIAS', 'Estacionamiento del IEPC', '2017-04-07', '2017-04-07', '16:00:00', '18:00:00', '11', '2', '2017-04-04 13:40:49', '#8c1b67', null, '1', '----- La creación de la publicación se realizo corectamente: 2017-04-04 13:40:49 por el usuario Galo Solano <br> \n----- La solicitud fue aceptada el 2017-04-04 13:40:49 por el usuario Galo Solano <br> \n', '9');
INSERT INTO `solicitudes` VALUES ('5', 'CE.jpg', 'evento nuevo', '---', '2017-04-06', '2017-04-06', '00:00:01', '23:59:00', '11', '1', '2017-04-06 16:03:11', '#000000', null, '2', '----- La creaciÃ³n de la publicaciÃ³n se realizo corectamente: 2017-04-06 16:03:11 por el usuario Larry Vargas <br> \n----- La solicitud fue aceptada el 2017-04-06 16:03:11 por el usuario Larry Vargas <br> \n', '9');
INSERT INTO `solicitudes` VALUES ('6', 'a0bf520c50ba92334f99410f7c2ce588.jpg', 'evento probando', 'Estacionamiento del IEPC', '2017-04-07', '2017-04-07', '09:00:00', '10:00:00', '5', '1', '2017-04-06 16:04:27', '#8c1b67', null, '1', '----- La creaci?n de la publicaci?n se realizo corectamente: 2017-04-06 16:04:27 por el usuario Larry Vargas <br> \n----- La solicitud fue aceptada el 2017-04-06 16:04:27 por el usuario Larry Vargas <br> \n----- La edici?n se realizo corectamente en la fecha: 2017-04-07 13:22:48 por el usuario Larry Vargas <br> \n----- La solicitud fue aceptada el 2017-04-07 13:22:48 por el usuario Larry Vargas <br> \n----- La edición se realizo corectamente en la fecha: 2017-04-07 13:24:09 por el usuario Larry Vargas <br> \n----- La solicitud fue aceptada el 2017-04-07 13:24:09 por el usuario Larry Vargas <br> \n', '9');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `contrasena` text COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `area` int(255) NOT NULL,
  `privilegios` int(1) NOT NULL,
  `priv_sigi` int(1) NOT NULL,
  `priv_sui` int(1) NOT NULL,
  `priv_sia` int(1) NOT NULL,
  `titular` int(1) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'Larry', 'Vargas', 'e807f1fcf82d132f9bb018ca6738a19f', '5390db054a81ba9121daa299dc28abc7', '11', '1', '2', '1', '1', '1', '1');
INSERT INTO `usuarios` VALUES ('2', 'Galo', 'Solano', 'e807f1fcf82d132f9bb018ca6738a19f', '84f0c3a18121812c30aef815c9eee92d', '11', '1', '1', '1', '1', '0', '1');
INSERT INTO `usuarios` VALUES ('3', 'Cesar', 'Victorino', 'e807f1fcf82d132f9bb018ca6738a19f', 'f2ef0011ba570a8e73cb9f8ae59dbcc0', '11', '1', '1', '1', '1', '0', '1');
INSERT INTO `usuarios` VALUES ('4', 'Martin', 'Contreras', 'e807f1fcf82d132f9bb018ca6738a19f', '51dae92dc3c9f6beb89c384399837d8b', '11', '1', '1', '1', '1', '0', '1');
INSERT INTO `usuarios` VALUES ('5', 'Juan', 'Zamora', 'e807f1fcf82d132f9bb018ca6738a19f', '0426d5d82dc5aa8741562ffb92fd8347', '13', '1', '1', '1', '1', '1', '1');
INSERT INTO `usuarios` VALUES ('6', 'Abisai', 'Vargas', 'e807f1fcf82d132f9bb018ca6738a19f', 'bf7a21b8aa60e85d309842dd7a202409', '11', '3', '3', '3', '3', '0', '1');
INSERT INTO `usuarios` VALUES ('7', 'Pedro', 'Perez', 'e807f1fcf82d132f9bb018ca6738a19f', 'd9b624e5119506eee9fd10bd6861cd30', '3', '3', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('8', 'Abisai', 'Chavez', 'e807f1fcf82d132f9bb018ca6738a19f', '7b5f522d0fc2673608d633898eac81b3', '13', '3', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('9', 'Mario', 'Canales', 'e807f1fcf82d132f9bb018ca6738a19f', '23636b9887b68ebaaaf7b25e1af762e4', '4', '3', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('10', 'Vanessa', 'Perez', 'e807f1fcf82d132f9bb018ca6738a19f', '0c9d7463e807e2fa2e8e0c369f9be527', '14', '1', '1', '0', '0', '1', '1');

-- ----------------------------
-- View structure for sigi_vw_oficios_des_externo
-- ----------------------------
DROP VIEW IF EXISTS `sigi_vw_oficios_des_externo`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `sigi_vw_oficios_des_externo` AS SELECT
	ofc.id AS id_oficio,
	ofc.origen as origen,
	ofc.tipo_oficio,
	ofc.folio AS folio,
	ofc.folio_institucion,
	ofc.id_usuario_emisor AS id_usuario_emisor,
	odr.ccp,
	ar.nombre as area,
	CONCAT(us.nombre,' ',us.apellido) as usuario,
	odr.id_usuario AS id_usuario_receptor,
	ofc.nombre_emisor AS nombre_destino,
	ofc.cargo AS cargo_destino,
	ofc.institucion_emisor AS institucion_destino,
	ofc.asunto_emisor AS asunto_emisor,
	odr.estatus_inicial AS estatus_inicial,
	odr.estatus_final AS estatus_final,
	ofc.updated_at AS fecha_recibido,
	odr.fecha_visto as fecha_visto
FROM
	sigi_oficios ofc
JOIN sigi_oficios_documentos_recepcion odr ON odr.id_oficio = ofc.id
JOIN sigi_documentos doc ON doc.id = odr.id_documentos
JOIN usuarios us ON us.id = ofc.id_usuario_emisor
JOIN areas ar ON ar.id = us.area
WHERE
	origen = 'INTERNO' AND ofc.tipo_oficio = 'SOLICITUD' AND ofc.destino = 'EXTERNO' ; ;

-- ----------------------------
-- View structure for sigi_vw_oficios_externos
-- ----------------------------
DROP VIEW IF EXISTS `sigi_vw_oficios_externos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `sigi_vw_oficios_externos` AS SELECT
	ofc.id AS id_oficio,
	ofc.origen,
	ofc.tipo_oficio,
	ofc.folio AS folio,
	ofc.folio_institucion AS folio_institucion,
	ofc.id_usuario_emisor AS id_usuario_emisor,
	#IF(ofc.tipo_oficio = 'RESPUESTA',(SELECT CONCAT(utemp.nombre,' ',utemp.apellido) FROM usuarios utemp WHERE utemp.id = ofc.id_usuario_emisor),'')as persona_responde,
	odr.id_usuario AS id_usuario_receptor,
	ofc.nombre_emisor AS nombre_emisor,
	ofc.cargo AS cargo,
	ofc.institucion_emisor AS institucion_emisor,
	ofc.asunto_emisor AS asunto_emisor,
	odr.estatus_inicial AS estatus_inicial,
	odr.estatus_final AS estatus_final,
	ofc.created_at as fecha_recibido,
	odr.fecha_visto as fecha_visto
FROM
	sigi_oficios ofc
JOIN sigi_oficios_documentos_recepcion odr ON odr.id_oficio = ofc.id
JOIN sigi_documentos doc ON doc.id = odr.id_documentos
WHERE origen = 'EXTERNO' AND ofc.tipo_oficio = 'SOLICITUD' AND ofc.destino = 'INTERNO' ;

-- ----------------------------
-- View structure for sigi_vw_oficios_internos
-- ----------------------------
DROP VIEW IF EXISTS `sigi_vw_oficios_internos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `sigi_vw_oficios_internos` AS SELECT
	ofc.id AS id_oficio,
	ofc.origen as origen,
	ofc.tipo_oficio,
	ofc.folio AS folio,
	ofc.id_usuario_emisor AS id_usuario_emisor,
	odr.ccp,
  #IF(ofc.tipo_oficio = 'RESPUESTA',(SELECT CONCAT(utemp.nombre,' ',utemp.apellido) FROM usuarios utemp WHERE utemp.id = ofc.id_usuario_emisor),'')as persona_responde,
	ar.nombre as area,
	CONCAT(us.nombre,' ',us.apellido) as usuario,
	odr.id_usuario AS id_usuario_receptor,
	ofc.asunto_emisor AS asunto_emisor,
	odr.estatus_inicial AS estatus_inicial,
	odr.estatus_final AS estatus_final,
	ofc.created_at AS fecha_recibido,
	odr.fecha_visto as fecha_visto
FROM
	sigi_oficios ofc
JOIN sigi_oficios_documentos_recepcion odr ON odr.id_oficio = ofc.id
JOIN sigi_documentos doc ON doc.id = odr.id_documentos
JOIN usuarios us ON us.id = ofc.id_usuario_emisor
JOIN areas ar ON ar.id = us.area
WHERE
	origen = 'INTERNO' AND ofc.tipo_oficio = 'SOLICITUD' AND ofc.destino = 'INTERNO' ;

-- ----------------------------
-- View structure for sigi_vw_respuestas_enviadas
-- ----------------------------
DROP VIEW IF EXISTS `sigi_vw_respuestas_enviadas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `sigi_vw_respuestas_enviadas` AS SELECT
	ofc.id AS id_oficio,
	odr.parent_id as parent_id,
	ofc.origen,
	ofc.folio AS folio,
	ofc.id_usuario_emisor AS id_usuario_emisor,
IF (
	ofc.origen = 'INTERNO',
	CONCAT(us.nombre,' ',us.apellido, ' de ', ar.abreviatura),
	CONCAT(ofc.nombre_emisor,' de ',ofc.institucion_emisor)
) AS persona_recibe,
 odr.id_usuario AS id_usuario_receptor,
 ofc.asunto_emisor AS asunto_emisor,
 odr.estatus_inicial as estatus_inicial,
 ofc.created_at AS fecha_enviado,
 odr.fecha_visto as fecha_visto
FROM
	sigi_oficios ofc
JOIN sigi_oficios_documentos_recepcion odr ON odr.id_oficio = ofc.id
JOIN sigi_documentos doc ON doc.id = odr.id_documentos
LEFT JOIN usuarios us ON us.id = odr.id_usuario
LEFT JOIN areas ar ON ar.id = us.area
WHERE
	ofc.tipo_oficio = 'RESPUESTA' ;

-- ----------------------------
-- View structure for sigi_vw_respuestas_recibidas
-- ----------------------------
DROP VIEW IF EXISTS `sigi_vw_respuestas_recibidas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `sigi_vw_respuestas_recibidas` AS SELECT
	ofc.id AS id_oficio,
	ofc.folio AS folio,
	odr.parent_id as parent_id,
	ofc.id_usuario_emisor AS id_usuario_emisor,
	ar.nombre as area,
	CONCAT(us.nombre,' ',us.apellido) as persona_responde,
	odr.id_usuario AS id_usuario_receptor,
	ofc.asunto_emisor AS asunto_emisor,
	odr.estatus_inicial AS estatus_inicial,
	odr.estatus_final AS estatus_final,
	ofc.created_at AS fecha_recibido,
	odr.fecha_visto as fecha_visto
FROM
	sigi_oficios ofc
JOIN sigi_oficios_documentos_recepcion odr ON odr.id_oficio = ofc.id
JOIN sigi_documentos doc ON doc.id = odr.id_documentos
JOIN usuarios us ON us.id = ofc.id_usuario_emisor
JOIN areas ar ON ar.id = us.area
WHERE
	ofc.tipo_oficio = 'RESPUESTA' ;
