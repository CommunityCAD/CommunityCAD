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

-- Dumping data for table fivemcad.cad_settings: ~9 rows (approximately)
/*!40000 ALTER TABLE `cad_settings` DISABLE KEYS */;
INSERT INTO `cad_settings` (`id`, `name`, `value`, `type`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, 'community_logo', 'https://gages.space/images/logo.png', 'text', NULL, '2023-04-02 16:09:08', '2023-04-02 16:09:08'),
	(2, 'community_name', 'Community CAD', 'text', NULL, '2023-04-02 16:09:08', '2023-04-02 16:09:08'),
	(3, 'minnimum_age', '14', 'number', NULL, '2023-04-02 16:09:08', '2023-04-02 16:09:08'),
	(4, 'days_until_inactive', '14', 'number', NULL, '2023-04-02 16:09:08', '2023-04-02 16:09:08'),
	(5, 'days_until_reapply', '7', 'number', NULL, '2023-04-02 16:09:08', '2023-04-02 16:09:08'),
	(6, 'postal_map_link', NULL, 'text', NULL, '2023-04-02 16:09:08', '2023-04-02 16:09:08'),
	(7, 'force_discord_link', 'true', 'bool', NULL, '2023-04-02 16:09:08', '2023-04-02 16:09:08'),
	(8, 'force_steam_link', 'true', 'bool', NULL, '2023-04-02 16:09:08', '2023-04-02 16:09:08'),
	(9, 'application_terms', '<p>You understand that you may only submit one application per recruitment cycle and that\r\n                        if you are denied\r\n                        you are required to wait until the next recruitment cycle to reapply.</p>\r\n\r\n                    <p>You have read over the Applacation Rules & Regulations and agree to them?</p>\r\n\r\n                    <p>Have you read over your application and ensured that all of the information on this\r\n                        application is fully\r\n                        accurate and correct, and that you are ready to submit this application for review?</p>\r\n\r\n                    <p>You understand that applicants will be contacted via our Fan Discord and you must be a\r\n                        member of it if\r\n                        you\r\n                        wish to further within your application</p>', 'textarea', NULL, '2023-04-02 16:09:08', '2023-04-02 16:09:08'),
	(10, 'community_intro', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'textarea', NULL, '2023-04-02 16:09:08', '2023-04-02 16:09:08')
    (11, 'members_must_apply', 'true', 'bool', NULL, '2023-04-02 16:09:08', '2023-04-02 16:09:08'),;
/*!40000 ALTER TABLE `cad_settings` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
