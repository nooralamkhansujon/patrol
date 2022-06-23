-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 20, 2022 at 09:14 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patrol_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `check_points`
--

CREATE TABLE `check_points` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `creation_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode` enum('collect record','collect checkpoint','collect patrolman tag') COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `device_activities`
--

CREATE TABLE `device_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `last_scan_time` datetime NOT NULL,
  `electricity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `device_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `device_routes`
--

CREATE TABLE `device_routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `device_id` bigint(20) UNSIGNED NOT NULL,
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `device_settings`
--

CREATE TABLE `device_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `device_id` bigint(20) UNSIGNED NOT NULL,
  `sound` enum('buzzer','vibration','buzzer + vibration') COLLATE utf8mb4_unicode_ci NOT NULL,
  `clock` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2013_04_14_073036_create_organizations_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2022_04_14_073146_create_patrol_mens_table', 1),
(9, '2022_04_14_073228_create_permission_types_table', 1),
(11, '2022_04_14_073355_create_check_points_table', 1),
(12, '2022_04_14_073413_create_routes_table', 1),
(13, '2022_04_14_073434_create_patrol_tasks_table', 1),
(14, '2022_04_14_073435_create_shifts_table', 1),
(15, '2022_04_14_073525_create_devices_table', 1),
(16, '2022_04_14_073544_create_device_settings_table', 1),
(17, '2022_04_14_074109_create_device_routes_table', 1),
(18, '2022_04_14_202424_create_device_activities_table', 2),
(21, '2022_04_14_073111_create_roles_table', 3),
(23, '2022_04_14_073317_create_role_has_permissions_table', 3),
(26, '2022_04_14_073212_create_permissions_table', 4),
(27, '2022_04_17_114257_add_some_columns_in_permissions_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `organizations`
--

CREATE TABLE `organizations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizations`
--

INSERT INTO `organizations` (`id`, `name`, `description`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Binary Brains It', 'This is binary brains it', 0, '2022-04-14 05:10:59', '2022-04-14 05:10:59'),
(3, 'Modules It', 'this is description', 1, '2022-04-15 14:13:48', '2022-04-15 14:13:48'),
(4, 'Kfc Technologies', 'kfc technologies', 3, '2022-04-16 01:14:23', '2022-04-16 01:14:23'),
(5, 'kfc child', 'this is kfc child', 4, '2022-04-16 01:15:11', '2022-04-16 01:15:11'),
(6, 'nooralamkhan', 'jakir', 1, '2022-04-16 14:13:21', '2022-04-16 14:13:21'),
(7, 'fahimkhan', 'fahim khan', 6, '2022-04-16 14:20:26', '2022-04-16 14:20:26'),
(9, 'Pran company limited', 'sdasdlasdfkasf', 7, '2022-04-16 14:22:16', '2022-04-16 14:22:16'),
(10, 'kfc child 1', 'kfc child 1', 5, '2022-04-17 03:42:44', '2022-04-17 03:42:44'),
(11, 'excelitaiimages', 'organization', 10, '2022-04-17 03:45:34', '2022-04-17 03:45:34'),
(12, 'Modules It childs', 'Modules It childs', 3, '2022-04-17 03:45:57', '2022-04-17 03:45:57'),
(13, 'kfc panthapath', 'aaaaaaaaaaaaa', 5, '2022-04-19 08:23:47', '2022-04-19 08:23:47'),
(14, 'kfc 51/a/10', 'bbb', 13, '2022-04-19 08:24:12', '2022-04-19 08:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patrol_mens`
--

CREATE TABLE `patrol_mens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patrol_tasks`
--

CREATE TABLE `patrol_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `weeks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `code`, `parent_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'organization:root', 0, 'Organization Management', NULL, NULL),
(2, 'role:mng', 1, 'Role Management', NULL, NULL),
(3, 'add_role:mng', 2, 'Add Role', NULL, NULL),
(4, 'modify_role:mng', 2, 'Modify Role', NULL, NULL),
(5, 'delete_role:mng', 2, 'Delete Role', NULL, NULL),
(6, 'department:mng', 1, 'Department Management', NULL, NULL),
(7, 'add_department:mng', 6, 'Add Department', NULL, NULL),
(8, 'modify_department:mng', 6, 'Modify Department', NULL, NULL),
(9, 'delete_department:mng', 6, 'Delete Manager', NULL, NULL),
(10, 'account:mng', 1, 'Account', NULL, NULL),
(11, 'add_account:mng', 10, 'Add Account', NULL, NULL),
(12, 'modify_account:mng', 10, 'Modify Account', NULL, NULL),
(13, 'delete_account:mng', 10, 'Delete Account', NULL, NULL),
(14, 'reset_password_department:mng', 10, 'Reset Password', NULL, NULL),
(15, 'patrolman:mng', 1, 'Patrolman', NULL, NULL),
(16, 'add_patrolman:mng', 15, 'Add Patrolman', NULL, NULL),
(17, 'modify_patrolman:mng', 15, 'Modify Patrolman', NULL, NULL),
(18, 'delete_patrolman:mng', 15, 'Delete Patrolman', NULL, NULL),
(19, 'patrol:root', 0, 'Patrol Management', NULL, NULL),
(20, 'checkpoint:mng', 19, 'Checkpoint', NULL, NULL),
(21, 'add_checkpoint:mng', 20, 'Add Checkpoint', NULL, NULL),
(22, 'modify_checkpoint:mng', 20, 'Modify Checkpoint', NULL, NULL),
(23, 'delete_checkpoint:mng', 20, 'Delete Checkpoint', NULL, NULL),
(24, 'route:root', 19, 'Route Management', NULL, NULL),
(25, 'add_route:mng', 24, 'Add Route', NULL, NULL),
(26, 'modify_route:mng', 24, 'Modify Route', NULL, NULL),
(27, 'delete_route:mng', 24, 'Delete Route', NULL, NULL),
(28, 'route_checkpoint:mng', 24, 'Checkpoint ', NULL, NULL),
(29, 'add_route_checkpoint:mng', 28, 'Add Checkpoint', NULL, NULL),
(30, 'delete_route_checkpoint:mng', 28, 'Delete Checkpoint', NULL, NULL),
(31, 'order_route_checkpoint:mng', 28, 'Order Checkpoint', NULL, NULL),
(32, 'patrol_task:mng', 24, 'Patrol Task', NULL, NULL),
(33, 'add_patrol_task:mng', 32, 'Add Task', NULL, NULL),
(34, 'modify_patrol_task:mng', 32, 'Modify Task', NULL, NULL),
(35, 'delete_patrol_task:mng', 32, 'Delete Task', NULL, NULL),
(36, 'reader_management:mng', 24, 'Reader Management', NULL, NULL),
(37, 'modify_reader_management:mng', 36, 'Modify Reader', NULL, NULL),
(38, 'clock_group:mng', 24, 'Clock Group', NULL, NULL),
(39, 'add_clockgroup:mng', 38, 'Add ClockGroup', NULL, NULL),
(40, 'modify_clockgroup:mng', 38, 'Modify ClockGroup', NULL, NULL),
(41, 'delete_clockgroup:mng', 38, 'Delete ClockGroup', NULL, NULL),
(42, 'add_clock_clockgroup:mng', 38, 'Add Clock', NULL, NULL),
(43, 'delete_clock_clockgroup:mng', 38, 'Delete Clock', NULL, NULL),
(44, 'view_records:root', 0, 'View Records', NULL, NULL),
(45, 'attendance_view_records:mng', 44, 'Attendance', NULL, NULL),
(46, 'task_details_view_records:mng', 44, 'Task(Task Details)', NULL, NULL),
(47, 'assessment_view_records:mng', 44, 'Assessment', NULL, NULL),
(48, 'emergency_alarm_view_records:mng', 44, 'Emergency Alarm', NULL, NULL),
(49, 'device_trail_view_records:mng', 44, 'Device Trail', NULL, NULL),
(50, 'real_time_monitoring_view_records:mng', 44, 'Real-Time Monitoring', NULL, NULL),
(51, 'sys:mng', 0, 'System Management', NULL, NULL),
(52, 'operation_log_sys:mng', 51, 'Operation Log', NULL, NULL),
(53, 'email_mng_sys:mng', 51, 'Email Manager', NULL, NULL),
(54, 'add_email_mng_sys:mng', 53, 'Add Email', NULL, NULL),
(55, 'delete_email_mng_sys:mng', 53, 'Delete Email', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'nooralamkhan', 'Binary Brains Ltd', '2022-04-19 15:35:47', '2022-04-19 15:35:47'),
(2, 'demo', 'demo role', '2022-04-20 12:58:31', '2022-04-20 12:58:31'),
(3, 'dasdfasdfasdf', 'asdfasdfas', '2022-04-20 13:04:41', '2022-04-20 13:04:41');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`id`, `code`, `parentCode`, `role_id`, `created_at`, `updated_at`) VALUES
(68, 'role:mng', 'organization:root', 1, '2022-04-20 12:46:33', '2022-04-20 12:46:33'),
(69, 'add_role:mng', 'role:mng', 1, '2022-04-20 12:46:33', '2022-04-20 12:46:33'),
(70, 'modify_role:mng', 'role:mng', 1, '2022-04-20 12:46:33', '2022-04-20 12:46:33'),
(71, 'delete_role:mng', 'role:mng', 1, '2022-04-20 12:46:34', '2022-04-20 12:46:34'),
(72, 'department:mng', 'organization:root', 1, '2022-04-20 12:46:34', '2022-04-20 12:46:34'),
(73, 'account:mng', 'organization:root', 1, '2022-04-20 12:46:34', '2022-04-20 12:46:34'),
(74, 'add_account:mng', 'account:mng', 1, '2022-04-20 12:46:34', '2022-04-20 12:46:34'),
(75, 'modify_account:mng', 'account:mng', 1, '2022-04-20 12:46:35', '2022-04-20 12:46:35'),
(76, 'delete_account:mng', 'account:mng', 1, '2022-04-20 12:46:35', '2022-04-20 12:46:35'),
(77, 'reset_password_department:mng', 'account:mng', 1, '2022-04-20 12:46:35', '2022-04-20 12:46:35'),
(78, 'patrolman:mng', 'organization:root', 1, '2022-04-20 12:46:35', '2022-04-20 12:46:35'),
(79, 'add_patrolman:mng', 'patrolman:mng', 1, '2022-04-20 12:46:35', '2022-04-20 12:46:35'),
(80, 'modify_patrolman:mng', 'patrolman:mng', 1, '2022-04-20 12:46:35', '2022-04-20 12:46:35'),
(81, 'delete_patrolman:mng', 'patrolman:mng', 1, '2022-04-20 12:46:35', '2022-04-20 12:46:35'),
(82, 'checkpoint:mng', 'patrol:root', 1, '2022-04-20 12:46:36', '2022-04-20 12:46:36'),
(83, 'add_checkpoint:mng', 'checkpoint:mng', 1, '2022-04-20 12:46:36', '2022-04-20 12:46:36'),
(84, 'modify_checkpoint:mng', 'checkpoint:mng', 1, '2022-04-20 12:46:36', '2022-04-20 12:46:36'),
(85, 'delete_checkpoint:mng', 'checkpoint:mng', 1, '2022-04-20 12:46:36', '2022-04-20 12:46:36'),
(86, 'route:root', 'patrol:root', 1, '2022-04-20 12:46:36', '2022-04-20 12:46:36'),
(87, 'add_route:mng', 'route:root', 1, '2022-04-20 12:46:36', '2022-04-20 12:46:36'),
(88, 'modify_route:mng', 'route:root', 1, '2022-04-20 12:46:36', '2022-04-20 12:46:36'),
(89, 'delete_route:mng', 'route:root', 1, '2022-04-20 12:46:36', '2022-04-20 12:46:36'),
(90, 'route_checkpoint:mng', 'route:root', 1, '2022-04-20 12:46:36', '2022-04-20 12:46:36'),
(91, 'add_route_checkpoint:mng', 'route_checkpoint:mng', 1, '2022-04-20 12:46:36', '2022-04-20 12:46:36'),
(92, 'delete_route_checkpoint:mng', 'route_checkpoint:mng', 1, '2022-04-20 12:46:36', '2022-04-20 12:46:36'),
(93, 'order_route_checkpoint:mng', 'route_checkpoint:mng', 1, '2022-04-20 12:46:36', '2022-04-20 12:46:36'),
(94, 'patrol_task:mng', 'route:root', 1, '2022-04-20 12:46:36', '2022-04-20 12:46:36'),
(95, 'add_patrol_task:mng', 'patrol_task:mng', 1, '2022-04-20 12:46:36', '2022-04-20 12:46:36'),
(96, 'attendance_view_records:mng', 'view_records:root', 1, '2022-04-20 12:46:36', '2022-04-20 12:46:36'),
(97, 'task_details_view_records:mng', 'view_records:root', 1, '2022-04-20 12:46:36', '2022-04-20 12:46:36'),
(98, 'assessment_view_records:mng', 'view_records:root', 1, '2022-04-20 12:46:36', '2022-04-20 12:46:36'),
(99, 'emergency_alarm_view_records:mng', 'view_records:root', 1, '2022-04-20 12:46:36', '2022-04-20 12:46:36'),
(100, 'device_trail_view_records:mng', 'view_records:root', 1, '2022-04-20 12:46:37', '2022-04-20 12:46:37'),
(101, 'real_time_monitoring_view_records:mng', 'view_records:root', 1, '2022-04-20 12:46:37', '2022-04-20 12:46:37'),
(102, 'operation_log_sys:mng', 'sys:mng', 1, '2022-04-20 12:46:37', '2022-04-20 12:46:37'),
(103, 'email_mng_sys:mng', 'sys:mng', 1, '2022-04-20 12:46:37', '2022-04-20 12:46:37'),
(104, 'add_email_mng_sys:mng', 'email_mng_sys:mng', 1, '2022-04-20 12:46:37', '2022-04-20 12:46:37'),
(105, 'delete_email_mng_sys:mng', 'email_mng_sys:mng', 1, '2022-04-20 12:46:37', '2022-04-20 12:46:37'),
(106, 'organization:root', '0', 3, '2022-04-20 13:04:41', '2022-04-20 13:04:41'),
(107, 'role:mng', 'organization:root', 3, '2022-04-20 13:04:41', '2022-04-20 13:04:41'),
(108, 'add_role:mng', 'role:mng', 3, '2022-04-20 13:04:41', '2022-04-20 13:04:41'),
(109, 'modify_role:mng', 'role:mng', 3, '2022-04-20 13:04:41', '2022-04-20 13:04:41'),
(110, 'delete_role:mng', 'role:mng', 3, '2022-04-20 13:04:41', '2022-04-20 13:04:41'),
(111, 'organization:root', '0', 2, '2022-04-20 13:05:57', '2022-04-20 13:05:57'),
(112, 'role:mng', 'organization:root', 2, '2022-04-20 13:05:57', '2022-04-20 13:05:57'),
(113, 'add_role:mng', 'role:mng', 2, '2022-04-20 13:05:57', '2022-04-20 13:05:57'),
(114, 'modify_role:mng', 'role:mng', 2, '2022-04-20 13:05:57', '2022-04-20 13:05:57'),
(115, 'delete_role:mng', 'role:mng', 2, '2022-04-20 13:05:57', '2022-04-20 13:05:57'),
(116, 'department:mng', 'organization:root', 2, '2022-04-20 13:05:57', '2022-04-20 13:05:57'),
(117, 'add_department:mng', 'department:mng', 2, '2022-04-20 13:05:57', '2022-04-20 13:05:57'),
(118, 'modify_department:mng', 'department:mng', 2, '2022-04-20 13:05:57', '2022-04-20 13:05:57'),
(119, 'delete_department:mng', 'department:mng', 2, '2022-04-20 13:05:57', '2022-04-20 13:05:57'),
(120, 'account:mng', 'organization:root', 2, '2022-04-20 13:05:57', '2022-04-20 13:05:57'),
(121, 'add_account:mng', 'account:mng', 2, '2022-04-20 13:05:58', '2022-04-20 13:05:58'),
(122, 'modify_account:mng', 'account:mng', 2, '2022-04-20 13:05:58', '2022-04-20 13:05:58'),
(123, 'delete_account:mng', 'account:mng', 2, '2022-04-20 13:05:58', '2022-04-20 13:05:58'),
(124, 'reset_password_department:mng', 'account:mng', 2, '2022-04-20 13:05:58', '2022-04-20 13:05:58'),
(125, 'patrolman:mng', 'organization:root', 2, '2022-04-20 13:05:58', '2022-04-20 13:05:58'),
(126, 'add_patrolman:mng', 'patrolman:mng', 2, '2022-04-20 13:05:58', '2022-04-20 13:05:58'),
(127, 'modify_patrolman:mng', 'patrolman:mng', 2, '2022-04-20 13:05:58', '2022-04-20 13:05:58'),
(128, 'delete_patrolman:mng', 'patrolman:mng', 2, '2022-04-20 13:05:58', '2022-04-20 13:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `creation_time` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shifts`
--

CREATE TABLE `shifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `patrol_time` time NOT NULL DEFAULT '00:00:00',
  `break_time` time NOT NULL DEFAULT '00:00:00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '$2y$10$9UZKaB8N6omtQNjnusCZ0uqxU.S5OzyF251/HOzoYmtW24peFIoCq',
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `type` enum('administrator','patrolmen','super_admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `organization_id`, `role_id`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nooralamkhan', 'nooralam@gmail.com', '2022-04-14 05:11:28', '$2y$10$QTtvP6xpoN9FC8Kf378Sg.nyWaIPbgtwwRn8wkKIWCYHds8xyT5Qi', 1, NULL, 'super_admin', 'Fp2pYkNRpcsc9z7gZWhFmb9nDNL5Q4murVApCz956AvyCuLIGv6qtKxR3PF4', '2022-04-14 05:11:28', '2022-04-14 05:11:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `check_points`
--
ALTER TABLE `check_points`
  ADD PRIMARY KEY (`id`),
  ADD KEY `check_points_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `devices_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `device_activities`
--
ALTER TABLE `device_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `device_activities_device_id_foreign` (`device_id`);

--
-- Indexes for table `device_routes`
--
ALTER TABLE `device_routes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `device_routes_device_id_foreign` (`device_id`),
  ADD KEY `device_routes_route_id_foreign` (`route_id`);

--
-- Indexes for table `device_settings`
--
ALTER TABLE `device_settings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `device_settings_device_id_foreign` (`device_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organizations`
--
ALTER TABLE `organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patrol_mens`
--
ALTER TABLE `patrol_mens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patrol_mens_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `patrol_tasks`
--
ALTER TABLE `patrol_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patrol_tasks_route_id_foreign` (`route_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_code_unique` (`code`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `routes_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `shifts`
--
ALTER TABLE `shifts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shifts_task_id_foreign` (`task_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_organization_id_foreign` (`organization_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `check_points`
--
ALTER TABLE `check_points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `device_activities`
--
ALTER TABLE `device_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `device_routes`
--
ALTER TABLE `device_routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `device_settings`
--
ALTER TABLE `device_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `patrol_mens`
--
ALTER TABLE `patrol_mens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patrol_tasks`
--
ALTER TABLE `patrol_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shifts`
--
ALTER TABLE `shifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `check_points`
--
ALTER TABLE `check_points`
  ADD CONSTRAINT `check_points_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `devices`
--
ALTER TABLE `devices`
  ADD CONSTRAINT `devices_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `device_activities`
--
ALTER TABLE `device_activities`
  ADD CONSTRAINT `device_activities_device_id_foreign` FOREIGN KEY (`device_id`) REFERENCES `devices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `device_routes`
--
ALTER TABLE `device_routes`
  ADD CONSTRAINT `device_routes_device_id_foreign` FOREIGN KEY (`device_id`) REFERENCES `devices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `device_routes_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `device_settings`
--
ALTER TABLE `device_settings`
  ADD CONSTRAINT `device_settings_device_id_foreign` FOREIGN KEY (`device_id`) REFERENCES `devices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patrol_mens`
--
ALTER TABLE `patrol_mens`
  ADD CONSTRAINT `patrol_mens_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patrol_tasks`
--
ALTER TABLE `patrol_tasks`
  ADD CONSTRAINT `patrol_tasks_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `routes`
--
ALTER TABLE `routes`
  ADD CONSTRAINT `routes_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shifts`
--
ALTER TABLE `shifts`
  ADD CONSTRAINT `shifts_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `patrol_tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
