-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2021 at 07:48 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `login`
--

-- --------------------------------------------------------

--
-- Table structure for table `announce`
--

CREATE TABLE `announce` (
  `sendto` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `announcer` varchar(100) NOT NULL,
  `time` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announce`
--

INSERT INTO `announce` (`sendto`, `email`, `text`, `announcer`, `time`, `id`) VALUES
('4A', 'cdeepakdeepu@gmail.com', 'there will be no class today \r\n', 'deepak', '2020-08-07 05:01:13.368874', 1),
('4A', 'cdeepak1@gmail.com', 'do you have any doubts ', 'shashank', '2020-08-07 09:25:53.559246', 2),
('4A', 'cdeepakdeepu@gmail.com', 'hello there', 'deepak', '2020-08-07 13:39:11.397907', 3),
('4A', 'cdeepakdeepu@gmail.com', 'bring your assignments', 'deepak', '2020-08-07 14:01:11.168681', 4),
('3A', 'cdeepakdeepu@gmail.com', 'you have a test ', 'deepak', '2020-08-08 14:00:24.683246', 5),
('4A', 'cdeepakdeepu@gmail.com', ' your results are been announced', 'deepak', '2020-08-09 08:42:09.181942', 6),
('3B', 'cdeepakdeepu6@gmail.com', 'welcome to the new semester', 'deepu', '2020-08-14 11:19:45.063384', 7),
('4A', 'infopedia.org4@gmail.com', 'hello testing', 'ravi.s', '2020-08-15 12:25:57.371984', 8),
('4A', 'cdeepakdeepu6@gmail.com', 'hello', 'deepu', '2020-08-17 16:47:02.857771', 9),
('4A', 'cdeepakdeepu@gmail.com', 'checking', 'deepak', '2020-08-31 13:10:05.864438', 10);

-- --------------------------------------------------------

--
-- Table structure for table `attenden`
--

CREATE TABLE `attenden` (
  `id` int(100) NOT NULL,
  `musn` varchar(100) NOT NULL,
  `msem` int(100) NOT NULL,
  `mcode` varchar(100) NOT NULL,
  `attend` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attenden`
--

INSERT INTO `attenden` (`id`, `musn`, `msem`, `mcode`, `attend`) VALUES
(1, '4ps18cs01', 4, 'P18CS41', 54),
(2, '4ps18cs01', 4, '	P18CS42', 54),
(3, '4ps18cs01', 4, 'P18CS43', 54),
(4, '4ps18cs01', 4, 'P18CS44', 98),
(5, '4ps18cs02', 3, 'P18CS31', 56),
(6, '4ps18cs02', 3, 'P18CS32', 80),
(7, '4ps18cs04', 0, 'P18MA11', 34),
(8, '4ps18cs04', 0, 'P18CH12', 45),
(9, '4ps18cs04', 0, 'P18CS13', 35),
(10, '4ps18cs04', 0, 'P18MED14', 23),
(11, '4ps18cs04', 0, 'P18EC15', 0),
(12, '4ps18cs04', 0, 'P18CSL16', 0),
(13, '4ps18cs04', 0, 'P18CHL17', 0),
(14, '4ps18cs04', 0, 'P18HU18', 0),
(15, '4ps17cs05', 0, 'P18CS31', 98),
(16, '4ps17cs05', 0, 'P18CS32', 95),
(17, '4ps17cs05', 0, 'P18CS33', 78),
(18, '4ps17cs05', 0, 'P18CS34', 85),
(19, '4ps17cs05', 0, 'P18CS35', 87),
(20, '4ps17cs05', 0, 'P18CS36', 89),
(21, '4ps17cs05', 0, 'P18CSL37', 100),
(22, '4ps17cs05', 0, 'P18CSL38', 0),
(23, '4ps18cs06', 0, 'P18MA11', NULL),
(24, '4ps18cs06', 0, 'P18CH12', NULL),
(25, '4ps18cs06', 0, 'P18CS13', NULL),
(26, '4ps18cs06', 0, '	P18MED14', NULL),
(27, '4ps18cs06', 0, '	P18EC15', NULL),
(28, '4ps18cs06', 0, '	P18CSL16', NULL),
(29, '4ps18cs06', 0, 'P18CHL17', NULL),
(30, '4ps18cs06', 0, 'P18HU18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course` varchar(100) NOT NULL,
  `code` int(100) NOT NULL,
  `credit` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `code`, `credit`) VALUES
(1, 'data structure', 41, 4),
(2, 'sql', 42, 4),
(3, 'c++', 31, 4),
(4, 'math4', 43, 4),
(5, 'avr', 44, 4),
(6, 'digital logic design', 32, 3),
(7, 'physics', 33, 4),
(8, 'civil', 21, 4),
(9, 'electronics', 22, 3),
(10, 'math2', 23, 3),
(11, 'maths1', 24, 4),
(12, 'Ada', 45, 4);

-- --------------------------------------------------------

--
-- Table structure for table `handling`
--

CREATE TABLE `handling` (
  `semail` varchar(50) DEFAULT NULL,
  `sem1` varchar(100) DEFAULT NULL,
  `sub1` varchar(100) DEFAULT NULL,
  `sem2` varchar(100) DEFAULT NULL,
  `sub2` varchar(100) DEFAULT NULL,
  `sem3` varchar(100) DEFAULT NULL,
  `sub3` varchar(100) DEFAULT NULL,
  `sem4` varchar(100) DEFAULT NULL,
  `sub4` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `handling`
--

INSERT INTO `handling` (`semail`, `sem1`, `sub1`, `sem2`, `sub2`, `sem3`, `sub3`, `sem4`, `sub4`) VALUES
('cdeepakdeepu@gmail.com', '4A', 'c', '3B', 'python', '1A', 'ds', '', ''),
('cdeepakdeepu6@gmail.com', '3A', 'python', '', '', '', '', '', ''),
('infopedia.org4@gmail.com', '3B', 'digital logic design', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `questions` varchar(800) DEFAULT NULL,
  `answers` text,
  `answered` varchar(1000) DEFAULT NULL,
  `questionby` varchar(200) DEFAULT NULL,
  `section` varchar(100) DEFAULT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`questions`, `answers`, `answered`, `questionby`, `section`, `id`) VALUES
('what is the full form of php\r\n', 'hypertext preprocessor', 'deepak', '4ps18cs01', '4A', 1),
('what is the full form of http', 'hyper text transfer protocol', 'deepak', '4ps18cs01', '4A', 2),
('what is the full form of html', 'hyper text markup language.', 'deepu', '4ps18cs02', '3A', 3),
('what is the full form of https', 'secure hypertext makup language...', 'deepak', '4ps18cs03', '3B', 4),
('testing', NULL, NULL, '4ps18cs04', '4A', 5);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` smallint(255) NOT NULL,
  `rsem` int(100) NOT NULL,
  `fcode` varchar(100) NOT NULL,
  `cie1` int(100) NOT NULL,
  `cie2` int(100) NOT NULL,
  `see` varchar(20) NOT NULL,
  `ccode` varchar(10) NOT NULL,
  `scode` varchar(10) NOT NULL,
  `rusn` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `rsem`, `fcode`, `cie1`, `cie2`, `see`, `ccode`, `scode`, `rusn`) VALUES
(1, 4, '41', 12, 38, '8', '41', '41', '4ps18cs01'),
(2, 4, '42', 43, 35, '89', '42', '42', '4ps18cs01'),
(3, 4, '43', 32, 32, '7', '43', '43', '4ps18cs01'),
(4, 3, '31', 40, 45, '7', '31', '31', '4ps18cs02'),
(5, 3, '32', 19, 45, '8', '32', '32', '4ps18cs02'),
(6, 3, '33', 30, 40, '7', '33', '33', '4ps18cs02'),
(7, 3, '34', 50, 49, '', '34', '', '4ps18cs02'),
(8, 1, 'P18MA11', 100, 67, '45', 'P18MA11', 'P18MA11', '4ps18cs04'),
(9, 1, '	P18CH12', 20, 50, '45', 'P18CH12', 'P18CH12', '4ps18cs04'),
(10, 1, '	P18CS13', 28, 90, '90', 'P18CS13', 'P18CS13', '4ps18cs04'),
(11, 1, 'P18MED14', 11, 23, '100', 'P18MED14', 'P18MED14', '4ps18cs04'),
(12, 1, '	P18EC15', 0, 0, '00', '	P18EC15', 'P18EC15', '4ps18cs04'),
(13, 1, '	P18CSL16', 0, 0, '00', '	P18CSL16', 'P18CSL16', '4ps18cs04'),
(14, 1, '	P18CHL17', 0, 0, '00', '	P18CHL17', '	P18CHL17', '4ps18cs04'),
(15, 1, '	P18HU18', 0, 0, '00', '	P18HU18', '	P18HU18', '4ps18cs04'),
(16, 0, '31', 11, 23, '89', '31', '31', '4ps17cs05'),
(17, 0, '32', 11, 23, '89', '32', '32', '4ps17cs05'),
(18, 0, '33', 11, 3, '89', '33', '33', '4ps17cs05'),
(19, 0, '34', 11, 3, '89', '34', '34', '4ps17cs05'),
(20, 0, '35', 1, 23, '89', '35', '35', '4ps17cs05'),
(21, 0, '36', 11, 3, '89', '36', '36', '4ps17cs05'),
(22, 0, '37', 1, 23, '89', '37', '37', '4ps17cs05'),
(23, 0, '38', 11, 23, '89', '38', '38', '4ps17cs05'),
(24, 0, '11', 0, 0, '0', '11', '11', '4ps18cs06'),
(25, 0, '12', 0, 0, '', '12', '12', '4ps18cs06'),
(26, 0, '13', 0, 0, '', '13', '13', '4ps18cs06'),
(27, 0, '14', 0, 0, '', '14', '14', '4ps18cs06'),
(28, 0, '15', 0, 0, '', '15', '15', '4ps18cs06'),
(29, 0, '16', 0, 0, '', '16', '16', '4ps18cs06'),
(30, 0, '17', 0, 0, '', '17', '17', '4ps18cs06'),
(31, 0, '18', 0, 0, '', '18', '18', '4ps18cs06');

-- --------------------------------------------------------

--
-- Table structure for table `scheme`
--

CREATE TABLE `scheme` (
  `year` int(20) DEFAULT NULL,
  `scheme_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scheme`
--

INSERT INTO `scheme` (`year`, `scheme_id`) VALUES
(2017, 1),
(2018, 2),
(2019, 3),
(2020, 4);

-- --------------------------------------------------------

--
-- Table structure for table `scheme_course`
--

CREATE TABLE `scheme_course` (
  `scheme_year` int(20) DEFAULT NULL,
  `course_sem` int(20) DEFAULT NULL,
  `course_code` varchar(255) DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `files` varchar(255) DEFAULT NULL,
  `id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scheme_course`
--

INSERT INTO `scheme_course` (`scheme_year`, `course_sem`, `course_code`, `course_name`, `files`, `id`) VALUES
(2017, 1, 'P17MA11', 'Engineering Mathematics-I ', 'IYearSyllabus(17-18).pdf', 1),
(2017, 1, 'P17PH12', 'Engineering Physics', 'IYearSyllabus(17-18).pdf', 2),
(2017, 1, 'P17CV13', 'Engineering Mechanics ', 'IYearSyllabus(17-18).pdf', 3),
(2017, 1, 'P17ME14', 'Elements of Mechanical Engineering', 'IYearSyllabus(17-18).pdf', 4),
(2017, 1, 'P17EE15', 'Basic Electrical Engineering ', 'IYearSyllabus(17-18).pdf', 5),
(2017, 1, 'P17MEL16', 'Basic Mechanical Engg. Science Lab', 'IYearSyllabus(17-18).pdf', 6),
(2017, 1, 'P17PHL17', 'Engineering Physics Lab ', 'IYearSyllabus(17-18).pdf', 7),
(2017, 1, 'P17HU18', 'Effective Communication Development. (ECD) ', 'IYearSyllabus(17-18).pdf', 8),
(2017, 2, 'P17MA21', 'Engineering Mathematics-II ', 'IYearSyllabus(17-18).pdf', 9),
(2017, 2, 'P17CH22', 'Engineering Chemistry', 'IYearSyllabus(17-18).pdf', 10),
(2017, 2, 'P17CS23', 'Computer Concepts & C Programming ', 'IYearSyllabus(17-18).pdf', 11),
(2017, 2, 'P17MED24', 'Computer Aided Engineering Drawing', 'IYearSyllabus(17-18).pdf', 12),
(2017, 2, 'P17EC25', 'Basic Electronics ', 'IYearSyllabus(17-18).pdf', 13),
(2017, 2, 'P17CSL26', 'Computer Programming Lab ', 'IYearSyllabus(17-18).pdf', 14),
(2017, 2, 'P17CHL27', 'Engineering Chemistry Lab ', 'IYearSyllabus(17-18).pdf', 15),
(2017, 2, 'P17HU28', 'Professional Communication Development(PCD) ', 'IYearSyllabus(17-18).pdf', 16),
(2017, 3, 'P17MAT31', ' Engineering Mathematics-III', 'ComputerScience(2017-18).pdf', 17),
(2017, 3, 'P17CS32', ' Digital Logic Design ', 'ComputerScience(2017-18).pdf', 18),
(2017, 3, 'P17CS33', 'Data structures ', 'ComputerScience(2017-18).pdf', 19),
(2017, 3, 'P17CS34', ' Discrete Mathematical Structures ', 'ComputerScience(2017-18).pdf', 20),
(2017, 3, 'P17CS35', ' Object Oriented Programming with C++', 'ComputerScience(2017-18).pdf', 21),
(2017, 3, 'P17CS36', 'Computer Organization ', 'ComputerScience(2017-18).pdf', 22),
(2017, 3, 'P17CSL37', ' Data Structures Laboratory ', 'ComputerScience(2017-18).pdf', 23),
(2017, 3, 'P17CSL38', ' Digital Logic Design Laboratory ', 'ComputerScience(2017-18).pdf', 24),
(2017, 4, 'P17MAAC41/P17MAES41', ' Engineering Mathematics-IV ', 'ComputerScience(2017-18).pdf', 25),
(2017, 4, 'P17CS42', ' Graph Theory & Combinatorics ', 'ComputerScience(2017-18).pdf', 26),
(2017, 4, 'P17CS43', 'Theory of Computation ', 'ComputerScience(2017-18).pdf', 27),
(2017, 4, 'P17CS44', ' Analysis & Design of Algorithms ', 'ComputerScience(2017-18).pdf', 28),
(2017, 4, 'P17CS45', ' Data Communications ', 'ComputerScience(2017-18).pdf', 29),
(2017, 4, 'P17CS46', ' Microprocessor ', 'ComputerScience(2017-18).pdf', 30),
(2017, 4, 'P17CSL47', ' Analysis & Design of Algorithms Laboratory ', 'ComputerScience(2017-18).pdf', 31),
(2017, 4, 'P17CSL48', 'Object Oriented Programming with C++ Laboratory ', 'ComputerScience(2017-18).pdf', 32),
(2017, 5, 'P17CS51', ' Operating System', 'cse56sem17_18.pdf', 33),
(2017, 5, 'P17CS52', ' Database Management Systems ', 'cse56sem17_18.pdf', 34),
(2017, 5, 'P17CS53', 'Computer Networks', 'cse56sem17_18.pdf', 35),
(2017, 5, 'P17CS54', 'Software Engineering (Foundation course-I)', 'cse56sem17_18.pdf', 36),
(2017, 5, 'P17CS55', 'Foundation Elective', 'cse56sem17_18.pdf', 37),
(2017, 5, 'P17CS56', 'Elective-I ', 'cse56sem17_18.pdf', 38),
(2017, 5, 'P17CSL57', 'Microprocessor Lab ', 'cse56sem17_18.pdf', 39),
(2017, 5, 'P17CSL58', ' DBMS Lab ', 'cse56sem17_18.pdf', 40),
(2017, 6, 'P17CS61', 'Entrepreneurship Management & IPR', 'cse56sem17_18.pdf', 41),
(2017, 6, 'P17CS62', 'Computer Architecture.', 'cse56sem17_18.pdf', 42),
(2017, 6, 'P17CS63', ' Compiler Design', 'cse56sem17_18.pdf', 43),
(2017, 6, 'P17CS64', ' Data Mining &Warehousing(FC-II)', 'cse56sem17_18.pdf', 44),
(2017, 6, 'P17CS65', 'Client Server Programming', 'cse56sem17_18.pdf', 45),
(2017, 6, 'P17CS66', ' Soft Computing Technique', 'cse56sem17_18.pdf', 46),
(2017, 6, 'P17CSL67', 'Pattern Recognition', 'cse56sem17_18.pdf', 47),
(2017, 6, 'P17CSL68', 'Software Agents', 'cse56sem17_18.pdf', 48),
(2017, 7, 'P17CS71', 'Machine Learning ', 'CS-7th Sem 8th Sem(2017-18).pdf', 49),
(2017, 7, 'P17CS72', ' Multi-Core Architecture & Parallel Programming ', 'CS-7th Sem 8th Sem(2017-18).pdf', 50),
(2017, 7, 'P17CS73', 'Managing Big Data ', 'CS-7th Sem 8th Sem(2017-18).pdf', 51),
(2017, 7, 'P17CS74X', 'Elective-IV ', 'CS-7th Sem 8th Sem(2017-18).pdf', 52),
(2017, 7, 'P17CSO75X', 'Open Elective -I', 'CS-7th Sem 8th Sem(2017-18).pdf', 53),
(2017, 7, 'P17CSL76', 'Parallel Programming Laboratory', 'CS-7th Sem 8th Sem(2017-18).pdf', 54),
(2017, 7, 'P17CSL77', 'Machine Learning Laboratory ', 'CS-7th Sem 8th Sem(2017-18).pdf', 55),
(2017, 7, 'P17CS78', ' Project Work Phase-I ', 'CS-7th Sem 8th Sem(2017-18).pdf', 56),
(2017, 8, 'P17CS81 ', ' Cryptography & Network Security ', 'CS-7th Sem 8th Sem(2017-18).pdf', 57),
(2017, 8, 'P17CS82X', 'Elective-V', 'CS-7th Sem 8th Sem(2017-18).pdf', 58),
(2017, 8, 'P17CS83X ', 'Elective-VI ', 'CS-7th Sem 8th Sem(2017-18).pdf', 59),
(2017, 8, 'P17CSO84X', 'Open Elective-II ', 'CS-7th Sem 8th Sem(2017-18).pdf', 60),
(2017, 8, 'P17CS85 ', 'Project Work Phase-II ', 'CS-7th Sem 8th Sem(2017-18).pdf', 61),
(2017, 8, 'P17CS86 ', ' Internship', 'CS-7th Sem 8th Sem(2017-18).pdf', 62),
(2017, 8, 'NA', 'NA', 'e14671264ddb-p-40.pdf', 63),
(2017, 8, 'NA', 'NA', 'e14671264ddb-p-42.pdf', 64),
(2018, 1, 'P18MA11', 'Engineering Mathematics-11', 'IYearSyllabus(17-18).pdf', 65),
(2018, 1, 'P18CH12', 'Engineering Chemistry', 'IYearSyllabus(17-18).pdf', 66),
(2018, 1, 'P18CS13', 'Computer Concepts & C Programming', 'IYearSyllabus(17-18).pdf', 67),
(2018, 1, 'P18MED14', 'Computer Aided Engineering Drawing', 'IYearSyllabus(17-18).pdf', 68),
(2018, 1, 'P18EC15', 'Basic Electronics', 'IYearSyllabus(17-18).pdf', 69),
(2018, 1, 'P18CSL16', 'Computer Programming Lab', 'IYearSyllabus(17-18).pdf', 70),
(2018, 1, 'P18CHL17', '	Engineering Chemistry Lab', 'IYearSyllabus(17-18).pdf', 71),
(2018, 1, 'P18HU18', 'Professional Communication Development(PCD)', 'IYearSyllabus(17-18).pdf', 72),
(2018, 2, 'P18MA21', 'Engineering Mathematics-I', 'IYearSyllabus(17-18).pdf', 73),
(2018, 2, 'P18PH22', 'Engineering Physics', 'IYearSyllabus(17-18).pdf', 74),
(2018, 2, 'P18CV23', 'Engineering Mechanics', 'IYearSyllabus(17-18).pdf', 75),
(2018, 2, 'P18ME24', 'Elements of Mechanical Engineering', 'IYearSyllabus(17-18).pdf', 76),
(2018, 2, 'P18EE25', 'Basic Electrical Engineering', 'IYearSyllabus(17-18).pdf', 77),
(2018, 2, 'P18MEL26', 'Basic Mechanical Engg. Science Lab', 'IYearSyllabus(17-18).pdf', 78),
(2018, 2, 'P18PHL27', '	Engineering Physics Lab', 'IYearSyllabus(17-18).pdf', 79),
(2018, 2, 'P18HU28', 'Effective Communication Development. (ECD)', 'IYearSyllabus(17-18).pdf', 80),
(2018, 3, 'P18MA31 ', 'TRANSFORM CALCULUS, FOURIER SERIES AND NUMERICAL TECHNIQUES ', 'ComputerScience(2018-19).pdf', 81),
(2018, 3, 'P18CS32 ', ' Digital Logic Design', 'ComputerScience(2018-19).pdf', 82),
(2018, 3, 'P18CS33', 'Data Structures', 'ComputerScience(2018-19).pdf', 83),
(2018, 3, 'P18CS34', ' Computer Organization', 'ComputerScience(2018-19).pdf', 84),
(2018, 3, 'P18CS35', 'Discrete Mathematical Structure', 'ComputerScience(2018-19).pdf', 85),
(2018, 3, 'P18CS36', ' Object Oriented Programming with Java (FC-I)', 'ComputerScience(2018-19).pdf', 86),
(2018, 3, 'P18CSL37', 'Data Structures Laboratory', 'ComputerScience(2018-19).pdf', 87),
(2018, 3, 'P18CSL38', ': Digital Logic Design Laboratory', 'ComputerScience(2018-19).pdf', 88),
(2018, 4, 'P18CS41', 'COMPLEX ANALYSIS, STATISTICS, PROBABILITY AND NUMERICAL TECHNIQUES', 'ComputerScience(2018-19).pdf', 89),
(2018, 4, 'P18CS42', 'Theory of Computation.', 'ComputerScience(2018-19).pdf', 90),
(2018, 4, 'P18CS43', 'Analysis & Design of Algorithms', 'ComputerScience(2018-19).pdf', 91),
(2018, 4, 'P18CS44', 'Data Communication', 'ComputerScience(2018-19).pdf', 92),
(2018, 4, 'P18CS45', 'AVR Microcontroller ', 'ComputerScience(2018-19).pdf', 93),
(2018, 4, 'P18CS46', 'Database Management System(FC-II)', 'ComputerScience(2018-19).pdf', 94),
(2018, 4, 'P18CSL47', 'ANALYSIS AND DESIGN OF ALGORITHMS LAB', 'ComputerScience(2018-19).pdf', 95),
(2018, 4, 'P18CSL48', ' Object Oriented Programming with Java Laboratory', 'ComputerScience(2018-19).pdf', 96),
(2018, 5, 'P18CS51', 'Management and Entrepreneurship', 'CS_P18 Scheme(V & VI Sem).pdf', 97),
(2018, 5, 'P18CS52', 'Operating System ', 'CS_P18 Scheme(V & VI Sem).pdf', 98),
(2018, 5, 'P18CS53', 'Computer Networks ', 'CS_P18 Scheme(V & VI Sem).pdf', 99),
(2018, 5, 'P18CS54', 'Software Engineering ', 'CS_P18 Scheme(V & VI Sem).pdf', 100),
(2018, 5, 'P18CS55X', 'Professional Elective - I ', 'CS_P18 Scheme(V & VI Sem).pdf', 101),
(2018, 5, 'P18CS56', 'AVR Micro Controller Laboratory ', 'CS_P18 Scheme(V & VI Sem).pdf', 102),
(2018, 5, 'P18CSL57', 'Networks Laboratory ', 'CS_P18 Scheme(V & VI Sem).pdf', 103),
(2018, 5, 'P18CSL58', 'Skill Oriented Laboratory - I (Android App Development)', 'CS_P18 Scheme(V & VI Sem).pdf', 104),
(2018, 6, 'P18CS61', 'Computer Architecture ', 'CS_P18 Scheme(V & VI Sem).pdf', 105),
(2018, 6, 'P18CS62', 'Compiler Design ', 'CS_P18 Scheme(V & VI Sem).pdf', 106),
(2018, 6, 'P18CS63', 'Data Analytics ', 'CS_P18 Scheme(V & VI Sem).pdf', 107),
(2018, 6, 'P18CS64X', 'Professional Elective - II ', 'CS_P18 Scheme(V & VI Sem).pdf', 108),
(2018, 6, 'P18CS65X', 'Open Elective-I ', 'CS_P18 Scheme(V & VI Sem).pdf', 109),
(2018, 6, 'P18CS66', 'Data Analytics Lab. ', 'CS_P18 Scheme(V & VI Sem).pdf', 110),
(2018, 6, 'P18CSL67', 'Operating System & Compiler Design Lab. ', 'CS_P18 Scheme(V & VI Sem).pdf', 111),
(2018, 6, 'P18CSL68', 'Skill Oriented Laboratory-II (Python Programming Lab) ', 'CS_P18 Scheme(V & VI Sem).pdf', 112),
(2018, 7, '71', NULL, NULL, 113),
(2018, 7, '72', NULL, NULL, 114),
(2018, 7, '73', NULL, NULL, 115),
(2018, 7, '74', NULL, NULL, 116),
(2018, 7, '75', NULL, NULL, 117),
(2018, 7, '76', NULL, NULL, 118),
(2018, 7, '77', NULL, NULL, 119),
(2018, 7, '78', NULL, NULL, 120),
(2018, 8, '81', NULL, NULL, 121),
(2018, 8, '82', NULL, NULL, 122),
(2018, 8, '83', NULL, NULL, 123),
(2018, 8, '84', NULL, NULL, 124),
(2018, 8, '85', NULL, NULL, 125),
(2018, 8, '86', NULL, NULL, 126),
(2018, 8, '87', NULL, NULL, 127),
(2018, 8, '88', NULL, NULL, 128),
(2019, 1, '11', NULL, NULL, 129),
(2019, 1, '12', NULL, NULL, 130),
(2019, 1, '13', NULL, NULL, 131),
(2019, 1, '14', NULL, NULL, 132),
(2019, 1, '15', NULL, NULL, 133),
(2019, 1, '16', NULL, NULL, 134),
(2019, 1, '17', NULL, NULL, 135),
(2019, 1, '18', NULL, NULL, 136),
(2019, 2, '21', NULL, NULL, 137),
(2019, 2, '22', NULL, NULL, 138),
(2019, 2, '23', NULL, NULL, 139),
(2019, 2, '24', NULL, NULL, 140),
(2019, 2, '25', NULL, NULL, 141),
(2019, 2, '26', NULL, NULL, 142),
(2019, 2, '27', NULL, NULL, 143),
(2019, 2, '28', NULL, NULL, 144),
(2019, 3, '31', NULL, NULL, 145),
(2019, 3, '32', NULL, NULL, 146),
(2019, 3, '33', NULL, NULL, 147),
(2019, 3, '34', NULL, NULL, 148),
(2019, 3, '35', NULL, NULL, 149),
(2019, 3, '36', NULL, NULL, 150),
(2019, 3, '37', NULL, NULL, 151),
(2019, 3, '38', NULL, NULL, 152),
(2019, 4, '41', NULL, NULL, 153),
(2019, 4, '42', NULL, NULL, 154),
(2019, 4, '43', NULL, NULL, 155),
(2019, 4, '44', NULL, NULL, 156),
(2019, 4, '45', NULL, NULL, 157),
(2019, 4, '46', NULL, NULL, 158),
(2019, 4, '47', NULL, NULL, 159),
(2019, 4, '48', NULL, NULL, 160),
(2019, 5, '51', NULL, NULL, 161),
(2019, 5, '52', NULL, NULL, 162),
(2019, 5, '53', NULL, NULL, 163),
(2019, 5, '54', NULL, NULL, 164),
(2019, 5, '55', NULL, NULL, 165),
(2019, 5, '56', NULL, NULL, 166),
(2019, 5, '57', NULL, NULL, 167),
(2019, 5, '58', NULL, NULL, 168),
(2019, 6, '61', NULL, NULL, 169),
(2019, 6, '62', NULL, NULL, 170),
(2019, 6, '63', NULL, NULL, 171),
(2019, 6, '64', NULL, NULL, 172),
(2019, 6, '65', NULL, NULL, 173),
(2019, 6, '66', NULL, NULL, 174),
(2019, 6, '67', NULL, NULL, 175),
(2019, 6, '68', NULL, NULL, 176),
(2019, 7, '71', NULL, NULL, 177),
(2019, 7, '72', NULL, NULL, 178),
(2019, 7, '73', NULL, NULL, 179),
(2019, 7, '74', NULL, NULL, 180),
(2019, 7, '75', NULL, NULL, 181),
(2019, 7, '76', NULL, NULL, 182),
(2019, 7, '77', NULL, NULL, 183),
(2019, 7, '78', NULL, NULL, 184),
(2019, 8, '81', NULL, NULL, 185),
(2019, 8, '82', NULL, NULL, 186),
(2019, 8, '83', NULL, NULL, 187),
(2019, 8, '84', NULL, NULL, 188),
(2019, 8, '85', NULL, NULL, 189),
(2019, 8, '86', NULL, NULL, 190),
(2019, 8, '87', NULL, NULL, 191),
(2019, 8, '88', NULL, NULL, 192),
(2020, 1, '11', NULL, NULL, 193),
(2020, 1, '12', NULL, NULL, 194),
(2020, 1, '13', NULL, NULL, 195),
(2020, 1, '14', NULL, NULL, 196),
(2020, 1, '15', NULL, NULL, 197),
(2020, 1, '16', NULL, NULL, 198),
(2020, 1, '17', NULL, NULL, 199),
(2020, 1, '18', NULL, NULL, 200),
(2020, 2, '21', NULL, NULL, 201),
(2020, 2, '22', NULL, NULL, 202),
(2020, 2, '23', NULL, NULL, 203),
(2020, 2, '24', NULL, NULL, 204),
(2020, 2, '25', NULL, NULL, 205),
(2020, 2, '26', NULL, NULL, 206),
(2020, 2, '27', NULL, NULL, 207),
(2020, 2, '28', NULL, NULL, 208),
(2020, 3, '31', NULL, NULL, 209),
(2020, 3, '32', NULL, NULL, 210),
(2020, 3, '33', NULL, NULL, 211),
(2020, 3, '34', NULL, NULL, 212),
(2020, 3, '35', NULL, NULL, 213),
(2020, 3, '36', NULL, NULL, 214),
(2020, 3, '37', NULL, NULL, 215),
(2020, 3, '38', NULL, NULL, 216),
(2020, 4, '41', NULL, NULL, 217),
(2020, 4, '42', NULL, NULL, 218),
(2020, 4, '43', NULL, NULL, 219),
(2020, 4, '44', NULL, NULL, 220),
(2020, 4, '45', NULL, NULL, 221),
(2020, 4, '46', NULL, NULL, 222),
(2020, 4, '47', NULL, NULL, 223),
(2020, 4, '48', NULL, NULL, 224),
(2020, 5, '51', NULL, NULL, 225),
(2020, 5, '52', NULL, NULL, 226),
(2020, 5, '53', NULL, NULL, 227),
(2020, 5, '54', NULL, NULL, 228),
(2020, 5, '55', NULL, NULL, 229),
(2020, 5, '56', NULL, NULL, 230),
(2020, 5, '57', NULL, NULL, 231),
(2020, 5, '58', NULL, NULL, 232),
(2020, 6, '61', NULL, NULL, 233),
(2020, 6, '62', NULL, NULL, 234),
(2020, 6, '63', NULL, NULL, 235),
(2020, 6, '64', NULL, NULL, 236),
(2020, 6, '65', NULL, NULL, 237),
(2020, 6, '66', NULL, NULL, 238),
(2020, 6, '67', NULL, NULL, 239),
(2020, 6, '68', NULL, NULL, 240),
(2020, 7, '71', NULL, NULL, 241),
(2020, 7, '72', NULL, NULL, 242),
(2020, 7, '73', NULL, NULL, 243),
(2020, 7, '74', NULL, NULL, 244),
(2020, 7, '75', NULL, NULL, 245),
(2020, 7, '76', NULL, NULL, 246),
(2020, 7, '77', NULL, NULL, 247),
(2020, 7, '78', NULL, NULL, 248),
(2020, 8, '81', NULL, NULL, 249),
(2020, 8, '82', NULL, NULL, 250),
(2020, 8, '83', NULL, NULL, 251),
(2020, 8, '84', NULL, NULL, 252),
(2020, 8, '85', NULL, NULL, 253),
(2020, 8, '86', NULL, NULL, 254),
(2020, 8, '87', NULL, NULL, 255),
(2020, 8, '88', NULL, NULL, 256);

-- --------------------------------------------------------

--
-- Table structure for table `scheme_sem`
--

CREATE TABLE `scheme_sem` (
  `sem_year` int(20) DEFAULT NULL,
  `sem_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scheme_sem`
--

INSERT INTO `scheme_sem` (`sem_year`, `sem_id`) VALUES
(2017, 1),
(2017, 2),
(2017, 3),
(2017, 4),
(2017, 5),
(2017, 6),
(2017, 7),
(2017, 8),
(2018, 1),
(2018, 2),
(2018, 3),
(2018, 4),
(2018, 5),
(2018, 6),
(2018, 7),
(2018, 8),
(2019, 1),
(2019, 2),
(2019, 3),
(2019, 4),
(2019, 5),
(2019, 6),
(2019, 7),
(2019, 8),
(2020, 1),
(2020, 2),
(2020, 3),
(2020, 4),
(2020, 5),
(2020, 6),
(2020, 7),
(2020, 8);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `usn` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `create date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `scontact` varchar(100) NOT NULL,
  `fcontact` varchar(100) NOT NULL,
  `mcontact` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `section` varchar(100) NOT NULL,
  `flag` int(10) NOT NULL DEFAULT '0',
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `username`, `password`, `email`, `usn`, `date`, `create date`, `scontact`, `fcontact`, `mcontact`, `fname`, `mname`, `address`, `section`, `flag`, `image`) VALUES
(1, 'deepak', '12', 'cdeepakdeepu6@gmail.com', '4ps18cs01', '2020-07-29', '2020-08-03 04:03:23.576921', '12', '12', '12', 'wwww', 'wwww', 'www', '4B', 1, 'college2.jpeg'),
(2, 'deepak2', '12', 'cdeepak6@gmail.com', '4ps18cs02', '2020-07-31', '0000-00-00 00:00:00.000000', '12', '12', '12', 'ssss', 'sss', 'sss', '3A', 1, 'percentage.jpg'),
(3, 'shashank', '12', 'cdeepak@gmail.com', '4ps18cs03', '0000-00-00', '0000-00-00 00:00:00.000000', '', '', '', '', '', '', '', 0, ''),
(5, 'vignesh.s', '12', NULL, '4ps18cs04', '2020-07-30', '2020-08-20 06:39:07.794841', '123', '12', '12', 'chandrashekar', 'lllll', 'www', '4A', 1, 'college.jpg'),
(6, 'harish', '12', NULL, '4ps17cs05', '2020-07-28', '2020-08-20 11:08:46.564755', '12', '12', '12', 'eee', 'eee', 'eee', '3B', 1, 'grade.jpeg'),
(7, NULL, '12', NULL, '4ps18cs06', '0000-00-00', '2020-08-23 06:24:44.031722', '', '', '', '', '', '', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `qual` varchar(100) NOT NULL,
  `birth` date NOT NULL,
  `designation` varchar(100) NOT NULL,
  `dat` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `qual`, `birth`, `designation`, `dat`, `address`, `image`, `id`) VALUES
('deepu', '12', 'cdeepakdeepu6@gmail.com', 'gggg', '2020-08-05', 'ttt', '2020-08-01', 'wwwww', 'bac.jpg', 1),
('', '12', 'cdeepakdeepu@gmail.com', 'lan', '2020-08-04', 'sorry no record\'s', '2020-08-05', 'jjjja', 'quiz.jpg', 2),
('ravi.s', '12', 'infopedia.org4@gmail.com', 'don\'t know', '2020-08-01', 'assistant', '2020-08-29', 'rr', 'p1.jpeg', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announce`
--
ALTER TABLE `announce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attenden`
--
ALTER TABLE `attenden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `musn` (`musn`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questionby` (`questionby`);
ALTER TABLE `question` ADD FULLTEXT KEY `questions` (`questions`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rusn` (`rusn`);

--
-- Indexes for table `scheme`
--
ALTER TABLE `scheme`
  ADD PRIMARY KEY (`scheme_id`),
  ADD UNIQUE KEY `year` (`year`);

--
-- Indexes for table `scheme_course`
--
ALTER TABLE `scheme_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usn` (`usn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announce`
--
ALTER TABLE `announce`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `attenden`
--
ALTER TABLE `attenden`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` smallint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `scheme`
--
ALTER TABLE `scheme`
  MODIFY `scheme_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `scheme_course`
--
ALTER TABLE `scheme_course`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attenden`
--
ALTER TABLE `attenden`
  ADD CONSTRAINT `attenden_ibfk_1` FOREIGN KEY (`musn`) REFERENCES `student` (`usn`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`rusn`) REFERENCES `student` (`usn`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
