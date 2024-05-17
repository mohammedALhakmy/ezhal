-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2024 at 06:55 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezhal`
--

-- --------------------------------------------------------

--
-- Table structure for table `delegates`
--

DROP TABLE IF EXISTS `delegates`;
CREATE TABLE IF NOT EXISTS `delegates` (
  `Delegate_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Delegate_Name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Delegate_Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `service_type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Delegate_ID`),
  KEY `Delegate_Email` (`Delegate_Email`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `delegates`
--

INSERT INTO `delegates` (`Delegate_ID`, `Delegate_Name`, `Delegate_Email`, `service_type`) VALUES
(1, 'John Doe', 'delegate1@example.com', 'gas'),
(2, 'Jane Smith', 'delegate2@example.com', ''),
(3, 'Mike Johnson', 'delegate3@example.com', ''),
(4, 'مندوب بنزين', NULL, 'benzene'),
(5, 'مندوب غاز', NULL, 'gas'),
(6, 'سائق خاص', NULL, 'driver'),
(7, 'مندوب الإنتقال بين المدن', NULL, 'transport'),
(8, 'مندوب لإستلام شحنتك', NULL, 'delivery');

-- --------------------------------------------------------

--
-- Table structure for table `deliveryagent`
--

DROP TABLE IF EXISTS `deliveryagent`;
CREATE TABLE IF NOT EXISTS `deliveryagent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deliveryagent_name` varchar(255) NOT NULL,
  `deliveryagent_type` enum('gaz','pnzin','travel','driver','mail') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `user_type` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `subject`, `comment`, `user_type`) VALUES
(6, 'batla', 'batla2@gmail.com', 'استفسار', 'كيف انضم كمندوب', 'مستخدم'),
(7, 'batla', 'batla2@gmail.com', 'سؤال', 'كيف يمكنني الإنضمام لازهل\r\n', 'زائر'),
(8, 'sara', 'sara1@gmail.com', 'السلام عليكم', 'تم تاخير استلام الطلب ', 'زائر'),
(9, 'norah', 'batlaajab67@gmail.com', 'السلام عليكم', 'ddddddddddddd', 'مستخدم'),
(10, 'sara', 'sbb@gmail.com', 'السلام عليكم', 'هل موقع إزهل يقتصر علي سكان الخرمة', 'مستخدم'),
(11, 'khloud', 'asa4r7@gmail.com', 'مرحبا', 'ارغب في الانضمام\r\n', 'مستخدم'),
(12, 'khloud', 'asa4r7@gmail.com', 'مرحبا', 'ارغب في الانضمام\r\n', 'مستخدم'),
(15, '1', '1211@gmail.com', '1', '1', 'زائر');

-- --------------------------------------------------------

--
-- Table structure for table `mndobee`
--

DROP TABLE IF EXISTS `mndobee`;
CREATE TABLE IF NOT EXISTS `mndobee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pp` varchar(255) NOT NULL DEFAULT 'default-pp.png',
  `p` varchar(255) NOT NULL DEFAULT 'default-pp.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `Notification_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Delegate_Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Beneficiary_Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Service_Request_ID` int(11) DEFAULT NULL,
  `Notification_Date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Seen` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`Notification_ID`),
  KEY `Delegate_Email` (`Delegate_Email`),
  KEY `Beneficiary_Email` (`Beneficiary_Email`),
  KEY `Service_Request_ID` (`Service_Request_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`Notification_ID`, `Delegate_Email`, `Beneficiary_Email`, `Service_Request_ID`, `Notification_Date`, `Seen`) VALUES
(1, 'delegate1@example.com', 'beneficiary1@example.com', 1, '2024-05-04 04:32:29', 0),
(2, 'gas_delegate@example.com', 'beneficiary2@example.com', 2, '2024-05-04 04:48:36', 0),
(3, 'gas_delegate@example.com', 'beneficiary2@example.com', 2, '2024-05-04 04:54:47', 0),
(4, 'gas_delegate@example.com', 'beneficiary2@example.com', 2, '2024-05-04 04:59:13', 0),
(5, 'petroleum_delegate@example.com', 'beneficiary3@example.com', 3, '2024-05-04 05:09:03', 0),
(6, 'petroleum_delegate@example.com', 'beneficiary3@example.com', 3, '2024-05-04 05:12:47', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requested_service` varchar(255) DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `category_count` int(11) DEFAULT NULL,
  `current_total` decimal(10,2) DEFAULT NULL,
  `order_status` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `order_number` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `requested_service`, `order_date`, `category_count`, `current_total`, `order_status`, `user_id`, `order_number`) VALUES
(2, 'Gaz', '2024-04-30', 11, '330.00', 'Pending', 1, 615116747),
(3, 'Gasoline', '2024-04-30', 1, '30.00', 'Accepted', 1, 865240809),
(4, 'Gasoline', '2024-04-30', 1, '30.00', 'Pending', 1, 898519966),
(5, 'Gasoline', '2024-04-30', 2, '20.00', 'Rejected', 1, 220091550),
(6, 'Gaz', '2024-04-30', 1, '30.00', 'Pending', 19, 464391610),
(7, 'Gaz', '2024-04-30', 2, '60.00', 'Pending', 19, 569963143),
(8, 'Gasoline', '2024-04-30', 3, '30.00', 'Pending', 19, 757498814),
(9, 'Gasoline', '2024-04-30', 3, '30.00', 'Pending', 19, 772032084),
(10, 'Gaz', '2024-05-07', 5, '90.00', 'Pending', 20, 991979980),
(11, 'Gasoline', '2024-05-07', 56, '550.00', 'Pending', 20, 499682617),
(12, 'Gasoline', '2024-05-07', 55, '550.00', 'Pending', 20, 349307250);

-- --------------------------------------------------------

--
-- Table structure for table `parcel_service_order`
--

DROP TABLE IF EXISTS `parcel_service_order`;
CREATE TABLE IF NOT EXISTS `parcel_service_order` (
  `ID_Shipment` int(11) NOT NULL,
  `Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Name_Customer` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone_Number` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Order_Date` date DEFAULT NULL,
  `Order_Time` time DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Destination_Location` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_Shipment`),
  KEY `Email` (`Email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `parcel_service_order`
--

INSERT INTO `parcel_service_order` (`ID_Shipment`, `Email`, `Name_Customer`, `Phone_Number`, `Order_Date`, `Order_Time`, `Quantity`, `Destination_Location`) VALUES
(1, 'user1@example.com', 'Customer 1', '1234567890', '2024-05-03', '12:00:00', 1, 'Location 1'),
(2, 'user2@example.com', 'Customer 2', '0987654321', '2024-05-04', '13:00:00', 2, 'Location 2');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
CREATE TABLE IF NOT EXISTS `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) DEFAULT NULL,
  `full_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_in_card` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cvv` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cardnumber` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expyear` varchar(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expmonth` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `trip_id`, `full_name`, `name_in_card`, `email`, `address`, `city`, `state`, `zip`, `cvv`, `cardnumber`, `expyear`, `expmonth`) VALUES
(1, 1, 'ddddddddd', 'ddddddd', 'beneficiary1@example.com', 'sanaa', 'Yemen', 'rdrrr', '12121', '123', '233232', '2024', 'octover'),
(2, 1, '', '', '', '', '', '', '', '', '', '', ''),
(3, 1, 'ddddddddd', 'ddddddd', 'ahmed@gmail.com', 'JDH', 'Odur', 'rdrrr', '12121', '123', '333333333333', '2024', 'octover'),
(4, 1, 'ddddddddd', 'ddddddd', 'ahmed@gmail.com', 'JDH', 'Odur', 'rdrrr', '12121', '123', '333333333333', '2024', 'octover'),
(5, 1, '', '', '', '', '', '', '', '', '', '', ''),
(6, 1, '', '', '', '', '', '', '', '', '', '', ''),
(7, 1, '', '', '', '', '', '', '', '', '', '', ''),
(8, 1, '', '', '', '', '', '', '', '', '', '', ''),
(9, 1, '', '', '', '', '', '', '', '', '', '', ''),
(10, 1, 'ddddddddd', 'ddddddd', 'beneficiary1@example.com', 'sanaa', 'Yemen', '211', '2122', '123', '', '2024', 'octover'),
(11, 1, '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_driver`
--

DROP TABLE IF EXISTS `reservation_driver`;
CREATE TABLE IF NOT EXISTS `reservation_driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `location` varchar(255) NOT NULL,
  `target_location` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `start_time` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `send_parcel`
--

DROP TABLE IF EXISTS `send_parcel`;
CREATE TABLE IF NOT EXISTS `send_parcel` (
  `Name_Sender` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Phone_Number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Destination_Location` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Phone_Number`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `send_parcel`
--

INSERT INTO `send_parcel` (`Name_Sender`, `Phone_Number`, `Destination_Location`) VALUES
('Sender 1', '1234567890', 'Location 1'),
('Sender 2', '0987654321', 'Location 2');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service_gasolin`
--

DROP TABLE IF EXISTS `service_gasolin`;
CREATE TABLE IF NOT EXISTS `service_gasolin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_of_gasolin` varchar(255) NOT NULL,
  `gasolin_liters` float NOT NULL,
  `user_location` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_gasolin`
--

INSERT INTO `service_gasolin` (`id`, `type_of_gasolin`, `gasolin_liters`, `user_location`) VALUES
(1, '95', 1, '1'),
(2, '91', 1, '1'),
(3, 'ديزل', 3, '3'),
(4, 'ديزل', 2, '1'),
(5, '95', 3, '3'),
(6, '95', 3, '3'),
(7, '95', 55, 'wku'),
(8, '95', 55, 'wku'),
(9, '95', 55, 'wku'),
(10, '91', 55, 'wku');

-- --------------------------------------------------------

--
-- Table structure for table `service_gaz`
--

DROP TABLE IF EXISTS `service_gaz`;
CREATE TABLE IF NOT EXISTS `service_gaz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number_of_cylinders` int(11) NOT NULL,
  `volume_of_cylinder` varchar(255) NOT NULL,
  `user_location` varchar(255) NOT NULL,
  `packaging` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_gaz`
--

INSERT INTO `service_gaz` (`id`, `number_of_cylinders`, `volume_of_cylinder`, `user_location`, `packaging`) VALUES
(1, 1, 'small', '1', 'existing'),
(2, 2, 'medium', '2', 'existing'),
(3, 2, 'medium', '2', 'existing'),
(4, 2, 'medium', '2', 'existing'),
(5, 1, 'small', '1', 'existing'),
(6, 11, 'small', '1', 'existing'),
(7, 11, 'small', '1', 'existing'),
(8, 1, 'small', '1', 'existing'),
(9, 1, 'small', '1', 'existing'),
(10, 2, 'medium', '2', 'existing'),
(11, 3, 'small', 'wku', 'existing'),
(12, 3, 'small', 'ÙŠÙŠÙŠÙŠ', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

DROP TABLE IF EXISTS `subscribe`;
CREATE TABLE IF NOT EXISTS `subscribe` (
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`email`) VALUES
(''),
('batlaajab67@gmail.com'),
('batlaajab67@gmail.com'),
('s@gmail.com'),
('batlaajab@gmail.com'),
('sbb@gmail.com'),
('batla2@gmail.com'),
('batla2@gmail.com'),
('batlaaja22b@gmail.com'),
('batla2@gmail.com'),
(''),
('xxx2@gmail.com'),
('xxx2@gmail.com'),
(''),
('d@gmail.com'),
('d@gmail.com'),
(''),
(''),
('batlaajab67@gmail.com'),
('batlaajab67@gmail.com'),
('batla444467@gmail.com'),
('haya8987@gmail.com'),
('haya8987@gmail.com'),
('new@gmail.com'),
('new@gmail.com'),
('new@gmail.com'),
('new@gmail.com'),
('batlaajab67@gmail.com'),
('batlaajab67@gmail.com'),
('batlaajab67@gmail.com'),
('batlaajab67@gmail.com'),
('batlaajab67@gmail.com'),
('batlaajab67@gmail.com'),
('batlaajab67@gmail.com'),
('batlaajab67@gmail.com'),
('batlaajab67@gmail.com'),
('batlaajab67@gmail.comj'),
('sharaagaba.alsubaie-1@student.uts.edu.au'),
(''),
(''),
(''),
(''),
(''),
(''),
('batlaajab6887@gmail.com'),
('batlaajab6887@gmail.com'),
('batla2@gmail.com'),
(''),
('batlaajab67@gmail.com'),
('beneficiary1@example.com'),
('beneficiary1@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `track_shipment`
--

DROP TABLE IF EXISTS `track_shipment`;
CREATE TABLE IF NOT EXISTS `track_shipment` (
  `ID_Shipment` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID_Shipment`),
  KEY `Email` (`Email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `track_shipment`
--

INSERT INTO `track_shipment` (`ID_Shipment`, `Email`) VALUES
(1, 'user1@example.com'),
(2, 'user2@example.com');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

DROP TABLE IF EXISTS `trips`;
CREATE TABLE IF NOT EXISTS `trips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_leave` date DEFAULT NULL,
  `date_back` date DEFAULT NULL,
  `time_to_leave` time DEFAULT NULL,
  `time_to_back` time DEFAULT NULL,
  `number_of_seat` int(11) DEFAULT NULL,
  `price_of_seat` decimal(10,2) DEFAULT NULL,
  `type_of_car` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `number_of_car` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `more_info` text COLLATE utf8_unicode_ci,
  `to` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `from` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `date_leave`, `date_back`, `time_to_leave`, `time_to_back`, `number_of_seat`, `price_of_seat`, `type_of_car`, `number_of_car`, `more_info`, `to`, `from`) VALUES
(1, '2024-05-10', '2024-05-15', '08:00:00', '18:00:00', 4, '50.00', 'SUV', '123ABC', 'Trip to the beach', 'Beach Resort', 'City Center'),
(2, '2024-06-20', '2024-06-25', '09:00:00', '20:00:00', 3, '60.00', 'Sedan', '456XYZ', 'Family vacation', 'Mountain Retreat', 'Suburbia'),
(3, '2024-05-16', '2024-05-16', '08:34:00', '05:37:00', 3, '54.00', 'Mercedes Benz', '10', 'ddddddd', 'ddk', 'wkej');

-- --------------------------------------------------------

--
-- Table structure for table `trips_order`
--

DROP TABLE IF EXISTS `trips_order`;
CREATE TABLE IF NOT EXISTS `trips_order` (
  `trip_order_id` int(11) NOT NULL AUTO_INCREMENT,
  `trip_id` int(11) DEFAULT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sirname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_brith` date DEFAULT NULL,
  `naionality` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ID_Card` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_emission` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Expiration` date DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`trip_order_id`),
  KEY `trip_id` (`trip_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trips_order`
--

INSERT INTO `trips_order` (`trip_order_id`, `trip_id`, `first_name`, `last_name`, `sirname`, `date_brith`, `naionality`, `ID_Card`, `country_emission`, `Expiration`, `email`, `phone`) VALUES
(1, 1, 'John', 'Doe', 'Smith', '1990-01-01', 'American', '123456789', 'USA', '2025-01-01', 'john@example.com', '1234567890'),
(2, 2, 'ddddddddddddd', 'albanna', 'Ø§Ù„Ø³ÙŠØ¯', '2024-05-30', 'DZ', '5555555555555555', 'hgdkkk', '2024-05-07', 'bennne@example.com', '+966'),
(3, 1, 'ddddddddddddd', 'modh', 'Ø§Ù„Ø³ÙŠØ¯Ø©', '2024-05-16', 'DZ', '5555555555555555', 'dddddd', '2024-05-16', 'ahmed@example.com', '+9662222222222'),
(4, 1, 'ahmed', 'albanna', 'Ø§Ù„Ø³ÙŠØ¯', '2024-05-15', 'IQ', '5555555555555555', 'dddddd', '2024-05-09', 'beneficiary1@example.com', '+9662222222222');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pp` varchar(255) NOT NULL DEFAULT 'default-pp.png',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `username`, `password`, `pp`) VALUES
(1, 'batla34', 'batla34', '$2y$10$GrS56Ewtv8ycbm2ycNkIGOyj63hhpcfNCagc3jmxDuwaFLkUz1JyS', 'batla3466235c092404b2.17353368.png'),
(2, 'khloud', 'kh67', '$2y$10$p1rmp672iIf.eaaXjvqwR.dueKyYL7Dp7uMdvReiYiZ7tlobqv3OS', 'kh67662448eb2dc362.86842931.png'),
(3, 'sara', 'sara34', '$2y$10$gEQQ958rmIRLjbcSrHmXjeSCfhiY1N1..e2VoR2t3jyB5AFNWgS/2', 'sara3466259debbac6b1.64825394.png'),
(4, 'batla', 'batla34', '$2y$10$E9macqboSEGgrA3j62JKueWTvF.P8BQ.YbsCxUNZqIee8GFSLUPCG', 'default-pp.png'),
(5, 'batla', 'batla34', '$2y$10$F/munZhpn6RpdTTSWhK.5.B.IG5NFn0/tTxUT37izo0Xnjx5dDzm2', 'batla346625a51c68fa53.89490830.png'),
(6, 'batla', 'batla67', '$2y$10$8t4T21KpxdL7I.CI.CWFYu7VOf7I5SAxRP9PRj1roJPlWbiWoBmq.', 'batla676625a736e023c7.49241144.png'),
(7, 'batla', 'batla90', '$2y$10$QHKDkOdDz3SZB8YN7xquzuf1IbwLepsr8ZK7eUbbDgQzJBtmLsLni', 'batla906625adb749ee68.22944255.jpg'),
(8, 'batla', 'ajab', '$2y$10$lg0PtXuVyMrsq3wzSHM1S.SQRu0P7hoNrIkzv2R8jYQFO2yi.oCY2', 'default-pp.png'),
(9, 'batla', 'batla343', '$2y$10$mqhrVUMyialpxCW7RXacsO17iQuw6W.Yj5vbusFyJS.w3HLgs.cFK', 'default-pp.png'),
(10, 'batla', 'batla343', '$2y$10$hQEj8OU3/3mQPQn.yWakie0X4KOzzTIehVsztIVCj1595Nb.Nek5y', 'default-pp.png'),
(11, 'batla', 'batla343ee', '$2y$10$JzJwxqC6lPXlFniOTCmcM.f6zekywWRNd1KRrRq7VsvOy9yT6gpB2', 'default-pp.png'),
(12, 'batlaa', 'batla34', '$2y$10$Q8SabtGAkOBnCfRzEI7pS.lAhy1ThpV.bxYice3fDjamxowVKpFLi', 'default-pp.png'),
(13, 'aa', 'aaaaa', '$2y$10$6nWkLPG47oKUa.Kad9rTJebxP8PLDRS8eeM5itONGchH.6hJy2JKm', 'default-pp.png'),
(14, 'batla', 'ajab', '$2y$10$1V3uykFij5VEb0879.3jTOVYVOxfzFdQehqiu/QmpXshMaBrRUNpC', 'default-pp.png'),
(15, 'sara', 'a', '$2y$10$Xzkk/.4Yca1ux43kXO./we/zdX/okcfmJHdMHY8Kzr12aiwzqrEC6', 'default-pp.png'),
(16, 'batla11', 'batla11', '$2y$10$xipcjpT2vjgCjbK0Y.lnyu12o2Gmql0R2SR8RgdWUhpcFyfEWsqeq', 'default-pp.png'),
(17, 'batla', 'batla34', '$2y$10$MXqzyDFsqQRwl1e3xE9e0eQlMnSp8HuK8Am5LXaGxElRsVpanpvVi', 'default-pp.png'),
(18, 'batla', 'v', '$2y$10$buCRq519wUbsoxrnUy1XGe795d5daU5U/OMG/f//JS8hxDl2tYLeO', 'default-pp.png'),
(19, 'a', 'A@gmail.comaa', '$2y$10$cYcGEq5NIPpOD5nzsei3eOZUmb9TEF2XLnhuyMwMjDfvpRgqDIUNG', 'A@gmail.comaa662fc27254d0e4.32939805.jpg'),
(20, 'ahmedalbanna', 'ahmed', '$2y$10$zXsgqXwVIaFaTR9VB7XqZO3wb5yM0/J6sxjyAU9ZcKS2wbWaPmm7C', 'ahmed6639a5ecdbd121.31898975.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
