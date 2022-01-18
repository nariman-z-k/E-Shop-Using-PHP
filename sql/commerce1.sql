-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 09:22 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `commerce1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstName` varchar(125) NOT NULL,
  `lastName` varchar(125) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `confirmCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `oplace` text NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `dstatus` varchar(10) NOT NULL DEFAULT 'no',
  `odate` date NOT NULL,
  `ddate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `uid`, `pid`, `quantity`, `oplace`, `mobile`, `dstatus`, `odate`, `ddate`) VALUES
(45, 24, 10, 1, 'tehran', '09123456789', 'no', '2021-12-24', '2021-12-31');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pName` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `available` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `item` varchar(100) NOT NULL,
  `pCode` varchar(20) NOT NULL,
  `picture` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pName`, `price`, `description`, `available`, `category`, `type`, `item`, `pCode`, `picture`) VALUES
(3, 'Product Name Here', 1200, 'Description Here', 2, 'women', 'Chain Set', 'ornament', 'SR002', 'Women-Neck-Jewelry-Exaggerated-Metal-Collar-Bone-Chain-Set.jpg'),
(4, 'Product Name Here', 1200, 'Description Here', 2, 'women', 'cloathing', 'saree', 'SR002', 'Colors-Women-Embellished-Saree_2.jpg'),
(5, 'Product Name Here', 1200, 'Description Here', 2, 'women', 'cloathing', 'saree', 'SR002', 'Colors-Women-Embellished-Saree_3.jpg'),
(6, 'Product Name Here', 2000, 'Description Here', 2, 'women', 'Chain Set', 'ornament', 'SR002', 'Jewelry-Color-created-created-diamond-Love-font-b.jpg'),
(7, 'Product Name Here', 2000, 'Description Here', 2, 'women', 'earring', 'ornament', 'SR002', 'earrings-online-for-women-4.jpg'),
(10, 'Product Name Here', 1300, 'Description Here', 4, 'women', 'cloathing', 'saree', 'SR001', 'Saree Red Color 1.jpg'),
(11, 'Product Name Here', 1200, 'Description Here', 2, 'women', 'cloathing', 'saree', 'SR002', 'new-designer-fancy-look-attractive-saree-2-original.jpg'),
(26, 'Product Name Here', 700, 'Description Here', 2, 'women', 'No', 'watch', 'W234', '1491496755.jpg'),
(27, 'Product Name Here', 700, 'Description Here', 3, 'women', 'yes', 'watch', 'W234', '1491496880.jpg'),
(28, 'Product Name Here', 399, 'Description Here', 2, 'women', 'no', 'watch', 'W345', '1491496956.jpg'),
(29, 'Product Name Here', 1000, 'Description Here', 3, 'women', 'yes', 'watch', 'W345', '1491497102.jpg'),
(30, 'Product Name Here', 200, 'Description Here', 3, 'women', 'ok', 'ornament', 'O234', '1491497201.jpg'),
(31, 'Product Name Here', 1200, 'Description Here', 3, 'women', 'ok', 'ornament', 'O254', '1491497263.jpg'),
(32, 'Product Name Here', 799, 'Description Here', 2, 'women', 'no', 'ornament', 'O2352', '1491497316.jpg'),
(33, 'Product Name Here', 250, 'Description Here', 10, 'women', 'no', 'tshirt', 'TS252', '1491497478.jpg'),
(34, 'Product Name Here', 400, 'Description Here', 12, 'women', 'no', 'tshirt', 'TS3463', '1491497528.jpg'),
(35, 'Product Name Here', 299, 'Description Here', 27, 'women', 'no', 'tshirt', 'TS345', '1491497588.jpg'),
(36, 'Product Name Here', 890, 'Description Here', 30, 'women', 'no', 'tshirt', 'TS2354', '1491497644.jpg'),
(37, 'Product Name Here', 700, 'Description Here', 3, 'women', 'no', 'hijab', 'H98', '1491498074.jpg'),
(38, 'Product Name Here', 400, 'Description Here', 23, 'women', 'no', 'hijab', 'H3254', '1491498134.JPG'),
(39, 'Product Name Here', 600, 'Description Here', 20, 'women', 'no', 'hijab', 'H2354', '1491498202.jpg'),
(40, 'Product Name Here', 800, 'Description Here', 23, 'women', 'no', 'hijab', 'H233', '1491498250.jpg'),
(41, 'Product Name Here', 2000, 'Description Here', 10, 'women', 'no', 'perfume', 'P2354', '1491498354.jpg'),
(42, 'Product Name Here', 150, 'Description Here', 2, 'women', 'no', 'perfume', 'P345', '1491498398.jpg'),
(43, 'Product Name Here', 3000, 'Description Here', 6, 'women', 'no', 'perfume', 'P252', '1491649246.jpg'),
(44, 'Product Name Here', 5000, 'Description Here', 3, 'women', 'no', 'perfume', 'P254', '1491498508.jpg'),
(45, 'Product Name Here', 5000, 'Description Here', 300, 'kidsmom', 'clothing', 'footwear', 'S32543', '1491498848.jpg'),
(49, 'Product Name Here', 80, 'Description Here', 20, 'women', 'no', 'toiletry', 'SP234', '1491499503.jpg'),
(51, 'Product Name Here', 4453, 'Description Here', 34, 'women', 'clothing', 'watch', 'asdf78', '1491707164.jpg'),
(52, 'Product Name Here', 453354, 'Description Here', 342, 'women', 'clothing', 'perfume', 'S56', '1491850298.jpg'),
(53, 'Product Name Here', 345, 'Description Here', 30, 'women', 'clothing', 'toiletry', 'S789', '1491850339.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address` varchar(120) NOT NULL,
  `password` varchar(100) NOT NULL,
  `confirmCode` varchar(10) NOT NULL,
  `activation` varchar(10) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `mobile`, `address`, `password`, `confirmCode`, `activation`) VALUES
(24, 'Arash', 'Irany', 'arash@website.com', '09123456789', 'tehran', '25f9e794323b453885f5181f1b624d0b', '0', 'yes'),
(25, 'Kourosh', 'Irany', 'kourosh@website.com', '09123456789', 'tehran', '6ebe76c9fb411be97b3b0d48b791a7c9', '0', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
