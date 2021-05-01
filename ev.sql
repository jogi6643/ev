-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2020 at 06:25 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ev`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `is_super`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'EV Admin', 'ev@gmail.com', '$2y$10$I8eAKHdgvCAiTOumoC9bZOXwnR5VA8pgidej8Ui5HuBiBr1X8MKCW', 0, 'xca8G2s453HA4xNr75RUzIyx6UDoHDbJRt5Bxeg7ZXbDyoMzrAHfThuRQi7Q', '2020-01-14 06:05:13', '2020-01-14 06:05:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_category`
--

CREATE TABLE `attribute_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_category`
--

INSERT INTO `attribute_category` (`id`, `attribute_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 1, 2, NULL, NULL),
(4, 2, 2, NULL, NULL),
(5, 3, 2, NULL, NULL),
(6, 1, 3, NULL, NULL),
(7, 2, 3, NULL, NULL),
(8, 1, 4, NULL, NULL),
(9, 2, 4, NULL, NULL),
(10, 3, 4, NULL, NULL),
(11, 1, 5, NULL, NULL),
(12, 2, 5, NULL, NULL),
(13, 3, 5, NULL, NULL),
(22, 1, 6, NULL, NULL),
(23, 2, 6, NULL, NULL),
(27, 5, 7, NULL, NULL),
(28, 2, 8, NULL, NULL),
(29, 3, 8, NULL, NULL),
(30, 4, 8, NULL, NULL),
(31, 5, 8, NULL, NULL),
(32, 1, 9, NULL, NULL),
(33, 4, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attribute_product`
--

CREATE TABLE `attribute_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `attribute_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_product`
--

INSERT INTO `attribute_product` (`id`, `attribute_id`, `product_id`, `name`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 'attr val 1', NULL, NULL),
(3, 2, 2, 'attr val 2', NULL, NULL),
(4, 3, 2, 'attr val 3', NULL, NULL),
(5, 1, 3, 'value 1', NULL, NULL),
(6, 2, 3, 'value 2', NULL, NULL),
(10, 1, 5, 'ddd', NULL, NULL),
(11, 2, 5, 'ds', NULL, NULL),
(12, 3, 5, 'dfgdfs', NULL, NULL),
(13, 1, 6, 'attribute', NULL, NULL),
(14, 2, 6, 'attribute', NULL, NULL),
(15, 3, 6, 'attribute', NULL, NULL),
(16, 1, 7, 'one', NULL, NULL),
(17, 2, 7, 'two', NULL, NULL),
(24, 1, 10, '1500', NULL, NULL),
(25, 2, 10, '1200', NULL, NULL),
(26, 4, 10, 'X', NULL, NULL),
(27, 5, 10, '65', NULL, NULL),
(30, 1, 4, 'sedan arrti', NULL, NULL),
(31, 2, 4, 'sedan arrti', NULL, NULL),
(32, 3, 4, 'sedan arrti', NULL, NULL),
(70, 1, 8, 'www', NULL, NULL),
(71, 2, 8, 'ssw', NULL, NULL),
(96, 1, 16, 'test Attribute 1', NULL, NULL),
(97, 2, 16, 'test Attribute 2', NULL, NULL),
(99, 1, 1, NULL, NULL, NULL),
(106, 1, 15, NULL, NULL, NULL),
(107, 2, 15, NULL, NULL, NULL),
(108, 3, 15, NULL, NULL, NULL),
(109, 1, 14, NULL, NULL, NULL),
(110, 2, 14, NULL, NULL, NULL),
(111, 1, 12, 'aa', NULL, NULL),
(112, 2, 12, 'aa', NULL, NULL),
(113, 1, 13, NULL, NULL, NULL),
(114, 2, 13, NULL, NULL, NULL),
(121, 1, 11, NULL, NULL, NULL),
(122, 2, 11, NULL, NULL, NULL),
(123, 1, 9, '100', NULL, NULL),
(124, 2, 9, '1200-1500', NULL, NULL),
(125, 4, 9, 'XYZ', NULL, NULL),
(126, 5, 9, '65', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attributs_table`
--

CREATE TABLE `attributs_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributs_table`
--

INSERT INTO `attributs_table` (`id`, `name`, `slug`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(1, 'new Attribute', 'new-attribute', '2020-01-14 06:16:01', '2020-11-03 05:31:32', NULL, 1),
(2, 'second attribute', 'second-attribute', '2020-01-14 06:16:48', '2020-11-04 23:09:00', NULL, 1),
(3, 'third attribute', 'third-attribute', '2020-01-14 06:17:19', '2020-01-14 06:17:19', NULL, 0),
(4, 'four attribute', 'four-attribute', '2020-01-21 00:36:48', '2020-01-22 01:59:24', NULL, 0),
(5, 'Range in km', 'range-in-km', '2020-01-21 04:24:37', '2020-11-05 00:51:46', NULL, 1),
(6, 'Test Attributes', 'test-attributes', '2020-11-03 00:34:55', '2020-11-03 00:35:32', NULL, 0),
(7, 'test Attribute 7', 'test-attribute-7', '2020-11-05 01:32:44', '2020-11-05 01:33:49', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `position` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `status`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Acura', 'brand-one', 1, 5, '2020-01-15 01:11:06', '2020-11-03 05:36:19'),
(2, 'Audi', 'brand-two', 1, 6, '2020-01-15 01:11:38', '2020-01-21 04:27:13'),
(3, 'BMW', 'brand-three', 1, 3, '2020-01-15 01:12:04', '2020-11-03 05:43:55'),
(4, 'Buick', 'brand-four', 0, 7, '2020-01-15 01:12:28', '2020-01-21 04:27:13'),
(5, 'General Motors', 'brand-five', 1, 4, '2020-01-15 01:12:55', '2020-11-03 05:36:21'),
(6, 'new brand', 'new-brand', 1, 2, '2020-01-21 00:37:17', '2020-11-03 05:43:58'),
(7, 'Hero Electric', 'hero-electric', 1, 1, '2020-01-21 04:27:01', '2020-11-03 05:43:31'),
(8, 'Test Brand1', 'test-brand1', 1, 0, '2020-11-03 01:13:18', '2020-11-03 05:43:24');

-- --------------------------------------------------------

--
-- Table structure for table `brand_product`
--

CREATE TABLE `brand_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_product`
--

INSERT INTO `brand_product` (`id`, `brand_id`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 5, 2, NULL, NULL),
(3, 5, 3, NULL, NULL),
(5, 5, 5, NULL, NULL),
(6, 5, 6, NULL, NULL),
(7, 5, 7, NULL, NULL),
(10, 7, 10, NULL, NULL),
(17, 5, 4, NULL, NULL),
(38, 5, 8, NULL, NULL),
(57, 1, 16, NULL, NULL),
(59, 5, 1, NULL, NULL),
(62, 1, 15, NULL, NULL),
(63, 1, 14, NULL, NULL),
(64, 1, 12, NULL, NULL),
(65, 1, 13, NULL, NULL),
(69, 1, 11, NULL, NULL),
(70, 7, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discription` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `position` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `discription`, `slug`, `status`, `position`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'SUV', '<p>desc</p>', 'fortuner', 0, 1, '2020-01-14 06:21:07', '2020-01-15 05:24:21', NULL),
(2, 'second category', '<p>second description</p>', 'second-category', 0, 5, '2020-01-14 06:22:58', '2020-11-03 05:16:17', NULL),
(3, 'Cruise Bike', '<p>Cruise Bike</p>\r\n\r\n<p>BIke Details</p>', 'cruise-bike', 0, 4, '2020-01-15 00:56:36', '2020-11-03 05:16:13', NULL),
(4, 'Sedan', '<p>test category four desc</p>', 'category-four', 0, 3, '2020-01-15 04:59:47', '2020-01-21 02:13:49', NULL),
(5, 'new category', '<p>test</p>', 'new-category', 0, 2, '2020-01-21 00:35:07', '2020-11-03 05:16:08', NULL),
(6, 'low speed electric scooter', '<p>low speed electric scooter jdjd</p>', 'low-speed-electric-scooter', 1, 0, '2020-01-21 04:26:23', '2020-11-03 05:16:32', NULL),
(7, 'Test Category', '<p>Test Category test</p>', 'test-category', 1, 0, '2020-11-03 00:38:44', '2020-11-03 23:46:45', NULL),
(8, 'off road', '<p>test</p>', 'off-road', 1, 0, '2020-11-05 00:56:42', '2020-11-05 00:56:42', NULL),
(9, 'Test commercial', '<p>Test</p>', 'test-commercial', 1, 0, '2020-11-05 01:34:45', '2020-11-05 01:34:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_mastercategory`
--

CREATE TABLE `category_mastercategory` (
  `id` int(10) UNSIGNED NOT NULL,
  `mastercategory_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_mastercategory`
--

INSERT INTO `category_mastercategory` (`id`, `mastercategory_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 2, NULL, NULL),
(3, 2, 3, NULL, NULL),
(4, 1, 4, NULL, NULL),
(5, 1, 5, NULL, NULL),
(8, 2, 6, NULL, NULL),
(11, 3, 7, NULL, NULL),
(12, 1, 8, NULL, NULL),
(13, 4, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `category_parent`
--

CREATE TABLE `category_parent` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_post`
--

CREATE TABLE `category_post` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 2, 4, NULL, NULL),
(3, 3, 1, NULL, NULL),
(5, 5, 4, NULL, NULL),
(6, 6, 4, NULL, NULL),
(7, 7, 1, NULL, NULL),
(10, 10, 6, NULL, NULL),
(17, 4, 4, NULL, NULL),
(38, 8, 1, NULL, NULL),
(57, 16, 1, NULL, NULL),
(59, 1, 4, NULL, NULL),
(62, 15, 4, NULL, NULL),
(63, 14, 1, NULL, NULL),
(64, 12, 1, NULL, NULL),
(65, 13, 1, NULL, NULL),
(69, 11, 1, NULL, NULL),
(70, 9, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coadmins`
--

CREATE TABLE `coadmins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `role` varchar(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coadmins`
--

INSERT INTO `coadmins` (`id`, `name`, `email`, `created_at`, `updated_at`, `status`, `phone`, `role`) VALUES
(1, 'coadminupdate', 'coadminupdate@yopmail.com', '2020-12-03 10:35:15', '2020-12-03 05:05:15', 1, '1234567890', '6'),
(2, 'coadmin1', 'coadmin1@yopmail.com', '2020-12-03 10:35:37', '2020-12-03 05:05:37', 1, '1234567890', '1'),
(3, 'jogi', 'jogi.amu@gmail.com', '2020-12-03 10:36:00', '2020-12-03 05:06:00', 1, '9898989898', NULL),
(4, 'abc update', 'abcupdate@yopmail.com', '2020-12-03 07:34:31', '2020-12-03 02:04:31', 1, '8700488718', '7');

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE `labels` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labels`
--

INSERT INTO `labels` (`id`, `name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Co-Admin', '2019-11-12 17:28:08', '2020-12-03 04:50:49', 1),
(2, 'Trainer', '2020-01-23 17:04:20', '2020-01-23 17:04:20', 1),
(4, 'Manufacturing DelhiNCR', '2020-01-27 12:15:39', '2020-01-27 12:15:39', 1),
(5, 'demo Co-admin', '2020-01-31 18:36:34', '2020-04-25 14:06:24', 0),
(6, 'Special test', '2020-02-04 13:18:29', '2020-02-04 13:18:29', 1),
(7, 'Demo1', '2020-03-23 17:03:21', '2020-03-23 17:03:21', 1),
(8, 'Project Manager', '2020-03-27 16:07:07', '2020-05-27 12:24:08', 0),
(9, 'test123', '2020-04-13 19:35:16', '2020-04-13 19:35:16', 1),
(10, 'UAT2', '2020-04-28 12:52:56', '2020-05-18 11:10:42', 1),
(11, 'Competition manager', '2020-06-23 21:34:15', '2020-06-23 21:34:15', 1),
(12, 'new role yy', '2020-12-03 02:56:11', '2020-12-03 02:56:11', 1),
(13, 'add new role', '2020-12-03 05:06:30', '2020-12-03 05:06:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `labe_module`
--

CREATE TABLE `labe_module` (
  `id` int(11) NOT NULL,
  `label_id` varchar(123) NOT NULL,
  `module_id` varchar(123) NOT NULL,
  `functions` varchar(123) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `labe_module`
--

INSERT INTO `labe_module` (`id`, `label_id`, `module_id`, `functions`, `created_at`, `updated_at`) VALUES
(1934, '2', '3', '1', '2020-05-28 20:53:39', '2020-05-28 20:53:39'),
(1933, '2', '2', '1', '2020-05-28 20:53:39', '2020-05-28 20:53:39'),
(1931, '8', '18', '1', '2020-05-27 12:24:08', '2020-05-27 12:24:08'),
(1930, '8', '15', '1', '2020-05-27 12:24:08', '2020-05-27 12:24:08'),
(1929, '8', '7', '1', '2020-05-27 12:24:08', '2020-05-27 12:24:08'),
(1928, '8', '3', '0', '2020-05-27 12:24:08', '2020-05-27 12:24:08'),
(1927, '8', '1', '1', '2020-05-27 12:24:08', '2020-05-27 12:24:08'),
(1926, '10', '18', '0', '2020-05-18 11:10:42', '2020-05-18 11:10:42'),
(1954, '6', '11', '1', '2020-12-03 04:47:05', '2020-12-03 04:47:05'),
(1953, '6', '10', '1', '2020-12-03 04:47:05', '2020-12-03 04:47:05'),
(1952, '6', '9', '1', '2020-12-03 04:47:05', '2020-12-03 04:47:05'),
(1951, '6', '7', '0', '2020-12-03 04:47:05', '2020-12-03 04:47:05'),
(1925, '10', '15', '0', '2020-05-18 11:10:42', '2020-05-18 11:10:42'),
(1924, '10', '14', '1', '2020-05-18 11:10:42', '2020-05-18 11:10:42'),
(1923, '10', '13', '0', '2020-05-18 11:10:42', '2020-05-18 11:10:42'),
(880, '5', '8', '0', '2020-04-25 14:06:24', '2020-04-25 14:06:24'),
(1961, '1', '3', '0', '2020-12-03 04:50:49', '2020-12-03 04:50:49'),
(1922, '10', '16', '1', '2020-05-18 11:10:42', '2020-05-18 11:10:42'),
(806, '4', '11', '1', '2020-04-13 12:05:12', '2020-04-13 12:05:12'),
(805, '4', '10', '1', '2020-04-13 12:05:12', '2020-04-13 12:05:12'),
(804, '4', '9', '1', '2020-04-13 12:05:12', '2020-04-13 12:05:12'),
(807, '4', '12', '1', '2020-04-13 12:05:12', '2020-04-13 12:05:12'),
(808, '4', '13', '0', '2020-04-13 12:05:12', '2020-04-13 12:05:12'),
(809, '4', '14', '0', '2020-04-13 12:05:12', '2020-04-13 12:05:12'),
(1921, '10', '12', '0', '2020-05-18 11:10:42', '2020-05-18 11:10:42'),
(851, '9', '18', '1', '2020-04-14 23:25:15', '2020-04-14 23:25:15'),
(850, '9', '15', '1', '2020-04-14 23:25:15', '2020-04-14 23:25:15'),
(849, '9', '2', '1', '2020-04-14 23:25:15', '2020-04-14 23:25:15'),
(848, '9', '1', '0', '2020-04-14 23:25:15', '2020-04-14 23:25:15'),
(1932, '2', '1', '0', '2020-05-28 20:53:39', '2020-05-28 20:53:39'),
(1920, '10', '11', '0', '2020-05-18 11:10:42', '2020-05-18 11:10:42'),
(1919, '10', '10', '0', '2020-05-18 11:10:42', '2020-05-18 11:10:42'),
(1918, '10', '9', '0', '2020-05-18 11:10:42', '2020-05-18 11:10:42'),
(1917, '10', '8', '0', '2020-05-18 11:10:42', '2020-05-18 11:10:42'),
(1916, '10', '7', '0', '2020-05-18 11:10:42', '2020-05-18 11:10:42'),
(1915, '10', '6', '0', '2020-05-18 11:10:42', '2020-05-18 11:10:42'),
(1914, '10', '5', '0', '2020-05-18 11:10:42', '2020-05-18 11:10:42'),
(1913, '10', '3', '0', '2020-05-18 11:10:42', '2020-05-18 11:10:42'),
(1912, '10', '2', '0', '2020-05-18 11:10:42', '2020-05-18 11:10:42'),
(1935, '2', '5', '0', '2020-05-28 20:53:39', '2020-05-28 20:53:39'),
(1936, '2', '6', '1', '2020-05-28 20:53:39', '2020-05-28 20:53:39'),
(1937, '2', '15', '1', '2020-05-28 20:53:39', '2020-05-28 20:53:39'),
(1938, '11', '1', '0', '2020-06-23 21:34:56', '2020-06-23 21:34:56'),
(1939, '11', '2', '1', '2020-06-23 21:34:56', '2020-06-23 21:34:56'),
(1940, '11', '6', '0', '2020-06-23 21:34:56', '2020-06-23 21:34:56'),
(1941, '11', '10', '0', '2020-06-23 21:34:56', '2020-06-23 21:34:56'),
(1942, '11', '11', '1', '2020-06-23 21:34:56', '2020-06-23 21:34:56'),
(1943, '11', '12', '0', '2020-06-23 21:34:56', '2020-06-23 21:34:56'),
(1944, '11', '16', '1', '2020-06-23 21:34:56', '2020-06-23 21:34:56'),
(1960, '1', '2', '0', '2020-12-03 04:50:49', '2020-12-03 04:50:49'),
(1959, '1', '1', '1', '2020-12-03 04:50:49', '2020-12-03 04:50:49'),
(1955, '6', '12', '1', '2020-12-03 04:47:05', '2020-12-03 04:47:05'),
(1962, '13', '1', '0', '2020-12-03 05:06:54', '2020-12-03 05:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `mastercategories`
--

CREATE TABLE `mastercategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mastercategories`
--

INSERT INTO `mastercategories` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, '4 Wheeler', 1, NULL, NULL),
(2, '2 Wheeler', 1, NULL, NULL),
(3, 'E-Riksha', 1, NULL, NULL),
(4, 'Commercial', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mastercategory_product`
--

CREATE TABLE `mastercategory_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `mastercategory_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mastercategory_product`
--

INSERT INTO `mastercategory_product` (`id`, `mastercategory_id`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(5, 1, 5, NULL, NULL),
(6, 1, 6, NULL, NULL),
(7, 1, 7, NULL, NULL),
(10, 2, 10, NULL, NULL),
(17, 1, 4, NULL, NULL),
(38, 1, 8, NULL, NULL),
(57, 1, 16, NULL, NULL),
(59, 1, 1, NULL, NULL),
(62, 1, 15, NULL, NULL),
(63, 1, 14, NULL, NULL),
(64, 1, 12, NULL, NULL),
(65, 1, 13, NULL, NULL),
(69, 1, 11, NULL, NULL),
(70, 2, 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `masterproduct`
--

CREATE TABLE `masterproduct` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `masterproduct_product`
--

CREATE TABLE `masterproduct_product` (
  `id` int(10) UNSIGNED NOT NULL,
  `masterproduct_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_09_03_123844_create_role_table', 1),
(4, '2019_09_04_085851_role_user', 1),
(5, '2019_09_05_091437_create_posts_table', 1),
(6, '2019_09_05_091708_create_categories_table', 1),
(7, '2019_09_05_091727_create_tags_table', 1),
(8, '2019_09_05_091938_create_post_tag_table', 1),
(9, '2019_09_05_092011_create_category_post_table', 1),
(10, '2019_09_05_094601_create_admins_table', 1),
(11, '2020_01_04_063524_create_products_table', 1),
(12, '2020_01_04_063807_create_category_product_table', 1),
(13, '2020_01_04_063854_create_category_parent_table', 1),
(14, '2020_01_07_102556_create_attributs_table', 1),
(15, '2020_01_09_114637_create_attribute_category_table', 1),
(16, '2020_01_14_093543_create_attribute_product_table', 1),
(17, '2020_01_14_101415_create_mastercategory_table', 1),
(18, '2020_01_14_101738_create_masterproduct_table', 1),
(19, '2020_01_14_110457_create_category_mastercategory_table', 1),
(20, '2020_01_14_111710_create_masterproduct_product_table', 1),
(21, '2020_01_15_052157_create_brand_table', 2),
(22, '2020_01_15_054615_create_brand_product_table', 2),
(23, '2020_01_15_113227_create_mastercategory_product_table', 3),
(24, '2020_01_20_063658_create_variances_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`id`, `name`) VALUES
(1, 'Dashboard'),
(2, 'Attribute'),
(3, 'Category');

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `like` int(11) NOT NULL,
  `unlike` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `on_roadprice` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `position` int(11) NOT NULL DEFAULT 0,
  `product_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `states_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `parent_id`, `name`, `on_roadprice`, `price`, `description`, `image`, `status`, `position`, `product_type`, `created_at`, `updated_at`, `states_id`) VALUES
(1, 0, 'Fortuner', 500, 400, '<p><strong>Fortuner</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '[\"car-49278_1920.1606202188.jpg\",\"download.1606202195.jpg\",\"dummycar.1606202199.jpg\",\"404-error-page-templates.jpg\",\"404-error-page.png\"]', 1, 1, 'variance', '2020-01-20 05:24:22', '2020-11-24 23:24:04', 2),
(2, 1, 'fortuner model one', 100, 80, '<p><strong>Fortuner model one</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '[\"download.1579526374.jpg\",\"fortuner-2.1579526374.jpg\",\"fortuner-3.1579526374.jpg\",\"fortuner-4.1579526374.jpg\",\"fortuner-5.1579526374.jpg\"]', 1, 6, 'variance', '2020-01-20 07:49:46', '2020-11-24 23:04:31', 0),
(3, 1, 'Fortuner model  three', 1000, 250, '<p><strong>Tata tiyago</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '[\"download.1579526629.jpg\",\"fortuner-2.1579526629.jpg\",\"fortuner-3.1579526629.jpg\",\"fortuner-4.1579526629.jpg\",\"fortuner-5.1579526630.jpg\"]', 1, 2, 'variance', '2020-01-20 07:54:51', '2020-11-24 23:04:31', 0),
(4, 0, 'Toyota', 2555, 2114, '<p><strong>Toyota</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '[\"download.1580126957.jpg\",\"fortuner-2.1580126957.jpg\",\"fortuner-3.1580126957.jpg\",\"fortuner-5.1580126957.jpg\",\"fortuner-4.1580126957.jpg\"]', 1, 10, 'product', '2020-01-20 08:00:25', '2020-11-24 23:04:31', 0),
(5, 4, 'toyota yaris', 2555, 2365, '<p><strong>toyota yaris</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '[\"download.1579526629.jpg\",\"fortuner-2.1579526629.jpg\",\"fortuner-3.1579526629.jpg\",\"fortuner-4.1579526629.jpg\",\"fortuner-5.1579526630.jpg\"]', 1, 11, 'variance', '2020-01-20 08:02:12', '2020-11-24 23:04:31', 0),
(6, 1, 'fortuner model two', 600, 521, '<p>fortuner&nbsp; model two</p>', '[\"download.1579584030.jpg\",\"fortuner-4.1579584030.jpg\",\"fortuner-2.1579584030.jpg\",\"fortuner-3.1579584030.jpg\",\"fortuner-5.1579584030.jpg\"]', 1, 3, 'variance', '2020-01-20 23:51:17', '2020-11-24 23:04:31', 0),
(7, 0, 'HEXA', 500, 300, '<p>HEXA test</p>', 'null', 1, 13, 'product', '2020-01-21 00:44:59', '2020-11-24 23:01:31', 0),
(8, 7, 'hexa xm', 2500, 355, '<p>ffffff</p>', '[\"download.1579587370.jpg\",\"fortuner-2.1579587370.jpg\",\"fortuner-3.1579587370.jpg\",\"fortuner-4.1579587370.jpg\",\"fortuner-5.1579587370.jpg\"]', 1, 14, 'variance', '2020-01-21 00:46:31', '2020-11-24 23:01:31', 1),
(9, 0, 'Flash', 5000, 4900, '<p>The Innova&rsquo;s legendary capabilities have been enhanced beyond compare with the new Innova Crysta. Be it the imposing new front silhouette and bumper or the stunning diamond-cut alloy wheels, the new Innova Crysta is in a league of its own.</p>\r\n\r\n<p>If the exterior design spells dominance, the well-appointed interior is steeped in luxury and elegance. Unequalled space and plushness welcome you inside to the crafted leather seats of the new Innova Crysta. Replete with unsurpassed connectivity, safety and raw yet refined power delivery, it gives you a truly unmatched and unrivaled travelling experience.</p>', '[\"download.1579600811.jpg\",\"fortuner-2.1579600812.jpg\",\"fortuner-3.1579600812.jpg\",\"fortuner-4.1579600812.jpg\",\"fortuner-5.1579600812.jpg\"]', 1, 15, 'product', '2020-01-21 04:30:42', '2020-11-25 23:05:58', 0),
(10, 9, 'LDi', 4500, 4000, '<p>LDi for test demo</p>', '[\"download.1579601146.jpg\",\"fortuner-2.1579601146.jpg\",\"fortuner-3.1579601146.jpg\",\"fortuner-4.1579601146.jpg\"]', 1, 16, 'variance', '2020-01-21 04:36:43', '2020-11-24 23:01:31', 0),
(11, 0, 'Toyota Innova Crysta.', 100, 50, '<p>At&nbsp;<strong>CARS24</strong>, we ensure that the entire process of selling used cars is a matter of hours, and the customer leaves the branch keeping intact all the happy memories of his old car. We buy your car at the right price. After a comprehensive car inspection, you receive used car valuation and thousands of our channel partners compete with each other to give you the right price of your car. We buy your car in a single &hellip;</p>', '[\"download (1).1606311576.jpg\",\"images (1).jpg\",\"download.1606311587.jpg\",\"car-5725334_640.1606311595.jpg\",\"images.1606311606.jpg\"]', 1, 9, 'product', '2020-11-03 01:29:22', '2020-11-25 08:13:52', 0),
(12, 0, 'ss', 1000, 1200, '<p>Search for used cars and second hand cars in India. Buy or sell your used car or second hand car in India and get car buying tips at First ever Indian online car retail portal,&nbsp;<strong>Cars24</strong>.in. at&nbsp;<strong>Cars24</strong>.in. Find a second hand car, used car or new car - Maruti, Tata, Hyudai, Chevrolet, Toyota, Mahindra, Ford, Opel, Skoda.</p>', 'null', 1, 8, 'variance', '2020-11-21 05:50:43', '2020-11-25 07:52:15', 3),
(13, 0, 'jump', 1000, 1200, '<p>Money-back Guarantee is a unique proposition given to customers who are buying Cars through&nbsp;<strong>Cars24</strong>. A buyer can return the car within 14 days from the date of token. Applicable only on cars with Money-back Guarantee Tag. In order to return the car, Buyer will have to coordinate with&nbsp;<strong>Cars24</strong>&nbsp;representative and drive it to the city&rsquo;s parking yard as suggested by the representative. The car should not have travelled &hellip;</p>', 'null', 1, 4, 'product', '2020-11-21 05:51:30', '2020-11-25 07:53:41', 0),
(14, 0, 'test', 1200, 1300, '<h1>At&nbsp;<strong>CARS24</strong>, we ensure that the entire process of selling used cars is a matter of hours, and the customer leaves the branch keeping intact all the happy memories of his old car. We buy your car at the right price. After a comprehensive car inspection, you receive used car valuation and thousands of our channel partners compete with each other to give you the right price of your car. We buy your car in a single &hellip;</h1>\r\n\r\n<p>&nbsp;</p>', 'null', 1, 12, 'variance', '2020-11-21 06:12:06', '2020-11-25 07:49:14', 1),
(15, 0, 'Renault Kwid', 1000, 1200, '<p>On 15 May 2013, US authorities seized accounts associated with Mt. Gox after discovering it had not registered as a&nbsp;<a href=\"https://en.wikipedia.org/wiki/Money_transmitter\" title=\"Money transmitter\">money transmitter</a>&nbsp;with FinCEN in the US.<sup><a href=\"https://en.wikipedia.org/wiki/Bitcoin#cite_note-54\">[49]</a></sup><sup><a href=\"https://en.wikipedia.org/wiki/Bitcoin#cite_note-ABA_FINCEN-55\">[50]</a></sup>&nbsp;On 23 June 2013, the US&nbsp;<a href=\"https://en.wikipedia.org/wiki/Drug_Enforcement_Administration\" title=\"Drug Enforcement Administration\">Drug Enforcement Administration</a>&nbsp;listed ₿11.02 as a seized asset in a&nbsp;<a href=\"https://en.wikipedia.org/wiki/United_States_Department_of_Justice\" title=\"United States Department of Justice\">United States Department of Justice</a>&nbsp;seizure notice pursuant to 21 U.S.C. &sect; 881. This marked the first time a government agency had seized bitcoin.<sup><a href=\"https://en.wikipedia.org/wiki/Bitcoin#cite_note-56\">[51]</a></sup>&nbsp;The FBI seized about ₿30,000<sup><a href=\"https://en.wikipedia.org/wiki/Bitcoin#cite_note-draper-57\">[52]</a></sup>&nbsp;in October 2013 from the&nbsp;<a href=\"https://en.wikipedia.org/wiki/Dark_web\" title=\"Dark web\">dark web</a>&nbsp;website Silk Road, following the arrest of&nbsp;<a href=\"https://en.wikipedia.org/wiki/Ross_William_Ulbricht\" title=\"Ross William Ulbricht\">Ross William Ulbricht</a>.<sup><a href=\"https://en.wikipedia.org/wiki/Bitcoin#cite_note-58\">[53]</a></sup><sup><a href=\"https://en.wikipedia.org/wiki/Bitcoin#cite_note-59\">[54]</a></sup><sup><a href=\"https://en.wikipedia.org/wiki/Bitcoin#cite_note-60\">[55]</a></sup>&nbsp;These bitcoins were sold at&nbsp;<a href=\"https://en.wikipedia.org/wiki/First-price_sealed-bid_auction\" title=\"First-price sealed-bid auction\">blind auction</a>&nbsp;by the&nbsp;<a href=\"https://en.wikipedia.org/wiki/United_States_Marshals_Service\" title=\"United States Marshals Service\">United States Marshals Service</a>&nbsp;to venture capital investor&nbsp;<a href=\"https://en.wikipedia.org/wiki/Tim_Draper\" title=\"Tim Draper\">Tim Draper</a>.<sup><a href=\"https://en.wikipedia.org/wiki/Bitcoin#cite_note-draper-57\">[52]</a></sup>&nbsp;Bitcoin&#39;s price rose to $755 on 19 November and crashed by 50% to $378 the same day. On 30 November 2013 the price reached $1,163 before starting a long-term crash, declining by 87% to $152 in January 2015.<sup><a href=\"https://en.wikipedia.org/wiki/Bitcoin#cite_note-MktWatch09022018-43\">[38</a></sup></p>', '[\"download (1).1606280892.jpg\",\"images.1606280899.jpg\"]', 1, 5, 'variance', '2020-11-21 06:20:59', '2020-11-25 07:46:44', 1),
(16, 1, 'Hyundai Honda.', 120000, 100000, '<ul>\r\n	<li>Available across nine variants &ndash; three petrol-manuals, three petrol-automatics and three diesel-manuals.</li>\r\n	<li>We recommend the petrol-automatic configuration for an effortless drive.</li>\r\n	<li>VX variant spells the most value for money.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>', '[\"car-49278_1920.1606203667.jpg\",\"download.1606203681.jpg\",\"dummycar.1606203685.jpg\",\"download (1).jpg\",\"images.jpg\"]', 1, 7, 'variance', '2020-11-24 02:15:24', '2020-11-24 23:04:31', 2);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(2000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'State 1', '2020-11-24 12:43:08', '2020-11-24 07:13:08', 1),
(2, 'State 2', '2020-11-21 08:00:59', '2020-11-21 02:30:59', 1),
(3, 'State 3', '2020-11-21 08:01:01', '2020-11-21 02:31:01', 1),
(4, 'state 4', '2020-11-24 22:54:16', '2020-11-24 22:54:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Prof. Malvina Streich1', 'towne.wilfredo@example.net', '$2y$10$ZekLCTwrMYyb9tPIL26r1u0XEuGZFZx9JBec5r3Udb0F7a3tnrI9C', 'DClreQq2Bq', '2020-01-14 06:05:12', '2020-11-03 06:38:58', NULL),
(2, 'Jocelyn Goodwin', 'alec29@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'ub2ZZIFCg8', '2020-01-14 06:05:12', '2020-01-14 06:05:12', NULL),
(3, 'Piper Casper', 'afton23@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Q8bOzDJPFC', '2020-01-14 06:05:12', '2020-01-14 06:05:12', NULL),
(4, 'Prof. Stephan Jerde IV', 'roselyn.strosin@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '4Nkie0fmRO', '2020-01-14 06:05:12', '2020-01-14 06:05:12', NULL),
(5, 'Dr. Myrl Rippin', 'lawson42@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'GVyKGHNk6Z', '2020-01-14 06:05:12', '2020-01-14 06:05:12', NULL),
(6, 'Dr. Reymundo Macejkovic MD', 'schneider.sean@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '1VrUKg9wJa', '2020-01-14 06:05:12', '2020-01-14 06:05:12', NULL),
(7, 'Jamir Ward', 'sydnee61@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'dQQ95ofRP7', '2020-01-14 06:05:12', '2020-01-14 06:05:12', NULL),
(8, 'Miss Hallie Stoltenberg II', 'janice38@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Bk7y4GvEu4', '2020-01-14 06:05:12', '2020-01-14 06:05:12', NULL),
(9, 'Modesta Bernier Sr.', 'mandy.leannon@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'U9ZPXd4x8d', '2020-01-14 06:05:12', '2020-01-14 06:05:12', NULL),
(10, 'Damien Funk I', 'rose.mohr@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'rtcCBoQV95', '2020-01-14 06:05:12', '2020-01-14 06:05:12', NULL),
(11, 'Dr. Myles Connelly DDS', 'wsenger@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'keyF7IECME', '2020-01-14 06:05:12', '2020-01-14 06:05:12', NULL),
(12, 'Melody VonRueden DVM', 'goodwin.audrey@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'madYtwzpjl', '2020-01-14 06:05:12', '2020-01-14 06:05:12', NULL),
(13, 'Lucinda Swaniawski', 'allen76@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'WD7bYYVJHQ', '2020-01-14 06:05:13', '2020-01-14 06:05:13', NULL),
(14, 'Dr. Emerald Ratke V', 'osatterfield@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'dfmoNNeEUi', '2020-01-14 06:05:13', '2020-01-14 06:05:13', NULL),
(15, 'Caroline Bartell', 'rbeer@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'jsqrtBCKvs', '2020-01-14 06:05:13', '2020-01-14 06:05:13', NULL),
(16, 'Mrs. Everette Durgan', 'rodrigo.predovic@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'BFK4dA7eND', '2020-01-14 06:05:13', '2020-01-14 06:05:13', NULL),
(17, 'Marisa McLaughlin', 'danny06@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'rTD9HkJuJ0', '2020-01-14 06:05:13', '2020-01-14 06:05:13', NULL),
(18, 'Vicente Abernathy PhD', 'lblanda@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'i6seDMyJlh', '2020-01-14 06:05:13', '2020-01-14 06:05:13', NULL),
(19, 'Camron Gerlach', 'hahn.clint@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'fCovrbakwS', '2020-01-14 06:05:13', '2020-01-14 06:05:13', NULL),
(20, 'Enos Hilpert', 'oren01@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'eaWRyNRV25', '2020-01-14 06:05:13', '2020-01-14 06:05:13', NULL),
(21, 'Ransom Hodkiewicz', 'rnolan@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '56jG4wtKxZ', '2020-01-14 06:05:13', '2020-01-14 06:05:13', NULL),
(22, 'Augustus Lakin', 'simonis.dejuan@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'vVKkUrFewo', '2020-01-14 06:05:13', '2020-01-14 06:05:13', NULL),
(23, 'Susana Kutch MD', 'twilkinson@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'o5QXliXWB8', '2020-01-14 06:05:13', '2020-01-14 06:05:13', NULL),
(24, 'Cathrine Homenick V', 'litzy78@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', '9gCqQF4eru', '2020-01-14 06:05:13', '2020-01-14 06:05:13', NULL),
(25, 'Gregorio Corwin', 'lawson57@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'mr7gbGtSva', '2020-01-14 06:05:13', '2020-01-14 06:05:13', NULL),
(26, 'Rocky Gottlieb DVM', 'janis77@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'Fuia7MIfIE', '2020-01-14 06:05:13', '2020-01-14 06:05:13', NULL),
(27, 'Vicente Lowe', 'marcelina.brakus@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'sStiQJBzur', '2020-01-14 06:05:13', '2020-01-14 06:05:13', NULL),
(28, 'Jeffery Lowe', 'sauer.cleta@example.com', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'YajkgT4hUl', '2020-01-14 06:05:13', '2020-01-14 06:05:13', NULL),
(29, 'Miss Maryam Hauck I', 'neha.runte@example.org', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'RggBDZjroQ', '2020-01-14 06:05:13', '2020-01-14 06:05:13', NULL),
(30, 'Ronny Blanda', 'silas.morar@example.net', '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', 'tW7dqiecnp', '2020-01-14 06:05:13', '2020-01-14 06:05:13', NULL),
(31, 'jugndra', 'jugendra@studiokrew.com', '$2y$10$urKePyvSgNrbPBen2eXH5ecalbWIH5Sqth7RJdpQuRjJ2We0nJRuG', 'X14Uo66BG58PYagTuqFF52QEXXsnwx4fYYqDG0VATSHeg34bcKztgwI4jwaV', '2020-11-03 00:03:42', '2020-11-03 00:03:42', NULL),
(32, 'jogi', 'jogi.amu@gmail.com', '$2y$10$0yA2Brlx9x6Lgw6rKF4Ize2oAY0EpLzao5QijQzHEJHLa019oM5uC', NULL, '2020-11-03 06:52:04', '2020-11-03 06:52:04', NULL),
(33, 'jogi', 'jogi.amu1234@gmail.com', '$2y$10$Dbl.yhITCTwj4a7Nt/2p0OFe2sC9JSVZB9soqKVKaErwpQmtUjwdq', NULL, '2020-11-03 07:19:44', '2020-11-03 07:19:44', NULL),
(34, 'jogi', 'jogi.amu1235@gmail.com', '$2y$10$AXFSfiUZTlfdI8MAkgBTsekhUxrW8VypyiIfzJsQ3DX4zNozxTFM.', NULL, '2020-11-03 07:23:12', '2020-11-03 08:01:08', NULL),
(35, 'jogi', 'jogi.amu34@gmail.com', '$2y$10$h4HPjNoK/AaTelMf6KyBsu4nM3jTzZGpAJE0X0ovn6niDEpZ.VuZy', NULL, '2020-11-03 07:41:30', '2020-11-03 07:55:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `variances`
--

CREATE TABLE `variances` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `on_roadprice` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `position` int(11) NOT NULL DEFAULT 0,
  `product_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'variance',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `variances`
--

INSERT INTO `variances` (`id`, `product_id`, `name`, `on_roadprice`, `price`, `description`, `image`, `status`, `position`, `product_type`, `created_at`, `updated_at`) VALUES
(2, 1, 'Forturner model one', 600, 400, '<p><strong>Fortuner model one</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '[\"download.1579519566.jpg\",\"fortuner-2.1579519566.jpg\",\"fortuner-3.1579519566.jpg\",\"fortuner-4.1579519566.jpg\",\"fortuner-5.1579519566.jpg\"]', 1, 0, 'variance', '2020-01-20 05:56:49', '2020-01-20 05:56:49');

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
-- Indexes for table `attribute_category`
--
ALTER TABLE `attribute_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_category_attribute_id_index` (`attribute_id`),
  ADD KEY `attribute_category_category_id_index` (`category_id`);

--
-- Indexes for table `attribute_product`
--
ALTER TABLE `attribute_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_product_attribute_id_index` (`attribute_id`),
  ADD KEY `attribute_product_product_id_index` (`product_id`);

--
-- Indexes for table `attributs_table`
--
ALTER TABLE `attributs_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_product`
--
ALTER TABLE `brand_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_product_brand_id_index` (`brand_id`),
  ADD KEY `brand_product_product_id_index` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `category_mastercategory`
--
ALTER TABLE `category_mastercategory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_mastercategory_mastercategory_id_index` (`mastercategory_id`),
  ADD KEY `category_mastercategory_category_id_index` (`category_id`);

--
-- Indexes for table `category_parent`
--
ALTER TABLE `category_parent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_post`
--
ALTER TABLE `category_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_post_category_id_foreign` (`category_id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product_product_id_index` (`product_id`),
  ADD KEY `category_product_category_id_index` (`category_id`);

--
-- Indexes for table `coadmins`
--
ALTER TABLE `coadmins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `labels`
--
ALTER TABLE `labels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `labe_module`
--
ALTER TABLE `labe_module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mastercategories`
--
ALTER TABLE `mastercategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mastercategory_product`
--
ALTER TABLE `mastercategory_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mastercategory_product_mastercategory_id_index` (`mastercategory_id`),
  ADD KEY `mastercategory_product_product_id_index` (`product_id`);

--
-- Indexes for table `masterproduct`
--
ALTER TABLE `masterproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `masterproduct_product`
--
ALTER TABLE `masterproduct_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `masterproduct_product_masterproduct_id_index` (`masterproduct_id`),
  ADD KEY `masterproduct_product_product_id_index` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_tag_post_id_foreign` (`post_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variances`
--
ALTER TABLE `variances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variances_product_id_index` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attribute_category`
--
ALTER TABLE `attribute_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `attribute_product`
--
ALTER TABLE `attribute_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `attributs_table`
--
ALTER TABLE `attributs_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brand_product`
--
ALTER TABLE `brand_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `category_mastercategory`
--
ALTER TABLE `category_mastercategory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category_parent`
--
ALTER TABLE `category_parent`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_post`
--
ALTER TABLE `category_post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `coadmins`
--
ALTER TABLE `coadmins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `labels`
--
ALTER TABLE `labels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `labe_module`
--
ALTER TABLE `labe_module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1963;

--
-- AUTO_INCREMENT for table `mastercategories`
--
ALTER TABLE `mastercategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mastercategory_product`
--
ALTER TABLE `mastercategory_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `masterproduct`
--
ALTER TABLE `masterproduct`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `masterproduct_product`
--
ALTER TABLE `masterproduct_product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_tag`
--
ALTER TABLE `post_tag`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `variances`
--
ALTER TABLE `variances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_category`
--
ALTER TABLE `attribute_category`
  ADD CONSTRAINT `attribute_category_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `attribute_product`
--
ALTER TABLE `attribute_product`
  ADD CONSTRAINT `attribute_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `brand_product`
--
ALTER TABLE `brand_product`
  ADD CONSTRAINT `brand_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_mastercategory`
--
ALTER TABLE `category_mastercategory`
  ADD CONSTRAINT `category_mastercategory_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_post`
--
ALTER TABLE `category_post`
  ADD CONSTRAINT `category_post_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_product`
--
ALTER TABLE `category_product`
  ADD CONSTRAINT `category_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `mastercategory_product`
--
ALTER TABLE `mastercategory_product`
  ADD CONSTRAINT `mastercategory_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `masterproduct_product`
--
ALTER TABLE `masterproduct_product`
  ADD CONSTRAINT `masterproduct_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `variances`
--
ALTER TABLE `variances`
  ADD CONSTRAINT `variances_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
