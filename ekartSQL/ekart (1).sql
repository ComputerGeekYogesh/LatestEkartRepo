-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2021 at 06:32 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ekart`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `group_id` int(11) NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `group_id`, `url`, `name`, `description`, `image`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'fan', 'Fan', 'This is the best brand for fan product', '1615194175-JPG', '1615194175-JPG', 0, '2021-03-08 03:32:55', '2021-03-16 12:43:41'),
(2, 2, 'mens wear', 'Mens Wear', 'best jejkn jjs jsnj', '1615916319-jpg', '1615916319-jpg', 0, '2021-03-16 12:08:39', '2021-03-16 12:24:01'),
(3, 3, 'mobile', 'Mobile', 'mobile', '1619544911-png', '1619544911-png', 0, '2021-04-27 12:05:12', '2021-04-27 12:05:12');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `offer_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `coupon_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_limit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_datetime` datetime NOT NULL,
  `end_datetime` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `visibility_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `offer_name`, `product_id`, `coupon_code`, `coupon_limit`, `coupon_type`, `coupon_price`, `start_datetime`, `end_datetime`, `status`, `visibility_status`, `created_at`, `updated_at`) VALUES
(1, 'Get 5% on all sale', '7', 'ABCD', '5', '1', '11', '2021-05-19 05:30:00', '2021-05-27 22:30:00', 0, 1, '2021-05-18 05:32:13', '2021-05-26 06:29:48'),
(2, 'Get 5% on all sale', '1', 'ABCDe', '6', '1', '1', '2021-05-18 20:35:00', '2021-05-18 20:35:00', 1, 0, '2021-05-18 05:33:27', '2021-05-20 08:08:29'),
(3, 'Get 5% on all sale', '3', 'ABCDee', '5', '1', '2', '2021-05-18 16:46:00', '2021-05-18 16:46:00', 0, 0, '2021-05-18 05:46:10', '2021-05-20 08:08:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `url`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'electronics', 'This is the description for electronics group', 0, '2021-03-08 03:30:48', '2021-03-08 03:30:48'),
(2, 'Cloths', 'cloths', 'beswvgv giwcfgywy', 0, '2021-03-16 12:06:54', '2021-03-16 12:06:54'),
(3, 'Gadget', 'mobile', 'branded', 0, '2021-04-27 12:02:50', '2021-04-27 12:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_01_26_165511_create_groups_table', 1),
(5, '2021_01_28_110918_create_category_table', 1),
(6, '2021_01_31_143850_create_subcategorys_table', 1),
(7, '2021_02_02_040756_create_products_table', 1),
(8, '2021_04_16_132632_create_orders_table', 2),
(9, '2021_04_16_132800_create_order_items_table', 2),
(10, '2021_05_01_162231_create_wishlists_table', 3),
(11, '2021_05_18_061018_create_coupons_table', 4),
(12, '2021_06_06_074730_create_sliders_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tracking_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tracking_msg` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_mode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT ' 0 - Nothing Paid                 1-Cash paid 2- Razorpaypaymentsuccessfull\r\n3-Razorpaypaymnetfailed\r\n                    4-stripe success 5- stripefail',
  `order_status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0-pending 1-Completed 2-Cancelled',
  `cancel_reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notify` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `tracking_no`, `tracking_msg`, `payment_mode`, `payment_id`, `payment_status`, `order_status`, `cancel_reason`, `notify`, `created_at`, `updated_at`) VALUES
(1, 4, 'ekart3438', NULL, 'Cash on Delivery ', NULL, 0, 0, NULL, 0, '2021-05-26 23:38:52', '2021-05-26 23:38:52'),
(2, 4, 'ekart4130', NULL, 'Cash on Delivery ', NULL, 0, 0, NULL, 0, '2021-05-26 23:42:05', '2021-05-26 23:42:05'),
(3, 4, 'ekart9306', NULL, 'Cash on Delivery ', NULL, 0, 0, NULL, 0, '2021-05-26 23:51:24', '2021-05-26 23:51:24'),
(4, 4, 'ekart3415', NULL, 'Cash on Delivery ', NULL, 0, 0, NULL, 0, '2021-05-27 00:07:18', '2021-05-27 00:07:18'),
(5, 4, 'ekart9117', NULL, 'Cash on Delivery ', NULL, 0, 0, NULL, 0, '2021-05-27 00:08:35', '2021-05-27 00:08:35'),
(6, 4, 'ekart7567', NULL, 'Cash on Delivery ', NULL, 0, 0, NULL, 0, '2021-05-27 00:12:27', '2021-05-27 00:12:27'),
(7, 4, 'ekart6329', NULL, 'Cash on Delivery ', NULL, 0, 0, NULL, 0, '2021-05-27 00:13:18', '2021-05-27 00:13:18'),
(8, 4, 'ekart1411', NULL, 'Cash on Delivery ', NULL, 0, 0, NULL, 0, '2021-05-27 00:16:58', '2021-05-27 00:16:58'),
(9, 4, 'ekart2159', NULL, 'Cash on Delivery ', NULL, 0, 0, NULL, 0, '2021-05-27 00:17:44', '2021-05-27 00:17:44'),
(10, 4, 'ekart2766', NULL, 'Cash on Delivery ', NULL, 0, 0, NULL, 0, '2021-05-27 00:18:02', '2021-05-27 00:18:02'),
(11, 4, 'ekart5459', NULL, 'Cash on Delivery ', NULL, 0, 0, NULL, 0, '2021-05-27 00:19:39', '2021-05-27 00:19:39'),
(12, 4, 'ekart9837', NULL, 'Cash on Delivery ', NULL, 0, 0, NULL, 0, '2021-05-27 00:21:22', '2021-05-27 00:21:22'),
(13, 2, 'ekart1816', NULL, 'Cash on Delivery ', NULL, 0, 0, NULL, 0, '2021-05-27 00:34:32', '2021-05-27 00:34:32'),
(14, 2, 'ekart9946', NULL, 'Cash on Delivery ', NULL, 0, 0, NULL, 0, '2021-05-27 00:38:58', '2021-05-27 00:38:58'),
(15, 2, 'ekart1191', NULL, 'Cash on Delivery ', NULL, 0, 0, NULL, 0, '2021-05-27 00:45:31', '2021-05-27 00:45:31'),
(16, 2, 'ekart3239', NULL, 'Cash on Delivery ', NULL, 0, 0, NULL, 0, '2021-05-27 00:46:46', '2021-05-27 00:46:46'),
(17, 2, 'ekart2829', NULL, 'Cash on Delivery ', NULL, 0, 0, NULL, 0, '2021-05-27 01:02:36', '2021-05-27 01:02:36'),
(18, 2, 'ekart7756', NULL, 'Cash on Delivery ', NULL, 0, 0, NULL, 0, '2021-05-27 01:03:26', '2021-05-27 01:03:26');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `tax_amt` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `discount_price` int(191) DEFAULT NULL,
  `grand_total` int(191) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `price`, `tax_amt`, `quantity`, `discount_price`, `grand_total`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 700, 18, 1, 77, 623, '2021-05-26 23:38:52', '2021-05-26 23:38:52'),
(2, 2, 4, 700, 18, 1, 77, 623, '2021-05-26 23:42:06', '2021-05-26 23:42:06'),
(3, 3, 3, 500, 18, 1, 55, 445, '2021-05-26 23:51:24', '2021-05-26 23:51:24'),
(4, 7, 3, 500, 18, 1, 0, 0, '2021-05-27 00:13:18', '2021-05-27 00:13:18'),
(5, 8, 3, 500, 18, 1, 0, 0, '2021-05-27 00:16:58', '2021-05-27 00:16:58'),
(6, 9, 3, 500, 18, 1, 55, 445, '2021-05-27 00:17:44', '2021-05-27 00:17:44'),
(7, 10, 3, 500, 18, 1, 0, 0, '2021-05-27 00:18:02', '2021-05-27 00:18:02'),
(8, 11, 3, 500, 18, 1, NULL, NULL, '2021-05-27 00:19:39', '2021-05-27 00:19:39'),
(9, 12, 3, 500, 18, 1, 55, 445, '2021-05-27 00:21:22', '2021-05-27 00:21:22'),
(10, 13, 3, 500, 18, 1, NULL, NULL, '2021-05-27 00:34:32', '2021-05-27 00:34:32'),
(11, 14, 3, 500, 18, 1, 55, 445, '2021-05-27 00:38:58', '2021-05-27 00:38:58'),
(12, 15, 3, 500, 18, 1, NULL, NULL, '2021-05-27 00:45:31', '2021-05-27 00:45:31'),
(13, 16, 3, 500, 18, 1, 55, 445, '2021-05-27 00:46:47', '2021-05-27 00:46:47'),
(14, 17, 8, 9000, NULL, 1, 990, 8010, '2021-05-27 01:02:36', '2021-05-27 01:02:36'),
(15, 18, 8, 9000, NULL, 1, 990, 8010, '2021-05-27 01:03:26', '2021-05-27 01:03:26');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `small_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_highlight_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_highlight` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_description_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_details_heading` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_details` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_tag` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `original_price` int(11) DEFAULT NULL,
  `offer_price` int(11) DEFAULT NULL,
  `tax_amt` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `new_arrival_products` tinyint(4) NOT NULL DEFAULT 0,
  `featured_products` tinyint(4) NOT NULL DEFAULT 0,
  `popular_products` tinyint(4) NOT NULL DEFAULT 0,
  `offers_products` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `meta_title` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `name`, `url`, `small_description`, `image`, `p_highlight_heading`, `p_highlight`, `p_description_heading`, `p_description`, `p_details_heading`, `p_details`, `sale_tag`, `original_price`, `offer_price`, `tax_amt`, `quantity`, `priority`, `new_arrival_products`, `featured_products`, `popular_products`, `offers_products`, `status`, `meta_title`, `meta_description`, `meta_keyword`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Havells classic fan', 'havells', '<div><span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 14px;\">Solar panel , battery back upto 4-5 hours ,easily operated by a remote, has up-to 7 hours timer mode plus runs on electricity as well. 2) Has got a 2.2 litre water tank and the water lasts in the tank for 8 hours. 3) Can be used for sanitizing purpose as well which will keep your houses and offices protected. Introducing for the first time in India MIST fan which runs without electricity on solar panel and battery back up.&nbsp;</span><br></div>', '1615194798-jpg', 'High Lights Custom', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 14px;\"><li class=\"_21Ahn-\" style=\"margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">MIST FAN</li><li class=\"_21Ahn-\" style=\"margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">FAN</li><li class=\"_21Ahn-\" style=\"margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">SOLAR FAN</li><li class=\"_21Ahn-\" style=\"margin: 0px; padding: 0px 0px 0px 16px; list-style: none; position: relative;\">ELECTRIC FAN</li></ul>', 'Product Description Custom', '<div><br></div><div><span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 14px;\">1)Solar panel , battery back upto 4-5 hours ,easily operated by a remote, has up-to 7 hours timer mode plus runs on electricity as well. 2) Has got a 2.2 litre water tank and the water lasts in the tank for 8 hours. 3) Can be used for sanitizing purpose as well which will keep your houses and offices protected. Introducing for the first time in India MIST fan which runs without electricity on solar panel and battery back up. Can be easily operated by a remote. Gives cool fresh air with mist waving goodbye to summer heat and power cuts. Adjustable Height upto 4 feet. Fan diameter size :- 16inch .</span><br></div>', 'Product Details/Specification Custoem', '<div><br></div><div><span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 14px;\">1)Solar panel , battery back upto 4-5 hours ,easily operated by a remote, has up-to 7 hours timer mode plus runs on electricity as well. 2) Has got a 2.2 litre water tank and the water lasts in the tank for 8 hours. 3) Can be used for sanitizing purpose as well which will keep your houses and offices protected. Introducing for the first time in India MIST fan which runs without electricity on solar panel and battery back up. Can be easily operated by a remote. Gives cool fresh air with mist waving goodbye to summer heat and power cuts. Adjustable Height upto 4 feet. Fan diameter size :- 16inch .</span><br></div>', '1', 1000, 800, '18', 1, 1, 0, 0, 0, 0, 0, 'Havells classic fan', 'Havells classic fan, havells brand, new featured', 'Havells classic fan,  havells brand, new featured', '2021-03-08 03:43:18', '2021-05-02 01:35:00'),
(2, 1, 1, 'Havells classic fan', 'havells', '.', '1615195008-jpg', NULL, NULL, NULL, NULL, NULL, NULL, '1', 1000, 333, '18', 1, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, '2021-03-08 03:46:48', '2021-05-18 07:38:35'),
(3, 2, 2, 'kelvin', 'kelvin very interesting jeans', 'kelvin very interesting jeans', '1615916566-JPG', 'High Lights Custom', '<ul style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 14px;\"><li class=\"_21Ahn-\" style=\"margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">MIST FAN</li><li class=\"_21Ahn-\" style=\"margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">FAN</li><li class=\"_21Ahn-\" style=\"margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">SOLAR FAN</li><li class=\"_21Ahn-\" style=\"margin: 0px; padding: 0px 0px 0px 16px; list-style: none; position: relative;\">ELECTRIC FAN</li></ul>', 'Product Description Custom', '<span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 14px;\">1)Solar panel , battery back upto 4-5 hours ,easily operated by a remote, has up-to 7 hours timer mode plus runs on electricity as well. 2) Has got a 2.2 litre water tank and the water lasts in the tank for 8 hours. 3) Can be used for sanitizing purpose as well which will keep your houses and offices protected. Introducing for the first time in India MIST fan which runs without electricity on solar panel and battery back up. Can be easily operated by a remote. Gives cool fresh air with mist waving goodbye to summer heat and power cuts. Adjustable Height upto 4 feet. Fan diameter size :- 16inch .</span>', 'Product Details/Specification Custoem', '<span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 14px;\">1)Solar panel , battery back upto 4-5 hours ,easily operated by a remote, has up-to 7 hours timer mode plus runs on electricity as well. 2) Has got a 2.2 litre water tank and the water lasts in the tank for 8 hours. 3) Can be used for sanitizing purpose as well which will keep your houses and offices protected. Introducing for the first time in India MIST fan which runs without electricity on solar panel and battery back up. Can be easily operated by a remote. Gives cool fresh air with mist waving goodbye to summer heat and power cuts. Adjustable Height upto 4 feet. Fan diameter size :- 16inch .</span>', '1', 6000, 500, '18', 1, 1, 1, 0, 0, 0, 0, NULL, NULL, NULL, '2021-03-16 12:12:46', '2021-04-30 06:22:41'),
(4, 1, 1, 'Havells ultimate fan', 'Havells ultimate fan', 'this is the best induction', '1616324607-JPG', NULL, NULL, NULL, NULL, NULL, NULL, '2', 900, 700, '18', 3, 2, 1, 0, 0, 0, 0, NULL, NULL, NULL, '2021-03-21 05:33:27', '2021-04-30 06:31:52'),
(5, 3, 3, 'redmi 3s prime', 'redmi 3s prime', 'small', '1619545120-png', NULL, NULL, NULL, NULL, NULL, NULL, '2', 7000, 5000, NULL, 1, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, '2021-04-27 12:08:40', '2021-04-30 08:10:41'),
(6, 1, 4, 'Bajaj fans', 'bajaj', 'bajaj is vakajfa kanf asn', '1619633026-jpg', NULL, NULL, NULL, NULL, NULL, NULL, '4', 5000, 3000, NULL, 3, 2, 0, 0, 0, 0, 0, NULL, NULL, NULL, '2021-04-28 12:33:46', '2021-04-30 07:51:38'),
(7, 1, 4, 'bajaj1', 'bajaj1', 'asds', '1619634514-jpg', NULL, NULL, NULL, NULL, NULL, NULL, '1', 5000, 4000, NULL, 5, 2, 0, 0, 0, 0, 0, NULL, NULL, NULL, '2021-04-28 12:58:34', '2021-04-28 12:58:34'),
(8, 3, 5, 'iphone11', 'induction', 'aaaaaaaa', '1619702289-JPG', NULL, NULL, NULL, NULL, NULL, NULL, '3', 10000, 9000, NULL, 2, 1, 1, 0, 0, 0, 0, NULL, NULL, NULL, '2021-04-29 07:48:09', '2021-04-30 06:23:35'),
(9, 3, 5, 'iphone10', 'induction', NULL, '1619702347-JPG', NULL, NULL, NULL, NULL, NULL, NULL, '2', 3000, 2000, NULL, 2, 2, 1, 0, 0, 0, 0, NULL, NULL, NULL, '2021-04-29 07:49:07', '2021-04-30 07:51:49'),
(10, 3, 5, 'iphone9', 'havells', 'wwww', '1619702654-JPG', NULL, NULL, NULL, NULL, NULL, NULL, '1', 66, 33, NULL, 2, 2, 0, 0, 0, 0, 0, NULL, NULL, NULL, '2021-04-29 07:54:14', '2021-04-29 07:54:14'),
(11, 3, 3, 'redmi 2s prime', 'redmi 2s prime', 'wwwww', '1619702792-JPG', NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, 1, NULL, 1, 1, 1, 0, 0, 0, 0, NULL, NULL, NULL, '2021-04-29 07:56:32', '2021-04-30 06:32:50'),
(12, 1, 1, 'Havells rocking fan', 'Havells rocking fan', 'd', '1619774418-JPG', NULL, NULL, NULL, NULL, NULL, NULL, '3', 344, 33, NULL, 3, 3, 0, 0, 0, 0, 0, NULL, NULL, NULL, '2021-04-30 03:50:18', '2021-04-30 03:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `heading`, `description`, `link`, `link_name`, `image`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Come and shop', 'Best Deals', 'x', 'shop', 'http://127.0.0.1:8000/uploads/slider/1629399459.jpg', 0, '2021-08-18 08:46:49', '2021-08-19 13:33:04'),
(6, 'test', 'test', 'test', 'test', 'http://127.0.0.1:8000/uploads/slider/1629399475.jpg', 1, '2021-08-19 12:59:36', '2021-08-19 13:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `subcategorys`
--

CREATE TABLE `subcategorys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategorys`
--

INSERT INTO `subcategorys` (`id`, `category_id`, `url`, `name`, `description`, `image`, `priority`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'havells', 'Havells', 'This is the best brand product', '1615194257-JPG', 2, 0, '2021-03-08 03:34:17', '2021-05-18 08:07:05'),
(2, 2, 'jeans', 'Jeans', 'btss jd hs js', '1615916398-JPG', 1, 0, '2021-03-16 12:09:58', '2021-05-18 05:45:09'),
(3, 3, 'mi', 'mi', 'mi', '1619545010-png', 1, 0, '2021-04-27 12:06:50', '2021-04-27 12:06:50'),
(4, 1, 'bajaj', 'Bajaj', 'bajaj', '1619631931-jpg', 1, 0, '2021-04-28 12:15:31', '2021-04-28 12:15:31'),
(5, 3, 'apple', 'apple', 'apple', '1619702245-JPG', 2, 0, '2021-04-29 07:47:25', '2021-04-29 07:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alternate_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_as` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isban` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `last_name`, `address1`, `address2`, `city`, `state`, `pincode`, `phone`, `alternate_phone`, `image`, `role_as`, `isban`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'yog', 'y@s', NULL, '$2y$10$wiBrsHd9sGp5UTF58E3KbOB9fWHprdrXSkcU8U5kRG9bg3uBGR9cS', 'saini', NULL, NULL, NULL, NULL, NULL, '8888', NULL, NULL, 'admin', 0, 'RmjV6uayHWvo6Bp7OvDPLEU0TGNNmyXLkzzlsJsgHSlLXiFyHNPlqLRWUv1m', '2021-03-16 11:30:39', '2021-03-18 12:49:15'),
(4, 'yogesh saini', 'yogeshsaini7044@gmail.com', NULL, '$2y$10$xe5yiXTUrDP.zfQwmR.6ee9TasEqYH8M3/EP6y0T6zeV42sezU6oO', 'ji', NULL, NULL, NULL, NULL, NULL, '8888', NULL, NULL, NULL, 0, NULL, '2021-05-20 09:02:17', '2021-05-20 09:02:17');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `status`, `created_at`, `updated_at`) VALUES
(6, 2, 1, 0, '2021-05-02 00:14:07', '2021-05-02 00:14:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategorys`
--
ALTER TABLE `subcategorys`
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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `subcategorys`
--
ALTER TABLE `subcategorys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
