-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2019 at 02:14 PM
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
-- Database: `vendesi1_id10444080_db_vendesiya`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_additional_product_details`
--

CREATE TABLE `tbl_additional_product_details` (
  `additional_product_details_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `spec_type_id` int(11) NOT NULL,
  `spec_value` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_additional_product_details`
--

INSERT INTO `tbl_additional_product_details` (`additional_product_details_id`, `product_id`, `spec_type_id`, `spec_value`) VALUES
(1, 1000, 1, 'Apple'),
(2, 1055, 1, 'Nokia'),
(3, 4, 1, 'Nokia'),
(4, 5, 1, 'Nokia'),
(5, 1004, 1, 'Apple'),
(6, 1055, 2, 'Used'),
(7, 1004, 3, 'iPhone 7'),
(8, 1004, 4, 'Only phone'),
(9, 1004, 5, '6 months'),
(10, 1006, 5, '6 Months'),
(11, 1007, 1, 'Nokia'),
(12, 1007, 2, 'Used'),
(13, 1007, 4, 'Charger and headset'),
(14, 1007, 5, '6 months'),
(15, 1036, 1, 'huwawi red'),
(16, 1036, 2, 'new'),
(17, 1036, 3, '34rty'),
(18, 1070, 2, 'used'),
(19, 1070, 1, 'nokia'),
(20, 1070, 3, 'x1'),
(21, 1082, 1, 'Sony');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assign_product`
--

CREATE TABLE `tbl_assign_product` (
  `assign_product_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `assigned_to_cms_user_id` int(11) NOT NULL,
  `assigned_on` datetime NOT NULL,
  `assigned_by_cms_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_assign_product`
--

INSERT INTO `tbl_assign_product` (`assign_product_id`, `product_id`, `assigned_to_cms_user_id`, `assigned_on`, `assigned_by_cms_user_id`) VALUES
(1, 1004, 1000, '2017-10-18 09:20:01', 1000),
(2, 1007, 1000, '2017-11-06 11:51:01', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bid`
--

CREATE TABLE `tbl_bid` (
  `bid_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `bid_amount` int(11) NOT NULL,
  `bid_user_id` int(11) NOT NULL,
  `bid_date_and_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_bid`
--

INSERT INTO `tbl_bid` (`bid_id`, `product_id`, `bid_amount`, `bid_user_id`, `bid_date_and_time`) VALUES
(1, 1003, 28750, 1, '2017-10-18 06:57:40'),
(2, 1000, 30000, 1, '2017-10-18 07:06:03'),
(3, 1004, 32500, 1, '2017-10-18 09:35:46'),
(4, 1005, 49500, 1, '2017-10-26 07:07:20'),
(5, 1005, 54000, 1, '2017-10-26 07:22:20'),
(6, 1005, 58500, 1, '2017-10-26 07:26:35'),
(7, 1005, 63000, 1, '2017-10-26 07:45:49'),
(8, 1005, 67500, 1, '2017-10-26 07:46:47'),
(9, 1005, 72000, 1, '2017-10-26 07:50:45'),
(10, 1005, 74250, 1, '2017-10-26 07:51:21'),
(11, 1005, 76500, 1, '2017-11-06 10:33:44'),
(12, 1007, 16500, 1, '2017-11-10 10:57:49'),
(13, 1000, 35000, 1, '2017-11-11 06:22:02'),
(14, 1007, 18000, 1, '2017-11-11 06:24:33'),
(15, 1000, 37500, 1, '2019-01-17 10:27:32'),
(16, 1055, 2000, 1, '2019-07-02 09:31:22'),
(17, 1065, 770, 6, '2019-07-09 06:58:58'),
(18, 1065, 840, 6, '2019-07-09 07:22:55'),
(19, 1059, 117, 6, '2019-07-09 07:24:01'),
(20, 1059, 128, 6, '2019-07-09 07:24:33'),
(21, 1059, 139, 6, '2019-07-09 07:45:06'),
(22, 1062, 138, 6, '2019-07-09 07:54:02'),
(23, 1064, 1320, 6, '2019-07-09 08:19:03'),
(24, 1064, 1320, 6, '2019-07-09 08:20:08'),
(25, 1059, 170, 2, '2019-07-12 10:21:18'),
(26, 1059, 201, 2, '2019-07-12 10:22:53'),
(27, 1059, 222, 2, '2019-07-12 10:23:51'),
(28, 1059, 253, 2, '2019-07-12 10:29:28'),
(29, 1059, 331, 2, '2019-07-12 10:30:01'),
(30, 1060, 936, 2, '2019-07-12 12:15:06'),
(31, 1060, 1061, 3, '2019-07-26 06:53:11'),
(32, 1060, 1186, 2, '2019-07-26 10:25:37'),
(33, 1060, 1311, 3, '2019-07-26 10:28:13'),
(34, 1060, 1498, 2, '2019-07-31 07:33:06'),
(35, 1060, 1748, 3, '2019-08-06 08:57:07'),
(36, 1056, 168, 3, '2019-08-07 07:18:05'),
(37, 1061, 960, 3, '2019-08-07 07:25:15'),
(38, 1064, 1920, 3, '2019-08-07 07:30:18'),
(39, 1061, 1200, 3, '2019-08-07 07:33:29'),
(40, 1062, 213, 3, '2019-08-07 07:34:57'),
(41, 1059, 395, 3, '2019-08-07 07:36:15'),
(42, 1056, 240, 3, '2019-08-07 07:39:12'),
(43, 1059, 459, 3, '2019-08-07 08:14:29'),
(44, 1064, 2400, 2, '2019-08-09 11:11:29'),
(45, 1060, 1873, 3, '2019-08-13 07:08:15'),
(46, 1058, 220, 3, '2019-08-13 11:53:18'),
(47, 1064, 3600, 3, '2019-08-13 12:03:17'),
(48, 1062, 313, 3, '2019-08-13 12:18:51'),
(49, 1071, 411, 3, '2019-08-13 12:34:14'),
(50, 1062, 388, 3, '2019-08-14 12:04:38'),
(51, 1064, 4320, 3, '2019-08-19 07:47:01'),
(52, 1060, 2123, 3, '2019-08-19 07:49:10'),
(53, 1066, 6800, 3, '2019-08-19 13:22:45'),
(54, 1064, 5040, 3, '2019-08-21 07:19:05'),
(55, 1065, 1260, 3, '2019-08-21 07:22:43'),
(56, 1066, 8500, 3, '2019-09-03 07:15:59'),
(57, 1066, 10200, 3, '2019-09-03 07:56:13'),
(58, 1061, 1440, 3, '2019-09-03 08:14:23'),
(59, 1062, 463, 3, '2019-09-05 08:22:06'),
(60, 1063, 1000, 3, '2019-09-05 12:16:04'),
(61, 1066, 12750, 3, '2019-09-05 12:23:15'),
(62, 1066, 17000, 3, '2019-09-06 08:21:26'),
(63, 1065, 1680, 3, '2019-09-10 12:53:38'),
(64, 1064, 5520, 3, '2019-09-10 12:57:16'),
(65, 1084, 7440, 1, '2019-09-13 13:08:48'),
(66, 1062, 538, 3, '2019-09-17 07:46:53'),
(67, 1066, 18700, 3, '2019-09-17 07:56:15'),
(68, 1090, 680, 26, '2019-09-17 02:21:13'),
(69, 1082, 3360, 26, '2019-09-17 02:34:22'),
(70, 1087, 35200, 30, '2019-09-20 12:58:15'),
(71, 1090, 850, 27, '2019-09-20 03:02:47'),
(72, 1106, 135, 26, '2019-10-04 08:56:57'),
(73, 1055, 2480, 26, '2019-10-04 09:01:47'),
(74, 1055, 3800, 26, '2019-10-04 09:02:55'),
(75, 1106, 680, 26, '2019-10-04 09:12:12'),
(76, 1106, 480, 26, '2019-10-04 09:57:41'),
(77, 1106, 528, 26, '2019-10-04 10:10:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(1000) NOT NULL,
  `category_url` varchar(1000) NOT NULL,
  `category_icon` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_url`, `category_icon`) VALUES
(1, 'Electronics', 'electronics', 'images/catagory-icons/electronic.png'),
(2, 'Vehicles', 'vehicles', 'images/catagory-icons/vehicle.png'),
(3, 'Property', 'property', 'images/catagory-icons/property.png'),
(4, 'Home & Garden', 'home-Garden', 'images/catagory-icons/home.png'),
(5, 'Fashion, Health & Beauty', 'fashion-health-beauty', 'images/catagory-icons/fashion.png'),
(6, 'Hobby, Sport & Kids', 'hobby-sport-kids', 'images/catagory-icons/game.png'),
(7, 'Business & Industry', 'Business-Industry', 'images/catagory-icons/business.png'),
(8, 'Services', 'services', 'images/catagory-icons/services.png'),
(9, 'Education', 'education', 'images/catagory-icons/education.png'),
(10, 'Animals', 'animals', 'images/catagory-icons/animal.png'),
(11, 'Food & Agriculture', 'food-agriculture', 'images/catagory-icons/food.png'),
(12, 'CD & DVD', 'cd-and-dvd', 'images/catagory-icons/5d5255a211efa_cd-dvd.png'),
(14, 'collectable', 'collectable', 'images/catagory-icons/5d8c5af509940_collectable.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cms_users`
--

CREATE TABLE `tbl_cms_users` (
  `cms_user_id` int(11) NOT NULL,
  `cms_user_full_name` varchar(255) NOT NULL,
  `cms_user_username` varchar(255) NOT NULL,
  `cms_user_password` varchar(255) NOT NULL,
  `cms_user_pic` varchar(1000) NOT NULL,
  `cms_user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cms_users`
--

INSERT INTO `tbl_cms_users` (`cms_user_id`, `cms_user_full_name`, `cms_user_username`, `cms_user_password`, `cms_user_pic`, `cms_user_status`) VALUES
(1000, 'Nadheem', 'admin', '47bce5c74f589f4867dbd57e9ca9f808', '', 1),
(1001, 'Tharindu', 'tharindu', 'e10adc3949ba59abbe56e057f20f883e', '', 2),
(1002, 'Shifaz', 'shifaz', 'e10adc3949ba59abbe56e057f20f883e', '', 3),
(1003, 'adminnew', 'adminnew', '47bce5c74f589f4867dbd57e9ca9f808', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contact_user_id` int(200) NOT NULL,
  `contact_user_name` varchar(300) NOT NULL,
  `contact_user_email` varchar(300) NOT NULL,
  `contact_user_number` varchar(100) NOT NULL,
  `contact_user_message` varchar(3000) NOT NULL,
  `contact_user_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`contact_user_id`, `contact_user_name`, `contact_user_email`, `contact_user_number`, `contact_user_message`, `contact_user_date`) VALUES
(1, 'rtjh', 'hesth@g', '3452435346', 'haer', '2019-07-18'),
(2, 'dfh', 'gawr@fgyj', '5436346347', 'haerher', '2019-07-18'),
(3, 'gwer', 'sdhn@gmail.com', '2534252345', 'gaergweg', '2019-07-18'),
(4, 'sefg', 'bawer@rstjh', '457467', 'hetu', '2019-07-18'),
(5, 'hazery', 'gw@agwer', '4523412342', 'agwee', '2019-07-18'),
(6, '        HRT4', 'TDRHHSETH@ER', '2363445645', '         ', '2019-07-18'),
(7, 'sdfh', 'nak@gmail.com', '5434534534', '     ', '2019-07-25'),
(8, 'bsdfgh', 'hesth@g', '5464563477', '   ', '2019-07-25'),
(9, 'xfgjhrg', 'nak@gmail.com', '3345234534', 'qwrgwregwrg', '2019-09-10'),
(10, 'hiii', 'nak@gmail.com', '5436346347', 'hwsetesh', '2019-09-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_disapprove`
--

CREATE TABLE `tbl_disapprove` (
  `disapprove_id` int(11) NOT NULL,
  `disapprove_reason` varchar(1000) NOT NULL,
  `disapproved_on` datetime NOT NULL,
  `product_id` int(11) NOT NULL,
  `cms_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_disapprove`
--

INSERT INTO `tbl_disapprove` (`disapprove_id`, `disapprove_reason`, `disapproved_on`, `product_id`, `cms_user_id`) VALUES
(1, 'test', '2017-10-26 01:23:03', 1006, 1000),
(2, 'Test disapprove', '2017-11-06 12:43:50', 1007, 1000),
(3, 'i dont like', '2019-07-22 09:26:38', 1067, 1000),
(4, 'kill it', '2019-08-09 11:27:16', 1070, 1000),
(5, 'not like this bad', '2019-08-20 08:42:16', 1072, 1000),
(6, 'nooo', '2019-08-20 12:11:36', 1071, 1000),
(7, 'koka doodle dooo', '2019-08-21 07:28:30', 1071, 1000),
(8, 'dooodle doooo', '2019-08-21 08:31:25', 1070, 1000),
(9, 'dirreck peirece', '2019-08-21 08:35:46', 1072, 1000),
(10, 'i dont like it', '2019-09-06 01:01:22', 1079, 1000),
(11, 'vgtygy', '2019-09-06 02:01:20', 1078, 1000),
(12, 'Its totally fake one', '2019-09-07 05:59:00', 1076, 1000),
(13, 'Its not a product', '2019-09-11 06:45:05', 1089, 1000),
(14, 'Its not seems to be a correct product', '2019-09-17 10:40:19', 1091, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_districts`
--

CREATE TABLE `tbl_districts` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(150) NOT NULL,
  `district_url` varchar(255) NOT NULL,
  `district_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_districts`
--

INSERT INTO `tbl_districts` (`district_id`, `district_name`, `district_url`, `district_status`) VALUES
(1, 'Colombo', 'colombo', 1),
(2, 'Kandy', 'kandy', 0),
(3, 'Galle', 'galle', 0),
(4, 'Ampara', 'ampara', 0),
(5, 'Anuradhapura', 'anuradhapura', 0),
(6, 'Badulla', 'badulla', 0),
(7, 'Batticaloa', 'batticaloa', 0),
(8, 'Gampaha', 'gampaha', 1),
(9, 'Hambantota', 'hambantota', 0),
(10, 'Jaffna', 'jaffna', 0),
(11, 'Kalutara', 'kalutara', 1),
(12, 'Kegalle', 'kegalle', 0),
(13, 'Kilinochchi', 'kilinochchi', 0),
(14, 'Kurunegala', 'kurunegala', 0),
(15, 'Mannar', 'mannar', 0),
(16, 'Matale', 'matale', 0),
(17, 'Matara', 'matara', 0),
(18, 'Moneragala', 'moneragala', 0),
(19, 'Mullativu', 'mullativu', 0),
(20, 'Nuwara Eliya', 'nuwara-eliya', 0),
(21, 'Polonnaruwa', 'polonnaruwa', 0),
(22, 'Puttalam', 'puttalam', 0),
(23, 'Ratnapura', 'ratnapura', 0),
(24, 'Trincomalee', 'trincomalee', 0),
(25, 'Vavuniya', 'vavuniya', 0),
(26, 'Colombo 1 - 15', 'Colombo-1-15', 0),
(27, 'Colombo - Greater', 'Colombo-Greater', 0),
(28, 'Colombo - Suburbs', 'Colombo-Suburbs', 0),
(29, 'Gampaha', 'gampaha', 0),
(30, 'Kalutara', 'kalutara', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district_sub_area`
--

CREATE TABLE `tbl_district_sub_area` (
  `area_id` int(11) NOT NULL,
  `area_name` varchar(255) NOT NULL,
  `area_url` varchar(255) NOT NULL,
  `district_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_district_sub_area`
--

INSERT INTO `tbl_district_sub_area` (`area_id`, `area_name`, `area_url`, `district_id`) VALUES
(1, 'Nugegoda', 'nugegoda', 1),
(2, 'Colombo 6', 'colombo-6', 1),
(3, 'Dehiwala', 'dehiwala', 1),
(4, 'Kottawa', 'kottawa', 1),
(5, 'Piliyandala', 'piliyandala', 1),
(6, 'Angoda', 'angoda', 1),
(7, 'Athurugiriya', 'athurugiriya', 1),
(8, 'Avissawella', 'avissawella', 1),
(9, 'Battaramulla', 'battaramulla', 1),
(10, 'Boralesgamuwa', 'boralesgamuwa', 1),
(11, 'Colombo 1', 'colombo-1', 1),
(12, 'Colombo 10', 'colombo-10', 1),
(13, 'Colombo 11', 'colombo-11', 1),
(14, 'Colombo 12', 'colombo-12', 1),
(15, 'Colombo 13', 'colombo-13', 1),
(16, 'Colombo 14', 'colombo-14', 1),
(17, 'Colombo 15', 'colombo-15', 1),
(18, 'Colombo 2', 'colombo-2', 1),
(19, 'Colombo 3', 'colombo-3', 1),
(20, 'Colombo 4', 'colombo-4', 1),
(21, 'Colombo 5', 'colombo-5', 1),
(22, 'Colombo 7', 'colombo-7', 1),
(23, 'Colombo 8', 'colombo-8', 1),
(24, 'Colombo 9', 'colombo-9', 1),
(25, 'Hanwella', 'hanwella', 1),
(26, 'Homagama', 'homagama', 1),
(27, 'Kaduwela', 'kaduwela', 1),
(28, 'Kesbewa', 'kesbewa', 1),
(29, 'Kohuwala', 'kohuwala', 1),
(30, 'Kolonnawa', 'kolonnawa', 1),
(31, 'Kotte', 'kotte', 1),
(32, 'Maharagama', 'maharagama', 1),
(33, 'Malabe', 'malabe', 1),
(34, 'Moratuwa', 'moratuwa', 1),
(35, 'Mount Lavinia', 'mount-lavinia', 1),
(36, 'Nawala', 'nawala', 1),
(37, 'Padukka', 'padukka', 1),
(38, 'Pannipitiya', 'pannipitiya', 1),
(39, 'Rajagiriya', 'rajagiriya', 1),
(40, 'Ratmalana', 'ratmalana', 1),
(41, 'Talawatugoda', 'talawatugoda', 1),
(42, 'Wellampitiya', 'wellampitiya', 1),
(43, 'Kandy', 'kandy', 2),
(44, 'Katugastota', 'katugastota', 2),
(45, 'Gampola', 'gampola', 2),
(46, 'Peradeniya', 'peradeniya', 2),
(47, 'Kundasale', 'kundasale', 2),
(48, 'Akurana', 'akurana', 2),
(49, 'Ampitiya', 'ampitiya', 2),
(50, 'Digana', 'digana', 2),
(51, 'Galagedara', 'galagedara', 2),
(52, 'Gelioya', 'gelioya', 2),
(53, 'Kadugannawa', 'kadugannawa', 2),
(54, 'Madawala Bazaar', 'madawala-bazaar', 2),
(55, 'Nawalapitiya', 'nawalapitiya', 2),
(56, 'Pilimatalawa', 'pilimatalawa', 2),
(57, 'Wattegama', 'wattegama', 2),
(58, 'Galle', 'galle', 3),
(59, 'Ambalangoda', 'ambalangoda', 3),
(60, 'Elpitiya', 'elpitiya', 3),
(61, 'Hikkaduwa', 'hikkaduwa', 3),
(62, 'Baddegama', 'baddegama', 3),
(63, 'Ahangama', 'ahangama', 3),
(64, 'Batapola', 'batapola', 3),
(65, 'Bentota', 'bentota', 3),
(66, 'Karapitiya', 'karapitiya', 3),
(67, 'Akkarepattu', 'akkarepattu', 4),
(68, 'Kalmunai', 'kalmunai', 4),
(69, 'Ampara', 'ampara', 4),
(70, 'Sainthamaruthu', 'sainthamaruthu', 4),
(71, 'Anuradhapura', 'anuradhapura', 5),
(72, 'Kekirawa', 'kekirawa', 5),
(73, 'Tambuttegama', 'tambuttegama', 5),
(74, 'Medawachchiya', 'medawachchiya', 5),
(75, 'Eppawala', 'eppawala', 5),
(76, 'Galenbindunuwewa', 'galenbindunuwewa', 5),
(77, 'Galnewa', 'galnewa', 5),
(78, 'Habarana', 'habarana', 5),
(79, 'Mihintale', 'mihintale', 5),
(80, 'Nochchiyagama', 'nochchiyagama', 5),
(81, 'Talawa', 'talawa', 5),
(82, 'Badulla', 'badulla', 6),
(83, 'Bandarawela', 'bandarawela', 6),
(84, 'Welimada', 'welimada', 6),
(85, 'Mahiyanganaya', 'mahiyanganaya', 6),
(86, 'Hali Ela', 'hali-ela', 6),
(87, 'Diyatalawa', 'diyatalawa', 6),
(88, 'Ella', 'ella', 6),
(89, 'Haputale', 'haputale', 6),
(90, 'Passara', 'passara', 6),
(91, 'Batticaloa', 'batticaloa', 7),
(92, 'Gampaha', 'gampaha', 8),
(93, 'Negombo', 'negombo', 8),
(94, 'Kelaniya', 'kelaniya', 8),
(95, 'Kiribathgoda', 'kiribathgoda', 8),
(96, 'Kadawatha', 'kadawatha', 8),
(97, 'Delgoda', 'delgoda', 8),
(98, 'Divulapitiya', 'divulapitiya', 8),
(99, 'Ganemulla', 'ganemulla', 8),
(100, 'Ja-Ela', 'ja-ela', 8),
(101, 'Kandana', 'kandana', 8),
(102, 'Katunayake', 'katunayake', 8),
(103, 'Minuwangoda', 'minuwangoda', 8),
(104, 'Mirigama', 'mirigama', 8),
(105, 'Nittambuwa', 'nittambuwa', 8),
(106, 'Ragama', 'ragama', 8),
(107, 'Veyangoda', 'veyangoda', 8),
(108, 'Wattala', 'wattala', 8),
(109, 'Tangalla', 'tangalla', 9),
(110, 'Beliatta', 'beliatta', 9),
(111, 'Ambalantota', 'ambalantota', 9),
(112, 'Hambantota', 'hambantota', 9),
(113, 'Tissamaharama', 'tissamaharama', 9),
(114, 'Jaffna', 'jaffna', 10),
(115, 'Nallur', 'nallur', 10),
(116, 'Chavakachcheri', 'chavakachcheri', 10),
(117, 'Horana', 'horana', 11),
(118, 'Panadura', 'panadura', 11),
(119, 'Kalutara', 'kalutara', 11),
(120, 'Bandaragama', 'bandaragama', 11),
(121, 'Matugama', 'matugama', 11),
(122, 'Alutgama', 'alutgama', 11),
(123, 'Beruwala', 'beruwala', 11),
(124, 'Ingiriya', 'ingiriya', 11),
(125, 'Wadduwa', 'Wadduwa', 11),
(126, 'Kegalle', 'kegalle', 12),
(127, 'Mawanella', 'mawanella', 12),
(128, 'Warakapola', 'warakapola', 12),
(129, 'Rambukkana', 'rambukkana', 12),
(130, 'Ruwanwella', 'ruwanwella', 12),
(131, 'Dehiowita', 'dehiowita', 12),
(132, 'Deraniyagala', 'deraniyagala', 12),
(133, 'Galigamuwa', 'galigamuwa', 12),
(134, 'Kitulgala', 'kitulgala', 12),
(135, 'Yatiyantota', 'yatiyantota', 12),
(136, 'Kilinochchi', 'kilinochchi', 13),
(137, 'Kurunegala', 'kurunegala', 14),
(138, 'Kuliyapitiya', 'kuliyapitiya', 14),
(139, 'Pannala', 'pannala', 14),
(140, 'Narammala', 'narammala', 14),
(141, 'Mawathagama', 'mawathagama', 14),
(142, 'Alawwa', 'alawwa', 14),
(143, 'Bingiriya', 'bingiriya', 14),
(144, 'Galgamuwa', 'galgamuwa', 14),
(145, 'Giriulla', 'giriulla', 14),
(146, 'Hettipola', 'hettipola', 14),
(147, 'Ibbagamuwa', 'ibbagamuwa', 14),
(148, 'Nikaweratiya', 'nikaweratiya', 14),
(149, 'Polgahawela', 'polgahawela', 14),
(150, 'Wariyapola', 'wariyapola', 14),
(151, 'Mannar', 'mannar', 15),
(152, 'Matale', 'matale', 16),
(153, 'Dambulla', 'dambulla', 16),
(154, 'Galewela', 'galewela', 16),
(155, 'Sigiriya', 'sigiriya', 16),
(156, 'Ukuwela', 'ukuwela', 16),
(157, 'Palapathwela', 'palapathwela', 16),
(158, 'Rattota', 'rattota', 16),
(159, 'Yatawatta', 'yatawatta', 16),
(160, 'Matara', 'matara', 17),
(161, 'Akuressa', 'Akuressa', 17),
(162, 'Weligama', 'weligama', 17),
(163, 'Dikwella', 'dikwella', 17),
(164, 'Hakmana', 'hakmana', 17),
(165, 'Deniyaya', 'deniyaya', 17),
(166, 'Kamburugamuwa', 'kamburugamuwa', 17),
(167, 'Kamburupitiya', 'kamburupitiya', 17),
(168, 'Kekanadurra', 'kekanadurra', 17),
(169, 'Moneragala', 'moneragala', 18),
(170, 'Wellawaya', 'wellawaya', 18),
(171, 'Buttala', 'buttala', 18),
(172, 'Bibile', 'bibile', 18),
(173, 'Kataragama', 'kataragama', 18),
(174, 'Mullativu', 'mullativu', 19),
(175, 'Nuwara Eliya', 'nuwara-eliya', 20),
(176, 'Hatton', 'hatton', 20),
(177, 'Ginigathena', 'ginigathena', 20),
(178, 'Madulla', 'madulla', 20),
(179, 'Polonnaruwa', 'polonnaruwa', 21),
(180, 'Hingurakgoda', 'hingurakgoda', 21),
(181, 'Kaduruwela', 'kaduruwela', 21),
(182, 'Medirigiriya', 'medirigiriya', 21),
(183, 'Chilaw', 'chilaw', 22),
(184, 'Wennappuwa', 'wennappuwa', 22),
(185, 'Puttalam', 'puttalam', 22),
(186, 'Marawila', 'marawila', 22),
(187, 'Nattandiya', 'nattandiya', 22),
(188, 'Dankotuwa', 'dankotuwa', 22),
(189, 'Ratnapura', 'ratnapura', 23),
(190, 'Embilipitiya', 'embilipitiya', 23),
(191, 'Balangoda', 'balangoda', 23),
(192, 'Pelmadulla', 'pelmadulla', 23),
(193, 'Eheliyagoda', 'eheliyagoda', 23),
(194, 'Kuruwita', 'kuruwita', 23),
(195, 'Trincomalee', 'trincomalee', 24),
(196, 'Kinniya', 'kinniya', 24),
(197, 'Vavuniya', 'vavuniya', 25);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district_sub_area_new`
--

CREATE TABLE `tbl_district_sub_area_new` (
  `area_id` int(100) NOT NULL,
  `area_name` varchar(300) NOT NULL,
  `area_url` varchar(300) NOT NULL,
  `district_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_district_sub_area_new`
--

INSERT INTO `tbl_district_sub_area_new` (`area_id`, `area_name`, `area_url`, `district_id`) VALUES
(1, 'Colombo 01 - Fort', 'Colombo 01 - Fort', 26),
(2, 'Colombo 02 - Slave Island & Union Place', 'Colombo 02 - Slave Island & Union Place', 26),
(3, 'Colombo 03 - Kollupitiya', 'Colombo 03 - Kollupitiya', 26),
(4, 'Colombo 04 - Bambalapitiya', 'Colombo 04 - Bambalapitiya', 26),
(5, 'Colombo 05 - Havelock Town & Kirulapona', 'Colombo 05 - Havelock Town & Kirulapona', 26),
(6, 'Colombo 06 - Wellawatte & Pamankada', 'Colombo 06 - Wellawatte & Pamankada', 26),
(7, 'Colombo 07 - Cinnamon Gardens', 'Colombo 07 - Cinnamon Gardens', 26),
(8, 'Colombo 08 - Borella', 'Colombo 08 - Borella', 26),
(9, 'Colombo 09 - Dematagoda', 'Colombo 09 - Dematagoda', 26),
(10, 'Colombo 10 - Maradana', 'Colombo 10 - Maradana', 26),
(11, 'Colombo 11 - Pettah', 'Colombo 11 - Pettah', 26),
(12, 'Colombo 12 - Hultsdorf', 'Colombo 12 - Hultsdorf', 26),
(13, 'Colombo 13 - Kotahena & Kochchikade', 'Colombo 13 - Kotahena & Kochchikade', 26),
(14, 'Colombo 14 - Grandpass', 'Colombo 14 - Grandpass', 26),
(15, 'Colombo 15 - Modera & Mattakkuliya', 'Colombo 15 - Modera & Mattakkuliya', 26),
(16, 'Angoda', 'Angoda', 27),
(17, 'Angulana', 'Angulana', 27),
(18, 'Athurugriya', 'Athurugriya', 27),
(19, 'Avissawella', 'Avissawella', 27),
(20, 'Egoda Uyana', 'Egoda Uyana', 27),
(21, 'Godagama', 'Godagama', 27),
(22, 'Hanwella', 'Hanwella', 27),
(23, 'Himbutana', 'Himbutana', 27),
(24, 'Hokandara', 'Hokandara', 27),
(25, 'Kahathuduwa', 'Kahathuduwa', 27),
(26, 'Katubedda', 'Katubedda', 27),
(27, 'Kawdana', 'Kawdana', 27),
(28, 'Kesbewa', 'Kesbewa', 27),
(29, 'Kotikawtta', 'Kotikawtta', 27),
(30, 'Kottawa', 'Kottawa', 27),
(31, 'Luawa', 'Luawa', 27),
(32, 'Meegoda', 'Meegoda', 27),
(33, 'Moratuwa', 'Moratuwa', 27),
(34, 'Mount Lavinia', 'Mount Lavinia', 27),
(35, 'Mulleriyawa', 'Mulleriyawa', 27),
(36, 'Padukka', 'Padukka', 27),
(37, 'Pepiliyana', 'Pepiliyana', 27),
(38, 'Piliyandala', 'Piliyandala', 27),
(39, 'Ratmalana', 'Ratmalana', 27),
(40, 'Sapugaskande', 'Sapugaskande', 27),
(41, 'Sedawatte', 'Sedawatte', 27),
(42, 'Talangama', 'Talangama', 27),
(43, 'Udahamulla', 'Udahamulla', 27),
(44, 'Werahera', 'Werahera', 27),
(45, 'Attidiya', 'Attidiya', 28),
(46, 'Battaramulla', 'Battaramulla', 28),
(47, 'Beddagana', 'Beddagana', 28),
(48, 'Boralesgamuwa', 'Boralesgamuwa', 28),
(49, 'Dehiwala', 'Dehiwala', 28),
(50, 'Delkanda', 'Delkanda', 28),
(51, 'Embuldeniya', 'Embuldeniya', 28),
(52, 'Gothatuwa', 'Gothatuwa', 28),
(53, 'Homagama', 'Homagama', 28),
(54, 'Kalubowila', 'Kalubowila', 28),
(55, 'Kolonnawa', 'Kolonnawa', 28),
(56, 'Kotte', 'Kotte', 28),
(57, 'Maharagama', 'Maharagama', 28),
(58, 'Malabe', 'Malabe', 28),
(59, 'Nawala', 'Nawala', 28),
(60, 'Nainna', 'Nainna', 28),
(61, 'Nedimala', 'Nedimala', 28),
(62, 'Nugegoda', 'Nugegoda', 28),
(63, 'Obesekarapura', 'Obesekarapura', 28),
(64, 'Orugodawatta', 'Orugodawatta', 28),
(65, 'Pannipitiya', 'Pannipitiya', 28),
(66, 'Pelawatta', 'Pelawatta', 28),
(67, 'Rajagiriya', 'Rajagiriya', 28),
(68, 'Thalawathugoda', 'Thalawathugoda', 28),
(69, 'Wellampitiya', 'Wellampitiya', 28),
(70, 'Biyagama', 'Biyagama', 29),
(71, 'Delgoda', 'Delgoda', 29),
(72, 'Divulapitiya', 'Divulapitiya', 29),
(73, 'Ganemulla', 'Ganemulla', 29),
(74, 'Hendala', 'Hendala', 29),
(75, 'Ja-Ela', 'Ja-Ela', 29),
(76, 'Kadawatha', 'Kadawatha', 29),
(77, 'Kandana', 'Kandana', 29),
(78, 'katunayake', 'katunayake', 29),
(79, 'Kelaniya', 'Kelaniya', 29),
(80, 'Kiribathgoda', 'Kiribathgoda', 29),
(81, 'Kirindiwela', 'Kirindiwela', 29),
(82, 'Mabole', 'Mabole', 29),
(83, 'Mahabage', 'Mahabage', 29),
(84, 'Malwana', 'Malwana', 29),
(85, 'Mawaramandiya', 'Mawaramandiya', 29),
(86, 'Minuwangoda', 'Minuwangoda', 29),
(87, 'Mirigama', 'Mirigama', 29),
(88, 'Naiwella', 'Naiwella', 29),
(89, 'Negombo', 'Negombo', 29),
(90, 'Nittambuwa', 'Nittambuwa', 29),
(91, 'Peliyagoda', 'Peliyagoda', 29),
(92, 'Ragama', 'Ragama', 29),
(93, 'Ranala', 'Ranala', 29),
(94, 'Seeduwa', 'Seeduwa', 29),
(95, 'Siyambalape', 'Siyambalape', 29),
(96, 'Udugampola', 'Udugampola', 29),
(97, 'Vayangoda', 'Vayangoda', 29),
(98, 'Veyangoda', 'Veyangoda', 29),
(99, 'Wattala', 'Wattala', 29),
(100, 'Weliweriya', 'Weliweriya', 29),
(101, 'Yakkala', 'Yakkala', 29),
(102, 'Alubomulla', 'Alubomulla', 30),
(103, 'Aluthgama', 'Aluthgama', 30),
(104, 'Aubomulla', 'Aubomulla', 30),
(105, 'Bandaragama', 'Bandaragama', 30),
(106, 'Bellana', 'Bellana', 30),
(107, 'Beruwala', 'Beruwala', 30),
(108, 'Bolossagama', 'Bolossagama', 30),
(109, 'Bombuwala', 'Bombuwala', 30),
(110, 'Dharga Town', 'Dharga Town', 30),
(111, 'Dodangoda', 'Dodangoda', 30),
(112, 'Dombagoda', 'Dombagoda', 30),
(113, 'Gamagoda', 'Gamagoda', 30),
(114, 'Halkandawila', 'Halkandawila', 30),
(115, 'Horana', 'Horana', 30),
(116, 'Ingiriya', 'Ingiriya', 30),
(117, 'Kalutara', 'Kalutara', 30),
(118, 'Keselwatta', 'Keselwatta', 30),
(119, 'Koholana', 'Koholana', 30),
(120, 'Maggona', 'Maggona', 30),
(121, 'Mathugama', 'Mathugama', 30),
(122, 'Matugama', 'Matugama', 30),
(123, 'Millaniya', 'Millaniya', 30),
(124, 'Miwanapalana', 'Miwanapalana', 30),
(125, 'Morontuduwa', 'Morontuduwa', 30),
(126, 'Paiyagala', 'Paiyagala', 30),
(127, 'Panadura', 'Panadura', 30),
(128, 'Pokunuwita', 'Pokunuwita', 30),
(129, 'Remunagoda', 'Remunagoda', 30),
(130, 'Tebuwana', 'Tebuwana', 30),
(131, 'Wadduwa', 'Wadduwa', 30),
(132, 'Waskaduwa', 'Waskaduwa', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expired_product`
--

CREATE TABLE `tbl_expired_product` (
  `expired_product_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `expired_product_name` varchar(300) NOT NULL,
  `expired_product_owner_mail` varchar(300) NOT NULL,
  `expired_product_max_bidder_mail` varchar(300) NOT NULL,
  `expired_product_mail_sent_status` int(11) NOT NULL,
  `expired_product_mail_sent_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_expired_product`
--

INSERT INTO `tbl_expired_product` (`expired_product_id`, `product_id`, `expired_product_name`, `expired_product_owner_mail`, `expired_product_max_bidder_mail`, `expired_product_mail_sent_status`, `expired_product_mail_sent_date`) VALUES
(1, 1060, 'Tricycle ', 'karthiklenzy@gmail.com', 'karthiklenzy@gmail.com', 1, '2019-09-18 05:34:01'),
(2, 1063, 'kookaburra bat', 'karthiklewnzy@gmail.com', 'karthiwklenzy@gmail.com', 1, '2019-09-26 12:00:01'),
(3, 1059, 'Kingston Pen drive', 'karthiklewnzy@gmail.com', 'karthiwklenzy@gmail.com', 1, '2019-09-30 12:00:02'),
(4, 1061, 'Leather shoe', 'karthiklewnzy@gmail.com', 'karthiwklenzy@gmail.com', 1, '2019-09-30 12:00:02'),
(5, 1065, 'Fishing Creed', 'karthiklewnzy@gmail.com', 'karthiwklenzy@gmail.com', 1, '2019-09-30 12:00:02'),
(6, 1087, 'Vehicle Permits', 'karthiwklenzy@gmail.com', 'ravindusandeepa95@gmail.com', 1, '2019-09-30 12:00:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_launch`
--

CREATE TABLE `tbl_launch` (
  `launch_id` int(11) NOT NULL,
  `launch_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_launch`
--

INSERT INTO `tbl_launch` (`launch_id`, `launch_status`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `menu_id` int(11) NOT NULL,
  `menu_item` varchar(255) NOT NULL,
  `menu_item_link` varchar(1000) NOT NULL,
  `menu_item_order` int(11) NOT NULL,
  `menu_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`menu_id`, `menu_item`, `menu_item_link`, `menu_item_order`, `menu_type`) VALUES
(2, 'Home', '', 1, 1),
(9, 'Contact Us', 'contact-us', 5, 1),
(10, 'Business & Industry', 'shop?category=7', 3, 1),
(11, 'Fashion, Health & Beauty', 'shop?category=5', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_price_scheme`
--

CREATE TABLE `tbl_price_scheme` (
  `price_scheme_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `price_scheme_amount` int(11) NOT NULL,
  `cms_user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_price_scheme`
--

INSERT INTO `tbl_price_scheme` (`price_scheme_id`, `sub_category_id`, `price_scheme_amount`, `cms_user_id`) VALUES
(13, 1, 10, 1000),
(14, 2, 10, 1000),
(15, 3, 10, 1000),
(16, 4, 10, 1000),
(17, 5, 10, 1000),
(18, 6, 10, 1000),
(19, 7, 10, 1000),
(20, 8, 10, 1000),
(21, 9, 10, 1000),
(22, 10, 10, 1000),
(23, 11, 10, 1000),
(24, 12, 10, 1000),
(25, 13, 10, 1000),
(26, 14, 10, 1000),
(27, 15, 10, 1000),
(28, 16, 10, 1000),
(29, 17, 10, 1000),
(30, 18, 10, 1000),
(31, 19, 10, 1000),
(32, 20, 10, 1000),
(33, 21, 10, 1000),
(34, 22, 10, 1000),
(35, 23, 10, 1000),
(36, 24, 10, 1000),
(37, 25, 10, 1000),
(38, 26, 10, 1000),
(39, 27, 10, 1000),
(40, 28, 10, 1000),
(41, 29, 10, 1000),
(42, 30, 10, 1000),
(43, 31, 10, 1000),
(44, 32, 10, 1000),
(45, 33, 10, 1000),
(46, 34, 10, 1000),
(47, 35, 10, 1000),
(48, 36, 10, 1000),
(49, 37, 10, 1000),
(50, 38, 10, 1000),
(51, 39, 10, 1000),
(52, 40, 10, 1000),
(53, 41, 10, 1000),
(54, 42, 10, 1000),
(55, 43, 10, 1000),
(56, 44, 10, 1000),
(57, 45, 10, 1000),
(58, 46, 10, 1000),
(59, 47, 10, 1000),
(60, 48, 10, 1000),
(61, 49, 10, 1000),
(62, 50, 10, 1000),
(63, 51, 10, 1000),
(64, 52, 10, 1000),
(65, 53, 10, 1000),
(66, 54, 10, 1000),
(67, 55, 10, 1000),
(68, 56, 10, 1000),
(69, 57, 10, 1000),
(70, 58, 10, 1000),
(71, 59, 10, 1000),
(72, 60, 10, 1000),
(73, 61, 10, 1000),
(74, 62, 10, 1000),
(75, 63, 10, 1000),
(76, 64, 10, 1000),
(77, 65, 10, 1000),
(78, 66, 10, 1000),
(79, 67, 10, 1000),
(80, 68, 10, 1000),
(81, 69, 10, 1000),
(82, 70, 10, 1000),
(83, 71, 10, 1000),
(84, 72, 10, 1000),
(85, 73, 10, 1000),
(86, 74, 10, 1000),
(87, 75, 10, 1000),
(88, 76, 10, 1000),
(89, 77, 10, 1000),
(90, 78, 10, 1000),
(91, 79, 10, 1000),
(92, 80, 10, 1000),
(93, 81, 10, 1000),
(94, 89, 2, 1000),
(95, 91, 10, 1000),
(96, 92, 10, 1000),
(97, 93, 10, 1000),
(98, 94, 10, 1000),
(99, 95, 10, 1000),
(100, 96, 10, 1000),
(101, 97, 10, 1000),
(102, 98, 10, 1000),
(103, 98, 5, 1000),
(104, 99, 5, 1000),
(105, 100, 5, 1000),
(106, 101, 5, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` longtext NOT NULL,
  `product_main_img` varchar(255) NOT NULL,
  `product_images` longtext NOT NULL,
  `product_initial_price` int(11) NOT NULL,
  `product_current_price` int(11) NOT NULL,
  `product_approved_on` datetime DEFAULT NULL,
  `product_bid_ends_on` datetime DEFAULT NULL,
  `product_url` varchar(1000) NOT NULL,
  `product_views` int(11) DEFAULT 0,
  `product_status` int(11) DEFAULT 0,
  `product_featured` int(11) DEFAULT 0,
  `product_count` int(11) NOT NULL,
  `product_count_type` varchar(25) NOT NULL,
  `category_id` int(11) DEFAULT 0,
  `sub_category_id` int(11) DEFAULT 0,
  `published_user_id` int(11) DEFAULT 0,
  `purchased_user_id` int(11) DEFAULT 0,
  `cms_user_id` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_description`, `product_main_img`, `product_images`, `product_initial_price`, `product_current_price`, `product_approved_on`, `product_bid_ends_on`, `product_url`, `product_views`, `product_status`, `product_featured`, `product_count`, `product_count_type`, `category_id`, `sub_category_id`, `published_user_id`, `purchased_user_id`, `cms_user_id`) VALUES
(1055, 'Nokia 6521', '<p style=\"text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'uploads/products/product_1055/5d087caa1052f_nikia-6521.jpg', 'uploads/products/product_1055/5d087caa136e1_nikia-6521.jpg,uploads/products/product_1055/5d087caa139d5_nikia-6521.jpg,uploads/products/product_1055/5d087caa13bf4_nikia-6521.jpg ', 1200, 3800, '2019-06-18 08:05:15', '2019-11-20 00:00:00', '1055-nikia-6521', 322, 1, 1, 0, '', 1, 2, 1, 0, 1000),
(1056, 'Tshirt Slim Fit', '<p style=\"text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'uploads/products/product_1056/5d0880dc8e379_tshirt-slim-fit.jpg', 'uploads/products/product_1056/5d0880dc8e6c8_tshirt-slim-fit.jpg,uploads/products/product_1056/5d0880dc8e8a7_tshirt-slim-fit.jpg', 240, 240, '2019-06-18 08:39:06', '2019-10-16 08:39:06', '1056-tshirt-slim-fit', 105, 1, 0, 0, '', 5, 37, 1, 0, 1000),
(1058, 'Hair Dryer', '<p style=\"text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'uploads/products/product_1058/5d09cd784d96b_hair-dryer.jpg', 'uploads/products/product_1058/5d09cd785067a_hair-dryer.jpg,uploads/products/product_1058/5d09cd7850901_hair-dryer.jpg,uploads/products/product_1058/5d09cd7850af2_hair-dryer.jpg', 220, 220, '2019-06-19 07:52:19', '2019-10-18 07:52:19', '1058-hair-dryer', 40, 1, 0, 0, '', 1, 10, 1, 0, 1000),
(1059, 'Kingston Pen drive', '<p style=\"text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'uploads/products/product_1059/5d09cefa17e9e_kingston-pen-drive.jpg', 'uploads/products/product_1059/5d09cefa1820c_kingston-pen-drive.jpg,uploads/products/product_1059/5d09cefa1849d_kingston-pen-drive.jpg', 212, 459, '2019-06-19 07:58:36', '2019-09-30 00:00:00', '1059-kingston-pen-drive', 101, 1, 0, 0, '', 1, 5, 1, 0, 1000),
(1060, 'Tricycle ', '<p style=\"text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'uploads/products/product_1060/5d0a0d892a23e_tricycle-.jpg', 'uploads/products/product_1060/5d0a0d892d2cd_tricycle-.jpg,uploads/products/product_1060/5d0a0d892d56d_tricycle-.jpg', 1250, 2123, '2019-06-19 12:25:23', '2019-07-09 12:25:23', '1060-tricycle-', 99, 1, 1, 0, '', 2, 18, 1, 0, 1000),
(1061, 'Leather shoe', '<p style=\"text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'uploads/products/product_1061/5d0dc703add73_leather-shoe.jpg', 'uploads/products/product_1061/5d0dc703b6444_leather-shoe.jpg', 1200, 1440, '2019-06-22 08:38:13', '2019-09-30 08:38:13', '1061-leather-shoe', 37, 1, 0, 0, '', 5, 38, 1, 0, 1000),
(1062, 'Teak Furniture', '<p style=\"text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'uploads/products/product_1062/5d0dc793c5e14_teak-furniture.jpg', 'uploads/products/product_1062/5d0dc793c61cf_teak-furniture.jpg,uploads/products/product_1062/5d0dc793c65d4_teak-furniture.jpeg', 250, 538, '2019-06-22 08:38:06', '2019-10-17 00:00:00', '1062-teak-furniture', 105, 1, 0, 0, '', 4, 29, 1, 0, 1000),
(1063, 'kookaburra bat', '<p style=\"text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'uploads/products/product_1063/5d0dccbb7da80_kookaburra-bat.jpg', 'uploads/products/product_1063/5d0dccbb7ddd8_kookaburra-bat.jpg,uploads/products/product_1063/5d0dccbb7e036_kookaburra-bat.jpg', 1250, 1000, '2019-06-22 08:37:58', '2019-09-26 08:37:58', '1063-kookaburra-bat', 21, 1, 1, 0, '', 6, 46, 1, 0, 1000),
(1064, ' Water pump', '<p style=\"text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'uploads/products/product_1064/5d0dce6f166cb_-water-pump.jpg', 'uploads/products/product_1064/5d0dce6f16a2c_-water-pump.jpg,uploads/products/product_1064/5d0dce6f16c0c_-water-pump.jpg', 2400, 5520, '2019-06-22 08:45:14', '2019-11-20 08:45:14', '1064--water-pump', 63, 1, 0, 0, '', 11, 79, 1, 0, 1000),
(1065, 'Fishing Creed', '<p style=\"text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'uploads/products/product_1065/5d0dd0ef3897d_fishing-creed.jpg', 'uploads/products/product_1065/5d0dd0ef38d06_fishing-creed.jpg,uploads/products/product_1065/5d0dd0ef38f04_fishing-creed.jpg', 1400, 1680, '2019-06-22 08:55:55', '2019-09-30 08:55:55', '1065-fishing-creed', 85, 1, 0, 0, '', 6, 52, 1, 0, 1000),
(1066, 'LED TV Monitor', '<p style=\"text-align: justify;\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', 'uploads/products/product_1066/5d0dd1b84cead_led-tv-monitor.jpg', 'uploads/products/product_1066/5d0dd1b84d22d_led-tv-monitor.jpg,uploads/products/product_1066/5d0dd1b84d492_led-tv-monitor.jpg', 8500, 18700, '2019-06-22 08:59:48', '2019-10-19 08:59:48', '1066-led-tv-monitor', 304, 1, 0, 0, '', 1, 7, 1, 0, 1000),
(1068, 'Iron box', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'uploads/products/product_1068/5d411a2888eff_iron-box.png', 'uploads/products/product_1068/5d411a288d466_iron-box.png', 850, 425, '2019-07-31 06:33:57', '2019-10-19 06:33:57', '1068-iron-box', 93, 1, 0, 0, '', 1, 10, 3, 0, 1000),
(1069, 'Sand meterial', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'uploads/products/product_1069/5d4120cab536e_sand-meterial.jpg', 'uploads/products/product_1069/5d4120cab5733_sand-meterial.jpg,uploads/products/product_1069/5d4120cab5965_sand-meterial.jpg', 1900, 950, '2019-07-31 07:02:15', '2019-09-30 07:02:15', '1069-sand-meterial', 186, 1, 1, 0, '', 7, 56, 3, 0, 1000),
(1070, 'nokia reli', '', 'uploads/products/product_1070/5d4d3aa4642a2_nokia-reli.jpg', 'uploads/products/product_1070/5d4d3aa46bd16_nokia-reli.jpg', 250, 125, '2019-08-20 11:53:12', '2019-10-19 11:53:12', '1070-nokia-reli', 2, 2, 0, 0, '', 1, 2, 1, 0, 1000),
(1081, 'Tokyo Cement', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'uploads/products/product_1081/5d733ea57d16c_tokyo-cement.jpg', 'uploads/products/product_1081/5d733ea57d37f_tokyo-cement.jpg,uploads/products/product_1081/5d733ea57d3ed_tokyo-cement.jpg', 560, 280, '2019-09-07 08:46:57', '2019-11-13 08:46:57', '1081-tokyo-cement', 11, 1, 1, 0, '', 7, 56, 3, 0, 1000),
(1082, 'Sony Tv', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'uploads/products/product_1082/5d733ee15e35a_sony-tv.jpg', 'uploads/products/product_1082/5d733ee15e53c_sony-tv.jpg,uploads/products/product_1082/5d733ee15e5d6_sony-tv.jpg', 4800, 3360, '2019-09-07 08:46:48', '2019-10-17 08:46:48', '1082-sony-tv', 28, 1, 0, 0, '', 1, 6, 3, 0, 1000),
(1083, 'Blender', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'uploads/products/product_1083/5d7350e93e43e_blender.jpg', 'uploads/products/product_1083/5d7350e93e611_blender.jpg,uploads/products/product_1083/5d7350e93e6a0_blender.jpg', 2560, 1280, '2019-09-07 08:46:41', '2019-10-12 00:00:00', '1083-blender', 3, 1, 0, 0, '', 1, 10, 3, 0, 1000),
(1084, 'Gym Bench', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'uploads/products/product_1084/5d73516559a58_gym-bench.jpg', 'uploads/products/product_1084/5d73516559c25_gym-bench.jpg,uploads/products/product_1084/5d73516559cc0_gym-bench.jpg', 12400, 7440, '2019-09-07 08:46:32', '2019-11-23 00:00:00', '1084-gym-bench', 27, 1, 1, 0, '', 7, 58, 3, 0, 1000),
(1085, 'Watch Silver', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'uploads/products/product_1085/5d73518dc8105_watch-silver.jpg', 'uploads/products/product_1085/5d73518dcd969_watch-silver.jpg,uploads/products/product_1085/5d73518dcda30_watch-silver.jpg,uploads/products/product_1085/5d73518dcdaaf_watch-silver.jpg', 1400, 700, '2019-09-07 08:46:23', '2019-09-30 08:46:23', '1085-watch-silver', 7, 1, 1, 0, '', 5, 41, 3, 0, 1000),
(1086, 'Games DVD', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'uploads/products/product_1086/5d7351cb0c049_games-dvd.jpg', 'uploads/products/product_1086/5d7351cb0c207_games-dvd.jpg,uploads/products/product_1086/5d7351cb0c298_games-dvd.jpg', 850, 425, '2019-09-07 08:46:14', '2019-09-27 08:46:14', '1086-games-dvd', 4, 1, 1, 0, '', 12, 95, 3, 0, 1000),
(1087, 'Vehicle Permits', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'uploads/products/product_1087/5d73521b0224e_vehicle-permits.jpg', 'uploads/products/product_1087/5d73521b023d0_vehicle-permits.png,uploads/products/product_1087/5d73521b0245a_vehicle-permits.jpg', 32000, 35200, '2019-09-07 08:46:02', '2019-09-30 08:46:02', '1087-vehicle-permits', 14, 1, 0, 0, '', 2, 92, 3, 0, 1000),
(1088, 'A4 Box (2500 A4)', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', 'uploads/products/product_1088/5d7794e1a635f_a4-box-2500-a4.jpg', 'uploads/products/product_1088/5d7794e1a656c_a4-box-2500-a4.jpg,uploads/products/product_1088/5d7794e1a65d2_a4-box-2500-a4.jpg', 480, 240, '2019-09-11 06:18:55', '2019-09-30 12:56:55', '1088-a4-box-2500-a4', 8, 1, 0, 0, '', 7, 53, 3, 0, 1000),
(1090, 'Video Game', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ', 'uploads/products/product_1090/5d7796b8a14e6_video-game.jpg', 'uploads/products/product_1090/5d7796b8a16e5_video-game.jpg,uploads/products/product_1090/5d7796b8a177b_video-game.jpg', 850, 850, '2019-09-11 06:18:16', '2019-11-13 06:18:16', '1090-video-game', 36, 1, 0, 0, '', 1, 12, 3, 0, 1000),
(1092, 'vawrv', 'vaweb', 'uploads/products/product_1092/5d8350012009d_vawrv.jpg', 'uploads/products/product_1092/5d83500120357_vawrv.jpg', 1232, 616, NULL, NULL, '1092-vawrv', 0, 0, 0, 0, '', 7, 55, 3, 0, 0),
(1093, 'Mobile', 'Used for 2 months', 'uploads/products/product_1093/5d83590da4c54_mobile.jpg', 'uploads/products/product_1093/5d83590da4d87_mobile.jpg', 20000, 10000, NULL, NULL, '1093-mobile', 0, 0, 0, 0, '', 1, 4, 27, 0, 0),
(1094, 'ndfx', 'ndf', 'uploads/products/product_1094/5d849a89b2cd0_ndfx.jpg', 'uploads/products/product_1094/5d849a89b2e9c_ndfx.jpg', 11, 6, NULL, NULL, '1094-ndfx', 0, 0, 0, 0, '', 6, 47, 27, 0, 0),
(1095, 'dfh', 'fdghsd', 'uploads/products/product_1095/5d849c26708b2_dfh.jpg', 'uploads/products/product_1095/5d849c2670ab0_dfh.jpg', 11, 6, NULL, NULL, '1095-dfh', 0, 0, 0, 0, '', 5, 39, 27, 0, 0),
(1096, 'he', 'herhr', 'uploads/products/product_1096/5d9497b149949_he.png', 'uploads/products/product_1096/', 34, 17, NULL, NULL, '1096-he', 0, 0, 0, 0, '', 4, 32, 3, 0, 0),
(1097, 'kissyling', 'bq', 'uploads/products/product_1097/5d9497fe79530_kissyling.png', 'uploads/products/product_1097/', 243, 122, NULL, NULL, '1097-kissyling', 0, 0, 0, 0, '', 5, 41, 3, 0, 0),
(1098, 'testingmultiple image', 'vwsawr', 'uploads/products/product_1098/5d957f79e4ffc_testingmultiple-image.jpg', '', 23, 12, '2019-10-03 00:00:00', '2019-10-18 00:00:00', '1098-testingmultiple-image', 113, 1, 0, 12, '', 3, 25, 3, 0, 1000),
(1099, 'garden test', 'berberh', 'uploads/products/product_1099/5d959afde47e1_garden-test.jpg', '', 23, 12, NULL, NULL, '1099-garden-test', 0, 0, 0, 123, '', 4, 32, 3, 0, 0),
(1100, 'nest', 'net', 'uploads/products/product_1100/5d959c9f8725a_nest.jpg', '', 56, 28, NULL, NULL, '1100-nest', 0, 0, 0, 0, '', 3, 28, 3, 0, 0),
(1101, 'serhes', 'haerhaerh', 'uploads/products/product_1101/5d9624b4c458b_serhes.jpg', '', 234, 117, NULL, NULL, '1101-serhes', 0, 0, 0, 534, '', 8, 62, 3, 0, 0),
(1102, 'beeer', 'beeert', 'uploads/products/product_1102/5d96e7d2b99a8_beeer.jpg', '', 23, 12, NULL, NULL, '1102-beeer', 0, 0, 0, 234, 'Bulk', 6, 48, 3, 0, 0),
(1103, 'kik', 'kik', 'uploads/products/product_1103/5d96e80952055_kik.jpg', '', 0, 0, NULL, NULL, '1103-kik', 0, 0, 0, 0, 'Normal', 8, 63, 3, 0, 0),
(1104, 'coca cola', 'fq2egfq24', 'uploads/products/product_1104/5d96e8ac3c825_coca-cola.jpg', '', 0, 0, NULL, NULL, '1104-coca-cola', 0, 0, 0, 0, 'Normal', 6, 48, 3, 0, 0),
(1105, 'kisskikk', 'hethet', 'uploads/products/product_1105/5d96e94fa8175_kisskikk.jpg', '', 0, 0, NULL, NULL, '1105-kisskikk', 0, 0, 0, 0, 'Normal', 9, 70, 3, 0, 0),
(1106, 'kissy2', 'hnj', 'uploads/products/product_1106/5d96e9a2935ed_kissy2.jpg', '', -1, -1, '2019-10-09 00:00:00', '2019-10-25 00:00:00', '1106-kissy2', 45, 1, 0, 0, 'Freebid', 4, 31, 3, 0, 1000),
(1107, 'kissy3', 'edherh', 'uploads/products/product_1107/5d96e9e025f7c_kissy3.jpg', '', 1234, 617, NULL, NULL, '1107-kissy3', 0, 0, 0, 245, 'Bulk', 5, 38, 3, 0, 0),
(1108, 'kissy4', 'bnet4hrt', 'uploads/products/product_1108/5d96ea1744c0f_kissy4.jpg', '', 43634, 21817, NULL, NULL, '1108-kissy4', 0, 0, 0, 0, 'Normal', 8, 62, 3, 0, 0),
(1109, 'pricecheck', 'pricecheck', 'uploads/products/product_1109/5d9777d3a3021_pricecheck.jpg', 'uploads/products/product_1109/5d9777d3b01c7_pricecheck.jpg', 5000, 2500, NULL, NULL, '1109-pricecheck', 0, 0, 0, 0, '', 2, 17, 26, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_review`
--

CREATE TABLE `tbl_product_review` (
  `review_id` int(11) NOT NULL,
  `review_added_user_name` varchar(300) NOT NULL,
  `review_message` varchar(3000) NOT NULL,
  `review_product_id` int(11) NOT NULL,
  `review_status` int(11) NOT NULL,
  `review_date` date NOT NULL,
  `review_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product_review`
--

INSERT INTO `tbl_product_review` (`review_id`, `review_added_user_name`, `review_message`, `review_product_id`, `review_status`, `review_date`, `review_time`) VALUES
(1, 'Karthik', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 1069, 1, '2019-09-01', '11:08:00'),
(3, 'kissy', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 1069, 1, '2019-08-24', '08:22:00'),
(4, 'kissy', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 1069, 1, '2019-08-30', '03:24:00'),
(5, 'kissy', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 1069, 1, '2019-08-30', '04:09:00'),
(6, 'shifazameer', 'jrtj', 1060, 1, '2019-08-16', '02:10:02'),
(7, 'shifazameer', 'vsegesg', 1060, 1, '2019-08-17', '06:19:43'),
(8, 'shifazameer', 'aergarweghqw34', 1066, 1, '2019-09-06', '08:10:34'),
(9, 'shifazameer', 'Hii kissy i love uuu', 1065, 1, '2019-09-06', '13:03:41'),
(10, 'shifazameer', 'hiiii', 1064, 0, '2019-09-17', '13:14:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report_ad`
--

CREATE TABLE `tbl_report_ad` (
  `report_ad_id` int(11) NOT NULL,
  `report_ad_reson` int(11) NOT NULL,
  `report_ad_mail` varchar(300) NOT NULL,
  `report_ad_message` varchar(3000) NOT NULL,
  `report_product_id` int(5) NOT NULL,
  `report_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_report_ad`
--

INSERT INTO `tbl_report_ad` (`report_ad_id`, `report_ad_reson`, `report_ad_mail`, `report_ad_message`, `report_product_id`, `report_date`) VALUES
(1, 2, 'farshadnadheem@gmail.com', 'erhy', 1060, '0000-00-00 00:00:00'),
(2, 5, 'karthiklenzy@gmail.com', 'awergqwer', 1056, '0000-00-00 00:00:00'),
(3, 2, 'hshse@dty', 'haserth', 1056, '0000-00-00 00:00:00'),
(4, 0, 'sethhseth@dfh', 'dth', 1056, '0000-00-00 00:00:00'),
(5, 3, 'bSB@rghrt', 'dhe', 1056, '0000-00-00 00:00:00'),
(6, 2, 'gaweg@gh', 'awerg', 1056, '0000-00-00 00:00:00'),
(7, 3, 'ga@etyh', 'wartg', 1056, '0000-00-00 00:00:00'),
(8, 4, 'aweg@eqwrt', 'wqtg', 1056, '0000-00-00 00:00:00'),
(9, 6, 'ser@rth', 'sdhg', 1062, '0000-00-00 00:00:00'),
(10, 1, 'karthiklenzy@gmail.com', 'lorem ipsome', 1082, '0000-00-00 00:00:00'),
(11, 4, 'karthiklenzy@gmail.com', 'heeeeee', 1082, '2019-09-17 02:41:20'),
(12, 1, 'wg@SZRH', 'its fake one dudue heeeee', 1082, '2019-09-19 03:16:38'),
(13, 3, 'karthiklenzy@gmail.com', 'hxedt', 1058, '2019-09-30 02:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_report_ad_reason`
--

CREATE TABLE `tbl_report_ad_reason` (
  `report_reason _id` int(11) NOT NULL,
  `report_reason_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_report_ad_reason`
--

INSERT INTO `tbl_report_ad_reason` (`report_reason _id`, `report_reason_name`) VALUES
(1, 'Item sold/unavailable'),
(2, 'Fraud'),
(3, 'Duplicate'),
(4, 'Spam'),
(5, 'Wrong category'),
(6, 'Offensive'),
(7, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_img_path` varchar(255) NOT NULL,
  `slider_on_click_path` varchar(255) NOT NULL,
  `slider_caption` varchar(255) NOT NULL,
  `slider_order` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_img_path`, `slider_on_click_path`, `slider_caption`, `slider_order`) VALUES
(1, 'uploads/slider/slide1.jpg', 'categories?category=fashion-and-beauty', 'Fashion And Beauty', 2),
(2, 'uploads/slider/slide2_1.jpg', 'categories?category=home-and-office', 'Home And Office', 1),
(5, 'uploads/slider/59ead71fc2ffe_slider-three.jpg', 'categories?category=fashion-and-beauty', 'Slider Three', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spec_type`
--

CREATE TABLE `tbl_spec_type` (
  `spec_type_id` int(11) NOT NULL,
  `spec_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_spec_type`
--

INSERT INTO `tbl_spec_type` (`spec_type_id`, `spec_type_name`) VALUES
(1, 'Brand'),
(2, 'Condition'),
(3, 'Model'),
(4, 'Accessories'),
(5, 'Warranty'),
(6, 'Quality'),
(7, 'rural');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spec_value`
--

CREATE TABLE `tbl_spec_value` (
  `spec_value_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `spec_type_id` int(11) NOT NULL,
  `spec_required` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_spec_value`
--

INSERT INTO `tbl_spec_value` (`spec_value_id`, `sub_category_id`, `spec_type_id`, `spec_required`) VALUES
(9, 2, 2, 0),
(10, 2, 1, 1),
(11, 2, 3, 1),
(12, 1, 4, 1),
(13, 1, 5, 0),
(14, 8, 5, 1),
(15, 8, 1, 0),
(16, 8, 2, 1),
(17, 6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_category`
--

CREATE TABLE `tbl_sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `sub_category_name` varchar(255) NOT NULL,
  `sub_category_url` varchar(255) NOT NULL,
  `sub_category_status` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_category`
--

INSERT INTO `tbl_sub_category` (`sub_category_id`, `sub_category_name`, `sub_category_url`, `sub_category_status`, `category_id`) VALUES
(1, 'Mobile Phones', 'mobile-phones', 1, 0),
(2, 'Mobile Phones', 'mobile-phones', 1, 1),
(3, 'Mobile Phone Accessories', 'mobile-phone-accessories', 1, 1),
(4, 'Computers & Tablets', 'computers-tablets', 1, 1),
(5, 'Computer Accessories', 'computer-accessories', 1, 1),
(6, 'TVs', 'tvs', 1, 1),
(7, 'TV & Video Accessories', 'tv-video-accessories', 1, 1),
(8, 'Cameras & Camcorders', 'cameras-camcorders', 1, 1),
(9, 'Audio & MP3', 'audio-mp3', 1, 1),
(10, 'Electronic Home Appliances', 'electronic-home-appliances', 1, 1),
(11, 'Air Conditions & Electrical fittings', 'air-conditions-electrical-fittings', 1, 1),
(12, 'Video Games & Consoles', 'video-games-consoles', 1, 1),
(13, 'Other Electronics', 'other-electronics', 1, 0),
(14, 'Other Electronics', 'other-electronics', 1, 1),
(15, 'Cars', 'cars', 1, 2),
(16, 'Motorbikes & Scooters', 'motorbikes-scooters', 1, 2),
(17, 'Three Wheelers', 'three-wheelers', 1, 2),
(18, 'Push Cycles', 'push-cycles', 1, 2),
(19, 'Vans, Buses & Lorries', 'vans-buses-lorries', 1, 2),
(20, 'Heavy Machinery & Tractors', 'heavy-machinery-tractors', 1, 2),
(21, 'Auto Services', 'auto-services', 1, 2),
(22, 'Auto Parts & Accessories', 'auto-parts-accessories', 1, 2),
(23, 'Boats & Water Transport', 'boats-water-transport', 1, 2),
(24, 'Land', 'land', 1, 3),
(25, 'Houses', 'houses', 1, 3),
(26, 'Apartments', 'apartments', 1, 3),
(27, 'New Developments', 'new-developments', 1, 3),
(28, 'Commercial Property', 'commercial-property', 1, 3),
(29, 'Furniture', 'furniture', 1, 4),
(30, 'Bathroom & Sanitary ware', 'bathroom-sanitary-ware', 1, 4),
(31, 'Building Material & Tools', 'building-material-tools', 1, 4),
(32, 'Garden', 'garden', 1, 4),
(33, 'Home Decor', 'home-decor', 1, 4),
(34, 'Kitchen items', 'kitchen-items', 1, 4),
(35, 'Other Home Items', 'Other-home-items', 1, 4),
(36, 'Bags & Luggage', 'bags-luggage', 1, 5),
(37, 'Clothing', 'clothing', 1, 5),
(38, 'Shoes & Footwear', 'shoes-footwear', 1, 5),
(39, 'Jewellery', 'jewellery', 1, 5),
(40, 'Sunglasses & Opticians', 'sunglasses-opticians', 1, 5),
(41, 'Watches', 'watches', 1, 5),
(42, 'Other Fashion Accessories', 'other-fashion-accessories', 1, 5),
(43, 'Health & Beauty Products', 'health-beauty-products', 1, 5),
(44, 'Other Personal Items', 'other-personal-items', 1, 5),
(45, 'Musical Instruments', 'musical-instruments', 1, 6),
(46, 'Sports Equipment', 'sports-equipment', 1, 6),
(47, 'Sports Supplements', 'sports-supplements', 1, 6),
(48, 'Travel, Events & Tickets', 'travel-events-tickets', 1, 6),
(49, 'Art & Collectibles', 'art-collectibles', 1, 6),
(50, 'Music, Books & Movies', 'music-books-movies', 1, 6),
(51, 'Children\'s Items', 'children-items', 1, 6),
(52, 'Other Hobby, Sport & Kids Items', 'other-hobby-sport-kids-items', 1, 6),
(53, 'Office Equipment, Supplies & Stationery', 'office-equipment-supplies-stationery', 1, 7),
(54, 'Solar & Generators', 'solar-generators', 1, 7),
(55, 'Industry Tools & Machinery', 'industry-tools-machinery', 1, 7),
(56, 'Raw Materials & Wholesale Lots', 'raw-materials-wholesale-lots', 1, 7),
(57, 'Licences & Titles', 'licences-titles', 1, 7),
(58, 'Healthcare, Medical Equipment & Supplies', 'healthcare-medical-equipment-supplies', 1, 7),
(59, 'Other Business Services', 'other-business-services', 1, 7),
(60, 'Trade Services', 'trade-services', 1, 8),
(61, 'Domestic Services', 'domestic-services', 1, 8),
(62, 'Events & Entertainment', 'events-entertainment', 1, 8),
(63, 'Health & Wellbeing', 'health-wellbeing', 1, 8),
(64, 'Travel & Tourism', 'travel-tourism', 1, 8),
(65, 'Other Services', 'other-services', 1, 8),
(66, 'Higher Education', 'higher-education', 1, 9),
(67, 'Books', 'books', 1, 9),
(68, 'Tuition', 'tuition', 1, 9),
(69, 'Vocational Institutes', 'vocational-institutes', 1, 9),
(70, 'Comix', 'comix', 1, 9),
(71, 'Pets', 'pets', 1, 10),
(72, 'Pet Food', 'pet-food', 1, 10),
(73, 'Veterinary Services', 'veterinary-services', 1, 10),
(74, 'Farm Animals', 'farm-animals', 1, 10),
(75, 'Animal Accessories', 'animal-accessories', 1, 10),
(76, 'Other Animals', 'other-animals', 1, 10),
(77, 'Food', 'food', 1, 11),
(78, 'Crops, Seeds & Plants', 'crops-seeds-plants', 1, 11),
(79, 'Farming Tools & Machinery', 'farming-tools-machinery', 1, 11),
(80, 'Other Food & Agriculture', 'other-food-agriculture', 1, 11),
(89, '', '', 1, 0),
(90, '', '', 1, 0),
(91, 'Bulb & chandelier', 'bulb-and-chandelier', 0, 1),
(92, 'Vehicle permits', 'vehicle-permits', 0, 2),
(93, 'CD & DVD', 'cd-and-dvd', 0, 9),
(94, 'Past Papers', 'past-papers', 0, 9),
(95, 'Entertainment', 'entertainment', 0, 12),
(96, 'Education', 'education', 0, 12),
(97, 'Motivational', 'motivational', 0, 12),
(98, 'Advertising', 'advertising', 0, 14),
(99, 'Historical Memorabilia', 'historical-memorabilia', 0, 14),
(100, 'Wholesale Lots', 'wholesale-lots', 0, 14),
(101, 'Decorative Collectibles', 'decorative-collectibles', 0, 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_first_name` varchar(255) NOT NULL,
  `user_last_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(1000) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_address_line_one` varchar(1000) NOT NULL,
  `user_city` int(100) NOT NULL,
  `user_province` int(100) NOT NULL,
  `user_postal_code` varchar(255) NOT NULL,
  `user_nic_number` varchar(15) NOT NULL,
  `user_sms_verification` varchar(11) NOT NULL,
  `user_verification_key` varchar(255) NOT NULL,
  `user_created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_first_name`, `user_last_name`, `user_email`, `user_password`, `user_phone`, `user_address_line_one`, `user_city`, `user_province`, `user_postal_code`, `user_nic_number`, `user_sms_verification`, `user_verification_key`, `user_created_date`, `user_status`) VALUES
(1, 'farzannadheem', 'Farzan', 'Nadheem', 'karthiklewnzy@gmail.com', '202cb962ac59075b964b07152d234b70', '0757127271', '27/1 school avenue, Kalubowila, Dehiwala', 9, 1, '01025', '902990801V', '2015', 'd210d7357ad74d47d6cdc165efb390c9', '2019-09-24 06:44:03', 1),
(3, 'shifazameereeeeee', 'Shifaz', 'Ameer', 'karthiwklenzy@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808', '0773660669', '540, Test road, Wellawatte, Colombo -06666', 29, 27, '01025', '234941234v', '2015', '4f69a9779c547b51872fc2c8d4b9f02a', '2019-10-09 09:34:51', 1),
(4, 'tharindudileepa', 'Tharindu', 'Dileepa', 'karthiklenwzy@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0757127272', '78, Padukka Road, Padukka', 0, 0, '01025', '921440801V', '2015', 'e934fb2a14db2681e9ebd03768684a52', '2019-09-24 06:44:11', 0),
(5, 'farshadnadheem6', 'Farshad', 'Nadheem', 'farshad@esol.lk', '25d55ad283aa400af464c76d713c07ad', '0757127270', '56', 0, 0, '01025', '902990801V', '2015', 'f113cd830f393e8072f27ab71c5b4cf0', '2017-10-07 00:31:17', 0),
(6, 'himanthakarunarathne', 'Himantha', 'Karunarathne', 'himantha@esol.lk', '25d55ad283aa400af464c76d713c07ad', '0716135496', '307 High Level Road, Maharagama', 0, 0, '10250', '950180889V', '8800', '1ac1bdc40137b1b53cf0dcbe6d04b6c0', '2017-10-18 03:44:34', 0),
(8, 'imahanshi', 'Farshad', 'Nadheem', 'farshanadheem@gmail.com', '25d55ad283aa400af464c76d713c07ad', '0770637753', 'no 165 kurunegala', 0, 0, '10250', '902990801V', '2200', '32a93f86d6041412659b60ad454ab769', '2019-01-23 00:50:27', 0),
(9, 'karthi', 'karthik', 'lenzy', 'naf@gmail.com', '0b3bc9ce555f07d127c6da44337e364f', '6546562562', 'gqewrg', 11, 1, '60499', '654651646v', '5091', '259329', '2019-07-11 06:49:08', 0),
(20, 'admin', 'tesrteeeee', 'jdryj', 'wgxf@SZRH', '0b3bc9ce555f07d127c6da44337e364f', '5499845985', 'gqewrg', 26, 1, '60499', '234141234v', '3234', '725698852', '2019-08-02 11:51:45', 0),
(21, 'kissy roy', 'kiran', 'latho', 'naflin56s6@gmail.com', '0b3bc9ce555f07d127c6da44337e364f', '0757127270', 'gqewrg', 85, 29, '60499', '902990801V', '3096', '667052481', '2019-09-10 10:09:02', 0),
(22, 'qqq qqq', 'qqqqq', 'qqqq', 'naflin5g66@gmail.com', '0b3bc9ce555f07d127c6da44337e364f', '5499845985', 'gqewrg', 58, 28, '60499', '902990801V', '8097', '495376259', '2019-09-10 10:33:16', 0),
(23, 'qqqq qqqq', 'qqqqq', 'qqqqq', 'naflin7566@gmail.com', '0b3bc9ce555f07d127c6da44337e364f', '5499845985', 'gqewrg', 52, 28, '60499', '902990801V', '5358', '164473559', '2019-09-10 10:44:53', 0),
(24, 'www', 'wwww', 'wwww', 'naflin56886@gmail.com', '0b3bc9ce555f07d127c6da44337e364f', '5499845985', 'gqewrg', 48, 28, '60499', '902990801V', '8567', '656771544', '2019-09-19 10:10:40', 1),
(26, 'karthikkk', 'karthik', 'kissy', 'karthiklenzy@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808', '0723845521', 'gqewrg', 7, 26, '60499', '902990801V', '9810', '515721745', '2019-10-04 14:44:28', 1),
(27, 'shifazameer', 'Shifaz', 'Ameer', 'shifaz@esol.lk', '25d55ad283aa400af464c76d713c07ad', '0773660669', '179, High Level Road,Pannipitiya', 65, 28, '10230', '950180889v', '1756', '828096466', '2019-09-19 10:36:12', 1),
(28, 'testing', 'testing', 'testing', 'naflin566@gmail.com', '0b3bc9ce555f07d127c6da44337e364f', '5499845985', 'sdbfgrh', 29, 27, '60499', '902990801V', '3754', '511374335', '2019-09-19 10:11:46', 1),
(29, 'karthik', 'karthik', 'Nadheem', 'karthiklenzy@yahoo.com', '0b3bc9ce555f07d127c6da44337e364f', '5499845985', 'gqewrg', 61, 28, '60499', '902990801V', '2255', '595835568', '2019-09-19 10:22:24', 1),
(30, 'ravindu1996', 'ravindu', 'hewamaddumage', 'ravindusandeepa95@gmail.com', '25f32c33283f948be3b42d2e6a448d50', '0776966140', '67/2A temple road kalubowila dehiwala srilanka', 54, 28, 'CO	10350', '960193296v', '9861', '337087627', '2019-09-20 06:54:21', 1),
(31, 'Manula', 'Manula', 'Perera', 'manulapereraz@gmail.com', '97581737fb132584275fac6556bdb5ce', '0766571258', 'No. 95 P. B. Alwis Perera Mw, Katubadda, Moratuwa', 26, 27, '10400', '971660937V', '4575', '377537019', '2019-09-20 07:07:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(1000) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_number` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `nic` varchar(10) NOT NULL,
  `user_district` varchar(255) NOT NULL,
  `user_area` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_number`, `address`, `nic`, `user_district`, `user_area`) VALUES
(1, 'kill', 'naf@gmail.com', 'd2f2297d6e829cd3493aa7de4416a18f', 'dsfhgegwer', 'no 165 rtyje5eerwg', '931771043v', '1', '10'),
(2, 'rahul khanxaz', 'imahanshi@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808', '0770637753', 'no 165 kurunegala', '931771043v', '', ''),
(3, 'kiran', 'naflin456@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808', '0770637753', 'no 165 kurunegala', '931771043v', '', ''),
(5, 'karthik', 'naflin566@gmail.com', 'fbe82b93c071bedda31afded400cca52', '0770637753', 'no 165 kurunegala', '931771043v', '6', '82'),
(6, 'rahul khan', 'naflin5666@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808', '0770637753', 'no 165 kurunegala', '931771043v', '1', '7'),
(7, 'rger', 'nak@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808', '0854185198', 'wefwef', 'fqwef', '1', '37'),
(8, 'sdnh', 'sdhn@gmail.com', '25d55ad283aa400af464c76d713c07ad', '4565454545', 'rthrt', 'hwethyweth', '', ''),
(9, 'wery', 'wer@gmail.com', '25d55ad283aa400af464c76d713c07ad', '3533635543', 'gheth', 'wetw3twrte', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wish_list`
--

CREATE TABLE `tbl_wish_list` (
  `wish_list_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_url` varchar(1000) NOT NULL,
  `product_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wish_list`
--

INSERT INTO `tbl_wish_list` (`wish_list_id`, `user_id`, `product_url`, `product_id`) VALUES
(25, 6, '1065-fishing-creed', 1065),
(34, 7, '1058-hair-dryer', 1058),
(35, 6, '1057-table-fan', 1057),
(38, 2, '1059-kingston-pen-drive', 1059),
(40, 2, '1060-tricycle-', 1060),
(41, 3, '1058-hair-dryer', 1058),
(42, 3, '1065-fishing-creed', 1065),
(44, 3, '1068-iron-box', 1068),
(45, 3, '1063-kookaburra-bat', 1063),
(46, 3, '1059-kingston-pen-drive', 1059),
(47, 3, '1061-leather-shoe', 1061),
(50, 30, '1088-a4-box-2500-a4', 1088),
(51, 3, '1066-led-tv-monitor', 1066);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_additional_product_details`
--
ALTER TABLE `tbl_additional_product_details`
  ADD PRIMARY KEY (`additional_product_details_id`);

--
-- Indexes for table `tbl_assign_product`
--
ALTER TABLE `tbl_assign_product`
  ADD PRIMARY KEY (`assign_product_id`);

--
-- Indexes for table `tbl_bid`
--
ALTER TABLE `tbl_bid`
  ADD PRIMARY KEY (`bid_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_cms_users`
--
ALTER TABLE `tbl_cms_users`
  ADD PRIMARY KEY (`cms_user_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contact_user_id`);

--
-- Indexes for table `tbl_disapprove`
--
ALTER TABLE `tbl_disapprove`
  ADD PRIMARY KEY (`disapprove_id`);

--
-- Indexes for table `tbl_districts`
--
ALTER TABLE `tbl_districts`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_district_sub_area`
--
ALTER TABLE `tbl_district_sub_area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `tbl_district_sub_area_new`
--
ALTER TABLE `tbl_district_sub_area_new`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `tbl_expired_product`
--
ALTER TABLE `tbl_expired_product`
  ADD PRIMARY KEY (`expired_product_id`);

--
-- Indexes for table `tbl_launch`
--
ALTER TABLE `tbl_launch`
  ADD PRIMARY KEY (`launch_id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `tbl_price_scheme`
--
ALTER TABLE `tbl_price_scheme`
  ADD PRIMARY KEY (`price_scheme_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_product_review`
--
ALTER TABLE `tbl_product_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_report_ad`
--
ALTER TABLE `tbl_report_ad`
  ADD PRIMARY KEY (`report_ad_id`);

--
-- Indexes for table `tbl_report_ad_reason`
--
ALTER TABLE `tbl_report_ad_reason`
  ADD PRIMARY KEY (`report_reason _id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `tbl_spec_type`
--
ALTER TABLE `tbl_spec_type`
  ADD PRIMARY KEY (`spec_type_id`);

--
-- Indexes for table `tbl_spec_value`
--
ALTER TABLE `tbl_spec_value`
  ADD PRIMARY KEY (`spec_value_id`);

--
-- Indexes for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_wish_list`
--
ALTER TABLE `tbl_wish_list`
  ADD PRIMARY KEY (`wish_list_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_additional_product_details`
--
ALTER TABLE `tbl_additional_product_details`
  MODIFY `additional_product_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_assign_product`
--
ALTER TABLE `tbl_assign_product`
  MODIFY `assign_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_bid`
--
ALTER TABLE `tbl_bid`
  MODIFY `bid_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_cms_users`
--
ALTER TABLE `tbl_cms_users`
  MODIFY `cms_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contact_user_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_disapprove`
--
ALTER TABLE `tbl_disapprove`
  MODIFY `disapprove_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_districts`
--
ALTER TABLE `tbl_districts`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_district_sub_area`
--
ALTER TABLE `tbl_district_sub_area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=198;

--
-- AUTO_INCREMENT for table `tbl_district_sub_area_new`
--
ALTER TABLE `tbl_district_sub_area_new`
  MODIFY `area_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `tbl_expired_product`
--
ALTER TABLE `tbl_expired_product`
  MODIFY `expired_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_price_scheme`
--
ALTER TABLE `tbl_price_scheme`
  MODIFY `price_scheme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1110;

--
-- AUTO_INCREMENT for table `tbl_product_review`
--
ALTER TABLE `tbl_product_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_report_ad`
--
ALTER TABLE `tbl_report_ad`
  MODIFY `report_ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_report_ad_reason`
--
ALTER TABLE `tbl_report_ad_reason`
  MODIFY `report_reason _id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_spec_type`
--
ALTER TABLE `tbl_spec_type`
  MODIFY `spec_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_spec_value`
--
ALTER TABLE `tbl_spec_value`
  MODIFY `spec_value_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_wish_list`
--
ALTER TABLE `tbl_wish_list`
  MODIFY `wish_list_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
