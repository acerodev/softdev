-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para softdev
CREATE DATABASE IF NOT EXISTS `softdev` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `softdev`;

-- Volcando estructura para tabla softdev.caja
CREATE TABLE IF NOT EXISTS `caja` (
  `caja_id` int NOT NULL AUTO_INCREMENT,
  `caja_descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `caja_monto_inicial` decimal(10,2) DEFAULT NULL,
  `caja_monto_final` decimal(10,2) DEFAULT NULL,
  `caja_monto_egreso` decimal(10,2) DEFAULT NULL,
  `caja_fecha_ap` date DEFAULT NULL,
  `caja_fecha_cie` date DEFAULT NULL,
  `caja_total_ingreso` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `caja_total_egreso` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `caja_monto_total` decimal(10,2) DEFAULT NULL,
  `caja_hora_aper` time DEFAULT NULL,
  `caja_estado` enum('VIGENTE','CERRADO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `caja_monto_servicio` decimal(10,2) DEFAULT NULL,
  `caja_total_servicio` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `caja_hora_cierre` time DEFAULT NULL,
  `caja_monto_ingreso` decimal(10,2) DEFAULT NULL,
  `caja_coun_ingreso` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`caja_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla softdev.caja: ~2 rows (aproximadamente)
INSERT INTO `caja` (`caja_id`, `caja_descripcion`, `caja_monto_inicial`, `caja_monto_final`, `caja_monto_egreso`, `caja_fecha_ap`, `caja_fecha_cie`, `caja_total_ingreso`, `caja_total_egreso`, `caja_monto_total`, `caja_hora_aper`, `caja_estado`, `caja_monto_servicio`, `caja_total_servicio`, `caja_hora_cierre`, `caja_monto_ingreso`, `caja_coun_ingreso`) VALUES
	(11, 'Apertura de Caja', 500.00, 410.00, 378.00, '2024-09-30', '2024-09-30', '1', '2', 532.00, '14:14:01', 'CERRADO', 0.00, '0', '22:56:35', 0.00, '0'),
	(12, 'Apertura de Caja', 500.00, 115.00, 0.00, '2024-09-30', '2024-10-02', '1', '0', 725.00, '22:58:13', 'CERRADO', 110.00, '2', '12:07:00', 0.00, '0');

-- Volcando estructura para tabla softdev.categoria
CREATE TABLE IF NOT EXISTS `categoria` (
  `categoria_id` int NOT NULL AUTO_INCREMENT,
  `categoria_descripcion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `categoria_estado` enum('ACTIVO','INACTIVO') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`categoria_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla softdev.categoria: ~4 rows (aproximadamente)
INSERT INTO `categoria` (`categoria_id`, `categoria_descripcion`, `categoria_estado`) VALUES
	(1, 'GENERICO', 'ACTIVO'),
	(2, 'IMPRESORA', 'ACTIVO'),
	(3, 'PASTA', 'ACTIVO'),
	(4, 'MOUSE GAMER', 'ACTIVO');

-- Volcando estructura para tabla softdev.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `cliente_id` int NOT NULL AUTO_INCREMENT,
  `cliente_tipo_doc` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cliente_nombres` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cliente_celular` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cliente_dni` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cliente_fregistro` date DEFAULT NULL,
  `cliente_estado` enum('ACTIVO','INACTIVO') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cliente_direccion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cliente_ape_p` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cliente_ape_m` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cliente_correo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`cliente_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla softdev.cliente: ~7 rows (aproximadamente)
INSERT INTO `cliente` (`cliente_id`, `cliente_tipo_doc`, `cliente_nombres`, `cliente_celular`, `cliente_dni`, `cliente_fregistro`, `cliente_estado`, `cliente_direccion`, `cliente_ape_p`, `cliente_ape_m`, `cliente_correo`) VALUES
	(1, 'R.U.C', 'Publico General', '999999999', '99999999', '2023-06-12', 'ACTIVO', 'Paita', '', '', ''),
	(2, 'R.U.C', 'ACERO OLIVA CESARIO ROMAN', '987668105', '10710628764', '2024-09-30', 'ACTIVO', '-', '', '', 'aceroolivaroman@gmail.com'),
	(3, 'DNI', 'ALIPIO MILENIO ACERO OLIVA', '953', '71062875', '2024-09-30', 'ACTIVO', 'Santa Rosa', '', '', ''),
	(4, 'DNI', 'BLADEMIR ACERO OLIVA', '953', '74211088', '2024-09-30', 'ACTIVO', 'Villa', '', '', ''),
	(5, 'R.U.C', 'Academia Pi Ilo', '953', '123456', '2024-10-01', 'ACTIVO', 'Villa', '', '', ''),
	(6, 'R.U.C', 'Botica', '953', '0001', '2024-10-01', 'ACTIVO', 'Ovalo', '', '', ''),
	(7, 'R.U.C', 'ACERO DEV', '987668105', '71062876', '2024-10-01', 'ACTIVO', 'Villa', '', '', '');

-- Volcando estructura para tabla softdev.comprobante
CREATE TABLE IF NOT EXISTS `comprobante` (
  `compro_id` int NOT NULL AUTO_INCREMENT,
  `compro_tipo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `compro_serie` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `compro_numero` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `compro_estado` enum('ACTIVO','INACTIVO') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`compro_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla softdev.comprobante: ~4 rows (aproximadamente)
INSERT INTO `comprobante` (`compro_id`, `compro_tipo`, `compro_serie`, `compro_numero`, `compro_estado`) VALUES
	(1, 'BOLETA', 'B001', '1', 'ACTIVO'),
	(2, 'FACTURA', 'F001', '1', 'ACTIVO'),
	(3, 'TICKET', '0001', '3', 'ACTIVO'),
	(4, 'COTIZACION', 'C001', '000001', 'ACTIVO');

-- Volcando estructura para tabla softdev.configuracion
CREATE TABLE IF NOT EXISTS `configuracion` (
  `confi_id` int NOT NULL AUTO_INCREMENT,
  `confi_razon_social` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `confi_ruc` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `confi_nombre_representante` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `confi_direccion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `confi_celular` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `confi_telefono` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `confi_correo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `config_foto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `confi_estado` enum('ACTIVO','INACTIVO') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `confi_url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `confi_cnta01` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `confi_nro_cuenta01` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `confi_cnta02` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `confi_nro_cuenta02` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `confi_moneda` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `confi_codigo_pos` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `confi_tipo_igv` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `confi_igv` decimal(10,2) DEFAULT NULL,
  `confi_moneda1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `confi_moneda2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `confi_nombre_sistema` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `url_sistema` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cod_pais` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`confi_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla softdev.configuracion: ~0 rows (aproximadamente)
INSERT INTO `configuracion` (`confi_id`, `confi_razon_social`, `confi_ruc`, `confi_nombre_representante`, `confi_direccion`, `confi_celular`, `confi_telefono`, `confi_correo`, `config_foto`, `confi_estado`, `confi_url`, `confi_cnta01`, `confi_nro_cuenta01`, `confi_cnta02`, `confi_nro_cuenta02`, `confi_moneda`, `confi_codigo_pos`, `confi_tipo_igv`, `confi_igv`, `confi_moneda1`, `confi_moneda2`, `confi_nombre_sistema`, `url_sistema`, `cod_pais`) VALUES
	(3, 'ACERO DEV', '10710628764', 'ROMAN ACERO', 'ILO-MOQUEGUA', '987668105', '951241733', 'acerodev@gmail.com', 'controller/empresa/foto/LOGO30920241733.png', 'ACTIVO', 'https://localhost/sertecver2_nueva/view/buscar_equipo.php', 'BCP', '38599542998048', 'YAPE', '987668105', 'S/', '18601', 'IGV', 0.18, 'SOLES', 'CENTIMOS', 'SOFTDEV', 'https://localhost/sertecver2_nueva/', '+51');

-- Volcando estructura para tabla softdev.cotizacion
CREATE TABLE IF NOT EXISTS `cotizacion` (
  `coti_id` int NOT NULL AUTO_INCREMENT,
  `cliente_id` int DEFAULT NULL,
  `coti_comprobante` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `coti_serie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `coti_num_comprobante` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `coti_total` decimal(10,2) DEFAULT NULL,
  `coti_impuesto` decimal(10,2) DEFAULT NULL,
  `coti_fregistro` date DEFAULT NULL,
  `coti_hora` time DEFAULT NULL,
  `coti_estado` enum('ACTIVO','INACTIVO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `compro_id` int DEFAULT NULL,
  `coti_porcentaje` decimal(10,2) DEFAULT NULL,
  `usu_id` int DEFAULT NULL,
  `coti_atiende` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `coti_dias` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fpago_id` int DEFAULT NULL,
  PRIMARY KEY (`coti_id`) USING BTREE,
  KEY `prove_id` (`cliente_id`) USING BTREE,
  KEY `compro_id` (`compro_id`) USING BTREE,
  KEY `usu_id` (`usu_id`) USING BTREE,
  KEY `fpago_id` (`fpago_id`) USING BTREE,
  CONSTRAINT `cotizacion_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `cotizacion_ibfk_2` FOREIGN KEY (`compro_id`) REFERENCES `comprobante` (`compro_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `cotizacion_ibfk_3` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `cotizacion_ibfk_4` FOREIGN KEY (`fpago_id`) REFERENCES `forma_pago` (`fpago_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla softdev.cotizacion: ~0 rows (aproximadamente)

-- Volcando estructura para tabla softdev.cotizacion_detalle
CREATE TABLE IF NOT EXISTS `cotizacion_detalle` (
  `coti_detalle_id` int NOT NULL AUTO_INCREMENT,
  `coti_id` int DEFAULT NULL,
  `producto_id` int DEFAULT NULL,
  `coti_detalle_cantidad` decimal(10,2) DEFAULT NULL,
  `coti_detalle_precio` decimal(10,2) DEFAULT NULL,
  `coti_detalle_estado` enum('ACTIVO','INACTIVO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `coti_detalle_fecha` date DEFAULT NULL,
  PRIMARY KEY (`coti_detalle_id`) USING BTREE,
  KEY `coti_id` (`coti_id`) USING BTREE,
  KEY `producto_id` (`producto_id`) USING BTREE,
  CONSTRAINT `cotizacion_detalle_ibfk_1` FOREIGN KEY (`coti_id`) REFERENCES `cotizacion` (`coti_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `cotizacion_detalle_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`producto_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla softdev.cotizacion_detalle: ~0 rows (aproximadamente)

-- Volcando estructura para tabla softdev.detalle_venta
CREATE TABLE IF NOT EXISTS `detalle_venta` (
  `vdetalle_id` int NOT NULL AUTO_INCREMENT,
  `venta_id` int DEFAULT NULL,
  `producto_id` int DEFAULT NULL,
  `vdetalle_cantidad` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `vdetalle_precio` decimal(10,2) DEFAULT NULL,
  `vdetalle_estado` enum('ANULADA','VENDIDO') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `vdetalle_fecha` date DEFAULT NULL,
  `v_imei` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `vdetalle_descuento` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`vdetalle_id`) USING BTREE,
  KEY `venta_id` (`venta_id`) USING BTREE,
  KEY `producto_id` (`producto_id`) USING BTREE,
  CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`venta_id`) REFERENCES `venta` (`venta_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`producto_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla softdev.detalle_venta: ~1 rows (aproximadamente)
INSERT INTO `detalle_venta` (`vdetalle_id`, `venta_id`, `producto_id`, `vdetalle_cantidad`, `vdetalle_precio`, `vdetalle_estado`, `vdetalle_fecha`, `v_imei`, `vdetalle_descuento`) VALUES
	(8, 7, 7, '1.00', 420.00, 'ANULADA', '2024-09-30', '', 10.00),
	(9, 8, 11, '1.00', 120.00, 'VENDIDO', '2024-10-01', '', 5.00);

-- Volcando estructura para tabla softdev.forma_pago
CREATE TABLE IF NOT EXISTS `forma_pago` (
  `fpago_id` int NOT NULL AUTO_INCREMENT,
  `fpago_descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fpago_estado` enum('ACTIVO','INACTIVO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`fpago_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla softdev.forma_pago: ~4 rows (aproximadamente)
INSERT INTO `forma_pago` (`fpago_id`, `fpago_descripcion`, `fpago_estado`) VALUES
	(1, 'EFECTIVO', 'ACTIVO'),
	(2, 'TARJETA', 'ACTIVO'),
	(3, 'EFECTIVO Y OTROS', 'ACTIVO'),
	(5, 'YAPE', 'ACTIVO');

-- Volcando estructura para tabla softdev.gastos
CREATE TABLE IF NOT EXISTS `gastos` (
  `gastos_id` int NOT NULL AUTO_INCREMENT,
  `gastos_descripcion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `gastos_monto` decimal(10,2) NOT NULL,
  `gastos_responsable` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `gastos_fregistro` date DEFAULT NULL,
  `gastos_estado` enum('ACTIVO','INACTIVO') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `estado_caja` enum('ABIERTO','CERRADO') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tipo_mov` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`gastos_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla softdev.gastos: ~2 rows (aproximadamente)
INSERT INTO `gastos` (`gastos_id`, `gastos_descripcion`, `gastos_monto`, `gastos_responsable`, `gastos_fregistro`, `gastos_estado`, `estado_caja`, `tipo_mov`) VALUES
	(3, 'Compra de perilleros nuevos', 18.00, 'Roman', '2024-09-30', 'ACTIVO', 'CERRADO', 'EGRESO'),
	(4, 'Compra de 1 impresoras termicas', 360.00, 'Roman', '2024-09-30', 'ACTIVO', 'CERRADO', 'EGRESO');

-- Volcando estructura para tabla softdev.grupos
CREATE TABLE IF NOT EXISTS `grupos` (
  `grupo_id` int NOT NULL AUTO_INCREMENT,
  `men_grupo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado` int DEFAULT NULL,
  `grupo_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  PRIMARY KEY (`grupo_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla softdev.grupos: ~18 rows (aproximadamente)
INSERT INTO `grupos` (`grupo_id`, `men_grupo`, `estado`, `grupo_icon`, `fecha_reg`) VALUES
	(1, 'singrupo', 1, 'users', '2024-07-23 00:00:55'),
	(2, 'Usuario', 1, 'users', '2024-07-23 00:01:09'),
	(3, 'Comprobantes', 1, 'file-code', '2024-07-23 00:01:54'),
	(4, 'Configuracion', 1, 'building', '2024-07-23 00:02:21'),
	(5, 'Recepcion', 1, 'tags', '2024-07-23 00:02:58'),
	(6, 'Reparacion_t', 1, 'coins', '2024-07-24 22:47:57'),
	(7, 'Servicios', 1, 'coins', '2024-07-24 22:48:21'),
	(8, 'Caja', 1, 'cash-register', '2024-07-24 22:49:58'),
	(9, 'Productos', 1, 'box-open', '2024-07-24 22:54:44'),
	(10, 'Presupuesto', 1, 'box-open', '2024-07-24 23:01:28'),
	(11, 'ReporVentas', 1, 'file-alt', '2024-07-24 23:05:17'),
	(12, 'ReporProducto', 1, 'file-alt', '2024-07-24 23:05:35'),
	(13, 'Ventas', 1, 'file-alt', '2024-09-07 19:29:11'),
	(14, 'Clientes', 1, 'file-alt', '2024-09-07 19:30:35'),
	(15, 'ReporReparaciones', 1, 'file-alt', '2024-09-07 19:59:22'),
	(16, 'reporteGastos', 1, 'file-alt', '2024-09-07 20:02:05'),
	(17, 'Dashboard', 1, 'file-alt', '2024-09-18 00:50:22'),
	(18, 'Notas', 1, 'file-alt', '2024-09-20 09:58:36');

-- Volcando estructura para tabla softdev.kardex
CREATE TABLE IF NOT EXISTS `kardex` (
  `kardex_id` int NOT NULL AUTO_INCREMENT,
  `kardex_fecha` date DEFAULT NULL,
  `kardex_tipo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kardex_ingreso` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kardex_p_ingreso` decimal(10,2) DEFAULT NULL,
  `kardex_salida` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kardex_p_salida` decimal(10,2) DEFAULT NULL,
  `kardex_total` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `kardex_precio_general` decimal(10,2) DEFAULT NULL,
  `producto_id` int DEFAULT NULL,
  `vdetalle_id` int DEFAULT NULL,
  `producto_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `producto_codigo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `venta_id` int DEFAULT NULL,
  `venta_comprobante` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tecnico` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `imei` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`kardex_id`) USING BTREE,
  KEY `producto_id` (`producto_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla softdev.kardex: ~8 rows (aproximadamente)
INSERT INTO `kardex` (`kardex_id`, `kardex_fecha`, `kardex_tipo`, `kardex_ingreso`, `kardex_p_ingreso`, `kardex_salida`, `kardex_p_salida`, `kardex_total`, `kardex_precio_general`, `producto_id`, `vdetalle_id`, `producto_nombre`, `producto_codigo`, `venta_id`, `venta_comprobante`, `tecnico`, `imei`) VALUES
	(22, '2024-09-30', 'INICIAL', '5', 360.00, NULL, 420.00, '5', 360.00, 7, NULL, 'IMPRESORA TERMICA DE ETIQUETAS ADV-8010', 'P0001', NULL, NULL, NULL, NULL),
	(23, '2024-09-30', 'ANULADA', NULL, NULL, '1.00', 420.00, '4', 360.00, 7, 8, NULL, NULL, 7, 'TICKET-0001-00001', NULL, ''),
	(24, '2024-09-30', 'INGRESO', '5', 360.00, NULL, NULL, '9', 360.00, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(25, '2024-09-30', 'SALIDA DIRECTA', NULL, NULL, '4', 360.00, '5', 360.00, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(26, '2024-10-01', 'INICIAL', '30', 28.00, NULL, NULL, '30', 28.00, 8, NULL, 'MANTENIMIENTO FISICO', 'P0008', NULL, NULL, NULL, NULL),
	(27, '2024-10-01', 'INICIAL', '30', 28.00, NULL, NULL, '30', 28.00, 9, NULL, 'FORMATEO', 'P0009', NULL, NULL, NULL, NULL),
	(28, '2024-10-01', 'INICIAL', '2', 25.00, NULL, NULL, '2', 25.00, 10, NULL, 'PASTA TERMICA', 'P0010', NULL, NULL, NULL, NULL),
	(29, '2024-10-01', 'SALIDA INSUMOS', NULL, NULL, '1', 40.00, '1', 40.00, 10, NULL, NULL, NULL, NULL, 'R-00015', 'roman', NULL),
	(30, '2024-10-01', 'INICIAL', '3', 75.00, NULL, NULL, '3', 75.00, 11, NULL, 'MOUSE LOGITECH 735', 'P0011', NULL, NULL, NULL, NULL),
	(31, '2024-10-01', 'SALIDA', NULL, NULL, '1.00', 120.00, '2', 75.00, 11, 9, NULL, NULL, 8, 'TICKET-0001-00002', NULL, '');

-- Volcando estructura para tabla softdev.marca
CREATE TABLE IF NOT EXISTS `marca` (
  `marca_id` int NOT NULL AUTO_INCREMENT,
  `marca_descripcion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `marca_estado` enum('ACTIVO','INACTIVO') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`marca_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla softdev.marca: ~10 rows (aproximadamente)
INSERT INTO `marca` (`marca_id`, `marca_descripcion`, `marca_estado`) VALUES
	(1, 'GENERICO', 'ACTIVO'),
	(2, 'SAMSUNG ', 'ACTIVO'),
	(3, 'LG', 'ACTIVO'),
	(4, 'HONOR', 'ACTIVO'),
	(5, 'MOTOROLA', 'ACTIVO'),
	(6, 'ZTE', 'ACTIVO'),
	(7, 'HUAWEI', 'ACTIVO'),
	(8, 'XIAOMI', 'ACTIVO'),
	(9, 'ADVANCE', 'ACTIVO'),
	(10, 'LOGITECH', 'ACTIVO');

-- Volcando estructura para tabla softdev.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `men_id` int NOT NULL AUTO_INCREMENT,
  `men_vista` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `men_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `men_ruta` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado` int DEFAULT NULL,
  `grupo_id` int DEFAULT NULL,
  `fecha_reg` datetime DEFAULT NULL,
  `orden` int DEFAULT NULL,
  PRIMARY KEY (`men_id`) USING BTREE,
  KEY `grupo_id` (`grupo_id`) USING BTREE,
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`grupo_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla softdev.menu: ~28 rows (aproximadamente)
INSERT INTO `menu` (`men_id`, `men_vista`, `men_icon`, `men_ruta`, `estado`, `grupo_id`, `fecha_reg`, `orden`) VALUES
	(1, 'Recepcion', 'circle', 'recepcion/mantenimiento_recepcion.php', 1, 5, '2024-07-24 22:46:24', 1),
	(2, 'Motivo', 'circle', 'motivo/mantenimiento_motivo.php', 1, 5, '2024-07-24 22:47:00', 2),
	(3, 'Reparaciones Tec.', 'mobile-alt', 'reparaciones/mantenimiento_reparacion.php', 1, 6, '2024-07-24 22:48:29', 3),
	(4, 'Terminar Repar.', 'hand-holding-usd', 'servicio/mantenimiento_servicio.php', 1, 7, '2024-07-24 22:49:27', 4),
	(5, 'Caja', 'circle', 'caja/mantenimiento_caja.php', 1, 8, '2024-07-24 22:50:26', 5),
	(6, 'Movimientos', 'circle', 'gasto/mantenimiento_gasto.php', 1, 8, '2024-07-24 22:51:03', 6),
	(7, 'Ventas', 'cash-register', 'venta/mantenimiento_venta.php', 1, 13, '2024-07-24 22:52:11', 7),
	(8, 'Clientes', 'user-friends', 'cliente/mantenimiento_cliente.php', 1, 14, '2024-07-24 22:53:19', 8),
	(9, 'Productos', 'circle', 'producto/mantenimiento_producto.php', 1, 9, '2024-07-24 22:55:20', 9),
	(10, 'Categoria', 'circle', 'categoria/mantenimiento_categoria.php', 1, 9, '2024-07-24 22:55:53', 10),
	(11, 'Marca', 'circle', 'marca/mantenimiento_marca.php', 1, 9, '2024-07-24 22:56:46', 11),
	(12, 'Unidad Med.', 'circle', 'medida/mantenimiento_medida.php', 1, 9, '2024-07-24 22:56:49', 12),
	(13, 'Presupuesto', 'circle', 'cotizacion/mantenimiento_cotizacion.php', 1, 10, '2024-07-24 23:02:07', 23),
	(14, 'Tipo Pago', 'circle', 'forma_pago/mantenimiento_forma_pago.php', 1, 10, '2024-07-24 23:02:50', 24),
	(15, 'Usuarios', 'circle', 'usuario/mantenimiento_usuario.php', 1, 2, '2024-07-23 00:03:52', 13),
	(16, 'Roles', 'circle', 'rol/mantenimiento_rol.php', 1, 2, '2024-07-23 00:04:49', 14),
	(17, 'Comprobantes', 'file', 'comprobante/mantenimiento_comprobante.php', 1, 3, '2024-07-23 00:05:36', 25),
	(18, 'Configuracion', 'building', 'configuracion/mantenimiento_configuracion.php', 1, 4, '2024-08-02 23:54:02', 23),
	(19, 'Reporte Reparaciones', 'file-alt', 'reporteservicio/mantenimiento_reporte_servicio.php', 1, 15, '2024-07-24 23:04:07', 15),
	(20, 'Reporte Gastos', 'file-alt', 'reportegasto/mantenimiento_reporte_gasto.php', 1, 16, '2024-07-24 23:04:33', 16),
	(21, 'Reporte Ventas', 'circle', 'reporteventa/mantenimiento_reporte_venta.php', 1, 11, '2024-07-24 23:06:09', 17),
	(22, 'Pivot', 'circle', 'reporteventa/mantenimiento_pivot.php', 1, 11, '2024-07-24 23:06:43', 18),
	(23, 'Por Producto', 'circle', 'reporteproducto/mantenimiento_reporte_producto.php', 1, 12, '2024-07-24 23:08:02', 19),
	(24, 'Producto - utilidad', 'circle', 'reporteproducto/mantenimiento_utilidad.php', 1, 12, '2024-07-24 23:09:42', 20),
	(25, 'Kardex', 'circle', 'reporteproducto/mantenimiento_kardex.php', 1, 12, '2024-07-24 23:10:43', 22),
	(26, 'Imei Mov', 'circle', 'reporteproducto/mantenimiento_mov_imei.php', 1, 12, '2024-07-24 23:10:15', 21),
	(27, 'Dashboard', 'circle', 'dashboard/mantenimiento_dashboard.php', 1, 17, '2024-09-18 00:50:35', 25),
	(28, 'Notas', 'circle', 'notas/mantenimiento_notas.php', 1, 18, '2024-09-20 09:58:47', 26);

-- Volcando estructura para tabla softdev.motivo
CREATE TABLE IF NOT EXISTS `motivo` (
  `motivo_id` int NOT NULL AUTO_INCREMENT,
  `motivo_descripcion` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `motivo_estado` enum('ACTIVO','INACTIVO') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`motivo_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla softdev.motivo: ~5 rows (aproximadamente)
INSERT INTO `motivo` (`motivo_id`, `motivo_descripcion`, `motivo_estado`) VALUES
	(1, 'Matenimiento', 'ACTIVO'),
	(2, 'Garantia ', 'ACTIVO'),
	(3, 'Reparacion', 'ACTIVO'),
	(4, 'Repotenciación', 'ACTIVO'),
	(5, 'Formateo', 'ACTIVO');

-- Volcando estructura para tabla softdev.notas
CREATE TABLE IF NOT EXISTS `notas` (
  `nota_id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `usu_id` int DEFAULT NULL,
  PRIMARY KEY (`nota_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla softdev.notas: ~0 rows (aproximadamente)

-- Volcando estructura para tabla softdev.plan
CREATE TABLE IF NOT EXISTS `plan` (
  `plan_id` int NOT NULL AUTO_INCREMENT,
  `plan_nombre_cli` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `plan_ini` datetime DEFAULT NULL,
  `plan_fin` datetime DEFAULT NULL,
  `plan_monto` decimal(10,2) DEFAULT NULL,
  `plan_estado` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `plan_correo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`plan_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla softdev.plan: ~0 rows (aproximadamente)
INSERT INTO `plan` (`plan_id`, `plan_nombre_cli`, `descripcion`, `plan_ini`, `plan_fin`, `plan_monto`, `plan_estado`, `plan_correo`) VALUES
	(1, 'Gustavo M', 'Mensual', '2024-09-07 20:43:57', '2024-10-07 20:44:00', 25.00, 'Activo', NULL);

-- Volcando estructura para tabla softdev.producto
CREATE TABLE IF NOT EXISTS `producto` (
  `producto_id` int NOT NULL AUTO_INCREMENT,
  `producto_codigo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `producto_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `marca_id` int DEFAULT NULL,
  `categoria_id` int DEFAULT NULL,
  `producto_stock` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `producto_pcompra` decimal(10,2) DEFAULT NULL,
  `producto_pventa` decimal(10,2) DEFAULT NULL,
  `producto_fregistro` date DEFAULT NULL,
  `producto_estado` enum('ACTIVO','INACTIVO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `producto_stock_inicial` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `producto_aumento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `producto_codigo_general` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cliente_id` int DEFAULT NULL,
  `producto_foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `unidad_id` int DEFAULT NULL,
  `pro_imei` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`producto_id`) USING BTREE,
  KEY `marca_id` (`marca_id`) USING BTREE,
  KEY `categoria_id` (`categoria_id`) USING BTREE,
  KEY `prove_id` (`cliente_id`) USING BTREE,
  KEY `unidad_id` (`unidad_id`) USING BTREE,
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`marca_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`categoria_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `producto_ibfk_4` FOREIGN KEY (`unidad_id`) REFERENCES `unidadmedida` (`unidad_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `producto_ibfk_5` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla softdev.producto: ~5 rows (aproximadamente)
INSERT INTO `producto` (`producto_id`, `producto_codigo`, `producto_nombre`, `marca_id`, `categoria_id`, `producto_stock`, `producto_pcompra`, `producto_pventa`, `producto_fregistro`, `producto_estado`, `producto_stock_inicial`, `producto_aumento`, `producto_codigo_general`, `cliente_id`, `producto_foto`, `unidad_id`, `pro_imei`) VALUES
	(7, 'P0001', 'IMPRESORA TERMICA DE ETIQUETAS ADV-8010', 9, 2, '6', 360.00, 420.00, '2024-09-30', 'ACTIVO', '5', '4', '309202414825', 2, 'controller/producto/foto/PRO-309202418291.png', 6, 'No'),
	(8, 'P0008', 'MANTENIMIENTO FISICO', 1, 1, '30', 28.00, 40.00, '2024-10-01', 'ACTIVO', '30', NULL, '110202410584', 7, 'controller/producto/foto/PRO-110202410244.jpeg', 6, 'No'),
	(9, 'P0009', 'FORMATEO', 1, 1, '30', 28.00, 40.00, '2024-10-01', 'ACTIVO', '30', NULL, '110202410147', 7, 'controller/producto/foto/default.png', 6, 'No'),
	(10, 'P0010', 'PASTA TERMICA', 1, 3, '1', 25.00, 40.00, '2024-10-01', 'ACTIVO', '2', NULL, '110202410711', 7, 'controller/producto/foto/default.png', 6, 'No'),
	(11, 'P0011', 'MOUSE LOGITECH 735', 10, 4, '2', 75.00, 120.00, '2024-10-01', 'ACTIVO', '3', NULL, '110202411169', 7, 'controller/producto/foto/default.png', 6, 'No');

-- Volcando estructura para tabla softdev.producto_detalle
CREATE TABLE IF NOT EXISTS `producto_detalle` (
  `id_prod_imei` int NOT NULL AUTO_INCREMENT,
  `producto_id` int DEFAULT NULL,
  `imei` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `vendido` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_prod_imei`) USING BTREE,
  KEY `producto_id` (`producto_id`) USING BTREE,
  CONSTRAINT `producto_detalle_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`producto_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla softdev.producto_detalle: ~0 rows (aproximadamente)

-- Volcando estructura para tabla softdev.proveedor
CREATE TABLE IF NOT EXISTS `proveedor` (
  `prove_id` int NOT NULL AUTO_INCREMENT,
  `prove_ruc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prove_razon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prove_direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prove_celular` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `prove_fregistro` date DEFAULT NULL,
  `prove_estado` enum('ACTIVO','INACTIVO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`prove_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla softdev.proveedor: ~0 rows (aproximadamente)

-- Volcando estructura para tabla softdev.recepcion
CREATE TABLE IF NOT EXISTS `recepcion` (
  `rece_id` int NOT NULL AUTO_INCREMENT,
  `cliente_id` int DEFAULT NULL,
  `rece_equipo` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rece_caracteristicas` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `motivo_id` int DEFAULT NULL,
  `rece_concepto` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rece_monto` decimal(10,2) DEFAULT NULL,
  `rece_fregistro` date DEFAULT NULL,
  `rece_estado` enum('EN REPARACION','REPARADO','ENTREGADO','NO REPARADO') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rece_estatus` enum('ACTIVO','INACTIVO') CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rece_adelanto` decimal(10,2) DEFAULT NULL,
  `rece_debe` decimal(10,2) DEFAULT NULL,
  `rece_accesorios` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rece_fentrega` date DEFAULT NULL,
  `marca_id` int DEFAULT NULL,
  `rece_serie` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `enciende` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tactil` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `imagen` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `vibra` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `cobertura` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `sensor` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `carga` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `bluetoo` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `wifi` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `huella` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `home` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `lateral` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `camara` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `bateria` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `auricular` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `micro` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `face` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `tornillo` varchar(3) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rece_cod` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `usuario_registrador` int DEFAULT NULL,
  `tecnico` int DEFAULT NULL,
  `diagnostico_tecnico` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `clave` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rece_foto1` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rece_foto2` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`rece_id`) USING BTREE,
  KEY `cliente_id` (`cliente_id`) USING BTREE,
  KEY `motivo_id` (`motivo_id`) USING BTREE,
  KEY `marca_id` (`marca_id`) USING BTREE,
  CONSTRAINT `recepcion_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `recepcion_ibfk_2` FOREIGN KEY (`motivo_id`) REFERENCES `motivo` (`motivo_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `recepcion_ibfk_3` FOREIGN KEY (`marca_id`) REFERENCES `marca` (`marca_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- Volcando datos para la tabla softdev.recepcion: ~3 rows (aproximadamente)
INSERT INTO `recepcion` (`rece_id`, `cliente_id`, `rece_equipo`, `rece_caracteristicas`, `motivo_id`, `rece_concepto`, `rece_monto`, `rece_fregistro`, `rece_estado`, `rece_estatus`, `rece_adelanto`, `rece_debe`, `rece_accesorios`, `rece_fentrega`, `marca_id`, `rece_serie`, `enciende`, `tactil`, `imagen`, `vibra`, `cobertura`, `sensor`, `carga`, `bluetoo`, `wifi`, `huella`, `home`, `lateral`, `camara`, `bateria`, `auricular`, `micro`, `face`, `tornillo`, `rece_cod`, `usuario_registrador`, `tecnico`, `diagnostico_tecnico`, `clave`, `rece_foto1`, `rece_foto2`) VALUES
	(15, 3, NULL, '', 1, 'SOLO MANTENIMIENTO', 35.00, '2024-09-30', 'ENTREGADO', 'ACTIVO', 0.00, 35.00, '', '2024-10-01', 1, NULL, 'Si', 'Si', 'Si', 'Si', 'Si', 'No', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', '1', 16, 16, 'DELICADO', NULL, 'controller/recepcion/foto/IMG309202416668.jpeg', NULL),
	(16, 4, NULL, '', 5, 'SIN OBSERVACIONES', 35.00, '2024-09-30', 'ENTREGADO', 'ACTIVO', 0.00, 35.00, '', '2024-09-30', 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '30092024', 16, 16, 'TERMINADO EL FORMATEO', NULL, 'controller/recepcion/foto/no_imagen.png', NULL),
	(17, 4, NULL, NULL, 4, 'REPOTENCIACION', 35.00, '2024-10-01', 'EN REPARACION', 'ACTIVO', 0.00, 35.00, NULL, '2024-10-01', 1, NULL, 'Si', 'Si', 'Si', '', '', 'Si', 'Si', 'Si', 'Si', '', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', '', 'Si', '3', 16, 16, NULL, NULL, 'controller/recepcion/foto/no_imagen.png', NULL);

-- Volcando estructura para tabla softdev.recep_equipo
CREATE TABLE IF NOT EXISTS `recep_equipo` (
  `id_equipo` int NOT NULL AUTO_INCREMENT,
  `rece_id` int NOT NULL,
  `equipo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `serie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `abono` decimal(10,2) DEFAULT NULL,
  `pendiente` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `falla` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `diagnostico` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_equipo`) USING BTREE,
  KEY `rece_id` (`rece_id`) USING BTREE,
  CONSTRAINT `recep_equipo_ibfk_1` FOREIGN KEY (`rece_id`) REFERENCES `recepcion` (`rece_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla softdev.recep_equipo: ~3 rows (aproximadamente)
INSERT INTO `recep_equipo` (`id_equipo`, `rece_id`, `equipo`, `serie`, `monto`, `abono`, `pendiente`, `fecha`, `falla`, `diagnostico`) VALUES
	(15, 15, 'LATOP ASUS I5', 'FXC543', 35.00, 0.00, NULL, '2024-09-30', ' MANTENIMIENTO', 'EQUIPO SE ENCUENTRA DELICADO'),
	(16, 16, 'LAPTOP ASUS AMD', 'ASUS123', 35.00, 0.00, NULL, '2024-09-30', ' SOLO FORMATEO', 'SE INSTALO PROGRAMAS SIN PROBLEMAS'),
	(17, 17, 'LAPTOP ASUS', 'ABC123', 35.00, 0.00, NULL, '2024-10-01', ' S/F', NULL);

-- Volcando estructura para tabla softdev.recep_insumos
CREATE TABLE IF NOT EXISTS `recep_insumos` (
  `id_insumo` int NOT NULL AUTO_INCREMENT,
  `rece_id` int DEFAULT NULL,
  `producto_id` int DEFAULT NULL,
  `cantidad` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `monto_ri` decimal(10,2) DEFAULT NULL,
  `precio_compra` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_insumo`) USING BTREE,
  KEY `producto_id` (`producto_id`) USING BTREE,
  CONSTRAINT `recep_insumos_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`producto_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla softdev.recep_insumos: ~1 rows (aproximadamente)
INSERT INTO `recep_insumos` (`id_insumo`, `rece_id`, `producto_id`, `cantidad`, `fecha`, `monto_ri`, `precio_compra`) VALUES
	(6, 15, 10, '1', '2024-10-01 10:59:00', 40.00, NULL);

-- Volcando estructura para tabla softdev.rol
CREATE TABLE IF NOT EXISTS `rol` (
  `rol_id` int NOT NULL AUTO_INCREMENT,
  `rol_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rol_fregistro` date DEFAULT NULL,
  `rol_estado` enum('ACTIVO','INACTIVO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`rol_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla softdev.rol: ~5 rows (aproximadamente)
INSERT INTO `rol` (`rol_id`, `rol_nombre`, `rol_fregistro`, `rol_estado`) VALUES
	(1, 'Administrador', '2022-02-13', 'ACTIVO'),
	(2, 'Recepcionista', '2022-02-13', 'ACTIVO'),
	(3, 'Vendedor', '2022-03-02', 'ACTIVO'),
	(4, 'Tecnico', '2024-01-22', 'ACTIVO'),
	(5, 'Almacenero', '2024-02-14', 'ACTIVO');

-- Volcando estructura para tabla softdev.servicio
CREATE TABLE IF NOT EXISTS `servicio` (
  `servicio_id` int NOT NULL AUTO_INCREMENT,
  `rece_id` int NOT NULL,
  `servicio_monto` decimal(10,2) DEFAULT NULL,
  `servicio_concepto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `servicio_responsable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `servicio_comentario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `servicio_fregistro` date DEFAULT NULL,
  `servicio_entrega` enum('ENTREGADO','REPARADO','NO REPARADO','EN REPARACION') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `servicio_estado` enum('ACTIVO','INACTIVO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado_caja` enum('ABIERTO','CERRADO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `servicio_obser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `servicio_modelo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fpago_id` int DEFAULT NULL,
  `monto_efectivo` decimal(10,2) DEFAULT NULL,
  `cod_operacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `monto_tarjeta` decimal(10,2) DEFAULT NULL,
  `caja_id` int DEFAULT NULL,
  `tecnico_servi` int DEFAULT NULL,
  PRIMARY KEY (`servicio_id`) USING BTREE,
  KEY `rece_id` (`rece_id`) USING BTREE,
  KEY `fpago_id` (`fpago_id`) USING BTREE,
  KEY `caja_id` (`caja_id`) USING BTREE,
  CONSTRAINT `servicio_ibfk_1` FOREIGN KEY (`rece_id`) REFERENCES `recepcion` (`rece_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `servicio_ibfk_2` FOREIGN KEY (`fpago_id`) REFERENCES `forma_pago` (`fpago_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `servicio_ibfk_3` FOREIGN KEY (`caja_id`) REFERENCES `caja` (`caja_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla softdev.servicio: ~2 rows (aproximadamente)
INSERT INTO `servicio` (`servicio_id`, `rece_id`, `servicio_monto`, `servicio_concepto`, `servicio_responsable`, `servicio_comentario`, `servicio_fregistro`, `servicio_entrega`, `servicio_estado`, `estado_caja`, `servicio_obser`, `servicio_modelo`, `fpago_id`, `monto_efectivo`, `cod_operacion`, `monto_tarjeta`, `caja_id`, `tecnico_servi`) VALUES
	(5, 16, 35.00, 'SIN OBSERVACIONES', 'roman', 'TERMINADO EL FORMATEO', '2024-10-01', 'ENTREGADO', 'ACTIVO', 'CERRADO', '', '', 5, 35.00, '', 0.00, 12, 16),
	(6, 15, 75.00, 'SOLO MANTENIMIENTO', 'roman', 'DELICADO', '2024-10-01', 'ENTREGADO', 'ACTIVO', 'CERRADO', '', '', 1, 75.00, '', 0.00, 12, 16);

-- Volcando estructura para tabla softdev.td_menu_detalle
CREATE TABLE IF NOT EXISTS `td_menu_detalle` (
  `mend_id` int NOT NULL AUTO_INCREMENT,
  `rol_id` int DEFAULT NULL,
  `men_id` int DEFAULT NULL,
  `mend_permi` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT 'No',
  `fech_crea` datetime DEFAULT CURRENT_TIMESTAMP,
  `estado` int DEFAULT '1',
  `men_crear` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT 'No',
  `men_editar` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT 'No',
  `men_eliminar` varchar(2) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT 'No',
  `vista_inicio` int DEFAULT '0',
  PRIMARY KEY (`mend_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=382 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla softdev.td_menu_detalle: ~137 rows (aproximadamente)
INSERT INTO `td_menu_detalle` (`mend_id`, `rol_id`, `men_id`, `mend_permi`, `fech_crea`, `estado`, `men_crear`, `men_editar`, `men_eliminar`, `vista_inicio`) VALUES
	(229, 1, 1, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(230, 1, 2, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(231, 1, 3, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(232, 1, 4, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(233, 1, 5, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(234, 1, 6, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(235, 1, 7, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(236, 1, 8, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(237, 1, 9, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(238, 1, 10, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(239, 1, 11, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(240, 1, 12, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(241, 1, 13, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(242, 1, 14, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(243, 1, 15, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 1),
	(244, 1, 16, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(245, 1, 17, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(246, 1, 18, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(247, 1, 19, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(248, 1, 20, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(249, 1, 21, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(250, 1, 22, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(251, 1, 23, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(252, 1, 24, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(253, 1, 25, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(254, 1, 26, 'Si', '2024-08-02 23:58:57', 1, 'No', 'No', 'No', 0),
	(255, 2, 1, 'Si', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 1),
	(256, 2, 2, 'Si', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(257, 2, 3, 'Si', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(258, 2, 4, 'Si', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(259, 2, 5, 'No', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(260, 2, 6, 'No', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(261, 2, 7, 'No', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(262, 2, 8, 'No', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(263, 2, 9, 'No', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(264, 2, 10, 'No', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(265, 2, 11, 'No', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(266, 2, 12, 'No', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(267, 2, 13, 'No', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(268, 2, 14, 'No', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(269, 2, 15, 'No', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(270, 2, 16, 'No', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(271, 2, 17, 'No', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(272, 2, 18, 'No', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(273, 2, 19, 'No', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(274, 2, 20, 'No', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(275, 2, 21, 'No', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(276, 2, 22, 'No', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(277, 2, 23, 'No', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(278, 2, 24, 'No', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(279, 2, 25, 'No', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(280, 2, 26, 'No', '2024-08-07 00:25:31', 1, 'No', 'No', 'No', 0),
	(286, 3, 1, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(287, 3, 2, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(288, 3, 3, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(289, 3, 4, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(290, 3, 5, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(291, 3, 6, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(292, 3, 7, 'Si', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 1),
	(293, 3, 8, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(294, 3, 9, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(295, 3, 10, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(296, 3, 11, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(297, 3, 12, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(298, 3, 13, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(299, 3, 14, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(300, 3, 15, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(301, 3, 16, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(302, 3, 17, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(303, 3, 18, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(304, 3, 19, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(305, 3, 20, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(306, 3, 21, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(307, 3, 22, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(308, 3, 23, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(309, 3, 24, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(310, 3, 25, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(311, 3, 26, 'No', '2024-08-07 00:25:39', 1, 'No', 'No', 'No', 0),
	(317, 4, 1, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(318, 4, 2, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(319, 4, 3, 'Si', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 1),
	(320, 4, 4, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(321, 4, 5, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(322, 4, 6, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(323, 4, 7, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(324, 4, 8, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(325, 4, 9, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(326, 4, 10, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(327, 4, 11, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(328, 4, 12, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(329, 4, 13, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(330, 4, 14, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(331, 4, 15, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(332, 4, 16, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(333, 4, 17, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(334, 4, 18, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(335, 4, 19, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(336, 4, 20, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(337, 4, 21, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(338, 4, 22, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(339, 4, 23, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(340, 4, 24, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(341, 4, 25, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(342, 4, 26, 'No', '2024-08-07 00:25:54', 1, 'No', 'No', 'No', 0),
	(348, 5, 1, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(349, 5, 2, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(350, 5, 3, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(351, 5, 4, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(352, 5, 5, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(353, 5, 6, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(354, 5, 7, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(355, 5, 8, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(356, 5, 9, 'Si', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 1),
	(357, 5, 10, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(358, 5, 11, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(359, 5, 12, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(360, 5, 13, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(361, 5, 14, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(362, 5, 15, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(363, 5, 16, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(364, 5, 17, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(365, 5, 18, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(366, 5, 19, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(367, 5, 20, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(368, 5, 21, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(369, 5, 22, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(370, 5, 23, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(371, 5, 24, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(372, 5, 25, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(373, 5, 26, 'No', '2024-08-07 00:26:17', 1, 'No', 'No', 'No', 0),
	(374, 1, 27, 'Si', '2024-09-18 00:56:13', 1, 'No', 'No', 'No', 0),
	(375, 3, 27, 'No', '2024-09-19 01:20:23', 1, 'No', 'No', 'No', 0),
	(376, 4, 27, 'No', '2024-09-19 01:33:41', 1, 'No', 'No', 'No', 0),
	(377, 1, 28, 'Si', '2024-09-21 02:30:32', 1, 'No', 'No', 'No', 0),
	(378, 2, 27, 'No', '2024-09-21 02:31:25', 1, 'No', 'No', 'No', 0),
	(379, 2, 28, 'No', '2024-09-21 02:31:25', 1, 'No', 'No', 'No', 0),
	(381, 4, 28, 'No', '2024-09-21 02:31:47', 1, 'No', 'No', 'No', 0);

-- Volcando estructura para tabla softdev.unidadmedida
CREATE TABLE IF NOT EXISTS `unidadmedida` (
  `unidad_id` int NOT NULL AUTO_INCREMENT,
  `unidad_descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `unidad_abrevia` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `unidad_estado` enum('ACTIVO','INACTIVO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`unidad_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla softdev.unidadmedida: ~5 rows (aproximadamente)
INSERT INTO `unidadmedida` (`unidad_id`, `unidad_descripcion`, `unidad_abrevia`, `unidad_estado`) VALUES
	(1, 'Caja', 'CJA', 'ACTIVO'),
	(2, 'Saco', 'Sco', 'ACTIVO'),
	(3, 'Bolsa', 'Bl', 'ACTIVO'),
	(4, 'PIEZAS', 'PZ', 'ACTIVO'),
	(5, 'wfqwf', 'qwf', 'ACTIVO'),
	(6, 'Unidad', 'Uni', 'ACTIVO');

-- Volcando estructura para tabla softdev.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `usu_id` int NOT NULL AUTO_INCREMENT,
  `usu_nombre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `usu_contrasena` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `usu_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `rol_id` int DEFAULT NULL,
  `usu_foto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `usu_estado` enum('ACTIVO','INACTIVO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`usu_id`) USING BTREE,
  KEY `rol_id` (`rol_id`) USING BTREE,
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`rol_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla softdev.usuario: ~4 rows (aproximadamente)
INSERT INTO `usuario` (`usu_id`, `usu_nombre`, `usu_contrasena`, `usu_email`, `rol_id`, `usu_foto`, `usu_estado`) VALUES
	(1, 'admin', '$2y$12$C.1yXkkqqs45tHKfUJC4UuOfpRhB5aEQjQkYNVlnbIH/GXCUbeawi', 'Administrador', 1, 'controller/usuario/foto/IMG132202214564.jpg', 'ACTIVO'),
	(14, 'juan', '$2y$12$oNxQiZuBFGd2BTHridTNrOKTWoNopaLwn6qV/Crf9ZaSPbBkW36Dq', 'juan', 4, 'controller/usuario/foto/default.png', 'INACTIVO'),
	(15, 'tecnico', '$2y$12$pxt1cT9Oj3VO2X4nkSZuhuHrP4pUYSYZsadQAePQlSyYnDWs0tmpi', 'Tecnico', 4, 'controller/usuario/foto/default.png', 'ACTIVO'),
	(16, 'roman', '$2y$12$Od5.ACLnmVYN3bo7LjgN/.yMkklWofNMXKP43f7EYHpia7H3JS7AC', 'Roman Acero', 1, 'controller/usuario/foto/default.png', 'ACTIVO');

-- Volcando estructura para tabla softdev.venta
CREATE TABLE IF NOT EXISTS `venta` (
  `venta_id` int NOT NULL AUTO_INCREMENT,
  `cliente_id` int DEFAULT NULL,
  `venta_comprobante` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `venta_serie` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `venta_num_comprobante` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `venta_total` decimal(10,2) DEFAULT NULL,
  `venta_impuesto` decimal(10,2) DEFAULT NULL,
  `venta_fregistro` date DEFAULT NULL,
  `venta_hora` time DEFAULT NULL,
  `venta_estado` enum('REGISTRADA','PAGADA','ANULADA') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `compro_id` int DEFAULT NULL,
  `venta_porcentaje` decimal(10,2) DEFAULT NULL,
  `usu_id` int DEFAULT NULL,
  `fpago_id` int DEFAULT NULL,
  `observacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `estado_caja` enum('ABIERTO','CERRADO') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `monto_efectivo` decimal(10,2) DEFAULT NULL,
  `cod_operacion` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `monto_tarjeta` decimal(10,2) DEFAULT NULL,
  `caja_id` int DEFAULT NULL,
  `venta_descuento` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`venta_id`) USING BTREE,
  KEY `cliente_id` (`cliente_id`) USING BTREE,
  KEY `compro_id` (`compro_id`) USING BTREE,
  KEY `usu_id` (`usu_id`) USING BTREE,
  KEY `fpago_id` (`fpago_id`) USING BTREE,
  KEY `caja_id` (`caja_id`) USING BTREE,
  CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`cliente_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`compro_id`) REFERENCES `comprobante` (`compro_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `venta_ibfk_3` FOREIGN KEY (`usu_id`) REFERENCES `usuario` (`usu_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `venta_ibfk_4` FOREIGN KEY (`fpago_id`) REFERENCES `forma_pago` (`fpago_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `venta_ibfk_5` FOREIGN KEY (`caja_id`) REFERENCES `caja` (`caja_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla softdev.venta: ~2 rows (aproximadamente)
INSERT INTO `venta` (`venta_id`, `cliente_id`, `venta_comprobante`, `venta_serie`, `venta_num_comprobante`, `venta_total`, `venta_impuesto`, `venta_fregistro`, `venta_hora`, `venta_estado`, `compro_id`, `venta_porcentaje`, `usu_id`, `fpago_id`, `observacion`, `estado_caja`, `monto_efectivo`, `cod_operacion`, `monto_tarjeta`, `caja_id`, `venta_descuento`) VALUES
	(7, 3, 'TICKET', '0001', '00001', 410.00, 0.00, '2024-09-30', '14:20:28', 'ANULADA', 3, 0.00, 1, 3, '', 'CERRADO', 0.00, '112233', 410.00, 11, 10.00),
	(8, 3, 'TICKET', '0001', '00002', 115.00, 0.00, '2024-10-01', '11:04:49', 'PAGADA', 3, 0.00, 16, 1, 'S/O', 'CERRADO', 115.00, '', 0.00, 12, 5.00);

-- Volcando estructura para vista softdev.view_listar_recepcion
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `view_listar_recepcion` (
	`rece_id` INT(10) NOT NULL,
	`referencia` VARCHAR(17) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`cliente_id` INT(10) NULL,
	`cliente_nombres` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`motivo` TEXT NULL COLLATE 'latin1_swedish_ci',
	`rece_caracteristicas` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`motivo_id` INT(10) NULL,
	`motivo_descripcion` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`rece_monto` DECIMAL(10,2) NULL,
	`rece_fregistro` DATE NULL,
	`rece_estado` ENUM('EN REPARACION','REPARADO','ENTREGADO','NO REPARADO') NULL COLLATE 'latin1_swedish_ci',
	`rece_estatus` ENUM('ACTIVO','INACTIVO') NULL COLLATE 'latin1_swedish_ci',
	`rece_equipo` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`rece_concepto` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`rece_adelanto` DECIMAL(10,2) NULL,
	`rece_debe` DECIMAL(10,2) NULL,
	`rece_accesorios` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`rece_fentrega` DATE NULL,
	`marca_id` INT(10) NULL,
	`marca_descripcion` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`rece_serie` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`enciende` VARCHAR(3) NULL COLLATE 'latin1_swedish_ci',
	`tactil` VARCHAR(3) NULL COLLATE 'latin1_swedish_ci',
	`imagen` VARCHAR(3) NULL COLLATE 'latin1_swedish_ci',
	`vibra` VARCHAR(3) NULL COLLATE 'latin1_swedish_ci',
	`cobertura` VARCHAR(3) NULL COLLATE 'latin1_swedish_ci',
	`sensor` VARCHAR(3) NULL COLLATE 'latin1_swedish_ci',
	`carga` VARCHAR(3) NULL COLLATE 'latin1_swedish_ci',
	`bluetoo` VARCHAR(3) NULL COLLATE 'latin1_swedish_ci',
	`wifi` VARCHAR(3) NULL COLLATE 'latin1_swedish_ci',
	`huella` VARCHAR(3) NULL COLLATE 'latin1_swedish_ci',
	`home` VARCHAR(3) NULL COLLATE 'latin1_swedish_ci',
	`lateral` VARCHAR(3) NULL COLLATE 'latin1_swedish_ci',
	`camara` VARCHAR(3) NULL COLLATE 'latin1_swedish_ci',
	`bateria` VARCHAR(3) NULL COLLATE 'latin1_swedish_ci',
	`auricular` VARCHAR(3) NULL COLLATE 'latin1_swedish_ci',
	`micro` VARCHAR(3) NULL COLLATE 'latin1_swedish_ci',
	`face` VARCHAR(3) NULL COLLATE 'latin1_swedish_ci',
	`tornillo` VARCHAR(3) NULL COLLATE 'latin1_swedish_ci',
	`rece_cod` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`cliente_celular` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`tecnico` INT(10) NULL,
	`usuario_registrador` INT(10) NULL
) ENGINE=MyISAM;

-- Volcando estructura para vista softdev.view_listar_recepcion_en_servicio
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `view_listar_recepcion_en_servicio` (
	`rece_id` INT(10) NOT NULL,
	`referencia` VARCHAR(17) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`cliente` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`modelo` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`concepto` TEXT NULL COLLATE 'latin1_swedish_ci',
	`monto` DECIMAL(10,2) NULL,
	`fecha` DATE NULL,
	`entrega` ENUM('EN REPARACION','REPARADO','ENTREGADO','NO REPARADO') NULL COLLATE 'latin1_swedish_ci',
	`adelanto` DECIMAL(10,2) NULL,
	`debe` DECIMAL(10,2) NULL,
	`rece_fentrega` DATE NULL,
	`diagnostico_tecn` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`nombre_tecnico` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`idtecnico` INT(10) NULL
) ENGINE=MyISAM;

-- Volcando estructura para vista softdev.view_listar_servicio_rece
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `view_listar_servicio_rece` (
	`servicio_id` INT(10) NOT NULL,
	`rece_id` INT(10) NOT NULL,
	`cliente_id` INT(10) NULL,
	`cliente_nombres` VARCHAR(255) NULL COLLATE 'latin1_swedish_ci',
	`concepto` TEXT NULL COLLATE 'latin1_swedish_ci',
	`rece_monto` DECIMAL(10,2) NULL,
	`rece_estado` ENUM('EN REPARACION','REPARADO','ENTREGADO','NO REPARADO') NULL COLLATE 'latin1_swedish_ci',
	`servicio_monto` DECIMAL(10,2) NULL,
	`servicio_concepto` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`servicio_responsable` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`servicio_comentario` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`servicio_entrega` ENUM('ENTREGADO','REPARADO','NO REPARADO','EN REPARACION') NULL COLLATE 'utf8mb4_general_ci',
	`servicio_fregistro` DATE NULL,
	`servicio_estado` ENUM('ACTIVO','INACTIVO') NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Volcando estructura para vista softdev.view_listar_usuario
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `view_listar_usuario` (
	`usu_id` INT(10) NOT NULL,
	`usu_nombre` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`usu_contrasena` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`rol_id` INT(10) NULL,
	`usu_estado` ENUM('ACTIVO','INACTIVO') NULL COLLATE 'utf8mb4_general_ci',
	`usu_email` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`usu_foto` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci',
	`rol_nombre` VARCHAR(255) NULL COLLATE 'utf8mb4_general_ci'
) ENGINE=MyISAM;

-- Volcando estructura para procedimiento softdev.SP_ACTIVAR_COTIZACION
DELIMITER //
CREATE PROCEDURE `SP_ACTIVAR_COTIZACION`(IN ID INT,IN ESTADO VARCHAR(30))
BEGIN
DECLARE CANTIDAD INT;
DECLARE DETALLEID INT;

UPDATE cotizacion set
coti_estado=ESTADO
where coti_id=ID;

SET @CANTIDAD:=(SELECT COUNT(*) FROM cotizacion_detalle WHERE coti_detalle_estado= 'INACTIVO' AND coti_id=ID);
	WHILE @CANTIDAD > 0 DO

	SET @DETALLEID:=(SELECT coti_detalle_id FROM cotizacion_detalle WHERE coti_detalle_estado= 'INACTIVO' AND coti_id=ID LIMIT 1  );


	
	UPDATE cotizacion_detalle SET 
	coti_detalle_estado= ESTADO
	WHERE coti_detalle_id=@DETALLEID;
	SET @CANTIDAD:= @CANTIDAD - 1;

	END WHILE;
END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_ANULAR_COTIZACION
DELIMITER //
CREATE PROCEDURE `SP_ANULAR_COTIZACION`(IN ID INT,IN ESTADO VARCHAR(30))
BEGIN
DECLARE CANTIDAD INT;
DECLARE DETALLEID INT;

UPDATE cotizacion set
coti_estado=ESTADO
where coti_id=ID;

SET @CANTIDAD:=(SELECT COUNT(*) FROM cotizacion_detalle WHERE coti_detalle_estado= 'ACTIVO' AND coti_id=ID);
	WHILE @CANTIDAD > 0 DO

	SET @DETALLEID:=(SELECT coti_detalle_id FROM cotizacion_detalle WHERE coti_detalle_estado= 'ACTIVO' AND coti_id=ID LIMIT 1  );


	
	UPDATE cotizacion_detalle SET 
	coti_detalle_estado= ESTADO
	WHERE coti_detalle_id=@DETALLEID;
	SET @CANTIDAD:= @CANTIDAD - 1;

	END WHILE;
END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_ANULAR_VENTA
DELIMITER //
CREATE PROCEDURE `SP_ANULAR_VENTA`(IN ID INT,IN ESTADO VARCHAR(30))
BEGIN
DECLARE CANTIDAD INT;
DECLARE IDPRODUCTO INT;
DECLARE STOCKACTUAL INT;
DECLARE DETALLEID INT;
DECLARE P_IMEI VARCHAR(100);

UPDATE venta set
venta_estado=ESTADO
where venta_id=ID;
SET @CANTIDAD:=(SELECT COUNT(*) FROM detalle_venta WHERE vdetalle_estado= 'VENDIDO' AND venta_id=ID);
	WHILE @CANTIDAD > 0 DO
	
	SET @IDPRODUCTO:=(SELECT producto_id FROM detalle_venta WHERE vdetalle_estado= 'VENDIDO' AND venta_id=ID LIMIT 1 );
	SET @DETALLEID:=(SELECT vdetalle_id FROM detalle_venta WHERE vdetalle_estado= 'VENDIDO' AND venta_id=ID LIMIT 1  );
	SET @STOCKACTUAL:=(SELECT producto_stock FROM producto WHERE producto_id=@IDPRODUCTO);
	
 -- SET @P_IMEI:=(SELECT v_imei FROM detalle_venta WHERE producto_id=@IDPRODUCTO );
 SET @P_IMEI := (SELECT GROUP_CONCAT(v_imei) FROM detalle_venta WHERE producto_id = @IDPRODUCTO);
	
	UPDATE producto SET
	producto_stock=@STOCKACTUAL + (SELECT vdetalle_cantidad FROM detalle_venta WHERE vdetalle_estado= 'VENDIDO' AND venta_id=ID LIMIT 1 )
	WHERE producto_id= @IDPRODUCTO;
	
	
	-- Actualizar el detalle de venta
	UPDATE detalle_venta SET 
	vdetalle_estado= ESTADO
	WHERE vdetalle_id=@DETALLEID;
	

  -- Actualizar el kardex
	UPDATE kardex SET 
	kardex_tipo=ESTADO,
	producto_id = @IDPRODUCTO
	WHERE vdetalle_id=@DETALLEID;
	
	
	/*ACTUALIZAR EL IMEI SI SE VENDIO*/
UPDATE producto_detalle SET
	vendido='No'
	WHERE producto_id = @IDPRODUCTO AND FIND_IN_SET(imei, @P_IMEI) > 0;
-- where producto_id= @IDPRODUCTO and imei = @P_IMEI;
	
SET @CANTIDAD:= @CANTIDAD - 1;

	END WHILE;
END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_AUMENTAR_STOCK
DELIMITER //
CREATE PROCEDURE `SP_AUMENTAR_STOCK`(IN IDPRODUCTO INT, IN CANTIDAAUMENTO VARCHAR(100),IN SUMA VARCHAR(100))
BEGIN
UPDATE producto SET 
producto_stock = SUMA,
producto_aumento = CANTIDAAUMENTO
where producto_id = IDPRODUCTO;

set @preciocompra = (select producto_pcompra from producto where producto_id =IDPRODUCTO);
set @stock = (select producto_stock from producto where producto_id =IDPRODUCTO);

insert into kardex (kardex_fecha,kardex_tipo,kardex_ingreso,kardex_p_ingreso,kardex_total,producto_id,kardex_precio_general) 
VALUES (CURDATE(),'INGRESO',CANTIDAAUMENTO,@preciocompra,@stock,IDPRODUCTO,@preciocompra);

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_BUSCAR_EQUIPO_DNI
DELIMITER //
CREATE PROCEDURE `SP_BUSCAR_EQUIPO_DNI`(IN DNI VARCHAR(100))
SELECT
	 r.rece_id   as receid, 
	  MAX(r.cliente_id)   as cliente_id,
		concat( ' R-000', r.rece_id ) as cliente_dni,  
	  MAX(c.cliente_dni)   as cliente_dni2, 
	  MAX(c.cliente_nombres)   as cliente_nombres, 
	  MAX(re.equipo)   as rece_equipo,
	-- GROUP_CONCAT(CONCAT('  ', re.equipo, ' '     AS equipo,
	  MAX(r.rece_concepto)   as rece_concepto,
	  MAX(r.rece_fregistro)   as rece_fregistro, 
	  MAX(r.rece_estado)   as rece_estado
FROM
	recepcion r
	INNER JOIN
	cliente c
	ON 
		r.cliente_id = c.cliente_id
		INNER JOIN recep_equipo re ON r.rece_id = re.rece_id
		where c.cliente_dni = DNI 
		GROUP BY r.rece_id
		ORDER BY r.rece_fregistro DESC//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_BUSCAR_MOV_IMEI
DELIMITER //
CREATE PROCEDURE `SP_BUSCAR_MOV_IMEI`(IN P_IMEI VARCHAR(100))
BEGIN
SELECT 'Ingreso' AS tipo, DATE_FORMAT(pd.fecha, '%d/%m/%Y') AS fecha, '1.00' as cantidad, NULL as nombre_u, NULL as compro
FROM producto_detalle pd
WHERE pd.imei COLLATE utf8mb4_general_ci = P_IMEI
UNION ALL
SELECT 'Venta' AS tipo, dv.vdetalle_fecha  as fecha, dv.vdetalle_cantidad as cantidad, u.usu_nombre as nombre_u, (SELECT k.venta_comprobante FROM kardex k WHERE k.imei = P_IMEI and k.kardex_tipo = 'SALIDA') as compro
FROM detalle_venta dv 
INNER JOIN venta v ON dv.venta_id = v.venta_id
INNER JOIN usuario u ON v.usu_id = u.usu_id
WHERE dv.v_imei = P_IMEI  and
	 dv.v_imei IS NOT NULL
    AND dv.v_imei <> ''
UNION ALL
SELECT
	'Reparación' AS tipo,
	DATE_FORMAT( re.fecha, '%d/%m/%Y' ) AS fecha,
	'1.00' AS cantidad,
	u.usu_nombre AS nombre_u,
	CONCAT('R000',re.rece_id)  AS compro 
FROM
	recep_equipo re 
	INNER JOIN recepcion r ON re.rece_id = r.rece_id
	INNER JOIN usuario u ON r.usuario_registrador = u.usu_id
WHERE re.serie = P_IMEI;
END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_BUSCAR_VENTAS_CLIENTE_INICIO
DELIMITER //
CREATE PROCEDURE `SP_BUSCAR_VENTAS_CLIENTE_INICIO`(IN p_dni VARCHAR(20))
BEGIN

DECLARE idcliente INT;

SET @idcliente:=(SELECT cliente_id FROM cliente where cliente_dni = p_dni );


SELECT
	venta.venta_id, 
	MAX(cliente.cliente_nombres) as cliente_nombres, 
	MAX(venta.venta_comprobante) as venta_comprobante, 
	CONCAT_WS(' - ',venta.venta_serie,venta.venta_num_comprobante) AS comprobante, 
	MAX(venta.venta_total) as venta_total, 
	 
	DATE_FORMAT(venta.venta_fregistro, '%d/%m/%Y') as venta_fregistro, 
	MAX(venta.venta_estado) as venta_estado, 
	MAX(venta.venta_serie) as venta_serie, 
	MAX(venta.venta_num_comprobante) as venta_num_comprobante, 
	MAX(forma_pago.fpago_descripcion) as fpago_descripcion,
	MAX(venta.venta_impuesto) as venta_impuesto,

	GROUP_CONCAT(CONCAT('  ' , producto.producto_nombre  )) as equipo
	-- GROUP_CONCAT(CONCAT('  ' , producto.producto_nombre ,  '   (  ',  recep_equipo.monto , '  ) ' )) as equipos,


	
FROM
	venta
	INNER JOIN
	cliente
	ON 
		venta.cliente_id = cliente.cliente_id
	INNER JOIN
	comprobante
	ON 
		venta.compro_id = comprobante.compro_id

	INNER JOIN
	forma_pago
	ON 
		venta.fpago_id = forma_pago.fpago_id
	INNER JOIN 
	detalle_venta
	ON
	detalle_venta.venta_id = venta.venta_id
	INNER JOIN producto 
	ON
	detalle_venta.producto_id = producto.producto_id
		WHERE venta.cliente_id = @idcliente
GROUP BY venta.venta_id
		ORDER BY venta_id DESC;


END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_CALCULO_MONTOS_RECEP_EQUIPOS
DELIMITER //
CREATE PROCEDURE `SP_CALCULO_MONTOS_RECEP_EQUIPOS`(IN RECEID INT)
SELECT
	SUM( monto ) AS monto_su,
	SUM( abono ) AS abono_s,
	(SUM( monto ) + (SELECT IFNULL(SUM(monto_ri),0) FROM recep_insumos WHERE rece_id = RECEID ) - SUM( abono )) AS resta_s ,
	(SELECT IFNULL(SUM(monto_ri),0) FROM recep_insumos WHERE rece_id = RECEID ) as suma_insumo,
	(SUM( monto ) + (SELECT IFNULL(SUM(monto_ri),0) FROM recep_insumos WHERE rece_id = RECEID )) as suma_total_serv
FROM
	recep_equipo 
WHERE
	rece_id = RECEID//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_CAMBIAR_MONTOS_EQUIPOS_SERVICIO
DELIMITER //
CREATE PROCEDURE `SP_CAMBIAR_MONTOS_EQUIPOS_SERVICIO`(IN IDEQUIP INT, IN MONTOEQUI DECIMAL(10,2), IN ABONOEQUI DECIMAL(10,2), IN RECEPID INT)
BEGIN

/*ACTUALIZAMOS MONTO Y ABONO DE LOS EQUIPOS*/
UPDATE recep_equipo SET
monto = MONTOEQUI,
abono = ABONOEQUI
WHERE id_equipo = IDEQUIP;



set @montonuevo = (select SUM(monto) from recep_equipo where rece_id =RECEPID);
set @abononuevo = (select SUM(abono) from recep_equipo where rece_id =RECEPID);
set @pendientenuevo = ( @montonuevo - @abononuevo );




/*ACTUALIZAMOS MONTO ABONO Y DEBE -  DE LA RECEPCION*/
UPDATE recepcion SET
rece_monto = @montonuevo,
rece_adelanto = @abononuevo,
rece_debe = @pendientenuevo
WHERE rece_id = RECEPID;


END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.sp_correlativo
DELIMITER //
CREATE PROCEDURE `sp_correlativo`()
begin
	declare siguiente_codigo int;
	declare producto_codigo int;
    set @siguiente_codigo = (Select ifnull(max(convert(producto_codigo, signed integer)), 0) from producto) + 1;
    set @producto_codigo = concat('P', LPAD( siguiente_codigo, 4, '0'));
		
		SELECT max(producto_codigo) =  @producto_codigo FROM producto;
end//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_DATOS_PERFIL_USUARIO
DELIMITER //
CREATE PROCEDURE `SP_DATOS_PERFIL_USUARIO`(IN ID INT)
SELECT
	usuario.usu_id, 
	usuario.usu_nombre, 
	usuario.usu_contrasena, 
	usuario.rol_id, 
	usuario.usu_estado, 
	usuario.usu_email, 
	usuario.usu_foto, 
	rol.rol_nombre
FROM
	usuario
	INNER JOIN
	rol
	ON 
		usuario.rol_id = rol.rol_id
	WHERE  usuario.usu_id = ID//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_DESHABILITAR_PERMISO
DELIMITER //
CREATE PROCEDURE `SP_DESHABILITAR_PERMISO`(IN p_mend_id INT)
BEGIN
	UPDATE td_menu_detalle 
	SET mend_permi = 'No'
	
	WHERE
		mend_id = p_mend_id;

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_DISMINUIR_STOCK
DELIMITER //
CREATE PROCEDURE `SP_DISMINUIR_STOCK`(IN IDPRODUCTO INT, IN CANTIDADISMINUIR VARCHAR(100),IN RESTA VARCHAR(100))
BEGIN
UPDATE producto SET 
producto_stock = RESTA,
producto_aumento = CANTIDADISMINUIR
where producto_id = IDPRODUCTO;

set @preciocompra = (select producto_pcompra from producto where producto_id =IDPRODUCTO);
set @stock = (select producto_stock from producto where producto_id =IDPRODUCTO);

insert into kardex (kardex_fecha, kardex_tipo, kardex_salida, kardex_p_salida, kardex_total, producto_id, kardex_precio_general) 
VALUES (CURDATE(),'SALIDA DIRECTA',CANTIDADISMINUIR,@preciocompra,@stock,IDPRODUCTO,@preciocompra);

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_EJECUTAR_INSERTAR_MENUS_DET
DELIMITER //
CREATE PROCEDURE `SP_EJECUTAR_INSERTAR_MENUS_DET`(IN xrol_id INT)
BEGIN
	DECLARE rolCount INT;

	SELECT COUNT(*) INTO rolCount FROM td_menu_detalle WHERE rol_id = xrol_id;
	
	IF rolCount = 0 THEN
		INSERT INTO td_menu_detalle(rol_id,men_id)
		SELECT xrol_id, men_id FROM menu WHERE estado=1;
	ELSE
		INSERT INTO td_menu_detalle(rol_id,men_id)
		SELECT xrol_id,men_id FROM menu WHERE estado=1 AND men_id NOT IN (SELECT men_id FROM td_menu_detalle WHERE rol_id = xrol_id);
	END IF;
	
	SELECT 
		md.mend_id,
		md.rol_id,
		md.mend_permi,
		m.men_id,
		m.men_vista,
		m.men_icon,
		m.men_ruta,
		md.men_crear,
		md.men_editar,
		md.men_eliminar,
		md.vista_inicio
	FROM td_menu_detalle md
	INNER JOIN menu m ON m.men_id = md.men_id
	WHERE 
	md.rol_id = xrol_id
	AND m.estado=1;
END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_ELIMINAR_EQUIPO_RECE
DELIMITER //
CREATE PROCEDURE `SP_ELIMINAR_EQUIPO_RECE`(IN ID_EQUI INT)
DELETE FROM recep_equipo
	WHERE id_equipo = ID_EQUI//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_ELIMINAR_IMEI
DELIMITER //
CREATE PROCEDURE `SP_ELIMINAR_IMEI`(IN ID_PRO INT, IN IMEI_E VARCHAR(100))
BEGIN
DELETE FROM producto_detalle
	WHERE producto_id = ID_PRO AND imei COLLATE utf8mb4_general_ci = IMEI_E;
	
	
	UPDATE producto SET
producto_stock = producto_stock - 1
WHERE producto_id = ID_PRO;


set @preciocompra = (select producto_pcompra from producto where producto_id =ID_PRO);
set @stock = (select producto_stock from producto where producto_id =ID_PRO);

insert into kardex (kardex_fecha, kardex_tipo, kardex_salida, kardex_p_salida, kardex_total, producto_id, kardex_precio_general, imei) 
VALUES (CURDATE(),'SALIDA DIRECTA',1,@preciocompra,@stock,ID_PRO,@preciocompra, IMEI_E);

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_ELIMINAR_INSUMOS_REPARACION
DELIMITER //
CREATE PROCEDURE `SP_ELIMINAR_INSUMOS_REPARACION`(IN IDINSUMOS INT,  IN CANTD VARCHAR(50), IN IDPRODUC INT, IN RECEID INT, IN IDUSUA INT)
BEGIN
DECLARE NOMUSUARIO VARCHAR(200);


SET @NOMUSUARIO:=(select usu_nombre from usuario where usu_id = IDUSUA );


/*ELIMINAMOS EL INSUMO */
DELETE FROM recep_insumos 
where id_insumo = IDINSUMOS;



/* REGRESA EL STOCK*/

UPDATE   producto SET
producto_stock = producto_stock + CANTD
WHERE producto_id =  IDPRODUC;


/* INSERTAR EN KARDEX*/
set @preciocompra = (select producto_pcompra from producto where producto_id =IDPRODUC);
set @stock = (select producto_stock from producto where producto_id =IDPRODUC);

insert into kardex (kardex_fecha,kardex_tipo,kardex_ingreso,kardex_p_ingreso,kardex_total,producto_id,kardex_precio_general, venta_comprobante, tecnico) 
VALUES (CURDATE(),'DEVOLUCION INSUMO',CANTD,@preciocompra,@stock,IDPRODUC,@preciocompra, CONCAT('R-000',RECEID), @NOMUSUARIO);



END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_ELIMINAR_MARCA
DELIMITER //
CREATE PROCEDURE `SP_ELIMINAR_MARCA`(IN ID INT)
DELETE FROM marca WHERE marca_id = ID//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_ELIMINAR_NOTAS
DELIMITER //
CREATE PROCEDURE `SP_ELIMINAR_NOTAS`(IN p_idnota INT)
BEGIN

DELETE FROM notas 
WHERE nota_id = p_idnota;

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_ELIMINAR_ROL_ESTADO
DELIMITER //
CREATE PROCEDURE `SP_ELIMINAR_ROL_ESTADO`(IN ID INT,IN ESTADO VARCHAR(30))
UPDATE rol set
rol_estado=ESTADO
where rol_id=ID//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_ELIMINAR_SERVICIO
DELIMITER //
CREATE PROCEDURE `SP_ELIMINAR_SERVICIO`(IN ID INT)
DELETE  FROM servicio 
where servicio_id=ID//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_ELIMINAR_UMEDIDA
DELIMITER //
CREATE PROCEDURE `SP_ELIMINAR_UMEDIDA`(IN ID INT)
DELETE FROM unidadmedida WHERE unidad_id = ID//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_ELIMINAR_USUARIO_ESTADO
DELIMITER //
CREATE PROCEDURE `SP_ELIMINAR_USUARIO_ESTADO`(IN ID INT,IN ESTADO VARCHAR(10))
UPDATE usuario set
usu_estado=ESTADO
where usu_id=ID//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_GRAFICO_SERVICIO
DELIMITER //
CREATE PROCEDURE `SP_GRAFICO_SERVICIO`(IN FINICIO DATE, IN FFIN DATE)
SELECT
COUNT(motivo.motivo_descripcion ) as cantidad,	
CONCAT_WS(' - ',motivo.motivo_descripcion,recepcion.rece_equipo) as tipos 
FROM
	recepcion
	INNER JOIN
	servicio
	ON 
		recepcion.rece_id = servicio.rece_id
	INNER JOIN
	motivo
	ON 
		recepcion.motivo_id = motivo.motivo_id
			WHERE servicio.servicio_fregistro BETWEEN FINICIO AND FFIN
	GROUP BY tipos//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_GRAFICO_VENTAS
DELIMITER //
CREATE PROCEDURE `SP_GRAFICO_VENTAS`(IN FINICIO DATE, IN FFIN DATE)
SELECT
	COUNT(venta.venta_id) as cant_ventas,
	SUM(venta.venta_total) as total_ventas
	
FROM
	venta
			WHERE venta.venta_fregistro BETWEEN FINICIO AND FFIN and venta.venta_estado <> 'ANULADA'//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_HABILITAR_PERMISO
DELIMITER //
CREATE PROCEDURE `SP_HABILITAR_PERMISO`(IN p_mend_id INT)
BEGIN
	UPDATE td_menu_detalle 
	SET mend_permi = 'Si'
	
	WHERE
		mend_id = p_mend_id;

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_INICIO
DELIMITER //
CREATE PROCEDURE `SP_INICIO`()
BEGIN
	DECLARE VENTA INT;
	DECLARE SERVICIO INT;
	SELECT COUNT(*) INTO VENTA FROM venta WHERE venta_estado='REGISTRADA';
	SELECT COUNT(*) INTO SERVICIO FROM servicio WHERE servicio_estado='ACTIVO';
	
	SELECT VENTA, SERVICIO;


END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_INSERTAR_EQUIPO_DIRECTO_MODIFICAR
DELIMITER //
CREATE PROCEDURE `SP_INSERTAR_EQUIPO_DIRECTO_MODIFICAR`(IN ID_RE INT, IN EQUI VARCHAR(150),IN SERI VARCHAR(150), IN MONT DECIMAL(10,2), IN ADELNT  DECIMAL(10,2), IN P_FALLA VARCHAR(200))
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM recep_equipo where rece_id = ID_RE AND serie COLLATE utf8mb4_general_ci= SERI );

if @CANTIDAD = 0 THEN
INSERT into recep_equipo (rece_id, equipo, serie, monto, abono, fecha, falla)values(ID_RE, EQUI,SERI, MONT, ADELNT, CURDATE(), P_FALLA);
SELECT 1;
ELSE
SELECT 2;
END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_INSERTAR_IMEI_AL_MODIFICAR
DELIMITER //
CREATE PROCEDURE `SP_INSERTAR_IMEI_AL_MODIFICAR`(IN ID_P INT, IN IMEI_R VARCHAR(100))
BEGIN

 -- Verificar si el IMEI ya está registrado
    IF EXISTS (SELECT 1 FROM producto_detalle WHERE imei COLLATE utf8mb4_general_ci = IMEI_R AND producto_id = ID_P AND vendido = 'Si') THEN
        -- Si existe, actualizamos los datos del producto detalle
        UPDATE producto_detalle SET
				vendido = 'No'
        WHERE producto_id = ID_P AND imei = IMEI_R;
    ELSE
        -- Si no existe, lo insertamos
        INSERT INTO producto_detalle (producto_id, imei, fecha, vendido) 
        VALUES (ID_P, IMEI_R, CURDATE(), 'No');
        
        -- También actualizamos el stock del producto
        UPDATE producto 
        SET producto_stock = producto_stock + 1
        WHERE producto_id = ID_P;
    END IF;

set @preciocompra = (select producto_pcompra from producto where producto_id =ID_P);
set @stock = (select producto_stock from producto where producto_id =ID_P);

insert into kardex (kardex_fecha,kardex_tipo,kardex_ingreso,kardex_p_ingreso,kardex_total,producto_id,kardex_precio_general, imei) 
VALUES (CURDATE(),'INGRESO',1,@preciocompra,@stock,ID_P,@preciocompra, IMEI_R);


END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_KARDEX_COD_PRODUCTO
DELIMITER //
CREATE PROCEDURE `SP_KARDEX_COD_PRODUCTO`(IN CODPRODUCTO INT)
SELECT
	kardex.kardex_id,
	CONCAT_WS('  ',kardex.producto_codigo,kardex.producto_nombre	) as producto, 
	kardex.kardex_fecha as fecha, 
	kardex.kardex_tipo as tipo, 
	kardex.kardex_ingreso as ingreso, 
	kardex.kardex_p_ingreso as precio_ingreso, 
	(kardex.kardex_ingreso * kardex.kardex_p_ingreso ) as total_ingreso,
	kardex.kardex_salida as salida, 
	kardex.kardex_p_salida as precio_salida, 
	(kardex.kardex_salida * kardex.kardex_p_salida ) as total_salida,
	kardex.kardex_total as total_actual, 
	 kardex_precio_general  as precio_total, 
	(kardex.kardex_total * kardex_precio_general  ) as total_total,
	kardex.producto_id, 
	 
	kardex.venta_comprobante
FROM
	kardex
	where producto_id = CODPRODUCTO and kardex_tipo in ('INICIAL','INGRESO','SALIDA', 'SALIDA DIRECTA', 'SALIDA INSUMOS', 'DEVOLUCION INSUMO')//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_KARDEX_NOMBRE_CODIGO
DELIMITER //
CREATE PROCEDURE `SP_KARDEX_NOMBRE_CODIGO`(IN NOMBRE VARCHAR(255))
SELECT
	kardex.kardex_id, 
	kardex.producto_id, 
  kardex.producto_nombre,
	kardex.kardex_p_ingreso, 
	SUM(kardex_ingreso) as ingresos,
	sum(kardex_salida) as salidas,
	(SUM(kardex_ingreso) - sum(kardex_salida) ) as saldo
FROM
	kardex
	where  kardex.producto_nombre like  CONCAT('%',NOMBRE,'%')//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_ANIO_GASTO
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_ANIO_GASTO`()
SELECT YEAR(gastos_fregistro) as anio FROM gastos
where gastos_estado='ACTIVO' 
GROUP BY YEAR(gastos_fregistro)//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_ANIO_SERVICIO
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_ANIO_SERVICIO`()
SELECT YEAR(servicio_fregistro) as anio FROM servicio
GROUP BY YEAR(servicio_fregistro)//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_CATEGORIA
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_CATEGORIA`()
SELECT
	categoria.categoria_id, 
	categoria.categoria_descripcion, 
	categoria.categoria_estado
FROM
	categoria
	WHERE categoria.categoria_estado  = 'ACTIVO' OR categoria.categoria_estado  = 'INACTIVO'//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_CLIENTE
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_CLIENTE`()
SELECT
	cliente.cliente_id, 
	cliente.cliente_nombres, 
	cliente.cliente_celular, 
	cliente.cliente_dni, 
	cliente.cliente_estado,
	cliente.cliente_direccion,
	cliente.cliente_ape_p,
	cliente.cliente_ape_m,
	cliente.cliente_correo,
	cliente.cliente_tipo_doc	
FROM
	cliente
		WHERE cliente.cliente_estado ='ACTIVO' OR cliente.cliente_estado = 'INACTIVO'
		ORDER BY cliente_id DESC//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_CLIENTE_VENTA
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_CLIENTE_VENTA`()
SELECT
	cliente.cliente_id, 
	cliente.cliente_nombres, 
	cliente.cliente_dni
FROM
	cliente
		WHERE cliente.cliente_estado ='ACTIVO'//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_COMPRAS_PRODUCTOS_IMEI
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_COMPRAS_PRODUCTOS_IMEI`()
BEGIN
SELECT
	DATE_FORMAT(p.producto_fregistro, '%d/%m/%Y') as fecha,
	p.producto_nombre ,
	pd.imei,
	c.cliente_nombres,
	p.producto_pcompra
FROM
	producto p 
	INNER JOIN cliente c ON p.cliente_id = c.cliente_id
	INNER JOIN producto_detalle pd 
	ON pd.producto_id = p.producto_id
	WHERE pd.vendido = 'No';
END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_COMPROBANTE
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_COMPROBANTE`()
SELECT
	comprobante.compro_id, 
	comprobante.compro_tipo, 
	comprobante.compro_serie, 
	comprobante.compro_numero, 
	comprobante.compro_estado
FROM
	comprobante
		WHERE comprobante.compro_estado = 'ACTIVO' OR comprobante.compro_estado  = 'INACTIVO'//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_COTIZACION
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_COTIZACION`(IN FINICIO DATE, IN FFIN DATE)
SELECT
	cotizacion.coti_id, 
	cotizacion.cliente_id, 
	cliente.cliente_nombres, 
	CONCAT_WS(' - ',cotizacion.coti_serie, cotizacion.coti_num_comprobante) AS cotizacion, 
	cotizacion.coti_total, 
	cotizacion.coti_fregistro, 
	cotizacion.usu_id, 
	usuario.usu_nombre, 
	cotizacion.coti_estado
FROM
	cotizacion
	INNER JOIN
	cliente
	ON 
		cotizacion.cliente_id = cliente.cliente_id
	INNER JOIN
	usuario
	ON 
		cotizacion.usu_id = usuario.usu_id
		WHERE cotizacion.coti_fregistro BETWEEN FINICIO AND FFIN
		ORDER BY coti_id DESC//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_DATA_CONFIGURACION
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_DATA_CONFIGURACION`()
SELECT
	c.confi_moneda, 
	c.confi_tipo_igv, 
	c.confi_igv, 
	c.confi_moneda1, 
	c.confi_moneda2,
	c.confi_nombre_sistema,
	c.config_foto
FROM
	configuracion AS c//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_DATOS_WIDGET
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_DATOS_WIDGET`(IN FINICIO DATE, IN FFIN DATE)
SELECT
	(select count(*) from venta where venta_estado='PAGADA' and venta_fregistro BETWEEN FINICIO AND FFIN)as ventas,
	(SELECT IFNULL(SUM(venta.venta_total),0) FROM venta WHERE venta_estado='PAGADA' and venta_fregistro BETWEEN FINICIO AND FFIN) as total_venta,
	(SELECT COUNT(*) FROM servicio WHERE servicio_fregistro BETWEEN FINICIO AND FFIN ) as servicio,
	(select IFNULL(SUM(servicio_monto),0) from servicio where servicio_fregistro BETWEEN FINICIO AND FFIN ) as total_servicio,
	(SELECT COUNT(*) FROM gastos where gastos_fregistro BETWEEN FINICIO AND FFIN) as gastos,
	(select IFNULL(SUM(gastos_monto),0) from gastos where gastos_fregistro BETWEEN FINICIO AND FFIN ) as total_gastos,
	(SELECT COUNT(*) FROM producto ) as productos//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_DATOS_WIDGET2
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_DATOS_WIDGET2`(IN FINICIO DATE, IN FFIN DATE)
SELECT
	COUNT(*),
	(SELECT COUNT(*) FROM servicio where servicio.servicio_fregistro BETWEEN FINICIO AND FFIN ) as servicio
FROM
	VENTA
	WHERE venta.venta_fregistro BETWEEN FINICIO AND FFIN//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_EMPRESA
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_EMPRESA`()
SELECT
	c.confi_id, 
	c.confi_razon_social, 
	c.confi_ruc, 
	c.confi_nombre_representante, 
	c.confi_direccion, 
	c.confi_celular, 
	c.confi_telefono, 
	c.confi_correo, 
	c.config_foto, 
	c.confi_estado,
	c.confi_url,
	c.confi_cnta01,
	c.confi_nro_cuenta01,
	c.confi_cnta02,
	c.confi_nro_cuenta02,
	c.confi_moneda,
	c.confi_codigo_pos,
	c.confi_tipo_igv, 
	c.confi_igv, 
	c.confi_moneda1, 
	c.confi_moneda2,
	c.confi_nombre_sistema,
	c.url_sistema,
	c.cod_pais
	
	
FROM
	configuracion as c//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_FORMA_PAGO
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_FORMA_PAGO`()
SELECT
	forma_pago.fpago_id, 
	forma_pago.fpago_descripcion, 
	forma_pago.fpago_estado
FROM
	forma_pago
	WHERE forma_pago.fpago_id <> '3'//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_GASTO
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_GASTO`()
SELECT
	gastos.gastos_id, 
	gastos.gastos_descripcion, 
	gastos.gastos_monto, 
	gastos.gastos_responsable, 
	gastos.gastos_fregistro, 
	gastos.gastos_estado,
	gastos.tipo_mov,
	gastos.estado_caja
FROM
	gastos
	WHERE gastos.gastos_estado ='ACTIVO' OR gastos.gastos_estado = 'INACTIVO'
	ORDER BY gastos_id DESC//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_INSUMOS_DETALLE_REPARACION
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_INSUMOS_DETALLE_REPARACION`(IN IDRECEP INT)
BEGIN
	SELECT
		ri.id_insumo,
		p.producto_nombre,
		ri.cantidad,
		ri.rece_id,
		ri.producto_id,
		ri.fecha,
		ri.monto_ri
	FROM
		recep_insumos ri
		INNER JOIN producto p ON ri.producto_id = p.producto_id
WHERE ri.rece_id = IDRECEP;

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_MARCA
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_MARCA`()
SELECT
	marca.marca_id, 
	marca.marca_descripcion, 
	marca.marca_estado
FROM
	marca
	WHERE marca.marca_id <> '1'//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_MOTIVO
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_MOTIVO`()
SELECT
	motivo.motivo_id, 
	motivo.motivo_descripcion, 
	motivo.motivo_estado
FROM
	motivo
		WHERE motivo.motivo_estado='ACTIVO' OR motivo.motivo_estado = 'INACTIVO'//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_NOTAS_X_USUARIO
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_NOTAS_X_USUARIO`(IN p_idusuario INT)
BEGIN

select nota_id,  descripcion, estado,  DATE_FORMAT(fecha, '%d/%m/%Y %H:%i:%s')    from notas where usu_id = p_idusuario;


END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_NOTIFICACION
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_NOTIFICACION`()
SELECT
	MAX(cliente.cliente_nombres) as cliente_nombres,
	MAX(recepcion.rece_estado) as rece_estado,
	MAX(recepcion.rece_fregistro) as rece_fregistro,
	MAX(recepcion.rece_concepto) as rece_concepto,
	CONCAT( 'R-000', recepcion.rece_id ) AS ticket,
	GROUP_CONCAT(CONCAT( '  ', recep_equipo.equipo, ' (', recep_equipo.falla, ') ')) AS equipos ,
	usuario.usu_nombre
FROM
	recepcion
	INNER JOIN cliente ON recepcion.cliente_id = cliente.cliente_id
	INNER JOIN recep_equipo ON recepcion.rece_id = recep_equipo.rece_id 
	INNER JOIN usuario on  recepcion.tecnico = usuario.usu_id
WHERE
	recepcion.rece_estado IN ( 'EN REPARACION' ) 
	AND recepcion.rece_estatus = 'ACTIVO' 
	

	GROUP BY recepcion.rece_id//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_NOTIFICACION_TECNICO
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_NOTIFICACION_TECNICO`(IN IDTECNI INT)
SELECT
	MAX(cliente.cliente_nombres) as cliente_nombres,
	MAX(recepcion.rece_estado) as rece_estado,
	
	DATE_FORMAT(recepcion.rece_fregistro, '%d/%m/%Y') as rece_fregistro ,
	MAX(recepcion.rece_concepto) as rece_concepto,
	CONCAT( 'R-000', recepcion.rece_id ) as ticket,
GROUP_CONCAT(CONCAT( '  ', recep_equipo.equipo, ' (', recep_equipo.falla, ') ')) as equipos 
FROM
	recepcion
	INNER JOIN cliente ON recepcion.cliente_id = cliente.cliente_id
	INNER JOIN recep_equipo ON recepcion.rece_id = recep_equipo.rece_id 
WHERE
	recepcion.rece_estado IN ( 'EN REPARACION' ) 
	AND recepcion.rece_estatus = 'ACTIVO' 
	AND recepcion.tecnico = IDTECNI 

	GROUP BY recepcion.rece_id//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_NUM_COTIZACION
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_NUM_COTIZACION`()
SELECT compro_numero FROM comprobante WHERE compro_tipo like '%coti%' and comprobante.compro_estado= 'ACTIVO'//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_PRODUCTO
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_PRODUCTO`()
SELECT
	producto.producto_id, 
	producto.producto_nombre, 
	producto.producto_codigo, 
	producto.marca_id, 
	marca.marca_descripcion, 
	producto.categoria_id, 
	categoria.categoria_descripcion, 
	producto.producto_stock, 
	producto.producto_pcompra, 
	producto.producto_pventa, 
	producto.producto_estado, 
	producto.producto_codigo_general, 
	producto.cliente_id, 
	cliente.cliente_nombres, 
	producto.producto_foto, 
	producto.unidad_id, 
	CONCAT_WS(' | ',unidadmedida.unidad_descripcion, unidadmedida.unidad_abrevia) as unidad_medida,
	producto.pro_imei
FROM
	producto
	INNER JOIN
	categoria
	ON 
		producto.categoria_id = categoria.categoria_id
	INNER JOIN
	marca
	ON 
		producto.marca_id = marca.marca_id
	INNER JOIN
	cliente
	ON 
		producto.cliente_id = cliente.cliente_id
	INNER JOIN
	unidadmedida
	ON 
		producto.unidad_id = unidadmedida.unidad_id 
	
		-- where producto.producto_estado = 'ACTIVO' or producto.producto_estado = 'INACTIVO'
		ORDER BY producto_id  DESC//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_PRODUCTOS_MAS_VENDIDOS
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_PRODUCTOS_MAS_VENDIDOS`()
SELECT 
	detalle_venta.vdetalle_id, 
	detalle_venta.producto_id, 
	CONCAT_WS(' - ',producto.producto_codigo, producto.producto_nombre) as Producto, 
	sum(vdetalle_cantidad) as cantidad
FROM
	detalle_venta
	INNER JOIN
	producto
	ON 
		detalle_venta.producto_id = producto.producto_id
		GROUP BY detalle_venta.vdetalle_id, 
	detalle_venta.producto_id, 
	CONCAT_WS(' - ',producto.producto_codigo, producto.producto_nombre) 
		ORDER BY sum(vdetalle_cantidad) DESC
		LIMIT 7//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_PRODUCTOS_SIN_STOCK
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_PRODUCTOS_SIN_STOCK`()
SELECT
producto_id,
	CONCAT_WS(' - ',producto_codigo, producto_nombre) as Producto,
	producto_stock as stock
FROM
	producto
	where producto_stock < 3
	LIMIT 7//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_PRODUCTO_VENTA
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_PRODUCTO_VENTA`()
SELECT
	producto.producto_id, 
	producto.producto_nombre, 
	producto.marca_id, 
	marca.marca_descripcion, 
	producto.categoria_id, 
	categoria.categoria_descripcion, 
 
	producto.producto_stock, 
	producto.producto_pcompra, 
	producto.producto_pventa, 
	producto.producto_estado
FROM
	producto
	INNER JOIN
	categoria
	ON 
		producto.categoria_id = categoria.categoria_id
	INNER JOIN
	marca
	ON 
		producto.marca_id = marca.marca_id
		where producto.producto_estado = 'ACTIVO' 
		ORDER BY producto_id  DESC//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_PROVEEDOR
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_PROVEEDOR`()
SELECT
	proveedor.prove_id, 
	proveedor.prove_ruc, 
	proveedor.prove_razon, 
	proveedor.prove_direccion, 
	proveedor.prove_celular, 
	proveedor.prove_fregistro, 
	proveedor.prove_estado
	
FROM
	proveedor
	WHERE proveedor.prove_estado ='ACTIVO' OR proveedor.prove_estado = 'INACTIVO'//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_RECEPCION
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_RECEPCION`(IN FEINI DATE , IN FEFIN DATE, IN USUID INT)
BEGIN
SELECT
	r.rece_id ,
	concat( ' R-000', r.rece_id ) as referencia, 
	r.cliente_id  ,
	c.cliente_nombres , 
	concat_ws( ' - ', r.rece_equipo, r.rece_concepto ) as motivo, 
	r.rece_caracteristicas , 
	r.motivo_id,  
	mo.motivo_descripcion, 
	r.rece_monto, 
	-- r.rece_fregistro , 
	DATE_FORMAT(r.rece_fregistro, '%d/%m/%y') as rece_fregistro,
	r.rece_estado , 
	r.rece_estatus , 
	r.rece_equipo , 
	r.rece_concepto , 
	r.rece_adelanto , 
	r.rece_debe , 
	r.rece_accesorios , 
	r.rece_fentrega , 
	r.marca_id, 
	ma.marca_descripcion , 
	r.rece_serie , 
	r.enciende , 
	r.tactil , 
	r.imagen , 
	r.vibra , 
	r.cobertura , 
	r.sensor , 
	r.carga , 
	r.bluetoo, 
	r.wifi , 
	r.huella , 
	r.home , 
	r.lateral , 
	r.camara , 
	r.bateria , 
	r.auricular , 
	r.micro , 
	r.face , 
	r.tornillo , 
	r.rece_cod, 
	c.cliente_celular, 
	r.tecnico , 
	r.usuario_registrador ,
	u.usu_nombre ,
	r.rece_foto1
FROM
recepcion as r 
			JOIN cliente as c ON  r.cliente_id = c.cliente_id 
			JOIN motivo as mo ON r.motivo_id = mo.motivo_id
		JOIN marca as ma ON 	r.marca_id = ma.marca_id
		
				JOIN usuario u on r.tecnico = u.usu_id
		WHERE r.usuario_registrador = USUID   AND r.rece_fregistro BETWEEN  FEINI and FEFIN;
		
		END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_RECEPCION_ADMIN
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_RECEPCION_ADMIN`(IN FEINI DATE , IN FEFIN DATE)
BEGIN
SELECT
	r.rece_id ,
	concat( ' R-000', r.rece_id ) as referencia, 
	r.cliente_id  ,
	c.cliente_nombres , 
	concat_ws( ' - ', r.rece_equipo, r.rece_concepto ) as motivo, 
	r.rece_caracteristicas , 
	r.motivo_id,  
	mo.motivo_descripcion, 
	r.rece_monto, 
	DATE_FORMAT(r.rece_fregistro, '%d/%m/%y') as rece_fregistro,
	r.rece_estado , 
	r.rece_estatus , 
	r.rece_equipo , 
	r.rece_concepto , 
	r.rece_adelanto , 
	r.rece_debe , 
	r.rece_accesorios , 
	r.rece_fentrega , 
	r.marca_id, 
	ma.marca_descripcion , 
	r.rece_serie , 
	r.enciende , 
	r.tactil , 
	r.imagen , 
	r.vibra , 
	r.cobertura , 
	r.sensor , 
	r.carga , 
	r.bluetoo, 
	r.wifi , 
	r.huella , 
	r.home , 
	r.lateral , 
	r.camara , 
	r.bateria , 
	r.auricular , 
	r.micro , 
	r.face , 
	r.tornillo , 
	r.rece_cod, 
	c.cliente_celular, 
	r.tecnico , 
	r.usuario_registrador ,
	u.usu_nombre ,
	r.rece_foto1
FROM
recepcion as r 
			JOIN cliente as c ON  r.cliente_id = c.cliente_id 
			JOIN motivo as mo ON r.motivo_id = mo.motivo_id
		JOIN marca as ma ON 	r.marca_id = ma.marca_id
		
				JOIN usuario u on r.tecnico = u.usu_id
		WHERE  r.rece_fregistro BETWEEN  FEINI and FEFIN;
		
		END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_REPARACION
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_REPARACION`(IN FEINI DATE , IN FEFIN DATE, IN USUID INT)
BEGIN
SELECT
	r.rece_id , 
	concat( ' R-000', r.rece_id ) as referencia, 
	r.cliente_id  , 
	c.cliente_nombres ,  
	concat_ws( ' - ', r.rece_equipo, r.rece_concepto ) as motivo,  
	r.rece_caracteristicas , 
	r.motivo_id,  
	mo.motivo_descripcion, 
	r.rece_monto,  
	r.rece_fregistro , 
	r.rece_estado , 
	r.rece_estatus , 
	r.rece_equipo , 
	r.rece_concepto , 
	r.rece_adelanto , 
	r.rece_debe , 
	r.rece_accesorios , 
	r.rece_fentrega , 
	r.marca_id, 
	ma.marca_descripcion , 
	r.rece_serie , 
	r.enciende , 
	r.tactil , 
	r.imagen , 
	r.vibra , 
	r.cobertura , 
	r.sensor , 
	r.carga , 
	r.bluetoo, 
	r.wifi , 
	r.huella , 
	r.home , 
	r.lateral ,
	r.camara , 
	r.bateria , 
	r.auricular , 
	r.micro , 
	r.face , 
	r.tornillo , 
	r.rece_cod, 
	c.cliente_celular, 
	r.tecnico , 
	r.usuario_registrador ,
	r.diagnostico_tecnico
FROM
recepcion as r 
			JOIN cliente as c ON  r.cliente_id = c.cliente_id 
			JOIN motivo as mo ON r.motivo_id = mo.motivo_id
		JOIN marca as ma ON 	r.marca_id = ma.marca_id
		WHERE r.tecnico = USUID   AND r.rece_fregistro BETWEEN  FEINI and FEFIN;
		
		END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_ROL
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_ROL`()
SELECT
	rol.rol_id, 
	rol.rol_nombre, 
	rol.rol_fregistro, 
	rol.rol_estado
FROM
	rol
	WHERE rol.rol_estado ='ACTIVO' OR rol.rol_estado = 'INACTIVO'//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_SELECT_ANIO_VENTA
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_SELECT_ANIO_VENTA`()
SELECT YEAR(venta_fregistro) as anio FROM venta
where venta_estado <> 'ANULADA' 
GROUP BY YEAR(venta_fregistro)//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_SELECT_CATEGORIA
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_SELECT_CATEGORIA`()
SELECT * FROM categoria WHERE categoria.categoria_estado = 'ACTIVO'//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_SELECT_CLIENTE
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_SELECT_CLIENTE`()
SELECT cliente_id,
CONCAT_WS(' | ',cliente_nombres,cliente_dni) as cliente,
cliente_estado
 FROM cliente WHERE cliente_estado= 'ACTIVO' 	ORDER BY cliente_id DESC//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_SELECT_COMPROBANTE
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_SELECT_COMPROBANTE`()
SELECT * FROM comprobante WHERE comprobante.compro_estado= 'ACTIVO' and compro_tipo not in ('COTIZACION')//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_SELECT_COMP_COTIZACION
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_SELECT_COMP_COTIZACION`()
SELECT * FROM comprobante WHERE compro_tipo like '%coti%' and comprobante.compro_estado= 'ACTIVO'//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_SELECT_FOR_PAGO
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_SELECT_FOR_PAGO`()
SELECT
	forma_pago.fpago_id, 
	forma_pago.fpago_descripcion
FROM
	forma_pago
	WHERE fpago_estado = 'ACTIVO'
	-- ORDER BY forma_pago.fpago_id DESC//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_SELECT_MARCA
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_SELECT_MARCA`()
SELECT * FROM marca WHERE marca.marca_estado= 'ACTIVO'
ORDER BY marca.marca_id DESC//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_SELECT_MOTIVO
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_SELECT_MOTIVO`()
SELECT * FROM motivo WHERE motivo_estado= 'ACTIVO'//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_SELECT_PRODUCTO
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_SELECT_PRODUCTO`()
SELECT producto_id, CONCAT_WS(' - ',producto_codigo, producto_nombre) as nombre  FROM producto where producto_estado = 'ACTIVO'
ORDER BY producto_id desc//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_SELECT_PRODUCTO_REPARACION_INSUMO
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_SELECT_PRODUCTO_REPARACION_INSUMO`()
SELECT   producto_id, 
CONCAT(producto_nombre,'  | Stock: ', producto_stock) as nombre,
producto_stock as stock, 
producto_pventa as precio_venta,
producto_pcompra as precio_compra

FROM producto 
where producto_estado = 'ACTIVO' AND pro_imei = 'No'
ORDER BY producto_id desc//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_SELECT_PRODUCTO_VENTA
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_SELECT_PRODUCTO_VENTA`()
SELECT   producto_id, 
CONCAT(producto_nombre,'  | Cod: ', producto_codigo_general, '  | Stock: ', producto_stock) as nombre,
-- CONCAT_WS('  | Cod: ', producto_nombre, producto_codigo_general) as nombre,
producto_stock as stock, 
producto_pventa as precio_venta,
pro_imei
FROM producto 
where producto_estado = 'ACTIVO'
ORDER BY producto_id desc//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_SELECT_PROVEEDOR
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_SELECT_PROVEEDOR`()
SELECT * FROM cliente WHERE cliente.cliente_estado= 'ACTIVO' and cliente_tipo_doc = 'R.U.C'//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_SELECT_ROL
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_SELECT_ROL`()
SELECT * FROM rol WHERE rol_estado = 'ACTIVO'//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_SELECT_TECNICOS
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_SELECT_TECNICOS`()
BEGIN
	SELECT
		usu_id,
		usu_nombre 
	FROM
		usuario 
	WHERE
		rol_id IN ( '4', '1') 
		AND usu_estado = 'ACTIVO';

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_SELECT_UNIDAD
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_SELECT_UNIDAD`()
SELECT
	unidadmedida.unidad_id, 
  CONCAT_WS(' | ',unidadmedida.unidad_descripcion, unidadmedida.unidad_abrevia) as descripcion, 
	unidadmedida.unidad_estado
FROM
	unidadmedida
	
	where unidad_estado = 'ACTIVO'//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_SELECT_USUARIO_RECORD
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_SELECT_USUARIO_RECORD`()
Select usu_id,usu_nombre from usuario where usu_estado ='ACTIVO'//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_SERVICIO
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_SERVICIO`(IN FINICIO DATE, IN FFIN DATE, IN TECNIUSU INT)
SELECT
	servicio.servicio_id, 
	servicio.rece_id, 
	CONCAT( ' R-000',servicio.rece_id ) as referencia,
	recepcion.cliente_id, 
	CONCAT_WS(' - ',cliente.cliente_nombres,	cliente.cliente_dni) as cliente_nombres,
	CONCAT_WS(' - ',recepcion.rece_equipo,recepcion.rece_concepto) as concepto, 
	recepcion.rece_monto, 
	recepcion.rece_estado, 
	servicio.servicio_monto, 
	servicio.servicio_concepto, 
	servicio.servicio_responsable, 
	servicio.servicio_comentario, 
	servicio.servicio_entrega,
	 DATE_FORMAT(servicio.servicio_fregistro, '%d/%m/%Y') as servicio_fregistro,
	
	
	servicio.servicio_estado,
	cliente.cliente_dni,
	cliente.cliente_celular,
	cliente.cliente_nombres as nombre_cli,
	servicio.estado_caja,
	servicio.fpago_id,
	forma_pago.fpago_descripcion,
	recepcion.rece_cod
FROM
	servicio
	INNER JOIN
	recepcion
	ON 
		servicio.rece_id = recepcion.rece_id
	INNER JOIN
	cliente
	ON 
		recepcion.cliente_id = cliente.cliente_id 
		INNER JOIN forma_pago 
	ON
	servicio.fpago_id = forma_pago.fpago_id
		WHERE servicio.servicio_fregistro BETWEEN FINICIO AND FFIN//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_UNIDAD_MEDIDA
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_UNIDAD_MEDIDA`()
SELECT
	unidadmedida.unidad_id,
	unidadmedida.unidad_descripcion, 
	unidadmedida.unidad_abrevia, 
	unidadmedida.unidad_estado
FROM
	unidadmedida
WHERE
	unidadmedida.unidad_estado = 'ACTIVO' OR
	unidadmedida.unidad_estado = 'INACTIVO'//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_USUARIO
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_USUARIO`()
SELECT
	usuario.usu_id, 
	usuario.usu_nombre, 
	usuario.usu_contrasena, 
	usuario.rol_id, 
	usuario.usu_estado, 
	usuario.usu_email, 
	usuario.usu_foto, 
	rol.rol_nombre,
	usuario.cliente_id
FROM
	usuario
	INNER JOIN
	rol
	ON 
		usuario.rol_id = rol.rol_id
	WHERE  usuario.usu_id//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_VENTA_ADMIN
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_VENTA_ADMIN`(IN FINICIO DATE, IN FFIN DATE)
SELECT
	venta.venta_id, 
	cliente.cliente_nombres, 
	venta.venta_comprobante, 
	CONCAT_WS(' - ',venta.venta_serie,venta.venta_num_comprobante) AS comprobante, 
	venta.venta_total, 
	 
	DATE_FORMAT(venta.venta_fregistro, '%d/%m/%Y') as venta_fregistro, 
	venta.venta_estado, 
	venta.compro_id, 
	venta.usu_id, 
	usuario.usu_nombre, 
	venta.venta_serie, 
	venta.venta_num_comprobante, 
	venta.cliente_id, 
	venta.fpago_id, 
	forma_pago.fpago_descripcion,
	venta.venta_impuesto,
	venta.venta_porcentaje,
	venta.observacion,
	(venta.venta_total - venta.venta_impuesto + venta.venta_descuento ) as subtotal2,
	venta.monto_efectivo, 
	venta.cod_operacion , 
	venta.monto_tarjeta ,
	(venta.venta_total + venta.venta_impuesto + venta.venta_descuento) as subtotal3,
	venta.venta_descuento,
	cliente.cliente_celular
	
FROM
	venta
	INNER JOIN
	cliente
	ON 
		venta.cliente_id = cliente.cliente_id
	INNER JOIN
	comprobante
	ON 
		venta.compro_id = comprobante.compro_id
	INNER JOIN
	usuario
	ON 
		venta.usu_id = usuario.usu_id
	INNER JOIN
	forma_pago
	ON 
		venta.fpago_id = forma_pago.fpago_id
		WHERE venta.venta_fregistro BETWEEN FINICIO AND FFIN 
		ORDER BY venta_id DESC//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_VENTA_FILTRO
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_VENTA_FILTRO`(IN FINICIO DATE, IN FFIN DATE, IN IDUSUAR INT)
SELECT
	venta.venta_id, 
	cliente.cliente_nombres, 
	venta.venta_comprobante, 
	CONCAT_WS(' - ',venta.venta_serie,venta.venta_num_comprobante) AS comprobante, 
	venta.venta_total, 
	venta.venta_fregistro, 
	venta.venta_estado, 
	venta.compro_id, 
	venta.usu_id, 
	usuario.usu_nombre, 
	venta.venta_serie, 
	venta.venta_num_comprobante, 
	venta.cliente_id, 
	venta.fpago_id, 
	forma_pago.fpago_descripcion,
	venta.venta_impuesto,
	venta.venta_porcentaje,
	venta.observacion,
	(venta.venta_total - venta.venta_impuesto + venta.venta_descuento ) as subtotal2,
	venta.monto_efectivo, 
	venta.cod_operacion , 
	venta.monto_tarjeta ,
	(venta.venta_total + venta.venta_impuesto + venta.venta_descuento) as subtotal3,
	venta.venta_descuento,
	cliente.cliente_celular
	
FROM
	venta
	INNER JOIN
	cliente
	ON 
		venta.cliente_id = cliente.cliente_id
	INNER JOIN
	comprobante
	ON 
		venta.compro_id = comprobante.compro_id
	INNER JOIN
	usuario
	ON 
		venta.usu_id = usuario.usu_id
	INNER JOIN
	forma_pago
	ON 
		venta.fpago_id = forma_pago.fpago_id
		WHERE venta.venta_fregistro BETWEEN FINICIO AND FFIN AND venta.usu_id = IDUSUAR
		ORDER BY venta_id DESC//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_VISTA_INICIO
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_VISTA_INICIO`()
BEGIN
SELECT 
		md.mend_id,
		m.men_vista,
		md.vista_inicio
	FROM td_menu_detalle md
	INNER JOIN menu m ON m.men_id = md.men_id
	WHERE 
	-- md.rol_id = p_rol_id 
	-- and md.mend_permi = 'Si'
	m.estado=1;
	
	END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LISTAR_VISTA_INICIO_ACTIVA
DELIMITER //
CREATE PROCEDURE `SP_LISTAR_VISTA_INICIO_ACTIVA`(IN p_rol_id INT)
BEGIN
SELECT 
		md.mend_id,
		m.men_vista,
		md.vista_inicio
	FROM td_menu_detalle md
	INNER JOIN menu m ON m.men_id = md.men_id
	WHERE md.rol_id = p_rol_id 
	AND m.estado=1 
	ORDER BY  md.vista_inicio desc;
	
	END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_LSTAR_PLAN
DELIMITER //
CREATE PROCEDURE `SP_LSTAR_PLAN`()
BEGIN

SELECT
	p.plan_id, 
	p.plan_nombre_cli, 
	p.descripcion, 

	DATE_FORMAT(p.plan_ini, '%d/%m/%Y') as plan_ini, 
	DATE_FORMAT(p.plan_fin, '%d/%m/%Y') as plan_fin, 
	
	p.plan_monto, 
	p.plan_estado
FROM
	plan p ;


END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MENU_X_ROL_PARAMENU
DELIMITER //
CREATE PROCEDURE `SP_MENU_X_ROL_PARAMENU`(IN p_rol_id INT)
BEGIN
	SELECT
		td_menu_detalle.mend_id,
		menu.men_id,
		menu.men_vista,
		menu.men_icon,
		menu.men_ruta,
		td_menu_detalle.vista_inicio,
		menu.grupo_id,
		menu.orden,
		td_menu_detalle.mend_permi
	FROM
		td_menu_detalle
		INNER JOIN menu ON td_menu_detalle.men_id = menu.men_id 
	WHERE
		td_menu_detalle.rol_id = p_rol_id 
		AND menu.estado = 1 
		AND td_menu_detalle.mend_permi = 'Si';
		-- ORDER BY menu.men_id ASC;
	
END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MODIFICAR_CATEGORIA
DELIMITER //
CREATE PROCEDURE `SP_MODIFICAR_CATEGORIA`(IN ID INT,IN CATEGORIA VARCHAR(255),IN ESTADO VARCHAR(10))
BEGIN
DECLARE CANTIDAD INT;
DECLARE CATEGORIAACTUAL VARCHAR(25);
SET @CATEGORIAACTUAL:=(SELECT categoria_descripcion from categoria where categoria_id=ID);
IF @CATEGORIAACTUAL = CATEGORIA THEN
	UPDATE categoria set
	categoria_descripcion=CATEGORIA,
	categoria_estado=ESTADO
	where categoria_id=ID;
	SELECT 1;
ELSE
	SET @CANTIDAD:=(SELECT COUNT(*) FROM  categoria where categoria_descripcion=CATEGORIA);
	if @CANTIDAD = 0 THEN
		UPDATE categoria set
		categoria_descripcion=CATEGORIA,
		categoria_estado=ESTADO
		where categoria_id=ID;
		SELECT 1;
	ELSE
		SELECT 2;
	END IF;
END IF;

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MODIFICAR_CLAVE_USUARIO
DELIMITER //
CREATE PROCEDURE `SP_MODIFICAR_CLAVE_USUARIO`(IN ID INT,IN CONTRA VARCHAR(255))
UPDATE usuario set
usu_contrasena=CONTRA
where usu_id=ID//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MODIFICAR_CLIENTE
DELIMITER //
CREATE PROCEDURE `SP_MODIFICAR_CLIENTE`(IN `ID` INT, IN `NOMBRE` VARCHAR(100), IN `DNI` VARCHAR(20), IN `CELULAR` VARCHAR(20), IN `ESTADO` VARCHAR(100), IN `DIRECCION` VARCHAR(255), IN `APE_P` VARCHAR(255), IN `APE_M` VARCHAR(255), IN `CORREO` VARCHAR(255), IN `TIPODOC` VARCHAR(50))
BEGIN
DECLARE CANTIDAD INT;
DECLARE CLIENTEACTUAL VARCHAR(25);
SET @CLIENTEACTUAL:=(SELECT cliente_dni from cliente where cliente_id=ID);
IF @CLIENTEACTUAL = DNI THEN
	UPDATE cliente set
	cliente_nombres=NOMBRE,
	cliente_celular=CELULAR,
	cliente_dni=DNI,
	cliente_estado=ESTADO,
	cliente_direccion=DIRECCION,
	cliente_ape_p = APE_P,
	cliente_ape_m = APE_M,
	cliente_correo = CORREO,
	cliente_tipo_doc = TIPODOC
	where cliente_id=ID;
	SELECT 1;
ELSE
	SET @CANTIDAD:=(SELECT COUNT(*) FROM cliente where cliente_dni=DNI);
	if @CANTIDAD = 0 THEN
		UPDATE cliente set
		cliente_nombres=NOMBRE,
		cliente_celular=CELULAR,
		cliente_dni=DNI,
		cliente_estado=ESTADO,
		cliente_direccion=DIRECCION,
	  cliente_ape_p = APE_P,
	  cliente_ape_m = APE_M,
		cliente_correo = CORREO,
		cliente_tipo_doc = TIPODOC
		where cliente_id=ID;
		SELECT 1;
	ELSE
		SELECT 2;
	END IF;
END IF;

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MODIFICAR_COMPROBANTE
DELIMITER //
CREATE PROCEDURE `SP_MODIFICAR_COMPROBANTE`(IN ID INT,IN TIPO VARCHAR(100),IN SERIE VARCHAR(100),IN NUMERO VARCHAR(100), IN ESTADO VARCHAR(100))
UPDATE comprobante SET
compro_tipo = TIPO,
compro_serie = SERIE,
compro_numero = NUMERO,
compro_estado = ESTADO
WHERE compro_id = ID//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MODIFICAR_EMPRESA
DELIMITER //
CREATE PROCEDURE `SP_MODIFICAR_EMPRESA`(IN ID INT, IN RAZON VARCHAR(255), IN RUC VARCHAR(255), IN REPRE VARCHAR(255), IN DIRECCION VARCHAR(255), IN CELULAR VARCHAR(255), IN TELEFONO VARCHAR(255), IN CORREO VARCHAR(255), IN ESTADO VARCHAR(255), IN URL VARCHAR(255), IN CUENTA01 VARCHAR(100),IN NRO_CUENTA01 VARCHAR(100),IN CUENTA02 VARCHAR(100),IN NRO_CUENTA02 VARCHAR(100), IN MONED VARCHAR(10), IN CODE_POST VARCHAR(20), IN TIPOIG VARCHAR(50), IN IMPUESTOIGV DECIMAL(10,2), IN MONE1 VARCHAR(50), IN MONED2 VARCHAR(50), IN NOMBRESIST VARCHAR(200), IN p_linksistema VARCHAR(200), IN p_codigopais VARCHAR(50))
UPDATE configuracion SET
confi_razon_social = RAZON,
confi_ruc = RUC,
confi_nombre_representante = REPRE,
confi_direccion = DIRECCION,
confi_celular = CELULAR,
confi_telefono = TELEFONO,
confi_correo = CORREO,
confi_estado = ESTADO,
confi_url = URL,
confi_cnta01 = CUENTA01,
confi_nro_cuenta01 = NRO_CUENTA01,
confi_cnta02 =  CUENTA02,
confi_nro_cuenta02 = NRO_CUENTA02,
confi_moneda =   MONED,
confi_codigo_pos = CODE_POST,
confi_tipo_igv = TIPOIG,
confi_igv = IMPUESTOIGV,
confi_moneda1 = MONE1,
confi_moneda2 = MONED2,
confi_nombre_sistema = NOMBRESIST,
url_sistema = p_linksistema,
cod_pais = p_codigopais

WHERE confi_id = ID//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MODIFICAR_ESTADO_VENTA
DELIMITER //
CREATE PROCEDURE `SP_MODIFICAR_ESTADO_VENTA`(IN ID INT, IN ESTADO VARCHAR(100))
UPDATE venta SET
venta_estado = ESTADO
WHERE venta_id = ID//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MODIFICAR_FORMA_PAGO
DELIMITER //
CREATE PROCEDURE `SP_MODIFICAR_FORMA_PAGO`(IN ID INT,IN FORMAPAGO VARCHAR(25),IN ESTADO VARCHAR(10))
BEGIN
DECLARE CANTIDAD INT;
DECLARE FORMAPACTUAL VARCHAR(25);
SET @FORMAPACTUAL:=(SELECT fpago_descripcion from forma_pago where fpago_id=ID);
IF @FORMAPACTUAL = FORMAPAGO THEN
	UPDATE forma_pago set
	fpago_descripcion=FORMAPAGO,
	fpago_estado=ESTADO
	where fpago_id=ID;
	SELECT 1;
ELSE
	SET @CANTIDAD:=(SELECT COUNT(*) FROM forma_pago where fpago_descripcion=FORMAPAGO);
	if @CANTIDAD = 0 THEN
			UPDATE forma_pago set
			fpago_descripcion=FORMAPAGO,
			fpago_estado=ESTADO
			where fpago_id=ID;
		SELECT 1;
	ELSE
		SELECT 2;
	END IF;
END IF;

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MODIFICAR_FOTO_EMPRESA
DELIMITER //
CREATE PROCEDURE `SP_MODIFICAR_FOTO_EMPRESA`(IN ID INT,IN RUTA VARCHAR(255))
UPDATE configuracion SET
config_foto = RUTA
WHERE confi_id = ID//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MODIFICAR_FOTO_PRODUCTO
DELIMITER //
CREATE PROCEDURE `SP_MODIFICAR_FOTO_PRODUCTO`(IN ID INT,IN RUTA VARCHAR(255))
UPDATE producto SET
producto_foto = RUTA
WHERE producto_id = ID//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MODIFICAR_FOTO_USUARIO
DELIMITER //
CREATE PROCEDURE `SP_MODIFICAR_FOTO_USUARIO`(IN ID INT,IN RUTA VARCHAR(255))
UPDATE usuario set
usu_foto=RUTA
where usu_id=ID//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MODIFICAR_GASTOS
DELIMITER //
CREATE PROCEDURE `SP_MODIFICAR_GASTOS`(IN ID INT,IN GASTO VARCHAR(255),IN NOMTO INT,IN RESPONSABLE VARCHAR(255), IN ESTADO VARCHAR(100), IN TIPO_M VARCHAR(50))
BEGIN

	UPDATE gastos set
	gastos_descripcion=GASTO,
	gastos_monto=NOMTO,
	gastos_responsable=RESPONSABLE,
	gastos_estado=ESTADO,
	tipo_mov = TIPO_M
	where gastos_id=ID;



END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MODIFICAR_MARCA
DELIMITER //
CREATE PROCEDURE `SP_MODIFICAR_MARCA`(IN ID INT,IN MARCA VARCHAR(25),IN ESTADO VARCHAR(10))
BEGIN
DECLARE CANTIDAD INT;
DECLARE MARCAACTUAL VARCHAR(25);
SET @MARCAACTUAL:=(SELECT marca_descripcion from marca where marca_id=ID);
IF @MARCAACTUAL = MARCA THEN
	UPDATE marca set
	marca_descripcion=MARCA,
	marca_estado=ESTADO
	where marca_id=ID;
	SELECT 1;
ELSE
	SET @CANTIDAD:=(SELECT COUNT(*) FROM marca where marca_descripcion=MARCA);
	if @CANTIDAD = 0 THEN
		UPDATE marca set
		marca_descripcion=MARCA,
		marca_estado=ESTADO
		where marca_id=ID;
		SELECT 1;
	ELSE
		SELECT 2;
	END IF;
END IF;

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MODIFICAR_MOTIVO
DELIMITER //
CREATE PROCEDURE `SP_MODIFICAR_MOTIVO`(IN ID INT,IN MOTIVO VARCHAR(25),IN ESTADO VARCHAR(10))
BEGIN
DECLARE CANTIDAD INT;
DECLARE MOTIVOACTUAL VARCHAR(25);
SET @MOTIVOACTUAL:=(SELECT motivo_descripcion from motivo where motivo_id=ID);
IF @MOTIVOACTUAL = MOTIVO THEN
	UPDATE motivo set
	motivo_descripcion=MOTIVO,
	motivo_estado=ESTADO
	where motivo_id=ID;
	SELECT 1;
ELSE
	SET @CANTIDAD:=(SELECT COUNT(*) FROM motivo where motivo_descripcion=MOTIVO);
	if @CANTIDAD = 0 THEN
		UPDATE motivo set
	motivo_descripcion=MOTIVO,
	motivo_estado=ESTADO
	where motivo_id=ID;
		SELECT 1;
	ELSE
		SELECT 2;
	END IF;
END IF;

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MODIFICAR_NOTAS
DELIMITER //
CREATE PROCEDURE `SP_MODIFICAR_NOTAS`(IN p_idnotas INT, IN p_descrip VARCHAR(250))
BEGIN

UPDATE notas SET 
descripcion = p_descrip
WHERE nota_id = p_idnotas;

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MODIFICAR_PRODUCTO
DELIMITER //
CREATE PROCEDURE `SP_MODIFICAR_PRODUCTO`(IN ID INT ,IN PRODUCTO VARCHAR(100),IN IDMARCA INT, IN IDCATEGORIA INT, IN PCOMPRA DECIMAL (10,2), IN PVENTA DECIMAL (10,2), IN ESTADO VARCHAR(100),IN COD_GENERAL VARCHAR(255),  IN PROVE INT, IN IDUNIDAD INT)
BEGIN
DECLARE PRODUCTOACTUAL VARCHAR(100);
DECLARE CANTIDAD INT;
SET @PRODUCTOACTUAL:=(SELECT producto_nombre from producto where producto_id=ID and producto_nombre= PRODUCTO);
if @PRODUCTOACTUAL = PRODUCTO THEN
	UPDATE producto set
	producto_nombre=PRODUCTO,
	marca_id=IDMARCA,
	categoria_id=IDCATEGORIA,
	producto_pcompra=PCOMPRA,
	producto_pventa=PVENTA,
	producto_estado=ESTADO,
	producto_codigo_general= COD_GENERAL,
	cliente_id = PROVE,
	unidad_id = IDUNIDAD
	WHERE producto_id=ID;
	
	UPDATE kardex SET
	producto_nombre = PRODUCTO,
	kardex_p_ingreso = PCOMPRA,
	kardex_p_salida = PVENTA
	WHERE producto_id = ID and producto_codigo = 	producto_codigo;
	
	SELECT 1;
ELSE
	SET @CANTIDAD:=(SELECT COUNT(*) from producto where producto_nombre COLLATE utf8mb4_general_ci= PRODUCTO  and producto_codigo_general COLLATE utf8mb4_general_ci= COD_GENERAL);
	IF @CANTIDAD = 0 THEN
		UPDATE producto set
	producto_nombre=PRODUCTO,
	marca_id=IDMARCA,
	categoria_id=IDCATEGORIA,
	producto_pcompra=PCOMPRA,
	producto_pventa=PVENTA,
	producto_estado=ESTADO,
  producto_codigo_general= COD_GENERAL,
	cliente_id = PROVE,
	unidad_id = IDUNIDAD
	WHERE producto_id=ID;
	
	UPDATE kardex SET
	producto_nombre = PRODUCTO,
	kardex_p_ingreso = PCOMPRA,
	kardex_p_salida = PVENTA
	WHERE producto_id = ID and producto_codigo = 	producto_codigo;
	
			SELECT 1;
	ELSE
			SELECT 2;
	END IF;
END IF;

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MODIFICAR_PROVEEDOR
DELIMITER //
CREATE PROCEDURE `SP_MODIFICAR_PROVEEDOR`(IN ID INT,IN RUC VARCHAR(30),IN RAZON VARCHAR(255),IN DIRECCION VARCHAR(255),IN CELULAR VARCHAR(20), IN ESTADO VARCHAR(100))
BEGIN
DECLARE CANTIDAD INT;
DECLARE PROVEACTUAL VARCHAR(25);
SET @PROVEACTUAL:=(SELECT prove_ruc from proveedor where prove_id=ID);
IF @PROVEACTUAL = RUC THEN
	UPDATE proveedor set
	prove_ruc=RUC,
	prove_razon=RAZON,
	prove_direccion=DIRECCION,
	prove_celular=CELULAR,
	prove_estado=ESTADO
	where prove_id=ID;
	SELECT 1;
ELSE
	SET @CANTIDAD:=(SELECT COUNT(*) FROM proveedor where prove_ruc=RUC);
	if @CANTIDAD = 0 THEN
		UPDATE proveedor set
		prove_ruc=RUC,
		prove_razon=RAZON,
		prove_direccion=DIRECCION,
		prove_celular=CELULAR,
		prove_estado=ESTADO
		where prove_id=ID;
		SELECT 1;
	ELSE
		SELECT 2;
	END IF;
END IF;

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MODIFICAR_RECEPCION
DELIMITER //
CREATE PROCEDURE `SP_MODIFICAR_RECEPCION`(IN IDRECE INT ,IN IDCLIENTE INT, IN CARACTERISTICAS VARCHAR(255), IN IDMOTIVO INT,IN CONCEPTO VARCHAR(255),IN MONTO DECIMAL(10,2),IN ESTADO VARCHAR(100),IN ADELANTO DECIMAL (10,2) ,IN DEBE DECIMAL (10,2),IN ACCESORIOS VARCHAR(255), IN FENTREGA DATE, IN RECOGER VARCHAR(50),  IN TECNICOID INT)
UPDATE recepcion set
	cliente_id=IDCLIENTE,
	rece_caracteristicas=CARACTERISTICAS,
	motivo_id=IDMOTIVO,
	rece_concepto=CONCEPTO,
	rece_monto=MONTO,
	rece_estatus=ESTADO,
	rece_adelanto= ADELANTO,
	rece_debe= DEBE,
	rece_accesorios = ACCESORIOS,
	rece_fentrega = FENTREGA,
	rece_estado = RECOGER,
	tecnico = TECNICOID
	WHERE rece_id=IDRECE//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MODIFICAR_ROL
DELIMITER //
CREATE PROCEDURE `SP_MODIFICAR_ROL`(IN ID INT,IN ROL VARCHAR(25),IN ESTADO VARCHAR(10))
BEGIN
DECLARE CANTIDAD INT;
DECLARE ROLACTUAL VARCHAR(25);
SET @ROLACTUAL:=(SELECT rol_nombre from rol where rol_id=ID);
IF @ROLACTUAL = ROL THEN
	UPDATE rol set
	rol_nombre=ROL,
	rol_estado=ESTADO
	where rol_id=ID;
	SELECT 1;
ELSE
	SET @CANTIDAD:=(SELECT COUNT(*) FROM rol where rol_nombre=ROL);
	if @CANTIDAD = 0 THEN
		UPDATE rol set
		rol_nombre=ROL,
		rol_estado=ESTADO
		where rol_id=ID;
		SELECT 1;
	ELSE
		SELECT 2;
	END IF;
END IF;

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MODIFICAR_UNIDAD_MEDIDA
DELIMITER //
CREATE PROCEDURE `SP_MODIFICAR_UNIDAD_MEDIDA`(IN ID INT,IN DESCRIPCION VARCHAR(25),IN ABREVIATURA VARCHAR(25), IN ESTADO VARCHAR(10))
BEGIN
DECLARE CANTIDAD INT;
DECLARE MEDIDAACTUAL VARCHAR(25);
SET @MEDIDAACTUAL:=(SELECT unidad_descripcion from unidadmedida where unidad_id =ID);
IF @MEDIDAACTUAL = DESCRIPCION THEN
	UPDATE unidadmedida set
	unidad_descripcion=DESCRIPCION,
	unidad_abrevia = ABREVIATURA,
	unidad_estado=ESTADO
	where unidad_id=ID;
	SELECT 1;
ELSE
	SET @CANTIDAD:=(SELECT COUNT(*) FROM unidadmedida where unidad_descripcion = DESCRIPCION);
	if @CANTIDAD = 0 THEN
			UPDATE unidadmedida set
			unidad_descripcion=DESCRIPCION,
			unidad_abrevia = ABREVIATURA,
			unidad_estado=ESTADO
			where unidad_id=ID;
		SELECT 1;
	ELSE
		SELECT 2;
	END IF;
END IF;

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MODIFICAR_USUARIO
DELIMITER //
CREATE PROCEDURE `SP_MODIFICAR_USUARIO`(IN ID INT, IN USUARIO VARCHAR(20), IN CORREO VARCHAR(255), IN ROL INT)
UPDATE usuario SET
usu_email = CORREO,
usu_nombre = USUARIO,
rol_id = ROL
WHERE usu_id = ID//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MODIFICAR_USUARIO_ESTADO
DELIMITER //
CREATE PROCEDURE `SP_MODIFICAR_USUARIO_ESTADO`(IN ID INT,IN ESTADO VARCHAR(10))
UPDATE usuario set
usu_estado=ESTADO
where usu_id=ID//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MOVIMIENTOS_POR_PRODUCTO_KARDEX
DELIMITER //
CREATE PROCEDURE `SP_MOVIMIENTOS_POR_PRODUCTO_KARDEX`(IN IDPRODUC INT)
SELECT
	producto_id,
	IFNULL(venta_comprobante, '-') as comprobante,
	kardex_tipo,
	DATE_FORMAT(kardex_fecha, '%d/%m/%Y') as fecha, 
	kardex_ingreso,
	kardex_salida,
	kardex.imei,
	kardex.tecnico
FROM
	kardex
WHERE
	producto_id COLLATE utf8mb4_general_ci = IDPRODUC
	AND kardex_tipo IN ('INICIAL', 'INGRESO', 'SALIDA', 'SALIDA DIRECTA', 'SALIDA INSUMOS', 'DEVOLUCION INSUMO')//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_MOVIMIENTOS_PROD_CLIENTE
DELIMITER //
CREATE PROCEDURE `SP_MOVIMIENTOS_PROD_CLIENTE`(IN IDCLIENTE INT)
BEGIN
SELECT
	p.producto_nombre as nombre_prod,
	dv.v_imei as imei,
	dv.vdetalle_cantidad as cantidad,
	DATE_FORMAT(dv.vdetalle_fecha , '%d/%m/%Y') as fecha,
	c.cliente_nombres as cliente,
	CONCAT(v.venta_comprobante, ' ', v.venta_serie, '-', v.venta_num_comprobante) as comprobante,
	u.usu_nombre as vendedor
FROM
	detalle_venta dv
	INNER JOIN producto p ON dv.producto_id = p.producto_id
	INNER JOIN venta v ON dv.venta_id  = v.venta_id
	INNER JOIN cliente c ON v.cliente_id = c.cliente_id
	INNER JOIN usuario u on v.usu_id = u.usu_id
	WHERE v.cliente_id = IDCLIENTE;


END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_PAGAR_VENTA
DELIMITER //
CREATE PROCEDURE `SP_PAGAR_VENTA`(IN ID INT,IN ESTADO VARCHAR(30))
UPDATE venta set
venta_estado=ESTADO
where venta_id=ID//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_PIVOT_VENTAS
DELIMITER //
CREATE PROCEDURE `SP_PIVOT_VENTAS`()
SELECT YEAR(venta_fregistro) as anio,
SUM(CASE WHEN MONTH(venta_fregistro)=1 THEN venta_total ELSE 0 END) AS enero,
SUM(CASE WHEN MONTH(venta_fregistro)=2 THEN venta_total ELSE 0 END) AS febrero,
SUM(CASE WHEN MONTH(venta_fregistro)=3 THEN venta_total ELSE 0 END) AS marzo,
SUM(CASE WHEN MONTH(venta_fregistro)=4 THEN venta_total ELSE 0 END) AS abril,
SUM(CASE WHEN MONTH(venta_fregistro)=5 THEN venta_total ELSE 0 END) AS mayo,
SUM(CASE WHEN MONTH(venta_fregistro)=6 THEN venta_total ELSE 0 END) AS junio,
SUM(CASE WHEN MONTH(venta_fregistro)=7 THEN venta_total ELSE 0 END) AS julio,
SUM(CASE WHEN MONTH(venta_fregistro)=8 THEN venta_total ELSE 0 END) AS agosto,
SUM(CASE WHEN MONTH(venta_fregistro)=9 THEN venta_total ELSE 0 END) AS setiembre,
SUM(CASE WHEN MONTH(venta_fregistro)=10 THEN venta_total ELSE 0 END) AS octubre,
SUM(CASE WHEN MONTH(venta_fregistro)=11 THEN venta_total ELSE 0 END) AS noviembre,
SUM(CASE WHEN MONTH(venta_fregistro)=12 THEN venta_total ELSE 0 END) AS diciembre,
SUM(venta_total) as total
FROM venta
WHERE venta_estado ='PAGADA'
GROUP BY YEAR(venta_fregistro)//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_APERTURA_CAJA
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_APERTURA_CAJA`(IN DESCRIPCION VARCHAR(100), IN MONTO_INI DECIMAL(10,2))
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM caja where caja_estado='VIGENTE');
if @CANTIDAD = 0 THEN
	INSERT INTO caja (caja_descripcion, caja_monto_inicial, caja_fecha_ap, caja_estado, caja_hora_aper) VALUES(DESCRIPCION, MONTO_INI, CURDATE(), 'VIGENTE', CURRENT_TIME());
SELECT 1;
ELSE
SELECT 2;
END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_CAJA_CIERRE
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_CAJA_CIERRE`(IN MONTO_VEN DECIMAL(10,2), IN CANT_VENT VARCHAR(255), IN MONTO_EGRES DECIMAL(10,2),  IN CANT_EGRES VARCHAR(255), IN MONTO_TOTAL DECIMAL(10,2), IN MONTO_SERVI DECIMAL(10,2), IN CANT_SERV VARCHAR(255), IN MONTO_INGRE DECIMAL(10,2), IN CANT_INGRE VARCHAR(50))
UPDATE caja SET 
caja_monto_final =MONTO_VEN,
caja_monto_egreso = MONTO_EGRES, 
caja_fecha_cie= CURDATE(), 
caja_total_ingreso= CANT_VENT, 
caja_total_egreso = CANT_EGRES, 
caja_monto_total = MONTO_TOTAL, 
caja_estado = 'CERRADO',
caja_monto_servicio = MONTO_SERVI,
caja_total_servicio = CANT_SERV,
caja_hora_cierre = CURRENT_TIME(),
caja_monto_ingreso = MONTO_INGRE,
caja_coun_ingreso = CANT_INGRE
WHERE caja.caja_estado = 'VIGENTE'//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_CATEGORIA
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_CATEGORIA`(IN CATEGORIA VARCHAR(25))
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM categoria where categoria_descripcion=CATEGORIA);
if @CANTIDAD = 0 THEN
INSERT into categoria(categoria_descripcion,categoria_estado)values(CATEGORIA,'ACTIVO');
SELECT 1;
ELSE
SELECT 2;
END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_CLIENTE
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_CLIENTE`(IN `NOMBRE` VARCHAR(100), IN `DNI` VARCHAR(20), IN `CELULAR` VARCHAR(20), IN `DIRECCION` VARCHAR(255), IN `APE_P` VARCHAR(255), IN `APE_M` VARCHAR(255), IN `CORREO` VARCHAR(255), IN `TIPODOC` VARCHAR(50))
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM cliente where cliente_dni=DNI );
IF @CANTIDAD = 0 THEN
	INSERT INTO cliente(cliente_nombres,cliente_celular,cliente_dni,cliente_fregistro,cliente_estado,cliente_direccion,cliente_ape_p,cliente_ape_m, cliente_correo, cliente_tipo_doc) VALUES(NOMBRE,CELULAR,DNI,CURDATE(),'ACTIVO',DIRECCION,			APE_P, APE_M, CORREO, TIPODOC);
	SELECT 1;
ELSE
	SELECT 2;
END IF;

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_COMPROBANTE
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_COMPROBANTE`(IN TIPO VARCHAR(100),IN SERIE VARCHAR(100),IN NUMERO VARCHAR(100))
INSERT into comprobante(compro_tipo,compro_serie,compro_numero,compro_estado)values(TIPO, SERIE,NUMERO,'ACTIVO')//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_COTIZACION
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_COTIZACION`(IN IDPROVEEDOR INT, IN COMPROBANTE VARCHAR(255), IN SERIE VARCHAR(255), IN IMPUESTO DECIMAL(10,2),IN TOTAL DECIMAL(10,2),IN IDCOMPROBANTE INT,IN PORCENTAJE DECIMAL(10,2),IN IDUSUARIO INT, IN ATIENDE VARCHAR(255), IN DIASVAL VARCHAR(10), IN FORMAPAGO INT)
BEGIN

DECLARE COMPRO INT;
DECLARE CORRELATIVO INT;
SET @COMPRO:=(SELECT compro_numero FROM comprobante WHERE compro_id=IDCOMPROBANTE);
SET @CORRELATIVO:=(SELECT COUNT(*) FROM comprobante WHERE compro_numero=@COMPRO);		

INSERT INTO cotizacion(cliente_id,coti_comprobante,coti_serie,coti_num_comprobante,coti_fregistro,coti_impuesto,coti_total,coti_estado,compro_id,coti_porcentaje,usu_id,coti_hora,coti_atiende,coti_dias,fpago_id) VALUES (IDPROVEEDOR,COMPROBANTE,SERIE,@COMPRO,CURDATE(),IMPUESTO,TOTAL,'ACTIVO',IDCOMPROBANTE,PORCENTAJE,IDUSUARIO,CURRENT_TIME(),ATIENDE,DIASVAL,FORMAPAGO);
SELECT LAST_INSERT_ID();
		




UPDATE comprobante SET 
		compro_numero=LPAD( @COMPRO + 1, 6, '0')
		where compro_id=IDCOMPROBANTE;





END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_DETALLE_COTIZACION
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_DETALLE_COTIZACION`(IN IDCOTI INT, IN PRODUCTO INT, IN CANTIDAD DECIMAL(10,2), IN PRECIO DECIMAL(10,2))
BEGIN
INSERT INTO cotizacion_detalle(coti_id, producto_id,coti_detalle_cantidad,coti_detalle_precio,coti_detalle_estado,coti_detalle_fecha)VALUES(IDCOTI,PRODUCTO,CANTIDAD,PRECIO,'ACTIVO',CURDATE());


END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_DETALLE_INSUMOS_RECEP
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_DETALLE_INSUMOS_RECEP`(IN p_id_rece INT, IN p_id_insumo INT, IN p_cantid VARCHAR(50), IN p_monto DECIMAL(10,2), IN p_idusuario INT)
BEGIN

DECLARE NOMUSUARIO VARCHAR(200);

SET @NOMUSUARIO:=(select usu_nombre from usuario where usu_id = p_idusuario );
set @preciocompra = (select producto_pcompra from producto where producto_id =p_id_insumo);

INSERT INTO recep_insumos(rece_id, producto_id, cantidad, monto_ri, fecha, precio_compra) 
VALUES(p_id_rece, p_id_insumo, p_cantid, p_monto, CURRENT_TIMESTAMP(), @preciocompra);


/* DISMINUIR STOCK*/
UPDATE   producto SET
producto_stock = producto_stock - p_cantid
WHERE producto_id = p_id_insumo;



set @precioventa = (select producto_pventa from producto where producto_id =p_id_insumo);
set @stock = (select producto_stock from producto where producto_id =p_id_insumo);

insert into kardex (kardex_fecha, kardex_tipo, kardex_salida, kardex_p_salida, kardex_total, producto_id, kardex_precio_general, venta_comprobante, tecnico) 
VALUES (CURDATE(),'SALIDA INSUMOS',p_cantid, @precioventa, @stock, p_id_insumo, @precioventa, CONCAT('R-000',p_id_rece), @NOMUSUARIO);






end//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_DETALLE_PROUCTO
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_DETALLE_PROUCTO`(IN IDPRO INT, IN PRODUCTO VARCHAR(50))
BEGIN
INSERT INTO producto_detalle(producto_id, imei, fecha, vendido)VALUES(IDPRO,PRODUCTO, CURDATE(), 'No');

		END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_DETALLE_RECE_EQUIPO
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_DETALLE_RECE_EQUIPO`(IN IDRECE INT, IN EQUIP VARCHAR(150), IN SERI VARCHAR(50), IN P_FALLA VARCHAR(250), IN MONT DECIMAL(10,2), IN ABON  DECIMAL(10,2))
BEGIN
INSERT INTO recep_equipo(rece_id, equipo, serie, monto, abono, fecha, falla)VALUES(IDRECE, EQUIP,SERI, MONT, ABON, CURDATE(), P_FALLA);


END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_DETALLE_VENTA
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_DETALLE_VENTA`(IN IDVENTA INT, IN PRODUCTO INT, IN CANTIDAD DECIMAL(10,2), IN PRECIO DECIMAL(10,2), IN P_IMEI VARCHAR(100), IN P_DESCUENTO DECIMAL(10,2))
BEGIN
INSERT INTO detalle_venta(venta_id, producto_id,vdetalle_cantidad,vdetalle_precio,vdetalle_estado,vdetalle_fecha, v_imei, vdetalle_descuento)VALUES(IDVENTA,PRODUCTO,CANTIDAD,PRECIO,'VENDIDO',CURDATE(), P_IMEI, P_DESCUENTO);

/*ACTUALIZAR EL IMEI SI SE VENDIO*/
UPDATE producto_detalle SET
	vendido='Si'
where producto_id= PRODUCTO and imei = P_IMEI;

set @preciocompra = (select producto_pcompra from producto where producto_id =PRODUCTO);
set @precioventa = (select producto_pventa from producto where producto_id =PRODUCTO);
set @stock = (select producto_stock from producto where producto_id =PRODUCTO);

set @COMPROBANTE = (select CONCAT_WS('-',venta_comprobante,venta_serie,venta_num_comprobante) as comprobante from venta where venta_id=IDVENTA);

set @ID_DETALLE_VENTA = LAST_INSERT_ID();

INSERT INTO kardex(kardex_fecha,kardex_tipo,kardex_salida,kardex_p_salida,kardex_total,producto_id,venta_id,vdetalle_id,venta_comprobante,kardex_precio_general, imei) 
VALUES(CURDATE(),'SALIDA',CANTIDAD,@precioventa,@stock,PRODUCTO,IDVENTA,@ID_DETALLE_VENTA,@COMPROBANTE,@preciocompra, P_IMEI );
		END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_DIAGNOSTICO
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_DIAGNOSTICO`(IN IDRECEPC INT, IN IDEQUIP INT, IN DIAGNOSTICO VARCHAR(255))
BEGIN

UPDATE recep_equipo SET
diagnostico = DIAGNOSTICO
WHERE rece_id = IDRECEPC   and id_equipo = IDEQUIP;

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_EMPRESA
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_EMPRESA`(IN RAZON VARCHAR(255), IN RUC VARCHAR(255), IN REPRE VARCHAR(255), IN DIRECCION VARCHAR(255), IN CELULAR VARCHAR(255), IN TELEFONO VARCHAR(255), IN CORREO VARCHAR(255), IN RUTA VARCHAR(255), in URL VARCHAR(255), IN CUENTA01 VARCHAR(100),IN NRO_CUENTA01 VARCHAR(100),IN CUENTA02 VARCHAR(100),IN NRO_CUENTA02 VARCHAR(100))
BEGIN
DECLARE CANT INT;
SET @CANT:=(SELECT COUNT(*) FROM configuracion WHERE confi_ruc = BINARY RUC);
IF @CANT = 0 THEN
	INSERT INTO configuracion(confi_razon_social,confi_ruc,confi_nombre_representante,confi_direccion,confi_celular,confi_telefono,confi_correo,config_foto,confi_estado,confi_url,confi_cnta01,confi_nro_cuenta01,confi_cnta02,confi_nro_cuenta02)
	VALUES (RAZON,RUC,REPRE,DIRECCION,CELULAR,TELEFONO,CORREO,RUTA,'ACTIVO',URL,CUENTA01,NRO_CUENTA01,CUENTA02,NRO_CUENTA02);
SELECT 1;
ELSE
	SELECT 2;
END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_FORMA_PAGO
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_FORMA_PAGO`(IN FORMAPAGO VARCHAR(255))
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM forma_pago where fpago_descripcion=FORMAPAGO);
if @CANTIDAD = 0 THEN
INSERT into forma_pago(fpago_descripcion,fpago_estado)values(FORMAPAGO,'ACTIVO');
SELECT 1;
ELSE
SELECT 2;
END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_GASTOS
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_GASTOS`(IN GASTO VARCHAR(255),IN NOMTO INT,IN RESPONSABLE VARCHAR(255), IN TIPO_M VARCHAR(50))
INSERT into gastos(gastos_descripcion,gastos_monto,gastos_responsable,gastos_fregistro,gastos_estado, estado_caja, tipo_mov)values(GASTO,NOMTO,RESPONSABLE,CURDATE(),'ACTIVO', 'ABIERTO', TIPO_M)//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_INSUMOS_REPARACION
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_INSUMOS_REPARACION`(IN IDRECEP INT, IN IDPROD INT, IN CANTD VARCHAR(50), IN MONTOTOT DECIMAL(10,2), IN IDUSUA INT)
BEGIN

DECLARE CANTIDAD INT;
DECLARE NOMUSUARIO VARCHAR(200);

SET @CANTIDAD:=(select COUNT(*) from recep_insumos where rece_id = IDRECEP   AND  producto_id = IDPROD );
SET @NOMUSUARIO:=(select usu_nombre from usuario where usu_id = IDUSUA );

IF @CANTIDAD = 0 THEN
INSERT INTO recep_insumos (rece_id, producto_id, cantidad, fecha, monto_ri) VALUES (IDRECEP, IDPROD, CANTD, CURRENT_TIMESTAMP(), MONTOTOT );


/* DISMINUIR STOCK*/
UPDATE   producto SET
producto_stock = producto_stock - CANTD
WHERE producto_id = IDPROD;


/* INSERTAR EN KARDEX*/
set @precioventa = (select producto_pventa from producto where producto_id =IDPROD);
set @stock = (select producto_stock from producto where producto_id =IDPROD);

insert into kardex (kardex_fecha, kardex_tipo, kardex_salida, kardex_p_salida, kardex_total, producto_id, kardex_precio_general, venta_comprobante, tecnico) 
VALUES (CURDATE(),'SALIDA INSUMOS',CANTD,@precioventa,@stock,IDPROD,@precioventa, CONCAT('R-000',IDRECEP), @NOMUSUARIO);




SELECT 1;
ELSE
	SELECT 2;
END IF;

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_MARCA
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_MARCA`(IN MARCA VARCHAR(25))
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM marca where marca_descripcion=MARCA);
if @CANTIDAD = 0 THEN
INSERT into marca(marca_descripcion,marca_estado)values(MARCA,'ACTIVO');
SELECT 1;
ELSE
SELECT 2;
END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_MOTIVO
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_MOTIVO`(IN MOTIVO VARCHAR(255))
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM motivo where motivo_descripcion=MOTIVO);
if @CANTIDAD = 0 THEN
INSERT into motivo(motivo_descripcion,motivo_estado)values(MOTIVO,'ACTIVO');
SELECT 1;
ELSE
SELECT 2;
END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_NOTAS
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_NOTAS`(IN p_descrip VARCHAR(250), IN p_idusuario INT)
BEGIN

INSERT INTO notas(descripcion, estado,  fecha, usu_id ) VALUES(p_descrip, '1', CURRENT_TIMESTAMP(), p_idusuario);

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_PRODUCTO
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_PRODUCTO`(IN PRODUCTO VARCHAR(100),IN IDMARCA INT, IN IDCATEGORIA INT,IN STOCK INT, IN PCOMPRA DECIMAL (10,2), IN PVENTA DECIMAL (10,2), IN COD_GENERAL VARCHAR(255), IN PROVEE INT,IN RUTA VARCHAR(255), IN IDUNIDAD INT, IN P_IMEI VARCHAR(10))
BEGIN
INSERT INTO producto(producto_nombre,marca_id,categoria_id,producto_stock,producto_pcompra,producto_pventa,producto_fregistro,producto_estado,producto_stock_inicial,producto_codigo_general,cliente_id, producto_foto, unidad_id, pro_imei) VALUES(PRODUCTO,IDMARCA,IDCATEGORIA,STOCK,PCOMPRA,PVENTA,CURDATE(),'ACTIVO',STOCK,COD_GENERAL,PROVEE,RUTA,IDUNIDAD, P_IMEI );
	SELECT LAST_INSERT_ID();
/*
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM producto where producto_nombre COLLATE utf8mb4_general_ci =PRODUCTO OR producto_codigo_general COLLATE utf8mb4_general_ci = COD_GENERAL );
IF @CANTIDAD = 0 THEN
	INSERT INTO producto(producto_nombre,marca_id,categoria_id,producto_stock,producto_pcompra,producto_pventa,producto_fregistro,producto_estado,producto_stock_inicial,producto_codigo_general,cliente_id, producto_foto, unidad_id) VALUES(PRODUCTO,IDMARCA,IDCATEGORIA,STOCK,PCOMPRA,PVENTA,CURDATE(),'ACTIVO',STOCK,COD_GENERAL,PROVEE,RUTA,IDUNIDAD );

	SELECT 1;
ELSE
	SELECT 2;
END IF;*/

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_PROVEEDOR
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_PROVEEDOR`(IN RUC VARCHAR(30),IN RAZON VARCHAR(255),IN DIRECCION VARCHAR(255),IN CELULAR VARCHAR(20))
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM proveedor where prove_ruc=RUC);
if @CANTIDAD = 0 THEN
INSERT into proveedor(prove_ruc,prove_razon,prove_direccion,prove_celular,prove_fregistro,prove_estado)values(RUC,RAZON,DIRECCION,CELULAR,CURDATE(),'ACTIVO');
SELECT 1;
ELSE
SELECT 2;
END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_RECEPCION
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_RECEPCION`(IN MONTO DECIMAL(10,2),IN IDCLIENTE INT, IN IDMOTIVO INT,IN ADELANTO DECIMAL (10,2) ,IN DEBE DECIMAL (10,2),IN ACCESORIOS VARCHAR(255), IN FENTREGA DATE, IN COD_REC VARCHAR(50), IN TECNICOID INT, IN USUA_ID INT, IN RUTA VARCHAR(255))
BEGIN
INSERT INTO recepcion(cliente_id, motivo_id, rece_monto, rece_fregistro, rece_estado, rece_estatus, rece_adelanto, rece_debe, rece_concepto,rece_fentrega, rece_cod, marca_id, tecnico, usuario_registrador, rece_foto1)
	VALUES(IDCLIENTE,   IDMOTIVO, MONTO,CURDATE(),'EN REPARACION','ACTIVO',ADELANTO,DEBE,ACCESORIOS,FENTREGA, COD_REC, 1, TECNICOID, USUA_ID, RUTA);
	 SELECT LAST_INSERT_ID();
	-- SET @ID_RECE = LAST_INSERT_ID();
	
	SET @cajaid = (select caja_id from caja where caja_estado = 'VIGENTE');
	
-- 	INSERT INTO servicio (rece_id, servicio_monto, servicio_concepto, servicio_responsable, servicio_fregistro, servicio_entrega, servicio_estado, estado_caja, caja_id, tecnico_servi)
-- 	VALUES(LAST_INSERT_ID() , MONTO, ACCESORIOS, 'CARLOS', CURDATE(), 'EN REPARACION', 'ACTIVO', 'ABIERTO', @cajaid, TECNICOID );
	END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_REPARACION
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_REPARACION`(IN IDRECEPC INT, IN DESCRIP VARCHAR(255), IN ESTADOREP VARCHAR(255))
BEGIN

UPDATE recepcion SET
diagnostico_tecnico = DESCRIP,
rece_estado = ESTADOREP
WHERE rece_id = IDRECEPC  ;

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_ROL
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_ROL`(IN ROL VARCHAR(25))
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM rol where rol_nombre=ROL);
if @CANTIDAD = 0 THEN
INSERT into rol(rol_nombre,rol_fregistro,rol_estado)values(ROL,CURDATE(),'ACTIVO');
SELECT 1;
ELSE
SELECT 2;
END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_SERVICIO
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_SERVICIO`(IN IDRECE INT, IN MONTO INT,IN CONCEPTO VARCHAR(255),IN RESPONSABLE VARCHAR(255),IN COMENTARIO VARCHAR(255), IN OBSERVA VARCHAR(200), IN MODELO VARCHAR(200),  IN IDFORMA_P INT, IN MONTO_EFEC DECIMAL(10,2), IN COD_OPERA VARCHAR(20), IN MONTO_TARJ DECIMAL(10,2), IN IDCAJA INT , IN IDTECNICO INT, IN ESTADOSERV VARCHAR(100))
BEGIN
INSERT INTO servicio(rece_id,servicio_monto,servicio_concepto,servicio_responsable,servicio_comentario,servicio_fregistro,servicio_entrega,servicio_estado, estado_caja, servicio_obser, servicio_modelo, fpago_id, monto_efectivo, cod_operacion, monto_tarjeta, caja_id, tecnico_servi) 
VALUES(IDRECE,MONTO,CONCEPTO,RESPONSABLE,COMENTARIO,CURDATE(),ESTADOSERV,'ACTIVO', 'ABIERTO', OBSERVA, MODELO, IDFORMA_P, MONTO_EFEC, COD_OPERA, MONTO_TARJ, IDCAJA, IDTECNICO);




UPDATE recepcion SET
rece_estado = 'ENTREGADO'
WHERE rece_id = IDRECE;


END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_TEST
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_TEST`(IN IDRECEP INT , IN ENCIEND VARCHAR(3) , IN TACTI VARCHAR(3), IN IMG VARCHAR(3), IN VIBRA VARCHAR(3), IN COBER VARCHAR(3), IN SENSO VARCHAR(3), IN CARG VARCHAR(3), IN BLUET VARCHAR(3), IN WIF VARCHAR(3), IN HUELL VARCHAR(3), IN HOM VARCHAR(3), IN `LATERA` VARCHAR(3), IN CAMAR VARCHAR(3), IN BATE VARCHAR(3), IN AURICUL VARCHAR(3), IN MICRO VARCHAR(3), IN FACE_ID VARCHAR(3), IN TORNIL VARCHAR(3))
BEGIN
UPDATE recepcion SET
enciende = ENCIEND,
tactil = TACTI,
imagen = IMG,
vibra = VIBRA,
cobertura = COBER,
sensor = SENSO,
carga = CARG,
bluetoo = BLUET,
wifi = WIF,
huella = HUELL,
home = HOM,
`lateral` = `LATERA`,
camara = CAMAR,
bateria = BATE,
auricular = AURICUL,
micro = MICRO,
face = FACE_ID ,
tornillo = TORNIL

where rece_id = IDRECEP;
END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_UNIDAD_MEDIDA
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_UNIDAD_MEDIDA`(IN DESCRIPCION VARCHAR(25),IN ABREVIATURA VARCHAR(25))
BEGIN
DECLARE CANTIDAD INT;
SET @CANTIDAD:=(SELECT COUNT(*) FROM unidadmedida where unidad_descripcion COLLATE utf8mb4_general_ci=DESCRIPCION or unidad_abrevia COLLATE utf8mb4_general_ci= ABREVIATURA);
if @CANTIDAD = 0 THEN
INSERT into unidadmedida(unidad_descripcion, unidad_abrevia,unidad_estado)values(DESCRIPCION,ABREVIATURA,'ACTIVO');
SELECT 1;
ELSE
SELECT 2;
END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_USUARIOS
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_USUARIOS`(IN USUARIO VARCHAR(20), IN CLAVE VARCHAR(255),IN CORREO VARCHAR(255),IN ROL INT,IN RUTA VARCHAR(255))
BEGIN
DECLARE CANT INT;
SET @CANT:=(SELECT COUNT(*) FROM usuario WHERE usu_nombre = BINARY USUARIO);
IF @CANT = 0 THEN
	INSERT INTO usuario(usu_nombre, usu_contrasena, usu_email, rol_id, usu_foto, usu_estado)
	VALUES(USUARIO, CLAVE, CORREO, ROL, RUTA,'ACTIVO');
	
	SELECT 1;
ELSE
	SELECT 2;
END IF;



END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_VENTA
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_VENTA`(IN IDCLIENTE INT, IN COMPROBANTE VARCHAR(255), IN SERIE VARCHAR(255), IN NUMERO VARCHAR(255), IN IMPUESTO DECIMAL(10,2),IN TOTAL DECIMAL(10,2),IN IDCOMPROBANTE INT,IN PORCENTAJE DECIMAL(10,2),IN IDUSUARIO INT,IN IDFPAGO INT, IN OBSERVA VARCHAR(200),  IN MONT_EFECT DECIMAL(10,2),  IN COD_OPERAC VARCHAR(50),  IN MONTO_TARJET DECIMAL(10,2), IN IDCAJA INT, IN P_DESCUENTO DECIMAL(10,2))
BEGIN
INSERT INTO venta(cliente_id,venta_comprobante,venta_serie,venta_num_comprobante,venta_fregistro,venta_impuesto,venta_total,venta_estado,compro_id,venta_porcentaje,usu_id,venta_hora, fpago_id,observacion, estado_caja, monto_efectivo, cod_operacion, monto_tarjeta, caja_id, venta_descuento) 
VALUES (IDCLIENTE,COMPROBANTE,SERIE,NUMERO,CURDATE(),IMPUESTO,TOTAL,'PAGADA',IDCOMPROBANTE,PORCENTAJE,IDUSUARIO,CURRENT_TIME(),IDFPAGO,OBSERVA, 'ABIERTO', MONT_EFECT, COD_OPERAC, MONTO_TARJET, IDCAJA, P_DESCUENTO);
SELECT LAST_INSERT_ID();

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REGISTRAR_VISTA_INICIO
DELIMITER //
CREATE PROCEDURE `SP_REGISTRAR_VISTA_INICIO`(IN p_mendid INT, IN p_rolid INT)
BEGIN

	UPDATE td_menu_detalle 
	SET vista_inicio = '0' 
	WHERE
	rol_id = p_rolid;

	UPDATE td_menu_detalle 
	SET vista_inicio = '1' 
	WHERE
	rol_id = p_rolid 
	AND mend_id = p_mendid;


END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REPORTE_CAJA_CHICA
DELIMITER //
CREATE PROCEDURE `SP_REPORTE_CAJA_CHICA`(IN FINICIO DATE, IN FFIN DATE)
SELECT
	caja.caja_id, 
	caja.caja_descripcion, 	
	caja.caja_monto_inicial, 
	caja.caja_monto_servicio,
	caja.caja_monto_final, 
	caja.caja_monto_egreso,
  CONCAT_WS(' ',DATE_FORMAT(caja.caja_fecha_ap, '%d/%m/%Y') , caja.caja_hora_aper) as  caja_fecha_ap,
	CONCAT_WS(' ',DATE_FORMAT(caja.caja_fecha_cie, '%d/%m/%Y') , caja_hora_cierre) as caja_fecha_cie,
	caja.caja_total_ingreso, 
	caja.caja_total_egreso, 
-- 	SUM(caja.caja_monto_inicial + caja.caja_monto_final) - caja_monto_egreso  AS suma,
	caja.caja_monto_total, 
	caja.caja_estado
FROM
	caja
	WHERE caja.caja_fecha_ap BETWEEN FINICIO AND FFIN
	ORDER BY caja_id DESC
	-- where caja.caja_estado = 'VIGENTE'//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REPORTE_GASTO_ANUAL
DELIMITER //
CREATE PROCEDURE `SP_REPORTE_GASTO_ANUAL`(IN ANIO VARCHAR(10))
SELECT  
YEAR(a.gastos_fregistro) as ano,
count(a.gastos_monto) as cant_gastos,
MONTH(a.gastos_fregistro) as numero_mes, 
MONTHname(MIN(a.gastos_fregistro)) as mes, 
SUM(a.gastos_monto) as gasto,
case month(MIN(a.gastos_fregistro)) 
WHEN 1 THEN 'Enero'
WHEN 2 THEN  'Febrero'
WHEN 3 THEN 'Marzo' 
WHEN 4 THEN 'Abril' 
WHEN 5 THEN 'Mayo'
WHEN 6 THEN 'Junio'
WHEN 7 THEN 'Julio'
WHEN 8 THEN 'Agosto'
WHEN 9 THEN 'Septiembre'
WHEN 10 THEN 'Octubre'
WHEN 11 THEN 'Noviembre'
WHEN 12 THEN 'Diciembre'
 END mesnombre  
from gastos a
where a.gastos_estado='ACTIVO' and YEAR(a.gastos_fregistro) =ANIO
GROUP BY YEAR(a.gastos_fregistro),
month(a.gastos_fregistro)//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REPORTE_GASTO_FECHA
DELIMITER //
CREATE PROCEDURE `SP_REPORTE_GASTO_FECHA`(IN FINICIO DATE, IN FFIN DATE)
SELECT
	* ,
	(select SUM(gastos_monto) from gastos WHERE gastos_fregistro BETWEEN FINICIO AND FFIN )
FROM
	gastos
	WHERE gastos_fregistro BETWEEN FINICIO AND FFIN//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REPORTE_GASTO_MES
DELIMITER //
CREATE PROCEDURE `SP_REPORTE_GASTO_MES`(IN MES VARCHAR(5))
SELECT
	gastos.gastos_id, 
	gastos.gastos_descripcion, 
	gastos.gastos_monto, 
	gastos.gastos_responsable, 
	gastos.gastos_fregistro, 
	gastos.gastos_estado,
	gastos.tipo_mov
FROM
	gastos
	WHERE gastos.gastos_estado ='ACTIVO' 
	and (select MONTH(gastos_fregistro))=MES
		and YEAR(gastos_fregistro)=YEAR(CURDATE())
		ORDER BY gastos_id DESC//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REPORTE_GASTO_TOTAL_ANUAL
DELIMITER //
CREATE PROCEDURE `SP_REPORTE_GASTO_TOTAL_ANUAL`()
SELECT 
YEAR(gastos_fregistro) as ano,
SUM(gastos_monto) as total_gasto_ano 
FROM gastos
where gastos_estado='ACTIVO'  GROUP BY YEAR(gastos_fregistro)//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REPORTE_LISTAR_TOTAL_VENTAS_CAJA
DELIMITER //
CREATE PROCEDURE `SP_REPORTE_LISTAR_TOTAL_VENTAS_CAJA`()
SELECT 
	(select MAX(caja_monto_inicial) from caja where caja_estado = 'VIGENTE') as monto_inicial_caja,

	(select COUNT(venta_total) from venta where estado_caja = 'ABIERTO' AND venta_estado = 'PAGADA') as cant_ventas,
	(select IFNULL(SUM(venta_total),0) from venta where estado_caja = 'ABIERTO' AND venta_estado = 'PAGADA') as suma_ventas,
	
	
	
	(select COUNT(gastos_monto)  from gastos where estado_caja = 'ABIERTO'  AND gastos_estado = 'ACTIVO' and tipo_mov = 'EGRESO') as cant_egreso,
	(select IFNULL(SUM(gastos_monto),0) from gastos where estado_caja = 'ABIERTO' AND gastos_estado = 'ACTIVO' and tipo_mov = 'EGRESO') as suma_egreso,
	
	
	
	(select caja_estado from caja where caja_estado = 'VIGENTE' ) as estado,
	(select  CONCAT_WS(' ',DATE_FORMAT(caja.caja_fecha_ap, '%d/%m/%Y'), caja.caja_hora_aper)  from caja where caja_estado = 'VIGENTE' ) as fecha_apertura,
	(select COUNT(servicio_monto) from servicio where servicio_estado = 'ACTIVO' AND estado_caja = 'ABIERTO') as cant_servicio,
  (select IFNULL(SUM(servicio_monto),0) from servicio where servicio_estado = 'ACTIVO' AND estado_caja = 'ABIERTO') as suma_servicio,
	
	(select COUNT(gastos_monto)  from gastos where estado_caja = 'ABIERTO'  AND gastos_estado = 'ACTIVO' and tipo_mov = 'INGRESO') as cant_ingreso,
	(select IFNULL(SUM(gastos_monto),0) from gastos where estado_caja = 'ABIERTO' AND gastos_estado = 'ACTIVO' and tipo_mov = 'INGRESO') as suma_ingreso,

	
	
	(select confi_moneda from configuracion ) as moneda,
	
		(select caja_id from caja where caja_estado = 'VIGENTE' ) as idcaja,
		(select url_sistema from configuracion  ) as url_sistema, 	
		(select cod_pais from configuracion  ) as cod_sistema//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REPORTE_MOVIMIENTOS_PORPRODUCTO_CONIMEI
DELIMITER //
CREATE PROCEDURE `SP_REPORTE_MOVIMIENTOS_PORPRODUCTO_CONIMEI`(IN PRODUCT_ID  INT)
SELECT
	k.producto_id,
	p.producto_codigo_general,
	IFNULL(k.venta_comprobante, '-') as comprobante,
-- 	(SELECT  GROUP_CONCAT(CONCAT('  ' , pd.imei  )) AS equipos from producto_detalle pd where pd.producto_id = 14) as equiposs,
	k.kardex_tipo,
	DATE_FORMAT(k.kardex_fecha, '%d/%m/%Y') as fecha, 
	k.kardex_ingreso,
	k.kardex_salida,
IFNULL(k.imei, '-') as imei
FROM
  kardex k INNER JOIN producto p ON
	k.producto_id = p.producto_id
WHERE
	k.producto_id COLLATE utf8mb4_general_ci = PRODUCT_ID
	AND k.kardex_tipo IN ('INICIAL', 'INGRESO', 'SALIDA', 'SALIDA DIRECTA', 'SALIDA INSUMOS', 'DEVOLUCION INSUMO')//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REPORTE_MOVIMIENTOS_PORPRODUCTO_SIN_IMEI
DELIMITER //
CREATE PROCEDURE `SP_REPORTE_MOVIMIENTOS_PORPRODUCTO_SIN_IMEI`(IN PRODUCT_ID  INT)
SELECT
	k.producto_id,
	p.producto_codigo_general,
	IFNULL(k.venta_comprobante, '-') as comprobante,
-- 	(SELECT  GROUP_CONCAT(CONCAT('  ' , pd.imei  )) AS equipos from producto_detalle pd where pd.producto_id = 14) as equiposs,
	k.kardex_tipo,
	DATE_FORMAT(k.kardex_fecha, '%d/%m/%Y') as fecha, 
	k.kardex_ingreso,
	k.kardex_salida,
	IFNULL(k.tecnico, '-') as tecnico
FROM
	 kardex k INNER JOIN producto p ON
	k.producto_id = p.producto_id
WHERE
	k.producto_id COLLATE utf8mb4_general_ci = PRODUCT_ID
	AND k.kardex_tipo IN ('INICIAL', 'INGRESO', 'SALIDA', 'SALIDA DIRECTA', 'SALIDA INSUMOS', 'DEVOLUCION INSUMO')//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REPORTE_PRODUCTO_EN_SAL
DELIMITER //
CREATE PROCEDURE `SP_REPORTE_PRODUCTO_EN_SAL`()
SELECT
	-- kardex.kardex_id,
	-- kardex.kardex_tipo ,
	k.producto_id, 
	 MAX(k.producto_codigo) as codigo, 
	 MAX(p.producto_nombre) as nombre, 
	 MAX(k.kardex_p_ingreso) as precio, 
	IFNULL(SUM(k.kardex_ingreso),0) as ingresos,
	IFNULL(sum(k.kardex_salida),0) as salidas,
IFNULL((SUM(k.kardex_ingreso) - sum(k.kardex_salida) ),SUM(k.kardex_ingreso)) as stock_actual,
p.pro_imei,
p.producto_codigo_general
FROM
	kardex k INNER JOIN producto p ON
	k.producto_id = p.producto_id
	where  k.kardex_tipo IN ('INICIAL', 'INGRESO', 'SALIDA', 'SALIDA DIRECTA', 'SALIDA INSUMOS', 'DEVOLUCION INSUMO')
	GROUP BY 
	 k.producto_id//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REPORTE_SERVICIO_ANUAL
DELIMITER //
CREATE PROCEDURE `SP_REPORTE_SERVICIO_ANUAL`(IN ANIO VARCHAR(10))
SELECT  
YEAR(s.servicio_fregistro) as ano,
    COUNT(s.servicio_fregistro) as cant_servicio,
    MONTH(s.servicio_fregistro) as numero_mes, 
    MONTHNAME(MIN(s.servicio_fregistro)) as mes, 
    SUM(s.servicio_monto) as monto_servicio,
    CASE MONTH(MIN(s.servicio_fregistro)) 
WHEN 1 THEN 'Enero'
WHEN 2 THEN  'Febrero'
WHEN 3 THEN 'Marzo' 
WHEN 4 THEN 'Abril' 
WHEN 5 THEN 'Mayo'
WHEN 6 THEN 'Junio'
WHEN 7 THEN 'Julio'
WHEN 8 THEN 'Agosto'
WHEN 9 THEN 'Septiembre'
WHEN 10 THEN 'Octubre'
WHEN 11 THEN 'Noviembre'
WHEN 12 THEN 'Diciembre'
 END mesnombre  
from servicio s
where YEAR(s.servicio_fregistro) =ANIO
GROUP BY YEAR(s.servicio_fregistro), MONTH(s.servicio_fregistro)//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REPORTE_SERVICIO_FECHAS_TECNICO
DELIMITER //
CREATE PROCEDURE `SP_REPORTE_SERVICIO_FECHAS_TECNICO`(IN FEINI DATE, IN FEFIN DATE, IN USUAID INT)
BEGIN
  IF USUAID IS NOT NULL THEN
        SELECT
            s.servicio_id, 
            CONCAT( ' R-000',s.rece_id ) as referencia, 
						r.rece_cod as r_codig,
            c.cliente_nombres,
            s.servicio_concepto,
            s.servicio_monto,  
            s.servicio_responsable, 
            s.servicio_entrega,
						DATE_FORMAT( s.servicio_fregistro, '%d/%m/%Y') as servicio_fregistro,
            s.servicio_comentario, 	
            s.tecnico_servi,
						DATE_FORMAT(r.rece_fregistro, '%d/%m/%Y') as rece_fregistro,
						DATEDIFF(s.servicio_fregistro, r.rece_fregistro) AS dias_diferencia,
						fp.fpago_descripcion
						
        FROM
            servicio s
            INNER JOIN recepcion r ON s.rece_id = r.rece_id
            INNER JOIN cliente c ON r.cliente_id = c.cliente_id 
						INNER JOIN forma_pago fp ON s.fpago_id = fp.fpago_id
						
        WHERE 
            DATE(s.servicio_fregistro) BETWEEN FEINI AND FEFIN AND s.tecnico_servi = USUAID
						GROUP BY 
    s.servicio_id, s.rece_id, r.rece_cod, c.cliente_nombres, s.servicio_concepto, s.servicio_monto, s.servicio_responsable, s.servicio_entrega, s.servicio_fregistro, s.servicio_comentario, s.tecnico_servi, r.rece_fregistro, fp.fpago_descripcion
ORDER BY 
            s.servicio_fregistro;
					
    ELSE
        SELECT
            s.servicio_id, 
            CONCAT( ' R-000',s.rece_id ) as referencia, 
						r.rece_cod as r_codig,
            c.cliente_nombres,
            s.servicio_concepto,
            s.servicio_monto,  
            s.servicio_responsable, 
            s.servicio_entrega,
            DATE_FORMAT( s.servicio_fregistro, '%d/%m/%Y') as servicio_fregistro,
            s.servicio_comentario, 	
            s.tecnico_servi,
						DATE_FORMAT(r.rece_fregistro, '%d/%m/%Y') as rece_fregistro,
						DATEDIFF(s.servicio_fregistro, r.rece_fregistro) AS dias_diferencia,
						fp.fpago_descripcion
						
						
        FROM
            servicio s
            INNER JOIN recepcion r ON s.rece_id = r.rece_id
            INNER JOIN cliente c ON r.cliente_id = c.cliente_id 
						INNER JOIN forma_pago fp ON s.fpago_id = fp.fpago_id
			
        WHERE 
            DATE(s.servicio_fregistro) BETWEEN FEINI AND FEFIN 
							GROUP BY 
    s.servicio_id, s.rece_id, r.rece_cod, c.cliente_nombres, s.servicio_concepto, s.servicio_monto, s.servicio_responsable, s.servicio_entrega, s.servicio_fregistro, s.servicio_comentario, s.tecnico_servi, r.rece_fregistro, fp.fpago_descripcion
ORDER BY 
            s.servicio_fregistro;
					
    END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REPORTE_SERVICIO_MES
DELIMITER //
CREATE PROCEDURE `SP_REPORTE_SERVICIO_MES`(IN MES VARCHAR(5))
SELECT
	servicio.servicio_id, 
	servicio.rece_id, 
	recepcion.cliente_id, 
	cliente.cliente_nombres, 
	CONCAT_WS(' - ',recepcion.rece_equipo,recepcion.rece_concepto) as concepto, 
	recepcion.rece_monto, 
	recepcion.rece_estado, 
	servicio.servicio_monto, 
	servicio.servicio_concepto, 
	servicio.servicio_responsable, 
	servicio.servicio_comentario, 
	servicio.servicio_entrega,
	servicio.servicio_fregistro,
	servicio.servicio_estado
FROM
	servicio
	INNER JOIN
	recepcion
	ON 
		servicio.rece_id = recepcion.rece_id
	INNER JOIN
	cliente
	ON 
		recepcion.cliente_id = cliente.cliente_id 
		WHERE MONTH(servicio_fregistro)=MES
		and YEAR(servicio_fregistro)=YEAR(CURDATE())
		ORDER BY servicio.servicio_fregistro DESC//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REPORTE_UTILIDAD
DELIMITER //
CREATE PROCEDURE `SP_REPORTE_UTILIDAD`()
SELECT
	detalle_venta.producto_id, 
	CONCAT_WS(' | ',producto.producto_codigo, producto.producto_nombre) as producto, 

	detalle_venta.vdetalle_cantidad, 
		SUM(detalle_venta.vdetalle_cantidad) as cantida_vendidos,
	MAX(detalle_venta.vdetalle_precio - detalle_venta.vdetalle_descuento) as precio_venta,
	MAX(producto.producto_pcompra) as producto_pcompra, 
	(MAX(detalle_venta.vdetalle_precio - detalle_venta.vdetalle_descuento) - producto.producto_pcompra  ) as utilidad,

	 SUM((detalle_venta.vdetalle_precio - producto.producto_pcompra - detalle_venta.vdetalle_descuento) * detalle_venta.vdetalle_cantidad)  as suma_total
FROM
	producto
	INNER JOIN
	detalle_venta
	ON 
		producto.producto_id = detalle_venta.producto_id
	AND vdetalle_estado = 'VENDIDO'
		 GROUP BY detalle_venta.producto_id, detalle_venta.vdetalle_cantidad//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REPORTE_VENTA_ANIO
DELIMITER //
CREATE PROCEDURE `SP_REPORTE_VENTA_ANIO`(IN ANIO VARCHAR(10))
SELECT 
YEAR(v.venta_fregistro) as ano, 
MONTH(v.venta_fregistro) as numero_mes, 
MONTHname(MIN(v.venta_fregistro)) as mes,
count(v.venta_total) as cant_ventas,
SUM(v.venta_total) as total,
case month(MIN(v.venta_fregistro)) 
WHEN 1 THEN 'Enero'
WHEN 2 THEN  'Febrero'
WHEN 3 THEN 'Marzo' 
WHEN 4 THEN 'Abril' 
WHEN 5 THEN 'Mayo'
WHEN 6 THEN 'Junio'
WHEN 7 THEN 'Julio'
WHEN 8 THEN 'Agosto'
WHEN 9 THEN 'Septiembre'
WHEN 10 THEN 'Octubre'
WHEN 11 THEN 'Noviembre'
WHEN 12 THEN 'Diciembre'
 END mesnombre 
FROM venta v
where venta_estado ='PAGADA' and YEAR(v.venta_fregistro) =ANIO
GROUP BY YEAR(v.venta_fregistro),
month(v.venta_fregistro)//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REPORTE_VENTA_ANULADA
DELIMITER //
CREATE PROCEDURE `SP_REPORTE_VENTA_ANULADA`(IN MES VARCHAR(5),IN ANIO VARCHAR(10))
SELECT
	venta.venta_id, 
	MONTH(venta_fregistro) as numero_mes, 
	cliente.cliente_nombres, 
	
	CONCAT_WS(' - ',venta.venta_comprobante, venta.venta_serie,venta.venta_num_comprobante) AS comprobante, 
	venta.venta_total, 
	venta.venta_fregistro, 
	venta.venta_estado, 
	venta.compro_id, 
	venta.usu_id, 
	usuario.usu_nombre
FROM
	venta
	INNER JOIN
	cliente
	ON 
		venta.cliente_id = cliente.cliente_id
	INNER JOIN
	comprobante
	ON 
		venta.compro_id = comprobante.compro_id
	INNER JOIN
	usuario
	ON 
		venta.usu_id = usuario.usu_id
		WHERE venta.venta_fregistro and venta_estado='ANULADA' 
		and (select MONTH(venta_fregistro))=MES 
		and YEAR(venta_fregistro)=ANIO
		ORDER BY venta_id DESC//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REPORTE_VENTA_DEL_DIA
DELIMITER //
CREATE PROCEDURE `SP_REPORTE_VENTA_DEL_DIA`(IN FINICIO DATE, IN FFIN DATE)
SELECT
  MAX( detalle_venta.vdetalle_id) as vdetalle_id, 
    detalle_venta.venta_id, 
    MAX(venta.venta_fregistro) AS fecha, -- Aplicando MAX() como función de agregación
    MAX(venta.venta_comprobante) as tipo_comprobante, -- Aplicando MAX() como función de agregación
    CONCAT_WS(' - ', MAX(venta.venta_serie), MAX(venta.venta_num_comprobante)) AS comprobante, -- Aplicando MAX() como función de agregación
    MAX(cliente.cliente_nombres) as cliente, -- Aplicando MAX() como función de agregación
    MAX(venta.venta_total - venta.venta_impuesto) as base_imp, -- Aplicando MAX() como función de agregación
    MAX(venta.venta_impuesto) as igv, -- Aplicando MAX() como función de agregación
    MAX(venta.venta_total) as total,
		MAX(usuario.usu_nombre) as usuario
FROM
	detalle_venta
	INNER JOIN
	venta
	ON 
		detalle_venta.venta_id = venta.venta_id
	INNER JOIN
	producto
	ON 
		detalle_venta.producto_id = producto.producto_id
		INNER JOIN
	cliente
	ON 
		venta.cliente_id = cliente.cliente_id
		INNER JOIN usuario 
		ON venta.usu_id = usuario.usu_id
		where venta.venta_estado = 'PAGADA' and venta.venta_fregistro BETWEEN FINICIO AND FFIN 	
	GROUP BY detalle_venta.venta_id//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REPORTE_VENTA_GENERAL
DELIMITER //
CREATE PROCEDURE `SP_REPORTE_VENTA_GENERAL`()
SELECT 
YEAR(v.venta_fregistro) as ano, 
MONTH(v.venta_fregistro) as numero_mes, 
MONTHname(v.venta_fregistro) as mes,
count(v.venta_total) as cant_fact,
SUM(v.venta_total) as total,
case month(v.venta_fregistro) 
WHEN 1 THEN 'Enero'
WHEN 2 THEN  'Febrero'
WHEN 3 THEN 'Marzo' 
WHEN 4 THEN 'Abril' 
WHEN 5 THEN 'Mayo'
WHEN 6 THEN 'Junio'
WHEN 7 THEN 'Julio'
WHEN 8 THEN 'Agosto'
WHEN 9 THEN 'Septiembre'
WHEN 10 THEN 'Octubre'
WHEN 11 THEN 'Noviembre'
WHEN 12 THEN 'Diciembre'
 END mesnombre 
FROM venta v
where venta_estado ='PAGADA' 
GROUP BY YEAR(v.venta_fregistro),
month(v.venta_fregistro)//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REPORTE_VENTA_MES
DELIMITER //
CREATE PROCEDURE `SP_REPORTE_VENTA_MES`(IN MES VARCHAR(5),IN ANIO VARCHAR(10))
SELECT
	venta.venta_id, 
	cliente.cliente_nombres, 
	CONCAT_WS(' - ',venta.venta_comprobante,venta.venta_serie,venta.venta_num_comprobante) AS comprobante, 
	venta.venta_total, 
	venta.venta_fregistro, 
	venta.venta_estado, 
	COUNT(detalle_venta.vdetalle_cantidad) AS cant_prod, 
	venta.compro_id, 
	venta.usu_id, 
	usuario.usu_nombre
FROM
	venta
	INNER JOIN
	cliente
	ON 
		venta.cliente_id = cliente.cliente_id
	INNER JOIN
	comprobante
	ON 
		venta.compro_id = comprobante.compro_id
	INNER JOIN
	detalle_venta
	ON 
		venta.venta_id = detalle_venta.venta_id
	INNER JOIN
	usuario
	ON 
		venta.usu_id = usuario.usu_id
		
		
		WHERE venta.venta_fregistro and venta_estado ='PAGADA'
		and (select MONTH(venta_fregistro))=MES 
		and YEAR(venta_fregistro)=ANIO
		GROUP BY venta.venta_id//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REPORTE_VENTA_POR_ANIO_MES_USUARIO
DELIMITER //
CREATE PROCEDURE `SP_REPORTE_VENTA_POR_ANIO_MES_USUARIO`(IN ID INT,IN ANIO VARCHAR(10))
SELECT 
YEAR(v.venta_fregistro) as ano, 
    MONTH(v.venta_fregistro) as numero_mes, 
    MONTHNAME(MIN(v.venta_fregistro)) as mes, -- Aplicando MIN() como función de agregación
    COUNT(v.venta_total) as cant_ventas,
    SUM(v.venta_total) as total,
    v.usu_id, 
    MAX(usuario.usu_nombre) as usu_nombre, -- Aplicando MAX() como función de agregación
    CASE MONTH(MIN(v.venta_fregistro)) 
WHEN 1 THEN 'Enero'
WHEN 2 THEN  'Febrero'
WHEN 3 THEN 'Marzo' 
WHEN 4 THEN 'Abril' 
WHEN 5 THEN 'Mayo'
WHEN 6 THEN 'Junio'
WHEN 7 THEN 'Julio'
WHEN 8 THEN 'Agosto'
WHEN 9 THEN 'Septiembre'
WHEN 10 THEN 'Octubre'
WHEN 11 THEN 'Noviembre'
WHEN 12 THEN 'Diciembre'
 END mesnombre 
FROM venta v
INNER JOIN
	usuario
	ON 
		v.usu_id = usuario.usu_id
where venta_estado ='PAGADA' and YEAR(v.venta_fregistro) = ANIO and v.usu_id = ID
GROUP BY YEAR(v.venta_fregistro), MONTH(v.venta_fregistro), v.usu_id//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REPORTE_VENTA_POR_ANIO_USUARIO
DELIMITER //
CREATE PROCEDURE `SP_REPORTE_VENTA_POR_ANIO_USUARIO`(IN ANIO VARCHAR(10))
SELECT
	YEAR(venta_fregistro) as ano,
	venta.usu_id, 
	usuario.usu_nombre as nom_usuario, 
	count(venta_total) as cant_ventas,
	SUM(venta.venta_total) AS total
	
FROM
	venta
	INNER JOIN
	usuario
	ON 
		venta.usu_id = usuario.usu_id
		where venta.venta_estado ='PAGADA'   and YEAR(venta_fregistro) = ANIO
		GROUP BY YEAR(venta_fregistro), venta.usu_id, usuario.usu_nombre//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_REPORTE_VENTA_TOTAL
DELIMITER //
CREATE PROCEDURE `SP_REPORTE_VENTA_TOTAL`()
SELECT 
YEAR(venta_fregistro) as ano,
count(venta_total) as cant_venta_ano,
SUM(venta_total) as total_venta_ano
FROM venta
where venta_estado ='PAGADA' GROUP BY YEAR(venta_fregistro)//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_SELECT_PERMISOS
DELIMITER //
CREATE PROCEDURE `SP_SELECT_PERMISOS`()
SELECT * from permiso
ORDER BY idpermiso//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_TRAER_DATA_GRUPO_XMENU
DELIMITER //
CREATE PROCEDURE `SP_TRAER_DATA_GRUPO_XMENU`()
BEGIN
	SELECT
		grupo_id,
		men_grupo,
		grupo_icon 
	FROM
		grupos 
	WHERE
		estado = 1 
	 ORDER BY	grupo_id;

END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_TRAER_DATA_NOTAS_EDITAR
DELIMITER //
CREATE PROCEDURE `SP_TRAER_DATA_NOTAS_EDITAR`(IN p_idnota INT)
BEGIN

select nota_id,  descripcion, estado,  fecha, usu_id     from notas where nota_id =   p_idnota;


END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_TRAER_DATOS_MENU_X_ROLYMENU
DELIMITER //
CREATE PROCEDURE `SP_TRAER_DATOS_MENU_X_ROLYMENU`(IN p_rol_id INT, IN p_menu_id INT)
BEGIN
	SELECT
		md.mend_id,
		m.men_id,
		m.men_vista,
		m.men_icon,
		m.men_ruta
	FROM
		td_menu_detalle md
		INNER JOIN menu m ON md.men_id = m.men_id 
	WHERE
		md.rol_id = p_rol_id 
		AND m.men_id = p_menu_id
		AND m.estado = 1 
	AND md.mend_permi = 'Si' ;
END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_TRAER_IMEI_PROD
DELIMITER //
CREATE PROCEDURE `SP_TRAER_IMEI_PROD`(IN ID_PR INT)
SELECT
	id_prod_imei,
	imei 
FROM
	producto_detalle 
WHERE
	producto_id = ID_PR and vendido = 'No'//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_VALIDA_IMEI
DELIMITER //
CREATE PROCEDURE `SP_VALIDA_IMEI`(IN P_IMEI VARCHAR(100))
BEGIN
    DECLARE IMEI_EXISTE INT;

    -- Verificar si el IMEI existe en la tabla producto_detalle
    SELECT COUNT(*) INTO IMEI_EXISTE
    FROM producto_detalle
    WHERE imei = P_IMEI;

    -- Si no existe en producto_detalle, verificar en la tabla recepcion
    IF IMEI_EXISTE = 0 THEN
        SELECT COUNT(*) INTO IMEI_EXISTE
        FROM recep_equipo
        WHERE serie = P_IMEI;
    END IF;

    -- Devolver resultado
    IF IMEI_EXISTE > 0 THEN
        -- El IMEI existe en al menos una de las tablas
        SELECT 'El IMEI existe en la base de datos' AS mensaje;
    ELSE
        -- El IMEI no existe en ninguna de las tablas
        SELECT 'El IMEI no existe en la base de datos' AS mensaje;
    END IF;
END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_VALIDA_IMEI2
DELIMITER //
CREATE PROCEDURE `SP_VALIDA_IMEI2`(IN P_IMEI VARCHAR(100))
BEGIN
    DECLARE EXITO INT DEFAULT 0;

    -- Verificar si el IMEI existe en la tabla producto_detalle
    IF EXISTS (SELECT 1 FROM producto_detalle WHERE imei = P_IMEI) THEN
        SET EXITO = 1; -- IMEI encontrado en producto_detalle
    END IF;

    -- Si no se encontró en producto_detalle, verificar en la tabla recepcion
    IF EXITO = 0 AND EXISTS (SELECT 1 FROM recep_equipo WHERE serie = P_IMEI) THEN
        SET EXITO = 2; -- IMEI encontrado en recepcion
    END IF;

    -- Si no se encontró en ninguna tabla
    IF EXITO = 0 THEN
        SET EXITO = 3; -- IMEI no encontrado
    END IF;

    -- Devolver el resultado
    SELECT EXITO AS resultado;
END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_VALIDA_IMEI_REINGRESO
DELIMITER //
CREATE PROCEDURE `SP_VALIDA_IMEI_REINGRESO`(IN P_IMEI VARCHAR(100))
BEGIN
    DECLARE EXITO INT DEFAULT 0;

    -- Verificar si el IMEI existe en la tabla producto_detalle
    IF EXISTS (SELECT 1 FROM producto_detalle WHERE imei = P_IMEI and vendido = 'No') THEN
        SET EXITO = 1; -- IMEI encontrado en el detalle de una venta
    END IF;

    -- Si no se encontró en producto_detalle, verificar en la tabla recepcion
    IF EXITO = 0 AND EXISTS (SELECT 1 FROM producto_detalle WHERE imei = P_IMEI and vendido = 'Si') THEN
        SET EXITO = 2; -- IMEI encontrado en producto detalle
    END IF;

    -- Si no se encontró en ninguna tabla
    IF EXITO = 0 THEN
        SET EXITO = 3; -- IMEI no encontrado
    END IF;

    -- Devolver el resultado
    SELECT EXITO AS resultado;
END//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_VERIFICAR_USUARIO
DELIMITER //
CREATE PROCEDURE `SP_VERIFICAR_USUARIO`(IN USUARIO VARCHAR(250))
SELECT
	usuario.usu_id, 
	usuario.usu_nombre, 
	usuario.usu_contrasena, 
	usuario.rol_id, 
	usuario.usu_estado, 
	usuario.usu_email, 
	usuario.usu_foto, 
	rol.rol_nombre

FROM
	usuario
	INNER JOIN
	rol
	ON 
		usuario.rol_id = rol.rol_id
where usu_nombre = BINARY USUARIO//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_VER_DETALLE_PRODUCTO
DELIMITER //
CREATE PROCEDURE `SP_VER_DETALLE_PRODUCTO`(IN ID_PRO INT)
SELECT
	imei,
	vendido
FROM
	producto_detalle 
WHERE
	producto_id = ID_PRO and vendido = 'No'//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_VER_DETALLE_RECEPCION
DELIMITER //
CREATE PROCEDURE `SP_VER_DETALLE_RECEPCION`(IN ID_REC INT)
SELECT
id_equipo,
	equipo,
	serie,
	falla,
	monto,
	abono,
	diagnostico,
	rece_id
FROM
	recep_equipo 
WHERE
	rece_id = ID_REC//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_VER_DETALLE_VENTA
DELIMITER //
CREATE PROCEDURE `SP_VER_DETALLE_VENTA`(IN ID_VENTA INT)
SELECT
    detalle_venta.vdetalle_id, 
    detalle_venta.venta_id, 
    detalle_venta.producto_id, 
    CASE
        WHEN producto.pro_imei = 'si' THEN CONCAT(producto.producto_nombre, ' - IMEI (', detalle_venta.v_imei,  ')')
        ELSE producto.producto_nombre
    END AS producto_nombre,
    detalle_venta.vdetalle_precio,
    detalle_venta.vdetalle_cantidad,
    (detalle_venta.vdetalle_precio * detalle_venta.vdetalle_cantidad -  detalle_venta.vdetalle_descuento ) AS subtotal,
    detalle_venta.vdetalle_descuento

FROM
    detalle_venta
INNER JOIN
    venta ON detalle_venta.venta_id = venta.venta_id
INNER JOIN
    producto ON detalle_venta.producto_id = producto.producto_id
		where detalle_venta.venta_id = ID_VENTA//
DELIMITER ;

-- Volcando estructura para procedimiento softdev.SP_VER_IMEI_VENDIDOS
DELIMITER //
CREATE PROCEDURE `SP_VER_IMEI_VENDIDOS`(IN PRODID INT)
select pd.imei, pd.vendido from producto_detalle pd WHERE pd.producto_id = PRODID//
DELIMITER ;

-- Volcando estructura para disparador softdev.GASTO_CERRAR
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `GASTO_CERRAR` AFTER UPDATE ON `caja` FOR EACH ROW BEGIN

UPDATE gastos SET
estado_caja= 'CERRADO'
where estado_caja='ABIERTO';
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador softdev.Generar_codigo
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `Generar_codigo` BEFORE INSERT ON `producto` FOR EACH ROW begin
	declare siguiente_codigo int;
    set siguiente_codigo = (Select ifnull(max(convert(producto_id, signed integer)), 0) from producto) + 1;
    set new.producto_codigo = concat('P', LPAD( siguiente_codigo, 4, '0'));
end//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador softdev.INSERT_IMEI
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `INSERT_IMEI` AFTER INSERT ON `producto_detalle` FOR EACH ROW BEGIN

-- INSERT INTO kardex( producto_id, imei) VALUES( NEW.producto_id, NEW.imei)

-- UPDATE kardex SET 
-- imei = NEW.imei
-- WHERE producto_id = NEW.producto_id and kardex_tipo = 'INICIAL';



END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador softdev.inser_kardex
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `inser_kardex` AFTER INSERT ON `producto` FOR EACH ROW BEGIN

	insert into kardex (kardex_fecha,  kardex_tipo,   kardex_ingreso,   kardex_p_ingreso,   kardex_total,   producto_id, producto_nombre,  producto_codigo,  kardex_precio_general) 
	VALUES       (NEW.producto_fregistro, 'INICIAL',  NEW.producto_stock,  NEW.producto_pcompra, NEW.producto_stock,  NEW.producto_id, NEW.producto_nombre, NEW.producto_codigo,    NEW.producto_pcompra );



end//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador softdev.SERVICIO_CERRAR
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `SERVICIO_CERRAR` AFTER UPDATE ON `caja` FOR EACH ROW BEGIN

UPDATE servicio SET
estado_caja= 'CERRADO'
where estado_caja='ABIERTO';
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador softdev.TR_ELIMINAR
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `TR_ELIMINAR` BEFORE DELETE ON `servicio` FOR EACH ROW UPDATE recepcion SET
rece_estado = "EN REPARACION"
WHERE rece_id=old.rece_id//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador softdev.tr_numero_compro
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `tr_numero_compro` BEFORE INSERT ON `venta` FOR EACH ROW BEGIN
DECLARE NUMCOMPRO INT;
SET @NUMCOMPRO:=(SELECT compro_numero FROM comprobante WHERE compro_id=new.compro_id);
UPDATE comprobante SET
compro_numero=@NUMCOMPRO+0001
where compro_id=new.compro_id;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador softdev.TR_STOCK_PRODUCTO
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `TR_STOCK_PRODUCTO` BEFORE INSERT ON `detalle_venta` FOR EACH ROW BEGIN
DECLARE STOCKACTUAL INT;
SET @STOCKACTUAL:=(SELECT producto_stock FROM producto WHERE producto_id=new.producto_id);
UPDATE producto SET
producto_stock=@STOCKACTUAL-new.vdetalle_cantidad
where producto_id=new.producto_id;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para disparador softdev.VENTA_CERRAR
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `VENTA_CERRAR` AFTER UPDATE ON `caja` FOR EACH ROW BEGIN

UPDATE venta SET
estado_caja= 'CERRADO'
where estado_caja='ABIERTO' and venta_estado = 'PAGADA';
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Volcando estructura para vista softdev.view_listar_recepcion
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `view_listar_recepcion`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_listar_recepcion` AS select `recepcion`.`rece_id` AS `rece_id`,concat(' R-000',`recepcion`.`rece_id`) AS `referencia`,`recepcion`.`cliente_id` AS `cliente_id`,`cliente`.`cliente_nombres` AS `cliente_nombres`,concat_ws(' - ',`recepcion`.`rece_equipo`,`recepcion`.`rece_concepto`) AS `motivo`,`recepcion`.`rece_caracteristicas` AS `rece_caracteristicas`,`recepcion`.`motivo_id` AS `motivo_id`,`motivo`.`motivo_descripcion` AS `motivo_descripcion`,`recepcion`.`rece_monto` AS `rece_monto`,`recepcion`.`rece_fregistro` AS `rece_fregistro`,`recepcion`.`rece_estado` AS `rece_estado`,`recepcion`.`rece_estatus` AS `rece_estatus`,`recepcion`.`rece_equipo` AS `rece_equipo`,`recepcion`.`rece_concepto` AS `rece_concepto`,`recepcion`.`rece_adelanto` AS `rece_adelanto`,`recepcion`.`rece_debe` AS `rece_debe`,`recepcion`.`rece_accesorios` AS `rece_accesorios`,`recepcion`.`rece_fentrega` AS `rece_fentrega`,`recepcion`.`marca_id` AS `marca_id`,`marca`.`marca_descripcion` AS `marca_descripcion`,`recepcion`.`rece_serie` AS `rece_serie`,`recepcion`.`enciende` AS `enciende`,`recepcion`.`tactil` AS `tactil`,`recepcion`.`imagen` AS `imagen`,`recepcion`.`vibra` AS `vibra`,`recepcion`.`cobertura` AS `cobertura`,`recepcion`.`sensor` AS `sensor`,`recepcion`.`carga` AS `carga`,`recepcion`.`bluetoo` AS `bluetoo`,`recepcion`.`wifi` AS `wifi`,`recepcion`.`huella` AS `huella`,`recepcion`.`home` AS `home`,`recepcion`.`lateral` AS `lateral`,`recepcion`.`camara` AS `camara`,`recepcion`.`bateria` AS `bateria`,`recepcion`.`auricular` AS `auricular`,`recepcion`.`micro` AS `micro`,`recepcion`.`face` AS `face`,`recepcion`.`tornillo` AS `tornillo`,`recepcion`.`rece_cod` AS `rece_cod`,`cliente`.`cliente_celular` AS `cliente_celular`,`recepcion`.`tecnico` AS `tecnico`,`recepcion`.`usuario_registrador` AS `usuario_registrador` from (((`recepcion` join `cliente` on((`recepcion`.`cliente_id` = `cliente`.`cliente_id`))) join `motivo` on((`recepcion`.`motivo_id` = `motivo`.`motivo_id`))) join `marca` on((`recepcion`.`marca_id` = `marca`.`marca_id`)));

-- Volcando estructura para vista softdev.view_listar_recepcion_en_servicio
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `view_listar_recepcion_en_servicio`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_listar_recepcion_en_servicio` AS select `recepcion`.`rece_id` AS `rece_id`,concat(' R-000',`recepcion`.`rece_id`) AS `referencia`,`cliente`.`cliente_nombres` AS `cliente`,`recepcion`.`rece_caracteristicas` AS `modelo`,concat_ws(' - ',`recepcion`.`rece_equipo`,`recepcion`.`rece_concepto`) AS `concepto`,`recepcion`.`rece_monto` AS `monto`,`recepcion`.`rece_fregistro` AS `fecha`,`recepcion`.`rece_estado` AS `entrega`,`recepcion`.`rece_adelanto` AS `adelanto`,`recepcion`.`rece_debe` AS `debe`,`recepcion`.`rece_fentrega` AS `rece_fentrega`,`recepcion`.`diagnostico_tecnico` AS `diagnostico_tecn`,`usu`.`usu_nombre` AS `nombre_tecnico`,`recepcion`.`tecnico` AS `idtecnico` from ((`recepcion` join `cliente` on((`recepcion`.`cliente_id` = `cliente`.`cliente_id`))) join `usuario` `usu` on((`recepcion`.`tecnico` = `usu`.`usu_id`))) where ((`recepcion`.`rece_estado` in ('REPARADO','NO REPARADO')) and (`recepcion`.`rece_estatus` = 'ACTIVO')) limit 100;

-- Volcando estructura para vista softdev.view_listar_servicio_rece
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `view_listar_servicio_rece`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_listar_servicio_rece` AS select `servicio`.`servicio_id` AS `servicio_id`,`servicio`.`rece_id` AS `rece_id`,`recepcion`.`cliente_id` AS `cliente_id`,`cliente`.`cliente_nombres` AS `cliente_nombres`,concat_ws(' - ',`recepcion`.`rece_equipo`,`recepcion`.`rece_concepto`) AS `concepto`,`recepcion`.`rece_monto` AS `rece_monto`,`recepcion`.`rece_estado` AS `rece_estado`,`servicio`.`servicio_monto` AS `servicio_monto`,`servicio`.`servicio_concepto` AS `servicio_concepto`,`servicio`.`servicio_responsable` AS `servicio_responsable`,`servicio`.`servicio_comentario` AS `servicio_comentario`,`servicio`.`servicio_entrega` AS `servicio_entrega`,`servicio`.`servicio_fregistro` AS `servicio_fregistro`,`servicio`.`servicio_estado` AS `servicio_estado` from ((`servicio` join `recepcion` on((`servicio`.`rece_id` = `recepcion`.`rece_id`))) join `cliente` on((`recepcion`.`cliente_id` = `cliente`.`cliente_id`)));

-- Volcando estructura para vista softdev.view_listar_usuario
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `view_listar_usuario`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `view_listar_usuario` AS select `usuario`.`usu_id` AS `usu_id`,`usuario`.`usu_nombre` AS `usu_nombre`,`usuario`.`usu_contrasena` AS `usu_contrasena`,`usuario`.`rol_id` AS `rol_id`,`usuario`.`usu_estado` AS `usu_estado`,`usuario`.`usu_email` AS `usu_email`,`usuario`.`usu_foto` AS `usu_foto`,`rol`.`rol_nombre` AS `rol_nombre` from (`usuario` join `rol` on((`usuario`.`rol_id` = `rol`.`rol_id`)));

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
