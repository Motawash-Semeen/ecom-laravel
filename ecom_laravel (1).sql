-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2023 at 07:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecom_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` text NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '2023-09-19 10:42:37', '$2y$10$VtX9owuhRyQP4btWquTb9eDoNd93dpC5JYr49Ox1sK/x474gnKKG.', 'HT58iIKIiXe6WxFJ7zrJiVfdlScj2cyZdF9s7YQnFZpuuOIdFjB4lJUpFzAd', NULL, '1695625523profile-image.png', '2023-09-19 10:42:37', '2023-09-25 09:34:49');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_name_bn` varchar(255) DEFAULT NULL,
  `brand_slug` varchar(255) NOT NULL,
  `brand_slug_bn` varchar(255) DEFAULT NULL,
  `brand_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_name_bn`, `brand_slug`, `brand_slug_bn`, `brand_image`, `created_at`, `updated_at`) VALUES
(6, 'Samsung', 'স্যামসাং', 'samsung', 'স্যামসাং', '1696006594_brand_img.png', '2023-09-29 10:56:35', '2023-09-29 10:56:35'),
(8, 'Huawei', 'হুয়াওয়ে', 'huawei', 'হুয়াওয়ে', '1696006691_brand_img.png', '2023-09-29 10:58:11', '2023-09-29 10:58:11'),
(9, 'Oppo', 'অপো', 'oppo', 'অপো', '1696006724_brand_img.png', '2023-09-29 10:58:45', '2023-09-29 10:58:45'),
(10, 'Vivo', 'ভিভো', 'vivo', 'ভিভো', '1696006754_brand_img.png', '2023-09-29 10:59:14', '2023-09-29 10:59:14'),
(11, 'Xiaomi', 'শাওমি', 'xiaomi', 'শাওমি', '1696006802_brand_img.png', '2023-09-29 11:00:02', '2023-09-29 11:00:02'),
(12, 'Apple', 'আপেল', 'apple', 'আপেল', '1696007001_brand_img.png', '2023-09-29 11:03:21', '2023-09-29 11:03:21'),
(14, 'HP', 'এইচপি', 'hp', 'এইচপি', '1696403558_brand_img.png', '2023-10-04 01:12:39', '2023-10-04 01:12:39'),
(15, 'No Brand', 'কোন ব্র্যান্ড নেই', 'no-brand', 'কোন-ব্র্যান্ড-নেই', '1697737192_brand_img.png', '2023-10-19 11:39:52', '2023-10-19 11:39:52'),
(16, 'Canon', 'ক্যানন', 'canon', 'ক্যানন', '1697739351_brand_img.png', '2023-10-19 12:15:51', '2023-10-19 12:15:51');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `category_name_bn` varchar(255) NOT NULL,
  `category_slug_bn` varchar(255) NOT NULL,
  `category_icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `category_name_bn`, `category_slug_bn`, `category_icon`, `created_at`, `updated_at`) VALUES
(11, 'Electronics', 'electronics', 'ইলেকট্রনিক্স', 'ইলেকট্রনিক্স', 'fa fa-laptop', '2023-09-30 00:40:13', '2023-10-19 07:09:38'),
(12, 'Health and Beauty', 'health-and-beauty', 'স্বাস্থ্য এবং সৌন্দর্য', 'স্বাস্থ্য-এবং-সৌন্দর্য', 'fa fa-heartbeat', '2023-09-30 00:41:26', '2023-10-19 07:11:01'),
(13, 'Sports and Outdoor', 'sports-and-outdoor', 'খেলাধুলা এবং আউটডোর', 'খেলাধুলা-এবং-আউটডোর', 'fa fa-futbol-o', '2023-09-30 00:42:28', '2023-10-19 07:13:51'),
(14, 'Home Appliance', 'home-appliance', 'গৃহস্থালি জিনিসপত্র', 'গৃহস্থালি-জিনিসপত্র', 'fas fa-laptop-house', '2023-09-30 00:43:13', '2023-10-19 07:18:48'),
(15, 'Women\'s Fashion', 'womens-fashion', 'মহিলাদের ফ্যাশন', 'মহিলাদের-ফ্যাশন', 'fa-solid fa-person-dress', '2023-09-30 00:45:36', '2023-10-19 01:06:36'),
(16, 'Men\'s Fashion', 'mens-fashion', 'পুরুষদের ফ্যাশন', 'পুরুষদের-ফ্যাশন', 'fa-solid fa-person', '2023-09-30 00:46:16', '2023-10-19 01:06:20');

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
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(10, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2023_09_19_144359_create_sessions_table', 1),
(14, '2023_09_19_155729_create_admins_table', 1),
(15, '2023_09_28_151021_create_brands_table', 2),
(16, '2023_09_29_185705_create_categories_table', 3),
(17, '2023_09_30_065353_create_sub_categories_table', 4),
(18, '2023_09_30_153144_create_sub_sub_categories_table', 5),
(19, '2023_10_01_072000_create_products_table', 6),
(20, '2023_10_01_073507_create_multi_imgs_table', 6),
(21, '2023_10_04_171513_create_sliders_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

CREATE TABLE `multi_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(10, 6, '1696403964-product-secondary.png', '2023-10-04 01:19:25', '2023-10-04 01:19:25'),
(11, 6, '1696403965-product-secondary.jpg', '2023-10-04 01:19:25', '2023-10-04 01:19:25'),
(12, 6, '1696403965-product-secondary.png', '2023-10-04 01:19:25', '2023-10-04 01:19:25'),
(13, 7, '1696431837-product-secondary.jpg', '2023-10-04 09:03:58', '2023-10-04 09:03:58'),
(14, 7, '1697379784-product-secondary.png', '2023-10-04 09:03:58', '2023-10-15 08:23:04'),
(20, 8, '1697738999-product-secondary.jpeg', '2023-10-19 12:09:59', '2023-10-19 12:09:59'),
(21, 8, '1697738999-product-secondary.jpeg', '2023-10-19 12:09:59', '2023-10-19 12:09:59'),
(22, 9, '1697740187-product-secondary.jpeg', '2023-10-19 12:29:47', '2023-10-19 12:29:47'),
(23, 9, '1697740187-product-secondary.jpeg', '2023-10-19 12:29:47', '2023-10-19 12:29:47'),
(24, 10, '1697741018-product-secondary.jpeg', '2023-10-19 12:43:39', '2023-10-19 12:43:39'),
(25, 11, '1697781230-product-secondary.jpg', '2023-10-19 23:53:50', '2023-10-19 23:53:50');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('test@gmail.com', '$2y$10$me0ytjwZ2anrWTd.iI3LU.Kh2J270tDfy5EAaEesKIP1szxZmbyE6', '2023-09-27 09:43:24'),
('user@gmail.com', '$2y$10$7ghPTn1hN2tpyW9I5BRfVed24fsnZCHSItjlLV2E23VJDKfe61b72', '2023-09-26 12:19:58');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_id` int(11) NOT NULL,
  `product_name_en` varchar(255) NOT NULL,
  `product_name_bn` varchar(255) NOT NULL,
  `product_slug_en` varchar(255) NOT NULL,
  `product_slug_bn` varchar(255) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `product_qty` varchar(255) NOT NULL,
  `product_tags_en` varchar(255) NOT NULL,
  `product_tags_bn` varchar(255) DEFAULT NULL,
  `product_size_en` varchar(255) DEFAULT NULL,
  `product_size_bn` varchar(255) DEFAULT NULL,
  `product_color_en` varchar(255) NOT NULL,
  `product_color_bn` varchar(255) NOT NULL,
  `selling_price` varchar(255) NOT NULL,
  `discount_price` varchar(255) DEFAULT NULL,
  `offer_exp` int(11) DEFAULT NULL,
  `short_descp_en` text NOT NULL,
  `short_descp_bn` text NOT NULL,
  `long_descp_en` text NOT NULL,
  `long_descp_bn` text NOT NULL,
  `product_thambnail` varchar(255) NOT NULL,
  `hot_deals` int(11) DEFAULT 0,
  `featured` int(11) DEFAULT 0,
  `special_offer` int(11) DEFAULT 0,
  `special_deals` int(11) DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `product_name_en`, `product_name_bn`, `product_slug_en`, `product_slug_bn`, `product_code`, `product_qty`, `product_tags_en`, `product_tags_bn`, `product_size_en`, `product_size_bn`, `product_color_en`, `product_color_bn`, `selling_price`, `discount_price`, `offer_exp`, `short_descp_en`, `short_descp_bn`, `long_descp_en`, `long_descp_bn`, `product_thambnail`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `status`, `created_at`, `updated_at`) VALUES
(6, 14, 11, 8, 3, 'HP ENVY 13-ba1047wm', 'HP ENVY 13-ba1047wm', 'hp-envy-13-ba1047wm', 'hp-envy-13-ba1047wm', 'ba1047wm', '7', 'hp laptop,laptop,traditional latop', 'এইচপি ল্যাপটপ,ল্যাপটপ', '15\"', '১৫\"', 'white', 'সাদা', '85000', '12', NULL, 'HP ENVY 13-ba1047wm Intel Core i5 11th Gen - 8GB RAM - 256GB SSD - 13.3 Inch HD Laptop - Silver', 'HP ENVY 13-ba1047wm Intel Core i5 11th Gen - 8GB RAM - 256GB SSD - 13.3 ইঞ্চি HD ল্যাপটপ - সিলভার', '<h2><strong>Description</strong></h2>\r\n\r\n<p>The HP ENVY 13-ba1047wm is a thin and light laptop that is perfect for students, professionals, and anyone who wants a powerful and portable computer. It has an 11th Gen Intel Core i5 processor, 8GB of RAM, and a 256GB SSD, which can handle even the most demanding tasks. The laptop also has a 13.3-inch HD display, backlit keyboard, and fingerprint reader for added security.</p>', '<p><strong>বর্ণনা</strong></p>\r\n\r\n<p><br />\r\nHP ENVY 13-ba1047wm হল একটি পাতলা এবং হালকা ল্যাপটপ যা ছাত্র, পেশাদার এবং যারা একটি শক্তিশালী এবং বহনযোগ্য কম্পিউটার চান তাদের জন্য উপযুক্ত। এটিতে একটি 11th Gen Intel Core i5 প্রসেসর, 8GB RAM এবং একটি 256GB SSD রয়েছে, যা এমনকি সবচেয়ে চাহিদাপূর্ণ কাজগুলিও পরিচালনা করতে পারে৷ অতিরিক্ত নিরাপত্তার জন্য ল্যাপটপটিতে একটি 13.3-ইঞ্চি এইচডি ডিসপ্লে, ব্যাকলিট কীবোর্ড এবং ফিঙ্গারপ্রিন্ট রিডার রয়েছে।</p>', '1696403964-product-img.jpg', 1, 0, 1, 1, 1, '2023-10-04 01:19:24', '2023-10-04 10:24:45'),
(7, 6, 11, 10, 5, 'Samsung Galaxy F23 5G-6GB/128GB smartphone', 'Samsung Galaxy F23 5G-6GB/128GB smartphone', 'samsung-galaxy-f23-5g-6gb/128gb-smartphone', 'samsung-galaxy-f23-5g-6gb/128gb-smartphone', 'F23 5G-6GB/128GB', '51', 'samsung,samsung f23', 'samsung,samsung f23', '6\"', '6\"', 'black', 'কালো', '30000', '5', NULL, 'Samsung, the South Korean tech giant, has been one of the most innovative companies in the smartphone industry. With a wide range of devices, it caters to the needs of different users.\r\n\r\nOne of its latest offerings is the Samsung Galaxy F23 5G, a mid-range device with some impressive features. In this review, we will take a detailed look at the device and evaluate its performance in different aspects.', 'Samsung Galaxy F23 5G বৈশিষ্ট্য:\r\n\r\n- হালকা নীল এবং গভীর সবুজে মসৃণ নকশা\r\n- 120Hz রিফ্রেশ রেট এবং কর্নিং গরিলা গ্লাস 5 সুরক্ষা সহ 6.6-ইঞ্চি FHD+ U ডিসপ্লে\r\n- Qualcomm Snapdragon 750G প্রসেসর দ্বারা চালিত\r\n- 6GB RAM এবং 128GB স্টোরেজ, মাইক্রোএসডি সহ 1TB পর্যন্ত বাড়ানো যায়\r\n- বেশিরভাগ কাজ পরিচালনা করতে সক্ষম, ভারী গেমিংয়ের জন্য সুপারিশ করা হয় না\r\n- পিছনে কোয়াড-ক্যামেরা সেটআপ: 50MP প্রাথমিক, 8MP আল্ট্রা-ওয়াইড, 2MP ম্যাক্রো এবং 2MP গভীরতা সেন্সর\r\n- সেলফির জন্য 13MP ফ্রন্ট-ফেসিং ক্যামেরা\r\n- 25W দ্রুত চার্জিং সহ 5000mAh ব্যাটারি\r\n- One UI 4.1 সহ Android 12 এ চলে\r\n- Samsung Pay, Bixby, এবং Samsung DeX এর মতো বৈশিষ্ট্যগুলি অফার করে৷\r\n- গ্যাজেট এবং গিয়ারের মাধ্যমে বাংলাদেশে একটি দুর্দান্ত মূল্যে উপলব্ধ\r\n- এর দামের জন্য দুর্দান্ত মান\r\n\r\nঅনুগ্রহ করে লক্ষ্য করুন যে মূল পাঠে উল্লিখিত রঙের বিকল্পগুলি (অ্যাকোয়া ব্লু, ফরেস্ট গ্রিন এবং ডাস্কি পিঙ্ক) স্বচ্ছতার জন্য এই সংক্ষিপ্ত সংস্করণে হালকা নীল এবং গভীর সবুজে সরলীকৃত করা হয়েছে।', '<h2><strong>Samsung Galaxy F23 5G Features:</strong></h2>\r\n\r\n<p>- Sleek design in Light Blue and Deep Green<br />\r\n- 6.6-inch FHD+ U display with 120Hz refresh rate and Corning Gorilla Glass 5 protection<br />\r\n- Powered by Qualcomm Snapdragon 750G processor<br />\r\n- 6GB of RAM and 128GB of storage, expandable up to 1TB with microSD<br />\r\n- Capable of handling most tasks, not recommended for heavy gaming<br />\r\n- Quad-camera setup on the back: 50MP primary, 8MP ultra-wide, 2MP macro, and 2MP depth sensors<br />\r\n- 13MP front-facing camera for selfies<br />\r\n- 5000mAh battery with 25W fast charging<br />\r\n- Runs on Android 12 with One UI 4.1<br />\r\n- Offers features like Samsung Pay, Bixby, and Samsung DeX<br />\r\n- Available in Bangladesh at a great price through Gadget and Gear<br />\r\n- Great value for its price</p>\r\n\r\n<p>Please note that the color options mentioned in the original text (Aqua Blue, Forest Green, and Dusky Pink) have been simplified to Light Blue and Deep Green in this shortened version for clarity.</p>', '<h2><strong>Samsung Galaxy F23 5G বৈশিষ্ট্য:</strong></h2>\r\n\r\n<p>- হালকা নীল এবং গভীর সবুজে মসৃণ নকশা<br />\r\n- 120Hz রিফ্রেশ রেট এবং কর্নিং গরিলা গ্লাস 5 সুরক্ষা সহ 6.6-ইঞ্চি FHD+ U ডিসপ্লে<br />\r\n- Qualcomm Snapdragon 750G প্রসেসর দ্বারা চালিত<br />\r\n- 6GB RAM এবং 128GB স্টোরেজ, মাইক্রোএসডি সহ 1TB পর্যন্ত বাড়ানো যায়<br />\r\n- বেশিরভাগ কাজ পরিচালনা করতে সক্ষম, ভারী গেমিংয়ের জন্য সুপারিশ করা হয় না<br />\r\n- পিছনে কোয়াড-ক্যামেরা সেটআপ: 50MP প্রাথমিক, 8MP আল্ট্রা-ওয়াইড, 2MP ম্যাক্রো এবং 2MP গভীরতা সেন্সর<br />\r\n- সেলফির জন্য 13MP ফ্রন্ট-ফেসিং ক্যামেরা<br />\r\n- 25W দ্রুত চার্জিং সহ 5000mAh ব্যাটারি<br />\r\n- One UI 4.1 সহ Android 12 এ চলে<br />\r\n- Samsung Pay, Bixby, এবং Samsung DeX এর মতো বৈশিষ্ট্যগুলি অফার করে৷<br />\r\n- গ্যাজেট এবং গিয়ারের মাধ্যমে বাংলাদেশে একটি দুর্দান্ত মূল্যে উপলব্ধ<br />\r\n- এর দামের জন্য দুর্দান্ত মান</p>\r\n\r\n<p>অনুগ্রহ করে লক্ষ্য করুন যে মূল পাঠে উল্লিখিত রঙের বিকল্পগুলি (অ্যাকোয়া ব্লু, ফরেস্ট গ্রিন এবং ডাস্কি পিঙ্ক) স্বচ্ছতার জন্য এই সংক্ষিপ্ত সংস্করণে হালকা নীল এবং গভীর সবুজে সরলীকৃত করা হয়েছে।</p>', '1697379737-product-img.png', 0, 1, 0, 0, 1, '2023-10-04 09:03:56', '2023-10-15 08:22:18'),
(8, 15, 16, 18, 30, 'Fashionable Shoes for Men', 'পুরুষদের জন্য ফ্যাশনেবল জুতা', 'fashionable-shoes-for-men', 'পুরুষদের-জন্য-ফ্যাশনেবল-জুতা', 'S101', '7', 'shoe,men\'s shoe,footwear', 'জুতা,পাদুকা', '39,40,41,42,43', '39,40,41,42,43', 'black', 'কালো', '350', '2', NULL, 'These pairs are incredibly stylish in addition to being comfortable. A classic must-have for men. We have the best price and service. This shoe is more convenient to put on, presents uniform and smooth line texture, and is simple and elegant. Lightweight Rubber Outsole: Features a soft cushioned rubber sole for elegance, style and simplicity. Clear texture design, strong grip, non-slip and wear-resistant. The durable rubber outsole provides traction on a variety of surfaces. The fabric is comfortable and delicate: exudes natural luster, highlights quality, and shows men\'s casual style.', 'এই জোড়াগুলি আরামদায়ক হওয়ার পাশাপাশি অবিশ্বাস্যভাবে আড়ম্বরপূর্ণ। একটি ক্লাসিক পুরুষদের জন্য থাকা আবশ্যক. আমরা সেরা মূল্য এবং পরিষেবা আছে. এই জুতাটি পরতে আরও সুবিধাজনক, অভিন্ন এবং মসৃণ লাইন টেক্সচার উপস্থাপন করে এবং সহজ এবং মার্জিত। লাইটওয়েট রাবার আউটসোল: কমনীয়তা, শৈলী এবং সরলতার জন্য একটি নরম কুশনযুক্ত রাবারের সোল বৈশিষ্ট্যযুক্ত। পরিষ্কার টেক্সচার ডিজাইন, শক্তিশালী গ্রিপ, নন-স্লিপ এবং পরিধান-প্রতিরোধী। টেকসই রাবার আউটসোল বিভিন্ন পৃষ্ঠের উপর ট্র্যাকশন প্রদান করে। ফ্যাব্রিক আরামদায়ক এবং সূক্ষ্ম: প্রাকৃতিক দীপ্তি প্রকাশ করে, গুণমানকে হাইলাইট করে এবং পুরুষদের নৈমিত্তিক শৈলী দেখায়।', '<p>Happy shopping Standard size If your feet are wider, please choose the bigger one</p>\r\n\r\n<ul>\r\n	<li>EUsize 39 = US size 6.5 = UK size 6.5 = foot length 24.5</li>\r\n	<li>EU size 40 = US size 7.0 = UK size 7.0 = foot length 25.0</li>\r\n	<li>EU size 41 = US size 8.0 = UK size 7.5 = foot length 25.5</li>\r\n	<li>EU size 42 = US size 8.5 = UK size 8.0 = foot length 26.0</li>\r\n	<li>EU size 43 = US size 9.0 = UK size 8.5 = foot length 26.5</li>\r\n	<li>EU size 44 = US size 10 = UK size 9.5 = foot length 27.0</li>\r\n</ul>\r\n\r\n<p>Thank you If you have any questions about our products, please feel free to contact us, we will solve any problems for you.</p>', '<p>শুভ শপিং স্ট্যান্ডার্ড সাইজ যদি আপনার পা চওড়া হয়, তাহলে অনুগ্রহ করে বড়টি বেছে নিন</p>\r\n\r\n<ul>\r\n	<li>EUsize 39 = US আকার 6.5 = UK আকার 6.5 = ফুট দৈর্ঘ্য 24.5</li>\r\n	<li>EU আকার 40 = US আকার 7.0 = UK আকার 7.0 = ফুট দৈর্ঘ্য 25.0</li>\r\n	<li>EU আকার 41 = US আকার 8.0 = UK আকার 7.5 = ফুট দৈর্ঘ্য 25.5</li>\r\n	<li>EU আকার 42 = US আকার 8.5 = UK আকার 8.0 = ফুট দৈর্ঘ্য 26.0</li>\r\n	<li>EU আকার 43 = US আকার 9.0 = UK আকার 8.5 = ফুট দৈর্ঘ্য 26.5</li>\r\n	<li>EU আকার 44 = US আকার 10 = UK আকার 9.5 = ফুট দৈর্ঘ্য 27.0</li>\r\n</ul>\r\n\r\n<p>আপনাকে ধন্যবাদ আমাদের পণ্য সম্পর্কে আপনার কোন প্রশ্ন থাকলে, অনুগ্রহ করে আমাদের সাথে যোগাযোগ করুন, আমরা আপনার জন্য যেকোনো সমস্যা সমাধান করব।</p>', '1697738998-product-img.jpeg', 1, 0, 1, 0, 1, '2023-10-19 12:09:59', '2023-10-19 12:10:13'),
(9, 15, 11, 24, 52, 'Samsung LF22T350FHWXXL 22 Inch', 'Samsung LF22T350FHWXXL 22 ইঞ্চি', 'samsung-lf22t350fhwxxl-22-inch', 'samsung-lf22t350fhwxxl-22-ইঞ্চি', 'M201', '3', 'monitor,gaming monitor,samsung', 'মনিটর,স্যামসাং', '22', '22', 'black', 'কালো', '15000', '5', NULL, 'Stock Availability Is Subject To Change. Please Confirm Availability Before Shopping By Calling Us.\r\nThe Product Image Is For Illustration Purposes Only. The Actual Product May Vary In Size, Color, And Layout. No Claim Will Be Accepted For An Image Mismatch.\r\nTech Land BD Can Change The Price Of Any Product At Any Moment Due To The Volatile Price Of The Technology.\r\nWe Cannot Guarantee That The Information On This Page Is 100% Correct. Tech Land BD Is Not Responsible For The Results Obtained From The Use Of This Information.', 'স্টক প্রাপ্যতা পরিবর্তন সাপেক্ষে. আমাদের কল করে কেনাকাটা করার আগে উপলব্ধতা নিশ্চিত করুন.\r\nপ্রোডাক্ট ইমেজ শুধুমাত্র ইলাস্ট্রেশনের উদ্দেশ্যে। প্রকৃত পণ্য আকার, রঙ এবং বিন্যাসে পরিবর্তিত হতে পারে। একটি ছবি অমিলের জন্য কোন দাবি গ্রহণ করা হবে না.\r\nপ্রযুক্তির অস্থির মূল্যের কারণে টেক ল্যান্ড বিডি যেকোনো মুহূর্তে যেকোনো পণ্যের মূল্য পরিবর্তন করতে পারে।\r\nআমরা গ্যারান্টি দিতে পারি না যে এই পৃষ্ঠার তথ্য 100% সঠিক। এই তথ্য ব্যবহার করে প্রাপ্ত ফলাফলের জন্য টেক ল্যান্ড বিডি দায়ী নয়।', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>Samsung LF22T350 22-Inch Monitor Specification</strong></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Display</td>\r\n			<td>\r\n			<ul>\r\n				<li>Screen Size (Class): 22</li>\r\n				<li>Flat / Curved: Flat</li>\r\n				<li>Active Display Size (HxV) (Mm): 476,064 &times; 267,786 Mm</li>\r\n				<li>Frame Rate: 16: 9</li>\r\n				<li>Background Plate: IPS</li>\r\n				<li>Brightness: 250cd / ㎡</li>\r\n				<li>Brightness (Min): 200cd / ㎡</li>\r\n				<li>Contrast Ratio: 1000: 1 Mega (Typical)</li>\r\n				<li>Resolution: 1,920 X 1,080</li>\r\n				<li>Response Time: 5 (GTG）</li>\r\n				<li>Viewing Angle (H / V): 178 &deg; / 178 &deg;</li>\r\n				<li>Color Support: Max 16.7M</li>\r\n				<li>The Color Range Can Be Displayed (NTSC 1976): 72%</li>\r\n				<li>Scanning Frequency: Max 75Hz</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>General Feature</td>\r\n			<td>\r\n			<ul>\r\n				<li>Eco Saving Plus: Yes</li>\r\n				<li>Eye Saver Mode: Yes</li>\r\n				<li>Flicker Free: Yes</li>\r\n				<li>Game Mode: Yes</li>\r\n				<li>Image Size: Yes</li>\r\n				<li>Windows Certification: Windows 10</li>\r\n				<li>FreeSync: Yes</li>\r\n				<li>Off Timer Plus: Yes</li>\r\n				<li>Operating Temperature: 10 ℃ ~ 40 ℃</li>\r\n				<li>Humidity: 10% ~ 80%, Non-Condensing</li>\r\n				<li>Color: DARK BLUE GRAY</li>\r\n				<li>Stand Type: SIMPLE</li>\r\n				<li>Tilt: -2 ~ 20</li>\r\n				<li>Wall-Mounted: 100 X 100</li>\r\n				<li>Size: (RxCxD): 488 X 294.4 X 39.4 Mm&nbsp; (Without Stand)</li>\r\n				<li>Weight: 2.0 Kg</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Connectivity</td>\r\n			<td>\r\n			<ul>\r\n				<li>D-Sub: 1 EA</li>\r\n				<li>HDMI: 1 EA</li>\r\n				<li>HDMI Version: 1.4</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Power</td>\r\n			<td>\r\n			<ul>\r\n				<li>Power Supply: AC 100 ~ 240V</li>\r\n				<li>Power Consumption (DPMS): 0.5W</li>\r\n				<li>Power Consumption (Off Mode): 0.3W</li>\r\n				<li>Species: External Adapter</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><strong>Samsung LF22T350 22-Inch Monitor Specification</strong></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>Display</td>\r\n			<td>\r\n			<ul>\r\n				<li>Screen Size (Class): 22</li>\r\n				<li>Flat / Curved: Flat</li>\r\n				<li>Active Display Size (HxV) (Mm): 476,064 &times; 267,786 Mm</li>\r\n				<li>Frame Rate: 16: 9</li>\r\n				<li>Background Plate: IPS</li>\r\n				<li>Brightness: 250cd / ㎡</li>\r\n				<li>Brightness (Min): 200cd / ㎡</li>\r\n				<li>Contrast Ratio: 1000: 1 Mega (Typical)</li>\r\n				<li>Resolution: 1,920 X 1,080</li>\r\n				<li>Response Time: 5 (GTG）</li>\r\n				<li>Viewing Angle (H / V): 178 &deg; / 178 &deg;</li>\r\n				<li>Color Support: Max 16.7M</li>\r\n				<li>The Color Range Can Be Displayed (NTSC 1976): 72%</li>\r\n				<li>Scanning Frequency: Max 75Hz</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>General Feature</td>\r\n			<td>\r\n			<ul>\r\n				<li>Eco Saving Plus: Yes</li>\r\n				<li>Eye Saver Mode: Yes</li>\r\n				<li>Flicker Free: Yes</li>\r\n				<li>Game Mode: Yes</li>\r\n				<li>Image Size: Yes</li>\r\n				<li>Windows Certification: Windows 10</li>\r\n				<li>FreeSync: Yes</li>\r\n				<li>Off Timer Plus: Yes</li>\r\n				<li>Operating Temperature: 10 ℃ ~ 40 ℃</li>\r\n				<li>Humidity: 10% ~ 80%, Non-Condensing</li>\r\n				<li>Color: DARK BLUE GRAY</li>\r\n				<li>Stand Type: SIMPLE</li>\r\n				<li>Tilt: -2 ~ 20</li>\r\n				<li>Wall-Mounted: 100 X 100</li>\r\n				<li>Size: (RxCxD): 488 X 294.4 X 39.4 Mm&nbsp; (Without Stand)</li>\r\n				<li>Weight: 2.0 Kg</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Connectivity</td>\r\n			<td>\r\n			<ul>\r\n				<li>D-Sub: 1 EA</li>\r\n				<li>HDMI: 1 EA</li>\r\n				<li>HDMI Version: 1.4</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Power</td>\r\n			<td>\r\n			<ul>\r\n				<li>Power Supply: AC 100 ~ 240V</li>\r\n				<li>Power Consumption (DPMS): 0.5W</li>\r\n				<li>Power Consumption (Off Mode): 0.3W</li>\r\n				<li>Species: External Adapter</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>', '1697740186-product-img.jpeg', 1, 0, 0, 1, 1, '2023-10-19 12:29:47', '2023-10-19 12:29:47'),
(10, 15, 16, 1, 34, 'Navy strapped t-shirt', 'নৌবাহিনীর স্ট্র্যাপড টি-শার্ট', 'navy-strapped-t-shirt', 'নৌবাহিনীর-স্ট্র্যাপড-টি-শার্ট', 'MT-120', '12', 'men,shirt,cloths', 'পুরুষদের,টি-শার্ট', '20-40,21-42,22-44', '20-40,21-42,22-44', 'white', 'সাদা', '320', NULL, NULL, 'High Quality with Trendy Design\r\nExport Quality T Shirt\r\nFabrics: Fabric: 100% mesh \r\nFabric & Print Color Guaranteed\r\nFabrication: 160-170 GSM\r\nSize: M, L, XL Measurement (In Inch)\r\nM- (Length 27\", Chest 40\")\r\nL- (Length 28\", Chest 42\")\r\nXL- (Length 29\", Chest 44\")', 'ট্রেন্ডি ডিজাইনের সাথে উচ্চ মানের\r\nরপ্তানি মানের টি শার্ট\r\nকাপড়: ফ্যাব্রিক: 100% জাল\r\nফ্যাব্রিক এবং প্রিন্ট কালার গ্যারান্টিযুক্ত\r\nফ্যাব্রিকেশন: 160-170 জিএসএম\r\nআকার: এম, এল, এক্সএল পরিমাপ (ইঞ্চিতে)\r\nM- (দৈর্ঘ্য 27\", বুক 40\")\r\nL- (দৈর্ঘ্য 28\", বুক 42\")\r\nXL- (দৈর্ঘ্য 29\", বুক 44\")', '<ul>\r\n	<li>Export Quality T Shirt</li>\r\n	<li>Fabrics: Fabric: 100% mesh</li>\r\n	<li>Fabric &amp; Print Color Guaranteed</li>\r\n	<li>Fabrication: 160-170 GSM</li>\r\n	<li>Size: M, L, XL Measurement (In Inch)</li>\r\n	<li>M- (Length 27&quot;, Chest 40&quot;)</li>\r\n	<li>L- (Length 28&quot;, Chest 42&quot;)</li>\r\n	<li>XL- (Length 29&quot;, Chest 44&quot;)</li>\r\n</ul>', '<ul>\r\n	<li>Export Quality T Shirt</li>\r\n	<li>Fabrics: Fabric: 100% mesh</li>\r\n	<li>Fabric &amp; Print Color Guaranteed</li>\r\n	<li>Fabrication: 160-170 GSM</li>\r\n	<li>Size: M, L, XL Measurement (In Inch)</li>\r\n	<li>M- (Length 27&quot;, Chest 40&quot;)</li>\r\n	<li>L- (Length 28&quot;, Chest 42&quot;)</li>\r\n	<li>XL- (Length 29&quot;, Chest 44&quot;)</li>\r\n</ul>', '1697741018-product-img.jpeg', 0, 1, 1, 0, 1, '2023-10-19 12:43:38', '2023-10-19 12:43:38'),
(11, 15, 15, 23, 43, 'Gown Poppin Work 3 piece long kurti', 'গাউন পপিন ওয়ার্ক 3 পিস লম্বা কুর্তি', 'gown-poppin-work-3-piece-long-kurti', 'গাউন-পপিন-ওয়ার্ক-3-পিস-লম্বা-কুর্তি', 'MS-222', '12', 'women,shalwar,kamez,women wear,cloths', 'মহিলা,মহিলাদের পরিধান,শালওয়ার,কামিজ', 'large', 'বড়', 'white', 'সাদা', '650', '6', NULL, 'New exclusive designed Linen Screen Print Gown Poppon Work 3piece long kurti For Stylish Women / Girls - 3 Pice Dress', 'স্টাইলিশ মহিলাদের/মেয়েদের জন্য নতুন এক্সক্লুসিভ ডিজাইন করা লিনেন স্ক্রিন প্রিন্ট গাউন পপন ওয়ার্ক 3পিস লম্বা কুর্তি - 3 পিস ড্রেস', '<ul>\r\n	<li>Product Type: 3Pice Long Kurti</li>\r\n	<li>Color: Same As pic</li>\r\n	<li>Main Material: Linen ,Sleeve.Long</li>\r\n	<li>Very Nice And Comfortable</li>\r\n	<li>Gher 100+</li>\r\n	<li>Pant; Free Size</li>\r\n	<li>Kamij; Body Size 34-44 Ani Body Use</li>\r\n	<li>Orna; Cotton Sreenprint</li>\r\n	<li>100% Color Granti</li>\r\n	<li>Kamij Long 50+</li>\r\n	<li>It is made of high quality materials,durable enought for your daily wearing</li>\r\n	<li>Stylish and fashion design make you more attractive</li>\r\n	<li>This Dress is GORGEOUS! Loving the lace and how comfy it is! Don&#39;t miss out on this must have dress.</li>\r\n	<li>Great for Party,Daily,Casual,I am sure you will like it!</li>\r\n	<li>This lightweight, Dress is perfect for those carefree days</li>\r\n	<li>#3 pice dress</li>\r\n	<li>#Three piece</li>\r\n</ul>', '<ul>\r\n	<li>Product Type: 3Pice Long Kurti</li>\r\n	<li>Color: Same As pic</li>\r\n	<li>Main Material: Linen ,Sleeve.Long</li>\r\n	<li>Very Nice And Comfortable</li>\r\n	<li>Gher 100+</li>\r\n	<li>Pant; Free Size</li>\r\n	<li>Kamij; Body Size 34-44 Ani Body Use</li>\r\n	<li>Orna; Cotton Sreenprint</li>\r\n	<li>100% Color Granti</li>\r\n	<li>Kamij Long 50+</li>\r\n	<li>It is made of high quality materials,durable enought for your daily wearing</li>\r\n	<li>Stylish and fashion design make you more attractive</li>\r\n	<li>This Dress is GORGEOUS! Loving the lace and how comfy it is! Don&#39;t miss out on this must have dress.</li>\r\n	<li>Great for Party,Daily,Casual,I am sure you will like it!</li>\r\n	<li>This lightweight, Dress is perfect for those carefree days</li>\r\n	<li>#3 pice dress</li>\r\n	<li>#Three piece</li>\r\n</ul>', '1697781229-product-img.jpg', 0, 1, 0, 1, 1, '2023-10-19 23:53:50', '2023-10-19 23:53:50'),
(13, 15, 16, 18, 30, 'Fashionable Shoes for Men', 'পুরুষদের জন্য ফ্যাশনেবল জুতা', 'fashionable-shoes-for-men', 'পুরুষদের-জন্য-ফ্যাশনেবল-জুতা', 'S101', '7', 'shoe,men\'s shoe,footwear', 'জুতা,পাদুকা', '39,40,41,42,43', '39,40,41,42,43', 'black', 'কালো', '350', '2', NULL, 'These pairs are incredibly stylish in addition to being comfortable. A classic must-have for men. We have the best price and service. This shoe is more convenient to put on, presents uniform and smooth line texture, and is simple and elegant. Lightweight Rubber Outsole: Features a soft cushioned rubber sole for elegance, style and simplicity. Clear texture design, strong grip, non-slip and wear-resistant. The durable rubber outsole provides traction on a variety of surfaces. The fabric is comfortable and delicate: exudes natural luster, highlights quality, and shows men\'s casual style.', 'এই জোড়াগুলি আরামদায়ক হওয়ার পাশাপাশি অবিশ্বাস্যভাবে আড়ম্বরপূর্ণ। একটি ক্লাসিক পুরুষদের জন্য থাকা আবশ্যক. আমরা সেরা মূল্য এবং পরিষেবা আছে. এই জুতাটি পরতে আরও সুবিধাজনক, অভিন্ন এবং মসৃণ লাইন টেক্সচার উপস্থাপন করে এবং সহজ এবং মার্জিত। লাইটওয়েট রাবার আউটসোল: কমনীয়তা, শৈলী এবং সরলতার জন্য একটি নরম কুশনযুক্ত রাবারের সোল বৈশিষ্ট্যযুক্ত। পরিষ্কার টেক্সচার ডিজাইন, শক্তিশালী গ্রিপ, নন-স্লিপ এবং পরিধান-প্রতিরোধী। টেকসই রাবার আউটসোল বিভিন্ন পৃষ্ঠের উপর ট্র্যাকশন প্রদান করে। ফ্যাব্রিক আরামদায়ক এবং সূক্ষ্ম: প্রাকৃতিক দীপ্তি প্রকাশ করে, গুণমানকে হাইলাইট করে এবং পুরুষদের নৈমিত্তিক শৈলী দেখায়।', '<p>Happy shopping Standard size If your feet are wider, please choose the bigger one</p>\r\n\r\n<ul>\r\n	<li>EUsize 39 = US size 6.5 = UK size 6.5 = foot length 24.5</li>\r\n	<li>EU size 40 = US size 7.0 = UK size 7.0 = foot length 25.0</li>\r\n	<li>EU size 41 = US size 8.0 = UK size 7.5 = foot length 25.5</li>\r\n	<li>EU size 42 = US size 8.5 = UK size 8.0 = foot length 26.0</li>\r\n	<li>EU size 43 = US size 9.0 = UK size 8.5 = foot length 26.5</li>\r\n	<li>EU size 44 = US size 10 = UK size 9.5 = foot length 27.0</li>\r\n</ul>\r\n\r\n<p>Thank you If you have any questions about our products, please feel free to contact us, we will solve any problems for you.</p>', '<p>শুভ শপিং স্ট্যান্ডার্ড সাইজ যদি আপনার পা চওড়া হয়, তাহলে অনুগ্রহ করে বড়টি বেছে নিন</p>\r\n\r\n<ul>\r\n	<li>EUsize 39 = US আকার 6.5 = UK আকার 6.5 = ফুট দৈর্ঘ্য 24.5</li>\r\n	<li>EU আকার 40 = US আকার 7.0 = UK আকার 7.0 = ফুট দৈর্ঘ্য 25.0</li>\r\n	<li>EU আকার 41 = US আকার 8.0 = UK আকার 7.5 = ফুট দৈর্ঘ্য 25.5</li>\r\n	<li>EU আকার 42 = US আকার 8.5 = UK আকার 8.0 = ফুট দৈর্ঘ্য 26.0</li>\r\n	<li>EU আকার 43 = US আকার 9.0 = UK আকার 8.5 = ফুট দৈর্ঘ্য 26.5</li>\r\n	<li>EU আকার 44 = US আকার 10 = UK আকার 9.5 = ফুট দৈর্ঘ্য 27.0</li>\r\n</ul>\r\n\r\n<p>আপনাকে ধন্যবাদ আমাদের পণ্য সম্পর্কে আপনার কোন প্রশ্ন থাকলে, অনুগ্রহ করে আমাদের সাথে যোগাযোগ করুন, আমরা আপনার জন্য যেকোনো সমস্যা সমাধান করব।</p>', '1697738998-product-img.jpeg', 1, 0, 1, 0, 1, '2023-10-19 12:09:59', '2023-10-19 12:10:13'),
(14, 15, 16, 18, 30, 'Fashionable Shoes for Men', 'পুরুষদের জন্য ফ্যাশনেবল জুতা', 'fashionable-shoes-for-men', 'পুরুষদের-জন্য-ফ্যাশনেবল-জুতা', 'S101', '7', 'shoe,men\'s shoe,footwear', 'জুতা,পাদুকা', '39,40,41,42,43', '39,40,41,42,43', 'black', 'কালো', '350', '2', NULL, 'These pairs are incredibly stylish in addition to being comfortable. A classic must-have for men. We have the best price and service. This shoe is more convenient to put on, presents uniform and smooth line texture, and is simple and elegant. Lightweight Rubber Outsole: Features a soft cushioned rubber sole for elegance, style and simplicity. Clear texture design, strong grip, non-slip and wear-resistant. The durable rubber outsole provides traction on a variety of surfaces. The fabric is comfortable and delicate: exudes natural luster, highlights quality, and shows men\'s casual style.', 'এই জোড়াগুলি আরামদায়ক হওয়ার পাশাপাশি অবিশ্বাস্যভাবে আড়ম্বরপূর্ণ। একটি ক্লাসিক পুরুষদের জন্য থাকা আবশ্যক. আমরা সেরা মূল্য এবং পরিষেবা আছে. এই জুতাটি পরতে আরও সুবিধাজনক, অভিন্ন এবং মসৃণ লাইন টেক্সচার উপস্থাপন করে এবং সহজ এবং মার্জিত। লাইটওয়েট রাবার আউটসোল: কমনীয়তা, শৈলী এবং সরলতার জন্য একটি নরম কুশনযুক্ত রাবারের সোল বৈশিষ্ট্যযুক্ত। পরিষ্কার টেক্সচার ডিজাইন, শক্তিশালী গ্রিপ, নন-স্লিপ এবং পরিধান-প্রতিরোধী। টেকসই রাবার আউটসোল বিভিন্ন পৃষ্ঠের উপর ট্র্যাকশন প্রদান করে। ফ্যাব্রিক আরামদায়ক এবং সূক্ষ্ম: প্রাকৃতিক দীপ্তি প্রকাশ করে, গুণমানকে হাইলাইট করে এবং পুরুষদের নৈমিত্তিক শৈলী দেখায়।', '<p>Happy shopping Standard size If your feet are wider, please choose the bigger one</p>\r\n\r\n<ul>\r\n	<li>EUsize 39 = US size 6.5 = UK size 6.5 = foot length 24.5</li>\r\n	<li>EU size 40 = US size 7.0 = UK size 7.0 = foot length 25.0</li>\r\n	<li>EU size 41 = US size 8.0 = UK size 7.5 = foot length 25.5</li>\r\n	<li>EU size 42 = US size 8.5 = UK size 8.0 = foot length 26.0</li>\r\n	<li>EU size 43 = US size 9.0 = UK size 8.5 = foot length 26.5</li>\r\n	<li>EU size 44 = US size 10 = UK size 9.5 = foot length 27.0</li>\r\n</ul>\r\n\r\n<p>Thank you If you have any questions about our products, please feel free to contact us, we will solve any problems for you.</p>', '<p>শুভ শপিং স্ট্যান্ডার্ড সাইজ যদি আপনার পা চওড়া হয়, তাহলে অনুগ্রহ করে বড়টি বেছে নিন</p>\r\n\r\n<ul>\r\n	<li>EUsize 39 = US আকার 6.5 = UK আকার 6.5 = ফুট দৈর্ঘ্য 24.5</li>\r\n	<li>EU আকার 40 = US আকার 7.0 = UK আকার 7.0 = ফুট দৈর্ঘ্য 25.0</li>\r\n	<li>EU আকার 41 = US আকার 8.0 = UK আকার 7.5 = ফুট দৈর্ঘ্য 25.5</li>\r\n	<li>EU আকার 42 = US আকার 8.5 = UK আকার 8.0 = ফুট দৈর্ঘ্য 26.0</li>\r\n	<li>EU আকার 43 = US আকার 9.0 = UK আকার 8.5 = ফুট দৈর্ঘ্য 26.5</li>\r\n	<li>EU আকার 44 = US আকার 10 = UK আকার 9.5 = ফুট দৈর্ঘ্য 27.0</li>\r\n</ul>\r\n\r\n<p>আপনাকে ধন্যবাদ আমাদের পণ্য সম্পর্কে আপনার কোন প্রশ্ন থাকলে, অনুগ্রহ করে আমাদের সাথে যোগাযোগ করুন, আমরা আপনার জন্য যেকোনো সমস্যা সমাধান করব।</p>', '1697738998-product-img.jpeg', 1, 0, 1, 0, 1, '2023-10-19 12:09:59', '2023-10-19 12:10:13'),
(15, 15, 16, 18, 30, 'Fashionable Shoes for Men', 'পুরুষদের জন্য ফ্যাশনেবল জুতা', 'fashionable-shoes-for-men', 'পুরুষদের-জন্য-ফ্যাশনেবল-জুতা', 'S101', '7', 'shoe,men\'s shoe,footwear', 'জুতা,পাদুকা', '39,40,41,42,43', '39,40,41,42,43', 'black', 'কালো', '350', '2', NULL, 'These pairs are incredibly stylish in addition to being comfortable. A classic must-have for men. We have the best price and service. This shoe is more convenient to put on, presents uniform and smooth line texture, and is simple and elegant. Lightweight Rubber Outsole: Features a soft cushioned rubber sole for elegance, style and simplicity. Clear texture design, strong grip, non-slip and wear-resistant. The durable rubber outsole provides traction on a variety of surfaces. The fabric is comfortable and delicate: exudes natural luster, highlights quality, and shows men\'s casual style.', 'এই জোড়াগুলি আরামদায়ক হওয়ার পাশাপাশি অবিশ্বাস্যভাবে আড়ম্বরপূর্ণ। একটি ক্লাসিক পুরুষদের জন্য থাকা আবশ্যক. আমরা সেরা মূল্য এবং পরিষেবা আছে. এই জুতাটি পরতে আরও সুবিধাজনক, অভিন্ন এবং মসৃণ লাইন টেক্সচার উপস্থাপন করে এবং সহজ এবং মার্জিত। লাইটওয়েট রাবার আউটসোল: কমনীয়তা, শৈলী এবং সরলতার জন্য একটি নরম কুশনযুক্ত রাবারের সোল বৈশিষ্ট্যযুক্ত। পরিষ্কার টেক্সচার ডিজাইন, শক্তিশালী গ্রিপ, নন-স্লিপ এবং পরিধান-প্রতিরোধী। টেকসই রাবার আউটসোল বিভিন্ন পৃষ্ঠের উপর ট্র্যাকশন প্রদান করে। ফ্যাব্রিক আরামদায়ক এবং সূক্ষ্ম: প্রাকৃতিক দীপ্তি প্রকাশ করে, গুণমানকে হাইলাইট করে এবং পুরুষদের নৈমিত্তিক শৈলী দেখায়।', '<p>Happy shopping Standard size If your feet are wider, please choose the bigger one</p>\r\n\r\n<ul>\r\n	<li>EUsize 39 = US size 6.5 = UK size 6.5 = foot length 24.5</li>\r\n	<li>EU size 40 = US size 7.0 = UK size 7.0 = foot length 25.0</li>\r\n	<li>EU size 41 = US size 8.0 = UK size 7.5 = foot length 25.5</li>\r\n	<li>EU size 42 = US size 8.5 = UK size 8.0 = foot length 26.0</li>\r\n	<li>EU size 43 = US size 9.0 = UK size 8.5 = foot length 26.5</li>\r\n	<li>EU size 44 = US size 10 = UK size 9.5 = foot length 27.0</li>\r\n</ul>\r\n\r\n<p>Thank you If you have any questions about our products, please feel free to contact us, we will solve any problems for you.</p>', '<p>শুভ শপিং স্ট্যান্ডার্ড সাইজ যদি আপনার পা চওড়া হয়, তাহলে অনুগ্রহ করে বড়টি বেছে নিন</p>\r\n\r\n<ul>\r\n	<li>EUsize 39 = US আকার 6.5 = UK আকার 6.5 = ফুট দৈর্ঘ্য 24.5</li>\r\n	<li>EU আকার 40 = US আকার 7.0 = UK আকার 7.0 = ফুট দৈর্ঘ্য 25.0</li>\r\n	<li>EU আকার 41 = US আকার 8.0 = UK আকার 7.5 = ফুট দৈর্ঘ্য 25.5</li>\r\n	<li>EU আকার 42 = US আকার 8.5 = UK আকার 8.0 = ফুট দৈর্ঘ্য 26.0</li>\r\n	<li>EU আকার 43 = US আকার 9.0 = UK আকার 8.5 = ফুট দৈর্ঘ্য 26.5</li>\r\n	<li>EU আকার 44 = US আকার 10 = UK আকার 9.5 = ফুট দৈর্ঘ্য 27.0</li>\r\n</ul>\r\n\r\n<p>আপনাকে ধন্যবাদ আমাদের পণ্য সম্পর্কে আপনার কোন প্রশ্ন থাকলে, অনুগ্রহ করে আমাদের সাথে যোগাযোগ করুন, আমরা আপনার জন্য যেকোনো সমস্যা সমাধান করব।</p>', '1697738998-product-img.jpeg', 1, 0, 1, 0, 1, '2023-10-19 12:09:59', '2023-10-19 12:10:13'),
(16, 15, 16, 18, 30, 'Fashionable Shoes for Men', 'পুরুষদের জন্য ফ্যাশনেবল জুতা', 'fashionable-shoes-for-men', 'পুরুষদের-জন্য-ফ্যাশনেবল-জুতা', 'S101', '7', 'shoe,men\'s shoe,footwear', 'জুতা,পাদুকা', '39,40,41,42,43', '39,40,41,42,43', 'black', 'কালো', '350', '2', NULL, 'These pairs are incredibly stylish in addition to being comfortable. A classic must-have for men. We have the best price and service. This shoe is more convenient to put on, presents uniform and smooth line texture, and is simple and elegant. Lightweight Rubber Outsole: Features a soft cushioned rubber sole for elegance, style and simplicity. Clear texture design, strong grip, non-slip and wear-resistant. The durable rubber outsole provides traction on a variety of surfaces. The fabric is comfortable and delicate: exudes natural luster, highlights quality, and shows men\'s casual style.', 'এই জোড়াগুলি আরামদায়ক হওয়ার পাশাপাশি অবিশ্বাস্যভাবে আড়ম্বরপূর্ণ। একটি ক্লাসিক পুরুষদের জন্য থাকা আবশ্যক. আমরা সেরা মূল্য এবং পরিষেবা আছে. এই জুতাটি পরতে আরও সুবিধাজনক, অভিন্ন এবং মসৃণ লাইন টেক্সচার উপস্থাপন করে এবং সহজ এবং মার্জিত। লাইটওয়েট রাবার আউটসোল: কমনীয়তা, শৈলী এবং সরলতার জন্য একটি নরম কুশনযুক্ত রাবারের সোল বৈশিষ্ট্যযুক্ত। পরিষ্কার টেক্সচার ডিজাইন, শক্তিশালী গ্রিপ, নন-স্লিপ এবং পরিধান-প্রতিরোধী। টেকসই রাবার আউটসোল বিভিন্ন পৃষ্ঠের উপর ট্র্যাকশন প্রদান করে। ফ্যাব্রিক আরামদায়ক এবং সূক্ষ্ম: প্রাকৃতিক দীপ্তি প্রকাশ করে, গুণমানকে হাইলাইট করে এবং পুরুষদের নৈমিত্তিক শৈলী দেখায়।', '<p>Happy shopping Standard size If your feet are wider, please choose the bigger one</p>\r\n\r\n<ul>\r\n	<li>EUsize 39 = US size 6.5 = UK size 6.5 = foot length 24.5</li>\r\n	<li>EU size 40 = US size 7.0 = UK size 7.0 = foot length 25.0</li>\r\n	<li>EU size 41 = US size 8.0 = UK size 7.5 = foot length 25.5</li>\r\n	<li>EU size 42 = US size 8.5 = UK size 8.0 = foot length 26.0</li>\r\n	<li>EU size 43 = US size 9.0 = UK size 8.5 = foot length 26.5</li>\r\n	<li>EU size 44 = US size 10 = UK size 9.5 = foot length 27.0</li>\r\n</ul>\r\n\r\n<p>Thank you If you have any questions about our products, please feel free to contact us, we will solve any problems for you.</p>', '<p>শুভ শপিং স্ট্যান্ডার্ড সাইজ যদি আপনার পা চওড়া হয়, তাহলে অনুগ্রহ করে বড়টি বেছে নিন</p>\r\n\r\n<ul>\r\n	<li>EUsize 39 = US আকার 6.5 = UK আকার 6.5 = ফুট দৈর্ঘ্য 24.5</li>\r\n	<li>EU আকার 40 = US আকার 7.0 = UK আকার 7.0 = ফুট দৈর্ঘ্য 25.0</li>\r\n	<li>EU আকার 41 = US আকার 8.0 = UK আকার 7.5 = ফুট দৈর্ঘ্য 25.5</li>\r\n	<li>EU আকার 42 = US আকার 8.5 = UK আকার 8.0 = ফুট দৈর্ঘ্য 26.0</li>\r\n	<li>EU আকার 43 = US আকার 9.0 = UK আকার 8.5 = ফুট দৈর্ঘ্য 26.5</li>\r\n	<li>EU আকার 44 = US আকার 10 = UK আকার 9.5 = ফুট দৈর্ঘ্য 27.0</li>\r\n</ul>\r\n\r\n<p>আপনাকে ধন্যবাদ আমাদের পণ্য সম্পর্কে আপনার কোন প্রশ্ন থাকলে, অনুগ্রহ করে আমাদের সাথে যোগাযোগ করুন, আমরা আপনার জন্য যেকোনো সমস্যা সমাধান করব।</p>', '1697738998-product-img.jpeg', 1, 0, 1, 0, 1, '2023-10-19 12:09:59', '2023-10-19 12:10:13'),
(17, 15, 16, 18, 30, 'Fashionable Shoes for Men', 'পুরুষদের জন্য ফ্যাশনেবল জুতা', 'fashionable-shoes-for-men', 'পুরুষদের-জন্য-ফ্যাশনেবল-জুতা', 'S101', '7', 'shoe,men\'s shoe,footwear', 'জুতা,পাদুকা', '39,40,41,42,43', '39,40,41,42,43', 'black', 'কালো', '350', '2', NULL, 'These pairs are incredibly stylish in addition to being comfortable. A classic must-have for men. We have the best price and service. This shoe is more convenient to put on, presents uniform and smooth line texture, and is simple and elegant. Lightweight Rubber Outsole: Features a soft cushioned rubber sole for elegance, style and simplicity. Clear texture design, strong grip, non-slip and wear-resistant. The durable rubber outsole provides traction on a variety of surfaces. The fabric is comfortable and delicate: exudes natural luster, highlights quality, and shows men\'s casual style.', 'এই জোড়াগুলি আরামদায়ক হওয়ার পাশাপাশি অবিশ্বাস্যভাবে আড়ম্বরপূর্ণ। একটি ক্লাসিক পুরুষদের জন্য থাকা আবশ্যক. আমরা সেরা মূল্য এবং পরিষেবা আছে. এই জুতাটি পরতে আরও সুবিধাজনক, অভিন্ন এবং মসৃণ লাইন টেক্সচার উপস্থাপন করে এবং সহজ এবং মার্জিত। লাইটওয়েট রাবার আউটসোল: কমনীয়তা, শৈলী এবং সরলতার জন্য একটি নরম কুশনযুক্ত রাবারের সোল বৈশিষ্ট্যযুক্ত। পরিষ্কার টেক্সচার ডিজাইন, শক্তিশালী গ্রিপ, নন-স্লিপ এবং পরিধান-প্রতিরোধী। টেকসই রাবার আউটসোল বিভিন্ন পৃষ্ঠের উপর ট্র্যাকশন প্রদান করে। ফ্যাব্রিক আরামদায়ক এবং সূক্ষ্ম: প্রাকৃতিক দীপ্তি প্রকাশ করে, গুণমানকে হাইলাইট করে এবং পুরুষদের নৈমিত্তিক শৈলী দেখায়।', '<p>Happy shopping Standard size If your feet are wider, please choose the bigger one</p>\r\n\r\n<ul>\r\n	<li>EUsize 39 = US size 6.5 = UK size 6.5 = foot length 24.5</li>\r\n	<li>EU size 40 = US size 7.0 = UK size 7.0 = foot length 25.0</li>\r\n	<li>EU size 41 = US size 8.0 = UK size 7.5 = foot length 25.5</li>\r\n	<li>EU size 42 = US size 8.5 = UK size 8.0 = foot length 26.0</li>\r\n	<li>EU size 43 = US size 9.0 = UK size 8.5 = foot length 26.5</li>\r\n	<li>EU size 44 = US size 10 = UK size 9.5 = foot length 27.0</li>\r\n</ul>\r\n\r\n<p>Thank you If you have any questions about our products, please feel free to contact us, we will solve any problems for you.</p>', '<p>শুভ শপিং স্ট্যান্ডার্ড সাইজ যদি আপনার পা চওড়া হয়, তাহলে অনুগ্রহ করে বড়টি বেছে নিন</p>\r\n\r\n<ul>\r\n	<li>EUsize 39 = US আকার 6.5 = UK আকার 6.5 = ফুট দৈর্ঘ্য 24.5</li>\r\n	<li>EU আকার 40 = US আকার 7.0 = UK আকার 7.0 = ফুট দৈর্ঘ্য 25.0</li>\r\n	<li>EU আকার 41 = US আকার 8.0 = UK আকার 7.5 = ফুট দৈর্ঘ্য 25.5</li>\r\n	<li>EU আকার 42 = US আকার 8.5 = UK আকার 8.0 = ফুট দৈর্ঘ্য 26.0</li>\r\n	<li>EU আকার 43 = US আকার 9.0 = UK আকার 8.5 = ফুট দৈর্ঘ্য 26.5</li>\r\n	<li>EU আকার 44 = US আকার 10 = UK আকার 9.5 = ফুট দৈর্ঘ্য 27.0</li>\r\n</ul>\r\n\r\n<p>আপনাকে ধন্যবাদ আমাদের পণ্য সম্পর্কে আপনার কোন প্রশ্ন থাকলে, অনুগ্রহ করে আমাদের সাথে যোগাযোগ করুন, আমরা আপনার জন্য যেকোনো সমস্যা সমাধান করব।</p>', '1697738998-product-img.jpeg', 1, 0, 1, 0, 1, '2023-10-19 12:09:59', '2023-10-19 12:10:13'),
(18, 15, 16, 18, 30, 'Fashionable Shoes for Men', 'পুরুষদের জন্য ফ্যাশনেবল জুতা', 'fashionable-shoes-for-men', 'পুরুষদের-জন্য-ফ্যাশনেবল-জুতা', 'S101', '7', 'shoe,men\'s shoe,footwear', 'জুতা,পাদুকা', '39,40,41,42,43', '39,40,41,42,43', 'black', 'কালো', '350', '2', NULL, 'These pairs are incredibly stylish in addition to being comfortable. A classic must-have for men. We have the best price and service. This shoe is more convenient to put on, presents uniform and smooth line texture, and is simple and elegant. Lightweight Rubber Outsole: Features a soft cushioned rubber sole for elegance, style and simplicity. Clear texture design, strong grip, non-slip and wear-resistant. The durable rubber outsole provides traction on a variety of surfaces. The fabric is comfortable and delicate: exudes natural luster, highlights quality, and shows men\'s casual style.', 'এই জোড়াগুলি আরামদায়ক হওয়ার পাশাপাশি অবিশ্বাস্যভাবে আড়ম্বরপূর্ণ। একটি ক্লাসিক পুরুষদের জন্য থাকা আবশ্যক. আমরা সেরা মূল্য এবং পরিষেবা আছে. এই জুতাটি পরতে আরও সুবিধাজনক, অভিন্ন এবং মসৃণ লাইন টেক্সচার উপস্থাপন করে এবং সহজ এবং মার্জিত। লাইটওয়েট রাবার আউটসোল: কমনীয়তা, শৈলী এবং সরলতার জন্য একটি নরম কুশনযুক্ত রাবারের সোল বৈশিষ্ট্যযুক্ত। পরিষ্কার টেক্সচার ডিজাইন, শক্তিশালী গ্রিপ, নন-স্লিপ এবং পরিধান-প্রতিরোধী। টেকসই রাবার আউটসোল বিভিন্ন পৃষ্ঠের উপর ট্র্যাকশন প্রদান করে। ফ্যাব্রিক আরামদায়ক এবং সূক্ষ্ম: প্রাকৃতিক দীপ্তি প্রকাশ করে, গুণমানকে হাইলাইট করে এবং পুরুষদের নৈমিত্তিক শৈলী দেখায়।', '<p>Happy shopping Standard size If your feet are wider, please choose the bigger one</p>\r\n\r\n<ul>\r\n	<li>EUsize 39 = US size 6.5 = UK size 6.5 = foot length 24.5</li>\r\n	<li>EU size 40 = US size 7.0 = UK size 7.0 = foot length 25.0</li>\r\n	<li>EU size 41 = US size 8.0 = UK size 7.5 = foot length 25.5</li>\r\n	<li>EU size 42 = US size 8.5 = UK size 8.0 = foot length 26.0</li>\r\n	<li>EU size 43 = US size 9.0 = UK size 8.5 = foot length 26.5</li>\r\n	<li>EU size 44 = US size 10 = UK size 9.5 = foot length 27.0</li>\r\n</ul>\r\n\r\n<p>Thank you If you have any questions about our products, please feel free to contact us, we will solve any problems for you.</p>', '<p>শুভ শপিং স্ট্যান্ডার্ড সাইজ যদি আপনার পা চওড়া হয়, তাহলে অনুগ্রহ করে বড়টি বেছে নিন</p>\r\n\r\n<ul>\r\n	<li>EUsize 39 = US আকার 6.5 = UK আকার 6.5 = ফুট দৈর্ঘ্য 24.5</li>\r\n	<li>EU আকার 40 = US আকার 7.0 = UK আকার 7.0 = ফুট দৈর্ঘ্য 25.0</li>\r\n	<li>EU আকার 41 = US আকার 8.0 = UK আকার 7.5 = ফুট দৈর্ঘ্য 25.5</li>\r\n	<li>EU আকার 42 = US আকার 8.5 = UK আকার 8.0 = ফুট দৈর্ঘ্য 26.0</li>\r\n	<li>EU আকার 43 = US আকার 9.0 = UK আকার 8.5 = ফুট দৈর্ঘ্য 26.5</li>\r\n	<li>EU আকার 44 = US আকার 10 = UK আকার 9.5 = ফুট দৈর্ঘ্য 27.0</li>\r\n</ul>\r\n\r\n<p>আপনাকে ধন্যবাদ আমাদের পণ্য সম্পর্কে আপনার কোন প্রশ্ন থাকলে, অনুগ্রহ করে আমাদের সাথে যোগাযোগ করুন, আমরা আপনার জন্য যেকোনো সমস্যা সমাধান করব।</p>', '1697738998-product-img.jpeg', 1, 0, 1, 0, 1, '2023-10-19 12:09:59', '2023-10-19 12:10:13'),
(19, 15, 16, 18, 30, 'Fashionable Shoes for Men', 'পুরুষদের জন্য ফ্যাশনেবল জুতা', 'fashionable-shoes-for-men', 'পুরুষদের-জন্য-ফ্যাশনেবল-জুতা', 'S101', '7', 'shoe,men\'s shoe,footwear', 'জুতা,পাদুকা', '39,40,41,42,43', '39,40,41,42,43', 'black', 'কালো', '350', '2', NULL, 'These pairs are incredibly stylish in addition to being comfortable. A classic must-have for men. We have the best price and service. This shoe is more convenient to put on, presents uniform and smooth line texture, and is simple and elegant. Lightweight Rubber Outsole: Features a soft cushioned rubber sole for elegance, style and simplicity. Clear texture design, strong grip, non-slip and wear-resistant. The durable rubber outsole provides traction on a variety of surfaces. The fabric is comfortable and delicate: exudes natural luster, highlights quality, and shows men\'s casual style.', 'এই জোড়াগুলি আরামদায়ক হওয়ার পাশাপাশি অবিশ্বাস্যভাবে আড়ম্বরপূর্ণ। একটি ক্লাসিক পুরুষদের জন্য থাকা আবশ্যক. আমরা সেরা মূল্য এবং পরিষেবা আছে. এই জুতাটি পরতে আরও সুবিধাজনক, অভিন্ন এবং মসৃণ লাইন টেক্সচার উপস্থাপন করে এবং সহজ এবং মার্জিত। লাইটওয়েট রাবার আউটসোল: কমনীয়তা, শৈলী এবং সরলতার জন্য একটি নরম কুশনযুক্ত রাবারের সোল বৈশিষ্ট্যযুক্ত। পরিষ্কার টেক্সচার ডিজাইন, শক্তিশালী গ্রিপ, নন-স্লিপ এবং পরিধান-প্রতিরোধী। টেকসই রাবার আউটসোল বিভিন্ন পৃষ্ঠের উপর ট্র্যাকশন প্রদান করে। ফ্যাব্রিক আরামদায়ক এবং সূক্ষ্ম: প্রাকৃতিক দীপ্তি প্রকাশ করে, গুণমানকে হাইলাইট করে এবং পুরুষদের নৈমিত্তিক শৈলী দেখায়।', '<p>Happy shopping Standard size If your feet are wider, please choose the bigger one</p>\r\n\r\n<ul>\r\n	<li>EUsize 39 = US size 6.5 = UK size 6.5 = foot length 24.5</li>\r\n	<li>EU size 40 = US size 7.0 = UK size 7.0 = foot length 25.0</li>\r\n	<li>EU size 41 = US size 8.0 = UK size 7.5 = foot length 25.5</li>\r\n	<li>EU size 42 = US size 8.5 = UK size 8.0 = foot length 26.0</li>\r\n	<li>EU size 43 = US size 9.0 = UK size 8.5 = foot length 26.5</li>\r\n	<li>EU size 44 = US size 10 = UK size 9.5 = foot length 27.0</li>\r\n</ul>\r\n\r\n<p>Thank you If you have any questions about our products, please feel free to contact us, we will solve any problems for you.</p>', '<p>শুভ শপিং স্ট্যান্ডার্ড সাইজ যদি আপনার পা চওড়া হয়, তাহলে অনুগ্রহ করে বড়টি বেছে নিন</p>\r\n\r\n<ul>\r\n	<li>EUsize 39 = US আকার 6.5 = UK আকার 6.5 = ফুট দৈর্ঘ্য 24.5</li>\r\n	<li>EU আকার 40 = US আকার 7.0 = UK আকার 7.0 = ফুট দৈর্ঘ্য 25.0</li>\r\n	<li>EU আকার 41 = US আকার 8.0 = UK আকার 7.5 = ফুট দৈর্ঘ্য 25.5</li>\r\n	<li>EU আকার 42 = US আকার 8.5 = UK আকার 8.0 = ফুট দৈর্ঘ্য 26.0</li>\r\n	<li>EU আকার 43 = US আকার 9.0 = UK আকার 8.5 = ফুট দৈর্ঘ্য 26.5</li>\r\n	<li>EU আকার 44 = US আকার 10 = UK আকার 9.5 = ফুট দৈর্ঘ্য 27.0</li>\r\n</ul>\r\n\r\n<p>আপনাকে ধন্যবাদ আমাদের পণ্য সম্পর্কে আপনার কোন প্রশ্ন থাকলে, অনুগ্রহ করে আমাদের সাথে যোগাযোগ করুন, আমরা আপনার জন্য যেকোনো সমস্যা সমাধান করব।</p>', '1697738998-product-img.jpeg', 1, 0, 1, 0, 1, '2023-10-19 12:09:59', '2023-10-19 12:10:13'),
(20, 15, 16, 18, 30, 'Fashionable Shoes for Men', 'পুরুষদের জন্য ফ্যাশনেবল জুতা', 'fashionable-shoes-for-men', 'পুরুষদের-জন্য-ফ্যাশনেবল-জুতা', 'S101', '7', 'shoe,men\'s shoe,footwear', 'জুতা,পাদুকা', '39,40,41,42,43', '39,40,41,42,43', 'black', 'কালো', '350', '2', NULL, 'These pairs are incredibly stylish in addition to being comfortable. A classic must-have for men. We have the best price and service. This shoe is more convenient to put on, presents uniform and smooth line texture, and is simple and elegant. Lightweight Rubber Outsole: Features a soft cushioned rubber sole for elegance, style and simplicity. Clear texture design, strong grip, non-slip and wear-resistant. The durable rubber outsole provides traction on a variety of surfaces. The fabric is comfortable and delicate: exudes natural luster, highlights quality, and shows men\'s casual style.', 'এই জোড়াগুলি আরামদায়ক হওয়ার পাশাপাশি অবিশ্বাস্যভাবে আড়ম্বরপূর্ণ। একটি ক্লাসিক পুরুষদের জন্য থাকা আবশ্যক. আমরা সেরা মূল্য এবং পরিষেবা আছে. এই জুতাটি পরতে আরও সুবিধাজনক, অভিন্ন এবং মসৃণ লাইন টেক্সচার উপস্থাপন করে এবং সহজ এবং মার্জিত। লাইটওয়েট রাবার আউটসোল: কমনীয়তা, শৈলী এবং সরলতার জন্য একটি নরম কুশনযুক্ত রাবারের সোল বৈশিষ্ট্যযুক্ত। পরিষ্কার টেক্সচার ডিজাইন, শক্তিশালী গ্রিপ, নন-স্লিপ এবং পরিধান-প্রতিরোধী। টেকসই রাবার আউটসোল বিভিন্ন পৃষ্ঠের উপর ট্র্যাকশন প্রদান করে। ফ্যাব্রিক আরামদায়ক এবং সূক্ষ্ম: প্রাকৃতিক দীপ্তি প্রকাশ করে, গুণমানকে হাইলাইট করে এবং পুরুষদের নৈমিত্তিক শৈলী দেখায়।', '<p>Happy shopping Standard size If your feet are wider, please choose the bigger one</p>\r\n\r\n<ul>\r\n	<li>EUsize 39 = US size 6.5 = UK size 6.5 = foot length 24.5</li>\r\n	<li>EU size 40 = US size 7.0 = UK size 7.0 = foot length 25.0</li>\r\n	<li>EU size 41 = US size 8.0 = UK size 7.5 = foot length 25.5</li>\r\n	<li>EU size 42 = US size 8.5 = UK size 8.0 = foot length 26.0</li>\r\n	<li>EU size 43 = US size 9.0 = UK size 8.5 = foot length 26.5</li>\r\n	<li>EU size 44 = US size 10 = UK size 9.5 = foot length 27.0</li>\r\n</ul>\r\n\r\n<p>Thank you If you have any questions about our products, please feel free to contact us, we will solve any problems for you.</p>', '<p>শুভ শপিং স্ট্যান্ডার্ড সাইজ যদি আপনার পা চওড়া হয়, তাহলে অনুগ্রহ করে বড়টি বেছে নিন</p>\r\n\r\n<ul>\r\n	<li>EUsize 39 = US আকার 6.5 = UK আকার 6.5 = ফুট দৈর্ঘ্য 24.5</li>\r\n	<li>EU আকার 40 = US আকার 7.0 = UK আকার 7.0 = ফুট দৈর্ঘ্য 25.0</li>\r\n	<li>EU আকার 41 = US আকার 8.0 = UK আকার 7.5 = ফুট দৈর্ঘ্য 25.5</li>\r\n	<li>EU আকার 42 = US আকার 8.5 = UK আকার 8.0 = ফুট দৈর্ঘ্য 26.0</li>\r\n	<li>EU আকার 43 = US আকার 9.0 = UK আকার 8.5 = ফুট দৈর্ঘ্য 26.5</li>\r\n	<li>EU আকার 44 = US আকার 10 = UK আকার 9.5 = ফুট দৈর্ঘ্য 27.0</li>\r\n</ul>\r\n\r\n<p>আপনাকে ধন্যবাদ আমাদের পণ্য সম্পর্কে আপনার কোন প্রশ্ন থাকলে, অনুগ্রহ করে আমাদের সাথে যোগাযোগ করুন, আমরা আপনার জন্য যেকোনো সমস্যা সমাধান করব।</p>', '1697738998-product-img.jpeg', 1, 0, 1, 0, 1, '2023-10-19 12:09:59', '2023-10-19 12:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('1Q7LcEPqrWlMvRevbWi0jF7d8DZzjZ5vklBQusFh', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYXFQekNVTGZmbDJ3bmpsSkZqSzUxMkNvVHZnMExwVVlSeHJnSDlkMSI7czo0OiJsYW5nIjtzOjI6ImVuIjtzOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozODoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2FsbC1wcm9kdWN0LyZwPTAiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1698602392);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_img` varchar(255) NOT NULL,
  `slider_title` varchar(255) DEFAULT NULL,
  `slider_description` text DEFAULT NULL,
  `slider_link` varchar(255) DEFAULT NULL,
  `slider_status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_img`, `slider_title`, `slider_description`, `slider_link`, `slider_status`, `created_at`, `updated_at`) VALUES
(1, '1697386437_Slider_img.jpg', 'Slider update', 'Dress update', NULL, 0, '2023-10-15 10:05:22', '2023-10-19 10:16:43'),
(3, '1697387615_Slider_img.jpg', NULL, NULL, NULL, 1, '2023-10-15 10:33:35', '2023-10-15 10:33:35'),
(4, '1697728682_Slider_img.jpg', 'WOMEN FASHION', 'Every thing you need are over here', NULL, 1, '2023-10-19 09:18:03', '2023-10-19 09:18:03');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `subcategory_slug` varchar(255) NOT NULL,
  `subcategory_name_bn` varchar(255) NOT NULL,
  `subcategory_slug_bn` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name`, `subcategory_slug`, `subcategory_name_bn`, `subcategory_slug_bn`, `created_at`, `updated_at`) VALUES
(1, 16, 'Shirt', 'shirt', 'শার্ট', 'শার্ট', '2023-09-30 02:09:05', '2023-09-30 02:09:05'),
(8, 11, 'Laptop', 'laptop', 'ল্যাপটপ', 'ল্যাপটপ', '2023-09-30 23:11:52', '2023-09-30 23:11:52'),
(10, 11, 'Smart Phone', 'smart-phone', 'স্মার্ট ফোন', 'স্মার্ট-ফোন', '2023-09-30 23:13:22', '2023-09-30 23:13:22'),
(13, 15, 'Muslim Wear', 'muslim-wear', 'মুসলিম পরিধান', 'মুসলিম-পরিধান', '2023-09-30 23:16:44', '2023-09-30 23:16:44'),
(15, 11, 'Desktop', 'desktop', 'ডেস্কটপ', 'ডেস্কটপ', '2023-10-19 00:31:34', '2023-10-19 00:31:34'),
(16, 11, 'Cameras', 'cameras', 'ক্যামেরা', 'ক্যামেরা', '2023-10-19 00:32:05', '2023-10-19 00:32:05'),
(17, 16, 'Pents', 'pents', 'পেন্টস', 'পেন্টস', '2023-10-19 00:34:12', '2023-10-19 00:34:12'),
(18, 16, 'Shoes', 'shoes', 'জুতা', 'জুতা', '2023-10-19 00:34:43', '2023-10-19 00:34:43'),
(19, 16, 'Muslim Wear', 'muslim-wear', 'মুসলিম পরিধান', 'মুসলিম-পরিধান', '2023-10-19 00:36:02', '2023-10-19 00:36:02'),
(20, 15, 'Tops', 'tops', 'টপস', 'টপস', '2023-10-19 00:37:47', '2023-10-19 00:37:47'),
(21, 15, 'Shoes', 'shoes', 'জুতা', 'জুতা', '2023-10-19 00:38:15', '2023-10-19 00:38:15'),
(22, 15, 'Jwellery', 'jwellery', 'জহরত', 'জহরত', '2023-10-19 00:38:47', '2023-10-19 00:38:47'),
(23, 15, 'Traditional Wear', 'traditional-wear', 'ঐতিহ্যবাহী পরিধান', 'ঐতিহ্যবাহী-পরিধান', '2023-10-19 10:38:56', '2023-10-19 10:38:56'),
(24, 11, 'Monitors', 'monitors', 'মনিটর', 'মনিটর', '2023-10-19 12:19:11', '2023-10-19 12:19:11');

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_name` varchar(255) NOT NULL,
  `subsubcategory_slug` varchar(255) NOT NULL,
  `subsubcategory_name_bn` varchar(255) NOT NULL,
  `subsubcategory_slug_bn` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `category_id`, `subcategory_id`, `subsubcategory_name`, `subsubcategory_slug`, `subsubcategory_name_bn`, `subsubcategory_slug_bn`, `created_at`, `updated_at`) VALUES
(1, 16, 1, 'Men\'s Shirt', 'men\'s-shirt', 'পুরুষদের শার্ট', 'পুরুষদের-শার্ট', '2023-09-30 10:33:02', '2023-09-30 10:46:42'),
(2, 16, 1, 'Men\'s T-Shirt', 'men\'s-t-shirt', 'পুরুষদের টি-শার্ট', 'পুরুষদের-টি-শার্ট', '2023-09-30 12:05:48', '2023-09-30 12:05:48'),
(3, 11, 8, 'Gaming Laptop', 'gaming-laptop', 'গেমিং ল্যাপটপ', 'গেমিং-ল্যাপটপ', '2023-09-30 23:23:22', '2023-09-30 23:23:22'),
(4, 11, 8, 'MacBook', 'macbook', 'ম্যাকবুক', 'ম্যাকবুক', '2023-09-30 23:24:38', '2023-09-30 23:24:38'),
(5, 11, 10, 'Samsung', 'samsung', 'স্যামসাং', 'স্যামসাং', '2023-09-30 23:26:20', '2023-09-30 23:26:20'),
(9, 11, 8, 'Laptop Batteries', 'laptop-batteries', 'ল্যাপটপের ব্যাটারি', 'ল্যাপটপের-ব্যাটারি', '2023-10-19 03:08:54', '2023-10-19 03:08:54'),
(10, 11, 8, 'Laptop Accessories', 'laptop-accessories', 'ল্যাপটপ জিনিসপত্র', 'ল্যাপটপ-জিনিসপত্র', '2023-10-19 03:09:32', '2023-10-19 03:09:32'),
(11, 11, 8, 'Laptop Cooler', 'laptop-cooler', 'ল্যাপটপ কুলার', 'ল্যাপটপ-কুলার', '2023-10-19 03:10:17', '2023-10-19 03:10:17'),
(12, 11, 8, 'All Laptop', 'all-laptop', 'সব ল্যাপটপ', 'সব-ল্যাপটপ', '2023-10-19 03:11:26', '2023-10-19 03:11:26'),
(13, 11, 10, 'Accessories', 'accessories', 'আনুষাঙ্গিক', 'আনুষাঙ্গিক', '2023-10-19 03:13:09', '2023-10-19 03:13:09'),
(14, 11, 10, 'Charger & Cables', 'charger-&-cables', 'চার্জার এবং তারগুলি', 'চার্জার-এবং-তারগুলি', '2023-10-19 03:13:45', '2023-10-19 03:13:45'),
(15, 11, 10, 'Graphics Tablet', 'graphics-tablet', 'গ্রাফিক্স ট্যাবলেট', 'গ্রাফিক্স-ট্যাবলেট', '2023-10-19 03:14:16', '2023-10-19 03:14:16'),
(16, 11, 10, 'Tablet', 'tablet', 'ট্যাবলেট', 'ট্যাবলেট', '2023-10-19 03:14:36', '2023-10-19 03:14:36'),
(17, 11, 15, 'All in one', 'all-in-one', 'একের ভিতর সব', 'একের-ভিতর-সব', '2023-10-19 03:16:29', '2023-10-19 03:16:29'),
(18, 11, 15, 'Mini PC', 'mini-pc', 'মিনি পিসি', 'মিনি-পিসি', '2023-10-19 03:16:54', '2023-10-19 03:16:54'),
(19, 11, 15, 'Brand PC', 'brand-pc', 'ব্র্যান্ড পিসি', 'ব্র্যান্ড-পিসি', '2023-10-19 03:17:18', '2023-10-19 03:17:18'),
(20, 11, 16, 'Action Camera', 'action-camera', 'অ্যাকশন ক্যামেরা', 'অ্যাকশন-ক্যামেরা', '2023-10-19 03:17:59', '2023-10-19 03:17:59'),
(21, 11, 16, 'Camera Lenses', 'camera-lenses', 'ক্যামেরা লেন্স', 'ক্যামেরা-লেন্স', '2023-10-19 03:18:25', '2023-10-19 03:18:25'),
(22, 11, 16, 'Conferencing Camera', 'conferencing-camera', 'কনফারেন্সিং ক্যামেরা', 'কনফারেন্সিং-ক্যামেরা', '2023-10-19 03:18:57', '2023-10-19 03:18:57'),
(23, 11, 16, 'Digital Camera', 'digital-camera', 'ডিজিটাল ক্যামেরা', 'ডিজিটাল-ক্যামেরা', '2023-10-19 03:19:19', '2023-10-19 03:19:19'),
(24, 11, 16, 'DSLR Camera', 'dslr-camera', 'ডিএসএলআর ক্যামেরা', 'ডিএসএলআর-ক্যামেরা', '2023-10-19 03:19:40', '2023-10-19 03:19:40'),
(25, 11, 16, 'Handycam', 'handycam', 'হ্যান্ডিক্যাম', 'হ্যান্ডিক্যাম', '2023-10-19 03:20:52', '2023-10-19 03:20:52'),
(26, 11, 16, 'Camera Accessrioes', 'camera-accessrioes', 'ক্যামেরা এক্সেসরিও', 'ক্যামেরা-এক্সেসরিও', '2023-10-19 03:21:14', '2023-10-19 03:21:14'),
(27, 15, 13, 'Hizab', 'hizab', 'হিজাব', 'হিজাব', '2023-10-19 10:23:54', '2023-10-19 10:23:54'),
(28, 16, 19, 'Panzabi', 'panzabi', 'পাঞ্জাবি', 'পাঞ্জাবি', '2023-10-19 10:24:18', '2023-10-19 10:24:18'),
(29, 16, 19, 'pajamas', 'pajamas', 'পায়জামা', 'পায়জামা', '2023-10-19 10:25:22', '2023-10-19 10:25:22'),
(30, 16, 18, 'Sports Shoe', 'sports-shoe', 'ক্রীড়া জুতা', 'ক্রীড়া-জুতা', '2023-10-19 10:26:35', '2023-10-19 10:26:35'),
(31, 16, 18, 'School Shoes', 'school-shoes', 'স্কুল জুতা', 'স্কুল-জুতা', '2023-10-19 10:27:01', '2023-10-19 10:27:01'),
(32, 16, 18, 'Office Shoes', 'office-shoes', 'অফিস জুতা', 'অফিস-জুতা', '2023-10-19 10:27:21', '2023-10-19 10:27:21'),
(33, 16, 1, 'Polo T-Shirt', 'polo-t-shirt', 'পোলো টি-শার্ট', 'পোলো-টি-শার্ট', '2023-10-19 10:27:54', '2023-10-19 10:27:54'),
(34, 16, 1, 'T-Shirt', 't-shirt', 'টি-শার্ট', 'টি-শার্ট', '2023-10-19 10:29:18', '2023-10-19 10:29:18'),
(35, 16, 1, 'Shirts', 'shirts', 'শার্ট', 'শার্ট', '2023-10-19 10:30:04', '2023-10-19 10:30:04'),
(36, 16, 18, 'Flip-Flops', 'flip-flops', 'ফ্লিপ-ফ্লপ', 'ফ্লিপ-ফ্লপ', '2023-10-19 10:32:29', '2023-10-19 10:32:29'),
(37, 16, 18, 'Rain Bots', 'rain-bots', 'রেইন বুট', 'রেইন-বুট', '2023-10-19 10:33:03', '2023-10-19 10:33:03'),
(38, 16, 18, 'Shoe\'s Accessories', 'shoe\'s-accessories', 'জুতা এর আনুষাঙ্গিক', 'জুতা-এর-আনুষাঙ্গিক', '2023-10-19 10:33:36', '2023-10-19 10:33:36'),
(39, 16, 17, 'Jeans', 'jeans', 'জিন্স', 'জিন্স', '2023-10-19 10:34:50', '2023-10-19 10:34:50'),
(40, 16, 17, 'Joggers', 'joggers', 'জগার্স', 'জগার্স', '2023-10-19 10:35:21', '2023-10-19 10:35:21'),
(41, 16, 17, 'Gabadines', 'gabadines', 'গ্যাবাডিনস', 'গ্যাবাডিনস', '2023-10-19 10:36:21', '2023-10-19 10:36:21'),
(42, 16, 17, 'Boxers & Trunks', 'boxers-&-trunks', 'বক্সার এবং ট্রাঙ্কস', 'বক্সার-এবং-ট্রাঙ্কস', '2023-10-19 10:37:10', '2023-10-19 10:37:10'),
(43, 15, 23, 'Shalwar Kameez', 'shalwar-kameez', 'শালোয়ার কামিজ', 'শালোয়ার-কামিজ', '2023-10-19 10:39:34', '2023-10-19 10:39:34'),
(44, 15, 23, 'Sarees', 'sarees', 'শাড়ি', 'শাড়ি', '2023-10-19 10:40:19', '2023-10-19 10:40:19'),
(45, 15, 23, 'Kurtis', 'kurtis', 'কুর্তিস', 'কুর্তিস', '2023-10-19 10:40:49', '2023-10-19 10:40:49'),
(46, 15, 23, 'Unstitched Fabric', 'unstitched-fabric', 'সেলাইবিহীন ফ্যাব্রিক', 'সেলাইবিহীন-ফ্যাব্রিক', '2023-10-19 10:41:37', '2023-10-19 10:41:37'),
(47, 15, 23, 'Party Kameez & Gowns', 'party-kameez-&-gowns', 'পার্টি কামিজ ও গাউন', 'পার্টি-কামিজ-ও-গাউন', '2023-10-19 10:42:11', '2023-10-19 10:42:11'),
(48, 15, 23, 'Palazzo', 'palazzo', 'পালাজ্জো', 'পালাজ্জো', '2023-10-19 10:42:51', '2023-10-19 10:42:51'),
(49, 11, 24, 'Gaming Monitor', 'gaming-monitor', 'গেমিং মনিটর', 'গেমিং-মনিটর', '2023-10-19 12:21:56', '2023-10-19 12:21:56'),
(50, 11, 24, 'Curved Monitor', 'curved-monitor', 'বাঁকা মনিটর', 'বাঁকা-মনিটর', '2023-10-19 12:22:31', '2023-10-19 12:22:31'),
(51, 11, 24, 'Monitor Accessories', 'monitor-accessories', 'আনুষাঙ্গিক নিরীক্ষণ', 'আনুষাঙ্গিক-নিরীক্ষণ', '2023-10-19 12:23:10', '2023-10-19 12:23:10'),
(52, 11, 24, 'Brand Monitors', 'brand-monitors', 'ব্র্যান্ড মনিটর', 'ব্র্যান্ড-মনিটর', '2023-10-19 12:23:57', '2023-10-19 12:23:57');

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
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@gmail.com', NULL, '$2y$10$LBTl2uYV7ObdpT.ZzxxmiOsYtrl8Uuxem67D7yi05airjjbuyFCuS', NULL, NULL, NULL, 'W8gbfFewTA1aR3JHyjnkF8NT2ZYxVOPwZguppyZ52qM4rY7rRUOuxPijSLSV', NULL, NULL, '2023-09-21 03:38:45', '2023-09-26 12:00:55'),
(2, 'tests', 'test@gmail.com', NULL, '$2y$10$R3o.191gB.5VKIxxrvO72.F2FTiQ/EZMxcD2Ceg4ZCgHBOOP.2SE2', NULL, NULL, NULL, NULL, NULL, '1695884846user-profile-image.png', '2023-09-25 23:22:47', '2023-09-28 02:57:17');

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
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
