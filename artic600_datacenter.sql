/*
Navicat MySQL Data Transfer

Source Server         : iepc
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : artic600_datacenter

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-05-26 15:32:55
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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of areas
-- ----------------------------
INSERT INTO `areas` VALUES ('1', 'Presidencia', '1', 'PRES');
INSERT INTO `areas` VALUES ('2', 'Consejeros Electorales', '0', 'CE');
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
INSERT INTO `areas` VALUES ('15', 'Consejera Lic. Laura Fabiola Bringas Sanchez', '1', 'CE');
INSERT INTO `areas` VALUES ('16', 'Consejero Lic. Francisco Javier Gonzalez Pérez', '1', 'CE');
INSERT INTO `areas` VALUES ('17', 'Consejera Lic. Mirza Mayela Ramirez Ramirez', '1', 'CE');
INSERT INTO `areas` VALUES ('18', 'Consejero Lic. Manuel Montoya Del Campo', '1', 'CE');
INSERT INTO `areas` VALUES ('19', 'Consejero Lic. Fernando De Jesus Roman Quiñones', '1', 'CE');
INSERT INTO `areas` VALUES ('20', 'Consejera Dra. Esmeralda Valles López', '1', 'CE');

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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sigi_documentos
-- ----------------------------
INSERT INTO `sigi_documentos` VALUES ('1', 'S000000012017-05-17-15-04-36CONT', '0', 'documentos/', '2017-05-17 15:04:36', '10', '2017-05-17 15:04:36', '10');
INSERT INTO `sigi_documentos` VALUES ('2', 'R000000012017-05-17-15-05-20CONT', '0', 'documentos/', '2017-05-17 15:05:20', '9', '2017-05-17 15:05:20', '9');
INSERT INTO `sigi_documentos` VALUES ('3', 'R000000012017-05-17-15-05-20CONT', '0', 'documentos/', '2017-05-17 15:05:20', '9', '2017-05-17 15:05:20', '9');
INSERT INTO `sigi_documentos` VALUES ('4', 'R000000022017-05-17-15-06-53CONT', '0', 'documentos/', '2017-05-17 15:06:53', '9', '2017-05-17 15:06:53', '9');
INSERT INTO `sigi_documentos` VALUES ('5', 'S000000032017-05-17-15-28-08CONT', '0', 'documentos/', '2017-05-17 15:28:08', '10', '2017-05-17 15:28:08', '10');
INSERT INTO `sigi_documentos` VALUES ('6', 'R000000042017-05-17-15-28-45CONT', '0', 'documentos/', '2017-05-17 15:28:45', '9', '2017-05-17 15:28:45', '9');
INSERT INTO `sigi_documentos` VALUES ('7', 'S000000052017-05-17-15-32-50CONT', '0', 'documentos/', '2017-05-17 15:32:50', '10', '2017-05-17 15:32:50', '10');
INSERT INTO `sigi_documentos` VALUES ('8', 'R000000062017-05-17-15-33-34CONT', '0', 'documentos/', '2017-05-17 15:33:34', '9', '2017-05-17 15:33:34', '9');
INSERT INTO `sigi_documentos` VALUES ('9', 'S000000072017-05-17-15-37-12CONT', '0', 'documentos/', '2017-05-17 15:37:12', '10', '2017-05-17 15:37:12', '10');
INSERT INTO `sigi_documentos` VALUES ('10', 'R000000082017-05-17-15-38-18CONT', '0', 'documentos/', '2017-05-17 15:38:18', '9', '2017-05-17 15:38:18', '9');
INSERT INTO `sigi_documentos` VALUES ('11', 'S000000092017-05-17-15-42-12CONT', '0', 'documentos/', '2017-05-17 15:42:12', '10', '2017-05-17 15:42:12', '10');
INSERT INTO `sigi_documentos` VALUES ('12', 'R000000092017-05-17-15-49-05CONT', '0', 'documentos/', '2017-05-17 15:49:05', '9', '2017-05-17 15:49:05', '9');
INSERT INTO `sigi_documentos` VALUES ('13', 'S000000102017-05-18-12-08-55CONT', '0', 'documentos/', '2017-05-18 12:08:55', '7', '2017-05-18 12:08:55', '7');
INSERT INTO `sigi_documentos` VALUES ('14', 'S000000112017-05-18-12-11-04CONT', '0', 'documentos/', '2017-05-18 12:11:04', '7', '2017-05-18 12:11:04', '7');
INSERT INTO `sigi_documentos` VALUES ('15', 'S000000122017-05-18-12-19-16CONT', '0', 'documentos/', '2017-05-18 12:19:16', '7', '2017-05-18 12:19:16', '7');
INSERT INTO `sigi_documentos` VALUES ('16', 'R000000122017-05-18-12-19-46CONT', '0', 'documentos/', '2017-05-18 12:19:46', '9', '2017-05-18 12:19:46', '9');
INSERT INTO `sigi_documentos` VALUES ('17', 'S000000132017-05-18-12-41-15SE', '0', 'documentos/', '2017-05-18 12:41:15', '9', '2017-05-18 12:41:15', '9');
INSERT INTO `sigi_documentos` VALUES ('18', 'R000000132017-05-18-12-42-07SE', '0', 'documentos/', '2017-05-18 12:42:07', '7', '2017-05-18 12:42:07', '7');
INSERT INTO `sigi_documentos` VALUES ('19', 'R000000132017-05-18-12-46-48CONT', '0', 'documentos/', '2017-05-18 12:46:48', '9', '2017-05-18 12:46:48', '9');
INSERT INTO `sigi_documentos` VALUES ('20', 'R000000132017-05-18-12-47-38SE', '0', 'documentos/', '2017-05-18 12:47:38', '7', '2017-05-18 12:47:38', '7');
INSERT INTO `sigi_documentos` VALUES ('21', 'R000000132017-05-18-12-51-10CONT', '0', 'documentos/', '2017-05-18 12:51:10', '9', '2017-05-18 12:51:10', '9');
INSERT INTO `sigi_documentos` VALUES ('22', 'R000000132017-05-18-12-52-05SE', '0', 'documentos/', '2017-05-18 12:52:05', '7', '2017-05-18 12:52:05', '7');
INSERT INTO `sigi_documentos` VALUES ('23', 'S000000142017-05-18-13-08-55CONT', '0', 'documentos/', '2017-05-18 13:08:55', '10', '2017-05-18 13:08:55', '10');
INSERT INTO `sigi_documentos` VALUES ('24', 'S000000152017-05-18-13-25-05CONT', '0', 'documentos/', '2017-05-18 13:25:05', '7', '2017-05-18 13:25:05', '7');
INSERT INTO `sigi_documentos` VALUES ('25', 'R000000152017-05-18-13-54-53CONT', '0', 'documentos/', '2017-05-18 13:54:53', '9', '2017-05-18 13:54:53', '9');
INSERT INTO `sigi_documentos` VALUES ('26', 'S000000162017-05-19-14-40-19CONT', '0', 'documentos/', '2017-05-19 14:40:19', '16', '2017-05-19 14:40:19', '16');
INSERT INTO `sigi_documentos` VALUES ('27', 'R000000162017-05-19-14-43-28CONT', '0', 'documentos/', '2017-05-19 14:43:28', '9', '2017-05-19 14:43:28', '9');
INSERT INTO `sigi_documentos` VALUES ('28', 'R000000162017-05-19-14-44-42CE', '0', 'documentos/', '2017-05-19 14:44:42', '16', '2017-05-19 14:44:42', '16');
INSERT INTO `sigi_documentos` VALUES ('29', 'R000000162017-05-19-14-46-08CONT', '0', 'documentos/', '2017-05-19 14:46:08', '9', '2017-05-19 14:46:08', '9');
INSERT INTO `sigi_documentos` VALUES ('30', 'S000000172017-05-22-14-37-58SE', '0', 'documentos/', '2017-05-22 14:37:58', '9', '2017-05-22 14:37:58', '9');
INSERT INTO `sigi_documentos` VALUES ('31', 'S000000182017-05-23-10-46-21PRES', '0', 'documentos/', '2017-05-23 10:46:21', '9', '2017-05-23 10:46:21', '9');
INSERT INTO `sigi_documentos` VALUES ('32', 'S000000192017-05-23-10-50-22PRES', '0', 'documentos/', '2017-05-23 10:50:22', '9', '2017-05-23 10:50:22', '9');
INSERT INTO `sigi_documentos` VALUES ('33', 'S000000202017-05-23-11-56-05PRES', '0', 'documentos/', '2017-05-23 11:56:05', '9', '2017-05-23 11:56:05', '9');
INSERT INTO `sigi_documentos` VALUES ('34', 'R000000202017-05-23-12-35-31PRES', '0', 'documentos/', '2017-05-23 12:35:31', '12', '2017-05-23 12:35:31', '12');
INSERT INTO `sigi_documentos` VALUES ('35', 'S000000212017-05-23-14-31-15SE', '0', 'documentos/', '2017-05-23 14:31:15', '12', '2017-05-23 14:31:15', '12');
INSERT INTO `sigi_documentos` VALUES ('36', 'S000000222017-05-23-14-43-55PRES', '0', 'documentos/', '2017-05-23 14:43:55', '10', '2017-05-23 14:43:55', '10');
INSERT INTO `sigi_documentos` VALUES ('37', 'R000000212017-05-23-14-49-00SE', '0', 'documentos/', '2017-05-23 14:49:00', '10', '2017-05-23 14:49:00', '10');
INSERT INTO `sigi_documentos` VALUES ('38', 'S000000232017-05-25-10-02-10SE', '0', 'documentos/', '2017-05-25 10:02:10', '9', '2017-05-25 10:02:10', '9');
INSERT INTO `sigi_documentos` VALUES ('39', 'S000000242017-05-25-11-08-07SE', '0', 'documentos/', '2017-05-25 11:08:07', '9', '2017-05-25 11:08:07', '9');
INSERT INTO `sigi_documentos` VALUES ('40', 'S000000252017-05-25-14-36-46SE', '0', 'documentos/', '2017-05-25 14:36:46', '9', '2017-05-25 14:36:46', '9');
INSERT INTO `sigi_documentos` VALUES ('41', 'S000000262017-05-25-14-37-46CONT', '0', 'documentos/', '2017-05-25 14:37:46', '10', '2017-05-25 14:37:46', '10');
INSERT INTO `sigi_documentos` VALUES ('42', 'S000000272017-05-25-14-51-28SE', '0', 'documentos/', '2017-05-25 14:51:28', '9', '2017-05-25 14:51:28', '9');
INSERT INTO `sigi_documentos` VALUES ('43', 'S000000282017-05-25-14-52-38CONT', '0', 'documentos/', '2017-05-25 14:52:38', '10', '2017-05-25 14:52:38', '10');
INSERT INTO `sigi_documentos` VALUES ('44', 'S000000292017-05-26-09-53-23SE', '0', 'documentos/', '2017-05-26 09:53:23', '9', '2017-05-26 09:53:23', '9');
INSERT INTO `sigi_documentos` VALUES ('45', 'S000000302017-05-26-09-54-51CONT', '0', 'documentos/', '2017-05-26 09:54:51', '10', '2017-05-26 09:54:51', '10');
INSERT INTO `sigi_documentos` VALUES ('46', 'S000000312017-05-26-10-04-39CONT', '0', 'documentos/', '2017-05-26 10:04:39', '10', '2017-05-26 10:04:39', '10');
INSERT INTO `sigi_documentos` VALUES ('47', 'S000000322017-05-26-10-33-42SE', '0', 'documentos/', '2017-05-26 10:33:42', '9', '2017-05-26 10:33:42', '9');
INSERT INTO `sigi_documentos` VALUES ('48', 'S000000332017-05-26-10-40-51CONT', '0', 'documentos/', '2017-05-26 10:40:51', '10', '2017-05-26 10:40:51', '10');
INSERT INTO `sigi_documentos` VALUES ('49', 'S000000342017-05-26-10-48-30CONT', '0', 'documentos/', '2017-05-26 10:48:30', '10', '2017-05-26 10:48:30', '10');
INSERT INTO `sigi_documentos` VALUES ('50', 'S000000352017-05-26-10-48-58SE', '0', 'documentos/', '2017-05-26 10:48:58', '9', '2017-05-26 10:48:58', '9');
INSERT INTO `sigi_documentos` VALUES ('51', 'R000000352017-05-26-11-08-53CONT', '0', 'documentos/', '2017-05-26 11:08:53', '9', '2017-05-26 11:08:53', '9');
INSERT INTO `sigi_documentos` VALUES ('52', 'S000000362017-05-26-11-13-58CONT', '0', 'documentos/', '2017-05-26 11:13:58', '10', '2017-05-26 11:13:58', '10');
INSERT INTO `sigi_documentos` VALUES ('53', 'S000000372017-05-26-11-21-50SE', '0', 'documentos/', '2017-05-26 11:21:50', '9', '2017-05-26 11:21:50', '9');
INSERT INTO `sigi_documentos` VALUES ('54', 'S000000382017-05-26-11-38-18CONT', '0', 'documentos/', '2017-05-26 11:38:18', '77', '2017-05-26 11:38:18', '77');
INSERT INTO `sigi_documentos` VALUES ('55', 'S000000392017-05-26-12-02-53SE', '0', 'documentos/', '2017-05-26 12:02:53', '9', '2017-05-26 12:02:53', '9');

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
  `fecha_recepcion` date DEFAULT NULL,
  `hora_recepcion` time DEFAULT NULL,
  `comentarios` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sigi_oficios
-- ----------------------------
INSERT INTO `sigi_oficios` VALUES ('1', 'SOLICITUD', '00000001', '', 'EXTERNO', '0', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', 'MENSAJE DE PRUEBA', '', '1', '1', 'INTERNO', '2017-05-17', '03:03:00', null, '2017-05-17 15:04:37', '10', '2017-05-17 15:04:37', '10');
INSERT INTO `sigi_oficios` VALUES ('2', 'RESPUESTA', '00000001', '111222333444', 'EXTERNO', '9', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', 'RESPUESTA AL MENSAJE ', '', '1', '1', 'INTERNO', null, null, null, '2017-05-17 15:05:20', '9', '2017-05-17 15:05:20', '9');
INSERT INTO `sigi_oficios` VALUES ('3', 'RESPUESTA', '00000001', '111222333444', 'EXTERNO', '9', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', 'RESPUESTA AL MENSAJE ', '', '1', '0', 'INTERNO', null, null, null, '2017-05-17 15:05:20', '9', '2017-05-17 15:05:20', '9');
INSERT INTO `sigi_oficios` VALUES ('4', 'RESPUESTA', '00000002', '111222333444', 'EXTERNO', '9', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', 'RESPUESTA AL MENSAJE ', '', '1', '0', 'INTERNO', null, null, null, '2017-05-17 15:06:53', '9', '2017-05-17 15:06:53', '9');
INSERT INTO `sigi_oficios` VALUES ('5', 'SOLICITUD', '00000003', '', 'EXTERNO', '0', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', 'mensaje de prueba', '', '1', '1', 'INTERNO', '2017-05-17', '03:09:00', null, '2017-05-17 15:28:08', '10', '2017-05-17 15:28:08', '10');
INSERT INTO `sigi_oficios` VALUES ('6', 'RESPUESTA', '00000004', '12345678', 'EXTERNO', '9', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', 'se da respuesta al mensaje', '', '1', '1', 'INTERNO', null, null, null, '2017-05-17 15:28:45', '9', '2017-05-17 15:28:45', '9');
INSERT INTO `sigi_oficios` VALUES ('7', 'SOLICITUD', '00000005', '', 'EXTERNO', '0', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', '1234567wertyxscv', '', '1', '1', 'INTERNO', '2017-05-17', '03:32:00', null, '2017-05-17 15:32:50', '10', '2017-05-17 15:32:50', '10');
INSERT INTO `sigi_oficios` VALUES ('8', 'RESPUESTA', '00000006', '12343qwer', 'EXTERNO', '9', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', 'respuesta mensaje', '', '1', '1', 'INTERNO', null, null, null, '2017-05-17 15:33:34', '9', '2017-05-17 15:33:34', '9');
INSERT INTO `sigi_oficios` VALUES ('9', 'SOLICITUD', '00000007', '', 'EXTERNO', '0', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', '2345678qwertyu', '', '1', '1', 'INTERNO', '2017-05-17', '03:36:00', null, '2017-05-17 15:37:12', '10', '2017-05-17 15:37:12', '10');
INSERT INTO `sigi_oficios` VALUES ('10', 'RESPUESTA', '00000008', '123456qwer', 'EXTERNO', '9', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', 'respueta mensaje', '', '1', '1', 'INTERNO', null, null, null, '2017-05-17 15:38:18', '9', '2017-05-17 15:38:18', '9');
INSERT INTO `sigi_oficios` VALUES ('11', 'SOLICITUD', '00000009', '', 'EXTERNO', '0', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', 'mensaje de prueba', '', '1', '1', 'INTERNO', '2017-05-17', '03:41:00', null, '2017-05-17 15:42:12', '10', '2017-05-17 15:42:12', '10');
INSERT INTO `sigi_oficios` VALUES ('12', 'RESPUESTA', '00000009', '1111qqwwweee', 'EXTERNO', '9', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', 'respuesta al mensaje', '', '1', '1', 'INTERNO', null, null, null, '2017-05-17 15:49:05', '9', '2017-05-17 15:49:05', '9');
INSERT INTO `sigi_oficios` VALUES ('13', 'SOLICITUD', '00000010', 'QQWWW111222', 'INTERNO', '7', '', '', '', 'MENSAJE DE PRUEBA INTERNO', '', '1', '0', 'INTERNO', null, null, null, '2017-05-18 12:08:55', '7', '2017-05-18 12:08:55', '7');
INSERT INTO `sigi_oficios` VALUES ('14', 'SOLICITUD', '00000011', '11QQ33455', 'INTERNO', '7', '', '', '', 'MENSAJE DE PRUEBA INTERNO', '', '1', '0', 'INTERNO', null, null, null, '2017-05-18 12:11:04', '7', '2017-05-18 12:11:04', '7');
INSERT INTO `sigi_oficios` VALUES ('15', 'SOLICITUD', '00000012', '1833quyeew', 'INTERNO', '7', '', '', '', 'mensaje de prueba interno', '', '1', '1', 'INTERNO', '0000-00-00', '00:00:00', null, '2017-05-18 12:19:16', '7', '2017-05-18 12:19:16', '7');
INSERT INTO `sigi_oficios` VALUES ('16', 'RESPUESTA', '00000012', '1234QWERTY', 'INTERNO', '9', '', '', '', 'RESPUESTA AL MENSAJE', '', '1', '1', 'INTERNO', null, null, null, '2017-05-18 12:19:46', '9', '2017-05-18 12:19:46', '9');
INSERT INTO `sigi_oficios` VALUES ('17', 'SOLICITUD', '00000013', 'S-N', 'INTERNO', '9', '', '', '', 'mensaje de prueba', '', '1', '1', 'INTERNO', '0000-00-00', '00:00:00', null, '2017-05-18 12:41:15', '9', '2017-05-18 12:41:15', '9');
INSERT INTO `sigi_oficios` VALUES ('18', 'RESPUESTA', '00000013', '1234567QWERTY', 'INTERNO', '7', '', '', '', 'RESPUESTA AL MENSAJE', '', '1', '1', 'INTERNO', null, null, null, '2017-05-18 12:42:07', '7', '2017-05-18 12:42:07', '7');
INSERT INTO `sigi_oficios` VALUES ('19', 'RESPUESTA', '00000013', '123456qwertyu', 'INTERNO', '9', '', '', '', 'no es la respuesta que se esperaba', '', '1', '1', 'INTERNO', null, null, null, '2017-05-18 12:46:48', '9', '2017-05-18 12:46:48', '9');
INSERT INTO `sigi_oficios` VALUES ('20', 'RESPUESTA', '00000013', '123456QWERT', 'INTERNO', '7', '', '', '', 'SE ENVIA RESPUESTA REQUERIDA', '', '1', '1', 'INTERNO', null, null, null, '2017-05-18 12:47:38', '7', '2017-05-18 12:47:38', '7');
INSERT INTO `sigi_oficios` VALUES ('21', 'RESPUESTA', '00000013', '12345qwerasdfzxcv', 'INTERNO', '9', '', '', '', 'otra vez me envio una respuesta incorrecta', '', '1', '1', 'INTERNO', null, null, null, '2017-05-18 12:51:10', '9', '2017-05-18 12:51:10', '9');
INSERT INTO `sigi_oficios` VALUES ('22', 'RESPUESTA', '00000013', 'QWERTSDFG', 'INTERNO', '7', '', '', '', 'se envia la respuesta correcta', '', '1', '1', 'INTERNO', null, null, null, '2017-05-18 12:52:05', '7', '2017-05-18 12:52:05', '7');
INSERT INTO `sigi_oficios` VALUES ('23', 'RESPUESTA', '00000024', 'S/N', 'EXTERNO', '0', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', 'Mnesaje con comentarios', '', '1', '0', 'INTERNO', '2017-05-18', '01:07:00', 'SIN COMENTARIOS', '2017-05-18 13:08:55', '10', '2017-05-25 14:34:47', '9');
INSERT INTO `sigi_oficios` VALUES ('24', 'SOLICITUD', '00000015', 'IEPC/892872187', 'INTERNO', '7', '', '', '', 'MENSAJE DE PREUBA', '', '1', '1', 'INTERNO', '0000-00-00', '00:00:00', 'PORFA APURENLE A RESPONDER', '2017-05-18 13:25:05', '7', '2017-05-18 13:25:05', '7');
INSERT INTO `sigi_oficios` VALUES ('25', 'RESPUESTA', '00000015', 'IEPC-2847285912WEU43', 'INTERNO', '9', '', '', '', 'MENSAJE DE RESPUESTA', '', '1', '1', 'INTERNO', null, null, 'MMM NADA QUE COMENTAR', '2017-05-18 13:54:53', '9', '2017-05-18 13:54:53', '9');
INSERT INTO `sigi_oficios` VALUES ('26', 'SOLICITUD', '00000016', 'IEPC-7832783267', 'INTERNO', '16', '', '', '', 'MENSAJE DE CONSEJERO DE PRUEBA', '', '1', '1', 'INTERNO', '0000-00-00', '00:00:00', 'SIGI 2', '2017-05-19 14:40:20', '16', '2017-05-19 14:40:20', '16');
INSERT INTO `sigi_oficios` VALUES ('27', 'RESPUESTA', '00000016', 'S-N', 'INTERNO', '9', '', '', '', 'Respuesta al mensaje', '', '1', '1', 'INTERNO', null, null, 'SIGI 3', '2017-05-19 14:43:28', '9', '2017-05-19 14:43:28', '9');
INSERT INTO `sigi_oficios` VALUES ('28', 'RESPUESTA', '00000016', '123234qqe133', 'INTERNO', '16', '', '', '', 'no es la respuesta correcta', '', '1', '1', 'INTERNO', null, null, 'verificar', '2017-05-19 14:44:42', '16', '2017-05-19 14:44:42', '16');
INSERT INTO `sigi_oficios` VALUES ('29', 'RESPUESTA', '00000016', 'S-N', 'INTERNO', '9', '', '', '', 'respuesta correcta', '', '1', '1', 'INTERNO', null, null, 'ok', '2017-05-19 14:46:08', '9', '2017-05-19 14:46:08', '9');
INSERT INTO `sigi_oficios` VALUES ('30', 'SOLICITUD', '00000017', 'IEPC/892872187', 'INTERNO', '9', '', '', '', 'qwertghjkjhgfds', '', '1', '0', 'INTERNO', '0000-00-00', '00:00:00', 'asdfghgfds', '2017-05-22 14:37:58', '9', '2017-05-22 14:37:58', '9');
INSERT INTO `sigi_oficios` VALUES ('31', 'SOLICITUD', '00000018', 'IEPC/00001', 'INTERNO', '9', '', '', '', 'mensaje de prueba folios', '', '1', '0', 'INTERNO', '0000-00-00', '00:00:00', 'probando el guardado de folios', '2017-05-23 10:46:21', '9', '2017-05-23 10:46:21', '9');
INSERT INTO `sigi_oficios` VALUES ('32', 'SOLICITUD', '00000019', 'IEPC/892872187', 'INTERNO', '9', '', '', '', 'mensaje de prueba', '', '1', '0', 'INTERNO', '0000-00-00', '00:00:00', 'ok', '2017-05-23 10:50:22', '9', '2017-05-23 10:50:22', '9');
INSERT INTO `sigi_oficios` VALUES ('33', 'SOLICITUD', '00000020', 'IEPC/00002', 'INTERNO', '9', '', '', '', 'MENSAJE DE PREUABA', '', '1', '1', 'INTERNO', '0000-00-00', '00:00:00', 'OK', '2017-05-23 11:56:06', '9', '2017-05-23 11:56:06', '9');
INSERT INTO `sigi_oficios` VALUES ('34', 'RESPUESTA', '00000020', 'IEPC/00003', 'INTERNO', '12', '', '', '', 'SE ENVIA RESPUESTA', '', '1', '1', 'INTERNO', null, null, 'NINGUNO', '2017-05-23 12:35:31', '12', '2017-05-23 12:35:31', '12');
INSERT INTO `sigi_oficios` VALUES ('35', 'SOLICITUD', '00000021', 'IEPC/00004', 'INTERNO', '12', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', 'mensaje de prueba', '', '1', '1', 'EXTERNO', '0000-00-00', '00:00:00', 'sin comentarios', '2017-05-23 14:31:15', '12', '2017-05-23 14:31:15', '12');
INSERT INTO `sigi_oficios` VALUES ('36', 'SOLICITUD', '00000022', 'IEPC/00005', 'EXTERNO', '0', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', 'respuesta a la solicitud de brubeck', '', '1', '0', 'INTERNO', '2017-05-23', '02:43:00', 'es la respuesta', '2017-05-23 14:43:55', '10', '2017-05-23 14:43:55', '10');
INSERT INTO `sigi_oficios` VALUES ('37', 'RESPUESTA', '00000021', 'S/N', 'INTERNO', '10', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', 'respuesta a la solcitud por parte de phillip', '', '1', '1', 'EXTERNO', null, null, 'ok', '2017-05-23 14:49:00', '10', '2017-05-23 14:49:00', '10');
INSERT INTO `sigi_oficios` VALUES ('38', 'SOLICITUD', '00000023', 'IEPC/00006', 'INTERNO', '9', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', 'MENSAJE DE VINCULACION', '', '1', null, 'EXTERNO', '0000-00-00', '00:00:00', 'SE VINCULARA UN OFICIO', '2017-05-25 10:02:10', '9', '2017-05-25 10:02:10', '9');
INSERT INTO `sigi_oficios` VALUES ('39', 'SOLICITUD', '00000024', 'IEPC/00007', 'INTERNO', '9', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', 'mensaje de prueba vincular', '', '1', '1', 'EXTERNO', '0000-00-00', '00:00:00', 'vincular', '2017-05-25 11:08:07', '9', '2017-05-25 11:08:07', '9');
INSERT INTO `sigi_oficios` VALUES ('40', 'SOLICITUD', '00000025', 'S/N', 'INTERNO', '9', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', 'mensaje de vinculacion 1', '', '1', '1', 'EXTERNO', '0000-00-00', '00:00:00', 'prueba', '2017-05-25 14:36:46', '9', '2017-05-25 14:36:46', '9');
INSERT INTO `sigi_oficios` VALUES ('41', 'RESPUESTA', '00000025', 'S/N', 'EXTERNO', '0', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', 'mensaje externo de respuesta', '', '1', '0', 'INTERNO', '2017-05-25', '02:37:00', 'vincular', '2017-05-25 14:37:46', '10', '2017-05-25 14:43:53', '9');
INSERT INTO `sigi_oficios` VALUES ('42', 'SOLICITUD', '00000027', 'S/N', 'INTERNO', '9', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', 'mensaje de vinculacion 2', '', '1', '1', 'EXTERNO', '0000-00-00', '00:00:00', 'prueba', '2017-05-25 14:51:28', '9', '2017-05-25 14:51:28', '9');
INSERT INTO `sigi_oficios` VALUES ('43', 'RESPUESTA', '00000027', 'S/N', 'EXTERNO', '0', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', 'mensaje de prueba de vinculacion', '', '1', '0', 'INTERNO', '2017-05-25', '02:52:00', '123', '2017-05-25 14:52:38', '10', '2017-05-26 09:34:16', '9');
INSERT INTO `sigi_oficios` VALUES ('44', 'SOLICITUD', '00000029', 'IEPC/00008', 'INTERNO', '9', 'Manuel Soto Herrera', 'Protección Civil', 'Director', 'MENSAJE DE PRUEBA DE VINCULACION', '', '1', '1', 'EXTERNO', '0000-00-00', '00:00:00', 'VINCULACION DE FOLIOS', '2017-05-26 09:53:23', '9', '2017-05-26 09:53:23', '9');
INSERT INTO `sigi_oficios` VALUES ('45', 'RESPUESTA', '00000029', 'S/N', 'EXTERNO', '10', 'Manuel Soto Herrera', 'Protección Civil', 'Director', 'EN RESPUESTA A LA SOLICITUD DE VINCULACION', '', '1', '0', 'INTERNO', '2017-05-26', '09:53:00', 'VINCULAR', '2017-05-26 09:54:51', '10', '2017-05-26 09:55:46', '9');
INSERT INTO `sigi_oficios` VALUES ('46', 'SOLICITUD', '00000031', 'S/N', 'EXTERNO', '0', 'Manuel Soto Herrera', 'Protección Civil', 'Director', 'MNSAJE DE PRUEBA 1', '', '1', null, 'INTERNO', '2017-05-26', '10:04:00', 'NINGUNO', '2017-05-26 10:04:39', '10', '2017-05-26 10:04:39', '10');
INSERT INTO `sigi_oficios` VALUES ('47', 'SOLICITUD', '00000032', 'S/N', 'INTERNO', '9', 'Manuel Soto Herrera', 'Protección Civil', 'Director', 'Se solicita informe de gastos', '', '1', '1', 'EXTERNO', '0000-00-00', '00:00:00', 'Ok', '2017-05-26 10:33:42', '9', '2017-05-26 10:33:42', '9');
INSERT INTO `sigi_oficios` VALUES ('48', 'RESPUESTA', '00000032', 'S/N', 'EXTERNO', '10', 'Manuel Soto Herrera', 'Protección Civil', 'Director', 'En respuesta a la solicitud de acceso a informació', '', '1', '0', 'INTERNO', '2017-05-26', '10:37:00', 'ok', '2017-05-26 10:40:51', '10', '2017-05-26 10:46:55', '9');
INSERT INTO `sigi_oficios` VALUES ('49', 'RESPUESTA', '00000035', 'S/N', 'EXTERNO', '10', 'Manuel Soto Herrera', 'Protección Civil', 'Director', 'mensaje de preuba v1', '', '1', '1', 'INTERNO', '2017-05-26', '10:48:00', 'v1', '2017-05-26 10:48:30', '10', '2017-05-26 11:04:17', '9');
INSERT INTO `sigi_oficios` VALUES ('50', 'SOLICITUD', '00000035', 'S/N', 'INTERNO', '9', 'Manuel Soto Herrera', 'Protección Civil', 'Director', 'mensaje de vinculacion v1', '', '1', '1', 'EXTERNO', '0000-00-00', '00:00:00', 'v1', '2017-05-26 10:48:58', '9', '2017-05-26 10:48:58', '9');
INSERT INTO `sigi_oficios` VALUES ('51', 'RESPUESTA', '00000035', 'S/N', 'INTERNO', '9', 'Manuel Soto Herrera', 'Protección Civil', 'Director', 'La respuesta que llego no es lo que se esperaba', '', '1', '0', 'EXTERNO', null, null, 'ok', '2017-05-26 11:08:54', '9', '2017-05-26 11:08:54', '9');
INSERT INTO `sigi_oficios` VALUES ('52', 'RESPUESTA', '00000035', 'S/N', 'EXTERNO', '10', 'Manuel Soto Herrera', 'Protección Civil', 'Director', 'se envia la respuesta correcta', '', '1', '1', 'INTERNO', '2017-05-26', '11:13:00', 'ojala sea la correcta', '2017-05-26 11:13:58', '10', '2017-05-26 11:17:54', '9');
INSERT INTO `sigi_oficios` VALUES ('53', 'SOLICITUD', '00000037', 'IEPC/00009', 'INTERNO', '9', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', 'MENSAJE CON DESTINO EXTERNO', '', '1', '1', 'EXTERNO', '0000-00-00', '00:00:00', 'PROBANDO QUE UN AREA INTERNA RESPONDA', '2017-05-26 11:21:50', '9', '2017-05-26 11:21:50', '9');
INSERT INTO `sigi_oficios` VALUES ('54', 'RESPUESTA', '00000037', 'S/N', 'INTERNO', '77', '', '', '', 'EN RESPUESTA A LA SOLICITUD', '', '1', '1', 'INTERNO', '0000-00-00', '00:00:00', 'EL MENSAJE LLEGO POR CORREO ELECTRONICO', '2017-05-26 11:38:18', '77', '2017-05-26 11:38:53', '9');
INSERT INTO `sigi_oficios` VALUES ('55', 'SOLICITUD', '00000039', 'IEPC/00010', 'INTERNO', '9', 'PHILLIP BRUBECK GAMBOA', 'SEDECO', 'DIRECTOR', 'SOLICITUD DE GASTOS OPERATIVOS', '', '1', null, 'EXTERNO', '0000-00-00', '00:00:00', 'PROBANDO', '2017-05-26 12:02:53', '9', '2017-05-26 12:02:53', '9');

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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sigi_oficios_documentos_recepcion
-- ----------------------------
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('1', null, '1', '1', '9', '0', '2017-05-17 15:05:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-17 15:04:37', '10', '2017-05-17 15:06:53', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('2', '1', '2', '2', '0', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-17 15:05:20', '9', '2017-05-17 15:06:53', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('3', '1', '3', '3', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-17 15:05:20', '9', '2017-05-17 15:06:53', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('4', '1', '4', '4', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-17 15:06:53', '9', '2017-05-17 15:06:53', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('5', null, '5', '5', '9', '0', '2017-05-17 15:28:23', 'Para el trámite que corresponda', 'Cerrado', '2017-05-17 15:28:08', '10', '2017-05-17 15:28:45', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('6', '5', '6', '6', '0', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-17 15:28:45', '9', '2017-05-17 15:28:45', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('7', null, '7', '7', '9', '0', '2017-05-17 15:33:01', 'Para el trámite que corresponda', 'Cerrado', '2017-05-17 15:32:50', '10', '2017-05-17 15:33:34', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('8', '7', '8', '8', '0', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-17 15:33:34', '9', '2017-05-17 15:33:34', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('9', null, '9', '9', '9', '0', '2017-05-17 15:37:28', 'Para el trámite que corresponda', 'Cerrado', '2017-05-17 15:37:12', '10', '2017-05-17 15:38:18', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('10', '9', '10', '10', '0', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-17 15:38:18', '9', '2017-05-17 15:38:18', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('11', null, '11', '11', '9', '0', '2017-05-17 15:48:39', 'Para el trámite que corresponda', 'Cerrado', '2017-05-17 15:42:12', '10', '2017-05-17 15:49:06', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('12', '11', '12', '12', '0', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-17 15:49:05', '9', '2017-05-17 15:49:06', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('13', null, '13', '13', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-05-18 12:08:55', '7', '2017-05-18 12:08:55', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('14', null, '14', '14', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-05-18 12:11:04', '7', '2017-05-18 12:11:04', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('15', null, '15', '15', '9', '0', '2017-05-18 12:19:26', 'Para el trámite que corresponda', 'Cerrado', '2017-05-18 12:19:16', '7', '2017-05-18 12:19:47', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('16', '15', '16', '16', '7', '0', '2017-05-18 12:22:51', 'Para el trámite que corresponda', 'Cerrado', '2017-05-18 12:19:46', '9', '2017-05-18 12:19:47', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('17', null, '17', '17', '7', '0', '2017-05-18 12:41:31', 'Para el trámite que corresponda', 'Cerrado', '2017-05-18 12:41:15', '9', '2017-05-18 12:52:06', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('18', null, '17', '17', '11', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-18 12:41:15', '9', '2017-05-18 12:52:06', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('19', '17', '18', '18', '9', '0', '2017-05-18 12:46:22', 'Para el trámite que corresponda', 'Cerrado', '2017-05-18 12:42:07', '7', '2017-05-18 12:52:06', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('20', '17', '19', '19', '7', '0', '2017-05-18 12:47:15', 'Para el trámite que corresponda', 'Cerrado', '2017-05-18 12:46:48', '9', '2017-05-18 12:52:06', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('21', '17', '20', '20', '9', '0', '2017-05-18 12:48:25', 'Para el trámite que corresponda', 'Cerrado', '2017-05-18 12:47:38', '7', '2017-05-18 12:52:06', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('22', '17', '21', '21', '7', '0', '2017-05-18 12:51:46', 'Para el trámite que corresponda', 'Cerrado', '2017-05-18 12:51:10', '9', '2017-05-18 12:52:06', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('23', '39', '22', '22', '9', '0', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Cerrado', '2017-05-18 12:52:06', '7', '2017-05-25 14:34:47', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('24', null, '23', '23', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-05-18 13:08:55', '10', '2017-05-18 13:08:55', '10');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('25', null, '24', '24', '9', '0', '2017-05-18 13:25:31', 'Para el trámite que corresponda', 'Cerrado', '2017-05-18 13:25:05', '7', '2017-05-18 13:54:54', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('26', '24', '25', '25', '7', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-18 13:54:53', '9', '2017-05-18 13:54:54', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('27', null, '26', '26', '9', '0', '2017-05-19 14:45:15', 'Para el trámite que corresponda', 'Cerrado', '2017-05-19 14:40:20', '16', '2017-05-19 14:46:08', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('28', null, '26', '26', '39', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-19 14:40:20', '16', '2017-05-19 14:46:08', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('29', '26', '27', '27', '16', '0', '2017-05-19 14:43:37', 'Para el trámite que corresponda', 'Cerrado', '2017-05-19 14:43:28', '9', '2017-05-19 14:46:08', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('30', '26', '28', '28', '9', '0', '2017-05-19 14:45:38', 'Para el trámite que corresponda', 'Cerrado', '2017-05-19 14:44:42', '16', '2017-05-19 14:46:08', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('31', '26', '29', '29', '16', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-19 14:46:08', '9', '2017-05-19 14:46:08', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('32', null, '30', '30', '7', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-05-22 14:37:58', '9', '2017-05-22 14:37:58', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('33', null, '30', '30', '11', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-05-22 14:37:58', '9', '2017-05-22 14:37:58', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('34', null, '30', '30', '33', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-05-22 14:37:58', '9', '2017-05-22 14:37:58', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('35', null, '31', '31', '12', '0', '2017-05-23 10:46:33', 'Para el trámite que corresponda', 'Abierto', '2017-05-23 10:46:21', '9', '2017-05-23 10:46:21', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('36', null, '32', '32', '12', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-05-23 10:50:22', '9', '2017-05-23 10:50:22', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('37', null, '33', '33', '12', '0', '2017-05-23 12:05:27', 'Para el trámite que corresponda', 'Cerrado', '2017-05-23 11:56:06', '9', '2017-05-23 12:35:31', '12');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('38', '33', '34', '34', '9', '0', '2017-05-23 12:35:43', 'Para el trámite que corresponda', 'Cerrado', '2017-05-23 12:35:31', '12', '2017-05-23 12:35:31', '12');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('39', null, '35', '35', '10', '0', '2017-05-23 14:48:29', 'Para el trámite que corresponda', 'Cerrado', '2017-05-23 14:31:15', '12', '2017-05-23 14:49:00', '10');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('40', null, '36', '36', '12', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-05-23 14:43:55', '10', '2017-05-23 14:43:55', '10');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('41', '40', '37', '37', '12', '0', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Cerrado', '2017-05-23 14:49:00', '10', '2017-05-25 14:43:53', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('42', null, '38', '38', '10', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cancelado', '2017-05-25 10:02:10', '9', '2017-05-25 12:21:31', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('43', null, '39', '39', '10', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-25 11:08:07', '9', '2017-05-25 14:34:47', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('44', null, '39', '39', '75', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-25 11:08:07', '9', '2017-05-25 14:34:47', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('45', null, '39', '39', '76', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-25 11:08:07', '9', '2017-05-25 14:34:47', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('46', null, '40', '40', '10', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-25 14:36:46', '9', '2017-05-25 14:43:53', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('47', '40', '41', '41', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-05-25 14:37:46', '10', '2017-05-25 14:37:46', '10');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('48', '40', '41', '41', '39', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-05-25 14:37:47', '10', '2017-05-25 14:37:47', '10');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('49', null, '42', '42', '10', '0', '2017-05-25 14:51:37', 'Para el trámite que corresponda', 'Cerrado', '2017-05-25 14:51:28', '9', '2017-05-26 09:34:16', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('50', '42', '43', '43', '9', '0', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Cerrado', '2017-05-25 14:52:38', '10', '2017-05-26 09:34:16', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('51', '42', '43', '43', '39', '0', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Cerrado', '2017-05-25 14:52:39', '10', '2017-05-26 09:34:16', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('52', null, '44', '44', '10', '0', '2017-05-26 09:53:34', 'Para el trámite que corresponda', 'Cerrado', '2017-05-26 09:53:23', '9', '2017-05-26 09:55:46', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('53', '44', '45', '45', '9', '0', '2017-05-26 09:55:07', 'Para conocimiento y archivo', 'Cerrado', '2017-05-26 09:54:51', '10', '2017-05-26 09:55:46', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('54', '44', '45', '45', '39', '0', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Cerrado', '2017-05-26 09:54:51', '10', '2017-05-26 09:55:46', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('55', null, '46', '46', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-05-26 10:04:40', '10', '2017-05-26 10:04:40', '10');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('56', null, '46', '46', '39', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-05-26 10:04:40', '10', '2017-05-26 10:04:40', '10');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('57', null, '47', '47', '10', '0', '2017-05-26 10:33:50', 'Para el trámite que corresponda', 'Cerrado', '2017-05-26 10:33:42', '9', '2017-05-26 10:46:55', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('58', '47', '48', '48', '9', '0', '2017-05-26 10:42:54', 'Para conocimiento y archivo', 'Cerrado', '2017-05-26 10:40:51', '10', '2017-05-26 10:46:55', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('59', '47', '48', '48', '39', '0', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Cerrado', '2017-05-26 10:40:52', '10', '2017-05-26 10:46:55', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('60', '50', '49', '49', '9', '0', '2017-05-26 11:04:39', 'Para conocimiento y archivo', 'Cerrado', '2017-05-26 10:48:30', '10', '2017-05-26 11:17:54', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('61', '50', '49', '49', '39', '0', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Cerrado', '2017-05-26 10:48:30', '10', '2017-05-26 11:17:54', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('62', null, '50', '50', '10', '0', '2017-05-26 10:49:04', 'Para el trámite que corresponda', 'Cerrado', '2017-05-26 10:48:58', '9', '2017-05-26 11:17:54', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('63', '50', '51', '51', '10', '0', '2017-05-26 11:09:41', 'Para el trámite que corresponda', 'Cerrado', '2017-05-26 11:08:54', '9', '2017-05-26 11:17:54', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('64', '50', '52', '52', '9', '0', '2017-05-26 11:15:40', 'Para conocimiento y archivo', 'Cerrado', '2017-05-26 11:13:58', '10', '2017-05-26 11:17:54', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('65', '50', '52', '52', '39', '0', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Cerrado', '2017-05-26 11:13:58', '10', '2017-05-26 11:17:54', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('66', null, '53', '53', '10', '0', '2017-05-26 11:22:01', 'Para el trámite que corresponda', 'Cerrado', '2017-05-26 11:21:50', '9', '2017-05-26 11:38:53', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('67', '53', '54', '54', '9', '0', '2017-05-26 11:38:35', 'Para conocimiento y archivo', 'Cerrado', '2017-05-26 11:38:18', '77', '2017-05-26 11:38:53', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('68', '53', '54', '54', '39', '0', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Cerrado', '2017-05-26 11:38:18', '77', '2017-05-26 11:38:53', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('69', null, '55', '55', '10', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-05-26 12:02:53', '9', '2017-05-26 12:02:53', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('70', null, '55', '55', '77', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-05-26 12:02:53', '9', '2017-05-26 12:02:53', '9');

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
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'Larry', 'Vargas', 'e807f1fcf82d132f9bb018ca6738a19f', '5390db054a81ba9121daa299dc28abc7', '11', '1', '2', '1', '1', '1', '1');
INSERT INTO `usuarios` VALUES ('2', 'Galo', 'Solano', 'e807f1fcf82d132f9bb018ca6738a19f', '84f0c3a18121812c30aef815c9eee92d', '11', '1', '1', '1', '1', '0', '1');
INSERT INTO `usuarios` VALUES ('3', 'Cesar', 'Victorino', 'e807f1fcf82d132f9bb018ca6738a19f', 'f2ef0011ba570a8e73cb9f8ae59dbcc0', '11', '1', '2', '1', '1', '0', '1');
INSERT INTO `usuarios` VALUES ('4', 'Martin', 'Contreras', 'e807f1fcf82d132f9bb018ca6738a19f', '51dae92dc3c9f6beb89c384399837d8b', '11', '1', '1', '1', '1', '0', '1');
INSERT INTO `usuarios` VALUES ('5', 'Juan', 'Zamora', 'e807f1fcf82d132f9bb018ca6738a19f', '0426d5d82dc5aa8741562ffb92fd8347', '13', '1', '1', '1', '1', '0', '1');
INSERT INTO `usuarios` VALUES ('6', 'Abisai', 'Vargas', 'e807f1fcf82d132f9bb018ca6738a19f', 'bf7a21b8aa60e85d309842dd7a202409', '11', '3', '3', '3', '3', '0', '1');
INSERT INTO `usuarios` VALUES ('7', 'Pedro', 'Perez', 'e807f1fcf82d132f9bb018ca6738a19f', 'd9b624e5119506eee9fd10bd6861cd30', '3', '3', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('8', 'Abisai', 'Chavez', 'e807f1fcf82d132f9bb018ca6738a19f', '7b5f522d0fc2673608d633898eac81b3', '13', '3', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('9', 'Mario', 'Canales', 'e807f1fcf82d132f9bb018ca6738a19f', '23636b9887b68ebaaaf7b25e1af762e4', '4', '3', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('10', 'Vanessa', 'Perez', 'e807f1fcf82d132f9bb018ca6738a19f', '0c9d7463e807e2fa2e8e0c369f9be527', '3', '1', '1', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('11', 'Alberto', 'Aguilar', 'e807f1fcf82d132f9bb018ca6738a19f', '385a9c5e42ca78bd169c95a90067a433', '3', '1', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('12', 'Juan', 'Kato', 'e807f1fcf82d132f9bb018ca6738a19f', 'd6140d4e08853d007acdf0555da87ef1', '1', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('13', 'Sofia', 'Campos', 'e807f1fcf82d132f9bb018ca6738a19f', '21fc6902bf4e70909c347034aac7dc4b', '1', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('14', 'Juana', 'Gallegos', 'e807f1fcf82d132f9bb018ca6738a19f', 'e33f1c68bf5e2ddb76f41fc0fb5b31d2', '1', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('15', 'Sergio', 'Contreras', 'e807f1fcf82d132f9bb018ca6738a19f', 'b4435d225d3497d70e236754d81dd1c2', '1', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('16', 'Laura', 'Bringas', 'e807f1fcf82d132f9bb018ca6738a19f', '353deb4f8c9ae4cda4cfc23ae4f60424', '15', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('17', 'Rebeca', 'Diaz', 'e807f1fcf82d132f9bb018ca6738a19f', '2f40453309516893a853beb3129633e7', '15', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('18', 'Maria', 'Pacheco', 'e807f1fcf82d132f9bb018ca6738a19f', 'adecf83a745b4cce85e1dc8d01c7a583', '15', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('19', 'Francisco', 'Gonzalez', 'e807f1fcf82d132f9bb018ca6738a19f', 'a76dcdaae12b2e011d123b58e04f0dc8', '16', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('20', 'Silvia', 'Garcia', 'e807f1fcf82d132f9bb018ca6738a19f', '9e77a1ce79baabe29b06de224ae25633', '16', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('21', 'Flor', 'Garcia', 'e807f1fcf82d132f9bb018ca6738a19f', '846b59169e5f406f3637c80d7cec6934', '16', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('22', 'Mirza', 'Ramirez', 'e807f1fcf82d132f9bb018ca6738a19f', '2cb93030939a64f7c9359da310d52ecb', '17', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('23', 'Alma', 'Montiel', 'e807f1fcf82d132f9bb018ca6738a19f', '73492577700cbfe006dd5c8123a28586', '17', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('24', 'Honorio', 'Mendia', 'e807f1fcf82d132f9bb018ca6738a19f', '7feee0ea6aaaf0033b17f4523aa144f5', '17', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('25', 'Manuel', 'Montoya', 'e807f1fcf82d132f9bb018ca6738a19f', '171e0e844480ccc34ef5fec46c111667', '18', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('26', 'Jose', 'Colmenero', 'e807f1fcf82d132f9bb018ca6738a19f', '271996fcba34fc0d7c9b4be9221bfa77', '18', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('27', 'Armando', 'Ortiz', 'e807f1fcf82d132f9bb018ca6738a19f', '98c3673f3dbf5074ed4da1389a0c1ec5', '18', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('28', 'Fernando', 'Roman', 'e807f1fcf82d132f9bb018ca6738a19f', 'af49599f26513d545ff4f093ce2f85d5', '19', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('29', 'Maria', 'Garay', 'e807f1fcf82d132f9bb018ca6738a19f', '2e7b207ad0bdc7b1660b1e996f7bccdf', '19', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('30', 'Roberto', 'Herrera', 'e807f1fcf82d132f9bb018ca6738a19f', '72450a13d98b3336d1159bbcfd7eb9ba', '19', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('31', 'Esmeralda', 'Valles', 'e807f1fcf82d132f9bb018ca6738a19f', '79d0985a3f3a01391dbe01da7f47e819', '20', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('32', 'Jose', 'Alferez', 'e807f1fcf82d132f9bb018ca6738a19f', 'f6233069056e2bff39d6ea05b6e29a4c', '20', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('33', 'David', 'Arambula', 'e807f1fcf82d132f9bb018ca6738a19f', 'cee8a68e5925cd5e8f2097168c71d9db', '3', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('34', 'Guadalupe', 'Castro', 'e807f1fcf82d132f9bb018ca6738a19f', '2b19a6e7b9a8d78680a8621a45ba0a78', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('35', 'Beatriz', 'Elguezabal', 'e807f1fcf82d132f9bb018ca6738a19f', '8b4f02421407aa9d327e6f5e11588756', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('36', 'Maritza', 'Gonzalez', 'e807f1fcf82d132f9bb018ca6738a19f', '6a5f3eb20ab6a1b74332c6c09f3eb65c', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('37', 'Ana', 'Quezada', 'e807f1fcf82d132f9bb018ca6738a19f', '0479b9bd16be50ac3eb7b32ac50ae839', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('38', 'Adolfo', 'Tapia', 'e807f1fcf82d132f9bb018ca6738a19f', '88885b987d507ca1a601e5f1fdcaaa5c', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('39', 'Adriana', 'Maldonado', 'e807f1fcf82d132f9bb018ca6738a19f', '14eb9c49a1f1c994ef9e1772ac36a65e', '4', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('40', 'Maria', 'Muñoz', 'e807f1fcf82d132f9bb018ca6738a19f', 'bc0821509e94ad9bbbc68d87b1b6a468', '4', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('41', 'Diana', 'Villarreal', 'e807f1fcf82d132f9bb018ca6738a19f', '70ee6c55822cbaccef332eebda2af66a', '4', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('42', 'Margarita', 'Pacheco', 'e807f1fcf82d132f9bb018ca6738a19f', '361256ec0ab5f7c293b791a2b34a9136', '4', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('43', 'Raul', 'Velazquez', 'e807f1fcf82d132f9bb018ca6738a19f', 'ac7feb11c892bc8b0be82135a0022536', '5', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('44', 'Ruth', 'Mendoza', 'e807f1fcf82d132f9bb018ca6738a19f', '051ffcf016fa60be1ba56d63d7dd39fb', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('45', 'Celso', 'Villarreal', 'e807f1fcf82d132f9bb018ca6738a19f', '0e8f28acdaf35807c75751671b425fd2', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('46', 'Jesus', 'Enriquez', 'e807f1fcf82d132f9bb018ca6738a19f', 'e3377d939ac12f667fb0adffab6a4d90', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('47', 'Anastacio', 'Hernandez', 'e807f1fcf82d132f9bb018ca6738a19f', '02a267425b7901105f3a1d606f6ee7d2', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('48', 'Juana', 'Garay', 'e807f1fcf82d132f9bb018ca6738a19f', '8ca1a26aa767d5f82c951f4aacdda718', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('49', 'Jose', 'Cabral', 'e807f1fcf82d132f9bb018ca6738a19f', '9c1b5331481f584daeb58fbe001484d7', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('50', 'Alejandra', 'Lozano', 'e807f1fcf82d132f9bb018ca6738a19f', '2b1d4d129cdb39f99cab5615c964d5da', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('51', 'Ignacio', 'Ayon', 'e807f1fcf82d132f9bb018ca6738a19f', '0fca1dd06e457ecb07c04d615aeb9390', '6', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('52', 'Susana', 'Gurrola', 'e807f1fcf82d132f9bb018ca6738a19f', '91cdc60a7b15ad3876473330d2e82a12', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('53', 'Cintya', 'Nuñez', 'e807f1fcf82d132f9bb018ca6738a19f', '2b0eb3c3517a8b7c9c41dec8ad7aee65', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('54', 'Jorge', 'Pelagio', 'e807f1fcf82d132f9bb018ca6738a19f', 'a0f77ece0ab1175c62b25c338c5510bf', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('55', 'Karina', 'Gonzalez', 'e807f1fcf82d132f9bb018ca6738a19f', '4f2c5e5dbc7dca9c7864ab46b167038c', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('56', 'Jose', 'Nuñez', 'e807f1fcf82d132f9bb018ca6738a19f', '22978dbd63d8d001da1341fdda1f02d1', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('57', 'Manuela', 'Bueno', 'e807f1fcf82d132f9bb018ca6738a19f', 'a1955b42460a010449390c87fb7b156d', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('58', 'Jesus', 'Hernandez', 'e807f1fcf82d132f9bb018ca6738a19f', '26b1f9f4d7275f47e83fafdb001bce96', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('59', 'Juan', 'Valverde', 'e807f1fcf82d132f9bb018ca6738a19f', '2abe7764d045bbee163feae15398d161', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('60', 'Jose', 'Ramirez', 'e807f1fcf82d132f9bb018ca6738a19f', '4ffd03e9f669540242ad0f6c8ea2eefd', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('61', 'Gerardo', 'Guzman', 'e807f1fcf82d132f9bb018ca6738a19f', 'b98dee7ecb1e444dadf118c64d6f7f17', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('62', 'Mario', 'Perez', 'e807f1fcf82d132f9bb018ca6738a19f', '069cc7b7ba6d269fec080e36d0b918e2', '7', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('63', 'Julio', 'Torres', 'e807f1fcf82d132f9bb018ca6738a19f', 'e4a95ec638f3d8c9ff296b2db4b739e7', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('64', 'Magdalena', 'Juarez', 'e807f1fcf82d132f9bb018ca6738a19f', '57edbaf9a8e314ba92eebd22a9c49109', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('65', 'Marisol', 'Mancinas', 'e807f1fcf82d132f9bb018ca6738a19f', 'a1fa6d7c51b532a8ae69139ee7f917f7', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('66', 'Ruben', 'Amezcua', 'e807f1fcf82d132f9bb018ca6738a19f', '6364635639069cd5e47b4b235a241990', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('67', 'Brenda', 'Hernandez', 'e807f1fcf82d132f9bb018ca6738a19f', '188756f88a55bca746a16d0c84d4fb18', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('68', 'Cesar', 'Loera', 'e807f1fcf82d132f9bb018ca6738a19f', '935d16fd21ba37464ea08f74f1e050ca', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('69', 'Luis', 'Hernandez', 'e807f1fcf82d132f9bb018ca6738a19f', 'b7daa07ae6ee438b8c5cb5d83eccc659', '8', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('70', 'Franklin', 'Ake', 'e807f1fcf82d132f9bb018ca6738a19f', 'c52dde2ee6bd2ac06d62e06c0fd88509', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('71', 'Mara', 'Flores', 'e807f1fcf82d132f9bb018ca6738a19f', 'e5a7b885864af6985907011c88d5efd7', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('72', 'Daniel', 'Camacho', 'e807f1fcf82d132f9bb018ca6738a19f', '683e8873b502e97702437fd560a6a695', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('73', 'Jovani', 'Herrera', 'e807f1fcf82d132f9bb018ca6738a19f', '2596dcd18003e9530a02420940a36187', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('74', 'Francisco', 'Tellez', 'e807f1fcf82d132f9bb018ca6738a19f', '896c3502bbb9dddd2c67f5825a0eaa8d', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('75', 'Marisol', 'Herrera', 'e807f1fcf82d132f9bb018ca6738a19f', 'e007794ba0a8926a33d4a57cf8eb4a55', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('76', 'Catalina', 'Benavente', 'e807f1fcf82d132f9bb018ca6738a19f', 'fed70e87c8ab32b5f0adc73272b8c291', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('77', 'Luz', 'Mariscal', 'e807f1fcf82d132f9bb018ca6738a19f', '10c83618ce0db98eacfa1a999e61eed8', '9', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('78', 'Arturo', 'De la rosa', 'e807f1fcf82d132f9bb018ca6738a19f', '69001d61fa8c29377fd8f5578cbf1e5a', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('79', 'Marcela', 'Sarellano', 'e807f1fcf82d132f9bb018ca6738a19f', 'fa9169c05e41a7a3ae99207dd67a8649', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('80', 'Silvia', 'Zepeda', 'e807f1fcf82d132f9bb018ca6738a19f', '899510a9091f3131f405ec1a4b0d21f8', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('81', 'Fernando', 'Flores', 'e807f1fcf82d132f9bb018ca6738a19f', '397fffdd7c40d8208a4bc3908e5792ec', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('82', 'Madeline', 'Palencia', 'e807f1fcf82d132f9bb018ca6738a19f', '10c39d4812529e362d0f9cca7aa730a1', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('83', 'Alejandro', 'Gonzalez', 'e807f1fcf82d132f9bb018ca6738a19f', 'e3df0983dd9ab4fb572558d5766c0881', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('84', 'Gabriela', 'Rivas', 'e807f1fcf82d132f9bb018ca6738a19f', 'fcc33adf2425e6192a5919c7e7213179', '10', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('85', 'Felipe', 'Correa', 'e807f1fcf82d132f9bb018ca6738a19f', '84730741c63235674782265ab00ed037', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('86', 'Martin', 'Lopez', 'e807f1fcf82d132f9bb018ca6738a19f', '49dd5a2ee7c027b89eab607b58f56649', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('87', 'Juan', 'Saucedo', 'e807f1fcf82d132f9bb018ca6738a19f', '6fac84fb268b18bcfb16a2d0247e3334', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('88', 'Maria', 'Longoria', 'e807f1fcf82d132f9bb018ca6738a19f', 'a2e91f29c85a3c109aba1257c0569b6d', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('89', 'Cesar', 'Victorino', 'e807f1fcf82d132f9bb018ca6738a19f', 'f2ef0011ba570a8e73cb9f8ae59dbcc0', '11', '1', '2', '0', '0', '1', '0');
INSERT INTO `usuarios` VALUES ('90', 'Galo', 'Solano', 'e807f1fcf82d132f9bb018ca6738a19f', '84f0c3a18121812c30aef815c9eee92d', '11', '1', '3', '0', '0', '0', '0');
INSERT INTO `usuarios` VALUES ('91', 'Abril', 'Cardoza', 'e807f1fcf82d132f9bb018ca6738a19f', '84870b9a8b26c07af1f1b3c1ceef6304', '11', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('92', 'Rodolfo', 'Rojas', 'e807f1fcf82d132f9bb018ca6738a19f', '78e7a6e257b0bc4c72ab9994f07b3d31', '11', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('93', 'Larry', 'Vargas', 'e807f1fcf82d132f9bb018ca6738a19f', '5390db054a81ba9121daa299dc28abc7', '11', '1', '3', '0', '0', '0', '0');
INSERT INTO `usuarios` VALUES ('94', 'Mario', 'Canalez', 'e807f1fcf82d132f9bb018ca6738a19f', '23636b9887b68ebaaaf7b25e1af762e4', '11', '3', '3', '0', '0', '0', '0');
INSERT INTO `usuarios` VALUES ('95', 'Luis', 'Pineda', 'e807f1fcf82d132f9bb018ca6738a19f', '7fddf51700ebe643bdaebeb4c8e5e254', '12', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('96', 'Juan', 'Zamora', 'e807f1fcf82d132f9bb018ca6738a19f', '0426d5d82dc5aa8741562ffb92fd8347', '12', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('97', 'Efrain', 'Ramos', 'e807f1fcf82d132f9bb018ca6738a19f', '272d86934506059f2eeb445632ec0878', '12', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('98', 'Martin', 'Contreras', 'e807f1fcf82d132f9bb018ca6738a19f', '51dae92dc3c9f6beb89c384399837d8b', '12', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('99', 'Daniel', 'Zavala', 'e807f1fcf82d132f9bb018ca6738a19f', 'df13976ebd20f0c66c8d458dbeb184b4', '13', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('100', 'Jorge', 'Macias', 'e807f1fcf82d132f9bb018ca6738a19f', '4d7e81523621b980f508a884e956f2cf', '13', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('101', 'Blanca', 'Gallegos', 'e807f1fcf82d132f9bb018ca6738a19f', '30e580fdebbbf0a873671d30f3aeeb8f', '13', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('102', 'Karla', 'Aldaba', 'e807f1fcf82d132f9bb018ca6738a19f', '43b1f015d140755c0b0286e99d009d70', '14', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('103', 'Mayra', 'Esparza', 'e807f1fcf82d132f9bb018ca6738a19f', '7af03a29b56f9025a6f9085fc1676a71', '14', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('104', 'Ernesto', 'Torres', 'e807f1fcf82d132f9bb018ca6738a19f', '02927ba294c5b2f5f646b8dc2f7fe981', '14', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('105', 'Sandra', 'Gonzalez', 'e807f1fcf82d132f9bb018ca6738a19f', '58a10ceb32cb8e69b8172f231af3422d', '15', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('106', 'Sandra', 'Almaraz', 'e807f1fcf82d132f9bb018ca6738a19f', '003153953fc40ea22bb14ff40764160e', '15', '3', '3', '0', '0', '0', '1');

-- ----------------------------
-- Table structure for usuarios_copy
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_copy`;
CREATE TABLE `usuarios_copy` (
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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of usuarios_copy
-- ----------------------------
INSERT INTO `usuarios_copy` VALUES ('1', 'Larry', 'Vargas', 'e807f1fcf82d132f9bb018ca6738a19f', '5390db054a81ba9121daa299dc28abc7', '11', '1', '2', '1', '1', '1', '1');
INSERT INTO `usuarios_copy` VALUES ('2', 'Galo', 'Solano', 'e807f1fcf82d132f9bb018ca6738a19f', '84f0c3a18121812c30aef815c9eee92d', '11', '1', '1', '1', '1', '0', '1');
INSERT INTO `usuarios_copy` VALUES ('3', 'Cesar', 'Victorino', 'e807f1fcf82d132f9bb018ca6738a19f', 'f2ef0011ba570a8e73cb9f8ae59dbcc0', '11', '1', '1', '1', '1', '0', '1');
INSERT INTO `usuarios_copy` VALUES ('4', 'Martin', 'Contreras', 'e807f1fcf82d132f9bb018ca6738a19f', '51dae92dc3c9f6beb89c384399837d8b', '11', '1', '1', '1', '1', '0', '1');
INSERT INTO `usuarios_copy` VALUES ('5', 'Juan', 'Zamora', 'e807f1fcf82d132f9bb018ca6738a19f', '0426d5d82dc5aa8741562ffb92fd8347', '13', '1', '1', '1', '1', '0', '1');
INSERT INTO `usuarios_copy` VALUES ('6', 'Abisai', 'Vargas', 'e807f1fcf82d132f9bb018ca6738a19f', 'bf7a21b8aa60e85d309842dd7a202409', '11', '3', '3', '3', '3', '0', '1');
INSERT INTO `usuarios_copy` VALUES ('7', 'Pedro', 'Perez', 'e807f1fcf82d132f9bb018ca6738a19f', 'd9b624e5119506eee9fd10bd6861cd30', '3', '3', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy` VALUES ('8', 'Abisai', 'Chavez', 'e807f1fcf82d132f9bb018ca6738a19f', '7b5f522d0fc2673608d633898eac81b3', '13', '3', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy` VALUES ('9', 'Mario', 'Canales', 'e807f1fcf82d132f9bb018ca6738a19f', '23636b9887b68ebaaaf7b25e1af762e4', '4', '3', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy` VALUES ('10', 'Vanessa', 'Perez', 'e807f1fcf82d132f9bb018ca6738a19f', '0c9d7463e807e2fa2e8e0c369f9be527', '3', '1', '1', '0', '0', '1', '1');
INSERT INTO `usuarios_copy` VALUES ('11', 'Alberto', 'Aguilar', 'e807f1fcf82d132f9bb018ca6738a19f', '385a9c5e42ca78bd169c95a90067a433', '3', '1', '3', '0', '0', '1', '1');

-- ----------------------------
-- Table structure for usuarios_copy1
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_copy1`;
CREATE TABLE `usuarios_copy1` (
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
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of usuarios_copy1
-- ----------------------------
INSERT INTO `usuarios_copy1` VALUES ('1', 'Larry', 'Vargas', 'e807f1fcf82d132f9bb018ca6738a19f', '5390db054a81ba9121daa299dc28abc7', '11', '1', '2', '1', '1', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('2', 'Galo', 'Solano', 'e807f1fcf82d132f9bb018ca6738a19f', '84f0c3a18121812c30aef815c9eee92d', '11', '1', '1', '1', '1', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('3', 'Cesar', 'Victorino', 'e807f1fcf82d132f9bb018ca6738a19f', 'f2ef0011ba570a8e73cb9f8ae59dbcc0', '11', '1', '1', '1', '1', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('4', 'Martin', 'Contreras', 'e807f1fcf82d132f9bb018ca6738a19f', '51dae92dc3c9f6beb89c384399837d8b', '11', '1', '1', '1', '1', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('5', 'Juan', 'Zamora', 'e807f1fcf82d132f9bb018ca6738a19f', '0426d5d82dc5aa8741562ffb92fd8347', '13', '1', '1', '1', '1', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('6', 'Abisai', 'Vargas', 'e807f1fcf82d132f9bb018ca6738a19f', 'bf7a21b8aa60e85d309842dd7a202409', '11', '3', '3', '3', '3', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('7', 'Pedro', 'Perez', 'e807f1fcf82d132f9bb018ca6738a19f', 'd9b624e5119506eee9fd10bd6861cd30', '3', '3', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('8', 'Abisai', 'Chavez', 'e807f1fcf82d132f9bb018ca6738a19f', '7b5f522d0fc2673608d633898eac81b3', '13', '3', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('9', 'Mario', 'Canales', 'e807f1fcf82d132f9bb018ca6738a19f', '23636b9887b68ebaaaf7b25e1af762e4', '4', '3', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('10', 'Vanessa', 'Perez', 'e807f1fcf82d132f9bb018ca6738a19f', '0c9d7463e807e2fa2e8e0c369f9be527', '3', '1', '1', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('11', 'Alberto', 'Aguilar', 'e807f1fcf82d132f9bb018ca6738a19f', '385a9c5e42ca78bd169c95a90067a433', '3', '1', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('12', 'Juan', 'Kato', 'f62f0ec972409e975f481a87628852f9', 'd6140d4e08853d007acdf0555da87ef1', '1', '2', '0', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('13', 'Sofia', 'Campos', 'cadd809bcce02601f9cc42efe1ff34f2', '21fc6902bf4e70909c347034aac7dc4b', '1', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('14', 'Juana', 'Gallegos', '99a3c545bbf5c3f87296ac6d162b89fa', 'e33f1c68bf5e2ddb76f41fc0fb5b31d2', '1', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('15', 'Sergio', 'Contreras', 'f3b77450a1a35f3d20009bf718c528d1', 'b4435d225d3497d70e236754d81dd1c2', '1', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('16', 'Laura', 'Bringas', 'b3981fdb010803b938632ddd38ad58d8', '353deb4f8c9ae4cda4cfc23ae4f60424', '0', '2', '0', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('17', 'Rebeca', 'Diaz', '3f96734957765213ae99bc1d506b9d51', '2f40453309516893a853beb3129633e7', '2', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('18', 'Maria', 'Pacheco', 'dd45813bb20c817b9e742a15396d9a83', 'adecf83a745b4cce85e1dc8d01c7a583', '2', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('19', 'Francisco', 'Gonzalez', '0f44e9b074af34a21e3a8c82dce639f1', 'a76dcdaae12b2e011d123b58e04f0dc8', '2', '2', '0', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('20', 'Silvia', 'Garcia', '13e7828964f593ee2f453235177e379e', '9e77a1ce79baabe29b06de224ae25633', '2', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('21', 'Flor', 'Garcia', 'ecd823881232a978310c0562761d44c3', '846b59169e5f406f3637c80d7cec6934', '2', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('22', 'Mirza', 'Ramirez', 'ae4679bf20b77c276d9fbf0487e03bc0', '2cb93030939a64f7c9359da310d52ecb', '2', '2', '0', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('23', 'Alma', 'Montiel', 'a8a6dbdc905df7379502f188ebf8ab02', '73492577700cbfe006dd5c8123a28586', '2', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('24', 'Honorio', 'Mendia', '64a6688207fcd1a9a8953addea6a6cf1', '7feee0ea6aaaf0033b17f4523aa144f5', '2', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('25', 'Manuel', 'Montoya', '27bde6a4ca7b2d5a1d573e2a970a606f', '171e0e844480ccc34ef5fec46c111667', '2', '2', '0', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('26', 'Jose', 'Colmenero', '9b84bc5e54858e7bfa221501aaef6c0f', '271996fcba34fc0d7c9b4be9221bfa77', '2', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('27', 'Armando', 'Ortiz', 'a2b61d46377083b2064ce2da0bda743e', '98c3673f3dbf5074ed4da1389a0c1ec5', '2', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('28', 'Fernando', 'Roman', '7dfdaf78b5f572dbb9f8bc016e4ec9c0', 'af49599f26513d545ff4f093ce2f85d5', '2', '2', '0', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('29', 'Maria', 'Garay', '27fc706b7147ca326f0102046217698e', '2e7b207ad0bdc7b1660b1e996f7bccdf', '2', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('30', 'Roberto', 'Herrera', 'e9c3195b1d27ba71f9e8deacde00b26a', '72450a13d98b3336d1159bbcfd7eb9ba', '2', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('31', 'Esmeralda', 'Valles', '7a40d80040f588097c121b18e3c99f6a', '79d0985a3f3a01391dbe01da7f47e819', '2', '2', '0', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('32', 'Jose', 'Alferez', '6c8afbbcfd8fbcdebca6f83b35ffa56e', 'f6233069056e2bff39d6ea05b6e29a4c', '2', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('33', 'David', 'Arambula', 'eef1e678fff03634c8220bca39cae3f4', 'cee8a68e5925cd5e8f2097168c71d9db', '3', '2', '0', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('34', 'Guadalupe', 'Castro', '1eced7864bfc66e922a141f90495d46c', '2b19a6e7b9a8d78680a8621a45ba0a78', '3', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('35', 'Beatriz', 'Elguezabal', '01586826604048b217bbd42af0f7521d', '8b4f02421407aa9d327e6f5e11588756', '3', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('36', 'Maritza', 'Gonzalez', '938a00347a8d9bc998c8a802036d1731', '6a5f3eb20ab6a1b74332c6c09f3eb65c', '3', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('37', 'Ana', 'Quezada', '6f42bdb52cb2249f7c39762ed3d4a870', '0479b9bd16be50ac3eb7b32ac50ae839', '3', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('38', 'Adolfo', 'Tapia', 'ee3b66dd5708b6b379b97d4924b6b354', '88885b987d507ca1a601e5f1fdcaaa5c', '3', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('39', 'Adriana', 'Maldonado', 'aa350a1f36a2c4579746ea9828d72c5f', '14eb9c49a1f1c994ef9e1772ac36a65e', '4', '2', '0', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('40', 'Maria', 'Muñoz', '2460bcd5a13fd5d67116f7370ed9328a', 'bc0821509e94ad9bbbc68d87b1b6a468', '4', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('41', 'Diana', 'Villarreal', '41cd83a14508638da13af60f8ea732fc', '70ee6c55822cbaccef332eebda2af66a', '4', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('42', 'Margarita', 'Pacheco', '5390739456468dc4867b51ff45aa5574', '361256ec0ab5f7c293b791a2b34a9136', '4', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('43', 'Raul', 'Velazquez', '7f93b10d2d634db0193b5b1260c9f63e', 'ac7feb11c892bc8b0be82135a0022536', '5', '2', '0', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('44', 'Ruth', 'Mendoza', 'cbb8395831827d369d94e89da866b19f', '051ffcf016fa60be1ba56d63d7dd39fb', '5', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('45', 'Celso', 'Villarreal', '6dedb002edfb1ef73ab5cfa751201bad', '0e8f28acdaf35807c75751671b425fd2', '5', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('46', 'Jesus', 'Enriquez', '8c7d80bd2f55bf2c883c031e2dee4248', 'e3377d939ac12f667fb0adffab6a4d90', '5', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('47', 'Anastacio', 'Hernandez', 'e06c52c0fa1ac6fead72eb0c18bdc2cc', '02a267425b7901105f3a1d606f6ee7d2', '5', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('48', 'Juana', 'Garay', 'b3f2820417f5cdf3b079b5cd36e60624', '8ca1a26aa767d5f82c951f4aacdda718', '5', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('49', 'Jose', 'Cabral', '8a04ab6681fd2fb370aa7bc4799b169a', '9c1b5331481f584daeb58fbe001484d7', '5', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('50', 'Alejandra', 'Lozano', 'e324a2ad4c740325b52dc03d06354f3b', '2b1d4d129cdb39f99cab5615c964d5da', '5', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('51', 'Ignacio', 'Ayon', '71e8dc05db3ceb2838390b47122ee23f', '0fca1dd06e457ecb07c04d615aeb9390', '6', '2', '0', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('52', 'Susana', 'Gurrola', '74951a9b207e846e9d6be9e2448982d6', '91cdc60a7b15ad3876473330d2e82a12', '6', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('53', 'Cintya', 'Nuñez', '364c0e2a217620a2041f5a536d24a188', '2b0eb3c3517a8b7c9c41dec8ad7aee65', '6', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('54', 'Jorge', 'Pelagio', '1a6120b60e617dcf999acd8756779d54', 'a0f77ece0ab1175c62b25c338c5510bf', '6', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('55', 'Karina', 'Gonzalez', '36e95bd30d9890953f0eb82fcda5cbba', '4f2c5e5dbc7dca9c7864ab46b167038c', '6', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('56', 'Jose', 'Nuñez', '2ed4650a3360a422dc6a461d64a1c229', '22978dbd63d8d001da1341fdda1f02d1', '6', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('57', 'Manuela', 'Bueno', '48b2bd209d39435d85d0dbeae8e08b51', 'a1955b42460a010449390c87fb7b156d', '6', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('58', 'Jesus', 'Hernandez', '00577e26e85bafb45eea39e6e26a525d', '26b1f9f4d7275f47e83fafdb001bce96', '6', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('59', 'Juan', 'Valverde', '28dbb034523c9f0f39df5efc153aefa0', '2abe7764d045bbee163feae15398d161', '6', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('60', 'Jose', 'Ramirez', 'b1e61e853bf7eb72971ce1fd05f7f4d4', '4ffd03e9f669540242ad0f6c8ea2eefd', '6', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('61', 'Gerardo', 'Guzman', '553d400989457f17d7f2961eaf44f2f7', 'b98dee7ecb1e444dadf118c64d6f7f17', '6', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('62', 'Mario', 'Perez', '7ec6078cb2b751f18450e0af1ed8beb5', '069cc7b7ba6d269fec080e36d0b918e2', '7', '2', '0', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('63', 'Julio', 'Torres', 'e48e8aa6e62e66533e10727f243e44d3', 'e4a95ec638f3d8c9ff296b2db4b739e7', '7', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('64', 'Magdalena', 'Juarez', 'a02424dddc85a2d2467b99dbd110cd21', '57edbaf9a8e314ba92eebd22a9c49109', '7', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('65', 'Marisol', 'Mancinas', '8fcded5a4310c56e9ea4c21ecb4d5ea9', 'a1fa6d7c51b532a8ae69139ee7f917f7', '7', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('66', 'Ruben', 'Amezcua', 'caccea352ac17327c2568691609af549', '6364635639069cd5e47b4b235a241990', '7', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('67', 'Brenda', 'Hernandez', '44a1ab185b90dcd37efde2e8689929bf', '188756f88a55bca746a16d0c84d4fb18', '7', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('68', 'Cesar', 'Loera', '575480861a16b24fda7f6011145497d2', '935d16fd21ba37464ea08f74f1e050ca', '7', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('69', 'Luis', 'Hernandez', '3cf741426f68bf0148c2dec4e36d4184', 'b7daa07ae6ee438b8c5cb5d83eccc659', '8', '2', '0', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('70', 'Franklin', 'Ake', '470847618a0ef55751f0aa097406a40a', 'c52dde2ee6bd2ac06d62e06c0fd88509', '8', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('71', 'Mara', 'Flores', 'a4ce2cda6594b47517fc47098ef245bf', 'e5a7b885864af6985907011c88d5efd7', '8', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('72', 'Daniel', 'Camacho', '11e47e521fb1f43384a6aba4659a5c4d', '683e8873b502e97702437fd560a6a695', '8', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('73', 'Jovani', 'Herrera', '59d8fec5bee507c3861950c44d11f138', '2596dcd18003e9530a02420940a36187', '8', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('74', 'Francisco', 'Tellez', '3b528849cbacd7358cec635c05e4c62c', '896c3502bbb9dddd2c67f5825a0eaa8d', '8', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('75', 'Marisol', 'Herrera', 'e8a7bcd7fbe28671e7d329be258e59ec', 'e007794ba0a8926a33d4a57cf8eb4a55', '8', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('76', 'Catalina', 'Benavente', 'cee01acc29b54caca800552b54b0b786', 'fed70e87c8ab32b5f0adc73272b8c291', '8', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('77', 'Luz', 'Mariscal', '41396f90d57e591c6083775526ec8338', '10c83618ce0db98eacfa1a999e61eed8', '9', '2', '0', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('78', 'Arturo', 'De la rosa', '521dc0686a4177bb4fbfa2b8643476cd', '69001d61fa8c29377fd8f5578cbf1e5a', '9', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('79', 'Marcela', 'Sarellano', 'a26de701f5cd31b61434f80d965cf084', 'fa9169c05e41a7a3ae99207dd67a8649', '9', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('80', 'Silvia', 'Zepeda', 'a27a19e1c36a06ba5d7a2cf45e85262b', '899510a9091f3131f405ec1a4b0d21f8', '9', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('81', 'Fernando', 'Flores', 'afa41158b9db48b89aac6f847460ee04', '397fffdd7c40d8208a4bc3908e5792ec', '9', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('82', 'Madeline', 'Palencia', 'e2da0501b0fc5f40e97ee5227d6146fe', '10c39d4812529e362d0f9cca7aa730a1', '9', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('83', 'Alejandro', 'Gonzalez', 'c640afaa6925bbe9ea0d2eccce1b4c17', 'e3df0983dd9ab4fb572558d5766c0881', '9', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('84', 'Gabriela', 'Rivas', '9e7a474b95ff5e0f84fb4f6ffbbcdd27', 'fcc33adf2425e6192a5919c7e7213179', '10', '2', '0', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('85', 'Felipe', 'Correa', '419356a8d30070cb803182d4f0035c75', '84730741c63235674782265ab00ed037', '10', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('86', 'Martin', 'Lopez', '014d63af24be7ac9a6b0b4c4b497d784', '49dd5a2ee7c027b89eab607b58f56649', '10', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('87', 'Juan', 'Saucedo', '71782bc1a00ae0dce891591e55263233', '6fac84fb268b18bcfb16a2d0247e3334', '10', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('88', 'Maria', 'Longoria', 'a7b47da9d719dbb8c3850410a0325802', 'a2e91f29c85a3c109aba1257c0569b6d', '10', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('89', 'Cesar', 'Victorino', '8ab5a1ee749a9b9944812459dc18b605', 'f2ef0011ba570a8e73cb9f8ae59dbcc0', '11', '1', '0', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('90', 'Galo', 'Solano', 'a11a47ffd28f4759a50fa6bd70e86bbf', '84f0c3a18121812c30aef815c9eee92d', '11', '1', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('91', 'Abril', 'Cardoza', '9c83c1482fc9df4de7907a657b5b37d6', '84870b9a8b26c07af1f1b3c1ceef6304', '11', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('92', 'Rodolfo', 'Rojas', '6a3fac3dfa4f3d9541c244cc4395b0e7', '78e7a6e257b0bc4c72ab9994f07b3d31', '11', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('93', 'Larry', 'Vargas', 'a51a802ed1ed197f77ce04eb9b38bec0', '5390db054a81ba9121daa299dc28abc7', '11', '1', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('94', 'Mario', 'Canalez', 'd8e07847c7e03c523c9e434e3b3174fc', '23636b9887b68ebaaaf7b25e1af762e4', '11', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('95', 'Luis', 'Pineda', '9246e111daee49b4ad88a2f984bd36ca', '7fddf51700ebe643bdaebeb4c8e5e254', '12', '2', '0', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('96', 'Juan', 'Zamora', '7e05abca6573ef31b78cd94bc1432540', '0426d5d82dc5aa8741562ffb92fd8347', '12', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('97', 'Efrain', 'Ramos', '43ddcc18a8f8e0a149e3ea6cc93b5658', '272d86934506059f2eeb445632ec0878', '12', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('98', 'Martin', 'Contreras', 'c017d80026046f8b396a337c2e41b108', '51dae92dc3c9f6beb89c384399837d8b', '12', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('99', 'Daniel', 'Zavala', '30e99c402051080030daada1d96f7761', 'df13976ebd20f0c66c8d458dbeb184b4', '13', '2', '0', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('100', 'Jorge', 'Macias', '0329cc424a8a04c2e1186c46ac941c9d', '4d7e81523621b980f508a884e956f2cf', '13', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('101', 'Blanca', 'Gallegos', '2db31fb987062a36d5121e1bdab1d10a', '30e580fdebbbf0a873671d30f3aeeb8f', '13', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('102', 'Karla', 'Aldaba', '907202bdf28dbebc75cc5a8fc09db045', '43b1f015d140755c0b0286e99d009d70', '14', '2', '0', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('103', 'Mayra', 'Esparza', 'f2ab3cf52c638dfd08f3ae50f19f21de', '7af03a29b56f9025a6f9085fc1676a71', '14', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('104', 'Ernesto', 'Torres', '59f032f7e60ae620a8aa8bd3ef2fd7c3', '02927ba294c5b2f5f646b8dc2f7fe981', '14', '3', '0', '0', '0', '0', '1');
INSERT INTO `usuarios_copy1` VALUES ('105', 'Sandra', 'Gonzalez', '04ff6846b46ca5ed2f3e34091b200e06', '58a10ceb32cb8e69b8172f231af3422d', '15', '2', '0', '0', '0', '1', '1');
INSERT INTO `usuarios_copy1` VALUES ('106', 'Sandra', 'Almaraz', '2c15f9240b721f80b285f0cf99419a2e', '003153953fc40ea22bb14ff40764160e', '15', '3', '0', '0', '0', '0', '1');

-- ----------------------------
-- Table structure for usuarios_copy2
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_copy2`;
CREATE TABLE `usuarios_copy2` (
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
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of usuarios_copy2
-- ----------------------------
INSERT INTO `usuarios_copy2` VALUES ('12', 'Juan', 'Kato', 'f62f0ec972409e975f481a87628852f9', 'd6140d4e08853d007acdf0555da87ef1', '1', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_copy2` VALUES ('13', 'Sofia', 'Campos', 'cadd809bcce02601f9cc42efe1ff34f2', '21fc6902bf4e70909c347034aac7dc4b', '1', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('14', 'Juana', 'Gallegos', '99a3c545bbf5c3f87296ac6d162b89fa', 'e33f1c68bf5e2ddb76f41fc0fb5b31d2', '1', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('15', 'Sergio', 'Contreras', 'f3b77450a1a35f3d20009bf718c528d1', 'b4435d225d3497d70e236754d81dd1c2', '1', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('16', 'Laura', 'Bringas', 'b3981fdb010803b938632ddd38ad58d8', '353deb4f8c9ae4cda4cfc23ae4f60424', '15', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_copy2` VALUES ('17', 'Rebeca', 'Diaz', '3f96734957765213ae99bc1d506b9d51', '2f40453309516893a853beb3129633e7', '15', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('18', 'Maria', 'Pacheco', 'dd45813bb20c817b9e742a15396d9a83', 'adecf83a745b4cce85e1dc8d01c7a583', '15', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('19', 'Francisco', 'Gonzalez', '0f44e9b074af34a21e3a8c82dce639f1', 'a76dcdaae12b2e011d123b58e04f0dc8', '16', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_copy2` VALUES ('20', 'Silvia', 'Garcia', '13e7828964f593ee2f453235177e379e', '9e77a1ce79baabe29b06de224ae25633', '16', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('21', 'Flor', 'Garcia', 'ecd823881232a978310c0562761d44c3', '846b59169e5f406f3637c80d7cec6934', '16', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('22', 'Mirza', 'Ramirez', 'ae4679bf20b77c276d9fbf0487e03bc0', '2cb93030939a64f7c9359da310d52ecb', '17', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_copy2` VALUES ('23', 'Alma', 'Montiel', 'a8a6dbdc905df7379502f188ebf8ab02', '73492577700cbfe006dd5c8123a28586', '17', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('24', 'Honorio', 'Mendia', '64a6688207fcd1a9a8953addea6a6cf1', '7feee0ea6aaaf0033b17f4523aa144f5', '17', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('25', 'Manuel', 'Montoya', '27bde6a4ca7b2d5a1d573e2a970a606f', '171e0e844480ccc34ef5fec46c111667', '18', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_copy2` VALUES ('26', 'Jose', 'Colmenero', '9b84bc5e54858e7bfa221501aaef6c0f', '271996fcba34fc0d7c9b4be9221bfa77', '18', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('27', 'Armando', 'Ortiz', 'a2b61d46377083b2064ce2da0bda743e', '98c3673f3dbf5074ed4da1389a0c1ec5', '18', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('28', 'Fernando', 'Roman', '7dfdaf78b5f572dbb9f8bc016e4ec9c0', 'af49599f26513d545ff4f093ce2f85d5', '19', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_copy2` VALUES ('29', 'Maria', 'Garay', '27fc706b7147ca326f0102046217698e', '2e7b207ad0bdc7b1660b1e996f7bccdf', '19', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('30', 'Roberto', 'Herrera', 'e9c3195b1d27ba71f9e8deacde00b26a', '72450a13d98b3336d1159bbcfd7eb9ba', '19', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('31', 'Esmeralda', 'Valles', '7a40d80040f588097c121b18e3c99f6a', '79d0985a3f3a01391dbe01da7f47e819', '20', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_copy2` VALUES ('32', 'Jose', 'Alferez', '6c8afbbcfd8fbcdebca6f83b35ffa56e', 'f6233069056e2bff39d6ea05b6e29a4c', '20', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('33', 'David', 'Arambula', 'eef1e678fff03634c8220bca39cae3f4', 'cee8a68e5925cd5e8f2097168c71d9db', '3', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_copy2` VALUES ('34', 'Guadalupe', 'Castro', '1eced7864bfc66e922a141f90495d46c', '2b19a6e7b9a8d78680a8621a45ba0a78', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('35', 'Beatriz', 'Elguezabal', '01586826604048b217bbd42af0f7521d', '8b4f02421407aa9d327e6f5e11588756', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('36', 'Maritza', 'Gonzalez', '938a00347a8d9bc998c8a802036d1731', '6a5f3eb20ab6a1b74332c6c09f3eb65c', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('37', 'Ana', 'Quezada', '6f42bdb52cb2249f7c39762ed3d4a870', '0479b9bd16be50ac3eb7b32ac50ae839', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('38', 'Adolfo', 'Tapia', 'ee3b66dd5708b6b379b97d4924b6b354', '88885b987d507ca1a601e5f1fdcaaa5c', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('39', 'Adriana', 'Maldonado', 'aa350a1f36a2c4579746ea9828d72c5f', '14eb9c49a1f1c994ef9e1772ac36a65e', '4', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy2` VALUES ('40', 'Maria', 'Muñoz', '2460bcd5a13fd5d67116f7370ed9328a', 'bc0821509e94ad9bbbc68d87b1b6a468', '4', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('41', 'Diana', 'Villarreal', '41cd83a14508638da13af60f8ea732fc', '70ee6c55822cbaccef332eebda2af66a', '4', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('42', 'Margarita', 'Pacheco', '5390739456468dc4867b51ff45aa5574', '361256ec0ab5f7c293b791a2b34a9136', '4', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('43', 'Raul', 'Velazquez', '7f93b10d2d634db0193b5b1260c9f63e', 'ac7feb11c892bc8b0be82135a0022536', '5', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy2` VALUES ('44', 'Ruth', 'Mendoza', 'cbb8395831827d369d94e89da866b19f', '051ffcf016fa60be1ba56d63d7dd39fb', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('45', 'Celso', 'Villarreal', '6dedb002edfb1ef73ab5cfa751201bad', '0e8f28acdaf35807c75751671b425fd2', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('46', 'Jesus', 'Enriquez', '8c7d80bd2f55bf2c883c031e2dee4248', 'e3377d939ac12f667fb0adffab6a4d90', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('47', 'Anastacio', 'Hernandez', 'e06c52c0fa1ac6fead72eb0c18bdc2cc', '02a267425b7901105f3a1d606f6ee7d2', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('48', 'Juana', 'Garay', 'b3f2820417f5cdf3b079b5cd36e60624', '8ca1a26aa767d5f82c951f4aacdda718', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('49', 'Jose', 'Cabral', '8a04ab6681fd2fb370aa7bc4799b169a', '9c1b5331481f584daeb58fbe001484d7', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('50', 'Alejandra', 'Lozano', 'e324a2ad4c740325b52dc03d06354f3b', '2b1d4d129cdb39f99cab5615c964d5da', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('51', 'Ignacio', 'Ayon', '71e8dc05db3ceb2838390b47122ee23f', '0fca1dd06e457ecb07c04d615aeb9390', '6', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy2` VALUES ('52', 'Susana', 'Gurrola', '74951a9b207e846e9d6be9e2448982d6', '91cdc60a7b15ad3876473330d2e82a12', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('53', 'Cintya', 'Nuñez', '364c0e2a217620a2041f5a536d24a188', '2b0eb3c3517a8b7c9c41dec8ad7aee65', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('54', 'Jorge', 'Pelagio', '1a6120b60e617dcf999acd8756779d54', 'a0f77ece0ab1175c62b25c338c5510bf', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('55', 'Karina', 'Gonzalez', '36e95bd30d9890953f0eb82fcda5cbba', '4f2c5e5dbc7dca9c7864ab46b167038c', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('56', 'Jose', 'Nuñez', '2ed4650a3360a422dc6a461d64a1c229', '22978dbd63d8d001da1341fdda1f02d1', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('57', 'Manuela', 'Bueno', '48b2bd209d39435d85d0dbeae8e08b51', 'a1955b42460a010449390c87fb7b156d', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('58', 'Jesus', 'Hernandez', '00577e26e85bafb45eea39e6e26a525d', '26b1f9f4d7275f47e83fafdb001bce96', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('59', 'Juan', 'Valverde', '28dbb034523c9f0f39df5efc153aefa0', '2abe7764d045bbee163feae15398d161', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('60', 'Jose', 'Ramirez', 'b1e61e853bf7eb72971ce1fd05f7f4d4', '4ffd03e9f669540242ad0f6c8ea2eefd', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('61', 'Gerardo', 'Guzman', '553d400989457f17d7f2961eaf44f2f7', 'b98dee7ecb1e444dadf118c64d6f7f17', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('62', 'Mario', 'Perez', '7ec6078cb2b751f18450e0af1ed8beb5', '069cc7b7ba6d269fec080e36d0b918e2', '7', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy2` VALUES ('63', 'Julio', 'Torres', 'e48e8aa6e62e66533e10727f243e44d3', 'e4a95ec638f3d8c9ff296b2db4b739e7', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('64', 'Magdalena', 'Juarez', 'a02424dddc85a2d2467b99dbd110cd21', '57edbaf9a8e314ba92eebd22a9c49109', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('65', 'Marisol', 'Mancinas', '8fcded5a4310c56e9ea4c21ecb4d5ea9', 'a1fa6d7c51b532a8ae69139ee7f917f7', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('66', 'Ruben', 'Amezcua', 'caccea352ac17327c2568691609af549', '6364635639069cd5e47b4b235a241990', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('67', 'Brenda', 'Hernandez', '44a1ab185b90dcd37efde2e8689929bf', '188756f88a55bca746a16d0c84d4fb18', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('68', 'Cesar', 'Loera', '575480861a16b24fda7f6011145497d2', '935d16fd21ba37464ea08f74f1e050ca', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('69', 'Luis', 'Hernandez', '3cf741426f68bf0148c2dec4e36d4184', 'b7daa07ae6ee438b8c5cb5d83eccc659', '8', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy2` VALUES ('70', 'Franklin', 'Ake', '470847618a0ef55751f0aa097406a40a', 'c52dde2ee6bd2ac06d62e06c0fd88509', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('71', 'Mara', 'Flores', 'a4ce2cda6594b47517fc47098ef245bf', 'e5a7b885864af6985907011c88d5efd7', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('72', 'Daniel', 'Camacho', '11e47e521fb1f43384a6aba4659a5c4d', '683e8873b502e97702437fd560a6a695', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('73', 'Jovani', 'Herrera', '59d8fec5bee507c3861950c44d11f138', '2596dcd18003e9530a02420940a36187', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('74', 'Francisco', 'Tellez', '3b528849cbacd7358cec635c05e4c62c', '896c3502bbb9dddd2c67f5825a0eaa8d', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('75', 'Marisol', 'Herrera', 'e8a7bcd7fbe28671e7d329be258e59ec', 'e007794ba0a8926a33d4a57cf8eb4a55', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('76', 'Catalina', 'Benavente', 'cee01acc29b54caca800552b54b0b786', 'fed70e87c8ab32b5f0adc73272b8c291', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('77', 'Luz', 'Mariscal', '41396f90d57e591c6083775526ec8338', '10c83618ce0db98eacfa1a999e61eed8', '9', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy2` VALUES ('78', 'Arturo', 'De la rosa', '521dc0686a4177bb4fbfa2b8643476cd', '69001d61fa8c29377fd8f5578cbf1e5a', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('79', 'Marcela', 'Sarellano', 'a26de701f5cd31b61434f80d965cf084', 'fa9169c05e41a7a3ae99207dd67a8649', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('80', 'Silvia', 'Zepeda', 'a27a19e1c36a06ba5d7a2cf45e85262b', '899510a9091f3131f405ec1a4b0d21f8', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('81', 'Fernando', 'Flores', 'afa41158b9db48b89aac6f847460ee04', '397fffdd7c40d8208a4bc3908e5792ec', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('82', 'Madeline', 'Palencia', 'e2da0501b0fc5f40e97ee5227d6146fe', '10c39d4812529e362d0f9cca7aa730a1', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('83', 'Alejandro', 'Gonzalez', 'c640afaa6925bbe9ea0d2eccce1b4c17', 'e3df0983dd9ab4fb572558d5766c0881', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('84', 'Gabriela', 'Rivas', '9e7a474b95ff5e0f84fb4f6ffbbcdd27', 'fcc33adf2425e6192a5919c7e7213179', '10', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy2` VALUES ('85', 'Felipe', 'Correa', '419356a8d30070cb803182d4f0035c75', '84730741c63235674782265ab00ed037', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('86', 'Martin', 'Lopez', '014d63af24be7ac9a6b0b4c4b497d784', '49dd5a2ee7c027b89eab607b58f56649', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('87', 'Juan', 'Saucedo', '71782bc1a00ae0dce891591e55263233', '6fac84fb268b18bcfb16a2d0247e3334', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('88', 'Maria', 'Longoria', 'a7b47da9d719dbb8c3850410a0325802', 'a2e91f29c85a3c109aba1257c0569b6d', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('89', 'Cesar', 'Victorino', '8ab5a1ee749a9b9944812459dc18b605', 'f2ef0011ba570a8e73cb9f8ae59dbcc0', '11', '1', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_copy2` VALUES ('90', 'Galo', 'Solano', 'a11a47ffd28f4759a50fa6bd70e86bbf', '84f0c3a18121812c30aef815c9eee92d', '11', '1', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('91', 'Abril', 'Cardoza', '9c83c1482fc9df4de7907a657b5b37d6', '84870b9a8b26c07af1f1b3c1ceef6304', '11', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('92', 'Rodolfo', 'Rojas', '6a3fac3dfa4f3d9541c244cc4395b0e7', '78e7a6e257b0bc4c72ab9994f07b3d31', '11', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('93', 'Larry', 'Vargas', 'a51a802ed1ed197f77ce04eb9b38bec0', '5390db054a81ba9121daa299dc28abc7', '11', '1', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('94', 'Mario', 'Canalez', 'd8e07847c7e03c523c9e434e3b3174fc', '23636b9887b68ebaaaf7b25e1af762e4', '11', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('95', 'Luis', 'Pineda', '9246e111daee49b4ad88a2f984bd36ca', '7fddf51700ebe643bdaebeb4c8e5e254', '12', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy2` VALUES ('96', 'Juan', 'Zamora', '7e05abca6573ef31b78cd94bc1432540', '0426d5d82dc5aa8741562ffb92fd8347', '12', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('97', 'Efrain', 'Ramos', '43ddcc18a8f8e0a149e3ea6cc93b5658', '272d86934506059f2eeb445632ec0878', '12', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('98', 'Martin', 'Contreras', 'c017d80026046f8b396a337c2e41b108', '51dae92dc3c9f6beb89c384399837d8b', '12', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('99', 'Daniel', 'Zavala', '30e99c402051080030daada1d96f7761', 'df13976ebd20f0c66c8d458dbeb184b4', '13', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy2` VALUES ('100', 'Jorge', 'Macias', '0329cc424a8a04c2e1186c46ac941c9d', '4d7e81523621b980f508a884e956f2cf', '13', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('101', 'Blanca', 'Gallegos', '2db31fb987062a36d5121e1bdab1d10a', '30e580fdebbbf0a873671d30f3aeeb8f', '13', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('102', 'Karla', 'Aldaba', '907202bdf28dbebc75cc5a8fc09db045', '43b1f015d140755c0b0286e99d009d70', '14', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy2` VALUES ('103', 'Mayra', 'Esparza', 'f2ab3cf52c638dfd08f3ae50f19f21de', '7af03a29b56f9025a6f9085fc1676a71', '14', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('104', 'Ernesto', 'Torres', '59f032f7e60ae620a8aa8bd3ef2fd7c3', '02927ba294c5b2f5f646b8dc2f7fe981', '14', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy2` VALUES ('105', 'Sandra', 'Gonzalez', '04ff6846b46ca5ed2f3e34091b200e06', '58a10ceb32cb8e69b8172f231af3422d', '15', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy2` VALUES ('106', 'Sandra', 'Almaraz', '2c15f9240b721f80b285f0cf99419a2e', '003153953fc40ea22bb14ff40764160e', '15', '3', '3', '0', '0', '0', '1');

-- ----------------------------
-- Table structure for usuarios_copy3
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_copy3`;
CREATE TABLE `usuarios_copy3` (
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
) ENGINE=MyISAM AUTO_INCREMENT=107 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of usuarios_copy3
-- ----------------------------
INSERT INTO `usuarios_copy3` VALUES ('1', 'Larry', 'Vargas', 'e807f1fcf82d132f9bb018ca6738a19f', '5390db054a81ba9121daa299dc28abc7', '11', '1', '2', '1', '1', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('2', 'Galo', 'Solano', 'e807f1fcf82d132f9bb018ca6738a19f', '84f0c3a18121812c30aef815c9eee92d', '11', '1', '1', '1', '1', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('3', 'Cesar', 'Victorino', 'e807f1fcf82d132f9bb018ca6738a19f', 'f2ef0011ba570a8e73cb9f8ae59dbcc0', '11', '1', '2', '1', '1', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('4', 'Martin', 'Contreras', 'e807f1fcf82d132f9bb018ca6738a19f', '51dae92dc3c9f6beb89c384399837d8b', '11', '1', '1', '1', '1', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('5', 'Juan', 'Zamora', 'e807f1fcf82d132f9bb018ca6738a19f', '0426d5d82dc5aa8741562ffb92fd8347', '13', '1', '1', '1', '1', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('6', 'Abisai', 'Vargas', 'e807f1fcf82d132f9bb018ca6738a19f', 'bf7a21b8aa60e85d309842dd7a202409', '11', '3', '3', '3', '3', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('7', 'Pedro', 'Perez', 'e807f1fcf82d132f9bb018ca6738a19f', 'd9b624e5119506eee9fd10bd6861cd30', '3', '3', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('8', 'Abisai', 'Chavez', 'e807f1fcf82d132f9bb018ca6738a19f', '7b5f522d0fc2673608d633898eac81b3', '13', '3', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('9', 'Mario', 'Canales', 'e807f1fcf82d132f9bb018ca6738a19f', '23636b9887b68ebaaaf7b25e1af762e4', '4', '3', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('10', 'Vanessa', 'Perez', 'e807f1fcf82d132f9bb018ca6738a19f', '0c9d7463e807e2fa2e8e0c369f9be527', '3', '1', '1', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('11', 'Alberto', 'Aguilar', 'e807f1fcf82d132f9bb018ca6738a19f', '385a9c5e42ca78bd169c95a90067a433', '3', '1', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('12', 'Juan', 'Kato', 'e807f1fcf82d132f9bb018ca6738a19f', 'd6140d4e08853d007acdf0555da87ef1', '1', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('13', 'Sofia', 'Campos', 'e807f1fcf82d132f9bb018ca6738a19f', '21fc6902bf4e70909c347034aac7dc4b', '1', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('14', 'Juana', 'Gallegos', 'e807f1fcf82d132f9bb018ca6738a19f', 'e33f1c68bf5e2ddb76f41fc0fb5b31d2', '1', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('15', 'Sergio', 'Contreras', 'e807f1fcf82d132f9bb018ca6738a19f', 'b4435d225d3497d70e236754d81dd1c2', '1', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('16', 'Laura', 'Bringas', 'e807f1fcf82d132f9bb018ca6738a19f', '353deb4f8c9ae4cda4cfc23ae4f60424', '15', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('17', 'Rebeca', 'Diaz', 'e807f1fcf82d132f9bb018ca6738a19f', '2f40453309516893a853beb3129633e7', '15', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('18', 'Maria', 'Pacheco', 'e807f1fcf82d132f9bb018ca6738a19f', 'adecf83a745b4cce85e1dc8d01c7a583', '15', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('19', 'Francisco', 'Gonzalez', 'e807f1fcf82d132f9bb018ca6738a19f', 'a76dcdaae12b2e011d123b58e04f0dc8', '16', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('20', 'Silvia', 'Garcia', 'e807f1fcf82d132f9bb018ca6738a19f', '9e77a1ce79baabe29b06de224ae25633', '16', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('21', 'Flor', 'Garcia', 'e807f1fcf82d132f9bb018ca6738a19f', '846b59169e5f406f3637c80d7cec6934', '16', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('22', 'Mirza', 'Ramirez', 'e807f1fcf82d132f9bb018ca6738a19f', '2cb93030939a64f7c9359da310d52ecb', '17', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('23', 'Alma', 'Montiel', 'e807f1fcf82d132f9bb018ca6738a19f', '73492577700cbfe006dd5c8123a28586', '17', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('24', 'Honorio', 'Mendia', 'e807f1fcf82d132f9bb018ca6738a19f', '7feee0ea6aaaf0033b17f4523aa144f5', '17', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('25', 'Manuel', 'Montoya', 'e807f1fcf82d132f9bb018ca6738a19f', '171e0e844480ccc34ef5fec46c111667', '18', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('26', 'Jose', 'Colmenero', 'e807f1fcf82d132f9bb018ca6738a19f', '271996fcba34fc0d7c9b4be9221bfa77', '18', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('27', 'Armando', 'Ortiz', 'e807f1fcf82d132f9bb018ca6738a19f', '98c3673f3dbf5074ed4da1389a0c1ec5', '18', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('28', 'Fernando', 'Roman', 'e807f1fcf82d132f9bb018ca6738a19f', 'af49599f26513d545ff4f093ce2f85d5', '19', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('29', 'Maria', 'Garay', 'e807f1fcf82d132f9bb018ca6738a19f', '2e7b207ad0bdc7b1660b1e996f7bccdf', '19', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('30', 'Roberto', 'Herrera', 'e807f1fcf82d132f9bb018ca6738a19f', '72450a13d98b3336d1159bbcfd7eb9ba', '19', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('31', 'Esmeralda', 'Valles', 'e807f1fcf82d132f9bb018ca6738a19f', '79d0985a3f3a01391dbe01da7f47e819', '20', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('32', 'Jose', 'Alferez', 'e807f1fcf82d132f9bb018ca6738a19f', 'f6233069056e2bff39d6ea05b6e29a4c', '20', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('33', 'David', 'Arambula', 'e807f1fcf82d132f9bb018ca6738a19f', 'cee8a68e5925cd5e8f2097168c71d9db', '3', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('34', 'Guadalupe', 'Castro', 'e807f1fcf82d132f9bb018ca6738a19f', '2b19a6e7b9a8d78680a8621a45ba0a78', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('35', 'Beatriz', 'Elguezabal', 'e807f1fcf82d132f9bb018ca6738a19f', '8b4f02421407aa9d327e6f5e11588756', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('36', 'Maritza', 'Gonzalez', 'e807f1fcf82d132f9bb018ca6738a19f', '6a5f3eb20ab6a1b74332c6c09f3eb65c', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('37', 'Ana', 'Quezada', 'e807f1fcf82d132f9bb018ca6738a19f', '0479b9bd16be50ac3eb7b32ac50ae839', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('38', 'Adolfo', 'Tapia', 'e807f1fcf82d132f9bb018ca6738a19f', '88885b987d507ca1a601e5f1fdcaaa5c', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('39', 'Adriana', 'Maldonado', 'e807f1fcf82d132f9bb018ca6738a19f', '14eb9c49a1f1c994ef9e1772ac36a65e', '4', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('40', 'Maria', 'Muñoz', 'e807f1fcf82d132f9bb018ca6738a19f', 'bc0821509e94ad9bbbc68d87b1b6a468', '4', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('41', 'Diana', 'Villarreal', 'e807f1fcf82d132f9bb018ca6738a19f', '70ee6c55822cbaccef332eebda2af66a', '4', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('42', 'Margarita', 'Pacheco', 'e807f1fcf82d132f9bb018ca6738a19f', '361256ec0ab5f7c293b791a2b34a9136', '4', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('43', 'Raul', 'Velazquez', 'e807f1fcf82d132f9bb018ca6738a19f', 'ac7feb11c892bc8b0be82135a0022536', '5', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('44', 'Ruth', 'Mendoza', 'e807f1fcf82d132f9bb018ca6738a19f', '051ffcf016fa60be1ba56d63d7dd39fb', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('45', 'Celso', 'Villarreal', 'e807f1fcf82d132f9bb018ca6738a19f', '0e8f28acdaf35807c75751671b425fd2', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('46', 'Jesus', 'Enriquez', 'e807f1fcf82d132f9bb018ca6738a19f', 'e3377d939ac12f667fb0adffab6a4d90', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('47', 'Anastacio', 'Hernandez', 'e807f1fcf82d132f9bb018ca6738a19f', '02a267425b7901105f3a1d606f6ee7d2', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('48', 'Juana', 'Garay', 'e807f1fcf82d132f9bb018ca6738a19f', '8ca1a26aa767d5f82c951f4aacdda718', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('49', 'Jose', 'Cabral', 'e807f1fcf82d132f9bb018ca6738a19f', '9c1b5331481f584daeb58fbe001484d7', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('50', 'Alejandra', 'Lozano', 'e807f1fcf82d132f9bb018ca6738a19f', '2b1d4d129cdb39f99cab5615c964d5da', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('51', 'Ignacio', 'Ayon', 'e807f1fcf82d132f9bb018ca6738a19f', '0fca1dd06e457ecb07c04d615aeb9390', '6', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('52', 'Susana', 'Gurrola', 'e807f1fcf82d132f9bb018ca6738a19f', '91cdc60a7b15ad3876473330d2e82a12', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('53', 'Cintya', 'Nuñez', 'e807f1fcf82d132f9bb018ca6738a19f', '2b0eb3c3517a8b7c9c41dec8ad7aee65', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('54', 'Jorge', 'Pelagio', 'e807f1fcf82d132f9bb018ca6738a19f', 'a0f77ece0ab1175c62b25c338c5510bf', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('55', 'Karina', 'Gonzalez', 'e807f1fcf82d132f9bb018ca6738a19f', '4f2c5e5dbc7dca9c7864ab46b167038c', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('56', 'Jose', 'Nuñez', 'e807f1fcf82d132f9bb018ca6738a19f', '22978dbd63d8d001da1341fdda1f02d1', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('57', 'Manuela', 'Bueno', 'e807f1fcf82d132f9bb018ca6738a19f', 'a1955b42460a010449390c87fb7b156d', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('58', 'Jesus', 'Hernandez', 'e807f1fcf82d132f9bb018ca6738a19f', '26b1f9f4d7275f47e83fafdb001bce96', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('59', 'Juan', 'Valverde', 'e807f1fcf82d132f9bb018ca6738a19f', '2abe7764d045bbee163feae15398d161', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('60', 'Jose', 'Ramirez', 'e807f1fcf82d132f9bb018ca6738a19f', '4ffd03e9f669540242ad0f6c8ea2eefd', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('61', 'Gerardo', 'Guzman', 'e807f1fcf82d132f9bb018ca6738a19f', 'b98dee7ecb1e444dadf118c64d6f7f17', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('62', 'Mario', 'Perez', 'e807f1fcf82d132f9bb018ca6738a19f', '069cc7b7ba6d269fec080e36d0b918e2', '7', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('63', 'Julio', 'Torres', 'e807f1fcf82d132f9bb018ca6738a19f', 'e4a95ec638f3d8c9ff296b2db4b739e7', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('64', 'Magdalena', 'Juarez', 'e807f1fcf82d132f9bb018ca6738a19f', '57edbaf9a8e314ba92eebd22a9c49109', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('65', 'Marisol', 'Mancinas', 'e807f1fcf82d132f9bb018ca6738a19f', 'a1fa6d7c51b532a8ae69139ee7f917f7', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('66', 'Ruben', 'Amezcua', 'e807f1fcf82d132f9bb018ca6738a19f', '6364635639069cd5e47b4b235a241990', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('67', 'Brenda', 'Hernandez', 'e807f1fcf82d132f9bb018ca6738a19f', '188756f88a55bca746a16d0c84d4fb18', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('68', 'Cesar', 'Loera', 'e807f1fcf82d132f9bb018ca6738a19f', '935d16fd21ba37464ea08f74f1e050ca', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('69', 'Luis', 'Hernandez', 'e807f1fcf82d132f9bb018ca6738a19f', 'b7daa07ae6ee438b8c5cb5d83eccc659', '8', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('70', 'Franklin', 'Ake', 'e807f1fcf82d132f9bb018ca6738a19f', 'c52dde2ee6bd2ac06d62e06c0fd88509', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('71', 'Mara', 'Flores', 'e807f1fcf82d132f9bb018ca6738a19f', 'e5a7b885864af6985907011c88d5efd7', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('72', 'Daniel', 'Camacho', 'e807f1fcf82d132f9bb018ca6738a19f', '683e8873b502e97702437fd560a6a695', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('73', 'Jovani', 'Herrera', 'e807f1fcf82d132f9bb018ca6738a19f', '2596dcd18003e9530a02420940a36187', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('74', 'Francisco', 'Tellez', 'e807f1fcf82d132f9bb018ca6738a19f', '896c3502bbb9dddd2c67f5825a0eaa8d', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('75', 'Marisol', 'Herrera', 'e807f1fcf82d132f9bb018ca6738a19f', 'e007794ba0a8926a33d4a57cf8eb4a55', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('76', 'Catalina', 'Benavente', 'e807f1fcf82d132f9bb018ca6738a19f', 'fed70e87c8ab32b5f0adc73272b8c291', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('77', 'Luz', 'Mariscal', 'e807f1fcf82d132f9bb018ca6738a19f', '10c83618ce0db98eacfa1a999e61eed8', '9', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('78', 'Arturo', 'De la rosa', 'e807f1fcf82d132f9bb018ca6738a19f', '69001d61fa8c29377fd8f5578cbf1e5a', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('79', 'Marcela', 'Sarellano', 'e807f1fcf82d132f9bb018ca6738a19f', 'fa9169c05e41a7a3ae99207dd67a8649', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('80', 'Silvia', 'Zepeda', 'e807f1fcf82d132f9bb018ca6738a19f', '899510a9091f3131f405ec1a4b0d21f8', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('81', 'Fernando', 'Flores', 'e807f1fcf82d132f9bb018ca6738a19f', '397fffdd7c40d8208a4bc3908e5792ec', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('82', 'Madeline', 'Palencia', 'e807f1fcf82d132f9bb018ca6738a19f', '10c39d4812529e362d0f9cca7aa730a1', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('83', 'Alejandro', 'Gonzalez', 'e807f1fcf82d132f9bb018ca6738a19f', 'e3df0983dd9ab4fb572558d5766c0881', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('84', 'Gabriela', 'Rivas', 'e807f1fcf82d132f9bb018ca6738a19f', 'fcc33adf2425e6192a5919c7e7213179', '10', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('85', 'Felipe', 'Correa', 'e807f1fcf82d132f9bb018ca6738a19f', '84730741c63235674782265ab00ed037', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('86', 'Martin', 'Lopez', 'e807f1fcf82d132f9bb018ca6738a19f', '49dd5a2ee7c027b89eab607b58f56649', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('87', 'Juan', 'Saucedo', 'e807f1fcf82d132f9bb018ca6738a19f', '6fac84fb268b18bcfb16a2d0247e3334', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('88', 'Maria', 'Longoria', 'e807f1fcf82d132f9bb018ca6738a19f', 'a2e91f29c85a3c109aba1257c0569b6d', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('89', 'Cesar', 'Victorino', 'e807f1fcf82d132f9bb018ca6738a19f', 'f2ef0011ba570a8e73cb9f8ae59dbcc0', '11', '1', '2', '0', '0', '1', '0');
INSERT INTO `usuarios_copy3` VALUES ('90', 'Galo', 'Solano', 'e807f1fcf82d132f9bb018ca6738a19f', '84f0c3a18121812c30aef815c9eee92d', '11', '1', '3', '0', '0', '0', '0');
INSERT INTO `usuarios_copy3` VALUES ('91', 'Abril', 'Cardoza', 'e807f1fcf82d132f9bb018ca6738a19f', '84870b9a8b26c07af1f1b3c1ceef6304', '11', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('92', 'Rodolfo', 'Rojas', 'e807f1fcf82d132f9bb018ca6738a19f', '78e7a6e257b0bc4c72ab9994f07b3d31', '11', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('93', 'Larry', 'Vargas', 'e807f1fcf82d132f9bb018ca6738a19f', '5390db054a81ba9121daa299dc28abc7', '11', '1', '3', '0', '0', '0', '0');
INSERT INTO `usuarios_copy3` VALUES ('94', 'Mario', 'Canalez', 'e807f1fcf82d132f9bb018ca6738a19f', '23636b9887b68ebaaaf7b25e1af762e4', '11', '3', '3', '0', '0', '0', '0');
INSERT INTO `usuarios_copy3` VALUES ('95', 'Luis', 'Pineda', 'e807f1fcf82d132f9bb018ca6738a19f', '7fddf51700ebe643bdaebeb4c8e5e254', '12', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('96', 'Juan', 'Zamora', 'e807f1fcf82d132f9bb018ca6738a19f', '0426d5d82dc5aa8741562ffb92fd8347', '12', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('97', 'Efrain', 'Ramos', 'e807f1fcf82d132f9bb018ca6738a19f', '272d86934506059f2eeb445632ec0878', '12', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('98', 'Martin', 'Contreras', 'e807f1fcf82d132f9bb018ca6738a19f', '51dae92dc3c9f6beb89c384399837d8b', '12', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('99', 'Daniel', 'Zavala', 'e807f1fcf82d132f9bb018ca6738a19f', 'df13976ebd20f0c66c8d458dbeb184b4', '13', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('100', 'Jorge', 'Macias', 'e807f1fcf82d132f9bb018ca6738a19f', '4d7e81523621b980f508a884e956f2cf', '13', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('101', 'Blanca', 'Gallegos', 'e807f1fcf82d132f9bb018ca6738a19f', '30e580fdebbbf0a873671d30f3aeeb8f', '13', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('102', 'Karla', 'Aldaba', 'e807f1fcf82d132f9bb018ca6738a19f', '43b1f015d140755c0b0286e99d009d70', '14', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('103', 'Mayra', 'Esparza', 'e807f1fcf82d132f9bb018ca6738a19f', '7af03a29b56f9025a6f9085fc1676a71', '14', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('104', 'Ernesto', 'Torres', 'e807f1fcf82d132f9bb018ca6738a19f', '02927ba294c5b2f5f646b8dc2f7fe981', '14', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_copy3` VALUES ('105', 'Sandra', 'Gonzalez', 'e807f1fcf82d132f9bb018ca6738a19f', '58a10ceb32cb8e69b8172f231af3422d', '15', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_copy3` VALUES ('106', 'Sandra', 'Almaraz', 'e807f1fcf82d132f9bb018ca6738a19f', '003153953fc40ea22bb14ff40764160e', '15', '3', '3', '0', '0', '0', '1');

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
	ofc.folio_institucion as folio_institucion,
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
	ofc.folio_institucion as folio_institucion,
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
	ofc.folio_institucion as folio_institucion,
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
