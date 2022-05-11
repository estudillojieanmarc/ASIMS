-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2022 at 11:41 AM
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
(87, 'vivo');

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
(44, 'spray/paint');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `position` varchar(250) NOT NULL,
  `email_address` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `image` varchar(250) NOT NULL,
  `token` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`emp_id`, `fullname`, `position`, `email_address`, `username`, `password`, `image`, `token`) VALUES
(1, 'Jiean Marc Estudillo', 'Administrator', 'estudillojieanmarc22@gmail.com', 'jieanmarc22', 'Estudillojieanmarc22', 'avatar3.jpg', 'd44b6de399841a1368de7fe3fd9eb5fd'),
(2, 'Jan Remiel Menor', 'administrator', 'janremiel@gmail.com', 'janremiel123', 'janremiel123', 'avatar1.jpg', '2312dsf3ds'),
(3, 'James Ybanez', 'administrator', 'james@gmail.com', 'james123', 'james123', 'avatar3.jpg', '213sdcsfs');

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

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `receipt_no` varchar(250) NOT NULL,
  `purchased` date NOT NULL,
  `item_barcode` varchar(250) NOT NULL,
  `customers` varchar(250) NOT NULL,
  `method` varchar(250) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_sales` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `receipt_no`, `purchased`, `item_barcode`, `customers`, `method`, `quantity`, `total_sales`) VALUES
(42, '0512312wade', '2022-05-11', '#123123', 'Jiean Marc Estudillo', '', 12, 120);

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
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `categoryname`
--
ALTER TABLE `categoryname`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
