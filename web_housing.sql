-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2019 at 01:16 AM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `web_housing`
--
CREATE DATABASE IF NOT EXISTS `web_housing` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `web_housing`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_master`
--

CREATE TABLE IF NOT EXISTS `admin_master` (
  `admin_id` int(4) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(50) NOT NULL,
  `admin_passwd` varchar(20) NOT NULL,
  `admin_type` varchar(16) NOT NULL,
  `admin_profile` text,
  `admin_status` varchar(16) NOT NULL DEFAULT 'false',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `admin_master`
--

INSERT INTO `admin_master` (`admin_id`, `admin_username`, `admin_passwd`, `admin_type`, `admin_profile`, `admin_status`) VALUES
(1, 'adminpg@abc.com', 'pgadmin123', 'pg_admin', 'WebHousing_8d0adbf10af3eef179fdc922f2eb7c0f.jpg', 'false'),
(2, 'superadmin@abc.com', 'superadmin123', 'super_admin', 'WebHousing_d2d02d5f9099a30d977a1175fbeef655.jpg', 'true'),
(5, 'adminhostel@abc.com', 'hosteladmin123', 'hostel_admin', 'WebHousing_4fdb08c1731f21d3251ee21f19274d10.jpg', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `block_master`
--

CREATE TABLE IF NOT EXISTS `block_master` (
  `block_id` int(4) NOT NULL AUTO_INCREMENT,
  `block_name` varchar(10) NOT NULL,
  `block_division` varchar(10) NOT NULL,
  `block_status` varchar(10) NOT NULL,
  `hostel_id` int(4) NOT NULL,
  PRIMARY KEY (`block_id`),
  KEY `hostel_id` (`hostel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `block_master`
--

INSERT INTO `block_master` (`block_id`, `block_name`, `block_division`, `block_status`, `hostel_id`) VALUES
(1, 'A', 'A', 'Active', 1),
(2, 'B', 'B', 'Active', 1),
(3, 'A', 'A', 'active', 2),
(4, 'B', 'B', 'active', 3),
(5, 'A', 'A', 'Active', 4),
(6, 'A', 'A', 'Active', 5),
(7, 'B', 'B', 'Active', 6),
(8, 'A', 'A', 'Active', 7),
(9, 'A', 'A', 'Active', 8),
(11, 'A', 'A', 'Active', 10),
(12, 'A', 'A', 'Active', 11),
(13, 'A', 'A', 'Active', 11),
(14, 'A', 'A', 'Active', 12),
(15, 'A', 'A', 'Active', 13),
(16, 'A', 'A', 'Active', 14),
(17, 'A', 'A', 'Active', 15);

-- --------------------------------------------------------

--
-- Table structure for table `city_master`
--

CREATE TABLE IF NOT EXISTS `city_master` (
  `city_id` int(4) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(20) NOT NULL,
  `state_id` int(4) NOT NULL,
  PRIMARY KEY (`city_id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `city_master`
--

INSERT INTO `city_master` (`city_id`, `city_name`, `state_id`) VALUES
(1, 'Surat', 1),
(2, 'Ahemdabad', 1),
(3, 'Rajkot', 1),
(4, 'Baroda', 1),
(5, 'Bharuch', 1),
(7, 'Mumbai', 2),
(8, 'Pune', 2),
(9, 'Jodhpur', 3),
(10, 'Navi Mumbai', 2);

-- --------------------------------------------------------

--
-- Table structure for table `complaint_master`
--

CREATE TABLE IF NOT EXISTS `complaint_master` (
  `complaint_id` int(4) NOT NULL AUTO_INCREMENT,
  `complaint_name` varchar(30) NOT NULL,
  `complaint_email` text NOT NULL,
  `complaint_mobile` varchar(10) DEFAULT NULL,
  `complaint_subject` text,
  `complaint_details` text NOT NULL,
  PRIMARY KEY (`complaint_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `complaint_master`
--

INSERT INTO `complaint_master` (`complaint_id`, `complaint_name`, `complaint_email`, `complaint_mobile`, `complaint_subject`, `complaint_details`) VALUES
(3, 'Sagar Pipaliya', 'sagarpipaliya07@gmail.com', '8905495900', 'xyz', 'tiffin');

-- --------------------------------------------------------

--
-- Table structure for table `country_master`
--

CREATE TABLE IF NOT EXISTS `country_master` (
  `country_id` int(4) NOT NULL AUTO_INCREMENT,
  `country_name` varchar(20) NOT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `country_master`
--

INSERT INTO `country_master` (`country_id`, `country_name`) VALUES
(1, 'India');

-- --------------------------------------------------------

--
-- Table structure for table `emp_master`
--

CREATE TABLE IF NOT EXISTS `emp_master` (
  `emp_id` int(4) NOT NULL AUTO_INCREMENT,
  `block_id` int(4) NOT NULL,
  `emp_name` varchar(50) NOT NULL,
  `emp_email` varchar(50) NOT NULL,
  `emp_gender` varchar(10) NOT NULL,
  `emp_dob` varchar(10) NOT NULL,
  `emp_doj` varchar(10) NOT NULL,
  `emp_desig` varchar(30) NOT NULL,
  `emp_address` varchar(50) NOT NULL,
  `emp_salary` varchar(10) NOT NULL,
  `emp_status` varchar(10) NOT NULL DEFAULT 'Active',
  `emp_profile` varchar(100) NOT NULL,
  PRIMARY KEY (`emp_id`),
  KEY `block_id` (`block_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `emp_master`
--

INSERT INTO `emp_master` (`emp_id`, `block_id`, `emp_name`, `emp_email`, `emp_gender`, `emp_dob`, `emp_doj`, `emp_desig`, `emp_address`, `emp_salary`, `emp_status`, `emp_profile`) VALUES
(3, 1, 'Sagar Pipaliya', 'sagar@gmail.com', 'male', '1986-04-19', '2017-06-22', 'Worker', 'Katargam Darvaja Surat', '12000', '', 'WebHousing_3bd8fdb090f1f5eb66a00c84dbc5ad51.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_master`
--

CREATE TABLE IF NOT EXISTS `feedback_master` (
  `feedback_id` int(4) NOT NULL AUTO_INCREMENT,
  `feedback_name` varchar(30) NOT NULL,
  `feedback_email` varchar(50) NOT NULL,
  `feedback_msg` text NOT NULL,
  `feedback_rate` varchar(10) NOT NULL,
  PRIMARY KEY (`feedback_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `feedback_master`
--

INSERT INTO `feedback_master` (`feedback_id`, `feedback_name`, `feedback_email`, `feedback_msg`, `feedback_rate`) VALUES
(1, 'Sagar Pipaliya', 'sagarpipaliya07@gmail.com', 'Very nice', 'Good');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_bill_master`
--

CREATE TABLE IF NOT EXISTS `hostel_bill_master` (
  `bill_no` varchar(10) NOT NULL,
  `reg_id` int(4) NOT NULL,
  `reg_email` text NOT NULL,
  `hostel_id` int(4) NOT NULL,
  `bill_amount` float NOT NULL,
  `bill_details` text NOT NULL,
  `bill_date` date NOT NULL,
  `bill_due_date` date NOT NULL,
  `bill_status` varchar(10) NOT NULL DEFAULT 'paid',
  `bill_logo` text,
  PRIMARY KEY (`bill_no`),
  KEY `reg_id` (`reg_id`),
  KEY `hostel_id` (`hostel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hostel_bill_master`
--

INSERT INTO `hostel_bill_master` (`bill_no`, `reg_id`, `reg_email`, `hostel_id`, `bill_amount`, `bill_details`, `bill_date`, `bill_due_date`, `bill_status`, `bill_logo`) VALUES
('WH4514', 30, 'keshav@gmail.com', 5, 10000, 'Payment is paid by online transection', '2019-04-18', '2019-04-30', 'paid', 'logo3.png'),
('WH6055', 27, 'sagar@gmail.com', 8, 12000, 'success', '2019-04-17', '2019-05-01', 'paid', 'logo3.png'),
('WH803', 33, 'sagarpipaliya07@gmail.com', 5, 13000, 'online paid', '2019-04-20', '2019-04-24', 'paid', 'logo3.png'),
('WH9336', 29, 'ankit@gmail.com', 5, 10000, 'success', '2019-04-17', '2019-05-01', 'paid', 'logo3.png');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_booking_master`
--

CREATE TABLE IF NOT EXISTS `hostel_booking_master` (
  `hostel_booking_id` int(4) NOT NULL AUTO_INCREMENT,
  `reg_id` int(4) NOT NULL,
  `hostel_id` int(4) NOT NULL,
  `hostel_payment_status` text NOT NULL,
  `hostel_amount` text NOT NULL,
  `hostel_transaction_id` text NOT NULL,
  `hostel_booking_date` varchar(50) NOT NULL,
  PRIMARY KEY (`hostel_booking_id`),
  KEY `reg_id` (`reg_id`),
  KEY `hostel_id` (`hostel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `hostel_booking_master`
--

INSERT INTO `hostel_booking_master` (`hostel_booking_id`, `reg_id`, `hostel_id`, `hostel_payment_status`, `hostel_amount`, `hostel_transaction_id`, `hostel_booking_date`) VALUES
(1, 17, 3, 'success', '12000', 'xyz123456789', '04/20/2019'),
(2, 33, 2, 'success', '13000', 'abcxyz123', '04/20/2019');

-- --------------------------------------------------------

--
-- Table structure for table `hostel_master`
--

CREATE TABLE IF NOT EXISTS `hostel_master` (
  `hostel_id` int(4) NOT NULL AUTO_INCREMENT,
  `hostel_name` varchar(100) NOT NULL,
  `hostel_address` text NOT NULL,
  `hostel_details` text,
  `hostel_pincode` int(6) NOT NULL,
  `hostel_phone` varchar(13) NOT NULL,
  `city_id` int(4) NOT NULL,
  `hostel_rent` varchar(10) NOT NULL,
  `hostel_image` text,
  PRIMARY KEY (`hostel_id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `hostel_master`
--

INSERT INTO `hostel_master` (`hostel_id`, `hostel_name`, `hostel_address`, `hostel_details`, `hostel_pincode`, `hostel_phone`, `city_id`, `hostel_rent`, `hostel_image`) VALUES
(1, 'Jamnadas Patel Hostel', '45,Ring Rd, Near RTO,  Majura Gate,Surat', 'Hostel contains free wifi for the students & it also provides the students mess.\nStudents can read the books or can issue the books from the liabrary.\nMesscard also provided by hostel.', 395002, '9658741200', 1, '10000', 'WebHousing_3bd8fdb090f1f5eb66a00c84dbc5ad51.jpg'),
(2, 'Jyotiba fule hostel', '50,Canal Rd, Ambanagar, Surat, ', 'Hostel contains free wifi for the students & it also provides the students mess.\nStudents can read the books or can issue the books from the liabrary.\nMesscard also provided by hostel.\n', 395017, '9965874545', 1, '12500', 'FemaleDorm_8Bed_01_1_1000x800.jpg'),
(3, 'kalubhai patel hostel for Girls', '931-32 Mullaji, Devdi Road, Zampa Bazaar, Begampura, Surat', 'Hostel contains free wifi for the students & it also provides the students mess.\nStudents can read the books or can issue the books from the liabrary.\nMesscard also provided by hostel.\n', 395003, '9658741200', 1, '12000', 'hlemmur-rooms-high-res_07.jpg'),
(4, 'Bhavsar Hostel', '132 Feet Ring Rd, Champak Nagar, Nava Vadaj, Ahmedabad.', 'Hostel contains free wifi for the students & it also provides the students mess.\r\nStudents can read the books or can issue the books from the liabrary.\r\nMesscard also provided by hostel.', 380013, '79276 46615', 2, '12500', 'IMG_7022.jpg'),
(5, 'Shiv Hostel', '8, Nr. Gota Cross Road, Gota, Ahmedabad.', 'Hostel contains free wifi for the students & it also provides the students mess.\nStudents can read the books or can issue the books from the liabrary.\nMesscard also provided by hostel.', 382481, '99137 72465', 2, '13000', 'shiv hostel.jpg'),
(6, 'Lounge Boys Hostel', 'Kalawad Road Nr. K.K.V. Hall, Bharatvan Society, Rajkot.', 'Hostel contains free wifi for the students & it also provides the students mess.\nStudents can read the books or can issue the books from the liabrary.\nMesscard also provided by hostel.', 360001, '090336 76485', 3, '8500', 'the-lady-indian-hostel-for-womens-fair-lands-salem-hostels-for-women-2dd9cqk.jpg'),
(7, 'Shree Marutinandan Boy''s Hostel', 'A/2 venus society, Ajwa Ring Rd, Rampark Society, Bapod, Waghodia, Vadodara. ', 'Hostel contains free wifi for the students & it also provides the students mess.\nStudents can read the books or can issue the books from the liabrary.\nMesscard also provided by hostel.', 390019, '082383 14859', 4, '11000', 'hlemmur-rooms-high-res_07.jpg'),
(8, 'Jiviba Girls Hostel', 'Devraj Building, Opp, Arya Kanya Rd, Karelibagh, Vadodara.', 'Hostel contains free wifi for the students & it also provides the students mess.\nStudents can read the books or can issue the books from the liabrary.\nMesscard also provided by hostel.', 390018, '0265 248 1877', 4, '9500', '819_20151202111217_0386887001449054737_344_Zostel37_1000x800.jpg'),
(9, 'Bhrugu Boys Hostel', '44, Jilla Panchayat Colony, Maktampur, Bharuch.', 'Hostel contains free wifi for the students & it also provides the students mess.\nStudents can read the books or can issue the books from the liabrary.\nMesscard also provided by hostel.', 392012, '0264 2245279', 5, '10500', 'the-lady-indian-hostel-for-womens-fair-lands-salem-hostels-for-women-2dd9cqk.jpg'),
(10, 'VJTI Boys'' Hostel', '21, H.R.D. Soc., H R Mahajani Rd, Matunga, Mumbai.', 'Hostel contains free wifi for the students & it also provides the students mess.\nStudents can read the books or can issue the books from the liabrary.\nMesscard also provided by hostel.', 400019, '02224198262', 7, '14500', 'WebHousing_f94778df58fec780ff952344ac5a2442.jpg'),
(11, 'Telang Memorial Hostel (Girls'' Hostel)', '43-44, Shukla Rd, Churchgate, Mumbai.', 'Hostel contains free wifi for the students & it also provides the students mess.\nStudents can read the books or can issue the books from the liabrary.\nMesscard also provided by hostel.', 400020, '9630014687', 7, '14000', '819_20151202111217_0386887001449054737_344_Zostel37_1000x800.jpg'),
(12, 'Gaytri Boys Hostel\r\n', 'Plot No.44,, Mire lay-out, Bapu Nagar, Nandanvan, Jodhpur.', 'Hostel contains free wifi for the students & it also provides the students mess.\nStudents can read the books or can issue the books from the liabrary.\nMesscard also provided by hostel.', 342004, '9890721819', 9, '13500', 'hlemmur-rooms-high-res_07.jpg'),
(13, 'Samaj Kalyan Hostel', '40, Yashwantnagar, Shanti Nagar, Visharant Wadi, Pune.', 'Hostel contains free wifi for the students & it also provides the students mess.\nStudents can read the books or can issue the books from the liabrary.\nMesscard also provided by hostel.', 411006, '8459499036', 8, '13500', 'shiv hostel.jpg'),
(14, 'Yashlaxmi Girls Hostel Pune', '15A/11, Yashlaxmi Niwas, Karve Road, Erandwane, Pune.', 'Hostel contains free wifi for the students & it also provides the students mess.\nStudents can read the books or can issue the books from the liabrary.\nMesscard also provided by hostel.', 411004, '098223 32881', 8, '13500', 'the-lady-indian-hostel-for-womens-fair-lands-salem-hostels-for-women-2dd9cqk.jpg'),
(15, 'Youth Hostel', 'G-29, Sector 12, Saoukhya, Sector 12, Kharghar, Navi Mumbai.', 'Hostel contains free wifi for the students & it also provides the students mess.\nStudents can read the books or can issue the books from the liabrary.\nMesscard also provided by hostel.', 410210, '9035010503', 10, '12000', 'FemaleDorm_8Bed_01_1_1000x800.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `landlord_master`
--

CREATE TABLE IF NOT EXISTS `landlord_master` (
  `landlord_id` int(4) NOT NULL AUTO_INCREMENT,
  `landlord_name` varchar(50) NOT NULL,
  `landlord_email` varchar(50) NOT NULL,
  `landlord_password` varchar(20) NOT NULL,
  `landlord_mobile` varchar(10) NOT NULL,
  `landlord_address` varchar(50) NOT NULL,
  `city_id` int(4) NOT NULL,
  `landlord_bill_proof` text NOT NULL,
  `landlord_profile` text,
  PRIMARY KEY (`landlord_id`),
  KEY `city_id` (`city_id`),
  KEY `city_id_2` (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `landlord_master`
--

INSERT INTO `landlord_master` (`landlord_id`, `landlord_name`, `landlord_email`, `landlord_password`, `landlord_mobile`, `landlord_address`, `city_id`, `landlord_bill_proof`, `landlord_profile`) VALUES
(1, 'Jayesh', 'jayesh@abc.com', 'jayesh123', '9977558896', '105,Yojna Apartment, Gotala VAdi, Surat', 1, 'WebHousing_12393925f78a9de049e6c789ba8931e3.jpg', 'WebHousing_6af43134012608c0541929ddee8611e5.png'),
(2, 'Rahul Patel', 'rahulpatel88@gmail.com', 'rahulpatel123', '8797959595', '45,Radhe colony, Nr. Delhi Gate, Mumbai', 7, 'WebHousing_12393925f78a9de049e6c789ba8931e2.jpg', 'WebHousing_c1a84600fd333fe243ecd84f9032487b.jpg'),
(3, 'kantilal maheta', 'kantilal@gmail.com', 'kantilal123', '8794561345', '105,Lok App., Nr. Sardar cirlce, Ahmedabad', 2, 'WebHousing_1a7913466c824529cbea91879788783f.jpg', 'user.png'),
(30, 'Janak Patel', 'janak@abc.com', 'janko123', '9658745569', 'Katargam', 2, 'WebHousing_8978541db4bef249b0310af96a64ccc0.jpg', 'WebHousing_d64a7d16e0305fca45865a480f9d5718.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messcard_bill_master`
--

CREATE TABLE IF NOT EXISTS `messcard_bill_master` (
  `bill_id` varchar(10) NOT NULL,
  `reg_id` int(4) NOT NULL,
  `reg_email` text NOT NULL,
  `hostel_id` int(4) NOT NULL,
  `messcard_id` int(4) NOT NULL,
  `bill_amount` float NOT NULL,
  `bill_details` text NOT NULL,
  `bill_date` date NOT NULL,
  `bill_due_date` date NOT NULL,
  `bill_status` varchar(10) NOT NULL DEFAULT 'Paid',
  `bill_logo` text NOT NULL,
  PRIMARY KEY (`bill_id`),
  KEY `reg_id` (`reg_id`,`hostel_id`,`messcard_id`),
  KEY `hostel_id` (`hostel_id`,`messcard_id`),
  KEY `reg_id_2` (`reg_id`),
  KEY `messcard_id` (`messcard_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messcard_bill_master`
--

INSERT INTO `messcard_bill_master` (`bill_id`, `reg_id`, `reg_email`, `hostel_id`, `messcard_id`, `bill_amount`, `bill_details`, `bill_date`, `bill_due_date`, `bill_status`, `bill_logo`) VALUES
('WH1377', 17, 'dharaiyakrunal99@gmail.com', 3, 4, 5000, 'online paid', '2019-04-20', '2019-04-25', 'Paid', 'logo3.png');

-- --------------------------------------------------------

--
-- Table structure for table `mess_card_master`
--

CREATE TABLE IF NOT EXISTS `mess_card_master` (
  `mess_card_id` int(4) NOT NULL AUTO_INCREMENT,
  `hostel_id` int(4) NOT NULL,
  `mess_card_amount` float NOT NULL,
  `mess_card_duration` varchar(10) NOT NULL DEFAULT '6 months',
  PRIMARY KEY (`mess_card_id`),
  KEY `hostel_id` (`hostel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `mess_card_master`
--

INSERT INTO `mess_card_master` (`mess_card_id`, `hostel_id`, `mess_card_amount`, `mess_card_duration`) VALUES
(2, 1, 3000, '6 months'),
(3, 2, 4500, '6 months'),
(4, 3, 5000, '6 months');

-- --------------------------------------------------------

--
-- Table structure for table `pg_bill_master`
--

CREATE TABLE IF NOT EXISTS `pg_bill_master` (
  `bill_id` varchar(10) NOT NULL,
  `reg_id` int(4) NOT NULL,
  `reg_email` text NOT NULL,
  `pg_id` int(4) NOT NULL,
  `landlord_id` int(4) NOT NULL,
  `bill_amount` float NOT NULL,
  `bill_details` text NOT NULL,
  `bill_date` date NOT NULL,
  `bill_due_date` date NOT NULL,
  `bill_status` varchar(10) NOT NULL,
  `bill_logo` text NOT NULL,
  PRIMARY KEY (`bill_id`),
  KEY `reg_id` (`reg_id`,`pg_id`,`landlord_id`),
  KEY `reg_id_2` (`reg_id`),
  KEY `pg_id` (`pg_id`),
  KEY `landlord_id` (`landlord_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pg_booking_master`
--

CREATE TABLE IF NOT EXISTS `pg_booking_master` (
  `pg_booking_id` int(4) NOT NULL AUTO_INCREMENT,
  `reg_id` int(4) NOT NULL,
  `pg_id` int(4) NOT NULL,
  `pg_payment_status` text NOT NULL,
  `pg_amount` text NOT NULL,
  `pg_transaction_id` text NOT NULL,
  `pg_booking_date` varchar(50) NOT NULL,
  PRIMARY KEY (`pg_booking_id`),
  KEY `reg_id` (`reg_id`),
  KEY `pg_id` (`pg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pg_booking_master`
--

INSERT INTO `pg_booking_master` (`pg_booking_id`, `reg_id`, `pg_id`, `pg_payment_status`, `pg_amount`, `pg_transaction_id`, `pg_booking_date`) VALUES
(1, 34, 7, 'success', '8000', 'abcxyz123', '04/20/2019');

-- --------------------------------------------------------

--
-- Table structure for table `pg_master`
--

CREATE TABLE IF NOT EXISTS `pg_master` (
  `pg_id` int(4) NOT NULL AUTO_INCREMENT,
  `landlord_id` int(4) NOT NULL,
  `pg_photo` text NOT NULL,
  `pg_details` text NOT NULL,
  `pg_address` varchar(50) NOT NULL,
  `city_id` int(4) NOT NULL,
  `pg_rent` float NOT NULL,
  PRIMARY KEY (`pg_id`),
  KEY `city_id` (`city_id`),
  KEY `landlord_id` (`landlord_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `pg_master`
--

INSERT INTO `pg_master` (`pg_id`, `landlord_id`, `pg_photo`, `pg_details`, `pg_address`, `city_id`, `pg_rent`) VALUES
(6, 1, 'WebHousing_b32199a0538e3ef5224304b33e84cc05.jpg', 'Classic Home, Very Quality Maintained Area.', '45,Ring Rd, Near RTO,  Majura Gate,Surat', 1, 8000),
(7, 2, 'pg 5.jpg', 'There is 3 Rooms Available. Also Parking Facility is available. Rules Are Cumpalsary.  ', '206,Radhe complex, Nr. Kakariya Lake, Ahmedabad ', 2, 8000),
(8, 3, 'pg 6.jpg', 'There is 2 Rooms Available. Also Parking Facility is available. Rules Are Cumpalsary.  ', '55,Charasi chol, Nr. Gandhi Circle, Mumbai.', 7, 9000),
(10, 30, 'WebHousing_1faf12ad4c5c6e4a7a39bb72314c2868.jpg', 'I want to rent my room for students & employees', 'Kamati Baag', 2, 12500);

-- --------------------------------------------------------

--
-- Table structure for table `reg_master`
--

CREATE TABLE IF NOT EXISTS `reg_master` (
  `reg_id` int(4) NOT NULL AUTO_INCREMENT,
  `reg_name` varchar(30) NOT NULL,
  `reg_email` varchar(100) NOT NULL,
  `reg_passwd` text NOT NULL,
  `reg_gender` varchar(10) NOT NULL,
  `reg_dob` varchar(10) NOT NULL,
  `reg_stud_profile` varchar(100) NOT NULL DEFAULT 'user.png',
  `reg_blood_grp` varchar(10) NOT NULL,
  `reg_type` varchar(100) NOT NULL,
  `reg_mobile` varchar(10) NOT NULL,
  `reg_address` varchar(100) NOT NULL,
  `city_id` int(4) NOT NULL,
  `reg_gov_proof` varchar(100) NOT NULL,
  `reg_uniq_id` text NOT NULL,
  PRIMARY KEY (`reg_id`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `reg_master`
--

INSERT INTO `reg_master` (`reg_id`, `reg_name`, `reg_email`, `reg_passwd`, `reg_gender`, `reg_dob`, `reg_stud_profile`, `reg_blood_grp`, `reg_type`, `reg_mobile`, `reg_address`, `city_id`, `reg_gov_proof`, `reg_uniq_id`) VALUES
(17, 'Krunal Dharaiya ', 'dharaiyakrunal99@gmail.com', 'kmgajjar5418', 'Male', '1999-12-05', 'WebHousing_88bdb43ff4bbee4bca2d346bc41dd2d3.jpg', 'AB+', 'Student', '8460281309', '99,Saritavihar Society,Bombay Market Road, Surat', 1, 'WebHousing_b3549d485efe98cf6f50def1d7cae903.jpg', '1265505751'),
(33, 'Sagar Pipaliya', 'sagarpipaliya07@gmail.com', 'sagar3010', 'Male', '1998-03-01', 'WebHousing_15189eec157ebcbb87305cbabdf6e9d7.jpg', 'A+', 'Student', '8905495900', '112,Yoginagar Society, Dabholi Road, Surat', 1, 'WebHousing_3001bb76cf22c9537e9f0784fce6031c.jpg', '123456789'),
(34, 'Nikunj Katariya', 'nikunjkatriya1999@gmail.com', 'nikunj4368', 'Male', '1999-11-02', 'WebHousing_36b7d7cd8fbf7f1db79fc8527770a788.jpeg', 'A+', 'Student', '8264632490', '15,Yoginagar Society, Dabholi Road, Surat.', 1, 'WebHousing_b3549d485efe98cf6f50def1d7cae902.jpg', '1122233654');

-- --------------------------------------------------------

--
-- Table structure for table `room_master`
--

CREATE TABLE IF NOT EXISTS `room_master` (
  `room_id` int(4) NOT NULL AUTO_INCREMENT,
  `block_id` int(4) NOT NULL,
  `room_beds` int(5) NOT NULL,
  `room_type` varchar(10) NOT NULL,
  `room_details` varchar(100) NOT NULL,
  `room_status` varchar(10) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`room_id`),
  KEY `block_id` (`block_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `room_master`
--

INSERT INTO `room_master` (`room_id`, `block_id`, `room_beds`, `room_type`, `room_details`, `room_status`) VALUES
(1, 1, 6, 'non-A/c', 'Non A/c type room', '-1'),
(2, 2, 2, 'non A/c', 'A/c Room with 2 cupboard', '-1'),
(3, 3, 4, 'non-A/c', 'Non a/c room ', '-1'),
(4, 4, 4, 'non-A/c', 'Non a/c room', '-1'),
(5, 5, 5, 'non A/c', 'Non a/c room', '-1'),
(6, 6, 4, 'non A/c', 'Non a/c room', '-1'),
(7, 7, 6, 'non A/c', 'Non a/c room', '-1'),
(8, 8, 6, 'non A/c', 'Non a/c room', '-1'),
(9, 9, 4, 'non A/c', 'Non a/c room', '-1'),
(11, 11, 7, 'non A/c', 'Non a/c room', '-1'),
(12, 12, 5, 'non A/c', 'Non a/c room', '-1'),
(13, 13, 6, 'non A/c', 'Non a/c room', '-1'),
(14, 14, 4, 'non A/c', 'Non a/c room', '-1'),
(15, 15, 5, 'non A/c', 'Non a/c room', '-1'),
(16, 16, 5, 'non A/c', 'Non a/c room', '-1'),
(17, 5, 5, 'non A/c', 'Non a/c room', '-1');

-- --------------------------------------------------------

--
-- Table structure for table `state_master`
--

CREATE TABLE IF NOT EXISTS `state_master` (
  `state_id` int(4) NOT NULL AUTO_INCREMENT,
  `state_name` varchar(20) NOT NULL,
  `country_id` int(4) NOT NULL,
  PRIMARY KEY (`state_id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `state_master`
--

INSERT INTO `state_master` (`state_id`, `state_name`, `country_id`) VALUES
(1, 'Gujarat', 1),
(2, 'Maharastra', 1),
(3, 'Rajasthan', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stud_room_allotment`
--

CREATE TABLE IF NOT EXISTS `stud_room_allotment` (
  `allotment_id` int(4) NOT NULL AUTO_INCREMENT,
  `room_id` int(4) NOT NULL,
  `reg_id` text NOT NULL,
  PRIMARY KEY (`allotment_id`),
  KEY `pg_id` (`room_id`),
  KEY `pg_id_2` (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `stud_room_allotment`
--

INSERT INTO `stud_room_allotment` (`allotment_id`, `room_id`, `reg_id`) VALUES
(2, 2, '32');

-- --------------------------------------------------------

--
-- Table structure for table `tiffin_attendance_master`
--

CREATE TABLE IF NOT EXISTS `tiffin_attendance_master` (
  `attendance_id` int(4) NOT NULL AUTO_INCREMENT,
  `tiffin_id` int(4) NOT NULL,
  `reg_id` int(4) NOT NULL,
  `attendance_date` date NOT NULL,
  PRIMARY KEY (`attendance_id`),
  KEY `tifin_id` (`tiffin_id`),
  KEY `tifin_source_id` (`tiffin_id`),
  KEY `tifin_id_2` (`tiffin_id`),
  KEY `reg_id` (`reg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Table structure for table `tiffin_bill_master`
--

CREATE TABLE IF NOT EXISTS `tiffin_bill_master` (
  `bill_id` varchar(10) NOT NULL,
  `reg_id` int(4) NOT NULL,
  `reg_email` text NOT NULL,
  `tiffin_id` int(4) NOT NULL,
  `bill_amount` float NOT NULL,
  `bill_details` text NOT NULL,
  `bill_date` date NOT NULL,
  `bill_due_date` date NOT NULL,
  `bill_status` varchar(10) NOT NULL,
  `bill_logo` text NOT NULL,
  PRIMARY KEY (`bill_id`),
  KEY `reg_id` (`reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tiffin_master`
--

CREATE TABLE IF NOT EXISTS `tiffin_master` (
  `tiffin_id` int(4) NOT NULL AUTO_INCREMENT,
  `reg_id` int(4) NOT NULL,
  `meal_time` varchar(10) NOT NULL,
  `meal_type` varchar(10) NOT NULL,
  `meal_duration` varchar(10) NOT NULL,
  `meal_week` varchar(10) NOT NULL,
  `meal_qty` varchar(10) NOT NULL,
  `meal_date` varchar(10) NOT NULL,
  `meal_amount` text NOT NULL,
  `meal_transaction_id` text NOT NULL,
  PRIMARY KEY (`tiffin_id`),
  KEY `reg_id` (`reg_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tiffin_master`
--

INSERT INTO `tiffin_master` (`tiffin_id`, `reg_id`, `meal_time`, `meal_type`, `meal_duration`, `meal_week`, `meal_qty`, `meal_date`, `meal_amount`, `meal_transaction_id`) VALUES
(1, 34, 'Lunch', 'Veg', '3 Month', '5', '2', '04/20/2019', '23040', 'abczyx123');

-- --------------------------------------------------------

--
-- Table structure for table `tiffin_type_master`
--

CREATE TABLE IF NOT EXISTS `tiffin_type_master` (
  `tiffin_type_id` int(4) NOT NULL AUTO_INCREMENT,
  `tiffin_type` varchar(10) NOT NULL,
  `tiffin_price` varchar(10) NOT NULL,
  `tiffin_source_id` int(4) NOT NULL,
  PRIMARY KEY (`tiffin_type_id`),
  KEY `tiffin_source_id` (`tiffin_source_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tiffin_type_master`
--

INSERT INTO `tiffin_type_master` (`tiffin_type_id`, `tiffin_type`, `tiffin_price`, `tiffin_source_id`) VALUES
(1, 'Veg', '80', 1),
(2, 'Non-veg', '90', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tifin_source_master`
--

CREATE TABLE IF NOT EXISTS `tifin_source_master` (
  `tifin_source_id` int(4) NOT NULL AUTO_INCREMENT,
  `tifin_source_name` text NOT NULL,
  `tifin_source_address` text NOT NULL,
  `tifin_source_phone` varchar(10) NOT NULL,
  PRIMARY KEY (`tifin_source_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tifin_source_master`
--

INSERT INTO `tifin_source_master` (`tifin_source_id`, `tifin_source_name`, `tifin_source_address`, `tifin_source_phone`) VALUES
(1, 'Shree Ram Tiffin Service', '14, Yojnapark society NR Lambe Hanuman Road, Surat 395006', '9986657412');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_master`
--

CREATE TABLE IF NOT EXISTS `visitor_master` (
  `visitor_id` int(4) NOT NULL AUTO_INCREMENT,
  `visitor_name` varchar(50) NOT NULL,
  `visitor_email` text NOT NULL,
  `visitor_relation` varchar(20) NOT NULL,
  `visitor_mobile` varchar(10) NOT NULL,
  `visitor_comment` varchar(20) NOT NULL,
  `visitor_date` varchar(10) NOT NULL,
  `visitor_time` varchar(10) NOT NULL,
  `visitor_subject` text,
  `visitor_unique_no` text NOT NULL,
  `reg_uniq_id` text NOT NULL,
  `hostel_id` int(4) NOT NULL,
  `visitor_status` varchar(10) NOT NULL,
  PRIMARY KEY (`visitor_id`),
  KEY `hostel_id` (`hostel_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `visitor_master`
--

INSERT INTO `visitor_master` (`visitor_id`, `visitor_name`, `visitor_email`, `visitor_relation`, `visitor_mobile`, `visitor_comment`, `visitor_date`, `visitor_time`, `visitor_subject`, `visitor_unique_no`, `reg_uniq_id`, `hostel_id`, `visitor_status`) VALUES
(1, 'sagar', 'sagar@abc.com', 'ssf', '2147483647', 'adGKNldahlgfasf', '2018-02-25', '10:00', 'hjj', '1137796942', '123456789', 1, 'active'),
(7, 'Jay', 'jay@abc.com', 'xyz', '9966332255', 'fnsdjbfjsa', '2019-04-15', '12:00', 'asad', 'WH704562', '1165960758', 3, 'active'),
(8, 'Jank', 'janakpatel@gmail.com', 'father', '9658741200', 'nothing', '2019-04-20', '12:00', 'meeting', 'WH611517', '123456789', 2, 'active');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `block_master`
--
ALTER TABLE `block_master`
  ADD CONSTRAINT `block_master_ibfk_1` FOREIGN KEY (`hostel_id`) REFERENCES `hostel_master` (`hostel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `city_master`
--
ALTER TABLE `city_master`
  ADD CONSTRAINT `city_master_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state_master` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `emp_master`
--
ALTER TABLE `emp_master`
  ADD CONSTRAINT `emp_master_ibfk_1` FOREIGN KEY (`block_id`) REFERENCES `block_master` (`block_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hostel_booking_master`
--
ALTER TABLE `hostel_booking_master`
  ADD CONSTRAINT `hostel_booking_master_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `reg_master` (`reg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hostel_booking_master_ibfk_2` FOREIGN KEY (`hostel_id`) REFERENCES `hostel_master` (`hostel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hostel_master`
--
ALTER TABLE `hostel_master`
  ADD CONSTRAINT `hostel_master_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city_master` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `landlord_master`
--
ALTER TABLE `landlord_master`
  ADD CONSTRAINT `landlord_master_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city_master` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messcard_bill_master`
--
ALTER TABLE `messcard_bill_master`
  ADD CONSTRAINT `messcard_bill_master_ibfk_1` FOREIGN KEY (`hostel_id`) REFERENCES `hostel_master` (`hostel_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messcard_bill_master_ibfk_2` FOREIGN KEY (`reg_id`) REFERENCES `reg_master` (`reg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messcard_bill_master_ibfk_3` FOREIGN KEY (`messcard_id`) REFERENCES `mess_card_master` (`mess_card_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mess_card_master`
--
ALTER TABLE `mess_card_master`
  ADD CONSTRAINT `mess_card_master_ibfk_1` FOREIGN KEY (`hostel_id`) REFERENCES `hostel_master` (`hostel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pg_bill_master`
--
ALTER TABLE `pg_bill_master`
  ADD CONSTRAINT `pg_bill_master_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `reg_master` (`reg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pg_bill_master_ibfk_2` FOREIGN KEY (`pg_id`) REFERENCES `pg_master` (`pg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pg_bill_master_ibfk_3` FOREIGN KEY (`landlord_id`) REFERENCES `landlord_master` (`landlord_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pg_booking_master`
--
ALTER TABLE `pg_booking_master`
  ADD CONSTRAINT `pg_booking_master_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `reg_master` (`reg_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pg_booking_master_ibfk_2` FOREIGN KEY (`pg_id`) REFERENCES `pg_master` (`pg_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pg_master`
--
ALTER TABLE `pg_master`
  ADD CONSTRAINT `pg_master_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city_master` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pg_master_ibfk_2` FOREIGN KEY (`landlord_id`) REFERENCES `landlord_master` (`landlord_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reg_master`
--
ALTER TABLE `reg_master`
  ADD CONSTRAINT `reg_master_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city_master` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `room_master`
--
ALTER TABLE `room_master`
  ADD CONSTRAINT `room_master_ibfk_1` FOREIGN KEY (`block_id`) REFERENCES `block_master` (`block_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `state_master`
--
ALTER TABLE `state_master`
  ADD CONSTRAINT `state_master_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country_master` (`country_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stud_room_allotment`
--
ALTER TABLE `stud_room_allotment`
  ADD CONSTRAINT `stud_room_allotment_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room_master` (`room_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tiffin_attendance_master`
--
ALTER TABLE `tiffin_attendance_master`
  ADD CONSTRAINT `tiffin_attendance_master_ibfk_1` FOREIGN KEY (`tiffin_id`) REFERENCES `tiffin_master` (`tiffin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiffin_attendance_master_ibfk_2` FOREIGN KEY (`reg_id`) REFERENCES `reg_master` (`reg_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tiffin_master`
--
ALTER TABLE `tiffin_master`
  ADD CONSTRAINT `tiffin_master_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `reg_master` (`reg_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tiffin_type_master`
--
ALTER TABLE `tiffin_type_master`
  ADD CONSTRAINT `tiffin_type_master_ibfk_1` FOREIGN KEY (`tiffin_source_id`) REFERENCES `tifin_source_master` (`tifin_source_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visitor_master`
--
ALTER TABLE `visitor_master`
  ADD CONSTRAINT `visitor_master_ibfk_1` FOREIGN KEY (`hostel_id`) REFERENCES `hostel_master` (`hostel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
