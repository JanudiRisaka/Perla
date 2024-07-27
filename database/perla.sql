-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 11, 2024 at 05:59 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

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

DROP TABLE IF EXISTS `tbladmin`;
CREATE TABLE IF NOT EXISTS `tbladmin` (
  `email` varchar(254) NOT NULL,
  `password` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`email`, `password`, `name`) VALUES
('admin1@gmail.com', '123456', 'janudi ');

-- --------------------------------------------------------

--
-- Table structure for table `tblcart`
--

DROP TABLE IF EXISTS `tblcart`;
CREATE TABLE IF NOT EXISTS `tblcart` (
  `productID` int NOT NULL,
  `userID` int NOT NULL,
  `quantity` int NOT NULL,
  `total` int NOT NULL,
  PRIMARY KEY (`productID`,`userID`),
  KEY `fk_user_cart` (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblcontain`
--

DROP TABLE IF EXISTS `tblcontain`;
CREATE TABLE IF NOT EXISTS `tblcontain` (
  `productID` int NOT NULL AUTO_INCREMENT,
  `orderID` int NOT NULL,
  `quantity` int NOT NULL,
  `total` int NOT NULL,
  PRIMARY KEY (`productID`,`orderID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblfaq`
--

DROP TABLE IF EXISTS `tblfaq`;
CREATE TABLE IF NOT EXISTS `tblfaq` (
  `faqID` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `telephone` int NOT NULL,
  `comment` varchar(255) NOT NULL,
  `replied` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`faqID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblfaq`
--

INSERT INTO `tblfaq` (`faqID`, `email`, `name`, `telephone`, `comment`, `replied`) VALUES
(15, 'john@gmail.com', 'John Smith', 756754321, 'What are the recommended care and maintenance guidelines for your pearl jewelry?                        ', 1),
(16, 'jrsemini@gmail.com', 'janudi risaka', 917826782, 'Do your pearls come with any certification of authenticity?                        ', 1),
(17, 'Rohitha@gmail.com', 'Rohitha Sriyananda', 720010090, 'What payment options do you accept, and are there any installment plans available?                        ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

DROP TABLE IF EXISTS `tblorder`;
CREATE TABLE IF NOT EXISTS `tblorder` (
  `orderID` int NOT NULL AUTO_INCREMENT,
  `productID` int NOT NULL,
  `userID` int NOT NULL,
  `quantity` int NOT NULL,
  `total` int NOT NULL,
  `status` varchar(254) NOT NULL,
  PRIMARY KEY (`orderID`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblorder`
--

INSERT INTO `tblorder` (`orderID`, `productID`, `userID`, `quantity`, `total`, `status`) VALUES
(56, 31, 4, 4, 44000, 'Delivered'),
(58, 22, 4, 1, 23000, 'pending'),
(59, 29, 4, 3, 270000, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

DROP TABLE IF EXISTS `tblproduct`;
CREATE TABLE IF NOT EXISTS `tblproduct` (
  `productID` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(20) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int NOT NULL,
  `pearlType` varchar(50) DEFAULT NULL,
  `metalType` varchar(50) DEFAULT NULL,
  `chainLength` varchar(50) DEFAULT NULL,
  `pearlSize` varchar(50) DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`productID`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`productID`, `name`, `description`, `category`, `price`, `quantity`, `pearlType`, `metalType`, `chainLength`, `pearlSize`, `image`) VALUES
(4, 'Freshwater Pearl Hoop Earrings', '', 'Earring', '37000', 120, 'Fusion Akoya and Golden South Sea Cultured Pearl', '14k gold plated s925 silver', '16', '12', 'image14.webp'),
(16, 'Freshwater Pearls Bracelet', '', 'Bracelet', '30000', 19, 'imgage-itemWhite South Sea cultured pearl', '14K gold filled', '6', '8mm approx.', '05_e7e3f98c-0967-4e24-9778-bea391c4298c_1400x.webp'),
(17, 'Freshwater Pearl Choker Necklace', 'Beautiful natural freshwater baroque pearl featuring an 14K gold chain. Beautiful necklace that can be worn casually or dress it up.', 'Necklace', '23000', 52, 'imgage-itemWhite South Sea cultured pearl', '14k gold plated s925 silver', '16', '7-8mm', 'image08.webp'),
(18, 'Akoya Pearl Drop Earrings', '', 'Earring', '20000', 22, 'imgage-itemWhite South Sea cultured pearl', '14k gold plated s925 silver', '1111', '8mm approx.', 'image15.webp'),
(19, 'Akoya Pearl Drop Earrings', '', 'Earring', '20000', 22, 'imgage-itemWhite South Sea cultured pearl', '14k gold plated s925 silver', '1111', '8mm approx.', 'image16.webp'),
(20, 'Akoya Pearl Drop Earrings', '', 'Earring', '20000', 22, 'imgage-itemWhite South Sea cultured pearl', '14k gold plated s925 silver', '11', '8mm approx.', 'image17.webp'),
(21, 'Akoya Cultured Pearl Ring', '', 'Ring', '10000', 100, 'Akoya Cultured Pear', '18K yellow gold', '', '7-8mm', 'image30.jpg'),
(22, 'Les Pétales Place Vendôme Akoya Cultured Pearl Ring', '', 'Ring', '23000', 100, 'Akoya Cultured Pearl', '18K Pink Gold', '', '8mm approx.', 'image31.jpg'),
(23, 'Les Pétales Place Vendôme Akoya Cultured Pearl Ring', '', 'Ring', '23000', 100, 'Akoya Cultured Pearl', '18K Pink Gold', '', '8mm approx.', 'image31.jpg'),
(24, 'Akoya Cultured Pearl Ring', '', 'Ring', '29000', 44, 'Akoya Cultured Pearl', 'Yellow Gold', '', '7-8mm', 'image32.jpg'),
(25, 'Passionoir Black South Sea Cultured Pearl Necklace with Diamond Clasp', '', 'Passionoir', '34000', 11, 'Black South Sea Cultured Pearl', '18K white gold plated in black rhodium', '', '7-8mm', 'collection02.webp'),
(26, 'Passionoir Akoya Cultured Pearl Ear Cuff', '', 'Passionoir', '30000', 22, 'Akoya Cultured Pearl', 'silver plated in black rhodium', '', '8mm approx.', 'collection03.webp'),
(27, 'Passionoir Akoya Cultured Pearl Ear Cuff', '', 'Passionoir', '50000', 11, 'Akoya Cultured Pearl ', 'silver plated in black rhodium', '', ' 6mm', 'collection01.webp'),
(28, 'Akoya Cultured Pearl and Diamond Rondells Necklace in 18K White Gold', '', 'Necklace', '43000', 223, 'Akoya Cultured Pearl', '18K White Gold', '9', '8mm approx.', 'image27.webp'),
(29, 'Akoya Cultured Pearl and Diamond Rondells Necklace in 18K White Gold', '', 'Necklace', '90000', 33, 'Akoya Cultured Pear', '18K White Gold', '16\"  / 42cm  adjustable', ' 6mm', 'image33.webp'),
(30, 'Akoya Cultured Pearl Strand Necklace', '', 'Necklace', '30000', 55, 'Akoya Cultured Pearl', '14k gold plated s925 silver', '16\"  / 42cm  adjustable', '7-8mm', 'image37.webp'),
(31, 'Akoya Cultured Pearl Station Bracelet', '', 'Bracelet', '11000', 100, 'Akoya Cultured Pearl', 'silver plated in black rhodium', '6.7“ / 17cm approx', ' 6mm', 'image11.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE IF NOT EXISTS `tbluser` (
  `userID` int NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `password` varchar(10) NOT NULL,
  `phoneNumber` int DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `district` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`userID`, `email`, `fullName`, `password`, `phoneNumber`, `area`, `district`, `province`, `status`) VALUES
(1, 'janudisemini016@gmail.com', 'janudi risaka', '123', 2147483647, 'qqqq', 'qqqqq', 'qqqq', 'active'),
(2, 'janudisemini016tt@gmail.com', 'John Smith', '123', NULL, NULL, NULL, NULL, 'inactive'),
(4, 'jrsemini7@gmail.com', 'janudi risaka', '123', 987654322, 'Menikhinna', 'Kandy', 'Central', 'active'),
(26, '', '', '', NULL, NULL, NULL, NULL, 'Active'),
(27, '', '', '', NULL, NULL, NULL, NULL, 'Active'),
(28, '', '', '', NULL, NULL, NULL, NULL, 'Active'),
(29, 'Rohitha@gmail.com', 'Rohitha Sriyananda', '123', 756780649, 'Menikhinna', 'Kandy', 'Central', 'active'),
(30, 'john@gmail.com', 'John Smith', '123', NULL, NULL, NULL, NULL, 'active'),
(31, 'janudisemini016111@gmail.com', 'John Smith', '11', NULL, NULL, NULL, NULL, 'active'),
(32, 'jrsemini11111@gmail.com', 'John Smith', '111111', NULL, NULL, NULL, NULL, 'active'),
(33, 'Rohitha1111@gmail.com', 'John Smith', '1111', 1234567890, 'kkkk', 'kkkk', 'kkkk', 'active'),
(34, 'rusty@gmail.com', 'Rusty', 'Rusty123', NULL, NULL, NULL, NULL, 'active');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
