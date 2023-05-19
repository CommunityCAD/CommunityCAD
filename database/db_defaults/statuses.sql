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

-- Dumping data for table fivemcad.account_statuses: ~6 rows (approximately)
/*!40000 ALTER TABLE `account_statuses` DISABLE KEYS */;
INSERT INTO `account_statuses` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'User', NULL, NULL, NULL),
	(2, 'Applicant', NULL, NULL, NULL),
	(3, 'Member', NULL, NULL, NULL),
	(4, 'Suspended/LOA', NULL, NULL, NULL),
	(5, 'Temporary Ban', NULL, NULL, NULL),
	(6, 'Permanent Ban', NULL, NULL, NULL);
/*!40000 ALTER TABLE `account_statuses` ENABLE KEYS */;

-- Dumping data for table fivemcad.application_statuses: ~6 rows (approximately)
/*!40000 ALTER TABLE `application_statuses` DISABLE KEYS */;
INSERT INTO `application_statuses` (`id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Pending Review', NULL, NULL, NULL),
	(2, 'Pending Admin Review', NULL, NULL, NULL),
	(3, 'Pending Interview', NULL, NULL, NULL),
	(4, 'Approved', NULL, NULL, NULL),
	(5, 'Declined', NULL, NULL, NULL),
	(6, 'Withdrawn', NULL, NULL, NULL);
/*!40000 ALTER TABLE `application_statuses` ENABLE KEYS */;

-- Dumping data for table fivemcad.civilian_statuses: ~7 rows (approximately)
/*!40000 ALTER TABLE `civilian_statuses` DISABLE KEYS */;
INSERT INTO `civilian_statuses` (`id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
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
INSERT INTO `license_statuses` (`id`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'Valid', NULL, NULL, NULL),
	(2, 'Expired', NULL, NULL, NULL),
	(3, 'Suspended', NULL, NULL, NULL),
	(4, 'Revoked', NULL, NULL, NULL),
	(5, 'Pending Approval', NULL, NULL, NULL);
/*!40000 ALTER TABLE `license_statuses` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

