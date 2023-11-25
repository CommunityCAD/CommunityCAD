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

-- Dumping data for table fivemcad.users: ~2 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `discord_name`, `discord_username`, `discriminator`, `avatar`, `steam_hex`, `steam_id`, `steam_name`, `account_status`, `reapply`, `reapply_date`, `denied_reason`, `email`, `real_name`, `birthday`, `display_name`, `ts_name`, `officer_name`, `last_login`, `is_protected_user`, `is_super_user`, `civilian_level_id`, `member_join_date`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(188790560658685954, 'Ron Swanson', '.ronswanson', '0', 'https://cdn.discordapp.com/avatars/188790560658685954/a_92e9cc29feaeb37cb66418a8d320faf0.gif', '11000010CDE9587', 76561198176179591, 'Loaf Dog', 3, NULL, NULL, NULL, 'test@test.com', 'Ron Swanson', '1776-07-04', NULL, NULL, 'Ron S', '2023-11-12 03:56:01', 1, 1, 1, '2023-06-13 17:13:04', 'ivF292Ty1VPQ8dyaK0JL3aAbT7Uh1YZJiXpcjng5FsZ4uwfXjklQCUjQ4k2f', '2023-05-28 21:18:50', '2023-11-12 03:56:01', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
