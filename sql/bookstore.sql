-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 15, 2016 at 07:46 AM
-- Server version: 5.7.10-log
-- PHP Version: 5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `Book_id` varchar(5) NOT NULL,
  `Book_name` varchar(60) NOT NULL,
  `type_id` varchar(2) NOT NULL,
  `author` varchar(40) NOT NULL,
  `Book_date` date NOT NULL,
  `Book_cost` int(6) NOT NULL,
  `Book_num` int(4) NOT NULL,
  `picture` varchar(40) DEFAULT NULL,
  `view` int(11) NOT NULL,
  `sale_out` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`Book_id`, `Book_name`, `type_id`, `author`, `Book_date`, `Book_cost`, `Book_num`, `picture`, `view`, `sale_out`) VALUES
('10001', 'คิด เช่น แมร์ : Kitchen Mare', '03', 'พัชรศรี เบญจมาศ (กาละแมร์) ', '2016-04-26', 248, 200, 'kitchen_mare.jpg', 5, 3),
('10002', 'Conan', '01', 'fuji', '2016-03-02', 45, 30, 'conan.jpg', 6, 1),
('10003', 'สุขภาพดี ด้วยวิธีกล้วยๆ', '03', 'อังคณา โฉมอ่อน', '2016-04-29', 230, 400, 'banana_healty.jpg', 3, 0),
('10004', 'เปรี้ยว หวาน มัน เค็ม', '03', 'รวิกานต์', '2016-04-22', 255, 75, 'peiw_wan.jpg', 0, 0),
('10005', 'เที่ยวปราสาทหินยลถิ่นกัมพูชา', '05', 'ล้อม เพ็งแก้ว', '2016-04-22', 192, 100, 'cambudia.jpg', 0, 0),
('10006', 'ม่านไหมสายทอง', '06', 'กฤษณา อโศกสิน', '2016-05-02', 200, 200, 'man-mai.jpg', 3, 0),
('10007', 'ดื่มทะเลสาบ อาบทะเลทราย', '06', 'บินหลา สันกาลาคีรี', '2016-04-22', 175, 150, 'lakelake.jpg', 0, 0),
('10008', 'One Piece', '01', 'เออิจิโระ', '2016-05-10', 50, 75, 'one_piece.jpg', 2, 5),
('10009', 'Naruto', '01', 'มาซาชิ คิชิโมโต้', '2016-05-10', 50, 62, 'naruto1.jpg', 2, 6),
('10010', 'โรคกลัว โรคย้ำคิดย้ำทำและการรักษาด้วยตัวเอง', '03', 'ผศ. นพ.สเปญ อุ่นอนงค์', '2016-05-01', 167, 100, 'keepscare.jpg', 1, 0),
('10011', 'บุรุษผู้ไร้สตรี', '10', 'ณัฐชยา หิรัญญสมบัติ', '2016-02-18', 171, 25, 'bu-rus.jpg', 15, 8),
('10012', 'การปรากฏตัวของหญิงสาวในคืนฝนตก', '10', 'haruki mirakami', '2016-05-19', 205, 50, 'girl-rain.jpg', 10, 2),
('10013', 'เดอะปริ้นซ์ The prince', '10', 'niccolo machiavelli', '2016-05-03', 149, 50, 'theprince.jpg', 3, 3),
('10014', 'พ่อหล่อสอนลูก', '04', 'อธิคม คุณาวุฒิ', '2016-03-30', 225, 15, 'poh-loh.jpg', 1, 0),
('10015', 'เรื่องรักเล็กเล็ก', '04', 'เล็ก รุ่งจิรวัฒน์', '2016-05-01', 90, 60, 'little-love.jpg', 3, 0),
('10016', 'พิมพ์ซ้ำคำว่า “รัก”', '04', 'เล็ก รุ่งจิรวัฒน์', '2016-02-04', 90, 45, 'pim-sum-wa-ruk.jpg', 6, 4),
('10017', 'ปรัชญาของอริสโตเติล สำหรับผู้เริ่มเรียนรู้', '05', 'อริสโตเติล', '2016-05-01', 75, 100, 'alis-totle.jpg', 50, 15),
('10018', 'พื้นฐานทฤษฎีจิตวิเคราะห์ ซิกมันด์ ฟรอยด์', '05', 'กิติกร มีทรัพย์', '2016-04-21', 171, 100, 'sigmund-freud.jpg', 12, 5),
('10019', 'ไขความลับของสัจธรรมและวิทยาศาสตร์', '05', 'ศต.นายแพทย์คงศักดิ์ ตันไพจิตร', '2016-03-06', 180, 65, 'truevsscience.jpg', 5, 3),
('10020', 'หนังสือประวัติ ปฏิปทาและคำสอน หลวงพ่อคูณ ปริสุทโธ', '05', 'ครรชิต วันแสวง', '2016-03-24', 199, 200, 'lueng-poh-kun.jpg', 23, 10),
('10021', 'สื่อกับพระเจ้าได้อย่างไร', '05', 'ปรมหังสา โยคานันทะ', '2016-05-11', 49, 50, 'pa-jao.jpg', 0, 0),
('10022', 'เกอิชาดอกไม้ในโลกของต้นหลิว', '07', 'เอกนรี พรปรีดา', '2016-02-18', 171, 125, 'k-e-cha.jpg', 3, 2),
('10023', 'แอ็บสแตรกต์เอกซ์เพรสชั่นนิสม์', '07', 'บาร์บารา เฮสส์', '2016-05-02', 360, 40, 'abstract.jpg', 10, 3),
('10024', 'เอกซ์เพรสชั่นนิสม์', '07', 'นอร์แบร์ท โวล์ฟ', '2016-04-18', 360, 45, 'expressionist.jpg', 3, 1),
('10025', 'แลนด์อาร์ต', '07', 'มิชาเอล ไลลัค', '2016-05-01', 360, 36, 'land-art.jpg', 13, 5);

-- --------------------------------------------------------

--
-- Table structure for table `booktype`
--

CREATE TABLE `booktype` (
  `type_id` varchar(2) NOT NULL,
  `type_name` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booktype`
--

INSERT INTO `booktype` (`type_id`, `type_name`) VALUES
('01', 'การ์ตูน'),
('02', 'คอมพิวเตอร์/อิเล็กทรอนิกส์'),
('03', 'สุขภาพ'),
('04', 'บันเทิง'),
('05', 'ศาสนา/ปรัชญา'),
('06', 'สารคดี/โบราณคดี'),
('07', 'ศิลปะ'),
('08', 'ท่องเที่ยว'),
('09', 'ความรู้ทั่วไป/วิชาการ'),
('10', 'วรรณกรรม');

-- --------------------------------------------------------

--
-- Table structure for table `list_order`
--

CREATE TABLE `list_order` (
  `list` int(11) NOT NULL,
  `Order_id` varchar(6) NOT NULL,
  `Book_id` varchar(5) NOT NULL,
  `num_book` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `list_order`
--

INSERT INTO `list_order` (`list`, `Order_id`, `Book_id`, `num_book`) VALUES
(1, '000001', '10001', 3),
(2, '000001', '10002', 1);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` varchar(5) NOT NULL,
  `name` varchar(15) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `address` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `name`, `lastname`, `phone`, `email`, `password`, `address`) VALUES
('10001', 'พีระ', 'คำตอบ', '0912254789', 'ecec23@gmail.com', '1234', 'กรุงเทพฯ');

-- --------------------------------------------------------

--
-- Table structure for table `ordering`
--

CREATE TABLE `ordering` (
  `order_id` varchar(6) NOT NULL,
  `order_date` date NOT NULL,
  `member_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ordering`
--

INSERT INTO `ordering` (`order_id`, `order_date`, `member_id`) VALUES
('000001', '2016-05-05', '10001');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`Book_id`);

--
-- Indexes for table `booktype`
--
ALTER TABLE `booktype`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `list_order`
--
ALTER TABLE `list_order`
  ADD PRIMARY KEY (`list`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `ordering`
--
ALTER TABLE `ordering`
  ADD PRIMARY KEY (`order_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
