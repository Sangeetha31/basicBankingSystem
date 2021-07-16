-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 16, 2021 at 01:37 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--
CREATE DATABASE IF NOT EXISTS `bank` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bank`;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--
-- Creation: Jul 16, 2021 at 11:13 AM
-- Last update: Jul 16, 2021 at 11:33 AM
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `account_number` bigint(20) NOT NULL,
  `name` varchar(40) NOT NULL,
  `email` varchar(40) NOT NULL,
  `balance` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`email`) USING BTREE,
  UNIQUE KEY `account_number` (`account_number`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `customers`:
--

--
-- Truncate table before insert `customers`
--

TRUNCATE TABLE `customers`;
--
-- Dumping data for table `customers`
--

INSERT DELAYED IGNORE INTO `customers` (`id`, `account_number`, `name`, `email`, `balance`) VALUES
(1, 12783456, 'Sangeetha', 'sangeetha@gmail.com', 40000),
(2, 43212905, 'Shreya', 'shreya@gmail.com', 13573),
(3, 53981764, 'Janhavi', 'janhavi@gmail.com', 12630),
(4, 13725190, 'Sukanya', 'sukanya123@gmail.com', 39241),
(5, 32895431, 'Manav', 'manav45@gmail.com', 9918),
(6, 87326554, 'Meghana', 'meghana@gmail.com', 10112),
(7, 42185390, 'Anirudh', 'anirudh42@gmail.com', 8984),
(8, 64731098, 'Yogesh', 'yogesh21@gmail.com', 6954),
(9, 54826583, 'Divya', 'divya@gmail.com', 102136),
(10, 36821984, 'Yukta', 'yukta49@gmail.com', 3812);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--
-- Creation: Jul 16, 2021 at 11:25 AM
-- Last update: Jul 16, 2021 at 11:33 AM
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `senderaccNo` bigint(20) NOT NULL,
  `senderName` varchar(50) NOT NULL,
  `receiveraccNo` bigint(20) NOT NULL,
  `receiverName` varchar(50) NOT NULL,
  `amount` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `transaction`:
--

--
-- Truncate table before insert `transaction`
--

TRUNCATE TABLE `transaction`;
--
-- Dumping data for table `transaction`
--

INSERT DELAYED IGNORE INTO `transaction` (`id`, `senderaccNo`, `senderName`, `receiveraccNo`, `receiverName`, `amount`) VALUES
(1, 87326554, 'Meghana', 53981764, 'Janhavi', 6788),
(2, 64731098, 'Yogesh', 42185390, 'Anirudh', 490),
(3, 54826583, 'Divya', 32895431, 'Manav', 2000),
(4, 13725190, 'Sukanya', 43212905, 'Shreya', 853),
(5, 36821984, 'Yukta', 12783456, 'Sangeetha', 106),
(6, 43212905, 'Shreya', 54826583, 'Divya', 780),
(7, 12783456, 'Sangeetha', 32895431, 'Manav', 1106),
(8, 53981764, 'Janhavi', 42185390, 'Anirudh', 6000),
(9, 32895431, 'Manav', 53981764, 'Janhavi', 1888),
(10, 42185390, 'Anirudh', 36821984, 'Yukta', 666),
(11, 36821984, 'Yukta', 53981764, 'Janhavi', 854),
(12, 13725190, 'Sukanya', 54826583, 'Divya', 766);


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table customers
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for table transaction
--

--
-- Truncate table before insert `pma__column_info`
--

TRUNCATE TABLE `pma__column_info`;
--
-- Truncate table before insert `pma__table_uiprefs`
--

TRUNCATE TABLE `pma__table_uiprefs`;
--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT DELAYED IGNORE INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'bank', 'transaction', '[]', '2021-07-16 09:42:53');

--
-- Truncate table before insert `pma__tracking`
--

TRUNCATE TABLE `pma__tracking`;
--
-- Metadata for database bank
--

--
-- Truncate table before insert `pma__bookmark`
--

TRUNCATE TABLE `pma__bookmark`;
--
-- Truncate table before insert `pma__relation`
--

TRUNCATE TABLE `pma__relation`;
--
-- Truncate table before insert `pma__savedsearches`
--

TRUNCATE TABLE `pma__savedsearches`;
--
-- Truncate table before insert `pma__central_columns`
--

TRUNCATE TABLE `pma__central_columns`;SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
