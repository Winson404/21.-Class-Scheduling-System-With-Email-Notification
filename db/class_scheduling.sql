-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2023 at 11:19 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `class_scheduling`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
`CourseID` int(11) NOT NULL,
  `CourseCode` varchar(150) NOT NULL,
  `CourseDesc` text NOT NULL,
  `Hours` varchar(150) NOT NULL,
  `Units` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseID`, `CourseCode`, `CourseDesc`, `Hours`, `Units`) VALUES
(1, '1234', 'Course 2', '2', '3'),
(3, '4321', 'Course 1', '1', '3'),
(5, 'fh', 'fghfgh', '543', '54'),
(6, '1234', 'fdsfsdf', '43', '434'),
(7, 'r3543', 'gdfg', '3', '3');

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE IF NOT EXISTS `day` (
`DayID` int(11) NOT NULL,
  `DayName` varchar(150) NOT NULL,
  `DayCode` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `day`
--

INSERT INTO `day` (`DayID`, `DayName`, `DayCode`) VALUES
(1, 'Saturday', 'D1234'),
(3, 'Tuesday', 'D4321');

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE IF NOT EXISTS `instructor` (
`InstructorID` int(11) NOT NULL,
  `Firstname` varchar(150) NOT NULL,
  `Middlename` varchar(150) NOT NULL,
  `Lastname` varchar(150) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `bachelorsDegree` varchar(150) NOT NULL,
  `gradStudy` varchar(100) NOT NULL,
  `postGrad` varchar(100) NOT NULL,
  `PRC_No` varchar(50) NOT NULL,
  `instructorStatus` varchar(50) NOT NULL,
  `date_registered` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`InstructorID`, `Firstname`, `Middlename`, `Lastname`, `Department`, `bachelorsDegree`, `gradStudy`, `postGrad`, `PRC_No`, `instructorStatus`, `date_registered`) VALUES
(1, 'Jose', '', 'Rizal', 'Education', 'EDUC', 'EDUC GRAD', 'EDUC POST GRAD', '0133415', 'Full Time', '2022-11-24'),
(3, 'Apolinario', '', 'Mabini', 'IT Dept.', 'fdsfsdfsdfsdfsdf', 'fdsfdsfsdfsd', 'dsfdsfsfsffsdf', 'fdssdfsdfsfs', 'Part Time', '2022-11-24'),
(4, 'Noe Noe', 'Neoe', 'Noe', 'Sample Dept.', 'fdsfs', 'fdsfds', 'fdsfsd', '3232', 'New', '2022-12-09'),
(5, 'dfsfsfs', 'fdsfsdf', 'sfsdf', 'sdfsd', 'fdsfds', 'fsfsd', 'fdsfsd', 'fdsfsfsfdsf', 'Full Time', '2023-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `official`
--

CREATE TABLE IF NOT EXISTS `official` (
`official_Id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `middlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `degree` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `date_registered` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `official`
--

INSERT INTO `official` (`official_Id`, `firstname`, `middlename`, `lastname`, `degree`, `description`, `date_registered`) VALUES
(1, 'Laila', 'M.', 'Alefado', 'LPT', 'BS INFO TECH PROGRAM CHAIR', '2023-02-18'),
(3, 'Jeffrey', 'C.', 'Astillero', 'Ph. D.', 'DEAN SCHOOL OF TECHNOLOGY', '2023-02-18'),
(4, 'Lilibeth', 'P.', 'Mayul', 'DM', 'OIC, College Administrator', '2023-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
`RoomID` int(11) NOT NULL,
  `RoomName` varchar(150) NOT NULL,
  `RoomCode` varchar(150) NOT NULL,
  `Capacity` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`RoomID`, `RoomName`, `RoomCode`, `Capacity`) VALUES
(1, 'R1', 'R1234', '50'),
(2, 'R2', 'R4321', '50'),
(3, 'Room sample', 'Sample code', '50');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
`SchedID` int(11) NOT NULL,
  `InstructorID` int(11) NOT NULL,
  `CourseID` int(11) NOT NULL,
  `DayID` varchar(255) NOT NULL,
  `TimeStart` varchar(150) NOT NULL,
  `TimeEnd` varchar(150) NOT NULL,
  `RoomID` int(11) NOT NULL,
  `SemesterID` int(11) NOT NULL,
  `SchoolYearID` int(11) NOT NULL,
  `Department` varchar(150) NOT NULL,
  `EDP` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`SchedID`, `InstructorID`, `CourseID`, `DayID`, `TimeStart`, `TimeEnd`, `RoomID`, `SemesterID`, `SchoolYearID`, `Department`, `EDP`) VALUES
(7, 2, 1, '1fdsfdsfs', '21:00', '22:00', 1, 1, 1, 'Education', '213'),
(8, 1, 5, '3fds', '10:57', '11:57', 1, 2, 2, 'Education', '123'),
(9, 1, 5, 'fdsfds', '15:05', '16:07', 1, 2, 1, 'fdsfsdf', 'fdsfsd'),
(10, 1, 6, 'fdsfdsfsfsfds', '15:05', '16:09', 3, 2, 2, 'fdsfdsf', 'sdfsdfsdfsd');

-- --------------------------------------------------------

--
-- Table structure for table `schoolyear`
--

CREATE TABLE IF NOT EXISTS `schoolyear` (
`SyID` int(11) NOT NULL,
  `SyName` varchar(150) NOT NULL,
  `SyCode` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `schoolyear`
--

INSERT INTO `schoolyear` (`SyID`, `SyName`, `SyCode`) VALUES
(1, '2023-2024', 'SY1234'),
(2, '2023-2024', 'SY4321');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
`SemesterID` int(11) NOT NULL,
  `SemesterName` varchar(150) NOT NULL,
  `SemesterCode` varchar(150) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`SemesterID`, `SemesterName`, `SemesterCode`) VALUES
(1, '2nd Semester', 'S1234'),
(2, '1st Semester', 'S4321');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_Id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `suffix` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'Staff',
  `verification_code` varchar(255) NOT NULL,
  `date_registered` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_Id`, `firstname`, `middlename`, `lastname`, `suffix`, `email`, `contact`, `password`, `image`, `user_type`, `verification_code`, `date_registered`) VALUES
(40, 'Noe', '', 'Igos', '', 'admin@gmail.com', '9359428961', '0192023a7bbd73250516f069df18b500', 'amatiel.png', 'Admin', '137106', '2022-09-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`CourseID`);

--
-- Indexes for table `day`
--
ALTER TABLE `day`
 ADD PRIMARY KEY (`DayID`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
 ADD PRIMARY KEY (`InstructorID`);

--
-- Indexes for table `official`
--
ALTER TABLE `official`
 ADD PRIMARY KEY (`official_Id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
 ADD PRIMARY KEY (`RoomID`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
 ADD PRIMARY KEY (`SchedID`);

--
-- Indexes for table `schoolyear`
--
ALTER TABLE `schoolyear`
 ADD PRIMARY KEY (`SyID`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
 ADD PRIMARY KEY (`SemesterID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
MODIFY `CourseID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `day`
--
ALTER TABLE `day`
MODIFY `DayID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
MODIFY `InstructorID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `official`
--
ALTER TABLE `official`
MODIFY `official_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
MODIFY `RoomID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
MODIFY `SchedID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `schoolyear`
--
ALTER TABLE `schoolyear`
MODIFY `SyID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
MODIFY `SemesterID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_Id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
