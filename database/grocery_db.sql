-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2021 at 12:47 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grocery_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `name`) VALUES
(9, 'Snacks'),
(11, 'Drinks'),
(12, 'Shampoo'),
(14, 'Oils'),
(15, 'Cereals');

-- --------------------------------------------------------

--
-- Table structure for table `customer_list`
--

CREATE TABLE `customer_list` (
  `id` int(30) NOT NULL,
  `customer_name` text NOT NULL,
  `email_id` text NOT NULL,
  `contact` varchar(30) NOT NULL,
  `firm_name` text DEFAULT NULL,
  `firm_location` text DEFAULT NULL,
  `pincode` int(6) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_list`
--

INSERT INTO `customer_list` (`id`, `customer_name`, `email_id`, `contact`, `firm_name`, `firm_location`, `pincode`, `city`, `state`) VALUES
(26, 'Bhushan Kumar', 'bk@gmail.com', '9888007654', 'Bhushan General Store', 'Near Gurudwara', 147001, 'Patiala', 'Punjab'),
(27, 'Ankit Chopra', 'ac5@gmail.com', '9076534521', 'Ankit Karyana Store', 'Model Town ', 110001, 'Delhi ', 'UT'),
(28, 'Kanav Bansal', 'kb@gmail.com', '9119148391', 'KB Store', 'Main Bazar', 403004, 'Aldona', 'Goa'),
(29, 'Harman Singh', 'hs33@gmail.com', '9876543210', 'HS Departmental Store', 'Leela Bhawan ', 148024, 'Dhuri', 'Punjab'),
(30, 'Saman Kumar', 'saman@gmail.com', '6283491600', 'Kumar Karyana Store', '22 no. Road', 148025, 'Sherpur', 'Punjab');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(30) NOT NULL,
  `price` float NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1= stockin , 2 = stockout',
  `stock_from` varchar(100) NOT NULL COMMENT 'sales/receiving',
  `form_id` int(30) NOT NULL,
  `remarks` text NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `product_id`, `qty`, `price`, `type`, `stock_from`, `form_id`, `remarks`, `date_updated`) VALUES
(46, 15, 120, 50, 1, 'receiving', 8, 'Stock from Receiving-00000000\r\n', '2021-06-01 23:49:47'),
(47, 19, 100, 200, 1, 'receiving', 8, 'Stock from Receiving-00000000\r\n', '2021-06-01 23:49:47'),
(48, 23, 60, 230, 1, 'receiving', 8, 'Stock from Receiving-00000000\r\n', '2021-06-01 23:49:47'),
(49, 16, 70, 270, 1, 'receiving', 9, 'Stock from Receiving-53970464\n', '2021-06-01 23:50:23'),
(50, 17, 40, 100, 1, 'receiving', 10, 'Stock from Receiving-53095315\r\n', '2021-06-01 23:51:24'),
(51, 21, 70, 25, 1, 'receiving', 10, 'Stock from Receiving-53095315\r\n', '2021-06-01 23:51:24'),
(52, 24, 90, 100, 1, 'receiving', 10, 'Stock from Receiving-53095315\r\n', '2021-06-01 23:51:24'),
(60, 25, 30, 170, 2, 'Sales', 12, 'Stock out from Sales-00000000\r\n', '2021-06-02 00:07:28'),
(61, 23, 12, 250, 2, 'Sales', 12, 'Stock out from Sales-00000000\r\n', '2021-06-02 00:07:28'),
(62, 16, 30, 300, 2, 'Sales', 13, 'Stock out from Sales-94172231\n', '2021-06-02 00:01:16'),
(63, 24, 11, 120, 2, 'Sales', 13, 'Stock out from Sales-94172231\n', '2021-06-02 00:01:16'),
(64, 20, 33, 20, 2, 'Sales', 13, 'Stock out from Sales-94172231\n', '2021-06-02 00:01:16'),
(68, 22, 40, 400, 2, 'Sales', 15, 'Stock out from Sales-58300037\r\n', '2021-06-02 00:08:04'),
(69, 18, 40, 200, 1, 'receiving', 11, 'Stock from Receiving-36152828\r\n', '2021-06-02 00:05:30'),
(70, 15, 35, 56, 2, 'Sales', 16, 'Stock out from Sales-86599010\n', '2021-06-02 00:06:54'),
(71, 18, 12, 200, 2, 'Sales', 16, 'Stock out from Sales-86599010\n', '2021-06-02 00:06:54'),
(72, 19, 40, 230, 2, 'Sales', 16, 'Stock out from Sales-86599010\n', '2021-06-02 00:06:54'),
(73, 21, 30, 30, 2, 'Sales', 12, 'Stock out from Sales-00000000\r\n', '2021-06-02 00:07:28'),
(75, 19, 7, 230, 2, 'Sales', 15, 'Stock out from Sales-58300037\r\n', '2021-06-02 11:41:07'),
(76, 25, 50, 150, 1, 'receiving', 12, 'Stock from Receiving-43472499\r\n', '2021-06-02 11:45:48'),
(77, 20, 40, 20, 1, 'receiving', 12, 'Stock from Receiving-43472499\r\n', '2021-06-02 11:46:26'),
(78, 22, 60, 350, 1, 'receiving', 13, 'Stock from Receiving-66044427\r\n', '2021-06-02 12:03:05'),
(81, 17, 20, 120, 2, 'Sales', 15, 'Stock out from Sales-58300037\r\n', '2021-06-02 12:49:07');

-- --------------------------------------------------------

--
-- Table structure for table `permissible_users_list`
--

CREATE TABLE `permissible_users_list` (
  `id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `store_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissible_users_list`
--

INSERT INTO `permissible_users_list` (`id`, `name`, `email`, `store_id`) VALUES
(7, 'Raj Kumar', 'raj@gmail.com', 10),
(8, 'Vinod Kansal', 'vk@gmail.com', 10);

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `supplier_id` int(30) NOT NULL,
  `batch` varchar(50) NOT NULL,
  `selling_price` double NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `expiry_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `category_id`, `supplier_id`, `batch`, `selling_price`, `name`, `description`, `expiry_date`) VALUES
(15, 11, 12, '13872413', 56, 'Coca cola', 'Diet (1.25L)', '2021-09-05'),
(16, 12, 9, '57186050', 300, 'Dove ', 'Hair Fall Rescue (650ml)', '2022-03-20'),
(17, 14, 11, '8677280', 120, 'Parachute', 'Aloevera enriched ', '2021-09-24'),
(18, 15, 13, '21522055', 200, 'Corn Flakes', 'Honey flavour', '2021-06-05'),
(19, 12, 12, '43313978', 230, 'Dove', 'Anti Dandruff', '2022-03-04'),
(20, 9, 10, '39077873', 20, 'Lays', 'Cream & Onion ', '2021-06-02'),
(21, 9, 11, '17615836', 30, 'Kurkure', 'Masala Munch', '2021-07-11'),
(22, 15, 10, '31004564', 400, 'Rice', 'Basmati (5kg)', '2022-09-01'),
(23, 11, 12, '63957230', 250, 'Coffee', 'BRU Gold', '2022-01-21'),
(24, 14, 11, '69173155', 120, 'Almond Oil', 'Bajaj (25ml)', '2021-12-31'),
(25, 12, 10, '6126458', 170, 'Clinic Plus', 'Silky and smooth', '2023-07-22');

-- --------------------------------------------------------

--
-- Table structure for table `receiving_list`
--

CREATE TABLE `receiving_list` (
  `id` int(30) NOT NULL,
  `ref_no` varchar(100) NOT NULL,
  `supplier_id` int(30) NOT NULL,
  `total_amount` double NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `receiving_list`
--

INSERT INTO `receiving_list` (`id`, `ref_no`, `supplier_id`, `total_amount`, `date_added`) VALUES
(8, '00000000\n', 12, 39800, '2021-06-01 23:44:30'),
(9, '53970464\n', 9, 18900, '2021-06-01 23:50:23'),
(10, '53095315\n', 11, 14750, '2021-06-01 23:50:47'),
(11, '36152828\n', 13, 8000, '2021-06-01 23:51:51'),
(12, '43472499\n', 10, 8300, '2021-06-01 23:53:04'),
(13, '66044427\n', 10, 21000, '2021-06-02 11:48:08');

-- --------------------------------------------------------

--
-- Table structure for table `sales_list`
--

CREATE TABLE `sales_list` (
  `id` int(30) NOT NULL,
  `ref_no` varchar(30) NOT NULL,
  `customer_id` int(30) NOT NULL,
  `total_amount` double NOT NULL,
  `amount_tendered` double NOT NULL,
  `amount_change` double NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_list`
--

INSERT INTO `sales_list` (`id`, `ref_no`, `customer_id`, `total_amount`, `amount_tendered`, `amount_change`, `date_updated`) VALUES
(12, '00000000\n', 26, 9000, 9000, 0, '2021-06-02 00:07:27'),
(13, '94172231\n', 28, 10980, 11000, 20, '2021-06-02 00:01:16'),
(15, '58300037\n', 27, 20010, 20010, 0, '2021-06-02 11:49:15'),
(16, '86599010\n', 29, 13560, 14000, 440, '2021-06-02 00:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `store_id` int(30) NOT NULL,
  `store_name` text NOT NULL,
  `store_loc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_id`, `store_name`, `store_loc`) VALUES
(10, 'J.K Enterprises', 'Main Bazar, Near Gurudwara');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_list`
--

CREATE TABLE `supplier_list` (
  `id` int(30) NOT NULL,
  `supplier_name` text NOT NULL,
  `email_id` text NOT NULL,
  `contact` varchar(30) NOT NULL,
  `firm_name` text NOT NULL,
  `firm_location` text NOT NULL,
  `pincode` int(6) NOT NULL,
  `city` text DEFAULT NULL,
  `state` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_list`
--

INSERT INTO `supplier_list` (`id`, `supplier_name`, `email_id`, `contact`, `firm_name`, `firm_location`, `pincode`, `city`, `state`) VALUES
(9, 'Manoj Kumar', 'mk@gmail.com', '9915019651', 'Manoj Karyana Store', 'Model town 12', 148024, 'Dhuri ', 'Punjab'),
(10, 'Sohan Goyal', 'sohan@gmail.com', '8766589043', 'Goyal Brothers', '22 no. Market ', 147001, 'Patiala', 'Punjab'),
(11, 'Rakesh Sharma', 'rs02@gmail.com', '6789054321', 'RK General Store', 'Near Bus Stand ', 226001, 'Lucknow', 'UP'),
(12, 'Aman Singh ', 'aman@gmail.com', '6283491729', 'AS Store', 'Sadar Bazar', 148101, 'Barnala', 'Punjab'),
(13, 'Raman Aggarwal', 'raman@gmail.com', '7890065544', 'Raman Departmental Store', 'Pharwahi Bazar', 323021, 'Kota', 'Rajasthan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1=owner , 2 = permissible',
  `pincode` int(6) NOT NULL,
  `city` varchar(200) NOT NULL,
  `state` varchar(200) NOT NULL,
  `store_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `type`, `pincode`, `city`, `state`, `store_id`) VALUES
(33, 'Jatinder', 'Kumar', 'jk04@gmail.com', '4cdf29939e36963e78e1319d2b0d9a82', 1, 148025, 'Sherpur', 'Punjab', 10),
(34, 'Raj', 'Kumar', 'raj@gmail.com', 'c223199626bf0875cbc4e5859c93040c', 2, 148101, 'Barnala', 'Punjab', 10),
(36, 'Vinod', 'Kansal', 'vk@gmail.com', 'd2c51c9cde1f15b718296c99ae362fb1', 2, 133001, 'Ambala', 'Haryana', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user_phone`
--

CREATE TABLE `user_phone` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `phone_number` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_phone`
--

INSERT INTO `user_phone` (`id`, `user_id`, `phone_number`) VALUES
(1, 33, '9417429425'),
(2, 33, '9988019649'),
(3, 34, '8907677889'),
(4, 34, '7654323456'),
(6, 36, '7007960304'),
(7, 36, '7589325632');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_list`
--
ALTER TABLE `customer_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inventory_product` (`product_id`);

--
-- Indexes for table `permissible_users_list`
--
ALTER TABLE `permissible_users_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissible_store` (`store_id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_fk` (`category_id`),
  ADD KEY `supplier_fk` (`supplier_id`);

--
-- Indexes for table `receiving_list`
--
ALTER TABLE `receiving_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receiving_supplier` (`supplier_id`);

--
-- Indexes for table `sales_list`
--
ALTER TABLE `sales_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sale_customer` (`customer_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`store_id`);

--
-- Indexes for table `supplier_list`
--
ALTER TABLE `supplier_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `user_store` (`store_id`);

--
-- Indexes for table `user_phone`
--
ALTER TABLE `user_phone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_fk` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customer_list`
--
ALTER TABLE `customer_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `permissible_users_list`
--
ALTER TABLE `permissible_users_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `receiving_list`
--
ALTER TABLE `receiving_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sales_list`
--
ALTER TABLE `sales_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `supplier_list`
--
ALTER TABLE `supplier_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_phone`
--
ALTER TABLE `user_phone`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_product` FOREIGN KEY (`product_id`) REFERENCES `product_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permissible_users_list`
--
ALTER TABLE `permissible_users_list`
  ADD CONSTRAINT `permissible_store` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_list`
--
ALTER TABLE `product_list`
  ADD CONSTRAINT `category_fk` FOREIGN KEY (`category_id`) REFERENCES `category_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supplier_fk` FOREIGN KEY (`supplier_id`) REFERENCES `supplier_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `receiving_list`
--
ALTER TABLE `receiving_list`
  ADD CONSTRAINT `receiving_supplier` FOREIGN KEY (`supplier_id`) REFERENCES `supplier_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales_list`
--
ALTER TABLE `sales_list`
  ADD CONSTRAINT `sale_customer` FOREIGN KEY (`customer_id`) REFERENCES `customer_list` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user_store` FOREIGN KEY (`store_id`) REFERENCES `store` (`store_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_phone`
--
ALTER TABLE `user_phone`
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
