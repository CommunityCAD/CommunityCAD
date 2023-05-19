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

-- Dumping data for table fivemcad.license_types: ~8 rows (approximately)
/*!40000 ALTER TABLE `license_types` DISABLE KEYS */;
INSERT INTO `license_types` (`id`, `name`, `perm_name`, `prefix`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Drivers License', 'dl_license', 'DL', NULL, NULL, NULL),
	(2, 'Commercial Drivers License', 'cdl_license', 'CDL', NULL, NULL, NULL),
	(3, 'CCW License', 'ccw_license', 'CCW', NULL, NULL, NULL),
	(4, 'Security License', 'security_license', 'SC', NULL, NULL, NULL),
	(5, 'Tow License', 'tow_license', 'TW', NULL, NULL, NULL),
	(6, 'Fishing License', 'fishing_license', 'FSH', NULL, NULL, NULL),
	(7, 'Hunting License', 'hunting_license', 'HNT', NULL, NULL, NULL),
	(8, 'Pilot License', 'pl_license', 'PL', NULL, NULL, NULL);
/*!40000 ALTER TABLE `license_types` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
