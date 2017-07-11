/*
Navicat MySQL Data Transfer

Source Server         : iepc
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : datacenter

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-07-11 15:55:36
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
INSERT INTO `areas` VALUES ('16', 'Consejera Lic. Laura Fabiola Bringas Sanchez', '1', 'CELFBS');
INSERT INTO `areas` VALUES ('17', 'Consejero Lic. Francisco Javier Gonzalez Pérez', '1', 'CEFJGP');
INSERT INTO `areas` VALUES ('18', 'Consejera Lic. Mirza Mayela Ramirez Ramirez', '1', 'CEMMRR');
INSERT INTO `areas` VALUES ('19', 'Consejero Lic. Manuel Montoya Del Campo', '1', 'CEMMC');
INSERT INTO `areas` VALUES ('20', 'Consejero Lic. Fernando De Jesus Roman Quiñones', '1', 'CEFJRQ');
INSERT INTO `areas` VALUES ('21', 'Consejera Dra. Esmeralda Valles López', '1', 'CEEVL');

-- ----------------------------
-- Table structure for cosas_requi
-- ----------------------------
DROP TABLE IF EXISTS `cosas_requi`;
CREATE TABLE `cosas_requi` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre_cosa` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `area_cosa` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of cosas_requi
-- ----------------------------
INSERT INTO `cosas_requi` VALUES ('1', 'Proyector y Pantalla', '11');
INSERT INTO `cosas_requi` VALUES ('2', 'Computadora', '11');
INSERT INTO `cosas_requi` VALUES ('3', 'Pantalla Led', '11');
INSERT INTO `cosas_requi` VALUES ('4', 'Presentador de diapositivas', '11');
INSERT INTO `cosas_requi` VALUES ('5', 'Audio multimedia', '11');
INSERT INTO `cosas_requi` VALUES ('6', 'Cronómetro de sesión', '11');
INSERT INTO `cosas_requi` VALUES ('7', 'BAM', '11');
INSERT INTO `cosas_requi` VALUES ('8', 'Cafetería', '6');
INSERT INTO `cosas_requi` VALUES ('9', 'Adecuación de mobiliario', '6');
INSERT INTO `cosas_requi` VALUES ('10', 'Fotografía', '10');
INSERT INTO `cosas_requi` VALUES ('11', 'Transmisión en vivo', '10');
INSERT INTO `cosas_requi` VALUES ('12', 'Micrófono Inalámbrico', '10');
INSERT INTO `cosas_requi` VALUES ('13', 'Atril', '10');

-- ----------------------------
-- Table structure for lugares
-- ----------------------------
DROP TABLE IF EXISTS `lugares`;
CREATE TABLE `lugares` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `conta` int(255) NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of lugares
-- ----------------------------
INSERT INTO `lugares` VALUES ('1', 'Sala de Presidentes', '100', '1');
INSERT INTO `lugares` VALUES ('2', 'Sala de Sesiones del Consejo General', '98', '1');
INSERT INTO `lugares` VALUES ('3', 'Sala de Reuniones Previas', '96', '1');
INSERT INTO `lugares` VALUES ('4', 'Secretaría Ejecutiva', '92', '1');
INSERT INTO `lugares` VALUES ('5', 'Presidencia', '94', '1');
INSERT INTO `lugares` VALUES ('6', 'Estacionamiento del IEPC', '88', '1');
INSERT INTO `lugares` VALUES ('8', 'Museo 450', '86', '1');
INSERT INTO `lugares` VALUES ('9', 'Recepción del IEPC', '90', '1');
INSERT INTO `lugares` VALUES ('10', 'Por definir', '1', '1');
INSERT INTO `lugares` VALUES ('11', 'Paseo Las Alamedas', '84', '1');

-- ----------------------------
-- Table structure for requerimientos
-- ----------------------------
DROP TABLE IF EXISTS `requerimientos`;
CREATE TABLE `requerimientos` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `lista_area_11` text COLLATE utf8_spanish_ci,
  `lista_area_10` text COLLATE utf8_spanish_ci,
  `lista_area_6` text COLLATE utf8_spanish_ci,
  `estado` int(255) NOT NULL DEFAULT '1',
  `id_ref` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of requerimientos
-- ----------------------------

-- ----------------------------
-- Table structure for sigi_contador_folios
-- ----------------------------
DROP TABLE IF EXISTS `sigi_contador_folios`;
CREATE TABLE `sigi_contador_folios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

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
INSERT INTO `sigi_documentos` VALUES ('1', 'S000000012017-06-22-09-45-17SE', '0', 'documentos/2017/SE/', '2017-06-22 09:45:17', '25', '2017-06-22 09:45:17', '25');
INSERT INTO `sigi_documentos` VALUES ('2', 'S000000022017-06-22-10-04-22SE', '0', 'documentos/2017/SE/', '2017-06-22 10:04:22', '25', '2017-06-22 10:04:22', '25');
INSERT INTO `sigi_documentos` VALUES ('3', 'R000000022017-06-22-10-06-07SE', '0', 'documentos/2017/SE/', '2017-06-22 10:06:07', '22', '2017-06-22 10:06:07', '22');
INSERT INTO `sigi_documentos` VALUES ('4', 'S000000032017-06-22-11-09-45SE', '0', 'documentos/2017/SE/', '2017-06-22 11:09:45', '91', '2017-06-22 11:09:45', '91');
INSERT INTO `sigi_documentos` VALUES ('5', 'R000000032017-06-22-11-19-48SE', '0', 'documentos/2017/SE/', '2017-06-22 11:19:48', '22', '2017-06-22 11:19:48', '22');
INSERT INTO `sigi_documentos` VALUES ('6', 'R000000032017-06-22-11-22-03UVINE', '0', 'documentos/2017/UVINE/', '2017-06-22 11:22:03', '91', '2017-06-22 11:22:03', '91');
INSERT INTO `sigi_documentos` VALUES ('7', 'R000000032017-06-22-11-23-24SE', '0', 'documentos/2017/SE/', '2017-06-22 11:23:24', '22', '2017-06-22 11:23:24', '22');
INSERT INTO `sigi_documentos` VALUES ('8', 'S000000042017-06-22-11-35-02SE', '0', 'documentos/2017/SE/', '2017-06-22 11:35:02', '32', '2017-06-22 11:35:02', '32');
INSERT INTO `sigi_documentos` VALUES ('9', 'S000000052017-06-22-11-38-25ST', '0', 'documentos/2017/ST/', '2017-06-22 11:38:25', '25', '2017-06-22 11:38:25', '25');
INSERT INTO `sigi_documentos` VALUES ('10', 'S000000062017-06-23-14-14-15SE', '0', 'documentos/2017/SE/', '2017-06-23 14:14:15', '32', '2017-06-23 14:14:15', '32');
INSERT INTO `sigi_documentos` VALUES ('11', 'S000000072017-06-23-14-16-39SE', '0', 'documentos/2017/SE/', '2017-06-23 14:16:39', '32', '2017-06-23 14:16:39', '32');
INSERT INTO `sigi_documentos` VALUES ('12', 'S000000082017-06-23-14-17-36ST', '0', 'documentos/2017/ST/', '2017-06-23 14:17:36', '25', '2017-06-23 14:17:36', '25');
INSERT INTO `sigi_documentos` VALUES ('13', 'S000000092017-06-23-14-29-06ST', '0', 'documentos/2017/ST/', '2017-06-23 14:29:06', '91', '2017-06-23 14:29:06', '91');
INSERT INTO `sigi_documentos` VALUES ('14', 'R000000092017-06-23-15-11-16ST', '0', 'documentos/2017/ST/', '2017-06-23 15:11:16', '32', '2017-06-23 15:11:16', '32');
INSERT INTO `sigi_documentos` VALUES ('15', 'S000000102017-06-26-12-24-59SE', '0', 'documentos/2017/SE/', '2017-06-26 12:25:00', '91', '2017-06-26 12:25:00', '91');
INSERT INTO `sigi_documentos` VALUES ('16', 'S000000112017-07-03-10-27-16ST', '0', 'documentos/2017/ST/', '2017-07-03 10:27:16', '25', '2017-07-03 10:27:16', '25');
INSERT INTO `sigi_documentos` VALUES ('17', 'S000000122017-07-03-10-29-47ST', '0', 'documentos/2017/ST/', '2017-07-03 10:29:47', '25', '2017-07-03 10:29:47', '25');
INSERT INTO `sigi_documentos` VALUES ('18', 'S000000132017-07-06-15-39-26CEMMRR', '0', 'documentos/2017/CEMMRR/', '2017-07-06 15:39:26', '25', '2017-07-06 15:39:26', '25');
INSERT INTO `sigi_documentos` VALUES ('19', 'S000000142017-07-06-15-41-08CEMMC', '0', 'documentos/2017/CEMMC/', '2017-07-06 15:41:08', '25', '2017-07-06 15:41:08', '25');
INSERT INTO `sigi_documentos` VALUES ('20', 'S000000152017-07-06-15-51-33UOE', '0', 'documentos/2017/UOE/', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_documentos` VALUES ('21', 'S000000162017-07-11-14-53-37UVINE', '0', 'documentos/2017/UVINE/', '2017-07-11 14:53:37', '32', '2017-07-11 14:53:37', '32');

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
  `vinculado` int(1) DEFAULT '0',
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
INSERT INTO `sigi_oficios` VALUES ('1', 'SOLICITUD', '00000001', 'S/N', 'EXTERNO', '25', 'Gerardo Sanchez Nájera', 'Secretaria de Finanzas', 'Director', 'Informe de Gastos del IEPC', '', '1', null, 'INTERNO', '0', '2017-06-22', '09:42:00', '', '2017-06-22 09:45:17', '25', '2017-06-22 09:45:17', '25');
INSERT INTO `sigi_oficios` VALUES ('2', 'SOLICITUD', '00000002', 'S/N', 'EXTERNO', '25', 'Gerardo Sanchez Nájera', 'Secretaria de Finanzas', 'Director', 'Otro Informe de Gastos', '', '1', '1', 'INTERNO', '0', '2017-06-22', '10:02:00', '', '2017-06-22 10:04:22', '25', '2017-06-22 10:04:22', '25');
INSERT INTO `sigi_oficios` VALUES ('3', 'RESPUESTA', '00000002', 'IEPC/00001', 'EXTERNO', '22', 'Gerardo Sanchez Nájera', 'Secretaria de Finanzas', 'Director', 'Informe de Gastos del IEPC', '', '1', '1', 'INTERNO', '0', null, null, 'Se Envia informe', '2017-06-22 10:06:07', '22', '2017-06-22 10:06:07', '22');
INSERT INTO `sigi_oficios` VALUES ('4', 'SOLICITUD', '00000003', 'IEPC/0002', 'INTERNO', '91', '', '', '', 'Informe de Gastos preoperativos', '', '1', '1', 'INTERNO', '0', '0000-00-00', '00:00:00', 'OK', '2017-06-22 11:09:45', '91', '2017-06-22 11:09:45', '91');
INSERT INTO `sigi_oficios` VALUES ('5', 'RESPUESTA', '00000003', 'IEPC/00003', 'INTERNO', '22', '', '', '', 'Se enva informe solicitado', '', '1', '1', 'INTERNO', '0', null, null, 'con la participación de Raul Rojas', '2017-06-22 11:19:49', '22', '2017-06-22 11:19:49', '22');
INSERT INTO `sigi_oficios` VALUES ('6', 'RESPUESTA', '00000003', 'IEPC/0003', 'INTERNO', '91', '', '', '', 'Informe Incompleto', '', '1', '1', 'INTERNO', '0', null, null, 'No se incluyo a la unidad técnica de computo en el informe', '2017-06-22 11:22:03', '91', '2017-06-22 11:22:03', '91');
INSERT INTO `sigi_oficios` VALUES ('7', 'RESPUESTA', '00000003', 'IEPC/0004', 'INTERNO', '22', '', '', '', 'Se anexa al informe la información solicitada', '', '1', '1', 'INTERNO', '0', null, null, 'Con la participación de Raul Rosas', '2017-06-22 11:23:24', '22', '2017-06-22 11:23:24', '22');
INSERT INTO `sigi_oficios` VALUES ('8', 'SOLICITUD', '00000004', 'IEPC/00004', 'INTERNO', '32', 'Gerardo Sanchez Nájera', 'Secretaria de Finanzas', 'Director', 'MENSAJE EXTERNO PARA SECRETARIA DE FINANZAS', '', '1', '1', 'EXTERNO', '0', '0000-00-00', '00:00:00', 'OK', '2017-06-22 11:35:02', '32', '2017-06-22 11:35:02', '32');
INSERT INTO `sigi_oficios` VALUES ('9', 'RESPUESTA', '00000004', 'S/N', 'EXTERNO', '25', 'Gerardo Sanchez Nájera', 'Secretaria de Finanzas', 'Director', 'Se envia informe a Secretaria Técnica', '', '1', '1', 'INTERNO', '0', '2017-06-22', '11:36:00', 'Se recibió a las 1036 se registro mas tarde', '2017-06-22 11:38:25', '25', '2017-06-22 11:39:30', '32');
INSERT INTO `sigi_oficios` VALUES ('10', 'SOLICITUD', '00000006', 'IEPC/00002', 'INTERNO', '32', 'Gerardo Sanchez Nájera', 'Secretaria de Finanzas', 'Director', 'MENSAJE DE PRUEBA EXTERNO', '', '1', null, 'EXTERNO', '0', '0000-00-00', '00:00:00', 'OK', '2017-06-23 14:14:15', '32', '2017-06-23 14:14:15', '32');
INSERT INTO `sigi_oficios` VALUES ('11', 'SOLICITUD', '00000007', 'IEPC/00005', 'INTERNO', '32', 'Gerardo Sanchez Nájera', 'Secretaria de Finanzas', 'Director', 'MENSAJE DE PRUEBA EXTERNO 2', '', '1', null, 'EXTERNO', '0', '0000-00-00', '00:00:00', 'OK', '2017-06-23 14:16:39', '32', '2017-06-23 14:16:39', '32');
INSERT INTO `sigi_oficios` VALUES ('12', 'SOLICITUD', '00000008', 'S/N', 'EXTERNO', '25', 'Gerardo Sanchez Nájera', 'Secretaria de Finanzas', 'Director', 'MENSAJE DE PRUEBA DE RESPUESTA EXTERNO', '', '1', null, 'INTERNO', '0', '2017-06-23', '00:00:02', 'MENSAJE EXTERNO', '2017-06-23 14:17:36', '25', '2017-06-23 14:17:36', '25');
INSERT INTO `sigi_oficios` VALUES ('13', 'SOLICITUD', '00000009', 'S/N', 'INTERNO', '91', '', '', '', 'mensaje para secretaria tecnica', '', '1', '1', 'INTERNO', '0', '0000-00-00', '00:00:00', 'ok', '2017-06-23 14:29:06', '91', '2017-06-23 14:29:06', '91');
INSERT INTO `sigi_oficios` VALUES ('14', 'RESPUESTA', '00000009', 'S/N', 'INTERNO', '32', '', '', '', 'respuesta al mensaje interno de vinculación', '', '1', '1', 'INTERNO', '0', null, null, '', '2017-06-23 15:11:17', '32', '2017-06-23 15:11:17', '32');
INSERT INTO `sigi_oficios` VALUES ('15', 'SOLICITUD', '00000010', 'S/N', 'INTERNO', '91', '', '', '', 'Oficio de Preuba', '', '1', null, 'INTERNO', '0', '0000-00-00', '00:00:00', 'ok', '2017-06-26 12:25:00', '91', '2017-06-26 12:25:00', '91');
INSERT INTO `sigi_oficios` VALUES ('16', 'SOLICITUD', '00000011', 'S/N', 'EXTERNO', '25', 'Gerardo Sanchez Nájera', 'Secretaria de Finanzas', 'Director', 'mensaje de prueba', '', '1', null, 'INTERNO', '0', '2017-07-03', '00:00:10', '', '2017-07-03 10:27:16', '25', '2017-07-03 10:27:16', '25');
INSERT INTO `sigi_oficios` VALUES ('17', 'SOLICITUD', '00000012', 'S/N', 'EXTERNO', '25', 'Gerardo Sanchez Nájera', 'Secretaria de Finanzas', 'Director', 'mensaje de prueba', '', '1', null, 'INTERNO', '0', '2017-07-03', '00:00:10', 'ok', '2017-07-03 10:29:47', '25', '2017-07-03 10:29:47', '25');
INSERT INTO `sigi_oficios` VALUES ('18', 'SOLICITUD', '00000013', 'S/N', 'EXTERNO', '25', 'Gerardo Sanchez Nájera', 'Secretaria de Finanzas', 'Director', 'Mensaje de prueba', '', '1', null, 'INTERNO', '0', '2017-07-06', '00:00:03', 'ok', '2017-07-06 15:39:26', '25', '2017-07-06 15:39:26', '25');
INSERT INTO `sigi_oficios` VALUES ('19', 'SOLICITUD', '00000014', 'S/N', 'EXTERNO', '25', 'Gerardo Sanchez Nájera', 'Secretaria de Finanzas', 'Director', 'Invitacion para todos', '', '0', null, 'INTERNO', '0', '2017-07-06', '00:00:03', '', '2017-07-06 15:41:08', '25', '2017-07-06 15:41:08', '25');
INSERT INTO `sigi_oficios` VALUES ('20', 'SOLICITUD', '00000015', 'S/N', 'INTERNO', '22', '', '', '', 'Mensaje para todo el personal', '', '0', null, 'INTERNO', '0', '0000-00-00', '00:00:00', '', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios` VALUES ('21', 'SOLICITUD', '00000016', 'IEPC/00006', 'INTERNO', '32', '', '', '', 'MENSAJE PARA VINCULACION PRUEBA', '', '1', null, 'INTERNO', '0', '0000-00-00', '00:00:00', '', '2017-07-11 14:53:38', '32', '2017-07-11 14:53:38', '32');

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
) ENGINE=InnoDB AUTO_INCREMENT=219 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sigi_oficios_documentos_recepcion
-- ----------------------------
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('1', null, '1', '1', '22', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cancelado', '2017-06-22 09:45:17', '25', '2017-06-22 10:06:37', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('2', null, '2', '2', '22', '0', '2017-06-22 10:04:36', 'Para el trámite que corresponda', 'Cerrado', '2017-06-22 10:04:22', '25', '2017-06-22 10:06:07', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('3', '2', '3', '3', '25', '0', '2017-06-22 10:06:23', 'Para el trámite que corresponda', 'Cerrado', '2017-06-22 10:06:07', '22', '2017-06-22 10:06:07', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('4', null, '4', '4', '22', '0', '2017-06-22 11:09:58', 'Para el trámite que corresponda', 'Cerrado', '2017-06-22 11:09:45', '91', '2017-06-22 11:23:24', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('5', null, '4', '4', '32', '1', '2017-06-22 11:14:28', 'Para el trámite que corresponda', 'Cerrado', '2017-06-22 11:09:45', '91', '2017-06-22 11:23:24', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('6', '4', '5', '5', '91', '0', '2017-06-22 11:20:32', 'Para el trámite que corresponda', 'Cerrado', '2017-06-22 11:19:49', '22', '2017-06-22 11:23:24', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('7', '4', '6', '6', '22', '0', '2017-06-22 11:22:19', 'Para el trámite que corresponda', 'Cerrado', '2017-06-22 11:22:03', '91', '2017-06-22 11:23:24', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('8', '4', '7', '7', '91', '0', '2017-06-22 11:24:35', 'Para el trámite que corresponda', 'Cerrado', '2017-06-22 11:23:24', '22', '2017-06-22 11:23:24', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('9', null, '8', '8', '25', '0', '2017-06-22 11:35:09', 'Para el trámite que corresponda', 'Cerrado', '2017-06-22 11:35:02', '32', '2017-06-22 11:39:31', '32');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('10', '8', '9', '9', '32', '0', '2017-06-22 11:38:55', 'Para conocimiento y archivo', 'Cerrado', '2017-06-22 11:38:25', '25', '2017-06-22 11:39:31', '32');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('11', null, '10', '10', '25', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-06-23 14:14:15', '32', '2017-06-23 14:14:15', '32');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('12', null, '11', '11', '25', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-06-23 14:16:39', '32', '2017-06-23 14:16:39', '32');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('13', null, '12', '12', '32', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-06-23 14:17:36', '25', '2017-06-23 14:17:36', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('14', null, '13', '13', '32', '0', '2017-06-23 15:10:54', 'Para el trámite que corresponda', 'Cerrado', '2017-06-23 14:29:06', '91', '2017-06-23 15:11:17', '32');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('15', '13', '14', '14', '91', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Cerrado', '2017-06-23 15:11:17', '32', '2017-06-23 15:11:17', '32');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('16', null, '15', '15', '22', '0', '2017-06-26 12:29:12', 'Para el trámite que corresponda', 'Abierto', '2017-06-26 12:25:00', '91', '2017-06-26 12:25:00', '91');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('17', null, '16', '16', '32', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-07-03 10:27:16', '25', '2017-07-03 10:27:16', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('18', null, '17', '17', '32', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-07-03 10:29:47', '25', '2017-07-03 10:29:47', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('19', null, '18', '18', '11', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-07-06 15:39:27', '25', '2017-07-06 15:39:27', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('20', null, '18', '18', '1', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-07-06 15:39:27', '25', '2017-07-06 15:39:27', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('21', null, '18', '18', '2', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-07-06 15:39:27', '25', '2017-07-06 15:39:27', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('22', null, '18', '18', '3', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-07-06 15:39:27', '25', '2017-07-06 15:39:27', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('23', null, '19', '19', '14', '0', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:08', '25', '2017-07-06 15:41:08', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('24', null, '19', '19', '1', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:08', '25', '2017-07-06 15:41:08', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('25', null, '19', '19', '2', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:08', '25', '2017-07-06 15:41:08', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('26', null, '19', '19', '3', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:08', '25', '2017-07-06 15:41:08', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('27', null, '19', '19', '4', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:08', '25', '2017-07-06 15:41:08', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('28', null, '19', '19', '5', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:08', '25', '2017-07-06 15:41:08', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('29', null, '19', '19', '6', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('30', null, '19', '19', '7', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('31', null, '19', '19', '8', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('32', null, '19', '19', '9', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('33', null, '19', '19', '10', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('34', null, '19', '19', '11', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('35', null, '19', '19', '12', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('36', null, '19', '19', '13', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('37', null, '19', '19', '15', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('38', null, '19', '19', '16', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('39', null, '19', '19', '17', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('40', null, '19', '19', '18', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('41', null, '19', '19', '19', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('42', null, '19', '19', '20', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('43', null, '19', '19', '21', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('44', null, '19', '19', '22', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('45', null, '19', '19', '23', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('46', null, '19', '19', '24', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('47', null, '19', '19', '26', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('48', null, '19', '19', '27', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('49', null, '19', '19', '28', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('50', null, '19', '19', '29', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('51', null, '19', '19', '30', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('52', null, '19', '19', '31', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('53', null, '19', '19', '32', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('54', null, '19', '19', '33', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('55', null, '19', '19', '34', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('56', null, '19', '19', '35', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('57', null, '19', '19', '36', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('58', null, '19', '19', '37', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('59', null, '19', '19', '38', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('60', null, '19', '19', '39', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('61', null, '19', '19', '40', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('62', null, '19', '19', '41', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('63', null, '19', '19', '42', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('64', null, '19', '19', '43', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('65', null, '19', '19', '44', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('66', null, '19', '19', '45', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('67', null, '19', '19', '46', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('68', null, '19', '19', '47', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('69', null, '19', '19', '48', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('70', null, '19', '19', '49', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('71', null, '19', '19', '50', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:09', '25', '2017-07-06 15:41:09', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('72', null, '19', '19', '51', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('73', null, '19', '19', '52', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('74', null, '19', '19', '53', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('75', null, '19', '19', '54', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('76', null, '19', '19', '55', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('77', null, '19', '19', '56', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('78', null, '19', '19', '57', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('79', null, '19', '19', '58', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('80', null, '19', '19', '59', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('81', null, '19', '19', '60', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('82', null, '19', '19', '61', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('83', null, '19', '19', '62', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('84', null, '19', '19', '63', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('85', null, '19', '19', '64', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('86', null, '19', '19', '65', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('87', null, '19', '19', '66', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('88', null, '19', '19', '67', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('89', null, '19', '19', '68', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('90', null, '19', '19', '69', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('91', null, '19', '19', '70', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('92', null, '19', '19', '71', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('93', null, '19', '19', '72', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('94', null, '19', '19', '73', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('95', null, '19', '19', '74', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('96', null, '19', '19', '75', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('97', null, '19', '19', '76', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('98', null, '19', '19', '77', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('99', null, '19', '19', '78', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('100', null, '19', '19', '79', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('101', null, '19', '19', '80', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('102', null, '19', '19', '81', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('103', null, '19', '19', '82', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('104', null, '19', '19', '83', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('105', null, '19', '19', '84', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('106', null, '19', '19', '85', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('107', null, '19', '19', '86', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('108', null, '19', '19', '87', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('109', null, '19', '19', '88', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('110', null, '19', '19', '89', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('111', null, '19', '19', '90', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:10', '25', '2017-07-06 15:41:10', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('112', null, '19', '19', '91', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:11', '25', '2017-07-06 15:41:11', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('113', null, '19', '19', '92', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:11', '25', '2017-07-06 15:41:11', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('114', null, '19', '19', '93', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:11', '25', '2017-07-06 15:41:11', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('115', null, '19', '19', '94', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:11', '25', '2017-07-06 15:41:11', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('116', null, '19', '19', '95', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:11', '25', '2017-07-06 15:41:11', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('117', null, '19', '19', '96', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:11', '25', '2017-07-06 15:41:11', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('118', null, '19', '19', '97', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:11', '25', '2017-07-06 15:41:11', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('119', null, '19', '19', '98', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:41:11', '25', '2017-07-06 15:41:11', '25');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('120', null, '20', '20', '94', '0', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('121', null, '20', '20', '1', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('122', null, '20', '20', '2', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('123', null, '20', '20', '3', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('124', null, '20', '20', '4', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('125', null, '20', '20', '5', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('126', null, '20', '20', '6', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('127', null, '20', '20', '7', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('128', null, '20', '20', '8', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('129', null, '20', '20', '9', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('130', null, '20', '20', '10', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('131', null, '20', '20', '11', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('132', null, '20', '20', '12', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('133', null, '20', '20', '13', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('134', null, '20', '20', '14', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('135', null, '20', '20', '15', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('136', null, '20', '20', '16', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('137', null, '20', '20', '17', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('138', null, '20', '20', '18', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('139', null, '20', '20', '19', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('140', null, '20', '20', '20', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('141', null, '20', '20', '21', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('142', null, '20', '20', '23', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:33', '22', '2017-07-06 15:51:33', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('143', null, '20', '20', '24', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('144', null, '20', '20', '25', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('145', null, '20', '20', '26', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('146', null, '20', '20', '27', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('147', null, '20', '20', '28', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('148', null, '20', '20', '29', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('149', null, '20', '20', '30', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('150', null, '20', '20', '31', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('151', null, '20', '20', '32', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('152', null, '20', '20', '33', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('153', null, '20', '20', '34', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('154', null, '20', '20', '35', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('155', null, '20', '20', '36', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('156', null, '20', '20', '37', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('157', null, '20', '20', '38', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('158', null, '20', '20', '39', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('159', null, '20', '20', '40', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('160', null, '20', '20', '41', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('161', null, '20', '20', '42', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('162', null, '20', '20', '43', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('163', null, '20', '20', '44', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('164', null, '20', '20', '45', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('165', null, '20', '20', '46', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('166', null, '20', '20', '47', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('167', null, '20', '20', '48', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('168', null, '20', '20', '49', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('169', null, '20', '20', '50', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('170', null, '20', '20', '51', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('171', null, '20', '20', '52', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('172', null, '20', '20', '53', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('173', null, '20', '20', '54', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('174', null, '20', '20', '55', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('175', null, '20', '20', '56', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('176', null, '20', '20', '57', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('177', null, '20', '20', '58', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('178', null, '20', '20', '59', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('179', null, '20', '20', '60', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('180', null, '20', '20', '61', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('181', null, '20', '20', '62', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:34', '22', '2017-07-06 15:51:34', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('182', null, '20', '20', '63', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('183', null, '20', '20', '64', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('184', null, '20', '20', '65', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('185', null, '20', '20', '66', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('186', null, '20', '20', '67', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('187', null, '20', '20', '68', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('188', null, '20', '20', '69', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('189', null, '20', '20', '70', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('190', null, '20', '20', '71', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('191', null, '20', '20', '72', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('192', null, '20', '20', '73', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('193', null, '20', '20', '74', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('194', null, '20', '20', '75', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('195', null, '20', '20', '76', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('196', null, '20', '20', '77', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('197', null, '20', '20', '78', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('198', null, '20', '20', '79', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('199', null, '20', '20', '80', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('200', null, '20', '20', '81', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('201', null, '20', '20', '82', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('202', null, '20', '20', '83', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('203', null, '20', '20', '84', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('204', null, '20', '20', '85', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('205', null, '20', '20', '86', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('206', null, '20', '20', '87', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('207', null, '20', '20', '88', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('208', null, '20', '20', '89', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('209', null, '20', '20', '90', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('210', null, '20', '20', '91', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('211', null, '20', '20', '92', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('212', null, '20', '20', '93', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('213', null, '20', '20', '95', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('214', null, '20', '20', '96', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('215', null, '20', '20', '97', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('216', null, '20', '20', '98', '1', '0000-00-00 00:00:00', 'Para conocimiento y archivo', 'Abierto', '2017-07-06 15:51:35', '22', '2017-07-06 15:51:35', '22');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('217', null, '21', '21', '91', '0', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-07-11 14:53:38', '32', '2017-07-11 14:53:38', '32');
INSERT INTO `sigi_oficios_documentos_recepcion` VALUES ('218', null, '21', '21', '0', '1', '0000-00-00 00:00:00', 'Para el trámite que corresponda', 'Abierto', '2017-07-11 14:53:38', '32', '2017-07-11 14:53:38', '32');

-- ----------------------------
-- Table structure for sigi_reportes_param
-- ----------------------------
DROP TABLE IF EXISTS `sigi_reportes_param`;
CREATE TABLE `sigi_reportes_param` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `params` text,
  `active` int(1) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sigi_reportes_param
-- ----------------------------

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
  `publica` int(1) NOT NULL,
  `estado` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of solicitudes
-- ----------------------------
INSERT INTO `solicitudes` VALUES ('26', '8efcf0a5c951a95bbb6f056817ee3855.jpg', 'Taller de comunicación, habilidades gerenciales y cambio organizacional', 'Sala de Presidentes', '2017-06-22', '2017-06-22', '10:00:00', '14:15:00', '12', '78', '2017-06-21 19:23:20', '#8c1b67', null, '1', '----- La creación de la publicación se realizo corectamente: 2017-06-21 19:23:20 por el usuario Cesar Victorino <br> \n----- La solicitud fue aceptada el 2017-06-21 19:23:20 por el usuario Cesar Victorino <br> \n', '1', '9');
INSERT INTO `solicitudes` VALUES ('27', '519c418163cdc7cbeed12faa12d012b5.jpg', 'Taller de comunicación, habilidades gerenciales y cambio organizacional', 'Sala de Presidentes', '2017-06-23', '2017-06-23', '10:00:00', '14:15:00', '12', '78', '2017-06-21 19:25:11', '#8c1b67', null, '1', '----- La creación de la publicación se realizo corectamente: 2017-06-21 19:25:11 por el usuario Cesar Victorino <br> \n----- La solicitud fue aceptada el 2017-06-21 19:25:11 por el usuario Cesar Victorino <br> \n', '1', '9');
INSERT INTO `solicitudes` VALUES ('28', 'f13376f2f1de2560276d4559c1dde5e5.jpg', 'Sesión Ordinaria No 2 de la Comisión de Organización Electoral ', 'Sala de Presidentes', '2017-06-27', '2017-06-27', '14:00:00', '15:00:00', '7', '78', '2017-06-21 19:26:48', '#8c1b67', null, '1', '----- La creación de la publicación se realizo corectamente: 2017-06-21 19:26:48 por el usuario Cesar Victorino <br> \n----- La solicitud fue aceptada el 2017-06-21 19:26:48 por el usuario Cesar Victorino <br> \n', '1', '9');
INSERT INTO `solicitudes` VALUES ('29', '6b4b31e4ce45989c80f499c990ea4d1b.jpg', 'Sesión Ordinaria No 2 de la Comisión de Acceso a la Información', 'Sala de Presidentes', '2017-06-30', '2017-06-30', '12:00:00', '12:45:00', '12', '78', '2017-06-21 19:28:55', '#8c1b67', null, '1', '----- La creación de la publicación se realizo corectamente: 2017-06-21 19:28:55 por el usuario Cesar Victorino <br> \n----- La solicitud fue aceptada el 2017-06-21 19:28:55 por el usuario Cesar Victorino <br> \n', '1', '9');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre_formal` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=99 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'LIC. JUAN ENRIQUE KATO RODRÍGUEZ', 'juan', 'kato', 'e807f1fcf82d132f9bb018ca6738a19f', 'd6140d4e08853d007acdf0555da87ef1', '1', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('2', 'C. SOFIA CAMPOS ARREOLA\r\n', 'sofia', 'campos', 'e807f1fcf82d132f9bb018ca6738a19f', '21fc6902bf4e70909c347034aac7dc4b', '1', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('3', 'LIC. JUANA YADIRA GALLEGOS ALVAREZ\r\n', 'juana', 'gallegos', 'e807f1fcf82d132f9bb018ca6738a19f', 'e33f1c68bf5e2ddb76f41fc0fb5b31d2', '1', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('4', 'LIC. SERGIO CONTRERAS RAMOS\r\n', 'sergio', 'contreras', 'e807f1fcf82d132f9bb018ca6738a19f', 'b4435d225d3497d70e236754d81dd1c2', '1', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('5', 'LIC. LAURA FABIOLA BRINGAS SANCHEZ\r\n', 'laura', 'bringas', 'e807f1fcf82d132f9bb018ca6738a19f', '353deb4f8c9ae4cda4cfc23ae4f60424', '16', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('6', 'LIC. REBECA DIAZ GUERRERO\r\n', 'rebeca', 'diaz', 'e807f1fcf82d132f9bb018ca6738a19f', '2f40453309516893a853beb3129633e7', '16', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('7', 'LIC. MARÍA ESTHER PACHECO SALAS\r\n', 'maria', 'pacheco', 'e807f1fcf82d132f9bb018ca6738a19f', 'adecf83a745b4cce85e1dc8d01c7a583', '16', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('8', 'LIC. FRANCISCO JAVIER GONZALEZ PÉREZ\r\n', 'francisco', 'gonzalez', 'e807f1fcf82d132f9bb018ca6738a19f', 'a76dcdaae12b2e011d123b58e04f0dc8', '17', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('9', 'LIC. SILVIA EUGENIA GARCÍA SÁNCHEZ\r\n', 'silvia', 'garcia', 'e807f1fcf82d132f9bb018ca6738a19f', '8b1ca45b444ad4f95522e959cfb0b45e', '17', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('10', 'LIC. FLOR DE MARIA GARCIA ESTEVANE\r\n', 'flor', 'garcia', 'e807f1fcf82d132f9bb018ca6738a19f', '846b59169e5f406f3637c80d7cec6934', '17', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('11', 'LIC. MIRZA MAYELA RAMIREZ RAMIREZ\r\n', 'mirza', 'ramirez', 'e807f1fcf82d132f9bb018ca6738a19f', '2cb93030939a64f7c9359da310d52ecb', '18', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('12', 'LIC. ALMA YESENIA MONTIEL OROZCO\r\n', 'alma', 'montiel', 'e807f1fcf82d132f9bb018ca6738a19f', '73492577700cbfe006dd5c8123a28586', '18', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('13', 'M.D. HONORIO MENDÍA SOTO\r\n', 'honorio', 'mendia', 'e807f1fcf82d132f9bb018ca6738a19f', '7feee0ea6aaaf0033b17f4523aa144f5', '18', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('14', 'LIC. MANUEL MONTOYA DEL CAMPO\r\n', 'manuel', 'montoya', 'e807f1fcf82d132f9bb018ca6738a19f', '171e0e844480ccc34ef5fec46c111667', '19', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('15', 'LA. JOSE LEONCIO COLMENERO NAJERA\r\n', 'jose', 'colmenero', 'e807f1fcf82d132f9bb018ca6738a19f', '271996fcba34fc0d7c9b4be9221bfa77', '19', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('16', 'LIC. ARMANDO SERGIO ORTÍZ GALLEGOS\r\n', 'armando', 'ortiz', 'e807f1fcf82d132f9bb018ca6738a19f', '98c3673f3dbf5074ed4da1389a0c1ec5', '19', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('17', 'LIC. FERNANDO DE JESUS ROMAN QUIÑONES\r\n', 'fernando', 'roman', 'e807f1fcf82d132f9bb018ca6738a19f', 'af49599f26513d545ff4f093ce2f85d5', '20', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('18', 'C. MARÍA DEL CARMEN GARAY BELTRÁN\r\n', 'maria', 'garay', 'e807f1fcf82d132f9bb018ca6738a19f', 'd77b6cea2196807d1e86cdef50230cc1', '20', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('19', 'M.D. ROBERTO HERRERA HERNÁNDEZ\r\n', 'roberto', 'herrera', 'e807f1fcf82d132f9bb018ca6738a19f', '72450a13d98b3336d1159bbcfd7eb9ba', '20', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('20', 'DRA. ESMERALDA VALLES LOPEZ\r\n', 'esmeralda', 'valles', 'e807f1fcf82d132f9bb018ca6738a19f', '79d0985a3f3a01391dbe01da7f47e819', '21', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('21', 'LIC. JOSÉ ARTURO ALFERÉZ CANALES\r\n', 'jose', 'alferez', 'e807f1fcf82d132f9bb018ca6738a19f', 'ce16904e8f7fa285ecaa90f6f8035d55', '21', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('22', 'LIC. DAVID ALONSO ARAMBULA QUIÑONES\r\n', 'david', 'arambula', 'e807f1fcf82d132f9bb018ca6738a19f', 'cee8a68e5925cd5e8f2097168c71d9db', '3', '2', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('23', 'LM.GUADALUPE ALEXSANDRA CASTRO OROZCO \r\n', 'guadalupe', 'castro', 'e807f1fcf82d132f9bb018ca6738a19f', '2b19a6e7b9a8d78680a8621a45ba0a78', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('24', 'C. BEATRIZ KARINA ELGUEZABAL MARISCAL\r\n', 'beatriz', 'elguezabal', 'e807f1fcf82d132f9bb018ca6738a19f', '4366222c2749d6a2e1debd98e3adfc1b', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('25', 'LIC. MARITZA VANESSA GONZALEZ CHAIDEZ\r\n', 'maritza', 'gonzalez', 'e807f1fcf82d132f9bb018ca6738a19f', '6a5f3eb20ab6a1b74332c6c09f3eb65c', '3', '3', '1', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('26', 'L.G. ANA KAREN QUEZADA AVILA\r\n', 'ana', 'quezada', 'e807f1fcf82d132f9bb018ca6738a19f', '0479b9bd16be50ac3eb7b32ac50ae839', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('27', 'LIC. ADOLFO CONSTANTINO TAPIA MONTELONGO\r\n', 'adolfo', 'tapia', 'e807f1fcf82d132f9bb018ca6738a19f', '88885b987d507ca1a601e5f1fdcaaa5c', '3', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('28', 'C.P. ADRIANA CRISTINA MALDONADO CALDERON\r\n', 'adriana', 'maldonado', 'e807f1fcf82d132f9bb018ca6738a19f', '14eb9c49a1f1c994ef9e1772ac36a65e', '4', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('29', 'C.P. MARIA EUGENIA MUÑOZ GONZALEZ\r\n', 'maria', 'munoz', 'e807f1fcf82d132f9bb018ca6738a19f', '8be5630c5f2d47b135c1df01d6ee0d01', '4', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('30', 'C.P. DIANA ANGELICA VILLARREAL MARTINEZ\r\n', 'diana', 'villarreal', 'e807f1fcf82d132f9bb018ca6738a19f', '70ee6c55822cbaccef332eebda2af66a', '4', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('31', 'LIC. MARGARITA PACHECO MERAZ\r\n', 'margarita', 'pacheco', 'e807f1fcf82d132f9bb018ca6738a19f', '361256ec0ab5f7c293b791a2b34a9136', '4', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('32', 'LIC. RAÚL ROSAS VELÁZQUEZ\r\n', 'raul', 'rosas', 'e807f1fcf82d132f9bb018ca6738a19f', 'ac7feb11c892bc8b0be82135a0022536', '5', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('33', 'L.I.  RUTH MARGARITA MENDOZA RETANA \r\n', 'ruth', 'mendoza', 'e807f1fcf82d132f9bb018ca6738a19f', '051ffcf016fa60be1ba56d63d7dd39fb', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('34', 'C.P.CELSO VILLARREAL GARCÍA \r\n', 'celso', 'villarreal', 'e807f1fcf82d132f9bb018ca6738a19f', '0e8f28acdaf35807c75751671b425fd2', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('35', 'C.P.JESÚS FRANCISCO ENRÍQUEZ GAMERO \r\n', 'jesus', 'enriquez', 'e807f1fcf82d132f9bb018ca6738a19f', 'e3377d939ac12f667fb0adffab6a4d90', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('36', 'C.ANASTACIO HERNÁNDEZ ALVARADO\r\n', 'anastacio', 'hernandez', 'e807f1fcf82d132f9bb018ca6738a19f', '02a267425b7901105f3a1d606f6ee7d2', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('37', 'C. JUANA GARAY BELTRAN\r\n', 'juana', 'garay', 'e807f1fcf82d132f9bb018ca6738a19f', '8ca1a26aa767d5f82c951f4aacdda718', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('38', 'LA. JOSE ADRIAN CABRAL PAEZ\r\n', 'jose', 'cabral', 'e807f1fcf82d132f9bb018ca6738a19f', '9c1b5331481f584daeb58fbe001484d7', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('39', 'LIC. ALEJANDRA LOZANO EGURE\r\n', 'alejandra', 'lozano', 'e807f1fcf82d132f9bb018ca6738a19f', '2b1d4d129cdb39f99cab5615c964d5da', '5', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('40', 'L.A. IGNACIO HÉCTOR AYÓN FLORES\r\n', 'ignacio', 'ayon', 'e807f1fcf82d132f9bb018ca6738a19f', '0fca1dd06e457ecb07c04d615aeb9390', '6', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('41', 'C.P. SUSANA GURROLA CAMPOS \r\n', 'susana', 'gurrola', 'e807f1fcf82d132f9bb018ca6738a19f', '91cdc60a7b15ad3876473330d2e82a12', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('42', 'L.A. CINTYA ANAÍS NUÑEZ NUÑEZ\r\n', 'cintya', 'nunez', 'e807f1fcf82d132f9bb018ca6738a19f', 'ec0225e04021359d5e8c5285490e9c82', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('43', 'C.P. JORGE ORLANDO PELAGIO ORTIZ\r\n', 'jorge', 'pelagio', 'e807f1fcf82d132f9bb018ca6738a19f', 'a0f77ece0ab1175c62b25c338c5510bf', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('44', 'C.P. KARINA GONZALEZ RODRIGUEZ\r\n', 'karina', 'gonzalez', 'e807f1fcf82d132f9bb018ca6738a19f', '4f2c5e5dbc7dca9c7864ab46b167038c', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('45', 'L.I. JOSÉ BERNARDO NUÑEZ ESTRADA\r\n', 'jose', 'nunez', 'e807f1fcf82d132f9bb018ca6738a19f', '22978dbd63d8d001da1341fdda1f02d1', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('46', 'C.P. MANUELA JAQUELIN BUENO GOMEZ\r\n', 'manuela', 'bueno', 'e807f1fcf82d132f9bb018ca6738a19f', 'a1955b42460a010449390c87fb7b156d', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('47', 'C.JESÚS HERNÁNDEZ GUTIÉRREZ \r\n', 'jesus', 'hernandez', 'e807f1fcf82d132f9bb018ca6738a19f', '26b1f9f4d7275f47e83fafdb001bce96', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('48', 'C.JUAN MANUEL VALVERDE ROSALES \r\n', 'juan', 'valverde', 'e807f1fcf82d132f9bb018ca6738a19f', '2abe7764d045bbee163feae15398d161', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('49', 'ING. JOSE ABEL RAMIREZ MELENDEZ\r\n', 'jose', 'ramirez', 'e807f1fcf82d132f9bb018ca6738a19f', '4ffd03e9f669540242ad0f6c8ea2eefd', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('50', 'ING. GERARDO ABEL GUZMAN RAMOS\r\n', 'gerardo', 'guzman', 'e807f1fcf82d132f9bb018ca6738a19f', 'b98dee7ecb1e444dadf118c64d6f7f17', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('51', 'LIC. MARIO ALBERTO PÉREZ GALVÁN', 'mario', 'perez', 'e807f1fcf82d132f9bb018ca6738a19f', '069cc7b7ba6d269fec080e36d0b918e2', '7', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('52', 'L. A. JULIO CÉSAR TORRES AGUILAR\r\n', 'julio', 'torres', 'e807f1fcf82d132f9bb018ca6738a19f', 'e4a95ec638f3d8c9ff296b2db4b739e7', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('53', 'C. MAGDALENA LEONOR JUÁREZ CORRAL \r\n', 'magdalena', 'juarez', 'e807f1fcf82d132f9bb018ca6738a19f', '57edbaf9a8e314ba92eebd22a9c49109', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('54', 'ING. MARISOL MANCINAS CARRASCO\r\n', 'marisol', 'mancinas', 'e807f1fcf82d132f9bb018ca6738a19f', 'a1fa6d7c51b532a8ae69139ee7f917f7', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('55', 'ING. RUBEN AMEZCUA HERRERA\r\n', 'ruben', 'amezcua', 'e807f1fcf82d132f9bb018ca6738a19f', '6364635639069cd5e47b4b235a241990', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('56', 'LN. BRENDA SARAHI HERNANDEZ ROJAS.\r\n', 'brenda', 'hernandez', 'e807f1fcf82d132f9bb018ca6738a19f', '188756f88a55bca746a16d0c84d4fb18', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('57', 'C. CESAR OCTAVIO LOERA VALLES', 'cesar', 'loera', 'e807f1fcf82d132f9bb018ca6738a19f', '935d16fd21ba37464ea08f74f1e050ca', '7', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('58', 'MTRO. LUIS ALBERTO HÉRNANDEZ MORENO\r\n', 'luis', 'hernandez', 'e807f1fcf82d132f9bb018ca6738a19f', 'b7daa07ae6ee438b8c5cb5d83eccc659', '8', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('59', 'LIC. FRANKLIN ERNESTO AKE MALDONADO\r\n', 'franklin', 'ake', 'e807f1fcf82d132f9bb018ca6738a19f', 'c52dde2ee6bd2ac06d62e06c0fd88509', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('60', 'C. MARA GABRIELA FLORES DÍAZ \r\n', 'mara', 'flores', 'e807f1fcf82d132f9bb018ca6738a19f', 'e5a7b885864af6985907011c88d5efd7', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('61', 'LIC. DANIEL OSWALDO CAMACHO SÁNCHEZ\r\n', 'daniel', 'camacho', 'e807f1fcf82d132f9bb018ca6738a19f', '683e8873b502e97702437fd560a6a695', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('62', 'LIC. JOVANI JAVIER HERRERA CASTILLO\r\n', 'jovani', 'herrera', 'e807f1fcf82d132f9bb018ca6738a19f', '2596dcd18003e9530a02420940a36187', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('63', 'LIC. FRANCISCO JAVIER TELLEZ PIEDRA\r\n', 'francisco', 'tellez', 'e807f1fcf82d132f9bb018ca6738a19f', '896c3502bbb9dddd2c67f5825a0eaa8d', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('64', 'LIC. MARISOL HERRERA\r\n', 'marisol', 'herrera', 'e807f1fcf82d132f9bb018ca6738a19f', 'e007794ba0a8926a33d4a57cf8eb4a55', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('65', 'LIC. CATALINA BENAVENTE VAZQUEZ\r\n', 'Catalina', 'benavente', 'e807f1fcf82d132f9bb018ca6738a19f', 'fed70e87c8ab32b5f0adc73272b8c291', '8', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('66', 'LIC. LUZ MARÍA MARISCAL CÁRDENAS\r\n', 'luz', 'mariscal', 'e807f1fcf82d132f9bb018ca6738a19f', '10c83618ce0db98eacfa1a999e61eed8', '9', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('67', 'L.A. ARTURO OMAR DE LA ROSA MAGALLANES \r\n', 'arturo', 'delarosa', 'e807f1fcf82d132f9bb018ca6738a19f', '69001d61fa8c29377fd8f5578cbf1e5a', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('68', 'LIC. MARCELA SARELLANO LEDGARD\r\n', 'marcela', 'sarellano', 'e807f1fcf82d132f9bb018ca6738a19f', 'fa9169c05e41a7a3ae99207dd67a8649', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('69', 'L.I. SILVIA ZEPEDA NÚÑEZ\r\n', 'silvia', 'zepeda', 'e807f1fcf82d132f9bb018ca6738a19f', '899510a9091f3131f405ec1a4b0d21f8', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('70', 'LIC. FERNANDO FLORES MONTES\r\n', 'fernando', 'flores', 'e807f1fcf82d132f9bb018ca6738a19f', '397fffdd7c40d8208a4bc3908e5792ec', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('71', 'LIC. MADELEINE PALENCIA ROSALES\r\n', 'madeleine', 'palencia', 'e807f1fcf82d132f9bb018ca6738a19f', '85f8a3d236b9867b86bb673690eff44b', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('72', 'LIC. ALEJANDRO GONZALEZ GUERECA\r\n', 'alejandro', 'gonzalez', 'e807f1fcf82d132f9bb018ca6738a19f', 'e3df0983dd9ab4fb572558d5766c0881', '9', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('73', 'LIC. GABRIELA RIVAS CASTILLO\r\n', 'gabriela', 'rivas', 'e807f1fcf82d132f9bb018ca6738a19f', 'fcc33adf2425e6192a5919c7e7213179', '10', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('74', 'LIC. FELIPE CORREA MURO\r\n', 'felipe', 'correa', 'e807f1fcf82d132f9bb018ca6738a19f', '84730741c63235674782265ab00ed037', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('75', 'C. MARTÍN LÓPEZ CHAIREZ\r\n', 'martin', 'lopez', 'e807f1fcf82d132f9bb018ca6738a19f', '49dd5a2ee7c027b89eab607b58f56649', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('76', 'LDGP JUAN CARLOS SAUCEDO CAMARGO\r\n', 'juan', 'saucedo', 'e807f1fcf82d132f9bb018ca6738a19f', '6fac84fb268b18bcfb16a2d0247e3334', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('77', 'LIC. MARIA DEL CARMEN LONGORIA CAMPOS\r\n', 'maria', 'longoria', 'e807f1fcf82d132f9bb018ca6738a19f', 'a2e91f29c85a3c109aba1257c0569b6d', '10', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('78', 'ING. CESAR GERARDO VICTORINO VENEGAS\r\n', 'cesar', 'victorino', 'e807f1fcf82d132f9bb018ca6738a19f', 'f2ef0011ba570a8e73cb9f8ae59dbcc0', '11', '1', '2', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('79', 'ING. JORGE GALO SOLANO GARCÍA\r\n', 'galo', 'solano', 'e807f1fcf82d132f9bb018ca6738a19f', '84f0c3a18121812c30aef815c9eee92d', '11', '1', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('80', 'C.D. ABRIL ARIANNA CARDOZA SILERIO \r\n', 'abril', 'cardoza', 'e807f1fcf82d132f9bb018ca6738a19f', '84870b9a8b26c07af1f1b3c1ceef6304', '11', '1', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('81', 'ING. RODOLFO ROJAS VARGAS\r\n', 'rodolfo', 'rojas', 'e807f1fcf82d132f9bb018ca6738a19f', '78e7a6e257b0bc4c72ab9994f07b3d31', '11', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('82', 'ING. LARRY ABISAÍ VARGAS CHÁVEZ\r\n', 'larry', 'vargas', 'e807f1fcf82d132f9bb018ca6738a19f', '5390db054a81ba9121daa299dc28abc7', '11', '1', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('83', 'ISC. MARIO ALBERTO CANALES AGUILAR\r\n', 'mario', 'Canalez', 'e807f1fcf82d132f9bb018ca6738a19f', '23636b9887b68ebaaaf7b25e1af762e4', '11', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('84', 'LIC. LUIS MIGUEL PINEDA HERNANDEZ.\r\n', 'luis', 'pineda', 'e807f1fcf82d132f9bb018ca6738a19f', '7fddf51700ebe643bdaebeb4c8e5e254', '12', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('85', 'LIC. JUAN CARLOS ZAMORA GARCÍA\r\n', 'juan', 'zamora', 'e807f1fcf82d132f9bb018ca6738a19f', '0426d5d82dc5aa8741562ffb92fd8347', '12', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('86', 'C.P. EFRAIN RAMOS TERRONES\r\n', 'efrain', 'ramos', 'e807f1fcf82d132f9bb018ca6738a19f', '272d86934506059f2eeb445632ec0878', '12', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('87', 'ING. MARTÍN CONTRERAS GALVAN\r\n', 'martin', 'contreras', 'e807f1fcf82d132f9bb018ca6738a19f', '51dae92dc3c9f6beb89c384399837d8b', '12', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('88', 'MTRO. DANIEL ZAVALA BARRIOS\r\n', 'daniel', 'zavala', 'e807f1fcf82d132f9bb018ca6738a19f', 'df13976ebd20f0c66c8d458dbeb184b4', '13', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('89', 'LIC. JORGE MACIAS MEDINA\r\n', 'jorge', 'macias', 'e807f1fcf82d132f9bb018ca6738a19f', '4d7e81523621b980f508a884e956f2cf', '13', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('90', 'LIC. BLANCA LORENA GALLEGOS RAMOS\r\n', 'blanca', 'gallegos', 'e807f1fcf82d132f9bb018ca6738a19f', '30e580fdebbbf0a873671d30f3aeeb8f', '13', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('91', 'C.P. KARLA LETICIA ALDABA CHAIREZ \r\n', 'karla', 'aldaba', 'e807f1fcf82d132f9bb018ca6738a19f', '43b1f015d140755c0b0286e99d009d70', '14', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('92', 'LIC. MAYRA ESPARZA URBINA\r\n', 'mayra', 'esparza', 'e807f1fcf82d132f9bb018ca6738a19f', '7af03a29b56f9025a6f9085fc1676a71', '14', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('93', 'L.M. ERNESTO TORRES HUIZAR\r\n', 'ernesto', 'torres', 'e807f1fcf82d132f9bb018ca6738a19f', '02927ba294c5b2f5f646b8dc2f7fe981', '14', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('94', 'LIC. SANDRA SUHEIL GONZALEZ  SAUCEDO\r\n', 'sandra', 'gonzalez', 'e807f1fcf82d132f9bb018ca6738a19f', '58a10ceb32cb8e69b8172f231af3422d', '15', '2', '3', '0', '0', '1', '1');
INSERT INTO `usuarios` VALUES ('95', 'LIC. SANDRA JUDITH ALMARAZ ESCARZAGA \r\n', 'sandra', 'almaraz', 'e807f1fcf82d132f9bb018ca6738a19f', '003153953fc40ea22bb14ff40764160e', '15', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('96', 'ING. JAIME AGUILERA MERAZ', 'jaime', 'aguilera', 'e807f1fcf82d132f9bb018ca6738a19f', '9420c111e1142bbada0d6892975893c2', '6', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('97', 'C.P. ELSA DURÁN HERRERA', 'elsa', 'duran', 'e807f1fcf82d132f9bb018ca6738a19f', '6f33954156d822248d95207ec98b6a43', '4', '3', '3', '0', '0', '0', '1');
INSERT INTO `usuarios` VALUES ('98', 'ING. ABISAÍ CHÁVEZ', 'abisai', 'chavez', 'e807f1fcf82d132f9bb018ca6738a19f', '7b5f522d0fc2673608d633898eac81b3', '11', '2', '3', '0', '0', '0', '1');

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
	ar.id as id_area,
	ar.nombre as area,
	CONCAT(us.nombre,' ',us.apellido) as usuario,
	odr.id_usuario AS id_usuario_receptor,
	ofc.nombre_emisor AS nombre_destino,
	ofc.cargo AS cargo_destino,
	ofc.institucion_emisor AS institucion_destino,
	ofc.asunto_emisor AS asunto_emisor,
	odr.estatus_inicial AS estatus_inicial,
	odr.estatus_final AS estatus_final,
	odr.create_at AS fecha_recibido,
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
	ar.id as id_area,
	ar.nombre as area,
	odr.estatus_inicial AS estatus_inicial,
	odr.estatus_final AS estatus_final,
	odr.create_at as fecha_recibido,
	odr.fecha_visto as fecha_visto
FROM
	sigi_oficios ofc
JOIN sigi_oficios_documentos_recepcion odr ON odr.id_oficio = ofc.id
JOIN sigi_documentos doc ON doc.id = odr.id_documentos
JOIN usuarios us ON us.id = odr.id_usuario
JOIN areas ar ON ar.id = us.area
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
	ar.id as id_area,
	ar.nombre as area,
	CONCAT(us.nombre,' ',us.apellido) as usuario,
	odr.id_usuario AS id_usuario_receptor,
	ofc.asunto_emisor AS asunto_emisor,
	odr.estatus_inicial AS estatus_inicial,
	odr.estatus_final AS estatus_final,
	odr.create_at AS fecha_recibido,
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
-- View structure for sigi_vw_oficios_vincular
-- ----------------------------
DROP VIEW IF EXISTS `sigi_vw_oficios_vincular`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `sigi_vw_oficios_vincular` AS SELECT
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
	odr.update_at AS fecha_recibido,
	odr.fecha_visto as fecha_visto
FROM
	sigi_oficios ofc
JOIN sigi_oficios_documentos_recepcion odr ON odr.id_oficio = ofc.id
JOIN sigi_documentos doc ON doc.id = odr.id_documentos
JOIN usuarios us ON us.id = ofc.id_usuario_emisor
JOIN areas ar ON ar.id = us.area
WHERE
	origen = 'INTERNO' AND ofc.tipo_oficio = 'SOLICITUD' ;

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
	odr.create_at AS fecha_recibido,
	odr.fecha_visto as fecha_visto
FROM
	sigi_oficios ofc
JOIN sigi_oficios_documentos_recepcion odr ON odr.id_oficio = ofc.id
LEFT JOIN sigi_documentos doc ON doc.id = odr.id_documentos
JOIN usuarios us ON us.id = ofc.id_usuario_emisor
JOIN areas ar ON ar.id = us.area
WHERE
	ofc.tipo_oficio = 'RESPUESTA' ;

-- ----------------------------
-- View structure for sigi_vw_solicitudes_entrantes
-- ----------------------------
DROP VIEW IF EXISTS `sigi_vw_solicitudes_entrantes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `sigi_vw_solicitudes_entrantes` AS SELECT
	ofc.id AS id_oficio,
	ofc.origen as origen,
	ofc.destino as destino,
	ofc.tipo_oficio,
	#ofc.folio AS folio,
	ofc.folio_institucion,
	ofc.id_usuario_emisor AS id_usuario_emisor,
	odr.ccp,
	ar.id as id_area,
	CASE
		WHEN ofc.origen='INTERNO' AND ofc.destino='INTERNO' THEN CAST(CONCAT(CONCAT(UCASE(LEFT(us.nombre, 1)),LCASE(SUBSTRING(us.nombre, 2))),' ',CONCAT(UCASE(LEFT(us.apellido, 1)),LCASE(SUBSTRING(us.apellido, 2))),' de ',ar.nombre) AS CHAR )
		WHEN ofc.origen='EXTERNO' AND ofc.destino='INTERNO' THEN CAST(CONCAT(ofc.nombre_emisor,' ',ofc.cargo,' de ', ofc.institucion_emisor) AS CHAR) 
		WHEN ofc.origen='INTERNO' AND ofc.destino='EXTERNO' THEN CAST(CONCAT(CONCAT(UCASE(LEFT(us.nombre, 1)),LCASE(SUBSTRING(us.nombre, 2))),' ',CONCAT(UCASE(LEFT(us.apellido, 1)),LCASE(SUBSTRING(us.apellido, 2))),' de ',ar.nombre) AS CHAR) 
	END as emisor,
	ar.nombre as area,
	CONCAT(us.nombre,' ',us.apellido) as usuario,
	odr.id_usuario AS id_usuario_receptor,
	ofc.nombre_emisor AS nombre_destino,
	ofc.cargo AS cargo_destino,
	ofc.institucion_emisor AS institucion_destino,
	ofc.asunto_emisor AS asunto_emisor,
	odr.estatus_inicial AS estatus_inicial,
	odr.estatus_final AS estatus_final,
	odr.update_at AS fecha_recibido,
	odr.fecha_visto as fecha_visto
FROM
	sigi_oficios ofc
LEFT JOIN sigi_oficios_documentos_recepcion odr ON odr.id_oficio = ofc.id
LEFT JOIN sigi_documentos doc ON doc.id = odr.id_documentos
LEFT JOIN usuarios us ON us.id = ofc.id_usuario_emisor
LEFT JOIN areas ar ON ar.id = us.area

WHERE
	ofc.tipo_oficio = 'SOLICITUD' ;

-- ----------------------------
-- View structure for sigi_vw_solicitudes_salientes
-- ----------------------------
DROP VIEW IF EXISTS `sigi_vw_solicitudes_salientes`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER  VIEW `sigi_vw_solicitudes_salientes` AS SELECT
	ofc.id AS id_oficio,
	ofc.origen as origen,
	ofc.destino as destino,
	ofc.tipo_oficio,
	#ofc.folio AS folio,
	ofc.folio_institucion,
	ofc.id_usuario_emisor AS id_usuario_emisor,
	odr.ccp,
	ar.id as id_area,
	CAST(CONCAT(CONCAT(UCASE(LEFT(us.nombre, 1)),LCASE(SUBSTRING(us.nombre, 2))),' ',CONCAT(UCASE(LEFT(us.apellido, 1)),LCASE(SUBSTRING(us.apellido, 2))),' de ',ar.nombre) AS CHAR ) as receptor,
	odr.id_usuario AS id_usuario_receptor,
	ofc.asunto_emisor AS asunto_receptor,
	odr.estatus_inicial AS estatus_inicial,
	odr.estatus_final AS estatus_final,
	odr.update_at AS fecha_recibido,
	odr.fecha_visto as fecha_visto
FROM
	sigi_oficios ofc
LEFT JOIN sigi_oficios_documentos_recepcion odr ON odr.id_oficio = ofc.id
LEFT JOIN sigi_documentos doc ON doc.id = odr.id_documentos
LEFT JOIN usuarios us ON us.id = odr.id_usuario
LEFT JOIN areas ar ON ar.id = us.area

WHERE
	ofc.tipo_oficio = 'SOLICITUD' ;
