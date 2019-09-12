-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2019 at 05:28 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `addimage`
--

CREATE TABLE `addimage` (
  `id` int(20) NOT NULL,
  `name` varchar(500) NOT NULL,
  `picture` varchar(500) NOT NULL,
  `picture_dir` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addimage`
--

INSERT INTO `addimage` (`id`, `name`, `picture`, `picture_dir`) VALUES
(1, 'envy', 'images.jpg', 'uploads/images.jpg'),
(2, 's10', 'iPhoneX-Svr.png', 'uploads/iPhoneX-Svr.png'),
(3, 's10', 'iPhoneX-Svr.png', 'uploads/iPhoneX-Svr.png'),
(4, 'xaiomi', '1.jpg.jpg', 'uploads/1.jpg.jpg'),
(5, 'xaiomi', 'download.jpg', 'uploads/download.jpg'),
(6, 's9', 'h.jpg', 'uploads/h.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `addproduct`
--

CREATE TABLE `addproduct` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `details` varchar(200) NOT NULL,
  `quantity` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `type` varchar(30) DEFAULT NULL,
  `brand` varchar(30) DEFAULT NULL,
  `discount` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addproduct`
--

INSERT INTO `addproduct` (`id`, `name`, `details`, `quantity`, `price`, `type`, `brand`, `discount`) VALUES
(1, 'asSasa', ' 2sdfdasd', '12', '23', 'mobile', 'nokia', '23'),
(2, 'mzncmzxn', ' dasdd', '2', '20000', 'mobile', 'iphone', '23234'),
(3, 's9', ' jnx', '2', '34', 'mobile', 'sumsung', '40'),
(4, 'envy', ' high', '34', '10000', 'computer', 'hp', '2'),
(5, 's10', ' hight range', '20', '1000', 'mobile', 'Nokia', '5'),
(6, 's10', ' hight range', '20', '1000', 'mobile', 'Nokia', '5'),
(7, 'xaiomi', ' good', '8788', '100000', 'mobile', 'Nokia', '0'),
(8, 's9', ' sdsdsds', '11', '23', 'mobile', 'Samsung', '0');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gmail` varchar(50) NOT NULL,
  `feedback` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `gmail`, `feedback`) VALUES
(1, 'mridul', 'mridul@gmail.com', ' bad developer'),
(2, 'nan', 'nan@gmail.com', ' good developer'),
(3, 'himi', 'himi@yahoo.com', ' i need iphone x'),
(4, 'mridul', 'gg@gmail.com', ' erer'),
(5, 'safayat', 'safa@gmail.com', ' bad'),
(6, 'nan', 'sss@gmail.com', 'defence ');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(20) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Specification` varchar(200) NOT NULL,
  `Quantity` varchar(20) NOT NULL,
  `Price` varchar(50) NOT NULL,
  `Category` varchar(50) NOT NULL,
  `Brand` varchar(50) NOT NULL,
  `Discount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `Name`, `Specification`, `Quantity`, `Price`, `Category`, `Brand`, `Discount`) VALUES
(1, 's9', ' sdasdadas', '5', '50000', 'mobile', 'dell', '12'),
(2, 's8', ' sddasdas', '5', '15000', 'mobile', 'sumsung', '10'),
(3, 'x', ' middle class', '5', '20000', 'mobile', 'nokia', '10'),
(4, 'xyz', ' skdoas', '2', '1212', 'computer', 'dell', '12'),
(5, 'xyz', ' skdoas', '2', '1212', 'computer', 'dell', '12'),
(6, 's9', ' qqqqq', '10', '20000', 'mobile', 'op', '12'),
(7, 'pro', 'asakask ', '1', '10000', 'mobile', 'nokia', '10'),
(8, 's8', ' aaaaasdsdasd', '1', '10000', 'mobile', 'iphone', '12'),
(9, 's9', ' asakjkasjk', 'asass', 'asas', 'mobile', 'hp', '10'),
(10, 's9', ' asakjkasjk', 'asass', 'asas', 'mobile', 'hp', '10'),
(11, 'x', ' jjhjh', '22', '2555555', 'mobile', 'dell', '12');

-- --------------------------------------------------------

--
-- Table structure for table `pro_duct`
--

CREATE TABLE `pro_duct` (
  `id` int(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `details` varchar(200) DEFAULT NULL,
  `quantity` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `brand` varchar(20) NOT NULL,
  `discount` varchar(20) DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `picture_dir` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pro_duct`
--

INSERT INTO `pro_duct` (`id`, `name`, `details`, `quantity`, `price`, `type`, `brand`, `discount`, `picture`, `picture_dir`) VALUES
(2, 'iphone X', ' USER FRENDLY', '5', '10000', 'mobile', 'Apple', '10', 'photo-1511707171634-5f897ff02aa9.jpg', 'uploads/photo-1511707171634-5f897ff02aa9.jpg'),
(5, 'xaiomi a1', ' low', '10', '10000', 'mobile', 'One Plus', '10', 'photo-1511707171634-5f897ff02aa9.jpg', 'uploads/photo-1511707171634-5f897ff02aa9.jpg'),
(6, 'oneplus6', ' uuuuu', '10', '100000', 'mobile', 'One Plus', '0', 'iPhoneX-Svr.png', 'uploads/iPhoneX-Svr.png'),
(7, 'lcd', ' high', '10', '100000', 'electronics', 'TV', '0', 'L.jpg', 'uploads/L.jpg'),
(9, 'tv-light', ' high', '12', '100000', 'mobile', 'Nokia', '12', 'microsoft-surface-laptop-mouse.png', 'uploads/microsoft-surface-laptop-mouse.png'),
(10, 'Motorola One Power (P30 Note) ', ' Released 2018, October\r\n205g, 8.4mm thickness\r\nAndroid 8.1, up to 9.0; Android One; ZUI 4\r\n64GB storage, microSD card slot', '3', '150000', 'mobile', 'Nokia', '10', 'motorola-one-power-.jpg', 'uploads/motorola-one-power-.jpg'),
(11, 'jjjjj', ' jjjj', '68', '50000', 'electronics', 'Fridge', '12', '81wY93IwZWL (1).jpg', 'uploads/81wY93IwZWL (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registrationtable`
--

CREATE TABLE `registrationtable` (
  `id` int(20) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(500) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registrationtable`
--

INSERT INTO `registrationtable` (`id`, `firstname`, `lastname`, `email`, `phone`, `password`, `type`, `status`) VALUES
(3, 'sun', 'an', 'gg@gmail.com', '01630117225', '       ', 'customers', '1'),
(5, 'ggggggggggggg', 'jjjjjjjjjjjjjjjjjjjjjjj', 'gg@gmail.com', '01912346572', '12345678', 'customers', '1'),
(8, '          jon            jon', 'kkkkk           kkkkkk           kkk', 'gg@gmail.com', '01630117225', '11111111', 'customers', '1'),
(9, 'mridul', 'mallik', 'm@gmail.com', '01630117225', '111111', 'customers', '1'),
(10, 'sunan', 'suno', 'sunan@gmail.com', '01811111111', '123456', 'customers', '1'),
(11, 'safa', 'safa', 'safa@gmail.com', '01630117225', '123456', 'employee', '2'),
(12, 'safa', 'safa', 'safa@gmail.com', '01630117225', 'safayat', 'employee', '2'),
(13, 'safa', 'kabir', 'safakabir@gmail.com', '01630117225', '11111111', 'customers', '1'),
(14, 'admin', 'admin', 'admin@gmail.com', '01630117225', '123456', 'admin', '2'),
(16, 'khan', 'ahmed', 'khan@gmail.com', '01630117225', '11111111', 'customers', '1'),
(17, 'nayem', 'ahmed', 'ahmed@yahoo.com', '01745678765', '234567', 'admin', '2'),
(18, 'safa', 'kabir', 'sk@gmail.com', '01543678954', '666666', 'admin', '2'),
(19, 'safa', 'safa', 'safay@gmail.com', '01912346572', 'safayat', 'customers', '1'),
(20, 'mri', 'mri', 'mrid@gmail.com', '01912346572', 'mridul', 'customers', '1'),
(21, 'amamma', 'akoskdaslk', 'am@gmail.com', '12345678901', '123456', 'customers', '1'),
(22, 'safa', 'safa', 'safakabir@gmail.com', '11111111111', '111111111', 'customers', '1'),
(23, 'iraz', 'ahmed', 'iraz@gmail.com', '01987243567', '123456', 'customers', '1'),
(24, '     df', '   dfdfd', 'ddfd@yahoo.com', '01278987654', '1234567', 'customers', '1'),
(25, 'nayemur', 'rahaman', 'nayem@gmail.com', '01789305411', 'nayem123', 'customers', '1'),
(26, 'rafid', 'khan', 'rafid@gmail.com', '01625378998', '123456', 'customers', '1'),
(27, 'khan', 'ahmed', 'ahmed@gmail.com', '01734124365', '1234567', 'customers', '1'),
(28, 'abcd', 'efg', 'ade@gmail.com', '01630117225', '123456789', 'customers', '1'),
(29, 'safayat', 'safa', 'safayat@gmai.com', '01950285907', 'safayat', 'customers', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addimage`
--
ALTER TABLE `addimage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `addproduct`
--
ALTER TABLE `addproduct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_duct`
--
ALTER TABLE `pro_duct`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registrationtable`
--
ALTER TABLE `registrationtable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addimage`
--
ALTER TABLE `addimage`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `addproduct`
--
ALTER TABLE `addproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pro_duct`
--
ALTER TABLE `pro_duct`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `registrationtable`
--
ALTER TABLE `registrationtable`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
