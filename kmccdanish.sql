-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 10:39 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kmccdanish`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_modified` datetime NOT NULL,
  `token` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `role`, `email`, `password`, `date_created`, `date_modified`, `token`) VALUES
(1, 'KMCC', 'College', 'Admin', 's.danish0827@gmail.com', '123456789', '2022-02-10 02:32:12', '2022-02-14 20:10:14', 'dpf5l');

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `catid` int(11) NOT NULL,
  `category_name` varchar(500) NOT NULL,
  `category_desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`catid`, `category_name`, `category_desc`) VALUES
(1, '<b> Degree College </b><br>\r\n<b> B.com Section </b><br>\r\nNazneen Sayyed - 8424974019<br>\r\nBinita Singh -  9869911086<br><br>\r\n\r\n<b> BMS Section </b><br>\r\nPranav N. Panchal - 7700073433<br>\r\nDegree Admission<a style=\"color:white\" target=\"_blank\" href=\"https://kmccerp.pssm.in/admission.php\"> Click Here</a>', '<b>Junior College</b><br>\r\nVishnu Jadhav - 9930314306<br>\r\nSurajprakash Nirmal - 9167742292<br>\r\nNandkumar Tiwari - 9702165982<br>\r\nJunior Admission<a style=\"color:white\" target=\"_blank\" href=\"https://kmccerp.pssm.in/junior/admission.php\"> Click Here</a>');

-- --------------------------------------------------------

--
-- Table structure for table `culturalevent`
--

CREATE TABLE `culturalevent` (
  `catid` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `culturalevent`
--

INSERT INTO `culturalevent` (`catid`, `category_name`, `category_image`) VALUES
(1, 'Cultural Activities 2022-2023', 'Cultural Committee report 22 - 23.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `noticenew`
--

CREATE TABLE `noticenew` (
  `catid` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noticenew`
--

INSERT INTO `noticenew` (`catid`, `category_name`, `category_desc`) VALUES
(5, 'ATKT Notice click here', 'https://powerstudent.in/psnew/home.html'),
(8, 'Online ATKT Form click here', 'https://kmccerp.pssm.in/atktform/online_atkt_login.php'),
(10, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', 'https://www.youtube.com/'),
(11, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '');

-- --------------------------------------------------------

--
-- Table structure for table `noticenewevents`
--

CREATE TABLE `noticenewevents` (
  `catid` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` varchar(255) NOT NULL,
  `category_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `noticenewevents`
--

INSERT INTO `noticenewevents` (`catid`, `category_name`, `category_desc`, `category_date`) VALUES
(1, 'danish', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one ', '2023-09-04'),
(2, 'shaikh', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has su', '2023-02-08'),
(4, 'sajid', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s stan link - <a href=\"https://www.youtube.com/\"> www.gmail.com</a>', '2023-09-21');

-- --------------------------------------------------------

--
-- Table structure for table `nssevent`
--

CREATE TABLE `nssevent` (
  `catid` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nssevent`
--

INSERT INTO `nssevent` (`catid`, `category_name`, `category_image`) VALUES
(1, 'NSS Reports 2019-2020	', 'NSS Report - 2019-2020.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `pid` int(11) NOT NULL,
  `project_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`pid`, `project_image`) VALUES
(24, 'images/services/apid.jpg'),
(27, 'images/services/01-IMG_9903.JPG'),
(31, 'images/services/1920x810px.jpg'),
(33, 'images/services/danish-sign.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sportevent`
--

CREATE TABLE `sportevent` (
  `catid` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sportevent`
--

INSERT INTO `sportevent` (`catid`, `category_name`, `category_image`) VALUES
(9, 'Sports Reports 2022-2023	', 'Sports Report 2022-2023.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `teachingdr`
--

CREATE TABLE `teachingdr` (
  `catid` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `category_image` varchar(1000) NOT NULL,
  `category_desc` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachingdr`
--

INSERT INTO `teachingdr` (`catid`, `category_name`, `category_image`, `category_desc`) VALUES
(7, 'Dr. Santosh S. Tiwari', '', 'M.Sc, B.Ed, P.hD (Principal)'),
(8, 'Mrs. Nazneen Sayyed', '', 'M.A., MBA (HRM),P.Hd(Pursuing)'),
(9, 'Mrs. Binita Singh', '', 'M.Com, MBA(Fin), PGDFM,P.hD (Pursuing)'),
(10, 'Mr. Pranav Panchal', '', 'M.Com, P.hD (Pursuing)'),
(15, 'Mr.Vishnu Jadhav', '', 'M.A, M.P.Ed, B.Ed.'),
(16, 'Ms. Monika Gupta', '', 'M.Com, PGDM'),
(17, 'Lochan Chavan', '', 'M.Com,LLB,P.hD (Pursuing)'),
(18, 'Sapna Maurya', '', 'M.Com, NET'),
(19, 'Siddhi Bhavsar', '', 'M.LIB,P.hD (Pursuing)');

-- --------------------------------------------------------

--
-- Table structure for table `teachingjr`
--

CREATE TABLE `teachingjr` (
  `catid` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL,
  `category_desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachingjr`
--

INSERT INTO `teachingjr` (`catid`, `category_name`, `category_image`, `category_desc`) VALUES
(1, 'Mrs. Veena Pandey', '', 'MA., B.Ed'),
(3, 'Mr. Suraj Nirmal', '', 'M.A., M.Com, B.Ed'),
(4, 'Ms. Tejal Agrawal', '', 'M.Com , B.Ed'),
(5, 'Mr. Nandkumar Tiwari', '', 'M.Com , B.Ed'),
(6, 'Mr. Hemant Tannu', '', 'M.Com , B.Ed');

-- --------------------------------------------------------

--
-- Table structure for table `urjaevent`
--

CREATE TABLE `urjaevent` (
  `catid` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urjaevent`
--

INSERT INTO `urjaevent` (`catid`, `category_name`, `category_image`) VALUES
(1, 'Urja Fest 2022-2023', 'URJA FEST 2022-2023.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `culturalevent`
--
ALTER TABLE `culturalevent`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `noticenew`
--
ALTER TABLE `noticenew`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `noticenewevents`
--
ALTER TABLE `noticenewevents`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `nssevent`
--
ALTER TABLE `nssevent`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `sportevent`
--
ALTER TABLE `sportevent`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `teachingdr`
--
ALTER TABLE `teachingdr`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `teachingjr`
--
ALTER TABLE `teachingjr`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `urjaevent`
--
ALTER TABLE `urjaevent`
  ADD PRIMARY KEY (`catid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `culturalevent`
--
ALTER TABLE `culturalevent`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `noticenew`
--
ALTER TABLE `noticenew`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `noticenewevents`
--
ALTER TABLE `noticenewevents`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nssevent`
--
ALTER TABLE `nssevent`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `sportevent`
--
ALTER TABLE `sportevent`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `teachingdr`
--
ALTER TABLE `teachingdr`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `teachingjr`
--
ALTER TABLE `teachingjr`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `urjaevent`
--
ALTER TABLE `urjaevent`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
