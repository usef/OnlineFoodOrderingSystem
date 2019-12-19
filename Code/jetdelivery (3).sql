-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2019 at 09:39 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jetdelivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `ID` int(11) NOT NULL,
  `Name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `Name`) VALUES
(1, 'Beverages'),
(2, 'Desserts'),
(5, 'Burgers');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Street` varchar(255) NOT NULL,
  `City` varchar(50) NOT NULL,
  `House_Number` varchar(10) NOT NULL,
  `Balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID`, `User_ID`, `Street`, `City`, `House_Number`, `Balance`) VALUES
(1, 2, '9', 'Maadi', '2', 150),
(2, 1, 'wtv', 'test', '2', 12000);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_men`
--

CREATE TABLE `delivery_men` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `SSN` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `delivery_men`
--

INSERT INTO `delivery_men` (`ID`, `User_ID`, `SSN`) VALUES
(1, 5, '32134254256454');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Dep_Head_ID` int(11) DEFAULT NULL,
  `Dep_Code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`ID`, `Name`, `Dep_Head_ID`, `Dep_Code`) VALUES
(1, 'Customer Support', 2, 'CS');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `SSN` varchar(50) NOT NULL,
  `Department_ID` int(11) NOT NULL,
  `Salary` double NOT NULL,
  `Role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`ID`, `User_ID`, `SSN`, `Department_ID`, `Salary`, `Role`) VALUES
(2, 2, '32134254256454', 1, 2500, 'Head');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` double NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Category_ID` int(11) NOT NULL,
  `Restaurant_ID` int(11) NOT NULL,
  `Active` tinyint(1) NOT NULL,
  `Image_URL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ID`, `Name`, `Price`, `Quantity`, `Description`, `Category_ID`, `Restaurant_ID`, `Active`, `Image_URL`) VALUES
(6, 'Big Mac', 12, 246, 'Big Mac Desc', 5, 3, 1, 'images/McDonalds-Big-Mac-meal.jpg'),
(7, 'classic burger', 33, 1500, '', 5, 13, 1, ''),
(8, 'Family', 90, 105, '', 1, 1, 1, 'images/kfcfamily.jpg'),
(9, 'Twister', 35, 118, '', 1, 1, 1, 'images/kfctwister.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `URL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `links`
--

INSERT INTO `links` (`ID`, `Name`, `URL`) VALUES
(1, 'Manage Account', 'myProfile.php'),
(2, 'Dashboard', 'dashboard.php'),
(3, 'My Orders', 'myOrders.php'),
(4, 'My Restaurants', 'myRestaurants.php'),
(5, 'Delivery Orders', 'deliveryOrders.php');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `ID` int(11) NOT NULL,
  `Customer_ID` int(11) NOT NULL,
  `Order_DateTime` datetime NOT NULL,
  `Delivery_DateTime` datetime DEFAULT NULL,
  `Status` varchar(50) NOT NULL,
  `Total_Price` double NOT NULL,
  `Delivery_Man_ID` int(11) NOT NULL,
  `Promocode` varchar(50) DEFAULT NULL,
  `Payment_Method_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`ID`, `Customer_ID`, `Order_DateTime`, `Delivery_DateTime`, `Status`, `Total_Price`, `Delivery_Man_ID`, `Promocode`, `Payment_Method_ID`) VALUES
(4, 2, '2019-12-18 12:24:23', '2019-12-18 09:26:46', 'Delivered', 11078.1, 1, 'drwael', 3),
(9, 2, '2019-12-18 01:42:02', '2019-12-18 09:27:03', 'Delivered', 2640, 1, 'drwael', 3),
(10, 2, '2019-12-18 04:07:36', '2019-12-18 09:27:17', 'Delivered', 2640, 1, 'drwael', 3),
(11, 2, '2019-12-18 07:19:36', '2019-12-18 09:27:10', 'Delivered', 900, 1, 'drwael', 3),
(12, 2, '2019-12-18 07:24:22', '2019-12-18 09:27:13', 'Delivered', 4, 1, 'drwael', 3),
(13, 2, '2019-12-18 11:10:33', '2019-12-19 10:10:22', 'Delivered', 98, 1, 'drwael', 3),
(14, 2, '2019-12-19 10:24:10', NULL, 'Accepted', 430, 1, 'drwael', 3);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--

CREATE TABLE `payment_method` (
  `ID` int(11) NOT NULL,
  `Payment_Method` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`ID`, `Payment_Method`) VALUES
(1, 'Visa Card'),
(2, 'Master Card'),
(3, 'Cash'),
(4, 'PayPal');

-- --------------------------------------------------------

--
-- Table structure for table `phone_numbers`
--

CREATE TABLE `phone_numbers` (
  `User_ID` int(11) NOT NULL,
  `Number` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `promocodes`
--

CREATE TABLE `promocodes` (
  `Code` varchar(50) NOT NULL,
  `Value` int(11) NOT NULL,
  `Active_Date` date NOT NULL,
  `Expiry_Date` date NOT NULL,
  `Uses_Allowed` int(11) NOT NULL,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promocodes`
--

INSERT INTO `promocodes` (`Code`, `Value`, `Active_Date`, `Expiry_Date`, `Uses_Allowed`, `Status`) VALUES
('drwael', 20, '2019-12-18', '2019-12-31', 150, 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants`
--

CREATE TABLE `restaurants` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Branch_Numbers` int(11) NOT NULL,
  `Status` varchar(11) NOT NULL,
  `Delivery_Fee` double NOT NULL,
  `Manager_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants`
--

INSERT INTO `restaurants` (`ID`, `Name`, `Branch_Numbers`, `Status`, `Delivery_Fee`, `Manager_ID`) VALUES
(1, 'KFC', 2, 'ON', 10, 1),
(2, 'Pizza Hut', 1, 'ON', 10, 1),
(3, 'McDonalds', 2, 'ON', 23, 9),
(8, 'Burger King', 1, 'ON', 4, 1),
(10, 'Gad', 1, 'ON', 20, 1),
(13, 'Burger Joint', 2, 'ON', 20, 1),
(14, 'Horany Seafood', 1, 'ON', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `restaurants_addresses`
--

CREATE TABLE `restaurants_addresses` (
  `Restaurant_ID` int(11) NOT NULL,
  `Street_Number` int(11) NOT NULL,
  `City` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurants_addresses`
--

INSERT INTO `restaurants_addresses` (`Restaurant_ID`, `Street_Number`, `City`) VALUES
(1, 9, 'Maadi'),
(2, 4, 'Giza'),
(3, 9, '5th Settlement');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `Sales_ID` int(11) NOT NULL,
  `Item_ID` int(11) NOT NULL,
  `Order_ID` int(11) NOT NULL,
  `Restaurant_ID` int(11) NOT NULL,
  `Sold_Date` date NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`Sales_ID`, `Item_ID`, `Order_ID`, `Restaurant_ID`, `Sold_Date`, `Quantity`) VALUES
(4, 6, 4, 3, '2019-12-16', 20),
(13, 7, 9, 13, '2019-12-18', 80),
(14, 6, 10, 3, '2019-12-18', 500),
(15, 8, 11, 1, '2019-12-18', 10),
(16, 6, 12, 3, '2019-12-18', 2),
(17, 6, 13, 3, '2019-12-18', 4),
(18, 9, 13, 1, '2019-12-18', 2),
(19, 8, 14, 1, '2019-12-19', 5);

-- --------------------------------------------------------

--
-- Table structure for table `userlinks`
--

CREATE TABLE `userlinks` (
  `Type_ID` int(11) NOT NULL,
  `Link_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userlinks`
--

INSERT INTO `userlinks` (`Type_ID`, `Link_ID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(2, 1),
(2, 3),
(3, 1),
(4, 1),
(4, 4),
(5, 1),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_ID` int(11) NOT NULL,
  `Type_ID` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Username` varchar(55) NOT NULL,
  `Password` varchar(55) NOT NULL,
  `FName` varchar(55) NOT NULL,
  `LName` varchar(55) NOT NULL,
  `Hash` varchar(32) NOT NULL,
  `Active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_ID`, `Type_ID`, `Email`, `Username`, `Password`, `FName`, `LName`, `Hash`, `Active`) VALUES
(1, 1, 'Usefdx@yahoo.com', 'usef', '202cb962ac59075b964b07152d234b70', 'Yousef', 'Rady', '51d92be1c60d1db1d2e5e7a07da55b26', 1),
(2, 3, 'cs@jetdelivery.com', 'CustSupp', '202cb962ac59075b964b07152d234b70', 'Clark', 'James', '', 1),
(5, 5, 'karim-1011@hotmail.com', 'ashrafbasha', '202cb962ac59075b964b07152d234b70', 'Ahmed', 'Ashref', '', 1),
(8, 1, 'test@test.com', 'tester', '202cb962ac59075b964b07152d234b70', 'Test', 'Father', '', 1),
(9, 4, 'restManager@rest.com', 'manager', '202cb962ac59075b964b07152d234b70', 'Restaurant', 'Manager', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_types`
--

CREATE TABLE `users_types` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_types`
--

INSERT INTO `users_types` (`ID`, `Name`) VALUES
(1, 'Admin'),
(2, 'Customer'),
(3, 'Employee'),
(4, 'Restaurant Manager'),
(5, 'Delivery Man');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`,`User_ID`) USING BTREE,
  ADD KEY `customers_ibfk_2` (`User_ID`);

--
-- Indexes for table `delivery_men`
--
ALTER TABLE `delivery_men`
  ADD PRIMARY KEY (`ID`,`User_ID`) USING BTREE,
  ADD KEY `delivery_men_ibfk_2` (`User_ID`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Dep_Head_ID` (`Dep_Head_ID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`ID`,`User_ID`) USING BTREE,
  ADD KEY `Department_ID` (`Department_ID`),
  ADD KEY `employees_ibfk_3` (`User_ID`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Category_ID` (`Category_ID`),
  ADD KEY `items_ibfk_2` (`Restaurant_ID`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Customer_ID` (`Customer_ID`),
  ADD KEY `Delivery_Man_ID` (`Delivery_Man_ID`),
  ADD KEY `Promocode` (`Promocode`),
  ADD KEY `Payment_method_ID` (`Payment_Method_ID`);

--
-- Indexes for table `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  ADD PRIMARY KEY (`User_ID`,`Number`),
  ADD KEY `Customer_ID` (`User_ID`);

--
-- Indexes for table `promocodes`
--
ALTER TABLE `promocodes`
  ADD PRIMARY KEY (`Code`);

--
-- Indexes for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Manager_ID` (`Manager_ID`);

--
-- Indexes for table `restaurants_addresses`
--
ALTER TABLE `restaurants_addresses`
  ADD PRIMARY KEY (`Restaurant_ID`,`Street_Number`,`City`),
  ADD KEY `Restaurant_ID` (`Restaurant_ID`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`Sales_ID`),
  ADD KEY `Item_ID` (`Item_ID`),
  ADD KEY `Order_ID` (`Order_ID`),
  ADD KEY `Restaurant_ID` (`Restaurant_ID`);

--
-- Indexes for table `userlinks`
--
ALTER TABLE `userlinks`
  ADD PRIMARY KEY (`Type_ID`,`Link_ID`),
  ADD KEY `Link_ID` (`Link_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `email` (`Email`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD KEY `Type_ID` (`Type_ID`);

--
-- Indexes for table `users_types`
--
ALTER TABLE `users_types`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `delivery_men`
--
ALTER TABLE `delivery_men`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `restaurants`
--
ALTER TABLE `restaurants`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `Sales_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_types`
--
ALTER TABLE `users_types`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE;

--
-- Constraints for table `delivery_men`
--
ALTER TABLE `delivery_men`
  ADD CONSTRAINT `delivery_men_ibfk_2` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE;

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`Dep_Head_ID`) REFERENCES `employees` (`ID`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`Department_ID`) REFERENCES `departments` (`ID`),
  ADD CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`Category_ID`) REFERENCES `categories` (`ID`),
  ADD CONSTRAINT `items_ibfk_2` FOREIGN KEY (`Restaurant_ID`) REFERENCES `restaurants` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`Promocode`) REFERENCES `promocodes` (`Code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `orders_ibfk_4` FOREIGN KEY (`Payment_Method_ID`) REFERENCES `payment_method` (`ID`),
  ADD CONSTRAINT `orders_ibfk_5` FOREIGN KEY (`Customer_ID`) REFERENCES `customers` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_ibfk_6` FOREIGN KEY (`Delivery_Man_ID`) REFERENCES `delivery_men` (`ID`) ON DELETE NO ACTION;

--
-- Constraints for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  ADD CONSTRAINT `phone_numbers_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `users` (`User_ID`) ON DELETE CASCADE;

--
-- Constraints for table `restaurants`
--
ALTER TABLE `restaurants`
  ADD CONSTRAINT `restaurants_ibfk_1` FOREIGN KEY (`Manager_ID`) REFERENCES `users` (`User_ID`);

--
-- Constraints for table `restaurants_addresses`
--
ALTER TABLE `restaurants_addresses`
  ADD CONSTRAINT `restaurants_addresses_ibfk_1` FOREIGN KEY (`Restaurant_ID`) REFERENCES `restaurants` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`Item_ID`) REFERENCES `items` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`Order_ID`) REFERENCES `orders` (`ID`) ON DELETE CASCADE,
  ADD CONSTRAINT `sales_ibfk_3` FOREIGN KEY (`Restaurant_ID`) REFERENCES `restaurants` (`ID`) ON DELETE CASCADE;

--
-- Constraints for table `userlinks`
--
ALTER TABLE `userlinks`
  ADD CONSTRAINT `userlinks_ibfk_1` FOREIGN KEY (`Link_ID`) REFERENCES `links` (`ID`),
  ADD CONSTRAINT `userlinks_ibfk_2` FOREIGN KEY (`Type_ID`) REFERENCES `users_types` (`ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`Type_ID`) REFERENCES `users_types` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
