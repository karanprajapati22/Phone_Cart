-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2024 at 12:30 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(37, 'Parv Somani', 'D-502, Nishan Pride, New Ranip, Ahmedabad, 382470', 'Ahmedabad', 382470, 9601546877, 'parv@gmail.com', 17),
(38, 'hani joshi', '2,gh-2, 417/2 sec6A, gandhinagar, surat, 378000', 'surat', 378000, 9824239634, 'karanprajapati9033@gmail.com', 18),
(39, 'Kush Vaishnav', '2,gh-2, 417/2 sec6A, gandhinagar, surat, 378000', 'surat', 378000, 9824239634, 'vaiskush@gmail.com', 19),
(40, 'Durva Patel', '2,gh-2, 417/2 sec6A, gandhinagar, surat, 378000', 'surat', 378000, 9824239634, 'karanprajpati9033@gmail.com', 20),
(41, 'Mahek Tharwani', '312/2 sec 2, Gh-6, Petrol Pump, Gandhinagar, 382002', 'Gandhinagar', 382002, 9152365236, 'mahektharwani931@gmail.com', 21),
(42, 'Mahek Tharwani', '417/2, gh2, patrol pump, Gandhinagar, 382002', 'Gandhinagar', 382002, 9313523993, 'mahektharwani993@gmail.com', 22),
(43, 'Kush Vaishnav', '2,gh-2, 417/2 sec6A, 2, surat, 378000', 'surat', 378000, 9824239634, 'karanprajapati9624@gmail.com', 23),
(44, 'Parv Somani', '2,gh-2, 417/2 sec6A, 2, surat, 378000', 'surat', 378000, 9824239634, 'parvsomani05@gmail.com', 24),
(45, 'Mahek Tharwani', '417/2, Gh-6, patrol pump, Gandhinagar, 382002', 'Gandhinagar', 382002, 9313523883, 'mahektharwani993@gmail.com', 25),
(46, 'Mahek Tharwani', '417/2, Gh-6, patrol pump, Gandhinagar, 382002', 'Gandhinagar', 382002, 9158895623, 'mahektharwani993@gmail.com', 26);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(113, 'Oppo Reno 11 5G', '340399502_reno11-1.jpg', '29999', '1', 'success', 1, 17),
(114, 'iPhone 15 Black (256 GB)', '722188613_ip15-1.jpg', '71990', '1', 'success', 3, 18),
(115, 'Samsung Galaxy S24 Ultra 5G (Titanium Black, 12GB,', '881517750_s24-1.jpg', '139999', '1', 'success', 11, 19),
(116, 'Realme 12 Pro+ 5G (Submarine Blue, 12GB RAM, 256GB', '253188340_12pro-1.jpg', '33920', '1', 'success', 21, 19),
(117, 'Samsung Galaxy S24 Ultra 5G (Titanium Black, 12GB,', '881517750_s24-1.jpg', '139999', '1', 'success', 11, 20),
(118, 'Samsung Galaxy S24 Ultra 5G (Titanium Black, 12GB,', '881517750_s24-1.jpg', '139999', '1', 'success', 11, 21),
(119, 'Samsung Galaxy Z Fold5 5G (Cream, 12GB RAM, 256GB', '520052189_fold-1.jpg', '154999', '1', 'success', 10, 22),
(120, 'iPhone 15 Black (256 GB)', '722188613_ip15-1.jpg', '71990', '1', 'success', 3, 23),
(121, 'iPhone 15 Black (256 GB)', '722188613_ip15-1.jpg', '71990', '1', 'success', 3, 24),
(122, 'vivo v29 pro', '615632454_v29-1-fotor-bg-remover-20240320215025.png', '31500', '10', 'success', 27, 25),
(123, 'iphone 15', '750531178_i15-1-fotor-bg-remover-20240320213949.png', '120000', '1', 'success', 29, 26);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`contact_id`, `email`, `message`, `rating`) VALUES
(5, 'devangjarewal9@gmail', 'nice!', 5),
(6, 'paramg922003@gmail.c', 'Very Nice Products', 5),
(7, 'karanprajapati9033@g', 'hello', 0),
(8, 'preet@gmail.com', 'great', 5),
(10, '', '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=Aria DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `email`, `password`, `type`) VALUES
(1, 'phonecart2024@gmail.com', '62500da65e68cf545bd46bf9c8e57355', 'admin'),
(19, 'karanprajapati9033@gmail.com', 'c60ad223f4e47422e1299b24ceaeb0bb', 'user'),
(20, 'vaiskush@gmail.com', 'd96adc41993f5c1cb48cf71c7f13f452', 'user'),
(21, 'karanprajpati9033@gmail.com', '54f8856fca44d1427a835df61a2d551c', 'user'),
(22, 'mahektharwani931@gmail.com', '675c6d93959d3c8663041954d3e9c85b', 'user'),
(23, 'mahektharwani993@gmail.com', '42f9aceec46a4e46c6565812ae49665c', 'user'),
(24, 'karanprajapati9624@gmail.com', '038e74c873365275da5999d0eeceed6c', 'user'),
(25, 'parvsomani05@gmail.com', '7ab4d728ebd4626536879b5b033cb3c0', 'user'),
(26, 'mahektharwani993@gmail.com', '42f9aceec46a4e46c6565812ae49665c', 'user'),
(27, 'mahektharwani993@gmail.com', '038e74c873365275da5999d0eeceed6c', 'user');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `payment_type`, `total_item`, `total_amount`, `date_time`, `reg_id`, `order_status`) VALUES
(45, 'Razorpay', 1, 71990, '2024-02-06 11:50:31', 18, 'out_delivery'),
(46, 'Razorpay', 2, 173919, '2024-02-06 12:23:38', 19, 'Deliverd'),
(47, 'Razorpay', 1, 139999, '2024-02-06 12:39:56', 20, 'Deliverd'),
(48, 'Razorpay', 1, 139999, '2024-02-16 11:54:14', 21, 'Deliverd'),
(49, 'COD', 1, 154999, '2024-02-18 10:52:57', 22, 'Deliverd'),
(50, 'Razorpay', 1, 71990, '2024-02-19 09:33:10', 23, 'Pending'),
(51, 'Razorpay', 1, 71990, '2024-02-19 09:40:07', 24, 'Pending'),
(52, 'Razorpay', 1, 315000, '2024-04-05 14:16:10', 25, 'Deliverd'),
(53, 'Razorpay', 1, 120000, '2024-04-06 09:32:27', 26, 'Deliverd');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`or_item_id`, `prod_id`, `order_id`, `prod_price`, `prod_qty`, `or_item_status`, `cart_id`) VALUES
(63, 3, 45, 71990, 1, 'Complete', 114),
(64, 11, 46, 139999, 1, 'Complete', 115),
(65, 21, 46, 33920, 1, 'Complete', 116),
(66, 11, 47, 139999, 1, 'Complete', 117),
(67, 11, 48, 139999, 1, 'Complete', 118),
(68, 10, 49, 154999, 1, 'Complete', 119),
(69, 3, 50, 71990, 1, 'Pending', 120),
(70, 3, 51, 71990, 1, 'Pending', 121),
(71, 27, 52, 31500, 10, 'Complete', 122),
(72, 29, 53, 120000, 1, 'Complete', 123);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_name`, `prod_desc`, `prod_image`, `prod_price`, `prod_sp_price`, `prod_qty`, `prod_flavour`, `prod_weight`, `status`, `convert`, `subcat_id`) VALUES
(26, 'iphon13', 'Apple iPhone 13 (128GB)', '232258074_13-1-fotor-bg-remover-2024032021274.png,750357424_13-2-fotor-bg-remover-20240320212731.png,637354111_13-3-fotor-bg-remover-20240320212751.png', 52000, 52000, 10, 'Pink', '150gm', 'active', 'n', 7),
(27, 'vivo v29 pro', 'Vivo V29 5G (Black, 8GB RAM, 64GB Storage)', '615632454_v29-1-fotor-bg-remover-20240320215025.png,118902252_v29-2.jpg,123652918_v29-3-fotor-bg-remover-20240320215029.png', 31500, 31500, 10, 'Maroon', '150gm', 'active', 'n', 12),
(28, 'One Plus Nord CE3 5g', 'Oneplus Nord CE 3 5G (Gray Shimmer, 8GB RAM, 128GB Storage)', '401711784_ce3-1-fotor-bg-remover-20240320213653.png,228059392_ce3-2.jpg,764217706_ce3-3-fotor-bg-remover-20240320213025.png', 24999, 24999, 10, 'Gray', '150gm', 'active', 'n', 5),
(29, 'iphone 15', 'i phone 15  (256gb,Gray)', '750531178_i15-1-fotor-bg-remover-20240320213949.png,230881550_ip15-2-fotor-bg-remover-2024032021404.png,561380487_ip15-3-fotor-bg-remover-20240320214024.png', 120000, 120000, 10, 'Gray', '150gm', 'active', 'n', 16),
(30, 'vivo V30 pro', 'Vivo V30 pro 5G  (64GB ,blue)', '737792063_v30pro-1-fotor-bg-remover-20240320215036.png,234850312_v30pro-2.jpg,951928248_v30pro-3-fotor-bg-remover-20240320215043.png', 20000, 20000, 10, 'blue', '150gm', 'active', 'n', 12),
(31, 'Samsung s23', 'Samsung s23 (Rose gold,256gb,12gb)', '216742959_s23-1-fotor-bg-remover-20240320214936.png,722647504_s23-2.jpg,345438146_s23-3-fotor-bg-remover-20240320214941.png', 88000, 88000, 10, 'white', '150gm', 'active', 'n', 17),
(32, 'Samsung s24 ultra', 'Samsung s24 ultra (Silver , 256gb , 12gb)', '850738513_s24-1-fotor-bg-remover-20240320214948.png,861652483_s24-2.jpg,348414397_s24-3-fotor-bg-remover-20240320214955.png', 130000, 130000, 10, 'silver', '150gm', 'active', 'n', 18),
(33, 'Realme 12 pro', 'Realme 12 Pro (Blue, 128gb , 8gb)', '554209938_12pro-1-fotor-bg-remover-20240320214739.png,977355313_12pro-2.jpg,815273325_12pro-3-fotor-bg-remover-20240320214745.png', 22000, 22000, 10, 'Blue', '150gm', 'active', 'n', 13),
(34, 'iphone 15 Pro', 'iphone 15 pro (black , 256gb)', '692343934_pro1-fotor-bg-remover-20240320214044.png,883396674_pro2-fotor-bg-remover-2024032021414.png,933541754_pro3-fotor-bg-remover-20240320214123.png', 100000, 100000, 10, 'silver', '150gm', 'active', 'n', 16),
(35, 'Realme narzo 55', 'Realme narzo55 (Gold , 128gb , 8gb)', '457898360_c53-1-fotor-bg-remover-20240320214752.png,230627075_c53-2.jpg,139361394_c53-3-fotor-bg-remover-20240320214759.png', 23000, 23000, 10, 'gold', '150gm', 'active', 'n', 15),
(36, 'vivo Y51', 'vivo Y51 (Black , 128gb , 8 gb)', '404099798_t21-fotor-bg-remover-2024032021508.png,713033495_t22.jpg,988098935_t23-fotor-bg-remover-20240320215015.png', 31000, 31000, 10, 'Black', '150gm', 'active', 'n', 8),
(39, 'One Plus Nord CE3 lite', 'Oneplus Nord CE lite(Grey Shimmer, 8GB RAM, 128GB Storage)', '748036373_nord3-1-fotor-bg-remover-20240320213353.png,376134476_nord3-2.jpg,194951052_nord3-3-fotor-bg-remover-20240320213524.png', 60000, 60000, 10, 'silver', '150gm', 'active', 'n', 5);

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
) ENGINE=Aria DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_id`, `first_name`, `last_name`, `email`, `gender`, `phone_no`, `city`, `state`, `country`, `password`, `profile_pic`, `status`) VALUES
(18, 'Hani', 'Joshi', 'karanprajapati9033@gmail.com', 'Female', 9313523993, 'Gandhinagr', 'Gujarat', 'India', 'c60ad223f4e47422e1299b24ceaeb0bb', 'bakery_47_apple_logo.png', 'Registerd'),
(19, 'Kush', 'Vaishnav', 'vaiskush@gmail.com', 'Male', 9824239634, 'surat', 'Gujarat', 'India', 'd96adc41993f5c1cb48cf71c7f13f452', 'bakery_39_apple_logo.png', 'Registerd'),
(20, 'Durva', 'Patel', 'karanprajpati9033@gmail.com', 'Female', 9824239634, 'surat', 'Gujarat', 'India', '54f8856fca44d1427a835df61a2d551c', 'bakery_44_apple_logo.png', 'Registerd'),
(26, 'Karan', 'Prajapati', 'mahektharwani993@gmail.com', 'Male', 9313523993, 'Gandhinagar', 'Gujarat', 'India', '038e74c873365275da5999d0eeceed6c', 'bakery_37_12-1-fotor-bg-remover-20240320212822.png', 'Registerd'),
(23, 'karan', 'Prajapati', 'karanprajapati9624@gmail.com', 'Male', 9157365236, 'Ahmedabad', 'Gujarat', 'India', '038e74c873365275da5999d0eeceed6c', 'bakery_16_phonecart_logo.png', 'Registerd'),
(24, 'Parv', 'Somani', 'parvsomani05@gmail.com', 'Male', 9824239634, 'surat', 'Gujarat', 'India', '7ab4d728ebd4626536879b5b033cb3c0', 'bakery_75_apple_cat.jpg', 'Registerd');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(15, 'Realme narzo 55', 'Realme narzo 55', 6, 'active'),
(16, 'i phone', 'i phone', 3, 'Active'),
(17, 's23', 's23', 5, 'Active'),
(18, 's24', 's24', 5, 'Active');

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
  MODIFY `billing_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `contact_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `order_item`
--
ALTER TABLE `order_item`
  MODIFY `or_item_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `reg_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `subcat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
