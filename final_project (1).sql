-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2025 at 09:10 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_nopad_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`id`, `name`, `price`, `restaurant_id`, `description`, `created_at`, `updated_at`, `image`) VALUES
(1, 'Original Recipe Chicken', 12.50, 1, 'دجاج مقلي بطريقة أصلية لذيذة مع توابل سرية.', '2025-10-26 18:14:03', '2025-10-26 18:14:03', 'download (3).jpg'),
(2, 'Original Recipe Chicken', 3.50, 1, 'بطاطه مقرمشه.', '2025-10-26 18:26:20', '2025-10-26 18:26:20', 'download (4).jpg'),
(3, 'Original Recipe Chicken', 6.99, 1, 'قطع دجاج مقلي بتتبيلة KFC الأصلية.', '2025-10-27 18:33:05', '2025-10-27 18:33:05', 'download (3).jpg'),
(4, 'Zinger Burger', 5.50, 1, 'برغر دجاج مقرمش مع صوص حار وخس طازج.', '2025-10-27 18:33:05', '2025-10-27 18:33:05', 'download (5).jpg'),
(5, 'French Fries', 2.00, 1, 'بطاطا مقلية ذهبية مقرمشة.', '2025-10-27 18:33:05', '2025-10-27 18:33:05', 'download (4).jpg\n'),
(6, 'Twister Wrap', 4.75, 1, 'راب دجاج لذيذ بصلصة المايونيز والخس.', '2025-10-27 18:33:05', '2025-10-27 18:33:05', 'download (3).jpg'),
(7, 'Big Mac', 5.99, 2, 'برغر مزدوج مع صوص البيغ ماك المميز.', '2025-10-27 18:33:06', '2025-10-27 18:33:06', 'download (1).jpg'),
(8, 'McChicken', 4.50, 2, 'ساندويش دجاج شهي مع مايونيز وخس.', '2025-10-27 18:33:06', '2025-10-27 18:33:06', 'download (5).jpg\n'),
(9, 'Cheeseburger', 2.50, 2, 'برغر كلاسيكي مع الجبن الأمريكي.', '2025-10-27 18:33:06', '2025-10-27 18:33:06', 'download (1).jpg\n'),
(10, 'بيتزا علفحم', 3.00, 2, 'بيتزا لذيذه', '2025-10-27 18:33:06', '2025-10-27 18:33:06', 'download (2).jpg'),
(11, 'Pepperoni Pizza', 8.99, 3, 'بيتزا ببيروني مع جبنة موزاريلا و صوص الطماطم.', '2025-10-27 18:33:06', '2025-10-27 18:33:06', 'download (2).jpg'),
(12, 'Margherita Pizza', 7.50, 3, 'بيتزا كلاسيكية بجبنة الموزاريلا وريحان طازج.', '2025-10-27 18:33:06', '2025-10-27 18:33:06', 'download (2).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_10_22_192259_create_restaurants_table', 2),
(6, '2025_10_22_192317_create_dishes_table', 2),
(7, '2025_10_22_192332_create_orders_table', 2),
(8, '2025_10_24_130154_add_image_to_restaurants_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `restaurant_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `status` enum('pending','completed','canceled') NOT NULL DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dish_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `restaurant_id`, `total_price`, `status`, `notes`, `created_at`, `updated_at`, `dish_id`) VALUES
(1, 1, 1, 25.50, 'pending', 'No onions, please', '2025-10-27 19:36:22', '2025-10-27 19:36:22', 1),
(2, 2, 1, 40.00, 'pending', 'Extra spicy', '2025-10-27 19:36:22', '2025-10-27 19:36:22', 2),
(3, 1, 1, 25.50, 'pending', 'No onions, please', '2025-10-27 19:47:23', '2025-10-27 19:47:23', 3),
(4, 2, 1, 20.00, 'pending', 'Extra spicy', '2025-10-27 19:47:23', '2025-10-27 19:47:23', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`id`, `name`, `location`, `description`, `image`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'KFC', 'Amman, Jordan', 'Fast delivery restaurant serving a variety of dishes.', 'download (1).jpg', '0788111102', '2025-10-24 09:45:59', '2025-10-24 09:45:59'),
(2, 'Pizza Hut', 'irbd, Jordan', 'Fast delivery restaurant serving a variety of dishes.', 'download (2).jpg', '0123321123', '2025-10-24 09:59:35', '2025-10-24 09:59:35'),
(3, 'شورما على الحطب', 'irbd, Jordan', 'شورما على الفحم بسرعه ولذيذه', 'download.png', '498722210', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'KFC', 'عمان - الصويفية', 'مطعم متخصص في تقديم الدجاج المقلي المقرمش بتتبيلة سرية مشهورة حول العالم.', 'download (1).jpg', '0791234567', '2025-10-27 18:45:23', '2025-10-27 18:45:23'),
(5, 'McDonald\'s', 'عمان - عبدون', 'أشهر مطعم وجبات سريعة في العالم، يقدم البرغر والبطاطا والمشروبات الغازية.', 'download.jpg', '0797654321', '2025-10-27 18:45:23', '2025-10-27 18:45:23');

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
(1, 'rabie', 'raao14@gmail.com', NULL, '$2y$10$FTvsDUTbrCTaskqZx4qRE.HQGm1EccaLQfC9sRr8JTe6kMAK3v1VO', NULL, '2025-10-24 09:40:35', '2025-10-24 09:40:35'),
(2, 'Rabea', 'rabea@example.com', NULL, '$2y$10$wPK4MkoSCAucA55Wq5ZldOi3clJ97sw4BwG4Xn.J65fzk2cvcoPiC', NULL, '2025-10-26 17:32:35', '2025-10-26 17:32:35'),
(3, 'rabea', 'rabea@gmail.com', NULL, '$2y$10$S4iA1/3Ney59PyjPXGOFU.RisQ2EF16jeOYiEe3kyf.ZTrd2mbrly', NULL, '2025-10-27 16:52:27', '2025-10-27 16:52:27'),
(4, 'rabe', 'rabe@gmail.com', NULL, '$2y$10$wOxp3RdkyryNAiFJWH9pYepdmjysOpO/tyOrbbU3srsSskqtg73S6', NULL, '2025-10-27 16:53:45', '2025-10-27 16:53:45'),
(5, 'rabee', 'rabee@gmail.com', NULL, '$2y$10$dy2ngJRTtpRuPRf9mOXTiucTKyg6rmJuOcTSBeUw96lUsXJDEog1u', NULL, '2025-10-27 16:56:09', '2025-10-27 16:56:09'),
(6, 'rabbb', 'rabeee@gmail.com', NULL, '$2y$10$hK7Zi6wtwUGE.EI3o4G0Tuo5g/SCwYg4lw24Y3doDSLMQBSIABf9S', NULL, '2025-10-27 17:00:31', '2025-10-27 17:00:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dishes_restaurant_id_foreign` (`restaurant_id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_restaurant_id_foreign` (`restaurant_id`);

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
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `dishes`
--
ALTER TABLE `dishes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dishes`
--
ALTER TABLE `dishes`
  ADD CONSTRAINT `dishes_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_restaurant_id_foreign` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurants` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
