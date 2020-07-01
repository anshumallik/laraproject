-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2019 at 06:45 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelanshu`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `role`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Anshu Mallik', 'anshumallik143@gmail.com', 'Admin', '$2y$10$8xCAcUJLsu8WDcYBXuBJrOnGVfGvpQw2yc54ShkRt8J2ueGJ5zj9K', 'IuffM2DQp9PAlrfsvaykqtOsF9ft6WJ1Ma4jVPITQpPAx6RzXWlnun46DNdU', '2019-12-06 06:16:22', '2019-12-06 06:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Toys', '2019-12-06 06:20:36', '2019-12-06 06:20:36', 'toys'),
(2, 'Electronics', '2019-12-06 06:20:56', '2019-12-06 06:20:56', 'electronics'),
(3, 'Clothes', '2019-12-06 06:21:27', '2019-12-06 06:21:27', 'clothes'),
(4, 'Food', '2019-12-13 01:55:42', '2019-12-13 01:55:42', 'food');

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
(4, '2019_12_03_060407_create_admins_table', 1),
(5, '2019_12_03_060930_create_roles_table', 1),
(6, '2019_12_03_065242_create_role_admin_table', 1),
(7, '2019_12_03_104427_create_students_table', 1),
(8, '2019_12_04_043235_add_images_to_students_table', 1),
(9, '2019_12_04_095443_create_categories_table', 1),
(10, '2019_12_04_110620_create_products_table', 1),
(11, '2019_12_05_113202_add_slug_to_categories_table', 1),
(12, '2019_12_06_073723_create_orders_table', 1),
(13, '2019_12_06_103707_create_order_items_table', 1),
(15, '2019_12_10_041949_create_wishlists_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `total_price` decimal(15,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `order_status`, `total_price`, `created_at`, `updated_at`) VALUES
(3, 1, 'processing', '10.00', '2019-11-06 06:25:10', '2019-11-06 06:25:10'),
(7, 1, 'processing', '13000.00', '2019-12-08 06:30:06', '2019-12-08 06:30:06'),
(8, 1, 'processing', '13000.00', '2019-12-08 06:30:37', '2019-12-08 06:30:37'),
(9, 1, 'processing', '14345.00', '2019-12-10 01:57:57', '2019-12-10 01:57:57'),
(11, 1, 'processing', '14345.00', '2019-12-10 01:58:33', '2019-12-10 01:58:33'),
(12, 1, 'processing', '14345.00', '2019-12-10 02:00:25', '2019-12-10 02:00:25'),
(13, 1, 'processing', '14345.00', '2019-12-10 02:01:23', '2019-12-10 02:01:23'),
(14, 1, 'processing', '28000.00', '2019-12-10 06:16:58', '2019-12-10 06:16:58'),
(15, 1, 'processing', '10.00', '2019-12-11 04:22:29', '2019-12-11 04:22:29'),
(16, 1, 'processing', '1000.00', '2019-12-11 04:24:26', '2019-12-11 04:24:26'),
(17, 1, 'processing', '26000.00', '2019-12-11 04:28:15', '2019-12-11 04:28:15'),
(18, 4, 'processing', '13000.00', '2019-12-11 04:31:12', '2019-12-11 04:31:12'),
(19, 4, 'processing', '10.00', '2019-12-12 23:49:30', '2019-12-12 23:49:30'),
(20, 9, 'processing', '100.00', '2019-12-13 05:35:26', '2019-12-13 05:35:26'),
(21, 4, 'processing', '1000.00', '2019-12-14 22:55:53', '2019-12-14 22:55:53');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(3, 3, 3, '1', '2019-12-06 06:25:11', '2019-12-06 06:25:11'),
(4, 4, 3, '2', '2019-12-07 09:13:13', '2019-12-07 09:13:13'),
(7, 5, 4, '1', '2019-12-08 06:04:56', '2019-12-08 06:04:56'),
(8, 6, 4, '1', '2019-12-08 06:06:40', '2019-12-08 06:06:40'),
(9, 7, 1, '1', '2019-12-08 06:30:06', '2019-12-08 06:30:06'),
(10, 8, 1, '1', '2019-12-09 06:30:37', '2019-12-09 06:30:37'),
(11, 9, 2, '2', '2019-12-10 01:57:57', '2019-12-10 01:57:57'),
(12, 9, 4, '1', '2019-12-10 01:57:57', '2019-12-10 01:57:57'),
(13, 10, 2, '2', '2019-12-10 01:58:14', '2019-12-10 01:58:14'),
(14, 10, 4, '1', '2019-12-10 01:58:15', '2019-12-10 01:58:15'),
(15, 11, 2, '2', '2019-12-10 01:58:33', '2019-12-10 01:58:33'),
(16, 11, 4, '1', '2019-12-10 01:58:33', '2019-12-10 01:58:33'),
(17, 12, 2, '2', '2019-12-10 02:00:25', '2019-12-10 02:00:25'),
(18, 13, 2, '2', '2019-12-02 02:01:23', '2019-12-02 02:01:23'),
(19, 14, 2, '2', '2019-12-10 06:16:58', '2019-12-10 06:16:58'),
(20, 15, 3, '1', '2019-12-11 04:22:30', '2019-12-11 04:22:30'),
(21, 16, 2, '1', '2019-12-11 04:24:26', '2019-12-11 04:24:26'),
(22, 17, 1, '2', '2019-12-11 04:28:15', '2019-12-11 04:28:15'),
(23, 18, 1, '1', '2019-12-11 04:31:12', '2019-12-11 04:31:12'),
(25, 19, 3, '1', '2019-12-12 23:49:30', '2019-12-12 23:49:30'),
(26, 20, 3, '5', '2019-11-13 05:30:08', '2019-11-13 05:30:08'),
(28, 21, 7, '2', '2019-12-14 22:55:53', '2019-12-14 22:55:53');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `quantity`, `price`, `image`, `product_code`, `created_at`, `updated_at`) VALUES
(1, 2, 'samsung', 'iuasdisaukhkjsfh', 0, '13000', '1575634049.jpg', '4', '2019-12-06 06:22:29', '2019-12-11 04:31:12'),
(2, 3, 'Baby', 'lsdkjskfgkjs,jkshlf', 10, '1000', '1575634091.jpg', '123', '2019-12-06 06:23:11', '2019-12-11 04:24:26'),
(3, 1, 'Ball', 'adhshff', 4, '10', '1575634138.jpg', '4', '2019-12-06 06:23:58', '2019-12-12 23:49:31'),
(4, 2, 'samsung', 'akjskjdf', 0, '12345', '1575728199.jpg', '4', '2019-12-07 08:31:39', '2019-12-10 01:58:33'),
(5, 3, 'Jacket', 'lskffhsdkjf', 3, '1000', '1575728273.jpg', '12', '2019-12-07 08:32:53', '2019-12-07 09:13:13'),
(6, 3, 'Jacket', 'lksjfskdfhkdjdjgvdkjfhdkj', 2, '13000', '1575979144.jpg', '112', '2019-12-10 06:14:04', '2019-12-10 06:14:04'),
(7, 4, 'Cake', 'kldfjdklf', -1, '500', '1576223040.jpg', '12', '2019-12-13 01:59:00', '2019-12-14 22:55:53'),
(8, 4, 'Biscuit', 'dgdfdfgfgdf', 1, '100', '1576223098.jpg', '134', '2019-12-13 01:59:58', '2019-12-13 05:35:26'),
(9, 1, 'Baby Toys', 'dklghdkgh,sdklghdksghdklgh', 2, '100', '1576238933.jpg', '12', '2019-12-13 06:23:53', '2019-12-13 06:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2019-12-06 06:16:22', '2019-12-06 06:16:22');

-- --------------------------------------------------------

--
-- Table structure for table `role_admin`
--

CREATE TABLE `role_admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` int(11) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `full_name`, `dob`, `gender`, `email`, `phone`, `address`, `zipcode`, `is_deleted`, `created_at`, `updated_at`, `image`) VALUES
(1, 'Anshu', 'Mallik', 'Anshu Mallik', '1996-08-15', 'female', 'anshumallik@gmail.com', '9804335248', 'brt', 12, 0, '2019-12-13 02:14:10', '2019-12-13 02:14:10', '1576223950.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `name`, `email`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Anshu', 'Mallik', 'Anshu Mallik', 'anshumallik143@gmail.com', 'Mills Area', NULL, '$2y$10$oWEPrybbuYRtti9xUkIIWe8ePCmgSXb9jW0i0HLASec2puis3AGVK', NULL, '2019-12-06 06:16:54', '2019-12-06 06:16:54'),
(2, 'mahesh', 'mallik', 'mahesh mallik', 'maheshmallik@gmail.com', 'Biratnagar', NULL, '$2y$10$RYvFgCQoMXlWLud.MWdWr.mJk57Zkycggux48BO7kkiQy7p0MTKcq', NULL, '2019-12-07 08:57:13', '2019-12-07 08:57:13'),
(4, 'krishna', 'karna', 'krishna', 'nishukarna@gmail.com', 'nepal', NULL, '$2y$10$Q.cesb1j/x33PkVok9yncO4jlfLJzQm9svWaXRd/Pi11EgOKdnOwi', NULL, '2019-12-08 03:32:57', '2019-12-08 08:59:51'),
(5, 'Nishu', 'Karna', 'Nishu Karna', 'nishu@gmail.com', 'Biratnagar', NULL, '$2y$10$YhxZdxRrJLejDZKt3O5JXuenOO55rOPBVAcPCPVwsjcrcpMu1jh6G', NULL, '2019-12-09 04:50:31', '2019-12-09 04:50:31'),
(6, 'Sima', 'Mallik', 'Sima Mallik', 'sima@gmail.com', 'Biratnagar', NULL, '$2y$10$uaaJlc.btIm/YuOsLmybT.hUXtsNpDPu2nAGqGswLddlS8njUZNKm', NULL, '2019-12-13 04:51:18', '2019-12-13 04:51:18'),
(7, 'Mahesh', 'Mallik', 'Mahesh Mallik', 'maheshmallik143@gmail.com', 'Biratnagar', NULL, '$2y$10$NYwf/XKugS0Kdy1D.z5IiOmtTxDxI/U7gBu/g7pyPRE6vgoUadIce', NULL, '2019-12-15 04:57:59', '2019-12-15 04:57:59'),
(8, 'Komal', 'Karn', 'Komal Karn', 'komal@gmail.com', 'Biratnagar', NULL, '$2y$10$NdcYqmBkC0SSBsheo9f4g.rZ6Pzo8uhRaoK71U7azNRbByzLCBjYq', NULL, '2019-12-13 04:59:02', '2019-12-13 04:59:02'),
(9, 'Pihu', 'Karn', 'Pihu Karn', 'pihu@gmail.com', 'Biratnagar', NULL, '$2y$10$holhRlv9wXDWnssZmE0agumcAdOhVUmoCr047o3s/z6MnH2HsZeDS', NULL, '2019-12-09 05:02:20', '2019-12-09 05:02:20');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 4, 1, '2019-12-10 00:10:08', '2019-12-10 00:10:08'),
(4, 4, 4, '2019-12-10 01:30:15', '2019-12-10 01:30:15'),
(10, 4, 3, '2019-12-10 05:28:00', '2019-12-10 05:28:00'),
(11, 4, 6, '2019-12-10 06:17:26', '2019-12-10 06:17:26');

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_admin`
--
ALTER TABLE `role_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_admin`
--
ALTER TABLE `role_admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
