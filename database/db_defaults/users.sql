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

-- Dumping data for table fivemcad.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `discord_name`, `discriminator`, `avatar`, `steam_hex`, `steam_id`, `steam_name`, `account_status`, `reapply`, `reapply_date`, `denied_reason`, `email`, `real_name`, `birthday`, `display_name`, `ts_name`, `officer_name`, `last_login`, `is_protected_user`, `is_super_user`, `history`, `civilian_level_id`, `remember_token`, `deleted_at`, `created_at`, `updated_at`, `member_join_date`) VALUES
	(188790560658685954, 'Ron Swanson', '1776', 'https://cdn.discordapp.com/avatars/188790560658685954/a_92e9cc29feaeb37cb66418a8d320faf0.gif', '11000010CDE9587', 76561198176179591, 'Loaf Dog', 3, NULL, NULL, NULL, 'asd@asdf.com', 'Ron Swanson', '1776-07-04', NULL, NULL, NULL, '2023-05-16 14:08:02', 1, 1, NULL, 1, 'YDynCFaO6Xql6uJj7RnH0G0qow1JaJN30ZfBxaL4yJd0evGvT2kkBRgzfarI', NULL, '2023-03-19 23:28:59', '2023-05-16 15:12:13', '2023-04-02 15:08:49');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
