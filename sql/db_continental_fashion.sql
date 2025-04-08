-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 07, 2025 at 10:49 PM
-- Server version: 10.6.21-MariaDB-cll-lve
-- PHP Version: 8.3.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_continental_fashion`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, '<h3 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">What We Offer</font></h3><h3 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><ul style=\"font-size: 16px;\"><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Prescription Medications</span>: We dispense prescription medications in compliance with all local and national regulations, ensuring your safety and well-being with every order.</font></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Over-the-Counter Products</span>: From vitamins and supplements to pain relief and skincare products, we offer a wide variety of over-the-counter essentials to support your health needs.</font></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Expert Consultation</span>: Our licensed pharmacists are always available to answer your questions, provide advice, and assist with medication management.</font></li></ul></h3><h3 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">Why Choose Us?</font></h3><h3 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><ul style=\"font-size: 16px;\"><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Personalized Service</span>: We take pride in offering a personalized approach to healthcare. Each customer receives the time, attention, and advice they need to make informed decisions about their health.</font></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Quality Assurance</span>: All our products come from trusted manufacturers, ensuring that you receive only the best in terms of quality and safety.</font></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Fast and Reliable Delivery</span>: We understand that timely access to medication is crucial, which is why we offer fast, reliable shipping across India. Our goal is to deliver your medication when you need it, right at your doorstep.</font></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Affordable Healthcare</span>: We believe that cost should never be a barrier to good health. That\'s why we work to offer competitive prices on all our products, including both prescription and non-prescription items.</font></li></ul></h3>', '2025-02-10 05:02:34', '2025-02-28 11:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `zip_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `first_name`, `last_name`, `company_name`, `street`, `zip_code`, `city`, `country`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 1, 'DEEPAK', 'Verma', 'Quantum', '162 -A shivansh paradise agar road ujjain', '456006', 'Ujjain', 'India', '09174904748', '2025-03-13 19:59:56', '2025-03-13 19:59:56'),
(2, 1, 'avishek', 'mitra', 'Quantum IT Innovation', 'Ujjain', '456006', 'ujjain', 'India', '09174904749', '2025-03-18 12:40:14', '2025-03-18 12:40:14'),
(3, 1, 'anil', 'kumar', 'Quantum', 'abc', 'abc', 'abc', 'india', '12346689755', '2025-03-18 21:07:29', '2025-03-18 21:07:29'),
(4, 4, 'DEEPAK', 'Verma', 'Quantum', '162 -A shivansh paradise agar road ujjain', '456006', 'Ujjain', 'India', '09174904748', '2025-03-21 18:30:24', '2025-03-21 18:30:24'),
(8, 5, 'anil', 'kumar', 'Quantum', 'abc', 'abc', 'A', 'abc', '12345678994', '2025-03-27 20:46:51', '2025-03-27 20:46:51'),
(9, 5, 'anil', 'kumar', 'Quantum', 'GERMANY', '45678', 'GERMANY', 'GERMANY', '1234567890', '2025-03-28 13:23:08', '2025-03-28 13:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `article_name`, `created_at`, `updated_at`) VALUES
(1, 'BB 10', '2025-02-11 23:52:23', '2025-03-16 02:30:21'),
(2, 'BW 150', '2025-02-11 23:53:07', '2025-03-16 02:31:01'),
(5, 'BW 200', '2025-02-28 12:48:57', '2025-03-16 02:31:36'),
(6, 'BW 100', '2025-03-10 14:20:15', '2025-03-10 14:20:15'),
(7, 'BW 10', '2025-03-10 14:20:31', '2025-03-16 02:30:30'),
(8, '25-1500', '2025-03-16 02:32:24', '2025-03-16 02:32:24'),
(9, '25-1502', '2025-03-16 02:32:42', '2025-03-16 02:32:42'),
(10, 'BW 210', '2025-03-16 02:33:03', '2025-03-16 02:33:03'),
(11, 'BW 220', '2025-03-16 02:33:32', '2025-03-16 02:33:32'),
(12, 'BW 220N', '2025-03-16 02:33:43', '2025-03-16 02:33:43'),
(13, 'BW 230V', '2025-03-16 02:34:13', '2025-03-16 02:34:13'),
(14, 'BW 230R', '2025-03-16 02:34:25', '2025-03-16 02:34:25'),
(15, 'BW 355', '2025-03-16 02:35:23', '2025-03-16 02:35:23'),
(16, 'BW 355N', '2025-03-16 02:35:34', '2025-03-16 02:35:34'),
(17, 'BW 190', '2025-03-16 02:36:19', '2025-03-16 02:36:19'),
(18, 'BC 220W', '2025-03-16 02:36:44', '2025-03-16 02:36:44'),
(19, 'BC 220M', '2025-03-16 02:36:55', '2025-03-16 02:36:55'),
(20, 'BW 630', '2025-03-16 02:38:57', '2025-03-16 02:38:57'),
(21, 'BW 640', '2025-03-16 02:39:06', '2025-03-16 02:40:27'),
(22, 'BC 650', '2025-03-16 02:40:38', '2025-03-16 02:40:38'),
(23, '25-4501', '2025-03-16 02:41:09', '2025-03-16 02:41:09'),
(24, '25-4502', '2025-03-16 02:41:18', '2025-03-16 02:41:18'),
(25, 'BW 400', '2025-03-16 02:41:55', '2025-03-16 02:41:55'),
(26, 'K 473', '2025-03-16 02:42:46', '2025-03-16 02:42:46'),
(27, 'K 474', '2025-03-16 02:42:55', '2025-03-16 02:42:55'),
(28, 'K 476', '2025-03-16 02:43:06', '2025-03-16 02:43:06'),
(29, 'K 477', '2025-03-16 02:43:18', '2025-03-16 02:43:18'),
(30, 'BW 450', '2025-03-16 02:47:48', '2025-03-16 02:47:48'),
(31, 'BW 460', '2025-03-16 02:47:56', '2025-03-16 02:47:56'),
(32, 'BW 470', '2025-03-16 02:48:05', '2025-03-16 02:48:05'),
(33, 'BC 350W', '2025-03-16 02:48:40', '2025-03-16 02:48:40'),
(34, 'BC 355W', '2025-03-16 02:49:18', '2025-03-16 02:49:18'),
(35, 'K 479', '2025-03-16 02:51:55', '2025-03-16 02:51:55'),
(36, '16-4026', '2025-03-16 02:52:33', '2025-03-16 02:52:33'),
(37, 'K 7021', '2025-03-16 02:53:09', '2025-03-16 02:53:09'),
(38, 'BW 118', '2025-03-16 02:53:39', '2025-03-16 02:53:39'),
(39, 'BC 34-82', '2025-03-16 02:54:12', '2025-03-16 02:54:12'),
(40, 'BC 14-82', '2025-03-16 02:54:28', '2025-03-16 02:54:28'),
(41, 'BC 14-81', '2025-03-16 02:54:43', '2025-03-16 02:54:43'),
(42, 'BC 14-71', '2025-03-16 02:55:06', '2025-03-16 02:55:06'),
(43, 'BC 14-72', '2025-03-16 02:55:16', '2025-03-16 02:55:16'),
(44, 'BP 14-55-S', '2025-03-16 02:56:21', '2025-03-16 02:56:21'),
(45, 'BP 14-50-D', '2025-03-16 02:56:35', '2025-03-16 02:56:35'),
(46, 'BP 14-45-H', '2025-03-16 02:56:54', '2025-03-16 02:56:54'),
(47, 'BP 14-45-S', '2025-03-16 02:57:17', '2025-03-16 02:57:17'),
(48, 'BP 14-45-G', '2025-03-16 02:57:31', '2025-03-16 02:57:31'),
(49, 'T 10001', '2025-03-16 02:58:22', '2025-03-16 03:52:21'),
(50, 'T 10011', '2025-03-16 02:58:31', '2025-03-16 03:53:12'),
(51, 'T 10074', '2025-03-16 02:58:53', '2025-03-16 04:01:13'),
(52, '267060', '2025-03-16 02:59:16', '2025-03-16 02:59:16'),
(53, 'T 10014', '2025-03-16 02:59:40', '2025-03-16 02:59:40'),
(54, 'T 10013', '2025-03-16 02:59:50', '2025-03-16 02:59:50'),
(55, 'W 470', '2025-03-16 03:00:11', '2025-03-16 03:00:11'),
(56, 'W 475', '2025-03-16 03:00:30', '2025-03-16 03:00:30'),
(57, 'W 480', '2025-03-16 03:00:39', '2025-03-16 03:00:39'),
(58, 'W 427', '2025-03-16 03:01:06', '2025-03-16 03:01:06'),
(59, 'W 408', '2025-03-16 03:01:25', '2025-03-16 03:01:25'),
(60, 'W 407', '2025-03-16 03:01:49', '2025-03-16 03:01:49'),
(61, 'W 422', '2025-03-16 03:02:08', '2025-03-16 03:02:08'),
(62, 'T 20001', '2025-03-16 03:02:39', '2025-03-16 03:02:39'),
(63, 'T 20004', '2025-03-16 03:02:49', '2025-03-16 03:02:49'),
(64, 'T 20002', '2025-03-16 03:03:07', '2025-03-16 03:03:07'),
(65, 'T 20034', '2025-03-16 03:03:18', '2025-03-16 03:03:18'),
(66, 'T 20003', '2025-03-16 03:03:56', '2025-03-16 03:03:56'),
(67, 'T 20033', '2025-03-16 03:04:06', '2025-03-16 03:04:06'),
(68, 'RC 081X', '2025-03-16 03:04:31', '2025-03-16 03:04:31'),
(69, 'RC 084X', '2025-03-16 03:04:50', '2025-03-16 03:04:50'),
(70, 'RC 084J', '2025-03-16 03:05:08', '2025-03-16 03:05:08'),
(71, 'testing', '2025-03-18 18:36:07', '2025-03-18 18:36:07');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `image`, `description`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Our Efforts  -   your Confidence', 'banner_images/V72i39kYRMSeYc3Z8enTojw0JNzONKyxxyYV5KJs.jpg', 'Your partner for textiles and Promotional Products, efficient and reliable', 1, '2025-03-21 13:48:01', '2025-04-04 17:10:42'),
(6, 'Stock items - available immediate delivery', 'banner_images/E9GZ2VWrAIE63Y0yzVR4pJbbAyizRIVDsrqhoBE5.jpg', NULL, 1, '2025-03-21 13:50:07', '2025-04-04 17:11:52'),
(7, 'banner 3', 'banner_images/rq9gge9blogxUZIxnmcRUKwp6o3Sobkp1OjR68lx.jpg', 'banner image', 1, '2025-03-21 17:55:50', '2025-04-04 17:11:23'),
(8, 'Testing 1st april', 'banner_images/Unk98icIx41TT27YKpgDZUM9EBeZ7WbcZL2xiACU.jpg', 'xyz', 1, '2025-04-01 15:43:53', '2025-04-04 17:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_logo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_logo`, `created_at`, `updated_at`) VALUES
(13, 'BASIC WEAR', 'brand_logos/5YL5Xqp6gvq2LHUmfUSuAZBllamwv2ReS4ZgL8yp.jpg', '2025-03-14 03:03:15', '2025-03-14 03:03:15'),
(14, 'BLUE PACIFIC', 'brand_logos/MPz2FymbmctsSPL9VLAh18qogSbBBNbKSSyEmbOX.jpg', '2025-03-14 03:07:47', '2025-03-14 03:07:47'),
(15, 'KARIBAN', 'brand_logos/BOXkKkHZiWdhygxlHWRNHUwylmT89PGTXqQ3znFk.jpg', '2025-03-14 03:08:52', '2025-03-14 03:08:52'),
(16, 'BLANK CHEQUE', 'brand_logos/2EmZEGvZqxFi4mVz2PpR976yQ7z04jYUjE0ixhOA.jpg', '2025-03-14 03:12:51', '2025-03-14 03:12:51'),
(17, 'SOL\'s', 'brand_logos/GryFf3U6LEvXzTFHb7zBGF1g6GlRFIgClnXbJnXU.png', '2025-03-14 03:13:24', '2025-03-14 03:13:24');

-- --------------------------------------------------------

--
-- Table structure for table `cancellation_policies`
--

CREATE TABLE `cancellation_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cancellation_policies`
--

INSERT INTO `cancellation_policies` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, '<h2 data-start=\"135\" data-end=\"161\" style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><span data-start=\"138\" data-end=\"161\" style=\"font-weight: bolder;\">Cancellation Policy</span></h2><h3 data-start=\"163\" data-end=\"202\" style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><span data-start=\"167\" data-end=\"202\" style=\"font-weight: bolder;\">1. Cancellation by the Customer</span></h3><h2 data-start=\"135\" data-end=\"161\" style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><ul data-start=\"203\" data-end=\"547\" style=\"font-size: 16px;\"><li data-start=\"203\" data-end=\"288\">Customers can request a cancellation within&nbsp;<span data-start=\"249\" data-end=\"267\" style=\"font-weight: bolder;\">[X] hours/days</span>&nbsp;of booking/purchase.</li><li data-start=\"289\" data-end=\"419\">If the cancellation request is made&nbsp;<span data-start=\"327\" data-end=\"352\" style=\"font-weight: bolder;\">before [X] hours/days</span>&nbsp;of the scheduled service/delivery, a full refund will be provided.</li><li data-start=\"420\" data-end=\"547\">If the cancellation request is made&nbsp;<span data-start=\"458\" data-end=\"482\" style=\"font-weight: bolder;\">after [X] hours/days</span>, a cancellation fee of&nbsp;<span data-start=\"506\" data-end=\"514\" style=\"font-weight: bolder;\">[X]%</span>&nbsp;may be deducted from the refund.</li></ul></h2><h3 data-start=\"549\" data-end=\"587\" style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><span data-start=\"553\" data-end=\"587\" style=\"font-weight: bolder;\">2. Cancellation by the Company</span></h3><h2 data-start=\"135\" data-end=\"161\" style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><ul data-start=\"588\" data-end=\"876\" style=\"font-size: 16px;\"><li data-start=\"588\" data-end=\"789\">We reserve the right to cancel any order/service due to unforeseen circumstances, including but not limited to technical issues, unavailability of the product, or external factors beyond our control.</li><li data-start=\"790\" data-end=\"876\">In such cases, customers will receive a&nbsp;<span data-start=\"832\" data-end=\"847\" style=\"font-weight: bolder;\">full refund</span>&nbsp;or the option to reschedule.</li></ul></h2><h3 data-start=\"878\" data-end=\"912\" style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><span data-start=\"882\" data-end=\"912\" style=\"font-weight: bolder;\">3. Non-Refundable Services</span></h3><h2 data-start=\"135\" data-end=\"161\" style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><ul data-start=\"913\" data-end=\"1130\" style=\"font-size: 16px;\"><li data-start=\"913\" data-end=\"1021\">Some services/products may be&nbsp;<span data-start=\"945\" data-end=\"963\" style=\"font-weight: bolder;\">non-refundable</span>. These will be clearly mentioned at the time of purchase.</li><li data-start=\"1022\" data-end=\"1130\">Digital products, customized items, or promotional offers may not be eligible for cancellation or refunds.</li></ul></h2><h3 data-start=\"1132\" data-end=\"1160\" style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><span data-start=\"1136\" data-end=\"1160\" style=\"font-weight: bolder;\">4. Refund Processing</span></h3><h2 data-start=\"135\" data-end=\"161\" style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><ul data-start=\"1161\" data-end=\"1413\" style=\"font-size: 16px;\"><li data-start=\"1161\" data-end=\"1227\">Approved refunds will be processed within&nbsp;<span data-start=\"1205\" data-end=\"1226\" style=\"font-weight: bolder;\">[X] business days</span>.</li><li data-start=\"1228\" data-end=\"1315\">Refunds will be credited to the original payment method used at the time of purchase.</li><li data-start=\"1316\" data-end=\"1413\">Customers may be responsible for any transaction fees or charges applied by payment processors.</li></ul></h2><h3 data-start=\"1415\" data-end=\"1449\" style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><span data-start=\"1419\" data-end=\"1449\" style=\"font-weight: bolder;\">5. Late or Missing Refunds</span></h3><h2 data-start=\"135\" data-end=\"161\" style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><ul data-start=\"1450\" data-end=\"1650\" style=\"font-size: 16px;\"><li data-start=\"1450\" data-end=\"1558\">If you haven’t received a refund after the stated period, please check with your bank or payment provider.</li><li data-start=\"1559\" data-end=\"1650\">If the issue persists, contact our support team at&nbsp;<span data-start=\"1612\" data-end=\"1649\" style=\"font-weight: bolder;\">[your support email/phone number]</span>.</li></ul></h2><h3 data-start=\"1652\" data-end=\"1682\" style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><span data-start=\"1656\" data-end=\"1682\" style=\"font-weight: bolder;\">6. Contact Information</span></h3><h2 data-start=\"135\" data-end=\"161\" style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><p data-start=\"1683\" data-end=\"1757\" style=\"font-size: 16px;\">For any cancellation or refund-related queries, please reach out to us at:</p><ul data-start=\"1758\" data-end=\"1861\" style=\"font-size: 16px;\"><li data-start=\"1758\" data-end=\"1783\"><span data-start=\"1760\" data-end=\"1770\" style=\"font-weight: bolder;\">Email:</span>&nbsp;[your email]</li><li data-start=\"1784\" data-end=\"1818\"><span data-start=\"1786\" data-end=\"1796\" style=\"font-weight: bolder;\">Phone:</span>&nbsp;[your contact number]</li><li data-start=\"1819\" data-end=\"1861\"><span data-start=\"1821\" data-end=\"1839\" style=\"font-weight: bolder;\">Support Hours:</span>&nbsp;[your business hours]</li></ul></h2>', '2025-02-14 11:39:25', '2025-02-24 13:23:10');

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL,
  `size_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_items`
--

INSERT INTO `cart_items` (`id`, `user_id`, `product_id`, `color_id`, `size_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(38, 1, 14, 11, 4, 1, 30.00, '2025-03-27 19:44:02', '2025-03-27 19:44:02'),
(42, 1, 14, 10, 1, 2, 30.00, '2025-03-27 20:48:47', '2025-03-27 20:48:47'),
(56, 1, 15, 8, 7, 10, 5.15, '2025-03-31 23:28:41', '2025-03-31 23:28:41'),
(57, 1, 14, 8, 3, 1, 30.00, '2025-04-01 16:33:03', '2025-04-01 16:33:03'),
(58, 1, 15, 8, 2, 1, 5.15, '2025-04-07 13:47:18', '2025-04-07 13:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'T-Shirts', '2025-02-11 05:05:37', '2025-02-11 05:06:29'),
(2, 'Polos', '2025-02-11 05:05:48', '2025-03-14 03:14:21'),
(3, 'Sweats', '2025-02-11 05:05:57', '2025-03-14 03:14:34'),
(12, 'Sports Wear', '2025-03-14 03:14:51', '2025-03-14 03:15:21'),
(13, 'Fleece', '2025-03-14 03:15:35', '2025-03-14 03:15:35'),
(14, 'Jackets & Vest', '2025-03-14 03:16:00', '2025-03-14 03:16:00'),
(15, 'Shirt / Blouse', '2025-03-14 03:16:22', '2025-04-07 17:32:32'),
(16, 'Towels', '2025-03-14 03:16:43', '2025-03-14 03:16:43'),
(17, 'Caps & Headwear', '2025-03-14 03:17:01', '2025-03-14 03:17:01'),
(18, 'Bags', '2025-03-14 03:17:26', '2025-03-14 03:17:26'),
(19, 'Tank Top &  Singlet', '2025-03-14 03:18:51', '2025-03-14 03:18:51'),
(20, 'Work Wear', '2025-03-14 03:20:14', '2025-03-14 03:20:14'),
(21, 'Testing 18 march', '2025-03-18 13:00:12', '2025-03-18 13:00:12');

-- --------------------------------------------------------

--
-- Table structure for table `certifications`
--

CREATE TABLE `certifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `certification_name` varchar(255) NOT NULL,
  `certification_logo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certifications`
--

INSERT INTO `certifications` (`id`, `certification_name`, `certification_logo`, `created_at`, `updated_at`) VALUES
(3, 'rfr', 'certification_logos/jiCAViTvl6STmT9petw2dNwfZsmum3Es7mwA7nWT.jpg', '2025-02-28 18:01:42', '2025-02-28 18:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_image` varchar(255) DEFAULT NULL,
  `color_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_image`, `color_code`, `created_at`, `updated_at`) VALUES
(8, 'color_images/vLJIOegs2o9I3BTJNyd7cWsT94R5Nl9Dvcy3eEQ2.jpg', 'blue', '2025-02-28 14:48:31', '2025-03-18 18:41:34'),
(9, 'color_images/k9hy6lDPXPjvPGhzQgCl31BZDiDdMM5JoXtF08gq.png', 'Ash Mel.', '2025-02-28 18:43:47', '2025-03-14 02:27:58'),
(10, 'color_images/A07HtEyNvjE1m9LfCkL7Xh8slT3WaG2FaqCKhT2P.png', 'Red', '2025-02-28 18:44:11', '2025-02-28 18:44:11'),
(11, 'color_images/LvlfMbOcyazgOKRJrtqjO0XPXsPO42sO5AMcWTVn.jpg', 'black', '2025-03-10 11:38:39', '2025-03-10 11:38:39'),
(13, NULL, 'Grey', '2025-03-12 11:42:20', '2025-03-12 11:42:20'),
(17, NULL, 'Purple', '2025-03-18 17:38:24', '2025-03-18 17:38:24'),
(18, NULL, 'Kiwi', '2025-03-18 17:46:47', '2025-03-18 17:46:47'),
(19, NULL, 'ash melange', '2025-03-18 17:47:43', '2025-03-18 17:47:43'),
(21, NULL, 'orange', '2025-03-18 17:48:33', '2025-03-18 17:48:33'),
(22, NULL, 'yellow', '2025-03-18 17:49:51', '2025-03-18 17:49:51'),
(23, NULL, 'violet', '2025-03-18 17:50:14', '2025-03-18 17:50:14'),
(24, NULL, 'lux', '2025-03-18 17:50:35', '2025-03-18 17:50:35'),
(25, NULL, 'violet', '2025-03-18 17:50:44', '2025-03-18 17:50:44'),
(26, NULL, 'chocolate', '2025-03-18 18:24:36', '2025-03-18 18:24:36'),
(27, NULL, 'white', '2025-03-18 18:48:18', '2025-03-18 18:48:18'),
(28, NULL, 'navy', '2025-03-18 19:52:17', '2025-03-18 19:52:17'),
(29, NULL, 'light blue', '2025-04-07 10:31:26', '2025-04-07 10:31:26'),
(30, NULL, '#FF0000', '2025-04-07 10:32:38', '2025-04-07 10:32:38'),
(31, NULL, '#00FF00', '2025-04-07 10:33:41', '2025-04-07 10:33:41'),
(32, NULL, '#00FFFF', '2025-04-07 10:34:01', '2025-04-07 10:34:01'),
(33, NULL, '#FF00FF', '2025-04-07 10:34:15', '2025-04-07 10:34:15'),
(34, NULL, '#D3D3D3', '2025-04-07 10:34:43', '2025-04-07 10:34:43'),
(35, NULL, '#A9A9A9', '2025-04-07 10:34:56', '2025-04-07 10:34:56'),
(36, NULL, '#FFA500', '2025-04-07 10:35:06', '2025-04-07 10:35:06'),
(37, NULL, '#FFC0CB', '2025-04-07 10:35:15', '2025-04-07 10:35:15'),
(38, NULL, '#A52A2A', '2025-04-07 10:35:24', '2025-04-07 10:35:24'),
(39, NULL, '#800080', '2025-04-07 10:35:33', '2025-04-07 10:35:33'),
(40, NULL, '#FFD700', '2025-04-07 10:35:43', '2025-04-07 10:35:43'),
(41, NULL, '#C0C0C0', '2025-04-07 10:35:52', '2025-04-07 10:35:52'),
(42, NULL, '#000080', '2025-04-07 10:36:01', '2025-04-07 10:36:01'),
(43, NULL, '#808000', '2025-04-07 10:36:09', '2025-04-07 10:36:09'),
(44, NULL, '#008080', '2025-04-07 10:36:18', '2025-04-07 10:36:18'),
(45, NULL, '#00FF00', '2025-04-07 11:21:09', '2025-04-07 11:21:09'),
(46, NULL, '#FF00FF', '2025-04-07 11:21:52', '2025-04-07 11:21:52'),
(47, NULL, '#BC8F8F', '2025-04-07 11:22:13', '2025-04-07 11:23:19'),
(48, NULL, '#D2B48C', '2025-04-07 11:22:39', '2025-04-07 11:23:32'),
(49, NULL, '#D8BFD8', '2025-04-07 11:23:04', '2025-04-07 11:23:04'),
(50, NULL, '#E6E6FA', '2025-04-07 11:23:51', '2025-04-07 11:23:51'),
(51, NULL, '#FFE4E1', '2025-04-07 11:24:16', '2025-04-07 11:24:16'),
(52, NULL, '#FFF0F5', '2025-04-07 11:24:32', '2025-04-07 11:24:32'),
(53, NULL, '#FAEBD7', '2025-04-07 11:24:51', '2025-04-07 11:24:51'),
(54, NULL, '#FFFFF0', '2025-04-07 11:25:09', '2025-04-07 11:25:09'),
(55, NULL, '#FFFAF0', '2025-04-07 11:25:44', '2025-04-07 11:25:44'),
(56, NULL, '#F5F5DC', '2025-04-07 11:26:07', '2025-04-07 11:26:07'),
(57, NULL, '#B8860B', '2025-04-07 11:26:24', '2025-04-07 11:26:24'),
(58, NULL, '#DAA520', '2025-04-07 11:26:41', '2025-04-07 11:26:41'),
(59, NULL, '#F4A460', '2025-04-07 11:26:59', '2025-04-07 11:26:59'),
(60, NULL, '#DEB887', '2025-04-07 11:27:12', '2025-04-07 11:27:12'),
(61, NULL, '#CD853F', '2025-04-07 11:27:31', '2025-04-07 11:27:31'),
(62, NULL, '#D2691E', '2025-04-07 11:27:48', '2025-04-07 11:27:48'),
(63, NULL, '#A0522D', '2025-04-07 11:28:01', '2025-04-07 11:28:01'),
(64, NULL, '#8B4513', '2025-04-07 11:28:14', '2025-04-07 11:28:14'),
(65, NULL, '#FFC0CB', '2025-04-07 11:28:31', '2025-04-07 11:28:31'),
(66, NULL, '#FFB6C1', '2025-04-07 11:28:56', '2025-04-07 11:28:56'),
(67, NULL, '#FF69B4', '2025-04-07 11:29:13', '2025-04-07 11:29:13'),
(68, NULL, '#FF1493', '2025-04-07 11:29:35', '2025-04-07 11:29:35'),
(69, NULL, '#C71585', '2025-04-07 11:29:45', '2025-04-07 11:29:45'),
(70, NULL, '#4B0082', '2025-04-07 11:30:00', '2025-04-07 11:30:00'),
(71, NULL, '#9932CC', '2025-04-07 11:30:14', '2025-04-07 11:30:14'),
(72, NULL, '#9400D3', '2025-04-07 11:30:28', '2025-04-07 11:30:28'),
(73, NULL, '#8A2BE2', '2025-04-07 11:30:42', '2025-04-07 11:30:42'),
(74, NULL, '#9370DB', '2025-04-07 11:30:53', '2025-04-07 11:30:53'),
(75, NULL, '#BA55D3', '2025-04-07 11:31:06', '2025-04-07 11:31:18'),
(76, NULL, '#DA70D6', '2025-04-07 11:34:36', '2025-04-07 11:34:36'),
(77, NULL, '#DDA0DD', '2025-04-07 11:34:49', '2025-04-07 11:34:49'),
(78, NULL, '#EE82EE', '2025-04-07 11:35:01', '2025-04-07 11:35:01'),
(79, NULL, '#8B008B', '2025-04-07 11:35:14', '2025-04-07 11:35:14'),
(80, NULL, '#800080', '2025-04-07 11:35:25', '2025-04-07 11:35:25'),
(81, NULL, '#1E90FF', '2025-04-07 11:35:41', '2025-04-07 11:35:41'),
(82, NULL, '#00BFFF', '2025-04-07 11:37:10', '2025-04-07 11:37:10'),
(83, NULL, '#483D8B', '2025-04-07 11:37:24', '2025-04-07 11:37:24'),
(84, NULL, '#6A5ACD', '2025-04-07 11:37:38', '2025-04-07 11:37:38'),
(85, NULL, '#7B68EE', '2025-04-07 11:37:51', '2025-04-07 11:37:51'),
(86, NULL, '#6495ED', '2025-04-07 11:38:06', '2025-04-07 11:38:06'),
(87, NULL, '#C0C0C0', '2025-04-07 11:38:32', '2025-04-07 11:38:32'),
(88, NULL, '#808080', '2025-04-07 11:38:44', '2025-04-07 11:38:44'),
(89, NULL, '#696969', '2025-04-07 11:38:56', '2025-04-07 11:38:56'),
(90, NULL, '#A9A9A9', '2025-04-07 11:39:09', '2025-04-07 11:39:09'),
(91, NULL, '#D3D3D3', '2025-04-07 11:39:24', '2025-04-07 11:39:24'),
(92, NULL, '#DCDCDC', '2025-04-07 11:39:36', '2025-04-07 11:39:36'),
(93, NULL, '#F5F5F5', '2025-04-07 11:39:47', '2025-04-07 11:39:47'),
(94, NULL, '#800000', '2025-04-07 11:39:58', '2025-04-07 11:39:58'),
(95, NULL, '#8B0000', '2025-04-07 11:40:11', '2025-04-07 11:40:11'),
(96, NULL, '#A52A2A', '2025-04-07 11:40:25', '2025-04-07 11:40:25'),
(97, NULL, '#B22222', '2025-04-07 11:40:37', '2025-04-07 11:40:37'),
(98, NULL, '#CD5C5C', '2025-04-07 11:40:49', '2025-04-07 11:40:49'),
(99, NULL, '#DC143C', '2025-04-07 11:41:02', '2025-04-07 11:41:02'),
(100, NULL, '#F08080', '2025-04-07 11:41:17', '2025-04-07 11:41:17'),
(101, NULL, '#FA8072', '2025-04-07 11:41:28', '2025-04-07 11:41:28'),
(102, NULL, '#E9967A', '2025-04-07 11:41:43', '2025-04-07 11:41:43'),
(103, NULL, '#FFA07A', '2025-04-07 11:41:56', '2025-04-07 11:41:56'),
(104, NULL, '#FF4500', '2025-04-07 11:42:08', '2025-04-07 11:42:08'),
(105, NULL, '#FF6347', '2025-04-07 11:42:21', '2025-04-07 11:42:21'),
(106, NULL, '#FF7F50', '2025-04-07 11:42:32', '2025-04-07 11:42:32'),
(107, NULL, '#FF8C00', '2025-04-07 11:42:45', '2025-04-07 11:42:45'),
(108, NULL, '#FFA500', '2025-04-07 11:43:01', '2025-04-07 11:43:01'),
(109, NULL, '#FFD700', '2025-04-07 11:43:13', '2025-04-07 11:43:13'),
(110, NULL, '#FFFFE0', '2025-04-07 11:43:34', '2025-04-07 11:43:34'),
(111, NULL, '#FFFACD', '2025-04-07 11:44:05', '2025-04-07 11:44:05'),
(112, NULL, '#FAFAD2', '2025-04-07 11:44:17', '2025-04-07 11:44:17'),
(113, NULL, '#FFEFD5', '2025-04-07 11:44:31', '2025-04-07 11:44:31'),
(114, NULL, '#FFE4B5', '2025-04-07 11:44:53', '2025-04-07 11:44:53'),
(115, NULL, '#800020', '2025-04-07 12:12:09', '2025-04-07 12:12:09'),
(116, NULL, '#7B3F00', '2025-04-07 12:16:48', '2025-04-07 12:16:48'),
(117, NULL, '#000080', '2025-04-07 12:17:28', '2025-04-07 12:17:28'),
(118, NULL, '#4169E1', '2025-04-07 12:17:48', '2025-04-07 12:17:48'),
(119, NULL, '#87CEEB', '2025-04-07 12:18:07', '2025-04-07 12:18:07'),
(120, NULL, '#4F42B5', '2025-04-07 12:19:46', '2025-04-07 12:19:46'),
(121, NULL, '#00FF00', '2025-04-07 12:20:11', '2025-04-07 12:20:11'),
(122, NULL, '#8EE53F', '2025-04-07 12:20:57', '2025-04-07 12:20:57'),
(123, NULL, '#7BB661', '2025-04-07 12:23:05', '2025-04-07 12:23:05'),
(124, NULL, '#228B22', '2025-04-07 12:23:27', '2025-04-07 12:23:27'),
(125, NULL, '#808000', '2025-04-07 12:23:47', '2025-04-07 12:23:47'),
(126, NULL, '#40E0D0', '2025-04-07 12:24:25', '2025-04-07 12:24:25'),
(127, NULL, '#FFC0CB', '2025-04-07 12:25:22', '2025-04-07 12:25:22'),
(128, NULL, '#FF69B4', '2025-04-07 12:25:59', '2025-04-07 12:25:59'),
(129, NULL, '#FF00FF', '2025-04-07 12:26:55', '2025-04-07 12:26:55');

-- --------------------------------------------------------

--
-- Table structure for table `company_registrations`
--

CREATE TABLE `company_registrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `price_category_type` enum('1','2','3','4') DEFAULT NULL,
  `company_name` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `supervisory` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_approve` tinyint(1) NOT NULL DEFAULT 0,
  `vat_id_number` varchar(255) NOT NULL,
  `business_registration_file` varchar(255) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `terms_accepted` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `company_registrations`
--

INSERT INTO `company_registrations` (`id`, `customer_id`, `price_category_type`, `company_name`, `street`, `profile_image`, `zip_code`, `city`, `country`, `phone_number`, `gender`, `first_name`, `last_name`, `supervisory`, `email`, `password`, `is_approve`, `vat_id_number`, `business_registration_file`, `note`, `terms_accepted`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '00001', '4', 'India', '162 -A shivansh paradise agar road ujjain', 'profile_images/4xF2SscFgw4G4mTquewLlsuoygzKUtYsxlO7u0cl.jpg', '456006', 'Ujjain', 'India', '09174904748', 'male', 'user', 'test', 'male', 'deepak.quantumitinnovation@gmail.com', '$2y$12$B0tIFRpXdjC1HWgSD003G.zUgTU3P26aZK00tdrXeg1aYVWDJEOTe', 1, '123456', 'business_registrations/qm6cncMmuOnga2RCk64a5k7z46YtV3dS3KGRbizM.pdf', 'testing', 1, NULL, '2025-03-06 20:04:13', '2025-04-01 20:51:27', NULL),
(2, '00002', '1', 'India', '162 -A shivansh paradise agar road ujjain', NULL, '456006', 'Ujjain', 'India', '09174904748', 'male', 'avishek', 'test', 'male', 'avishek.quantumitinnovation@gmail.com', '$2y$12$2E02x1YXCRz1cEeurObGB.sLM9TAJ30JAfDNUQ1PiWAOLbocuIlee', 1, '225569', NULL, 'testing', 1, NULL, '2025-03-11 11:53:54', '2025-03-20 12:20:14', NULL),
(3, '00003', '1', 'Quantum', '162 -A shivansh paradise agar road ujjain', NULL, '456006', 'Ujjain', 'India', '09174904748', 'male', 'devendra', 'Verma', 'male', 'devendra@gmail.com', '$2y$12$jLGWckWMNZjzAy5tJ75IR.lisTnOTTmqTGjt3bgUfVsMe3Kk7YzVK', 1, 'ABC123', 'business_registrations/g6K1r4mlxOOO1KVXXMea6jjxRmVbD7TfPtKAAY5N.pdf', 'testing', 1, NULL, '2025-03-11 16:42:41', '2025-03-20 17:30:01', NULL),
(4, '0004', '4', 'Continental', '162 -A shivansh paradise agar road ujjain', 'profile_images/OJBSOHqujuo2NwSIioWEhGJd22vuLJ9iQrFX01Ea.jpg', '456006', 'Ujjain', 'India', '09174904745', 'male', 'DEEPAK', 'Verma', 'male', 'sales@continental-fashion.de', '$2y$12$TSKddehM50zzHFHxKWIc2.fM5ReXs9fqAB8Aj.FwFvTO.f9A4kYw2', 1, 'ABC123', NULL, 'testing', 1, NULL, '2025-03-21 18:11:06', '2025-03-21 18:39:04', NULL),
(5, '00005', '2', 'Quantum', 'south', 'profile_images/Y7M5EWfmSPgKnYVvWdDa0E5yphCHHGl63DNgq73h.jpg', '456006', 'ujjain', 'India', '0917490474', 'male', 'anil', 'kumar', 'male', 'anilkumarquantumitinnovation@gmail.com', '$2y$12$o2CrsverkeVNPpnOB.4z/O9ZtYnKpqYiHOgU0LRCKl.TCUP63YwF.', 1, 'ABC22334', 'business_registrations/eNc84wns2T9l3PS2HwqsSCMUkny5ciHQZdZjbgmx.pdf', 'testing', 1, NULL, '2025-03-27 18:08:45', '2025-04-07 17:50:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_name` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country_name`, `status`, `created_at`, `updated_at`) VALUES
(3, 'India', 1, '2025-02-11 06:13:48', '2025-03-14 02:30:41'),
(4, 'United Kingdom', 1, '2025-02-11 06:13:48', '2025-03-30 19:36:09'),
(5, 'Australia', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(6, 'Germany', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(7, 'France', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(8, 'Italy', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(9, 'Spain', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(10, 'Netherlands', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(11, 'Switzerland', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(12, 'Brazil', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(13, 'Argentina', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(14, 'Mexico', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(15, 'Japan', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(16, 'South Korea', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(17, 'China', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(18, 'India', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(19, 'Pakistan', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(20, 'Bangladesh', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(21, 'Russia', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(22, 'South Africa', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(23, 'Nigeria', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(24, 'Egypt', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(25, 'Turkey', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(26, 'Saudi Arabia', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(27, 'United Arab Emirates', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(28, 'Indonesia', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(29, 'Thailand', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(30, 'Vietnam', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(31, 'Malaysia', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(32, 'Philippines', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(33, 'Singapore', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(34, 'New Zealand', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(35, 'Portugal', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(36, 'Greece', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(37, 'Sweden', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(38, 'Norway', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(39, 'Denmark', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(40, 'Finland', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(41, 'Poland', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(42, 'Czech Republic', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(43, 'Austria', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(44, 'Belgium', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(45, 'Hungary', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(46, 'Ukraine', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(47, 'Romania', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(48, 'Chile', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(49, 'Colombia', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(50, 'Peru', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(51, 'Venezuela', 1, '2025-02-11 06:13:48', '2025-02-11 06:13:48'),
(52, 'Ecuador', 0, '2025-02-11 06:13:48', '2025-02-11 00:44:10'),
(53, 'Paraguay', 0, '2025-02-11 06:13:48', '2025-02-11 00:44:05'),
(55, 'Turkey', 0, '2025-03-14 02:31:33', '2025-03-14 02:31:33'),
(56, 'Bangladesh', 0, '2025-03-14 02:31:44', '2025-03-14 02:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `created_at`, `updated_at`) VALUES
(1, 'Human Resources (HR)!', '2025-02-11 03:04:09', '2025-02-11 03:08:46'),
(2, 'Finance & Accounting', '2025-02-11 03:04:47', '2025-02-11 03:04:47'),
(3, 'Information Technology (IT)', '2025-02-11 03:04:56', '2025-02-11 03:04:56'),
(4, 'Marketing & Sales', '2025-02-11 03:05:39', '2025-02-11 03:05:39'),
(5, 'Customer Support', '2025-02-11 03:05:49', '2025-02-11 03:05:49'),
(6, 'Research & Development (R&D)', '2025-02-11 03:06:41', '2025-02-11 03:06:41'),
(7, 'Legal & Compliance', '2025-02-11 03:06:51', '2025-02-11 03:06:51'),
(8, 'Procurement & Supply Chain', '2025-02-11 03:07:01', '2025-02-11 03:07:01'),
(9, 'Administration', '2025-02-11 03:07:11', '2025-02-11 03:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `dimensions`
--

CREATE TABLE `dimensions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dimension_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dimensions`
--

INSERT INTO `dimensions` (`id`, `dimension_name`, `created_at`, `updated_at`) VALUES
(2, '20*20', '2025-02-17 11:45:00', '2025-02-17 11:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `discount_percentage` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`id`, `discount_percentage`, `created_at`, `updated_at`) VALUES
(1, '15', '2025-02-10 23:03:51', '2025-02-10 23:04:48'),
(5, '20', '2025-03-18 18:45:15', '2025-03-18 18:45:15');

-- --------------------------------------------------------

--
-- Table structure for table `fabrics`
--

CREATE TABLE `fabrics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fabric_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fabrics`
--

INSERT INTO `fabrics` (`id`, `fabric_name`, `created_at`, `updated_at`) VALUES
(1, 'Cotton', '2025-02-13 05:34:10', '2025-02-13 05:34:10'),
(3, 'Nylon', '2025-02-28 12:49:17', '2025-02-28 12:49:17'),
(4, 'testing', '2025-03-18 18:37:44', '2025-03-18 18:37:44');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `status`, `created_at`, `updated_at`) VALUES
(3, 'What does BASIC WEAR specialize in?', '<p class=\"MsoNormal\"><span lang=\"EN-IN\">BASIC WEAR specializes in importing and\r\nexporting promotional textiles across Europe. We offer a wide range of clothing\r\nand accessories, including T-shirts, polo shirts, sweatshirts, workwear, and\r\noutdoor apparel.<o:p></o:p></span></p>', 1, '2025-04-04 13:31:14', '2025-04-04 13:36:33'),
(4, 'How long has BASIC WEAR been in the textile industry?', '<p><span lang=\"EN-IN\" style=\"font-size:11.0pt;line-height:\r\n107%;font-family:&quot;Calibri&quot;,sans-serif;mso-ascii-theme-font:minor-latin;\r\nmso-fareast-font-family:Calibri;mso-fareast-theme-font:minor-latin;mso-hansi-theme-font:\r\nminor-latin;mso-bidi-font-family:&quot;Times New Roman&quot;;mso-bidi-theme-font:minor-bidi;\r\nmso-ansi-language:EN-IN;mso-fareast-language:EN-US;mso-bidi-language:AR-SA\">We\r\nhave been in the textile and advertising industry for over 30 years, providing\r\nhigh-quality products since 1991.</span></p>', 1, '2025-04-04 13:31:57', '2025-04-04 13:36:35'),
(5, 'What types of products does BASIC WEAR offer?', '<p class=\"MsoNormal\"><span lang=\"EN-IN\">Our collection includes clothing for\r\nleisure, work, industry, advertising, hospitality, and wellness. We also\r\nprovide accessories like bags, aprons, caps, and hats.<o:p></o:p></span></p>', 1, '2025-04-04 13:32:42', '2025-04-04 13:36:39'),
(6, 'Does BASIC WEAR offer customization services?', '<p class=\"MsoNormal\"><span lang=\"EN-IN\">Yes, we provide professional embroidery and\r\nprinting services to customize textiles according to customer needs.<o:p></o:p></span></p>', 1, '2025-04-04 13:33:20', '2025-04-04 13:36:42'),
(7, 'What brands are associated with BASIC WEAR?', '<p class=\"MsoNormal\"><span lang=\"EN-IN\">In addition to our own brands—BASIC WEAR,\r\nBLANKCHEQUE, and BLUE PACIFIC—we collaborate with top European brands in the\r\nadvertising sector.<o:p></o:p></span></p>', 1, '2025-04-04 13:33:55', '2025-04-04 13:36:44'),
(8, 'Where are BASIC WEAR’s products manufactured?', '<p class=\"MsoNormal\"><span lang=\"EN-IN\">Our production facilities are located in\r\nEurope and the Far East, ensuring high-quality and ethically responsible\r\nmanufacturing.<o:p></o:p></span></p>', 1, '2025-04-04 13:34:37', '2025-04-04 13:36:48'),
(9, 'Does BASIC WEAR follow ethical and sustainable practices?', '<p class=\"MsoNormal\"><span lang=\"EN-IN\">Yes, we work with certified factories that\r\nfollow strict labor and environmental standards. We are also increasingly\r\nfocusing on eco-friendly materials to reduce our environmental impact.<o:p></o:p></span></p>', 1, '2025-04-04 13:35:10', '2025-04-04 13:36:50'),
(10, 'Can BASIC WEAR handle bulk and custom orders?', '<p class=\"MsoNormal\"><span lang=\"EN-IN\">Absolutely! We specialize in both bulk and\r\ncustom orders, ensuring high-quality, certified production to meet individual\r\ncustomer needs.<o:p></o:p></span></p>', 1, '2025-04-04 13:35:34', '2025-04-04 13:36:53'),
(11, 'Why do customers trust BASIC WEAR?', '<p class=\"MsoNormal\"><span lang=\"EN-IN\">Customers trust us because of our\r\nlong-standing experience, high-quality products, ethical manufacturing, and\r\ncomprehensive customization services—all offered from a single reliable source.<o:p></o:p></span></p>', 1, '2025-04-04 13:36:03', '2025-04-04 13:36:56'),
(12, 'How can I contact BASIC WEAR for inquiries or orders?', '<p class=\"MsoNormal\"><span lang=\"EN-IN\">You can reach out to us via our contact\r\npage, request a meeting, or connect with our team to discuss your specific\r\nrequirements.<o:p></o:p></span></p>', 1, '2025-04-04 13:36:28', '2025-04-04 13:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `material_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `material_name`, `created_at`, `updated_at`) VALUES
(1, '100 % cotoon (ash and grey melange: 95 % cotton, 5 % polyester)', '2025-02-11 23:18:49', '2025-03-14 17:32:50'),
(4, '80 % cotton, 20 % polyester (grey melange : 75 % cotton, 20% polyester, 5 % viscose)', '2025-02-28 12:48:40', '2025-03-14 17:37:53'),
(5, '100% Combed Cotton', '2025-03-10 14:24:03', '2025-03-10 14:24:03'),
(6, '65% Cotton / 35% Poly', '2025-03-10 15:53:59', '2025-03-10 15:53:59'),
(7, '100 % polyester', '2025-03-14 17:39:29', '2025-03-14 17:39:29'),
(8, 'Outer fabric: 93 % polyester, 7 % Elastane, mid-layer: TPU waterproof, breathable and windproof , inner-layer: 100 % Polyester Microfleece', '2025-03-14 17:44:08', '2025-03-14 17:44:08'),
(9, '100 % Nylon', '2025-03-14 17:45:23', '2025-03-14 17:45:23'),
(10, '65 % Polyester, 35 % Cotton', '2025-03-14 17:48:40', '2025-03-14 17:48:40'),
(11, '95% Cotton, 5% Elastane', '2025-03-14 18:02:51', '2025-03-14 18:02:51'),
(12, 'Testing 18', '2025-03-18 18:35:46', '2025-03-18 18:35:46');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_02_10_044724_create_about_us_table', 2),
(6, '2025_02_10_044724_create_privacy_policies_table', 2),
(7, '2025_02_10_044724_create_terms_conditions_table', 2),
(8, '2025_02_10_055650_create_banners_table', 3),
(9, '2025_02_10_055816_create_banners_table', 4),
(10, '2025_02_10_080247_create_prefixs_table', 5),
(11, '2025_02_10_082803_create_prefixs_table', 6),
(12, '2025_02_10_085953_create_sizes_table', 7),
(13, '2025_02_10_101920_create_weights_table', 8),
(14, '2025_02_10_103314_create_weights_table', 9),
(15, '2025_02_10_103747_create_colors_table', 10),
(16, '2025_02_11_032728_create_prices_table', 11),
(17, '2025_02_11_035914_create_discounts_table', 12),
(18, '2025_02_11_051204_create_countries_table', 13),
(19, '2025_02_11_062012_create_vats_table', 14),
(20, '2025_02_11_081946_create_departments_table', 15),
(21, '2025_02_11_092757_create_brands_table', 16),
(22, '2025_02_11_101849_create_categories_table', 17),
(23, '2025_02_12_034449_create_subcategories_table', 18),
(24, '2025_02_12_041037_create_subcategories_table', 19),
(25, '2025_02_12_041130_create_sub_categories_table', 20),
(26, '2025_02_12_043629_create_materials_table', 21),
(27, '2025_02_12_051137_create_articles_table', 22),
(28, '2025_02_12_053402_create_certifications_table', 23),
(29, '2025_02_12_055655_create_wears_table', 24),
(30, '2025_02_12_094556_create_promotionals_table', 25),
(31, '2025_02_13_105159_create_fabrics_table', 26),
(32, '2025_02_13_110727_create_dimensions_table', 27),
(33, '2025_02_14_103608_create_faqs_table', 28),
(34, '2025_02_14_110019_create_cancellation_policies_table', 29),
(35, '2025_02_20_084233_create_products_table', 30),
(36, '2025_02_20_093104_update_fabric_column_in_products_table', 30),
(37, '2025_03_03_084837_create_company_registrations_table', 31),
(38, '2025_03_04_095602_create_subscriptions_table', 31),
(39, '2025_03_04_113204_add_is_approve_to_company_registrations_table', 31),
(40, '2025_03_06_094247_add_customer_id_to_users_and_company_registrations', 31),
(41, '2025_03_06_125758_add_price_category_type_to_company_registrations', 32),
(42, '2025_03_11_085448_add_color_id_to_product_images', 33),
(43, '2025_03_12_061905_create_product_image_size_table', 34),
(44, '2025_03_12_072942_add_quantity_to_product_image_size_table', 34),
(45, '2025_03_13_061848_create_cart_items_table', 35),
(46, '2025_03_13_104524_create_addresses_table', 35),
(47, '2025_03_17_082426_create_orders_table', 36),
(48, '2025_03_17_091157_add_price_to_orders_table', 36),
(49, '2025_03_18_061648_add_profile_image_to_company_registrations', 37),
(50, '2025_03_21_060905_add_qty_per_carton_to_products_table', 38),
(51, '2025_03_24_050451_create_news_offers_table', 39),
(52, '2025_03_25_052755_add_billing_address_to_orders_table', 40),
(53, '2025_03_25_090405_add_delivery_charge_and_payment_terms_to_orders_table', 41),
(54, '2025_03_28_114733_add_soft_deletes_to_company_registrations', 42);

-- --------------------------------------------------------

--
-- Table structure for table `news_offers`
--

CREATE TABLE `news_offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_offers`
--

INSERT INTO `news_offers` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'News and Offer', '<p><span style=\"color: rgb(71, 71, 71); font-family: &quot;Google Sans&quot;, Arial, sans-serif;\">&nbsp;the title of a newspaper story, printed in large letters at the top of the story, especially on the front page.</span></p>', 'news_offers_images/VGbecZauPmyUmCGSNwdqOmdmtcTzPo9lJczPTGWN.jpg', 1, '2025-03-24 13:30:21', '2025-04-01 19:02:58'),
(2, 'Special Offer 1234', '<p>Hurry Up 50% Off</p>', 'news_offers_images/Wzj71v4l0z5xCjwRubjTo7gyH2GKC5xoicGRPLx7.jpg', 1, '2025-03-24 13:31:14', '2025-04-01 16:09:34'),
(3, 'Limited Offer', '<p>Please Come fast Limited offer</p>', 'news_offers_images/6OpiUrpAlkknFo23Kx34woE9rt4p1qEZ54GqwuFJ.jpg', 1, '2025-03-24 13:31:57', '2025-03-24 20:26:06');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `tracking_id` varchar(255) DEFAULT NULL,
  `courier_partner_name` varchar(255) DEFAULT NULL,
  `is_cancelled` tinyint(1) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `billing_address_id` bigint(20) UNSIGNED DEFAULT NULL,
  `delivery_charge` decimal(10,2) DEFAULT NULL,
  `payment_terms` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `size_id`, `color_id`, `quantity`, `price`, `amount`, `address_id`, `tracking_id`, `courier_partner_name`, `is_cancelled`, `link`, `created_at`, `updated_at`, `billing_address_id`, `delivery_charge`, `payment_terms`) VALUES
(34, 1, 15, 7, 8, 1, 5.15, 5.15, 1, NULL, NULL, NULL, NULL, '2025-03-25 15:12:19', '2025-03-25 18:14:04', 1, 300.00, '5 day later'),
(36, 1, 16, 5, 11, 2, 7.00, 14.00, 2, NULL, NULL, NULL, NULL, '2025-03-27 18:02:34', '2025-03-27 18:02:34', 2, NULL, NULL),
(37, 1, 14, 1, 10, 1, 30.00, 30.00, 2, NULL, NULL, NULL, NULL, '2025-03-27 18:02:34', '2025-03-27 18:02:34', 2, NULL, NULL),
(38, 1, 14, 1, 8, 1, 30.00, 30.00, 2, NULL, NULL, NULL, NULL, '2025-03-27 18:02:34', '2025-03-27 18:02:34', 2, NULL, NULL),
(43, 5, 14, 1, 10, 2, 20.00, 40.00, 8, NULL, NULL, NULL, NULL, '2025-03-27 21:36:13', '2025-03-27 21:36:13', 8, NULL, NULL),
(44, 5, 15, 8, 22, 1, 5.00, 5.00, 8, NULL, NULL, NULL, NULL, '2025-03-27 21:37:22', '2025-03-27 21:37:22', 8, NULL, NULL),
(45, 5, 15, 2, 11, 3, 5.00, 15.00, 8, NULL, NULL, NULL, NULL, '2025-03-28 01:23:02', '2025-03-28 01:23:02', 8, NULL, NULL),
(46, 5, 15, 1, 11, 1, 5.00, 5.00, 8, NULL, NULL, NULL, NULL, '2025-03-28 01:23:02', '2025-03-28 01:23:02', 8, NULL, NULL),
(47, 5, 15, 5, 22, 2, 5.00, 10.00, 8, NULL, NULL, NULL, NULL, '2025-03-28 01:35:34', '2025-03-28 01:35:34', 8, NULL, NULL),
(48, 5, 15, 3, 11, 2, 5.00, 10.00, 8, NULL, NULL, NULL, NULL, '2025-03-28 01:43:43', '2025-03-28 01:43:43', 8, NULL, NULL),
(49, 5, 14, 5, 11, 2, 20.00, 40.00, 8, NULL, NULL, NULL, NULL, '2025-03-28 13:14:41', '2025-03-28 13:14:41', 8, NULL, NULL),
(50, 5, 14, 1, 8, 2, 20.00, 40.00, 8, NULL, NULL, NULL, NULL, '2025-03-28 13:14:41', '2025-03-28 13:14:41', 8, NULL, NULL),
(51, 5, 14, 1, 8, 2, 20.00, 40.00, 8, NULL, NULL, NULL, NULL, '2025-03-28 13:17:38', '2025-03-28 13:17:38', 8, NULL, NULL),
(52, 5, 14, 1, 10, 2, 20.00, 40.00, 9, NULL, NULL, NULL, NULL, '2025-03-28 13:23:52', '2025-03-28 13:23:52', 9, NULL, NULL),
(53, 5, 14, 1, 8, 2, 20.00, 40.00, 8, NULL, NULL, NULL, NULL, '2025-03-28 13:27:32', '2025-03-28 13:27:32', 8, NULL, NULL),
(54, 5, 15, 1, 11, 3, 5.00, 15.00, 9, NULL, NULL, NULL, NULL, '2025-03-28 16:47:35', '2025-03-28 16:47:35', 9, NULL, NULL),
(55, 5, 14, 1, 10, 2, 20.00, 40.00, 9, '2', '1', NULL, 'https://www.delhivery.com/tracking', '2025-04-07 16:59:27', '2025-04-07 17:01:59', 8, NULL, NULL),
(56, 5, 15, 1, 27, 2, 5.00, 10.00, 8, NULL, NULL, NULL, NULL, '2025-04-07 17:23:29', '2025-04-07 17:23:29', 8, NULL, NULL),
(57, 5, 15, 1, 22, 2, 5.00, 10.00, 9, NULL, NULL, NULL, NULL, '2025-04-07 17:25:09', '2025-04-07 17:25:09', 9, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
-- Table structure for table `prefixes`
--

CREATE TABLE `prefixes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prefixes`
--

INSERT INTO `prefixes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Mr.', '2025-02-10 03:01:05', '2025-02-21 20:31:55'),
(3, 'MS.', '2025-02-21 20:32:28', '2025-02-21 20:32:28'),
(4, 'Mr.', '2025-03-24 18:13:12', '2025-03-24 18:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price_level` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `price_level`, `created_at`, `updated_at`) VALUES
(1, 'Price Level 1', '2025-02-10 22:19:50', '2025-02-10 22:19:50'),
(2, 'Price Level 2', '2025-02-10 22:20:01', '2025-02-10 22:20:01'),
(3, 'Price Level 3', '2025-02-10 22:20:08', '2025-02-10 22:20:08'),
(5, 'Price Level 4', '2025-02-21 20:51:04', '2025-02-21 20:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policies`
--

CREATE TABLE `privacy_policies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `privacy_policies`
--

INSERT INTO `privacy_policies` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, '<h3 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">Introduction</font></h3><h3 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><p style=\"font-size: 16px;\"><font color=\"#636363\">At&nbsp;<span style=\"font-weight: bolder;\">[Name]</span>, your privacy is our priority. This Privacy Policy outlines the types of information we collect, how we use it, and the measures we take to protect it. By using our website, you agree to the practices described herein.</font></p></h3><h3 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">Information We Collect</font></h3><h3 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><p style=\"font-size: 16px;\"><font color=\"#636363\">We collect two types of information:</font></p><ul style=\"font-size: 16px;\"><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Personal Information:</span>&nbsp;This includes your name, contact details, and payment information, which you voluntarily provide during registration, placing orders, or subscribing to newsletters.</font></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Non-Personal Information:</span>&nbsp;This includes technical data like IP addresses, browser types, and usage statistics, collected automatically as you browse our site.</font></li></ul></h3><h3 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">How We Use Your Information</font></h3><h3 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><p style=\"font-size: 16px;\"><font color=\"#636363\">We use the information collected to:</font></p><ol style=\"font-size: 16px;\"><li><span style=\"font-weight: bolder;\"><font color=\"#636363\">Process and fulfill orders</font></span></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Improve our website</span>&nbsp;to provide better customer experiences</font></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Communicate</span>&nbsp;with you regarding products, promotions, and updates</font></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Ensure security and compliance</span>&nbsp;with applicable laws</font></li></ol></h3><h3 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">Sharing of Information</font></h3><h3 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><p style=\"font-size: 16px;\"><font color=\"#636363\">We do not sell or rent your personal information to third parties. However, we may share your data with:</font></p><ul style=\"font-size: 16px;\"><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Service providers</span>&nbsp;(e.g., payment processors, delivery services) to complete transactions</font></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Legal authorities</span>, if required by law or in response to legal processes</font></li></ul></h3><h3 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">Security Measures</font></h3><h3 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><p style=\"font-size: 16px;\"><font color=\"#636363\">We employ the following security measures to protect your information:</font></p><ul style=\"font-size: 16px;\"><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Encryption</span>&nbsp;of sensitive data during transmission</font></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Secure servers</span>&nbsp;to store your information</font></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Regular security audits</span>&nbsp;to ensure data safety</font></li></ul><p style=\"font-size: 16px;\"><font color=\"#636363\">Despite our best efforts, no method of transmission over the Internet is completely secure. We encourage you to take precautions when using our services.</font></p></h3><h3 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">Cookies and Tracking Technologies</font></h3><h3 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><p style=\"font-size: 16px;\"><font color=\"#636363\">We use cookies to:</font></p><ul style=\"font-size: 16px;\"><li><span style=\"font-weight: bolder;\"><font color=\"#636363\">Enhance user experience</font></span></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Track site usage</span>&nbsp;and performance</font></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Personalize content</span>&nbsp;based on your preferences</font></li></ul><p style=\"font-size: 16px;\"><font color=\"#636363\">You can modify your browser settings to refuse cookies, though this may affect the functionality of our website.</font></p></h3><h3 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">Your Rights</font></h3><h3 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><p style=\"font-size: 16px;\"><font color=\"#636363\">You have the right to:</font></p><ul style=\"font-size: 16px;\"><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Access, modify, or delete</span>&nbsp;your personal information</font></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Withdraw consent</span>&nbsp;for data processing at any time</font></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Request data portability</span>&nbsp;for the information you’ve provided to us</font></li></ul><p style=\"font-size: 16px;\"><font color=\"#636363\">To exercise these rights, please contact us at&nbsp;<span style=\"font-weight: bolder;\">[Support Email]</span>.</font></p></h3><h3 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">Changes to this Policy</font></h3><h3 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><p style=\"font-size: 16px;\"><font color=\"#636363\">We may update this Privacy Policy from time to time. Any changes will be posted on this page, with the last updated date indicated at the top.</font></p></h3><h3 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">Contact Us</font></h3><h3 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><p style=\"font-size: 16px;\"><font color=\"#636363\">If you have any questions regarding this Privacy Policy, feel free to contact us at:</font></p><ul style=\"font-size: 16px;\"><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Phone:</span>&nbsp;[Phone Number]</font></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Email:</span>&nbsp;[Support Email]</font></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Address:</span>&nbsp;[Company Address]</font></li></ul></h3>', '2025-02-10 05:39:39', '2025-02-28 11:59:51');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_details` text DEFAULT NULL,
  `qty_per_carton` int(11) NOT NULL,
  `material_id` bigint(20) UNSIGNED NOT NULL,
  `weight_id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `fabric_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pack_poly` int(11) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `manufacturer_name` varchar(255) DEFAULT NULL,
  `add_stoke` int(11) DEFAULT NULL,
  `category_1_price` decimal(10,2) DEFAULT NULL,
  `category_2_price` decimal(10,2) DEFAULT NULL,
  `category_3_price` decimal(10,2) DEFAULT NULL,
  `category_4_price` decimal(10,2) DEFAULT NULL,
  `actual_product_price` decimal(10,2) DEFAULT NULL,
  `sale` enum('yes','no') NOT NULL DEFAULT 'no',
  `sale_percentage` int(11) DEFAULT NULL,
  `promotion_id` bigint(20) UNSIGNED DEFAULT NULL,
  `wear_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `product_name`, `product_details`, `qty_per_carton`, `material_id`, `weight_id`, `article_id`, `fabric_id`, `pack_poly`, `country_id`, `manufacturer_name`, `add_stoke`, `category_1_price`, `category_2_price`, `category_3_price`, `category_4_price`, `actual_product_price`, `sale`, `sale_percentage`, `promotion_id`, `wear_id`, `remarks`, `created_at`, `updated_at`) VALUES
(14, 1, 5, 'Victor TS 220', '<p style=\"margin: 0.5em 0px 1em; color: rgb(32, 33, 34); font-family: sans-serif;\"><span style=\"color: rgb(85, 85, 85); font-family: &quot;Myriad Pro&quot;, sans-serif; font-size: 14px;\"><b>Oversize Unisex T-Shirt,</b>&nbsp; shoulder to shoulder taping, side seam, 1x1 rib in neck, 100 % Bio Combed cotton, Single jersey, 40° washable</span></p><p style=\"margin: 0.5em 0px 1em; color: rgb(32, 33, 34); font-family: sans-serif;\"><br></p>', 0, 5, 5, 7, 1, 5, 18, 'ITL', NULL, 15.00, 20.00, 25.00, 30.00, NULL, 'no', 0, 2, 5, '<p>testing</p>', '2025-03-12 16:28:59', '2025-03-14 18:59:06'),
(15, 2, 9, 'Elegant Polo', '<p>Ringspinn-Baumwolle, Piquè, mit klassischem Rippkragen. \r\nSeitennähte und Nackenband . Ohne \r\nÄrmelbündchen. Knopfleiste mit drei Knöpfen.</p>', 0, 5, 6, 19, 1, 10, 18, 'ITL', NULL, 6.00, 5.00, 5.00, 5.15, NULL, 'no', NULL, 2, 1, '<p>Ringspinn-Baumwolle, Piquè, mit klassischem Rippkragen. \r\nSeitennähte und Nackenband . Ohne \r\nÄrmelbündchen. Knopfleiste mit drei Knöpfen <br></p>', '2025-03-12 19:07:46', '2025-03-21 18:26:01'),
(16, 1, 42, 'Girly  Standard TS 160', '<p>• 100 % gekämmte \r\nringgesponnene Baumwolle \r\n(Melange-Farben mit \r\nPolyester-Anteil),&nbsp;\r\nBaumwolle \r\nKragenbündchen • \r\nNackenband • waschbar bis \r\n40°, <br></p>', 0, 1, 1, 2, 1, 10, 3, 'ITL', NULL, 2.81, 2.70, 2.60, 2.50, NULL, 'no', NULL, 2, 3, '<p>good</p>', '2025-03-18 13:14:42', '2025-04-07 17:43:26'),
(18, 1, 5, 'Liberty TS 200', '<p class=\"MsoNormal\" style=\"margin-left: 0.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"color:black;mso-color-alt:windowtext\">• 100 %\r\ngekämmte ringgesponnene Baumwolle </span><o:p></o:p></p><p class=\"MsoNormal\" style=\"margin-left: 0.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"color:black;mso-color-alt:windowtext\">(Melange-Farben\r\nmit Viskose-Anteil), 190 g/m².&nbsp; </span><o:p></o:p></p><p class=\"MsoNormal\" style=\"margin:0cm\">Baumwolle Kragenbündchen • Nackenband <o:p></o:p></p><p>\r\n\r\n\r\n\r\n\r\n\r\n<span style=\"font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-ascii-theme-font:\r\nminor-latin;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-fareast-theme-font:\r\nminor-fareast;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman&quot;;\r\nmso-bidi-theme-font:minor-bidi;mso-ansi-language:DE;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">• waschbar bis 40°,&nbsp;</span></p>', 50, 1, 3, 5, NULL, 10, 18, 'ITL', NULL, 3.44, 3.24, 3.12, 3.00, NULL, 'no', NULL, NULL, 5, NULL, '2025-04-07 17:57:10', '2025-04-07 17:57:10'),
(19, 1, 5, 'Standard TS 160', '<p class=\"MsoNormal\" style=\"margin-left: 0.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"color:black;mso-color-alt:windowtext\">• 100 %\r\ngekämmte ringgesponnene Baumwolle </span><o:p></o:p></p><p class=\"MsoNormal\" style=\"margin-left: 0.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"color:black;mso-color-alt:windowtext\">(Melange-Farben\r\nmit Viskose-Anteil), 160 g/m².&nbsp; </span><o:p></o:p></p><p class=\"MsoNormal\" style=\"margin:0cm\">Baumwolle Kragenbündchen • Nackenband, Tear lable</p><p>\r\n\r\n\r\n\r\n\r\n\r\n<span style=\"font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-ascii-theme-font:\r\nminor-latin;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-fareast-theme-font:\r\nminor-fareast;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman&quot;;\r\nmso-bidi-theme-font:minor-bidi;mso-ansi-language:DE;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">• waschbar bis 40°,&nbsp;</span></p>', 100, 1, 1, 6, NULL, 10, 18, 'ITL', NULL, 3.07, 2.89, 2.76, 2.60, NULL, 'no', NULL, NULL, 5, NULL, '2025-04-07 18:10:57', '2025-04-07 18:10:57'),
(20, 1, 5, 'Kids Standard TS 160', '<p class=\"MsoNormal\" style=\"margin-left: 0.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"color:black;mso-color-alt:windowtext\">• 100 %\r\ngekämmte ringgesponnene Baumwolle </span><o:p></o:p></p><p class=\"MsoNormal\" style=\"margin-left: 0.25pt; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"color:black;mso-color-alt:windowtext\">(Melange-Farben\r\nmit Viskose-Anteil), 190 g/m².&nbsp; </span><o:p></o:p></p><p class=\"MsoNormal\" style=\"margin:0cm\">Baumwolle Kragenbündchen • Nackenband</p><p>\r\n\r\n\r\n\r\n\r\n\r\n<span style=\"font-size:9.0pt;font-family:&quot;Calibri&quot;,sans-serif;mso-ascii-theme-font:\r\nminor-latin;mso-fareast-font-family:&quot;Times New Roman&quot;;mso-fareast-theme-font:\r\nminor-fareast;mso-hansi-theme-font:minor-latin;mso-bidi-font-family:&quot;Times New Roman&quot;;\r\nmso-bidi-theme-font:minor-bidi;mso-ansi-language:DE;mso-fareast-language:EN-US;\r\nmso-bidi-language:AR-SA\">• waschbar bis 40°,&nbsp;</span></p>', 100, 5, 1, 7, NULL, 10, 3, 'ITL', NULL, 2.24, 2.11, 2.01, 1.90, NULL, 'no', NULL, NULL, 4, NULL, '2025-04-07 19:43:37', '2025-04-07 19:43:37');

-- --------------------------------------------------------

--
-- Table structure for table `product_brand`
--

CREATE TABLE `product_brand` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_brand`
--

INSERT INTO `product_brand` (`id`, `product_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(16, 14, 13, NULL, NULL),
(18, 16, 13, NULL, NULL),
(19, 15, 16, NULL, NULL),
(21, 18, 13, NULL, NULL),
(22, 19, 13, NULL, NULL),
(23, 20, 13, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `is_primary` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `color_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_path`, `is_primary`, `created_at`, `updated_at`, `color_id`) VALUES
(30, 14, 'product_images/t8QQsf0Bct7qN8nyKdfNfqt8qSXlGGZpzNIrkT53.jpg', 0, '2025-03-12 16:28:59', '2025-03-12 16:29:26', 10),
(31, 14, 'product_images/9C8A7DA1elG7CX8bdTf5eWb2JqniJJAfYa0oflMV.jpg', 0, '2025-03-12 16:28:59', '2025-03-12 16:29:26', 8),
(32, 14, 'product_images/qBXxhvwP3hL4XbvSjyErCsVTQMpUOwb2tzfmVdjW.jpg', 0, '2025-03-12 16:28:59', '2025-03-12 16:29:26', 11),
(33, 15, 'product_images/YQGGO93jpaHDeIExK7RA5gfqQ7EDM45CaXksfiLt.png', 1, '2025-03-12 19:07:46', '2025-03-14 23:50:53', 11),
(34, 15, 'product_images/GT9NZ25IKD8dR8hqhM6lwtjbbKREllQDMNkGKTIs.png', 0, '2025-03-12 19:07:46', '2025-03-14 23:56:08', 9),
(35, 15, 'product_images/2yqHuCObns4jU89naJdJtLHXDwy7CJjWSJciFUHR.jpg', 0, '2025-03-12 19:07:46', '2025-03-12 19:08:07', 10),
(38, 16, 'product_images/y6EXqksnzEz7nM0Wwuf0MhhHmNO4wHM5CpzUnYwk.png', 0, '2025-03-18 13:14:42', '2025-03-19 04:10:16', 11),
(39, 16, 'product_images/ce36TKM1HaOo1t276Y0Wb4hCO93susPY54zR9sjD.png', 0, '2025-03-18 13:14:42', '2025-03-19 04:10:16', 18),
(40, 15, 'product_images/exmsTv5ufoCGAGTahqEAKs9f6UfTKNSbRACPPP7u.png', 1, '2025-03-18 17:02:58', '2025-03-18 17:02:58', NULL),
(41, 15, 'product_images/Udyu2iMKhWBdCZyDuAsKvpJawGHLD8mUbxlsio7H.png', 1, '2025-03-18 18:34:57', '2025-03-18 18:34:57', 26),
(42, 15, 'product_images/GcEJOLmJARV0kr0aQsadpp2c7wI0b7T8PUqJwkLr.png', 1, '2025-03-18 18:39:28', '2025-03-18 18:47:42', 8),
(43, 15, 'product_images/KHLdt3X1BgFiHTBuujtWi9wWQiBiUB2rfj54NJ3g.png', 1, '2025-03-18 18:47:42', '2025-03-18 18:50:16', 27),
(44, 15, 'product_images/E0ShV6EcnuZyOCtgvqm2L7oGTQw0SEpQXqaFZBs3.png', 1, '2025-03-18 18:50:16', '2025-03-18 18:50:16', 22),
(46, 15, 'product_images/BnWA6vC4GSBmRYQO1rEyh7FRvM8XOVx7joLVsp8P.png', 1, '2025-03-18 19:51:59', '2025-03-18 19:51:59', NULL),
(47, 16, 'product_images/9F4tbGuWomhhRUbbd3cziRuDon5lMe2F7RNVAR9B.png', 1, '2025-03-19 04:10:16', '2025-03-19 04:10:16', 21),
(48, 16, 'product_images/Njqs29WDld3F3IG2hKaODnX3y5NwFgnpUnXDjQSc.png', 1, '2025-03-19 04:11:11', '2025-03-19 04:11:11', 10),
(49, 16, 'product_images/7nvL4GWtIV3GNeSekTHMXUuhplqiii0FiDe5w7ID.png', 1, '2025-03-19 04:13:25', '2025-03-19 04:13:25', 27),
(50, 16, 'product_images/PMfJGA6FP34dIEgDVD9HwZFsrjWvg01PWCUEMpVr.png', 0, '2025-03-19 04:13:25', '2025-03-19 04:13:25', 8),
(51, 16, 'product_images/2c7TqF4fSsrf6o41nkVsNXYQNQOKqP8CCH2UEXXi.png', 0, '2025-03-19 04:13:25', '2025-03-19 04:13:25', 22),
(52, 18, 'product_images/JdTBGAytWkdSy6udf8M3PSvtce3HFTY6ErV44zN5.png', 1, '2025-04-07 17:57:10', '2025-04-07 17:57:10', 11),
(53, 19, 'product_images/XXvemgnZgTZYG9ltwy4XlMShSnl83rT6Y44Md0cn.png', 1, '2025-04-07 18:10:57', '2025-04-07 18:10:57', 11),
(54, 20, 'product_images/yu60ywSd2DlKQLlPgi9ADNYE3DSXQ2AQNZ1dlyHI.jpg', 1, '2025-04-07 19:43:37', '2025-04-07 19:43:37', 27);

-- --------------------------------------------------------

--
-- Table structure for table `product_image_size`
--

CREATE TABLE `product_image_size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_image_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_image_size`
--

INSERT INTO `product_image_size` (`id`, `product_image_id`, `size_id`, `created_at`, `updated_at`, `quantity`) VALUES
(4, 30, 1, NULL, '2025-04-07 16:59:09', 98),
(5, 31, 1, NULL, NULL, 100),
(6, 32, 4, NULL, NULL, 100),
(7, 32, 5, NULL, NULL, 200),
(9, 33, 1, NULL, '2025-03-28 16:46:57', 97),
(10, 33, 2, NULL, NULL, 100),
(11, 33, 3, NULL, NULL, 100),
(12, 33, 4, NULL, NULL, 200),
(13, 34, 1, NULL, NULL, 10),
(14, 34, 3, NULL, NULL, 20),
(15, 34, 4, NULL, NULL, 30),
(16, 35, 1, NULL, NULL, 10),
(17, 35, 2, NULL, NULL, 12),
(18, 35, 3, NULL, NULL, 15),
(19, 35, 4, NULL, NULL, 20),
(28, 33, 5, NULL, NULL, 0),
(29, 33, 7, NULL, NULL, 0),
(30, 33, 8, NULL, NULL, 0),
(31, 34, 2, NULL, NULL, 0),
(32, 34, 5, NULL, NULL, 0),
(33, 34, 7, NULL, NULL, 0),
(34, 34, 8, NULL, NULL, 0),
(35, 35, 5, NULL, NULL, 0),
(36, 35, 7, NULL, NULL, 0),
(37, 35, 8, NULL, NULL, 0),
(45, 38, 5, NULL, NULL, 10),
(47, 39, 9, NULL, NULL, 10),
(48, 40, 1, NULL, NULL, 10),
(49, 40, 2, NULL, NULL, 10),
(50, 40, 3, NULL, NULL, 50),
(51, 40, 4, NULL, NULL, 50),
(52, 40, 5, NULL, NULL, 50),
(53, 40, 7, NULL, NULL, 0),
(54, 40, 8, NULL, NULL, 0),
(55, 41, 1, NULL, NULL, 30),
(56, 41, 2, NULL, NULL, 50),
(57, 41, 3, NULL, NULL, 100),
(58, 41, 4, NULL, NULL, 100),
(59, 41, 5, NULL, NULL, 50),
(60, 41, 7, NULL, NULL, 50),
(61, 41, 8, NULL, NULL, 30),
(62, 42, 1, NULL, NULL, 10),
(63, 42, 2, NULL, '2025-04-07 13:47:18', 29),
(64, 42, 3, NULL, NULL, 40),
(65, 42, 4, NULL, NULL, 50),
(66, 42, 5, NULL, NULL, 100),
(67, 42, 7, NULL, '2025-03-31 23:28:41', 40),
(68, 42, 8, NULL, NULL, 10),
(69, 43, 1, NULL, '2025-04-07 17:23:13', 8),
(70, 43, 2, NULL, NULL, 20),
(71, 43, 3, NULL, NULL, 30),
(72, 43, 4, NULL, NULL, 20),
(73, 43, 5, NULL, NULL, 40),
(74, 43, 7, NULL, NULL, 40),
(75, 43, 8, NULL, NULL, 20),
(76, 44, 1, NULL, '2025-04-07 17:24:31', 8),
(77, 44, 2, NULL, NULL, 20),
(78, 44, 3, NULL, NULL, 30),
(79, 44, 4, NULL, NULL, 40),
(80, 44, 5, NULL, NULL, 20),
(81, 44, 7, NULL, NULL, 10),
(82, 44, 8, NULL, NULL, 0),
(84, 46, 1, NULL, NULL, 10),
(85, 46, 2, NULL, NULL, 20),
(86, 46, 3, NULL, NULL, 30),
(87, 46, 4, NULL, NULL, 40),
(88, 46, 5, NULL, NULL, 50),
(89, 46, 7, NULL, NULL, 10),
(90, 46, 8, NULL, NULL, 10),
(91, 47, 1, NULL, NULL, 0),
(92, 47, 2, NULL, NULL, 0),
(93, 47, 3, NULL, NULL, 0),
(94, 47, 4, NULL, NULL, 0),
(95, 47, 5, NULL, NULL, 0),
(96, 38, 1, NULL, NULL, 0),
(97, 38, 2, NULL, NULL, 0),
(98, 38, 3, NULL, NULL, 0),
(99, 38, 4, NULL, NULL, 0),
(100, 39, 1, NULL, NULL, 0),
(101, 39, 2, NULL, NULL, 0),
(102, 39, 3, NULL, NULL, 0),
(103, 39, 4, NULL, NULL, 0),
(104, 39, 5, NULL, NULL, 0),
(105, 48, 1, NULL, NULL, 0),
(106, 48, 2, NULL, NULL, 0),
(107, 48, 3, NULL, NULL, 0),
(108, 48, 4, NULL, NULL, 0),
(109, 48, 5, NULL, NULL, 0),
(110, 49, 1, NULL, NULL, 10),
(111, 49, 2, NULL, NULL, 10),
(112, 49, 3, NULL, NULL, 10),
(113, 49, 4, NULL, NULL, 10),
(114, 49, 5, NULL, NULL, 10),
(115, 50, 1, NULL, NULL, 10),
(116, 50, 2, NULL, NULL, 10),
(117, 50, 3, NULL, NULL, 10),
(118, 50, 4, NULL, NULL, 10),
(119, 50, 5, NULL, NULL, 10),
(120, 51, 1, NULL, NULL, 10),
(121, 51, 2, NULL, NULL, 10),
(122, 51, 3, NULL, NULL, 10),
(123, 51, 4, NULL, NULL, 10),
(124, 51, 5, NULL, NULL, 10),
(125, 30, 2, NULL, NULL, 20),
(126, 30, 3, NULL, NULL, 30),
(127, 30, 4, NULL, NULL, 5),
(128, 30, 5, NULL, NULL, 6),
(129, 30, 7, NULL, NULL, 6),
(130, 30, 8, NULL, NULL, 7),
(131, 31, 2, NULL, NULL, 1),
(132, 31, 3, NULL, '2025-04-01 16:33:03', 1),
(133, 31, 4, NULL, NULL, 3),
(134, 31, 5, NULL, NULL, 4),
(135, 31, 7, NULL, NULL, 5),
(136, 31, 8, NULL, NULL, 6),
(137, 32, 1, NULL, NULL, 10),
(138, 32, 2, NULL, NULL, 20),
(139, 32, 3, NULL, NULL, 30),
(140, 52, 1, NULL, NULL, 90),
(141, 52, 2, NULL, NULL, 20),
(142, 52, 3, NULL, NULL, 50),
(143, 52, 4, NULL, NULL, 100),
(144, 52, 5, NULL, NULL, 100),
(145, 52, 7, NULL, NULL, 50),
(146, 52, 9, NULL, NULL, 50),
(147, 53, 1, NULL, NULL, 100),
(148, 53, 2, NULL, NULL, 200),
(149, 53, 3, NULL, NULL, 300),
(150, 53, 4, NULL, NULL, 300),
(151, 53, 5, NULL, NULL, 150),
(152, 53, 7, NULL, NULL, 100),
(153, 53, 8, NULL, NULL, 50),
(154, 54, 11, NULL, NULL, 0),
(155, 54, 12, NULL, NULL, 0),
(156, 54, 13, NULL, NULL, 0),
(157, 54, 14, NULL, NULL, 0),
(158, 54, 15, NULL, NULL, 0),
(159, 54, 16, NULL, NULL, 0),
(160, 54, 17, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `promotionals`
--

CREATE TABLE `promotionals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `promotional_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `promotionals`
--

INSERT INTO `promotionals` (`id`, `promotional_name`, `created_at`, `updated_at`) VALUES
(1, 'ShopEase Deals', '2025-02-12 04:30:38', '2025-02-12 04:30:38'),
(2, 'Trendify Promotions', '2025-02-12 04:31:01', '2025-02-12 04:31:01');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `size_name`, `created_at`, `updated_at`) VALUES
(1, 'S', '2025-02-10 03:43:49', '2025-02-10 03:43:49'),
(2, 'M', '2025-02-10 03:43:55', '2025-02-10 03:43:55'),
(3, 'L', '2025-02-10 03:44:00', '2025-02-10 03:44:00'),
(4, 'XL', '2025-02-10 03:44:04', '2025-02-10 03:44:04'),
(5, 'XXL', '2025-02-10 03:44:11', '2025-02-10 03:44:11'),
(7, '3XL', '2025-02-18 13:41:01', '2025-03-14 02:20:51'),
(8, '4Xl', '2025-02-27 16:47:10', '2025-02-27 16:47:10'),
(9, '5xl', '2025-02-28 12:45:17', '2025-02-28 12:45:17'),
(10, 'XS', '2025-03-14 02:21:20', '2025-03-14 02:21:20'),
(11, '92', '2025-03-14 02:22:30', '2025-03-14 02:22:30'),
(12, '104', '2025-03-14 02:22:46', '2025-03-14 02:22:46'),
(13, '116', '2025-03-14 02:22:54', '2025-03-14 02:22:54'),
(14, '128', '2025-03-14 02:23:03', '2025-03-14 02:23:03'),
(15, '140', '2025-03-14 02:23:12', '2025-03-14 02:23:12'),
(16, '152', '2025-03-14 02:23:20', '2025-03-14 02:23:20'),
(17, '164', '2025-03-14 02:23:28', '2025-03-14 02:23:28'),
(18, '86', '2025-03-14 02:23:38', '2025-03-14 02:23:38');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'dv63829@gmail.com', '2025-03-11 16:59:01', '2025-03-11 16:59:01'),
(2, 'karnamanil09@gmail.com', '2025-03-27 23:19:18', '2025-03-27 23:19:18'),
(3, 'karnamanil01@gmail.com', '2025-03-28 12:43:16', '2025-03-28 12:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Round Neck L/S', '2025-02-11 22:42:56', '2025-03-14 03:22:55'),
(5, 1, 'Round Neck  S/S', '2025-02-27 16:43:07', '2025-03-14 03:22:26'),
(7, 1, 'V Neck L/S', '2025-03-10 14:19:25', '2025-03-14 03:23:54'),
(8, 1, '\"V\" neck  S/S', '2025-03-10 14:19:43', '2025-03-14 03:23:23'),
(9, 2, 'Kurzarm', '2025-03-10 15:40:16', '2025-03-14 03:24:43'),
(10, 2, 'Langarm', '2025-03-10 16:07:56', '2025-03-14 03:24:58'),
(11, 3, 'Round Neck', '2025-03-14 03:27:28', '2025-03-14 03:27:28'),
(12, 3, 'Hoodie', '2025-03-14 03:27:49', '2025-03-14 03:27:49'),
(13, 3, 'Hoodie Jacket', '2025-03-14 03:28:07', '2025-03-14 03:28:07'),
(14, 3, 'Jacket', '2025-03-14 03:28:23', '2025-03-14 03:28:23'),
(15, 12, 'T-Shirt', '2025-03-14 03:30:28', '2025-03-14 03:30:28'),
(16, 12, 'Contrast T-Shirt', '2025-03-14 03:30:45', '2025-03-14 03:30:45'),
(17, 12, 'Training Hose', '2025-03-14 03:31:03', '2025-03-14 03:31:03'),
(18, 12, 'Polos', '2025-03-14 03:31:49', '2025-03-14 03:31:49'),
(19, 12, 'Tank Top', '2025-03-14 03:32:03', '2025-03-14 03:32:03'),
(20, 12, 'Leggings', '2025-03-14 03:32:25', '2025-03-14 03:32:25'),
(21, 12, 'Towels', '2025-03-14 03:33:07', '2025-03-14 03:33:07'),
(22, 12, 'Jogging Hose', '2025-03-14 03:33:57', '2025-03-14 03:33:57'),
(23, 13, 'Jacket', '2025-03-14 03:34:18', '2025-03-14 03:34:18'),
(24, 13, 'Vest', '2025-03-14 03:35:30', '2025-03-14 03:35:30'),
(25, 14, 'Softshell', '2025-03-14 03:37:01', '2025-03-14 03:37:01'),
(26, 14, 'Windbreaker', '2025-03-14 03:37:16', '2025-03-14 03:37:16'),
(27, 15, 'Shirt', '2025-03-14 03:37:44', '2025-03-14 03:37:44'),
(28, 15, 'Blouse', '2025-03-14 03:38:07', '2025-03-14 03:38:07'),
(29, 17, 'Caps', '2025-03-14 03:42:28', '2025-03-14 03:42:28'),
(30, 17, 'Stricksmütze', '2025-03-14 03:42:55', '2025-03-14 03:42:55'),
(31, 18, 'Cotton Bags', '2025-03-14 03:44:02', '2025-03-14 03:44:02'),
(32, 18, 'Jute Bags', '2025-03-14 03:44:16', '2025-03-14 03:44:16'),
(33, 18, 'Kosmetic Bags', '2025-03-14 03:45:38', '2025-03-14 03:45:38'),
(34, 18, 'Rücksack', '2025-03-14 03:46:12', '2025-03-14 03:46:12'),
(35, 18, 'Turnbeutel', '2025-03-14 03:47:39', '2025-03-14 03:47:39'),
(36, 18, 'Sportstasche', '2025-03-14 03:48:29', '2025-03-14 03:48:29'),
(37, 19, 'Women Tank Top', '2025-03-14 03:49:35', '2025-03-14 03:49:35'),
(38, 19, 'Men\'s Singlet', '2025-03-14 03:49:52', '2025-03-14 03:49:52'),
(39, 20, 'Safty Vest', '2025-03-14 03:50:40', '2025-03-14 03:50:40'),
(40, 20, 'Schürzen', '2025-03-14 03:51:25', '2025-03-14 03:51:25'),
(41, 21, 'Sub category testing 18 march', '2025-03-18 13:01:10', '2025-03-18 13:01:10'),
(42, 1, 'Girly', '2025-03-19 04:05:33', '2025-03-19 04:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `terms_conditions`
--

INSERT INTO `terms_conditions` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, '<h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">1. Introduction</font></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><p style=\"font-size: 16px;\"><font color=\"#636363\">Welcome to&nbsp;<span style=\"font-weight: bolder;\">[Your Name]</span>&nbsp;(\"we\", \"us\", \"our\"). By accessing or using our website&nbsp;<span style=\"font-weight: bolder;\">[yourwebsite.com]</span>&nbsp;(the \"Website\"), you agree to be bound by these Terms and Conditions (\"Terms\"). If you do not agree with these Terms, please do not use our Website.</font></p></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">2. Eligibility</font></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><p style=\"font-size: 16px;\"><font color=\"#636363\">To use our Website, you must be at least 18 years old or have the consent of a parent or guardian. By using our Website, you represent and warrant that you meet these eligibility requirements.</font></p></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">3. Products and Services</font></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><ul style=\"font-size: 16px;\"><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Prescription Medications</span>: We offer prescription medications only with a valid prescription from a licensed healthcare provider. It is your responsibility to ensure that the prescription is valid and accurate.</font></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Over-the-Counter Products</span>: We offer a range of over-the-counter products that can be purchased without a prescription.</font></li></ul></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">4. Account Registration</font></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><p style=\"font-size: 16px;\"><font color=\"#636363\">To use certain features of our Website, you may be required to create an account. You agree to provide accurate, current, and complete information during the registration process and to update such information to keep it accurate, current, and complete.</font></p></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">5. User Responsibilities</font></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><ul style=\"font-size: 16px;\"><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Accuracy of Information</span>: You agree to provide accurate and complete information when placing orders or using our Website.</font></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Security</span>: You are responsible for maintaining the confidentiality of your account information and for all activities that occur under your account.</font></li></ul></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">6. Orders and Payments</font></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><ul style=\"font-size: 16px;\"><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Order Acceptance</span>: All orders are subject to acceptance and availability. We reserve the right to refuse or cancel any order at our discretion.</font></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Pricing</span>: Prices are subject to change without notice. The final price will be confirmed at checkout.</font></li></ul></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">7. Shipping and Delivery</font></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><ul style=\"font-size: 16px;\"><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Shipping Costs</span>: Shipping costs will be calculated at checkout based on the delivery location and shipping method.</font></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Delivery Times</span>: Delivery times may vary based on your location and the shipping method selected. We are not responsible for delays caused by third-party carriers.</font></li></ul></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">8. Returns and Refunds</font></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><ul style=\"font-size: 16px;\"><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Prescription Medications</span>: Due to safety and legal reasons, prescription medications cannot be returned or exchanged.</font></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Over-the-Counter Products</span>: Over-the-counter products may be returned within&nbsp;<span style=\"font-weight: bolder;\">[X]</span>&nbsp;days of receipt, provided they are in their original, unopened packaging. Refunds will be processed in accordance with our return policy.</font></li></ul></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">9. Privacy</font></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><p style=\"font-size: 16px;\"><font color=\"#636363\">Your use of our Website is also governed by our Privacy Policy, which can be found&nbsp;<a rel=\"noopener\" href=\"http://127.0.0.1:8000/admin/termscondition/1/edit#\">here</a>. Please refer to it for details on how we collect, use, and protect your personal information.</font></p></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">10. Intellectual Property</font></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><p style=\"font-size: 16px;\"><font color=\"#636363\">All content on our Website, including text, graphics, logos, and images, is the property of&nbsp;<span style=\"font-weight: bolder;\">[Your Name]</span>&nbsp;or its licensors and is protected by intellectual property laws. You may not reproduce, distribute, or otherwise use any content from our Website without our prior written consent.</font></p></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">11. Limitation of Liability</font></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><p style=\"font-size: 16px;\"><font color=\"#636363\">To the fullest extent permitted by law,&nbsp;<span style=\"font-weight: bolder;\">[Your Pharmacy Name]</span>&nbsp;shall not be liable for any indirect, incidental, special, or consequential damages arising out of or in connection with your use of our Website or the products purchased through our Website.</font></p></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">12. Indemnification</font></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><p style=\"font-size: 16px;\"><font color=\"#636363\">You agree to indemnify and hold harmless&nbsp;<span style=\"font-weight: bolder;\">[Your Pharmacy Name]</span>, its affiliates, and their respective officers, directors, employees, and agents from any claims, liabilities, damages, losses, or expenses arising out of or in connection with your use of our Website or violation of these Terms.</font></p></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">13. Governing Law</font></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><p style=\"font-size: 16px;\"><font color=\"#636363\">These Terms shall be governed by and construed in accordance with the laws of&nbsp;<span style=\"font-weight: bolder;\">[Your Jurisdiction]</span>, without regard to its conflict of law principles.</font></p></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">14. Changes to Terms</font></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><p style=\"font-size: 16px;\"><font color=\"#636363\">We may update these Terms from time to time. The revised Terms will be posted on our Website with the effective date. Your continued use of our Website following the posting of revised Terms constitutes your acceptance of the changes.</font></p></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><font color=\"#636363\">15. Contact Information</font></h4><h4 style=\"font-family: &quot;Source Sans Pro&quot;, -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, &quot;Helvetica Neue&quot;, Arial, sans-serif, &quot;Apple Color Emoji&quot;, &quot;Segoe UI Emoji&quot;, &quot;Segoe UI Symbol&quot;; color: rgb(33, 37, 41);\"><p style=\"font-size: 16px;\"><font color=\"#636363\">If you have any questions or concerns about these Terms and Conditions, please contact us at:</font></p><ul style=\"font-size: 16px;\"><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Phone</span>: [Insert Phone Number]</font></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Email</span>: [Insert Support Email]</font></li><li><font color=\"#636363\"><span style=\"font-weight: bolder;\">Address</span>: [Insert Company Address]</font></li></ul></h4>', '2025-02-10 05:35:08', '2025-02-24 18:03:36');

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
(1, 'Admin', 'admin@admin.com', NULL, '$2y$12$rr4Ah9AXsYGnhcr3Hx4Hve86gIDgNql4LDBT1Cr/2cFRiiDC6gcBW', NULL, '2025-02-05 22:22:34', '2025-04-01 21:13:42');

-- --------------------------------------------------------

--
-- Table structure for table `vats`
--

CREATE TABLE `vats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `vat_percentage` decimal(5,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vats`
--

INSERT INTO `vats` (`id`, `country_id`, `vat_percentage`, `created_at`, `updated_at`) VALUES
(1, 3, 100.00, '2025-02-11 01:15:15', '2025-02-11 01:16:44'),
(2, 5, 25.00, '2025-02-11 01:17:46', '2025-02-11 01:17:46');

-- --------------------------------------------------------

--
-- Table structure for table `wears`
--

CREATE TABLE `wears` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `wear_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wears`
--

INSERT INTO `wears` (`id`, `wear_name`, `created_at`, `updated_at`) VALUES
(1, 'Male', '2025-02-12 00:35:11', '2025-02-12 05:44:22'),
(3, 'women', '2025-02-27 16:55:17', '2025-02-27 16:55:37'),
(4, 'kid', '2025-02-27 16:55:24', '2025-02-27 16:57:03'),
(5, 'unisex', '2025-02-27 16:55:30', '2025-02-27 16:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `weights`
--

CREATE TABLE `weights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `weight_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `weights`
--

INSERT INTO `weights` (`id`, `weight_name`, `created_at`, `updated_at`) VALUES
(1, '150 - 155 g/m²', '2025-02-10 05:03:32', '2025-03-14 02:26:08'),
(3, '180 - 190 g/m²', '2025-02-21 20:33:50', '2025-03-14 02:26:22'),
(4, '200 -210 g/m²', '2025-03-10 14:31:04', '2025-03-14 02:25:53'),
(5, '110 - 120 g/m²', '2025-03-10 15:54:31', '2025-03-14 02:27:03'),
(6, '210 -220 g/m²', '2025-03-14 19:00:13', '2025-03-14 19:00:13'),
(7, 'testing 18', '2025-03-18 18:38:01', '2025-03-18 18:38:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_article_name_unique` (`article_name`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cancellation_policies`
--
ALTER TABLE `cancellation_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_items_user_id_foreign` (`user_id`),
  ADD KEY `cart_items_product_id_foreign` (`product_id`),
  ADD KEY `cart_items_color_id_foreign` (`color_id`),
  ADD KEY `cart_items_size_id_foreign` (`size_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certifications`
--
ALTER TABLE `certifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_registrations`
--
ALTER TABLE `company_registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_registrations_email_unique` (`email`),
  ADD UNIQUE KEY `company_registrations_customer_id_unique` (`customer_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dimensions`
--
ALTER TABLE `dimensions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fabrics`
--
ALTER TABLE `fabrics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `materials_material_name_unique` (`material_name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_offers`
--
ALTER TABLE `news_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`),
  ADD KEY `orders_size_id_foreign` (`size_id`),
  ADD KEY `orders_color_id_foreign` (`color_id`),
  ADD KEY `orders_address_id_foreign` (`address_id`),
  ADD KEY `orders_billing_address_id_foreign` (`billing_address_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prefixes`
--
ALTER TABLE `prefixes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `products_material_id_foreign` (`material_id`),
  ADD KEY `products_weight_id_foreign` (`weight_id`),
  ADD KEY `products_article_id_foreign` (`article_id`),
  ADD KEY `products_country_id_foreign` (`country_id`),
  ADD KEY `products_promotion_id_foreign` (`promotion_id`),
  ADD KEY `products_wear_id_foreign` (`wear_id`),
  ADD KEY `products_fabric_id_foreign` (`fabric_id`);

--
-- Indexes for table `product_brand`
--
ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_brand_product_id_foreign` (`product_id`),
  ADD KEY `product_brand_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_color_product_id_foreign` (`product_id`),
  ADD KEY `product_color_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_product_id_foreign` (`product_id`),
  ADD KEY `product_images_color_id_foreign` (`color_id`);

--
-- Indexes for table `product_image_size`
--
ALTER TABLE `product_image_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_image_size_product_image_id_foreign` (`product_image_id`),
  ADD KEY `product_image_size_size_id_foreign` (`size_id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_size_product_id_foreign` (`product_id`),
  ADD KEY `product_size_size_id_foreign` (`size_id`);

--
-- Indexes for table `promotionals`
--
ALTER TABLE `promotionals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `subscriptions_email_unique` (`email`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `vats`
--
ALTER TABLE `vats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vats_country_id_foreign` (`country_id`);

--
-- Indexes for table `wears`
--
ALTER TABLE `wears`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weights`
--
ALTER TABLE `weights`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cancellation_policies`
--
ALTER TABLE `cancellation_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `certifications`
--
ALTER TABLE `certifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `company_registrations`
--
ALTER TABLE `company_registrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dimensions`
--
ALTER TABLE `dimensions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fabrics`
--
ALTER TABLE `fabrics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `news_offers`
--
ALTER TABLE `news_offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prefixes`
--
ALTER TABLE `prefixes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `privacy_policies`
--
ALTER TABLE `privacy_policies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `product_brand`
--
ALTER TABLE `product_brand`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `product_image_size`
--
ALTER TABLE `product_image_size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `promotionals`
--
ALTER TABLE `promotionals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vats`
--
ALTER TABLE `vats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wears`
--
ALTER TABLE `wears`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `weights`
--
ALTER TABLE `weights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `company_registrations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `cart_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `cart_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `company_registrations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_billing_address_id_foreign` FOREIGN KEY (`billing_address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `company_registrations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
  ADD CONSTRAINT `products_fabric_id_foreign` FOREIGN KEY (`fabric_id`) REFERENCES `fabrics` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `products_material_id_foreign` FOREIGN KEY (`material_id`) REFERENCES `materials` (`id`),
  ADD CONSTRAINT `products_promotion_id_foreign` FOREIGN KEY (`promotion_id`) REFERENCES `promotionals` (`id`),
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`),
  ADD CONSTRAINT `products_wear_id_foreign` FOREIGN KEY (`wear_id`) REFERENCES `wears` (`id`),
  ADD CONSTRAINT `products_weight_id_foreign` FOREIGN KEY (`weight_id`) REFERENCES `weights` (`id`);

--
-- Constraints for table `product_brand`
--
ALTER TABLE `product_brand`
  ADD CONSTRAINT `product_brand_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_brand_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_color`
--
ALTER TABLE `product_color`
  ADD CONSTRAINT `product_color_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_color_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_images_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_image_size`
--
ALTER TABLE `product_image_size`
  ADD CONSTRAINT `product_image_size_product_image_id_foreign` FOREIGN KEY (`product_image_id`) REFERENCES `product_images` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_image_size_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_size`
--
ALTER TABLE `product_size`
  ADD CONSTRAINT `product_size_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_size_size_id_foreign` FOREIGN KEY (`size_id`) REFERENCES `sizes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vats`
--
ALTER TABLE `vats`
  ADD CONSTRAINT `vats_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
