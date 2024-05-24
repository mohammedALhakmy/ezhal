-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 08:15 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `beneficiary`
--

CREATE TABLE `beneficiary` (
  `ID_Number` int(11) NOT NULL,
  `Fname` varchar(255) DEFAULT NULL,
  `Lname` varchar(255) DEFAULT NULL,
  `phone` bigint(11) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Register_Type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `beneficiary`
--

INSERT INTO `beneficiary` (`ID_Number`, `Fname`, `Lname`, `phone`, `Email`, `Password`, `Register_Type`) VALUES
(1, 'mohammed', 'mohammed', 112233558, 'mohammed@gmail.com', '$2y$06$Xv6Z/YpCRIg/TyOggcyiq.awISmKKF9nOAZLKoWrj46gDyfK0bY3C', NULL),
(2, 'ali', 'ali', 1122335566, 'ali@gmail.com', '$2y$06$Xv6Z/YpCRIg/TyOggcyiq.awISmKKF9nOAZLKoWrj46gDyfK0bY3C', NULL),
(3, 'developer', NULL, 502879159, 'developer@gmail.com', '$2y$06$Xv6Z/YpCRIg/TyOggcyiq.awISmKKF9nOAZLKoWrj46gDyfK0bY3C', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `between_cities`
--

CREATE TABLE `between_cities` (
  `id` int(11) NOT NULL,
  `status` enum('1','2') DEFAULT NULL,
  `delivery_agent_id` int(11) DEFAULT NULL,
  `from_city` varchar(50) DEFAULT NULL,
  `to_city` varchar(50) DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `to_go` time DEFAULT NULL,
  `to_get` time DEFAULT NULL,
  `qty` bigint(20) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `type_car` varchar(255) DEFAULT NULL,
  `plate_number` bigint(20) DEFAULT NULL,
  `add_service` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `between_cities`
--

INSERT INTO `between_cities` (`id`, `status`, `delivery_agent_id`, `from_city`, `to_city`, `from_date`, `to_date`, `to_go`, `to_get`, `qty`, `price`, `type_car`, `plate_number`, `add_service`) VALUES
(1, '2', 2, 'الرياض', 'الدمام', '2024-02-20', '2024-01-01', '13:01:00', '01:01:00', 10, '99', 'Toyota', 5551, 'لا يوجد تكيف'),
(2, '2', 2, 'خميس مشيط', 'الدمام', '2024-02-20', '2024-01-01', '13:01:00', '01:01:00', 10, '99', 'Toyota', 5551, 'لا يوجد تكيف'),
(3, '2', 2, 'بريدة', 'الدمام', '2024-02-20', '2024-01-01', '13:01:00', '01:01:00', 10, '99', 'Toyota', 5551, 'لا يوجد تكيف'),
(4, '2', 2, 'المدينة', 'الدمام', '2024-05-13', '2024-05-07', '14:18:00', '21:16:00', 8, '99', 'Lexus', 5551, 'لا يوجد تكيف'),
(5, '1', 2, 'مكة', 'الدمام', '2024-05-16', '2024-05-20', '23:21:00', '21:24:00', 8, '99', 'Lexus', 5551, 'لا يوجد تكيف'),
(6, '2', 2, 'الخبر', 'الدمام', '2024-05-02', '2024-05-15', '12:21:00', '12:21:00', 8, '', 'Lexus', 5551, 'لا يوجد تكيف'),
(7, '1', 2, 'الحساء', 'جدة', '2024-06-01', '2024-05-15', '21:27:00', '21:26:00', 9, '99', 'Hyundai', 6555, 'لا يوجد تكيف'),
(8, '2', 2, 'حايل', 'جدة', '2024-05-07', '2024-05-12', '12:25:00', '12:25:00', 9, '99', 'Mercedes Benz', 6555, 'لا يوجد تكيف'),
(9, '1', 2, 'الدمام', 'جدة', '2024-05-22', '2024-05-27', '12:27:00', '23:27:00', 9, '99', 'Lexus', 6555, 'لا يوجد تكيف'),
(10, '1', 2, 'الجبيل', 'الدمام', '2024-05-11', NULL, '21:32:00', NULL, 6, '99', 'Mercedes Benz', 5566, 'لا يوجد تكيف');

-- --------------------------------------------------------

--
-- Table structure for table `book_driver`
--

CREATE TABLE `book_driver` (
  `id` int(11) NOT NULL,
  `Order_Namber` bigint(20) NOT NULL,
  `location` varchar(50) DEFAULT NULL,
  `target_location` varchar(250) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `beneficiary_id` int(11) NOT NULL,
  `delivery_agent_id` int(11) NOT NULL,
  `type_b` enum('1','2','3','4','5') NOT NULL,
  `status` enum('pending','confirmed','processing','delivered','cancel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_driver`
--

INSERT INTO `book_driver` (`id`, `Order_Namber`, `location`, `target_location`, `start_date`, `start_time`, `beneficiary_id`, `delivery_agent_id`, `type_b`, `status`) VALUES
(1, 35091, 'dammam', 'الضاحية', '2024-01-25', '09:40:00', 1, 3, '1', 'processing'),
(2, 91858, 'dammam', 'الضاحية', '2024-01-25', '09:40:00', 1, 3, '1', 'confirmed'),
(3, 59026, 'مكة', 'الرياض', '2024-01-22', '06:00:00', 1, 3, '1', 'delivered');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `beneficiary_id` int(11) NOT NULL,
  `delivery_agent_id` int(11) NOT NULL,
  `notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `beneficiary_id`, `delivery_agent_id`, `notes`) VALUES
(1, 1, 4, 'ملاحظات  لا يوجد'),
(2, 1, 4, 'اهلا بوصل قريب'),
(5, 1, 4, 'كيفك ووين وصلت يا غالي'),
(6, 1, 6, 'صباح الخير'),
(7, 1, 6, 'كيفك ووين وصلت يا غالي'),
(8, 1, 6, 'قريب ان شاء الله مسافه الطريق فقط'),
(9, 1, 7, 'صباح الجن ووينك وسيم'),
(10, 1, 7, 'موجود يا جني '),
(11, 1, 7, 'ليش تقول جني انت جني الليل تاخرت ياعيب عليك تبا لك'),
(12, 1, 7, 'تباك لك انت');

-- --------------------------------------------------------

--
-- Table structure for table `delivery_agent`
--

CREATE TABLE `delivery_agent` (
  `ID_Number` int(11) NOT NULL,
  `Fname` varchar(255) DEFAULT NULL,
  `Lname` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `date_barth` date DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `ac_f` varchar(250) DEFAULT NULL,
  `ac_tw` varchar(250) DEFAULT NULL,
  `ac_li` varchar(255) DEFAULT NULL,
  `ac_in` varchar(250) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Register_Type` varchar(255) NOT NULL,
  `Availability` enum('1','2','3','4','5') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `delivery_agent`
--

INSERT INTO `delivery_agent` (`ID_Number`, `Fname`, `Lname`, `Email`, `photo`, `notes`, `date_barth`, `area`, `phone`, `ac_f`, `ac_tw`, `ac_li`, `ac_in`, `Password`, `Register_Type`, `Availability`) VALUES
(1, 'Osama', 'mohammed', 'mohammed@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$06$Xv6Z/YpCRIg/TyOggcyiq.awISmKKF9nOAZLKoWrj46gDyfK0bY3C', '2', '2'),
(2, 'mohammed Omar Omar Omar', 'Omar', 'omar@gmail.com', '31155568_', 'اعمل كمندوب في منصة إزهل للخدمات اللوجستية', '1993-10-10', 'الرياض', '5364656', 'لا يوجد حساب', 'لا يوجد حساب', 'لا يوجد حساب', 'لا يوجد حساب', '$2y$06$BNimd4ndArLVBWn14ikkTedUdayUoL9wTQ3/b.TquDMQB/dHNkJyi', '2', '2'),
(3, 'said', 'mohammed', 'said@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$06$Qj1NIBREYmlv7X0eOwqF.utG62VQrWZgmROmEv26ehkshudjl6ycC', '3', '3'),
(4, 'ali', 'ali', 'ali@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$06$Xv6Z/YpCRIg/TyOggcyiq.awISmKKF9nOAZLKoWrj46gDyfK0bY3C', '2', '4'),
(5, 'Ahmed', 'Ahmed', 'ahmed@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$06$Xv6Z/YpCRIg/TyOggcyiq.awISmKKF9nOAZLKoWrj46gDyfK0bY3C', '2', '5'),
(6, 'Mrad', 'Mrad', 'mrad@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$06$Qj1NIBREYmlv7X0eOwqF.utG62VQrWZgmROmEv26ehkshudjl6ycC', '5', '1'),
(7, 'havez', NULL, 'havez@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$06$Qj1NIBREYmlv7X0eOwqF.utG62VQrWZgmROmEv26ehkshudjl6ycC', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `details_the_trip`
--

CREATE TABLE `details_the_trip` (
  `id` int(11) NOT NULL,
  `Title` varchar(55) DEFAULT NULL,
  `f_name` varchar(55) DEFAULT NULL,
  `l_name` varchar(55) DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `nationality` varchar(55) DEFAULT NULL,
  `id_number` varchar(55) DEFAULT NULL,
  `not_number` varchar(55) DEFAULT NULL,
  `expire_number` date NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone_u` varchar(50) DEFAULT NULL,
  `transportation_between_citie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `details_the_trip`
--

INSERT INTO `details_the_trip` (`id`, `Title`, `f_name`, `l_name`, `birth_date`, `nationality`, `id_number`, `not_number`, `expire_number`, `email`, `phone_u`, `transportation_between_citie_id`) VALUES
(1, 'السيد', 'محمد', 'مجمد', '2024-01-01', 'PS', '1122336688', 'فلسطين', '2030-01-01', 'falestan@harb.strong', '+966115556688', 3),
(2, 'السيد', 'محمد', 'مجمد', '2024-01-01', 'PS', '1122336688', 'فلسطين', '2030-01-01', 'falestan@harb.strong', '+966115556688', 3),
(3, 'السيد', 'محمد', 'مجمد', '2024-01-01', 'PS', '1122336688', 'فلسطين', '2030-01-01', 'falestan@harb.strong', '+966115556688', 3),
(4, 'السيد', 'محمد', 'مجمد', '2024-01-01', 'PS', '1122336688', 'فلسطين', '2030-01-01', 'falestan@harb.strong', '+966115556688', 3),
(5, 'السيد', 'محمد', 'مجمد', '2024-01-01', 'PS', '1122336688', 'فلسطين', '2030-01-01', 'falestan@harb.strong', '+966115556688', 3),
(6, 'السيد', 'محمد', 'مجمد', '2024-01-01', 'PS', '1122336688', 'فلسطين', '2030-01-01', 'falestan@harb.strong', '+966115556688', 3),
(7, 'السيد', 'محمد', 'مجمد', '2024-01-01', 'PS', '1122336688', 'فلسطين', '2030-01-01', 'falestan@harb.strong', '+966115556688', 3),
(8, 'السيد', 'محمد', 'مجمد', '2024-01-01', 'PS', '1122336688', 'فلسطين', '2030-01-01', 'falestan@harb.strong', '+966115556688', 3),
(9, 'السيد', 'محمد', 'مجمد', '2024-01-01', 'PS', '1122336688', 'فلسطين', '2030-01-01', 'falestan@harb.strong', '+966115556688', 3);

-- --------------------------------------------------------

--
-- Table structure for table `driver_order`
--

CREATE TABLE `driver_order` (
  `Order_Namber` int(11) NOT NULL,
  `Order_Form_Details` varchar(50) DEFAULT NULL,
  `Order_Time` time DEFAULT NULL,
  `Order_Date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `evaluate_delivery_agent`
--

CREATE TABLE `evaluate_delivery_agent` (
  `Percentage` float DEFAULT NULL,
  `Structure delivery_ agent_id` int(11) DEFAULT NULL,
  `ID_Like_Number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `future_data`
--

CREATE TABLE `future_data` (
  `id` int(11) NOT NULL,
  `ID_Nnmber` bigint(11) DEFAULT NULL,
  `delivery_agent_id` int(11) DEFAULT NULL,
  `beneficiary_id` int(11) DEFAULT NULL,
  `Order_Date` date DEFAULT NULL,
  `Order_Time` time DEFAULT NULL,
  `type_s` int(11) DEFAULT NULL,
  `name_futur` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address_m` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `future_data`
--

INSERT INTO `future_data` (`id`, `ID_Nnmber`, `delivery_agent_id`, `beneficiary_id`, `Order_Date`, `Order_Time`, `type_s`, `name_futur`, `phone`, `address_m`) VALUES
(1, 93211, 6, 1, '2024-05-23', '15:05:00', 5, 'محمد مصطفى سعيد', '0502879159', 'الدمام حي بدر');

-- --------------------------------------------------------

--
-- Table structure for table `gas`
--

CREATE TABLE `gas` (
  `id` int(11) NOT NULL,
  `Order_Namber` int(20) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `type_sevices` varchar(50) NOT NULL,
  `location` varchar(250) NOT NULL,
  `packaging` enum('0','1') NOT NULL,
  `Order_Date` date NOT NULL,
  `Order_Time` time NOT NULL,
  `delivery_agent_id` int(11) NOT NULL,
  `beneficiary_id` int(11) NOT NULL,
  `type_s` enum('1','2','3','4','5') NOT NULL,
  `status` enum('pending','confirmed','processing','delive','cancel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gas`
--

INSERT INTO `gas` (`id`, `Order_Namber`, `Quantity`, `type_sevices`, `location`, `packaging`, `Order_Date`, `Order_Time`, `delivery_agent_id`, `beneficiary_id`, `type_s`, `status`) VALUES
(1, 42195, 5, 'medium', 'شسؤشسشس', '0', '2024-05-20', '21:05:00', 5, 1, '2', 'processing'),
(2, 31887, 3, 'medium', 'مكة', '1', '2024-05-21', '06:05:00', 5, 1, '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `gasoline`
--

CREATE TABLE `gasoline` (
  `id` int(11) NOT NULL,
  `Order_Namber` int(11) DEFAULT NULL,
  `type_sevices` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Order_Date` date DEFAULT NULL,
  `Order_Time` time DEFAULT NULL,
  `price` int(11) NOT NULL,
  `VAT` int(11) DEFAULT NULL,
  `delivery_agent_id` int(11) NOT NULL,
  `beneficiary_id` int(11) NOT NULL,
  `type_s` enum('1','2','3','4','5') NOT NULL,
  `status` enum('pending','confirmed','processing','delivered','cancel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gasoline`
--

INSERT INTO `gasoline` (`id`, `Order_Namber`, `type_sevices`, `location`, `Quantity`, `Order_Date`, `Order_Time`, `price`, `VAT`, `delivery_agent_id`, `beneficiary_id`, `type_s`, `status`) VALUES
(1, 76789, '95', 'dammam', 5, '2024-05-18', '20:05:00', 282, 37, 4, 1, '4', 'confirmed'),
(2, 53925, '95', 'dammam', 5, '2024-05-18', '20:05:00', 282, 37, 4, 1, '4', 'delivered'),
(4, 18934, '95', 'الرياض', 10, '2024-05-21', '06:05:00', 564, 74, 4, 1, '4', 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `gasoline_order`
--

CREATE TABLE `gasoline_order` (
  `Order_Namber` int(11) NOT NULL,
  `Order_Date` date DEFAULT NULL,
  `Order_Time` time DEFAULT NULL,
  `Quantity` float DEFAULT NULL,
  `VAT` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gasoline_service`
--

CREATE TABLE `gasoline_service` (
  `Order_Namber` int(11) NOT NULL,
  `Details_Select` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gas_order`
--

CREATE TABLE `gas_order` (
  `Order_Namber` int(11) NOT NULL,
  `Order_Date` date DEFAULT NULL,
  `Order_Time` time DEFAULT NULL,
  `Quantity` float DEFAULT NULL,
  `Delivery_Address` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `gas_service`
--

CREATE TABLE `gas_service` (
  `Order_Namber` int(11) NOT NULL,
  `Details_Select` varchar(255) DEFAULT NULL,
  `Detailsselect` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_driver`
--

CREATE TABLE `invoice_driver` (
  `invoice_number` int(11) NOT NULL,
  `Order_Number` int(11) DEFAULT NULL,
  `Order_Date` int(11) DEFAULT NULL,
  `Order_Time` int(11) DEFAULT NULL,
  `Quantity` float DEFAULT NULL,
  `Calculate_Amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_gas`
--

CREATE TABLE `invoice_gas` (
  `invoice_number` int(11) NOT NULL,
  `Order_Number` int(11) DEFAULT NULL,
  `Order_Date` date DEFAULT NULL,
  `Order_Time` time DEFAULT NULL,
  `Quantity` float DEFAULT NULL,
  `VAT` float DEFAULT NULL,
  `Calculate_Amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_gasoline`
--

CREATE TABLE `invoice_gasoline` (
  `invoice_number` int(11) NOT NULL,
  `Order_Number` varchar(255) DEFAULT NULL,
  `Order_Date` date DEFAULT NULL,
  `Order_Time` time DEFAULT NULL,
  `Quantity` float DEFAULT NULL,
  `VAT` float DEFAULT NULL,
  `Calculate_Amount` float DEFAULT NULL,
  `Fuel_Type` varchar(255) DEFAULT NULL,
  `Fuelling_Station_Name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_parcel`
--

CREATE TABLE `invoice_parcel` (
  `Invoice_number` int(11) NOT NULL,
  `ID_Shipment` int(11) DEFAULT NULL,
  `Order_Date` date DEFAULT NULL,
  `Weight` float DEFAULT NULL,
  `VAT` float DEFAULT NULL,
  `Calculate_Amount` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_trip`
--

CREATE TABLE `invoice_trip` (
  `invoice_number` int(11) NOT NULL,
  `Trip_Date` date DEFAULT NULL,
  `Trip_Time` time DEFAULT NULL,
  `Delivery_Name` varchar(50) DEFAULT NULL,
  `Cat_Type` varchar(50) DEFAULT NULL,
  `Trip_Number` int(50) DEFAULT NULL,
  `VAT` int(11) DEFAULT NULL,
  `Calculate_Amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `ID_Message` int(11) NOT NULL,
  `Fname` varchar(255) DEFAULT NULL,
  `Lname` varchar(255) DEFAULT NULL,
  `Subject` varchar(255) DEFAULT NULL,
  `Message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parcel`
--

CREATE TABLE `parcel` (
  `id` int(11) NOT NULL,
  `Parcel_Type` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `state` enum('pending','confirmed','processing','delivered','cancel') DEFAULT NULL,
  `Track_Number` bigint(20) DEFAULT NULL,
  `Cost` int(11) NOT NULL,
  `Select_Details` varchar(255) DEFAULT NULL,
  `delivery_agent_id` int(11) NOT NULL,
  `beneficiary_id` int(11) DEFAULT NULL,
  `Order_Date` date DEFAULT NULL,
  `Order_Time` time DEFAULT NULL,
  `type_s` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `parcel`
--

INSERT INTO `parcel` (`id`, `Parcel_Type`, `address`, `state`, `Track_Number`, `Cost`, `Select_Details`, `delivery_agent_id`, `beneficiary_id`, `Order_Date`, `Order_Time`, `type_s`) VALUES
(1, '', '', 'pending', 56782, 100, 'التفاصيل هيه نفس هيه', 7, 1, '2024-05-22', '20:05:00', 5),
(2, 'كسر', '', 'confirmed', 81401, 100, 'التفاصيل هيه نفس هيه', 7, 1, '2024-05-22', '21:05:00', 5),
(3, 'كسر', 'الرياض حي الشفاء المخرج91', 'pending', 94016, 75, 'لا اله لا الله محمد رسول الله', 7, 1, '2024-05-23', '15:05:00', 5),
(4, 'كسر', 'الرياض حي الشفاء المخرج91', 'pending', 34621, 25, 'التفاصيل هيه نفس هيه', 6, 1, '2024-05-23', '15:05:00', 5),
(5, 'غير كسر', 'الرياض حي الشفاء المخرج91', 'pending', 45794, 25, 'التفاصيل هيه نفس هيه', 6, 1, '2024-05-23', '15:05:00', 5),
(6, 'غير كسر', 'الرياض حي الشفاء المخرج91', 'pending', 57401, 25, 'التفاصيل هيه نفس هيه', 6, 1, '2024-05-23', '15:05:00', 5),
(7, 'غير كسر', 'الرياض حي الشفاء المخرج91', 'pending', 84681, 25, 'التفاصيل هيه نفس هيه', 6, 1, '2024-05-23', '15:05:00', 5),
(8, 'كسر', 'الرياض حي الشفاء المخرج91', 'pending', 93326, 50, 'التفاصيل هيه نفس هيه', 6, 1, '2024-05-23', '15:05:00', 5),
(9, 'كسر', 'الرياض حي الشفاء المخرج91', 'pending', 52249, 50, 'التفاصيل هيه نفس هيه', 6, 1, '2024-05-23', '15:05:00', 5),
(10, 'كسر', 'الرياض حي الشفاء المخرج91', 'pending', 58284, 50, 'التفاصيل هيه نفس هيه', 6, 1, '2024-05-23', '15:05:00', 5),
(11, 'كسر', 'الرياض حي الشفاء المخرج91', 'pending', 34280, 75, 'التفاصيل هيه نفس هيه', 6, 1, '2024-05-23', '15:05:00', 5),
(12, 'كسر', 'الرياض حي الشفاء المخرج91', 'pending', 93211, 75, 'التفاصيل هيه نفس هيه', 6, 1, '2024-05-23', '15:05:00', 5);

-- --------------------------------------------------------

--
-- Table structure for table `parcel_service`
--

CREATE TABLE `parcel_service` (
  `Parcel_Type` varchar(50) DEFAULT NULL,
  `Parcel_State` varchar(50) DEFAULT NULL,
  `Track_Number` int(11) DEFAULT NULL,
  `Cost` int(11) DEFAULT NULL,
  `Select_Details` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `parcel_service_order`
--

CREATE TABLE `parcel_service_order` (
  `ID_Shipment` int(11) NOT NULL,
  `Name_Customer` varchar(50) DEFAULT NULL,
  `Phone_Number` int(11) DEFAULT NULL,
  `Order_Date` date DEFAULT NULL,
  `Order_Time` time DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Destination_Location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `Card_Number` varchar(50) NOT NULL,
  `Catd_Type` varchar(200) DEFAULT NULL,
  `Expired_Date` varchar(50) DEFAULT NULL,
  `Name_Card` varchar(50) DEFAULT NULL,
  `Security_Card` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`Card_Number`, `Catd_Type`, `Expired_Date`, `Name_Card`, `Security_Card`) VALUES
('', '664', '2028/12', 'ali', NULL),
('', '222', '2028/12', 'mohammed', NULL),
('', '569', '2028/12', 'Moahammed', NULL),
('515656563', '563', '2028-10', 'ali', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_city`
--

CREATE TABLE `payment_city` (
  `id` int(11) NOT NULL,
  `Fname` varchar(55) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `address` varchar(55) DEFAULT NULL,
  `city` varchar(55) DEFAULT NULL,
  `streeat` varchar(55) DEFAULT NULL,
  `add_parid` int(55) DEFAULT NULL,
  `year` varchar(55) DEFAULT NULL,
  `cvv` varchar(55) DEFAULT NULL,
  `month` varchar(50) DEFAULT NULL,
  `card_number` varchar(50) DEFAULT NULL,
  `card_name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_city`
--

INSERT INTO `payment_city` (`id`, `Fname`, `email`, `address`, `city`, `streeat`, `add_parid`, `year`, `cvv`, `month`, `card_number`, `card_name`) VALUES
(1, 'mohammed', 'profile.mohammge@gmail.com', 'الرياض حي الشفاء المخرج91', 'جهنم', 'جهنم', 1010, '2028', '556', '12', '10101010101010101', NULL),
(2, 'mohammed', 'profile.mohammge@gmail.com', 'الرياض حي الشفاء المخرج91', 'جهنم', 'جهنم', 1010, '2028', '556', '12', '10101010101010101', 'said');

-- --------------------------------------------------------

--
-- Table structure for table `send_parcel`
--

CREATE TABLE `send_parcel` (
  `Name_Sender` varchar(50) DEFAULT NULL,
  `Phone_Number` varchar(50) DEFAULT NULL,
  `Destination_Location` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sevices`
--

CREATE TABLE `sevices` (
  `id` int(11) NOT NULL,
  `service_name` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `service_img` varchar(100) DEFAULT NULL,
  `service_notes` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sevices`
--

INSERT INTO `sevices` (`id`, `service_name`, `price`, `service_img`, `service_notes`) VALUES
(1, 'سائق إزهل', 100, 'card6.png', 'نهدف إلى توفير تجربة آمنة وموثوقة لتوصيل الطلاب  حيث يمكن للأهل البحث وحجز سائق خاص لأطفالهم  بعناية وفقًا لمعايير الأمان والخدمة الرفيعة، مما يضمن رحلات آمنة'),
(2, 'توصيل غاز', 35, 'card2.png', 'نتيح لك طلب وتوصيل الغاز المنزلي مباشرةً إلى منزلك مما يجعل استخدام الغاز أمرًا أكثر يسرًا وفعالية'),
(3, 'إنتقال بين المدن', 199, 'card3.png', 'قدمنا لك رحلات مريحة وآمنة لتلبية احتياجات تنقلك بين مناطق المملكة بأمان وبسلاسة'),
(4, 'توصيل بنزين', 49, 'card4.png', 'نتيح لك طلب وتوصيل الوقود مباشرةً إلى موقعك موفرين لك الوقت والجهد'),
(5, 'بريد إزهل', 29, 'card55.png', 'يمكنك بسهولة تحديد المكان والوجهة عبر إزهل، وسنقوم بضمان وصول الطلب إلى وجهته بشكل سريع وآمن.');

-- --------------------------------------------------------

--
-- Table structure for table `track_parcel`
--

CREATE TABLE `track_parcel` (
  `ID_Shipment` int(11) NOT NULL,
  `Parcel_State` varchar(50) DEFAULT NULL,
  `State_Update` varchar(50) DEFAULT NULL,
  `Location_Update` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transportation_between_cities`
--

CREATE TABLE `transportation_between_cities` (
  `id` int(11) NOT NULL,
  `type` varchar(55) DEFAULT NULL,
  `adults` varchar(55) DEFAULT NULL,
  `children` varchar(55) DEFAULT NULL,
  `infants` varchar(55) DEFAULT NULL,
  `special_needs` varchar(55) DEFAULT NULL,
  `student` varchar(55) DEFAULT NULL,
  `to_city` varchar(55) DEFAULT NULL,
  `from_city` varchar(55) DEFAULT NULL,
  `teceat` varchar(55) DEFAULT NULL,
  `beneficiary_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transportation_between_cities`
--

INSERT INTO `transportation_between_cities` (`id`, `type`, `adults`, `children`, `infants`, `special_needs`, `student`, `to_city`, `from_city`, `teceat`, `beneficiary_id`) VALUES
(1, '1', '2', '5', '1', '1', '1', 'جدة', 'الحساء', 'اليوم', 1),
(2, '1', '2', '5', '1', '1', '1', 'جدة', 'الحساء', 'اليوم', 1),
(3, '1', '2', '5', '1', '1', '1', 'جدة', 'الحساء', 'اليوم', 1),
(4, '1', '2', '5', '1', '1', '1', 'جدة', 'الحساء', 'اليوم', 1);

-- --------------------------------------------------------

--
-- Table structure for table `trip_orde`
--

CREATE TABLE `trip_orde` (
  `Trip_Number` int(11) NOT NULL,
  `Order_Date` date DEFAULT NULL,
  `Number_Passengers` int(11) DEFAULT NULL,
  `Meeting_Point` varchar(50) DEFAULT NULL,
  `Destination_Location` varchar(50) DEFAULT NULL,
  `Additional_Services` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `your_location`
--

CREATE TABLE `your_location` (
  `id` int(11) NOT NULL,
  `u_lovation` varchar(55) DEFAULT NULL,
  `u_ciy` varchar(55) DEFAULT NULL,
  `u_hay` varchar(55) DEFAULT NULL,
  `u_streeat` varchar(55) DEFAULT NULL,
  `u_address_short` varchar(55) DEFAULT NULL,
  `trip_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `your_location`
--

INSERT INTO `your_location` (`id`, `u_lovation`, `u_ciy`, `u_hay`, `u_streeat`, `u_address_short`, `trip_id`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 3),
(2, NULL, NULL, NULL, NULL, NULL, 3),
(3, NULL, NULL, NULL, NULL, NULL, 3),
(4, 'ABCD1234', 'مكة', 'النزهة', 'الأمير سلطان', 'ABCD1234', 9),
(5, 'ABCD1234', 'مكة', 'النزهة', 'الأمير سلطان', 'ABCD1234', 9),
(6, 'ABCD1234', 'مكة', 'النزهة', 'الأمير سلطان', 'ABCD1234', 9),
(7, 'ABCD1234', 'مكة', 'النزهة', 'الأمير سلطان', 'ABCD1234', 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beneficiary`
--
ALTER TABLE `beneficiary`
  ADD PRIMARY KEY (`ID_Number`);

--
-- Indexes for table `between_cities`
--
ALTER TABLE `between_cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_agent_id` (`delivery_agent_id`);

--
-- Indexes for table `book_driver`
--
ALTER TABLE `book_driver`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beneficiary_id` (`beneficiary_id`),
  ADD KEY `delivery_agent_id` (`delivery_agent_id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beneficiary_id` (`beneficiary_id`),
  ADD KEY `delivery_agent_id` (`delivery_agent_id`);

--
-- Indexes for table `delivery_agent`
--
ALTER TABLE `delivery_agent`
  ADD PRIMARY KEY (`ID_Number`);

--
-- Indexes for table `details_the_trip`
--
ALTER TABLE `details_the_trip`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transportation_between_citie_id` (`transportation_between_citie_id`);

--
-- Indexes for table `driver_order`
--
ALTER TABLE `driver_order`
  ADD PRIMARY KEY (`Order_Namber`);

--
-- Indexes for table `evaluate_delivery_agent`
--
ALTER TABLE `evaluate_delivery_agent`
  ADD KEY `Structure delivery_ agent_id` (`Structure delivery_ agent_id`);

--
-- Indexes for table `future_data`
--
ALTER TABLE `future_data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `delivery_agent_id` (`delivery_agent_id`),
  ADD KEY `beneficiary_id` (`beneficiary_id`);

--
-- Indexes for table `gas`
--
ALTER TABLE `gas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gasoline`
--
ALTER TABLE `gasoline`
  ADD PRIMARY KEY (`id`),
  ADD KEY `beneficiary_id` (`beneficiary_id`),
  ADD KEY `delivery_agent_id` (`delivery_agent_id`);

--
-- Indexes for table `gasoline_order`
--
ALTER TABLE `gasoline_order`
  ADD PRIMARY KEY (`Order_Namber`);

--
-- Indexes for table `gasoline_service`
--
ALTER TABLE `gasoline_service`
  ADD PRIMARY KEY (`Order_Namber`);

--
-- Indexes for table `gas_order`
--
ALTER TABLE `gas_order`
  ADD PRIMARY KEY (`Order_Namber`);

--
-- Indexes for table `gas_service`
--
ALTER TABLE `gas_service`
  ADD PRIMARY KEY (`Order_Namber`);

--
-- Indexes for table `invoice_driver`
--
ALTER TABLE `invoice_driver`
  ADD PRIMARY KEY (`invoice_number`);

--
-- Indexes for table `invoice_gas`
--
ALTER TABLE `invoice_gas`
  ADD PRIMARY KEY (`invoice_number`);

--
-- Indexes for table `invoice_gasoline`
--
ALTER TABLE `invoice_gasoline`
  ADD PRIMARY KEY (`invoice_number`);

--
-- Indexes for table `invoice_parcel`
--
ALTER TABLE `invoice_parcel`
  ADD PRIMARY KEY (`Invoice_number`);

--
-- Indexes for table `invoice_trip`
--
ALTER TABLE `invoice_trip`
  ADD PRIMARY KEY (`invoice_number`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`ID_Message`);

--
-- Indexes for table `parcel`
--
ALTER TABLE `parcel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcel_service_order`
--
ALTER TABLE `parcel_service_order`
  ADD PRIMARY KEY (`ID_Shipment`);

--
-- Indexes for table `payment_city`
--
ALTER TABLE `payment_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sevices`
--
ALTER TABLE `sevices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `track_parcel`
--
ALTER TABLE `track_parcel`
  ADD PRIMARY KEY (`ID_Shipment`);

--
-- Indexes for table `transportation_between_cities`
--
ALTER TABLE `transportation_between_cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_orde`
--
ALTER TABLE `trip_orde`
  ADD PRIMARY KEY (`Trip_Number`);

--
-- Indexes for table `your_location`
--
ALTER TABLE `your_location`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beneficiary`
--
ALTER TABLE `beneficiary`
  MODIFY `ID_Number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `between_cities`
--
ALTER TABLE `between_cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `book_driver`
--
ALTER TABLE `book_driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `delivery_agent`
--
ALTER TABLE `delivery_agent`
  MODIFY `ID_Number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `details_the_trip`
--
ALTER TABLE `details_the_trip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `driver_order`
--
ALTER TABLE `driver_order`
  MODIFY `Order_Namber` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `future_data`
--
ALTER TABLE `future_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `gas`
--
ALTER TABLE `gas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gasoline`
--
ALTER TABLE `gasoline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gasoline_order`
--
ALTER TABLE `gasoline_order`
  MODIFY `Order_Namber` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gasoline_service`
--
ALTER TABLE `gasoline_service`
  MODIFY `Order_Namber` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gas_order`
--
ALTER TABLE `gas_order`
  MODIFY `Order_Namber` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gas_service`
--
ALTER TABLE `gas_service`
  MODIFY `Order_Namber` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_driver`
--
ALTER TABLE `invoice_driver`
  MODIFY `invoice_number` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_gas`
--
ALTER TABLE `invoice_gas`
  MODIFY `invoice_number` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_gasoline`
--
ALTER TABLE `invoice_gasoline`
  MODIFY `invoice_number` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_parcel`
--
ALTER TABLE `invoice_parcel`
  MODIFY `Invoice_number` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_trip`
--
ALTER TABLE `invoice_trip`
  MODIFY `invoice_number` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `ID_Message` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parcel`
--
ALTER TABLE `parcel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `parcel_service_order`
--
ALTER TABLE `parcel_service_order`
  MODIFY `ID_Shipment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_city`
--
ALTER TABLE `payment_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sevices`
--
ALTER TABLE `sevices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `track_parcel`
--
ALTER TABLE `track_parcel`
  MODIFY `ID_Shipment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transportation_between_cities`
--
ALTER TABLE `transportation_between_cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trip_orde`
--
ALTER TABLE `trip_orde`
  MODIFY `Trip_Number` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `your_location`
--
ALTER TABLE `your_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `between_cities`
--
ALTER TABLE `between_cities`
  ADD CONSTRAINT `between_cities_ibfk_1` FOREIGN KEY (`delivery_agent_id`) REFERENCES `delivery_agent` (`ID_Number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `book_driver`
--
ALTER TABLE `book_driver`
  ADD CONSTRAINT `book_driver_ibfk_1` FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiary` (`ID_Number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `book_driver_ibfk_2` FOREIGN KEY (`delivery_agent_id`) REFERENCES `delivery_agent` (`ID_Number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiary` (`ID_Number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chat_ibfk_2` FOREIGN KEY (`delivery_agent_id`) REFERENCES `delivery_agent` (`ID_Number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `details_the_trip`
--
ALTER TABLE `details_the_trip`
  ADD CONSTRAINT `details_the_trip_ibfk_1` FOREIGN KEY (`transportation_between_citie_id`) REFERENCES `transportation_between_cities` (`id`);

--
-- Constraints for table `evaluate_delivery_agent`
--
ALTER TABLE `evaluate_delivery_agent`
  ADD CONSTRAINT `evaluate_delivery_agent_ibfk_1` FOREIGN KEY (`Structure delivery_ agent_id`) REFERENCES `delivery_agent` (`ID_Number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `future_data`
--
ALTER TABLE `future_data`
  ADD CONSTRAINT `future_data_ibfk_1` FOREIGN KEY (`delivery_agent_id`) REFERENCES `delivery_agent` (`ID_Number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `future_data_ibfk_2` FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiary` (`ID_Number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gasoline`
--
ALTER TABLE `gasoline`
  ADD CONSTRAINT `gasoline_ibfk_1` FOREIGN KEY (`beneficiary_id`) REFERENCES `beneficiary` (`ID_Number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `gasoline_ibfk_2` FOREIGN KEY (`delivery_agent_id`) REFERENCES `delivery_agent` (`ID_Number`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
