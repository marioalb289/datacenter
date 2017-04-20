/*
Navicat MySQL Data Transfer

Source Server         : iepc
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : artic600_datacenter

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-04-20 15:38:17
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sigi_documentos
-- ----------------------------
INSERT INTO `sigi_documentos` VALUES ('1', 'S000000012017-04-17-10-33-58CONT', '0', 'documentos/', '2017-04-17 10:33:58', '8', '2017-04-17 10:33:58', '8');
INSERT INTO `sigi_documentos` VALUES ('2', 'R000000022017-04-17-10-35-17', '0', 'documentos/', '2017-04-17 10:35:17', '9', '2017-04-17 10:35:17', '9');
INSERT INTO `sigi_documentos` VALUES ('3', 'R000000032017-04-17-10-36-08', '0', 'documentos/', '2017-04-17 10:36:08', '8', '2017-04-17 10:36:08', '8');
INSERT INTO `sigi_documentos` VALUES ('4', 'R000000042017-04-17-10-37-06', '0', 'documentos/', '2017-04-17 10:37:06', '9', '2017-04-17 10:37:06', '9');
INSERT INTO `sigi_documentos` VALUES ('5', 'R000000052017-04-17-10-40-20', '0', 'documentos/', '2017-04-17 10:40:20', '8', '2017-04-17 10:40:20', '8');
INSERT INTO `sigi_documentos` VALUES ('6', 'R000000062017-04-17-10-41-27', '0', 'documentos/', '2017-04-17 10:41:27', '9', '2017-04-17 10:41:27', '9');
INSERT INTO `sigi_documentos` VALUES ('7', 'S000000072017-04-17-10-52-06', '0', 'documentos/', '2017-04-17 10:52:06', '8', '2017-04-17 10:52:06', '8');
INSERT INTO `sigi_documentos` VALUES ('8', 'S000000082017-04-17-10-55-09CONT', '0', 'documentos/', '2017-04-17 10:55:09', '8', '2017-04-17 10:55:09', '8');
INSERT INTO `sigi_documentos` VALUES ('9', 'S000000092017-04-17-13-14-44CONT', '0', 'documentos/', '2017-04-17 13:14:44', '10', '2017-04-17 13:14:44', '10');
INSERT INTO `sigi_documentos` VALUES ('10', 'S000000102017-04-17-15-02-54SE', '0', 'documentos/', '2017-04-17 15:02:54', '9', '2017-04-17 15:02:54', '9');
INSERT INTO `sigi_documentos` VALUES ('11', 'S000000112017-04-18-09-11-09CONT', '0', 'documentos/', '2017-04-18 09:11:09', '10', '2017-04-18 09:11:09', '10');
INSERT INTO `sigi_documentos` VALUES ('12', 'S000000122017-04-18-10-29-00SE', '0', 'documentos/', '2017-04-18 10:29:00', '9', '2017-04-18 10:29:00', '9');
INSERT INTO `sigi_documentos` VALUES ('13', 'R000000132017-04-18-10-38-28', '0', 'documentos/', '2017-04-18 10:38:28', '7', '2017-04-18 10:38:28', '7');
INSERT INTO `sigi_documentos` VALUES ('14', 'S000000142017-04-18-10-44-56CONT', '0', 'documentos/', '2017-04-18 10:44:56', '9', '2017-04-18 10:44:56', '9');
INSERT INTO `sigi_documentos` VALUES ('15', 'S000000152017-04-18-11-02-01SE', '0', 'documentos/', '2017-04-18 11:02:01', '9', '2017-04-18 11:02:01', '9');
INSERT INTO `sigi_documentos` VALUES ('16', 'S000000162017-04-18-12-01-28CONT', '0', 'documentos/', '2017-04-18 12:01:28', '10', '2017-04-18 12:01:28', '10');
INSERT INTO `sigi_documentos` VALUES ('17', 'R000000172017-04-18-12-47-57', '0', 'documentos/', '2017-04-18 12:47:57', '9', '2017-04-18 12:47:57', '9');
INSERT INTO `sigi_documentos` VALUES ('18', 'S000000182017-04-18-13-11-04SE', '0', 'documentos/', '2017-04-18 13:11:04', '9', '2017-04-18 13:11:04', '9');
INSERT INTO `sigi_documentos` VALUES ('19', 'S000000192017-04-18-14-43-18SE', '0', 'documentos/', '2017-04-18 14:43:18', '10', '2017-04-18 14:43:18', '10');
INSERT INTO `sigi_documentos` VALUES ('20', 'S000000202017-04-18-15-43-27', '0', 'documentos/', '2017-04-18 15:43:27', '9', '2017-04-18 15:43:27', '9');
INSERT INTO `sigi_documentos` VALUES ('21', 'S000000212017-04-18-15-54-56', '0', 'documentos/', '2017-04-18 15:54:56', '9', '2017-04-18 15:54:56', '9');
INSERT INTO `sigi_documentos` VALUES ('22', 'S000000222017-04-19-09-37-46UTOE', '0', 'documentos/', '2017-04-19 09:37:46', '9', '2017-04-19 09:37:46', '9');
INSERT INTO `sigi_documentos` VALUES ('23', 'S000000232017-04-19-09-40-16UTOE', '0', 'documentos/', '2017-04-19 09:40:16', '9', '2017-04-19 09:40:16', '9');
INSERT INTO `sigi_documentos` VALUES ('24', 'S000000242017-04-19-09-44-34SE', '0', 'documentos/', '2017-04-19 09:44:34', '9', '2017-04-19 09:44:34', '9');
INSERT INTO `sigi_documentos` VALUES ('25', 'S000000252017-04-19-09-46-32SE', '0', 'documentos/', '2017-04-19 09:46:32', '10', '2017-04-19 09:46:32', '10');
INSERT INTO `sigi_documentos` VALUES ('26', 'R000000262017-04-19-13-15-41', '0', 'documentos/', '2017-04-19 13:15:41', '10', '2017-04-19 13:15:41', '10');
INSERT INTO `sigi_documentos` VALUES ('27', 'S000000272017-04-19-13-24-15UTOE', '0', 'documentos/', '2017-04-19 13:24:15', '9', '2017-04-19 13:24:15', '9');
INSERT INTO `sigi_documentos` VALUES ('28', 'R000000282017-04-19-13-28-41', '0', 'documentos/', '2017-04-19 13:28:41', '10', '2017-04-19 13:28:41', '10');
INSERT INTO `sigi_documentos` VALUES ('29', 'S000000292017-04-19-13-51-19UTOE', '0', 'documentos/', '2017-04-19 13:51:19', '9', '2017-04-19 13:51:19', '9');
INSERT INTO `sigi_documentos` VALUES ('30', 'S000000302017-04-19-14-41-50CONT', '0', 'documentos/', '2017-04-19 14:41:50', '10', '2017-04-19 14:41:50', '10');
INSERT INTO `sigi_documentos` VALUES ('31', 'S000000312017-04-19-14-42-23CONT', '0', 'documentos/', '2017-04-19 14:42:23', '10', '2017-04-19 14:42:23', '10');
INSERT INTO `sigi_documentos` VALUES ('32', 'S000000322017-04-19-14-43-07CONT', '0', 'documentos/', '2017-04-19 14:43:07', '10', '2017-04-19 14:43:07', '10');
INSERT INTO `sigi_documentos` VALUES ('33', 'S000000332017-04-19-15-20-13SE', '0', 'documentos/', '2017-04-19 15:20:13', '9', '2017-04-19 15:20:13', '9');
INSERT INTO `sigi_documentos` VALUES ('34', 'R000000342017-04-19-15-22-57', '0', 'documentos/', '2017-04-19 15:22:57', '7', '2017-04-19 15:22:57', '7');
INSERT INTO `sigi_documentos` VALUES ('35', 'R000000352017-04-19-15-35-34', '0', 'documentos/', '2017-04-19 15:35:34', '9', '2017-04-19 15:35:34', '9');
INSERT INTO `sigi_documentos` VALUES ('36', 'R000000362017-04-19-15-38-25', '0', 'documentos/', '2017-04-19 15:38:25', '7', '2017-04-19 15:38:25', '7');

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
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sigi_oficios
-- ----------------------------
INSERT INTO `sigi_oficios` VALUES ('1', 'SOLICITUD', '00000001', 'IEPC-987654678', 'INTERNO', '8', '', '', '', 'se solicita informe de gastos 2016', '', '1', '1', 'INTERNO', '2017-04-17 10:33:58', '8', '2017-04-17 10:33:58', '8');
INSERT INTO `sigi_oficios` VALUES ('2', 'RESPUESTA', '00000002', '34565RFSD', 'INTERNO', '9', '', '', '', 'informe de gastos 2016', '', '1', '1', 'INTERNO', '2017-04-17 10:35:17', '9', '2017-04-17 10:35:17', '9');
INSERT INTO `sigi_oficios` VALUES ('3', 'RESPUESTA', '00000003', 'DSFG456', 'INTERNO', '8', '', '', '', 'se envio el informe del 2017, se pidio el 2016', '', '1', '1', 'INTERNO', '2017-04-17 10:36:08', '8', '2017-04-17 10:36:08', '8');
INSERT INTO `sigi_oficios` VALUES ('4', 'RESPUESTA', '00000004', 'DSFGD4565', 'INTERNO', '9', '', '', '', 'se envia el informe de gastos 2016', '', '1', '1', 'INTERNO', '2017-04-17 10:37:06', '9', '2017-04-17 10:37:06', '9');
INSERT INTO `sigi_oficios` VALUES ('5', 'RESPUESTA', '00000005', '456RDGFD', 'INTERNO', '8', '', '', '', 'MENSAJE 3', '', '1', '1', 'INTERNO', '2017-04-17 10:40:20', '8', '2017-04-17 10:40:20', '8');
INSERT INTO `sigi_oficios` VALUES ('6', 'RESPUESTA', '00000006', 'SDFGHGF456754', 'INTERNO', '9', '', '', '', 'respuesta mensaje 3', '', '1', '1', 'INTERNO', '2017-04-17 10:41:27', '9', '2017-04-17 10:41:27', '9');
INSERT INTO `sigi_oficios` VALUES ('7', 'SOLICITUD', '00000007', 'IPEC78765434678', 'INTERNO', '8', '', '', '', 'mensaje 1', '', '1', null, 'INTERNO', '2017-04-17 10:52:07', '8', '2017-04-17 10:52:07', '8');
INSERT INTO `sigi_oficios` VALUES ('8', 'SOLICITUD', '00000008', 'IEPJDS8943', 'INTERNO', '8', '', '', '', 'MENSAJE 1', '', '1', null, 'INTERNO', '2017-04-17 10:55:09', '8', '2017-04-17 10:55:09', '8');
INSERT INTO `sigi_oficios` VALUES ('9', 'SOLICITUD', '00000009', '345654RTFD', 'EXTERNO', '0', 'ALBERTO RODRIGUEZ', 'OEA', 'DIRECTOR', 'MENSAJE 1', '', '1', '1', 'INTERNO', '2017-04-17 13:14:45', '10', '2017-04-17 13:14:45', '10');
INSERT INTO `sigi_oficios` VALUES ('10', 'SOLICITUD', '00000010', '53RSTDS', 'INTERNO', '9', '', '', '', 'MENSAJE 1', '', '1', null, 'INTERNO', '2017-04-17 15:02:54', '9', '2017-04-17 15:02:54', '9');
INSERT INTO `sigi_oficios` VALUES ('11', 'SOLICITUD', '00000011', 'DFGHF56', 'EXTERNO', '0', 'ALBERTO RODRIGUEZ', 'OEA', 'DIRECTOR', 'MENSAJE 1 PARA SU CONOCIMIENTO Y ARCHIVO', '', '0', null, 'INTERNO', '2017-04-18 09:11:09', '10', '2017-04-18 09:11:09', '10');
INSERT INTO `sigi_oficios` VALUES ('12', 'SOLICITUD', '00000012', '34567654SDFDS', 'INTERNO', '9', '', '', '', 'INFORME DE GASTOS EN PROYECTO', '', '1', '1', 'INTERNO', '2017-04-18 10:29:00', '9', '2017-04-18 10:29:00', '9');
INSERT INTO `sigi_oficios` VALUES ('13', 'RESPUESTA', '00000013', '3456754DSFGD', 'INTERNO', '7', '', '', '', 'SE ENVIA INFORME DE GASTOS DEL PROYECTO', '', '1', '1', 'INTERNO', '2017-04-18 10:38:28', '7', '2017-04-18 10:38:28', '7');
INSERT INTO `sigi_oficios` VALUES ('14', 'SOLICITUD', '00000014', 'sadfg45654', 'INTERNO', '9', '', '', '', 'mensaje 1', '', '1', null, 'INTERNO', '2017-04-18 10:44:56', '9', '2017-04-18 10:44:56', '9');
INSERT INTO `sigi_oficios` VALUES ('15', 'SOLICITUD', '00000015', 'asd1232333', 'INTERNO', '9', '', '', '', 'mensaje 1', '', '1', null, 'INTERNO', '2017-04-18 11:02:01', '9', '2017-04-18 11:02:01', '9');
INSERT INTO `sigi_oficios` VALUES ('16', 'SOLICITUD', '00000016', '', 'EXTERNO', '0', 'ALBERTO RODRIGUEZ', 'OEA', 'DIRECTOR', 'MENSAJE EXTERNO PRUEBA 1', '', '1', null, 'INTERNO', '2017-04-18 12:01:28', '10', '2017-04-18 12:01:28', '10');
INSERT INTO `sigi_oficios` VALUES ('17', 'RESPUESTA', '00000017', '5435ASSAS', 'EXTERNO', '9', 'ALBERTO RODRIGUEZ', 'OEA', 'DIRECTOR', 'RESPUESTA AL MENSAJE 1 DE ORIGEN EXTERNO', '', '1', '1', 'INTERNO', '2017-04-18 12:47:57', '9', '2017-04-18 12:47:57', '9');
INSERT INTO `sigi_oficios` VALUES ('18', 'SOLICITUD', '00000018', 'YT65R21ERTGHGFD', 'INTERNO', '9', '', '', '', 'MENSAJE 1', '', '1', null, 'INTERNO', '2017-04-18 13:11:04', '9', '2017-04-18 13:11:04', '9');
INSERT INTO `sigi_oficios` VALUES ('19', 'SOLICITUD', '00000019', '', 'EXTERNO', '0', 'ALBERTO RODRIGUEZ', 'OEA', 'DIRECTOR', 'mensaje externo 1', '', '1', null, 'INTERNO', '2017-04-18 14:43:19', '10', '2017-04-18 14:43:19', '10');
INSERT INTO `sigi_oficios` VALUES ('20', 'SOLICITUD', '00000020', '34567DSDFG', 'INTERNO', '9', 'ALBERTO RODRIGUEZ', 'OEA', 'DIRECTOR', 'MENSAJE PARA DEPENDENCIA EXTERNA 1', '', '1', null, 'EXTERNO', '2017-04-18 15:43:27', '9', '2017-04-18 15:43:27', '9');
INSERT INTO `sigi_oficios` VALUES ('21', 'SOLICITUD', '00000023', '78387HJSJHSA', 'INTERNO', '9', 'FERNANDO DAVILA GONZALES', 'CONTRALORIA DEL ESTADO', 'DIRECTOR DE FINANZAS', 'SE ENVIA INFORME DE GASTOS', '', '1', '1', 'EXTERNO', '2017-04-19 09:40:16', '9', '2017-04-19 09:40:16', '9');
INSERT INTO `sigi_oficios` VALUES ('22', 'SOLICITUD', '00000024', 'IEPC-2018-0001', 'INTERNO', '9', '', '', '', 'mensaje 1', '', '1', null, 'INTERNO', '2017-04-19 09:44:34', '9', '2017-04-19 09:44:34', '9');
INSERT INTO `sigi_oficios` VALUES ('23', 'SOLICITUD', '00000025', '', 'INTERNO', '0', 'FERNANDO DAVILA GONZALES', 'CONTRALORIA DEL ESTADO', 'DIRECTOR DE FINANZAS', 'SE LE INVITA AL EVENTO DE INFORME', '', '0', null, 'INTERNO', '2017-04-19 09:46:32', '10', '2017-04-19 09:46:32', '10');
INSERT INTO `sigi_oficios` VALUES ('24', 'RESPUESTA', '00000026', '', 'INTERNO', '10', 'FERNANDO DAVILA GONZALES', 'CONTRALORIA DEL ESTADO', 'DIRECTOR DE FINANZAS', 'SE ENVIA RESPUESTA AL INFORME DE GASTOS', '', '1', '1', 'EXTERNO', '2017-04-19 13:15:41', '10', '2017-04-19 13:15:41', '10');
INSERT INTO `sigi_oficios` VALUES ('25', 'SOLICITUD', '00000027', 'IEPC-2016-12426', 'INTERNO', '9', 'RUBER MOREIRA MORALES', 'CONTRALORIA DEL MUNICIPIO', 'DIRECTOR DE FINANZAS DEL MUNICIPIO', 'SE SOLICITA INFORME DE GASTOS DE CAMPAÑA NO SE HAG', '', '1', '1', 'EXTERNO', '2017-04-19 13:24:15', '9', '2017-04-19 13:24:15', '9');
INSERT INTO `sigi_oficios` VALUES ('26', 'RESPUESTA', '00000028', '', 'INTERNO', '10', 'RUBER MOREIRA MORALES', 'CONTRALORIA DEL MUNICIPIO', 'DIRECTOR DE FINANZAS DEL MUNICIPIO', 'AHI SE LOS MANDO', '', '1', '1', 'EXTERNO', '2017-04-19 13:28:41', '10', '2017-04-19 13:28:41', '10');
INSERT INTO `sigi_oficios` VALUES ('27', 'SOLICITUD', '00000029', '2343ADAS', 'INTERNO', '9', 'RUBER MOREIRA MORALES', 'CONTRALORIA DEL MUNICIPIO', 'DIRECTOR DE FINANZAS DEL MUNICIPIO', 'MENSAJE DE PRUEBA 1 CANCELAR', '', '1', null, 'EXTERNO', '2017-04-19 13:51:19', '9', '2017-04-19 13:51:19', '9');
INSERT INTO `sigi_oficios` VALUES ('28', 'SOLICITUD', '00000030', '', 'EXTERNO', '0', 'RUBER MOREIRA MORALES', 'CONTRALORIA DEL MUNICIPIO', 'DIRECTOR DE FINANZAS DEL MUNICIPIO', 'MENSAJE 1', '', '1', null, 'INTERNO', '2017-04-19 14:41:50', '10', '2017-04-19 14:41:50', '10');
INSERT INTO `sigi_oficios` VALUES ('29', 'SOLICITUD', '00000031', '', 'EXTERNO', '0', 'RUBER MOREIRA MORALES', 'CONTRALORIA DEL MUNICIPIO', 'DIRECTOR DE FINANZAS DEL MUNICIPIO', 'MENSAJE 2', '', '1', null, 'INTERNO', '2017-04-19 14:42:23', '10', '2017-04-19 14:42:23', '10');
INSERT INTO `sigi_oficios` VALUES ('30', 'SOLICITUD', '00000032', '', 'EXTERNO', '0', 'FERNANDO DAVILA GONZALES', 'CONTRALORIA DEL ESTADO', 'DIRECTOR DE FINANZAS', 'mensaje 4', '', '1', null, 'INTERNO', '2017-04-19 14:43:07', '10', '2017-04-19 14:43:07', '10');
INSERT INTO `sigi_oficios` VALUES ('31', 'SOLICITUD', '00000033', 'IEPC-201889287', 'INTERNO', '9', '', '', '', 'MENSAJE DE PRUEBA 1', '', '1', '1', 'INTERNO', '2017-04-19 15:20:13', '9', '2017-04-19 15:20:13', '9');
INSERT INTO `sigi_oficios` VALUES ('32', 'RESPUESTA', '00000034', 'IEPC-2812762', 'INTERNO', '7', '', '', '', 'RESPUESTA AL MENSAJE 1', '', '1', '1', 'INTERNO', '2017-04-19 15:22:57', '7', '2017-04-19 15:22:57', '7');
INSERT INTO `sigi_oficios` VALUES ('33', 'RESPUESTA', '00000035', '34567', 'INTERNO', '9', '', '', '', 'mensaje 2', '', '1', '1', 'INTERNO', '2017-04-19 15:35:34', '9', '2017-04-19 15:35:34', '9');
INSERT INTO `sigi_oficios` VALUES ('34', 'RESPUESTA', '00000036', '7766ttt', 'INTERNO', '7', '', '', '', 'respuesta mensaj 2', '', '1', '1', 'INTERNO', '2017-04-19 15:38:25', '7', '2017-04-19 15:38:25', '7');

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
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sigi_oficios_documentos_recepcion
-- ----------------------------
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('1', null, '1', '1', '9', '0', '2017-04-17 10:34:32', 'Para el trámite que corresponda', 'Cerrado', '2017-04-17 10:33:58', '8', '2017-04-17 10:41:28', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('2', null, '1', '1', '3', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-17 10:33:58', '8', '2017-04-17 10:41:28', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('3', null, '1', '1', '7', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-17 10:33:58', '8', '2017-04-17 10:41:28', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('4', null, '1', '1', '6', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-17 10:34:21', '9', '2017-04-17 10:41:28', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('5', '1', '2', '2', '8', '0', '2017-04-17 10:35:37', 'Para el trámite que corresponda', 'Cerrado', '2017-04-17 10:35:17', '9', '2017-04-17 10:41:28', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('6', '1', '3', '3', '9', '0', '2017-04-17 10:36:33', 'Para el trámite que corresponda', 'Cerrado', '2017-04-17 10:36:08', '8', '2017-04-17 10:41:28', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('7', '1', '4', '4', '8', '0', '2017-04-17 10:38:14', 'Para el trámite que corresponda', 'Cerrado', '2017-04-17 10:37:06', '9', '2017-04-17 10:41:28', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('8', '1', '5', '5', '9', '0', '2017-04-17 10:41:12', 'Para conocimiento y archivo', 'Cerrado', '2017-04-17 10:40:20', '8', '2017-04-17 10:41:28', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('9', '1', '6', '6', '8', '0', '2017-04-17 10:41:48', 'Para conocimiento y archivo', 'Cerrado', '2017-04-17 10:41:27', '9', '2017-04-17 10:41:28', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('10', null, '7', '7', '0', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-04-17 10:52:07', '8', '2017-04-17 10:52:07', '8');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('11', null, '8', '8', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-04-17 10:55:09', '8', '2017-04-17 10:55:09', '8');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('12', null, '9', '9', '9', '0', '2017-04-17 14:33:11', 'Para el trámite que corresponda', 'Cerrado', '2017-04-17 13:14:45', '10', '2017-04-18 12:47:57', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('13', null, '10', '10', '7', '0', '2017-04-17 15:48:56', 'Para el trámite que corresponda', 'Abierto', '2017-04-17 15:02:54', '9', '2017-04-17 15:02:54', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('14', null, '10', '10', '8', '1', '2017-04-17 15:06:01', 'Para el trámite que corresponda', 'Abierto', '2017-04-17 15:03:43', '7', '2017-04-17 15:03:43', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('15', null, '11', '11', '9', '0', '2017-04-18 09:16:22', 'Para conocimiento y archivo', 'Cerrado', '2017-04-18 09:11:09', '10', '2017-04-18 09:16:22', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('16', null, '12', '12', '7', '0', '2017-04-18 13:09:46', 'Para el trámite que corresponda', 'Cerrado', '2017-04-18 10:29:00', '9', '2017-04-18 10:38:28', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('17', null, '12', '12', '1', '1', '2017-04-18 13:08:04', 'Para el trámite que corresponda', 'Cerrado', '2017-04-18 10:29:00', '9', '2017-04-18 10:38:28', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('18', null, '12', '12', '2', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-18 10:29:00', '9', '2017-04-18 10:38:28', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('19', null, '12', '12', '3', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-18 10:29:00', '9', '2017-04-18 10:38:28', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('20', null, '12', '12', '4', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-18 10:29:00', '9', '2017-04-18 10:38:28', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('21', '12', '13', '13', '9', '0', '2017-04-18 13:07:07', 'Para el trámite que corresponda', 'Cerrado', '2017-04-18 10:38:28', '7', '2017-04-18 10:38:28', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('22', null, '14', '14', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cancelado', '2017-04-18 10:44:56', '9', '2017-04-18 10:51:21', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('23', null, '14', '14', '1', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cancelado', '2017-04-18 10:44:56', '9', '2017-04-18 10:51:21', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('24', null, '14', '14', '3', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cancelado', '2017-04-18 10:44:56', '9', '2017-04-18 10:51:21', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('25', null, '14', '14', '4', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cancelado', '2017-04-18 10:44:57', '9', '2017-04-18 10:51:21', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('26', null, '14', '14', '8', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cancelado', '2017-04-18 10:44:57', '9', '2017-04-18 10:51:21', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('27', null, '14', '14', '10', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cancelado', '2017-04-18 10:44:57', '9', '2017-04-18 10:51:21', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('28', null, '15', '15', '7', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cancelado', '2017-04-18 11:02:01', '9', '2017-04-18 11:02:06', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('29', null, '15', '15', '1', '1', '2017-04-18 11:59:44', 'Para el trámite que corresponda', 'Cancelado', '2017-04-18 11:02:01', '9', '2017-04-18 11:02:06', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('30', null, '15', '15', '2', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cancelado', '2017-04-18 11:02:01', '9', '2017-04-18 11:02:06', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('31', null, '16', '16', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-18 12:01:28', '10', '2017-04-19 15:38:25', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('32', null, '16', '16', '7', '1', '2017-04-18 12:01:41', 'Para el trámite que corresponda', 'Cerrado', '2017-04-18 12:01:28', '10', '2017-04-19 15:38:25', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('33', null, '16', '16', '8', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-18 12:01:28', '10', '2017-04-19 15:38:25', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('34', '9', '17', '17', '0', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-18 12:47:57', '9', '2017-04-18 12:47:57', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('35', null, '18', '18', '7', '0', '2017-04-18 13:11:16', 'Para el trámite que corresponda', 'Abierto', '2017-04-18 13:11:05', '9', '2017-04-18 13:11:05', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('36', null, '18', '18', '1', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-04-18 13:11:05', '9', '2017-04-18 13:11:05', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('37', null, '18', '18', '8', '1', '2017-04-18 13:12:29', 'Para el trámite que corresponda', 'Abierto', '2017-04-18 13:11:59', '7', '2017-04-18 13:11:59', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('38', null, '19', '19', '7', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cancelado', '2017-04-18 14:43:19', '10', '2017-04-18 15:10:07', '10');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('39', null, '20', '20', '10', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-04-18 15:43:27', '9', '2017-04-18 15:43:27', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('40', null, '21', '23', '10', '0', '2017-04-19 11:56:12', 'Para el trámite que corresponda', 'Cerrado', '2017-04-19 09:40:16', '9', '2017-04-19 13:15:41', '10');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('41', null, '22', '24', '7', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-04-19 09:44:34', '9', '2017-04-19 09:44:34', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('42', null, '23', '25', '7', '0', '2017-04-19 09:46:48', 'Para conocimiento y archivo', 'Cerrado', '2017-04-19 09:46:32', '10', '2017-04-19 09:46:48', '7');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('43', '21', '24', '26', '9', '0', '2017-04-19 13:21:46', 'Para el trámite que corresponda', 'Cerrado', '2017-04-19 13:15:41', '10', '2017-04-19 13:15:41', '10');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('44', null, '25', '27', '10', '0', '2017-04-19 13:26:26', 'Para el trámite que corresponda', 'Cerrado', '2017-04-19 13:24:15', '9', '2017-04-19 13:28:41', '10');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('45', '25', '26', '28', '9', '0', '2017-04-19 13:29:35', 'Para el trámite que corresponda', 'Cerrado', '2017-04-19 13:28:41', '10', '2017-04-19 13:28:41', '10');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('46', null, '27', '29', '10', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cancelado', '2017-04-19 13:51:20', '9', '2017-04-19 13:51:37', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('47', null, '28', '30', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-04-19 14:41:50', '10', '2017-04-19 14:41:50', '10');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('48', null, '29', '31', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-04-19 14:42:23', '10', '2017-04-19 14:42:23', '10');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('49', null, '30', '32', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-04-19 14:43:07', '10', '2017-04-19 14:43:07', '10');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('50', null, '31', '33', '7', '0', '2017-04-19 15:21:47', 'Para el trámite que corresponda', 'Abierto', '2017-04-19 15:20:13', '9', '2017-04-19 15:35:34', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('51', null, '31', '33', '8', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-04-19 15:20:13', '9', '2017-04-19 15:35:34', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('52', '31', '32', '34', '9', '0', '2017-04-19 15:32:57', 'Para el trámite que corresponda', 'Abierto', '2017-04-19 15:22:57', '7', '2017-04-19 15:35:34', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('53', '31', '33', '35', '7', '0', '2017-04-19 15:37:37', 'Para el trámite que corresponda', 'Abierto', '2017-04-19 15:35:34', '9', '2017-04-19 15:35:34', '9');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('54', '31', '34', '36', '9', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-04-19 15:38:25', '7', '2017-04-19 15:38:25', '7');

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
INSERT INTO `usuarios` VALUES ('1', 'Larry', 'Vargas', 'e807f1fcf82d132f9bb018ca6738a19f', '5390db054a81ba9121daa299dc28abc7', '11', '1', '1', '1', '1', '0', '1');
INSERT INTO `usuarios` VALUES ('2', 'Galo', 'Solano', 'e807f1fcf82d132f9bb018ca6738a19f', '84f0c3a18121812c30aef815c9eee92d', '11', '1', '1', '1', '1', '0', '1');
INSERT INTO `usuarios` VALUES ('3', 'Cesar', 'Victorino', 'e807f1fcf82d132f9bb018ca6738a19f', 'f2ef0011ba570a8e73cb9f8ae59dbcc0', '11', '1', '1', '1', '1', '1', '1');
INSERT INTO `usuarios` VALUES ('4', 'Martin', 'Contreras', 'e807f1fcf82d132f9bb018ca6738a19f', '51dae92dc3c9f6beb89c384399837d8b', '11', '1', '1', '1', '1', '0', '1');
INSERT INTO `usuarios` VALUES ('5', 'Juan', 'Zamora', 'e807f1fcf82d132f9bb018ca6738a19f', '0426d5d82dc5aa8741562ffb92fd8347', '13', '1', '1', '1', '1', '1', '1');
INSERT INTO `usuarios` VALUES ('6', 'Abisai', 'Vargas', 'e807f1fcf82d132f9bb018ca6738a19f', 'bf7a21b8aa60e85d309842dd7a202409', '11', '3', '3', '3', '3', '0', '1');
INSERT INTO `usuarios` VALUES ('7', 'Pedro', 'Perez', 'e807f1fcf82d132f9bb018ca6738a19f', 'd9b624e5119506eee9fd10bd6861cd30', '3', '3', '1', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('8', 'Abisai', 'Chavez', 'e807f1fcf82d132f9bb018ca6738a19f', '7b5f522d0fc2673608d633898eac81b3', '13', '3', '1', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('9', 'Mario', 'Canales', 'e807f1fcf82d132f9bb018ca6738a19f', '23636b9887b68ebaaaf7b25e1af762e4', '4', '3', '0', '0', '0', '1', '1');
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
	origen = 'INTERNO' AND ofc.tipo_oficio = 'SOLICITUD' AND ofc.destino = 'EXTERNO' ;

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
