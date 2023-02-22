-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2023 at 12:26 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dynasty`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` char(11) NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$qTEs1xJh6TZ4Jo2Vvf6CWe5lmS98yk3NUraYpEb5OxksysZrz6K2G', 'Admin', 'WkzOFlUV8LRB0Hv0ziLU2xocPPBbhX54dC718LmKrbkDYMDmRHxY8TO6c2mP', '2023-02-05 08:25:52', '2023-01-20 03:47:10');

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
(1, 'Afghanistan', '🇦🇫', 'AF', '+93', '', NULL, '2023-01-17 13:01:33'),
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
(10, '2023_01_22_080311_create_admins_table', 1);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `firebase_uid` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apple_id` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_id` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `country_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `otp_verify` char(11) COLLATE utf8mb4_unicode_ci DEFAULT 'N',
  `fcm_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `custom_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `flat_no` varchar(255) DEFAULT NULL,
  `flat` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `area` varchar(100) DEFAULT NULL,
  `country_code` char(11) DEFAULT NULL,
  `latitude` varchar(20) DEFAULT NULL,
  `longitude` varchar(20) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 0 COMMENT '0=inactive,1=active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
