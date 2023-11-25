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

-- Dumping data for table fivemcad.cad_settings: ~15 rows (approximately)
/*!40000 ALTER TABLE `cad_settings` DISABLE KEYS */;
INSERT INTO `cad_settings` (`id`, `name`, `value`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'community_logo', 'https://cdn.discordapp.com/attachments/632810626363686922/1132129051411230811/communitycad.png', 'text', '2023-04-02 16:09:08', '2023-07-21 20:56:56', NULL),
	(2, 'community_name', 'Community CAD', 'text', '2023-04-02 16:09:08', '2023-06-24 16:56:58', NULL),
	(3, 'minimum_age', '14', 'number', '2023-04-02 16:09:08', '2023-04-02 16:09:08', NULL),
	(4, 'days_until_inactive', '14', 'number', '2023-04-02 16:09:08', '2023-04-02 16:09:08', NULL),
	(5, 'days_until_reapply', '7', 'number', '2023-04-02 16:09:08', '2023-04-02 16:09:08', NULL),
	(6, 'postal_map_link', NULL, 'text', '2023-04-02 16:09:08', '2023-07-21 21:30:58', NULL),
	(7, 'force_discord_link', 'true', 'bool', '2023-04-02 16:09:08', '2023-04-02 16:09:08', NULL),
	(8, 'force_steam_link', 'true', 'bool', '2023-04-02 16:09:08', '2023-04-02 16:09:08', NULL),
	(9, 'application_terms', 'You understand that you may only submit one application per recruitment cycle and that if you are denied you are required to wait until the next recruitment cycle to reapply.\r\n\r\nYou have read over the Application Rules & Regulations and agree to them?', 'markdown', '2023-04-02 16:09:08', '2023-09-25 22:46:43', NULL),
	(10, 'community_intro', 'Hello All! I am proud to announce that CommunityCAD has now been put into beta and is ready to have communities use it. CommunityCAD is an all in one solution that handles everything you need to run your community. Applications? CHECK! Member rosters and activity tracking? CHECK! CAD/MDT Functionality? wait... CHCEK! DM me if you have any questions or are interested!\r\n\r\nFirst let me tell you a little about the history. Playing FiveM for the last 8 years almost I haven\'t seen a community that has everything in one place. To apply to be a member you have to use this Google Form or worse ejin forms. Then you had to be whitelisted through something else. Then you had the CAD/MDT while department heads tried to keep track of Google Forms and Docs. \r\n\r\nI wanted to change that. After multiple iterations and years of work I have finally finished a complete Version 1 that I wish to open to the public. I still haven\'t decided fully if it will be open source or a subscription based like other systems. This is a web based option so FiveM, Console, and Roblox roleplay communities can take advantage of this system. Its made with simple php so anyone can host it with cPanel very easily if I open source it or Subscription I will handle all hosting needs for you.', 'markdown', '2023-04-02 16:09:08', '2023-09-25 22:50:41', NULL),
	(11, 'members_must_apply', 'true', 'bool', '2023-04-02 16:09:08', '2023-04-02 16:09:08', NULL),
	(12, 'allow_same_name_civilians', 'false', 'bool', '2023-07-21 21:09:34', '2023-07-21 21:32:36', NULL),
	(13, 'state', 'San Andreas', 'text', '2023-09-25 22:35:53', '2023-09-25 22:35:53', NULL),
	(14, 'county', 'Blane County', 'text', '2023-09-25 23:06:34', '2023-09-25 23:06:34', NULL),
	(15, 'city', 'Los Santos', 'text', '2023-09-25 22:36:34', '2023-09-25 22:36:34', NULL);
/*!40000 ALTER TABLE `cad_settings` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
