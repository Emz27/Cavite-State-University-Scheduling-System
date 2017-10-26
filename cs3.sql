-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2016 at 12:52 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cs3`
--

-- --------------------------------------------------------

--
-- Table structure for table `availability`
--

CREATE TABLE IF NOT EXISTS `availability` (
  `AVAIL_ID` int(11) NOT NULL,
  `LECTURER` int(11) NOT NULL,
  `DAYS` varchar(4) NOT NULL,
  `START_TIME` varchar(20) NOT NULL,
  `END_TIME` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=296 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `availability`
--

INSERT INTO `availability` (`AVAIL_ID`, `LECTURER`, `DAYS`, `START_TIME`, `END_TIME`) VALUES
(170, 13, '1', '8:00', '21:00'),
(171, 13, '2', '8:00', '21:00'),
(172, 13, '3', '8:00', '21:00'),
(173, 13, '4', '8:00', '21:00'),
(174, 13, '5', '8:00', '21:00'),
(175, 13, '6', '8:00', '21:00'),
(188, 14, '1', '8:00', '21:00'),
(189, 14, '2', '8:00', '21:00'),
(190, 14, '3', '8:00', '21:00'),
(191, 14, '4', '8:00', '21:00'),
(192, 14, '5', '8:00', '20:30'),
(193, 14, '6', '8:00', '21:00'),
(194, 15, '1', '8:00', '21:00'),
(195, 15, '2', '8:00', '21:30'),
(196, 15, '3', '8:00', '20:30'),
(197, 15, '4', '8:00', '21:00'),
(198, 15, '5', '8:00', '21:00'),
(199, 15, '6', '8:00', '21:30'),
(200, 16, '1', '8:00', '21:00'),
(201, 16, '2', '8:00', '21:00'),
(202, 16, '3', '8:00', '21:00'),
(203, 16, '4', '8:00', '21:00'),
(204, 16, '5', '8:00', '21:00'),
(205, 16, '6', '8:00', '21:30'),
(236, 18, '1', '8:00', '21:00'),
(237, 18, '2', '8:00', '21:00'),
(238, 18, '3', '8:00', '20:30'),
(239, 18, '4', '8:00', '21:00'),
(240, 18, '5', '8:00', '20:30'),
(241, 18, '6', '8:00', '21:00'),
(254, 19, '1', '8:00', '20:30'),
(255, 19, '2', '8:00', '21:00'),
(256, 19, '3', '8:00', '20:30'),
(257, 19, '4', '8:00', '21:00'),
(258, 19, '5', '8:00', '20:30'),
(259, 19, '6', '8:00', '21:00'),
(266, 17, '1', '8:00', '21:00'),
(267, 17, '2', '8:00', '21:00'),
(268, 17, '3', '8:00', '21:00'),
(269, 17, '4', '8:00', '21:00'),
(270, 17, '5', '8:00', '21:00'),
(271, 17, '6', '8:00', '21:00'),
(272, 20, '1', '8:00', '21:00'),
(273, 20, '2', '8:00', '21:00'),
(274, 20, '3', '8:00', '21:00'),
(275, 20, '4', '8:00', '21:00'),
(276, 20, '5', '8:00', '21:00'),
(277, 20, '6', '8:00', '21:00'),
(278, 21, '1', '8:00', '21:00'),
(279, 21, '2', '8:00', '21:00'),
(280, 21, '3', '8:00', '21:00'),
(281, 21, '4', '8:00', '21:00'),
(282, 21, '5', '8:00', '21:00'),
(283, 21, '6', '8:00', '21:00'),
(284, 22, '1', '8:00', '21:00'),
(285, 22, '2', '8:00', '21:00'),
(286, 22, '3', '8:00', '21:00'),
(287, 22, '4', '8:00', '21:00'),
(288, 22, '5', '8:00', '21:00'),
(289, 22, '6', '8:00', '21:00'),
(290, 23, '1', '8:30', '21:00'),
(291, 23, '2', '8:00', '21:00'),
(292, 23, '3', '8:00', '21:00'),
(293, 23, '4', '8:00', '21:00'),
(294, 23, '5', '8:00', '21:00'),
(295, 23, '6', '8:00', '12:00');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `CLASS_CODE` int(2) NOT NULL,
  `CLASS` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`CLASS_CODE`, `CLASS`) VALUES
(1, 'LECTURE'),
(2, 'LABORATORY');

-- --------------------------------------------------------

--
-- Table structure for table `classmanager`
--

CREATE TABLE IF NOT EXISTS `classmanager` (
  `CM_ID` int(11) NOT NULL,
  `COURSE` int(11) NOT NULL,
  `YEAR` int(11) NOT NULL,
  `SECTION` int(11) NOT NULL,
  `DT_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classmanager`
--

INSERT INTO `classmanager` (`CM_ID`, `COURSE`, `YEAR`, `SECTION`, `DT_ID`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 1, 1, 2),
(3, 1, 1, 1, 3),
(4, 1, 1, 1, 4),
(5, 1, 1, 1, 9),
(6, 1, 1, 1, 10),
(7, 1, 1, 1, 13),
(8, 1, 1, 1, 14),
(9, 1, 2, 2, 1),
(10, 1, 2, 2, 2),
(11, 1, 2, 2, 3),
(12, 1, 2, 2, 8),
(13, 1, 2, 2, 9),
(14, 1, 2, 2, 10),
(15, 1, 2, 2, 18),
(16, 1, 2, 2, 19);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `CID` int(11) NOT NULL,
  `COURSE_CODE` varchar(100) NOT NULL,
  `COURSE` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CID`, `COURSE_CODE`, `COURSE`) VALUES
(1, 'BSIT', 'BACHELOR OF SCIENCE IN INFORMATION TECHNOLOGY'),
(2, 'BSBM-MM', 'BACHELOR OF SCIENCE IN BUSINESS MANAGEMENT MAJOR IN MARKETING MANAGEMENT'),
(4, 'BSHRM', 'BACHELOR OF SCIENCE IN HOTEL AND RESTAURANT MANAGEMENT');

-- --------------------------------------------------------

--
-- Table structure for table `curriculum`
--

CREATE TABLE IF NOT EXISTS `curriculum` (
  `CUR_ID` int(11) NOT NULL,
  `COURSE` varchar(100) NOT NULL,
  `SUBJECT` int(11) NOT NULL,
  `YEAR_OFF` int(1) NOT NULL,
  `TERM` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curriculum`
--

INSERT INTO `curriculum` (`CUR_ID`, `COURSE`, `SUBJECT`, `YEAR_OFF`, `TERM`) VALUES
(2, '2', 2, 2, 2),
(10, '2', 1, 1, 1),
(11, '2', 3, 1, 1),
(12, '1', 1, 1, 1),
(13, '1', 2, 1, 1),
(14, '1', 3, 1, 1),
(15, '1', 4, 1, 1),
(16, '1', 5, 1, 1),
(17, '1', 6, 1, 1),
(18, '1', 8, 1, 1),
(19, '1', 9, 1, 2),
(20, '1', 10, 1, 2),
(21, '1', 11, 1, 2),
(22, '1', 12, 1, 2),
(23, '1', 13, 1, 2),
(24, '1', 14, 1, 2),
(25, '1', 15, 1, 2),
(26, '1', 16, 1, 2),
(27, '1', 17, 2, 1),
(28, '1', 18, 2, 1),
(29, '1', 19, 2, 1),
(30, '1', 20, 2, 1),
(31, '1', 21, 2, 1),
(32, '1', 22, 2, 1),
(33, '1', 23, 2, 1),
(34, '1', 31, 2, 2),
(35, '1', 24, 2, 2),
(36, '1', 25, 2, 2),
(37, '1', 26, 2, 2),
(38, '1', 27, 2, 2),
(39, '1', 28, 2, 2),
(40, '1', 29, 2, 2),
(41, '1', 30, 2, 2),
(42, '4', 1, 1, 1),
(43, '4', 32, 1, 1),
(44, '4', 33, 1, 1),
(45, '4', 34, 1, 1),
(46, '4', 35, 1, 1),
(47, '4', 36, 1, 1),
(48, '4', 7, 1, 1),
(49, '4', 8, 1, 1),
(50, '4', 9, 1, 2),
(51, '4', 10, 1, 2),
(52, '4', 37, 1, 2),
(53, '4', 38, 1, 2),
(54, '4', 39, 1, 2),
(55, '4', 40, 1, 2),
(56, '4', 15, 1, 2),
(57, '4', 16, 1, 2),
(58, '4', 41, 2, 1),
(59, '4', 42, 2, 1),
(60, '4', 43, 2, 1),
(61, '4', 44, 2, 1),
(62, '4', 45, 2, 1),
(63, '4', 46, 2, 1),
(64, '4', 47, 2, 2),
(65, '4', 4, 2, 2),
(66, '4', 48, 2, 2),
(67, '4', 49, 2, 2),
(68, '4', 50, 2, 2),
(69, '4', 51, 2, 2),
(70, '4', 52, 2, 2),
(71, '4', 30, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `days`
--

CREATE TABLE IF NOT EXISTS `days` (
  `DAY_ID` int(11) NOT NULL,
  `DAY_CODE` varchar(4) NOT NULL,
  `DAY` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `days`
--

INSERT INTO `days` (`DAY_ID`, `DAY_CODE`, `DAY`) VALUES
(1, 'M', 'MONDAY'),
(2, 'T', 'TUESDAY'),
(3, 'W', 'WEDNESDAY'),
(4, 'TH', 'THURSDAY'),
(5, 'F', 'FRIDAY'),
(6, 'SAT', 'SATURDAY'),
(7, 'SUN', 'SUNDAY');

-- --------------------------------------------------------

--
-- Table structure for table `daytimemanager`
--

CREATE TABLE IF NOT EXISTS `daytimemanager` (
  `DT_ID` int(11) NOT NULL,
  `DAY` int(11) NOT NULL,
  `START_TIME` varchar(20) NOT NULL,
  `END_TIME` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=157 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daytimemanager`
--

INSERT INTO `daytimemanager` (`DT_ID`, `DAY`, `START_TIME`, `END_TIME`) VALUES
(1, 1, '8:00', '8:30'),
(2, 2, '8:00', '8:30'),
(3, 3, '8:00', '8:30'),
(4, 4, '8:00', '8:30'),
(5, 5, '8:00', '8:30'),
(6, 6, '8:00', '8:30'),
(7, 1, '8:30', '8:00'),
(8, 2, '8:30', '8:00'),
(9, 3, '8:30', '8:00'),
(10, 4, '8:30', '8:00'),
(11, 5, '8:30', '8:00'),
(12, 6, '8:30', '8:00'),
(13, 1, '9:00', '9:30'),
(14, 2, '9:00', '9:30'),
(15, 3, '9:00', '9:30'),
(16, 4, '9:00', '9:30'),
(17, 5, '9:00', '9:30'),
(18, 6, '9:00', '9:30'),
(19, 1, '9:30', '9:00'),
(20, 2, '9:30', '9:00'),
(21, 3, '9:30', '9:00'),
(22, 4, '9:30', '9:00'),
(23, 5, '9:30', '9:00'),
(24, 6, '9:30', '9:00'),
(25, 1, '10:00', '10:30'),
(26, 2, '10:00', '10:30'),
(27, 3, '10:00', '10:30'),
(28, 4, '10:00', '10:30'),
(29, 5, '10:00', '10:30'),
(30, 6, '10:00', '10:30'),
(31, 1, '10:30', '10:00'),
(32, 2, '10:30', '10:00'),
(33, 3, '10:30', '10:00'),
(34, 4, '10:30', '10:00'),
(35, 5, '10:30', '10:00'),
(36, 6, '10:30', '10:00'),
(37, 1, '11:00', '11:30'),
(38, 2, '11:00', '11:30'),
(39, 3, '11:00', '11:30'),
(40, 4, '11:00', '11:30'),
(41, 5, '11:00', '11:30'),
(42, 6, '11:00', '11:30'),
(43, 1, '11:30', '11:00'),
(44, 2, '11:30', '11:00'),
(45, 3, '11:30', '11:00'),
(46, 4, '11:30', '11:00'),
(47, 5, '11:30', '11:00'),
(48, 6, '11:30', '11:00'),
(49, 1, '12:00', '12:30'),
(50, 2, '12:00', '12:30'),
(51, 3, '12:00', '12:30'),
(52, 4, '12:00', '12:30'),
(53, 5, '12:00', '12:30'),
(54, 6, '12:00', '12:30'),
(55, 1, '12:30', '12:00'),
(56, 2, '12:30', '12:00'),
(57, 3, '12:30', '12:00'),
(58, 4, '12:30', '12:00'),
(59, 5, '12:30', '12:00'),
(60, 6, '12:30', '12:00'),
(61, 1, '13:00', '13:30'),
(62, 2, '13:00', '13:30'),
(63, 3, '13:00', '13:30'),
(64, 4, '13:00', '13:30'),
(65, 5, '13:00', '13:30'),
(66, 6, '13:00', '13:30'),
(67, 1, '13:30', '13:00'),
(68, 2, '13:30', '13:00'),
(69, 3, '13:30', '13:00'),
(70, 4, '13:30', '13:00'),
(71, 5, '13:30', '13:00'),
(72, 6, '13:30', '13:00'),
(73, 1, '14:00', '14:30'),
(74, 2, '14:00', '14:30'),
(75, 3, '14:00', '14:30'),
(76, 4, '14:00', '14:30'),
(77, 5, '14:00', '14:30'),
(78, 6, '14:00', '14:30'),
(79, 1, '14:30', '14:00'),
(80, 2, '14:30', '14:00'),
(81, 3, '14:30', '14:00'),
(82, 4, '14:30', '14:00'),
(83, 5, '14:30', '14:00'),
(84, 6, '14:30', '14:00'),
(85, 1, '15:00', '15:30'),
(86, 2, '15:00', '15:30'),
(87, 3, '15:00', '15:30'),
(88, 4, '15:00', '15:30'),
(89, 5, '15:00', '15:30'),
(90, 6, '15:00', '15:30'),
(91, 1, '15:30', '15:00'),
(92, 2, '15:30', '15:00'),
(93, 3, '15:30', '15:00'),
(94, 4, '15:30', '15:00'),
(95, 5, '15:30', '15:00'),
(96, 6, '15:30', '15:00'),
(97, 1, '16:00', '16:30'),
(98, 2, '16:00', '16:30'),
(99, 3, '16:00', '16:30'),
(100, 4, '16:00', '16:30'),
(101, 5, '16:00', '16:30'),
(102, 6, '16:00', '16:30'),
(103, 1, '16:30', '16:00'),
(104, 2, '16:30', '16:00'),
(105, 3, '16:30', '16:00'),
(106, 4, '16:30', '16:00'),
(107, 5, '16:30', '16:00'),
(108, 6, '16:30', '16:00'),
(109, 1, '17:00', '17:30'),
(110, 2, '17:00', '17:30'),
(111, 3, '17:00', '17:30'),
(112, 4, '17:00', '17:30'),
(113, 5, '17:00', '17:30'),
(114, 6, '17:00', '17:30'),
(115, 1, '17:30', '17:00'),
(116, 2, '17:30', '17:00'),
(117, 3, '17:30', '17:00'),
(118, 4, '17:30', '17:00'),
(119, 5, '17:30', '17:00'),
(120, 6, '17:30', '17:00'),
(121, 1, '18:00', '18:30'),
(122, 2, '18:00', '18:30'),
(123, 3, '18:00', '18:30'),
(124, 4, '18:00', '18:30'),
(125, 5, '18:00', '18:30'),
(126, 6, '18:00', '18:30'),
(127, 1, '18:30', '18:00'),
(128, 2, '18:30', '18:00'),
(129, 3, '18:30', '18:00'),
(130, 4, '18:30', '18:00'),
(131, 5, '18:30', '18:00'),
(132, 6, '18:30', '18:00'),
(133, 1, '19:00', '19:30'),
(134, 2, '19:00', '19:30'),
(135, 3, '19:00', '19:30'),
(136, 4, '19:00', '19:30'),
(137, 5, '19:00', '19:30'),
(138, 6, '19:00', '19:30'),
(139, 1, '19:30', '19:00'),
(140, 2, '19:30', '19:00'),
(141, 3, '19:30', '19:00'),
(142, 4, '19:30', '19:00'),
(143, 5, '19:30', '19:00'),
(144, 6, '19:30', '19:00'),
(145, 1, '20:00', '20:30'),
(146, 2, '20:00', '20:30'),
(147, 3, '20:00', '20:30'),
(148, 4, '20:00', '20:30'),
(149, 5, '20:00', '20:30'),
(150, 6, '20:00', '20:30'),
(151, 1, '20:30', '20:00'),
(152, 2, '20:30', '20:00'),
(153, 3, '20:30', '20:00'),
(154, 4, '20:30', '20:00'),
(155, 5, '20:30', '20:00'),
(156, 6, '20:30', '20:00');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `DID` int(11) NOT NULL,
  `DEP_CODE` varchar(11) NOT NULL,
  `DEPARTMENT` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DID`, `DEP_CODE`, `DEPARTMENT`) VALUES
(1, 'DOS', 'DEPARTMENT OF SCIENCE'),
(2, 'DIT', 'DEPARTMENT OF IT'),
(3, 'DGS', 'Department of general Sciences'),
(4, 'DHK', 'Department of Human Kinetics'),
(5, 'DM', 'DEPARTMENT OFMANAGEMENT'),
(9, 'DFL', 'DEPARTMENT OF LANGUAGES');

-- --------------------------------------------------------

--
-- Table structure for table `factload`
--

CREATE TABLE IF NOT EXISTS `factload` (
  `FACTLOAD_ID` int(11) NOT NULL,
  `SCHED_ID` int(11) NOT NULL,
  `LECTURER` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factload`
--

INSERT INTO `factload` (`FACTLOAD_ID`, `SCHED_ID`, `LECTURER`) VALUES
(2, 21, 1),
(1, 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lectmanager`
--

CREATE TABLE IF NOT EXISTS `lectmanager` (
  `LM_ID` int(11) NOT NULL,
  `LECTURER` int(11) NOT NULL,
  `DT_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=815 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lectmanager`
--

INSERT INTO `lectmanager` (`LM_ID`, `LECTURER`, `DT_ID`) VALUES
(324, 13, 1),
(325, 13, 7),
(326, 13, 13),
(327, 13, 19),
(328, 13, 25),
(329, 13, 31),
(330, 13, 2),
(331, 13, 8),
(332, 13, 14),
(333, 13, 20),
(334, 13, 26),
(335, 13, 32),
(336, 13, 3),
(337, 13, 9),
(338, 13, 15),
(339, 13, 21),
(340, 13, 27),
(341, 13, 33),
(342, 13, 4),
(343, 13, 10),
(344, 13, 16),
(345, 13, 22),
(346, 13, 28),
(347, 13, 34),
(348, 13, 5),
(349, 13, 11),
(350, 13, 17),
(351, 13, 23),
(352, 13, 29),
(353, 13, 35),
(354, 13, 6),
(355, 13, 12),
(356, 13, 18),
(357, 13, 24),
(358, 13, 30),
(359, 13, 36),
(396, 14, 1),
(397, 14, 7),
(398, 14, 13),
(399, 14, 19),
(400, 14, 25),
(401, 14, 31),
(402, 14, 2),
(403, 14, 8),
(404, 14, 14),
(405, 14, 20),
(406, 14, 26),
(407, 14, 32),
(408, 14, 3),
(409, 14, 9),
(410, 14, 15),
(411, 14, 21),
(412, 14, 27),
(413, 14, 33),
(414, 14, 4),
(415, 14, 10),
(416, 14, 16),
(417, 14, 22),
(418, 14, 28),
(419, 14, 34),
(420, 14, 5),
(421, 14, 11),
(422, 14, 17),
(423, 14, 23),
(424, 14, 29),
(425, 14, 6),
(426, 14, 12),
(427, 14, 18),
(428, 14, 24),
(429, 14, 30),
(430, 14, 36),
(608, 18, 1),
(609, 18, 7),
(610, 18, 13),
(611, 18, 19),
(612, 18, 25),
(613, 18, 31),
(614, 18, 2),
(615, 18, 8),
(616, 18, 14),
(617, 18, 20),
(618, 18, 26),
(619, 18, 32),
(620, 18, 3),
(621, 18, 9),
(622, 18, 15),
(623, 18, 21),
(624, 18, 27),
(625, 18, 4),
(626, 18, 10),
(627, 18, 16),
(628, 18, 22),
(629, 18, 28),
(630, 18, 34),
(631, 18, 5),
(632, 18, 11),
(633, 18, 17),
(634, 18, 23),
(635, 18, 29),
(636, 18, 6),
(637, 18, 12),
(638, 18, 18),
(639, 18, 24),
(640, 18, 30),
(641, 18, 36),
(676, 19, 1),
(677, 19, 7),
(678, 19, 13),
(679, 19, 19),
(680, 19, 25),
(681, 19, 2),
(682, 19, 8),
(683, 19, 14),
(684, 19, 20),
(685, 19, 26),
(686, 19, 32),
(687, 19, 3),
(688, 19, 9),
(689, 19, 15),
(690, 19, 21),
(691, 19, 27),
(692, 19, 4),
(693, 19, 10),
(694, 19, 16),
(695, 19, 22),
(696, 19, 28),
(697, 19, 34),
(698, 19, 5),
(699, 19, 11),
(700, 19, 17),
(701, 19, 23),
(702, 19, 29),
(703, 19, 6),
(704, 19, 12),
(705, 19, 18),
(706, 19, 24),
(707, 19, 30),
(708, 19, 36),
(709, 17, 1),
(710, 17, 7),
(711, 17, 13),
(712, 17, 19),
(713, 17, 25),
(714, 17, 31),
(715, 17, 2),
(716, 17, 8),
(717, 17, 14),
(718, 17, 20),
(719, 17, 26),
(720, 17, 32),
(721, 17, 3),
(722, 17, 9),
(723, 17, 15),
(724, 17, 21),
(725, 17, 27),
(726, 17, 33),
(727, 17, 4),
(728, 17, 10),
(729, 17, 16),
(730, 17, 22),
(731, 17, 28),
(732, 17, 5),
(733, 17, 11),
(734, 17, 17),
(735, 17, 23),
(736, 17, 29),
(737, 17, 6),
(738, 17, 12),
(739, 17, 18),
(740, 17, 24),
(741, 17, 30),
(742, 17, 36),
(779, 20, 1),
(780, 20, 7),
(781, 20, 13),
(782, 20, 19),
(783, 20, 25),
(784, 20, 31),
(785, 20, 2),
(786, 20, 8),
(787, 20, 14),
(788, 20, 20),
(789, 20, 26),
(790, 20, 32),
(791, 20, 3),
(792, 20, 9),
(793, 20, 15),
(794, 20, 21),
(795, 20, 27),
(796, 20, 33),
(797, 20, 4),
(798, 20, 10),
(799, 20, 16),
(800, 20, 22),
(801, 20, 28),
(802, 20, 34),
(803, 20, 5),
(804, 20, 11),
(805, 20, 17),
(806, 20, 23),
(807, 20, 29),
(808, 20, 35),
(809, 20, 6),
(810, 20, 12),
(811, 20, 18),
(812, 20, 24),
(813, 20, 30),
(814, 20, 36);

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE IF NOT EXISTS `lecturer` (
  `LECTURER_ID` int(11) NOT NULL,
  `FIRSTNAME` varchar(100) NOT NULL,
  `MIDDLENAME` varchar(100) NOT NULL,
  `LASTNAME` varchar(100) NOT NULL,
  `DEPARTMENT` int(11) NOT NULL,
  `STATUS` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`LECTURER_ID`, `FIRSTNAME`, `MIDDLENAME`, `LASTNAME`, `DEPARTMENT`, `STATUS`) VALUES
(13, 'RENMARITO', 'LAGUITAN', 'BASCO', 2, 1),
(14, 'JUNAR', 'BUENA', 'VENTURA', 2, 2),
(17, 'JIMUEL', 'SOLID', 'GERNALE', 3, 1),
(18, 'Paul ', 'Adrian', 'Togade', 2, 1),
(19, 'Mikhail', 'Master', 'Tan', 3, 1),
(20, 'Adrian', 'Paul', 'Togade', 2, 1),
(21, 'JM', 'ASTIG', 'RAYOS', 4, 1),
(22, 'Elvin', 'Smile', 'Eternal', 9, 1),
(23, 'Third', 'Hokage', 'belmonte', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `ROOM_ID` int(11) NOT NULL,
  `ROOM` varchar(100) NOT NULL,
  `ROOM_TYPE` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`ROOM_ID`, `ROOM`, `ROOM_TYPE`) VALUES
(1, '2A', 2),
(2, '2B', 1),
(3, '2C', 3),
(4, '3A', 1),
(5, '3B', 2),
(6, '3C', 3),
(7, '2D', 4),
(8, '3D', 4),
(9, '2E', 5),
(10, '3E', 5),
(11, '222', 1),
(12, '212', 3);

-- --------------------------------------------------------

--
-- Table structure for table `roommanager`
--

CREATE TABLE IF NOT EXISTS `roommanager` (
  `ROOMMAN_ID` int(11) NOT NULL,
  `ROOM` int(11) NOT NULL,
  `DT_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=685 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roommanager`
--

INSERT INTO `roommanager` (`ROOMMAN_ID`, `ROOM`, `DT_ID`) VALUES
(289, 1, 1),
(290, 1, 2),
(291, 1, 3),
(292, 1, 4),
(293, 1, 5),
(294, 1, 6),
(295, 1, 7),
(296, 1, 8),
(297, 1, 9),
(298, 1, 10),
(299, 1, 11),
(300, 1, 12),
(301, 1, 13),
(302, 1, 14),
(303, 1, 15),
(304, 1, 16),
(305, 1, 17),
(306, 1, 18),
(307, 1, 19),
(308, 1, 20),
(309, 1, 21),
(310, 1, 22),
(311, 1, 23),
(312, 1, 24),
(313, 1, 25),
(314, 1, 26),
(315, 1, 27),
(316, 1, 28),
(317, 1, 29),
(318, 1, 30),
(319, 1, 31),
(320, 1, 32),
(321, 1, 33),
(322, 1, 34),
(323, 1, 35),
(324, 1, 36),
(361, 2, 1),
(362, 2, 2),
(363, 2, 3),
(364, 2, 4),
(365, 2, 5),
(366, 2, 6),
(367, 2, 7),
(368, 2, 8),
(369, 2, 9),
(370, 2, 10),
(371, 2, 11),
(372, 2, 12),
(373, 2, 13),
(374, 2, 14),
(375, 2, 15),
(376, 2, 16),
(377, 2, 17),
(378, 2, 18),
(379, 2, 19),
(380, 2, 20),
(381, 2, 21),
(382, 2, 22),
(383, 2, 23),
(384, 2, 24),
(385, 2, 25),
(386, 2, 26),
(387, 2, 27),
(388, 2, 28),
(389, 2, 29),
(390, 2, 30),
(391, 2, 31),
(392, 2, 32),
(393, 2, 33),
(394, 2, 34),
(395, 2, 35),
(396, 2, 36),
(397, 3, 1),
(398, 3, 2),
(399, 3, 3),
(400, 3, 4),
(401, 3, 5),
(402, 3, 6),
(403, 3, 7),
(404, 3, 8),
(405, 3, 9),
(406, 3, 10),
(407, 3, 11),
(408, 3, 12),
(409, 3, 13),
(410, 3, 14),
(411, 3, 15),
(412, 3, 16),
(413, 3, 17),
(414, 3, 18),
(415, 3, 19),
(416, 3, 20),
(417, 3, 21),
(418, 3, 22),
(419, 3, 23),
(420, 3, 24),
(421, 3, 25),
(422, 3, 26),
(423, 3, 27),
(424, 3, 28),
(425, 3, 29),
(426, 3, 30),
(427, 3, 31),
(428, 3, 32),
(429, 3, 33),
(430, 3, 34),
(431, 3, 35),
(432, 3, 36),
(433, 4, 1),
(434, 4, 2),
(435, 4, 3),
(436, 4, 4),
(437, 4, 5),
(438, 4, 6),
(439, 4, 7),
(440, 4, 8),
(441, 4, 9),
(442, 4, 10),
(443, 4, 11),
(444, 4, 12),
(445, 4, 13),
(446, 4, 14),
(447, 4, 15),
(448, 4, 16),
(449, 4, 17),
(450, 4, 18),
(451, 4, 19),
(452, 4, 20),
(453, 4, 21),
(454, 4, 22),
(455, 4, 23),
(456, 4, 24),
(457, 4, 25),
(458, 4, 26),
(459, 4, 27),
(460, 4, 28),
(461, 4, 29),
(462, 4, 30),
(463, 4, 31),
(464, 4, 32),
(465, 4, 33),
(466, 4, 34),
(467, 4, 35),
(468, 4, 36),
(469, 5, 1),
(470, 5, 2),
(471, 5, 3),
(472, 5, 4),
(473, 5, 5),
(474, 5, 6),
(475, 5, 7),
(476, 5, 8),
(477, 5, 9),
(478, 5, 10),
(479, 5, 11),
(480, 5, 12),
(481, 5, 13),
(482, 5, 14),
(483, 5, 15),
(484, 5, 16),
(485, 5, 17),
(486, 5, 18),
(487, 5, 19),
(488, 5, 20),
(489, 5, 21),
(490, 5, 22),
(491, 5, 23),
(492, 5, 24),
(493, 5, 25),
(494, 5, 26),
(495, 5, 27),
(496, 5, 28),
(497, 5, 29),
(498, 5, 30),
(499, 5, 31),
(500, 5, 32),
(501, 5, 33),
(502, 5, 34),
(503, 5, 35),
(504, 5, 36),
(505, 6, 1),
(506, 6, 2),
(507, 6, 3),
(508, 6, 4),
(509, 6, 5),
(510, 6, 6),
(511, 6, 7),
(512, 6, 8),
(513, 6, 9),
(514, 6, 10),
(515, 6, 11),
(516, 6, 12),
(517, 6, 13),
(518, 6, 14),
(519, 6, 15),
(520, 6, 16),
(521, 6, 17),
(522, 6, 18),
(523, 6, 19),
(524, 6, 20),
(525, 6, 21),
(526, 6, 22),
(527, 6, 23),
(528, 6, 24),
(529, 6, 25),
(530, 6, 26),
(531, 6, 27),
(532, 6, 28),
(533, 6, 29),
(534, 6, 30),
(535, 6, 31),
(536, 6, 32),
(537, 6, 33),
(538, 6, 34),
(539, 6, 35),
(540, 6, 36),
(541, 7, 1),
(542, 7, 2),
(543, 7, 3),
(544, 7, 4),
(545, 7, 5),
(546, 7, 6),
(547, 7, 7),
(548, 7, 8),
(549, 7, 9),
(550, 7, 10),
(551, 7, 11),
(552, 7, 12),
(553, 7, 13),
(554, 7, 14),
(555, 7, 15),
(556, 7, 16),
(557, 7, 17),
(558, 7, 18),
(559, 7, 19),
(560, 7, 20),
(561, 7, 21),
(562, 7, 22),
(563, 7, 23),
(564, 7, 24),
(565, 7, 25),
(566, 7, 26),
(567, 7, 27),
(568, 7, 28),
(569, 7, 29),
(570, 7, 30),
(571, 7, 31),
(572, 7, 32),
(573, 7, 33),
(574, 7, 34),
(575, 7, 35),
(576, 7, 36),
(577, 8, 1),
(578, 8, 2),
(579, 8, 3),
(580, 8, 4),
(581, 8, 5),
(582, 8, 6),
(583, 8, 7),
(584, 8, 8),
(585, 8, 9),
(586, 8, 10),
(587, 8, 11),
(588, 8, 12),
(589, 8, 13),
(590, 8, 14),
(591, 8, 15),
(592, 8, 16),
(593, 8, 17),
(594, 8, 18),
(595, 8, 19),
(596, 8, 20),
(597, 8, 21),
(598, 8, 22),
(599, 8, 23),
(600, 8, 24),
(601, 8, 25),
(602, 8, 26),
(603, 8, 27),
(604, 8, 28),
(605, 8, 29),
(606, 8, 30),
(607, 8, 31),
(608, 8, 32),
(609, 8, 33),
(610, 8, 34),
(611, 8, 35),
(612, 8, 36),
(613, 9, 1),
(614, 9, 2),
(615, 9, 3),
(616, 9, 4),
(617, 9, 5),
(618, 9, 6),
(619, 9, 7),
(620, 9, 8),
(621, 9, 9),
(622, 9, 10),
(623, 9, 11),
(624, 9, 12),
(625, 9, 13),
(626, 9, 14),
(627, 9, 15),
(628, 9, 16),
(629, 9, 17),
(630, 9, 18),
(631, 9, 19),
(632, 9, 20),
(633, 9, 21),
(634, 9, 22),
(635, 9, 23),
(636, 9, 24),
(637, 9, 25),
(638, 9, 26),
(639, 9, 27),
(640, 9, 28),
(641, 9, 29),
(642, 9, 30),
(643, 9, 31),
(644, 9, 32),
(645, 9, 33),
(646, 9, 34),
(647, 9, 35),
(648, 9, 36),
(649, 10, 1),
(650, 10, 2),
(651, 10, 3),
(652, 10, 4),
(653, 10, 5),
(654, 10, 6),
(655, 10, 7),
(656, 10, 8),
(657, 10, 9),
(658, 10, 10),
(659, 10, 11),
(660, 10, 12),
(661, 10, 13),
(662, 10, 14),
(663, 10, 15),
(664, 10, 16),
(665, 10, 17),
(666, 10, 18),
(667, 10, 19),
(668, 10, 20),
(669, 10, 21),
(670, 10, 22),
(671, 10, 23),
(672, 10, 24),
(673, 10, 25),
(674, 10, 26),
(675, 10, 27),
(676, 10, 28),
(677, 10, 29),
(678, 10, 30),
(679, 10, 31),
(680, 10, 32),
(681, 10, 33),
(682, 10, 34),
(683, 10, 35),
(684, 10, 36);

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE IF NOT EXISTS `roomtype` (
  `ROOMTYPENO` int(11) NOT NULL,
  `ROOMTYPE` varchar(100) NOT NULL,
  `DEPARTMENT` int(11) NOT NULL,
  `CLASS` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`ROOMTYPENO`, `ROOMTYPE`, `DEPARTMENT`, `CLASS`) VALUES
(1, 'COMPUTER LAB', 2, 2),
(2, 'SCIENCE LAB', 1, 2),
(3, 'LECTURE ROOM', 0, 1),
(4, 'ENGLISH LAB', 9, 2),
(5, 'PE', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `SCHED_ID` int(11) NOT NULL,
  `SCHED_CODE` int(11) NOT NULL,
  `SCHOOL_YEAR` int(11) NOT NULL,
  `TERM` varchar(100) NOT NULL,
  `COURSE` varchar(100) NOT NULL,
  `YEAR` int(11) NOT NULL,
  `SECTION` int(11) NOT NULL,
  `SUBJECT` varchar(100) NOT NULL,
  `ROOM` int(11) NOT NULL,
  `DAYS` varchar(7) NOT NULL,
  `START_TIME` varchar(20) NOT NULL,
  `END_TIME` varchar(20) NOT NULL,
  `CLASS` int(2) NOT NULL,
  `LECTURER` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schoolyear`
--

CREATE TABLE IF NOT EXISTS `schoolyear` (
  `SY_ID` int(11) NOT NULL,
  `SY` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schoolyear`
--

INSERT INTO `schoolyear` (`SY_ID`, `SY`) VALUES
(1, '2015-2016'),
(2, '2016-2017');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `SECTION_ID` int(11) NOT NULL,
  `SECTION` varchar(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`SECTION_ID`, `SECTION`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `STAT_ID` int(11) NOT NULL,
  `EMPLOYMENT_STATUS` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`STAT_ID`, `EMPLOYMENT_STATUS`) VALUES
(1, 'FULLTIME'),
(2, 'PARTTIME');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `SID` int(11) NOT NULL,
  `SUBJECT_CODE` varchar(100) NOT NULL,
  `SUBJECT` varchar(200) NOT NULL,
  `SUBTYPE` int(11) NOT NULL,
  `LECUNITS` int(2) NOT NULL,
  `LABUNITS` int(2) NOT NULL,
  `TOTAL_UNITS` int(2) NOT NULL,
  `LECHOURS` int(11) NOT NULL,
  `LABHOURS` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SID`, `SUBJECT_CODE`, `SUBJECT`, `SUBTYPE`, `LECUNITS`, `LABUNITS`, `TOTAL_UNITS`, `LECHOURS`, `LABHOURS`) VALUES
(1, 'ENG1', 'Study and Thinking Skills', 5, 2, 1, 3, 2, 3),
(2, 'FILI6', 'Komunikasyon sa Akademikong Filipino', 6, 3, 0, 3, 3, 0),
(3, 'MATH2', 'College Algebra', 1, 3, 0, 3, 3, 0),
(4, 'SOSC2', 'General Psychology', 10, 3, 0, 3, 3, 0),
(5, 'ITEC 21', 'IT Fundamentals', 11, 2, 1, 3, 2, 3),
(6, 'DCIT 21', 'Programming 1', 11, 1, 2, 3, 1, 6),
(7, 'PHED 1', 'Physical Fitness & Aerobics', 8, 2, 0, 2, 2, 0),
(8, 'NSTP 1', 'CWTS / ROTC / LTS', 7, 3, 0, 3, 3, 0),
(9, 'ENGL 2', 'Writing in Discipline', 5, 2, 1, 3, 2, 3),
(10, 'FILI 7', 'Pagbasa at Pagsulat Tungo sa Pananaliksik', 6, 3, 0, 3, 3, 0),
(11, 'MATH 4', 'Plane Trigonometry', 1, 3, 0, 3, 3, 0),
(12, 'LIT 1', 'Philippine Literature', 6, 3, 0, 3, 3, 0),
(13, 'DCIT 22', 'Programming 2', 11, 1, 2, 3, 1, 6),
(14, 'DCIT 23', 'Discrete Structure', 11, 3, 0, 3, 3, 0),
(15, 'PHED 2', 'Rhythmic Activities', 8, 2, 0, 2, 2, 0),
(16, 'NSTP 2', 'CWTS / ROTC / LTS 2', 7, 0, 3, 3, 0, 5),
(17, 'ENGL 6', 'Speech Communication', 5, 2, 1, 3, 2, 3),
(18, 'MATH 21', 'Analytic Geometry with Calculus', 1, 3, 0, 3, 3, 0),
(19, 'SOSC 4', 'Philippine History, Geography and Constitution', 10, 3, 0, 3, 3, 0),
(20, 'PHYS 1', 'Mechanics and Heat', 2, 2, 1, 3, 2, 3),
(21, 'DCIT 50', 'Object Oriented Programmin', 11, 2, 1, 3, 2, 3),
(22, 'CCTN 50b', 'Basic Troubleshooting and Maintenance', 11, 2, 1, 3, 2, 3),
(23, 'PHED 3', 'Individual / Dual Sports', 8, 2, 0, 2, 2, 0),
(24, 'PHYS 2', 'Wave, Electromagnetism, Sounds & Light', 2, 2, 1, 3, 2, 3),
(25, 'BTCH 1', 'Introduction to Biotechnology', 2, 3, 0, 3, 3, 0),
(26, 'ITEC 50', 'Database Management System', 11, 2, 1, 3, 2, 3),
(27, 'DCIT 25', 'Professional Ethics', 10, 3, 0, 3, 3, 0),
(28, 'COSC 60', 'Data Structures, Computer System Organization & Assembly', 11, 2, 1, 3, 2, 3),
(29, 'DCIT 24', 'Language', 5, 2, 1, 3, 2, 3),
(30, 'PHED 4', 'Team Sports', 8, 2, 0, 2, 2, 0),
(31, 'SOSC 6', 'Rizals Life, Works and Writings', 10, 3, 0, 3, 3, 0),
(32, 'FILI 6', 'Sining ng Pakikipagtalastasan', 6, 3, 0, 3, 3, 0),
(33, 'ITEC 1', 'Introduction to Computer Concepts & Operation', 11, 2, 0, 2, 2, 3),
(34, 'BTRM 1', 'Principles of Tourism', 9, 3, 0, 3, 3, 0),
(35, 'HRML 1', 'Principles of Safety, Hygiene and Sanitation', 9, 3, 0, 3, 3, 0),
(36, 'HRML 21', 'Personality Development & Public Relation', 9, 3, 0, 3, 3, 0),
(37, 'ENSC 1', 'Earth & Environmental Science', 10, 3, 0, 3, 3, 0),
(38, 'BTRM 2', 'Principles of tourism II', 9, 3, 0, 3, 3, 0),
(39, 'HRML 22', 'Work Ethics in Hospitality Industry', 9, 3, 0, 3, 3, 0),
(40, 'HRML 50', 'Housekeeping Procedures', 9, 1, 2, 3, 1, 6),
(41, 'HUMN 5', 'Art, Man and Society', 10, 3, 0, 3, 3, 0),
(42, 'ENGL 5', 'Business Communications', 5, 2, 1, 3, 2, 3),
(43, 'MNGT 21', 'Concepts & Dynamics of Management', 4, 3, 0, 3, 3, 0),
(44, 'ACTG 21', 'Fundamentals of Accounting', 10, 3, 0, 3, 3, 0),
(45, 'HRML 2', 'Business Math with Hotel Application', 9, 3, 0, 3, 3, 0),
(46, 'HRML 3', 'Culinary Arts and Sciences', 9, 1, 2, 3, 1, 6),
(47, 'HUMN 9', 'Logic', 10, 3, 0, 3, 3, 0),
(48, 'SOSC 12', 'Cultural Anthropology', 10, 3, 0, 3, 3, 0),
(49, 'ECON 1', 'General Economics', 10, 3, 0, 3, 3, 0),
(50, 'FOLA 2', 'Foreign Language - French', 0, 2, 0, 2, 3, 0),
(51, 'MKTG 21', 'Principles of Marketing', 4, 3, 0, 3, 3, 0),
(52, 'HRML 55', 'Food and Beverage Services and Procedure', 9, 2, 3, 5, 2, 9);

-- --------------------------------------------------------

--
-- Table structure for table `subjecttype`
--

CREATE TABLE IF NOT EXISTS `subjecttype` (
  `TID` int(11) NOT NULL,
  `TYPE` varchar(20) NOT NULL,
  `DEPARTMENT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjecttype`
--

INSERT INTO `subjecttype` (`TID`, `TYPE`, `DEPARTMENT`) VALUES
(0, 'FRENCH', 9),
(1, 'MATH', 1),
(2, 'SCIENCE', 1),
(3, 'ENGINEERING', 1),
(4, 'MANAGEMENT', 5),
(5, 'ENGLISH', 9),
(6, 'FILIPINO', 3),
(7, 'NSTP', 4),
(8, 'PHYSICAL EDUCATION', 4),
(9, 'HRM', 3),
(10, 'GE', 3),
(11, 'IT', 2);

-- --------------------------------------------------------

--
-- Table structure for table `term`
--

CREATE TABLE IF NOT EXISTS `term` (
  `TERM_CODE` varchar(100) NOT NULL,
  `TERM` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `term`
--

INSERT INTO `term` (`TERM_CODE`, `TERM`) VALUES
('1', '1ST'),
('2', '2ND');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `UID` int(11) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UID`, `USERNAME`, `PASSWORD`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE IF NOT EXISTS `year` (
  `YEAR_ID` int(11) NOT NULL,
  `YEAR` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`YEAR_ID`, `YEAR`) VALUES
(1, '1st'),
(2, '2nd'),
(3, '3rd'),
(4, '4th');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `availability`
--
ALTER TABLE `availability`
  ADD PRIMARY KEY (`AVAIL_ID`), ADD KEY `LECTURER` (`LECTURER`,`DAYS`), ADD KEY `availability_ibfk_2` (`DAYS`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`CLASS_CODE`), ADD KEY `CLASS_CODE` (`CLASS_CODE`);

--
-- Indexes for table `classmanager`
--
ALTER TABLE `classmanager`
  ADD PRIMARY KEY (`CM_ID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CID`), ADD KEY `COURSE_CODE` (`COURSE_CODE`);

--
-- Indexes for table `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`CUR_ID`);

--
-- Indexes for table `days`
--
ALTER TABLE `days`
  ADD PRIMARY KEY (`DAY_ID`), ADD KEY `DAY_CODE` (`DAY_CODE`);

--
-- Indexes for table `daytimemanager`
--
ALTER TABLE `daytimemanager`
  ADD PRIMARY KEY (`DT_ID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`DID`), ADD KEY `DID` (`DID`), ADD KEY `DID_2` (`DID`);

--
-- Indexes for table `factload`
--
ALTER TABLE `factload`
  ADD PRIMARY KEY (`FACTLOAD_ID`), ADD KEY `SCHED_ID` (`SCHED_ID`,`LECTURER`), ADD KEY `LECTURER` (`LECTURER`);

--
-- Indexes for table `lectmanager`
--
ALTER TABLE `lectmanager`
  ADD PRIMARY KEY (`LM_ID`);

--
-- Indexes for table `lecturer`
--
ALTER TABLE `lecturer`
  ADD PRIMARY KEY (`LECTURER_ID`), ADD KEY `DEPARTMENT` (`DEPARTMENT`), ADD KEY `STATUS` (`STATUS`), ADD KEY `LECTURER_ID` (`LECTURER_ID`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`ROOM_ID`), ADD KEY `ROOM_TYPE` (`ROOM_TYPE`), ADD KEY `ROOM` (`ROOM`);

--
-- Indexes for table `roommanager`
--
ALTER TABLE `roommanager`
  ADD PRIMARY KEY (`ROOMMAN_ID`);

--
-- Indexes for table `roomtype`
--
ALTER TABLE `roomtype`
  ADD PRIMARY KEY (`ROOMTYPENO`), ADD KEY `ROOMTYPENO` (`ROOMTYPENO`), ADD KEY `ROOMTYPENO_2` (`ROOMTYPENO`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`SCHED_ID`), ADD KEY `SUBJECT` (`SUBJECT`,`COURSE`,`TERM`,`DAYS`,`YEAR`,`CLASS`,`ROOM`,`SCHOOL_YEAR`), ADD KEY `COURSE` (`COURSE`), ADD KEY `schedule_ibfk_3` (`TERM`), ADD KEY `schedule_ibfk_4` (`DAYS`), ADD KEY `schedule_ibfk_5` (`YEAR`), ADD KEY `schedule_ibfk_6` (`CLASS`), ADD KEY `schedule_ibfk_7` (`ROOM`), ADD KEY `schedule_ibfk_8` (`SCHOOL_YEAR`), ADD KEY `SECTION` (`SECTION`);

--
-- Indexes for table `schoolyear`
--
ALTER TABLE `schoolyear`
  ADD PRIMARY KEY (`SY_ID`), ADD KEY `SY_ID` (`SY_ID`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`SECTION_ID`), ADD KEY `SECTION_ID` (`SECTION_ID`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`STAT_ID`), ADD KEY `STAT_ID` (`STAT_ID`), ADD KEY `STAT_ID_2` (`STAT_ID`), ADD KEY `STAT_ID_3` (`STAT_ID`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`SID`), ADD UNIQUE KEY `SUBJECT_CODE` (`SUBJECT_CODE`), ADD KEY `SUBJECT_CODE_2` (`SUBJECT_CODE`);

--
-- Indexes for table `subjecttype`
--
ALTER TABLE `subjecttype`
  ADD PRIMARY KEY (`TID`);

--
-- Indexes for table `term`
--
ALTER TABLE `term`
  ADD PRIMARY KEY (`TERM_CODE`), ADD KEY `TERM_CODE` (`TERM_CODE`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UID`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`YEAR_ID`), ADD KEY `YEAR_ID` (`YEAR_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `availability`
--
ALTER TABLE `availability`
  MODIFY `AVAIL_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=296;
--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `CLASS_CODE` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `classmanager`
--
ALTER TABLE `classmanager`
  MODIFY `CM_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `CUR_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `daytimemanager`
--
ALTER TABLE `daytimemanager`
  MODIFY `DT_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=157;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `DID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `factload`
--
ALTER TABLE `factload`
  MODIFY `FACTLOAD_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lectmanager`
--
ALTER TABLE `lectmanager`
  MODIFY `LM_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=815;
--
-- AUTO_INCREMENT for table `lecturer`
--
ALTER TABLE `lecturer`
  MODIFY `LECTURER_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `ROOM_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `roommanager`
--
ALTER TABLE `roommanager`
  MODIFY `ROOMMAN_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=685;
--
-- AUTO_INCREMENT for table `roomtype`
--
ALTER TABLE `roomtype`
  MODIFY `ROOMTYPENO` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `SCHED_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `schoolyear`
--
ALTER TABLE `schoolyear`
  MODIFY `SY_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `SECTION_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `STAT_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `SID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `YEAR_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
