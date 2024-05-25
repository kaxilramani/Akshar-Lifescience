-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2021 at 04:17 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `omd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `a_id` int(50) NOT NULL AUTO_INCREMENT,
  `a_name` varchar(50) NOT NULL,
  `a_email` varchar(50) NOT NULL,
  `a_password` varchar(50) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_email`, `a_password`) VALUES
(1, 'monty', 'monty@gmail.com', 'monty'),
(2, 'jeel', 'jeel@gmail.com', 'jeel'),
(3, 'demo', 'demo@gmail.com', 'demo');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) NOT NULL,
  `cat_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_status`) VALUES
(1, 'Uncategorized', 1),
(2, 'Syrups', 1),
(3, 'Teblets', 1),
(4, 'Capsules', 1),
(5, 'Drops', 1),
(6, 'Inhalers', 1),
(7, 'Injections', 1),
(8, 'cirup', 1),
(9, 'CTZ', 1),
(10, 'loparo', 1),
(11, 'c', 1),
(12, 'peracitamoll', 1),
(13, 'demo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `cmp_id` int(11) NOT NULL AUTO_INCREMENT,
  `cmp_name` varchar(100) NOT NULL,
  `cmp_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cmp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`cmp_id`, `cmp_name`, `cmp_status`) VALUES
(1, 'Lupin Ltd', 1),
(2, 'Ipca Laboratories Ltd', 1),
(3, 'Sapient Laboratories Pvt Ltd', 1),
(4, 'Wallace Pharmaceuticals Ltd', 1),
(5, 'peracitamoll', 1),
(6, 'a', 1),
(7, 'b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(100) NOT NULL,
  `c_mobile` varchar(10) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_message` varchar(500) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`c_id`, `c_name`, `c_mobile`, `c_email`, `c_message`) VALUES
(1, 'monty', '9898989898', 'monty@gmail.com', 'problem\r\n'),
(2, 'jeel', '1234567890', 'jeel@gmail.com', 'problem'),
(3, 'demo', '9696969696', 'demo@gmail.com', 'problem\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE IF NOT EXISTS `medicines` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_name` varchar(100) NOT NULL,
  `m_cat` int(11) NOT NULL,
  `m_cmp` int(11) NOT NULL,
  `m_pack` int(11) NOT NULL,
  `m_price` float NOT NULL,
  `m_img` varchar(100) NOT NULL DEFAULT '',
  `m_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`m_id`, `m_name`, `m_cat`, `m_cmp`, `m_pack`, `m_price`, `m_img`, `m_status`) VALUES
(1, 'Telekast 4 Chewable Tablet', 3, 1, 10, 9.97, '159ee94b5f83351657ec210ad5cb0e5d.png', 1),
(2, 'Solvin LS Syrup', 2, 2, 1, 52.3, 'eb15f028e8c33522ee59357df4066606.png', 1),
(3, 'Mlobe-PD Eye Drop', 5, 3, 1, 78, 'ce4285b25f9b076d54eff3ec16a013b8.jfif', 1),
(4, 'Onecan 200mg Tablet 4''S', 3, 4, 4, 11, '43c76108bc0f44750bcda43be3da2e48.jpg', 1),
(5, 'Onecan 200mg Tablet 4''S', 3, 4, 4, 14, 'bfc4de51d5e782ee6906dac2702664f1.jpg', 1),
(6, 'Onecan 400mg Tablet 2''S', 3, 4, 2, 24, 'aa4cf3cadf5de25b776578b0f18dc7d1.jpg', 1),
(7, 'Gembone Capsule 10''S', 4, 4, 10, 17, '98820ba3f48b89d11de7245b488563e4.jpg', 1),
(8, 'Colimex Df+ Drops 15ml', 5, 4, 1, 49, '8239b4860af5d4aad0931b7cd5d8944b.jpg', 1),
(9, 'Example', 6, 2, 1, 110, '', 1),
(10, 'safsa', 1, 6, 12, 20, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `o_id` int(11) NOT NULL AUTO_INCREMENT,
  `o_user` int(11) NOT NULL,
  `o_date` date DEFAULT NULL,
  `o_name` varchar(100) NOT NULL,
  `o_mobile` varchar(100) NOT NULL,
  `o_email` varchar(100) NOT NULL,
  `o_pincode` varchar(6) NOT NULL,
  `o_address` varchar(500) NOT NULL,
  `o_medicines` varchar(2000) NOT NULL,
  `o_total` float NOT NULL,
  `o_status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`o_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `o_user`, `o_date`, `o_name`, `o_mobile`, `o_email`, `o_pincode`, `o_address`, `o_medicines`, `o_total`, `o_status`) VALUES
(2, 1, '2021-10-03', 'Smit Bosamiya', '8128389164', 'smtbos@gmail.com', '365220', 'Damnagr - 365220', '[{"id":"2","units":"1","price":"52.3","total":52.3},{"id":"4","units":"4","price":"11","total":44}]', 96.3, 4),
(3, 3, '2021-10-05', 'k', '9898989898', 'kk@gamil.com', '362510', 'damnger', '[{"id":"1","units":"22","price":"9.97","total":219.34},{"id":"2","units":"1","price":"52.3","total":52.3},{"id":"9","units":"1","price":"110","total":110}]', 381.64, 1),
(4, 4, '2021-10-05', 'jay', '9696969696', 'jay@gmail.com', '365220', 'amreli', '[{"id":"1","units":"10","price":"9.97","total":99.7},{"id":"2","units":"1","price":"52.3","total":52.3},{"id":"4","units":"4","price":"11","total":44}]', 196, 1),
(5, 4, '2021-10-06', 'jay', '9696969696', 'jay@gmail.com', '365214', 'damnger', '[{"id":"1","units":"2","price":"9.97","total":19.94},{"id":"2","units":"6","price":"52.3","total":313.8}]', 333.74, 1),
(6, 5, '2021-10-06', 'parth', '5656565656', 'parth@gmail.com', '123654', 'chalala', '[{"id":"2","units":"9","price":"52.3","total":470.7}]', 470.7, 1),
(7, 7, '2021-10-18', 'demo', '1234567891', 'demo@gmail.com', '362520', 'dhaval', '[{"id":"2","units":"1","price":"52.3","total":52.3},{"id":"9","units":"1","price":"110","total":110}]', 162.3, 3),
(8, 6, '2021-10-18', 'dhaval', '6356114025', 'dhaval@gmail.com', '', '', '[{"id":"10","units":24,"price":"20","total":480}]', 480, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_mobile` varchar(10) NOT NULL,
  `u_password` varchar(100) NOT NULL,
  `u_pincode` varchar(6) NOT NULL DEFAULT '',
  `u_address` varchar(500) NOT NULL DEFAULT '',
  `u_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_email`, `u_mobile`, `u_password`, `u_pincode`, `u_address`, `u_status`) VALUES
(6, 'monty', 'monty@gmail.com', '9925850414', 'monty', '362520', 'bhavnagr', 0),
(7, 'demo', 'demo@gmail.com', '9484698870', 'demo', '362520', 'bhavnagr', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
