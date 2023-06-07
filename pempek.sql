-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2023 at 05:17 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pempek`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `id` int(11) NOT NULL,
  `title_about` varchar(255) NOT NULL,
  `subtitle_about` varchar(255) NOT NULL,
  `desc_about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`id`, `title_about`, `subtitle_about`, `desc_about`) VALUES
(1, 'Title About', 'Subtitle About', 'Desc About');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `address_contact` varchar(255) NOT NULL,
  `phone_contact` varchar(255) NOT NULL,
  `email_contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `address_contact`, `phone_contact`, `email_contact`) VALUES
(1, 'Kembangan', '089604333576', 'bayu@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feature`
--

CREATE TABLE `tbl_feature` (
  `id` int(11) NOT NULL,
  `desc_feature` text NOT NULL,
  `img_feature` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_feature`
--

INSERT INTO `tbl_feature` (`id`, `desc_feature`, `img_feature`) VALUES
(1, 'Desc Feature', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_home`
--

CREATE TABLE `tbl_home` (
  `id` int(11) NOT NULL,
  `title_home` varchar(255) NOT NULL,
  `subtitle_home` varchar(255) NOT NULL,
  `title_feature` varchar(255) NOT NULL,
  `subtitle_feature` varchar(255) NOT NULL,
  `title_menu` varchar(255) NOT NULL,
  `subtitle_menu` varchar(255) NOT NULL,
  `title_team` varchar(255) NOT NULL,
  `subtitle_team` varchar(255) NOT NULL,
  `desc_taste` text NOT NULL,
  `desc_service` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_home`
--

INSERT INTO `tbl_home` (`id`, `title_home`, `subtitle_home`, `title_feature`, `subtitle_feature`, `title_menu`, `subtitle_menu`, `title_team`, `subtitle_team`, `desc_taste`, `desc_service`) VALUES
(1, 'Title', 'Subtitle', 'Title Feature', 'Subtitle Feature', 'Title Menu', 'Subtitle Menu', 'Title Team', 'Subtitle Team', 'Description Taste', 'Description Service');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `id` int(11) NOT NULL,
  `name_menu` varchar(255) NOT NULL,
  `desc_menu` text NOT NULL,
  `price_menu` varchar(255) NOT NULL,
  `img_menu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`id`, `name_menu`, `desc_menu`, `price_menu`, `img_menu`) VALUES
(1, 'Nasi Goreng', 'Masakan nasi yang di goreng', '24.000', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE `tbl_team` (
  `id` int(11) NOT NULL,
  `name_team` varchar(255) NOT NULL,
  `job_team` varchar(255) NOT NULL,
  `phone_team` varchar(255) NOT NULL,
  `img_team` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`id`, `name_team`, `job_team`, `phone_team`, `img_team`) VALUES
(1, 'Bagus Putro', 'Cook', '08960433574', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feature`
--
ALTER TABLE `tbl_feature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_home`
--
ALTER TABLE `tbl_home`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_feature`
--
ALTER TABLE `tbl_feature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_home`
--
ALTER TABLE `tbl_home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
