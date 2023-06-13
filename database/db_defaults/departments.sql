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

-- Dumping data for table fivemcad.departments: ~6 rows (approximately)
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` (`id`, `name`, `is_open_external`, `is_open_internal`, `deleted_at`, `created_at`, `updated_at`, `initials`, `slug`, `logo`) VALUES
	(1, 'Blane County Sheriffs Office', 1, 1, NULL, '2023-05-19 17:34:13', '2023-05-19 17:34:13', 'BCSO', 'blane-county-sheriffs-office', 'https://static.wikia.nocookie.net/rde/images/e/e1/Lore-friendly-bcso_logo.png'),
	(2, 'Los Santos Police Department', 1, 1, NULL, '2023-05-19 17:34:14', '2023-05-19 17:34:14', 'LSPD', 'los-santos-police-department', 'https://static.wikia.nocookie.net/alterlifepolicedepartement/images/5/51/R_%281%29.png'),
	(3, 'San Andreas Highway Patrol', 1, 1, NULL, '2023-05-19 17:34:16', '2023-05-19 17:34:16', 'SAHP', 'san-andreas-highway-patrol', 'https://static.wikia.nocookie.net/alterlifepolicedepartement/images/b/b5/SAHP_logo.png'),
	(4, 'Civilian Operations', 1, 1, NULL, '2023-05-19 17:34:17', '2023-05-19 17:34:17', 'CIV', 'civilian-operations', 'https://content.invisioncic.com/y305077/monthly_2021_03/RCiv_Logo.png.62e84cd49d883db8492dc588c771b8bd.png'),
	(5, 'Communications', 1, 1, NULL, '2023-05-19 17:34:18', '2023-05-19 17:34:18', 'DISP', 'communications', 'https://static.wikia.nocookie.net/ultimate-roleplay/images/c/cb/LCPD-GTA4-logo.png'),
	(6, 'San Andreas Fire Rescue', 1, 1, NULL, '2023-05-19 17:34:19', '2023-05-19 17:34:19', 'SAFR', 'san-andreas-fire-rescue', 'https://pbs.twimg.com/media/ExIVjYwWYAgKROe.png');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
