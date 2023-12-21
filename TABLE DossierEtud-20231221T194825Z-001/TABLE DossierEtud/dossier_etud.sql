-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 08:37 PM
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
-- Database: `dossier_etud`
--

-- --------------------------------------------------------

--
-- Table structure for table `dossier_etud`
--

CREATE TABLE `dossier_etud` (
  `Ndossier` int(18) NOT NULL,
  `Motif` varchar(50) DEFAULT NULL,
  `MatEtud` varchar(20) DEFAULT NULL,
  `TypePiece` varchar(20) DEFAULT NULL,
  `DatePiece` date DEFAULT NULL,
  `Session` int(20) DEFAULT NULL,
  `NomFichierPiece` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dossier_etud`
--

INSERT INTO `dossier_etud` (`Ndossier`, `Motif`, `MatEtud`, `TypePiece`, `DatePiece`, `Session`, `NomFichierPiece`) VALUES
(32, 'omarkatar', 'xfgg', 'PDF', '2023-11-17', 42, 'cours-01_Isetso_2019-2020.pdf'),
(33, 'omar', 'sdfisuffggg', 'PDF', '2023-12-01', 1234, '3Iset.pdf'),
(34, 'om', 'xf', 'PDF', '2023-11-27', 1546, 'uml-corr01.pdf'),
(35, 'omncncncn', 'sdfisuf', 'PDF', '2023-11-19', 42, '2Iset.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dossier_etud`
--
ALTER TABLE `dossier_etud`
  ADD PRIMARY KEY (`Ndossier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dossier_etud`
--
ALTER TABLE `dossier_etud`
  MODIFY `Ndossier` int(18) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
