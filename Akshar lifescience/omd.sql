-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 06:29 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omd`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(50) NOT NULL,
  `a_name` varchar(50) NOT NULL,
  `a_email` varchar(50) NOT NULL,
  `a_password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_email`, `a_password`) VALUES
(2, 'kaxil', 'kaxil@gmail.com', 'kaxil'),
(3, 'jeel', 'jeel@gmail.com', 'jeel');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(100) NOT NULL,
  `cat_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(8, 'Lotion', 1),
(9, 'Pain Relief Spray & Oil', 1),
(10, 'Transfusion', 1),
(12, 'Gastro Care', 1),
(14, 'Face Mask', 1),
(15, 'Miscellaneous', 1),
(16, 'Surgery', 1),
(17, 'Cardiac Care', 1),
(18, 'Anesthesia', 1),
(19, 'Surgical Gown', 1),
(20, 'Patient Care', 1);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `cmp_id` int(11) NOT NULL,
  `cmp_name` varchar(100) NOT NULL,
  `cmp_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`cmp_id`, `cmp_name`, `cmp_status`) VALUES
(1, 'Lupin Ltd', 1),
(2, 'Ipca Laboratories Ltd', 1),
(3, 'Sapient Laboratories Pvt Ltd', 1),
(4, 'Wallace Pharmaceuticals Ltd', 1),
(5, 'Standard Health Care', 1),
(6, 'Neon Laboratories Ltd', 1),
(7, ' Sun Pharmaceutical Industries Ltd', 1),
(8, 'ROMSONS MEDSOURCE', 1),
(9, 'Plasti Surge Industries Pvt Ltd', 1),
(10, 'INTAS Pharmaceuticals LTD.', 1),
(11, 'Torrent Pharmaceuticals Ltd', 1),
(12, 'Medx Healthcare ', 1),
(13, 'Tablets India Ltd', 1),
(14, 'Dr. Reddy\'s Laboratories Ltd', 1),
(15, 'Zuventus Healthcare Ltd', 1),
(16, 'Cadila Healthcare Ltd (Zydus)', 1),
(17, 'Alcon Laboratories India Pvt Ltd', 1),
(18, 'Allergan India Pvt Ltd', 1),
(19, 'Cipla Ltd', 1),
(20, 'Procter & Gamble Hygiene And Health Care Ltd', 1),
(21, 'Jai Rishi Ayurveda', 1),
(22, 'Vedistry Pvt Ltd', 1),
(23, 'Abbott India Ltd', 1),
(24, ' P. T. Invent India Pvt. Ltd.', 1),
(25, 'Suncare Formulations Pvt Ltd', 1),
(26, 'Sterimed Medical Devices Pvt Ltd', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_mobile` varchar(10) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_message` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`c_id`, `c_name`, `c_mobile`, `c_email`, `c_message`) VALUES
(2, 'kaxil', '1234567890', 'kaxil@gmail.com', 'problem'),
(3, 'demo', '9696969696', 'demo@gmail.com', 'problem\r\n'),
(4, 'ronak', '9879856856', 'ronak8980@gmail.com', 'my product are cancel pleses\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `m_id` int(11) NOT NULL,
  `m_name` varchar(100) NOT NULL,
  `m_cat` int(11) NOT NULL,
  `m_cmp` int(11) NOT NULL,
  `m_pack` int(11) NOT NULL,
  `m_price` float NOT NULL,
  `m_img` varchar(100) NOT NULL DEFAULT '',
  `m_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`m_id`, `m_name`, `m_cat`, `m_cmp`, `m_pack`, `m_price`, `m_img`, `m_status`) VALUES
(1, 'Telekast 4 Chewable Tablet', 3, 1, 10, 9.97, '159ee94b5f83351657ec210ad5cb0e5d.png', 1),
(2, 'Solvin LS Syrup', 2, 2, 1, 52.3, 'eb15f028e8c33522ee59357df4066606.png', 1),
(3, 'Mlobe-PD Eye Drop', 5, 3, 1, 78, 'ce4285b25f9b076d54eff3ec16a013b8.jfif', 1),
(4, 'Risdone Plus Tablet 10\'S', 3, 10, 10, 11, 'e0f3ea0eaff9fe5e0dedea380b0b5e05.jpg', 1),
(5, 'LOSAR * BETA-H Tablet 15\'s', 3, 11, 10, 14, '08ce45fbac23cb5cbd2819782fc5c179.jpg', 1),
(6, 'Thiox OD 8mg Capsule 5\'S', 4, 4, 5, 210, '1a8397de1dd6697ede12c13da6789c57.jpg', 1),
(7, 'Gembone Capsule 10\'S', 4, 4, 10, 17, '98820ba3f48b89d11de7245b488563e4.jpg', 1),
(8, 'Colimex Df+ Drops 15ml', 5, 4, 1, 49, '8239b4860af5d4aad0931b7cd5d8944b.jpg', 1),
(9, 'Zoryl M2 Forte Tablet 15\'S', 3, 10, 15, 15.66, 'e6eccac1f639eed6795d669436a838ee.jpg', 1),
(10, 'Levera 750mg Tablet 10\'S', 3, 10, 10, 21.67, 'e37379b07560b9805a601b2d3cda33a3.png', 1),
(11, 'N95 Respirator Face Mask', 14, 9, 20, 80, '253b3cbf7c7eec8a6ef191652730ed1d.jpg', 1),
(12, 'T.U.R. Set Trans-Urethral Resection Of The Prostate', 16, 8, 1, 55, '758e27c241f9e4b23554438da2582d7d.jpg', 1),
(13, 'Blood Bags', 16, 8, 1, 90, '533d9d6dc8114e60e96edc99e215d7f5.jpg', 1),
(14, 'Colo Bag ®GS-4020', 16, 8, 1, 45, 'ebe37d29aef07be58706ab68976bade4.jpg', 1),
(15, 'Cellmat™ GS-9009', 16, 8, 1, 824, '1ede12a0e62d8f89fdf57494fcb8a765.jpg', 1),
(16, 'Mini Vac Set ®GS-5006', 16, 8, 1, 572, '1626772832b7e89acef31a0faba39847.jpg', 1),
(17, 'Grounding Pad™GS-6040', 16, 8, 10, 746, '02d842de2451a47f60990c2a6d09d035.jpg', 1),
(18, 'Asepto Pump ®GS-6008', 16, 8, 1, 346, 'c84118f55fc77b0b2bd335096c73dd9e.jpg', 1),
(19, 'Electraa™ GS-6038', 16, 8, 1, 500, 'a273657bb4c46d573104a8718e4d07e1.jpg', 1),
(20, 'Vaccu Suck ® Suction Set GS-5016 S/C', 16, 8, 1, 406, '6b49d475435c8a54e39dfeaac5741b80.jpg', 1),
(21, 'Romo ADK ®GS-5036', 16, 8, 1, 240, 'b896c23c6b3f0dceb3368ed4ecd0fe8e.jpg', 1),
(22, 'Flat Drain Set ®GS-5047', 16, 8, 1, 349, '642d46da218a1f5883fa53155792bf7c.jpg', 1),
(23, 'Respirometer ®SH-6082', 17, 8, 1, 150, '8ecadc48f77ee1f4e763f6f61a1b1ca3.jpg', 1),
(24, 'Silicone Flexo Cath ®GS-5109', 17, 8, 80, 450, '97e928a03402d61a60aa59083451372e.jpg', 1),
(25, 'Romo Seal ® Pro GS-5020P', 17, 8, 1, 544, '3d03a4bd00b633b2492ccd2f591aad8e.jpg', 1),
(26, 'Breazer™ SH-6083', 17, 8, 1, 678, '3fe7861cdd5905f0b258b4ff70d98c21.jpg', 1),
(27, 'Romo Seal ® GS-5020/5031/5032', 17, 8, 1, 799, '6c000b9075d586112525c53160219861.jpg', 1),
(28, 'Ventilator Circuit SH-2091/92/93/94/98', 18, 8, 1, 508, 'd8b44d5874989b0ef0ae14c4d59a041e.jpg', 1),
(29, 'Paediatric Anesthesia Circuit SH-2089', 18, 8, 1, 646, '238266cd4ae7e83321d98e11a7d1d79f.png', 1),
(30, 'Re-inforced Endotracheal Tube GS-2013', 18, 8, 1, 479, '899ad5ddcfcfdd99d443f982d37da559.jpg', 1),
(31, 'Oxy Lock ®SH-2038', 18, 8, 1, 948, '31d737051adc58c7056b12d646aee775.jpg', 1),
(32, 'Close Suck Cath™GS-2107', 18, 8, 1, 980, '91adca786670f4f20aedd389b308bd5d.png', 1),
(33, 'Resq Bag ® Re-UsableGS-2050', 18, 8, 1, 998, 'fe008dafa3b163ff774cc65a43eac226.jpg', 1),
(34, ' Levera 500mg Tablet 15\'S', 3, 10, 10, 18.06, '9e41d236f81888fd7f9287690ced9ccf.jpg', 1),
(35, 'Zomet 500mg Tablet 10\'S', 3, 10, 10, 12, '64ce686c683e5d15923427201bb038d3.jpg', 1),
(36, 'Gabapin NT 400mg Tablet 15\'S', 3, 10, 15, 14.2, '837e9f4851dfce3704bf6f06011798e4.jpg', 1),
(37, 'Clavix AS 75mg Tablet 15\'S', 3, 10, 15, 17.5, '0c7bc153d2c1dd6aa0bbdd71c2f98dff.jpg', 1),
(38, 'Veltam Plus Tablet 15\'S', 3, 10, 15, 34.73, 'd66be2d06f55b663b6b8874b2c1b3905.jpg', 1),
(39, 'Monit Gtn 2.6mg Tablet 30\'S', 3, 10, 30, 8.28, '4913de9f2e712809afdd3abc2731accb.jpg', 1),
(40, 'Amiodon 150mg Injection 3ml', 7, 6, 5, 63, '6f622619bbfab21cb3068998f81f442f.jpg', 1),
(41, 'adneon 6mg injection 2ml', 7, 6, 1, 207.95, '3c79500d28136fd1a27cf9ce79fde2b3.jpg', 1),
(42, 'Optineuron Injection 3ml', 7, 1, 50, 11.5, 'f8c74910ab7d8004c9b67838a01948b7.jpg', 1),
(43, 'Depopred Injection 2ml', 7, 7, 1, 88.96, '0a5d217f754b9e129fd4858343f9031a.jpg', 1),
(44, 'Rejunex Injection 1ml', 7, 10, 1, 61.5, '9d20fd8697e3020ea60aab55273c3f78.jpg', 1),
(45, '3 Ply Non Woven Face Mask', 14, 5, 100, 0.96, 'acd56caecc37bc29ddb49bc353c86cb7.jpg', 1),
(46, 'Medical Disposable Face Mask', 14, 5, 100, 0.85, 'f050663b8b8be85e8610240fc33945db.jpg', 1),
(47, 'Disposable Surgical Gown', 19, 12, 80, 45, 'e50b510edd818d51d666d4083de6d94d.jpg', 1),
(48, 'Non Woven Surgical Gown', 19, 12, 80, 45, '283acabab2c6807a2efb27e10387f856.jpg', 1),
(49, 'Hospital Surgical Gown', 19, 12, 70, 55, '973fa76f8c9987a18b2de43a1e5f52bd.jpg', 1),
(50, 'Doctor Surgical Gowns', 19, 12, 50, 60, '22c84fed70e177507b311b783fa190cb.jpg', 1),
(51, 'Disposable Patient Gown', 19, 12, 80, 47, 'fc9ee25a3cd64ad882772c2d1f32150b.jpg', 1),
(52, 'Carnisure Syrup 30ml', 2, 11, 1, 270, 'dcc51842668201d9e7a5623b47572815.jpg', 1),
(53, 'Apetamin Syrup 200ml', 2, 13, 1, 180, '0960687ad76806c8cb14e3c53eaa7c9f.jpg', 1),
(54, 'Nootropil Syrup 100ml', 2, 14, 1, 480.5, 'b1790eb7ec415281c366bcf0f81d8d21.jpg', 1),
(55, 'Maxtra Syrup 60ml', 2, 15, 1, 96.05, 'fb81778238fa41b928f443b007139283.jpg', 1),
(56, 'Litearm Lotion 30gm', 8, 16, 1, 641.95, '320c67decc09bb0a77aad62833e70809.jpg', 1),
(57, 'LIVAFIN Lotion 30ml', 8, 16, 1, 390.95, 'ec4cc0606a5ad6ae1a13ba0ee2e5e641.jpg', 1),
(58, 'Melgain Lotion 5ml', 8, 16, 1, 995, '5a9c06f4247c732f9e1f43ab4fa733f3.jpg', 1),
(59, 'Monotax O 100 Tangy Orange & Lemon Flavor Dry Syrup 30ml', 2, 16, 1, 97.5, '759089689ecba7045fe92b945d92755e.jpg', 1),
(60, 'SITAGLYN D 50/5 Tablet 10\'s', 3, 16, 10, 17.52, '8bba949d41fe31de2b0ab82c0867c9c9.jpg', 1),
(61, 'Itchcam Lotion 60ml', 8, 16, 1, 451, 'b08e6df2dc0e84b71e13cd20a2a32de9.jpg', 1),
(62, 'CADIHEP Syrup 110ml', 2, 16, 1, 111.25, '794f809a8e900b9df8ddd2e7f90d6000.jpg', 1),
(63, 'Genteal Eye Drops 10ml', 5, 17, 1, 219.2, 'd89cc1b35b098665a93a6ae8ebfc44e9.jpg', 1),
(64, 'Optive Eye Drops 10ml', 5, 18, 1, 137.94, '1ef53a91e400089f82aadd0a97555937.jpg', 1),
(65, 'Dorzox Eye Drops 5ml', 5, 19, 1, 504.93, '2d2b6a9cf1fa7ecf5fef12a25056a6d0.jpg', 1),
(66, 'Brimolol Eye Drops 5ml', 5, 7, 1, 587, 'a4f416248feed6cae54583c6fbc99a52.jpg', 1),
(67, 'Vicks Inhaler 0.5 ml', 6, 20, 1, 58.33, 'd611ddcef8c9d5bb69b4fa28b9d54780.jpg', 1),
(68, 'FORGLYN Inhaler 120md', 6, 16, 1, 658.8, '27e3f7170e895878024120dc1cdbce36.jpg', 1),
(69, 'Maxiflo 250 Inhaler 120Md', 6, 19, 1, 784.01, 'cccb4dea640c7c40eb814caa83481808.jpg', 1),
(70, 'Formonide 200 Inhaler 120Md', 6, 16, 1, 446.75, '8c467b4c8fe334f86ed1c8dcc13979de.jpg', 1),
(71, 'Volini Pain Relief Spray 40 gm (Free Volini Gel 10 gm)', 9, 7, 1, 130, 'fa970a472ae9e8e3ab05a098bcd04984.jpg', 1),
(72, 'Jairishi Pain Relief Oil 100 ml', 9, 21, 1, 266, '355f51c0010a999c77ba785e55a3e97b.jpg', 1),
(73, 'GO365 Ayurvedic Pain Relief Spray 90 ml', 9, 22, 1, 232.75, 'b6b3bc0f2e2d73af3bf6f1e67fe32cad.jpg', 1),
(74, 'Brufen Power Metered Pain Relief Spray 20 gm', 9, 23, 1, 87.42, '6a2a6bc0d35de01bfe4ba579d6aa6964.jpg', 1),
(75, 'Soulflower Back & Neck Pain Relief Oil 120 ml', 9, 24, 1, 440, 'ca30c9b7f9e4d8421d672e678d1fb469.jpg', 1),
(76, 'Flamisun Pain Relief Spray 60 ml', 9, 25, 1, 130.9, '87a730d7a48e81690e8fc598f68aede1.jpg', 1),
(77, 'Volumetric ® SetSS-3094', 10, 8, 1, 189.24, 'be9ac9da7ed3cbb9088a672ca74f1aa9.jpg', 1),
(78, 'Bi-Valve ® GS-3040 L', 10, 8, 2, 68.87, 'a4eaba9e82948819af8008d5dc4ca2ef.jpg', 1),
(79, 'Veneport ®GS-3210', 10, 8, 1, 48.56, '2887f2ee8b293b2761abb0d281d8f214.jpg', 1),
(80, 'Multiport ®GS-3049', 10, 8, 1, 87.33, 'fe513898ce130bd53fb551d2a02fa914.jpg', 1),
(81, 'Exxacta ®GS-3146', 10, 8, 2, 78.63, '2ea724a3032b1631ec80cecf2842ea46.jpg', 1),
(82, 'Micron ®GS-3031', 10, 8, 1, 89, 'b439a64b1928528d77daf48adabeb439.jpg', 1),
(83, 'Venesafe™GS-3207', 10, 8, 1, 124.25, '3f3783544d0c87024e70eed729dda4cc.jpg', 1),
(84, 'Vein Cath™GS-3024', 10, 8, 1, 145.78, 'a28f3bf52934eda44eaa8e448914517d.jpg', 1),
(85, 'Vein-O-Line ® MarvelGS-3144', 10, 8, 2, 74, 'e5e30fde27ea3020b489aab6802f1d3d.jpg', 1),
(86, 'Triflon ®GS-3006', 10, 8, 1, 68, 'c656b89e0d09dbd45ae696faaa3c99e8.jpg', 1),
(87, 'Hi Line ® SpiralGS-3037 S', 10, 8, 2, 192.77, 'c931c77c278b8aa5f9c92167b33a57f0.jpg', 1),
(88, 'HIV PackSH-6079', 15, 8, 1, 789.22, '9a9aa246de34aced94f32669f649a19c.jpg', 1),
(89, 'Kenpore ® ProSH-6314', 15, 8, 10, 274.55, '7cc5eaf8308fa2d1c95857d69c34fd62.jpg', 1),
(90, 'Kenpore ® PlusSH-6301 P', 15, 8, 10, 281.7, '35013d25eb725e0996575e4f70a48e81.jpg', 1),
(91, 'Klik Clamp ®SH-5084', 15, 8, 1, 989.99, 'a6eb796cc138b3b6c50af9518346b977.jpg', 1),
(92, 'Feedy ®GS-4038', 12, 8, 1, 256, '3691e8b8774bb99629f320c496dcf0e1.jpg', 1),
(93, 'Gastrolene™ Plus GS-4030', 12, 8, 1, 452, 'c26a8739b43bb5af4cf1b05c0f869e04.jpg', 1),
(94, 'Colo Bag ®GS-4020', 12, 8, 1, 183, '03a10952c57b4697389e3173d62d8a34.jpg', 1),
(95, 'Fee Bag™ GS-4042', 12, 8, 1, 475, '2255950201918d16043da36543c7c26a.jpg', 1),
(96, 'Gastrolene™ PURGS-4024', 12, 8, 1, 258, '861721f959959fbeab18c0acadf6aae4.jpg', 1),
(97, 'Romolene ®GS-4032', 12, 8, 1, 295, '16c973bf84f4ae4a0aa6616ab47e1f2a.jpg', 1),
(98, 'Breast Pump', 15, 8, 1, 596, '68808902de1e54b7b207f7319d93dbac.jpg', 1),
(99, 'Nasal Aspirator', 15, 8, 1, 339, '2d950b32c1c633f1d8467cb5e8df2239.jpg', 1),
(100, 'Dignity®', 20, 8, 10, 442, '2abd7ff9a04cf3482670808486c4748c.jpg', 1),
(101, 'Oxee-Check™GS-9006', 20, 8, 1, 799, 'da4496104d21bcedc644b5b748f76f61.jpg', 1),
(102, 'Microgen', 20, 8, 1, 869.5, 'cb74efdafdf18f874ee7699371d41180.jpg', 1),
(103, 'Trimmer™ PlusGS-9024', 20, 8, 2, 37.8, 'c88715af49992f6b571afc30c6228299.jpg', 1),
(104, 'PM 0.3 Mask', 14, 8, 1, 45, '721d7b7eab5ec05dcd51f460748bf2fd.jpg', 1),
(105, 'Aeromac Plus GS-9010', 20, 8, 1, 986.8, '3445dab4a3004edf752110d006494859.jpg', 1),
(106, 'Angel Nebulizer SystemGS-9023', 20, 8, 1, 986.4, '8c6505558fb63ee885fc2071bbd76409.jpg', 1),
(107, 'Romo Check Plus GS-9008', 20, 8, 1, 580, 'c3abaec17ea0d1fa3e5b32eca82ae3bc.jpg', 1),
(108, 'Mercury Free SphygomanometerGS-9013', 20, 8, 1, 758, '57b09a4309194ea19aaa2e77fcdb2dcd.jpg', 1),
(109, 'BPX™ Plus+GS-9001', 20, 8, 1, 786, 'd76072bed9e9e87059863d3035a8b878.jpg', 1),
(110, 'Nosor GS-9017', 20, 8, 1, 968.8, 'c432b0173cdb3f6c10bc16bbfcc02953.jpg', 1),
(111, 'Sorenil™ GS-9003', 20, 8, 1, 856, 'e5f125ad9c5e265d028c00c9650141ae.jpg', 1),
(112, 'Kenny-1800 GS-9016', 20, 8, 100, 4.45, '851cc2bc6de7a26871335ddb65d3e422.jpg', 1),
(113, 'Nasopharyngeal Airway® GS-2034', 18, 8, 1, 300.7, '63142089e80ee9e7867b5839efe9b9e4.png', 1),
(114, 'Sterimed Nasopharyngeal Airway (SMD 720) (6.5 mm) 1\'s', 18, 26, 3, 257.75, 'd0f390c92f24e33895eed12b590f1aac.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `o_user` int(11) NOT NULL,
  `o_date` date DEFAULT NULL,
  `o_name` varchar(100) NOT NULL,
  `o_mobile` varchar(100) NOT NULL,
  `o_email` varchar(100) NOT NULL,
  `o_pincode` varchar(6) NOT NULL,
  `o_address` varchar(500) NOT NULL,
  `o_medicines` varchar(2000) NOT NULL,
  `o_total` float NOT NULL,
  `o_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `o_user`, `o_date`, `o_name`, `o_mobile`, `o_email`, `o_pincode`, `o_address`, `o_medicines`, `o_total`, `o_status`) VALUES
(2, 1, '2021-10-03', 'Smit Bosamiya', '8128389164', 'smtbos@gmail.com', '365220', 'Damnagr - 365220', '[{\"id\":\"2\",\"units\":\"1\",\"price\":\"52.3\",\"total\":52.3},{\"id\":\"4\",\"units\":\"4\",\"price\":\"11\",\"total\":44}]', 96.3, 4),
(3, 3, '2021-10-05', 'k', '9898989898', 'kk@gamil.com', '362510', 'damnger', '[{\"id\":\"1\",\"units\":\"22\",\"price\":\"9.97\",\"total\":219.34},{\"id\":\"2\",\"units\":\"1\",\"price\":\"52.3\",\"total\":52.3},{\"id\":\"9\",\"units\":\"1\",\"price\":\"110\",\"total\":110}]', 381.64, 1),
(4, 4, '2021-10-05', 'jay', '9696969696', 'jay@gmail.com', '365220', 'amreli', '[{\"id\":\"1\",\"units\":\"10\",\"price\":\"9.97\",\"total\":99.7},{\"id\":\"2\",\"units\":\"1\",\"price\":\"52.3\",\"total\":52.3},{\"id\":\"4\",\"units\":\"4\",\"price\":\"11\",\"total\":44}]', 196, 1),
(5, 4, '2021-10-06', 'jay', '9696969696', 'jay@gmail.com', '365214', 'damnger', '[{\"id\":\"1\",\"units\":\"2\",\"price\":\"9.97\",\"total\":19.94},{\"id\":\"2\",\"units\":\"6\",\"price\":\"52.3\",\"total\":313.8}]', 333.74, 1),
(6, 5, '2021-10-06', 'parth', '5656565656', 'parth@gmail.com', '123654', 'chalala', '[{\"id\":\"2\",\"units\":\"9\",\"price\":\"52.3\",\"total\":470.7}]', 470.7, 4),
(7, 7, '2021-10-18', 'demo', '1234567891', 'demo@gmail.com', '362520', 'dhaval', '[{\"id\":\"2\",\"units\":\"1\",\"price\":\"52.3\",\"total\":52.3},{\"id\":\"9\",\"units\":\"1\",\"price\":\"110\",\"total\":110}]', 162.3, 3),
(8, 6, '2021-10-18', 'dhaval', '6356114025', 'dhaval@gmail.com', '', '', '[{\"id\":\"10\",\"units\":24,\"price\":\"20\",\"total\":480}]', 480, 1),
(9, 9, '2024-02-18', 'vishvas savaliya', '9875236233', 'vishvas@gmail.com', '382350', 'ahmedabad', '[{\"id\":\"1\",\"units\":\"10\",\"price\":\"9.97\",\"total\":99.7},{\"id\":\"2\",\"units\":\"1\",\"price\":\"52.3\",\"total\":52.3},{\"id\":\"4\",\"units\":\"4\",\"price\":\"11\",\"total\":44}]', 196, 3),
(10, 10, '2024-02-20', 'sahil ramani', '8956745256', 'sahil@gmail.com', '382350', 'ahmedabad', '[{\"id\":\"4\",\"units\":\"4\",\"price\":\"11\",\"total\":44},{\"id\":\"5\",\"units\":8,\"price\":\"14\",\"total\":112},{\"id\":\"6\",\"units\":4,\"price\":\"24\",\"total\":96}]', 252, 1),
(11, 8, '2024-02-26', 'kaxil r', '9874652389', 'kaxil@gmail.com', '382350', 'Ahmedabad', '[{\"id\":\"43\",\"units\":\"10\",\"price\":\"88.96\",\"total\":889.5999999999999},{\"id\":\"44\",\"units\":\"10\",\"price\":\"61.5\",\"total\":615}]', 1504.6, 1),
(12, 9, '2024-03-06', 'vishvas savaliya', '9875236233', 'vishvas@gmail.com', '382350', 'ahmedabad', '[{\"id\":\"26\",\"units\":\"1\",\"price\":\"678\",\"total\":678},{\"id\":\"39\",\"units\":\"30\",\"price\":\"8.28\",\"total\":248.39999999999998},{\"id\":\"40\",\"units\":\"5\",\"price\":\"63\",\"total\":315},{\"id\":\"42\",\"units\":\"50\",\"price\":\"11.5\",\"total\":575},{\"id\":\"59\",\"units\":\"1\",\"price\":\"97.5\",\"total\":97.5}]', 1913.9, 1),
(13, 6, '2024-03-14', 'Aman Gupta', '7896584575', 'aman5569@gmail.com', '302005', 'Rajasthan, india 302005', '[{\"id\":\"34\",\"units\":\"10\",\"price\":\"18.06\",\"total\":180.6},{\"id\":\"36\",\"units\":\"15\",\"price\":\"14.2\",\"total\":213},{\"id\":\"53\",\"units\":\"1\",\"price\":\"180\",\"total\":180},{\"id\":\"71\",\"units\":\"1\",\"price\":\"130\",\"total\":130},{\"id\":\"85\",\"units\":\"2\",\"price\":\"74\",\"total\":148},{\"id\":\"89\",\"units\":\"10\",\"price\":\"274.55\",\"total\":2745.5}]', 3597.1, 1),
(15, 6, '2024-03-14', 'Aman Gupta', '7896584575', 'aman5569@gmail.com', '', '', '[{\"id\":\"32\",\"units\":\"1\",\"price\":\"980\",\"total\":980}]', 980, 3),
(16, 6, '2024-03-14', 'Aman Gupta', '7896584575', 'aman5569@gmail.com', '', '', '[{\"id\":\"5\",\"units\":\"10\",\"price\":\"14\",\"total\":140},{\"id\":\"6\",\"units\":\"5\",\"price\":\"210\",\"total\":1050}]', 1190, 4),
(17, 8, '2024-03-14', 'jay pathar', '7880895263', 'patharjay23@gmail.com', '110001', 'Delhi, India', '[{\"id\":\"19\",\"units\":\"1\",\"price\":\"500\",\"total\":500},{\"id\":\"21\",\"units\":\"1\",\"price\":\"240\",\"total\":240},{\"id\":\"22\",\"units\":\"1\",\"price\":\"349\",\"total\":349},{\"id\":\"23\",\"units\":\"1\",\"price\":\"150\",\"total\":150},{\"id\":\"25\",\"units\":\"1\",\"price\":\"544\",\"total\":544},{\"id\":\"27\",\"units\":\"1\",\"price\":\"799\",\"total\":799}]', 2582, 2),
(18, 7, '2024-03-15', 'ronak', '9879856856', 'ronak8980@gmail.com', '382350', 'Ahmedabad, India', '[{\"id\":\"77\",\"units\":\"1\",\"price\":\"189.24\",\"total\":189.24},{\"id\":\"78\",\"units\":\"2\",\"price\":\"68.87\",\"total\":137.74},{\"id\":\"80\",\"units\":\"1\",\"price\":\"87.33\",\"total\":87.33},{\"id\":\"81\",\"units\":\"2\",\"price\":\"78.63\",\"total\":157.26},{\"id\":\"82\",\"units\":\"1\",\"price\":\"89\",\"total\":89}]', 660.57, 1),
(19, 9, '2024-03-26', 'jenil k', '6355273428', 'pateljenil9989@gmail.com', '365601', 'Amreli, India, 365601', '[{\"id\":\"4\",\"units\":\"10\",\"price\":\"11\",\"total\":110},{\"id\":\"6\",\"units\":\"5\",\"price\":\"210\",\"total\":1050},{\"id\":\"34\",\"units\":\"10\",\"price\":\"18.06\",\"total\":180.6},{\"id\":\"54\",\"units\":\"1\",\"price\":\"480.5\",\"total\":480.5}]', 1821.1, 0),
(20, 20, '2024-03-26', 'dobariya jenil', '7016894685', 'jenil123@gmail.com', '382350', 'Ahmedabad, India, 382350', '[{\"id\":\"79\",\"units\":\"1\",\"price\":\"48.56\",\"total\":48.56},{\"id\":\"80\",\"units\":\"1\",\"price\":\"87.33\",\"total\":87.33},{\"id\":\"81\",\"units\":\"2\",\"price\":\"78.63\",\"total\":157.26}]', 293.15, 4),
(21, 25, '2024-04-05', 'jeel gajera ', '9924988725', 'jeelgajera7001@gmail.com', '382350', 'Ahmedabad, India, 382350', '[{\"id\":\"79\",\"units\":\"1\",\"price\":\"48.56\",\"total\":48.56},{\"id\":\"80\",\"units\":\"1\",\"price\":\"87.33\",\"total\":87.33},{\"id\":\"81\",\"units\":\"2\",\"price\":\"78.63\",\"total\":157.26}]', 293.15, 1),
(22, 2, '2024-04-08', 'demo', '9484698870', 'demo@gmail.com', '362520', 'bhavnagr', '[{\"id\":\"4\",\"units\":\"10\",\"price\":\"11\",\"total\":110},{\"id\":\"5\",\"units\":\"10\",\"price\":\"14\",\"total\":140},{\"id\":\"6\",\"units\":\"5\",\"price\":\"210\",\"total\":1050}]', 1300, 1),
(23, 2, '2024-04-08', 'demo', '9484698870', 'demo@gmail.com', '362520', 'bhavnagr', '[{\"id\":\"2\",\"units\":\"1\",\"price\":\"52.3\",\"total\":52.3}]', 52.3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_mobile` varchar(10) NOT NULL,
  `u_password` varchar(100) NOT NULL,
  `u_pincode` varchar(6) NOT NULL DEFAULT '',
  `u_address` varchar(500) NOT NULL DEFAULT '',
  `u_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_email`, `u_mobile`, `u_password`, `u_pincode`, `u_address`, `u_status`) VALUES
(1, 'monty', 'monty@gmail.com', '9925850414', 'monty', '362520', 'bhavnagr', 0),
(2, 'demo', 'demo@gmail.com', '9484698870', 'demo', '362520', 'bhavnagr', 0),
(3, 'kaxil r', 'kaxil@gmail.com', '9874652389', 'kaxil123', '382350', 'Ahmedabad', 0),
(4, 'vishvas savaliya', 'vishvas@gmail.com', '9875236233', 'vishu123', '382350', 'ahmedabad', 0),
(5, 'sahil ramani', 'sahil@gmail.com', '8956745256', '123456sahil', '382350', 'ahmedabad', 0),
(6, 'Aman Gupta', 'aman5569@gmail.com', '7896584575', 'aman123', '', '', 0),
(7, 'ronak', 'ronak8980@gmail.com', '9879856856', 'ronak8585', '382350', 'Ahmedabad, India', 0),
(8, 'jay pathar', 'patharjay23@gmail.com', '7880895263', 'Jay@897545', '110001', 'Delhi, India', 0),
(9, 'jenil k', 'pateljenil9989@gmail.com', '6355273428', 'jenil123', '365601', 'Amreli, India, 365601', 0),
(20, 'dobariya jenil', 'jenil123@gmail.com', '7016894685', 'jenil7016', '382350', 'Ahmedabad, India, 382350', 0),
(21, '', 'dhruv789@gmail.com', '7852369585', 'dhruv789', '', '', 0),
(22, 'avinash k', 'avinash56@gmail.com', '9978923563', 'avinash@#123', '', '', 0),
(23, 'jaydip R', 'jaydipr89@gmail.com', '7089334585', 'jaydip78$&', '', '', 0),
(24, 'kishan p', '', '', '', '', '', 0),
(25, 'jeel gajera ', 'jeelgajera7001@gmail.com', '9924988725', 'jeelgajera@1', '382350', 'Ahmedabad, India, 382350', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`cmp_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `cmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
