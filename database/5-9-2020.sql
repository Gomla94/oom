-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2020 at 11:11 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `efham_sa7`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$PYaNCvc6.fd0eyNfy0btDuyD27YksveeoC.PTS8IKKOHiDAjWcAOu', 'lYx9FPgBptSarcQGNns6tXhY4YW2B8MU7BpQfcXEaxjacAVUAAoBwGlm6hMS', '2020-08-22 09:42:25', '2020-08-22 09:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alerts`
--

INSERT INTO `alerts` (`id`, `title`, `details`, `created_at`, `updated_at`) VALUES
(3, 'نص تجريبي', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات', '2020-09-02 07:25:11', '2020-09-02 07:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `right_answer` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `title`, `question_id`, `right_answer`, `created_at`, `updated_at`) VALUES
(27, 'asd', 10, 0, '2020-08-25 09:21:17', '2020-08-25 09:21:17'),
(28, 'das', 10, 1, '2020-08-25 09:21:17', '2020-08-25 09:21:17'),
(29, 'asdasdasdasd', 12, 0, '2020-08-25 09:38:16', '2020-08-25 09:38:16'),
(30, 'right', 12, 1, '2020-08-25 09:38:16', '2020-08-25 09:38:16'),
(31, 'wewewew', 12, 0, '2020-08-25 09:38:16', '2020-08-25 09:38:16'),
(32, 'sasdasdasdasd', 35, 0, '2020-08-26 08:39:25', '2020-08-26 08:39:25'),
(33, 'momo', 35, 1, '2020-08-26 08:39:25', '2020-08-26 08:39:25'),
(34, 'false', 35, 0, '2020-08-26 08:39:26', '2020-08-26 08:39:26'),
(35, 'adsads', 36, 0, '2020-08-26 09:00:35', '2020-08-26 09:00:35'),
(36, 'dsadas', 36, 1, '2020-08-26 09:00:35', '2020-08-26 09:00:35'),
(37, 'dasdasdas', 36, 0, '2020-08-26 09:00:35', '2020-08-26 09:00:35'),
(38, 'wdssdsdsd', 38, 0, '2020-08-26 10:57:56', '2020-08-26 10:57:56'),
(39, 'wow', 38, 1, '2020-08-26 10:57:56', '2020-08-26 10:57:56'),
(40, 'dasaasdasd', 38, 0, '2020-08-26 10:57:56', '2020-08-26 10:57:56'),
(41, 'false', 41, 0, '2020-08-26 11:00:41', '2020-08-26 11:00:41'),
(42, 'rigjht', 41, 1, '2020-08-26 11:00:41', '2020-08-26 11:00:41'),
(43, 'false', 41, 0, '2020-08-26 11:00:41', '2020-08-26 11:00:41'),
(44, 'qqqqqqq', 43, 0, '2020-08-26 11:42:39', '2020-08-26 11:42:39'),
(45, 'dassdaqqqqqqqqqqqq', 43, 1, '2020-08-26 11:42:39', '2020-08-26 11:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'AppModelsStudent',
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `devices`
--

CREATE TABLE `devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `model` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `mac_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `devices`
--

INSERT INTO `devices` (`id`, `student_id`, `model`, `mac_address`, `status`, `created_at`, `updated_at`) VALUES
(1, 12, 'xaomi', '6c:00:6b:a7:56:d9', 0, '2020-09-03 13:30:00', '2020-09-03 13:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fcm_tokens`
--

CREATE TABLE `fcm_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `token` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fcm_tokens`
--

INSERT INTO `fcm_tokens` (`id`, `student_id`, `token`, `created_at`, `updated_at`) VALUES
(1, 12, 'd4s456das45asd456456', '2020-09-03 13:30:00', '2020-09-03 13:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'الصف الأول الثانوي', '2020-08-22 11:03:10', '2020-08-22 11:03:10'),
(2, 'الصف الثاني الثانوي', '2020-08-22 11:03:43', '2020-08-22 11:03:43'),
(3, 'الصف الثالث الثانوي', '2020-08-22 11:03:53', '2020-08-22 11:03:53');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `title`, `grade_id`, `created_at`, `updated_at`) VALUES
(3, 'مجموعة الساعة 11', 3, '2020-08-23 07:00:05', '2020-09-03 08:57:53'),
(4, 'محموعة الساعة 12 صباحا', 3, '2020-09-03 08:58:19', '2020-09-03 08:58:19'),
(5, 'مجموعة الساعة 11', 1, '2020-09-03 08:59:19', '2020-09-03 08:59:19'),
(6, 'محموعة الساعة 12 صباحا', 1, '2020-09-03 09:03:26', '2020-09-03 09:03:26');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `month_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `month_id`, `group_id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(3, 5, 3, 'how to', 'lessons_covers/qTCdiBcXWSCvqUHH6CJ8qDpVwLUaheEcHW3CIG9U.png', '2020-08-26 11:40:33', '2020-09-03 09:31:45'),
(4, 5, 3, 'products', 'lessons_covers/iX0uWN6ndCcGSn3BxBC1tZUGDsthien9qhP0M1Lx.jpeg', '2020-08-26 11:50:04', '2020-09-03 09:32:30'),
(5, 5, 3, 'test lesson', 'lessons_covers/pTsjFfdbo40czPeWw3i2lwgRJIybN1FnCvVwWSeM.jpeg', '2020-08-29 10:53:06', '2020-09-03 09:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `lessons_questions`
--

CREATE TABLE `lessons_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons_questions`
--

INSERT INTO `lessons_questions` (`id`, `lesson_id`, `question_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 3, 12, 2, NULL, NULL),
(5, 4, 6, 1, NULL, NULL),
(9, 4, 43, 3, NULL, NULL),
(10, 5, 6, 1, NULL, NULL),
(11, 5, 12, 2, NULL, NULL),
(12, 5, 38, 3, NULL, NULL),
(13, 5, 45, 3, NULL, NULL),
(14, 6, 10, 3, NULL, NULL),
(15, 6, 35, 2, NULL, NULL),
(16, 6, 36, 2, NULL, NULL),
(17, 6, 11, 3, NULL, NULL),
(18, 7, 10, 3, NULL, NULL),
(19, 7, 35, 2, NULL, NULL),
(20, 7, 36, 2, NULL, NULL),
(21, 7, 11, 3, NULL, NULL),
(22, 8, 10, 3, NULL, NULL),
(23, 8, 35, 2, NULL, NULL),
(24, 8, 36, 2, NULL, NULL),
(25, 8, 11, 3, NULL, NULL),
(26, 8, 47, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `chat_id` bigint(20) UNSIGNED NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `admin_view` tinyint(1) NOT NULL DEFAULT 0,
  `student_view` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `chat_id`, `details`, `model`, `sender_id`, `admin_view`, `student_view`, `created_at`, `updated_at`) VALUES
(1, 1, 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات', 'App\\Models\\Student', 1, 1, 0, '2020-09-02 10:10:20', '2020-09-02 13:09:12'),
(2, 1, 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات', 'App\\Models\\Student', 1, 1, 0, '2020-09-02 10:48:01', '2020-09-02 13:09:12'),
(3, 2, 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات', 'App\\Models\\Student', 3, 1, 0, '2020-09-02 11:05:11', '2020-09-03 08:49:31'),
(4, 2, 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات', 'App\\Models\\Student', 3, 1, 0, '2020-09-02 11:06:51', '2020-09-03 08:49:31'),
(5, 1, 'test messages', 'App\\Models\\Admin', 1, 1, 0, '2020-09-02 13:03:16', '2020-09-02 13:09:12'),
(6, 1, 'lorem ipsum', 'App\\Models\\Admin', 1, 1, 0, '2020-09-02 13:09:12', '2020-09-02 13:09:12'),
(7, 2, 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات', 'App\\Models\\Student', 3, 1, 0, '2020-09-03 06:37:01', '2020-09-03 08:49:31'),
(8, 2, 'بيسيبسيبسسيبيبسيب', 'App\\Models\\Admin', 1, 1, 0, '2020-09-03 08:25:38', '2020-09-03 08:49:31'),
(9, 2, 'يسيشسسيشسيشسييشس', 'App\\Models\\Admin', 1, 1, 0, '2020-09-03 08:49:31', '2020-09-03 08:49:31');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_08_16_102315_create_admins_table', 1),
(5, '2020_08_17_095813_create_permission_tables', 1),
(10, '2020_08_22_124701_create_groups_table', 2),
(11, '2020_08_22_124714_create_grades_table', 2),
(12, '2020_08_22_124644_create_students_table', 3),
(13, '2020_08_22_150430_create_months_table', 4),
(14, '2020_08_23_082425_create_months_students', 5),
(15, '2020_08_23_091230_create_subscription_requests_table', 6),
(16, '2020_08_23_143937_create_questions_table', 7),
(17, '2020_08_23_144221_create_answers_table', 7),
(22, '2020_08_25_112617_create_lessons_table', 8),
(23, '2020_08_25_114947_create_pdf_files_table', 8),
(24, '2020_08_25_115004_create_videos_table', 8),
(25, '2020_08_25_115109_create_lessons_questions_table', 8),
(26, '2016_06_01_000001_create_oauth_auth_codes_table', 9),
(27, '2016_06_01_000002_create_oauth_access_tokens_table', 9),
(28, '2016_06_01_000003_create_oauth_refresh_tokens_table', 9),
(29, '2016_06_01_000004_create_oauth_clients_table', 9),
(30, '2016_06_01_000005_create_oauth_personal_access_clients_table', 9),
(31, '2020_09_02_090458_create_alerts_table', 10),
(33, '2020_09_02_090644_create_students_alerts', 11),
(38, '2020_09_02_103719_create_messages_table', 12),
(39, '2020_09_02_103944_create_chats_table', 12),
(40, '2020_09_03_102404_create_comments_table', 13),
(41, '2020_09_03_143701_create_devices_table', 14),
(42, '2020_09_03_150315_create_fcm_tokens_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `months`
--

CREATE TABLE `months` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `months`
--

INSERT INTO `months` (`id`, `title`, `price`, `grade_id`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(5, 'شهر سبتمبر', 20, 1, '2020-09-01', '2020-09-30', '2020-08-26 10:37:40', '2020-08-26 10:37:40');

-- --------------------------------------------------------

--
-- Table structure for table `months_students`
--

CREATE TABLE `months_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `month_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `months_students`
--

INSERT INTO `months_students` (`id`, `student_id`, `month_id`, `created_at`, `updated_at`) VALUES
(27, 2, 5, NULL, NULL),
(29, 10, 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('046ec4730f71d2234b5307702c68edd3a2fa7cb9d4f35c54f494bd13ae4c493de7c933aed9b4321f', 1, 1, 'api_token', '[]', 0, '2020-08-29 08:29:24', '2020-08-29 08:29:24', '2021-08-29 10:29:24'),
('107805564c8c9f4fc4e462fb443326dfd374ecef6e89288aa91ffaf7f34d6612a804ae2e18745431', 6, 1, 'api_token', '[]', 0, '2020-08-27 06:47:20', '2020-08-27 06:47:20', '2021-08-27 08:47:20'),
('1ce567503d4f82940bb8a557d007a36c8fec50b30083c9b26882df25bc3b8a4565b6f0ba01952954', 1, 1, 'api_token', '[]', 0, '2020-08-29 08:44:01', '2020-08-29 08:44:01', '2021-08-29 10:44:01'),
('1d717162992b009fff27c69b5223ee466549466793a128298872f3a03231a74e77ed658abd1f243c', 1, 1, 'api_token', '[]', 0, '2020-08-29 08:27:05', '2020-08-29 08:27:05', '2021-08-29 10:27:05'),
('23850af77e14a29ed73bffd670044453309feb97e56d853b99d882084913bf9f3ffdfa9fe5b07a02', 1, 1, 'api_token', '[]', 0, '2020-08-29 08:27:55', '2020-08-29 08:27:55', '2021-08-29 10:27:55'),
('2a8140463be124fae5b4b21084d6cb4d987da6d51c3dbcf995184ba0c5aa301ca8ace858c9a42adb', 3, 1, 'api_token', '[]', 0, '2020-08-26 13:20:47', '2020-08-26 13:20:47', '2021-08-26 15:20:47'),
('3d40b0191814d7f82847db73352ab119909b64d2c1149f297812668d60896b5448793fb8ce042a1c', 8, 1, 'api_token', '[]', 0, '2020-08-27 11:17:59', '2020-08-27 11:17:59', '2021-08-27 13:17:59'),
('3e7cbc2494b7ccce9641f6b6acd5b54f21b618fcbfd5188ae7ac1649eb3a19027c963beb5d2cc4fb', 3, 1, 'api_token', '[]', 0, '2020-08-26 13:21:55', '2020-08-26 13:21:55', '2021-08-26 15:21:55'),
('4312e3a2b610c23054450f417b90c72f64403da90a3eeb5b57c7552e53a96f3e380937352cad20bf', 10, 1, 'api_token', '[]', 0, '2020-09-03 11:55:27', '2020-09-03 11:55:27', '2021-09-03 13:55:27'),
('4a101f97d4f1b606a775dbfa4396fb82046cfde5a6dba1c9003b26e9774fb772ee53fad114eedad3', 1, 1, 'api_token', '[]', 0, '2020-08-29 08:33:00', '2020-08-29 08:33:00', '2021-08-29 10:33:00'),
('505ad934c9cc2c0961f7f6f32313b814e6034108481bdfc4e732841b53cc8cc21b82c7674c074abd', 3, 1, 'api_token', '[]', 0, '2020-08-27 06:47:40', '2020-08-27 06:47:40', '2021-08-27 08:47:40'),
('61034c6f3d36816ddbe7fc7c3434f6a4ed03dbe7b93faeaf0e694f73e9ce75f8eec29d7907669ff2', 1, 1, 'api_token', '[]', 0, '2020-08-29 08:30:29', '2020-08-29 08:30:29', '2021-08-29 10:30:29'),
('750bbbb09989cdffbbedf7c525d2dd03bff3947293e2b0f510d547ea12d7c43c6a98e7c1bc248603', 8, 1, 'api_token', '[]', 0, '2020-08-27 11:17:32', '2020-08-27 11:17:32', '2021-08-27 13:17:32'),
('76f0c300fb0893ab2e433e5ab511bf53d91e1057d21800bcb3ef2e1f3903ce90e8b7ebba6096748d', 3, 1, 'api_token', '[]', 0, '2020-08-26 13:23:30', '2020-08-26 13:23:30', '2021-08-26 15:23:30'),
('7934c7b711a484d37f1ac741308c66ef876f76372db74713e77fadf1623c2a680afda1be9912f005', 3, 1, 'api_token', '[]', 0, '2020-08-27 05:59:30', '2020-08-27 05:59:30', '2021-08-27 07:59:30'),
('8fea1b5abc55fedd3f2b916d6ff2b069aad8ae9de7852255908c1e87ead9e0886c32ff5f981cbfc6', 1, 1, 'api_token', '[]', 0, '2020-08-27 11:29:18', '2020-08-27 11:29:18', '2021-08-27 13:29:18'),
('9c8e4eb715d9604d05b44aafdb7ce56171d1b12d4973b57cd9300e5b8b12055fb7ebc7c7243cafb0', 1, 1, 'api_token', '[]', 0, '2020-09-02 07:29:31', '2020-09-02 07:29:31', '2021-09-02 09:29:31'),
('a805994c16f0afeb08dcd148570acd462a226abe0cfe156d196bd918d849d0d81a3b64c334db97ad', 1, 1, 'api_token', '[]', 0, '2020-08-29 08:33:52', '2020-08-29 08:33:52', '2021-08-29 10:33:52'),
('a922ed7332c169fb9d63e4fb7f4f854524a4e6f0f8de5c1e6df957f112cf843cafaa7394a08205ba', 2, 1, 'api_token', '[]', 0, '2020-08-30 11:42:13', '2020-08-30 11:42:13', '2021-08-30 13:42:13'),
('aca528813831e43d1c2f14bccc4ad48045a0e9a3e96165adccdf2969dad1ddc02ed04c41c2dbacaa', 3, 1, 'api_token', '[]', 0, '2020-09-03 12:15:11', '2020-09-03 12:15:11', '2021-09-03 14:15:11'),
('aeccb9eb081522809d33b5dade27c20992d70c1ab7a9e3782808e1086cd0ce3ed34b5b38b887758a', 10, 1, 'api_token', '[]', 0, '2020-09-03 12:12:15', '2020-09-03 12:12:15', '2021-09-03 14:12:15'),
('bedd930fd80c0529edb6f0082fe74f6bacce4f167dd72b38e78330d09616ace141b959ea681a27f7', 3, 1, 'api_token', '[]', 0, '2020-09-02 11:04:42', '2020-09-02 11:04:42', '2021-09-02 13:04:42'),
('cf616b68193cf8878deec0a12575b99afe20b27664a3f67043a08f42197aa5fa6bed75dc75a1bc4f', 2, 1, 'api_token', '[]', 0, '2020-08-30 10:46:15', '2020-08-30 10:46:15', '2021-08-30 12:46:15'),
('d22080cd2f2df4aa1f789ceed7716cb7a99292a9cdcb48f33d47e850ac1acf04b6d339b10a8a76eb', 1, 1, 'api_token', '[]', 0, '2020-08-29 08:27:17', '2020-08-29 08:27:17', '2021-08-29 10:27:17'),
('d5837508a45774a7225ff890c83488d4225070a6eaccdebd39ee27d32cf84daf11fcf91a99060aeb', 3, 1, 'api_token', '[]', 0, '2020-08-26 13:20:34', '2020-08-26 13:20:34', '2021-08-26 15:20:34'),
('ddcd5e1e2d39a07e170ad60948fff4461d22fbe028db227230d53b9bdb69e01c997d702e24f437f3', 3, 1, 'api_token', '[]', 0, '2020-08-26 13:20:18', '2020-08-26 13:20:18', '2021-08-26 15:20:18'),
('e35fa5943c1fef9c868b5f4cc963035135977f85844f184b86f46e83c4953a00493057a33071f041', 1, 1, 'api_token', '[]', 0, '2020-08-29 08:30:40', '2020-08-29 08:30:40', '2021-08-29 10:30:40'),
('e46a43e92d311c8f90436f63a3b546b24374b11b2bbea73faa8d1859dbf64882268b791611c754b9', 1, 1, 'api_token', '[]', 0, '2020-08-29 08:44:40', '2020-08-29 08:44:40', '2021-08-29 10:44:40'),
('ecd5f28ebc68f8a85d7bf5ebe917936e5caa0960bd79df856cb53e7ecde888b3d7d1ee7e0e469e8c', 1, 1, 'api_token', '[]', 0, '2020-08-30 10:31:59', '2020-08-30 10:31:59', '2021-08-30 12:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, '{\"en\" : \"promoclicks\", \"ar\" : \"بروموكليكس\"} Personal Access Client', 'fWeu0PgRaYMDDoaQtMZVrha34eeFn7VXGYGAarkF', NULL, 'http://localhost', 1, 0, 0, '2020-08-26 12:40:31', '2020-08-26 12:40:31'),
(2, NULL, '{\"en\" : \"promoclicks\", \"ar\" : \"بروموكليكس\"} Password Grant Client', 'dbhs2iXXvO9DxthC7An1qKm5FjHHqGvc13ZxCtQa', 'users', 'http://localhost', 0, 1, 0, '2020-08-26 12:40:31', '2020-08-26 12:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-08-26 12:40:31', '2020-08-26 12:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `pdf_files`
--

CREATE TABLE `pdf_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `file_src` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pdf_files`
--

INSERT INTO `pdf_files` (`id`, `lesson_id`, `file_src`, `created_at`, `updated_at`) VALUES
(1, 5, 'lessons_files/MtbzOwr3d5oYkHtpBymuyLFZD2DiTZYHZDj3P6Sv.pdf', '2020-08-29 10:53:08', '2020-08-29 10:53:08'),
(2, 5, 'lessons_files/6T5mX5z6Oi1jjq2xeE8a9tY0oADwl6Z7mcknPSud.pdf', '2020-08-29 10:53:08', '2020-08-29 10:53:08'),
(3, 5, 'lessons_files/wql3P15uP2gXcT3R0wcaXWlxgzeUtl4fjjwH8lkm.pdf', '2020-08-29 10:53:08', '2020-08-29 10:53:08'),
(4, 6, 'lessons_files/icT6B6ZgKyh9budTOoZAEUvCOOHprY3nDkrfrdDB.pdf', '2020-08-30 08:09:46', '2020-08-30 08:09:46'),
(5, 6, 'lessons_files/DXRSMlBi0JYNRGyWQYKifHOHhGDFolsd4TXeYeEj.pdf', '2020-08-30 08:09:46', '2020-08-30 08:09:46'),
(6, 7, 'lessons_files/bieq4i6WAcvXVReck2o8dSYWWFSZxp8JpIqEuyVx.pdf', '2020-08-30 08:11:11', '2020-08-30 08:11:11'),
(7, 7, 'lessons_files/W9V21oQUZWVhz2XeWzWaA7dtWhAQHe3gcKwJ8qgD.pdf', '2020-08-30 08:11:11', '2020-08-30 08:11:11'),
(10, 8, 'lessons_files/cJSJv6wJNXTTEUIJlpTvfxoMifrYkgY3qR4hEGAm.pdf', '2020-08-30 09:07:34', '2020-08-30 09:07:34');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `lesson_id` bigint(20) UNSIGNED DEFAULT NULL,
  `true_false` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `type`, `lesson_id`, `true_false`, `created_at`, `updated_at`) VALUES
(6, 'true false', 1, NULL, 0, '2020-08-25 05:55:46', '2020-08-25 05:55:46'),
(12, 'choose', 2, NULL, NULL, '2020-08-25 09:38:16', '2020-08-25 09:38:16'),
(37, 'dasdasd', 1, NULL, 0, '2020-08-26 09:00:47', '2020-08-26 09:00:47'),
(38, 'how to', 2, NULL, NULL, '2020-08-26 10:57:56', '2020-08-26 10:57:56'),
(39, 'right false', 1, NULL, 1, '2020-08-26 10:58:07', '2020-08-26 10:58:07'),
(40, 'products', 1, 3, 1, '2020-08-26 11:00:21', '2020-08-26 11:40:33'),
(41, 'true false', 2, 3, NULL, '2020-08-26 11:00:41', '2020-08-26 11:40:33'),
(42, 'create-admin', 1, NULL, 0, '2020-08-26 11:42:25', '2020-08-26 11:42:25'),
(43, 'products', 2, NULL, NULL, '2020-08-26 11:42:39', '2020-08-26 11:42:39'),
(44, 'asdasdasdasdasd', 1, NULL, 0, '2020-08-26 11:46:38', '2020-08-26 11:46:38'),
(45, 'music', 1, 4, 0, '2020-08-26 11:47:30', '2020-08-26 11:50:05'),
(46, 'true false specific', 1, NULL, 0, '2020-08-29 10:50:50', '2020-08-29 10:50:50'),
(48, 'true false', 1, 8, 0, '2020-08-30 08:08:30', '2020-08-30 08:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `password`, `phone`, `address`, `group_id`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'elfeqy', 'muhammed@gmail.com', '$2y$10$MZ0jLLUytl1RaV4myAcEjezzNcMQ.mG4rRpY8S5WYl6951fO1k3CG', '01062478093', 'cairo,egypt', 3, 1, NULL, '2020-08-30 10:44:04', '2020-08-30 11:43:04'),
(4, 'Ali Al Fayed', 'ali@gmail.com', '$2y$10$MgEqsfyej5h7R6CH..DvCu/5HK6Beo8RfCSa6l2amLLcK3KnllbfG', '010147752015', 'cairo, egypt', 3, 0, NULL, '2020-09-02 11:55:28', '2020-09-02 11:55:28'),
(5, 'Ali Al Fayed', 'ali1@gmail.com', '$2y$10$4ajodCnAqfkEC.z14Lkp8OFcRzz3YaBHczY7Erge/CajeFXdwgx3q', '0101477520152', 'cairo, egypt', 3, 0, NULL, '2020-09-03 06:28:47', '2020-09-03 06:28:47'),
(6, 'Ali Al Fayed', 'alialfayed22@gmail.com', '$2y$10$cketVROcwxV2HKRUMUT8iupIJcb4IWqBZjYVwRyiHtIc2izMhHZAa', '01014775215', 'Zagazig , Egypt', 3, 0, NULL, '2020-09-03 09:50:17', '2020-09-03 09:50:17'),
(7, 'Ali', 'ad@gmail.com', '$2y$10$v3Kg5z5Xs783FfhCBZPnguVlABWmC91sHY085b608H.uzmsh6LaBW', '01014475215', 'azzzaas', 3, 0, NULL, '2020-09-03 10:19:16', '2020-09-03 10:19:16'),
(8, 'Ali', 'alialfayed1@gmail.com', '$2y$10$2MgssCeSOlKpIZIGsVulxuKIIZbxS8qf6/LX1VaT2zNHLLmtVseG.', '+101014775215', 'zagazig', 3, 0, NULL, '2020-09-03 11:27:20', '2020-09-03 11:27:20'),
(9, 'Ali', 'elfayedgroup8@gmail.com', '$2y$10$.ubwSenNDUyaxQH6lryAn.YFv2QOtimzU.bE0IpC/XU0KRHP4gPvC', '+101277873750', '12fggg', 3, 0, NULL, '2020-09-03 11:29:12', '2020-09-03 11:29:12'),
(10, 'Muhammed Elfeqy', 'testmembe4r1@gmail.com', '$2y$10$wlO0HTqupsmGaJbt8o6CX.1wBgiaLMiitykXP6tnWp1GX5hTXK8/G', '0106247809235', 'cairo, egypt', 3, 1, NULL, '2020-09-03 11:54:47', '2020-09-03 11:55:22'),
(12, 'Muhammed Elfeqy', 'testmembe@gmail.com', '$2y$10$ZE9xXrDaoy0BDMOFLp403.OHWjxz7pFN79Yi2paRBk8q4vOcLSI2K', '01062478092', 'cairo, egypt', 3, 0, NULL, '2020-09-03 13:30:00', '2020-09-03 13:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `students_alerts`
--

CREATE TABLE `students_alerts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `alert_id` bigint(20) UNSIGNED NOT NULL,
  `view_status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students_alerts`
--

INSERT INTO `students_alerts` (`id`, `student_id`, `alert_id`, `view_status`, `created_at`, `updated_at`) VALUES
(2, 2, 3, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscription_requests`
--

CREATE TABLE `subscription_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `month_id` bigint(20) UNSIGNED NOT NULL,
  `payment_status` tinyint(1) NOT NULL DEFAULT 0,
  `viewed_status` tinyint(1) NOT NULL DEFAULT 0,
  `payment_method` int(11) NOT NULL DEFAULT 0,
  `attachement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscription_requests`
--

INSERT INTO `subscription_requests` (`id`, `student_id`, `month_id`, `payment_status`, `viewed_status`, `payment_method`, `attachement`, `created_at`, `updated_at`) VALUES
(13, 2, 5, 1, 1, 2, 'subscription_attachements/chzgzZ16xyQ1bYRiPeClAkSk22BbWApUqcfA6qU6.png', '2020-09-03 09:10:07', '2020-09-03 09:10:29'),
(15, 10, 5, 1, 1, 1, NULL, '2020-09-03 11:57:55', '2020-09-03 11:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `video_src` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lesson_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_src`, `link`, `lesson_id`, `created_at`, `updated_at`) VALUES
(1, 'lessons_videos/YoRBnUx76QOVSicj5uXphmnj0vvYwV1pwBC396SQ.mp4', NULL, 4, '2020-08-26 11:50:05', '2020-08-26 11:50:05'),
(2, 'lessons_videos/UUQgMD0uhX119xnNESLbQDkvKAlCUlH2BouzcXwh.mp4', NULL, 4, '2020-08-26 11:50:05', '2020-08-26 11:50:05'),
(3, NULL, 'https://www.youtube.com/watch?v=kg1BljLu9YY', 4, '2020-08-26 11:50:05', '2020-08-26 11:50:05'),
(4, NULL, 'https://www.youtube.com/watch?v=kg1BljLu9YY', 4, '2020-08-26 11:50:05', '2020-08-26 11:50:05'),
(5, 'lessons_videos/laSPIfnMAJj9o98MpUviFmZQ0mUdlz4xJQ7YorZa.mp4', NULL, 5, '2020-08-29 10:53:07', '2020-08-29 10:53:07'),
(6, NULL, 'https://www.youtube.com/watch?v=kg1BljLu9YY', 5, '2020-08-29 10:53:07', '2020-08-29 10:53:07'),
(7, 'lessons_videos/KYIz0mwr09rJsbEkmoYhp9GfJhBCGG4tuZXbOl5z.mp4', NULL, 6, '2020-08-30 08:09:46', '2020-08-30 08:09:46'),
(8, 'lessons_videos/j79S9rSrXNJgWbOzeeZoLNy6L8QEDUQ3vKjlKxMj.mp4', NULL, 6, '2020-08-30 08:09:46', '2020-08-30 08:09:46'),
(9, NULL, 'https://www.youtube.com/watch?v=kg1BljLu9YY', 6, '2020-08-30 08:09:46', '2020-08-30 08:09:46'),
(10, 'lessons_videos/Lb8iflnKjB3pnT4Dt2mqsHC0czO6waTFohk7C37x.mp4', NULL, 7, '2020-08-30 08:11:11', '2020-08-30 08:11:11'),
(11, 'lessons_videos/ptzZQxq7Slh2Ua44lz208afsRXq8UHC8WvdYemiq.mp4', NULL, 7, '2020-08-30 08:11:11', '2020-08-30 08:11:11'),
(12, NULL, 'https://www.youtube.com/watch?v=kg1BljLu9YY', 7, '2020-08-30 08:11:11', '2020-08-30 08:11:11'),
(16, 'lessons_videos/C79MOnQVWGxaFbxzACVHCxn4QH5useqPdhY176lz.mp4', NULL, 8, '2020-08-30 09:07:34', '2020-08-30 09:07:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fcm_tokens`
--
ALTER TABLE `fcm_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons_questions`
--
ALTER TABLE `lessons_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `months`
--
ALTER TABLE `months`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `months_students`
--
ALTER TABLE `months_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pdf_files`
--
ALTER TABLE `pdf_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD UNIQUE KEY `students_phone_unique` (`phone`);

--
-- Indexes for table `students_alerts`
--
ALTER TABLE `students_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_requests`
--
ALTER TABLE `subscription_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `devices`
--
ALTER TABLE `devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fcm_tokens`
--
ALTER TABLE `fcm_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `lessons_questions`
--
ALTER TABLE `lessons_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `months`
--
ALTER TABLE `months`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `months_students`
--
ALTER TABLE `months_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pdf_files`
--
ALTER TABLE `pdf_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `students_alerts`
--
ALTER TABLE `students_alerts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subscription_requests`
--
ALTER TABLE `subscription_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
