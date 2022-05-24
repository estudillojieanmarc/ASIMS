-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 07:17 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `a&s`
--

-- --------------------------------------------------------

--
-- Table structure for table `brandname`
--

CREATE TABLE `brandname` (
  `brand_id` int(11) NOT NULL,
  `brand` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brandname`
--

INSERT INTO `brandname` (`brand_id`, `brand`) VALUES
(1, 'No Brand'),
(97, 'Test Brand ');

-- --------------------------------------------------------

--
-- Table structure for table `categoryname`
--

CREATE TABLE `categoryname` (
  `cat_id` int(11) NOT NULL,
  `category` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categoryname`
--

INSERT INTO `categoryname` (`cat_id`, `category`) VALUES
(1, 'No Category'),
(56, 'Test Category');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL,
  `email_address` varchar(250) NOT NULL,
  `PhoneNumber` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `is_active` int(11) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `fullname`, `position`, `email_address`, `PhoneNumber`, `username`, `password`, `image`, `is_active`, `token`) VALUES
(1, 'Jiean Marc Estudillo', 'Administrator', 'estudillojieanmarc22@gmail.com', '09398320589', 'jieanmarc22', 'Jieanmarc22', 'avatar123.jpg', 1, 'd2139079576d9c2bc123bd51bb4b4c7d'),
(2, 'Jan Remiel Menors', 'Mechanic', 'janremiel@gmail.com', '09103658328', 'janremiel22', 'janremiel123', 'avatar1.jpg', 1, '2312dsf3ds'),
(3, 'James Ybanez', 'Mechanic', 'jame@gmail.com', '09287210476', 'james123', 'james123', 'avatar2.jpg', 1, '213sdcsfs'),
(13, 'Sam Ibrahim', 'Administrator', 'sam@gmail.com', '09474626752', 'sam123', 'default123', 'default.png', 1, '95067e202586e91d3f3342bdea496ab6'),
(14, 'Amira Ibrahim ', 'Owner', 'Amira@gmail.com', '09474626734', 'Amira22', 'default123', 'default.png', 1, '09d5f663c29ae5ce58f8e6091a0b2912');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `history_id` int(11) NOT NULL,
  `history` varchar(250) NOT NULL,
  `set_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `history`
--

INSERT INTO `history` (`history_id`, `history`, `set_on`) VALUES
(1, 'Mr/Ms. Jiean Marc Estudillo has added Sam Ibrahim to our system', '2022-05-19 07:03:33'),
(2, 'Mr/Ms. Jiean Marc Estudillo has add task to our system', '2022-05-19 07:05:57'),
(5, 'Mr/Ms. Jiean Marc Estudillo has add brand test2 to our system', '2022-05-19 07:15:12'),
(7, 'Mr/Ms. Jiean Marc Estudillo has add brand  to our system', '2022-05-19 07:16:31'),
(8, 'Mr/Ms. Jiean Marc Estudillo has add brand test to our system', '2022-05-19 07:17:12'),
(9, 'Mr/Ms. Jiean Marc Estudillo has add category test2 to our system', '2022-05-19 07:17:40'),
(10, 'Mr/Ms. Jiean Marc Estudillo has update Tire to our system', '2022-05-19 07:33:08'),
(11, 'Mr/Ms. Jiean Marc Estudillo has update Wire to our system', '2022-05-19 07:33:51'),
(13, 'Mr/Ms. Jiean Marc Estudillo has update Wire at category to our system', '2022-05-19 07:35:40'),
(14, 'Mr/Ms. Jiean Marc Estudillo has update Vivo add brand to our system', '2022-05-19 07:36:54'),
(15, 'Mr/Ms. Jiean Marc Estudillo has update Samsung at brand to our system', '2022-05-19 07:37:26'),
(16, 'Mr/Ms. Jiean Marc Estudillo has update Tire  at Inventory to our system', '2022-05-19 07:39:48'),
(17, 'Mr/Ms. Jiean Marc Estudillo has update Jan Remiel Menors at Employees to our system', '2022-05-19 07:42:39'),
(18, 'Mr/Ms. Jiean Marc Estudillo has update Black Helmet at Inventory', '2022-05-19 07:43:21'),
(19, 'Mr/Ms. Jiean Marc Estudillo has update Wd-40 at Inventory', '2022-05-19 07:45:04'),
(21, 'Mr/Ms. Jiean Marc Estudillo has enable 2 at our system', '2022-05-19 07:49:25'),
(22, 'Mr/Ms. Jiean Marc Estudillo has disable employee id 2 at our system', '2022-05-19 07:50:02'),
(23, 'Mr/Ms. Jiean Marc Estudillo has enable employee id 2 at our system', '2022-05-19 07:50:12'),
(24, 'Mr/Ms. Jiean Marc Estudillo has add brand No Brand to our system', '2022-05-19 07:58:11'),
(25, 'Mr/Ms. Jiean Marc Estudillo has add brand test to our system', '2022-05-19 08:00:06'),
(26, 'Mr/Ms. Jiean Marc Estudillo has delete brand id 95 at brand', '2022-05-19 08:00:23'),
(27, 'Mr/Ms. Jiean Marc Estudillo has add category test to our system', '2022-05-19 08:00:42'),
(28, 'Mr/Ms. Jiean Marc Estudillo has delete category id 53 at category', '2022-05-19 08:00:48'),
(29, 'Mr/Ms. Jiean Marc Estudillo has update Wd-40 at Inventory', '2022-05-19 08:01:20'),
(30, 'Mr/Ms. Jiean Marc Estudillo has delete item id on at our system', '2022-05-19 08:01:40'),
(32, 'Mr/Ms. Jiean Marc Estudillo has add sales at our system', '2022-05-19 08:06:22'),
(33, 'Mr/Ms. Jiean Marc Estudillo has delete #123123123 at sales', '2022-05-19 08:06:56'),
(34, 'Mr/Ms. Jiean Marc Estudillo has update Tire  at Inventory', '2022-05-19 08:09:46'),
(35, 'Mr/Ms. Jiean Marc Estudillo has update Wd-40 at Inventory', '2022-05-19 08:35:31'),
(36, 'Mr/Ms. Jiean Marc Estudillo has update Black Helmet at Inventory', '2022-05-19 08:35:35'),
(37, 'Mr/Ms. Jiean Marc Estudillo has add sales at our system', '2022-05-19 08:43:47'),
(38, 'Mr/Ms. Jiean Marc Estudillo has delete on at sales', '2022-05-23 05:32:50'),
(39, 'Mr/Ms. Jiean Marc Estudillo has delete #123123123 at sales', '2022-05-23 05:32:58'),
(40, 'Mr/Ms. Jiean Marc Estudillo has add task to our system', '2022-05-23 05:33:09'),
(41, 'Mr/Ms. Jiean Marc Estudillo has delete task id 34 at our system', '2022-05-23 05:33:14'),
(42, 'Mr/Ms. Jiean Marc Estudillo has add sales at our system', '2022-05-23 05:34:37'),
(43, 'Mr/Ms. Jiean Marc Estudillo has disable employee id 13 at our system', '2022-05-23 05:35:22'),
(44, 'Mr/Ms. Jiean Marc Estudillo has add sales at our system', '2022-05-23 06:33:24'),
(45, 'Mr/Ms. Jiean Marc Estudillo has update Wd-40 at Inventory', '2022-05-23 08:11:46'),
(46, 'Mr/Ms. Jiean Marc Estudillo has update Black Helmet at Inventory', '2022-05-23 08:11:50'),
(47, 'Mr/Ms. Jiean Marc Estudillo has add sales at our system', '2022-05-23 10:22:08'),
(48, 'Mr/Ms. Jiean Marc Estudillo has update Black Helmet at Inventory', '2022-05-23 10:36:56'),
(49, 'Mr/Ms. Jiean Marc Estudillo has update Tire  at Inventory', '2022-05-23 10:37:02'),
(50, 'Mr/Ms. Jiean Marc Estudillo has update Wd-40 at Inventory', '2022-05-23 11:05:24'),
(51, 'Mr/Ms. Jiean Marc Estudillo has add sales at our system', '2022-05-23 11:07:39'),
(52, 'Mr/Ms. Jiean Marc Estudillo has add sales at our system', '2022-05-23 11:09:37'),
(53, 'Mr/Ms. Jiean Marc Estudillo has delete 1 at sales', '2022-05-23 11:11:35'),
(54, 'Mr/Ms. Jiean Marc Estudillo has delete # at sales', '2022-05-23 11:11:42'),
(55, 'Mr/Ms. Jiean Marc Estudillo has add sales at our system', '2022-05-23 11:12:25'),
(56, 'Mr/Ms. Jiean Marc Estudillo has add sales at our system', '2022-05-23 11:19:59'),
(57, 'Mr/Ms. Jiean Marc Estudillo has add sales at our system', '2022-05-23 11:24:20'),
(58, 'Mr/Ms. Jiean Marc Estudillo has add sales at our system', '2022-05-23 11:25:48'),
(59, 'Mr/Ms. Jiean Marc Estudillo has enable employee id 13 at our system', '2022-05-23 11:28:07'),
(60, 'Mr/Ms. Jiean Marc Estudillo has add category test to our system', '2022-05-24 02:25:23'),
(61, 'Mr/Ms. Jiean Marc Estudillo has update Wd-40 at Inventory', '2022-05-24 02:25:32'),
(62, 'Mr/Ms. Jiean Marc Estudillo has delete category id 54 at category', '2022-05-24 02:25:45'),
(63, 'Mr/Ms. Jiean Marc Estudillo has update Wd-40 at Inventory', '2022-05-24 02:33:36'),
(64, 'Mr/Ms. Jiean Marc Estudillo has add sales at our system', '2022-05-24 02:35:45'),
(65, 'Mr/Ms. Jiean Marc Estudillo has add sales at our system', '2022-05-24 02:41:52'),
(66, 'Mr/Ms. Jiean Marc Estudillo has delete #246784554 at sales', '2022-05-24 02:42:01'),
(67, 'Mr/Ms. Jiean Marc Estudillo has delete #123454321 at sales', '2022-05-24 02:42:11'),
(68, 'Mr/Ms. Jiean Marc Estudillo has disable employee id 2 at our system', '2022-05-24 02:44:09'),
(69, 'Mr/Ms. Jiean Marc Estudillo has add sales at our system', '2022-05-24 03:12:00'),
(70, 'Mr/Ms. Jiean Marc Estudillo has delete #321321 at sales', '2022-05-24 03:12:28'),
(71, 'Mr/Ms. Jiean Marc Estudillo has add sales at our system', '2022-05-24 03:15:32'),
(72, 'Mr/Ms. Jiean Marc Estudillo has update Wd-40 at Inventory', '2022-05-24 03:19:13'),
(73, 'Mr/Ms. Jiean Marc Estudillo has update Black Helmet at Inventory', '2022-05-24 03:19:18'),
(74, 'Mr/Ms. Jiean Marc Estudillo has add sales at our system', '2022-05-24 03:20:17'),
(75, 'Mr/Ms. Jiean Marc Estudillo has add sales at our system', '2022-05-24 03:22:57'),
(76, 'Mr/Ms. Jiean Marc Estudillo has update Wd-40 at Inventory', '2022-05-24 03:23:33'),
(77, 'Mr/Ms. Jiean Marc Estudillo has add sales at our system', '2022-05-24 03:24:13'),
(78, 'Mr/Ms. Jiean Marc Estudillo has add sales at our system', '2022-05-24 03:28:06'),
(79, 'Mr/Ms. Jiean Marc Estudillo has add sales at our system', '2022-05-24 03:29:48'),
(80, 'Mr/Ms. Jiean Marc Estudillo has add brand test to our system', '2022-05-24 03:30:32'),
(81, 'Mr/Ms. Jiean Marc Estudillo has add category test to our system', '2022-05-24 03:30:38'),
(82, 'Mr/Ms. Jiean Marc Estudillo has delete category id 55 at category', '2022-05-24 03:31:22'),
(83, 'Mr/Ms. Jiean Marc Estudillo has delete brand id 96 at brand', '2022-05-24 03:32:00'),
(84, 'Mr/Ms. Jiean Marc Estudillo has update Wd-40 at Inventory', '2022-05-24 03:32:58'),
(85, 'Mr/Ms. Jiean Marc Estudillo has update Black Helmet at Inventory', '2022-05-24 03:33:01'),
(86, 'Mr/Ms. Jiean Marc Estudillo has add sales at our system', '2022-05-24 03:34:46'),
(87, 'Mr/Ms. Jiean Marc Estudillo has enable employee id 2 at our system', '2022-05-24 04:56:36'),
(88, 'Mr/Ms. Jiean Marc Estudillo has added Amira Ibrahim  to our system', '2022-05-24 04:58:54'),
(89, 'Mr/Ms. Jiean Marc Estudillo has add brand Test Brand  to our system', '2022-05-24 04:59:59'),
(90, 'Mr/Ms. Jiean Marc Estudillo has add category Test Category to our system', '2022-05-24 05:00:19'),
(91, 'Mr/Ms. Jiean Marc Estudillo has update Wd-40 at Inventory', '2022-05-24 05:00:56'),
(92, 'Mr/Ms. Jiean Marc Estudillo has update Black Helmet at Inventory', '2022-05-24 05:01:02'),
(93, 'Mr/Ms. Jiean Marc Estudillo has update Black Helmet at Inventory', '2022-05-24 05:01:16'),
(94, 'Mr/Ms. Jiean Marc Estudillo has update Wd-40 at Inventory', '2022-05-24 05:01:22'),
(95, 'Mr/Ms. Jiean Marc Estudillo has add sales at our system', '2022-05-24 05:06:43'),
(96, 'Mr/Ms. Jiean Marc Estudillo has add task to our system', '2022-05-24 05:08:38'),
(97, 'Mr/Ms. Jiean Marc Estudillo has delete task id 35 at our system', '2022-05-24 05:09:53'),
(98, 'Mr/Ms. Jan Remiel Menors has add task to our system', '2022-05-24 05:10:33'),
(99, 'Mr/Ms. Jan Remiel Menors has delete task id 36 at our system', '2022-05-24 05:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `id` int(11) NOT NULL,
  `item_name` varchar(250) NOT NULL,
  `item_barcode` varchar(250) NOT NULL,
  `item_image` varchar(250) NOT NULL,
  `item_description` varchar(500) NOT NULL,
  `item_stock` float NOT NULL,
  `item_brand` float NOT NULL,
  `item_category` float NOT NULL,
  `item_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`id`, `item_name`, `item_barcode`, `item_image`, `item_description`, `item_stock`, `item_brand`, `item_category`, `item_price`) VALUES
(37, 'Wd-40', '#123123', 'wd-40.png', 'This is good for rust removal', 0, 97, 56, 120),
(38, 'Black Helmet', '#321321', 'helmet.jpg', 'this is a black helmet', 0, 97, 56, 1000),
(39, 'Tire ', '#456654', 'tire.jpg', 'This is a tire ', 8, 1, 1, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `receipt_no` varchar(250) NOT NULL,
  `purchased` date NOT NULL,
  `item_id` int(11) NOT NULL,
  `customers` varchar(250) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_sales` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `receipt_no`, `purchased`, `item_id`, `customers`, `quantity`, `total_sales`) VALUES
(158, '#123123123', '2022-05-23', 37, 'Jiean Marc Estudillo', 1, 480),
(159, '#123123', '2022-05-26', 39, 'Jiean Marc Estudillo', 1, 1500),
(160, '#3211231231', '2022-05-21', 38, 'Jiean Marc Estudillo', 1, 1000),
(163, '#1234567', '2022-05-19', 37, 'Jiean Marc Estudillo', 1, 120),
(164, '#1234567', '2022-05-19', 38, 'Jiean Marc Estudillo', 2, 2000),
(165, '#7654321', '2022-05-18', 37, 'Jiean Marc Estudillo', 4, 480),
(166, '#7654321', '2022-05-18', 38, 'Jiean Marc Estudillo', 1, 1000),
(167, '#311233321', '2022-05-24', 37, 'Jiean Marc Estudillo', 1, 120),
(168, '#311233321', '2022-05-24', 38, 'Jiean Marc Estudillo', 3, 3000),
(173, '#234432234', '2022-05-24', 38, 'Jiean Marc Estudillo', 1, 1000),
(174, '#234432234', '2022-05-24', 0, 'Jiean Marc Estudillo', 0, 0),
(177, '#321321', '2022-05-16', 39, 'Jiean Marc Estudillo', 1, 1500),
(178, '#123455432', '2022-05-16', 39, 'Jiean Marc Estudillo', 1, 1500),
(179, '#123455432', '2022-05-16', 38, 'Jiean Marc Estudillo', 1, 1000),
(180, '#0939832', '2022-05-15', 38, 'Jiean Marc Estudillo', 2, 2000),
(181, '#09398320', '2022-05-15', 38, 'Jiean Marc Estudillo', 2, 2000),
(182, '#09398320', '2022-05-15', 37, 'Jiean Marc Estudillo', 4, 480),
(183, '#0939832012', '2022-05-14', 38, 'Jiean Marc Estudillo', 1, 1000),
(184, '#432234432', '2022-05-17', 38, 'Jiean Marc Estudillo', 1, 1000),
(185, '#04222001', '2022-05-20', 38, 'Jiean Marc Estudillo', 1, 1000),
(186, '#01123123121', '2022-05-22', 37, 'Jiean Marc Estudillo', 1, 120),
(187, '#24681012', '2022-05-25', 38, 'Jiean Marc Estudillo', 1, 1000),
(188, '#24681012', '2022-05-25', 37, 'Jiean Marc Estudillo', 1, 120),
(189, '#98767892', '2022-05-25', 38, 'Paul Corsina ', 1, 1000),
(190, '#98767892', '2022-05-25', 37, 'Paul Corsina ', 2, 240);

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `sender` varchar(250) NOT NULL,
  `task` varchar(5000) NOT NULL,
  `submit` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brandname`
--
ALTER TABLE `brandname`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `categoryname`
--
ALTER TABLE `categoryname`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`history_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brandname`
--
ALTER TABLE `brandname`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `categoryname`
--
ALTER TABLE `categoryname`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
