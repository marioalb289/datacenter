/*
Navicat MySQL Data Transfer

Source Server         : iepc
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : artic600_datacenter

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-05-30 15:17:14
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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of areas
-- ----------------------------
INSERT INTO `areas` VALUES ('1', 'Presidencia', '1', 'PRES');
INSERT INTO `areas` VALUES ('2', 'Consejo General', '0', 'CG');
INSERT INTO `areas` VALUES ('3', 'Secretaría Ejecutiva', '1', 'SE');
INSERT INTO `areas` VALUES ('4', 'Contraloría', '1', 'CONT');
INSERT INTO `areas` VALUES ('5', 'Secretaría Técnica', '1', 'ST');
INSERT INTO `areas` VALUES ('6', 'Dirección de Administración', '1', 'ADM');
INSERT INTO `areas` VALUES ('7', 'Dirección de Organización Electoral', '1', 'ORG');
INSERT INTO `areas` VALUES ('8', 'Dirección Jurídica', '1', 'JUR');
INSERT INTO `areas` VALUES ('9', 'Dirección de Capacitación Electoral y Educación Cívica', '1', 'CAP');
INSERT INTO `areas` VALUES ('10', 'Unidad Técnica de Comunicación Social', '1', 'UTS');
INSERT INTO `areas` VALUES ('11', 'Unidad Técnica de Cómputo', '1', 'UTC');
INSERT INTO `areas` VALUES ('12', 'Unidad Técnica de Transparencia y Acceso a la Información', '1', 'UTT');
INSERT INTO `areas` VALUES ('13', 'Unidad Técnica de Servicio Profesional', '1', 'UTP');
INSERT INTO `areas` VALUES ('14', 'Unidad Técnica de Vinculación con el INE', '1', 'UVINE');
INSERT INTO `areas` VALUES ('15', 'Unidad Técnica de Oficialía Electoral', '1', 'UOE');
INSERT INTO `areas` VALUES ('16', 'Consejera Lic. Laura Fabiola Bringas Sanchez', '1', 'CE');
INSERT INTO `areas` VALUES ('17', 'Consejero Lic. Francisco Javier Gonzalez Pérez', '1', 'CE');
INSERT INTO `areas` VALUES ('18', 'Consejera Lic. Mirza Mayela Ramirez Ramirez', '1', 'CE');
INSERT INTO `areas` VALUES ('19', 'Consejero Lic. Manuel Montoya Del Campo', '1', 'CE');
INSERT INTO `areas` VALUES ('20', 'Consejero Lic. Fernando De Jesus Roman Quiñones', '1', 'CE');
INSERT INTO `areas` VALUES ('21', 'Consejera Dra. Esmeralda Valles López', '1', 'CE');

-- ----------------------------
-- Table structure for areas_copy
-- ----------------------------
DROP TABLE IF EXISTS `areas_copy`;
CREATE TABLE `areas_copy` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of areas_copy
-- ----------------------------
INSERT INTO `areas_copy` VALUES ('1', 'Presidencia', '1', 'PRES');
INSERT INTO `areas_copy` VALUES ('2', 'Consejeros Electorales', '0', 'CE');
INSERT INTO `areas_copy` VALUES ('3', 'Secretaria Ejecutiva', '1', 'SE');
INSERT INTO `areas_copy` VALUES ('4', 'Contraloria', '1', 'CONT');
INSERT INTO `areas_copy` VALUES ('5', 'Secrearia Técnica', '1', 'ST');
INSERT INTO `areas_copy` VALUES ('6', 'Dirección de Organización Electoral', '1', 'DOE');
INSERT INTO `areas_copy` VALUES ('7', 'Dirección de Servicio Profesional Electoral', '1', 'DSPE');
INSERT INTO `areas_copy` VALUES ('8', 'Dirección Juridica', '1', 'DJ');
INSERT INTO `areas_copy` VALUES ('9', 'Unidad Técnica de Vinculación con el INE', '1', 'UTVINE');
INSERT INTO `areas_copy` VALUES ('10', 'Unidad Técnica de Servicio Profesional Electoral', '1', 'UTSPE');
INSERT INTO `areas_copy` VALUES ('11', 'Unidad Técnica de Computo', '1', 'UTC');
INSERT INTO `areas_copy` VALUES ('12', 'Unidad Técnica de Comunicación Social', '1', 'UTCS');
INSERT INTO `areas_copy` VALUES ('13', 'Unidad Técnica de Transparencia y Acceso a la Información', '1', 'UTTAI');
INSERT INTO `areas_copy` VALUES ('14', 'Unidad Técnica de Oficialía Electoral', '1', 'UTOE');
INSERT INTO `areas_copy` VALUES ('15', 'Consejera Lic. Laura Fabiola Bringas Sanchez', '1', 'CE');
INSERT INTO `areas_copy` VALUES ('16', 'Consejero Lic. Francisco Javier Gonzalez Pérez', '1', 'CE');
INSERT INTO `areas_copy` VALUES ('17', 'Consejera Lic. Mirza Mayela Ramirez Ramirez', '1', 'CE');
INSERT INTO `areas_copy` VALUES ('18', 'Consejero Lic. Manuel Montoya Del Campo', '1', 'CE');
INSERT INTO `areas_copy` VALUES ('19', 'Consejero Lic. Fernando De Jesus Roman Quiñones', '1', 'CE');
INSERT INTO `areas_copy` VALUES ('20', 'Consejera Dra. Esmeralda Valles López', '1', 'CE');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sigi_documentos
-- ----------------------------
INSERT INTO `sigi_documentos` VALUES ('1', 'S000000012017-05-30-11-02-13SE', '0', 'documentos/', '2017-05-30 11:02:13', '95', '2017-05-30 11:02:13', '95');
INSERT INTO `sigi_documentos` VALUES ('2', 'R000000012017-05-30-11-02-51SE', '0', 'documentos/', '2017-05-30 11:02:51', '17', '2017-05-30 11:02:51', '17');
INSERT INTO `sigi_documentos` VALUES ('3', 'R000000012017-05-30-11-10-40CE', '0', 'documentos/', '2017-05-30 11:10:40', '95', '2017-05-30 11:10:40', '95');
INSERT INTO `sigi_documentos` VALUES ('4', 'R000000012017-05-30-11-17-20CE', '0', 'documentos/', '2017-05-30 11:17:20', '95', '2017-05-30 11:17:20', '95');
INSERT INTO `sigi_documentos` VALUES ('5', 'R000000012017-05-30-12-34-46CE', '0', 'documentos/', '2017-05-30 12:34:46', '95', '2017-05-30 12:34:46', '95');
INSERT INTO `sigi_documentos` VALUES ('6', 'R000000012017-05-30-12-37-16CE', '0', 'documentos/', '2017-05-30 12:37:16', '95', '2017-05-30 12:37:16', '95');
INSERT INTO `sigi_documentos` VALUES ('7', 'R000000012017-05-30-12-39-30CE', '0', 'documentos/', '2017-05-30 12:39:30', '95', '2017-05-30 12:39:30', '95');
INSERT INTO `sigi_documentos` VALUES ('8', 'R000000012017-05-30-12-43-18CE', '0', 'documentos/', '2017-05-30 12:43:18', '95', '2017-05-30 12:43:18', '95');
INSERT INTO `sigi_documentos` VALUES ('9', 'R000000012017-05-30-12-50-35SE', '0', 'documentos/', '2017-05-30 12:50:35', '7', '2017-05-30 12:50:35', '7');
INSERT INTO `sigi_documentos` VALUES ('10', 'R000000012017-05-30-12-59-13CE', '0', 'documentos/', '2017-05-30 12:59:13', '95', '2017-05-30 12:59:13', '95');
INSERT INTO `sigi_documentos` VALUES ('11', 'R000000012017-05-30-13-06-36SE', '0', 'documentos/', '2017-05-30 13:06:36', '17', '2017-05-30 13:06:36', '17');
INSERT INTO `sigi_documentos` VALUES ('12', 'S000000022017-05-30-13-16-38UOE', '0', 'documentos/', '2017-05-30 13:16:38', '95', '2017-05-30 13:16:38', '95');
INSERT INTO `sigi_documentos` VALUES ('13', 'R000000022017-05-30-13-25-06UOE', '0', 'documentos/', '2017-05-30 13:25:07', '89', '2017-05-30 13:25:07', '89');
INSERT INTO `sigi_documentos` VALUES ('14', 'S000000032017-05-30-13-56-51UOE', '0', 'documentos/', '2017-05-30 13:56:51', '95', '2017-05-30 13:56:51', '95');
INSERT INTO `sigi_documentos` VALUES ('15', 'S000000042017-05-30-14-09-26ST', '0', 'documentos/', '2017-05-30 14:09:26', '89', '2017-05-30 14:09:26', '89');
INSERT INTO `sigi_documentos` VALUES ('16', 'R000000042017-05-30-14-11-23ST', '0', 'documentos/', '2017-05-30 14:11:23', '27', '2017-05-30 14:11:23', '27');
INSERT INTO `sigi_documentos` VALUES ('17', 'R000000042017-05-30-14-13-25UOE', '0', 'documentos/', '2017-05-30 14:13:25', '89', '2017-05-30 14:13:25', '89');
INSERT INTO `sigi_documentos` VALUES ('18', 'R000000042017-05-30-14-14-04ST', '0', 'documentos/', '2017-05-30 14:14:04', '27', '2017-05-30 14:14:04', '27');
INSERT INTO `sigi_documentos` VALUES ('19', 'S000000052017-05-30-14-24-34SE', '0', 'documentos/', '2017-05-30 14:24:34', '89', '2017-05-30 14:24:34', '89');
INSERT INTO `sigi_documentos` VALUES ('20', 'S000000062017-05-30-14-30-42UOE', '0', 'documentos/', '2017-05-30 14:30:42', '10', '2017-05-30 14:30:42', '10');
INSERT INTO `sigi_documentos` VALUES ('21', 'S000000072017-05-30-14-54-55UOE', '0', 'documentos/', '2017-05-30 14:54:55', '27', '2017-05-30 14:54:55', '27');

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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sigi_oficios
-- ----------------------------
INSERT INTO `sigi_oficios` VALUES ('1', 'SOLICITUD', '00000001', 'S/N', 'INTERNO', '95', '', '', '', 'Probando mensaje 1', '', '1', '1', 'INTERNO', '0000-00-00', '00:00:00', 'mensaje 1', '2017-05-30 11:02:13', '95', '2017-05-30 11:02:13', '95');
INSERT INTO `sigi_oficios` VALUES ('2', 'RESPUESTA', '00000001', 'S/N', 'INTERNO', '17', '', '', '', 'respuesta al mensaje 1', '', '1', '1', 'INTERNO', null, null, 'respuesta', '2017-05-30 11:02:51', '17', '2017-05-30 11:02:51', '17');
INSERT INTO `sigi_oficios` VALUES ('8', 'RESPUESTA', '00000001', 'S/N', 'INTERNO', '95', '', '', '', 'reabrir el oficio', '', '1', '1', 'INTERNO', null, null, 'respuesta de titulares', '2017-05-30 12:43:18', '95', '2017-05-30 12:43:18', '95');
INSERT INTO `sigi_oficios` VALUES ('9', 'RESPUESTA', '00000001', 'S/N', 'INTERNO', '7', '', '', '', 'en respuesta al oficio reabierto', '', '1', '1', 'INTERNO', null, null, 'reabierto 1', '2017-05-30 12:50:35', '7', '2017-05-30 12:50:35', '7');
INSERT INTO `sigi_oficios` VALUES ('10', 'RESPUESTA', '00000001', 'S/N', 'INTERNO', '95', '', '', '', 'Reabierto oficio 2', '', '1', '1', 'INTERNO', null, null, 'reabrir 2', '2017-05-30 12:59:13', '95', '2017-05-30 12:59:13', '95');
INSERT INTO `sigi_oficios` VALUES ('11', 'RESPUESTA', '00000001', 'S/N', 'INTERNO', '17', '', '', '', 'en respuesta al oficio 2', '', '1', '1', 'INTERNO', null, null, 'respuesta 2 reabrir', '2017-05-30 13:06:36', '17', '2017-05-30 13:06:36', '17');
INSERT INTO `sigi_oficios` VALUES ('12', 'SOLICITUD', '00000002', 'IEPC/000020', 'INTERNO', '95', '', '', '', 'SE ENVIA MENSAJE INTERNO', '', '1', '1', 'INTERNO', '0000-00-00', '00:00:00', 'ESPERANDO RESPUESTA', '2017-05-30 13:16:38', '95', '2017-05-30 13:16:38', '95');
INSERT INTO `sigi_oficios` VALUES ('13', 'RESPUESTA', '00000002', 'IEPC/00021', 'INTERNO', '89', '', '', '', 'En respuesta al oficio 21', '', '1', '1', 'INTERNO', null, null, 'respuesta', '2017-05-30 13:25:07', '89', '2017-05-30 13:25:07', '89');
INSERT INTO `sigi_oficios` VALUES ('14', 'SOLICITUD', '00000003', 'S/N', 'INTERNO', '95', '', '', '', 'otro mensaje de prueba', '', '1', null, 'INTERNO', '0000-00-00', '00:00:00', 'probando', '2017-05-30 13:56:51', '95', '2017-05-30 13:56:51', '95');
INSERT INTO `sigi_oficios` VALUES ('15', 'SOLICITUD', '00000004', 'IEPC/00022', 'INTERNO', '89', '', '', '', 'Oficio de prueba enviando', '', '1', '1', 'INTERNO', '0000-00-00', '00:00:00', 'enviando', '2017-05-30 14:09:26', '89', '2017-05-30 14:09:26', '89');
INSERT INTO `sigi_oficios` VALUES ('16', 'RESPUESTA', '00000004', 'IEPC/00023', 'INTERNO', '27', '', '', '', 'enviando respuesta al oficio', '', '1', '1', 'INTERNO', null, null, 'en respuesta', '2017-05-30 14:11:23', '27', '2017-05-30 14:11:23', '27');
INSERT INTO `sigi_oficios` VALUES ('17', 'RESPUESTA', '00000004', 'S/N', 'INTERNO', '89', '', '', '', 'no es el oficio correcto favor de verificar', '', '1', '1', 'INTERNO', null, null, 'ok', '2017-05-30 14:13:25', '89', '2017-05-30 14:13:25', '89');
INSERT INTO `sigi_oficios` VALUES ('18', 'RESPUESTA', '00000004', 'S/N', 'INTERNO', '27', '', '', '', 'en respuesta  a suoficio', '', '1', '1', 'INTERNO', null, null, 'bla bka', '2017-05-30 14:14:04', '27', '2017-05-30 14:14:04', '27');
INSERT INTO `sigi_oficios` VALUES ('19', 'SOLICITUD', '00000005', 'IEPC/00024', 'INTERNO', '89', 'Phillip Brubeck Gamboa', 'SEDECO', 'Director de Cmr', 'MENSAJE DE PRUEBA DESTINO EXTERNO', '', '1', '1', 'EXTERNO', '0000-00-00', '00:00:00', 'ANALIZANDO RESULTADOS', '2017-05-30 14:24:34', '89', '2017-05-30 14:24:34', '89');
INSERT INTO `sigi_oficios` VALUES ('20', 'RESPUESTA', '00000005', 'S/N', 'EXTERNO', '10', 'Phillip Brubeck Gamboa', 'SEDECO', 'Director de Cmr', 'MENSAJE DE REPSUESTA DE SEDECO', '', '1', '1', 'INTERNO', '2017-05-30', '02:29:00', 'RESPUESTA', '2017-05-30 14:30:42', '10', '2017-05-30 14:38:43', '89');
INSERT INTO `sigi_oficios` VALUES ('21', 'SOLICITUD', '00000007', 'S/N', 'INTERNO', '27', '', '', '', 'llego por correo oficio de sedeco', '', '1', null, 'INTERNO', '0000-00-00', '00:00:00', 'oficio', '2017-05-30 14:54:55', '27', '2017-05-30 14:54:55', '27');

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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sigi_oficios_documentos_recepcion
-- ----------------------------
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('1', null, '1', '1', '7', '0', '2017-05-30 12:49:26', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 11:02:13', '95', '2017-05-30 13:06:37', '17');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('2', null, '1', '1', '91', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 11:02:13', '95', '2017-05-30 13:06:37', '17');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('3', null, '1', '1', '11', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 11:02:13', '95', '2017-05-30 13:06:37', '17');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('4', null, '1', '1', '17', '0', '2017-05-30 11:02:35', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 11:02:13', '95', '2017-05-30 13:06:37', '17');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('5', '1', '2', '2', '95', '0', '2017-05-30 11:08:34', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 11:02:51', '17', '2017-05-30 13:06:37', '17');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('17', '1', '8', '8', '7', '0', '2017-05-30 12:49:59', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 12:43:18', '95', '2017-05-30 13:06:37', '17');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('18', '1', '8', '8', '11', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 12:43:18', '95', '2017-05-30 13:06:37', '17');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('19', '1', '8', '8', '17', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 12:43:18', '95', '2017-05-30 13:06:37', '17');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('20', '1', '9', '9', '95', '0', '2017-05-30 12:58:38', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 12:50:35', '7', '2017-05-30 13:06:37', '17');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('21', '1', '10', '10', '7', '0', '2017-05-30 13:05:39', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 12:59:13', '95', '2017-05-30 13:06:37', '17');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('22', '1', '10', '10', '11', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 12:59:13', '95', '2017-05-30 13:06:37', '17');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('23', '1', '10', '10', '17', '0', '2017-05-30 13:05:46', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 12:59:13', '95', '2017-05-30 13:06:37', '17');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('24', '1', '11', '11', '95', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 13:06:36', '17', '2017-05-30 13:06:37', '17');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('25', null, '12', '12', '89', '0', '2017-05-30 13:23:34', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 13:16:38', '95', '2017-05-30 13:25:07', '89');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('26', null, '12', '12', '9', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 13:16:38', '95', '2017-05-30 13:25:07', '89');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('27', '12', '13', '13', '95', '0', '2017-05-30 13:25:28', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 13:25:07', '89', '2017-05-30 13:25:07', '89');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('28', null, '14', '14', '89', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-05-30 13:56:51', '95', '2017-05-30 13:56:51', '95');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('29', null, '14', '14', '9', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-05-30 13:57:03', '89', '2017-05-30 13:57:03', '89');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('30', null, '14', '14', '8', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-05-30 13:58:29', '89', '2017-05-30 13:58:29', '89');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('31', null, '14', '14', '2', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-05-30 13:59:05', '89', '2017-05-30 13:59:05', '89');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('32', null, '14', '14', '3', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-05-30 14:02:03', '89', '2017-05-30 14:02:03', '89');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('33', null, '14', '14', '27', '1', '2017-05-30 14:03:34', 'Para el trámite que corresponda', 'Abierto', '2017-05-30 14:02:37', '89', '2017-05-30 14:02:37', '89');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('34', null, '15', '15', '27', '0', '2017-05-30 14:10:41', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 14:09:26', '89', '2017-05-30 14:14:04', '27');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('35', null, '15', '15', '5', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 14:09:26', '89', '2017-05-30 14:14:04', '27');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('36', null, '15', '15', '9', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 14:09:26', '89', '2017-05-30 14:14:04', '27');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('37', '15', '16', '16', '89', '0', '2017-05-30 14:11:29', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 14:11:23', '27', '2017-05-30 14:14:04', '27');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('38', '15', '17', '17', '27', '0', '2017-05-30 14:13:39', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 14:13:26', '89', '2017-05-30 14:14:04', '27');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('39', '15', '18', '18', '89', '0', '2017-05-30 14:14:09', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 14:14:04', '27', '2017-05-30 14:14:04', '27');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('40', null, '19', '19', '10', '0', '2017-05-30 14:25:12', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 14:24:34', '89', '2017-05-30 14:38:43', '89');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('41', null, '19', '19', '27', '1', '2017-05-30 14:24:51', 'Para el trámite que corresponda', 'Cerrado', '2017-05-30 14:24:34', '89', '2017-05-30 14:38:43', '89');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('42', '19', '20', '20', '89', '0', '2017-05-30 14:39:59', 'Para conocimiento y archivo', 'Cerrado', '2017-05-30 14:30:42', '10', '2017-05-30 14:38:43', '89');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('43', null, '21', '21', '89', '0', '2017-05-30 14:55:26', 'Para el trámite que corresponda', 'Abierto', '2017-05-30 14:54:55', '27', '2017-05-30 14:54:55', '27');

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
) ENGINE=MyISAM AUTO_INCREMENT=202 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
INSERT INTO `usuarios` VALUES ('12', 'Fernando', 'Roman', 'e807f1fcf82d132f9bb018ca6738a19f', 'af49599f26513d545ff4f093ce2f85d5', '20', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('13', 'Maria', 'Garay', 'e807f1fcf82d132f9bb018ca6738a19f', '2e7b207ad0bdc7b1660b1e996f7bccdf', '20', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('14', 'Roberto', 'Herrera', 'e807f1fcf82d132f9bb018ca6738a19f', '72450a13d98b3336d1159bbcfd7eb9ba', '20', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('15', 'Esmeralda', 'Valles', 'e807f1fcf82d132f9bb018ca6738a19f', '79d0985a3f3a01391dbe01da7f47e819', '21', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('16', 'Jose', 'Alferez', 'e807f1fcf82d132f9bb018ca6738a19f', 'f6233069056e2bff39d6ea05b6e29a4c', '21', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('17', 'David', 'Arambula', 'e807f1fcf82d132f9bb018ca6738a19f', 'cee8a68e5925cd5e8f2097168c71d9db', '3', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('18', 'Guadalupe', 'Castro', 'e807f1fcf82d132f9bb018ca6738a19f', '2b19a6e7b9a8d78680a8621a45ba0a78', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('19', 'Beatriz', 'Elguezabal', 'e807f1fcf82d132f9bb018ca6738a19f', '8b4f02421407aa9d327e6f5e11588756', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('20', 'Maritza', 'Gonzalez', 'e807f1fcf82d132f9bb018ca6738a19f', '6a5f3eb20ab6a1b74332c6c09f3eb65c', '3', '3', '3', '0', '0', '0', '0');
INSERT INTO `usuarios` VALUES ('21', 'Ana', 'Quezada', 'e807f1fcf82d132f9bb018ca6738a19f', '0479b9bd16be50ac3eb7b32ac50ae839', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('22', 'Adolfo', 'Tapia', 'e807f1fcf82d132f9bb018ca6738a19f', '88885b987d507ca1a601e5f1fdcaaa5c', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('23', 'Adriana', 'Maldonado', 'e807f1fcf82d132f9bb018ca6738a19f', '14eb9c49a1f1c994ef9e1772ac36a65e', '4', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('24', 'Maria', 'Muñoz', 'e807f1fcf82d132f9bb018ca6738a19f', 'bc0821509e94ad9bbbc68d87b1b6a468', '4', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('25', 'Diana', 'Villarreal', 'e807f1fcf82d132f9bb018ca6738a19f', '70ee6c55822cbaccef332eebda2af66a', '4', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('26', 'Margarita', 'Pacheco', 'e807f1fcf82d132f9bb018ca6738a19f', '361256ec0ab5f7c293b791a2b34a9136', '4', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('27', 'Raul', 'Velazquez', 'e807f1fcf82d132f9bb018ca6738a19f', 'ac7feb11c892bc8b0be82135a0022536', '5', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('28', 'Ruth', 'Mendoza', 'e807f1fcf82d132f9bb018ca6738a19f', '051ffcf016fa60be1ba56d63d7dd39fb', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('29', 'Celso', 'Villarreal', 'e807f1fcf82d132f9bb018ca6738a19f', '0e8f28acdaf35807c75751671b425fd2', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('30', 'Jesus', 'Enriquez', 'e807f1fcf82d132f9bb018ca6738a19f', 'e3377d939ac12f667fb0adffab6a4d90', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('31', 'Anastacio', 'Hernandez', 'e807f1fcf82d132f9bb018ca6738a19f', '02a267425b7901105f3a1d606f6ee7d2', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('32', 'Juana', 'Garay', 'e807f1fcf82d132f9bb018ca6738a19f', '8ca1a26aa767d5f82c951f4aacdda718', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('33', 'Jose', 'Cabral', 'e807f1fcf82d132f9bb018ca6738a19f', '9c1b5331481f584daeb58fbe001484d7', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('34', 'Alejandra', 'Lozano', 'e807f1fcf82d132f9bb018ca6738a19f', '2b1d4d129cdb39f99cab5615c964d5da', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('35', 'Ignacio', 'Ayon', 'e807f1fcf82d132f9bb018ca6738a19f', '0fca1dd06e457ecb07c04d615aeb9390', '6', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('36', 'Susana', 'Gurrola', 'e807f1fcf82d132f9bb018ca6738a19f', '91cdc60a7b15ad3876473330d2e82a12', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('37', 'Cintya', 'Nuñez', 'e807f1fcf82d132f9bb018ca6738a19f', '2b0eb3c3517a8b7c9c41dec8ad7aee65', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('38', 'Jorge', 'Pelagio', 'e807f1fcf82d132f9bb018ca6738a19f', 'a0f77ece0ab1175c62b25c338c5510bf', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('39', 'Karina', 'Gonzalez', 'e807f1fcf82d132f9bb018ca6738a19f', '4f2c5e5dbc7dca9c7864ab46b167038c', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('40', 'Jose', 'Nuñez', 'e807f1fcf82d132f9bb018ca6738a19f', '22978dbd63d8d001da1341fdda1f02d1', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('41', 'Manuela', 'Bueno', 'e807f1fcf82d132f9bb018ca6738a19f', 'a1955b42460a010449390c87fb7b156d', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('42', 'Jesus', 'Hernandez', 'e807f1fcf82d132f9bb018ca6738a19f', '26b1f9f4d7275f47e83fafdb001bce96', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('43', 'Juan', 'Valverde', 'e807f1fcf82d132f9bb018ca6738a19f', '2abe7764d045bbee163feae15398d161', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('44', 'Jose', 'Ramirez', 'e807f1fcf82d132f9bb018ca6738a19f', '4ffd03e9f669540242ad0f6c8ea2eefd', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('45', 'Gerardo', 'Guzman', 'e807f1fcf82d132f9bb018ca6738a19f', 'b98dee7ecb1e444dadf118c64d6f7f17', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('46', 'Mario', 'Perez', 'e807f1fcf82d132f9bb018ca6738a19f', '069cc7b7ba6d269fec080e36d0b918e2', '7', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('47', 'Julio', 'Torres', 'e807f1fcf82d132f9bb018ca6738a19f', 'e4a95ec638f3d8c9ff296b2db4b739e7', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('48', 'Magdalena', 'Juarez', 'e807f1fcf82d132f9bb018ca6738a19f', '57edbaf9a8e314ba92eebd22a9c49109', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('49', 'Marisol', 'Mancinas', 'e807f1fcf82d132f9bb018ca6738a19f', 'a1fa6d7c51b532a8ae69139ee7f917f7', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('50', 'Ruben', 'Amezcua', 'e807f1fcf82d132f9bb018ca6738a19f', '6364635639069cd5e47b4b235a241990', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('51', 'Brenda', 'Hernandez', 'e807f1fcf82d132f9bb018ca6738a19f', '188756f88a55bca746a16d0c84d4fb18', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('52', 'Cesar', 'Loera', 'e807f1fcf82d132f9bb018ca6738a19f', '935d16fd21ba37464ea08f74f1e050ca', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('53', 'Luis', 'Hernandez', 'e807f1fcf82d132f9bb018ca6738a19f', 'b7daa07ae6ee438b8c5cb5d83eccc659', '8', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('54', 'Franklin', 'Ake', 'e807f1fcf82d132f9bb018ca6738a19f', 'c52dde2ee6bd2ac06d62e06c0fd88509', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('55', 'Mara', 'Flores', 'e807f1fcf82d132f9bb018ca6738a19f', 'e5a7b885864af6985907011c88d5efd7', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('56', 'Daniel', 'Camacho', 'e807f1fcf82d132f9bb018ca6738a19f', '683e8873b502e97702437fd560a6a695', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('57', 'Jovani', 'Herrera', 'e807f1fcf82d132f9bb018ca6738a19f', '2596dcd18003e9530a02420940a36187', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('58', 'Francisco', 'Tellez', 'e807f1fcf82d132f9bb018ca6738a19f', '896c3502bbb9dddd2c67f5825a0eaa8d', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('59', 'Marisol', 'Herrera', 'e807f1fcf82d132f9bb018ca6738a19f', 'e007794ba0a8926a33d4a57cf8eb4a55', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('60', 'Catalina', 'Benavente', 'e807f1fcf82d132f9bb018ca6738a19f', 'fed70e87c8ab32b5f0adc73272b8c291', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('61', 'Luz', 'Mariscal', 'e807f1fcf82d132f9bb018ca6738a19f', '10c83618ce0db98eacfa1a999e61eed8', '9', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('62', 'Arturo', 'De la rosa', 'e807f1fcf82d132f9bb018ca6738a19f', '69001d61fa8c29377fd8f5578cbf1e5a', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('63', 'Marcela', 'Sarellano', 'e807f1fcf82d132f9bb018ca6738a19f', 'fa9169c05e41a7a3ae99207dd67a8649', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('64', 'Silvia', 'Zepeda', 'e807f1fcf82d132f9bb018ca6738a19f', '899510a9091f3131f405ec1a4b0d21f8', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('65', 'Fernando', 'Flores', 'e807f1fcf82d132f9bb018ca6738a19f', '397fffdd7c40d8208a4bc3908e5792ec', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('66', 'Madeline', 'Palencia', 'e807f1fcf82d132f9bb018ca6738a19f', '10c39d4812529e362d0f9cca7aa730a1', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('67', 'Alejandro', 'Gonzalez', 'e807f1fcf82d132f9bb018ca6738a19f', 'e3df0983dd9ab4fb572558d5766c0881', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('68', 'Gabriela', 'Rivas', 'e807f1fcf82d132f9bb018ca6738a19f', 'fcc33adf2425e6192a5919c7e7213179', '10', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('69', 'Felipe', 'Correa', 'e807f1fcf82d132f9bb018ca6738a19f', '84730741c63235674782265ab00ed037', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('70', 'Martin', 'Lopez', 'e807f1fcf82d132f9bb018ca6738a19f', '49dd5a2ee7c027b89eab607b58f56649', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('71', 'Juan', 'Saucedo', 'e807f1fcf82d132f9bb018ca6738a19f', '6fac84fb268b18bcfb16a2d0247e3334', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('72', 'Maria', 'Longoria', 'e807f1fcf82d132f9bb018ca6738a19f', 'a2e91f29c85a3c109aba1257c0569b6d', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('73', 'Cesar', 'Victorino', 'e807f1fcf82d132f9bb018ca6738a19f', 'f2ef0011ba570a8e73cb9f8ae59dbcc0', '11', '1', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('74', 'Galo', 'Solano', 'e807f1fcf82d132f9bb018ca6738a19f', '84f0c3a18121812c30aef815c9eee92d', '11', '1', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('75', 'Abril', 'Cardoza', 'e807f1fcf82d132f9bb018ca6738a19f', '84870b9a8b26c07af1f1b3c1ceef6304', '11', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('76', 'Rodolfo', 'Rojas', 'e807f1fcf82d132f9bb018ca6738a19f', '78e7a6e257b0bc4c72ab9994f07b3d31', '11', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('77', 'Larry', 'Vargas', 'e807f1fcf82d132f9bb018ca6738a19f', '5390db054a81ba9121daa299dc28abc7', '11', '1', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('78', 'Mario', 'Canalez', 'e807f1fcf82d132f9bb018ca6738a19f', '23636b9887b68ebaaaf7b25e1af762e4', '11', '3', '3', '0', '0', '0', '0');
INSERT INTO `usuarios` VALUES ('79', 'Luis', 'Pineda', 'e807f1fcf82d132f9bb018ca6738a19f', '7fddf51700ebe643bdaebeb4c8e5e254', '12', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('80', 'Juan', 'Zamora', 'e807f1fcf82d132f9bb018ca6738a19f', '0426d5d82dc5aa8741562ffb92fd8347', '12', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('81', 'Efrain', 'Ramos', 'e807f1fcf82d132f9bb018ca6738a19f', '272d86934506059f2eeb445632ec0878', '12', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('82', 'Martin', 'Contreras', 'e807f1fcf82d132f9bb018ca6738a19f', '51dae92dc3c9f6beb89c384399837d8b', '12', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('83', 'Daniel', 'Zavala', 'e807f1fcf82d132f9bb018ca6738a19f', 'df13976ebd20f0c66c8d458dbeb184b4', '13', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('84', 'Jorge', 'Macias', 'e807f1fcf82d132f9bb018ca6738a19f', '4d7e81523621b980f508a884e956f2cf', '13', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('85', 'Blanca', 'Gallegos', 'e807f1fcf82d132f9bb018ca6738a19f', '30e580fdebbbf0a873671d30f3aeeb8f', '13', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('86', 'Karla', 'Aldaba', 'e807f1fcf82d132f9bb018ca6738a19f', '43b1f015d140755c0b0286e99d009d70', '14', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('87', 'Mayra', 'Esparza', 'e807f1fcf82d132f9bb018ca6738a19f', '7af03a29b56f9025a6f9085fc1676a71', '14', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('88', 'Ernesto', 'Torres', 'e807f1fcf82d132f9bb018ca6738a19f', '02927ba294c5b2f5f646b8dc2f7fe981', '14', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('89', 'Sandra', 'Gonzalez', 'e807f1fcf82d132f9bb018ca6738a19f', '58a10ceb32cb8e69b8172f231af3422d', '15', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('90', 'Sandra', 'Almaraz', 'e807f1fcf82d132f9bb018ca6738a19f', '003153953fc40ea22bb14ff40764160e', '15', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('91', 'Juan', 'Kato', 'e807f1fcf82d132f9bb018ca6738a19f', 'd6140d4e08853d007acdf0555da87ef1', '1', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('92', 'Sofia', 'Campos', 'e807f1fcf82d132f9bb018ca6738a19f', '21fc6902bf4e70909c347034aac7dc4b', '1', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('93', 'Juana', 'Gallegos', 'e807f1fcf82d132f9bb018ca6738a19f', 'e33f1c68bf5e2ddb76f41fc0fb5b31d2', '1', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('94', 'Sergio', 'Contreras', 'e807f1fcf82d132f9bb018ca6738a19f', 'b4435d225d3497d70e236754d81dd1c2', '1', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('95', 'Laura', 'Bringas', 'e807f1fcf82d132f9bb018ca6738a19f', '353deb4f8c9ae4cda4cfc23ae4f60424', '16', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('96', 'Rebeca', 'Diaz', 'e807f1fcf82d132f9bb018ca6738a19f', '2f40453309516893a853beb3129633e7', '16', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('97', 'Maria', 'Pacheco', 'e807f1fcf82d132f9bb018ca6738a19f', 'adecf83a745b4cce85e1dc8d01c7a583', '16', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('98', 'Francisco', 'Gonzalez', 'e807f1fcf82d132f9bb018ca6738a19f', 'a76dcdaae12b2e011d123b58e04f0dc8', '17', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('99', 'Silvia', 'Garcia', 'e807f1fcf82d132f9bb018ca6738a19f', '9e77a1ce79baabe29b06de224ae25633', '17', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('100', 'Flor', 'Garcia', 'e807f1fcf82d132f9bb018ca6738a19f', '846b59169e5f406f3637c80d7cec6934', '17', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('101', 'Mirza', 'Ramirez', 'e807f1fcf82d132f9bb018ca6738a19f', '2cb93030939a64f7c9359da310d52ecb', '18', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('102', 'Alma', 'Montiel', 'e807f1fcf82d132f9bb018ca6738a19f', '73492577700cbfe006dd5c8123a28586', '18', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('103', 'Honorio', 'Mendia', 'e807f1fcf82d132f9bb018ca6738a19f', '7feee0ea6aaaf0033b17f4523aa144f5', '18', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('104', 'Manuel', 'Montoya', 'e807f1fcf82d132f9bb018ca6738a19f', '171e0e844480ccc34ef5fec46c111667', '19', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('105', 'Jose', 'Colmenero', 'e807f1fcf82d132f9bb018ca6738a19f', '271996fcba34fc0d7c9b4be9221bfa77', '19', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('106', 'Armando', 'Ortiz', 'e807f1fcf82d132f9bb018ca6738a19f', '98c3673f3dbf5074ed4da1389a0c1ec5', '19', '3', '3', '0', '0', '0', '1');

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
-- Table structure for usuarios_ok
-- ----------------------------
DROP TABLE IF EXISTS `usuarios_ok`;
CREATE TABLE `usuarios_ok` (
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
-- Records of usuarios_ok
-- ----------------------------
INSERT INTO `usuarios_ok` VALUES ('1', 'Juan', 'Kato', 'f62f0ec972409e975f481a87628852f9', 'd6140d4e08853d007acdf0555da87ef1', '1', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_ok` VALUES ('2', 'Sofia', 'Campos', 'cadd809bcce02601f9cc42efe1ff34f2', '21fc6902bf4e70909c347034aac7dc4b', '1', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('3', 'Juana', 'Gallegos', '99a3c545bbf5c3f87296ac6d162b89fa', 'e33f1c68bf5e2ddb76f41fc0fb5b31d2', '1', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('4', 'Sergio', 'Contreras', 'f3b77450a1a35f3d20009bf718c528d1', 'b4435d225d3497d70e236754d81dd1c2', '1', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('5', 'Laura', 'Bringas', 'b3981fdb010803b938632ddd38ad58d8', '353deb4f8c9ae4cda4cfc23ae4f60424', '16', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_ok` VALUES ('6', 'Rebeca', 'Diaz', '3f96734957765213ae99bc1d506b9d51', '2f40453309516893a853beb3129633e7', '16', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('7', 'Maria', 'Pacheco', 'dd45813bb20c817b9e742a15396d9a83', 'adecf83a745b4cce85e1dc8d01c7a583', '16', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('8', 'Francisco', 'Gonzalez', '0f44e9b074af34a21e3a8c82dce639f1', 'a76dcdaae12b2e011d123b58e04f0dc8', '17', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_ok` VALUES ('9', 'Silvia', 'Garcia', '13e7828964f593ee2f453235177e379e', '9e77a1ce79baabe29b06de224ae25633', '17', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('10', 'Flor', 'Garcia', 'ecd823881232a978310c0562761d44c3', '846b59169e5f406f3637c80d7cec6934', '17', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('11', 'Mirza', 'Ramirez', 'ae4679bf20b77c276d9fbf0487e03bc0', '2cb93030939a64f7c9359da310d52ecb', '18', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_ok` VALUES ('12', 'Alma', 'Montiel', 'a8a6dbdc905df7379502f188ebf8ab02', '73492577700cbfe006dd5c8123a28586', '18', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('13', 'Honorio', 'Mendia', '64a6688207fcd1a9a8953addea6a6cf1', '7feee0ea6aaaf0033b17f4523aa144f5', '18', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('14', 'Manuel', 'Montoya', '27bde6a4ca7b2d5a1d573e2a970a606f', '171e0e844480ccc34ef5fec46c111667', '19', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_ok` VALUES ('15', 'Jose', 'Colmenero', '9b84bc5e54858e7bfa221501aaef6c0f', '271996fcba34fc0d7c9b4be9221bfa77', '19', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('16', 'Armando', 'Ortiz', 'a2b61d46377083b2064ce2da0bda743e', '98c3673f3dbf5074ed4da1389a0c1ec5', '19', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('17', 'Fernando', 'Roman', '7dfdaf78b5f572dbb9f8bc016e4ec9c0', 'af49599f26513d545ff4f093ce2f85d5', '20', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_ok` VALUES ('18', 'Maria', 'Garay', '27fc706b7147ca326f0102046217698e', '2e7b207ad0bdc7b1660b1e996f7bccdf', '20', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('19', 'Roberto', 'Herrera', 'e9c3195b1d27ba71f9e8deacde00b26a', '72450a13d98b3336d1159bbcfd7eb9ba', '20', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('20', 'Esmeralda', 'Valles', '7a40d80040f588097c121b18e3c99f6a', '79d0985a3f3a01391dbe01da7f47e819', '21', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_ok` VALUES ('21', 'Jose', 'Alferez', '6c8afbbcfd8fbcdebca6f83b35ffa56e', 'f6233069056e2bff39d6ea05b6e29a4c', '21', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('22', 'David', 'Arambula', 'eef1e678fff03634c8220bca39cae3f4', 'cee8a68e5925cd5e8f2097168c71d9db', '3', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_ok` VALUES ('23', 'Guadalupe', 'Castro', '1eced7864bfc66e922a141f90495d46c', '2b19a6e7b9a8d78680a8621a45ba0a78', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('24', 'Beatriz', 'Elguezabal', '01586826604048b217bbd42af0f7521d', '8b4f02421407aa9d327e6f5e11588756', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('25', 'Maritza', 'Gonzalez', '938a00347a8d9bc998c8a802036d1731', '6a5f3eb20ab6a1b74332c6c09f3eb65c', '3', '3', '1', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('26', 'Ana', 'Quezada', '6f42bdb52cb2249f7c39762ed3d4a870', '0479b9bd16be50ac3eb7b32ac50ae839', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('27', 'Adolfo', 'Tapia', 'ee3b66dd5708b6b379b97d4924b6b354', '88885b987d507ca1a601e5f1fdcaaa5c', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('28', 'Adriana', 'Maldonado', 'aa350a1f36a2c4579746ea9828d72c5f', '14eb9c49a1f1c994ef9e1772ac36a65e', '4', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_ok` VALUES ('29', 'Maria', 'Muñoz', '2460bcd5a13fd5d67116f7370ed9328a', 'bc0821509e94ad9bbbc68d87b1b6a468', '4', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('30', 'Diana', 'Villarreal', '41cd83a14508638da13af60f8ea732fc', '70ee6c55822cbaccef332eebda2af66a', '4', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('31', 'Margarita', 'Pacheco', '5390739456468dc4867b51ff45aa5574', '361256ec0ab5f7c293b791a2b34a9136', '4', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('32', 'Raul', 'Velazquez', '7f93b10d2d634db0193b5b1260c9f63e', 'ac7feb11c892bc8b0be82135a0022536', '5', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_ok` VALUES ('33', 'Ruth', 'Mendoza', 'cbb8395831827d369d94e89da866b19f', '051ffcf016fa60be1ba56d63d7dd39fb', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('34', 'Celso', 'Villarreal', '6dedb002edfb1ef73ab5cfa751201bad', '0e8f28acdaf35807c75751671b425fd2', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('35', 'Jesus', 'Enriquez', '8c7d80bd2f55bf2c883c031e2dee4248', 'e3377d939ac12f667fb0adffab6a4d90', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('36', 'Anastacio', 'Hernandez', 'e06c52c0fa1ac6fead72eb0c18bdc2cc', '02a267425b7901105f3a1d606f6ee7d2', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('37', 'Juana', 'Garay', 'b3f2820417f5cdf3b079b5cd36e60624', '8ca1a26aa767d5f82c951f4aacdda718', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('38', 'Jose', 'Cabral', '8a04ab6681fd2fb370aa7bc4799b169a', '9c1b5331481f584daeb58fbe001484d7', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('39', 'Alejandra', 'Lozano', 'e324a2ad4c740325b52dc03d06354f3b', '2b1d4d129cdb39f99cab5615c964d5da', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('40', 'Ignacio', 'Ayon', '71e8dc05db3ceb2838390b47122ee23f', '0fca1dd06e457ecb07c04d615aeb9390', '6', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_ok` VALUES ('41', 'Susana', 'Gurrola', '74951a9b207e846e9d6be9e2448982d6', '91cdc60a7b15ad3876473330d2e82a12', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('42', 'Cintya', 'Nuñez', '364c0e2a217620a2041f5a536d24a188', '2b0eb3c3517a8b7c9c41dec8ad7aee65', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('43', 'Jorge', 'Pelagio', '1a6120b60e617dcf999acd8756779d54', 'a0f77ece0ab1175c62b25c338c5510bf', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('44', 'Karina', 'Gonzalez', '36e95bd30d9890953f0eb82fcda5cbba', '4f2c5e5dbc7dca9c7864ab46b167038c', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('45', 'Jose', 'Nuñez', '2ed4650a3360a422dc6a461d64a1c229', '22978dbd63d8d001da1341fdda1f02d1', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('46', 'Manuela', 'Bueno', '48b2bd209d39435d85d0dbeae8e08b51', 'a1955b42460a010449390c87fb7b156d', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('47', 'Jesus', 'Hernandez', '00577e26e85bafb45eea39e6e26a525d', '26b1f9f4d7275f47e83fafdb001bce96', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('48', 'Juan', 'Valverde', '28dbb034523c9f0f39df5efc153aefa0', '2abe7764d045bbee163feae15398d161', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('49', 'Jose', 'Ramirez', 'b1e61e853bf7eb72971ce1fd05f7f4d4', '4ffd03e9f669540242ad0f6c8ea2eefd', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('50', 'Gerardo', 'Guzman', '553d400989457f17d7f2961eaf44f2f7', 'b98dee7ecb1e444dadf118c64d6f7f17', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('51', 'Mario', 'Perez', '7ec6078cb2b751f18450e0af1ed8beb5', '069cc7b7ba6d269fec080e36d0b918e2', '7', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_ok` VALUES ('52', 'Julio', 'Torres', 'e48e8aa6e62e66533e10727f243e44d3', 'e4a95ec638f3d8c9ff296b2db4b739e7', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('53', 'Magdalena', 'Juarez', 'a02424dddc85a2d2467b99dbd110cd21', '57edbaf9a8e314ba92eebd22a9c49109', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('54', 'Marisol', 'Mancinas', '8fcded5a4310c56e9ea4c21ecb4d5ea9', 'a1fa6d7c51b532a8ae69139ee7f917f7', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('55', 'Ruben', 'Amezcua', 'caccea352ac17327c2568691609af549', '6364635639069cd5e47b4b235a241990', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('56', 'Brenda', 'Hernandez', '44a1ab185b90dcd37efde2e8689929bf', '188756f88a55bca746a16d0c84d4fb18', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('57', 'Cesar', 'Loera', '575480861a16b24fda7f6011145497d2', '935d16fd21ba37464ea08f74f1e050ca', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('58', 'Luis', 'Hernandez', '3cf741426f68bf0148c2dec4e36d4184', 'b7daa07ae6ee438b8c5cb5d83eccc659', '8', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_ok` VALUES ('59', 'Franklin', 'Ake', '470847618a0ef55751f0aa097406a40a', 'c52dde2ee6bd2ac06d62e06c0fd88509', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('60', 'Mara', 'Flores', 'a4ce2cda6594b47517fc47098ef245bf', 'e5a7b885864af6985907011c88d5efd7', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('61', 'Daniel', 'Camacho', '11e47e521fb1f43384a6aba4659a5c4d', '683e8873b502e97702437fd560a6a695', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('62', 'Jovani', 'Herrera', '59d8fec5bee507c3861950c44d11f138', '2596dcd18003e9530a02420940a36187', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('63', 'Francisco', 'Tellez', '3b528849cbacd7358cec635c05e4c62c', '896c3502bbb9dddd2c67f5825a0eaa8d', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('64', 'Marisol', 'Herrera', 'e8a7bcd7fbe28671e7d329be258e59ec', 'e007794ba0a8926a33d4a57cf8eb4a55', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('65', 'Catalina', 'Benavente', 'cee01acc29b54caca800552b54b0b786', 'fed70e87c8ab32b5f0adc73272b8c291', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('66', 'Luz', 'Mariscal', '41396f90d57e591c6083775526ec8338', '10c83618ce0db98eacfa1a999e61eed8', '9', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_ok` VALUES ('67', 'Arturo', 'De la rosa', '521dc0686a4177bb4fbfa2b8643476cd', '69001d61fa8c29377fd8f5578cbf1e5a', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('68', 'Marcela', 'Sarellano', 'a26de701f5cd31b61434f80d965cf084', 'fa9169c05e41a7a3ae99207dd67a8649', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('69', 'Silvia', 'Zepeda', 'a27a19e1c36a06ba5d7a2cf45e85262b', '899510a9091f3131f405ec1a4b0d21f8', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('70', 'Fernando', 'Flores', 'afa41158b9db48b89aac6f847460ee04', '397fffdd7c40d8208a4bc3908e5792ec', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('71', 'Madeline', 'Palencia', 'e2da0501b0fc5f40e97ee5227d6146fe', '10c39d4812529e362d0f9cca7aa730a1', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('72', 'Alejandro', 'Gonzalez', 'c640afaa6925bbe9ea0d2eccce1b4c17', 'e3df0983dd9ab4fb572558d5766c0881', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('73', 'Gabriela', 'Rivas', '9e7a474b95ff5e0f84fb4f6ffbbcdd27', 'fcc33adf2425e6192a5919c7e7213179', '10', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_ok` VALUES ('74', 'Felipe', 'Correa', '419356a8d30070cb803182d4f0035c75', '84730741c63235674782265ab00ed037', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('75', 'Martin', 'Lopez', '014d63af24be7ac9a6b0b4c4b497d784', '49dd5a2ee7c027b89eab607b58f56649', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('76', 'Juan', 'Saucedo', '71782bc1a00ae0dce891591e55263233', '6fac84fb268b18bcfb16a2d0247e3334', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('77', 'Maria', 'Longoria', 'a7b47da9d719dbb8c3850410a0325802', 'a2e91f29c85a3c109aba1257c0569b6d', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('78', 'Cesar', 'Victorino', '8ab5a1ee749a9b9944812459dc18b605', 'f2ef0011ba570a8e73cb9f8ae59dbcc0', '11', '1', '2', '0', '0', '1', '1');
INSERT INTO `usuarios_ok` VALUES ('79', 'Galo', 'Solano', 'a11a47ffd28f4759a50fa6bd70e86bbf', '84f0c3a18121812c30aef815c9eee92d', '11', '1', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('80', 'Abril', 'Cardoza', '9c83c1482fc9df4de7907a657b5b37d6', '84870b9a8b26c07af1f1b3c1ceef6304', '11', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('81', 'Rodolfo', 'Rojas', '6a3fac3dfa4f3d9541c244cc4395b0e7', '78e7a6e257b0bc4c72ab9994f07b3d31', '11', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('82', 'Larry', 'Vargas', 'a51a802ed1ed197f77ce04eb9b38bec0', '5390db054a81ba9121daa299dc28abc7', '11', '1', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('83', 'Mario', 'Canalez', 'd8e07847c7e03c523c9e434e3b3174fc', '23636b9887b68ebaaaf7b25e1af762e4', '11', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('84', 'Luis', 'Pineda', '9246e111daee49b4ad88a2f984bd36ca', '7fddf51700ebe643bdaebeb4c8e5e254', '12', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_ok` VALUES ('85', 'Juan', 'Zamora', '7e05abca6573ef31b78cd94bc1432540', '0426d5d82dc5aa8741562ffb92fd8347', '12', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('86', 'Efrain', 'Ramos', '43ddcc18a8f8e0a149e3ea6cc93b5658', '272d86934506059f2eeb445632ec0878', '12', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('87', 'Martin', 'Contreras', 'c017d80026046f8b396a337c2e41b108', '51dae92dc3c9f6beb89c384399837d8b', '12', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('88', 'Daniel', 'Zavala', '30e99c402051080030daada1d96f7761', 'df13976ebd20f0c66c8d458dbeb184b4', '13', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_ok` VALUES ('89', 'Jorge', 'Macias', '0329cc424a8a04c2e1186c46ac941c9d', '4d7e81523621b980f508a884e956f2cf', '13', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('90', 'Blanca', 'Gallegos', '2db31fb987062a36d5121e1bdab1d10a', '30e580fdebbbf0a873671d30f3aeeb8f', '13', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('91', 'Karla', 'Aldaba', '907202bdf28dbebc75cc5a8fc09db045', '43b1f015d140755c0b0286e99d009d70', '14', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_ok` VALUES ('92', 'Mayra', 'Esparza', 'f2ab3cf52c638dfd08f3ae50f19f21de', '7af03a29b56f9025a6f9085fc1676a71', '14', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('93', 'Ernesto', 'Torres', '59f032f7e60ae620a8aa8bd3ef2fd7c3', '02927ba294c5b2f5f646b8dc2f7fe981', '14', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios_ok` VALUES ('94', 'Sandra', 'Gonzalez', '04ff6846b46ca5ed2f3e34091b200e06', '58a10ceb32cb8e69b8172f231af3422d', '15', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios_ok` VALUES ('95', 'Sandra', 'Almaraz', '2c15f9240b721f80b285f0cf99419a2e', '003153953fc40ea22bb14ff40764160e', '15', '3', '3', '0', '0', '0', '1');

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
