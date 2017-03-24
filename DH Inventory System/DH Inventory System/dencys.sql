-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2017 at 09:54 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dencys`
--
CREATE DATABASE IF NOT EXISTS `dencys` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dencys`;

-- --------------------------------------------------------

--
-- Table structure for table `archive`
--

CREATE TABLE `archive` (
  `archiveID` int(11) NOT NULL,
  `date` date NOT NULL,
  `totalIn` int(11) DEFAULT NULL,
  `totalOut` int(11) DEFAULT NULL,
  `beginningQty` int(11) DEFAULT NULL,
  `endingQty` int(11) DEFAULT NULL,
  `physicalQty` int(11) DEFAULT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `prodID` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `archive`
--

INSERT INTO `archive` (`archiveID`, `date`, `totalIn`, `totalOut`, `beginningQty`, `endingQty`, `physicalQty`, `remarks`, `prodID`) VALUES
(1, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'LTS-HDT-0001'),
(2, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'LTS-HDT-0002'),
(3, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'LTS-HDT-0003'),
(4, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'LTS-HDT-0004'),
(5, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'LTS-HDT-0005'),
(6, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'LTS-HDT-0006'),
(7, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'LTS-HDT-0007'),
(8, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'LTS-HDT-0008'),
(9, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'LTS-HDT-0009'),
(10, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'LTS-HDT-0010'),
(11, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'LTS-ACC-0001'),
(12, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'LTS-ACC-0002'),
(13, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'LTS-ACC-0003'),
(14, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'LTS-ACC-0004'),
(15, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'LTS-ACC-0005'),
(16, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'LTS-ACC-0006'),
(17, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'LTS-ACC-0007'),
(18, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'LTS-ACC-0008'),
(19, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'LTS-ACC-0009'),
(20, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'LTS-ACC-0010'),
(21, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'DCA-PWT-0001'),
(22, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'DCA-PWT-0002'),
(23, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'DCA-PWT-0003'),
(24, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'DCA-PWT-0004'),
(25, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'DCA-PWT-0005'),
(26, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'DCA-PWT-0006'),
(27, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'DCA-PWT-0007'),
(28, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'DCA-PWT-0008'),
(29, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'DCA-PWT-0009'),
(30, '2017-01-31', NULL, NULL, 0, 25, 25, NULL, 'DCA-PWT-0010'),
(31, '2017-02-28', NULL, NULL, 25, 30, 30, NULL, 'LTS-HDT-0001'),
(32, '2017-02-28', NULL, NULL, 25, 30, 30, NULL, 'LTS-HDT-0002'),
(33, '2017-02-28', NULL, NULL, 25, 30, 30, NULL, 'LTS-HDT-0003'),
(34, '2017-02-28', NULL, NULL, 25, 50, 50, NULL, 'LTS-HDT-0004'),
(35, '2017-02-28', NULL, NULL, 25, 30, 30, NULL, 'LTS-HDT-0005'),
(36, '2017-02-28', NULL, NULL, 25, 25, 25, NULL, 'LTS-HDT-0006'),
(37, '2017-02-28', NULL, NULL, 25, 10, 10, NULL, 'LTS-HDT-0007'),
(38, '2017-02-28', NULL, NULL, 25, 15, 15, NULL, 'LTS-HDT-0008'),
(39, '2017-02-28', NULL, NULL, 25, 15, 15, NULL, 'LTS-HDT-0009'),
(40, '2017-02-28', NULL, NULL, 25, 10, 10, NULL, 'LTS-HDT-0010'),
(41, '2017-02-28', NULL, NULL, 25, 10, 10, NULL, 'LTS-ACC-0001'),
(42, '2017-02-28', NULL, NULL, 25, 10, 10, NULL, 'LTS-ACC-0002'),
(43, '2017-02-28', NULL, NULL, 25, 15, 15, NULL, 'LTS-ACC-0003'),
(44, '2017-02-28', NULL, NULL, 25, 15, 15, NULL, 'LTS-ACC-0004'),
(45, '2017-02-28', NULL, NULL, 25, 25, 25, NULL, 'LTS-ACC-0005'),
(46, '2017-02-28', NULL, NULL, 25, 50, 50, NULL, 'LTS-ACC-0006'),
(47, '2017-02-28', NULL, NULL, 25, 50, 50, NULL, 'LTS-ACC-0007'),
(48, '2017-02-28', NULL, NULL, 25, 50, 50, NULL, 'LTS-ACC-0008'),
(49, '2017-02-28', NULL, NULL, 25, 50, 50, NULL, 'LTS-ACC-0009'),
(50, '2017-02-28', NULL, NULL, 25, 50, 50, NULL, 'LTS-ACC-0010'),
(51, '2017-02-28', NULL, NULL, 25, 25, 25, NULL, 'DCA-PWT-0001'),
(52, '2017-02-28', NULL, NULL, 25, 25, 25, NULL, 'DCA-PWT-0002'),
(53, '2017-02-28', NULL, NULL, 25, 25, 25, NULL, 'DCA-PWT-0003'),
(54, '2017-02-28', NULL, NULL, 25, 25, 25, NULL, 'DCA-PWT-0004'),
(55, '2017-02-28', NULL, NULL, 25, 25, 25, NULL, 'DCA-PWT-0005'),
(56, '2017-02-28', NULL, NULL, 25, 25, 25, NULL, 'DCA-PWT-0006'),
(57, '2017-02-28', NULL, NULL, 25, 25, 25, NULL, 'DCA-PWT-0007'),
(58, '2017-02-28', NULL, NULL, 25, 25, 25, NULL, 'DCA-PWT-0008'),
(59, '2017-02-28', NULL, NULL, 25, 25, 25, NULL, 'DCA-PWT-0009'),
(60, '2017-02-28', NULL, NULL, 25, 25, 25, NULL, 'DCA-PWT-0010');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branchID` int(5) NOT NULL,
  `location` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branchID`, `location`) VALUES
(1, 'Camdas'),
(2, 'Hilltop'),
(3, 'KM 4'),
(4, 'KM 5'),
(5, 'San Fernando');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandID` varchar(45) NOT NULL,
  `brandName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandID`, `brandName`) VALUES
('AFR', 'Alfra'),
('AGP', 'AGP'),
('BND', 'Black and Decker'),
('BRM', 'Bernmann'),
('BSH', 'Bosch'),
('BZW', 'Benz Werks'),
('DCA', 'DCA'),
('DGR', 'Diager'),
('DML', 'Dremel'),
('DSS', 'Duss'),
('DWT', 'Dewalt'),
('ELP', 'Elephant'),
('EZN', 'Ezons'),
('GFD', 'Greenfield'),
('HND', 'Honda'),
('HTC', 'Hitachi'),
('IWN', 'Irwin'),
('JSE', 'Johnson Elektrik'),
('KBL', 'Kobewel Japan'),
('KEN', 'Ken'),
('KLR', 'Kleener'),
('KWK', 'Kawasaki'),
('LTS', 'Lotus'),
('LVR', 'Lavor'),
('MKT', 'Makita'),
('MRN', 'Metrinch'),
('MTC', 'Maktec'),
('MWK', 'Milwaukee'),
('MXS', 'MaxSell'),
('MXT', 'MaxTools'),
('RXN', 'Rexon'),
('RYC', 'Royce'),
('SKL', 'Skil'),
('SLY', 'Stanley'),
('SNW', 'Tavaris'),
('SSS', 'Shinsetsu'),
('STL', 'Stihl'),
('SWA', 'Sanwa'),
('TFM', 'Trafimet'),
('TGZ', 'Tool-ginizer'),
('TKU', 'Toku'),
('TTR', 'Tatara'),
('TYO', 'Toyo'),
('UNS', 'Unistar'),
('UTA', 'Ultra'),
('VGD', 'Vanguard'),
('VRX', 'Vorex'),
('WLO', 'Wilo'),
('YMA', 'Yamma'),
('ZKK', 'Zekoki');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` varchar(45) NOT NULL,
  `categoryName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`) VALUES
('ACC', 'Accessories'),
('ANT', 'Adhesive and Tapes'),
('APF', 'Air Purifier'),
('BFL', 'Bulbs and Flourescent Lights '),
('BNR', 'Brushes and Roller'),
('BTY', 'Batteries'),
('CNS', 'Caulks and Sealants'),
('EWC', 'Extension Cords, Wires, and Cables'),
('FCT', 'Faucets'),
('FLT', 'Flashlights'),
('FTN', 'Fittings'),
('HDT', 'Hand Tools'),
('HTA', 'Hand Tool Accessories'),
('LDR', 'Ladders'),
('MST', 'Measuring Tools'),
('PMS', 'Pumps'),
('PNT', 'Paints'),
('PSY', 'Power Supply'),
('PTA', 'Power Tool Accessories'),
('PWT', 'Power Tools'),
('RCG', 'Rechargeables'),
('SGR', 'Safety Gear'),
('TOR', 'Tool Organizers'),
('WDS', 'Wiring Devices'),
('WTF', 'Water Filtration'),
('WTH', 'Water Heaters'),
('WTS', 'Water Storage');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empID` int(5) NOT NULL,
  `empFirstName` varchar(45) NOT NULL,
  `empLastName` varchar(45) NOT NULL,
  `empExtensionName` varchar(45) DEFAULT NULL,
  `empMidName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empID`, `empFirstName`, `empLastName`, `empExtensionName`, `empMidName`) VALUES
(1, 'Miguel', 'Arimbuyutan', 'Mike', 'Fernandez'),
(2, 'Cynthia', 'Buizn', '-', 'Cargamento'),
(3, 'Haneyly Faye Anne', 'Del Rosario', 'Haney', 'Calindas'),
(4, 'Emelita', 'Flores', '-', 'Labita'),
(5, 'Kevin', 'Flores', '-', 'Labita'),
(6, 'Kier', 'Flores', '-', 'Labita'),
(7, 'Teodelio', 'Galope', 'TJ', 'Costales'),
(8, 'Christian', 'Granzon', 'King', 'Dulay'),
(9, 'Dave', 'Jarilla', 'Travis', 'Zeta'),
(10, 'Christopher', 'Landicho', 'Chris', 'Nadera'),
(11, 'Ronald', 'Landicho', 'Moe', 'Nadera'),
(12, 'Kharol', 'Limpayos', '-', 'Dolpa'),
(13, 'Kenneth', 'Llaneras', '-', 'Eguia'),
(14, 'Calixto', 'Mislang', 'Calex', 'Samson'),
(15, 'Raymond', 'Plmos', 'Mon', 'Lopez'),
(16, 'Julius', 'Rilloraza', '-', 'Resari'),
(17, 'Maria Christina', 'Tayaban', 'Tintin', 'Morales'),
(18, 'Jovin', 'Tuazon', '-', 'Doroteo'),
(19, 'Romel', 'Vargas', 'James', 'Mapalo'),
(20, 'Gerome', 'Visalo', '-', 'Labita');

-- --------------------------------------------------------

--
-- Table structure for table `incoming`
--

CREATE TABLE `incoming` (
  `inID` int(5) NOT NULL,
  `inQty` int(5) NOT NULL,
  `inDate` date NOT NULL,
  `receiptNo` varchar(25) NOT NULL,
  `inRemarks` varchar(25) DEFAULT 'None',
  `empID` int(5) NOT NULL,
  `prodID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incoming`
--

INSERT INTO `incoming` (`inID`, `inQty`, `inDate`, `receiptNo`, `inRemarks`, `empID`, `prodID`) VALUES
(1, 25, '2017-03-01', 'NE0216', 'None', 1, 'LTS-HDT-0001'),
(2, 20, '2017-03-01', '4464', 'None', 5, 'LTS-HDT-0002'),
(3, 15, '2017-03-05', '3245', 'None', 4, 'LTS-HDT-0003'),
(4, 20, '2017-03-10', 'n7452', 'None', 8, 'LTS-ACC-0001'),
(5, 10, '2017-03-15', 'r5123', 'None', 20, 'LTS-ACC-0002'),
(6, 30, '2017-03-18', 'RE0293', 'None', 6, 'LTS-HDT-0001'),
(7, 20, '2017-03-18', 'RE0293', 'None', 6, 'LTS-HDT-0002'),
(8, 25, '2017-03-19', 'RE1554', 'None', 14, 'DCA-PWT-0001'),
(9, 50, '2017-03-19', 'REjlkd', 'None', 7, 'DCA-PWT-0001'),
(10, 25, '2017-03-19', 'RE4542', 'None', 20, 'DCA-PWT-0003');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invID` int(11) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `phyCount` int(5) DEFAULT NULL,
  `initialQty` int(11) DEFAULT NULL,
  `inQty` int(11) DEFAULT NULL,
  `outQty` int(11) DEFAULT NULL,
  `endingQty` int(11) DEFAULT NULL,
  `prodID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invID`, `qty`, `phyCount`, `initialQty`, `inQty`, `outQty`, `endingQty`, `prodID`) VALUES
(1, 75, NULL, 30, 55, 10, 20, 'LTS-HDT-0001'),
(2, 55, NULL, 30, 40, 15, 20, 'LTS-HDT-0002'),
(3, 40, NULL, 30, 15, 5, 20, 'LTS-HDT-0003'),
(4, 50, NULL, 50, NULL, NULL, 10, 'LTS-HDT-0004'),
(5, 30, NULL, 30, NULL, NULL, 25, 'LTS-HDT-0005'),
(6, 25, NULL, 25, NULL, NULL, 5, 'LTS-HDT-0006'),
(7, 10, NULL, 10, NULL, NULL, 15, 'LTS-HDT-0007'),
(8, 15, NULL, 15, NULL, NULL, 15, 'LTS-HDT-0008'),
(9, 15, NULL, 15, NULL, NULL, 15, 'LTS-HDT-0009'),
(10, 10, NULL, 10, NULL, NULL, 10, 'LTS-HDT-0010'),
(11, 20, NULL, 10, 20, 10, 10, 'LTS-ACC-0001'),
(12, 20, NULL, 10, 10, NULL, 10, 'LTS-ACC-0002'),
(13, 5, NULL, 15, NULL, 10, 15, 'LTS-ACC-0003'),
(14, 5, NULL, 15, NULL, 10, 15, 'LTS-ACC-0004'),
(15, 50, NULL, 25, 25, NULL, 25, 'LTS-ACC-0005'),
(16, 50, NULL, 50, NULL, NULL, 50, 'LTS-ACC-0006'),
(17, 50, NULL, 50, NULL, NULL, 50, 'LTS-ACC-0007'),
(18, 50, NULL, 50, NULL, NULL, 50, 'LTS-ACC-0008'),
(19, 50, NULL, 50, NULL, NULL, 50, 'LTS-ACC-0009'),
(20, 50, NULL, 50, NULL, NULL, 50, 'LTS-ACC-0010'),
(21, 70, NULL, 25, 75, 30, 25, 'DCA-PWT-0001'),
(22, 15, NULL, 25, NULL, 10, 25, 'DCA-PWT-0002'),
(23, 50, NULL, 25, 25, NULL, 25, 'DCA-PWT-0003'),
(24, 25, NULL, 25, NULL, NULL, 25, 'DCA-PWT-0004'),
(25, 25, NULL, 25, NULL, NULL, 25, 'DCA-PWT-0005'),
(26, 25, NULL, 25, NULL, NULL, 25, 'DCA-PWT-0006'),
(27, 40, NULL, 25, 15, NULL, 25, 'DCA-PWT-0007'),
(28, 45, NULL, 25, 20, NULL, 25, 'DCA-PWT-0008'),
(29, 25, NULL, 25, NULL, NULL, 25, 'DCA-PWT-0009'),
(30, 25, NULL, 25, NULL, NULL, 25, 'DCA-PWT-0010');

-- --------------------------------------------------------

--
-- Table structure for table `outgoing`
--

CREATE TABLE `outgoing` (
  `outID` int(5) NOT NULL,
  `outQty` int(5) NOT NULL,
  `outDate` date NOT NULL,
  `outRemarks` text NOT NULL,
  `receiptNo` varchar(45) NOT NULL,
  `branchID` int(5) NOT NULL,
  `empID` int(5) NOT NULL,
  `prodID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outgoing`
--

INSERT INTO `outgoing` (`outID`, `outQty`, `outDate`, `outRemarks`, `receiptNo`, `branchID`, `empID`, `prodID`) VALUES
(1, 5, '2017-03-01', 'None', 'OUT0001', 2, 2, 'LTS-HDT-0001'),
(2, 5, '2017-03-05', 'None', 'OUT0002', 3, 20, 'LTS-HDT-0002'),
(3, 5, '2017-03-06', 'None', 'OUT0003', 2, 4, 'LTS-HDT-0003'),
(4, 10, '2017-03-10', 'None', 'OUT0004', 1, 5, 'LTS-ACC-0001'),
(5, 10, '2017-03-10', 'None', 'OUT0004', 3, 20, 'LTS-ACC-0003'),
(6, 10, '2017-03-15', 'None', 'OUT0005', 4, 2, 'LTS-HDT-0002'),
(7, 15, '2017-03-15', 'None', 'OUT0005', 4, 14, 'DCA-PWT-0001'),
(8, 10, '2017-03-16', 'None', 'OUT0006', 5, 10, 'DCA-PWT-0002'),
(9, 10, '2017-03-16', 'None', 'OUT0006', 5, 8, 'LTS-ACC-0004'),
(10, 5, '2017-03-19', 'None', 'OUT0007', 1, 10, 'LTS-HDT-0001'),
(11, 10, '2017-03-19', 'None', 'OUT0007', 1, 18, 'DCA-PWT-0001'),
(12, 5, '2017-03-19', 'None', 'OUT0007', 2, 17, 'DCA-PWT-0001');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodID` varchar(25) NOT NULL,
  `prodName` varchar(100) NOT NULL,
  `model` varchar(45) DEFAULT NULL,
  `categoryID` varchar(25) NOT NULL,
  `brandID` varchar(25) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `reorderLevel` int(5) NOT NULL,
  `unitType` varchar(45) CHARACTER SET big5 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodID`, `prodName`, `model`, `categoryID`, `brandID`, `price`, `reorderLevel`, `unitType`) VALUES
('AFR-ACC-0006', 'Hss Co-Eco Cutter 12x25', '1901012025', 'ACC', 'AFR', '1300.00', 30, 'Piece/s'),
('AFR-ACC-0007', 'Hss Co-Eco Cutter 13x25', '1901013025', 'ACC', 'AFR', '1400.00', 15, 'Piece/s'),
('AFR-ACC-0008', 'Hss Co-Eco Cutter 13.5x25', '1901013525', 'ACC', 'AFR', '1500.00', 15, 'Piece/s'),
('AFR-ACC-0009', 'Hss Co-Eco Cutter 14x25', '1901014025', 'ACC', 'AFR', '1500.00', 30, 'Piece/s'),
('AFR-ACC-0010', 'Hss Co-Eco Cutter 15x25', '1901015025', 'ACC', 'AFR', '1625.00', 30, 'Piece/s'),
('AFR-ACC-0011', 'Ejector Pin 6.35x77', '1926500', 'ACC', 'AFR', '650.00', 25, 'Piece/s'),
('AFR-ACC-0012', 'Ejector Pin 6.35x87', '1935500', 'ACC', 'AFR', '820.00', 25, 'Piece/s'),
('AFR-ACC-0013', 'Ejector Pin 6.35x102', '1950500', 'ACC', 'AFR', '850.00', 25, 'Piece/s'),
('AFR-ACC-0014', 'Ejector Pin 8x160', '2001502', 'ACC', 'AFR', '650.00', 25, 'Piece/s'),
('AFR-ACC-0015', 'Ejector Pin 8x102', '2001501', 'ACC', 'AFR', '820.00', 15, 'Piece/s'),
('AFR-ACC-0016', 'Tct Cutter 12x35', '2003012035', 'ACC', 'AFR', '4530.00', 15, 'Piece/s'),
('AFR-ACC-0017', 'Tct Cutter12x50', '2003012050', 'ACC', 'AFR', '5120.00', 25, 'Piece/s'),
('AFR-ACC-0018', 'Tct Cutter13x35', '2003013035', 'ACC', 'AFR', '4530.00', 20, 'Piece/s'),
('AFR-ACC-0019', 'Tct Cutter13x50', '2003013050', 'ACC', 'AFR', '5120.00', 20, 'Piece/s'),
('AFR-ACC-0020', 'Tct Cutter14x35', '2003014035', 'ACC', 'AFR', '4530.00', 25, 'Piece/s'),
('AFR-PWT-0001', 'Magnetic Drill 1100W 120mm', 'RB35X', 'PWT', 'AFR', '63000.00', 15, 'Piece/s'),
('AFR-PWT-0002', 'Magnetic Drill 1200W 100mm', 'RB50X', 'PWT', 'AFR', '115000.00', 30, 'Piece/s'),
('AFR-PWT-0003', 'Magnetic Drill 1800W 100mm', 'RB80X', 'PWT', 'AFR', '145000.00', 15, 'Piece/s'),
('AFR-PWT-0004', 'Magnetic Drill 1800W 60mm', '60RL-E', 'PWT', 'AFR', '175000.00', 15, 'Piece/s'),
('AFR-PWT-0005', 'Magnetic Drill 1800W 116mm', '100RL-E', 'PWT', 'AFR', '200000.00', 10, 'Piece/s'),
('DCA-PWT-0001', 'Cordless Driver Drill 12V/1.5Ah 10 mm', 'ADJZ09-10A', 'PWT', 'DCA', '8600.00', 25, 'Piece/s'),
('DCA-PWT-0002', 'Cordless Driver Hammer Drill 18V/3Ahx2 13 mm ', 'ADJZ13A', 'PWT', 'DCA', '21250.00', 10, 'Piece/s'),
('DCA-PWT-0003', 'Cordless Impact Driver 12V/1.5Ahx2/', 'ADPL02-8A', 'PWT', 'DCA', '9500.00', 25, 'Piece/s'),
('DCA-PWT-0004', 'Cordless Impact Wrench 18V/3Ahx2 ', 'ADPB16A', 'PWT', 'DCA', '19500.00', 10, 'Piece/s'),
('DCA-PWT-0005', 'Cordless Multi-tool12V/1.5Ahx2 ', 'ADMD12', 'PWT', 'DCA', '13650.00', 10, 'Piece/s'),
('DCA-PWT-0006', 'Electric Cut Off Machine 355x3x25.4mm 2000W ', 'AJG04-355', 'PWT', 'DCA', '12450.00', 10, 'Piece/s'),
('DCA-PWT-0007', 'Electric Circular Saw 1100W 64mm', 'AMY02-185', 'PWT', 'DCA', '5950.00', 10, 'Piece/s'),
('DCA-PWT-0008', 'Electric Circular Saw 1520W 84mm', 'AMY235', 'PWT', 'DCA', '9850.00', 20, 'Piece/s'),
('DCA-PWT-0009', 'Electric Mitre Saw 1650W 255mm', 'AJX255', 'PWT', 'DCA', '19500.00', 10, 'Piece/s'),
('DCA-PWT-0010', 'Electric Nibbler 620W 3.2mm 2.5mm 120mm 128mm', 'AJH32', 'PWT', 'DCA', '12375.00', 10, 'Piece/s'),
('DCA-PWT-0011', 'Percussion Hammer 900W', 'AZG6', 'PWT', 'DCA', '12200.00', 10, 'Piece/s'),
('DCA-PWT-0012', 'Percussion Hammer 1500W', 'AZG10', 'PWT', 'DCA', '24350.00', 10, 'Piece/s'),
('DCA-PWT-0013', 'Percussion Hammer 1240W', 'AZG15', 'PWT', 'DCA', '24900.00', 10, 'Piece/s'),
('DCA-PWT-0014', 'Electric Wrench 340W 12.7x12.7mm', 'APB20C', 'PWT', 'DCA', '7500.00', 10, 'Piece/s'),
('DCA-PWT-0015', 'Electric Shear 620W 3.2mm 2.5mm 50mm', 'AJJ32', 'PWT', 'DCA', '9375.00', 10, 'Piece/s'),
('DCA-PWT-0016', 'Reciprocating Saw 590W 30mm 90mm 90mm', 'AJF30', 'PWT', 'DCA', '6875.00', 10, 'Piece/s'),
('DCA-PWT-0017', 'Electric Chain Saw 1300W 405mm', 'AML02-404', 'PWT', 'DCA', '12800.00', 10, 'Piece/s'),
('DCA-PWT-0018', 'Electric Blower 680W', 'AQF32', 'PWT', 'DCA', '3500.00', 10, 'Piece/s'),
('DCA-PWT-0019', 'Electric Planer 500W 82mm 1m', 'AMB82', 'PWT', 'DCA', '3650.00', 10, 'Piece/s'),
('DCA-PWT-0020', 'Electric Planer 570W 82mm 1m', 'AMB02-82', 'PWT', 'DCA', '4100.00', 10, 'Piece/s'),
('DGR-ACC-0001', 'Masonry Drill Bit  Pro-Thread Straight Shank 3.0mm', '264D03', 'ACC', 'DGR', '89.00', 30, 'Piece/s'),
('DGR-ACC-0002', 'Masonry Drill Bit Pro-Thread Straight Shank 4.0mm', '264D04', 'ACC', 'DGR', '99.00', 30, 'Piece/s'),
('DGR-ACC-0003', 'Masonry Drill Bit Pro-Thread Straight Shank 4.5mm', '264D04.5', 'ACC', 'DGR', '115.00', 35, 'Piece/s'),
('DGR-ACC-0004', 'Masonry Drill Bit Pro-Thread Straight Shank 5.0mm', '264D05', 'ACC', 'DGR', '119.00', 25, 'Piece/s'),
('DGR-ACC-0005', 'Masonry Drill Bit Pro-Thread Straight Shank 5.5mm', '264D05.5', 'ACC', 'DGR', '129.00', 30, 'Piece/s'),
('DGR-ACC-0006', 'Diamond Core Drilling Blue Ceram 6.0mm', '426D06', 'ACC', 'DGR', '1800.00', 40, 'Piece/s'),
('DGR-ACC-0007', 'Diamond Core Drilling Blue Ceram 6.5mm', '426D06.5', 'ACC', 'DGR', '2000.00', 35, 'Piece/s'),
('DGR-ACC-0008', 'Diamond Core Drilling Blue Ceram 7.0mm', '426D07', 'ACC', 'DGR', '2100.00', 40, 'Piece/s'),
('DGR-ACC-0009', 'Diamond Core Drilling Blue Ceram 8.0mm', '426D08', 'ACC', 'DGR', '2200.00', 30, 'Piece/s'),
('DGR-ACC-0010', 'Diamond Core Drilling Blue Ceram 10.0mm', '426D10', 'ACC', 'DGR', '2300.00', 25, 'Piece/s'),
('DGR-ACC-0011', 'Hss Metal Drill Bits Pro 1.0x10', '726D01', 'ACC', 'DGR', '250.00', 30, 'Piece/s'),
('DGR-ACC-0012', 'Hss Metal Drill Bits Pro 4.5x10', '726D04.5', 'ACC', 'DGR', '460.00', 30, 'Piece/s'),
('DGR-ACC-0013', 'Hss Metal Drill Bits Pro 5.0x10', '726D05', 'ACC', 'DGR', '510.00', 30, 'Piece/s'),
('DGR-ACC-0014', 'Hss Metal Drill Bits Pro 5.2x10', '726D05.2', 'ACC', 'DGR', '670.00', 25, 'Piece/s'),
('DGR-ACC-0015', 'Hss Metal Drill Bits Pro 5.5x10', '726D05.5', 'ACC', 'DGR', '680.00', 25, 'Piece/s'),
('DGR-ACC-0016', 'Holesaw Cobalt Bi-Metal 25mm', '650D25', 'ACC', 'DGR', '1400.00', 20, 'Piece/s'),
('DGR-ACC-0017', 'Holesaw Cobalt Bi-Metal 27mm', '650D27', 'ACC', 'DGR', '1450.00', 20, 'Piece/s'),
('DGR-ACC-0018', 'Holesaw Cobalt Bi-Metal 29mm', '650D29', 'ACC', 'DGR', '1500.00', 30, 'Piece/s'),
('DGR-ACC-0019', 'Holesaw Cobalt Bi-Metal 30mm', '650D30', 'ACC', 'DGR', '1510.00', 30, 'Piece/s'),
('DGR-ACC-0020', 'Holesaw Cobalt Bi-Metal 32mm', '650D32', 'ACC', 'DGR', '1520.00', 30, 'Piece/s'),
('DSS-PWT-0001', 'Combination Hammer 710W', 'P26C', 'PWT', 'DSS', '49000.00', 18, 'Piece/s'),
('DSS-PWT-0002', 'Combination Hammer 920W', 'PX48', 'PWT', 'DSS', '82000.00', 18, 'Piece/s'),
('DSS-PWT-0003', 'Combination Hammer 1500W', 'PX78', 'PWT', 'DSS', '105000.00', 18, 'Piece/s'),
('DSS-PWT-0004', 'Rotary Hammer 600W', 'P16SDS', 'PWT', 'DSS', '28000.00', 18, 'Piece/s'),
('DSS-PWT-0005', 'Breaker 710W', 'PK45', 'PWT', 'DSS', '72500.00', 15, 'Piece/s'),
('DSS-PWT-0006', 'Breaker 1050W', 'PK62', 'PWT', 'DSS', '95000.00', 15, 'Piece/s'),
('DSS-PWT-0007', 'Demolition Hammer 1700W', 'PK300', 'PWT', 'DSS', '125000.00', 15, 'Piece/s'),
('LTS-ACC-0001', 'Carbon Brush 3.25x0.8x0.5mm', 'LAG115N38', 'ACC', 'LTS', '90.00', 20, 'Piece/s'),
('LTS-ACC-0002', 'Carbon Brush 3.75x0.75x0.5mm', 'LID10REN22', 'ACC', 'LTS', '90.00', 20, 'Piece/s'),
('LTS-ACC-0003', 'Carbon Brush 3.25x0.90x0.5mm', 'LID13REN23', 'ACC', 'LTS', '90.00', 20, 'Piece/s'),
('LTS-ACC-0004', 'Carbon Brush 2x1x0.75mm', 'LPK180N32', 'ACC', 'LTS', '150.00', 20, 'Piece/s'),
('LTS-ACC-0005', 'Carbon Brush', 'LID13REP21', 'ACC', 'LTS', '20.00', 20, 'Piece/s'),
('LTS-ACC-0006', 'Carbon Brush', 'LAG115CH-45', 'ACC', 'LTS', '110.00', 20, 'Piece/s'),
('LTS-ACC-0007', 'Carbon Brush 3.25x0.80x0.5', 'LAG115SSN29', 'ACC', 'LTS', '90.00', 20, 'Piece/s'),
('LTS-ACC-0008', 'Carbon Brush', 'LAG115Z1.38', 'ACC', 'LTS', '50.00', 40, 'Piece/s'),
('LTS-ACC-0009', 'Carbon Brush 3.25x0.55x0.5mm', 'LAT2026.2.32', 'ACC', 'LTS', '90.00', 40, 'Piece/s'),
('LTS-ACC-0010', 'Carbon Brush', 'LCOM355H.43', 'ACC', 'LTS', '235.00', 40, 'Piece/s'),
('LTS-HDT-0001', 'Air Duster', 'LDG101', 'HDT', 'LTS', '260.00', 10, 'Piece/s'),
('LTS-HDT-0002', 'Air Duster', 'LDG101AD', 'HDT', 'LTS', '290.00', 10, 'Piece/s'),
('LTS-HDT-0003', 'Air Duster Heavy Duty', 'LDG102', 'HDT', 'LTS', '250.00', 10, 'Piece/s'),
('LTS-HDT-0004', 'Aluminum Level 12"/300MM', 'LAL3001M', 'HDT', 'LTS', '250.00', 15, 'Piece/s'),
('LTS-HDT-0005', 'Aluminum Level 18"/450MM', 'LAL4501M', 'HDT', 'LTS', '340.00', 15, 'Piece/s'),
('LTS-HDT-0006', 'Aluminum Level 24"/600MM', 'LAL6001M', 'HDT', 'LTS', '380.00', 30, 'Piece/s'),
('LTS-HDT-0007', 'Aluminum Level 36"/900MM', 'LAL9001M', 'HDT', 'LTS', '480.00', 15, 'Piece/s'),
('LTS-HDT-0008', 'Aviation Snip 10"', 'LAS250L', 'HDT', 'LTS', '400.00', 15, 'Piece/s'),
('LTS-HDT-0009', 'Aviation Snip 10"', 'LAS250R', 'HDT', 'LTS', '400.00', 15, 'Piece/s'),
('LTS-HDT-0010', 'Aviation Snip 10"', 'LAS250S', 'HDT', 'LTS', '400.00', 15, 'Piece/s');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `returnID` int(5) NOT NULL,
  `returnDate` date NOT NULL,
  `returnQty` int(5) NOT NULL,
  `returnRemark` text NOT NULL,
  `prodID` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`returnID`, `returnDate`, `returnQty`, `returnRemark`, `prodID`) VALUES
(1, '2017-01-15', 1, 'none', 'LTS-ACC-0001'),
(2, '2017-01-15', 1, 'none', 'LTS-ACC-0010'),
(3, '2017-01-20', 1, 'none', 'LTS-ACC-0011'),
(4, '2017-01-31', 2, 'none', 'LTS-HDT-0005'),
(5, '2017-02-02', 1, 'none', 'LTS-HDT-0006'),
(14, '2017-03-11', 2, 'NONE', 'DCA-PWT-0006');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supID` int(5) NOT NULL,
  `supplier_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supID`, `supplier_name`) VALUES
(1, 'Alphine'),
(2, 'Amesco Trade'),
(3, 'Amity'),
(4, 'ASCD/ Harrows'),
(5, 'Atlas Copco/ Hilti'),
(6, 'Avenue'),
(7, 'Beesin'),
(8, 'Ben/ Alex Uy'),
(9, 'Black and Decker'),
(10, 'Bosch');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(5) NOT NULL,
  `userName` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `user_role` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `password`, `user_role`) VALUES
(1, 'admin1', 'bosch123', 'admin'),
(2, 'admin2', 'hitachi123', 'admin'),
(3, 'user1', 'dewatt123', 'user'),
(4, 'user2', 'agp123', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`archiveID`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branchID`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brandID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`empID`);

--
-- Indexes for table `incoming`
--
ALTER TABLE `incoming`
  ADD PRIMARY KEY (`inID`),
  ADD KEY `FKINPROD_idx` (`prodID`),
  ADD KEY `FKINPROD` (`prodID`),
  ADD KEY `FKINEMP_idx` (`empID`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invID`),
  ADD KEY `FKINVPROD_idx` (`prodID`);

--
-- Indexes for table `outgoing`
--
ALTER TABLE `outgoing`
  ADD PRIMARY KEY (`outID`),
  ADD KEY `FKOUTPROD_idx` (`prodID`),
  ADD KEY `FKOUTEMP_idx` (`empID`),
  ADD KEY `FKOUTBR_idx` (`branchID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodID`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`returnID`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `incoming`
--
ALTER TABLE `incoming`
  MODIFY `inID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `outgoing`
--
ALTER TABLE `outgoing`
  MODIFY `outID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `returnID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `outgoing`
--
ALTER TABLE `outgoing`
  ADD CONSTRAINT `FKOUTBR` FOREIGN KEY (`branchID`) REFERENCES `branch` (`branchID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
