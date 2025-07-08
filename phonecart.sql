-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 06:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonecart`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(10) NOT NULL,
  `image` varchar(255) NOT NULL,
  `caption` varchar(50) NOT NULL,
  `title` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `addes_on` date NOT NULL DEFAULT current_timestamp(),
  `index_no` int(2) NOT NULL,
  `convert` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `image`, `caption`, `title`, `status`, `addes_on`, `index_no`, `convert`) VALUES
(10, '1707122865.jpg', '', 'apple', 'active', '2024-02-05', 0, 'S'),
(11, '1707124024.jpg', 'One Plus 12 Series', 'One Plus', 'active', '2024-02-05', 1, 'S'),
(12, '1707124505.jpg', 'Vivo V Series', 'Vivo', 'active', '2024-02-05', 2, 'S'),
(13, '1707125386.jpg', 'Oppo Reno Series', 'Oppo', 'active', '2024-02-05', 4, 'S'),
(14, '1707125815.jpg', 'Realme 12 Series', 'Realme', 'active', '2024-02-05', 5, 'S');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

CREATE TABLE `billing` (
  `billing_id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(30) NOT NULL,
  `pincode` int(6) NOT NULL,
  `mobile` bigint(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `reg_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing`
--

INSERT INTO `billing` (`billing_id`, `name`, `address`, `city`, `pincode`, `mobile`, `email`, `reg_id`) VALUES
(22, 'vaibhav patel', '711/11, kanaiyalal ni chali, kabirchowk, Mansa, Ahmedabad, 380005', 'Ahmedabad', 380005, 9879797777, 'patelvaibhav13579@gmail.com', 6),
(24, 'karan prajapati', '2,ahmedabad, visat, sabarmati, ahmedabad, 380005', 'ahmedabad', 380005, 6532562365, 'karanprajapati9033@gmail.com', 12),
(25, 'mahek tharwani', '2,gh2, gh2, gandhinagar, gandhinagar, 388806', 'gandhinagar', 388806, 8956233652, 'mahek@gmail.com', 13),
(26, 'mahek tharwani', '2,gh2, gh2, gandhinagar, gandhinagar, 380005', 'gandhinagar', 380005, 6325523656, 'mahek@gmail.com', 13),
(27, 'mahek tharwani', '2,gh2, gh2, gandhinagar, gandhinagar, 380005', 'gandhinagar', 380005, 6532562365, 'mahek@gmail.com', 13),
(28, 'karan prajapati', '2,ahmedabad, visat, ahmedabad, ahmedabad, 380005', 'ahmedabad', 380005, 6532562365, 'karanprajapati9033@gmail.com', 12),
(29, 'karan prajapati', '2,MOTERA, visat, sabarmati, ahmedabad, 388806', 'ahmedabad', 388806, 6532562365, 'karanprajapati9033@gmail.com', 12),
(30, 'karan prajapati', '2,MOTERA, MOTERA, ahmedabad, ahmedabad, 380005', 'ahmedabad', 380005, 6532562365, 'karanprajapati9033@gmail.com', 12),
(31, 'omm khatri', '2,ahmedabad, gh2, patrol pump, gandhinagar, 380005', 'gandhinagar', 380005, 6325523656, 'om@gmail.com', 16),
(32, 'mahek tharwani', '2, visat, sabarmati, ahmedabad, 380005', 'ahmedabad', 380005, 6325523656, 'mahek@gmail.com', 13),
(33, 'mahek tharwani', '2,gh2, gh2, gandhinagar, gandhinagar, 380005', 'gandhinagar', 380005, 6325523656, 'mahek@gmail.com', 13),
(34, 'mahek tharwani', 'djhjdhakj, sdjskjdka, jdskjd, swsidhi, dhdadh', 'swsidhi', 0, 9898812345, 'mahek@gmail.com', 13),
(35, 'jlfdskj kfjlskj', 'lkfjlsk, lkfjldk, lkgjdl, fkslk, 999999', 'fkslk', 999999, 9898123450, 'mahek@gmail.com', 13),
(36, 'Parv Somani', 'D-502, Nishan Pride, New Ranip, Ahmedabad, 382470', 'Ahmedabad', 382470, 9601546877, 'mahek@gmail.com', 13),
(37, 'Parv Somani', 'D-502, Nishan Pride, New Ranip, Ahmedabad, 382470', 'Ahmedabad', 382470, 9601546877, 'parv@gmail.com', 17);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(10) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_image` varchar(255) NOT NULL,
  `prod_price` varchar(10) NOT NULL,
  `prod_qty` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `prod_id` int(10) NOT NULL,
  `reg_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `prod_name`, `prod_image`, `prod_price`, `prod_qty`, `status`, `prod_id`, `reg_id`) VALUES
(70, '', '', '', '1', 'pending', 0, 0),
(71, '', '', '', '1', 'pending', 0, 0),
(72, '', '', '', '1', 'pending', 0, 0),
(73, '', '', '', '1', 'pending', 0, 0),
(74, 'Gooey Chocolate Truffle Cake', '462874623_cake2_1.jpg', '699', '2', 'success', 2, 6),
(75, '', '', '', '1', 'pending', 0, 0),
(76, '', '', '', '1', 'pending', 0, 0),
(77, '', '', '', '1', 'pending', 0, 0),
(78, '', '', '', '1', 'pending', 0, 0),
(79, '', '', '', '1', 'pending', 0, 0),
(80, '', '', '', '1', 'pending', 0, 0),
(81, '', '', '', '3', 'pending', 0, 0),
(82, '', '', '', '3', 'pending', 0, 0),
(83, 'Exotic Layer Black Forest Cake', '934896215_cake8_1.jpg', '749', '3', 'success', 8, 11),
(84, 'Masala pasta', '753303960_pata1.jpg', '199', '2', 'success', 2, 12),
(85, 'Paneer-Tika', '767867437_punjabi.jpg', '499', '1', 'success', 4, 12),
(86, 'Paneer-Tika', '767867437_punjabi.jpg', '499', '1', 'success', 4, 12),
(87, '', '', '', '1', 'pending', 0, 0),
(88, '', '', '', '2', 'pending', 0, 0),
(89, '', '', '', '2', 'pending', 0, 0),
(90, '', '', '', '1', 'pending', 0, 0),
(91, '', '', '', '1', 'pending', 0, 0),
(92, '', '', '', '1', 'pending', 0, 0),
(93, 'Masala Dosa', '270716269_dosa2.jpg', '250', '1', 'success', 6, 12),
(94, 'Masala Dosa', '270716269_dosa2.jpg', '250', '1', 'success', 6, 12),
(95, 'Masala pasta', '690529966_pasta.jpg', '199', '1', 'success', 2, 13),
(96, 'Dry manchurian', '655719491_manchurian1.jpg', '100', '1', 'success', 3, 13),
(97, 'Margerita Pizza', '780905943_marg1.jpg', '299', '1', 'success', 1, 13),
(98, 'Paneer-Tika', '874022028_pan1.jpg', '499', '1', 'success', 4, 12),
(99, 'Noodles', '591042183_noodles3.jpg', '130', '1', 'success', 7, 12),
(100, 'Masala pasta', '690529966_pasta.jpg', '199', '1', 'success', 2, 16),
(101, '', '', '', '1', 'pending', 0, 0),
(102, 'Masala pasta', '690529966_pasta.jpg', '199', '1', 'success', 2, 13),
(103, 'Noodles', '591042183_noodles3.jpg', '130', '1', 'success', 7, 13),
(104, 'Paneer-Tika', '874022028_pan1.jpg', '499', '1', 'success', 4, 13),
(105, '', '', '', '1', 'pending', 0, 0),
(106, 'Margerita Pizza', '511098422_las1.jpg', '299', '1', 'success', 1, 13),
(107, '', '', '', '2', 'pending', 0, 0),
(108, '', '', '', '1', 'pending', 0, 0),
(109, '', '', '', '1', 'pending', 0, 0),
(110, 'Oppo Reno 11 5G', '340399502_reno11-1.jpg', '29999', '1', 'success', 1, 13),
(111, '', '', '', '1', 'pending', 0, 0),
(112, 'Vivo Y27 (Burgundy Black, 6GB RAM, 128GB Storage)', '670898997_y27-3.jpg', '11999', '1', 'success', 8, 17),
(113, 'Oppo Reno 11 5G', '340399502_reno11-1.jpg', '29999', '1', 'success', 1, 17);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_image` varchar(255) NOT NULL,
  `cat_desc` varchar(150) NOT NULL,
  `status` varchar(10) NOT NULL,
  `convert` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cat_image`, `cat_desc`, `status`, `convert`) VALUES
(1, 'Oppo', '1707126453.jpg', 'Oppo', 'active', 'n'),
(2, 'Vivo', '1707126558.jpg', 'Vivo', 'active', 'n'),
(3, 'Apple', '1707129231.jpg', 'Apple', 'active', 'n'),
(4, 'One Plus', '1707129522.jpg', 'One Plus', 'active', 'n'),
(5, 'Samsung', '1707127227.jpg', 'Samsung', 'active', 'n'),
(6, 'Realme', '1707126532.jpg', 'Realme', 'active', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `contact_id` int(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `message` varchar(255) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `email`, `message`, `rating`) VALUES
(5, 'devangjarewal9@gmail', 'nice!', 5),
(6, 'paramg922003@gmail.c', 'Very Nice Products', 5),
(7, 'karanprajapati9033@g', 'hello', 0),
(8, 'preet@gmail.com', 'great', 5),
(9, 'durvap@gmail.com', 'khbar nathi mane', 5);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=Aria DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `email`, `password`, `type`) VALUES
(1, 'karanprajapati9033@gmail.com', '62500da65e68cf545bd46bf9c8e57355', 'admin'),
(2, 'devangjarewal9@gmail.com', '2d18cf93f5c07a4e2c4e718e04404100', 'user'),
(18, 'parv@gmail.com', '05ff92e289be7752444366b2beed5b44', 'user'),
(16, 'durvap@gmail.com', 'a4afee30d26a72428230b682b6b38bcc', 'user'),
(15, 'bcgameplay92@gmail.com', '217f496509a9a4a35a151fbb10e96369', 'user'),
(14, 'mahek@gmail.com', '4180132c9c211e0c7e7c36b41473bb10', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(10) NOT NULL,
  `payment_type` varchar(10) NOT NULL,
  `total_item` int(10) NOT NULL,
  `total_amount` int(10) NOT NULL,
  `date_time` datetime NOT NULL,
  `reg_id` int(10) NOT NULL,
  `order_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `payment_type`, `total_item`, `total_amount`, `date_time`, `reg_id`, `order_status`) VALUES
(30, 'COD', 3, 1396, '2024-02-01 11:13:49', 12, 'Pending'),
(32, 'COD', 1, 100, '2024-02-01 15:47:59', 13, 'Deliverd'),
(33, 'COD', 1, 299, '2024-02-01 18:51:45', 13, 'Deliverd'),
(34, 'COD', 1, 499, '2024-02-02 10:37:48', 12, 'Deliverd'),
(35, 'COD', 1, 130, '2024-02-02 10:42:21', 12, 'out_delivery'),
(36, 'COD', 2, 500, '2024-02-02 10:56:07', 12, 'Pending'),
(37, 'COD', 1, 199, '2024-02-02 11:46:08', 16, 'Pending'),
(38, 'COD', 1, 199, '2024-02-02 14:39:17', 13, 'Deliverd'),
(39, 'COD', 1, 130, '2024-02-02 20:29:24', 13, 'Pending'),
(40, 'COD', 1, 130, '2024-02-02 20:29:29', 13, 'Pending'),
(41, 'Razorpay', 1, 499, '2024-02-03 11:25:16', 13, 'Pending'),
(42, 'Razorpay', 1, 299, '2024-02-05 13:37:10', 13, 'Pending'),
(43, 'Razorpay', 1, 29999, '2024-02-05 17:35:56', 13, 'Pending'),
(44, 'Razorpay', 2, 41998, '2024-02-05 23:11:48', 17, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `or_item_id` int(10) NOT NULL,
  `prod_id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `prod_price` int(10) NOT NULL,
  `prod_qty` int(10) NOT NULL,
  `or_item_status` varchar(20) NOT NULL,
  `cart_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`or_item_id`, `prod_id`, `order_id`, `prod_price`, `prod_qty`, `or_item_status`, `cart_id`) VALUES
(42, 2, 28, 699, 2, 'Complete', 74),
(43, 8, 29, 749, 3, 'Complete', 83),
(48, 3, 32, 100, 1, 'Complete', 96),
(49, 1, 33, 299, 1, 'Complete', 97),
(50, 4, 34, 499, 1, 'Complete', 98),
(51, 7, 35, 130, 1, 'Complete', 99),
(52, 6, 36, 250, 1, 'Pending', 93),
(53, 6, 36, 250, 1, 'Pending', 94),
(54, 2, 37, 199, 1, 'Pending', 100),
(55, 2, 38, 199, 1, 'Complete', 102),
(56, 7, 39, 130, 1, 'Pending', 103),
(57, 7, 40, 130, 1, 'Pending', 103),
(58, 4, 41, 499, 1, 'Pending', 104),
(59, 1, 42, 299, 1, 'Pending', 106),
(60, 1, 43, 29999, 1, 'Pending', 110),
(61, 8, 44, 11999, 1, 'Pending', 112),
(62, 1, 44, 29999, 1, 'Pending', 113);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(10) NOT NULL,
  `prod_name` varchar(50) NOT NULL,
  `prod_desc` varchar(255) NOT NULL,
  `prod_image` varchar(255) NOT NULL,
  `prod_price` int(255) NOT NULL,
  `prod_sp_price` int(255) NOT NULL,
  `prod_qty` int(5) NOT NULL,
  `prod_flavour` varchar(50) NOT NULL,
  `prod_weight` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `convert` char(1) NOT NULL,
  `subcat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_desc`, `prod_image`, `prod_price`, `prod_sp_price`, `prod_qty`, `prod_flavour`, `prod_weight`, `status`, `convert`, `subcat_id`) VALUES
(1, 'Oppo Reno 11 5G', 'Oppo Reno 11 5G (Wave Green ,128 GB) ( 8 GB RAM)', '340399502_reno11-1.jpg,118760839_reno-2.jpg,843940638_reno11-3.jpg', 38200, 29999, 10, 'Wave Green', '(8 GB RAM , 128 GB)', 'active', 'n', 1),
(3, 'iPhone 15 Black (256 GB)', 'Apple iPhone 15(256 GB)', '722188613_ip15-1.jpg,667332034_ip15-3.jpg,915362979_ip15-2.jpg', 79900, 71990, 10, 'Apple iPhone 15(256 GB)', 'Black (256 GB)', 'active', 'n', 6),
(6, 'OnePlus Nord 3 5G (Tempest Gray, 8GB RAM, 128GB St', 'OnePlus Nord 3 5G (Tempest Gray, 8GB RAM, 128GB Storage)', '742056736_nord-1.jpg,412404641_nord-2.jpg,604759656_nord_3.jpg', 33999, 28999, 10, 'OnePlus Nord 3 5G (Tempest Gray', '( 8GB RAM, 128GB Storage)', 'active', 'n', 5),
(7, 'iPhone 13 Blue (128 GB)', 'iPhone 13 Blue (128 GB)', '228691435_ip13-1.jpg,272765030_ip13-2.jpg,623209680_ip13-3.jpg', 59900, 52999, 10, 'iPhone 13 Blue (128 GB)', 'Blue (128 GB)', 'active', 'n', 7),
(8, 'Vivo Y27 (Burgundy Black, 6GB RAM, 128GB Storage)', 'Vivo Y27 (Burgundy Black, 6GB RAM, 128GB Storage)', '670898997_y27-3.jpg,620084079_y27-1.jpg,424151182_y27-2.jpg', 18999, 11999, 10, 'Vivo Y27 (Burgundy Black, 6GB RAM, 128GB Storage)', '(6GB RAM ,256 Storage)', 'active', 'n', 8),
(9, 'Oppo A78', 'Oppo A78(Mist Black, 8GB RAM, 128GB Storage)', '880522935_a78-1.jpg,200714557_a78-2.jpg,616995705_a78-3.jpg', 22999, 15499, 10, 'Mist Black', '(8 GB RAM,128 Storage)', 'active', 'n', 2),
(10, 'Samsung Galaxy Z Fold5 5G (Cream, 12GB RAM, 256GB', 'Samsung Galaxy Z Fold5 5G (Cream, 12GB RAM, 256GB Storage)', '520052189_fold-1.jpg,851458131_fold-2.jpg,400026220_fold-3.jpg', 159999, 154999, 10, 'Samsung Galaxy Z Fold5 5G (Cream)', '(12GB RAM, 256GB Storage)', 'active', 'n', 9),
(11, 'Samsung Galaxy S24 Ultra 5G (Titanium Black, 12GB,', 'Samsung Galaxy S24 Ultra 5G (Titanium Black, 12GB, 512GB Storage)', '881517750_s24-1.jpg,152631009_s24-2.jpg,922302707_s24-3.jpg', 144999, 139999, 10, 'Samsung Galaxy S24 Ultra 5G (Titanium Black)', '( 12GB, 512GB Storage)', 'Active', 'n', 10),
(20, 'Vivo V29 5G (‎Himalayan Blue, 256 GB) (12 GB RAM)', 'Vivo V29 5G (‎Himalayan Blue, 256 GB) (12 GB RAM)', '443344714_v29-1.jpg,381168424_v29-2.jpg,860551170_v29-3.jpg', 41999, 36499, 10, 'Vivo V29 5G (‎Himalayan Blue, 256 GB) (12 GB RAM)', '(12GB RAM, 256 Storage)', 'active', 'n', 12),
(21, 'Realme 12 Pro+ 5G (Submarine Blue, 12GB RAM, 256GB', 'Realme 12 Pro+ 5G (Submarine Blue, 12GB RAM, 256GB Storage)', '253188340_12pro-1.jpg,185072652_12pro-2.jpg,139103151_12pro-3.jpg', 37999, 33920, 10, 'realme 12 Pro+ 5G (Submarine Blue)', '(12GB RAM, 256GB Storage)', 'active', 'n', 13),
(22, 'OnePlus 12 (Flowy Emerald, 12 GB RAM, 256GB)', 'OnePlus 12 (Flowy Emerald, 12 GB RAM, 256GB)', '868713705_12-2.jpg,459901264_12-1.jpg,145428725_12-3.jpg', 66000, 64999, 10, 'OnePlus 12 (Flowy Emerald)', '(12 GB RAM, 256GB)', 'active', 'n', 14),
(23, 'Realme narzo N55 (Prime Black, 6GB+128GB)', 'Realme narzo N55 (Prime Black, 6GB+128GB)', '855295813_n55-1.jpg,968156552_n55-2.jpg,791170457_n55-3.jpg', 14999, 8999, 10, 'Prime Black', '(6GB+128GB)', 'active', 'n', 15);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `reg_id` int(10) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `city` varchar(30) NOT NULL,
  `state` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=Aria DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_id`, `first_name`, `last_name`, `email`, `gender`, `phone_no`, `city`, `state`, `country`, `password`, `profile_pic`, `status`) VALUES
(5, 'Devang', 'Jarewal', 'devangjarewal9@gmail.com', 'Male', 8469395671, 'Ahmedabad', 'Gujarat', 'India', '2d18cf93f5c07a4e2c4e718e04404100', 'bakery_41_IMG_20190405_071010_267.jpg', 'Registerd'),
(17, 'Parv', 'Somani', 'parv@gmail.com', 'Male', 9601546877, 'Gandhinagar', 'Gujarat', 'India', '05ff92e289be7752444366b2beed5b44', 'bakery_38_file.jpg', 'Registerd'),
(15, 'Durva', 'Patel', 'durvap@gmail.com', 'Female', 6352524145, 'ahmedabad', 'gujarat', 'india', 'a4afee30d26a72428230b682b6b38bcc', 'bakery_34_potato1.jpg', 'Registerd'),
(14, 'Dhariya', 'Soni', 'bcgameplay92@gmail.com', 'Male', 6352524145, 'gandhinagar', 'gujarat', 'india', '217f496509a9a4a35a151fbb10e96369', 'bakery_90_potato1.jpg', 'Registerd'),
(13, 'Mahek', 'Tharwani', 'mahek@gmail.com', 'Female', 9856233652, 'gandhinagar', 'gujarat', 'india', '4180132c9c211e0c7e7c36b41473bb10', 'bakery_72_foodbites.jpg', 'Registerd');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `subcat_id` int(10) NOT NULL,
  `subcat_name` varchar(50) NOT NULL,
  `subcat_desc` varchar(255) NOT NULL,
  `cat_id` int(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`subcat_id`, `subcat_name`, `subcat_desc`, `cat_id`, `status`) VALUES
(1, 'Reno', 'Oppo Reno Series', 1, 'active'),
(2, 'A Series', 'Oppo A Series', 1, 'active'),
(5, 'One Plus Nord CE', 'One Plus Nord CE Series', 4, 'active'),
(6, 'iPhone 15', 'iPhone 15', 3, 'active'),
(7, 'iPhone 13', 'iPhone 13', 3, 'active'),
(8, 'Vivo Y Series', 'Vivo Y Series', 2, 'active'),
(9, 'Samsung Galaxy  Z Fold', 'Samsung Galaxy  Z Fold', 5, 'active'),
(10, 'Samsung Galaxy S Series', 'Samsung Galaxy S Series', 5, 'active'),
(11, 'One Plus Nord', 'One Plus Nord Series', 4, 'active'),
(12, 'Vivo V  Series', 'Vivo V  Series', 2, 'active'),
(13, 'Realme 12 pro + 5G', 'Realme 12 pro + 5G', 6, 'active'),
(14, 'OnePlus R Series', 'OnePlus R Series', 4, 'active'),
(15, 'Realme narzo 55', 'Realme narzo 55', 6, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`billing_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`or_item_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`),
  ADD KEY `subcat` (`subcat_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`subcat_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `billing`
--
ALTER TABLE `billing`
  MODIFY `billing_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `or_item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `reg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `subcat` FOREIGN KEY (`subcat_id`) REFERENCES `subcategory` (`subcat_id`);

--
-- Constraints for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD CONSTRAINT `cat_id` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
