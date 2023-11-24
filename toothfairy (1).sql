-- phpMyAdmin SQL Dump
-- version 3.4.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 11, 2023 at 11:25 AM
-- Server version: 5.5.20
-- PHP Version: 5.3.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `toothfairy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(100) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(200) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `admin_password` varchar(200) NOT NULL,
  `admin_contact` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_contact`) VALUES
(11, 'Defin Michael Biju', 'definmichaelbiju@gmail.com', 'defin123', '8891182577'),
(10, 'Albin Thomas', 'albinthomas@gmail.com', 'albin123', '7306468867');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appointment`
--

CREATE TABLE IF NOT EXISTS `tbl_appointment` (
  `app_id` int(100) NOT NULL AUTO_INCREMENT,
  `app_date` varchar(200) NOT NULL,
  `slot_id` int(11) NOT NULL,
  `app_slot` varchar(20) NOT NULL,
  `service_id` varchar(200) NOT NULL,
  `app_status` varchar(150) NOT NULL DEFAULT '0',
  `user_id` varchar(150) NOT NULL,
  `app_replay` varchar(100) NOT NULL DEFAULT 'Not Yet Replyed',
  PRIMARY KEY (`app_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tbl_appointment`
--

INSERT INTO `tbl_appointment` (`app_id`, `app_date`, `slot_id`, `app_slot`, `service_id`, `app_status`, `user_id`, `app_replay`) VALUES
(20, '2023-11-08', 11, '5', '22', '1', '16', 'Hai'),
(19, '2023-11-08', 11, '4', '10', '0', '16', 'Not Yet Replyed'),
(18, '2023-11-08', 11, '3', '10', '0', '16', 'Not Yet Replyed'),
(16, '2023-11-08', 11, '1', '11', '0', '16', 'Not Yet Replyed'),
(17, '2023-11-08', 11, '2', '11', '0', '16', 'Not Yet Replyed');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE IF NOT EXISTS `tbl_booking` (
  `booking_id` int(100) NOT NULL AUTO_INCREMENT,
  `booking_date` varchar(150) NOT NULL,
  `booking_status` varchar(150) NOT NULL,
  `app_id` varchar(150) NOT NULL,
  `booking_amount` varchar(150) NOT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE IF NOT EXISTS `tbl_cart` (
  `cart_id` int(100) NOT NULL AUTO_INCREMENT,
  `cart_status` varchar(150) NOT NULL,
  `cart_quantity` varchar(150) NOT NULL,
  `product_id` varchar(150) NOT NULL,
  `booking_id` varchar(150) NOT NULL,
  PRIMARY KEY (`cart_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `category_name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_name`, `category_id`) VALUES
('Crowns', 1),
('Bridges', 2),
('Fillings', 3),
('Root canal treatments', 4),
('Scale  and polish', 5),
('Braces', 6),
('Wisdom tooth removal', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE IF NOT EXISTS `tbl_complaint` (
  `complaint_id` int(100) NOT NULL AUTO_INCREMENT,
  `complaint_title` varchar(150) NOT NULL,
  `complaint_content` varchar(150) NOT NULL,
  `complaint_date` varchar(150) NOT NULL,
  `complaint_status` varchar(150) NOT NULL,
  `user_id` varchar(150) NOT NULL,
  PRIMARY KEY (`complaint_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE IF NOT EXISTS `tbl_district` (
  `district_id` int(100) NOT NULL AUTO_INCREMENT,
  `district_name` varchar(100) NOT NULL,
  PRIMARY KEY (`district_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(2, 'Idukki'),
(3, 'Ernakulam'),
(4, 'kottayam'),
(5, 'pathanamthitta'),
(6, 'trissur'),
(7, 'kasargod'),
(8, 'kannur'),
(9, 'wayanad'),
(10, 'palakkad'),
(11, 'malappuram'),
(12, 'kozhikod'),
(13, 'trivandrum'),
(14, 'alapppuzha'),
(15, 'kollam');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_doctor`
--

CREATE TABLE IF NOT EXISTS `tbl_doctor` (
  `doctor_id` int(100) NOT NULL AUTO_INCREMENT,
  `doctor_name` varchar(100) NOT NULL,
  `doctor_contact` varchar(100) NOT NULL,
  `doctor_email` varchar(100) NOT NULL,
  `doctor_address` varchar(100) NOT NULL,
  `place_id` varchar(100) NOT NULL,
  `doctor_photo` varchar(150) NOT NULL,
  `doctor_proof` varchar(150) NOT NULL,
  `doctor_password` varchar(20) NOT NULL,
  `doctor_details` varchar(100) NOT NULL,
  `doctor_gender` varchar(100) NOT NULL,
  PRIMARY KEY (`doctor_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `tbl_doctor`
--

INSERT INTO `tbl_doctor` (`doctor_id`, `doctor_name`, `doctor_contact`, `doctor_email`, `doctor_address`, `place_id`, `doctor_photo`, `doctor_proof`, `doctor_password`, `doctor_details`, `doctor_gender`) VALUES
(81, 'Richard Simon', '9876453546', 'richiesim@gmail.com', 'thommikkal(h),melukavumattom,kottayam', '4', 'IMG_20231025_124714.jpg', 'IMG_20231025_124652.jpg', '123456789', 'BDS,MDS', 'Male'),
(82, 'Revlin Kevin', '1234567890', 'kevin@gmail.com', 'vandmattom ,Thdupuzha', '5', 'IMG_20231025_124635.jpg', 'jellyfish.jpg.jpg', '214365', 'BDS,MDS', 'Male'),
(83, 'Ashwaty Manu ', '0987654321', 'manuaswathy@gmail.com', 'cruce villa,Kasargod', '7', 'IMG_20231025_124652.jpg', 'Desert.jpg', '12345678', 'BDS,MDS,MPDS', 'Female'),
(84, 'Samuel Johns', '9495516722', 'johny@gmail.com', 'vandmattom ,Thdupuzha', '13', 'IMG_20231025_144858.jpg', 'Tulips.jpg', '123456', 'BDS,MDS', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pharmasist`
--

CREATE TABLE IF NOT EXISTS `tbl_pharmasist` (
  `pharmasist_id` int(100) NOT NULL AUTO_INCREMENT,
  `pharmasist_name` varchar(100) NOT NULL,
  `pharmasist_contact` varchar(100) NOT NULL,
  `pharmasist_email` varchar(100) NOT NULL,
  `pharmasist_address` varchar(100) NOT NULL,
  `pharmasist_photo` varchar(100) NOT NULL,
  `place_id` varchar(150) NOT NULL,
  `pharmasist_proof` varchar(150) NOT NULL,
  `pharmasist_password` varchar(20) NOT NULL,
  `pharmasist_details` varchar(100) NOT NULL,
  PRIMARY KEY (`pharmasist_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tbl_pharmasist`
--

INSERT INTO `tbl_pharmasist` (`pharmasist_id`, `pharmasist_name`, `pharmasist_contact`, `pharmasist_email`, `pharmasist_address`, `pharmasist_photo`, `place_id`, `pharmasist_proof`, `pharmasist_password`, `pharmasist_details`) VALUES
(5, 'Jeremy sweder', '6765340989', 'jeremyswe@gmail.com', 'cruce villa,vaipin kochin', 'IMG_20231025_124714.jpg', '12', 'IMG_20231025_124635.jpg', '123456789', 'pharmacist'),
(6, 'Winona Ryder', '9032876539', 'winnryder@gmail.com', 'deco plaza,kochin,HN32', 'IMG_20231025_124652.jpg', '12', 'IMG_20231025_124652.jpg', '12345678', 'pharmacist');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE IF NOT EXISTS `tbl_place` (
  `place_name` varchar(100) NOT NULL,
  `place_id` int(100) NOT NULL AUTO_INCREMENT,
  `district_id` varchar(100) NOT NULL,
  PRIMARY KEY (`place_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_name`, `place_id`, `district_id`) VALUES
('Muvattupuzha', 1, '1'),
('Aluva', 10, '3'),
('Moonar', 9, '2'),
('Thodupuzha', 4, '2'),
('kattappana', 5, '2'),
('peerumedu', 6, '2'),
('devikulam', 7, '2'),
('Adimali', 8, '2'),
('vaittila', 11, '3'),
('kochi', 12, '3'),
('paravoor', 13, '3'),
('Muvattupuzha', 14, '3'),
('kanayannoor', 15, '3'),
('kunnathunadu', 16, '3'),
('kothamangalam', 17, '3'),
('cherai', 18, '3'),
('neyyattinkara', 19, '13'),
('vattiyoorkavu', 20, '13'),
('thaipparambu', 21, '8'),
('kuttanad', 22, '14'),
('erattupetta', 27, '4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
  `product_id` int(100) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(150) NOT NULL,
  `product_rate` varchar(150) NOT NULL,
  `product_details` varchar(150) NOT NULL,
  `product_image` varchar(150) NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_rate`, `product_details`, `product_image`, `category_id`) VALUES
(31, 'CLINDAMYCIN', '300', 'INFECTION PREVENTION AND CLEANING', 'photo_2023-11-11_11-48-53.jpg', 3),
(30, 'AMOXILIN', '300', 'ANTIBIOTIC', 'photo_2023-11-11_11-49-12.jpg', 1),
(29, 'PENCILIN', '650', 'INFECTION PREVENTION', 'photo_2023-11-11_11-49-17.jpg', 6),
(27, 'ORALONE', '200', 'MILD ACTIVE REAGENT FOR REDNESS REMOVAL IN GUM', 'photo_2023-11-11_11-49-26.jpg', 4),
(26, 'ORABASE HCA', '350', 'NEURAL PAIN KILLER AND REDNESS REMOVER', 'photo_2023-11-11_11-49-34.jpg', 4),
(25, 'ASPIRIN', '250', 'REDNESS REMOVER IN MOUTH', 'photo_2023-11-11_11-49-40.jpg', 3),
(23, 'IBUPROFEN', '450', 'PAIN KILLER USED FOR INTERNAL PAIN', 'photo_2023-11-11_11-49-44.jpg', 1),
(24, 'ACETAMINOPHEN', '200', 'PAINKILLER', 'photo_2023-11-11_11-49-49.jpg', 2),
(32, 'LIDOCAINE', '400', 'ANESTHETIC DRUG', 'photo_2023-11-11_11-49-02.jpg', 7),
(33, 'CARBOCAINE', '350', 'ANESTHETIC DRUG FOR NON ADULTS', 'photo_2023-11-11_11-48-53.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE IF NOT EXISTS `tbl_review` (
  `doctor_id` varchar(100) NOT NULL,
  `review_id` int(150) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(150) NOT NULL,
  `review_count` varchar(150) NOT NULL,
  `review_titile` varchar(150) NOT NULL,
  `review_content` varchar(150) NOT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE IF NOT EXISTS `tbl_service` (
  `service_id` int(100) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(100) NOT NULL,
  `service_details` varchar(100) NOT NULL,
  `service_rate` varchar(100) NOT NULL,
  `service_photo` varchar(100) NOT NULL,
  `type_id` varchar(100) NOT NULL,
  PRIMARY KEY (`service_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`service_id`, `service_name`, `service_details`, `service_rate`, `service_photo`, `type_id`) VALUES
(23, 'root canal', 'clearing the pores in tooths', '10000', 'OIP (1).jpeg', '11'),
(22, 'filling', 'filling the holed toots', '1400', 'R.jpeg', '10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slot`
--

CREATE TABLE IF NOT EXISTS `tbl_slot` (
  `slot_id` int(100) NOT NULL AUTO_INCREMENT,
  `slot_date` varchar(100) NOT NULL,
  `doctor_id` int(100) NOT NULL,
  `slot_count` varchar(100) NOT NULL,
  `slot_time` varchar(100) NOT NULL,
  PRIMARY KEY (`slot_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `tbl_slot`
--

INSERT INTO `tbl_slot` (`slot_id`, `slot_date`, `doctor_id`, `slot_count`, `slot_time`) VALUES
(11, '2023-11-15', 81, '10', '01:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_specification`
--

CREATE TABLE IF NOT EXISTS `tbl_specification` (
  `specification_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  PRIMARY KEY (`specification_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `tbl_specification`
--

INSERT INTO `tbl_specification` (`specification_id`, `doctor_id`, `type_id`) VALUES
(1, 81, 10),
(2, 81, 11),
(3, 81, 9),
(4, 82, 9),
(5, 82, 8),
(6, 82, 11),
(7, 82, 12),
(8, 83, 9),
(9, 83, 10),
(10, 83, 13),
(11, 83, 14),
(12, 83, 12),
(14, 84, 11),
(15, 84, 14),
(16, 84, 13),
(17, 84, 10),
(18, 84, 12),
(19, 84, 13),
(20, 84, 8),
(21, 84, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE IF NOT EXISTS `tbl_stock` (
  `stock_id` int(100) NOT NULL AUTO_INCREMENT,
  `stock_date` varchar(150) NOT NULL,
  `stock_quantity` varchar(150) NOT NULL,
  `product_id` varchar(150) NOT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_date`, `stock_quantity`, `product_id`) VALUES
(3, '2023-11-01', '100', ''),
(4, '2024-10-01', '150', ''),
(5, '2025-12-17', '200', ''),
(6, '2024-10-01', '100', ''),
(7, '2024-11-01', '100', ''),
(8, '2025-01-01', '250', ''),
(9, '2024-10-01', '150', ''),
(10, '2024-09-01', '100', ''),
(11, '2025-01-01', '300', ''),
(12, '2024-01-01', '300', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_type`
--

CREATE TABLE IF NOT EXISTS `tbl_type` (
  `type_id` int(100) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(100) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `tbl_type`
--

INSERT INTO `tbl_type` (`type_id`, `type_name`) VALUES
(9, 'Crowns'),
(8, 'Bridges'),
(10, 'Fillings'),
(11, 'Root canal treatments'),
(12, 'Scale  and polish'),
(13, 'Braces'),
(14, 'Wisdom tooth removal');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(100) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) NOT NULL,
  `user_contact` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `place_id` varchar(100) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `user_proof` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_uniqenumber` varchar(100) NOT NULL,
  `user_gender` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_contact`, `user_email`, `user_address`, `place_id`, `user_photo`, `user_proof`, `user_password`, `user_uniqenumber`, `user_gender`) VALUES
(16, 'Defin Biju', '9447783722', 'definbiju@gmail.com', 'thodupuzha', '1', 'Chrysanthemum.jpg', 'Desert.jpg', '214365', '', 'Male');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
