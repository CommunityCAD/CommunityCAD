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

-- Dumping data for table fivemcad.permissions: ~24 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `title`, `category`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'admin_access', 'admin', 'Grants access to Admin Area.', '2023-01-19 20:18:19', '2023-01-19 20:18:19', NULL),
	(2, 'announcements_access', 'staff', 'Grants access to Announcements.', '2023-01-19 20:34:19', '2023-01-19 20:34:19', NULL),
	(3, 'application_access', 'staff', 'Grants access to Applications link.', '2023-01-19 21:17:26', '2023-01-19 21:17:27', NULL),
	(4, 'manage_members_access', 'admin', 'Grants access to search Members and access thier page.', '2023-01-19 21:17:31', '2023-01-19 21:17:31', NULL),
	(5, 'role_access', 'admin', 'Grants access to Roles link', '2023-01-19 21:56:40', '2023-01-19 21:56:40', NULL),
	(6, 'application_staff_review', 'staff', 'Grants access to Flagged for Admin Applications', '2023-01-19 22:01:13', '2023-01-19 22:01:13', NULL),
	(7, 'application_action', 'staff', 'Grants access to action Applications.', '2023-01-19 22:01:25', '2023-01-19 22:01:25', NULL),
	(8, 'role_create', 'admin', 'Grants access to create Roles.', '2023-01-19 22:15:53', '2023-01-19 22:15:53', NULL),
	(9, 'role_edit', 'admin', 'Grants access to edit Roles.', '2023-01-19 22:15:58', '2023-01-19 22:15:58', NULL),
	(10, 'role_delete', 'admin', 'Grants access to delete Roles.', '2023-01-19 22:16:05', '2023-01-19 22:16:06', NULL),
	(11, 'user_access', 'admin', NULL, '2023-01-27 17:41:34', '2023-01-27 17:41:34', NULL),
	(13, 'user_edit', 'admin', '', '2023-01-27 17:41:43', '2023-01-27 17:41:43', NULL),
	(14, 'user_view', 'admin', NULL, '2023-01-27 17:41:58', '2023-01-27 17:41:58', NULL),
	(15, 'user_edit_roles', 'admin', 'Grants access to edit User Roles.', '2023-01-29 20:03:03', '2023-01-29 20:03:03', NULL),
	(16, 'user_edit_status', 'admin', 'Grants access to edit User account Status.', '2023-02-03 23:13:44', '2023-02-03 23:13:44', NULL),
	(17, 'user_manage_notes', 'admin', 'Grants access to manage User Notes.', '2023-05-16 15:01:48', '2023-05-16 15:01:50', NULL),
	(18, 'user_manage_accommodations', 'admin', 'Grants access to manage User Accommodations.', '2023-05-16 15:02:05', '2023-05-16 15:02:05', NULL),
	(19, 'user_manage_disciplinary_actions', 'admin', 'Grants access to manage User Disciplinary Actions.', '2023-05-16 15:02:20', '2023-05-16 15:02:20', NULL),
	(20, 'user_advanced_access', 'admin', 'Grants access to manage non-member Users.', '2023-05-16 15:55:13', '2023-05-16 15:55:13', NULL),
	(21, 'user_departments_access', 'staff', 'Grants access to manage Members Departments', '2023-05-16 22:32:37', '2023-05-16 22:32:38', NULL),
	(22, 'department_manage', 'admin', 'Grants access to manage departments.', '2023-05-25 17:11:08', '2023-05-25 17:11:08', NULL),
	(23, 'disciplinary_action_type_manage', 'admin', 'Grants access to manage Disciplinary Action Types.', '2023-06-12 19:47:59', '2023-06-12 19:47:59', NULL),
	(24, 'license_type_manage', 'admin', 'Grants access to manage License Types', '2023-06-12 20:15:40', '2023-06-12 20:15:40', NULL),
	(25, 'civilian_level_manage', 'admin', 'Grants access to manage Civilian Levels', '2023-06-13 14:59:27', '2023-06-13 14:59:27', NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

