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

-- Dumping data for table fivemcad.civilian_levels: ~0 rows (approximately)
/*!40000 ALTER TABLE `civilian_levels` DISABLE KEYS */;
INSERT INTO `civilian_levels` (`id`, `name`, `civilian_limit`, `firearm_limit`, `vehicle_limit`, `license_types_allowed`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'LEO Default', 1, 1, 2, '{"data": ["dl_license", "cdl_license"]}', NULL, '2023-02-11 00:07:53', '2023-02-11 00:07:54');
/*!40000 ALTER TABLE `civilian_levels` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
