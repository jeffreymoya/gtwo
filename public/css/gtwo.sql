-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2015 at 02:37 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gtwo`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE IF NOT EXISTS `addresses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `line_1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `line_2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `line_1`, `line_2`, `city`, `country`, `postal_code`, `created_at`, `updated_at`) VALUES
(1, 'line 1', 'line 2', 'city', 'country', 4114, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'admin', 'admin', 'admin', 'admin', 4114, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'line 1', '', 'city', 'PH', 0, '2015-05-07 19:10:17', '2015-05-07 19:10:17'),
(4, 'line 1', '', 'city', 'PH', 0, '2015-05-07 19:23:10', '2015-05-07 19:23:10'),
(5, 'a', 'a', 'c', 'PH', 4, '2015-05-07 19:30:02', '2015-05-07 19:30:02'),
(6, 'a', 'a', 'c', 'PH', 4, '2015-05-07 19:33:52', '2015-05-07 19:33:52'),
(7, 'l', '', 'c', 'PH', 4114, '2015-05-07 21:55:23', '2015-05-07 21:55:23'),
(8, '1', '', '1', 'PH', 141, '2015-05-08 00:44:26', '2015-05-08 00:44:26'),
(9, '1', '1', '1', 'PH', 1, '2015-05-08 01:05:20', '2015-05-08 01:05:20'),
(10, '1', '1', '1', 'PH', 1, '2015-05-08 01:06:48', '2015-05-08 01:06:48'),
(11, '1', '1', '1', 'PH', 1, '2015-05-08 01:08:59', '2015-05-08 01:08:59'),
(12, '1', '1', 'c', 'PH', 141, '2015-05-08 03:03:05', '2015-05-08 03:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2015_05_06_041111_create_products_table', 1),
('2015_05_06_043405_create_payments_table', 1),
('2015_05_06_043501_create_addresses_table', 1),
('2015_05_06_043814_create_referrals_table', 1),
('2015_05_06_044619_create_roles_table', 1),
('2015_05_06_045505_create_users_table', 1),
('2015_05_06_045613_create_orders_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(10) unsigned NOT NULL,
  `payment_id` int(10) unsigned NOT NULL,
  `address_id` int(10) unsigned NOT NULL,
  `quantity` int(11) NOT NULL,
  `amount` double(8,2) NOT NULL,
  `discount` double(8,2) DEFAULT '0.00',
  `commission` double(8,2) DEFAULT '0.00',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_product_id_foreign` (`product_id`),
  KEY `orders_payment_id_foreign` (`payment_id`),
  KEY `orders_address_id_foreign` (`address_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=15 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `payment_id`, `address_id`, `quantity`, `amount`, `discount`, `commission`, `status`, `created_at`, `updated_at`) VALUES
(2, 11, 4, 1, 6, 5, 24.52, NULL, NULL, 0, '2015-05-07 19:58:35', '2015-05-07 19:58:35'),
(3, 11, 2, 2, 6, 6, 128.25, NULL, NULL, 0, '2015-05-07 20:42:32', '2015-05-07 20:42:32'),
(4, 11, 1, 3, 6, 1, 10.30, NULL, NULL, 0, '2015-05-07 20:42:32', '2015-05-07 20:42:32'),
(5, 12, 1, 4, 7, 8, 91.60, 82.44, 0.00, 0, '2015-05-07 21:58:06', '2015-05-07 21:58:06'),
(6, 12, 4, 5, 7, 7, 38.15, 34.34, 0.00, 0, '2015-05-07 21:58:07', '2015-05-07 21:58:07'),
(7, 11, 1, 6, 6, 6, 68.70, 0.00, 0.00, 0, '2015-05-07 21:59:21', '2015-05-07 21:59:21'),
(8, 11, 2, 16, 6, 7, 157.50, 0.00, 1.57, 0, '2015-05-07 22:13:51', '2015-05-07 22:13:51'),
(9, 11, 3, 17, 6, 10, 95.00, 0.00, 9.50, 1, '2015-05-07 22:14:15', '2015-05-08 02:17:07'),
(10, 16, 1, 18, 11, 8, 91.60, 82.44, 0.00, 0, '2015-05-08 01:09:19', '2015-05-08 01:09:19'),
(11, 13, 3, 19, 8, 8, 76.00, 64.60, 0.00, 0, '2015-05-08 01:26:23', '2015-05-08 01:26:23'),
(12, 14, 4, 20, 9, 10, 54.50, 0.00, 2.18, 1, '2015-05-08 02:34:44', '2015-05-08 02:40:23'),
(13, 17, 1, 21, 12, 6, 68.70, 0.00, 6.87, 1, '2015-05-08 03:03:48', '2015-05-08 03:13:27'),
(14, 17, 3, 22, 12, 5, 47.50, 0.00, 4.75, 0, '2015-05-08 03:03:48', '2015-05-08 03:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deposit_slip_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deposit_reference_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=23 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `type`, `deposit_slip_image`, `deposit_reference_no`, `created_at`, `updated_at`) VALUES
(1, 'deposit', '', NULL, '2015-05-07 19:58:35', '2015-05-07 19:58:35'),
(2, 'deposit', '', NULL, '2015-05-07 20:42:32', '2015-05-07 20:42:32'),
(3, 'deposit', NULL, NULL, '2015-05-07 20:42:32', '2015-05-07 20:42:32'),
(4, 'deposit', NULL, NULL, '2015-05-07 21:58:06', '2015-05-07 21:58:06'),
(5, 'deposit', NULL, NULL, '2015-05-07 21:58:06', '2015-05-07 21:58:06'),
(6, 'deposit', NULL, NULL, '2015-05-07 21:59:21', '2015-05-07 21:59:21'),
(7, 'deposit', NULL, NULL, '2015-05-07 22:09:15', '2015-05-07 22:09:15'),
(8, 'deposit', NULL, NULL, '2015-05-07 22:11:14', '2015-05-07 22:11:14'),
(9, 'deposit', NULL, NULL, '2015-05-07 22:11:28', '2015-05-07 22:11:28'),
(10, 'deposit', NULL, NULL, '2015-05-07 22:11:43', '2015-05-07 22:11:43'),
(11, 'deposit', NULL, NULL, '2015-05-07 22:11:54', '2015-05-07 22:11:54'),
(12, 'deposit', NULL, NULL, '2015-05-07 22:12:49', '2015-05-07 22:12:49'),
(13, 'deposit', NULL, NULL, '2015-05-07 22:13:01', '2015-05-07 22:13:01'),
(14, 'deposit', NULL, NULL, '2015-05-07 22:13:10', '2015-05-07 22:13:10'),
(15, 'deposit', NULL, NULL, '2015-05-07 22:13:25', '2015-05-07 22:13:25'),
(16, 'deposit', '', NULL, '2015-05-07 22:13:51', '2015-05-07 22:51:58'),
(17, 'deposit', '9.jpg', NULL, '2015-05-07 22:14:15', '2015-05-07 22:49:07'),
(18, 'deposit', NULL, NULL, '2015-05-08 01:09:19', '2015-05-08 01:09:19'),
(19, 'deposit', '11.jpg', NULL, '2015-05-08 01:26:23', '2015-05-08 01:27:21'),
(20, 'deposit', '12.jpg', NULL, '2015-05-08 02:34:44', '2015-05-08 02:36:32'),
(21, 'deposit', '13.jpg', NULL, '2015-05-08 03:03:48', '2015-05-08 03:04:03'),
(22, 'deposit', NULL, NULL, '2015-05-08 03:03:48', '2015-05-08 03:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double(8,2) NOT NULL DEFAULT '0.00',
  `discount` double(8,2) NOT NULL,
  `commission` double(8,2) NOT NULL DEFAULT '0.00',
  `available` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `code`, `name`, `description`, `image`, `price`, `discount`, `commission`, `available`, `created_at`, `updated_at`) VALUES
(1, '', 'Product A', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti', NULL, 11.45, 10.00, 10.00, 22, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '', 'Product B', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti', NULL, 22.50, 5.00, 1.00, 6, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '', 'Product C', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti', NULL, 9.50, 15.00, 10.00, 14, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '', 'Product D', 'At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt molliti', NULL, 5.45, 10.00, 4.00, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `referrals`
--

CREATE TABLE IF NOT EXISTS `referrals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sponsor_id` int(11) NOT NULL,
  `referral_id` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Dumping data for table `referrals`
--

INSERT INTO `referrals` (`id`, `sponsor_id`, `referral_id`, `location`, `created_at`, `updated_at`) VALUES
(1, 6, 11, 0, '2015-05-07 19:33:53', '2015-05-07 19:33:53'),
(2, 6, 12, 0, '2015-05-07 21:55:23', '2015-05-07 21:55:23'),
(3, 6, 13, 0, '2015-05-08 00:44:27', '2015-05-08 00:44:27'),
(4, 6, 14, 0, '2015-05-08 01:05:20', '2015-05-08 01:05:20'),
(5, 6, 15, 0, '2015-05-08 01:06:48', '2015-05-08 01:06:48'),
(6, 6, 16, 0, '2015-05-08 01:08:59', '2015-05-08 01:08:59'),
(7, 6, 17, 0, '2015-05-08 03:03:05', '2015-05-08 03:03:05');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'member', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'admin', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `iexp4u_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address_id` int(10) unsigned NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_user_id_unique` (`user_id`),
  KEY `users_address_id_foreign` (`address_id`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `role_id`, `iexp4u_id`, `first_name`, `last_name`, `address_id`, `phone`, `password`, `uploaded_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'admin@abc.com', 2, NULL, 'admin', 'admin', 1, '12345', '$2y$10$3o6ApK2srNvv6.UwgKbATOQMx4Q6ZtHpixOg/HC2x.BlUtOZ594G2', '', '95IQtkNXnsa1DHsdpGzaMy5Ikmct7WhhgJAvtqb86KdT5IXfmCg3DF3VKafN', '0000-00-00 00:00:00', '2015-05-08 03:13:35'),
(6, 'sponsor@abc.com', 1, NULL, 'jeffrey', 'moya', 2, '12345', '$2y$10$3o6ApK2srNvv6.UwgKbATOQMx4Q6ZtHpixOg/HC2x.BlUtOZ594G2', '', 'Z5mvcORLItf0GOKwC3MmBbUp8NCWhARFjsaQ1Q4iB2jz3hYLjnLr0W2xuOMD', '0000-00-00 00:00:00', '2015-05-08 02:42:58'),
(11, 'jj@clips.com', 1, '', 'a', 'a', 6, '123456', '$2y$10$3o6ApK2srNvv6.UwgKbATOQMx4Q6ZtHpixOg/HC2x.BlUtOZ594G2', 'a-a-11.jpg', 'qgmoroSBoF6zFYnaENNoheAm4UBSWIIhO50XMdooG5VZvzKbg1JV9YKfNAR4', '2015-05-07 19:33:52', '2015-05-08 00:32:27'),
(12, 'iexp@test.com', 1, 'test', 'jeffrey', 'moya', 7, '123456', '$2y$10$dkhuX5ForJbobnbnPmTJM.RQHl2ITBLwgl4enABKHRsw4YEOYl1h6', 'jeffrey-moya-12.jpg', 'wfLaaoL1c0CtIJY9RsnvEv1xDiVywi2upRDPT6sDjpEyddbNRuk9T75MynG8', '2015-05-07 21:55:23', '2015-05-07 21:58:18'),
(13, 'test@email.com', 1, '1', 'patrick', 'mckenzie', 8, '123456', '$2y$10$u3Yuwj8neWGdIBlAxsl7Xe1ERrFPM2OgjymFR/iIrSv08elM8LpT.', 'patrick-mckenzie-13.jpg', 'AoGb72pAOuM04knMdDzaKsuKmnW1CUNPhmbdIAAHcxCm4KBPpEA8tqCKeWex', '2015-05-08 00:44:27', '2015-05-08 01:29:49'),
(14, 'test2@email.com', 1, '', 'test', 'user', 9, '1', '$2y$10$09RjCfnr/nNPIcfvrOpNf.RTU1uxxj1vWsqsWw/MebFcqmdfXAlZS', 'test-user-14.jpg', '46S5wV5cxsUAHH8AX2dAwCgGOLaqWbYJHN3BXbSPsmotNTX5OuZzFu9SgSOD', '2015-05-08 01:05:20', '2015-05-08 02:39:18'),
(15, 'test3@email.com', 1, 'test', 'test', 'user', 10, '1', '$2y$10$DIiZ98h6R3eVWEXwDvIZvOK/9JacGDfjTkPw/MIAScVFNp0xoqfBa', 'test-user-15.jpg', 'bcmO2NLlDa8TlmvHpIlWnzEZwPmkkkMoov7lLZt0MH2hX0SUzcqo8qn5fAxh', '2015-05-08 01:06:48', '2015-05-08 01:08:22'),
(16, 'test4@gmail.com', 1, 'test', 'test', 'user', 11, '1', '$2y$10$DhemZr9azzEWxBvvLt811eOeRWzjACqC4NwE82d47uKx085BTlq.O', 'test-user-16.jpg', 's1ErOVUNaSlzV4oajCko5o6jUuxtz1OxNjIUNaXpxXbI785h0ziL1jjM7kQC', '2015-05-08 01:08:59', '2015-05-08 01:23:54'),
(17, 'test5@abc.com', 1, '', 'test', 'user 5', 12, '1', '$2y$10$TZ01fS6b1k1UlP4pwsefbeRARNVnWiZJevG2CNsv9w0Ttj2Ph0f0q', 'test-user 5-17.jpg', 'ekkfCYH2cZldXkfSNnca0n23j9uM5dON8SiqKx6VJ0RkaNlxjAkWQgngV1Vt', '2015-05-08 03:03:05', '2015-05-08 03:04:25');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
