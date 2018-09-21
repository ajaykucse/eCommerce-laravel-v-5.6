-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2018 at 03:48 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elaravel`
--

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
(7, '2018_08_20_111732_create_tbl_admin_table', 1),
(8, '2018_08_20_192213_create_tbl_category_table', 1),
(9, '2018_08_21_204802_create_tbl_manufacture_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'md5',
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'ajau43@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Ajay Kumar Yadav', '01687430392', '2018-08-23 18:00:00', '2018-08-23 18:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Men', 'this is men category', 1, NULL, NULL),
(2, 'Women', 'this is women category&nbsp;', 1, NULL, NULL),
(3, 'Boys', 'this is boy category', 1, NULL, NULL),
(4, 'Girls', 'this is girls category', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`customer_id`, `customer_name`, `customer_email`, `password`, `mobile_number`) VALUES
(1, 'Ajay Kumar Yadav', 'ajau43@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01687430392'),
(2, 'Ajay Kumar Yadav', 'ajau43@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '01687430392'),
(3, 'Bijay Kumar Yadav', 'bijay@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '0123456789');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manufacture`
--

CREATE TABLE `tbl_manufacture` (
  `manufacture_id` int(10) UNSIGNED NOT NULL,
  `manufacture_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacture_description` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_manufacture`
--

INSERT INTO `tbl_manufacture` (`manufacture_id`, `manufacture_name`, `manufacture_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Levis', 'this is brands&nbsp;', 1, NULL, NULL),
(2, 'Polo', 'this is Polo brands', 1, NULL, NULL),
(3, 'Lotto', '<span style=\"color: rgb(85, 85, 85); font-family: Roboto, Helvetica, Arial, sans-serif; font-size: 21px; background-color: rgb(255, 255, 255);\">Lotto was established in 1973 by the Caberlotto family in Montebelluna, northern Italy, the world centre of footwear manufacturing.</span>', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(11) NOT NULL,
  `order_total` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `customer_id` int(255) UNSIGNED NOT NULL,
  `shipping_id` int(255) UNSIGNED NOT NULL,
  `payment_id` int(255) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_orders`
--

INSERT INTO `tbl_orders` (`order_id`, `order_total`, `order_status`, `customer_id`, `shipping_id`, `payment_id`) VALUES
(1, '3,836.00', 'pending', 3, 4, 1),
(2, '3,836.00', 'pending', 3, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_sales_qty` varchar(255) NOT NULL,
  `order_id` int(55) NOT NULL,
  `product_id` int(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `product_name`, `product_price`, `product_sales_qty`, `order_id`, `product_id`) VALUES
(1, 'Easy Polo Black Edition', '560', '4', 2, 5),
(2, 'T-shirt', '399', '2', 2, 7),
(3, 'Sandal', '399', '2', 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE `tbl_payments` (
  `payment_id` int(11) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`payment_id`, `payment_method`, `payment_status`) VALUES
(1, 'handcash', 'pending'),
(2, 'handcash', 'pending'),
(3, 'handcash', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `manufacture_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_id`, `product_name`, `product_short_description`, `product_long_description`, `product_price`, `product_image`, `product_size`, `product_color`, `publication_status`, `category_id`, `manufacture_id`, `created_at`, `updated_at`) VALUES
(1, 'Easy Polo Black Edition', '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Easy Polo Black Edition</span></font>', '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Easy Polo Black Edition</span></font>', 399.00, 'images/dtwGXNksmF6PiSEfIYe1.jpg', 'Small, Medium, Large, Extra Large', 'Black, Green', 1, 1, 1, NULL, NULL),
(2, 'Easy Polo Black Edition', '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Easy Polo Black Edition</span></font>', '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Easy Polo Black Edition</span></font>', 560.00, 'images/uOH5FygkuececPugTzCS.jpg', 'Small, Medium, Large, Extra Large', 'Black, Green', 1, 1, 2, NULL, NULL),
(3, 'Easy Polo Black Edition', '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Easy Polo Black Edition</span></font>', '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Easy Polo Black Edition</span></font>', 599.00, 'images/IQlbRpaEouvKwjFFIBex.jpg', 'Small, Medium, Large, Extra Large', 'Black, Green, White', 1, 2, 1, NULL, NULL),
(4, 'Easy Polo Black Edition', '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Easy Polo Black Edition</span></font>', '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Easy Polo Black Edition</span></font>', 399.00, 'images/5fKJWHVs61rjzLkVOYEC.jpg', 'Small, Medium, Large, Extra Large', 'Black, Green', 1, 4, 1, NULL, NULL),
(5, 'Easy Polo Black Edition', '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Easy Polo Black Edition</span></font>', '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Easy Polo Black Edition</span></font>', 560.00, 'images/Z5i1ZffY73raQXjjUzKk.jpg', 'Small, Medium, Large, Extra Large', 'Black, Green, White', 1, 4, 2, NULL, NULL),
(6, 'Easy Polo Black Edition', '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Easy Polo Black Edition</span></font>', '<font face=\"Arial, Verdana\"><span style=\"font-size: 13.3333px;\">Easy Polo Black Edition</span></font>', 399.00, 'images/dNtaaDZco6exA2Tsh20W.jpg', 'Small, Medium, Large, Extra Large', 'Black, Green, White', 1, 2, 1, NULL, NULL),
(7, 'T-shirt', 'Exclusive Apparels colorful', '<span style=\"font-size: 13.3333px;\">Exclusive Apparels colorful, lighted, trendy, e</span><span style=\"font-size: 13.3333px;\">xclusive t-shirt&nbsp;</span>', 399.00, 'images/gRcgncdA4tQtt5N0WtKN.jpg', 'Small, Medium, Large, Extra Large', 'Black, Green, White', 1, 1, 3, NULL, NULL),
(8, 'Shoes', 'Lotto sport shoes&nbsp;', '<span style=\"font-size: 13.3333px;\">Lotto sport shoes boots your lifestyle</span>', 599.00, 'images/vfG60jRfnMJrMXyYLkN7.jpg', 'Small, Medium, Large, Extra Large', 'Black, White', 1, 1, 3, NULL, NULL),
(9, 'Sandal', '<span style=\"color: rgb(17, 17, 17); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Care Instruction : Remove surface dirt such as mud and grit.</span>', '<span style=\"color: rgb(17, 17, 17); font-family: &quot;Amazon Ember&quot;, Arial, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Use an old toothbrush or nail brush, a little warm water and a gentle, anti-grease soap. This should take&nbsp;care&nbsp;of the dirt, and is fine to do once in a while.</span>', 399.00, 'images/OMVas7qX0WxCo0pw4rSi.jpeg', 'Small, Medium, Large, Extra Large', 'Black, Green, White', 1, 1, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(11) NOT NULL,
  `shipping_email` varchar(255) NOT NULL,
  `shipping_first_name` varchar(255) NOT NULL,
  `shipping_last_name` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_mobile_number` varchar(255) NOT NULL,
  `shipping_city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_email`, `shipping_first_name`, `shipping_last_name`, `shipping_address`, `shipping_mobile_number`, `shipping_city`) VALUES
(1, 'bijay@gmail.com', 'Bijay', 'Yadav', 'Banchauri 02', '09812072394', 'Janakpur'),
(2, 'ajau43@gmail.com', 'Ajay', 'Yadav', 'Khulna-9208', '01687430392', 'Khulna'),
(3, 'ajau43@gmail.com', 'Ajay', 'Yadav', 'Khulna-9208', '01687430392', 'Khulna'),
(4, 'bijay@gmail.com', 'Bijay', 'Yadav', 'Banchauri-02', '09812072394', 'Janakpur');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_image` varchar(255) NOT NULL,
  `publication_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_image`, `publication_status`) VALUES
(1, 'slider/2awyPEo0RgDH4A1K9TZW.jpg', 1),
(2, 'slider/CNNq9v2jaHdU5WdhPfJ3.jpg', 1),
(3, 'slider/WwDXOHaXy6muM45t4lwe.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_manufacture`
--
ALTER TABLE `tbl_manufacture`
  ADD PRIMARY KEY (`manufacture_id`);

--
-- Indexes for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`,`order_id`,`product_id`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_manufacture`
--
ALTER TABLE `tbl_manufacture`
  MODIFY `manufacture_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
