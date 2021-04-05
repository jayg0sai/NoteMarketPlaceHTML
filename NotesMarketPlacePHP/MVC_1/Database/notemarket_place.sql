-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2021 at 06:56 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notemarket_place`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `CountryCode` varchar(100) NOT NULL,
  `CreatedDate` datetime(6) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime(6) DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `downloads`
--

CREATE TABLE `downloads` (
  `ID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `Seller` int(11) NOT NULL,
  `Downloader` int(11) NOT NULL,
  `IsSellerHasAllowedDownload` bit(1) NOT NULL,
  `AttachmentPath` mediumtext DEFAULT NULL,
  `IsAttachmentDownload` bit(1) NOT NULL,
  `AttachmentDownloadDate` datetime(6) DEFAULT NULL,
  `IsPaid` bit(1) NOT NULL,
  `PurchasedPrice` decimal(10,0) DEFAULT NULL,
  `NoteTitle` varchar(100) NOT NULL,
  `NoteCategory` varchar(100) NOT NULL,
  `CreatedDate` datetime(6) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime(6) DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`ID`, `NoteID`, `Seller`, `Downloader`, `IsSellerHasAllowedDownload`, `AttachmentPath`, `IsAttachmentDownload`, `AttachmentDownloadDate`, `IsPaid`, `PurchasedPrice`, `NoteTitle`, `NoteCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES
(2, 12, 55, 55, b'1', '', b'1', '2021-04-05 16:23:59.000000', b'1', '0', 'web template', '0', '2021-04-05 16:23:59.000000', 55, '2021-04-05 16:23:59.000000', 55),
(3, 12, 55, 55, b'1', '', b'1', '2021-04-05 16:25:02.000000', b'1', '0', 'web template', '0', '2021-04-05 16:25:02.000000', 55, '2021-04-05 16:25:02.000000', 55),
(4, 12, 55, 55, b'1', '', b'1', '2021-04-05 16:26:17.000000', b'1', '0', 'web template', '0', '2021-04-05 16:26:17.000000', 55, '2021-04-05 16:26:17.000000', 55),
(5, 26, 55, 55, b'1', 'images/Members/55/26/Attachments/sample.pdf', b'1', '2021-04-05 16:27:24.000000', b'1', '0', 'email template', '0', '2021-04-05 16:27:24.000000', 55, '2021-04-05 16:27:24.000000', 55),
(6, 26, 55, 55, b'1', 'images/Members/55/26/Attachments/sample.pdf', b'1', '2021-04-05 16:29:37.000000', b'1', '0', 'email template', '0', '2021-04-05 16:29:37.000000', 55, '2021-04-05 16:29:37.000000', 55),
(7, 26, 55, 55, b'1', 'images/Members/55/26/Attachments/sample.pdf', b'1', '2021-04-05 16:49:04.000000', b'1', '0', 'email template', '0', '2021-04-05 16:49:04.000000', 55, '2021-04-05 16:49:04.000000', 55),
(8, 26, 55, 49, b'1', 'images/Members/55/26/Attachments/sample.pdf', b'1', '2021-04-05 16:51:41.000000', b'1', '0', 'email template', '0', '2021-04-05 16:51:41.000000', 49, '2021-04-05 16:51:41.000000', 49),
(9, 26, 55, 49, b'1', 'images/Members/55/26/Attachments/sample.pdf', b'1', '2021-04-05 17:03:57.000000', b'1', '0', 'email template', '0', '2021-04-05 17:03:57.000000', 49, '2021-04-05 17:03:57.000000', 49),
(10, 26, 55, 49, b'1', 'images/Members/55/26/Attachments/sample.pdf', b'1', '2021-04-05 17:12:40.000000', b'1', '0', 'email template', '0', '2021-04-05 17:12:40.000000', 49, '2021-04-05 17:12:40.000000', 49),
(12, 26, 55, 49, b'1', 'images/Members/55/26/Attachments/sample.pdf', b'1', '2021-04-05 17:20:35.000000', b'1', '0', 'email template', '0', '2021-04-05 17:20:35.000000', 49, '2021-04-05 17:20:35.000000', 49),
(14, 26, 55, 49, b'1', 'images/Members/55/26/Attachments/sample.pdf', b'1', '2021-04-05 17:21:09.000000', b'1', '0', 'email template', '0', '2021-04-05 17:21:09.000000', 49, '2021-04-05 17:21:09.000000', 49),
(15, 27, 49, 49, b'0', NULL, b'0', NULL, b'1', '12', 'web template', '0', '2021-04-05 17:24:52.000000', 49, '2021-04-05 17:24:52.000000', 49),
(16, 27, 49, 49, b'0', NULL, b'0', NULL, b'1', '12', 'web template', '0', '2021-04-05 17:26:27.000000', 49, '2021-04-05 17:26:27.000000', 49),
(17, 27, 49, 49, b'0', NULL, b'0', NULL, b'1', '12', 'web template', '0', '2021-04-05 17:28:45.000000', 49, '2021-04-05 17:28:45.000000', 49),
(18, 27, 49, 49, b'0', NULL, b'0', NULL, b'1', '12', 'web template', '0', '2021-04-05 17:30:22.000000', 49, '2021-04-05 17:30:22.000000', 49),
(19, 27, 49, 49, b'0', NULL, b'0', NULL, b'1', '12', 'web template', '0', '2021-04-05 17:30:55.000000', 49, '2021-04-05 17:30:55.000000', 49),
(20, 27, 49, 49, b'0', NULL, b'0', NULL, b'1', '12', 'web template', '0', '2021-04-05 17:31:39.000000', 49, '2021-04-05 17:31:39.000000', 49);

-- --------------------------------------------------------

--
-- Table structure for table `note_categories`
--

CREATE TABLE `note_categories` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` mediumtext NOT NULL,
  `CreatedDate` datetime(6) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime(6) DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `note_types`
--

CREATE TABLE `note_types` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Description` mediumtext NOT NULL,
  `CreatedDate` datetime(6) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime(6) DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reference_data`
--

CREATE TABLE `reference_data` (
  `ID` int(11) NOT NULL,
  `Value` varchar(100) NOT NULL,
  `DataValue` varchar(100) NOT NULL,
  `RefCategory` varchar(100) NOT NULL,
  `CreatedDate` datetime(6) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime(6) DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seller_notes`
--

CREATE TABLE `seller_notes` (
  `ID` int(11) NOT NULL,
  `SellerID` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `ActionedBy` int(11) DEFAULT NULL,
  `AdminRemarks` mediumtext DEFAULT NULL,
  `PublishedDate` datetime DEFAULT NULL,
  `Title` varchar(100) NOT NULL,
  `Category` int(11) NOT NULL,
  `DisplayPicture` varchar(500) DEFAULT NULL,
  `NoteType` int(11) DEFAULT NULL,
  `NumberofPages` int(11) DEFAULT NULL,
  `Description` mediumtext NOT NULL,
  `UniversityName` varchar(200) DEFAULT NULL,
  `Country` int(11) DEFAULT NULL,
  `Course` varchar(100) DEFAULT NULL,
  `CourseCode` varchar(100) DEFAULT NULL,
  `Professor` varchar(100) DEFAULT NULL,
  `IsPaid` bit(1) NOT NULL DEFAULT b'0',
  `SellingPrice` decimal(10,0) DEFAULT NULL,
  `NotesPreview` mediumtext DEFAULT NULL,
  `CreatedDate` datetime(6) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime(6) DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_notes`
--

INSERT INTO `seller_notes` (`ID`, `SellerID`, `Status`, `ActionedBy`, `AdminRemarks`, `PublishedDate`, `Title`, `Category`, `DisplayPicture`, `NoteType`, `NumberofPages`, `Description`, `UniversityName`, `Country`, `Course`, `CourseCode`, `Professor`, `IsPaid`, `SellingPrice`, `NotesPreview`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(5, 52, 0, NULL, NULL, '2021-04-13 11:02:00', 'email template', 0, 'images/Members/52/5/computer.jpg', 0, 200, 'my name is khan', 'seas', 0, 'computer', '1113', 'dd', b'1', '222', 'images/Members/52/5/sample.pdf', '2021-03-31 22:48:22.000000', NULL, '2021-04-03 15:38:24.000000', 0, b'00'),
(6, 52, 0, NULL, NULL, NULL, 'email ', 0, 'images/Members/52/5/computer.jpg', NULL, 1100, 'sdfsfsdcgggg', 'gtu', NULL, 'ce', '1113', 'dd', b'0', '1111', 'images/Members/52/5/computer.jpg', '2021-03-31 22:54:45.000000', NULL, '2021-04-03 15:24:04.000000', 0, b'00'),
(7, 55, 0, NULL, NULL, NULL, 'email ', 0, 'images/Members/55/10/search6.png', NULL, 1100, 'sdfsfsdcgggg', 'gtu', NULL, 'ce', '1113', 'dd', b'0', '1111', 'images/Members/55/5//sample.pdf', '2021-04-01 10:32:45.000000', NULL, '2021-04-03 15:24:04.000000', 0, b'00'),
(8, 55, 0, NULL, NULL, NULL, 'email ', 0, 'images/Members/55/10/search6.png', NULL, 1100, 'sdfsfsdcgggg', 'gtu', NULL, 'ce', '1113', 'dd', b'0', '1111', 'images/Members/55/5//sample.pdf', '2021-04-01 12:31:08.000000', NULL, '2021-04-03 15:24:04.000000', 0, b'00'),
(9, 55, 0, NULL, NULL, NULL, 'email ', 0, 'images/Members/55/10/search6.png', NULL, 1100, 'sdfsfsdcgggg', 'gtu', NULL, 'ce', '1113', 'dd', b'0', '1111', 'images/Members/55/5//sample.pdf', '2021-04-01 22:14:23.000000', NULL, '2021-04-03 15:24:04.000000', 0, b'00'),
(10, 55, 0, NULL, NULL, NULL, 'Computer Science', 0, 'images/Members/55/10/search3.png', NULL, 2001, 'i am boss dd', 'sud', NULL, 'cit', '111', 'dk', b'0', '111', 'images/Members/55/5//sample.pdf', '2021-04-01 22:18:26.000000', NULL, '2021-04-03 16:58:37.000000', 0, b'00'),
(11, 55, 0, NULL, NULL, NULL, 'maths', 0, 'images/Members/55/11/check.png', NULL, 111, 'sdfsdfsdf', 'svs', NULL, 'DHIHI', '111', 'bonzeo', b'0', '100', 'images/Members/55/11/sample.pdf', '2021-04-03 16:24:22.000000', NULL, NULL, NULL, b'00'),
(12, 55, 0, NULL, NULL, NULL, 'web template', 0, 'images/Members/55/12/computer.jpg', NULL, 111, 'sdzsdfs', '', NULL, '', '', '', b'0', NULL, 'images/Members/55/12/sample.pdf', '2021-04-04 15:53:27.000000', NULL, NULL, NULL, b'00'),
(13, 55, 0, NULL, NULL, NULL, 'email template', 0, 'images/Members/55/13/computer.jpg', NULL, 111, 'sadsf', 'gtu', NULL, 'DHIHI', '222', 'bonzeo', b'0', '100', 'images/Members/55/13/sample.pdf', '2021-04-05 13:21:31.000000', NULL, NULL, NULL, b'00'),
(14, 55, 0, NULL, NULL, NULL, 'Computer Science', 0, 'images/Members/55/14/computer.jpg', NULL, 123, 'sfdsgdfg', 'gtu', NULL, 'computer', '222', 'bonzeo', b'0', '0', 'images/Members/55/14/sample.pdf', '2021-04-05 13:31:35.000000', NULL, NULL, NULL, b'00'),
(15, 55, 0, NULL, NULL, NULL, 'web template', 0, 'images/Members/55/15/computer.jpg', NULL, 111, 'aswfdsfs', '', NULL, '', '', '', b'0', '100', 'images/Members/55/15/sample.pdf', '2021-04-05 13:32:38.000000', NULL, NULL, NULL, b'00'),
(16, 55, 0, NULL, NULL, NULL, 'email template', 0, 'images/Members/55/16/computer.jpg', NULL, 11, 'asdasfs', '', NULL, '', '', '', b'1', '111', 'images/Members/55/16/sample.pdf', '2021-04-05 13:34:49.000000', NULL, NULL, NULL, b'00'),
(17, 55, 0, NULL, NULL, NULL, 'web template', 0, 'images/Members/55/17/computer.jpg', NULL, 111, 'asfdsf', '', NULL, '', '', '', b'1', '100', 'images/Members/55/17/sample.pdf', '2021-04-05 14:20:05.000000', NULL, NULL, NULL, b'00'),
(18, 55, 0, NULL, NULL, NULL, 'web template', 0, 'images/Members/55/18/computer.jpg', NULL, 111, 'dsfdsfsd', '', NULL, '', '', '', b'1', '100', 'images/Members/55/18/sample.pdf', '2021-04-05 14:23:31.000000', NULL, NULL, NULL, b'00'),
(19, 55, 0, NULL, NULL, NULL, 'email template', 0, 'images/Members/55/19/computer.jpg', NULL, 123, 'wadsasfs', '', NULL, '', '', '', b'1', '0', 'images/Members/55/19/sample.pdf', '2021-04-05 14:24:09.000000', NULL, NULL, NULL, b'00'),
(20, 55, 0, NULL, NULL, NULL, 'email template', 0, 'images/Members/55/20/computer.jpg', NULL, 11, 'afax', '', NULL, '', '', '', b'1', '0', 'images/Members/55/20/sample.pdf', '2021-04-05 14:26:52.000000', NULL, NULL, NULL, b'00'),
(21, 55, 0, NULL, NULL, NULL, 'web template', 0, 'images/Members/55/21/computer.jpg', NULL, 11, 'asdsa', '', NULL, '', '', '', b'1', '0', 'images/Members/55/21/sample.pdf', '2021-04-05 14:27:58.000000', NULL, NULL, NULL, b'00'),
(22, 55, 0, NULL, NULL, NULL, 'email template', 0, 'images/Members/55/22/computer.jpg', NULL, 9988, 'ncfgtgb', '', NULL, '', '', '', b'0', '0', 'images/Members/55/22/sample.pdf', '2021-04-05 14:39:32.000000', NULL, NULL, NULL, b'00'),
(23, 55, 0, NULL, NULL, NULL, 'web template', 0, 'images/Members/55/23/computer.jpg', NULL, 90, 'khhg', '', NULL, '', '', '', b'1', '0', 'images/Members/55/23/sample.pdf', '2021-04-05 14:40:07.000000', NULL, NULL, NULL, b'00'),
(24, 55, 0, NULL, NULL, NULL, 'a', 0, 'images/Members/55/24/computer.jpg', NULL, 211, 'dfdgfg', '', NULL, '', '', '', b'1', '233', 'images/Members/55/24/sample.pdf', '2021-04-05 14:41:20.000000', NULL, NULL, NULL, b'00'),
(25, 55, 0, NULL, NULL, NULL, 'web template', 0, 'images/Members/55/25/computer.jpg', NULL, 122, 'addasf', '', NULL, '', '', '', b'1', '12', 'images/Members/55/25/sample.pdf', '2021-04-05 15:53:15.000000', NULL, NULL, NULL, b'00'),
(26, 55, 0, NULL, NULL, NULL, 'email template', 0, 'images/Members/55/26/computer.jpg', NULL, 111, 'sddffs', 'gtu', NULL, 'DHIHI', '222', 'ascacv', b'0', NULL, 'images/Members/55/26/sample.pdf', '2021-04-05 15:54:30.000000', NULL, NULL, NULL, b'00'),
(27, 49, 0, NULL, NULL, NULL, 'web template', 0, 'images/Members/49/27/computer.jpg', NULL, 111, 'afzfs', '', NULL, '', '', '', b'1', '12', 'images/Members/49/27/sample.pdf', '2021-04-05 17:24:38.000000', NULL, NULL, NULL, b'00');

-- --------------------------------------------------------

--
-- Table structure for table `seller_notes_attachment`
--

CREATE TABLE `seller_notes_attachment` (
  `ID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `FileName` varchar(100) NOT NULL,
  `FilePath` mediumtext NOT NULL,
  `CreatedDate` datetime(6) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime(5) DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_notes_attachment`
--

INSERT INTO `seller_notes_attachment` (`ID`, `NoteID`, `FileName`, `FilePath`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 26, 'sample.pdf', 'images/Members/55/26/Attachments/sample.pdf', '2021-04-05 15:54:30.000000', 55, NULL, NULL, b'00'),
(2, 27, 'sample (1).pdf', 'images/Members/49/27/Attachments/sample (1).pdf', '2021-04-05 17:24:39.000000', 49, NULL, NULL, b'00');

-- --------------------------------------------------------

--
-- Table structure for table `seller_notes_reportedissues`
--

CREATE TABLE `seller_notes_reportedissues` (
  `ID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `ReportedByID` int(11) NOT NULL,
  `AgainstDownloadsID` int(11) NOT NULL,
  `Remarks` mediumtext NOT NULL,
  `CreatedDate` datetime(6) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime(6) DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seller_notes_reviews`
--

CREATE TABLE `seller_notes_reviews` (
  `ID` int(11) NOT NULL,
  `NoteID` int(11) NOT NULL,
  `ReviewedByID` int(11) NOT NULL,
  `AgainstDownloadsID` int(11) NOT NULL,
  `Ratings` decimal(10,0) NOT NULL,
  `Comments` mediumtext NOT NULL,
  `CreatedDate` datetime(6) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime(6) DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `system_configurations`
--

CREATE TABLE `system_configurations` (
  `ID` int(11) NOT NULL,
  `Key` varchar(100) NOT NULL,
  `Value` mediumtext NOT NULL,
  `CreatedDate` datetime(6) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime(6) DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `RoleID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `EmailID` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `IsEmailVerified` bit(1) NOT NULL,
  `CreatedDate` datetime(6) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime(6) DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `RoleID`, `FirstName`, `LastName`, `EmailID`, `Password`, `IsEmailVerified`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(49, 3, 'jay', 'gosai', 'jaygosai2000@gmail.com', '$2y$10$iusesomecrazystrings2uUIb.Ll5F83iRQca/HPvykRs6lPeCLj6', b'1', '2021-03-30 19:23:27.000000', 49, NULL, NULL, b'01'),
(55, 3, 'jay', 'panchnath', 'jaypanchnathenterprise@gmail.com', '$2y$10$iusesomecrazystrings2uqdlgWrjCNRq3rpzX0BE4qLhjXfd1iSu', b'1', '2021-03-31 23:01:47.000000', 55, NULL, NULL, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DOB` datetime(6) DEFAULT NULL,
  `Gender` int(11) DEFAULT NULL,
  `SecondaryEmailAddress` varchar(100) DEFAULT NULL,
  `Phonenumber_CountryCode` varchar(5) NOT NULL,
  `Phonenumber` varchar(20) NOT NULL,
  `ProfilePicture` varchar(500) DEFAULT NULL,
  `AddressLine1` varchar(100) NOT NULL,
  `AddressLine2` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `ZipCode` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `University` varchar(100) DEFAULT NULL,
  `College` varchar(100) DEFAULT NULL,
  `CreatedDate` datetime(6) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime(6) DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` mediumtext DEFAULT NULL,
  `CreatedDate` datetime(6) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime(6) DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_roles`
--

INSERT INTO `user_roles` (`ID`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'super admin', NULL, NULL, NULL, NULL, NULL, b'01'),
(2, 'admin', NULL, NULL, NULL, NULL, NULL, b'01'),
(3, 'member', NULL, NULL, NULL, NULL, NULL, b'01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `downloads`
--
ALTER TABLE `downloads`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoteID` (`NoteID`),
  ADD KEY `Seller` (`Seller`),
  ADD KEY `Downloader` (`Downloader`);

--
-- Indexes for table `note_categories`
--
ALTER TABLE `note_categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `note_types`
--
ALTER TABLE `note_types`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reference_data`
--
ALTER TABLE `reference_data`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `seller_notes`
--
ALTER TABLE `seller_notes`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `seller_notes_ibfk_1` (`SellerID`),
  ADD KEY `seller_notes_ibfk_2` (`ActionedBy`);

--
-- Indexes for table `seller_notes_attachment`
--
ALTER TABLE `seller_notes_attachment`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoteID` (`NoteID`);

--
-- Indexes for table `seller_notes_reportedissues`
--
ALTER TABLE `seller_notes_reportedissues`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoteID` (`NoteID`),
  ADD KEY `ReportedByID` (`ReportedByID`),
  ADD KEY `AgainstDownloadsID` (`AgainstDownloadsID`);

--
-- Indexes for table `seller_notes_reviews`
--
ALTER TABLE `seller_notes_reviews`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `NoteID` (`NoteID`),
  ADD KEY `ReviewedByID` (`ReviewedByID`),
  ADD KEY `AgainstDownloadsID` (`AgainstDownloadsID`);

--
-- Indexes for table `system_configurations`
--
ALTER TABLE `system_configurations`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `RoleID` (`RoleID`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `note_categories`
--
ALTER TABLE `note_categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `note_types`
--
ALTER TABLE `note_types`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reference_data`
--
ALTER TABLE `reference_data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `seller_notes`
--
ALTER TABLE `seller_notes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `seller_notes_attachment`
--
ALTER TABLE `seller_notes_attachment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `seller_notes_reportedissues`
--
ALTER TABLE `seller_notes_reportedissues`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_notes_reviews`
--
ALTER TABLE `seller_notes_reviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `system_configurations`
--
ALTER TABLE `system_configurations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `downloads`
--
ALTER TABLE `downloads`
  ADD CONSTRAINT `downloads_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `seller_notes` (`ID`),
  ADD CONSTRAINT `downloads_ibfk_2` FOREIGN KEY (`Seller`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `downloads_ibfk_3` FOREIGN KEY (`Downloader`) REFERENCES `users` (`ID`);

--
-- Constraints for table `seller_notes`
--
ALTER TABLE `seller_notes`
  ADD CONSTRAINT `seller_notes_ibfk_1` FOREIGN KEY (`SellerID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `seller_notes_ibfk_2` FOREIGN KEY (`ActionedBy`) REFERENCES `users` (`ID`);

--
-- Constraints for table `seller_notes_attachment`
--
ALTER TABLE `seller_notes_attachment`
  ADD CONSTRAINT `seller_notes_attachment_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `seller_notes` (`ID`);

--
-- Constraints for table `seller_notes_reportedissues`
--
ALTER TABLE `seller_notes_reportedissues`
  ADD CONSTRAINT `seller_notes_reportedissues_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `seller_notes` (`ID`),
  ADD CONSTRAINT `seller_notes_reportedissues_ibfk_2` FOREIGN KEY (`ReportedByID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `seller_notes_reportedissues_ibfk_3` FOREIGN KEY (`AgainstDownloadsID`) REFERENCES `downloads` (`ID`);

--
-- Constraints for table `seller_notes_reviews`
--
ALTER TABLE `seller_notes_reviews`
  ADD CONSTRAINT `seller_notes_reviews_ibfk_1` FOREIGN KEY (`NoteID`) REFERENCES `seller_notes` (`ID`),
  ADD CONSTRAINT `seller_notes_reviews_ibfk_2` FOREIGN KEY (`ReviewedByID`) REFERENCES `users` (`ID`),
  ADD CONSTRAINT `seller_notes_reviews_ibfk_3` FOREIGN KEY (`AgainstDownloadsID`) REFERENCES `downloads` (`ID`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`RoleID`) REFERENCES `user_roles` (`ID`);

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
