-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 26, 2019 at 10:32 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krasproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `pakketten`
--

CREATE TABLE `pakketten` (
  `id` int(5) NOT NULL,
  `naam` varchar(200) NOT NULL,
  `prijs` varchar(200) NOT NULL,
  `inhoud` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pakketten`
--

INSERT INTO `pakketten` (`id`, `naam`, `prijs`, `inhoud`) VALUES
(1, 'Starter', '€ 1.50 ', '• 1 Gb webspace\r\n• 1 domeinnaam\r\n• 1 FTP-toegang\r\n• 25 e-mailadressen\r\n• 10 Gb dataverkeer'),
(2, 'Basic', '€ 4.50', '• 4 Gb webspace\r\n• 2 domeinnamen\r\n• 10 FTP-toegangen\r\n• 200 e-mailadressen\r\n• PHP, MySQL (3 databases)\r\n• 50 Gb dataverkeer'),
(3, 'Advanced', '€ 14,99', '• 10 Gb webspace\r\n• 3 domeinnamen\r\n• 30 FTP-toegangen\r\n• 5000 e-mailadressen\r\n• PHP, MySQL (10 databases)\r\n• 100 Gb dataverkeer'),
(4, 'Pro', 'vanaf € 26,90', 'Na doorklikken op het pakket kan de klant zijn gegevens achterlaten, waarna wij als Krashosting\r\ncontact opnemen en onze accountmanager een afspraak zal maken.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pakketten`
--
ALTER TABLE `pakketten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pakketten`
--
ALTER TABLE `pakketten`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
