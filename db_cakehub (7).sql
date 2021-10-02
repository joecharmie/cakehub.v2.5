-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2021 at 02:33 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cakehub`
--

-- --------------------------------------------------------

--
-- Table structure for table `actcategory`
--

CREATE TABLE `actcategory` (
  `actCatID` int(11) NOT NULL,
  `actCatDesc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `actcategory`
--

INSERT INTO `actcategory` (`actCatID`, `actCatDesc`) VALUES
(1, 'User Added\r\n'),
(2, 'User Updated\r\n'),
(3, 'User Hidden\r\n'),
(4, 'Product Added'),
(5, 'Product Updated'),
(6, 'Product Hidden'),
(7, 'Sales Added Record'),
(8, 'Transaction Record Updated'),
(9, 'Product Quantity Synced\r\n'),
(10, 'Archived Records\r\n'),
(11, 'Archived Record : User Added'),
(12, 'Archived Record : User Updated'),
(13, 'Archived Record : User Hidden'),
(14, 'Archived Record : Product Added'),
(15, 'Archived Record : Product Updated'),
(16, 'Archived Record : Product Hidden'),
(17, 'Archived Record : Sales Added Record'),
(18, 'Archived Record : Transaction Record Updated'),
(19, 'Archived Record : Product Quantity Synced');

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `actID` int(11) NOT NULL,
  `actDesc` varchar(200) NOT NULL,
  `actDate` datetime NOT NULL,
  `actUserID` varchar(30) NOT NULL,
  `actCategoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`actID`, `actDesc`, `actDate`, `actUserID`, `actCategoryID`) VALUES
(2, 'A user named Cherry Solon was added by Joecharmie HM-160911-123021', '2021-09-17 05:12:10', 'HM-160911-123021', 11),
(3, 'jisolon archived a record where activity reference number is 2 and timestamp is September 17, 2021 5:12 AM', '2021-09-17 05:17:03', 'HM-160911-123021', 10),
(4, 'A product named Azure Sky was added by CherrySL-160910-101221', '2021-09-18 01:24:26', 'SL-160910-101221', 4),
(5, 'A product named Azure Sky was added by CherrySL-160910-101221', '2021-09-18 01:32:28', 'SL-160910-101221', 4),
(6, 'A product named Azure Sky was added by CherrySL-160910-101221', '2021-09-18 01:36:01', 'SL-160910-101221', 4),
(7, 'A product named Classic Rose was added by Cherry SL-160910-101221', '2021-09-18 02:27:31', 'SL-160910-101221', 4),
(8, 'A product named Elegant Emerald  was added by Baker BK-120941-064421', '2021-09-18 03:36:33', 'BK-120941-064421', 4),
(9, 'The product named Cheezy Dream was updated by HeadAdmin', '2021-09-18 03:50:37', 'HM-120907-064221', 5),
(10, 'The product named Cheezy Dream was updated by HeadAdmin', '2021-09-18 03:51:08', 'HM-120907-064221', 5),
(11, 'The product named Azure Skyy with product id: 4 was updated by HeadAdmin ', '2021-09-18 04:05:58', 'HM-120907-064221', 5),
(12, 'The product named Azure Sky with product id: 4 was updated by HeadAdmin HM-120907-064221', '2021-09-18 04:06:46', 'HM-120907-064221', 5),
(13, 'The product named Cheesy Dream with product id: 5 was updated by HeadAdmin HM-120907-064221', '2021-09-18 04:14:21', 'HM-120907-064221', 5),
(14, 'The product named Cheezy Dream with product id: 5 was updated by HeadAdmin HM-120907-064221', '2021-09-18 04:15:31', 'HM-120907-064221', 5),
(15, 'The product named Cheesy Dream with product id: 5 was updated by HeadAdmin HM-120907-064221', '2021-09-18 05:29:32', 'HM-120907-064221', 5),
(16, 'The product named Cheezy Dream with product id: 5 was updated by HeadAdmin HM-120907-064221', '2021-09-18 05:36:51', 'HM-120907-064221', 5),
(17, 'The product named Azure Sky was deleted by HeadAdmin', '2021-09-18 06:08:14', 'HM-120907-064221', 6),
(18, 'The product named Azure Sky with prod id: 4 was deleted by HeadAdmin HM-120907-064221', '2021-09-18 06:21:14', 'HM-120907-064221', 6),
(19, 'A product named Strawberry Castle was added by Baker BK-120941-064421', '2021-09-18 22:48:13', 'BK-120941-064421', 4),
(20, 'A user named Gabriel antonio Cruz was added by Head Admin HM-120907-064221', '2021-09-19 00:14:23', 'HM-120907-064221', 1),
(21, 'A product named Spooky Delight was added by Baker BK-120941-064421', '2021-09-19 02:45:54', 'BK-120941-064421', 4),
(22, 'A user named Maria Patricia Anne Agorilla was added by HeadAdmin HM-120907-064221', '2021-09-20 22:51:50', 'HM-120907-064221', 1),
(23, 'A user named Lian Alucema was added by mpaagorilla HM-200949-035121', '2021-09-20 22:53:07', 'HM-200949-035121', 1),
(24, 'A user named Lian Alucema was updated by mpaagorilla HM-200949-035121', '2021-09-20 22:55:50', 'HM-200949-035121', 2),
(25, 'A user named Lian Alucema was updated by mpaagorilla HM-200949-035121', '2021-09-20 22:55:58', 'HM-200949-035121', 2),
(26, 'The password of a user named Lian Alucema was reset by mpaagorilla HM-200949-035121', '2021-09-20 22:56:09', 'HM-200949-035121', 2),
(27, 'A user named Lian Alucema was updated by mpaagorilla HM-200949-035121', '2021-09-20 22:58:54', 'HM-200949-035121', 2),
(28, 'A user named Lian Alucema was updated by mpaagorilla HM-200949-035121', '2021-09-20 22:59:04', 'HM-200949-035121', 2),
(29, 'The password of a user named Lian Alucema was reset by mpaagorilla HM-200949-035121', '2021-09-20 23:01:48', 'HM-200949-035121', 2),
(30, 'The password of a user named Lian Alucema was reset by mpaagorilla HM-200949-035121', '2021-09-20 23:02:12', 'HM-200949-035121', 2),
(31, 'A user named Lian Alucema was deactivated by mpaagorilla HM-200949-035121', '2021-09-20 23:02:42', 'HM-200949-035121', 3),
(32, 'The password of a user named Lian Alucema was reset by mpaagorilla HM-200949-035121', '2021-09-20 23:03:54', 'HM-200949-035121', 2),
(33, 'The password of a user named Maria Patricia Anne Agorilla was reset by mpaagorilla HM-200949-035121', '2021-09-20 23:04:19', 'HM-200949-035121', 2),
(34, 'The password of a user named Lian Alucema was reset by mpaagorilla HM-200949-035121', '2021-09-20 23:06:34', 'HM-200949-035121', 2),
(35, 'The password of a user named Maria Patricia Anne Agorilla was reset by jisolon HM-160911-123021', '2021-09-20 23:10:27', 'HM-160911-123021', 2),
(36, 'The password of a user named Lian Alucema was reset by jisolon HM-160911-123021', '2021-09-20 23:10:43', 'HM-160911-123021', 2),
(37, 'The password of a user named Admin Sample was reset by jisolon HM-160911-123021', '2021-09-20 23:11:14', 'HM-160911-123021', 2),
(38, 'The product named Azure Skyy with product id: 4 was updated by jisolon HM-160911-123021', '2021-09-20 23:13:07', 'HM-160911-123021', 5),
(39, 'The product named Azure Sky with product id: 4 was updated by jisolon HM-160911-123021', '2021-09-20 23:13:47', 'HM-160911-123021', 5),
(40, 'A product named Ocean Man was added by Baker BK-120941-064421', '2021-09-21 04:57:21', 'BK-120941-064421', 4),
(41, 'The product named Ocean Man with product id: 10 was updated by SampleBaker BK-120941-064421', '2021-09-21 04:57:34', 'BK-120941-064421', 5),
(42, 'The product named Ocean Man with product id: 10 was updated by SampleBaker BK-120941-064421', '2021-09-21 04:57:54', 'BK-120941-064421', 5),
(43, 'The product named  with product id: 10 was updated by SampleBaker BK-120941-064421', '2021-09-21 04:58:26', 'BK-120941-064421', 5),
(44, 'The product named Ocean Man with product id: 10 was updated by SampleBaker BK-120941-064421', '2021-09-21 05:20:59', 'BK-120941-064421', 5),
(45, 'The product named Ocean Man with product id: 10 was updated by SampleBaker BK-120941-064421', '2021-09-21 05:21:09', 'BK-120941-064421', 5),
(46, 'A user named Baker Sample was updated by SampleBaker', '2021-09-22 02:10:45', 'BK-120941-064421', 2),
(47, 'A user named Baker Sample was updated by SampleBaker', '2021-09-22 02:11:06', 'BK-120941-064421', 2),
(48, 'A user named Baker Sample was updated by SampleBaker', '2021-09-22 02:13:49', 'BK-120941-064421', 2),
(49, 'A user named Baker Sample was updated by SampleBaker', '2021-09-22 02:28:03', 'BK-120941-064421', 2),
(50, 'A user named Baker Sample was updated by SampleBakerz', '2021-09-22 02:29:14', 'BK-120941-064421', 2),
(51, 'A user named Baker Sample was updated by SampleBakerz', '2021-09-22 02:29:26', 'BK-120941-064421', 2),
(52, 'A user named Baker Sample was updated by SampleBakerz', '2021-09-22 02:35:37', 'BK-120941-064421', 2),
(53, 'A user named Baker Sample was updated by SampleBakerz', '2021-09-22 02:36:30', 'BK-120941-064421', 2),
(54, 'A user named Baker Sample was updated by SampleBakerz', '2021-09-22 02:38:48', 'BK-120941-064421', 2),
(55, 'A user named Baker Sample was updated by SampleBakerz', '2021-09-22 02:39:34', 'BK-120941-064421', 2),
(56, 'A user named Baker Sample was updated by SampleBakerz', '2021-09-22 02:43:41', 'BK-120941-064421', 2),
(57, 'A user named Baker Sample was updated by SampleBakerz', '2021-09-22 02:43:47', 'BK-120941-064421', 2),
(58, 'A user named Baker Sample was updated by SampleBakerz', '2021-09-22 02:43:47', 'BK-120941-064421', 2),
(59, 'A user named Baker Sample was updated by SampleBakerz', '2021-09-22 03:00:16', 'BK-120941-064421', 2),
(60, 'A user named Baker Sample was updated by SampleBakerz', '2021-09-22 03:00:24', 'BK-120941-064421', 2),
(61, 'A user named   was updated by SampleBakerz', '2021-09-22 03:00:34', 'BK-120941-064421', 2),
(62, 'A user named   was updated by SampleBakerz', '2021-09-22 03:05:31', 'BK-120941-064421', 2),
(63, 'A user named Baker Sample was updated by SampleBakerz', '2021-09-22 03:08:09', 'BK-120941-064421', 2),
(64, 'A user named   was updated by SampleBakerz', '2021-09-22 03:08:19', 'BK-120941-064421', 2),
(65, 'A user named Baker Sample was updated by SampleBakerz', '2021-09-22 03:10:58', 'BK-120941-064421', 2),
(66, 'A user named   was updated by SampleBakerz', '2021-09-22 03:11:07', 'BK-120941-064421', 2),
(67, 'A user named   was updated by SampleBakerz', '2021-09-22 03:23:06', 'BK-120941-064421', 2),
(68, 'A user named CHERRY SOLON was updated by SampleBakerz', '2021-09-22 03:23:19', 'BK-120941-064421', 2),
(69, 'A user named   was updated by SampleBakerz', '2021-09-22 03:23:27', 'BK-120941-064421', 2),
(70, 'A user named CHERRY SOLON was updated by SampleBakerz', '2021-09-22 03:23:56', 'BK-120941-064421', 2),
(71, 'A user named   was updated by SampleBakerz', '2021-09-22 03:28:39', 'BK-120941-064421', 2),
(72, 'A user named CHERRY SOLON was updated by SampleBakerz', '2021-09-22 03:28:43', 'BK-120941-064421', 2),
(73, 'A user named CHERRY SOLON was updated by SampleBakerz', '2021-09-22 03:38:38', 'BK-120941-064421', 2),
(74, 'A user named   was updated by SampleBakerz', '2021-09-22 03:38:48', 'BK-120941-064421', 2),
(75, 'A user named   was updated by SampleBaker', '2021-09-22 03:45:51', 'BK-120941-064421', 2),
(76, 'A user named   was updated by SampleBaker', '2021-09-22 03:46:57', 'BK-120941-064421', 2),
(77, 'A user named CHERRY SOLON was updated by SampleBaker', '2021-09-22 03:52:55', 'BK-120941-064421', 2),
(78, 'A user named   was updated by SampleBaker', '2021-09-22 03:53:12', 'BK-120941-064421', 2),
(79, 'A user named   was updated by SampleBaker', '2021-09-22 04:20:33', 'BK-120941-064421', 2),
(80, 'A user named Baker Sample was updated by HeadAdmin HM-120907-064221', '2021-09-22 04:29:28', 'HM-120907-064221', 2),
(81, 'A user named Cherry Solon was updated by HeadAdmin HM-120907-064221', '2021-09-22 04:30:28', 'HM-120907-064221', 2),
(82, 'A user named Baker Sample was updated by HeadAdmin HM-120907-064221', '2021-09-22 04:30:48', 'HM-120907-064221', 2),
(83, 'A user named Baker Sample was updated by SampleBaker', '2021-09-22 12:39:13', 'BK-120941-064421', 2),
(84, 'A user named Baker Sample was updated by SampleBaker', '2021-09-22 12:39:54', 'BK-120941-064421', 2),
(85, 'A user named Baker Sample was updated by SampleBaker', '2021-09-22 12:40:04', 'BK-120941-064421', 2),
(86, 'A user named Baker Sample was updated by SampleBaker', '2021-09-22 12:45:54', 'BK-120941-064421', 2),
(87, 'A user named   was updated by SampleBaker', '2021-09-22 12:46:03', 'BK-120941-064421', 2),
(88, 'A user named Baker Sample was updated by SampleBaker', '2021-09-22 12:47:24', 'BK-120941-064421', 2),
(89, 'A user named   was updated by SampleBaker', '2021-09-22 12:48:24', 'BK-120941-064421', 2),
(90, 'A user named Baker Sample was updated by SampleBaker', '2021-09-22 13:19:57', 'BK-120941-064421', 2),
(91, 'A user named Baker Sample was updated by SampleBaker', '2021-09-22 13:20:04', 'BK-120941-064421', 2),
(92, 'A user named   was updated by SampleBaker', '2021-09-22 13:20:20', 'BK-120941-064421', 2),
(93, 'A user named Baker Sample was updated by SampleBaker', '2021-09-22 13:41:13', 'BK-120941-064421', 2),
(94, 'A user named Baker Sample was updated by SampleBaker', '2021-09-22 13:42:34', 'BK-120941-064421', 2),
(95, 'A user named Baker Sample was updated by SampleBaker', '2021-09-22 13:43:43', 'BK-120941-064421', 2),
(96, 'A user named   was updated by SampleBaker', '2021-09-22 13:44:48', 'BK-120941-064421', 2),
(97, 'The password of a user named Baker Sample was reset by HeadAdmin HM-120907-064221', '2021-09-22 14:14:01', 'HM-120907-064221', 2),
(98, 'A user named   was updated by SampleBaker', '2021-09-22 14:16:51', 'BK-120941-064421', 2),
(99, 'A user named Baker Sample was updated by SampleBaker', '2021-09-22 14:17:29', 'BK-120941-064421', 2),
(100, 'The product named Ocean Man with product id: 10 was updated by SampleBaker BK-120941-064421', '2021-09-22 14:32:33', 'BK-120941-064421', 5),
(101, 'A user named Delete User was added by HeadAdmin HM-120907-064221', '2021-09-22 14:35:01', 'HM-120907-064221', 1),
(102, 'A user named Delete User was deactivated by HeadAdmin HM-120907-064221', '2021-09-22 14:35:30', 'HM-120907-064221', 3),
(103, 'A user named Delete User was updated by HeadAdmin HM-120907-064221', '2021-09-22 14:40:31', 'HM-120907-064221', 2),
(104, 'A user named Delete User was updated by HeadAdmin HM-120907-064221', '2021-09-22 14:42:19', 'HM-120907-064221', 2),
(105, 'A user named Delete User was updated by HeadAdmin HM-120907-064221', '2021-09-22 14:42:44', 'HM-120907-064221', 2),
(106, 'A user named Delete User was updated by HeadAdmin HM-120907-064221', '2021-09-22 14:43:06', 'HM-120907-064221', 2),
(107, 'A user named Delete This was updated by HeadAdmin HM-120907-064221', '2021-09-22 14:43:16', 'HM-120907-064221', 2),
(108, 'The product named Ocean Man with product id: 10 was updated by HeadAdmin HM-120907-064221', '2021-09-22 14:43:34', 'HM-120907-064221', 5),
(109, 'The product named Ocean Man with product id: 10 was updated by HeadAdmin HM-120907-064221', '2021-09-22 14:43:46', 'HM-120907-064221', 5),
(110, 'The password of a user named Customer Sample was reset by HeadAdmin HM-120907-064221', '2021-09-22 14:58:43', 'HM-120907-064221', 2),
(111, 'A user named Add User was added by HeadAdmin HM-120907-064221', '2021-09-22 15:31:16', 'HM-120907-064221', 1),
(112, 'A user named Delete User was updated by HeadAdmin HM-120907-064221', '2021-09-22 15:32:30', 'HM-120907-064221', 2),
(113, 'The password of a user named Delete User was reset by HeadAdmin HM-120907-064221', '2021-09-22 15:32:45', 'HM-120907-064221', 2),
(114, 'The password of a user named Delete User was reset by HeadAdmin HM-120907-064221', '2021-09-22 15:32:46', 'HM-120907-064221', 2),
(115, 'A user named Delete User was deactivated by HeadAdmin HM-120907-064221', '2021-09-22 15:33:02', 'HM-120907-064221', 3),
(116, 'A product named Flower Frost was added by Baker BK-120941-064421', '2021-09-22 15:39:26', 'BK-120941-064421', 4),
(117, 'The product named Flower Frost with product id: 12 was updated by SampleBaker BK-120941-064421', '2021-09-22 15:40:06', 'BK-120941-064421', 5),
(118, 'The product named Flower Frost with product id: 12 was updated by SampleBaker BK-120941-064421', '2021-09-22 15:40:25', 'BK-120941-064421', 5),
(119, 'The product named Pink Flower Frost with product id: 12 was updated by SampleBaker BK-120941-064421', '2021-09-22 15:41:13', 'BK-120941-064421', 5),
(120, 'The product named Pink Flower Frost with prod id: 12 was deleted by SampleBaker BK-120941-064421', '2021-09-22 15:41:52', 'BK-120941-064421', 6),
(121, 'The product named Ocean Man with product id: 10 was updated by SampleBaker BK-120941-064421', '2021-09-22 15:49:20', 'BK-120941-064421', 5),
(122, 'The product named Flower Frost with product id: 11 was updated by SampleBaker BK-120941-064421', '2021-09-22 15:49:29', 'BK-120941-064421', 5),
(123, 'A user named Add Userrr was added by HeadAdmin HM-120907-064221', '2021-09-22 16:28:41', 'HM-120907-064221', 1),
(124, 'A user named Add Userr was updated by HeadAdmin HM-120907-064221', '2021-09-22 16:29:23', 'HM-120907-064221', 2),
(125, 'The password of a user named Add Userr was reset by HeadAdmin HM-120907-064221', '2021-09-22 16:30:50', 'HM-120907-064221', 2),
(126, 'A user named Add Userr was deactivated by HeadAdmin HM-120907-064221', '2021-09-22 16:31:06', 'HM-120907-064221', 3),
(127, 'A product named Sandy Beach was added by Baker BK-120941-064421', '2021-09-22 16:34:20', 'BK-120941-064421', 4),
(128, 'The product named Sandy Beach with prod id: 13 was deleted by HeadAdmin HM-120907-064221', '2021-09-22 16:35:15', 'HM-120907-064221', 6),
(129, 'The password of a user named   was reset by jisolon HM-160911-123021', '2021-09-24 07:42:42', 'HM-160911-123021', 2),
(130, 'The password of a user named   was reset by jisolon HM-160911-123021', '2021-09-24 07:42:42', 'HM-160911-123021', 2),
(131, 'The password of a user named Customer Sample was reset by jisolon HM-160911-123021', '2021-09-24 07:45:33', 'HM-160911-123021', 2),
(132, 'A user named Delete This was updated by jisolon HM-160911-123021', '2021-09-25 22:48:12', 'HM-160911-123021', 2),
(133, 'A user named Delete This was updated by jisolon HM-160911-123021', '2021-09-25 22:48:24', 'HM-160911-123021', 2),
(134, 'A user named Delete This was updated by jisolon HM-160911-123021', '2021-09-25 22:50:32', 'HM-160911-123021', 2),
(135, 'A user named Jane Doe was added by jisolon HM-160911-123021', '2021-09-26 00:31:22', 'HM-160911-123021', 1),
(136, 'A user named Jane Doe was updated by jisolon HM-160911-123021', '2021-09-26 00:32:03', 'HM-160911-123021', 2),
(137, 'The password of a user named Jane Doe was reset by jisolon HM-160911-123021', '2021-09-26 00:32:26', 'HM-160911-123021', 3),
(138, 'A user named Jane Doe was deactivated by jisolon HM-160911-123021', '2021-09-26 01:32:38', 'HM-160911-123021', 13),
(139, 'A user named Delete This was deactivated by jisolon HM-160911-123021', '2021-09-26 00:34:06', 'HM-160911-123021', 3),
(140, 'jisolon archived a record where activity reference number is 138 and timestamp is September 26, 2021 1:32 AM', '2021-09-26 00:34:23', 'HM-160911-123021', 10),
(141, 'jisolon archived a record where activity reference number is 138 and timestamp is September 26, 2021 1:32 AM', '2021-09-26 00:34:23', 'HM-160911-123021', 10),
(142, 'A product named Flower Frost was added by Jane SL-250938-043621', '2021-09-26 00:36:48', 'SL-250938-043621', 4),
(143, 'A product named Flower Frost was added by Jane SL-250938-043621', '2021-09-26 00:36:48', 'SL-250938-043621', 4),
(144, 'A product named Sandy Beach was added by Jane SL-250938-043621', '2021-09-26 00:37:46', 'SL-250938-043621', 4),
(145, 'The product named Flower Frost with prod id: 15 was deleted by janedoe SL-250938-043621', '2021-09-26 00:39:01', 'SL-250938-043621', 6),
(146, 'The product named Flower Frost with product id: 14 was updated by janedoe SL-250938-043621', '2021-09-26 00:41:18', 'SL-250938-043621', 5),
(147, 'The product named Flower Frost with product id: 14 was updated by janedoe SL-250938-043621', '2021-09-26 00:44:32', 'SL-250938-043621', 5),
(148, 'A user named Baker Sample was updated by jisolon HM-160911-123021', '2021-09-26 02:26:48', 'HM-160911-123021', 2),
(149, 'A user named Baker Sample was updated by jisolon HM-160911-123021', '2021-09-26 02:27:01', 'HM-160911-123021', 2),
(150, 'A user named Lian Alucema was updated by jisolon HM-160911-123021', '2021-09-26 04:44:28', 'HM-160911-123021', 2),
(151, 'The password of a user named Lian Alucema was reset by jisolon HM-160911-123021', '2021-09-26 04:46:53', 'HM-160911-123021', 3),
(152, 'A user named Lian Alucema was updated by lgalucema', '2021-09-26 04:47:50', 'AD-200907-035321', 2),
(153, 'A user named Lian Alucema was updated by lgalucema', '2021-09-26 04:48:49', 'AD-200907-035321', 2),
(154, 'A user named Lian Alucema was updated by lgalucema', '2021-09-26 04:48:59', 'AD-200907-035321', 2),
(155, 'A user named Jane Doe was updated by janedoe', '2021-09-26 04:52:15', 'SL-250938-043621', 2),
(156, 'A user named Jane Doe was updated by janedoe', '2021-09-26 04:53:31', 'SL-250938-043621', 2),
(157, 'A user named  Perez was updated by ewanko', '2021-09-26 05:11:49', 'SL-250928-073121', 2),
(158, 'A user named Juan Perez was updated by ewanko', '2021-09-26 05:12:00', 'SL-250928-073121', 2),
(159, 'A user named Juan Perez was updated by ewanko', '2021-09-26 05:12:29', 'SL-250928-073121', 2),
(160, 'A user named Juan Perez was updated by ewanko', '2021-09-26 05:12:29', 'SL-250928-073121', 2),
(161, 'A user named Juan Perez was updated by ewanko', '2021-09-26 05:12:43', 'SL-250928-073121', 2),
(162, 'The password of a user named Customer Sample was reset by jisolon HM-160911-123021', '2021-09-26 05:18:03', 'HM-160911-123021', 3),
(163, 'A user named Joecharmie Solon was updated by jisolon', '2021-09-29 00:13:39', 'HM-160911-123021', 2),
(164, 'A user named Joecharmie Solon was updated by jisolon', '2021-09-29 00:22:09', 'HM-160911-123021', 2),
(165, 'A user named Joecharmie Solon was updated by HeadAdmin HM-120907-064221', '2021-09-29 03:01:30', 'HM-120907-064221', 2),
(166, 'A user named Baker Sample was updated by SampleBaker', '2021-09-29 03:04:37', 'BK-120941-064421', 2),
(167, 'A user named Gabriel Antonio Cruz was updated by HeadAdmin HM-120907-064221', '2021-09-30 20:58:00', 'HM-120907-064221', 2),
(168, 'A user named John Doe was updated by HeadAdmin HM-120907-064221', '2021-09-30 20:59:58', 'HM-120907-064221', 2),
(169, 'A user named Head Admin Sample was updated by HeadAdmin', '2021-09-30 21:12:17', 'HM-120907-064221', 2),
(170, 'A user named Head Admin Sample was updated by HeadAdmin', '2021-09-30 21:12:43', 'HM-120907-064221', 2),
(171, 'A user named Gabriel Antonio Cruz was deactivated by HeadAdmin HM-120907-064221', '2021-09-30 21:14:25', 'HM-120907-064221', 3),
(172, 'A user named Another User was deactivated by HeadAdmin HM-120907-064221', '2021-09-30 21:14:35', 'HM-120907-064221', 3),
(173, 'A user named Maria Patricia Anne Agorilla was updated by HeadAdmin HM-120907-064221', '2021-09-30 21:15:11', 'HM-120907-064221', 2),
(174, 'The inventories were synced by HeadAdmin', '2021-09-30 21:23:13', 'HM-120907-064221', 10),
(175, 'The password of a user named Baker Sample was reset by jisolon HM-160911-123021', '2021-10-02 01:06:14', 'HM-160911-123021', 3),
(176, 'A user named Baker Sample was updated by SampleBaker', '2021-10-02 01:12:18', 'BK-120941-064421', 2),
(177, 'A user named Baker Sample was updated by SampleBaker', '2021-10-02 01:13:27', 'BK-120941-064421', 2),
(178, 'The inventories were synced by jisolon', '2021-10-02 06:54:28', 'HM-160911-123021', 10),
(179, 'The inventories were synced by jisolon', '2021-10-02 06:54:32', 'HM-160911-123021', 10),
(180, 'The inventories were synced by jisolon', '2021-10-02 06:54:40', 'HM-160911-123021', 10),
(181, 'The inventories were synced by jisolon', '2021-10-02 07:02:18', 'HM-160911-123021', 10);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cxTempID` varchar(30) NOT NULL,
  `cxName` varchar(50) NOT NULL,
  `cxAddress` varchar(100) NOT NULL,
  `cxBarangay` varchar(30) NOT NULL,
  `cxCity` varchar(30) NOT NULL,
  `cxContactNum` varchar(11) NOT NULL,
  `cxPersonID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cxTempID`, `cxName`, `cxAddress`, `cxBarangay`, `cxCity`, `cxContactNum`, `cxPersonID`) VALUES
('091221300645', '', '', 'Amihan', 'Quezon ', '', 'SL-120930-064521'),
('091221300647', '', 'Somewhere Sa Greece', 'Pio Del Pilar', 'Makati', '09123456789', 'CX-120914-073221'),
('091221410644', '', '', 'New Lower Bicutan', 'Taguig', '', 'BK-120941-064421'),
('091621101012', '', '', 'New Lower Bicutan', 'Taguig', '', 'SL-160910-101221'),
('091821051423', '', '', 'Palanan', 'Makati', '', 'AD-180923-051421'),
('092021035149', '', '', '', '', '', 'HM-200949-035121'),
('092021035307', '', '', '', '', '', 'AD-200907-035321'),
('092221073500', '', '', '', '', '', 'AD-220900-073521'),
('092221083116', '', '', '', '', '', 'AD-220916-083121'),
('092221092840', '', '', '', '', '', 'AD-220940-092821'),
('092521063122', '', '', '', '', '', 'AD-250922-063121'),
('CX-120914-073221', 'Sample Customer', 'Somewhere Sa Greece', 'Pio Del Pilar', 'Makati', '09123456789', 'CX-120914-073221'),
('CX-220953-094021', 'Another User', 'Sto. Domingo ', 'New Lower Bicutan', 'Taguig', '09082128618', 'CX-220953-094021'),
('CX-250902-081421', 'Joe Cruz', 'Second Floor ', 'New Lower Bicutan', 'Taguig', '0908218618', 'CX-250902-081421'),
('CX-250906-032821', 'John Doe', ' Somewhere Over The Rainbow ', 'Santo Rosario - Silangan', 'Pateros', '0908218618', 'CX-250906-032821'),
('CX-300959-082221', 'Medusa Poseidon', 'Somewhere Sa Greece', 'Pio Del Pilar', 'Makati', '09123456789', 'CX-120914-073221'),
('SL-190903-115521', 'Wilson Abano', 'Ranger St', 'Sagad', 'Pasig', '0908218615', 'SL-190903-115521'),
('SL-220943-094121', 'Another Seller', 'Somewhere ', 'Palanan', 'Makati', '09082128618', 'SL-220943-094121'),
('SL-250928-073121', 'Juan  Perez', 'Somewhere Over The Rainbow ', 'Barangay 685', 'Paco', '09082128618', 'SL-250928-073121'),
('SL-250934-080321', 'Fred Nerk', 'Somewhere Over The Rainbow  ', 'Barangay 281', 'SNicolas', '09082128618', 'SL-250934-080321'),
('SL-250938-043621', 'Jane Doe', 'To The Moon', 'Barangka Itaas', 'Mandaluyong', '0908218618', 'SL-250938-043621'),
('SL-300924-045421', 'Jenny Jones', 'To The Moon ', 'Barangay 648', 'SMiguel', '0908218618', 'SL-300924-045421');

-- --------------------------------------------------------

--
-- Table structure for table `cxcakeorder`
--

CREATE TABLE `cxcakeorder` (
  `cakeOrderID` varchar(15) NOT NULL,
  `cakeProdID` int(11) NOT NULL,
  `cakeDelivD` date NOT NULL,
  `cakeDelivT` varchar(10) NOT NULL,
  `cakeQty` int(11) NOT NULL,
  `cakeCandlesQty` int(11) NOT NULL,
  `cakeCompPrice` int(11) NOT NULL,
  `cakeStat` int(1) NOT NULL DEFAULT 1 COMMENT '1 = active\r\n2 = inactive / checked out\r\n3 = removed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cxcakeorder`
--

INSERT INTO `cxcakeorder` (`cakeOrderID`, `cakeProdID`, `cakeDelivD`, `cakeDelivT`, `cakeQty`, `cakeCandlesQty`, `cakeCompPrice`, `cakeStat`) VALUES
('20210918081552', 9, '2021-09-18', '1PM - 3PM', 1, 12, 824, 1),
('20210922085034', 7, '2021-09-24', '1PM - 3PM', 2, 18, 910, 1),
('20210922085227', 7, '2021-09-24', '1PM - 3PM', 2, 18, 910, 1),
('20210922085244', 7, '2021-09-24', '1PM - 3PM', 2, 18, 910, 1),
('20210922090429', 5, '2021-09-25', '11AM - 1PM', 1, 10, 325, 1),
('20210922094409', 5, '2021-09-25', '1PM - 3PM', 1, 18, 325, 1),
('20210922094430', 5, '2021-09-20', '1PM - 3PM', 1, 18, 325, 1),
('20210922094524', 5, '2021-09-20', '1PM - 3PM', 1, 18, 325, 1),
('20210925012013', 10, '2021-09-24', '3PM - 5PM', 1, 0, 878, 1),
('20210925012342', 9, '2021-09-24', '1PM - 3PM', 1, 0, 824, 1),
('20210925012759', 7, '2021-09-16', '3PM - 5PM', 1, 0, 455, 1),
('20210925013338', 6, '2021-09-09', '3PM - 5PM', 1, 0, 451, 1),
('20210925013617', 10, '2021-09-24', '5PM - 7PM', 1, 0, 878, 2),
('20210925013748', 9, '2021-09-22', '1PM - 3PM', 1, 0, 824, 2),
('20210925013825', 4, '2021-09-04', '3PM - 5PM', 1, 0, 450, 1),
('20210925013949', 4, '2021-09-04', '11AM - 1PM', 1, 0, 450, 1),
('20210925014413', 4, '2021-09-03', '3PM - 5PM', 1, 0, 450, 1),
('20210925014450', 9, '2021-09-11', '1PM - 3PM', 1, 0, 824, 1),
('20210925014542', 11, '2021-09-09', '1PM - 3PM', 1, 0, 656, 2),
('20210925121125', 5, '2021-09-10', '3PM - 5PM', 1, 0, 325, 1),
('20210925121316', 8, '2021-10-07', '1PM - 3PM', 1, 0, 265, 1),
('20210930023429', 5, '2021-10-02', '1PM - 3PM', 1, 0, 325, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cxcartorder`
--

CREATE TABLE `cxcartorder` (
  `id` int(11) NOT NULL,
  `cartOrderID` varchar(30) NOT NULL,
  `cartCakeOID` varchar(15) DEFAULT NULL,
  `cartCustomOID` varchar(15) DEFAULT NULL,
  `cartTotalPrice` int(11) DEFAULT NULL,
  `cartDate` date DEFAULT NULL,
  `cartCxID` varchar(30) NOT NULL,
  `cartPaymentRefID` varchar(255) NOT NULL,
  `cartStat` int(1) NOT NULL DEFAULT 1 COMMENT '1 = not yet checked out\r\n2 = checked out / pending payment\r\n3 = paid but caked aint baked yet\r\n4 = cake baked but not yet delivered\r\n5 = delivered and done',
  `cartInstructions` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cxcartorder`
--

INSERT INTO `cxcartorder` (`id`, `cartOrderID`, `cartCakeOID`, `cartCustomOID`, `cartTotalPrice`, `cartDate`, `cartCxID`, `cartPaymentRefID`, `cartStat`, `cartInstructions`) VALUES
(12, 'cart-20210925013617', '20210925013617', NULL, 1480, '2021-09-30', 'CX-300959-082221', '', 2, NULL),
(13, 'cart-20210925013617', '20210925013748', NULL, 1480, '2021-09-30', 'CX-300959-082221', 'xLAJ1231465', 3, NULL),
(16, 'cart-20210925014413', '20210925014413', NULL, NULL, NULL, 'CX-220953-094021', '', 1, NULL),
(17, 'cart-20210925014413', '20210925014450', NULL, NULL, NULL, 'CX-220953-094021', '', 1, NULL),
(18, 'cart-20210925013617', '20210925014542', NULL, 1480, '2021-09-30', 'CX-300959-082221', '', 2, NULL),
(19, 'cart-20210930023429', '20210930023429', NULL, NULL, NULL, 'CX-120914-073221', '', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cxcustomdetails`
--

CREATE TABLE `cxcustomdetails` (
  `customOrderID` varchar(15) NOT NULL,
  `customBaseFill` int(11) NOT NULL,
  `customIcing` int(11) NOT NULL,
  `customImgPath` varchar(255) NOT NULL,
  `customDelivD` date NOT NULL,
  `customDelivT` varchar(10) NOT NULL,
  `customQty` int(11) NOT NULL,
  `customCompPrice` int(11) NOT NULL,
  `cakeStat` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `cnum` varchar(255) NOT NULL,
  `cakeID` varchar(255) NOT NULL,
  `refID` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `stat` int(11) NOT NULL COMMENT '1 = pending\r\n2 = confirm\r\n3 = removed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `cnum`, `cakeID`, `refID`, `amount`, `stat`) VALUES
(3, '09082878618', '20210925013617', 'xWER123465', 1, 3),
(4, '09082128618', '20210925013748', 'xLAJ1231465', 824, 2);

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `personID` varchar(30) NOT NULL,
  `personFname` varchar(100) NOT NULL,
  `personMname` varchar(100) NOT NULL,
  `personLname` varchar(100) NOT NULL,
  `personBakeryName` varchar(255) NOT NULL,
  `personGcash` varchar(255) NOT NULL,
  `personPaymaya` varchar(255) NOT NULL,
  `personCoinsPH` varchar(255) NOT NULL,
  `personImg` varchar(255) NOT NULL,
  `personDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`personID`, `personFname`, `personMname`, `personLname`, `personBakeryName`, `personGcash`, `personPaymaya`, `personCoinsPH`, `personImg`, `personDate`) VALUES
('AD-120944-064321', 'Admin', '', 'Sample', '', '', '', '', 'not set', '2021-09-13 01:43:44'),
('AD-180923-051421', 'Gabriel Antonio', 'Ballesteros', 'Cruz', '', '', '', '', 'not set', '2021-09-19 00:14:23'),
('AD-200907-035321', 'Lian', 'G', 'Alucema', '', '', '', '', 'useruploads/profile.png', '2021-09-20 22:53:07'),
('AD-220900-073521', 'Delete', 'Iro', 'This', '', '', '', '', 'useruploads/profile.png', '2021-09-22 14:35:00'),
('AD-220916-083121', 'Delete', 'New', 'User', '', '', '', '', 'useruploads/profileAD-220916-083121.png', '2021-09-22 15:31:16'),
('AD-220940-092821', 'Add', 'New', 'Userr', '', '', '', '', 'useruploads/profileAD-220940-092821.png', '2021-09-22 16:28:40'),
('AD-250922-063121', 'Jane', 'Hakdog', 'Doe', '', '', '', '', 'useruploads/profileAD-250922-063121.png', '2021-09-26 01:31:22'),
('BK-120941-064421', 'Baker', '', 'Sample', 'Sample Bakery', '09082128618', '09082128618', '09082128618', 'not set', '2021-09-13 01:44:41'),
('CX-120914-073221', 'Customer', '', 'Sample', '', '', '', '', 'not set', '2021-09-13 02:32:14'),
('CX-220953-094021', 'Another', '', 'User', '', '', '', '', 'not set', '2021-09-22 16:40:53'),
('CX-250902-081421', 'Joe', '', 'Cruz', '', '', '', '', 'not set', '2021-09-26 03:14:02'),
('CX-250906-032821', 'John', '', 'Doe', '', '', '', '', 'not set', '2021-09-25 22:28:06'),
('HM-120907-064221', 'Head Admin', '', 'Sample', '', '', '', '', 'not set', '2021-09-13 01:42:07'),
('HM-160911-123021', 'Joecharmie', 'Isiderio', 'Solon', '', '', '', '', 'useruploads/profileHM-160911-123021.png', '2021-09-16 19:30:11'),
('HM-200949-035121', 'Maria Patricia Anne', '', 'Agorilla', '', '', '', '', 'useruploads/profileHM-200949-035121.png', '2021-09-20 22:51:49'),
('SL-120930-064521', 'Seller', '', 'Sample', '', '', '', '', 'not set', '2021-09-13 01:45:30'),
('SL-160910-101221', 'Cherry', 'Isderio', 'Solon', 'Cake Queen', '', '', '', 'useruploads/profileSL-160910-101221.png', '2021-09-17 05:12:10'),
('SL-190903-115521', 'Wilson', '', 'Abano', 'I Wanna Be A Seller', '1', '2', '3', 'not set', '2021-09-20 06:55:03'),
('SL-220943-094121', 'Another', '', 'Seller', 'Anothersellerbakery', '', '', '', 'not set', '2021-09-22 16:41:43'),
('SL-250928-073121', 'Juan', '', 'Perez', 'Juans Bakery', '09082128618', '', '', 'useruploads/profile.png', '2021-09-26 02:31:28'),
('SL-250934-080321', 'Fred', '', 'Nerk', 'Fred Bakery', '', '', '', 'not set', '2021-09-26 02:03:34'),
('SL-250938-043621', 'Jane', '', 'Doe', 'Janes Bakery', '09082128618', '', '', 'useruploads/profile.png', '2021-09-25 23:36:38'),
('SL-300924-045421', 'Jenny', '', 'Jones', 'Jenny Bakery', '09082128618', '', '', 'not set', '2021-09-30 10:54:24'),
('VW-120957-064021', 'Viewer', '', 'Sample', '', '', '', '', 'not set', '2021-09-13 01:40:57');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodID` int(11) NOT NULL,
  `prodName` varchar(25) NOT NULL,
  `prodDesc` varchar(200) NOT NULL,
  `prodTypeID` varchar(1) NOT NULL,
  `prodPrice` int(11) NOT NULL,
  `prodQty` int(11) NOT NULL,
  `prodSellerID` varchar(30) NOT NULL,
  `prodStat` int(1) NOT NULL DEFAULT 1,
  `prodImg` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodID`, `prodName`, `prodDesc`, `prodTypeID`, `prodPrice`, `prodQty`, `prodSellerID`, `prodStat`, `prodImg`) VALUES
(4, 'Azure Sky', 'A classic cake as pleasant as the beautiful lavender blue sky at sunset', '1', 450, 1, 'SL-160910-101221', 1, 'produploads/product4.png'),
(5, 'Cheezy Dream', 'Cheese is a dream, this cheesy cake satisfy cheesy cravings', '1', 325, 1, 'SL-160910-101221', 1, 'produploads/product5.png'),
(6, 'Classic Rose', 'Beautiful rose decorated cake with strawberry base and pink coating.', '1', 451, 1, 'SL-160910-101221', 1, 'produploads/product6.png'),
(7, 'Elegant Emerald ', 'Cool emerald green with classic pistachio coated elegantly ', '1', 455, 1, 'BK-120941-064421', 1, 'produploads/product7.png'),
(8, 'Strawberry Castle', 'A classic strawberry flavored cake topped with juicy strawberries', '1', 265, 1, 'BK-120941-064421', 1, 'produploads/product8.png'),
(9, 'Spooky Delight', 'A Halloween themed cake with different flavored frosting and  chocolates!', '2', 824, 1, 'BK-120941-064421', 1, 'produploads/product9.png'),
(10, 'Ocean Man', 'An Ocean themed caked with vanilla frosting with candied seashell decorations.', '2', 878, 1, 'BK-120941-064421', 1, 'produploads/product10.png'),
(11, 'Flower Frost', 'Classic frosting cake topped with edible flower decorations.', '1', 656, 0, 'BK-120941-064421', 1, 'produploads/product11.png'),
(12, 'Pink Flower Frost', 'Classic frosting cake topped with edible flower decorations.', '1', 656, 1, 'BK-120941-064421', 3, 'produploads/product12.png'),
(13, 'Sandy Beach', 'A beach themed cake made to look like the sandy shore decorated by shell', '2', 897, 1, 'BK-120941-064421', 3, 'produploads/product13.png'),
(14, 'Flower Frost', 'Classic frosting cake topped with edible flower decorations.', '1', 656, 1, 'SL-250938-043621', 1, 'produploads/product14.jpg'),
(15, 'Flower Frost', 'Classic frosting cake topped with edible flower decorations.', '1', 656, 1, 'SL-250938-043621', 3, 'produploads/product15.png'),
(16, 'Sandy Beach', 'A beach themed cake made to look like the sandy shore decorated by shell. ', '2', 897, 1, 'SL-250938-043621', 1, 'produploads/product16.png');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleID` int(11) NOT NULL,
  `roleDesc` varchar(20) NOT NULL,
  `roleStat` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleID`, `roleDesc`, `roleStat`) VALUES
(1, 'Head Admin', 1),
(2, 'Admin', 1),
(3, 'Bakery', 1),
(4, 'Seller', 1),
(5, 'Customer', 1),
(6, 'Viewer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` varchar(30) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `userRoleID` int(11) NOT NULL,
  `userStat` int(1) NOT NULL DEFAULT 1 COMMENT '1 = active\r\n2 = inactive\r\n3 = deactivate\r\n4 = pending\r\n',
  `userEmail` varchar(255) NOT NULL,
  `userNum` varchar(11) NOT NULL,
  `userPassword` varchar(250) NOT NULL,
  `userPersonID` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userName`, `userRoleID`, `userStat`, `userEmail`, `userNum`, `userPassword`, `userPersonID`) VALUES
('AD-120944-064321', 'SampleAdmin', 2, 1, '', '', '$2y$10$0HbQjbiCpA2Tv7/q0SRjReOZv2quWXm3HMhvxWDTKxs0vke0Za0Ja', 'AD-120944-064321'),
('AD-180923-051421', 'gabcruz', 2, 3, 'gab@gmail.com', '09082128618', '$2y$10$kxKnHiaOYEYGF.cXr02J4.72ivypU5qZS1aOBFwWjExGo.UZgAqsu', 'AD-180923-051421'),
('AD-200907-035321', 'lgalucema', 2, 1, '', '', '$2y$10$E1Qq1xo5ZtcPSBCOxIraFeggbTQy3gFRDDHcT9jWvsx5mjBqRK5kO', 'AD-200907-035321'),
('AD-220900-073521', 'deluser', 2, 3, '', '', '$2y$10$W9kGBJt41xEdUO/KdgrKU.Bhxvf3oZluQbJe8fx0O8kkH01BCQxI2', 'AD-220900-073521'),
('AD-220916-083121', 'addnewuser1', 2, 3, '', '', '$2y$10$iaqn1Gns4SMxArci6hk3XeinkFGDY.Twfp4I7Y0xmHP0ra1xqVFw6', 'AD-220916-083121'),
('AD-220940-092821', 'adminadded', 2, 3, '', '', '$2y$10$Sf3MyGUjyvWnu1joN5rHFeCqs.4CeVhWhPX9B9DyCU03wOX8Lthpq', 'AD-220940-092821'),
('AD-250922-063121', 'janefdoe', 2, 3, '', '', '$2y$10$fldKYtuoUQG4npw0pvduN.Tii/WrRpdru.fnjWNHdYuV9lgjV5hHC', 'AD-250922-063121'),
('BK-120941-064421', 'SampleBaker', 3, 1, '', '', '$2y$10$OldRGU9FTCRNlX5D1KDU0Og3jUHx9NWNKWR23pvAAsR4qjjTGdpKu', 'BK-120941-064421'),
('CX-120914-073221', 'SampleCustomer', 5, 1, 'sc@gmail.com', '', '$2y$10$NSPDyc0hZ3is4TQdFE344uOqkQNRgd5rDF7RmBVPHF164RRrn/146', 'CX-120914-073221'),
('CX-220953-094021', 'anotheruser', 5, 3, '', '', '$2y$10$CG6Pn797xtpcwVunSxb/huz5n1bSAnLpmH/apg37LhtEEECFd6/ou', 'CX-220953-094021'),
('CX-250902-081421', 'joecruz', 5, 1, '', '', '$2y$10$LJ8OPmyVH58iFVVRb1tS.OA0Wiy2A1JQBPb2XyEPbaLBbvPkNTZyC', 'CX-250902-081421'),
('CX-250906-032821', 'johndoe', 5, 1, 'jd@gmail.com', '09123456789', '$2y$10$xvvuBrqz44wZ8Qp0ZmQpIORU75JMkqP0elZDgGJWsYzN3ApDC8aOu', 'CX-250906-032821'),
('HM-120907-064221', 'HeadAdmin', 1, 1, 'hm@gmail.com', '0908212A618', '$2y$10$XoM8XsRN83u8D/udrkYXo.r3m1N5TxvSiApfM5FPlu/we.PKXjJuW', 'HM-120907-064221'),
('HM-160911-123021', 'jisolon', 1, 1, '', '', '$2y$10$A0alzdlpoHOxRAopnSvdr.hdUZXBu.yVIXpz12wZmQ0yo6SMeOMP2', 'HM-160911-123021'),
('HM-200949-035121', 'mpaagorilla', 1, 1, 'pat@gmail.com', '09123456789', '$2y$10$vKSoi4qsGOEMFc805nV8TOMHhsg4kFRxsVzvASZ9Mwu9h66N6nXS2', 'HM-200949-035121'),
('SL-120930-064521', 'SampleSeller', 4, 1, '', '', '$2y$10$4goPdBGeBtZVEYFGnEHvBeNtUEp/QUn6CxE8PAGd4.bTB.9LVARmm', 'SL-120930-064521'),
('SL-160910-101221', 'csolon', 4, 1, '', '', '$2y$10$jxj3HfjFNIIGrO1Vifbb1.hjCQYcZpgizVX0DQq9zNyCYwYWC3NpS', 'SL-160910-101221'),
('SL-190903-115521', 'iwannabeaseller', 4, 1, '', '', '$2y$10$3A/Tv4Y8eAIV1LcTPZnOyu9.SnWrZHqmpOO1yAwk.XVcRbQbhoSr.', 'SL-190903-115521'),
('SL-220943-094121', 'anotherseller', 4, 1, '', '', '$2y$10$2KTxxJf1/58aueGGtYDN/.cXJS8aOB/NHo9DRwVQkc6GBJqnQ6lyy', 'SL-220943-094121'),
('SL-250928-073121', 'ewanko', 4, 1, '', '', '$2y$10$w/Wum0.C9POUA1YypXXVEeXaqEw2Kq./yzGw12RFsNVcf26W1ICXa', 'SL-250928-073121'),
('SL-250934-080321', 'frednerks', 4, 4, 'frednerk@gmail.com', '', '$2y$10$5JMU1hXk0dAoquSJj5BzweVfgmxdXm9eBNgAw5EUtrTNdZIiTRtki', 'SL-250934-080321'),
('SL-250938-043621', 'janedoe', 4, 1, '', '', '$2y$10$cY9GzmyzQ770CA5KgNPQ5OOb.5UuiCbhn4FBbGkwRjMuKpTg5rft2', 'SL-250938-043621'),
('SL-300924-045421', 'jj', 4, 4, 'jj@gmail.com', '', '$2y$10$m8IXyLXNoVA1K49N6hpVIeM8pW56S8V03hN0X/xS3I3l5fxx2mX6i', 'SL-300924-045421'),
('VW-120957-064021', 'Viewer', 6, 1, '', '', '$2y$10$KJTq0Lrd4N.MLqL4aHr5LOYkikpQqGn6HmII7D8xBCCX48izD3kFa', 'VW-120957-064021');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actcategory`
--
ALTER TABLE `actcategory`
  ADD PRIMARY KEY (`actCatID`);

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`actID`),
  ADD KEY `actUserID` (`actUserID`),
  ADD KEY `actCategoryID` (`actCategoryID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cxTempID`),
  ADD KEY `cxPersonID` (`cxPersonID`);

--
-- Indexes for table `cxcakeorder`
--
ALTER TABLE `cxcakeorder`
  ADD PRIMARY KEY (`cakeOrderID`),
  ADD KEY `cakeProdID` (`cakeProdID`);

--
-- Indexes for table `cxcartorder`
--
ALTER TABLE `cxcartorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cartCakeOID` (`cartCakeOID`,`cartCxID`),
  ADD KEY `cartCustomOID` (`cartCustomOID`),
  ADD KEY `cartCxID` (`cartCxID`);

--
-- Indexes for table `cxcustomdetails`
--
ALTER TABLE `cxcustomdetails`
  ADD PRIMARY KEY (`customOrderID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`personID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodID`),
  ADD KEY `prodSellerID` (`prodSellerID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `userRoleID` (`userRoleID`),
  ADD KEY `userPersonID` (`userPersonID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `actID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- AUTO_INCREMENT for table `cxcartorder`
--
ALTER TABLE `cxcartorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`actUserID`) REFERENCES `user` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `activity_ibfk_2` FOREIGN KEY (`actCategoryID`) REFERENCES `actcategory` (`actCatID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`cxPersonID`) REFERENCES `person` (`personID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cxcakeorder`
--
ALTER TABLE `cxcakeorder`
  ADD CONSTRAINT `cxcakeorder_ibfk_1` FOREIGN KEY (`cakeProdID`) REFERENCES `product` (`prodID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cxcartorder`
--
ALTER TABLE `cxcartorder`
  ADD CONSTRAINT `cxcartorder_ibfk_1` FOREIGN KEY (`cartCakeOID`) REFERENCES `cxcakeorder` (`cakeOrderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cxcartorder_ibfk_2` FOREIGN KEY (`cartCustomOID`) REFERENCES `cxcustomdetails` (`customOrderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cxcartorder_ibfk_3` FOREIGN KEY (`cartCxID`) REFERENCES `contact` (`cxTempID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`prodSellerID`) REFERENCES `person` (`personID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`userRoleID`) REFERENCES `role` (`roleID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`userPersonID`) REFERENCES `person` (`personID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
