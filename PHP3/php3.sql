-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 03, 2024 lúc 09:49 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php3`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'áo thun', 'Et distinctio consequuntur provident cupiditate aut sit.', NULL, '2024-05-23 22:52:56', '2024-05-23 22:52:56'),
(2, 'áo khoác', 'Tempore distinctio aut consequatur amet veniam.', NULL, '2024-05-23 22:52:56', '2024-05-23 22:52:56'),
(3, 'quần ngắn', 'Eum dolorum aut dolorum sunt impedit quis.', NULL, '2024-05-23 22:52:56', '2024-05-23 22:52:56'),
(4, 'quần dài', 'Cum facere illum libero beatae enim repellat.', NULL, '2024-05-23 22:52:56', '2024-05-23 22:52:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_05_13_080149_create_categories_table', 1),
(6, '2024_05_13_080516_create_products_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `sold` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `view` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `description`, `price`, `quantity`, `sold`, `view`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'illo', 'sp5.png', '12', 601.00, 33, 59, 69, 3, '2024-05-23 22:53:00', '2024-05-28 09:41:49'),
(2, 'labore', 'sp2.png', 'Earum sint tempore enim praesentium dolores aut nostrum.', 706.64, 12, 61, 70, 4, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(3, 'atque', 'sp7.png', 'Quis quia consequuntur repellat consequatur modi laboriosam rerum omnis.', 997.17, 2, 28, 14, 2, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(4, 'fugit', 'sp9.png', 'Et suscipit veniam excepturi ducimus.', 134.46, 42, 51, 60, 4, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(5, 'totam', 'sp6.png', 'Voluptatum eaque delectus excepturi ea.', 441.68, 69, 44, 2, 1, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(6, 'libero', 'sp9.png', 'Illo quia aut voluptates neque quia.', 302.07, 1, 92, 14, 2, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(7, 'enim', 'sp8.png', 'Nesciunt occaecati sed et qui.', 500.79, 92, 40, 80, 1, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(8, 'corporis', 'sp6.png', 'Ut necessitatibus provident ut dolor sit.', 375.88, 56, 23, 18, 2, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(9, 'culpa', 'sp9.png', 'Fuga officia adipisci sit autem.', 859.33, 60, 66, 95, 4, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(10, 'dolores', 'sp3.png', 'Porro dolore libero similique est quas accusantium sit.', 353.24, 49, 100, 69, 2, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(11, 'ratione', 'sp2.png', 'Labore ut et earum laboriosam ab magni ducimus.', 978.83, 21, 2, 23, 3, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(12, 'dolor', 'sp6.png', 'Eos necessitatibus ex voluptatem qui et.', 36.90, 29, 13, 51, 4, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(13, 'commodi', 'sp2.png', 'Quia et laboriosam similique ratione nisi sit voluptas.', 476.82, 53, 46, 19, 3, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(14, 'harum', 'sp8.png', 'Tenetur dolores nulla ea voluptatem.', 407.88, 16, 51, 77, 4, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(15, 'libero', 'sp2.png', 'Odio omnis aut et.', 703.95, 97, 56, 85, 2, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(16, 'et', 'sp3.png', 'Excepturi eligendi illum totam aut at qui.', 891.92, 71, 76, 22, 2, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(17, 'et', 'sp10.png', 'Architecto iste nam eos ut et officia quam totam.', 766.07, 88, 100, 16, 4, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(18, 'sunt', 'sp8.png', 'Aspernatur nemo id est vel vero magnam.', 613.04, 68, 2, 50, 1, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(19, 'deserunt', 'sp3.png', 'Quas perspiciatis et maiores maxime minus nobis ad.', 57.32, 82, 83, 3, 4, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(20, 'sed', 'sp4.png', 'Vitae eius et voluptas dicta at delectus.', 613.02, 69, 1, 94, 4, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(21, 'sed', 'sp5.png', 'Commodi dolore soluta beatae iure eius.', 82.46, 3, 78, 50, 2, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(22, 'et', 'sp2.png', 'Ducimus laborum amet in veniam.', 953.61, 39, 50, 83, 4, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(23, 'aut', 'sp1.png', 'Veritatis alias atque quis ad sequi accusamus praesentium.', 328.78, 50, 87, 3, 1, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(24, 'fuga', 'sp8.png', 'Et aperiam voluptas nihil deserunt est velit.', 115.39, 90, 96, 5, 3, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(25, 'accusantium', 'sp10.png', 'Animi totam reiciendis cum doloremque amet tempore magnam.', 660.72, 14, 3, 21, 3, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(26, 'dolorem', 'sp10.png', 'Ut eum consectetur mollitia nostrum.', 354.07, 51, 89, 98, 1, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(27, 'accusantium', 'sp1.png', 'Qui id sunt qui dicta dolorum.', 20.46, 97, 14, 73, 1, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(28, 'sunt', 'sp9.png', 'Placeat qui accusantium nisi asperiores.', 570.35, 71, 38, 76, 2, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(29, 'voluptatem', 'sp4.png', 'Corrupti natus nobis facilis dolores voluptas.', 151.67, 40, 73, 80, 2, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(30, 'doloremque', 'sp3.png', 'Aperiam quaerat ut eos tempore et consequatur vitae.', 128.25, 55, 98, 35, 3, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(31, 'quis', 'sp2.png', 'Et aut occaecati nam a nihil.', 599.49, 42, 28, 16, 1, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(32, 'id', 'sp1.png', 'Eveniet nemo sequi sequi.', 838.16, 48, 94, 23, 2, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(33, 'eum', 'sp10.png', 'Saepe nulla repellat qui dolores voluptates.', 744.60, 80, 97, 67, 3, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(34, 'et', 'sp8.png', 'Animi nostrum dolorem voluptatem et.', 451.38, 5, 52, 97, 1, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(35, 'aut', 'sp3.png', 'Eos odio laudantium corrupti sequi ipsa.', 248.54, 58, 95, 44, 3, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(36, 'fugiat', 'sp6.png', 'Iusto nemo nesciunt similique.', 53.99, 84, 25, 43, 3, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(37, 'quis', 'sp7.png', 'At et rerum modi ab.', 746.60, 98, 46, 48, 4, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(38, 'quia', 'sp8.png', 'Eveniet id ex enim fugit temporibus aut.', 960.38, 78, 62, 53, 1, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(39, 'id', 'sp1.png', 'Sed natus aut quae neque deleniti tempora.', 200.73, 40, 20, 81, 4, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(40, 'eligendi', 'sp7.png', 'Debitis repudiandae animi perferendis explicabo.', 849.93, 58, 52, 74, 3, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(41, 'doloremque', 'sp5.png', 'Vero alias fuga rerum fuga molestiae.', 10.41, 28, 11, 61, 3, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(42, 'voluptas', 'sp1.png', 'Occaecati odio voluptatem voluptatem aut.', 840.12, 19, 85, 84, 1, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(43, 'aspernatur', 'sp6.png', 'Magnam aut asperiores voluptatem veniam.', 717.20, 22, 51, 47, 2, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(44, 'rem', 'sp2.png', 'Omnis quo sed ut error.', 971.19, 16, 11, 29, 4, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(45, 'illo', 'sp4.png', 'Qui possimus similique aut quod non mollitia amet occaecati.', 269.55, 76, 72, 59, 1, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(46, 'perspiciatis', 'sp8.png', 'Illo sit modi enim debitis qui.', 278.49, 51, 73, 17, 1, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(47, 'quibusdam', 'sp10.png', 'Accusantium quis magni corporis ipsam ipsam.', 107.15, 27, 38, 6, 4, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(48, 'quidem', 'sp6.png', 'Ipsum modi provident minima eos.', 833.03, 9, 67, 94, 4, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(49, 'voluptas', 'sp4.png', 'Modi aut distinctio sunt dolorum.', 82.95, 80, 49, 94, 2, '2024-05-23 22:53:00', '2024-05-23 22:53:00'),
(50, 'saepe', 'img/PlN3LJTDYg2fuKoiAXsR7001Ii1pH4S6V3VHuiSW.webp', 'â', 195.00, 100, 91, 75, 4, '2024-05-23 22:53:00', '2024-05-27 01:54:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
