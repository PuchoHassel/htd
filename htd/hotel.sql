-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 03:32 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `kamer`
--

CREATE TABLE `kamer` (
  `kamernummer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `klant`
--

CREATE TABLE `klant` (
  `klantID` int(11) NOT NULL,
  `naam` varchar(255) DEFAULT NULL,
  `adres` varchar(255) DEFAULT NULL,
  `plaats` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `telefoon` int(11) DEFAULT NULL,
  `van` date DEFAULT NULL,
  `tot` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medewerker`
--

CREATE TABLE `medewerker` (
  `medewerkercode` int(11) NOT NULL,
  `naam` varchar(255) DEFAULT NULL,
  `achternaam` varchar(255) DEFAULT NULL,
  `wachtwoord` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medewerker`
--

INSERT INTO `medewerker` (`medewerkercode`, `naam`, `achternaam`, `wachtwoord`, `email`) VALUES
(1, 'aramis', NULL, '$2y$10$Md0uvLLQnkthDjEopNODKu8Z9EktsMleMkvK9E03gI36HmnpGFBn2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reservering`
--

CREATE TABLE `reservering` (
  `reserveringnummer` int(11) NOT NULL,
  `kamernummer` int(11) NOT NULL,
  `periode` varchar(255) DEFAULT NULL,
  `naam` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `plaats` varchar(255) NOT NULL,
  `postcode` varchar(255) NOT NULL,
  `telefoon` int(11) NOT NULL,
  `van` date NOT NULL,
  `tot` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservering`
--

INSERT INTO `reservering` (`reserveringnummer`, `kamernummer`, `naam`, `adres`, `plaats`, `postcode`, `telefoon`, `van`, `tot`) VALUES
(1, 2, 'J.Jansen', 'Schanshoek 3', 'Amsterdam', '2335GJ', 622155718, '2021-02-16', '2021-02-18'),
(2, 3, 'P.Saman', 'Trompstraat 322', 'Rotterdam', '1177LN', 699887528, '2021-02-16', '2022-02-17'),
(3, 8, 'G.Gerisen', 'van der hooplaan 45', 'Schevingen', '1144MN', 689885789, '2021-02-18', '2023-02-19'),
(4, 9, 'M.Abdul', 'Uitvlugt 13', 'Den Haag', '2345JH', 699875285, '2021-02-15', '2024-02-18'),
(5, 1, 'K.Overveen', 'Postjesweg 12', 'Geertuide', '1236GF', 654654654, '2021-02-19', '2025-02-20'),
(6, 5, 'I.Gillesen', 'Mercatorstraat 28', 'Ede', '9767HB', 688877741, '2021-02-16', '2026-02-18'),
(7, 3, 'P.Thijssen', 'Newtonlaan 67', 'Tiel', '2344BN', 615541298, '2021-02-19', '2027-02-20'),
(8, 2, 'B.Huslage', 'Chipsweg 32', 'Arhem', '6642DS', 633212851, '2021-02-19', '2028-02-20'),
(9, 1, 'N.Janssen', 'Achterdijk 23', 'Bergen', '0908DM', 698988875, '2021-02-21', '2029-02-22'),
(10, 4, 'H.van der Schee', 'Voorstraat 89', 'Hoofddorp', '1235KL', 699887783, '2021-02-23', '2030-02-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`klantID`);

--
-- Indexes for table `medewerker`
--
ALTER TABLE `medewerker`
  ADD PRIMARY KEY (`medewerkercode`);

--
-- Indexes for table `reservering`
--
ALTER TABLE `reservering`
  ADD PRIMARY KEY (`reserveringnummer`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klant`
--
ALTER TABLE `klant`
  MODIFY `klantID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medewerker`
--
ALTER TABLE `medewerker`
  MODIFY `medewerkercode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reservering`
--
ALTER TABLE `reservering`
  MODIFY `reserveringnummer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
