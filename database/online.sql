-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2018 at 05:18 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_category`
--

CREATE TABLE `all_category` (
  `ac_id` int(11) NOT NULL,
  `ac_name` varchar(500) NOT NULL,
  `ac_p_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `all_category`
--

INSERT INTO `all_category` (`ac_id`, `ac_name`, `ac_p_id`) VALUES
(1, 'Mobile', 0),
(2, 'TV', 0),
(3, 'Computer', 0),
(4, 'Men\'s Fashion', 0),
(5, 'Women\'s Fashion', 0),
(6, 'Computer Accessories ', 3),
(7, 'Desktops', 3),
(8, 'Tablets', 1),
(9, 'Power Banks', 1),
(10, 'Televisions', 2),
(11, 'Speakers', 2),
(12, 'Shirts', 4),
(13, 'Jeans', 4),
(14, 'Western Wear', 5),
(15, 'Ethnic Wear', 5),
(16, 'Casual Shirts', 12),
(17, 'Formal Shirts', 12),
(18, 'Trousers', 14),
(19, 'Leggings', 14),
(20, 'Slim', 13),
(21, 'Skinny', 13);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(200) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_qty` int(11) NOT NULL,
  `p_category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_name`, `p_price`, `p_qty`, `p_category_id`) VALUES
(1, 'Pepe Jeans', 100, 10, 20),
(2, 'Demokrazy Men\'s Regular Fit', 150, 5, 20),
(3, 'Woolen Leggings', 130, 8, 19),
(4, 'Thermal Hot Winter Leggings', 150, 5, 19),
(5, 'JBL GO Portable', 180, 15, 11),
(6, 'Boat Stone 1000 ', 200, 15, 11),
(7, 'Samsung 23.5 inch', 1800, 10, 6),
(8, 'Dell 19.5 inch', 2000, 5, 6),
(9, 'Acer One 7 Tablet', 500, 10, 8),
(10, 'Lenovo Tab4 10 Tablet', 170, 5, 8);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_user_name` varchar(500) NOT NULL,
  `u_password` varchar(500) NOT NULL,
  `u_cart` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_user_name`, `u_password`, `u_cart`) VALUES
(1, 'hitesh', '123456', ''),
(2, 'jaydip', '456789', ''),
(3, 'sandip', '789123', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_category`
--
ALTER TABLE `all_category`
  ADD PRIMARY KEY (`ac_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_category`
--
ALTER TABLE `all_category`
  MODIFY `ac_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
