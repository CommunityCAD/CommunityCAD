-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping data for table fivemcad.civilian_statuses: ~7 rows (approximately)
/*!40000 ALTER TABLE `civilian_statuses` DISABLE KEYS */;
INSERT INTO `civilian_statuses` (`id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Alive', NULL, NULL, NULL),
	(2, 'Wanted', NULL, NULL, NULL),
	(3, 'Jailed', NULL, NULL, NULL),
	(4, 'Dead', NULL, NULL, NULL),
	(5, 'Hospitalized', NULL, NULL, NULL),
	(6, 'Pending Deleteion', NULL, NULL, NULL),
	(7, 'Deleted', NULL, NULL, NULL);
/*!40000 ALTER TABLE `civilian_statuses` ENABLE KEYS */;

-- Dumping data for table fivemcad.license_statuses: ~5 rows (approximately)
/*!40000 ALTER TABLE `license_statuses` DISABLE KEYS */;
INSERT INTO `license_statuses` (`id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Valid', NULL, NULL, NULL),
	(2, 'Expired', NULL, NULL, NULL),
	(3, 'Suspended', NULL, NULL, NULL),
	(4, 'Revoked', NULL, NULL, NULL),
	(5, 'Pending Approval', NULL, NULL, NULL);
/*!40000 ALTER TABLE `license_statuses` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
