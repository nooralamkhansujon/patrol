-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 05, 2022 at 09:41 PM
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
-- Table structure for table `checkpoint_logs`
--

CREATE TABLE `checkpoint_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `checkpoint_id` bigint(20) UNSIGNED NOT NULL,
  `device_id` bigint(20) UNSIGNED NOT NULL,
  `patrolman_id` bigint(20) UNSIGNED DEFAULT NULL,
  `create_time` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkpoint_logs`
--

INSERT INTO `checkpoint_logs` (`id`, `checkpoint_id`, `device_id`, `patrolman_id`, `create_time`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 45, 1656790256, '2022-07-02 11:01:50', '2022-07-02 11:01:50'),
(2, 1, 1, 45, 1656790542, '2022-07-02 13:36:16', '2022-07-02 13:36:16'),
(3, 6, 5, 2, 1656790542, '2022-07-05 19:13:51', '2022-07-05 19:13:51'),
(4, 6, 5, 2, 1657048496, '2022-07-05 19:15:09', '2022-07-05 19:15:09');

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

--
-- Dumping data for table `check_points`
--

INSERT INTO `check_points` (`id`, `name`, `code_number`, `organization_id`, `description`, `creation_time`, `created_at`, `updated_at`) VALUES
(1, 'Ceasar Lockman', '7b0092f696', 5, 'Tempore et facere deleniti delectus. At doloremque temporibus vero et. Qui placeat iste eligendi deleniti optio.', '2022-04-24 19:29:10', '2022-04-24 13:29:10', '2022-04-24 13:29:10'),
(2, 'Andreane Bauch', 'Janie Runolfsson Jr.', 1, 'Et quia dicta qui aut quis culpa repellat. Quis minus possimus nesciunt. Ipsam dolorem ut nesciunt natus quas. Ea perspiciatis temporibus amet labore ab porro aut.', '2022-04-24 19:29:10', '2022-04-24 13:29:10', '2022-04-24 13:29:10'),
(3, 'Prof. Ervin Rodriguez DDS', 'Maude Zemlak', 4, 'Qui quisquam ipsa quis eligendi odit impedit tempora. Quo recusandae in nesciunt.', '2022-04-24 19:29:10', '2022-04-24 13:29:10', '2022-04-24 13:29:10'),
(4, 'Amara Schaden', 'Willard Quitzon', 1, 'Facere cum voluptas ea nisi necessitatibus eos. Facere aspernatur ducimus ullam ut et laborum consequatur. Numquam aut quia assumenda.', '2022-04-24 19:29:10', '2022-04-24 13:29:10', '2022-04-24 13:29:10'),
(5, 'Jimmy Purdy', 'Mr. Ervin Pacocha PhD', 4, 'Et dignissimos enim nostrum eaque ut. Quam rem sapiente ipsa eum laboriosam molestiae consequatur. Consequatur enim inventore soluta adipisci soluta nisi. A magnam tempora adipisci.', '2022-04-24 19:29:10', '2022-04-24 13:29:10', '2022-04-24 13:29:10'),
(6, 'Dr. Marshall Abshire II', '08283432', 6, 'Officiis est iste perferendis dignissimos qui earum ea. Qui et iure ex recusandae ea. Eius aut sunt dolor dolorum. Quia nesciunt nulla possimus inventore praesentium sapiente voluptate.', '2022-07-06 00:53:19', '2022-04-24 13:29:10', '2022-07-05 18:53:19'),
(7, 'Ernesto Stehr', 'Hildegard Goodwin', 5, 'Illo id perferendis totam a. Sit omnis ipsum necessitatibus hic dolorem sint quia. Et autem tempore vel iste.', '2022-04-24 19:29:10', '2022-04-24 13:29:10', '2022-04-24 13:29:10'),
(8, 'Garrison Nikolaus', 'Dagmar Koepp', 7, 'Quia ut voluptates in sapiente ut et. Perferendis laboriosam odit ea voluptatem velit. Quia cum blanditiis quo nulla explicabo.', '2022-04-24 19:29:10', '2022-04-24 13:29:10', '2022-04-24 13:29:10'),
(9, 'Dena Williamson', 'Santino West', 7, 'Autem sed impedit voluptas mollitia illum velit earum. Itaque et et dolor nulla. Inventore ea ducimus similique eius reiciendis quo.', '2022-04-24 19:29:10', '2022-04-24 13:29:11', '2022-04-24 13:29:11'),
(10, 'Reta Mitchell', 'Fausto Funk II', 1, 'Quisquam quos repellendus sint enim. Corporis neque dolor sed nisi. Provident modi debitis natus est expedita amet qui.', '2022-04-24 19:29:10', '2022-04-24 13:29:11', '2022-04-24 13:29:11'),
(11, 'Gabe Howe', 'Mr. Lane Barrows I', 4, 'Neque ratione aliquid ut excepturi dolores. Accusantium aut velit ea sequi. Ipsum quia velit adipisci. Quia distinctio autem et nobis. In molestias eaque molestiae a quia consequuntur dolores.', '2022-04-24 19:29:10', '2022-04-24 13:29:11', '2022-04-24 13:29:11'),
(12, 'Miss Tressa Farrell Jr.', 'Maddison Stiedemann II', 5, 'Est et temporibus et est ipsam. Velit voluptas quis earum molestias. Praesentium aliquid eum rerum sequi dicta ipsa quibusdam. Quis voluptate nesciunt vel consectetur et eaque consequatur.', '2022-04-24 19:29:10', '2022-04-24 13:29:11', '2022-04-24 13:29:11'),
(13, 'Adelia Hand III', 'Monroe Doyle', 3, 'Veritatis ad nemo aut molestiae animi placeat. Molestiae et vel magni impedit aut. Quia tenetur quae consequatur magnam autem quo. Laudantium aut nostrum beatae.', '2022-04-24 19:29:10', '2022-04-24 13:29:11', '2022-04-24 13:29:11'),
(14, 'Prof. Guadalupe Mayert DDS', 'Frida Kessler', 4, 'Ut sequi consequuntur eius quis dicta. Animi voluptatibus exercitationem et atque numquam sed porro. Eos ipsam aut rem quos odio dolorem molestiae. Voluptatem rerum tempora nesciunt possimus.', '2022-04-24 19:29:10', '2022-04-24 13:29:12', '2022-04-24 13:29:12'),
(15, 'Raheem Rodriguez', 'Cleve Friesen', 1, 'Occaecati autem est repellat. Itaque ut vel ea a aut dolores. Ut officiis porro magnam iusto modi.', '2022-04-24 19:29:10', '2022-04-24 13:29:12', '2022-04-24 13:29:12'),
(16, 'Roel Parisian I', 'Dr. Ara Wisozk Sr.', 7, 'Et mollitia non animi blanditiis repudiandae enim sunt. Consequuntur voluptas quidem et architecto ducimus. Optio voluptate in exercitationem at quis possimus sit.', '2022-04-24 19:29:10', '2022-04-24 13:29:12', '2022-04-24 13:29:12'),
(17, 'Georgette Skiles', 'Rodrigo Stehr', 4, 'Quis omnis quo nesciunt quia illo fugiat veritatis. Eius architecto sed ut id. Voluptatem quia in aut aliquam minima. Nostrum nihil architecto laborum voluptas.', '2022-04-24 19:29:10', '2022-04-24 13:29:12', '2022-04-24 13:29:12'),
(18, 'Jordyn Blanda', 'Antoinette Funk', 3, 'Voluptate reprehenderit aliquam ut. Hic nulla aliquid consequatur et et cupiditate ipsam dolor. Id dolor rerum qui ex est corporis. Sit ipsa alias nesciunt quos inventore.', '2022-04-24 19:29:10', '2022-04-24 13:29:12', '2022-04-24 13:29:12'),
(19, 'Ms. Kathlyn Rolfson MD', 'Dr. Harvey Harris', 4, 'Voluptatibus hic magnam nisi ullam quasi saepe quisquam. Vel et labore vero cum assumenda est. Nostrum non qui voluptatibus sed dolores et velit cupiditate.', '2022-04-24 19:29:10', '2022-04-24 13:29:12', '2022-04-24 13:29:12'),
(20, 'Edythe Miller', 'Prof. Bartholome Denesik', 7, 'Atque et itaque fugiat ut officia. Enim dolorum quibusdam dolor expedita aut.', '2022-04-24 19:29:10', '2022-04-24 13:29:12', '2022-04-24 13:29:12'),
(21, 'Antonette Steuber', 'Allene Olson', 3, 'Sunt fuga at fugiat quos magnam. Voluptatem nam vel molestias vitae nulla architecto iure. Nesciunt earum eos rerum dolorem et impedit illum. Tempora nihil adipisci rerum quia doloremque fuga cum.', '2022-04-24 19:29:10', '2022-04-24 13:29:13', '2022-04-24 13:29:13'),
(22, 'Randall Metz', 'Miss Maggie Bednar PhD', 4, 'Aspernatur dolore quos est corporis. Qui et ut aliquam. Quidem doloremque iure blanditiis est iusto. Enim quo et sit eos velit voluptate. Non earum et repellendus. Voluptatem fuga facere velit minus.', '2022-04-24 19:29:10', '2022-04-24 13:29:13', '2022-04-24 13:29:13'),
(23, 'Ms. Vernie Wyman Sr.', 'Prof. Taya Turcotte PhD', 6, 'Excepturi modi incidunt ut nihil soluta dolorum. Ipsum soluta dolor soluta reprehenderit. Optio ea autem sed ut quas.', '2022-04-24 19:29:10', '2022-04-24 13:29:13', '2022-04-24 13:29:13'),
(24, 'Jordy Nolan', 'Angus Bruen', 6, 'Blanditiis nam doloremque omnis quas omnis deleniti. Omnis voluptas aut molestiae voluptatem ut provident vel.', '2022-04-24 19:29:10', '2022-04-24 13:29:13', '2022-04-24 13:29:13'),
(25, 'Ciara McLaughlin', 'Letitia McCullough', 4, 'Nisi impedit natus eum ut. Sint sed ullam sunt debitis et. Est ipsam voluptas sit architecto incidunt.', '2022-04-24 19:29:10', '2022-04-24 13:29:13', '2022-04-24 13:29:13'),
(26, 'Estefania Breitenberg', 'Jovanny Paucek', 4, 'Sit laudantium voluptatum ex possimus delectus ut ipsam. Molestias ipsa minus eius repellendus veniam. Eos non sed quasi voluptates. Qui quis aut asperiores. Rerum voluptas odit vero quos ipsum ut.', '2022-04-24 19:29:10', '2022-04-24 13:29:13', '2022-04-24 13:29:13'),
(27, 'Mrs. Mollie Anderson I', 'Dorothea Boyer MD', 5, 'Adipisci ab laborum vel voluptatem impedit voluptatum. Quisquam ipsa et iusto sit tempora neque et laboriosam. Omnis animi sunt quo dolores est. Ipsum nihil et non.', '2022-04-24 19:29:10', '2022-04-24 13:29:13', '2022-04-24 13:29:13'),
(28, 'Jayme Will', 'Mrs. Ashly Rowe', 4, 'Omnis incidunt sint in tempora quaerat rem possimus. Sit autem nihil ea laborum sed aut. Blanditiis architecto ea ut.', '2022-04-24 19:29:10', '2022-04-24 13:29:13', '2022-04-24 13:29:13'),
(29, 'Davon Bednar IV', 'Rose Crist', 5, 'Necessitatibus non amet laboriosam dolor minus quasi. Eum ad ipsam consequatur a eius eum. Ut fugit a porro mollitia. Dolores velit molestiae enim sint nemo.', '2022-04-24 19:29:10', '2022-04-24 13:29:13', '2022-04-24 13:29:13'),
(30, 'Mrs. Elta Koss', 'Christian Mann', 6, 'Dignissimos est est sed explicabo nisi omnis quo. Ullam mollitia ex et quo. Tenetur expedita temporibus fugiat iste qui aut aliquid.', '2022-04-24 19:29:10', '2022-04-24 13:29:13', '2022-04-24 13:29:13'),
(31, 'Elnora Wilkinson', 'Dr. Luna DuBuque II', 6, 'Ut facere omnis repudiandae magnam. Voluptas animi esse asperiores officia. Neque molestias eum exercitationem quos. Velit consectetur deleniti qui rerum ut delectus. In aliquam cupiditate ea.', '2022-04-24 19:29:10', '2022-04-24 13:29:13', '2022-04-24 13:29:13'),
(32, 'Prof. Glenna Dickinson PhD', 'Aliyah Champlin', 6, 'Sint a tenetur alias. Ut laboriosam officia architecto corporis beatae. Ad molestiae et in optio optio aut quaerat.', '2022-04-24 19:29:10', '2022-04-24 13:29:13', '2022-04-24 13:29:13'),
(33, 'Modesta Walsh', 'Reese Lehner', 4, 'Magnam veritatis dignissimos optio aspernatur molestias nostrum. Repudiandae nihil veritatis aut esse mollitia. Unde culpa quia nihil sed. In et sequi ipsum eos voluptatibus.', '2022-04-24 19:29:10', '2022-04-24 13:29:13', '2022-04-24 13:29:13'),
(34, 'Verlie Kunde', 'Edyth Hoppe', 4, 'Eum vitae aliquam ea facilis voluptatum. In placeat similique et quae sed id. Ab optio officia beatae qui autem itaque. Eum unde aut commodi et.', '2022-04-24 19:29:10', '2022-04-24 13:29:13', '2022-04-24 13:29:13'),
(35, 'Philip Lubowitz', 'Reuben Kris', 4, 'Hic error tenetur architecto deleniti. Quia tempore qui numquam doloribus. Deleniti rerum minima veniam commodi accusantium non quaerat.', '2022-04-24 19:29:10', '2022-04-24 13:29:13', '2022-04-24 13:29:13'),
(36, 'Prof. Luther Crist', 'Corrine O\'Connell', 4, 'Aut voluptas adipisci et consequuntur est. Non quaerat error voluptatem sequi. Veniam voluptatibus sint et ducimus.', '2022-04-24 19:29:10', '2022-04-24 13:29:14', '2022-04-24 13:29:14'),
(37, 'Prof. Zackery Kihn', 'Minnie Greenholt', 7, 'Minima ex quo sequi itaque et dignissimos tenetur. Expedita quos aut incidunt dicta expedita aliquam. Qui possimus non et minus perferendis rem. Distinctio dolore dolore cumque eos provident et ut.', '2022-04-24 19:29:10', '2022-04-24 13:29:14', '2022-04-24 13:29:14'),
(38, 'Mrs. Carolyn Koss III', 'Max Wilkinson', 1, 'Quod ipsam necessitatibus labore sint pariatur labore modi. Quas in et unde quae quo dolore nihil harum. Atque blanditiis minima impedit ut sed.', '2022-04-24 19:29:10', '2022-04-24 13:29:14', '2022-04-24 13:29:14'),
(39, 'Raymond Pagac', 'Derek Goodwin', 1, 'Et tempora dolorum reiciendis id dolores. Ut perspiciatis assumenda provident aut doloribus sit quod. Qui ut aliquid quia sint fugiat quia. In accusamus consequatur sed assumenda maxime dolor.', '2022-04-24 19:29:10', '2022-04-24 13:29:14', '2022-04-24 13:29:14'),
(40, 'Daisy Schaefer', 'King Berge', 3, 'Voluptas libero neque fuga quis aperiam facilis. Corporis temporibus sed saepe occaecati id id qui exercitationem. Aut unde adipisci qui vel. Nesciunt eos culpa eum esse ducimus reprehenderit.', '2022-04-24 19:29:10', '2022-04-24 13:29:14', '2022-04-24 13:29:14'),
(43, 'nooralamkhan', '6008232334', 12, 'modules it childs', '2022-06-07 17:57:36', '2022-06-07 11:57:36', '2022-06-07 11:57:36'),
(44, 'new mehedi vhai', '6008232334', 13, 'sdfsadfsdfsfsdf', '2022-06-07 17:59:03', '2022-06-07 11:58:17', '2022-06-07 11:59:03');

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `device_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization_id` bigint(20) UNSIGNED NOT NULL,
  `patrolman_id` bigint(20) UNSIGNED DEFAULT NULL,
  `model` tinyint(4) NOT NULL DEFAULT 2,
  `last_scan_time` bigint(20) DEFAULT NULL,
  `ele` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `name`, `device_number`, `mode`, `description`, `organization_id`, `patrolman_id`, `model`, `last_scan_time`, `ele`, `created_at`, `updated_at`) VALUES
(1, 'NBEL-Katapara_Reader', '91451173', '0', 'Binary Brains Ltd', 3, 45, 2, 1656790542, 0, '2022-05-02 15:22:42', '2022-07-02 13:36:16'),
(2, 'nooralamkhan', '083438232', '1', 'dasfs', 10, NULL, 3, 0, 0, '2022-06-25 12:41:33', '2022-06-25 12:41:33'),
(3, 'new device2', '0834380134', '2', 'sdasdlasdfkasf', 4, 16, 2, NULL, NULL, '2022-06-26 04:46:19', '2022-06-26 04:46:19'),
(4, 'krc devices now', '03823418', '1', 'krc', 1, 46, 2, NULL, NULL, '2022-06-26 04:51:44', '2022-06-26 04:51:44'),
(5, 'nooralam device', '88888888', '0', 'nooralam devices', 6, 2, 2, 1657048496, NULL, '2022-07-05 19:13:41', '2022-07-05 19:15:09');

-- --------------------------------------------------------

--
-- Table structure for table `device_activities`
--

CREATE TABLE `device_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `last_scan_time` datetime NOT NULL,
  `ele` double(8,2) DEFAULT NULL,
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
(16, '2022_04_14_073544_create_device_settings_table', 1),
(17, '2022_04_14_074109_create_device_routes_table', 1),
(21, '2022_04_14_073111_create_roles_table', 3),
(23, '2022_04_14_073317_create_role_has_permissions_table', 3),
(26, '2022_04_14_073212_create_permissions_table', 4),
(27, '2022_04_17_114257_add_some_columns_in_permissions_table', 4),
(28, '2022_04_21_181551_add_some_column_in_users_table', 5),
(29, '2022_04_21_182949_create_user_role_table', 6),
(30, '2022_04_25_195017_create_route_checkpoints_table', 7),
(31, '2022_04_14_073434_create_patrol_tasks_table', 8),
(32, '2022_04_14_073435_create_plan_times_table', 8),
(33, '2022_04_14_073525_create_devices_table', 9),
(34, '2022_04_14_202424_create_device_activities_table', 9),
(35, '2022_07_02_062429_create_checkpoint_logs_table', 10);

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
(14, 'kfc 51/a/10', 'bbb', 13, '2022-04-19 08:24:12', '2022-04-19 08:24:12'),
(17, 'chamuk Company', 'xxxddd', 1, '2022-04-24 04:58:44', '2022-04-24 04:59:08');

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

--
-- Dumping data for table `patrol_mens`
--

INSERT INTO `patrol_mens` (`id`, `name`, `code_number`, `organization_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Carlie Nikolaus', 'Kxd2DeQSwu83FjI', 1, 'Harum minus officia non a est. Veritatis aut cumque necessitatibus totam. Necessitatibus vero consequatur voluptas et.', '2022-04-24 01:56:40', '2022-04-24 03:31:19'),
(2, 'Marcus Lang', 'djatH0mubiJf97J', 6, 'Sunt labore laboriosam beatae totam voluptatibus. In cupiditate exercitationem omnis ut ut officiis et.', '2022-04-24 01:56:40', '2022-04-24 01:56:40'),
(3, 'Larue Bradtke', 'aG4rT8OWYfwGQaH', 3, 'Id animi non placeat aut dolorem. Esse quam adipisci porro nihil et amet. Quam soluta soluta fuga.', '2022-04-24 01:56:40', '2022-04-24 01:56:40'),
(4, 'Oliver Gorczany', 'tksKYdZwoQWFuVy', 3, 'Distinctio blanditiis perferendis mollitia optio. Nostrum deserunt perspiciatis harum eos doloribus odio. Blanditiis nihil qui suscipit.', '2022-04-24 01:56:40', '2022-04-24 01:56:40'),
(5, 'Amos Howell', 'bpy0O1XExGxnj7s', 5, 'Labore qui expedita quis aut qui et et. Sit ut et dolor recusandae quia dolore eligendi. Ut ut blanditiis architecto ipsam consequatur.', '2022-04-24 01:56:40', '2022-04-24 01:56:40'),
(6, 'Kamille Swaniawski', 'LBzD3Oj7y2gv8V9', 7, 'Architecto aut dolor sit non qui. Rerum dignissimos sequi delectus sed ducimus. Et sint ex suscipit reiciendis sed ducimus.', '2022-04-24 01:56:40', '2022-04-24 01:56:40'),
(7, 'Pablo Okuneva', 'YsILEpAZ3tmlNjx', 1, 'Debitis expedita voluptatum cumque in aliquid quia. Quam maxime eos modi aliquid dolore. Laboriosam ullam quae nisi. Necessitatibus nisi unde id tempore ut omnis dignissimos.', '2022-04-24 01:56:41', '2022-04-24 01:56:41'),
(8, 'Mrs. Elnora Homenick', 'p4AVpyMMQu4ywZ7', 4, 'Veritatis at earum magnam quam. Corporis corrupti dolores libero odit maxime explicabo. Similique tempora adipisci consequatur facilis exercitationem.', '2022-04-24 01:56:41', '2022-04-24 01:56:41'),
(9, 'Alaina Maggio', 'xfWrGJlVf2EThOT', 3, 'Ut enim rerum et eveniet quo ea. Veritatis consequatur repudiandae eum. Quidem corporis laborum omnis inventore eius enim. Illo ad ea esse eos sint totam.', '2022-04-24 01:56:41', '2022-04-24 01:56:41'),
(10, 'Claudie Hansen', 'uA9Or7K2HCVAI9P', 3, 'Ut debitis deleniti nisi reiciendis et repudiandae repellat voluptatem. In hic voluptatum quos maxime est. Ut cupiditate est ut.', '2022-04-24 01:56:41', '2022-04-24 01:56:41'),
(11, 'Mr. Merlin Schmitt', 'xwOvBG1RVKBo15o', 6, 'Aliquam voluptatem ea dolor iste. Et magnam repellat dolor. Autem qui dolores ut aut quod fugit quis. Omnis odio asperiores architecto architecto.', '2022-04-24 01:56:41', '2022-04-24 01:56:41'),
(12, 'Mr. Florian Morar DVM', 'ywDxZYp4sQxcaPr', 3, 'Magni aliquid molestias rerum. Eum voluptatem exercitationem aut blanditiis eligendi itaque porro. Ea ab consequatur aut ullam aut velit neque.', '2022-04-24 01:56:41', '2022-04-24 01:56:41'),
(13, 'Terence Reynolds DVM', 'zFywlocByu3447m', 3, 'Omnis rerum odit molestiae in ut. Amet sit provident nihil. Qui repellendus est enim quis voluptatum molestias.', '2022-04-24 01:56:41', '2022-04-24 01:56:41'),
(14, 'Doyle Donnelly', 'bYaXifsimyKRzlB', 3, 'Quibusdam culpa rerum perferendis quis eligendi. Accusantium illo numquam in sunt delectus. Rem provident et officia explicabo beatae omnis.', '2022-04-24 01:56:41', '2022-04-24 01:56:41'),
(15, 'Effie Denesik', 'BOpmAu4lFQCN976', 3, 'Consectetur neque et voluptatem voluptatem laudantium. Illum quod accusantium vel sapiente nulla. Aut eaque nostrum et ratione est ipsam.', '2022-04-24 01:56:41', '2022-04-24 01:56:41'),
(16, 'Walker Brakus', 'c6XdJE5EFgTaywL', 4, 'Praesentium aut neque voluptates autem. Voluptatem qui dolorem aut vel consequatur. Quidem voluptatem optio quis dolorem consequatur illo aut odit.', '2022-04-24 01:56:42', '2022-04-24 01:56:42'),
(17, 'Edythe Kilback', 'L8co5sUCHX3is2q', 7, 'Est rem quae blanditiis dolores eos. Est in reprehenderit similique repellat ea odit dolorem. Debitis voluptate et officia eius id est.', '2022-04-24 01:56:42', '2022-04-24 01:56:42'),
(18, 'Julia Berge PhD', 'rYK8OXleFLOXXiN', 4, 'Facere ut harum est in optio et veniam. Qui quisquam ut aperiam vel maxime saepe cupiditate tenetur. Perspiciatis dolorem nisi consequuntur iure qui ipsa corrupti. Et quidem corrupti molestiae.', '2022-04-24 01:56:42', '2022-04-24 01:56:42'),
(19, 'Lorenzo Gleichner', 'KSYef9rxHGyLCBX', 1, 'Enim et repellat quae. Soluta a facilis dolore delectus omnis at rem. Libero qui sequi dolor. Voluptatem et veritatis deleniti consequatur sequi.', '2022-04-24 01:56:42', '2022-04-24 01:56:42'),
(20, 'Darrin Terry', 'uFixLQ2qtnropCb', 1, 'Voluptatum tempora culpa et amet veniam vel itaque. Eius et sapiente magnam explicabo. Beatae deleniti dolor deserunt velit aut est.', '2022-04-24 01:56:42', '2022-04-24 01:56:42'),
(21, 'Paul Ritchie', 'rOH5tW1bAgnjbQx', 6, 'Maxime earum et aut error qui. Nihil ab ut consequuntur debitis delectus quos voluptatem unde. Saepe praesentium molestias dolorem et et sunt tempore.', '2022-04-24 01:56:42', '2022-04-24 01:56:42'),
(22, 'Terence Jerde', '5s1YTBVgTNPQrC8', 4, 'Perferendis blanditiis omnis modi velit distinctio corporis. Nemo pariatur quasi iure molestias. Reprehenderit rem neque molestias.', '2022-04-24 01:56:42', '2022-04-24 01:56:42'),
(23, 'Issac Purdy DDS', '9UEKl1DndP3g74k', 6, 'Laudantium sint nam tempora id eum qui. Voluptas debitis qui et enim aut est facilis excepturi. Nobis consequatur delectus aliquid ab architecto cupiditate.', '2022-04-24 01:56:42', '2022-04-24 01:56:42'),
(24, 'Nakia Bergnaum', 'W1ShprKwPZbU5CL', 6, 'Dolorum incidunt ex quo veritatis qui. Soluta sequi nemo harum possimus. Sit quam aut veniam. Voluptatibus et iste velit maiores nemo.', '2022-04-24 01:56:42', '2022-04-24 01:56:42'),
(25, 'Mr. Kale Dare', 'sPO1h9gq9LHeCXA', 1, 'Sint est qui similique aspernatur. Enim omnis ipsum ut sint. Voluptatem aut placeat neque enim delectus ad dignissimos quasi.', '2022-04-24 01:56:42', '2022-04-24 01:56:42'),
(26, 'Rex Brekke', 'mFJGUtFcsMSNKgc', 5, 'Laborum et velit aspernatur sapiente ut sit. Error qui quo quae quis minus. Ut at ut velit qui. Quia voluptas dolor accusamus asperiores quia sequi.', '2022-04-24 01:56:42', '2022-04-24 01:56:42'),
(27, 'Leda Reinger Sr.', 'w3Znzm4WZGuhLOQ', 3, 'Ea debitis et necessitatibus facilis eos iusto esse quia. Culpa nulla quis et molestiae quia. Temporibus a occaecati in voluptas nemo repudiandae.', '2022-04-24 01:56:42', '2022-04-24 01:56:42'),
(28, 'Lempi Christiansen', 'UpwzceDGCC4IUFv', 6, 'Suscipit quaerat culpa dignissimos qui. Harum maxime quis repudiandae explicabo molestias quis. Nostrum minus qui perspiciatis sit ut molestiae quidem. Facilis aliquid qui aperiam ea hic rerum ut.', '2022-04-24 01:56:42', '2022-04-24 01:56:42'),
(29, 'Catalina Fahey', 'sSKHYP4i5PAYKmJ', 1, 'Nobis in odit eos quia. Et iste cupiditate numquam eos. Modi eaque consectetur atque illo numquam aut tempore.', '2022-04-24 01:56:42', '2022-04-24 01:56:42'),
(30, 'Dr. Marge Williamson', 'vNc7dTcwX1UFmL9', 3, 'Facilis et exercitationem minus ipsum et non laborum aut. Commodi ducimus similique vero. Odio quam quo id ut quis fugiat.', '2022-04-24 01:56:42', '2022-04-24 01:56:42'),
(31, 'Cielo Ondricka Jr.', 'fBoFzPaChvykUWT', 6, 'Deleniti eum modi aut commodi dolor. Blanditiis ut ab dolor beatae et. Molestiae sunt totam culpa. Porro et et natus sed ipsum non natus.', '2022-04-24 01:56:42', '2022-04-24 01:56:42'),
(32, 'Laury Yost II', '7Gg5LOIhMkqi1oH', 1, 'Voluptatem optio debitis magni ipsam iusto ut. Nisi molestiae omnis sint quis. Ut sunt itaque harum dolor molestiae. Et modi aspernatur unde aut.', '2022-04-24 01:56:42', '2022-04-24 01:56:42'),
(33, 'Whitney Bartell I', '3K7v7qtax8k4kIZ', 6, 'Quis id consectetur iure qui voluptate quae. Hic eligendi tempora sapiente consequatur nesciunt et. Unde molestiae suscipit rem consectetur.', '2022-04-24 01:56:42', '2022-04-24 01:56:42'),
(34, 'Lilla Anderson', 'FCDY5JOsPoanGXX', 7, 'Similique rerum ut quia. Nihil est quibusdam voluptatem impedit voluptate non dicta.', '2022-04-24 01:56:42', '2022-04-24 01:56:42'),
(35, 'Kaitlyn Brekke', 'xwYAziq6gmnZiri', 1, 'Ut ipsum officiis non tempore. Odit provident non consequuntur quod nemo eum voluptas.', '2022-04-24 01:56:43', '2022-04-24 01:56:43'),
(36, 'Laila Konopelski', '1T43Qt613m8r3dN', 1, 'Sequi laudantium vel aut dolor autem error. Eos autem consequatur quo quisquam non. Possimus magnam rerum fuga rerum dolorem quia voluptatem.', '2022-04-24 01:56:43', '2022-04-24 01:56:43'),
(37, 'Mr. Domenico Conroy III', 'VV4pTFXZTN8rmJy', 4, 'Veniam ut dicta explicabo. Cumque et autem quos dolor est consectetur aperiam. Vel architecto veniam iusto. Sapiente fugiat enim architecto consequatur nihil.', '2022-04-24 01:56:43', '2022-04-24 01:56:43'),
(38, 'Darrel Erdman DDS', 'mc3E049wNYi7lyV', 5, 'Aliquam ut necessitatibus iste id eaque. Iste sequi commodi facilis voluptas esse. Iure sit adipisci perspiciatis quo.', '2022-04-24 01:56:43', '2022-04-24 01:56:43'),
(39, 'Nannie Schimmel', 'rlUFKIdLlSAsGJG', 7, 'Est labore eos harum quisquam quis. Velit magnam et nihil. Harum ut culpa consequuntur provident exercitationem temporibus non.', '2022-04-24 01:56:43', '2022-04-24 01:56:43'),
(40, 'Napoleon Kuhlman', 'SSH0XJOeUg1MkTZ', 5, 'Dolorum sequi aut tempore eos vel itaque ad. Voluptatem autem maxime deleniti consequatur. Labore totam aliquid ullam fuga.', '2022-04-24 01:56:43', '2022-04-24 01:56:43'),
(41, 'Mariah Bernhard', 'bTlqjfOMAo8ZF0s', 4, 'Vel itaque itaque cupiditate id. Modi aut aliquid exercitationem sed ipsam. Eum est quia ut quibusdam.', '2022-04-24 01:56:43', '2022-04-24 01:56:43'),
(42, 'Pamela Boehm', 'H9GMsKWQyYchsb8', 3, 'Quo illum ut vitae delectus sed. Saepe et consectetur pariatur a dolores. Illum maiores ut est sed modi voluptatem. Et voluptatem veniam officia est sint quidem sit porro.', '2022-04-24 01:56:43', '2022-04-24 01:56:43'),
(43, 'Prof. Eldred Rath DVM', 'ZGUJbW1dgGLDrxj', 7, 'Neque quae aut voluptatem dolorum dolor itaque at. Dignissimos veritatis voluptas doloribus quas qui ea. Odio quae quae delectus dolore excepturi vel sed.', '2022-04-24 01:56:43', '2022-04-24 01:56:43'),
(44, 'Ms. Amina Feeney III', '2wAfb1O9xMnlMI2', 3, 'Quia vero est nihil ipsa. Aut maxime qui autem sed similique. Earum officia non a perferendis est.', '2022-04-24 01:56:43', '2022-04-24 01:56:43'),
(45, 'Kole McGlynn', '0uvS69YjsUn1Blb', 3, 'Nobis sunt cum dignissimos veritatis provident iure et rerum. Ipsa similique non harum consectetur enim. Quaerat ullam quod nostrum quasi excepturi voluptatem cum.', '2022-04-24 01:56:43', '2022-04-24 01:56:43'),
(46, 'Milford Green MD', 'PaLQR4SpwmLaOKE', 1, 'Et voluptate voluptatibus pariatur dolorem quaerat et. Mollitia consectetur et aliquid provident qui. Dolor sequi corporis molestiae.', '2022-04-24 01:56:43', '2022-04-24 01:56:43'),
(47, 'Vinnie Bayer Sr.', 'ynAoSpQEGw5iwLg', 5, 'Repellat alias quia odit in modi voluptatem. Quia excepturi doloribus ut quia architecto et. Non saepe nam quo et vero deserunt dolores in.', '2022-04-24 01:56:43', '2022-04-24 01:56:43'),
(48, 'Tania Bashirian', 'Cfx4CEcALGdy68z', 5, 'Et ut quae praesentium quia. Vitae eum quia rerum deserunt aut voluptatem. Qui quisquam nulla velit facere harum ut porro.', '2022-04-24 01:56:43', '2022-04-24 01:56:43'),
(49, 'Ada McKenzie', 'T2wXdsGQF8NkwYX', 1, 'Non ullam aut beatae consequatur tempore. Repellendus fugiat explicabo et voluptate excepturi. Excepturi non minus et similique earum soluta. Sed repudiandae sint eum neque qui ipsam consectetur.', '2022-04-24 01:56:43', '2022-04-24 01:56:43'),
(50, 'Sydney Boyle V', 'n0CUtO3OkllYy5H', 3, 'Nemo perspiciatis maxime reiciendis dolores unde. Odio autem fugiat officia. Qui debitis sed ut. Ipsum eius et velit provident corrupti.', '2022-04-24 01:56:43', '2022-04-24 01:56:43'),
(51, 'mehedi mamun', '6008232334', 9, 'mehedi mamun', '2022-04-24 03:35:57', '2022-04-24 03:37:27'),
(52, 'nuhas bhai', '3233232', 17, 'dddff', '2022-04-24 05:04:31', '2022-04-24 05:04:44'),
(53, 'jakirkhand', '600823233', 17, 'vvv', '2022-04-24 05:05:31', '2022-04-24 05:05:31'),
(54, 'nooralam patrolman', '782832343', 6, 'nooralam patrolman', '2022-07-05 17:51:40', '2022-07-05 17:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `patrol_tasks`
--

CREATE TABLE `patrol_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` bigint(11) DEFAULT NULL,
  `end_date` bigint(20) DEFAULT NULL,
  `building` tinyint(4) DEFAULT NULL,
  `cycle` int(11) DEFAULT NULL,
  `type` enum('0','1','2') COLLATE utf8mb4_unicode_ci NOT NULL,
  `fri` tinyint(1) NOT NULL DEFAULT 0,
  `sat` tinyint(1) NOT NULL DEFAULT 0,
  `sun` tinyint(1) NOT NULL DEFAULT 0,
  `mon` tinyint(1) NOT NULL DEFAULT 0,
  `tue` tinyint(1) NOT NULL DEFAULT 0,
  `wed` tinyint(1) NOT NULL DEFAULT 0,
  `thu` tinyint(1) NOT NULL DEFAULT 0,
  `reCreate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patrol_tasks`
--

INSERT INTO `patrol_tasks` (`id`, `name`, `route_id`, `start_date`, `end_date`, `building`, `cycle`, `type`, `fri`, `sat`, `sun`, `mon`, `tue`, `wed`, `thu`, `reCreate`, `created_at`, `updated_at`) VALUES
(9, 'nahim chowdhury  route', 1, 1656525600000, NULL, NULL, NULL, '0', 1, 1, 1, 1, 1, 1, 1, '0000', '2022-06-28 13:41:45', '2022-06-28 13:41:45'),
(10, 'nooralam patrolman', 8, 1657130400000, NULL, NULL, NULL, '0', 1, 1, 1, 1, 1, 1, 1, '0000', '2022-07-05 18:20:43', '2022-07-05 18:20:43');

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
-- Table structure for table `plan_times`
--

CREATE TABLE `plan_times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `start_time` bigint(20) NOT NULL,
  `end_time` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `plan_times`
--

INSERT INTO `plan_times` (`id`, `task_id`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(7, 9, 1514743200000, 1514815200000, '2022-06-28 13:41:45', '2022-06-28 13:41:45'),
(8, 10, 1514743200000, 1514826000000, '2022-07-05 18:20:43', '2022-07-05 18:20:43');

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
(3, 'dasdfasdfasdf', 'asdfasdfas', '2022-04-20 13:04:41', '2022-04-20 13:04:41'),
(4, 'Mr Champuk', 'champuk bhai', '2022-04-24 04:30:33', '2022-04-24 04:30:33');

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
(128, 'delete_patrolman:mng', 'patrolman:mng', 2, '2022-04-20 13:05:58', '2022-04-20 13:05:58'),
(136, 'organization:root', '0', 4, '2022-04-24 04:30:48', '2022-04-24 04:30:48'),
(137, 'role:mng', 'organization:root', 4, '2022-04-24 04:30:48', '2022-04-24 04:30:48'),
(138, 'add_role:mng', 'role:mng', 4, '2022-04-24 04:30:48', '2022-04-24 04:30:48'),
(139, 'modify_role:mng', 'role:mng', 4, '2022-04-24 04:30:49', '2022-04-24 04:30:49'),
(140, 'department:mng', 'organization:root', 4, '2022-04-24 04:30:49', '2022-04-24 04:30:49'),
(141, 'add_department:mng', 'department:mng', 4, '2022-04-24 04:30:49', '2022-04-24 04:30:49'),
(142, 'modify_department:mng', 'department:mng', 4, '2022-04-24 04:30:49', '2022-04-24 04:30:49'),
(143, 'account:mng', 'organization:root', 4, '2022-04-24 04:30:49', '2022-04-24 04:30:49'),
(144, 'add_account:mng', 'account:mng', 4, '2022-04-24 04:30:49', '2022-04-24 04:30:49'),
(188, 'department:mng', 'organization:root', 1, '2022-07-05 18:29:06', '2022-07-05 18:29:06'),
(189, 'account:mng', 'organization:root', 1, '2022-07-05 18:29:06', '2022-07-05 18:29:06'),
(190, 'add_account:mng', 'account:mng', 1, '2022-07-05 18:29:07', '2022-07-05 18:29:07'),
(191, 'modify_account:mng', 'account:mng', 1, '2022-07-05 18:29:07', '2022-07-05 18:29:07'),
(192, 'delete_account:mng', 'account:mng', 1, '2022-07-05 18:29:07', '2022-07-05 18:29:07'),
(193, 'reset_password_department:mng', 'account:mng', 1, '2022-07-05 18:29:07', '2022-07-05 18:29:07'),
(194, 'patrolman:mng', 'organization:root', 1, '2022-07-05 18:29:07', '2022-07-05 18:29:07'),
(195, 'add_patrolman:mng', 'patrolman:mng', 1, '2022-07-05 18:29:07', '2022-07-05 18:29:07'),
(196, 'modify_patrolman:mng', 'patrolman:mng', 1, '2022-07-05 18:29:07', '2022-07-05 18:29:07'),
(197, 'delete_patrolman:mng', 'patrolman:mng', 1, '2022-07-05 18:29:07', '2022-07-05 18:29:07'),
(198, 'patrol:root', '0', 1, '2022-07-05 18:29:07', '2022-07-05 18:29:07'),
(199, 'checkpoint:mng', 'patrol:root', 1, '2022-07-05 18:29:07', '2022-07-05 18:29:07'),
(200, 'add_checkpoint:mng', 'checkpoint:mng', 1, '2022-07-05 18:29:07', '2022-07-05 18:29:07'),
(201, 'modify_checkpoint:mng', 'checkpoint:mng', 1, '2022-07-05 18:29:07', '2022-07-05 18:29:07'),
(202, 'delete_checkpoint:mng', 'checkpoint:mng', 1, '2022-07-05 18:29:07', '2022-07-05 18:29:07'),
(203, 'route:root', 'patrol:root', 1, '2022-07-05 18:29:07', '2022-07-05 18:29:07'),
(204, 'add_route:mng', 'route:root', 1, '2022-07-05 18:29:07', '2022-07-05 18:29:07'),
(205, 'modify_route:mng', 'route:root', 1, '2022-07-05 18:29:08', '2022-07-05 18:29:08'),
(206, 'delete_route:mng', 'route:root', 1, '2022-07-05 18:29:08', '2022-07-05 18:29:08'),
(207, 'route_checkpoint:mng', 'route:root', 1, '2022-07-05 18:29:08', '2022-07-05 18:29:08'),
(208, 'add_route_checkpoint:mng', 'route_checkpoint:mng', 1, '2022-07-05 18:29:08', '2022-07-05 18:29:08'),
(209, 'delete_route_checkpoint:mng', 'route_checkpoint:mng', 1, '2022-07-05 18:29:08', '2022-07-05 18:29:08'),
(210, 'order_route_checkpoint:mng', 'route_checkpoint:mng', 1, '2022-07-05 18:29:08', '2022-07-05 18:29:08'),
(211, 'patrol_task:mng', 'route:root', 1, '2022-07-05 18:29:08', '2022-07-05 18:29:08'),
(212, 'add_patrol_task:mng', 'patrol_task:mng', 1, '2022-07-05 18:29:08', '2022-07-05 18:29:08'),
(213, 'modify_patrol_task:mng', 'patrol_task:mng', 1, '2022-07-05 18:29:08', '2022-07-05 18:29:08'),
(214, 'delete_patrol_task:mng', 'patrol_task:mng', 1, '2022-07-05 18:29:08', '2022-07-05 18:29:08'),
(215, 'attendance_view_records:mng', 'view_records:root', 1, '2022-07-05 18:29:08', '2022-07-05 18:29:08');

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

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`id`, `name`, `organization_id`, `description`, `creation_time`, `created_at`, `updated_at`) VALUES
(1, 'excelit company route', 1, 'excelit company route', '2022-06-27 18:25:46', '2022-04-25 10:26:54', '2022-06-27 12:25:46'),
(2, 'nahim chowdhury  route', 1, 'excelit company route', '2022-06-27 18:25:58', '2022-05-01 13:59:31', '2022-06-27 12:25:58'),
(3, 'krc routes', 14, 'sdasdlasdfkasf', '2022-06-08 16:55:50', '2022-06-08 10:55:50', '2022-06-08 10:55:50'),
(4, 'nooralam route', 6, 'noor alam route', '2022-07-06 00:06:57', '2022-07-05 18:06:57', '2022-07-05 18:06:57'),
(6, 'noor alam second route', 6, 'noor second route', '2022-07-06 00:07:37', '2022-07-05 18:07:37', '2022-07-05 18:07:37'),
(8, 'noor alam third route', 6, 'noor alam third route', '2022-07-06 00:10:53', '2022-07-05 18:10:53', '2022-07-05 18:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `route_checkpoints`
--

CREATE TABLE `route_checkpoints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `checkpoint_id` bigint(20) UNSIGNED NOT NULL,
  `route_id` bigint(20) UNSIGNED NOT NULL,
  `interval` time NOT NULL DEFAULT '00:00:00',
  `order_num` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `route_checkpoints`
--

INSERT INTO `route_checkpoints` (`id`, `checkpoint_id`, `route_id`, `interval`, `order_num`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '00:00:00', 1, '2022-04-26 14:40:55', '2022-04-26 14:40:55'),
(4, 38, 1, '00:00:00', NULL, '2022-04-26 15:18:51', '2022-04-26 15:18:51'),
(6, 4, 2, '00:00:00', NULL, '2022-05-01 14:00:07', '2022-05-01 14:00:07'),
(7, 10, 2, '00:00:00', NULL, '2022-05-01 14:00:07', '2022-05-01 14:00:07'),
(8, 15, 2, '00:00:00', NULL, '2022-05-01 14:00:07', '2022-05-01 14:00:07'),
(10, 2, 2, '00:00:00', NULL, '2022-06-08 10:56:51', '2022-06-08 10:56:51'),
(11, 38, 2, '00:00:00', NULL, '2022-06-08 10:56:51', '2022-06-08 10:56:51'),
(13, 6, 4, '00:00:00', NULL, '2022-07-05 18:17:30', '2022-07-05 18:17:30');

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
  `type` enum('administrator','patrolmen','super_admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `loginIp` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `loginTime` datetime DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `online` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `organization_id`, `type`, `remember_token`, `created_at`, `updated_at`, `loginIp`, `loginTime`, `mobile`, `online`) VALUES
(1, 'nooralamkhan', 'nooralam@gmail.com', '2022-04-14 05:11:28', '$2y$10$QTtvP6xpoN9FC8Kf378Sg.nyWaIPbgtwwRn8wkKIWCYHds8xyT5Qi', 1, 'super_admin', '7SZHEBesJzetXBvVy99hRoDkFbVn1quYHfc2KsPtl8pN12yuDWjKA6y5gXtz', '2022-04-14 05:11:28', '2022-04-14 05:11:28', NULL, NULL, NULL, 0),
(10, 'Dr. Marcella Mills MD', 'caden16@example.com', '2022-04-23 14:00:42', '$2y$10$4r2KHUUZLU35Z8w.ALsMpe1xP5bqjrygzFC1hsAAsRMSp9TZco3vi', 6, 'administrator', NULL, '2022-04-23 14:00:47', '2022-07-05 17:46:28', NULL, NULL, NULL, 0),
(11, 'Graciela O\'Connell', 'claudie04@example.org', '2022-04-23 14:00:42', '$2y$10$F188.cmXWFrDdlVYiDOlYet.AbDec8qt1136yZPmzdiw69u1AThxC', 5, 'administrator', NULL, '2022-04-23 14:00:47', '2022-04-23 14:00:47', NULL, NULL, NULL, 0),
(12, 'Irving Waelchi', 'meda37@example.com', '2022-04-23 14:00:42', '$2y$10$amFtz8KrDf11pcrBQA6TPeefUFMrHmhD9y34Uokm7t5IowZMm2tyW', 4, 'administrator', NULL, '2022-04-23 14:00:47', '2022-04-23 14:00:47', NULL, NULL, NULL, 0),
(13, 'Mr. Kayley Schuster I', 'marquardt.ellie@example.org', '2022-04-23 14:00:42', '$2y$10$jbbpzm2Hpy2UgBcGr6vAHeL.gbj2pzq4OWK.1XS2LVjByisf.Ffya', 4, 'administrator', NULL, '2022-04-23 14:00:47', '2022-04-23 14:00:47', NULL, NULL, NULL, 0),
(14, 'Benedict Ortiz', 'julia.block@example.org', '2022-04-23 14:00:42', '$2y$10$m1u1MveZLtxE1FdFX9PrEOa8BXQw83bhhOI9qAn.SiMqwen0G3Eyy', 5, 'administrator', NULL, '2022-04-23 14:00:47', '2022-04-23 14:00:47', NULL, NULL, NULL, 0),
(15, 'Leora Bogisich', 'qhaag@example.org', '2022-04-23 14:00:42', '$2y$10$U4OW/C1quNQz.ciBORsSgepXL9ITPTeBKU5ZDzufqJEtdY9K44A0W', 4, 'administrator', NULL, '2022-04-23 14:00:48', '2022-04-23 14:00:48', NULL, NULL, NULL, 0),
(17, 'Tod Medhurst', 'micaela74@example.net', '2022-04-23 14:00:43', '$2y$10$pi9PVJ/2MlCBdnkuLf0gP.OJjdjer3AgNtJC/FWkO6KdRYVrOM4Sa', 7, 'administrator', NULL, '2022-04-23 14:00:48', '2022-04-23 14:00:48', NULL, NULL, NULL, 0),
(18, 'Kendrick Ryan', 'lillian60@example.com', '2022-04-23 14:00:43', '$2y$10$WNDI8L3NiPsW4AR9FDaXB./hqeugc/dmLU.QRJnoF2lFfNS8JBze6', 6, 'administrator', NULL, '2022-04-23 14:00:48', '2022-04-23 14:00:48', NULL, NULL, NULL, 0),
(19, 'Mossie Ferry', 'rusty86@example.org', '2022-04-23 14:00:43', '$2y$10$MO1sdHEV2OedfvmiLQ4ApeQzmffAj8gID8wOXcqpB9rSnH62Hd.vW', 6, 'administrator', NULL, '2022-04-23 14:00:48', '2022-04-23 14:00:48', NULL, NULL, NULL, 0),
(20, 'Karl Skiles', 'treutel.jayda@example.org', '2022-04-23 14:00:43', '$2y$10$cX9qwtU26eQ0aId.6jEE2OSSXeNJIZLFqLJklIwKDhnlGriftx4Ee', 6, 'administrator', NULL, '2022-04-23 14:00:48', '2022-04-23 14:00:48', NULL, NULL, NULL, 0),
(21, 'Maiya Luettgen II', 'schulist.berniece@example.com', '2022-04-23 14:00:43', '$2y$10$WCfYKJ5qwOKRXihp9UW7NeYl48jSQh56GxtUAwK.EObN6Wfz7GjcG', 6, 'administrator', NULL, '2022-04-23 14:00:48', '2022-04-23 14:00:48', NULL, NULL, NULL, 0),
(22, 'Yessenia Nicolas', 'janae01@example.net', '2022-04-23 14:00:43', '$2y$10$qfGQfYOSxakyBVuV0jEE7.PAJHfEP9Ebc.RfeRi2ahrJeMQln4QZW', 6, 'administrator', NULL, '2022-04-23 14:00:48', '2022-04-23 14:00:48', NULL, NULL, NULL, 0),
(23, 'Ms. Rosina Bailey', 'kemmer.dasia@example.net', '2022-04-23 14:00:43', '$2y$10$RFjtt82pAzrx4ejQnbCrz.fQor/jcIuU5oAX3I1neqZXNEpqOvomy', 9, 'administrator', NULL, '2022-04-23 14:00:48', '2022-04-23 14:00:48', NULL, NULL, NULL, 0),
(25, 'Hilario Klocko', 'reanna.hansen@example.com', '2022-04-23 14:09:31', '$2y$10$2JTqD4vTrnGKNYVLayz3t.2vZYiceGrMnFSy945mIdzXUi4lO7PVO', 3, 'administrator', NULL, '2022-04-23 14:09:36', '2022-04-23 14:09:36', NULL, NULL, NULL, 0),
(26, 'Carmel Weimann', 'genesis57@example.net', '2022-04-23 14:09:31', '$2y$10$EMIWDi0oJkBP74ahr9tpNOJRajfzKwQoEuja544QX9YuYTl4rPR1W', 5, 'administrator', NULL, '2022-04-23 14:09:36', '2022-04-23 14:09:36', NULL, NULL, NULL, 0),
(27, 'Tabitha Mohr', 'cameron.blick@example.net', '2022-04-23 14:09:31', '$2y$10$tIYW5f3RUy/9v7Jsqx7hbutUOybZFJGaQoC71hYVD2VmkQqcv/vqq', 4, 'administrator', NULL, '2022-04-23 14:09:36', '2022-04-23 14:09:36', NULL, NULL, NULL, 0),
(28, 'Prof. Alvina Becker', 'ohara.katharina@example.com', '2022-04-23 14:09:31', '$2y$10$iz0PxbsDVFJTOzjERvyGKuiZQEDKixjS2qp6cC6KiTlGkzT/Epy0i', 6, 'administrator', NULL, '2022-04-23 14:09:36', '2022-04-23 14:09:36', NULL, NULL, NULL, 0),
(29, 'Enrique Hintz', 'natalie.hodkiewicz@example.com', '2022-04-23 14:09:31', '$2y$10$6IQcHncEOfm.3vyZInI9N.VvSfGCfUGYumiZ5l26OBZPmkDuy1IU2', 5, 'administrator', NULL, '2022-04-23 14:09:36', '2022-04-23 14:09:36', NULL, NULL, NULL, 0),
(30, 'Morton Marvin PhD', 'dewitt.schinner@example.org', '2022-04-23 14:09:31', '$2y$10$Lz97zlp20Ip4qo.Ky75MSu4ntghBFreVkDOjb7v8veoadeMoK9xpW', 1, 'administrator', NULL, '2022-04-23 14:09:37', '2022-04-23 14:09:37', NULL, NULL, NULL, 0),
(31, 'Israel Cummings', 'edurgan@example.org', '2022-04-23 14:09:31', '$2y$10$P52r1k9Jo.sUT96s.MkJ9etEexSO66j0le6fAM1gjNwb1BJ.D8HPO', 7, 'administrator', NULL, '2022-04-23 14:09:37', '2022-04-23 14:09:37', NULL, NULL, NULL, 0),
(32, 'Mathilde McLaughlin', 'karen97@example.org', '2022-04-23 14:09:31', '$2y$10$7T515OSOXJ/.C/9o45Ow..vpimNrrhKgcxk8PpDedDwscSGV0GAmK', 4, 'administrator', NULL, '2022-04-23 14:09:37', '2022-04-23 14:09:37', NULL, NULL, NULL, 0),
(33, 'Belle Gorczany', 'lebsack.halle@example.org', '2022-04-23 14:09:32', '$2y$10$NBytEYcVD5bXOWtYu7sZF.v/WnBx.Ir5tx9o/xuuqGT2.oNWBMWKC', 4, 'administrator', NULL, '2022-04-23 14:09:37', '2022-04-23 14:09:37', NULL, NULL, NULL, 0),
(34, 'Demario Stracke', 'durward.blick@example.net', '2022-04-23 14:09:32', '$2y$10$HoQspNGrO7PR2t/YncW6me6wovRakE/.Tm/dig.uLmswu1O0B.p6e', 7, 'administrator', NULL, '2022-04-23 14:09:37', '2022-04-23 14:09:37', NULL, NULL, NULL, 0),
(35, 'Dr. Leilani Stroman', 'dashawn.dubuque@example.net', '2022-04-23 14:09:32', '$2y$10$HuK4Yd219QNFGyq3oD/NautpqocUkO34icRqzAS1JDMvvIHq/IOkm', 6, 'administrator', NULL, '2022-04-23 14:09:37', '2022-04-23 14:09:37', NULL, NULL, NULL, 0),
(36, 'Nelle Labadie', 'kennith.roberts@example.com', '2022-04-23 14:09:32', '$2y$10$0ldyyKqjrdvrdlEHr.h2PupZUBeowJU.yykMMfYQ7enFKZOeZVLNS', 4, 'administrator', NULL, '2022-04-23 14:09:37', '2022-04-23 14:09:37', NULL, NULL, NULL, 0),
(37, 'Mrs. Kenyatta O\'Keefe DVM', 'yherman@example.net', '2022-04-23 14:09:32', '$2y$10$9nQHy7ZHzNLxkiafU1VW9e.5ibOQwA3xjc.VeggujWpfkF1ZMLUgq', 1, 'administrator', NULL, '2022-04-23 14:09:37', '2022-04-23 14:09:37', NULL, NULL, NULL, 0),
(38, 'Miss Adeline Marquardt Sr.', 'gwendolyn28@example.org', '2022-04-23 14:09:32', '$2y$10$SDk6nqM1LBz6bbEr8SHEfutABMlsEvAwdeWIV6imPw37uJj14VpXa', 3, 'administrator', NULL, '2022-04-23 14:09:37', '2022-04-23 14:09:37', NULL, NULL, NULL, 0),
(39, 'Franz Lesch', 'kiley53@example.com', '2022-04-23 14:09:32', '$2y$10$8Kpy6yEgGnrQ3JJUVdrPb.2bcdfc8IBzeoE4c3.J7.0iXe3QOfnru', 6, 'administrator', NULL, '2022-04-23 14:09:38', '2022-04-23 14:09:38', NULL, NULL, NULL, 0),
(40, 'Eduardo Morar', 'cking@example.net', '2022-04-23 14:09:32', '$2y$10$o1eP4XBCRBmo.wDqsYVNletKW0VFROaB70CZnFoahVZwzciVbonQy', 6, 'administrator', NULL, '2022-04-23 14:09:38', '2022-04-23 14:09:38', NULL, NULL, NULL, 0),
(41, 'Brennan Feest', 'jaquelin04@example.net', '2022-04-23 14:09:32', '$2y$10$FbPSHZRr7P.hACL.nGmGLuRq89EuEkCL9b0j9Pr9fWV86tg.nBZx.', 1, 'administrator', NULL, '2022-04-23 14:09:38', '2022-04-23 14:09:38', NULL, NULL, NULL, 0),
(42, 'Laurie Cronin', 'gturcotte@example.net', '2022-04-23 14:09:33', '$2y$10$k0HLM1BxcbAzXoXM0HkxxuXTDvxBK35DmPv0L3WkxtHfQRTz2Ik2G', 1, 'administrator', NULL, '2022-04-23 14:09:38', '2022-04-23 14:09:38', NULL, NULL, NULL, 0),
(43, 'Chyna Ullrich DDS', 'ajakubowski@example.net', '2022-04-23 14:09:33', '$2y$10$R97nw0T5hJFrvYiIFtoKce7RRWUZdhYZw8XDR8Q.nBfGNwPuYYdQW', 3, 'administrator', NULL, '2022-04-23 14:09:38', '2022-04-23 14:09:38', NULL, NULL, NULL, 0),
(44, 'Leanna Bruen', 'ibarrows@example.org', '2022-04-23 14:09:33', '$2y$10$HaH6yVH8t0OMkK/bwpWzPe5iT8JZ8NSLe3qm5aeRvUcTKPCXKVVpS', 6, 'administrator', NULL, '2022-04-23 14:09:38', '2022-04-23 14:09:38', NULL, NULL, NULL, 0),
(45, 'Nikki Kertzmann', 'efren28@example.com', '2022-04-23 14:09:33', '$2y$10$9ctwa/GSo22PRv1vCkfEEuH9LwGi7CnTB005wDlkA5Q//Ze.mNaZa', 7, 'administrator', NULL, '2022-04-23 14:09:38', '2022-04-23 14:09:38', NULL, NULL, NULL, 0),
(46, 'Mr. Tyler Johnston', 'sabrina02@example.org', '2022-04-23 14:09:33', '$2y$10$uNTixwWMwlBHSK0oRPCu3eS5/RtU7rwFzIq4n0O6czoPrmcdPKowu', 7, 'administrator', NULL, '2022-04-23 14:09:38', '2022-04-23 14:09:38', NULL, NULL, NULL, 0),
(47, 'Prof. Elyse Wiza Sr.', 'igrady@example.com', '2022-04-23 14:09:33', '$2y$10$MVLSXNM7HLiQJx4q5ppgee6Hlu3Ky/2zRIZSkIU9wCe3GmPDWB2xK', 1, 'administrator', NULL, '2022-04-23 14:09:38', '2022-04-23 14:09:38', NULL, NULL, NULL, 0),
(48, 'Prof. Jeanie Blick DDS', 'jace.wintheiser@example.com', '2022-04-23 14:09:33', '$2y$10$vM2z5ndLlq6CnmCIRmjJ.elB475qIUGMwOoz.R1wj5OVfXhXHLWdm', 6, 'administrator', NULL, '2022-04-23 14:09:38', '2022-04-23 14:09:38', NULL, NULL, NULL, 0),
(49, 'Dr. Norma Grimes', 'tristian54@example.net', '2022-04-23 14:09:33', '$2y$10$adGvCqKpdrgQLOK4tl1g7.CIoRBPBu7ueSMXBZpbVhIzRIPu3Pbsi', 3, 'administrator', NULL, '2022-04-23 14:09:38', '2022-04-23 14:09:38', NULL, NULL, NULL, 0),
(50, 'Zoila Kertzmann III', 'dolly.nicolas@example.net', '2022-04-23 14:09:33', '$2y$10$AtUDyS4a6HttuuWQK1ZhwOGad8nbF1JfFjy.Xt5AfXvtpjPuXrdOW', 5, 'administrator', NULL, '2022-04-23 14:09:38', '2022-04-23 14:09:38', NULL, NULL, NULL, 0),
(51, 'Norberto Jakubowski', 'maximo38@example.net', '2022-04-23 14:09:33', '$2y$10$mn.llH4Y8KrZxebEFCYyUumkA3.j84m7vJ.oI/nthkDVsFobgTqQO', 3, 'administrator', NULL, '2022-04-23 14:09:38', '2022-04-23 14:09:38', NULL, NULL, NULL, 0),
(52, 'Mariane Abshire III', 'hansen.yessenia@example.net', '2022-04-23 14:09:34', '$2y$10$p0rC7ZpQ7rFfEYZ0i3RoAOqwu4Req30UsUIg932CbF.UShVUDL2tG', 6, 'administrator', NULL, '2022-04-23 14:09:38', '2022-04-23 14:09:38', NULL, NULL, NULL, 0),
(53, 'Javonte Beatty', 'jaiden99@example.com', '2022-04-23 14:09:34', '$2y$10$RL3mRe6JJFyPxv5zUMmjxeDaqkbOEONUtQ6bXS17Bt7RXkBv.RHz2', 6, 'administrator', NULL, '2022-04-23 14:09:38', '2022-04-23 14:09:38', NULL, NULL, NULL, 0),
(54, 'Vita Von', 'estell06@example.com', '2022-04-23 14:09:34', '$2y$10$IuGBs1kbWwLYQYDGbJcJPuKpIqdTaZr4UYolORSoEl06OVFMeCDFG', 1, 'administrator', NULL, '2022-04-23 14:09:39', '2022-04-23 14:09:39', NULL, NULL, NULL, 0),
(55, 'Prof. Fay O\'Kon', 'yharris@example.net', '2022-04-23 14:09:34', '$2y$10$SIgQx4vnCY8UldtX7x.3mOwkSlZMtrN45y3lMJQo69JvbBvbmY30u', 1, 'administrator', NULL, '2022-04-23 14:09:39', '2022-04-23 14:09:39', NULL, NULL, NULL, 0),
(56, 'Josiah O\'Connell', 'jenkins.madelyn@example.com', '2022-04-23 14:09:34', '$2y$10$X4qr8GsQ5dCFf8mTuInGVeprWDWU3tIkyXtCwyn6FZshQrerc8nMe', 5, 'administrator', NULL, '2022-04-23 14:09:39', '2022-04-23 14:09:39', NULL, NULL, NULL, 0),
(57, 'Dr. Jeffry Brown', 'jany.sauer@example.com', '2022-04-23 14:09:34', '$2y$10$AIJwCn8C5HvCOtqjOEeEDORaxR4I5skQPelKMIrUsHqJ6z8J4hhfy', 6, 'administrator', NULL, '2022-04-23 14:09:39', '2022-04-23 14:09:39', NULL, NULL, NULL, 0),
(58, 'Dr. Eleanore Bernier', 'jeromy80@example.com', '2022-04-23 14:09:34', '$2y$10$h3t5B1kDz8xeen0lf3R42uVmUJd/mXxX.ZV/GuEssEm/LPbJNHp.K', 4, 'administrator', NULL, '2022-04-23 14:09:39', '2022-04-23 14:09:39', NULL, NULL, NULL, 0),
(59, 'Prof. Evalyn Collins III', 'hcormier@example.net', '2022-04-23 14:09:34', '$2y$10$3WRs8p/plRGXFa97nsW3m.M9T5weuURbwJ9HTIfGZE8E3soHMo782', 4, 'administrator', NULL, '2022-04-23 14:09:39', '2022-04-23 14:09:39', NULL, NULL, NULL, 0),
(60, 'Prof. Sheridan Wisozk I', 'kreiger.trace@example.org', '2022-04-23 14:09:34', '$2y$10$5tsRYkqmMvIGLtm6ipm3tOMvWy98F1eUJRSWuQyZdS1J7dTb5c7Iu', 3, 'administrator', NULL, '2022-04-23 14:09:39', '2022-04-23 14:09:39', NULL, NULL, NULL, 0),
(61, 'Nickolas Morar PhD', 'nbeahan@example.com', '2022-04-23 14:09:35', '$2y$10$qYY71X4p7futTs6chz95fOw2iD.KmrlsGhdvwdac.4AsKMyS2MY2S', 5, 'administrator', NULL, '2022-04-23 14:09:39', '2022-04-23 14:09:39', NULL, NULL, NULL, 0),
(62, 'Prof. Keon DuBuque III', 'hudson.estevan@example.com', '2022-04-23 14:09:35', '$2y$10$lkM0pEkogJ8rTkzWueo72ul.pyGTlhcn13Ve4jE17s6QjBxve6C52', 5, 'administrator', NULL, '2022-04-23 14:09:39', '2022-04-23 14:09:39', NULL, NULL, NULL, 0),
(63, 'Tracy Conroy', 'ellis.barrows@example.net', '2022-04-23 14:09:35', '$2y$10$CkMyh5rEfzGCoIGLyBLp6OHphaU8TxZVbZWsMyHZdev.bbFtCGJBi', 3, 'administrator', NULL, '2022-04-23 14:09:39', '2022-04-23 14:09:39', NULL, NULL, NULL, 0),
(64, 'Josefa Purdy', 'runolfsson.anahi@example.net', '2022-04-23 14:09:35', '$2y$10$U7ZuCydd04oIDoq8qZ/urugYL7sPlJTNYTHCjKweBXCo79nWclk62', 5, 'administrator', NULL, '2022-04-23 14:09:39', '2022-04-23 14:09:39', NULL, NULL, NULL, 0),
(65, 'Sadye Vandervort', 'romaguera.regan@example.com', '2022-04-23 14:09:35', '$2y$10$yTG9GpdKsQTbsQDmL1nPj.BV.iWpbKCmmC/vLjRjtUvwIrph6/N82', 7, 'administrator', NULL, '2022-04-23 14:09:39', '2022-04-23 14:09:39', NULL, NULL, NULL, 0),
(66, 'Dr. Omari Hill V', 'ucarroll@example.org', '2022-04-23 14:09:35', '$2y$10$bY/eSTQfVPSE5fYOPV1zRu/JhZWKsSYu7dpKTCfsQxRhYIAf/6C7K', 6, 'administrator', NULL, '2022-04-23 14:09:39', '2022-04-23 14:09:39', NULL, NULL, NULL, 0),
(67, 'Glenna VonRueden', 'elaina.keeling@example.com', '2022-04-23 14:09:35', '$2y$10$3dQUqAbUX6NNwZvSwb7n2.xZkSH.Ibaq83soNWoSu/d4S1RZQsjoS', 3, 'administrator', NULL, '2022-04-23 14:09:39', '2022-04-23 14:09:39', NULL, NULL, NULL, 0),
(68, 'Dr. Ruthie Roob', 'tom.schmeler@example.org', '2022-04-23 14:09:35', '$2y$10$w9ZCWJ/vup1mARcOPPPqWuvL2mBp7uHnJiioqJldBFBDPDSQzzpLu', 4, 'administrator', NULL, '2022-04-23 14:09:39', '2022-04-23 14:09:39', NULL, NULL, NULL, 0),
(69, 'Layla Parisian', 'nader.jalon@example.org', '2022-04-23 14:09:35', '$2y$10$q8C0otgV64r0.yZi93wXGeqxkmZuf3WrpA9brPJwGkYD1yToRgOpC', 7, 'administrator', NULL, '2022-04-23 14:09:39', '2022-04-23 14:09:39', NULL, NULL, NULL, 0),
(70, 'Michelle Toy', 'etremblay@example.org', '2022-04-23 14:09:36', '$2y$10$uEkk6xzArJDH.Av2CIRlB.3cQUiJw/fOvak/zdli6pasqnr5/CGB.', 5, 'administrator', NULL, '2022-04-23 14:09:39', '2022-04-23 14:09:39', NULL, NULL, NULL, 0),
(71, 'Efrain Hyatt', 'tcorwin@example.org', '2022-04-23 14:09:36', '$2y$10$1rkgqBj5y4ryqv.f.ZnQfuv4Arbv7oo7ocIywz/JZgqL6qqLD6RfK', 1, 'administrator', NULL, '2022-04-23 14:09:39', '2022-04-23 14:09:39', NULL, NULL, NULL, 0),
(72, 'Aurore West', 'connelly.morgan@example.org', '2022-04-23 14:09:36', '$2y$10$sukwohkYzAzeg2TWxjhwgOfOizhn9tYbBrstKShZs/tGxW7h0eStS', 6, 'administrator', NULL, '2022-04-23 14:09:39', '2022-04-23 14:09:39', NULL, NULL, NULL, 0),
(73, 'Claudie Bradtke', 'jwalker@example.org', '2022-04-23 14:09:36', '$2y$10$0T4apK50218IrW/9b9T/8Oa1VI20vT6yPekDPwGgzyHdvK2Nd5fPe', 6, 'administrator', NULL, '2022-04-23 14:09:39', '2022-04-23 14:09:39', NULL, NULL, NULL, 0),
(74, 'Ignatius Trantow', 'mschmeler@example.net', '2022-04-23 14:09:36', '$2y$10$PuHhLhegPVaq9/WohywWrOhl46RzKypbL.VCOUFGCVdXWajWqPZhm', 5, 'administrator', NULL, '2022-04-23 14:09:39', '2022-04-23 14:09:39', NULL, NULL, NULL, 0),
(75, 'nahim chowdhury', 'nahimchowdhury@gmail.com', NULL, '$2y$10$Xk7PiMhYJqbXCaVPwnxuXeMp7KRYNS5HC99ovzhLQUB2vc1rKQKHC', 11, 'administrator', NULL, '2022-04-23 15:26:05', '2022-04-23 15:26:05', NULL, NULL, NULL, 0),
(76, 'champuk hassan', 'champuk@gmail.com', NULL, '$2y$10$94vc/xeaQ9w/n2SlbEnxnuzBS13mWCeUeWIOumuNDOfvfA/S2bTVy', 17, 'administrator', NULL, '2022-04-24 05:07:33', '2022-04-24 05:07:33', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 75, 1, NULL, NULL),
(8, 76, 4, NULL, NULL),
(9, 10, 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkpoint_logs`
--
ALTER TABLE `checkpoint_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkpoint_logs_checkpoint_id_foreign` (`checkpoint_id`),
  ADD KEY `checkpoint_logs_device_id_foreign` (`device_id`),
  ADD KEY `checkpoint_logs_patrolman_id_foreign` (`patrolman_id`);

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
-- Indexes for table `plan_times`
--
ALTER TABLE `plan_times`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_times_task_id_foreign` (`task_id`);

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
-- Indexes for table `route_checkpoints`
--
ALTER TABLE `route_checkpoints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `route_checkpoints_checkpoint_id_foreign` (`checkpoint_id`),
  ADD KEY `route_checkpoints_route_id_foreign` (`route_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_organization_id_foreign` (`organization_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_role_user_id_foreign` (`user_id`),
  ADD KEY `user_role_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkpoint_logs`
--
ALTER TABLE `checkpoint_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `check_points`
--
ALTER TABLE `check_points`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `organizations`
--
ALTER TABLE `organizations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `patrol_mens`
--
ALTER TABLE `patrol_mens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `patrol_tasks`
--
ALTER TABLE `patrol_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
-- AUTO_INCREMENT for table `plan_times`
--
ALTER TABLE `plan_times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=216;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `route_checkpoints`
--
ALTER TABLE `route_checkpoints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkpoint_logs`
--
ALTER TABLE `checkpoint_logs`
  ADD CONSTRAINT `checkpoint_logs_checkpoint_id_foreign` FOREIGN KEY (`checkpoint_id`) REFERENCES `check_points` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checkpoint_logs_device_id_foreign` FOREIGN KEY (`device_id`) REFERENCES `devices` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `checkpoint_logs_patrolman_id_foreign` FOREIGN KEY (`patrolman_id`) REFERENCES `patrol_mens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `plan_times`
--
ALTER TABLE `plan_times`
  ADD CONSTRAINT `plan_times_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `patrol_tasks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `route_checkpoints`
--
ALTER TABLE `route_checkpoints`
  ADD CONSTRAINT `route_checkpoints_checkpoint_id_foreign` FOREIGN KEY (`checkpoint_id`) REFERENCES `check_points` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `route_checkpoints_route_id_foreign` FOREIGN KEY (`route_id`) REFERENCES `routes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_organization_id_foreign` FOREIGN KEY (`organization_id`) REFERENCES `organizations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_role_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
