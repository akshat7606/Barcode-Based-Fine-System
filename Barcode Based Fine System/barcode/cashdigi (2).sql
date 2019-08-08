-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2015 at 01:30 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cashdigi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `master_cardno`
--

CREATE TABLE IF NOT EXISTS `master_cardno` (
  `barcode` bigint(20) NOT NULL,
  PRIMARY KEY (`barcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_cardno`
--

INSERT INTO `master_cardno` (`barcode`) VALUES
(6048631204912243);

-- --------------------------------------------------------

--
-- Table structure for table `master_usertype`
--

CREATE TABLE IF NOT EXISTS `master_usertype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usertype` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usertype` (`usertype`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `pay_types`
--

CREATE TABLE IF NOT EXISTS `pay_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `types` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `types` (`types`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pay_types`
--

INSERT INTO `pay_types` (`id`, `types`) VALUES
(3, 'EXAMFORMFEE'),
(2, 'FINE'),
(7, 'LAB FINE'),
(4, 'LIBRARY FINE'),
(5, 'SPORTS FINE'),
(1, 'TUITION FEE');

-- --------------------------------------------------------

--
-- Table structure for table `std_amount`
--

CREATE TABLE IF NOT EXISTS `std_amount` (
  `cardno` bigint(20) NOT NULL,
  `amount` double NOT NULL,
  PRIMARY KEY (`cardno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `std_amount`
--

INSERT INTO `std_amount` (`cardno`, `amount`) VALUES
(6048631204912243, 8000);

-- --------------------------------------------------------

--
-- Table structure for table `student_charge`
--

CREATE TABLE IF NOT EXISTS `student_charge` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `paytype_id` int(11) NOT NULL,
  `cardno` bigint(20) NOT NULL,
  `amount` double NOT NULL,
  `duedate` date NOT NULL,
  `dueamount` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 unpaid, 1 paid',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `student_charge`
--

INSERT INTO `student_charge` (`id`, `paytype_id`, `cardno`, `amount`, `duedate`, `dueamount`, `status`) VALUES
(7, 3, 6048631204912243, 700, '2015-04-09', 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_detail`
--

CREATE TABLE IF NOT EXISTS `student_detail` (
  `cardno` bigint(20) NOT NULL,
  `rollno` bigint(20) NOT NULL,
  `sname` varchar(100) NOT NULL,
  `year` bigint(20) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `phno` bigint(20) NOT NULL,
  `studentpassword` varchar(10) NOT NULL,
  `studentimage` varchar(255) NOT NULL,
  PRIMARY KEY (`cardno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_detail`
--

INSERT INTO `student_detail` (`cardno`, `rollno`, `sname`, `year`, `branch`, `phno`, `studentpassword`, `studentimage`) VALUES
(6048631204912243, 1001, 'amit kumar', 2010, 'cse', 918109108385, '17868', '1428490072003.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `cardno` bigint(20) NOT NULL,
  `chargeid` bigint(20) NOT NULL,
  `amount` double NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_detail`
--

CREATE TABLE IF NOT EXISTS `transaction_detail` (
  `id` bigint(200) NOT NULL AUTO_INCREMENT,
  `cardno` varchar(100) NOT NULL,
  `amount` float NOT NULL,
  `date` mediumtext NOT NULL,
  `type` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `transaction_detail`
--

INSERT INTO `transaction_detail` (`id`, `cardno`, `amount`, `date`, `type`) VALUES
(3, '6048631204912243', 8000, '08-Apr-15', 'recharge');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE IF NOT EXISTS `user_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usertype_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `userpassword` varchar(20) NOT NULL,
  `userphoneno` bigint(20) NOT NULL,
  `useraddress` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
