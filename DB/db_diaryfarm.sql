-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2024 at 08:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_diaryfarm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_ID` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(50) NOT NULL,
  `admin_contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_ID`, `admin_name`, `admin_email`, `admin_password`, `admin_contact`) VALUES
(4, 'Zara', 'zara@gmail.com', 'Password1', '56755876876');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_ID` int(11) NOT NULL,
  `booking_status` int(11) NOT NULL DEFAULT 0,
  `booking_date` varchar(50) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `booking_amount` varchar(344) NOT NULL,
  `deliveryagent_ID` int(11) NOT NULL,
  `dis_amount` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_ID`, `booking_status`, `booking_date`, `user_ID`, `booking_amount`, `deliveryagent_ID`, `dis_amount`) VALUES
(1, 5, '2024-11-02', 6, '30', 3, 0),
(2, 2, '2024-11-06', 6, '400', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_ID` int(11) NOT NULL,
  `cart_quantity` int(11) NOT NULL DEFAULT 1,
  `cart_status` int(11) NOT NULL DEFAULT 0,
  `product_ID` int(11) NOT NULL,
  `booking_ID` int(11) NOT NULL,
  `cart_total` int(11) NOT NULL,
  `stock_ID` int(11) NOT NULL,
  `dis_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_ID`, `cart_quantity`, `cart_status`, `product_ID`, `booking_ID`, `cart_total`, `stock_ID`, `dis_ID`) VALUES
(1, 1, 1, 127, 1, 0, 0, 0),
(2, 20, 1, 120, 2, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_ID` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `subcategory_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_ID`, `category_name`, `subcategory_ID`) VALUES
(63, 'MILK', 0),
(64, 'ICE CREAM', 0),
(65, 'YOGURT', 0),
(66, 'CURD', 0),
(67, 'CHEESE', 0),
(69, 'BUTTER', 0),
(73, 'GHEE', 0),
(74, 'INFANT FORMULA', 0),
(78, 'MILK POWDER', 0),
(79, 'CREAM', 0),
(80, 'LASSI', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_ID` int(11) NOT NULL,
  `complaint_title` varchar(50) NOT NULL,
  `complaint_description` varchar(500) NOT NULL,
  `complaint_date` varchar(30) NOT NULL,
  `complaint_status` int(11) NOT NULL,
  `complaint_reply` varchar(500) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `complaint_file` varchar(500) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `complaint_rdate` varchar(50) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `category_ID` int(11) NOT NULL,
  `subcategory_ID` int(11) NOT NULL,
  `subcategory_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_ID`, `complaint_title`, `complaint_description`, `complaint_date`, `complaint_status`, `complaint_reply`, `user_ID`, `complaint_file`, `product_ID`, `complaint_rdate`, `category_name`, `category_ID`, `subcategory_ID`, `subcategory_name`) VALUES
(1, 'damaged product', 'damaged product', '2024-07-12', 0, '', 0, 'yogut.jpeg', 0, '', '', 0, 0, ''),
(2, 'damaged product', 'damaged product', '2024-07-12', 0, '', 0, 'yogut.jpeg', 0, '', '', 0, 0, ''),
(3, 'damaged product', 'product is damaged so please return it', '2024-07-12', 0, '', 0, 'chocolate.png', 0, '', '', 0, 0, ''),
(4, 'damaged product', 'product is damaged so please return it', '2024-07-12', 0, '', 0, 'chocolate.png', 0, '', '', 0, 0, ''),
(10, 'damaged product', '', '2024-07-12', 0, '', 0, 'college - Copy.jpeg', 0, '', '', 0, 0, ''),
(11, 'iugyugh', 'hkhjh', '2024-08-10', 0, '', 0, '', 0, '', '', 0, 0, ''),
(12, 'damaged product', '', '2024-08-11', 0, '', 1, 'butter.jpeg', 0, '', '', 0, 0, ''),
(13, '', '', '2024-08-11', 0, '', 0, '', 0, '', '', 0, 0, ''),
(14, 'damaged product', 'sdfghjk', '2024-08-13', 0, 'edrftgyhujkl;', 6, 'butter.jpeg', 92, '2024-08-13 21:40:57', '', 0, 0, ''),
(15, 'ffgfhhgf', 'drrgfjhvhjgjhxbvnmbn', '2024-08-13', 0, '', 6, 'Tender-Coconut icecream.png', 103, '', '', 0, 0, ''),
(16, 'damaged product', 'sdfghjkl;', '2024-08-13', 0, 'soory  we wii  contact with you shortly', 6, 'vanila.png', 104, '2024-08-13 23:40:59', '', 0, 0, ''),
(17, 'damaged product', 'sdfghjkl', '2024-08-14', 0, '', 6, 'dairyproduct.jpeg.png', 104, '', '', 0, 0, ''),
(18, 'damaged product', 'PLZ PROVIDE RETURN OPTION', '2024-08-15', 0, 'soory  we will contact with you shortly', 6, 'WhatsApp Image 2024-08-14 at 09.20.04_bdd15f22.jpg', 107, '2024-08-15 09:30:17', '', 0, 0, ''),
(19, 'damaged product', 'wertyuikolp;', '2024-08-19', 0, '', 6, 'WhatsApp Image 2024-08-14 at 22.53.39_47e9ae2b.jpg', 119, '', '', 0, 0, ''),
(20, 'damaged product', 'dffgghhjjjjkkkl', '2024-08-20', 0, 'sorry', 6, 'WhatsApp Image 2024-08-14 at 08.19.43_d3d16a7d.jpg', 115, '2024-08-20 07:15:09', '', 0, 0, ''),
(21, 'damaged product', 'wertyuio', '2024-08-26', 0, '', 7, 'peda.jpeg', 117, '', '', 0, 0, ''),
(22, 'damaged product', 'dfghjkghjvnb ncnbc nbv hchjgvjmnb,mnvghcnhb', '2024-08-30', 0, '', 6, 'butters.jpeg', 120, '', '', 0, 0, ''),
(23, 'damaged product', 'asdfghjkl;', '2024-08-30', 0, 'sdfghjkl;', 6, 'Cheese.jpeg', 118, '2024-08-30 08:58:13', '', 0, 0, ''),
(24, 'sdfghjkl;', 'nkjsdgkldjhgfjoghknlkbjigfj;lghknmhj', '2024-09-09', 0, 'wertyuiosdfghjk34567890', 6, 'pudding.jpeg', 115, '2024-09-09 23:30:56', '', 0, 0, ''),
(25, 'damaged product', 'sdfghjkxcvbnm,.', '2024-10-26', 0, 'sorry we will contact you shortly', 6, 'buttermilk.jpg', 119, '2024-10-26 10:51:14', '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_deliveryagent`
--

CREATE TABLE `tbl_deliveryagent` (
  `deliveryagent_ID` int(11) NOT NULL,
  `deliveryagent_name` varchar(50) NOT NULL,
  `deliveryagent_contact` int(10) NOT NULL,
  `deliveryagent_email` varchar(40) NOT NULL,
  `deliveryagent_status` int(11) NOT NULL DEFAULT 0,
  `cart_ID` int(11) NOT NULL,
  `deliveryagent_availability` int(11) NOT NULL DEFAULT 0,
  `deliveryagent_dob` varchar(30) NOT NULL,
  `deliveryagent_gender` varchar(30) NOT NULL,
  `deliveryagent_address` varchar(100) NOT NULL,
  `deliveryagent_photo` varchar(100) NOT NULL,
  `deliveryagent_proof` varchar(100) NOT NULL,
  `deliveryagent_password` varchar(48) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_deliveryagent`
--

INSERT INTO `tbl_deliveryagent` (`deliveryagent_ID`, `deliveryagent_name`, `deliveryagent_contact`, `deliveryagent_email`, `deliveryagent_status`, `cart_ID`, `deliveryagent_availability`, `deliveryagent_dob`, `deliveryagent_gender`, `deliveryagent_address`, `deliveryagent_photo`, `deliveryagent_proof`, `deliveryagent_password`) VALUES
(2, 'Jose', 2147483647, 'jose9@gmail.com', 2, 0, 0, '2024-08-07', '0', 'red fort villa kochi ernakulam\r\nkerala 686662', 'college - Copy.jpeg', 'college.jpeg', 'Password1'),
(3, 'Saniya', 2147483647, 'saniya@gmail.com', 1, 0, 0, '2024-08-13', '0', 'red fort villa kochi ernakulam\r\nkerala 686662', 'userdp.jpeg.png', 'dairyproduct.jpeg.png', 'Password1'),
(4, 'Saniya', 2147483647, 'saniya1@gmail.com', 1, 0, 0, '2024-08-14', 'other', 'red fort villa kochi ernakulam\r\nkerala 686662', 'userdp.jpeg.png', 'dairyproduct.jpeg.png', 'Password1'),
(5, 'John', 2147483647, 'anenaisabelbenny@gmail.com', 1, 0, 0, '2024-08-11', 'other', 'red fort villa kochi ernakulam\r\nkerala 686662', 'WhatsApp Image 2024-08-14 at 22.06.00_6c2b0b9a.jpg', 'WhatsApp Image 2024-08-14 at 22.04.49_1cb007d2.jpg', 'Password1'),
(6, 'Maria', 2147483647, 'maria@gmail.com', 1, 0, 0, '2024-08-05', 'Female', 'red fort villa kochi ernakulam\r\nkerala 686662', 'user.png', 'WhatsApp Image 2024-08-14 at 22.04.49_1cb007d2.jpg', 'Password1'),
(7, 'Kurian', 2147483647, 'kurian@gmail.com', 1, 0, 0, '2024-08-04', 'Male', 'red fort villa kochi ernakulam\r\nkerala 686662', 'user.png', 'user.png', 'Password1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `department_id` int(50) NOT NULL,
  `department_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`department_id`, `department_name`) VALUES
(14, 'bca');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designation`
--

CREATE TABLE `tbl_designation` (
  `designation_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_designation`
--

INSERT INTO `tbl_designation` (`designation_name`) VALUES
('bnnn'),
('HR'),
('manager');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_discount`
--

CREATE TABLE `tbl_discount` (
  `dis_ID` int(11) NOT NULL,
  `dis_percentage` int(11) NOT NULL,
  `dis_amount` int(11) NOT NULL,
  `dis_maxamount` int(11) NOT NULL,
  `dis_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_discount`
--

INSERT INTO `tbl_discount` (`dis_ID`, `dis_percentage`, `dis_amount`, `dis_maxamount`, `dis_status`) VALUES
(1, 50, 0, 0, 1),
(2, 50, 340, 350, 1),
(3, 60, 300, 250, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_ID` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_ID`, `district_name`) VALUES
(5, 'thiruvananthapuram'),
(6, 'kollam'),
(7, 'alappuzha'),
(8, 'pathanamthitta'),
(9, 'idukki'),
(10, 'wayanad'),
(17, 'Ernakulam'),
(18, 'Palakad'),
(19, 'kollam'),
(20, 'kochi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery`
--

CREATE TABLE `tbl_gallery` (
  `gallery_ID` int(11) NOT NULL,
  `gallery_image` varchar(28) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `category_name` varchar(30) NOT NULL,
  `category_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_gallery`
--

INSERT INTO `tbl_gallery` (`gallery_ID`, `gallery_image`, `product_ID`, `category_name`, `category_ID`) VALUES
(1, 'BabyFormula.jpeg', 0, '', 0),
(16, 'butter.jpeg', 51, '', 0),
(18, 'Cheese.jpeg', 0, '', 0),
(19, 'buttermilk.jpeg', 86, '', 0),
(21, 'butterss.jpeg', 73, '', 0),
(22, 'butter.jpeg', 0, '', 84),
(23, 'chocolate.png', 0, '', 0),
(24, 'BabyFormula.jpeg', 0, '', 84),
(26, 'BabyFormula.jpeg', 0, '', 86),
(27, 'butter.jpeg', 0, '', 86),
(28, 'chocolate.png', 0, '', 0),
(29, 'butter.jpeg', 0, '', 0),
(30, 'chocolate.png', 0, '', 0),
(31, '', 0, '', 0),
(32, 'buttermilk.jpeg', 0, '', 0),
(33, 'chocolate.png', 91, '', 0),
(34, 'chocolate.png', 91, '', 0),
(35, 'chocolate.png', 92, '', 0),
(36, 'butter.jpeg', 92, '', 0),
(37, 'strawberry.png', 104, '', 0),
(38, 'lychee.png', 104, '', 0),
(41, 'WhatsApp Image 2024-08-14 at', 0, '', 0),
(42, 'WhatsApp Image 2024-08-14 at', 0, '', 0),
(47, 'icecream6.png', 0, '', 0),
(48, 'pudding.jpeg', 0, '', 0),
(49, 'infantformula.jpeg', 0, '', 0),
(53, 'WhatsApp Image 2024-08-14 at', 0, '', 0),
(54, 'WhatsApp Image 2024-08-14 at', 0, '', 0),
(55, 'farmer.jpeg (5).jpg', 0, '', 0),
(56, 'farmer.jpeg (7).jpg', 0, '', 0),
(57, 'farmer.jpeg (7).jpg', 0, '', 0),
(58, 'WhatsApp Image 2024-08-14 at', 0, '', 0),
(59, 'butters.jpeg', 0, '', 0),
(60, 'butterss.jpeg', 0, '', 0),
(62, 'icecream.jpg', 122, '', 0),
(63, 'WhatsApp Image 2024-08-14 at', 0, '', 0),
(64, 'ice.jpg', 0, '', 0),
(65, 'WhatsApp Image 2024-08-14 at', 0, '', 0),
(68, 'WhatsApp Image 2024-08-14 at', 0, '', 0),
(69, 'hu.jpg', 120, '', 0),
(70, 'fgt.jpg', 120, '', 0),
(71, 'cream.jpeg.jpg', 115, '', 0),
(72, 'icedfgvbhbn.jpg', 126, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_ID` int(50) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `place_pincode` varchar(50) NOT NULL,
  `district_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_ID`, `place_name`, `place_pincode`, `district_ID`) VALUES
(6, 'Kovalam Beach', '686665', '5'),
(7, 'Palace Museum', '686664', '5'),
(8, 'Mattancherry Palace', '686663', '4'),
(9, 'Hill Palace Museum', '682311', '4'),
(10, 'Fort Kochi Beach', '686669', '4'),
(11, 'Chottanikkara Temple', '686665', '4'),
(12, 'Cherai Beach', '686669', '4'),
(13, 'St. Francis Church', '682311', '4'),
(14, 'Palaruvi Waterfalls', '686665', '6'),
(15, 'Kollam Beach', '682311', '6'),
(16, 'Thangasseri Beach and Lighthouse', '686669', '6'),
(19, 'Alleppey Backwaters', '686667', '7'),
(20, 'Idukki Dam', '682311', '9'),
(21, 'Ramakalamedu', '686669', '9'),
(22, 'Edakkal Caves', '686669', '10'),
(23, 'Neelimala View Point', '686667', '10'),
(24, 'piravom', '686662', '17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_price` varchar(1111) NOT NULL,
  `product_photo` varchar(500) NOT NULL,
  `product_quantity` varchar(11111) NOT NULL,
  `product_details` varchar(500) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `subcategory_ID` int(11) NOT NULL,
  `product_code` varchar(11) NOT NULL,
  `product_mfd` varchar(11) NOT NULL,
  `product_exp` varchar(11) NOT NULL,
  `product_status` int(11) NOT NULL,
  `stock_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_price`, `product_photo`, `product_quantity`, `product_details`, `product_ID`, `subcategory_ID`, `product_code`, `product_mfd`, `product_exp`, `product_status`, `stock_ID`) VALUES
('50', 'wholemilk.jpeg', '1L', 'Whole milk is a protein-rich beverage, containing essential vitamins and minerals. Here’s how an 8-ounce (1 cup) serving of whole milk compares to other varieties:  Calories: 150 Carbohydrates: 12 g Protein: 8 g Total Fat: 8 g Saturated Fat: 5 g Calcium: 306 mg (', 46, 0, '', '', '', 0, 0),
('20', 'lowfatmilk.jpeg', '1L', 'Low-fat milk, also known as reduced-fat milk, is a lighter version of regular milk. It typically contains around 1-2% fat content. Here’s what you need to know:  Nutritional Value: Calories: Approximately 105 calories per cup. Macronutrients: Carbohydrates: 47% Fat: 21% Protein: 33%', 47, 0, '', '', '', 0, 0),
('30', 'chocolate.png', '2', 'cows milk', 48, 0, '', '', '', 0, 0),
('30', 'yogut.jpeg', '490', 'gfghhio', 83, 0, '', '', '', 0, 0),
('30', 'WhatsApp Image 2024-08-14 at 07.52.15_6d0d2daf.jpg', '500gm', 'Nutrient	Amount\r\nCalories	145\r\nTotal Fat	7.92g\r\nSaturated Fat	4.889g\r\nCholesterol	32mg\r\nSodium	58mg\r\nTotal Carbohydrate	16.99g', 106, 16, 'DAIRY1106', '2024-08-29', '2024-07-30', 0, 0),
('30', 'WhatsApp Image 2024-08-14 at 21.31.31_97481cec.jpg', '1ltr', 'Nutrient	Amount\r\nCalories	152\r\nProtein	8.14 grams\r\nCarbohydrates	12 grams\r\nSugar (lactose)	12 grams\r\nFat	8 grams', 107, 11, 'DAIRY1107', '2024-08-31', '2024-08-12', 0, 0),
('30', 'WhatsApp Image 2024-08-14 at 09.20.23_19573a75.jpg', '1ltr', 'nutritional content in low-fat milk (per 1 cup or 250 ml):\r\n\r\nCalories: 102\r\nTotal Fat: 2.37g\r\nSaturated Fat: 1.545g\r\nCholesterol: 12mg\r\nSodium: 107mg\r\nCarbohydrates: 12.18g\r\nSugars: 12.69g\r\nProtein: 8.22g\r\nVitamin D: 2mcg (12% DV)\r\nCalcium: 290mg (22% DV)\r\nIron: 0.07mg\r\nPotassium: 366mg', 108, 12, 'DAIRY1108', '2024-08-23', '2024-08-05', 0, 0),
('77', 'WhatsApp Image 2024-08-14 at 09.40.04_6d755281.jpg', '1ltr', 'nutritional content in organic milk (per 1 cup or 250 ml): Calories: 102 Total Fat: 2.37g Saturated Fat: 1.545g Cholesterol: 12mg Sodium: 107mg Carbohydrates: 12.18g Sugars: 12.69g Protein: 8.22g Vitamin D: 2mcg (12% DV) Calcium: 290mg (22% DV) Iron: 0.07mg Potassium: 366mg', 109, 13, 'DAIRY1109', '2024-08-30', '2024-08-05', 0, 0),
('49', 'WhatsApp Image 2024-08-14 at 09.26.17_cbd53b69.jpg', '1ltr', 'nutritional content in flavored milk (per 1 cup or 250 ml): Calories: 102 Total Fat: 2.37g Saturated Fat: 1.545g Cholesterol: 12mg Sodium: 107mg Carbohydrates: 12.18g Sugars: 12.69g Protein: 8.22g Vitamin D: 2mcg (12% DV) Calcium: 290mg (22% DV) Iron: 0.07mg Potassium: 366mg', 110, 14, 'DAIRY1110', '2024-08-31', '2024-08-05', 0, 0),
('50', 'WhatsApp Image 2024-08-14 at 09.22.02_89fcda82.jpg', '1ltr', 'nutritional content in  milk (per 1 cup or 250 ml): Calories: 102 Total Fat: 2.37g Saturated Fat: 1.545g Cholesterol: 12mg Sodium: 107mg Carbohydrates: 12.18g Sugars: 12.69g Protein: 8.22g Vitamin D: 2mcg (12% DV) Calcium: 290mg (22% DV) Iron: 0.07mg Potassium: 366mg', 111, 15, 'DAIRY1111', '2024-08-30', '2024-08-06', 0, 0),
('50', 'WhatsApp Image 2024-08-14 at 21.31.31_97481cec.jpg', '1ltr', 'Whole milk, also known as full-fat milk, is a nutritious beverage. Let’s take a look at the nutrition facts for one cup (approximately 236 ml) of whole milk with 3.25% milkfat:\r\n\r\nCalories: 149\r\nProtein: 8 grams\r\nFat: 8 grams\r\nCarbohydrates: 12 grams\r\nSugar (lactose): 12 grams\r\nFiber: 0 grams', 112, 39, 'DAIRY1112', '2024-08-17', '2024-08-05', 0, 0),
('77', 'WhatsApp Image 2024-08-14 at 09.40.04_6d755281.jpg', '1L', ' low-fat milk, is a nutritious beverage. Let’s take a look at the nutrition facts for one cup (approximately 236 ml) of whole milk with 3.25% milkfat: Calories: 149 Protein: 8 grams Fat: 8 grams Carbohydrates: 12 grams Sugar (lactose): 12 grams Fiber: 0 grams', 114, 40, 'DAIRY1114', '', '', 0, 0),
('50', 'WhatsApp Image 2024-08-14 at 07.57.57_3ef1c315.jpg', '250g', 'nutrition facts for one cup (approximately 236 ml) of whole milk with 3.25% milkfat: Calories: 149 Protein: 8 grams Fat: 8 grams Carbohydrates: 12 grams Sugar (lactose): 12 grams Fiber: 0 grams', 115, 49, 'DAIRY1115', '2024-09-19', '2024-08-05', 0, 0),
('50', 'WhatsApp Image 2024-08-14 at 08.07.50_abb3a73d.jpg', '250g', 'nutrition facts for one cup (approximately 236 ml) of whole milk with 3.25% milkfat: Calories: 149 Protein: 8 grams Fat: 8 grams Carbohydrates: 12 grams Sugar (lactose): 12 grams Fiber: 0 grams', 117, 47, 'DAIRY1117', '2024-09-21', '2024-08-05', 0, 0),
('1300', 'WhatsApp Image 2024-08-14 at 22.48.44_643877ca.jpg', '500gm', 'nutrition facts for one cup (approximately 236 ml) of whole milk with 3.25% milkfat: Calories: 149 Protein: 8 grams Fat: 8 grams Carbohydrates: 12 grams Sugar (lactose): 12 grams Fiber: 0 grams', 118, 74, 'DAIRY1118', '2025-02-15', '2024-08-04', 0, 0),
('1500', 'WhatsApp Image 2024-08-14 at 22.49.17_eb85230c.jpg', '500gm', 'nutrition facts for one cup (approximately 236 ml) of whole milk with 3.25% milkfat: Calories: 149 Protein: 8 grams Fat: 8 grams Carbohydrates: 12 grams Sugar (lactose): 12 grams Fiber: 0 grams', 119, 88, 'DAIRY1119', '2026-05-15', '2024-08-05', 0, 0),
('20', 'WhatsApp Image 2024-08-15 at 07.10.44_e39d937f.jpg', '1L', 'nutrition facts for one cup (approximately 236 ml) of whole milk with 3.25% milkfat: Calories: 149 Protein: 8 grams Fat: 8 grams Carbohydrates: 12 grams Sugar (lactose): 12 grams Fiber: 0 grams', 120, 82, 'DAIRY1120', '2024-09-20', '2024-08-11', 0, 0),
('20', 'WhatsApp Image 2024-08-15 at 06.59.37_87b90c14.jpg', '1L', 'nutrition facts for one cup (approximately 236 ml) of whole milk with 3.25% milkfat: Calories: 149 Protein: 8 grams Fat: 8 grams Carbohydrates: 12 grams Sugar (lactose): 12 grams Fiber: 0 grams', 121, 81, 'DAIRY1121', '2024-12-15', '2024-08-05', 0, 0),
('20', 'WhatsApp Image 2024-08-15 at 07.09.15_ab4cefd2.jpg', '1L', 'nutrition facts for one cup (approximately 236 ml) of whole milk with 3.25% milkfat: Calories: 149 Protein: 8 grams Fat: 8 grams Carbohydrates: 12 grams Sugar (lactose): 12 grams Fiber: 0 grams', 122, 78, 'DAIRY1122', '2024-11-15', '2024-08-12', 0, 0),
('400', 'peda.jpeg', '20kg', 'sdfghjkzxcvbnjmzxcvbnmsdfghj', 123, 0, 'DAIRY1123', '2024-10-07', '2026-10-26', 0, 0),
('400', 'peda.jpeg', '20kg', 'sdfghjkzxcvbnjmzxcvbnmsdfghj', 124, 0, 'DAIRY1124', '2024-10-07', '2026-10-26', 0, 0),
('400', 'ice (4).jpg', '20kg', 'sdfgthyjuiop', 126, 49, 'DAIRY1126', '2024-01-26', '2025-01-25', 0, 0),
('30', 'curd1.jpg', '500gm', 'dfghjkl', 127, 59, 'DAIRY1127', '2024-10-23', '2025-05-16', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `rating_ID` int(11) NOT NULL,
  `rating_value` int(11) NOT NULL,
  `rating_contant` varchar(256) NOT NULL,
  `rating_datetime` varchar(10) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `rating_content` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`rating_ID`, `rating_value`, `rating_contant`, `rating_datetime`, `product_ID`, `user_ID`, `rating_content`) VALUES
(1, 3, '', '2024-08-13', 92, 6, 'ertyuio'),
(2, 3, '', '2024-08-13', 92, 6, 'good'),
(3, 1, '', '2024-08-13', 104, 6, 'dfghgjjhhjhj'),
(4, 1, '', '2024-08-14', 104, 6, 'bad'),
(5, 3, '', '2024-08-15', 115, 6, 'GOOD '),
(6, 3, '', '2024-08-20', 118, 6, 'good product'),
(7, 5, '', '2024-08-26', 117, 7, 'wertyuio'),
(8, 4, '', '2024-08-27', 119, 6, 'dfghj'),
(9, 4, '', '2024-08-30', 120, 6, 'erty'),
(10, 3, '', '2024-10-26', 119, 6, 'sdfghjkl;'),
(11, 4, '', '2024-10-26', 114, 6, 'sdfghjkl;'),
(12, 3, '', '2024-10-26', 122, 7, 'fghjk');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_ID` int(11) NOT NULL,
  `stock_date` varchar(50) NOT NULL,
  `stock_quantity` varchar(100) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `stock_mfd` varchar(11) NOT NULL,
  `stock_exp` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_ID`, `stock_date`, `stock_quantity`, `product_ID`, `stock_mfd`, `stock_exp`) VALUES
(162, '2024-11-02', '22', 0, '', ''),
(163, '2024-11-02', '12', 127, '', ''),
(164, '2024-11-02', '22', 120, '', ''),
(165, '2024-11-02', '30', 126, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_ID` int(11) NOT NULL,
  `subcategory_name` varchar(50) NOT NULL,
  `category_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_ID`, `subcategory_name`, `category_ID`) VALUES
(39, 'WHOLE MILK', 63),
(40, 'LOW-FAT MILK', 63),
(41, 'LACTOSE-FREE MIK', 63),
(42, 'FLAVOURED MILK', 63),
(43, 'LONG-LIFE MILK', 63),
(44, 'TONED MILK', 63),
(45, 'FAT FREE- MILK', 63),
(46, 'ORGANIC MILK', 63),
(47, 'STRAWBERRY', 64),
(48, 'MANGO ', 64),
(49, 'GREEN APPLE', 64),
(50, 'PEACH', 64),
(51, 'CHOCOLATE', 64),
(52, 'PISTACHIO', 64),
(53, 'VANILLA', 64),
(54, 'BUTTERSCOTCH', 64),
(55, 'MULTI FALVOUR COMBO PACK', 64),
(56, 'KULFI', 64),
(59, 'FLAVORED', 65),
(60, 'UNFLAVOURED', 65),
(61, 'PROBIOTIC CURD', 66),
(62, 'FLAVOURED CURD', 66),
(63, 'UN-FLAVOURED CURD', 66),
(66, 'PROCESSED CHEESE', 67),
(67, 'PROCESSED CHEESE SLICE', 67),
(68, 'PROCESSED CHEESE SPREAD', 67),
(69, 'MOZZARELLA CHEESE', 67),
(70, 'SALTED ', 69),
(71, 'UNSALTED', 69),
(72, 'COW GHEE', 73),
(73, 'BUFFALO GHEE', 73),
(74, 'LACTOSE-FREE ', 74),
(75, 'POWDERED FORMULA', 74),
(76, 'ORGANIC FORMULA', 74),
(77, 'MILK POWDER', 63),
(78, 'MANGO - LASSI', 80),
(79, 'PINEAPPLE - LASSI', 80),
(80, 'CHOCOLATE-LASSI', 80),
(81, 'STRAWBERRY-LASSI', 80),
(82, 'PISTA-LASSI', 80),
(83, 'ORANGE-LASSI', 80),
(84, 'LITCHI-LASSI', 80),
(85, 'PEDA', 81),
(86, 'MILK CAKE', 81),
(87, 'MILK BIUSCUIT', 81),
(88, 'Flavored Formula', 74),
(89, 'VANILLA MIX', 64);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_ID` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `user_contact` varchar(10) NOT NULL,
  `user_photo` varchar(50) NOT NULL,
  `user_pincode` varchar(11) NOT NULL,
  `user_gender` varchar(8) NOT NULL,
  `user_dob` varchar(50) NOT NULL,
  `user_proof` varchar(50) NOT NULL,
  `user_mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_ID`, `user_name`, `user_email`, `user_password`, `user_address`, `user_contact`, `user_photo`, `user_pincode`, `user_gender`, `user_dob`, `user_proof`, `user_mail`) VALUES
(6, 'Thomas', 'anenabenny@gmail.com', 'Password2', 'red fort villa kochi ernakulam\r\nkerala 686662', '8590501136', 'college - Copy.jpeg', '', 'Male', '2024-08-21', '', ''),
(7, 'Anagha', 'naturennnnn076@gmail.com', 'Password2', 'kollikal house piravom\r\n686664', '8590501136', 'WhatsApp Image 2024-08-14 at 22.04.49_1cb007d2.jpg', '', 'Female', '2024-08-06', '', ''),
(8, 'Sona', 'sona@gmail.com', 'Password1', 'red fort villa kochi ernakulam\r\nkerala 686662', '8590501136', 'user.png', '', 'Female', '2024-09-10', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `wishlist_ID` int(11) NOT NULL,
  `wishlist_date` varchar(50) NOT NULL,
  `product_ID` int(11) NOT NULL,
  `user_ID` int(11) NOT NULL,
  `cart_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`wishlist_ID`, `wishlist_date`, `product_ID`, `user_ID`, `cart_ID`) VALUES
(1, '', 119, 7, 0),
(2, '', 119, 6, 0),
(3, '', 127, 6, 0),
(6, '', 114, 6, 0),
(7, '', 120, 6, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_ID`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_ID`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_ID`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_ID`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_ID`);

--
-- Indexes for table `tbl_deliveryagent`
--
ALTER TABLE `tbl_deliveryagent`
  ADD PRIMARY KEY (`deliveryagent_ID`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `tbl_designation`
--
ALTER TABLE `tbl_designation`
  ADD PRIMARY KEY (`designation_name`);

--
-- Indexes for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  ADD PRIMARY KEY (`dis_ID`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_ID`);

--
-- Indexes for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  ADD PRIMARY KEY (`gallery_ID`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_ID`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_ID`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`rating_ID`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_ID`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_ID`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`wishlist_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_deliveryagent`
--
ALTER TABLE `tbl_deliveryagent`
  MODIFY `deliveryagent_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `department_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_discount`
--
ALTER TABLE `tbl_discount`
  MODIFY `dis_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_gallery`
--
ALTER TABLE `tbl_gallery`
  MODIFY `gallery_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `rating_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `wishlist_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
