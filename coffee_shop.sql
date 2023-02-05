-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2022 at 02:27 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coffee_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_ons`
--

CREATE TABLE `add_ons` (
  `Addons_ID` varchar(50) NOT NULL COMMENT 'PK for addons',
  `Addons_Name` varchar(50) NOT NULL COMMENT 'Name of addons',
  `Addons_Price` int(50) NOT NULL COMMENT 'Price of addons'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `add_ons`
--

INSERT INTO `add_ons` (`Addons_ID`, `Addons_Name`, `Addons_Price`) VALUES
('J01', 'Vanilla Ice Cream', 40),
('K01', 'Espresso shot', 30),
('L01', 'Caramel Syrup', 30),
('L02', 'Chocolate Syrup', 30),
('L03', 'Hazelnut Syrup', 30),
('L04', 'Vanilla Syrup', 30),
('M01', 'Whole Milk', 20),
('M02', 'Non-fat Milk', 20),
('M03', 'Soy Milk', 20),
('M04', 'Almond Milk', 20),
('N01', 'Whipped Cream', 20),
('O01', 'None', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Order_ID` int(50) NOT NULL COMMENT 'FK for order',
  `Product_ID` varchar(50) NOT NULL COMMENT 'FK for product',
  `Quantity` int(50) NOT NULL COMMENT 'Quantity of coffee',
  `Addons_ID` varchar(50) NOT NULL COMMENT 'FK for add_ons',
  `Subtotal` int(50) NOT NULL COMMENT 'Order Price'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Order_ID`, `Product_ID`, `Quantity`, `Addons_ID`, `Subtotal`) VALUES
(31, 'C03', 2, 'L01', 560),
(32, 'H03', 3, 'J01', 930),
(33, 'I02', 1, 'M02', 240),
(34, 'C03', 1, 'J01', 290),
(35, 'B03', 2, 'M01', 540),
(36, 'C03', 2, 'L02', 560),
(37, 'C03', 1, 'L02', 280),
(38, 'D03', 1, 'J01', 300),
(39, 'A03', 1, 'J01', 300),
(40, 'C02', 2, 'L01', 500),
(41, 'D02', 2, 'N01', 460),
(42, 'E03', 3, 'K01', 960),
(43, 'C03', 2, 'L04', 560),
(44, 'B03', 3, 'L01', 840),
(45, 'B03', 2, 'L04', 560),
(46, 'B03', 1, 'M01', 270);

-- --------------------------------------------------------

--
-- Table structure for table `log_in`
--

CREATE TABLE `log_in` (
  `User_ID` int(50) NOT NULL COMMENT 'FK for user',
  `Time_Log` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Time logged in'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `log_in`
--

INSERT INTO `log_in` (`User_ID`, `Time_Log`) VALUES
(1, '2022-05-03 06:50:41'),


-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `Order_ID` int(50) NOT NULL COMMENT 'PK for order',
  `User_ID` int(50) NOT NULL COMMENT 'FK for user',
  `Time_Ordered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Timestamp of order'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`Order_ID`, `User_ID`, `Time_Ordered`) VALUES
(1, 16, '2022-05-05 03:02:32'),
(31, 8, '2022-05-06 17:53:18'),
(32, 8, '2022-05-06 17:54:51'),
(33, 8, '2022-05-06 20:41:04'),
(34, 8, '2022-05-06 22:13:38'),
(35, 8, '2022-05-06 22:19:03'),
(36, 8, '2022-05-06 22:20:01'),
(37, 8, '2022-05-07 00:54:36'),
(38, 8, '2022-05-07 00:55:50'),
(39, 8, '2022-05-07 00:57:50'),
(40, 8, '2022-05-07 01:05:34'),
(41, 8, '2022-05-07 01:06:06'),
(42, 8, '2022-05-07 01:06:49'),
(43, 8, '2022-05-07 01:20:32'),
(44, 8, '2022-05-07 02:24:21'),
(45, 8, '2022-05-10 09:03:26'),
(46, 8, '2022-05-10 09:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Payment_ID` int(50) NOT NULL COMMENT 'PK for payment',
  `Order_ID` int(50) NOT NULL COMMENT 'FK for order',
  `User_ID` int(50) NOT NULL COMMENT 'FK for user',
  `Payment_Mode` varchar(25) NOT NULL COMMENT 'Mode of Payment',
  `Time_Received` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Timestamp for payment',
  `Total_Amount` int(50) NOT NULL COMMENT 'Total amount payed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Payment_ID`, `Order_ID`, `User_ID`, `Payment_Mode`, `Time_Received`, `Total_Amount`) VALUES
(1, 1, 16, 'Paypal', '2022-05-10 11:19:40', 250),
(2, 33, 8, 'Gcash', '2022-05-06 21:04:15', 500),
(3, 33, 8, 'Gcash', '2022-05-06 21:10:05', 560),
(4, 36, 8, 'Gcash', '2022-05-06 22:22:55', 560),
(5, 34, 8, 'Credit Card', '2022-05-07 00:06:56', 0),
(6, 32, 8, 'Paypal', '2022-05-07 00:08:03', 0),
(7, 31, 8, 'Debit Card', '2022-05-07 00:09:57', 560),
(8, 37, 8, 'Paypal', '2022-05-07 00:54:49', 280),
(9, 39, 8, 'Paypal', '2022-05-07 00:57:59', 300),
(10, 41, 8, 'Paypal', '2022-05-07 01:06:38', 460),
(11, 42, 8, 'Gcash', '2022-05-07 01:15:26', 960),
(12, 43, 8, 'Paypal', '2022-05-07 01:20:48', 560),
(13, 35, 8, 'Debit Card', '2022-05-07 02:04:18', 540),
(15, 38, 8, 'Paypal', '2022-05-10 09:00:40', 300),
(16, 46, 8, 'Gcash', '2022-05-10 09:04:16', 270);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` varchar(50) NOT NULL COMMENT 'PK for coffee',
  `Product_Name` varchar(50) NOT NULL COMMENT 'Name of coffee',
  `Product_Type` varchar(50) NOT NULL COMMENT 'Size (S, M, L)',
  `Product_Price` int(50) NOT NULL COMMENT 'Price of coffee',
  `Description` varchar(50) NOT NULL COMMENT 'ex (12oz, 16oz)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Product_Name`, `Product_Type`, `Product_Price`, `Description`) VALUES
('A01', 'Affogato', 'small', 160, '12 oz'),
('A02', 'Affogato', 'medium', 210, '16 oz'),
('A03', 'Affogato', 'large', 260, '20 oz'),
('B01', 'Americano', 'small', 180, '12 oz'),
('B02', 'Americano', 'medium', 210, '16 oz'),
('B03', 'Americano', 'large', 250, '20 oz'),
('C01', 'Cappucino', 'small', 190, '12 oz'),
('C02', 'Cappucino', 'medium', 220, '16 oz'),
('C03', 'Cappucino', 'large', 250, '20 oz'),
('D01', 'Coffee Latte', 'small', 170, '12 oz'),
('D02', 'Coffee Latte', 'medium', 210, '16 oz'),
('D03', 'Coffee Latte', 'large', 260, '20 oz'),
('E01', 'Espresso', 'small', 200, '12 oz'),
('E02', 'Espresso', 'medium', 240, '16 oz'),
('E03', 'Espresso', 'large', 290, '20 oz'),
('F01', 'Macchiato', 'small', 210, '12 oz'),
('F02', 'Macchiato', 'medium', 260, '16 oz'),
('F03', 'Macchiato', 'large', 300, '20 oz'),
('G01', 'Mocha', 'small', 160, '12 oz'),
('G02', 'Mocha', 'medium', 210, '16 oz'),
('G03', 'Mocha', 'large', 260, '20 oz'),
('H01', 'Piccolo Latte', 'small', 200, '12 oz'),
('H02', 'Piccolo Latte', 'medium', 230, '16 oz'),
('H03', 'Piccolo Latte', 'large', 270, '20 oz'),
('I01', 'Ristretto', 'small', 180, '12 oz'),
('I02', 'Ristretto', 'medium', 220, '16 oz'),
('I03', 'Ristretto', 'large', 250, '20 oz');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(50) NOT NULL COMMENT 'PK for user (used for login)',
  `User_Type` varchar(50) NOT NULL COMMENT '(Customer or Developer)',
  `First_Name` varchar(50) NOT NULL COMMENT 'First Name of user',
  `Last_Name` varchar(50) NOT NULL COMMENT 'Last Name of user',
  `Email` varchar(50) NOT NULL COMMENT 'Email Address (used for login)',
  `Password` varchar(50) NOT NULL COMMENT 'Log in Password',
  `Phone_Num` varchar(15) NOT NULL COMMENT 'Phone number of user',
  `City_Address` varchar(50) NOT NULL COMMENT 'City',
  `ZIP_Code` varchar(4) NOT NULL COMMENT 'ZIP code'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `User_Type`, `First_Name`, `Last_Name`, `Email`, `Password`, `Phone_Num`, `City_Address`, `ZIP_Code`) VALUES
(1, 'Owner', 'Abi', 'Barrientos', 'abi@gmail.com', 'pass', '0991-314-1443', 'Bacolor', '2001'),
(2, 'Employee', 'Giewen', 'Pinlac', 'giewen@gmail.com', 'pass', '0949-680-7775', 'Angeles', '2009'),
(3, 'Customer', 'Princess', 'Estandarte', 'pestandarte@gmail.com', 'password123', '0949-680-7774', 'San Fernando', '2000'),


--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_ons`
--
ALTER TABLE `add_ons`
  ADD PRIMARY KEY (`Addons_ID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `cart_ibfk_2` (`Product_ID`),
  ADD KEY `cart_ibfk_3` (`Addons_ID`),
  ADD KEY `Order_ID` (`Order_ID`);

--
-- Indexes for table `log_in`
--
ALTER TABLE `log_in`
  ADD KEY `log_in_ibfk_1` (`User_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`Order_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`Payment_ID`),
  ADD KEY `User_ID` (`User_ID`),
  ADD KEY `Order_ID` (`Order_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `Order_ID` int(50) NOT NULL AUTO_INCREMENT COMMENT 'PK for order', AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `Payment_ID` int(50) NOT NULL AUTO_INCREMENT COMMENT 'PK for payment', AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(50) NOT NULL AUTO_INCREMENT COMMENT 'PK for user (used for login)', AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`Product_ID`) REFERENCES `product` (`Product_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`Addons_ID`) REFERENCES `add_ons` (`Addons_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_ibfk_4` FOREIGN KEY (`Order_ID`) REFERENCES `order` (`Order_ID`) ON DELETE CASCADE;

--
-- Constraints for table `log_in`
--
ALTER TABLE `log_in`
  ADD CONSTRAINT `log_in_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `user` (`User_ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`Order_ID`) REFERENCES `order` (`Order_ID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
