-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 24, 2023 at 05:57 PM
-- Server version: 10.6.15-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u739043207_wowoffers`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` bigint(20) UNSIGNED NOT NULL,
  `branch_name` varchar(255) NOT NULL,
  `branch_logo` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `common_shop_images`
--

CREATE TABLE `common_shop_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `offer_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `common_shop_images`
--

INSERT INTO `common_shop_images` (`id`, `offer_id`, `offer_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'media/commonOfferImages/BdJZlrBbfk7gSSIoog2nCRlaLlEAb8xwa98yvUMm.jpg', '2023-12-23 07:29:58', '2023-12-23 07:29:58'),
(2, 3, 'media/commonOfferImages/790pdYWWwouUk3F8ol0HjJ7MbYfifcfUHX7wIDEz.jpg', '2023-12-23 07:53:15', '2023-12-23 07:53:15'),
(3, 4, 'media/commonOfferImages/HZdJzsGDCjMTSZLdeX5ByDxrfxh6FZwPjKP7ud2E.jpg', '2023-12-23 07:58:27', '2023-12-23 07:58:27'),
(4, 4, 'media/commonOfferImages/36ciPY61Yu0ZTIRP5JgaEjnsplqYuFfxrsqbDAE9.jpg', '2023-12-23 08:00:42', '2023-12-23 08:00:42'),
(5, 4, 'media/commonOfferImages/6iKWBw7PftWexMgvYbVzhszkC1ChiBb1lG7it2rM.jpg', '2023-12-23 08:01:03', '2023-12-23 08:01:03'),
(6, 4, 'media/commonOfferImages/UYY2wM3xqGlwFnKM0oIZ9XkAsmofvY6LcIYkPEcT.jpg', '2023-12-23 08:02:50', '2023-12-23 08:02:50'),
(7, 4, 'media/commonOfferImages/9wKeWn8eykyGQqnYu9GrktgvyahMcIz0aR8UbfqI.jpg', '2023-12-23 08:05:46', '2023-12-23 08:05:46'),
(8, 4, 'media/commonOfferImages/Ej2PF8rhsskcSG5P8TiTHWr9pLGisPD6yV363IUK.jpg', '2023-12-23 08:05:51', '2023-12-23 08:05:51'),
(9, 4, 'media/commonOfferImages/ZMfeekZ7Ik3BFXd7gEzatikhQ0S3mV6muFvOy8bf.jpg', '2023-12-23 08:06:25', '2023-12-23 08:06:25'),
(10, 4, 'media/commonOfferImages/HIEO28uktAZozUpUtL4IrK8bMG5eico83VOm4lh5.jpg', '2023-12-23 08:06:45', '2023-12-23 08:06:45'),
(11, 4, 'media/commonOfferImages/r452CUeusUp2MwungW28dxhOKVWRQtiFNCQrfk3S.jpg', '2023-12-23 08:09:21', '2023-12-23 08:09:21');

-- --------------------------------------------------------

--
-- Table structure for table `common_shop_offers`
--

CREATE TABLE `common_shop_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `offer_name` varchar(255) NOT NULL,
  `offer_code` varchar(255) NOT NULL,
  `offer_start_date` date NOT NULL,
  `offer_end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `created_at`, `updated_at`) VALUES
(1, 'India', NULL, NULL),
(2, 'UAE', '2023-11-27 12:50:45', '2023-11-27 12:50:45'),
(3, 'Nepal', '2023-11-27 12:51:09', '2023-11-27 12:51:09');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `district_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `state_id`, `district_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Kochi', NULL, NULL),
(2, 1, 'Malapuram', '2023-11-27 13:01:18', '2023-11-27 13:01:18'),
(6, 1, 'Thrissur', '2023-12-23 06:30:19', '2023-12-23 06:30:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2023_07_26_204546_create_jobs_table', 1),
(5, '2023_08_26_211903_create_products_table', 1),
(6, '2023_10_07_173646_create_countries_table', 1),
(7, '2023_10_07_173919_create_states_table', 1),
(8, '2023_10_07_174520_create_districts_table', 1),
(10, '2023_12_19_075059_shops_table', 2),
(12, '2023_12_19_081311_create_branches_table', 3),
(13, '2023_12_19_083105_create_offers_table', 4),
(14, '2023_12_19_083334_create_offers_images_table', 5),
(15, '2023_12_19_083559_create_useroverviews_table', 6),
(16, '2023_12_19_084239_create_products_shop_table', 7),
(28, '2023_11_15_185620_create_offers_table', 2),
(39, '2023_12_22_060822_create_common_shop_offers_table', 8),
(40, '2023_12_22_061458_create_common_shop_images_table', 8),
(59, '2014_10_12_000000_create_users_table', 3),
(60, '2014_10_12_100000_create_password_resets_table', 3),
(61, '2019_08_19_000000_create_failed_jobs_table', 3),
(62, '2023_07_26_204546_create_jobs_table', 3),
(63, '2023_08_26_210915_create_shops_table', 3),
(64, '2023_08_26_211903_create_products_table', 3),
(65, '2023_08_28_061321_create_products_shop_table', 3),
(66, '2023_10_05_175858_create_tab_offers_table', 3),
(67, '2023_10_07_173646_create_countries_table', 3),
(68, '2023_10_07_173919_create_states_table', 3),
(69, '2023_10_07_174520_create_districts_table', 3),
(70, '2023_10_07_174741_create_offer_images_table', 3),
(71, '2023_11_15_185354_create_branches_table', 3),
(72, '2023_11_15_190831_create_offers_table', 4),
(76, '2023_12_02_071811_user_overview_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `offer_name` varchar(255) NOT NULL,
  `offer_code` varchar(255) NOT NULL,
  `offer_start_date` date NOT NULL,
  `offer_end_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `offer_images`
--

CREATE TABLE `offer_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_id` bigint(20) UNSIGNED NOT NULL,
  `offer_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_code` varchar(100) NOT NULL,
  `details` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_code`, `details`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'pppppp', 'ppppp', 'pppppp', 'prod_images/DvEwXxYkXBsKrTf8mEpfaCACnAf7U1EBf9pXPomO.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products_shop`
--

CREATE TABLE `products_shop` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` bigint(20) UNSIGNED NOT NULL,
  `offer_start_date` varchar(255) NOT NULL,
  `offer_end_date` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `state_id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `shop_logo` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address_line_1` varchar(255) NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `country_id`, `state_id`, `district_id`, `shop_name`, `shop_logo`, `details`, `location`, `city`, `address_line_1`, `post_code`, `state`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'Nesto', 'media/shop_logo/tpZ80JXrHRZj7ihOigPtsCj1fYMlpHVlB7SddZ5G.jpg', 'Nesto Thrissur', 'Thrissur', 'Thrissur', 'Thrissur, Punkunnam', '123', 'Kerala', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `state_name` varchar(255) NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `state_name`, `country_id`, `created_at`, `updated_at`) VALUES
(1, 'Kerala', 1, NULL, '2023-12-23 06:30:35'),
(2, 'Tamil Nadu', 1, '2023-11-27 12:50:27', '2023-11-27 12:50:27'),
(3, 'Dubai', 2, '2023-11-27 13:51:53', '2023-11-27 13:51:53'),
(4, 'Abu Dhabi', 2, '2023-11-27 13:52:12', '2023-11-27 13:52:12');

-- --------------------------------------------------------

--
-- Table structure for table `useroverviews`
--

CREATE TABLE `useroverviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` bigint(20) UNSIGNED NOT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `shop_count` bigint(20) NOT NULL,
  `branch_count` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `useroverviews`
--

INSERT INTO `useroverviews` (`id`, `user_id`, `shop_id`, `branch_id`, `shop_count`, `branch_count`, `created_at`, `updated_at`) VALUES
(3, 1, 1, 1, 86, 1, '2023-12-02 02:53:48', '2023-12-23 09:01:57'),
(4, 1, 2, 1, 17, 1, '2023-12-02 03:02:01', '2023-12-05 17:48:54'),
(5, 1, 4, 1, 7, 1, '2023-12-02 03:24:25', '2023-12-07 07:15:47'),
(6, 1, 3, 1, 3, 1, '2023-12-02 03:27:17', '2023-12-05 17:38:46'),
(7, 1, 9, 1, 8, 1, '2023-12-05 17:07:39', '2023-12-12 19:10:03'),
(8, 1, 6, 1, 4, 1, '2023-12-05 17:38:58', '2023-12-05 22:48:26'),
(9, 1, 5, 1, 1, 1, '2023-12-05 17:40:55', '2023-12-05 17:40:55'),
(10, 1, 8, 1, 2, 1, '2023-12-05 17:41:06', '2023-12-05 22:48:19'),
(11, 1, 7, 1, 5, 1, '2023-12-05 22:48:24', '2023-12-11 15:00:58'),
(12, 1, 10, 1, 2, 1, '2023-12-12 07:45:50', '2023-12-12 19:02:24'),
(13, 1, 11, 1, 14, 1, '2023-12-12 18:47:50', '2023-12-12 19:51:45'),
(14, 1, 12, 1, 26, 1, '2023-12-12 20:16:04', '2023-12-17 13:24:25'),
(15, 1, 13, 1, 1, 1, '2023-12-17 08:26:39', '2023-12-17 08:26:39');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'anas', 'anas@gmail.com', NULL, '$2y$10$1ODoc0rk.OzRpa5AtzcXZuz6rmPFweEKidF07fVtKs78JGAbiL7MO', '2yDbYLgQsmlkoR8sfHhbylzZzhn6qWu70iY3EYuMify9FcJSpvQquoJ7U89M', '2023-11-16 00:32:50', '2023-11-16 00:32:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `district_id` (`district_id`),
  ADD KEY `shop_id` (`shop_id`);

--
-- Indexes for table `common_shop_images`
--
ALTER TABLE `common_shop_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `common_shop_images_offer_id_foreign` (`offer_id`);

--
-- Indexes for table `common_shop_offers`
--
ALTER TABLE `common_shop_offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `common_shop_offers_shop_id_foreign` (`shop_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_state_id_foreign` (`state_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offers_shop_id_foreign` (`shop_id`),
  ADD KEY `offers_branch_id_foreign` (`branch_id`);

--
-- Indexes for table `offer_images`
--
ALTER TABLE `offer_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `offer_images_offer_id_foreign` (`offer_id`);

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
  ADD UNIQUE KEY `products_product_code_unique` (`product_code`);

--
-- Indexes for table `products_shop`
--
ALTER TABLE `products_shop`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_shop_product_id_foreign` (`product_id`),
  ADD KEY `products_shop_shop_id_foreign` (`shop_id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`),
  ADD KEY `state_id` (`state_id`),
  ADD KEY `district_id` (`district_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `useroverviews`
--
ALTER TABLE `useroverviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `useroverviews_shop_id_foreign` (`shop_id`),
  ADD KEY `useroverviews_branch_id_foreign` (`branch_id`),
  ADD KEY `useroverviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `offer_images`
--
ALTER TABLE `offer_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products_shop`
--
ALTER TABLE `products_shop`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `useroverviews`
--
ALTER TABLE `useroverviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `branches`
--
ALTER TABLE `branches`
  ADD CONSTRAINT `branches_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `branches_ibfk_2` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`),
  ADD CONSTRAINT `branches_ibfk_3` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`),
  ADD CONSTRAINT `branches_ibfk_4` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`);

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_state_id_foreign` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `offers_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `offer_images`
--
ALTER TABLE `offer_images`
  ADD CONSTRAINT `offer_images_offer_id_foreign` FOREIGN KEY (`offer_id`) REFERENCES `offers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products_shop`
--
ALTER TABLE `products_shop`
  ADD CONSTRAINT `products_shop_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_shop_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shops`
--
ALTER TABLE `shops`
  ADD CONSTRAINT `shops_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `shops_ibfk_2` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`),
  ADD CONSTRAINT `shops_ibfk_3` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`);

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `useroverviews`
--
ALTER TABLE `useroverviews`
  ADD CONSTRAINT `useroverviews_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `useroverviews_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `useroverviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
