-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2026 at 08:57 PM
-- Server version: 10.11.16-MariaDB
-- PHP Version: 8.3.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perla`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `email` varchar(254) NOT NULL,
  `password` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`email`, `password`, `name`) VALUES
('admin1@gmail.com', '123456', 'Admin1');

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `productID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblcontain`
--

CREATE TABLE `tblcontain` (
  `productID` int(11) NOT NULL,
  `orderID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblfaq`
--

CREATE TABLE `tblfaq` (
  `faqID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `telephone` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `replied` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblfaq`
--

INSERT INTO `tblfaq` (`faqID`, `email`, `name`, `telephone`, `comment`, `replied`) VALUES
(18, 'emma.wilson@example.com', 'Emma Wilson', 700000001, 'What are the recommended care and maintenance guidelines for pearl jewellery?', 0),
(19, 'olivia.martin@example.com', 'Olivia Martin', 700000002, 'Do your pearls come with a certificate of authenticity?', 0),
(20, 'sophia.jones@example.com', 'Sophia Jones', 700000003, 'Do you offer custom-made pearl necklaces?', 1),
(21, 'charlotte.brown@example.com', 'Charlotte Brown', 700000004, 'How long does delivery usually take within Sri Lanka?', 0),
(22, 'amelia.davis@example.com', 'Amelia Davis', 700000005, 'Can I exchange a product if it does not meet my expectations?', 1),
(23, 'isabella.taylor@example.com', 'Isabella Taylor', 700000006, 'Are your pearl earrings suitable for sensitive ears?', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`orderID`, `productID`, `userID`, `quantity`, `total`, `status`) VALUES
(61, 17, 36, 1, 23000, 'pending'),
(62, 22, 36, 1, 23000, 'pending'),
(64, 26, 36, 1, 30000, 'pending'),
(65, 31, 36, 4, 44000, 'pending'),
(67, 17, 37, 2, 46000, 'pending'),
(68, 22, 38, 1, 23000, 'Delivered'),
(69, 31, 40, 3, 33000, 'Delivered'),
(70, 18, 41, 2, 40000, 'pending'),
(71, 25, 42, 1, 34000, 'Shipped'),
(72, 26, 43, 2, 60000, 'Processing'),
(73, 28, 44, 1, 43000, 'pending'),
(74, 21, 45, 2, 20000, 'Delivered'),
(75, 30, 46, 1, 30000, 'Shipped');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `productID` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(20) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `pearlType` varchar(50) DEFAULT NULL,
  `metalType` varchar(50) DEFAULT NULL,
  `chainLength` varchar(50) DEFAULT NULL,
  `pearlSize` varchar(50) DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`productID`, `name`, `description`, `category`, `price`, `quantity`, `pearlType`, `metalType`, `chainLength`, `pearlSize`, `image`) VALUES
(4, 'Freshwater Pearl Hoop Earrings', '', 'Earring', 37000, 120, 'Fusion Akoya and Golden South Sea Cultured Pearl', '14k gold plated s925 silver', '16', '12', 'image14.webp'),
(16, 'Freshwater Pearls Bracelet', '', 'Bracelet', 30000, 19, 'imgage-itemWhite South Sea cultured pearl', '14K gold filled', '6', '8mm approx.', '05_e7e3f98c-0967-4e24-9778-bea391c4298c_1400x.webp'),
(17, 'Freshwater Pearl Choker Necklace', 'Beautiful natural freshwater baroque pearl featuring an 14K gold chain. Beautiful necklace that can be worn casually or dress it up.', 'Necklace', 23000, 52, 'imgage-itemWhite South Sea cultured pearl', '14k gold plated s925 silver', '16', '7-8mm', 'image08.webp'),
(18, 'Akoya Pearl Drop Earrings', '', 'Earring', 20000, 22, 'imgage-itemWhite South Sea cultured pearl', '14k gold plated s925 silver', '1111', '8mm approx.', 'image15.webp'),
(19, 'Akoya Pearl Drop Earrings', '', 'Earring', 20000, 22, 'imgage-itemWhite South Sea cultured pearl', '14k gold plated s925 silver', '1111', '8mm approx.', 'image16.webp'),
(20, 'Akoya Pearl Drop Earrings', '', 'Earring', 20000, 22, 'imgage-itemWhite South Sea cultured pearl', '14k gold plated s925 silver', '11', '8mm approx.', 'image17.webp'),
(21, 'Akoya Cultured Pearl Ring', '', 'Ring', 10000, 100, 'Akoya Cultured Pear', '18K yellow gold', '', '7-8mm', 'image30.jpg'),
(22, 'Les Pétales Place Vendôme Akoya Cultured Pearl Ring', '', 'Ring', 23000, 100, 'Akoya Cultured Pearl', '18K Pink Gold', '', '8mm approx.', 'image31.jpg'),
(23, 'Les Pétales Place Vendôme Akoya Cultured Pearl Ring', '', 'Ring', 23000, 100, 'Akoya Cultured Pearl', '18K Pink Gold', '', '8mm approx.', 'image31.jpg'),
(24, 'Akoya Cultured Pearl Ring', '', 'Ring', 29000, 44, 'Akoya Cultured Pearl', 'Yellow Gold', '', '7-8mm', 'image32.jpg'),
(25, 'Passionoir Black South Sea Cultured Pearl Necklace with Diamond Clasp', '', 'Passionoir', 34000, 11, 'Black South Sea Cultured Pearl', '18K white gold plated in black rhodium', '', '7-8mm', 'collection02.webp'),
(26, 'Passionoir Akoya Cultured Pearl Ear Cuff', '', 'Passionoir', 30000, 22, 'Akoya Cultured Pearl', 'silver plated in black rhodium', '', '8mm approx.', 'collection03.webp'),
(27, 'Passionoir Akoya Cultured Pearl Ear Cuff', '', 'Passionoir', 50000, 11, 'Akoya Cultured Pearl ', 'silver plated in black rhodium', '', ' 6mm', 'collection01.webp'),
(28, 'Akoya Cultured Pearl and Diamond Rondells Necklace in 18K White Gold', '', 'Necklace', 43000, 223, 'Akoya Cultured Pearl', '18K White Gold', '9', '8mm approx.', 'image27.webp'),
(30, 'Akoya Cultured Pearl Strand Necklace', '', 'Necklace', 30000, 55, 'Akoya Cultured Pearl', '14k gold plated s925 silver', '16\"  / 42cm  adjustable', '7-8mm', 'image37.webp'),
(31, 'Akoya Cultured Pearl Station Bracelet', '', 'Bracelet', 11000, 100, 'Akoya Cultured Pearl', 'silver plated in black rhodium', '6.7“ / 17cm approx', ' 6mm', 'image11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `userID` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `password` varchar(10) NOT NULL,
  `phoneNumber` int(11) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `district` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`userID`, `email`, `fullName`, `password`, `phoneNumber`, `area`, `district`, `province`, `status`) VALUES
(30, 'john@gmail.com', 'John Smith', '123', NULL, NULL, NULL, NULL, 'active'),
(34, 'rusty@gmail.com', 'Rusty', 'Rusty123', NULL, NULL, NULL, NULL, 'active'),
(36, 'johnsmith652839@gmail.com', 'John Smith', '1234', 112913326, 'No 7, Sri Sudarshanaramaya Himbutuwelode Kalmunai', 'Trincomalee', 'Eastern Province', 'active'),
(37, 'emma.wilson@example.com', 'Emma Wilson', 'Emma123', 771000001, 'Peradeniya', 'Kandy', 'Central', 'active'),
(38, 'olivia.martin@example.com', 'Olivia Martin', 'Olivia123', 771000002, 'Nugegoda', 'Colombo', 'Western', 'active'),
(39, 'sophia.jones@example.com', 'Sophia Jones', 'Sophia123', 771000003, 'Galle Fort', 'Galle', 'Southern', 'active'),
(40, 'charlotte.brown@example.com', 'Charlotte Brown', 'Char123', 771000004, 'Katugastota', 'Kandy', 'Central', 'active'),
(41, 'amelia.davis@example.com', 'Amelia Davis', 'Amelia123', 771000005, 'Negombo', 'Gampaha', 'Western', 'active'),
(42, 'isabella.taylor@example.com', 'Isabella Taylor', 'Bella123', 771000006, 'Matara Town', 'Matara', 'Southern', 'active'),
(43, 'mia.anderson@example.com', 'Mia Anderson', 'Mia12345', 771000007, 'Kurunegala Town', 'Kurunegala', 'North Western', 'active'),
(44, 'ava.thomas@example.com', 'Ava Thomas', 'Ava12345', 771000008, 'Jaffna Town', 'Jaffna', 'Northern', 'active'),
(45, 'grace.jackson@example.com', 'Grace Jackson', 'Grace123', 771000009, 'Badulla Town', 'Badulla', 'Uva', 'inactive'),
(46, 'lily.white@example.com', 'Lily White', 'Lily12345', 771000010, 'Anuradhapura Town', 'Anuradhapura', 'North Central', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`productID`,`userID`),
  ADD KEY `fk_user_cart` (`userID`);

--
-- Indexes for table `tblcontain`
--
ALTER TABLE `tblcontain`
  ADD PRIMARY KEY (`productID`,`orderID`);

--
-- Indexes for table `tblfaq`
--
ALTER TABLE `tblfaq`
  ADD PRIMARY KEY (`faqID`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcontain`
--
ALTER TABLE `tblcontain`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblfaq`
--
ALTER TABLE `tblfaq`
  MODIFY `faqID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `orderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
