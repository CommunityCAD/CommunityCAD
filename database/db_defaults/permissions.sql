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

-- Dumping data for table fivemcad.permissions: ~16 rows (approximately)
DELETE FROM `permissions`;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'admin_access', '2023-01-19 20:18:19', '2023-01-19 20:18:19', NULL),
	(2, 'announcements_access', '2023-01-19 20:34:19', '2023-01-19 20:34:19', NULL),
	(3, 'application_access', '2023-01-19 21:17:26', '2023-01-19 21:17:27', NULL),
	(4, 'manage_members_access', '2023-01-19 21:17:31', '2023-01-19 21:17:31', NULL),
	(5, 'role_access', '2023-01-19 21:56:40', '2023-01-19 21:56:40', NULL),
	(6, 'application_admin_review', '2023-01-19 22:01:13', '2023-01-19 22:01:13', NULL),
	(7, 'application_action', '2023-01-19 22:01:25', '2023-01-19 22:01:25', NULL),
	(8, 'role_create', '2023-01-19 22:15:53', '2023-01-19 22:15:53', NULL),
	(9, 'role_edit', '2023-01-19 22:15:58', '2023-01-19 22:15:58', NULL),
	(10, 'role_delete', '2023-01-19 22:16:05', '2023-01-19 22:16:06', NULL),
	(11, 'user_access', '2023-01-27 17:41:34', '2023-01-27 17:41:34', NULL),
	(12, 'user_advanced_access', '2023-01-27 17:41:35', '2023-01-27 17:41:35', NULL),
	(13, 'user_edit', '2023-01-27 17:41:43', '2023-01-27 17:41:43', NULL),
	(14, 'user_view', '2023-01-27 17:41:58', '2023-01-27 17:41:58', NULL),
	(15, 'user_edit_roles', '2023-01-29 20:03:03', '2023-01-29 20:03:03', NULL),
	(16, 'user_edit_status', '2023-02-03 23:13:44', '2023-02-03 23:13:44', NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
