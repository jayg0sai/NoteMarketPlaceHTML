-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2021 at 08:27 AM
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

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`ID`, `Name`, `CountryCode`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'India', '91', '2021-05-14 17:25:40.000000', 73, '2021-05-14 17:26:39.000000', 73, b'1'),
(2, 'Australia', '61', '2021-05-14 17:27:26.000000', 73, NULL, NULL, b'1'),
(3, 'USA', '1', '2021-05-14 17:27:48.000000', 73, NULL, NULL, b'1');

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
  `AttachmentDownloadDate` datetime DEFAULT NULL,
  `IsPaid` bit(1) NOT NULL,
  `PurchasedPrice` decimal(10,0) DEFAULT NULL,
  `NoteTitle` varchar(100) NOT NULL,
  `NoteCategory` varchar(100) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `downloads`
--

INSERT INTO `downloads` (`ID`, `NoteID`, `Seller`, `Downloader`, `IsSellerHasAllowedDownload`, `AttachmentPath`, `IsAttachmentDownload`, `AttachmentDownloadDate`, `IsPaid`, `PurchasedPrice`, `NoteTitle`, `NoteCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES
(2, 12, 55, 55, b'1', '', b'1', '2021-04-05 16:23:59', b'1', '0', 'web template', '1', '2021-04-05 16:23:59', 55, '2021-04-05 16:23:59', 55),
(3, 12, 55, 55, b'1', '', b'1', '2021-04-05 16:25:02', b'1', '0', 'web template', '1', '2021-04-05 16:25:02', 55, '2021-04-05 16:25:02', 55),
(4, 12, 55, 55, b'1', '', b'1', '2021-04-05 16:26:17', b'1', '0', 'web template', '1', '2021-04-05 16:26:17', 55, '2021-04-05 16:26:17', 55),
(5, 26, 55, 55, b'1', 'images/Members/55/26/Attachments/sample.pdf', b'1', '2021-04-05 16:27:24', b'1', '0', 'email template', '1', '2021-04-05 16:27:24', 55, '2021-04-05 16:27:24', 55),
(6, 26, 55, 55, b'1', 'images/Members/55/26/Attachments/sample.pdf', b'1', '2021-04-05 16:29:37', b'1', '0', 'email template', '1', '2021-04-05 16:29:37', 55, '2021-04-05 16:29:37', 55),
(7, 26, 55, 55, b'1', 'images/Members/55/26/Attachments/sample.pdf', b'1', '2021-04-05 16:49:04', b'1', '0', 'email template', '1', '2021-04-05 16:49:04', 55, '2021-04-05 16:49:04', 55),
(8, 26, 55, 49, b'1', 'images/Members/55/26/Attachments/sample.pdf', b'1', '2021-04-05 16:51:41', b'1', '0', 'email template', '1', '2021-04-05 16:51:41', 49, '2021-04-05 16:51:41', 49),
(9, 26, 55, 49, b'1', 'images/Members/55/26/Attachments/sample.pdf', b'1', '2021-04-05 17:03:57', b'1', '0', 'email template', '1', '2021-04-05 17:03:57', 49, '2021-04-05 17:03:57', 49),
(10, 26, 55, 49, b'1', 'images/Members/55/26/Attachments/sample.pdf', b'1', '2021-04-05 17:12:40', b'1', '0', 'email template', '1', '2021-04-05 17:12:40', 49, '2021-04-05 17:12:40', 49),
(12, 26, 55, 49, b'1', 'images/Members/55/26/Attachments/sample.pdf', b'1', '2021-04-05 17:20:35', b'1', '0', 'email template', '1', '2021-04-05 17:20:35', 49, '2021-04-05 17:20:35', 49),
(14, 26, 55, 49, b'1', 'images/Members/55/26/Attachments/sample.pdf', b'1', '2021-04-05 17:21:09', b'1', '0', 'email template', '1', '2021-04-05 17:21:09', 49, '2021-04-05 17:21:09', 49),
(15, 27, 49, 49, b'0', NULL, b'0', NULL, b'1', '12', 'web template', '1', '2021-04-05 17:24:52', 49, '2021-04-05 17:24:52', 49),
(16, 27, 49, 49, b'0', NULL, b'0', NULL, b'1', '12', 'web template', '1', '2021-04-05 17:26:27', 49, '2021-04-05 17:26:27', 49),
(17, 27, 49, 49, b'0', NULL, b'0', NULL, b'1', '12', 'web template', '1', '2021-04-05 17:28:45', 49, '2021-04-05 17:28:45', 49),
(18, 27, 49, 49, b'0', NULL, b'0', NULL, b'1', '12', 'web template', '1', '2021-04-05 17:30:22', 49, '2021-04-05 17:30:22', 49),
(19, 27, 49, 49, b'0', NULL, b'0', NULL, b'1', '12', 'web template', '1', '2021-04-05 17:30:55', 49, '2021-04-05 17:30:55', 49),
(20, 27, 49, 49, b'0', NULL, b'0', NULL, b'1', '12', 'web template', '1', '2021-04-05 17:31:39', 49, '2021-04-05 17:31:39', 49),
(21, 12, 55, 55, b'1', '', b'1', '2021-04-06 16:06:47', b'1', '0', 'web template', '1', '2021-04-06 16:06:47', 55, '2021-04-06 16:06:47', 55),
(22, 26, 55, 55, b'1', 'images/Members/55/26/Attachments/sample.pdf', b'1', '2021-04-06 16:07:06', b'1', '0', 'email template', '1', '2021-04-06 16:07:06', 55, '2021-04-06 16:07:06', 55),
(23, 27, 49, 55, b'0', NULL, b'0', NULL, b'1', '12', 'web template', '1', '2021-04-06 16:07:21', 55, '2021-04-06 16:07:21', 55),
(24, 27, 49, 55, b'0', NULL, b'0', NULL, b'1', '12', 'web template', '1', '2021-04-06 16:07:40', 55, '2021-04-06 16:07:40', 55),
(26, 26, 55, 55, b'1', 'images/Members/55/26/Attachments/sample.pdf', b'1', '2021-04-07 15:24:48', b'1', '0', 'email template', '1', '2021-04-07 15:24:48', 55, '2021-04-07 15:24:48', 55),
(27, 27, 49, 55, b'0', NULL, b'0', NULL, b'1', '12', 'web template', '1', '2021-04-07 15:24:57', 55, '2021-04-07 15:24:57', 55),
(29, 11, 55, 55, b'1', '', b'1', '2021-04-07 16:34:49', b'1', '100', 'maths', '1', '2021-04-07 16:34:49', 55, '2021-04-07 16:34:49', 55),
(30, 11, 55, 55, b'1', '', b'1', '2021-04-07 16:35:12', b'1', '100', 'maths', '1', '2021-04-07 16:35:12', 55, '2021-04-07 16:35:12', 55),
(31, 13, 55, 55, b'1', '', b'1', '2021-04-07 16:35:29', b'1', '100', 'email template', '1', '2021-04-07 16:35:29', 55, '2021-04-07 16:35:29', 55),
(32, 14, 55, 55, b'1', '', b'1', '2021-04-07 16:35:45', b'1', '0', 'Computer Science', '1', '2021-04-07 16:35:45', 55, '2021-04-07 16:35:45', 55),
(33, 18, 55, 55, b'0', NULL, b'0', NULL, b'1', '100', 'web template', '1', '2021-04-07 16:35:53', 55, '2021-04-07 16:35:53', 55),
(34, 44, 49, 49, b'1', 'images/Members/49/44/Attachments/sample.pdf', b'1', '2021-04-10 18:53:27', b'1', '0', 'email template', '1', '2021-04-10 18:53:27', 49, '2021-04-10 18:53:27', 49),
(35, 44, 49, 49, b'1', 'images/Members/49/44/Attachments/sample.pdf', b'1', '2021-04-11 15:55:34', b'1', '0', 'email template', '1', '2021-04-11 15:55:34', 49, '2021-04-11 15:55:34', 49),
(36, 44, 49, 49, b'1', 'images/Members/49/44/Attachments/sample.pdf', b'1', '2021-04-11 15:59:20', b'1', '0', 'email template', '1', '2021-04-11 15:59:20', 49, '2021-04-11 15:59:20', 49),
(37, 44, 49, 49, b'1', 'images/Members/49/44/Attachments/sample.pdf', b'1', '2021-04-11 16:03:15', b'0', '0', 'email template', '1', '2021-04-11 16:03:15', 49, '2021-04-11 16:03:15', 49),
(39, 45, 49, 49, b'1', 'images/Members/49/45/Attachments/sample (5).pdf', b'1', '2021-04-11 17:39:51', b'0', '0', 'maths', '1', '2021-04-11 17:39:51', 49, '2021-04-11 17:39:51', 49),
(40, 33, 55, 49, b'1', 'images/Members/55/33/Attachments/sample.pdf', b'1', '2021-04-11 17:53:18', b'0', '0', 'my boolk', '1', '2021-04-11 17:53:18', 49, '2021-04-11 17:53:18', 49),
(42, 46, 49, 49, b'1', 'images/Members/49/46/Attachments/sample.pdf', b'1', '2021-04-12 19:02:48', b'0', '0', 'Computer Science', '1', '2021-04-12 19:02:48', 49, '2021-04-12 19:02:48', 49),
(47, 48, 74, 74, b'1', 'images/Members/74/48/Attachments/sample.pdf', b'1', '2021-04-28 12:28:22', b'0', '0', 'maths', '1', '2021-04-12 23:11:04', 74, '2021-04-12 23:11:04', 74),
(48, 48, 74, 75, b'1', 'images/Members/74/48/Attachments/sample.pdf', b'1', '2021-04-13 11:45:24', b'0', '0', 'maths', '1', '2021-04-13 11:45:24', 75, '2021-04-13 11:45:24', 75),
(50, 49, 75, 73, b'1', 'images/Members/75/49/Attachments/sample.pdf', b'1', '2021-04-13 18:36:56', b'0', '0', 'times india', '1', '2021-04-13 18:36:56', 73, '2021-04-13 18:36:56', 73),
(51, 50, 75, 74, b'1', NULL, b'1', '2021-04-18 13:36:10', b'1', '100', 'web template', '1', '2021-04-13 19:16:54', 74, '2021-04-13 19:16:54', 74),
(52, 50, 75, 73, b'1', NULL, b'1', '2021-04-18 13:44:16', b'1', '100', 'web template', '1', '2021-04-14 11:17:18', 73, '2021-04-14 11:17:18', 73),
(53, 50, 75, 73, b'1', NULL, b'1', '2021-04-18 13:44:16', b'1', '100', 'web template', '1', '2021-04-14 11:35:59', 73, '2021-04-14 11:35:59', 73),
(54, 50, 75, 73, b'1', NULL, b'1', '2021-04-18 13:44:16', b'1', '100', 'web template', '1', '2021-04-14 11:36:51', 73, '2021-04-14 11:36:51', 73),
(55, 50, 75, 73, b'1', NULL, b'1', '2021-04-18 13:44:16', b'1', '100', 'web template', '1', '2021-04-14 11:37:06', 73, '2021-04-14 11:37:06', 73),
(61, 51, 74, 73, b'0', 'images/Members/74/51/Attachments/sample.pdf', b'0', NULL, b'1', '100', 'maths', '1', '2021-04-14 17:18:58', 73, '2021-04-14 17:18:58', 73),
(65, 49, 75, 74, b'1', 'sample.pdf', b'1', '2021-04-28 12:27:46', b'0', '0', 'times india', '1', '2021-04-28 12:24:52', 74, '2021-04-28 12:24:52', 74),
(69, 64, 74, 75, b'1', 'images/Members/74/64/sample.pdf', b'1', '2021-04-28 13:15:26', b'0', '100', 'Computer Science', '1', '2021-04-28 13:15:26', 75, '2021-04-28 13:15:26', 75),
(71, 65, 75, 74, b'1', 'images/Members/75/65/Attachments/sample.pdf', b'1', '2021-04-28 13:33:20', b'0', '100', 'Computer Science', '1', '2021-04-28 13:30:02', 74, '2021-04-28 13:30:02', 74),
(72, 66, 74, 75, b'1', 'images/Members/74/66/Attachments/sample.pdf', b'1', '2021-04-28 13:42:29', b'1', '100', 'web templateses', '1', '2021-04-28 13:40:38', 75, '2021-04-28 13:40:38', 75),
(73, 52, 75, 73, b'1', 'images/Members/74/64/sample.pdf', b'1', '2021-04-30 10:26:01', b'1', '222', 'Pc design', '1', '2021-04-30 10:26:01', 73, '2021-04-30 10:26:01', 73),
(74, 53, 75, 73, b'1', 'images/Members/74/64/sample.pdf', b'1', '2021-05-04 22:50:17', b'0', '0', 'web template', '1', '2021-04-30 10:26:21', 73, '2021-04-30 10:26:21', 73),
(75, 56, 75, 73, b'1', 'images/Members/74/64/sample.pdf', b'1', '2021-04-30 12:02:51', b'0', '0', 'email sent', '1', '2021-04-30 10:26:25', 73, '2021-04-30 10:26:25', 73),
(77, 60, 75, 73, b'1', 'images/Members/74/64/sample.pdf', b'1', '2021-04-30 11:08:17', b'0', '0', 'Computer eng', '1', '2021-04-30 11:08:17', 73, '2021-04-30 11:08:17', 73),
(80, 58, 75, 73, b'1', 'images/Members/74/64/sample.pdf', b'1', '2021-05-01 15:59:51', b'0', '0', 'Computer Sciences', '1', '2021-04-30 17:36:24', 73, '2021-04-30 17:36:24', 73),
(81, 7, 74, 73, b'1', '', b'1', '2021-05-04 22:50:05', b'1', '1111', 'email ', '1', '2021-05-04 22:50:05', 73, '2021-05-04 22:50:05', 73),
(82, 12, 74, 75, b'1', '', b'1', '2021-05-15 09:53:01', b'0', '0', 'web template', '1', '2021-05-05 11:48:42', 75, '2021-05-05 11:48:42', 75),
(83, 45, 74, 75, b'1', 'images/Members/74/64/sample.pdf', b'1', '2021-05-05 12:01:11', b'0', '0', 'maths', '1', '2021-05-05 11:54:25', 75, '2021-05-05 11:54:25', 75),
(84, 61, 73, 75, b'1', 'images/Members/74/64/sample.pdf', b'1', '2021-05-05 12:01:08', b'0', '0', 'web template', '1', '2021-05-05 12:01:08', 75, '2021-05-05 12:01:08', 75),
(85, 8, 74, 73, b'1', '', b'1', '2021-05-08 17:55:09', b'1', '1111', 'email ', '1', '2021-05-08 17:55:09', 73, '2021-05-08 17:55:09', 73),
(86, 45, 74, 73, b'1', 'images/Members/74/64/sample.pdf', b'1', '2021-05-08 17:55:42', b'0', '0', 'maths', '1', '2021-05-08 17:55:42', 73, '2021-05-08 17:55:42', 73),
(87, 47, 74, 73, b'1', 'images/Members/74/64/sample.pdf', b'1', '2021-05-08 17:55:48', b'1', '100', 'web template', '1', '2021-05-08 17:55:48', 73, '2021-05-08 17:55:48', 73),
(88, 48, 74, 73, b'1', 'images/Members/74/64/sample.pdf', b'1', '2021-05-08 17:55:54', b'0', '0', 'maths', '1', '2021-05-08 17:55:54', 73, '2021-05-08 17:55:54', 73),
(89, 63, 75, 73, b'1', 'images/Members/74/64/sample.pdf', b'1', '2021-05-08 19:35:24', b'1', '100', 'Basic Company', '1', '2021-05-08 19:35:24', 73, '2021-05-08 19:35:24', 73),
(90, 71, 75, 74, b'1', '../Members/75/71/Attachments/sample.pdf', b'1', '2021-05-15 11:21:41', b'0', '0', 'Excel', '1', '2021-05-15 11:08:59', 74, '2021-05-15 11:08:59', 74),
(92, 72, 75, 74, b'1', '../Members/75/72/Attachments/sample.pdf', b'1', '2021-05-15 11:22:46', b'1', '50', 'Power p', '2', '2021-05-15 11:18:52', 74, '2021-05-15 11:18:52', 74);

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

--
-- Dumping data for table `note_categories`
--

INSERT INTO `note_categories` (`ID`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'IT', 'Information Technology', '2021-05-14 10:33:44.000000', 73, NULL, NULL, b'1'),
(2, 'Computer', 'A computer is a machine', '2021-05-14 10:37:25.000000', 73, NULL, NULL, b'1'),
(3, 'Science', 'Evidence, Experiment and observation ', '2021-05-14 10:45:44.000000', 73, '2021-05-14 10:51:08.000000', 73, b'1'),
(4, 'History', 'History is the study of the past', '2021-05-14 10:52:03.000000', 73, NULL, NULL, b'1'),
(5, 'Account', 'Accounting  is the measurement, processing about economic entitie', '2021-05-14 10:54:09.000000', 73, '2021-05-14 12:50:20.000000', 73, b'0');

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

--
-- Dumping data for table `note_types`
--

INSERT INTO `note_types` (`ID`, `Name`, `Description`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 'Handwritten Book', 'Handmade pieces from our literature', '2021-05-14 12:52:27.000000', 73, '2021-05-14 13:01:02.000000', 73, b'1'),
(2, 'University Note', 'Effective note-making is an important practice to master at university', '2021-05-14 13:02:20.000000', 73, NULL, NULL, b'1'),
(3, 'Self write', 'Write for yourself', '2021-05-14 13:08:43.000000', 73, NULL, NULL, b'1'),
(4, 'Novel', 'A book that tells a story about people and events that are not real', '2021-05-14 13:09:14.000000', 73, NULL, NULL, b'1');

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

--
-- Dumping data for table `reference_data`
--

INSERT INTO `reference_data` (`ID`, `Value`, `DataValue`, `RefCategory`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(5, 'Male', 'M', 'Gender', '2021-04-16 11:08:28.000000', NULL, NULL, NULL, b'1'),
(6, 'Female', 'F', 'Gender', '2021-04-16 11:08:28.000000', NULL, NULL, NULL, b'1'),
(7, 'Unknown', 'U', 'Gender', '2021-04-16 11:11:54.000000', NULL, NULL, NULL, b'0'),
(8, 'Paid', 'P', 'Selling Mode', '2021-04-16 11:11:54.000000', NULL, NULL, NULL, b'1'),
(9, 'Free', 'F', 'Selling Mode', '2021-04-16 11:14:26.000000', NULL, NULL, NULL, b'1'),
(10, 'Draft', 'Draft', 'Notes Status', '2021-04-16 11:14:26.000000', NULL, NULL, NULL, b'1'),
(11, 'Submitted For Review', 'Submitted For Review', 'Notes Status', '2021-04-16 11:15:44.000000', NULL, NULL, NULL, b'1'),
(12, 'In Review', 'In Review', 'Notes Status', '2021-04-16 11:15:44.000000', NULL, NULL, NULL, b'1'),
(13, 'Published', 'Published', 'Note Status', '2021-04-16 11:16:57.000000', NULL, NULL, NULL, b'1'),
(14, 'Rejected', 'Rejected', 'Notes Status', '2021-04-16 11:16:57.000000', NULL, NULL, NULL, b'1'),
(15, 'Removed', 'Removed', 'Notes Status', '2021-04-16 11:18:14.000000', NULL, NULL, NULL, b'1');

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
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_notes`
--

INSERT INTO `seller_notes` (`ID`, `SellerID`, `Status`, `ActionedBy`, `AdminRemarks`, `PublishedDate`, `Title`, `Category`, `DisplayPicture`, `NoteType`, `NumberofPages`, `Description`, `UniversityName`, `Country`, `Course`, `CourseCode`, `Professor`, `IsPaid`, `SellingPrice`, `NotesPreview`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(5, 74, 15, 73, 'copy', '2021-04-30 16:42:37', 'email template', 1, 'images/Members/52/5/computer.jpg', 2, 200, 'my name is khan', 'seas', 0, 'computer', '1113', 'dd', b'1', '222', 'images/Members/52/5/sample.pdf', '2021-03-31 22:48:22', NULL, '2021-05-01 15:20:30', 73, b'00'),
(6, 74, 15, 73, 'bad', '2021-04-30 16:42:37', 'email ', 1, 'images/Members/52/5/computer.jpg', 2, 1100, 'sdfsfsdcgggg', 'gtu', NULL, 'ce', '1113', 'dd', b'1', '1111', 'images/Members/52/5/computer.jpg', '2021-03-31 22:54:45', NULL, '2021-05-01 15:27:32', 73, b'00'),
(7, 74, 15, 73, 'bad', '2021-04-30 16:42:37', 'email ', 1, 'images/Members/55/10/search6.png', 2, 1100, 'sdfsfsdcgggg', 'gtu', NULL, 'ce', '1113', 'dd', b'1', '1111', 'images/Members/55/5//sample.pdf', '2021-04-01 10:32:45', NULL, '2021-05-04 22:55:58', 73, b'00'),
(8, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'email ', 1, 'images/Members/55/10/search6.png', 2, 1100, 'sdfsfsdcgggg', 'gtu', NULL, 'ce', '1113', 'dd', b'1', '1111', 'images/Members/55/5//sample.pdf', '2021-04-01 12:31:08', NULL, '2021-04-03 15:24:04', 0, b'00'),
(9, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'email ', 1, 'images/Members/55/10/search6.png', 2, 1100, 'sdfsfsdcgggg', 'gtu', NULL, 'ce', '1113', 'dd', b'1', '1111', 'images/Members/55/5//sample.pdf', '2021-04-01 22:14:23', NULL, '2021-04-03 15:24:04', 0, b'00'),
(10, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'Computer Science', 1, 'images/Members/55/10/search3.png', 2, 2001, 'i am boss dd', 'sud', NULL, 'cit', '111', 'dk', b'1', '111', 'images/Members/55/5//sample.pdf', '2021-04-01 22:18:26', NULL, '2021-04-03 16:58:37', 0, b'00'),
(11, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'maths', 1, 'images/Members/55/11/check.png', 2, 111, 'sdfsdfsdf', 'svs', NULL, 'DHIHI', '111', 'bonzeo', b'1', '100', 'images/Members/55/11/sample.pdf', '2021-04-03 16:24:22', NULL, NULL, NULL, b'00'),
(12, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'web template', 1, 'images/Members/55/12/computer.jpg', 2, 111, 'sdzsdfs', '', NULL, '', '', '', b'0', NULL, 'images/Members/55/12/sample.pdf', '2021-04-04 15:53:27', NULL, NULL, NULL, b'00'),
(13, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'email template', 1, 'images/Members/55/13/computer.jpg', 2, 111, 'sadsf', 'gtu', NULL, 'DHIHI', '222', 'bonzeo', b'1', '100', 'images/Members/55/13/sample.pdf', '2021-04-05 13:21:31', NULL, NULL, NULL, b'00'),
(14, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'Computer Science', 1, 'images/Members/55/14/computer.jpg', 2, 123, 'sfdsgdfg', 'gtu', NULL, 'computer', '222', 'bonzeo', b'0', '0', 'images/Members/55/14/sample.pdf', '2021-04-05 13:31:35', NULL, NULL, NULL, b'00'),
(15, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'web template', 1, 'images/Members/55/15/computer.jpg', 2, 111, 'aswfdsfs', '', NULL, '', '', '', b'1', '100', 'images/Members/55/15/sample.pdf', '2021-04-05 13:32:38', NULL, NULL, NULL, b'00'),
(16, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'email template', 1, 'images/Members/55/16/computer.jpg', 2, 11, 'asdasfs', '', NULL, '', '', '', b'1', '111', 'images/Members/55/16/sample.pdf', '2021-04-05 13:34:49', NULL, NULL, NULL, b'00'),
(17, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'web template', 1, 'images/Members/55/17/computer.jpg', 2, 111, 'asfdsf', '', NULL, '', '', '', b'1', '100', 'images/Members/55/17/sample.pdf', '2021-04-05 14:20:05', NULL, NULL, NULL, b'00'),
(18, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'web template', 1, 'images/Members/55/18/computer.jpg', 2, 111, 'dsfdsfsd', '', NULL, '', '', '', b'1', '100', 'images/Members/55/18/sample.pdf', '2021-04-05 14:23:31', NULL, NULL, NULL, b'00'),
(19, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'email template', 1, 'images/Members/55/19/computer.jpg', 2, 123, 'wadsasfs', '', NULL, '', '', '', b'1', '25', 'images/Members/55/19/sample.pdf', '2021-04-05 14:24:09', NULL, NULL, NULL, b'00'),
(20, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'email template', 1, 'images/Members/55/20/computer.jpg', 2, 11, 'afax', '', NULL, '', '', '', b'1', '25', 'images/Members/55/20/sample.pdf', '2021-04-05 14:26:52', NULL, NULL, NULL, b'00'),
(21, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'web template', 1, 'images/Members/55/21/computer.jpg', 2, 11, 'asdsa', '', NULL, '', '', '', b'1', '25', 'images/Members/55/21/sample.pdf', '2021-04-05 14:27:58', NULL, NULL, NULL, b'00'),
(22, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'email template', 1, 'images/Members/55/22/computer.jpg', 2, 9988, 'ncfgtgb', '', NULL, '', '', '', b'0', '0', 'images/Members/55/22/sample.pdf', '2021-04-05 14:39:32', NULL, NULL, NULL, b'00'),
(23, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'web template', 1, 'images/Members/55/23/computer.jpg', 2, 90, 'khhg', '', NULL, '', '', '', b'1', '25', 'images/Members/55/23/sample.pdf', '2021-04-05 14:40:07', NULL, NULL, NULL, b'00'),
(24, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'a', 1, 'images/Members/55/24/computer.jpg', 2, 211, 'dfdgfg', '', NULL, '', '', '', b'1', '233', 'images/Members/55/24/sample.pdf', '2021-04-05 14:41:20', NULL, NULL, NULL, b'00'),
(25, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'web template', 1, 'images/Members/55/25/computer.jpg', 2, 122, 'addasf', '', NULL, '', '', '', b'1', '12', 'images/Members/55/25/sample.pdf', '2021-04-05 15:53:15', NULL, NULL, NULL, b'00'),
(26, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'email template', 1, 'images/Members/55/26/computer.jpg', 2, 111, 'sddffs', 'gtu', NULL, 'DHIHI', '222', 'ascacv', b'0', NULL, 'images/Members/55/26/sample.pdf', '2021-04-05 15:54:30', NULL, NULL, NULL, b'00'),
(27, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'web template', 1, 'images/Members/49/27/computer.jpg', 2, 111, 'afzfs', '', NULL, '', '', '', b'1', '12', 'images/Members/49/27/sample.pdf', '2021-04-05 17:24:38', NULL, NULL, NULL, b'00'),
(28, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'computer graphics', 1, 'images/Members/55/28/2.1-Homepage.jpg', 2, NULL, 'its about gesigning', NULL, NULL, NULL, NULL, NULL, b'1', '1111', 'images/Members/55/28/sample.pdf', '2021-04-07 16:56:59', NULL, NULL, NULL, b'00'),
(30, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'jay book', 1, 'images/Members/55/30/computer-science.png', 2, 0, 'afdasfsd', '', NULL, '', '', '', b'0', '0', 'images/Members/55/30/sample.pdf', '2021-04-07 20:07:43', NULL, NULL, NULL, b'00'),
(31, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'web template', 1, 'images/Members/55/31/computer-science.png', 2, 0, 'sdsffs', '', NULL, '', '', '', b'0', '0', 'images/Members/55/31/sample.pdf', '2021-04-07 20:09:32', NULL, NULL, NULL, b'00'),
(32, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'Computer Science', 1, 'images/Members/55/32/computer-science.png', 2, 222, 'wsdadfa', '', NULL, '', '', '', b'0', '0', 'images/Members/55/32/sample.pdf', '2021-04-07 20:11:02', NULL, NULL, NULL, b'00'),
(33, 74, 12, 73, NULL, '2021-04-30 16:42:37', 'my boolk', 1, 'images/Members/55/33/computer-science.png', 2, 111, 'sdesfsdf', 'dffssd', NULL, '222', '1234', 'a', b'0', '0', 'images/Members/55/33/sample.pdf', '2021-04-07 20:12:54', NULL, '2021-05-10 23:55:25', 73, b'00'),
(34, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'web template', 1, 'images/Members/55/34/computer-science.png', 2, 123, 'cfxfvdx', '', NULL, '', '', '', b'0', '0', 'images/Members/55/34/sample.pdf', '2021-04-07 20:26:17', NULL, NULL, NULL, b'00'),
(35, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'Computer Science', 1, 'images/Members/55/35/computer-science.png', 2, 1331, 'sdsafsd', '', NULL, '', '', '', b'0', '0', 'images/Members/55/35/sample.pdf', '2021-04-07 20:27:08', NULL, NULL, NULL, b'00'),
(36, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'web template', 1, 'images/Members/55/36/computer-science.png', 2, 12, 'gjghf', '', NULL, '', '', '', b'0', '0', 'images/Members/55/36/sample.pdf', '2021-04-07 20:29:12', NULL, NULL, NULL, b'00'),
(37, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'email template', 1, 'images/Members/55/37/computer-science.png', 2, 1121, 'dxzfasf', '', NULL, '', '', '', b'0', '0', 'images/Members/55/37/sample.pdf', '2021-04-07 20:30:31', NULL, NULL, NULL, b'00'),
(38, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'maths', 1, 'images/Members/55/38/computer-science.png', 2, 111, 'sadfsaf', '', NULL, '', '', '', b'0', '0', 'images/Members/55/38/sample.pdf', '2021-04-07 20:31:13', NULL, NULL, NULL, b'00'),
(39, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'web template', 1, 'images/Members/55/39/computer-science.png', 2, 0, 'asdssd', '', NULL, '', '', '', b'0', '0', 'images/Members/55/39/computer-science.png', '2021-04-07 21:26:01', NULL, NULL, NULL, b'00'),
(40, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'web template', 1, 'images/Members/55/40/computer-science.png', 2, 0, 'assdasd', '', NULL, '', '', '', b'0', '0', 'images/Members/55/40/sample.pdf', '2021-04-07 21:30:25', NULL, NULL, NULL, b'00'),
(41, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'email template', 1, 'images/Members/55/41/computer-science.png', 2, 111, 'sdsds', '', NULL, '', '', '', b'0', '0', 'images/Members/55/41/computer-science.png', '2021-04-07 21:32:13', NULL, NULL, NULL, b'00'),
(42, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'web template', 1, 'images/Members/55/42/computer-science.png', 2, 0, 'lljlhjlj', '', NULL, '', '', '', b'0', '0', 'images/Members/55/42/sample.pdf', '2021-04-07 21:37:26', NULL, NULL, NULL, b'00'),
(43, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'it\'s ok', 1, 'images/Members/49/43/computer-science.png', 2, 123, 'sgdsg', '', NULL, '', '', '', b'0', '0', 'images/Members/49/43/sample.pdf', '2021-04-08 16:15:52', NULL, NULL, NULL, b'00'),
(44, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'email template', 1, 'images/Members/49/44/computer-science.png', 2, 11, 'dsgdg', '', NULL, '', '', '', b'0', '0', 'images/Members/49/44/sample.pdf', '2021-04-08 16:55:49', NULL, NULL, NULL, b'00'),
(45, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'maths', 1, 'images/Members/49/45/Capture.PNG', 2, 300, 'its fine', 'gtu', NULL, 'comerce', '222', 'charles', b'0', '0', 'images/Members/49/45/sample (5).pdf', '2021-04-11 17:37:27', NULL, NULL, NULL, b'00'),
(46, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'Computer Science', 1, 'images/Members/49/46/banner-with-overlayl.jpg', 2, 100, 'dfsgdsg', '', NULL, '', '', '', b'0', '0', 'images/Members/49/46/sample.pdf', '2021-04-12 11:56:40', NULL, NULL, NULL, b'00'),
(47, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'web template', 1, 'images/Members/49/47/banner-with-overlayl.jpg', 2, 100, 'sdsdfdf', '', NULL, '', '', '', b'1', '100', 'images/Members/49/47/sample.pdf', '2021-04-12 19:03:49', NULL, NULL, NULL, b'00'),
(48, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'maths', 1, 'images/Members/74/48/computer-science.png', 2, 0, 'sdfsdf', '', NULL, '', '', '', b'0', '0', 'images/Members/74/48/sample.pdf', '2021-04-12 23:10:28', NULL, NULL, NULL, b'00'),
(49, 75, 13, 73, NULL, '2021-04-30 16:42:37', 'times india', 1, 'images/Members/75/49/computer-science.png', 2, 12, 'sdfdsf', '', NULL, '', '', '', b'0', '0', 'images/Members/75/49/sample.pdf', '2021-04-13 12:33:42', NULL, NULL, NULL, b'00'),
(50, 75, 13, 73, NULL, '2021-04-30 16:42:37', 'web template', 1, 'images/Members/75/50/check.png', 2, 123, 'cxxcf', '', NULL, '', '', '', b'1', '100', 'images/Members/75/50/sample.pdf', '2021-04-13 19:16:07', NULL, NULL, NULL, b'00'),
(51, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'maths', 1, 'images/Members/74/51/boo4u.png', 2, 0, 'sdfsd', '', NULL, '', '', '', b'1', '100', 'images/Members/74/51/sample.pdf', '2021-04-14 12:40:29', NULL, NULL, NULL, b'00'),
(52, 75, 13, 73, NULL, '2021-04-30 16:42:37', 'Pc design', 1, 'images/Members/75/52/', 2, 111, 'good', 'gtu', NULL, 'pc', '222', 'chuck', b'1', '222', 'images/Members/75/52/', '2021-04-16 18:44:46', NULL, '2021-04-30 11:21:25', 73, b'00'),
(53, 75, 15, 73, 'bad write', '2021-05-01 16:29:22', 'web template', 1, 'images/Members/75/53/book4u.jpg', 2, 1112, 'sfdsf', 'gtu', NULL, 'ce', '222', 'bonzeo', b'0', '0', 'images/Members/75/53/sample.pdf', '2021-04-16 18:49:16', NULL, '2021-05-15 10:43:16', 73, b'00'),
(54, 75, 15, 73, NULL, NULL, 'email template', 1, 'images/Members/75/54/book4u.jpg', 2, 112, 'sdsad', '', NULL, '', '', '', b'0', '0', 'images/Members/75/54/sample.pdf', '2021-04-16 18:50:22', NULL, NULL, NULL, b'00'),
(55, 75, 15, 73, NULL, NULL, 'email sent', 1, 'images/Members/75/55/check.png', 2, 100, 'ssdfdf', 'seas', NULL, 'computer', '222', 'bonzeo', b'0', '0', 'images/Members/75/55/sample.pdf', '2021-04-22 12:19:58', NULL, NULL, NULL, b'00'),
(56, 75, 15, 73, 'copy', '2021-04-30 16:43:51', 'email sent', 1, 'images/Members/75/56/check.png', 2, 100, 'ssdfdf', 'seas', NULL, 'computer', '222', 'bonzeo', b'0', '0', 'images/Members/75/56/sample.pdf', '2021-04-16 19:02:10', NULL, '2021-05-01 10:27:43', 73, b'00'),
(57, 75, 13, 73, 'py', '2021-05-01 16:27:46', 'Physics', 1, 'images/Members/75/57/computer-science.png', 2, 100, 'it\'s nice', 'gtu', NULL, 'computer', '222', 'bonzeo', b'0', '0', 'images/Members/75/57/sample.pdf', '2021-04-18 19:40:56', NULL, '2021-05-01 16:27:46', 73, b'00'),
(58, 75, 15, 73, 'not good', '2021-04-30 16:45:06', 'Computer Sciences', 1, 'images/Members/75/58/computer-science.png', 2, 123, 'sfsdfgd', 'gtu', NULL, '', '', '', b'0', '0', 'images/Members/75/58/sample.pdf', '2021-04-18 19:46:45', NULL, '2021-04-30 17:54:21', 73, b'00'),
(59, 75, 15, 73, 'bad conne', NULL, 'web templates', 1, 'images/Members/75/59/boo4u.png', 2, 123, 'dsfss', '', NULL, '', '', '', b'0', '0', 'images/Members/75/59/sample.pdf', '2021-05-14 22:10:25', NULL, '2021-05-01 16:29:37', 73, b'00'),
(60, 75, 13, 73, NULL, '2021-04-30 16:42:37', 'Computer eng', 1, 'images/Members/75/60/computer.jpg', 2, 123, 'cvcxb', '', NULL, '', '', '', b'0', '0', 'images/Members/75/60/sample.pdf', '2021-04-18 20:12:20', NULL, NULL, NULL, b'00'),
(61, 73, 14, 73, 'bad', NULL, 'web template', 1, 'images/Members/73/61/screencapture-localhost-Book4U-Front-forgotpass-php-2021-04-17-10_41_24.png', 2, 123, 'dvgfxdgv', '', NULL, '', '', '', b'0', '0', 'images/Members/73/61/sample.pdf', '2021-04-20 12:08:06', NULL, '2021-05-15 10:42:39', 73, b'00'),
(62, 75, 15, 73, NULL, NULL, 'Basic Computer', 1, 'images/Members/75/62/', 2, 123, 'it\'s nice', '', NULL, '', '', '', b'0', '0', 'images/Members/75/62/', '2021-04-22 18:50:43', NULL, '2021-04-22 18:59:24', 0, b'00'),
(63, 75, 12, 73, NULL, NULL, 'Basic Company', 1, 'images/Members/75/63/boo4u.png', 2, 123, 'it\'s good.', '', NULL, '', '', '', b'1', '100', 'images/Members/75/63/Notes Marketplace - Front .pdf', '2021-04-23 11:58:06', NULL, '2021-05-15 10:42:44', 73, b'00'),
(64, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'Computer Science', 1, 'images/Members/74/64/check.png', 2, 0, 'sdfsdf', '', NULL, '', '', '', b'1', '100', 'images/Members/74/64/sample.pdf', '2021-04-28 12:11:38', NULL, '2021-04-28 12:19:04', 0, b'00'),
(65, 75, 13, 73, NULL, '2021-04-30 16:42:37', 'Computer Science', 1, 'images/Members/75/65/boo4u.png', 2, 0, 'sfdsfdd', '', NULL, '', '', '', b'1', '100', 'images/Members/75/65/sample.pdf', '2021-04-28 13:21:33', NULL, '2021-04-28 13:21:44', 0, b'00'),
(66, 74, 13, 73, NULL, '2021-04-30 16:42:37', 'web templateses', 1, 'images/Members/74/66/boo4u.png', 2, 0, 'sddsd', '', NULL, '', '', '', b'1', '100', 'images/Members/74/66/sample.pdf', '2021-04-28 13:32:41', NULL, NULL, NULL, b'00'),
(68, 75, 15, 73, 'attch\r\n', '2021-05-15 10:42:24', 'Chrome', 2, 'images/Members/75/68/computer.jpg', 2, 100, 'Google Chrome is a cross-platform web browser developed by Google', 'uu', 3, 'google', '1234', 'bonzeo', b'0', '0', 'images/Members/75/68/sample.pdf', '2021-05-15 09:55:53', NULL, '2021-05-15 10:54:07', 73, b'00'),
(69, 75, 15, NULL, NULL, NULL, 'Google', 1, 'images/Members/75/69/book4u.png', 1, 50, 'Google LLC is an American multinational technology company that specializes in Internet-related services and products, which include online advertising technologies, a search engine, cloud computing, software, and hardware', 'GTU', 1, 'computer', 'JLDJ', 'charles', b'1', '100', 'images/Members/75/69/sample.pdf', '2021-05-15 10:32:00', 75, NULL, NULL, b'01'),
(70, 75, 15, 73, 'attach', '2021-05-15 10:42:28', 'Maps', 1, 'images/Members/75/70/book4u.png', 2, 100, 'Google LLC is an American multinational technology company that specializes in Internet-related services and products, which include online advertising technologies, a search engine, cloud computing, software, and hardware', 'GTU', 1, 'computer', 'JLDJ', 'charles', b'0', '50', 'images/Members/75/70/sample.pdf', '2021-05-15 10:37:55', 75, '2021-05-15 10:53:28', 73, b'01'),
(71, 75, 13, 73, NULL, '2021-05-15 11:08:33', 'Excel', 1, '../Members/75/71/computer.jpg', 1, 100, 'Google LLC is an American multinational technology company that specializes in Internet-related services and products, which include online advertising technologies, a search engine, cloud computing, software, and hardware', 'GTU', 1, 'iiii', 'JLDJ', 'charles', b'0', '0', '../Members/75/71/sample.pdf', '2021-05-15 10:57:03', 75, '2021-05-15 11:08:33', 73, b'01'),
(72, 75, 13, 73, NULL, '2021-05-15 11:08:36', 'Power p', 2, '../Members/75/72/computer.jpg', 1, 100, 'Google LLC is an American multinational technology company that specializes in Internet-related services and products, which include online advertising technologies, a search engine, cloud computing, software, and hardware', 'GTU', 1, 'ce', '222', 'bonzeo', b'1', '50', '../Members/75/72/sample.pdf', '2021-05-15 11:07:29', 75, '2021-05-15 11:08:36', 73, b'01');

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
(1, 26, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-05 15:54:30.000000', 55, NULL, NULL, b'00'),
(2, 27, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-05 17:24:39.000000', 49, NULL, NULL, b'00'),
(3, 28, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-07 16:57:00.000000', 55, NULL, NULL, b'00'),
(4, 29, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-07 20:05:02.000000', 55, NULL, NULL, b'00'),
(5, 30, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-07 20:07:43.000000', 55, NULL, NULL, b'00'),
(6, 31, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-07 20:09:33.000000', 55, NULL, NULL, b'00'),
(7, 32, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-07 20:11:02.000000', 55, NULL, NULL, b'00'),
(8, 33, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-07 20:12:54.000000', 55, NULL, NULL, b'00'),
(9, 34, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-07 20:26:17.000000', 55, NULL, NULL, b'00'),
(10, 35, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-07 20:27:09.000000', 55, NULL, NULL, b'00'),
(11, 36, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-07 20:29:13.000000', 55, NULL, NULL, b'00'),
(12, 37, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-07 20:30:31.000000', 55, NULL, NULL, b'00'),
(13, 38, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-07 20:31:14.000000', 55, NULL, NULL, b'00'),
(14, 39, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-07 21:26:02.000000', 55, NULL, NULL, b'00'),
(15, 40, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-07 21:30:25.000000', 55, NULL, NULL, b'00'),
(16, 41, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-07 21:32:13.000000', 55, NULL, NULL, b'00'),
(17, 42, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-07 21:37:26.000000', 55, NULL, NULL, b'00'),
(18, 43, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-08 16:15:53.000000', 49, NULL, NULL, b'00'),
(19, 44, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-08 16:55:49.000000', 49, NULL, NULL, b'00'),
(20, 45, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-11 17:37:27.000000', 49, NULL, NULL, b'00'),
(21, 46, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-12 11:56:40.000000', 49, NULL, NULL, b'00'),
(22, 47, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-12 19:03:50.000000', 49, NULL, NULL, b'00'),
(23, 48, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-12 23:10:28.000000', 74, NULL, NULL, b'00'),
(24, 49, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-13 12:33:42.000000', 75, NULL, NULL, b'00'),
(25, 50, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-13 19:16:07.000000', 75, NULL, NULL, b'00'),
(26, 51, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-14 12:40:30.000000', 74, NULL, NULL, b'00'),
(27, 52, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-16 18:44:47.000000', 75, NULL, NULL, b'00'),
(28, 53, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-16 18:49:16.000000', 75, NULL, NULL, b'00'),
(30, 55, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-16 19:01:20.000000', 75, NULL, NULL, b'00'),
(31, 56, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-16 19:02:10.000000', 75, NULL, NULL, b'00'),
(32, 57, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-18 19:40:56.000000', 75, NULL, NULL, b'00'),
(33, 58, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-18 19:46:45.000000', 75, NULL, NULL, b'00'),
(34, 59, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-18 19:48:36.000000', 75, NULL, NULL, b'00'),
(35, 60, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-18 20:12:20.000000', 75, NULL, NULL, b'00'),
(36, 61, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-20 12:08:06.000000', 73, NULL, NULL, b'00'),
(37, 62, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-22 18:50:44.000000', 75, NULL, NULL, b'00'),
(38, 63, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-23 11:58:06.000000', 75, NULL, NULL, b'00'),
(39, 64, 'sample.pdf', 'images/Members/74/64/sample.pdf', '2021-04-28 11:53:15.000000', 74, NULL, NULL, b'00'),
(40, 65, 'sample.pdf', 'images/Members/75/65/Attachments/sample.pdf', '2021-04-28 13:19:07.000000', 75, NULL, NULL, b'00'),
(41, 66, 'sample.pdf', 'images/Members/74/66/Attachments/sample.pdf', '2021-04-28 13:32:42.000000', 74, NULL, NULL, b'00'),
(42, 67, 'sample.pdf', 'images/Members/75/67/Attachments/sample.pdf', '2021-05-05 12:02:58.000000', 75, NULL, NULL, b'00'),
(43, 68, 'sample.pdf', 'images/Members/75/68/Attachments/sample.pdf', '2021-05-15 09:55:53.000000', 75, NULL, NULL, b'00'),
(44, 69, 'sample.pdf', 'images/Members/75/69/Attachments/sample.pdf', '2021-05-15 10:32:00.000000', 75, NULL, NULL, b'01'),
(45, 70, 'sample.pdf', 'images/Members/75/70/Attachments/sample.pdf', '2021-05-15 10:37:55.000000', 75, NULL, NULL, b'01'),
(46, 71, 'sample.pdf', '../Members/75/71/Attachments/sample.pdf', '2021-05-15 10:57:03.000000', 75, NULL, NULL, b'01'),
(47, 72, 'sample.pdf', '../Members/75/72/Attachments/sample.pdf', '2021-05-15 11:07:30.000000', 75, NULL, NULL, b'01');

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

--
-- Dumping data for table `seller_notes_reportedissues`
--

INSERT INTO `seller_notes_reportedissues` (`ID`, `NoteID`, `ReportedByID`, `AgainstDownloadsID`, `Remarks`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES
(5, 26, 49, 9, 'rest', '2021-04-12 12:09:59.000000', 49, NULL, NULL),
(14, 50, 74, 47, 'spam', '2021-04-15 09:53:11.000000', 74, NULL, NULL),
(15, 50, 74, 47, 'notg', '2021-04-15 09:53:54.000000', 74, NULL, NULL);

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

--
-- Dumping data for table `seller_notes_reviews`
--

INSERT INTO `seller_notes_reviews` (`ID`, `NoteID`, `ReviewedByID`, `AgainstDownloadsID`, `Ratings`, `Comments`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(1, 33, 73, 40, '5', 'Good', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(2, 45, 73, 39, '5', 'Good', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(3, 44, 73, 37, '5', 'Good', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(4, 44, 73, 36, '5', 'Good', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(5, 44, 73, 35, '5', 'Good', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(6, 44, 73, 34, '5', 'Good', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(7, 26, 73, 14, '5', 'Good', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(8, 26, 73, 12, '5', 'Good', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(9, 26, 73, 10, '5', 'Good', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(10, 26, 73, 9, '5', 'Good', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(11, 33, 73, 40, '5', 'nice', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(12, 45, 73, 39, '5', 'nice', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(13, 44, 73, 37, '5', 'nice', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(14, 44, 73, 36, '5', 'nice', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(15, 44, 73, 35, '5', 'nice', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(16, 44, 73, 34, '5', 'nice', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(17, 26, 73, 14, '5', 'nice', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(18, 26, 73, 12, '5', 'nice', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(19, 26, 73, 10, '5', 'nice', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(20, 26, 73, 9, '5', 'nice', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(21, 33, 73, 40, '3', 'Good', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(22, 45, 73, 39, '3', 'Good', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(23, 44, 73, 37, '3', 'Good', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(24, 44, 73, 36, '3', 'Good', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(25, 44, 73, 35, '3', 'Good', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(26, 44, 73, 34, '3', 'Good', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(27, 26, 73, 14, '3', 'Good', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(28, 26, 73, 12, '3', 'Good', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(29, 26, 73, 10, '3', 'Good', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(30, 26, 73, 9, '3', 'Good', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(31, 33, 73, 40, '5', 'nice', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(32, 45, 73, 39, '5', 'nice', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(33, 44, 73, 37, '5', 'nice', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(34, 44, 73, 36, '5', 'nice', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(35, 44, 73, 35, '5', 'nice', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(36, 44, 73, 34, '5', 'nice', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(37, 26, 73, 14, '5', 'nice', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(38, 26, 73, 12, '5', 'nice', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(39, 26, 73, 10, '5', 'nice', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(40, 26, 73, 9, '5', 'nice', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(41, 26, 73, 9, '5', 'Yes', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(42, 26, 73, 9, '5', 'Done', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(43, 33, 73, 9, '5', 'good', '0000-00-00 00:00:00.000000', 49, NULL, NULL, b'00'),
(44, 33, 73, 9, '5', 'All Good', '2021-04-12 10:46:54.000000', 49, NULL, NULL, b'00'),
(45, 45, 73, 9, '5', 'Very Nice Book', '2021-04-12 10:47:08.000000', 49, NULL, NULL, b'00'),
(48, 50, 74, 47, '4', 'good\r\n', '2021-04-15 10:20:13.000000', 74, '2021-04-15 10:23:50.000000', 74, b'00'),
(49, 48, 74, 47, '1', 'yes', '2021-04-15 10:22:41.000000', 74, '2021-04-15 10:23:27.000000', 74, b'00'),
(50, 48, 75, 48, '5', 'good', '2021-04-19 14:49:15.000000', 75, NULL, NULL, b'00');

-- --------------------------------------------------------

--
-- Table structure for table `system_configurations`
--

CREATE TABLE `system_configurations` (
  `ID` int(11) NOT NULL,
  `Ke` varchar(100) NOT NULL,
  `Val` varchar(255) NOT NULL,
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime(6) DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_configurations`
--

INSERT INTO `system_configurations` (`ID`, `Ke`, `Val`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(17, 'support_email', 'gosaijay323@gmail.com', '2021-05-12 23:47:12', 73, NULL, NULL, b'1'),
(18, 'phone_no', '9723312541', '2021-05-12 23:47:12', 73, NULL, NULL, b'1'),
(19, 'notify_email', 'gosaijay323@gmail.com', '2021-05-12 23:47:12', 73, NULL, NULL, b'1'),
(20, 'facebook_url', 'https://www.facebook.com', '2021-05-12 23:47:12', 73, NULL, NULL, b'1'),
(21, 'twitter_url', 'https://www.twitter.com', '2021-05-12 23:47:12', 73, NULL, NULL, b'1'),
(22, 'linkedin_url', 'https://www.linkedin.com', '2021-05-12 23:47:12', 73, NULL, NULL, b'1'),
(23, 'note_picture', 'Members/Default/computer.jpg', '2021-05-12 23:47:12', 73, NULL, NULL, b'1'),
(24, 'profile_picture', 'Members/Default/customer-3.png', '2021-05-12 23:47:12', 73, NULL, NULL, b'1');

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
  `CreatedDate` datetime DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `ModifiedDate` datetime DEFAULT NULL,
  `ModifiedBy` int(11) DEFAULT NULL,
  `IsActive` bit(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `RoleID`, `FirstName`, `LastName`, `EmailID`, `Password`, `IsEmailVerified`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`, `IsActive`) VALUES
(49, 3, 'Disha', 'Patani', 'disha@gmail.com', '$2y$10$iusesomecrazystrings2u2h/Lsb7dyFKrYmhKP8SEmcpVo6BQhDK', b'1', '2021-04-09 11:33:30', 49, '2021-05-07 23:07:03', 73, b'00'),
(55, 3, 'piya', 'patel', 'piya@gmail.com', '$2y$10$iusesomecrazystrings2u2h/Lsb7dyFKrYmhKP8SEmcpVo6BQhDK', b'1', '2021-05-01 15:50:48', 55, NULL, NULL, b'01'),
(56, 2, 'jimmy', 'saina', 'jimmy@gmail.com', '$2y$10$iusesomecrazystrings2u2h/Lsb7dyFKrYmhKP8SEmcpVo6BQhDK', b'1', '2021-04-09 11:33:30', 56, '2021-05-13 23:18:27', 73, b'01'),
(73, 1, 'Gosai', 'Jay', 'gosaijay323@gmail.com', '$2y$10$iusesomecrazystrings2u9MwQ3PVitqjck9XStpCLkTp0FZK2Gc6', b'1', '2021-04-20 17:45:25', 76, NULL, NULL, b'01'),
(74, 3, 'Jay', 'Panchnath', 'jaypanchnathenterprise@gmail.com', '$2y$10$iusesomecrazystrings2u2h/Lsb7dyFKrYmhKP8SEmcpVo6BQhDK', b'1', '2021-04-12 21:41:55', 74, NULL, NULL, b'01'),
(75, 3, 'Jaygiri', 'Gosai', 'jaygosai2000@gmail.com', '$2y$10$iusesomecrazystrings2u2h/Lsb7dyFKrYmhKP8SEmcpVo6BQhDK', b'1', '2021-04-13 11:28:52', 75, NULL, NULL, b'01'),
(77, 2, 'User', 'A', 'usera@gmail.com', '$2y$10$iusesomecrazystrings2u2h/Lsb7dyFKrYmhKP8SEmcpVo6BQhDK', b'1', '2021-05-13 18:32:49', 73, '2021-05-13 23:16:57', 73, b'01'),
(88, 2, 'User', 'B', 'userb@gmail.com', '$2y$10$iusesomecrazystrings2u2h/Lsb7dyFKrYmhKP8SEmcpVo6BQhDK', b'1', '2021-05-13 22:29:58', 73, '2021-05-13 23:18:36', 73, b'00'),
(89, 2, 'User', 'C', 'userc@gmail.com', '$2y$10$iusesomecrazystrings2u2h/Lsb7dyFKrYmhKP8SEmcpVo6BQhDK', b'1', '2021-05-13 23:19:00', 73, '2021-05-13 23:21:15', 73, b'01'),
(90, 3, 'jay', 'g', 'jayg4349@gmail.com', '$2y$10$iusesomecrazystrings2u2h/Lsb7dyFKrYmhKP8SEmcpVo6BQhDK', b'1', '2021-05-15 11:38:16', 90, NULL, NULL, b'01');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `DOB` date DEFAULT NULL,
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

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`ID`, `UserID`, `DOB`, `Gender`, `SecondaryEmailAddress`, `Phonenumber_CountryCode`, `Phonenumber`, `ProfilePicture`, `AddressLine1`, `AddressLine2`, `City`, `State`, `ZipCode`, `Country`, `University`, `College`, `CreatedDate`, `CreatedBy`, `ModifiedDate`, `ModifiedBy`) VALUES
(13, 49, '2021-04-09', 5, NULL, '1', '9723312541', 'Members/49/B612_20180605_160134_509.jpg', 'To.Chitrawad Ta.Jam kandorna Di.Rajkot', 'To.Chitrawad Ta.Jam kandorna Di.Rajkot', 'Chitrawad', 'Gujarat', '360452', 'India', 'GTU', 'LDCE', '2021-04-09 18:59:46.000000', 49, '2021-05-13 23:09:39.000000', 73),
(15, 75, '2000-04-26', 5, NULL, '1', '9723312541', 'Members/75/customer-1.png', 'To.Chitrawad Ta.Jam kandorna Di.Rajkot', 'To.Chitrawad Ta.Jam kandorna Di.Rajkot', 'Chitrawad', 'Gujarat', '360452', 'India', 'GTU', 'LDCE', '2021-04-13 16:46:48.000000', 75, '2021-05-13 23:09:39.000000', 73),
(18, 73, NULL, 5, 'jaygosai@gmail.com', '91', '9723312541', 'Members/73/customer-1.png', '', '', '', '', '', '', NULL, NULL, '2021-04-23 10:24:29.000000', 73, '2021-05-14 23:30:10.000000', 73),
(19, 74, '2020-12-01', 5, NULL, '91', '9723312541', 'Members/74/B612_20180607_094220_698.jpg', 'To.Chitrawad Ta.Jam kandorna Di.Rajkot', 'To.Chitrawad Ta.Jam kandorna Di.Rajkot', 'Chitrawad', 'Gujarat', '360452', 'India', 'GTU', 'LDCE', '2021-04-28 11:52:19.000000', 74, '2021-05-15 11:24:10.000000', 74),
(30, 88, NULL, 5, NULL, '1', '9723312541', NULL, '', '', '', '', '', '', NULL, NULL, '2021-05-13 22:29:58.000000', 73, '2021-05-13 23:18:08.000000', 73),
(32, 77, NULL, 5, '', '91', '9723312541', 'Members/77/customer-3.png', '', '', '', '', '', '', NULL, NULL, '2021-05-13 23:16:57.000000', 73, '2021-05-15 11:43:25.000000', 77),
(33, 56, NULL, 5, NULL, '44', '9724112541', NULL, '', '', '', '', '', '', NULL, NULL, '2021-05-13 23:18:27.000000', 73, NULL, NULL),
(34, 89, NULL, 5, NULL, '91', '9723312541', NULL, '', '', '', '', '', '', NULL, NULL, '2021-05-13 23:19:00.000000', 73, '2021-05-13 23:21:15.000000', 73);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `downloads`
--
ALTER TABLE `downloads`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `note_categories`
--
ALTER TABLE `note_categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `note_types`
--
ALTER TABLE `note_types`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reference_data`
--
ALTER TABLE `reference_data`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `seller_notes`
--
ALTER TABLE `seller_notes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `seller_notes_attachment`
--
ALTER TABLE `seller_notes_attachment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `seller_notes_reportedissues`
--
ALTER TABLE `seller_notes_reportedissues`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `seller_notes_reviews`
--
ALTER TABLE `seller_notes_reviews`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `system_configurations`
--
ALTER TABLE `system_configurations`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
