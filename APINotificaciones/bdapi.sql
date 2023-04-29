-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.24-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para bdapi
CREATE DATABASE IF NOT EXISTS `bdapi` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `bdapi`;

-- Volcando estructura para tabla bdapi.tbcliente
CREATE TABLE IF NOT EXISTS `tbcliente` (
  `id` varchar(50) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bdapi.tbcliente: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tbcliente` DISABLE KEYS */;
INSERT INTO `tbcliente` (`id`, `nom`) VALUES
	('C1', 'Sergio'),
	('C2', 'Pedro');
/*!40000 ALTER TABLE `tbcliente` ENABLE KEYS */;

-- Volcando estructura para tabla bdapi.tbregistro
CREATE TABLE IF NOT EXISTS `tbregistro` (
  `idcliente` varchar(50) DEFAULT NULL,
  `fecha` varchar(50) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  KEY `FK_tbregistro_tbcliente` (`idcliente`),
  CONSTRAINT `FK_tbregistro_tbcliente` FOREIGN KEY (`idcliente`) REFERENCES `tbcliente` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcando datos para la tabla bdapi.tbregistro: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tbregistro` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbregistro` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
