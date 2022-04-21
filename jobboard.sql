-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 23, 2020 at 06:26 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `Serial` int(11) NOT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`Serial`, `Name`, `Email`, `Password`) VALUES
(2, 'ART', 'art@mail', 'com'),
(3, 'ARC', 'arc@gmail', 'arc'),
(4, 'TexMat', 'TexM@gmail.com', 'Texm'),
(5, 'Bohemian Tech', 'BTech@gmail.com', 'btech'),
(6, 'Company Artt', ' wow', 'p'),
(7, 'Artistic', 'commail', 'po'),
(8, 'Artistic', 'commail', 'po'),
(9, 'Company of UIU', 'uiu@gmail.com', 'uiu'),
(10, 'Artistic panda', 'panda', 'uiu'),
(11, 'penda', 'penda@velorant', 'reyna'),
(12, 'myComp', 'comp@mail.com', 'comp');

-- --------------------------------------------------------

--
-- Table structure for table `cv`
--

CREATE TABLE `cv` (
  `Serial` int(11) NOT NULL,
  `JobType` varchar(30) DEFAULT NULL,
  `Salary` varchar(20) DEFAULT NULL,
  `JobLocation` varchar(30) DEFAULT NULL,
  `Overtime` varchar(10) DEFAULT NULL,
  `Skills` varchar(100) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Name` varchar(30) DEFAULT NULL,
  `Website` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cv`
--

INSERT INTO `cv` (`Serial`, `JobType`, `Salary`, `JobLocation`, `Overtime`, `Skills`, `Email`, `Name`, `Website`) VALUES
(1, 'Web Developer', '15000', 'Gulshan 2', 'No', 'html', 'Szad@gmail.com', 'Sehzad', ''),
(2, 'Quality Assurance', '20000', 'Gulshan 2', 'Yes', 'English', 'Mbuba@gmail.com', 'Mehbuba', ''),
(3, 'Graphic designer', '18000', 'Gulshan 1', 'No', '1.adobe photoshop\r\n2.drawing', 'onti@gmail.com', 'Onti', ''),
(4, 'Mobile Web Developer', '20000', 'Gulshan 1', 'Yes', '1.java', 'priya@gmail.com', 'Priya', ''),
(7, 'Web Developer', '30k-50k', 'Uttara', 'No', ' RDBMS\r\nmongodb', 'szad@gmail.com', 'szad', '');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `Serial` int(11) NOT NULL,
  `JobTitle` varchar(30) DEFAULT NULL,
  `JobType` varchar(30) DEFAULT NULL,
  `Salary` varchar(20) DEFAULT NULL,
  `JobLocation` varchar(30) DEFAULT NULL,
  `Overtime` varchar(10) DEFAULT NULL,
  `Skills` varchar(100) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Company` varchar(30) DEFAULT NULL,
  `Website` varchar(30) DEFAULT NULL,
  `Context` varchar(100) DEFAULT NULL,
  `Responsibility` varchar(100) DEFAULT NULL,
  `Benefit` varchar(100) DEFAULT NULL,
  `Deadline` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`Serial`, `JobTitle`, `JobType`, `Salary`, `JobLocation`, `Overtime`, `Skills`, `Email`, `Company`, `Website`, `Context`, `Responsibility`, `Benefit`, `Deadline`) VALUES
(2, 'Intern', 'Web Developer', '3000', 'Gulshan 1', 'Yes', 'javascript \r\nhtml\r\ncss', 'art@mail', 'art tecnologies', 'www.art.com', '', NULL, NULL, NULL),
(3, 'Permanent', 'Mobile Web Developer', '30000', 'Uttara', 'Yes', '1.Java\r\n2.Rest Api', 'BTech@gmail.com', 'Bohemian Tech', 'www.BTech.com', '', NULL, NULL, NULL),
(4, 'Intern', 'Web Developer', '5000', 'Uttara 12', 'no', '1.javascript\r\n2.html\r\n3.css', 'TexM@gmail.com', 'TexMat', 'www.TMat.com', '', NULL, NULL, NULL),
(5, 'Intern', 'Graphic designer', '15000', 'Uttara 12', 'yes', '1.Adobe photoshop\r\n2.Adobe Illustrator', 'TexM@gmail.com', 'TexMat', 'www.TMat.com', '', NULL, NULL, NULL),
(6, 'Intern', 'Graphic designer', '18000', 'Gulshan 2', 'yes', '1.adobe photoshop', 'BTech@gmail.com', 'Bohemian Tech', 'www.Btech.com', '', NULL, NULL, NULL),
(7, 'Intern', 'Quality Assurance', '30000', 'Uttara', 'Yes', ' english', 'arc@gmail', 'ARC', 'www.arc.com', '', NULL, NULL, NULL),
(18, 'Intern', 'Web Developer', '40-50k', 'Mirpur', 'No', ' human interaction', 'art@mail', 'ART', 'www.art.com', ' â€¢	Must have solid iOS experience skilled in Swift and/or Objective-C.\r\nâ€¢	Must have published at', ' â€¢	Work independently or as part of a team from initial development to App Store publication.\r\nâ€¢', ' â€¢	Weekly 2 holidays\r\nâ€¢	Lunch Facilities: Full Subsidize\r\nâ€¢	Festival Bonus: 2\r\nâ€¢	Competitive', '2020-07-31'),
(19, 'Intern', 'Web Developer', '20k-30k', 'Uttara', 'Yes', ' html', 'art@mail', 'ART', 'www.art.com', ' you have to do everythinggggggggg', ' designing webpage', ' yearly salary update', '2021-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Serial` int(11) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Password` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`Serial`, `Name`, `Email`, `Password`) VALUES
(1, 'Sehzad', 'Szad@gmail.com', 'szad'),
(2, 'Mehbuba', 'Mbuba@gmail.com', 'meh'),
(3, 'Sudipta', 'sudipta@gmail.com', 'sud'),
(4, 'Priya', 'priya@gmail.com', 'pri'),
(5, 'Onti', 'onti@gmail.com', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`Serial`);

--
-- Indexes for table `cv`
--
ALTER TABLE `cv`
  ADD PRIMARY KEY (`Serial`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`Serial`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Serial`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `Serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cv`
--
ALTER TABLE `cv`
  MODIFY `Serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `Serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `Serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
