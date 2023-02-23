-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2023 at 06:32 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nilesh_self_storage`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, '<h2><strong>What is Lorem Ipsum?</strong></h2>\r\n\r\n<p><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry</strong>. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2022-07-01 18:42:31', '2022-07-01 13:12:31');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `otp` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp_verify` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `otp`, `otp_verify`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, NULL, '$2y$10$XfRCdqsgEK5KDBH/96lmSOkr6.Q3tkFY4fWnrz9K1CBqE3cBH4O..', NULL, '2022-05-25 11:23:27', '2023-01-16 23:25:44'),
(2, 'Dhara', 'dhara.theappideas@gmail.com', '4616', 'Y', '$2y$10$fdTorEsUYGCOS5VH1.aLi.CLd7sbpiCFlk7bjKAlGhkgAf965qELu', NULL, '2022-05-25 11:23:27', '2023-02-15 06:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` int(11) NOT NULL,
  `active_block_status` tinyint(4) DEFAULT 1,
  `firebase_uid` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apple_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `otp_verify` char(11) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `fcm_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Residential', 'residential', 'category/1656580090.png', '2022-06-14 05:23:00', '2022-11-05 08:40:21'),
(3, 'Commercial ', 'commercial', 'category/1656580017.png', '2022-06-14 05:25:07', '2023-01-17 06:00:45');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `property_id` int(10) UNSIGNED NOT NULL,
  `sender_id` int(10) UNSIGNED NOT NULL,
  `receiver_id` int(10) UNSIGNED NOT NULL,
  `sender_status` int(10) UNSIGNED DEFAULT NULL,
  `read` int(10) UNSIGNED DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `content`, `property_id`, `sender_id`, `receiver_id`, `sender_status`, `read`, `created_at`, `updated_at`) VALUES
(1, 'Hiii', 48, 108, 2, 0, 0, '2023-02-20 23:28:30', '2023-02-20 23:28:30'),
(2, 'Hello', 48, 108, 2, 0, 0, '2023-02-20 23:28:34', '2023-02-20 23:28:34'),
(3, 'Hello', 105, 108, 169, 0, 0, '2023-02-21 00:01:02', '2023-02-21 00:01:02'),
(4, 'Good Morning!', 105, 108, 169, 0, 0, '2023-02-21 00:01:14', '2023-02-21 00:01:14'),
(5, 'Hiii', 41, 108, 37, 0, 0, '2023-02-21 00:55:01', '2023-02-21 00:55:01'),
(6, 'How r u?', 41, 108, 37, 0, 0, '2023-02-21 00:55:05', '2023-02-21 00:55:05'),
(7, 'Hiii...Good Afternoon!', 105, 169, 108, 1, 1, '2023-02-21 02:09:29', '2023-02-21 02:09:29');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `email`, `phone`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin@gmail.com', '874598745858', '<h2><strong>What is Lorem Ipsum?</strong></h2>\r\n\r\n<p><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry</strong>. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem&nbsp;Ipsum.</p>', '2023-01-17 12:17:30', '2023-01-17 06:47:30');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dial_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `flag`, `code`, `dial_code`, `currency`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan ', '🇦🇫', 'AF', '+93', '-', NULL, '2023-01-23 09:53:28'),
(2, 'Aland Islands', '🇦🇽', 'AX', '+358', NULL, NULL, '2022-10-07 18:06:46'),
(3, 'Albania', '🇦🇱', 'AL', '+355', NULL, NULL, '2022-10-07 18:11:40'),
(4, 'Algeria', '🇩🇿', 'DZ', '+213', NULL, NULL, '2022-10-10 11:06:16'),
(5, 'American Samoa', '🇦🇸', 'AS', '+1684', NULL, NULL, '2022-10-07 18:11:55'),
(6, 'Andorra', '🇦🇩', 'AD', '+376', NULL, NULL, '2022-10-07 18:12:02'),
(7, 'Angola', '🇦🇴', 'AO', '+244', NULL, NULL, '2022-10-07 18:12:09'),
(8, 'Anguilla', '🇦🇮', 'AI', '+1264', NULL, NULL, '2022-10-07 21:48:44'),
(9, 'Antarctica', '🇦🇶', 'AQ', '+672', NULL, NULL, '2022-10-07 18:12:24'),
(10, 'Antigua and Barbuda', '🇦🇬', 'AG', '+1268', NULL, NULL, '2022-10-07 18:12:31'),
(11, 'Argentina', '🇦🇷', 'AR', '+54', NULL, NULL, '2022-10-07 18:13:37'),
(12, 'Armenia', '🇦🇲', 'AM', '+374', NULL, NULL, '2022-10-07 18:13:42'),
(13, 'Aruba', '🇦🇼', 'AW', '+297', NULL, NULL, '2022-10-07 18:13:48'),
(14, 'Australia', '🇦🇺', 'AU', '+61', NULL, NULL, '2022-10-07 18:13:54'),
(15, 'Austria', '🇦🇹', 'AT', '+43', NULL, NULL, '2022-10-07 18:14:01'),
(16, 'Azerbaijan', '🇦🇿', 'AZ', '+994', NULL, NULL, '2022-10-07 18:14:08'),
(17, 'Bahamas', '🇧🇸', 'BS', '+1242', NULL, NULL, '2022-10-07 18:14:15'),
(18, 'Bahrain', '🇧🇭', 'BH', '+973', NULL, NULL, '2022-10-07 18:14:22'),
(19, 'Bangladesh', '🇧🇩', 'BD', '+880', '৳', NULL, '2022-10-08 20:41:58'),
(20, 'Barbados', '🇧🇧', 'BB', '+1246', NULL, NULL, '2022-10-07 18:14:34'),
(21, 'Belarus', '🇧🇾', 'BY', '+375', NULL, NULL, '2022-10-07 18:15:04'),
(22, 'Belgium', '🇧🇪', 'BE', '+32', NULL, NULL, '2022-10-07 18:15:12'),
(23, 'Belize', '🇧🇿', 'BZ', '+501', NULL, NULL, '2022-10-07 18:15:18'),
(24, 'Benin', '🇧🇯', 'BJ', '+229', NULL, NULL, '2022-10-07 18:15:25'),
(25, 'Bermuda', '🇧🇲', 'BM', '+1441', NULL, NULL, '2022-10-07 18:15:31'),
(26, 'Bhutan', '🇧🇹', 'BT', '+975', NULL, NULL, '2022-10-07 18:15:38'),
(27, 'Bolivia, Plurinational State of bolivia', '🇧🇴', 'BO', '+591', NULL, NULL, '2022-10-07 18:15:44'),
(28, 'Bosnia and Herzegovina', '🇧🇦', 'BA', '+387', NULL, NULL, '2022-10-07 18:15:52'),
(29, 'Botswana', '🇧🇼', 'BW', '+267', NULL, NULL, '2022-10-07 18:16:00'),
(30, 'Bouvet Island', '🇧🇻', 'BV', '+47', NULL, NULL, '2022-10-07 18:16:06'),
(31, 'Brazil', '🇧🇷', 'BR', '+55', NULL, NULL, '2022-10-07 18:17:17'),
(32, 'British Indian Ocean Territory', '🇮🇴', 'IO', '+246', NULL, NULL, '2022-10-07 18:17:25'),
(33, 'Brunei Darussalam', '🇧🇳', 'BN', '+673', NULL, NULL, '2022-10-07 18:17:31'),
(34, 'Bulgaria', '🇧🇬', 'BG', '+359', NULL, NULL, '2022-10-07 18:17:47'),
(35, 'Burkina Faso', '🇧🇫', 'BF', '+226', NULL, NULL, '2022-10-07 18:17:56'),
(36, 'Burundi', '🇧🇮', 'BI', '+257', NULL, NULL, '2022-10-07 18:18:02'),
(37, 'Cambodia', '🇰🇭', 'KH', '+855', NULL, NULL, '2022-10-07 18:18:09'),
(38, 'Cameroon', '🇨🇲', 'CM', '+237', NULL, NULL, '2022-10-07 18:18:18'),
(39, 'Canada', '🇨🇦', 'CA', '+1', NULL, NULL, '2022-10-07 18:18:25'),
(40, 'Cape Verde', '🇨🇻', 'CV', '+238', NULL, NULL, '2022-10-07 18:18:33'),
(41, 'Cayman Islands', '🇰🇾', 'KY', '+345', NULL, NULL, '2022-10-07 18:19:30'),
(42, 'Central African Republic', '🇨🇫', 'CF', '+236', NULL, NULL, '2022-10-07 18:19:38'),
(43, 'Chad', '🇹🇩', 'TD', '+235', NULL, NULL, '2022-10-07 18:19:48'),
(44, 'Chile', '🇨🇱', 'CL', '+56', NULL, NULL, '2022-10-07 18:19:53'),
(45, 'China', '🇨🇳', 'CN', '+86', NULL, NULL, '2022-10-07 18:19:59'),
(46, 'Christmas Island', '🇨🇽', 'CX', '+61', NULL, NULL, '2022-10-07 18:20:12'),
(47, 'Cocos (Keeling) Islands', '🇨🇨', 'CC', '+61', NULL, NULL, '2022-10-07 18:20:21'),
(48, 'Colombia', '🇨🇴', 'CO', '+57', NULL, NULL, '2022-10-07 18:20:24'),
(49, 'Comoros', '🇰🇲', 'KM', '+269', NULL, NULL, '2022-10-07 18:20:30'),
(50, 'Congo', '🇨🇬', 'CG', '+242', NULL, NULL, '2022-10-07 18:20:37'),
(51, 'Congo, The Democratic Republic of the Congo', '🇨🇩', 'CD', '+243', NULL, NULL, '2022-10-08 21:20:45'),
(52, 'Cook Islands', '🇨🇰', 'CK', '+682', NULL, NULL, '2022-10-08 21:20:55'),
(53, 'Costa Rica', '🇨🇷', 'CR', '+506', NULL, NULL, '2022-10-08 21:21:11'),
(54, 'Cote d\'Ivoire', '🇨🇮', 'CI', '+225', NULL, NULL, '2022-10-08 21:21:19'),
(55, 'Croatia', '🇭🇷', 'HR', '+385', NULL, NULL, '2022-10-08 21:21:30'),
(56, 'Cuba', '🇨🇺', 'CU', '+53', NULL, NULL, '2022-10-08 21:21:41'),
(57, 'Cyprus', '🇨🇾', 'CY', '+357', NULL, NULL, '2022-10-08 21:21:50'),
(58, 'Czech Republic', '🇨🇿', 'CZ', '+420', NULL, NULL, '2022-10-08 21:21:58'),
(59, 'Denmark', '🇩🇰', 'DK', '+45', NULL, NULL, '2022-10-08 21:22:06'),
(60, 'Djibouti', '🇩🇯', 'DJ', '+253', NULL, NULL, '2022-10-08 21:22:14'),
(61, 'Dominica', '🇩🇲', 'DM', '+1767', NULL, NULL, '2022-10-08 21:22:43'),
(62, 'Dominican Republic', '🇩🇴', 'DO', '+1849', NULL, NULL, '2022-10-08 21:22:50'),
(63, 'Ecuador', '🇪🇨', 'EC', '+593', NULL, NULL, '2022-10-08 21:23:01'),
(64, 'Egypt', '🇪🇬', 'EG', '+20', NULL, NULL, '2022-10-08 21:23:09'),
(65, 'El Salvador', '🇸🇻', 'SV', '+503', NULL, NULL, '2022-10-08 21:23:20'),
(66, 'Equatorial Guinea', '🇬🇶', 'GQ', '+240', NULL, NULL, '2022-10-08 21:23:27'),
(67, 'Eritrea', '🇪🇷', 'ER', '+291', NULL, NULL, '2022-10-08 21:23:36'),
(68, 'Estonia', '🇪🇪', 'EE', '+372', NULL, NULL, '2022-10-08 21:23:45'),
(69, 'Ethiopia', '🇪🇹', 'ET', '+251', NULL, NULL, '2022-10-08 21:23:52'),
(70, 'Falkland Islands (Malvinas)', '🇫🇰', 'FK', '+500', NULL, NULL, '2022-10-08 21:24:00'),
(71, 'Faroe Islands', '🇫🇴', 'FO', '+298', NULL, NULL, '2022-10-08 21:24:38'),
(72, 'Fiji', '🇫🇯', 'FJ', '+679', NULL, NULL, '2022-10-08 21:24:51'),
(73, 'Finland', '🇫🇮', 'FI', '+358', NULL, NULL, '2022-10-08 21:25:00'),
(74, 'France', '🇫🇷', 'FR', '+33', NULL, NULL, '2022-10-08 21:25:09'),
(75, 'French Guiana', '🇬🇫', 'GF', '+594', NULL, NULL, '2022-10-08 21:25:18'),
(76, 'French Polynesia', '🇵🇫', 'PF', '+689', NULL, NULL, '2022-10-08 21:25:25'),
(77, 'French Southern Territories', '🇹🇫', 'TF', '+262', NULL, NULL, '2022-10-08 21:25:33'),
(78, 'Gabon', '🇬🇦', 'GA', '+241', NULL, NULL, '2022-10-08 21:25:42'),
(79, 'Gambia', '🇬🇲', 'GM', '+220', NULL, NULL, '2022-10-08 21:25:51'),
(80, 'Georgia', '🇬🇪', 'GE', '+995', NULL, NULL, '2022-10-08 21:25:59'),
(81, 'Germany', '🇩🇪', 'DE', '+49', NULL, NULL, '2022-10-08 21:26:34'),
(82, 'Ghana', '🇬🇭', 'GH', '+233', NULL, NULL, '2022-10-08 21:26:42'),
(83, 'Gibraltar', '🇬🇮', 'GI', '+350', NULL, NULL, '2022-10-08 21:26:49'),
(84, 'Greece', '🇬🇷', 'GR', '+30', NULL, NULL, '2022-10-08 21:26:56'),
(85, 'Greenland', '🇬🇱', 'GL', '+299', NULL, NULL, '2022-10-08 21:27:05'),
(86, 'Grenada', '🇬🇩', 'GD', '+1473', NULL, NULL, '2022-10-08 21:27:12'),
(87, 'Guadeloupe', '🇬🇵', 'GP', '+590', NULL, NULL, '2022-10-08 21:27:22'),
(88, 'Guam', '🇬🇺', 'GU', '+1671', NULL, NULL, '2022-10-08 21:27:32'),
(89, 'Guatemala', '🇬🇹', 'GT', '+502', NULL, NULL, '2022-10-08 21:27:40'),
(90, 'Guernsey', '🇬🇬', 'GG', '+44', NULL, NULL, '2022-10-08 21:27:47'),
(91, 'Guinea', '🇬🇳', 'GN', '+224', NULL, NULL, '2022-10-08 21:28:21'),
(92, 'Guinea-Bissau', '🇬🇼', 'GW', '+245', NULL, NULL, '2022-10-08 21:28:29'),
(93, 'Guyana', '🇬🇾', 'GY', '+592', NULL, NULL, '2022-10-08 21:28:36'),
(94, 'Haiti', '🇭🇹', 'HT', '+509', NULL, NULL, '2022-10-08 21:28:44'),
(95, 'Heard Island and Mcdonald Islands', '🇭🇲', 'HM', '+672', NULL, NULL, '2022-10-08 21:28:53'),
(96, 'Holy See (Vatican City State)', '🇻🇦', 'VA', '+379', NULL, NULL, '2022-10-08 21:29:00'),
(97, 'Honduras', '🇭🇳', 'HN', '+504', NULL, NULL, '2022-10-08 21:29:09'),
(98, 'Hong Kong', '🇭🇰', 'HK', '+852', NULL, NULL, '2022-10-08 21:29:16'),
(99, 'Hungary', '🇭🇺', 'HU', '+36', NULL, NULL, '2022-10-08 21:29:25'),
(100, 'Iceland', '🇮🇸', 'IS', '+354', NULL, NULL, '2022-10-08 21:29:32'),
(101, 'India', '🇮🇳', 'IN', '+91', '₹', NULL, '2022-10-08 21:30:46'),
(102, 'Indonesia', '🇮🇩', 'ID', '+62', NULL, NULL, '2022-10-08 21:30:55'),
(103, 'Iran, Islamic Republic of Persian Gulf', '🇮🇷', 'IR', '+98', NULL, NULL, '2022-10-08 21:31:02'),
(104, 'Iraq', '🇮🇶', 'IQ', '+964', NULL, NULL, '2022-10-08 21:31:08'),
(105, 'Ireland', '🇮🇪', 'IE', '+353', NULL, NULL, '2022-10-08 21:31:14'),
(106, 'Isle of Man', '🇮🇲', 'IM', '+44', NULL, NULL, '2022-10-08 21:31:22'),
(107, 'Israel', '🇮🇱', 'IL', '+972', NULL, NULL, '2022-10-08 21:31:28'),
(108, 'Italy', '🇮🇹', 'IT', '+39', NULL, NULL, '2022-10-08 21:31:35'),
(109, 'Jamaica', '🇯🇲', 'JM', '+1876', NULL, NULL, '2022-10-08 21:31:42'),
(110, 'Japan', '🇯🇵', 'JP', '+81', NULL, NULL, '2022-10-08 21:31:48'),
(111, 'Jersey', '🇯🇪', 'JE', '+44', NULL, NULL, '2022-10-08 21:32:17'),
(112, 'Jordan', '🇯🇴', 'JO', '+962', NULL, NULL, '2022-10-08 21:32:23'),
(113, 'Kazakhstan', '🇰🇿', 'KZ', '+7', NULL, NULL, '2022-10-08 21:32:30'),
(114, 'Kenya', '🇰🇪', 'KE', '+254', NULL, NULL, '2022-10-08 21:32:36'),
(115, 'Kiribati', '🇰🇮', 'KI', '+686', NULL, NULL, '2022-10-08 21:32:43'),
(116, 'Korea, Democratic People\'s Republic of Korea', '🇰🇵', 'KP', '+850', NULL, NULL, '2022-10-08 21:32:48'),
(117, 'Korea, Republic of South Korea', '🇰🇷', 'KR', '+82', NULL, NULL, '2022-10-08 21:32:56'),
(118, 'Kosovo', '🇽🇰', 'XK', '+383', NULL, NULL, '2022-10-08 21:33:02'),
(119, 'Kuwait', '🇰🇼', 'KW', '+965', NULL, NULL, '2022-10-08 21:33:08'),
(120, 'Kyrgyzstan', '🇰🇬', 'KG', '+996', NULL, NULL, '2022-10-08 21:33:14'),
(121, 'Laos', '🇱🇦', 'LA', '+856', NULL, NULL, '2022-10-08 21:33:47'),
(122, 'Latvia', '🇱🇻', 'LV', '+371', NULL, NULL, '2022-10-08 21:33:53'),
(123, 'Lebanon', '🇱🇧', 'LB', '+961', NULL, NULL, '2022-10-08 21:34:00'),
(124, 'Lesotho', '🇱🇸', 'LS', '+266', NULL, NULL, '2022-10-08 21:34:07'),
(125, 'Liberia', '🇱🇷', 'LR', '+231', NULL, NULL, '2022-10-08 21:34:12'),
(126, 'Libyan Arab Jamahiriya', '🇱🇾', 'LY', '+218', NULL, NULL, '2022-10-08 21:34:19'),
(127, 'Liechtenstein', '🇱🇮', 'LI', '+423', NULL, NULL, '2022-10-08 21:34:25'),
(128, 'Lithuania', '🇱🇹', 'LT', '+370', NULL, NULL, '2022-10-08 21:34:32'),
(129, 'Luxembourg', '🇱🇺', 'LU', '+352', NULL, NULL, '2022-10-08 21:34:39'),
(130, 'Macao', '🇲🇴', 'MO', '+853', NULL, NULL, '2022-10-08 21:34:46'),
(131, 'Macedonia', '🇲🇰', 'MK', '+389', NULL, NULL, '2022-10-08 21:35:24'),
(132, 'Madagascar', '🇲🇬', 'MG', '+261', NULL, NULL, '2022-10-08 21:35:31'),
(133, 'Malawi', '🇲🇼', 'MW', '+265', NULL, NULL, '2022-10-08 21:35:37'),
(134, 'Malaysia', '🇲🇾', 'MY', '+60', NULL, NULL, '2022-10-08 21:35:43'),
(135, 'Maldives', '🇲🇻', 'MV', '+960', NULL, NULL, '2022-10-08 21:36:00'),
(136, 'Mali', '🇲🇱', 'ML', '+223', NULL, NULL, '2022-10-08 21:36:06'),
(137, 'Malta', '🇲🇹', 'MT', '+356', NULL, NULL, '2022-10-08 21:36:12'),
(138, 'Marshall Islands', '🇲🇭', 'MH', '+692', NULL, NULL, '2022-10-08 21:36:19'),
(139, 'Martinique', '🇲🇶', 'MQ', '+596', NULL, NULL, '2022-10-08 21:36:26'),
(140, 'Mauritania', '🇲🇷', 'MR', '+222', NULL, NULL, '2022-10-08 21:36:33'),
(141, 'Mauritius', '🇲🇺', 'MU', '+230', NULL, NULL, '2022-10-08 21:41:25'),
(142, 'Mayotte', '🇾🇹', 'YT', '+262', NULL, NULL, '2022-10-08 21:41:32'),
(143, 'Mexico', '🇲🇽', 'MX', '+52', NULL, NULL, '2022-10-08 21:41:39'),
(144, 'Micronesia, Federated States of Micronesia', '🇫🇲', 'FM', '+691', NULL, NULL, '2022-10-08 21:41:50'),
(145, 'Moldova', '🇲🇩', 'MD', '+373', NULL, NULL, '2022-10-08 21:41:56'),
(146, 'Monaco', '🇲🇨', 'MC', '+377', NULL, NULL, '2022-10-08 21:42:07'),
(147, 'Mongolia', '🇲🇳', 'MN', '+976', NULL, NULL, '2022-10-08 21:42:13'),
(148, 'Montenegro', '🇲🇪', 'ME', '+382', NULL, NULL, '2022-10-08 21:42:19'),
(149, 'Montserrat', '🇲🇸', 'MS', '+1664', NULL, NULL, '2022-10-08 21:42:24'),
(150, 'Morocco', '🇲🇦', 'MA', '+212', NULL, NULL, '2022-10-08 21:42:34'),
(151, 'Mozambique', '🇲🇿', 'MZ', '+258', NULL, NULL, '2022-10-08 21:43:44'),
(152, 'Myanmar', '🇲🇲', 'MM', '+95', NULL, NULL, '2022-10-08 21:43:51'),
(153, 'Namibia', '🇳🇦', 'NA', '+264', NULL, NULL, '2022-10-08 21:43:56'),
(154, 'Nauru', '🇳🇷', 'NR', '+674', NULL, NULL, '2022-10-08 21:44:14'),
(155, 'Nepal', '🇳🇵', 'NP', '+977', NULL, NULL, '2022-10-08 21:44:32'),
(156, 'Netherlands', '🇳🇱', 'NL', '+31', NULL, NULL, '2022-10-08 21:44:37'),
(157, 'Netherlands Antilles', '', 'AN', '+599', NULL, NULL, '2022-10-08 22:11:46'),
(158, 'New Caledonia', '🇳🇨', 'NC', '+687', NULL, NULL, '2022-10-08 21:44:50'),
(159, 'New Zealand', '🇳🇿', 'NZ', '+64', NULL, NULL, '2022-10-08 21:44:57'),
(160, 'Nicaragua', '🇳🇮', 'NI', '+505', NULL, NULL, '2022-10-08 21:45:04'),
(161, 'Niger', '🇳🇪', 'NE', '+227', NULL, NULL, '2022-10-08 21:47:02'),
(162, 'Nigeria', '🇳🇬', 'NG', '+234', NULL, NULL, '2022-10-08 21:47:08'),
(163, 'Niue', '🇳🇺', 'NU', '+683', NULL, NULL, '2022-10-08 21:47:16'),
(164, 'Norfolk Island', '🇳🇫', 'NF', '+672', NULL, NULL, '2022-10-08 21:47:22'),
(165, 'Northern Mariana Islands', '🇲🇵', 'MP', '+1670', NULL, NULL, '2022-10-08 21:47:28'),
(166, 'Norway', '🇳🇴', 'NO', '+47', NULL, NULL, '2022-10-08 21:47:34'),
(167, 'Oman', '🇴🇲', 'OM', '+968', NULL, NULL, '2022-10-08 21:47:40'),
(168, 'Pakistan', '🇵🇰', 'PK', '+92', NULL, NULL, '2022-10-08 21:47:47'),
(169, 'Palau', '🇵🇼', 'PW', '+680', NULL, NULL, '2022-10-08 21:47:52'),
(170, 'Palestinian Territory, Occupied', '🇵🇸', 'PS', '+970', NULL, NULL, '2022-10-08 21:47:59'),
(171, 'Panama', '🇵🇦', 'PA', '+507', NULL, NULL, '2022-10-08 21:48:19'),
(172, 'Papua New Guinea', '🇵🇬', 'PG', '+675', NULL, NULL, '2022-10-08 21:48:24'),
(173, 'Paraguay', '🇵🇾', 'PY', '+595', NULL, NULL, '2022-10-08 21:48:30'),
(174, 'Peru', '🇵🇪', 'PE', '+51', NULL, NULL, '2022-10-08 21:48:39'),
(175, 'Philippines', '🇵🇭', 'PH', '+63', NULL, NULL, '2022-10-08 21:49:02'),
(176, 'Pitcairn', '🇵🇳', 'PN', '+64', NULL, NULL, '2022-10-08 21:49:09'),
(177, 'Poland', '🇵🇱', 'PL', '+48', NULL, NULL, '2022-10-08 21:49:14'),
(178, 'Portugal', '🇵🇹', 'PT', '+351', NULL, NULL, '2022-10-08 21:49:21'),
(179, 'Puerto Rico', '🇵🇷', 'PR', '+1939', NULL, NULL, '2022-10-08 21:49:26'),
(180, 'Qatar', '🇶🇦', 'QA', '+974', NULL, NULL, '2022-10-08 21:49:32'),
(181, 'Romania', '🇷🇴', 'RO', '+40', NULL, NULL, '2022-10-08 21:49:38'),
(182, 'Russia', '🇷🇺', 'RU', '+7', NULL, NULL, '2022-10-08 21:49:44'),
(183, 'Rwanda', '🇷🇼', 'RW', '+250', NULL, NULL, '2022-10-08 21:49:52'),
(184, 'Reunion', '🇷🇪', 'RE', '+262', NULL, NULL, '2022-10-08 21:49:58'),
(185, 'Saint Barthelemy', '🇧🇱', 'BL', '+590', NULL, NULL, '2022-10-08 21:50:05'),
(186, 'Saint Helena, Ascension and Tristan Da Cunha', '🇸🇭', 'SH', '+290', NULL, NULL, '2022-10-08 21:50:47'),
(187, 'Saint Kitts and Nevis', '🇰🇳', 'KN', '+1869', NULL, NULL, '2022-10-08 21:50:52'),
(188, 'Saint Lucia', '🇱🇨', 'LC', '+1758', NULL, NULL, '2022-10-08 21:50:57'),
(189, 'Saint Martin', '🇲🇫', 'MF', '+590', NULL, NULL, '2022-10-08 21:51:04'),
(190, 'Saint Pierre and Miquelon', '🇵🇲', 'PM', '+508', NULL, NULL, '2022-10-08 21:51:13'),
(191, 'Saint Vincent and the Grenadines', '🇻🇨', 'VC', '+1784', NULL, NULL, '2022-10-08 21:51:23'),
(192, 'Samoa', '🇼🇸', 'WS', '+685', NULL, NULL, '2022-10-08 21:51:29'),
(193, 'San Marino', '🇸🇲', 'SM', '+378', NULL, NULL, '2022-10-08 21:51:34'),
(194, 'Sao Tome and Principe', '🇸🇹', 'ST', '+239', NULL, NULL, '2022-10-08 21:51:41'),
(195, 'Saudi Arabia', '🇸🇦', 'SA', '+966', NULL, NULL, '2022-10-08 21:51:46'),
(196, 'Senegal', '🇸🇳', 'SN', '+221', NULL, NULL, '2022-10-08 21:51:53'),
(197, 'Serbia', '🇷🇸', 'RS', '+381', NULL, NULL, '2022-10-08 21:51:59'),
(198, 'Seychelles', '🇸🇨', 'SC', '+248', NULL, NULL, '2022-10-08 21:52:05'),
(199, 'Sierra Leone', '🇸🇱', 'SL', '+232', NULL, NULL, '2022-10-08 21:52:12'),
(200, 'Singapore', '🇸🇬', 'SG', '+65', NULL, NULL, '2022-10-08 21:52:18'),
(201, 'Slovakia', '🇸🇰', 'SK', '+421', NULL, NULL, '2022-10-08 21:52:43'),
(202, 'Slovenia', '🇸🇮', 'SI', '+386', NULL, NULL, '2022-10-08 21:52:51'),
(203, 'Solomon Islands', '🇸🇧', 'SB', '+677', NULL, NULL, '2022-10-08 21:52:58'),
(204, 'Somalia', '🇸🇴', 'SO', '+252', NULL, NULL, '2022-10-08 21:53:03'),
(205, 'South Africa', '🇿🇦', 'ZA', '+27', NULL, NULL, '2022-10-08 21:53:11'),
(206, 'South Sudan', '🇸🇸', 'SS', '+211', NULL, NULL, '2022-10-08 21:53:18'),
(207, 'South Georgia and the South Sandwich Islands', '🇬🇸', 'GS', '+500', NULL, NULL, '2022-10-08 21:53:23'),
(208, 'Spain', '🇪🇸', 'ES', '+34', NULL, NULL, '2022-10-08 21:53:29'),
(209, 'Sri Lanka', '🇱🇰', 'LK', '+94', NULL, NULL, '2022-10-08 21:53:36'),
(210, 'Sudan', '🇸🇩', 'SD', '+249', NULL, NULL, '2022-10-08 21:53:42'),
(211, 'Suriname', '🇸🇷', 'SR', '+597', NULL, NULL, '2022-10-08 21:54:11'),
(212, 'Svalbard and Jan Mayen', '🇸🇯', 'SJ', '+47', NULL, NULL, '2022-10-08 21:54:16'),
(213, 'Eswatini', '🇸🇿', 'SZ', '+268', NULL, NULL, '2022-10-08 21:54:22'),
(214, 'Sweden', '🇸🇪', 'SE', '+46', NULL, NULL, '2022-10-08 21:54:28'),
(215, 'Switzerland', '🇨🇭', 'CH', '+41', NULL, NULL, '2022-10-08 21:54:34'),
(216, 'Syrian Arab Republic', '🇸🇾', 'SY', '+963', NULL, NULL, '2022-10-08 21:54:40'),
(217, 'Taiwan', '🇹🇼', 'TW', '+886', NULL, NULL, '2022-10-08 21:54:46'),
(218, 'Tajikistan', '🇹🇯', 'TJ', '+992', NULL, NULL, '2022-10-08 21:54:53'),
(219, 'Tanzania, United Republic of Tanzania', '🇹🇿', 'TZ', '+255', NULL, NULL, '2022-10-08 21:55:00'),
(220, 'Thailand', '🇹🇭', 'TH', '+66', NULL, NULL, '2022-10-08 21:55:11'),
(221, 'Timor-Leste', '🇹🇱', 'TL', '+670', NULL, NULL, '2022-10-08 21:55:34'),
(222, 'Togo', '🇹🇬', 'TG', '+228', NULL, NULL, '2022-10-08 21:55:39'),
(223, 'Tokelau', '🇹🇰', 'TK', '+690', NULL, NULL, '2022-10-08 21:55:44'),
(224, 'Tonga', '🇹🇴', 'TO', '+676', NULL, NULL, '2022-10-08 21:55:49'),
(225, 'Trinidad and Tobago', '🇹🇹', 'TT', '+1868', NULL, NULL, '2022-10-08 21:55:56'),
(226, 'Tunisia', '🇹🇳', 'TN', '+216', NULL, NULL, '2022-10-08 21:56:03'),
(227, 'Turkey', '🇹🇷', 'TR', '+90', NULL, NULL, '2022-10-08 21:56:08'),
(228, 'Turkmenistan', '🇹🇲', 'TM', '+993', NULL, NULL, '2022-10-08 21:56:14'),
(229, 'Turks and Caicos Islands', '🇹🇨', 'TC', '+1649', NULL, NULL, '2022-10-08 21:56:20'),
(230, 'Tuvalu', '🇹🇻', 'TV', '+688', NULL, NULL, '2022-10-08 21:56:26'),
(231, 'Uganda', '🇺🇬', 'UG', '+256', NULL, NULL, '2022-10-08 21:57:06'),
(232, 'Ukraine', '🇺🇦', 'UA', '+380', NULL, NULL, '2022-10-08 21:57:11'),
(233, 'United Arab Emirates', '🇦🇪', 'AE', '+971', NULL, NULL, '2022-10-08 21:57:17'),
(234, 'United Kingdom', '🇬🇧', 'GB', '+44', NULL, NULL, '2022-10-08 21:57:29'),
(235, 'United States', '🇺🇸', 'US', '+1', NULL, NULL, '2022-10-08 21:57:35'),
(236, 'Uruguay', '🇺🇾', 'UY', '+598', NULL, NULL, '2022-10-08 21:57:42'),
(237, 'Uzbekistan', '🇺🇿', 'UZ', '+998', NULL, NULL, '2022-10-08 21:57:47'),
(238, 'Vanuatu', '🇻🇺', 'VU', '+678', NULL, NULL, '2022-10-08 21:57:53'),
(239, 'Venezuela, Bolivarian Republic of Venezuela', '🇻🇪', 'VE', '+58', NULL, NULL, '2022-10-08 21:58:00'),
(240, 'Vietnam', '🇻🇳', 'VN', '+84', NULL, NULL, '2022-10-08 21:58:06'),
(241, 'Virgin Islands, British', '🇻🇬', 'VG', '+1284', NULL, NULL, '2022-10-08 21:58:29'),
(242, 'Virgin Islands, U.S.', '🇻🇮', 'VI', '+1340', NULL, NULL, '2022-10-08 21:58:36'),
(243, 'Wallis and Futuna', '🇼🇫', 'WF', '+681', NULL, NULL, '2022-10-08 21:58:43'),
(244, 'Yemen', '🇾🇪', 'YE', '+967', NULL, NULL, '2022-10-08 21:58:48'),
(245, 'Zambia', '🇿🇲', 'ZM', '+260', NULL, NULL, '2022-10-08 21:58:54'),
(246, 'Zimbabwe', '🇿🇼', 'ZW', '+263', NULL, NULL, '2022-10-08 21:59:00');

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
-- Table structure for table `faq_list`
--

CREATE TABLE `faq_list` (
  `id` int(11) NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq_list`
--

INSERT INTO `faq_list` (`id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 'How can I qualify for exemptions on the Capital Gains Tax?', '<p>There are a few exemptions available for long term Capital Gains, if you:</p>\r\n\r\n<ul>\r\n	<li><strong>Buy or construct a new house</strong>: If you build a new house or buy one from the money you receive from selling a property, you are exempted from paying the tax on Capital Gains. However, the new purchase should be done either one year before or within two years of sale and the construction should be completed within three years from the date of transfer. The new property bought or constructed should not be sold within three years from the date of its purchase or date of completion of construction.</li>\r\n	<li><strong>Capital Gain Account Scheme-&nbsp;</strong>Through the Capital Gain Account Scheme (CGAS), you can save the received money in designated banks. CGAS helps you in buying time to look for suitable investments as it serves to inform the Income Tax department that you plan to invest the money received; but at a later date.</li>\r\n	<li><strong>I</strong><strong>nvest in Bonds-&nbsp;</strong>You can also invest in financial assets or bonds to save tax. Such bonds are issued by the Rural Electrification Corporation and the National Highway Authority of India and should be bought within six months of transferring the property. You can invest a maximum of Rs 50 lakhs through these bonds.</li>\r\n</ul>', '2022-07-04 12:05:09', '2022-07-04 06:35:09'),
(3, 'How many properties can I own?', '<p>You can own as many properties as you want.</p>', '2022-07-04 12:04:15', '2022-07-04 06:34:15'),
(4, 'In which cities do you offer your services?', '<p>Our services are available across 8 cities in India, namely Noida, Gurgaon, Mumbai, Pune, Bangalore, Chennai, Kolkata and Ahmedabad.</p>', '2022-07-04 06:35:36', '2022-07-04 06:35:36'),
(5, 'Is there a procedure to be completed or forms to be filled up on execution?', '<ul>\r\n	<li>Yes. But the procedure and forms may vary from state to state depending on the location of the property. Every state in India has formulated its own set of forms under the registration rules. These forms are to be filled up and filed at the time of the registration of Sale Deed/Transfer Deed.</li>\r\n	<li>Under the Income Tax Act and rules for a sale transaction, it is mandatory for the buyer and seller to provide their PAN card number and in the event of sale, either the seller and/or the buyer would need to fill up Form 60 of the Income Tax.</li>\r\n	<li>If the buyer or the seller is a Non-Resident Indian (NRI) not assessed for taxes in India, the person would not need to file Form 60 of the Income Tax.</li>\r\n</ul>', '2022-07-06 15:52:58', '2022-07-06 10:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `featured_plans`
--

CREATE TABLE `featured_plans` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_posts` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `validity` int(11) DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `featured_plans`
--

INSERT INTO `featured_plans` (`id`, `type`, `total_posts`, `price`, `validity`, `duration`, `created_at`, `updated_at`) VALUES
(1, 'Single', NULL, 200, 1, 'Month', '2022-07-18 07:45:29', '2022-07-27 06:42:29'),
(2, 'Multiple', 10, 600, 1, 'Month', '2022-07-18 07:55:56', '2022-07-27 06:53:18'),
(3, 'Multiple', 7, 400, 2, 'Week', '2022-07-18 07:58:03', '2022-07-18 18:26:50'),
(5, 'Single', NULL, 150, 2, 'Week', '2022-07-18 10:48:48', '2022-07-18 18:22:55'),
(6, 'Multiple', 3, 200, 1, 'Week', '2022-07-18 11:39:25', '2022-07-18 18:26:23'),
(8, 'Single', NULL, 100, 1, 'Week', '2022-07-18 11:39:25', '2022-07-18 18:25:52');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `buyer_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `buyer_id`, `name`, `email`, `phone`, `message`, `created_at`, `updated_at`) VALUES
(1, 11, 'Priyanka Patel', 'priyanka.theappideas@gmail.com', '8956230147', 'Nice website...', '2022-12-02 06:33:35', '2022-12-02 06:33:35'),
(2, 11, 'yutyu', 'tyutyu@gmail.com', '456456', 'rtyrty', '2022-12-08 09:09:19', '2022-12-08 09:09:19'),
(3, 109, 'Test', 'testingusertai@gmail.com', '7854215421', 'Test', '2023-01-17 09:49:09', '2023-01-17 09:49:09'),
(4, 109, 'Test', 'testingusertai@gmail.com', '9106588478', 'Test Feedback', '2023-01-17 11:07:32', '2023-01-17 11:07:32'),
(5, 109, 'Test', 'testingusertai@gmail.com', '8754216585', 'abc test', '2023-01-17 11:28:23', '2023-01-17 11:28:23');

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_05_25_073204_create_admins_table', 2);

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
-- Table structure for table `payment_card`
--

CREATE TABLE `payment_card` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `holder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exp_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cvv` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `id` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_policy`
--

INSERT INTO `privacy_policy` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, '<h2><strong>What is Lorem Ipsum?</strong></h2>\r\n\r\n<p><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry</strong>. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2022-07-01 18:41:06', '2022-07-01 13:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` int(11) NOT NULL,
  `active_block_status` tinyint(4) DEFAULT 1,
  `firebase_uid` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apple_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `otp_verify` char(11) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `fcm_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`id`, `cat_id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Apartment', NULL, '2022-06-14 11:34:53', '2022-06-14 11:34:53'),
(2, 1, 'House/Villa', NULL, '2022-06-14 11:35:03', '2022-06-14 11:35:03'),
(4, 1, 'Land', NULL, '2022-06-14 11:35:19', '2022-06-14 12:11:37'),
(5, 3, 'Office', NULL, '2022-06-14 11:35:28', '2023-02-07 13:46:21'),
(8, 3, 'Land', NULL, '2022-06-14 11:36:00', '2022-06-14 11:36:00'),
(9, 3, 'Hospital', NULL, '2022-06-14 11:36:07', '2023-02-07 13:45:36');

-- --------------------------------------------------------

--
-- Table structure for table `terms_condition`
--

CREATE TABLE `terms_condition` (
  `id` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_condition`
--

INSERT INTO `terms_condition` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum is simply dummy text of the printing and typesetting industry</strong>. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2022-07-01 18:40:17', '2022-07-01 13:10:17');

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_list`
--
ALTER TABLE `faq_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured_plans`
--
ALTER TABLE `featured_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_card`
--
ALTER TABLE `payment_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_condition`
--
ALTER TABLE `terms_condition`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `faq_list`
--
ALTER TABLE `faq_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `featured_plans`
--
ALTER TABLE `featured_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_card`
--
ALTER TABLE `payment_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `terms_condition`
--
ALTER TABLE `terms_condition`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
