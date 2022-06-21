-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2022 at 03:04 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hooei'scoffee`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id_account` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `gender` int(11) NOT NULL,
  `birth` date NOT NULL DEFAULT current_timestamp(),
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `salary` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id_account`, `username`, `password`, `avatar`, `firstname`, `lastname`, `gender`, `birth`, `address`, `phone`, `type`, `salary`) VALUES
(1, 'admin', '4c79273eed3d095e55d1224f6524ae92', '', 'Nguyễn', 'Minh Huy', 1, '2022-06-14', '', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id_bill` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id_bill`, `id_account`, `date`, `price`, `discount`, `total_price`) VALUES
(17, 1, '2022-06-20 00:48:10', 23000, 0, 23000),
(18, 1, '2022-06-20 00:50:47', 30000, 0, 30000),
(19, 1, '2022-06-21 00:50:58', 23000, 0, 23000),
(20, 1, '2022-06-21 01:00:04', 23000, 0, 23000),
(21, 1, '2022-06-21 01:03:32', 75000, 0, 75000),
(22, 1, '2022-06-21 10:34:10', 46000, 0, 46000),
(23, 1, '2022-06-21 10:34:25', 121000, 0, 121000);

-- --------------------------------------------------------

--
-- Table structure for table `bill_info`
--

CREATE TABLE `bill_info` (
  `id_bill_info` varchar(255) NOT NULL,
  `id_bill` int(11) NOT NULL,
  `id_drink` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `note` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill_info`
--

INSERT INTO `bill_info` (`id_bill_info`, `id_bill`, `id_drink`, `quantity`, `note`) VALUES
('202206210048081', 17, 1, 23, ''),
('202206210050452', 18, 2, 1, ''),
('202206210050561', 19, 1, 7, ''),
('202206210100034', 20, 4, 3, ''),
('202206210103303', 21, 3, 1, 'Ko đá'),
('202206210103312', 21, 2, 1, ''),
('202206210919251', 22, 1, 1, ''),
('202206210937271', 22, 1, 1, ''),
('202206211034181', 23, 1, 1, ''),
('202206211034192', 23, 2, 1, ''),
('202206211034233', 23, 3, 3, ''),
('202206211034244', 23, 4, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name`) VALUES
(1, 'Coffee'),
(2, 'Machine Coffee'),
(3, 'Cold Brew'),
(4, 'Fruit Tea');

-- --------------------------------------------------------

--
-- Table structure for table `drink`
--

CREATE TABLE `drink` (
  `id_drink` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `sold` int(11) NOT NULL DEFAULT 0,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drink`
--

INSERT INTO `drink` (`id_drink`, `id_category`, `image`, `name`, `price`, `sold`, `date`, `status`) VALUES
(1, 1, 'black coffee.png', 'Cà phê phin đen', 23000, 3, '2022-06-20', 1),
(2, 4, 'peachtea.jpg', 'Trà đào cam sả', 30000, 1, '2022-06-21', 1),
(3, 3, 'coldbrew.jpg', 'Cold Brew Truyền Thống', 45000, 3, '2022-06-20', 1),
(4, 2, '1639377738_ca-phe-sua-da.jpg', 'Cà phê máy sữa', 23000, 1, '2022-06-20', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id_account`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`),
  ADD KEY `id_account` (`id_account`);

--
-- Indexes for table `bill_info`
--
ALTER TABLE `bill_info`
  ADD PRIMARY KEY (`id_bill_info`),
  ADD KEY `id_bill` (`id_bill`),
  ADD KEY `id_drink` (`id_drink`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `drink`
--
ALTER TABLE `drink`
  ADD PRIMARY KEY (`id_drink`),
  ADD KEY `id_category` (`id_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id_account` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `drink`
--
ALTER TABLE `drink`
  MODIFY `id_drink` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `account` (`id_account`);

--
-- Constraints for table `bill_info`
--
ALTER TABLE `bill_info`
  ADD CONSTRAINT `bill_info_ibfk_2` FOREIGN KEY (`id_drink`) REFERENCES `drink` (`id_drink`),
  ADD CONSTRAINT `bill_info_ibfk_3` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id_bill`);

--
-- Constraints for table `drink`
--
ALTER TABLE `drink`
  ADD CONSTRAINT `drink_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
