/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.6.33 : Database - artic600_datacenter
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`artic600_datacenter` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `artic600_datacenter`;

/*Table structure for table `areas` */

CREATE TABLE `areas` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL,
  `abreviatura` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `areas` */

LOCK TABLES `areas` WRITE;

insert  into `areas`(`id`,`nombre`,`estado`,`abreviatura`) values (1,'Presidencia',1,'PRES'),(2,'Consejeros Electorales',1,'CE'),(3,'Secretaria Ejecutiva',1,'SE'),(4,'Contraloria',1,'CONT'),(5,'Secrearia Técnica',1,'ST'),(6,'Dirección de Organización Electoral',1,'DOE'),(7,'Dirección de Servicio Profesional Electoral',1,'DSPE'),(8,'Dirección Juridica',1,'DJ'),(9,'Unidad Técnica de Vinculación con el INE',1,'UTVINE'),(10,'Unidad Técnica de Servicio Profesional Electoral',1,'UTSPE'),(11,'Unidad Técnica de Computo',1,'UTC'),(12,'Unidad Técnica de Comunicación Social',1,'UTCS'),(13,'Unidad Técnica de Transparencia y Acceso a la Información',1,'UTTAI'),(14,'Unidad Técnica de Oficialía Electoral',1,'UTOE');

UNLOCK TABLES;

/*Table structure for table `lugares` */

CREATE TABLE `lugares` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `lugares` */

LOCK TABLES `lugares` WRITE;

insert  into `lugares`(`id`,`nombre`,`estado`) values (1,'Sala de Presidentes',1),(2,'Sala de Sesiones del Consejo General',1),(3,'Sala de Sesiones de Reuniones Previas',1),(4,'Secretaria Ejecuiva',1),(5,'Presidencia',1),(6,'Estacionamiento del IEPC',1),(7,'Recepción',1);

UNLOCK TABLES;

/*Table structure for table `siu_coga` */

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

/*Data for the table `siu_coga` */

LOCK TABLES `siu_coga` WRITE;

insert  into `siu_coga`(`id`,`folio`,`solicitante`,`fecha_solicitud`,`areaa`,`tipo_solicitud`,`tipo_falla`,`descripcion`,`evento`,`lugar`,`fecha_event`,`quien_atiende`,`resuelto`,`hora_de_resolucion`,`observaciones_de_soporte`,`calificacion_servicio`,`activo`,`activo_evento`) values (1,1000000001,'','','','','','','','','0000-00-00','',0,'','','',0,0),(2,1000000002,'Martin Contreras','Martes 28 de Marzo del 2017,  Hora: 15:34:55','Unidad Técnica de Transparencia y Acceso a la Información','Impresora','Soporte Técnico','No funciona para nada','0','0','0000-00-00','0',0,'0','','0',1,0),(3,1000000003,'Juan Zamora','Martes 28 de Marzo del 2017,  Hora: 15:41:04','Unidad Técnica de Transparencia y Acceso a la Información','Computadora','Soporte Técnico','esta muy lenta y no funciona para mis utilitarias ','0','0','0000-00-00','0',0,'0','','0',1,0),(4,1000000004,'Juan Zamora','Martes 28 de Marzo del 2017,  Hora: 15:48:18','Unidad Técnica de Oficialía Electoral','Laptop','Soporte Técnico','aaaa','0','0','0000-00-00','0',0,'0','','0',1,0),(5,1000000005,'Juan Zamora','Martes 28 de Marzo del 2017,  Hora: 15:49:43','Unidad Técnica de Transparencia y Acceso a la Información','Laptop','Soporte Técnico','juan zamora','0','0','0000-00-00','0',0,'0','','0',1,0),(6,1000000006,'Juan Zamora','Martes 28 de Marzo del 2017,  Hora: 16:22:26','Unidad Técnica de Transparencia y Acceso a la Información','Computadora','Soporte Técnico','no funciona para nada ','0','0','0000-00-00','0',0,'0','','0',1,0),(7,1000000007,'Juan Zamora','Martes 28 de Marzo del 2017,  Hora: 16:23:49','Unidad Técnica de Transparencia y Acceso a la Información','Impresora','Soporte Técnico','meteco avanza ','0','0','0000-00-00','0',0,'0','','0',1,0),(8,1000000008,'Juan Zamora','Martes 28 de Marzo del 2017,  Hora: 16:25:00','Unidad Técnica de Servicio Profesional Electoral','Laptop','Soporte Técnico','México\r\n','0','0','0000-00-00','0',0,'0','','0',1,0),(9,1000000009,'Juan Zamora','Martes 28 de Marzo del 2017,  Hora: 16:26:09','Unidad Técnica de Transparencia y Acceso a la Información','Impresora','Soporte Técnico','NO FUNCIONA ','0','0','0000-00-00','0',0,'0','','0',1,0),(10,1000000010,'Juan Zamora','Martes 28 de Marzo del 2017,  Hora: 16:26:55','Unidad Técnica de Vinculación con el INE','Impresora','Soporte Técnico','no funciona la impresora','0','0','0000-00-00','0',0,'0','','0',1,0),(11,1000000011,'Martin Contreras','Martes 28 de Marzo del 2017,  Hora: 21:12:23','Unidad Técnica de Transparencia y Acceso a la Información','Computadora','Soporte Técnico','Estoy en mi casa y no funciona el internet súper rodo ayudame','0','0','0000-00-00','0',0,'0','','0',1,0),(12,1000000011,'Martin Contreras','Martes 28 de Marzo del 2017,  Hora: 21:12:23','Unidad Técnica de Transparencia y Acceso a la Información','Computadora','Soporte Técnico','Estoy en mi casa y no funciona el internet súper rodo ayudame','0','0','0000-00-00','0',0,'0','','0',1,0),(13,1000000012,'Martin Contreras','Viernes 31 de Marzo del 2017,  Hora: 10:28:10','Secrearia Técnica','Laptop','','','0','0','0000-00-00','0',0,'0','','0',1,0);

UNLOCK TABLES;

/*Table structure for table `solicitudes` */

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `solicitudes` */

LOCK TABLES `solicitudes` WRITE;

insert  into `solicitudes`(`id`,`imagen`,`nombre_evento`,`lugar_evento`,`fecha_evento`,`fecha_evento_fin`,`hora_evento_ini`,`hora_evento_fin`,`area_evento`,`usuario_solicita`,`fecha_soliciud`,`color_fondo`,`color_texto`,`tipo_agenda`,`ediciones`,`estado`) values (1,'CE.jpg','xxx','---','2017-04-06','2017-04-07','00:00:01','23:59:00','11',1,'2017-04-03 14:23:04','#ff8040',NULL,2,'----- La creaci?n de la publicaci?n se realizo corectamente: 2017-04-03 14:23:04 por el usuario Larry Vargas <br> \n----- La solicitud fue aceptada el 2017-04-03 14:23:04 por el usuario Larry Vargas <br> \n----- La edici?n se realizo corectamente en la fecha: 2017-04-03 14:23:35 por el usuario Larry Vargas <br> \n----- La solicitud fue aceptada el 2017-04-03 14:23:35 por el usuario Larry Vargas <br> \n----- La edición se realizo corectamente en la fecha: 2017-04-04 13:38:55 por el usuario Galo Solano <br> \n----- La solicitud fue aceptada el 2017-04-04 13:38:55 por el usuario Galo Solano <br> \n',9),(2,'e909be9d0c0468ad29155ecd942e59f7.jpg','PRESENTACIÓN DE LA ESTRATEGIA NACIONAL DE CULTURA CÍVICA 2017-2023','Estacionamiento del IEPC','2017-04-04','2017-04-04','12:00:00','13:00:00','6',6,'2017-04-04 12:11:06','#8c1b67',NULL,1,'----- La creación de la publicación se realizo corectamente: 2017-04-04 12:11:06 por el usuario Abisai Vargas <br> \n----- La solicitud fue aceptada el 2017-04-04 23:34:26 por el usuario   <br> \n',9),(3,'c12ffb5f4a5ad3c068e4b0ec60e9e88c.jpg','CULTURA CÍVICA 2017-2023','Presidencia','2017-04-04','2017-04-04','13:00:00','14:00:00','6',6,'2017-04-04 13:17:30','#8c1b67',NULL,1,'----- La creación de la publicación se realizo corectamente: 2017-04-04 13:17:30 por el usuario Abisai Vargas <br> \n----- La solicitud fue aceptada el 2017-04-05 00:17:39 por el usuario   <br> \n',9),(4,'6a10f397b8864dcbb8d1c0f36aa91e21.jpg','TORNEO DE TERCIAS','Estacionamiento del IEPC','2017-04-07','2017-04-07','16:00:00','18:00:00','11',2,'2017-04-04 13:40:49','#8c1b67',NULL,1,'----- La creación de la publicación se realizo corectamente: 2017-04-04 13:40:49 por el usuario Galo Solano <br> \n----- La solicitud fue aceptada el 2017-04-04 13:40:49 por el usuario Galo Solano <br> \n',9);

UNLOCK TABLES;

/*Table structure for table `usuarios` */

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

/*Data for the table `usuarios` */

LOCK TABLES `usuarios` WRITE;

insert  into `usuarios`(`id`,`nombre`,`apellido`,`contrasena`,`correo`,`area`,`privilegios`,`priv_sigi`,`priv_sui`,`priv_sia`,`titular`,`estado`) values (1,'Larry','Vargas','a51a802ed1ed197f77ce04eb9b38bec0','5390db054a81ba9121daa299dc28abc7',11,1,1,1,1,0,1),(2,'Galo','Solano','63742fab732e0f2a59a51db5c9d50f8c','84f0c3a18121812c30aef815c9eee92d',11,1,1,1,1,0,1),(3,'Cesar','Victorino','63742fab732e0f2a59a51db5c9d50f8c','f2ef0011ba570a8e73cb9f8ae59dbcc0',11,1,1,1,1,1,1),(4,'Martin','Contreras','b10d30c27b8c1797d41fbc0357660116','51dae92dc3c9f6beb89c384399837d8b',11,1,1,1,1,0,1),(5,'Juan','Zamora','b10d30c27b8c1797d41fbc0357660116','0426d5d82dc5aa8741562ffb92fd8347',13,1,1,1,1,1,1),(6,'Abisai','Vargas','a51a802ed1ed197f77ce04eb9b38bec0','bf7a21b8aa60e85d309842dd7a202409',11,3,3,3,3,0,1);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
