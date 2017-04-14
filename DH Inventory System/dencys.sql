-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2017 at 05:05 AM
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
  `archiveDate` date NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `totalIn` int(11) DEFAULT NULL,
  `totalOut` int(11) DEFAULT NULL,
  `beginningQty` int(11) DEFAULT NULL,
  `endingQty` int(11) DEFAULT NULL,
  `physicalQty` int(11) DEFAULT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `prodID` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `branchID` int(5) NOT NULL,
  `location` varchar(50) CHARACTER SET latin1 NOT NULL,
  `branchName` varchar(45) COLLATE latin1_german1_ci NOT NULL,
  `status` varchar(45) COLLATE latin1_german1_ci DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`branchID`, `location`, `branchName`, `status`) VALUES
(1, 'Camdas', 'Dency\'s Hardware', 'Active'),
(2, 'Hilltop', 'Enrico', 'Active'),
(3, 'KM 4', 'Tayabas', 'Active'),
(4, 'KM 5', 'KM5', 'Active'),
(5, 'San Fernando', 'Denne Hardware', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brandID` varchar(45) NOT NULL,
  `brandName` varchar(45) NOT NULL,
  `status` varchar(45) DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brandID`, `brandName`, `status`) VALUES
('AFR', 'Alfra', 'Inactive'),
('AGP', 'AGP', 'Active'),
('BND', 'Black and Decker', 'Active'),
('BRM', 'Bernmann', 'Active'),
('BSH', 'Bosch', 'Active'),
('BZW', 'Benz Werks', 'Active'),
('DCA', 'DCA', 'Active'),
('DGR', 'Diager', 'Active'),
('DML', 'Dremel', 'Active'),
('DSS', 'Duss', 'Active'),
('DWT', 'Dewalt', 'Active'),
('ELP', 'Elephant', 'Active'),
('EZN', 'Ezons', 'Active'),
('GFD', 'Greenfield', 'Active'),
('HI', 'HEHE', 'Inactive'),
('HND', 'Honda', 'Active'),
('HTC', 'Hitachi', 'Active'),
('IWN', 'Irwin', 'Active'),
('JSE', 'Johnson Elektrik', 'Active'),
('KBL', 'Kobewel Japan', 'Active'),
('KEN', 'Ken', 'Active'),
('KLR', 'Kleener', 'Active'),
('KWK', 'Kawasaki', 'Active'),
('LTS', 'Lotus', 'Active'),
('LVR', 'Lavor', 'Active'),
('MKT', 'Makita', 'Active'),
('MRN', 'Metrinch', 'Active'),
('MTC', 'Maktec', 'Active'),
('MWK', 'Milwaukee', 'Active'),
('MXS', 'MaxSell', 'Active'),
('MXT', 'MaxTools', 'Active'),
('RXN', 'Rexon', 'Active'),
('RYC', 'Royce', 'Active'),
('SKL', 'Skil', 'Active'),
('SLY', 'Stanley', 'Active'),
('SNW', 'Tavaris', 'Active'),
('SSS', 'Shinsetsu', 'Active'),
('STL', 'Stihl', 'Active'),
('SWA', 'Sanwa', 'Active'),
('TFM', 'Trafimet', 'Active'),
('TGZ', 'Tool-ginizer', 'Active'),
('TKU', 'Toku', 'Active'),
('TTR', 'Tatara', 'Active'),
('TYO', 'Toyo', 'Active'),
('UNS', 'Unistar', 'Active'),
('UTA', 'Ultra', 'Active'),
('VGD', 'Vanguard', 'Active'),
('VRX', 'Vorex', 'Active'),
('WLO', 'Wilo', 'Active'),
('YMA', 'Yamma', 'Active'),
('ZKK', 'Zekoki', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` varchar(45) NOT NULL,
  `categoryName` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`, `status`) VALUES
('ACC', 'Accessories', 'Active'),
('ANT', 'Adhesive and Tapes', 'Active'),
('APF', 'Air Purifier', 'Active'),
('BFL', 'Bulbs and Flourescent Lights ', 'Active'),
('BNR', 'Brushes and Roller', 'Active'),
('BTY', 'Batteries', 'Active'),
('CNS', 'Caulks and Sealants', 'Active'),
('EWC', 'Extension Cords, Wires, and Cables', 'Active'),
('FCT', 'Faucets', 'Active'),
('FLT', 'Flashlights', 'Active'),
('FTN', 'Fittings', 'Active'),
('HDT', 'Hand Tools', 'Active'),
('HTA', 'Hand Tool Accessories', 'Active'),
('LDR', 'Ladders', 'Active'),
('MST', 'Measuring Tools', 'Active'),
('PMS', 'Pumps', 'Active'),
('PNT', 'Paints', 'Active'),
('PSY', 'Power Supply', 'Active'),
('PTA', 'Power Tool Accessories', 'Active'),
('PWT', 'Power Tools', 'Active'),
('RCG', 'Rechargeables', 'Active'),
('SGR', 'Safety Gear', 'Active'),
('TOR', 'Tool Organizers', 'Active'),
('WDS', 'Wiring Devices', 'Active'),
('WTF', 'Water Filtration', 'Active'),
('WTH', 'Water Heaters', 'Active'),
('WTS', 'Water Storage', 'Inactive');

-- --------------------------------------------------------

--
-- Table structure for table `defectives`
--

CREATE TABLE `defectives` (
  `defectProdID` varchar(45) NOT NULL,
  `prodName` varchar(100) DEFAULT NULL,
  `categoryID` varchar(45) DEFAULT NULL,
  `brandID` varchar(45) DEFAULT NULL,
  `unitType` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `prodID` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `defectives`
--

INSERT INTO `defectives` (`defectProdID`, `prodName`, `categoryID`, `brandID`, `unitType`, `status`, `prodID`) VALUES
('AFR-ACC-0001D', '1901012025 - Hss Co-Eco Cutter 12x25 (Defective)', 'ACC', 'AFR', 'Piece/s', 'Active', 'AFR-ACC-0001'),
('AFR-ACC-0002D', '1901013025 - Hss Co-Eco Cutter 13x25 (Defective)', 'ACC', 'AFR', 'Piece/s', 'Active', 'AFR-ACC-0002'),
('AFR-ACC-0003D', '1901013525 - Hss Co-Eco Cutter 13.5x25 (Defective)', 'ACC', 'AFR', 'Piece/s', 'Active', 'AFR-ACC-0003'),
('AFR-ACC-0004D', '1901014025 - Hss Co-Eco Cutter 14x25 (Defective)', 'ACC', 'AFR', 'Piece/s', 'Active', 'AFR-ACC-0004'),
('AFR-ACC-0005D', '1901015025 - Hss Co-Eco Cutter 15x25 (Defective)', 'ACC', 'AFR', 'Piece/s', 'Active', 'AFR-ACC-0005'),
('AFR-ACC-0006D', '1926500 - Ejector Pin 6.35x77 (Defective)', 'ACC', 'AFR', 'Piece/s', 'Active', 'AFR-ACC-0006'),
('AFR-ACC-0007D', '1935500 - Ejector Pin 6.35x87 (Defective)', 'ACC', 'AFR', 'Piece/s', 'Active', 'AFR-ACC-0007'),
('AFR-ACC-0008D', '1950500 - Ejector Pin 6.35x102 (Defective)', 'ACC', 'AFR', 'Piece/s', 'Active', 'AFR-ACC-0008'),
('AFR-ACC-0009D', '2001502 - Ejector Pin 8x160 (Defective)', 'ACC', 'AFR', 'Piece/s', 'Active', 'AFR-ACC-0009'),
('AFR-ACC-0010D', '2001501 - Ejector Pin 8x102 (Defective)', 'ACC', 'AFR', 'Piece/s', 'Active', 'AFR-ACC-0010'),
('AFR-ACC-0011D', '2003012035 - Tct Cutter 12x35 (Defective)', 'ACC', 'AFR', 'Piece/s', 'Active', 'AFR-ACC-0011'),
('AFR-ACC-0012D', '2003012050 - Tct Cutter12x50 (Defective)', 'ACC', 'AFR', 'Piece/s', 'Active', 'AFR-ACC-0012'),
('AFR-ACC-0013D', '2003013035 - Tct Cutter13x35 (Defective)', 'ACC', 'AFR', 'Piece/s', 'Active', 'AFR-ACC-0013'),
('AFR-ACC-0014D', '2003013050 - Tct Cutter13x50 (Defective)', 'ACC', 'AFR', 'Piece/s', 'Active', 'AFR-ACC-0014'),
('AFR-ACC-0015D', '2003014035 - Tct Cutter14x35 (Defective)', 'ACC', 'AFR', 'Piece/s', 'Active', 'AFR-ACC-0015'),
('AFR-PWT-0001D', 'RB35X - Magnetic Drill 1100W 120mm (Defective)', 'PWT', 'AFR', 'Piece/s', 'Active', 'AFR-PWT-0001'),
('AFR-PWT-0002D', 'RB50X - Magnetic Drill 1200W 100mm (Defective)', 'PWT', 'AFR', 'Piece/s', 'Active', 'AFR-PWT-0002'),
('AFR-PWT-0003D', 'RB80X - Magnetic Drill 1800W 100mm (Defective)', 'PWT', 'AFR', 'Piece/s', 'Active', 'AFR-PWT-0003'),
('AFR-PWT-0004D', '60RL-E - Magnetic Drill 1800W 60mm (Defective)', 'PWT', 'AFR', 'Piece/s', 'Active', 'AFR-PWT-0004'),
('AFR-PWT-0005D', '100RL-E - Magnetic Drill 1800W 116mm (Defective)', 'PWT', 'AFR', 'Piece/s', 'Active', 'AFR-PWT-0005'),
('DCA-PWT-0001D', 'ADJZ09-10A - Cordless Driver Drill 12V/1.5Ah (Defective)', 'PWT', 'DCA', 'Piece/s', 'Active', 'DCA-PWT-0001'),
('DCA-PWT-0002D', ' ADJZ13A - Cordless Driver Hammer Drill 18V/3 (Defective)', 'PWT', 'DCA', 'Piece/s', 'Active', 'DCA-PWT-0002'),
('DCA-PWT-0003D', 'ADPL02-8A - Cordless Impact Driver 12V/1.5Ahx (Defective)', 'PWT', 'DCA', 'Piece/s', 'Active', 'DCA-PWT-0003'),
('DCA-PWT-0004D', 'ADPB16A - Cordless Impact Wrench 18V/3Ahx2  (Defective)', 'PWT', 'DCA', 'Piece/s', 'Active', 'DCA-PWT-0004'),
('DCA-PWT-0005D', 'ADMD12 - Cordless Multi-tool12V/1.5Ahx2  (Defective)', 'PWT', 'DCA', 'Piece/s', 'Active', 'DCA-PWT-0005'),
('DCA-PWT-0006D', 'AJG04-355 - Electric Cut Off Machine 355x3x25 (Defective)', 'PWT', 'DCA', 'Piece/s', 'Active', 'DCA-PWT-0006'),
('DCA-PWT-0007D', 'AMY02-185 - Electric Circular Saw 1100W 64mm (Defective)', 'PWT', 'DCA', 'Piece/s', 'Active', 'DCA-PWT-0007'),
('DCA-PWT-0008D', 'AMY235 - Electric Circular Saw 1520W 84mm (Defective)', 'PWT', 'DCA', 'Piece/s', 'Active', 'DCA-PWT-0008'),
('DCA-PWT-0009D', 'AJX255 - Electric Mitre Saw 1650W 255mm  (Defective)', 'PWT', 'DCA', 'Piece/s', 'Active', 'DCA-PWT-0009'),
('DCA-PWT-0010D', 'AJH32 - Electric Nibbler 620W 3.2mm 2.5mm 120  (Defective)', 'PWT', 'DCA', 'Piece/s', 'Active', 'DCA-PWT-0010'),
('DCA-PWT-0011D', 'AZG6 - Percussion Hammer 900W (Defective)', 'PWT', 'DCA', 'Piece/s', 'Active', 'DCA-PWT-0011'),
('DCA-PWT-0012D', 'AZG10 - Percussion Hammer 1500W (Defective)', 'PWT', 'DCA', 'Piece/s', 'Active', 'DCA-PWT-0012'),
('DCA-PWT-0013D', 'AZG15 - Percussion Hammer 1240W (Defective)', 'PWT', 'DCA', 'Piece/s', 'Active', 'DCA-PWT-0013'),
('DCA-PWT-0014D', 'APB20C - Electric Wrench 340W 12.7x12.7mm (Defective)', 'PWT', 'DCA', 'Piece/s', 'Active', 'DCA-PWT-0014'),
('DCA-PWT-0015D', 'AJJ32 - Electric Shear 620W 3.2mm 2.5mm 50mm (Defective)', 'PWT', 'DCA', 'Piece/s', 'Active', 'DCA-PWT-0015'),
('DCA-PWT-0016D', 'AJF30 - Reciprocating Saw 590W 30mm 90mm 90mm (Defective)', 'PWT', 'DCA', 'Piece/s', 'Active', 'DCA-PWT-0016'),
('DCA-PWT-0017D', 'AML02-404 - Electric Chain Saw 1300W 405mm (Defective)', 'PWT', 'DCA', 'Piece/s', 'Active', 'DCA-PWT-0017'),
('DCA-PWT-0018D', 'AQF32 - Electric Blower 680W (Defective)', 'PWT', 'DCA', 'Piece/s', 'Active', 'DCA-PWT-0018'),
('DCA-PWT-0019D', 'AMB82 - Electric Planer 500W 82mm 1m (Defective)', 'PWT', 'DCA', 'Piece/s', 'Active', 'DCA-PWT-0019'),
('DCA-PWT-0020D', 'AMB02-82 - Electric Planer 570W 82mm 1m (Defective)', 'PWT', 'DCA', 'Piece/s', 'Active', 'DCA-PWT-0020'),
('DGR-ACC-0001D', '264D03 - Masonry Drill Bit  Pro-Thread Straig (Defective)', 'ACC', 'DGR', 'Piece/s', 'Active', 'DGR-ACC-0001'),
('DGR-ACC-0002D', '264D04 - Masonry Drill Bit Pro-Thread Straigh (Defective)', 'ACC', 'DGR', 'Piece/s', 'Active', 'DGR-ACC-0002'),
('DGR-ACC-0003D', '264D04.5 - Masonry Drill Bit Pro-Thread Strai (Defective)', 'ACC', 'DGR', 'Piece/s', 'Active', 'DGR-ACC-0003'),
('DGR-ACC-0004D', '264D05 - Masonry Drill Bit Pro-Thread Straigh (Defective)', 'ACC', 'DGR', 'Piece/s', 'Active', 'DGR-ACC-0004'),
('DGR-ACC-0005D', '264D05.5 - Masonry Drill Bit Pro-Thread Strai (Defective)', 'ACC', 'DGR', 'Piece/s', 'Active', 'DGR-ACC-0005'),
('DGR-ACC-0006D', '426D06 - Diamond Core Drilling Blue Ceram 6.0 (Defective)', 'ACC', 'DGR', 'Piece/s', 'Active', 'DGR-ACC-0006'),
('DGR-ACC-0007D', '426D06.5 - Diamond Core Drilling Blue Ceram 6 (Defective)', 'ACC', 'DGR', 'Piece/s', 'Active', 'DGR-ACC-0007'),
('DGR-ACC-0008D', '426D07 - Diamond Core Drilling Blue Ceram 7.0 (Defective)', 'ACC', 'DGR', 'Piece/s', 'Active', 'DGR-ACC-0008'),
('DGR-ACC-0009D', '426D08 - Diamond Core Drilling Blue Ceram 8.0 (Defective)', 'ACC', 'DGR', 'Piece/s', 'Active', 'DGR-ACC-0009'),
('DGR-ACC-0010D', '426D10 - Diamond Core Drilling Blue Ceram 10. (Defective)', 'ACC', 'DGR', 'Piece/s', 'Active', 'DGR-ACC-0010'),
('DGR-ACC-0011D', '726D01 - Hss Metal Drill Bits Pro 1.0x10 (Defective)', 'ACC', 'DGR', 'Piece/s', 'Active', 'DGR-ACC-0011'),
('DGR-ACC-0012D', '726D04.5 - Hss Metal Drill Bits Pro 4.5x10 (Defective)', 'ACC', 'DGR', 'Piece/s', 'Active', 'DGR-ACC-0012'),
('DGR-ACC-0013D', '726D05 - Hss Metal Drill Bits Pro 5.0x10 (Defective)', 'ACC', 'DGR', 'Piece/s', 'Active', 'DGR-ACC-0013'),
('DGR-ACC-0014D', '726D05.2 - Hss Metal Drill Bits Pro 5.2x10 (Defective)', 'ACC', 'DGR', 'Piece/s', 'Active', 'DGR-ACC-0014'),
('DGR-ACC-0015D', '726D05.5 - Hss Metal Drill Bits Pro 5.5x10 (Defective)', 'ACC', 'DGR', 'Piece/s', 'Active', 'DGR-ACC-0015'),
('DGR-ACC-0016D', '650D25 - Holesaw Cobalt Bi-Metal 25mm (Defective)', 'ACC', 'DGR', 'Piece/s', 'Active', 'DGR-ACC-0016'),
('DGR-ACC-0017D', '650D27 - Holesaw Cobalt Bi-Metal 27mm (Defective)', 'ACC', 'DGR', 'Piece/s', 'Active', 'DGR-ACC-0017'),
('DGR-ACC-0018D', '650D29 - Holesaw Cobalt Bi-Metal 29mm (Defective)', 'ACC', 'DGR', 'Piece/s', 'Active', 'DGR-ACC-0018'),
('DGR-ACC-0019D', '650D30 - Holesaw Cobalt Bi-Metal 30mm (Defective)', 'ACC', 'DGR', 'Piece/s', 'Active', 'DGR-ACC-0019'),
('DGR-ACC-0020D', '650D32 - Holesaw Cobalt Bi-Metal 32mm (Defective)', 'ACC', 'DGR', 'Piece/s', 'Active', 'DGR-ACC-0020'),
('LTS-ACC-0001D', 'LAG115N38 - Carbon Brush 3.25x0.8x0.5mm (Defective)', 'ACC', 'LTS', 'Piece/s', 'Active', 'LTS-ACC-0001'),
('LTS-ACC-0002D', 'LID10REN22 - Carbon Brush 3.75x0.75x0.5mm (Defective)', 'ACC', 'LTS', 'Piece/s', 'Active', 'LTS-ACC-0002'),
('LTS-ACC-0003D', 'LID13REN23 - Carbon Brush 3.25x0.90x0.5mm (Defective)', 'ACC', 'LTS', 'Piece/s', 'Active', 'LTS-ACC-0003'),
('LTS-ACC-0004D', 'LPK180N32 - Carbon Brush 2x1x0.75mm (Defective)', 'ACC', 'LTS', 'Piece/s', 'Active', 'LTS-ACC-0004'),
('LTS-ACC-0005D', 'LID13REP21 - Carbon Brush (Defective)', 'ACC', 'LTS', 'Piece/s', 'Active', 'LTS-ACC-0005'),
('LTS-ACC-0006D', 'LAG115CH-45 - Carbon Brush (Defective)', 'ACC', 'LTS', 'Piece/s', 'Active', 'LTS-ACC-0006'),
('LTS-ACC-0007D', 'LAG115SSN29 - Carbon Brush 3.25x0.80x0.5 (Defective)', 'ACC', 'LTS', 'Piece/s', 'Active', 'LTS-ACC-0007'),
('LTS-ACC-0008D', 'LAG115Z1.38 - Carbon Brush (Defective)', 'ACC', 'LTS', 'Piece/s', 'Active', 'LTS-ACC-0008'),
('LTS-ACC-0009D', 'LAT2026.2.32 - Carbon Brush 3.25x0.55x0.5mm (Defective)', 'ACC', 'LTS', 'Piece/s', 'Active', 'LTS-ACC-0009'),
('LTS-ACC-0010D', 'LCOM355H.43 - Carbon Brush (Defective)', 'ACC', 'LTS', 'Piece/s', 'Active', 'LTS-ACC-0010'),
('LTS-HDT-0001D', 'LDG101 - Air Duster (Defective)', 'HDT', 'LTS', 'Piece/s', 'Active', 'LTS-HDT-0001'),
('LTS-HDT-0002D', 'LDG101AD - Air Duster (Defective)', 'HDT', 'LTS', 'Piece/s', 'Active', 'LTS-HDT-0002'),
('LTS-HDT-0003D', 'LDG102 - Air Duster Heavy Duty (Defective)', 'HDT', 'LTS', 'Piece/s', 'Active', 'LTS-HDT-0003'),
('LTS-HDT-0004D', 'LAL3001M - Aluminum Level 12"/300MM (Defective)', 'HDT', 'LTS', 'Piece/s', 'Active', 'LTS-HDT-0004'),
('LTS-HDT-0005D', 'LAL4501M - Aluminum Level 18"/450MM (Defective)', 'HDT', 'LTS', 'Piece/s', 'Active', 'LTS-HDT-0005'),
('LTS-HDT-0006D', 'LAL6001M - Aluminum Level 24"/600MM (Defective)', 'HDT', 'LTS', 'Piece/s', 'Active', 'LTS-HDT-0006'),
('LTS-HDT-0007D', 'LAL9001M - Aluminum Level 36"/900MM (Defective)', 'HDT', 'LTS', 'Piece/s', 'Active', 'LTS-HDT-0007'),
('LTS-HDT-0008D', 'LAS250L - Aviation Snip 10" (Defective)', 'HDT', 'LTS', 'Piece/s', 'Active', 'LTS-HDT-0008'),
('LTS-HDT-0009D', 'LAS250R - Aviation Snip 10" (Defective)', 'HDT', 'LTS', 'Piece/s', 'Active', 'LTS-HDT-0009'),
('LTS-HDT-0010D', 'LAS250S - Aviation Snip 10" (Defective)', 'HDT', 'LTS', 'Piece/s', 'Active', 'LTS-HDT-0010'),
('MXS-PWT-0001D', 'MAB-650 - Air Blower 600W (Defective)', 'PWT', 'MXS', 'Piece/s', 'Active', 'MXS-PWT-0001'),
('MXS-PWT-0002D', 'MSD-720AC - Hole Gun 720W  (Defective)', 'PWT', 'MXS', 'Piece/s', 'Active', 'MXS-PWT-0002'),
('MXS-PWT-0003D', 'MSD-1063VSR - Hammer 630W (Defective)', 'PWT', 'MXS', 'Piece/s', 'Active', 'MXS-PWT-0003'),
('MXS-PWT-0004D', 'MSD-1385VSR - Hammer 850W (Defective)', 'PWT', 'MXS', 'Piece/s', 'Active', 'MXS-PWT-0004'),
('MXS-PWT-0005D', 'MCH-1200 - Chipping Hammer 1200W (Defective)', 'PWT', 'MXS', 'Piece/s', 'Active', 'MXS-PWT-0005'),
('MXS-PWT-0006D', 'MRH-2400B - Rotary Hammer 750W (Defective)', 'PWT', 'MXS', 'Piece/s', 'Active', 'MXS-PWT-0006'),
('MXS-PWT-0007D', 'MRH-3200 - Rotary Hammer 1100W (Defective)', 'PWT', 'MXS', 'Piece/s', 'Active', 'MXS-PWT-0007'),
('MXS-PWT-0008D', 'MRH-3800 - Rotary Hammer 1350W (Defective)', 'PWT', 'MXS', 'Piece/s', 'Active', 'MXS-PWT-0008'),
('MXS-PWT-0009D', 'MSB-1650 - Concrete Breaker 1700W (Defective)', 'PWT', 'MXS', 'Piece/s', 'Active', 'MXS-PWT-0009'),
('MXS-PWT-0010D', 'MSB-2060 - Demolition Hammer 2100W (Defective)', 'PWT', 'MXS', 'Piece/s', 'Active', 'MXS-PWT-0010'),
('MXS-PWT-0011D', 'MSG-5402 - Angle Grinder 600W (Defective)', 'PWT', 'MXS', 'Piece/s', 'Active', 'MXS-PWT-0011'),
('MXS-PWT-0012D', 'MSG-5410 - Angle Grinder 800W (Defective)', 'PWT', 'MXS', 'Piece/s', 'Active', 'MXS-PWT-0012'),
('MXS-PWT-0013D', 'MSG-5420P - Angle Grinder 850W (Defective)', 'PWT', 'MXS', 'Piece/s', 'Active', 'MXS-PWT-0013'),
('MXS-PWT-0014D', 'MLG-5755 - Angle Grinder 2400W (Defective)', 'PWT', 'MXS', 'Piece/s', 'Active', 'MXS-PWT-0014'),
('MXS-PWT-0015D', 'MBG-6250 - Bench Grinder 250W (Defective)', 'PWT', 'MXS', 'Piece/s', 'Active', 'MXS-PWT-0015'),
('MXS-PWT-0016D', 'MBG-8550 - Bench Grinder 370W (Defective)', 'PWT', 'MXS', 'Piece/s', 'Active', 'MXS-PWT-0016'),
('MXS-PWT-0017D', 'MDG-147DAC - Die Grinder 170W (Defective)', 'PWT', 'MXS', 'Piece/s', 'Active', 'MXS-PWT-0017'),
('MXS-PWT-0018D', 'MST-750 - Straight Grinder 710W (Defective)', 'PWT', 'MXS', 'Piece/s', 'Active', 'MXS-PWT-0018'),
('MXS-PWT-0019D', 'MSS-2009 - Cut-Off Saw 1600W (Defective)', 'PWT', 'MXS', 'Piece/s', 'Active', 'MXS-PWT-0019'),
('MXS-PWT-0020D', 'MSS-2008 - Steel Slicer Saw 2800W (Defective)', 'PWT', 'MXS', 'Piece/s', 'Active', 'MXS-PWT-0020'),
('MXT-ACC-0001D', 'MXA-1075 - Knotted Twist Cup Brush 3"x1.25mm (Defective)', 'ACC', 'MXT', 'Piece/s', 'Active', 'MXT-ACC-0001'),
('MXT-ACC-0002D', 'MCW-4060 - Cup Wheel 4" (Defective)', 'ACC', 'MXT', 'Piece/s', 'Active', 'MXT-ACC-0002'),
('MXT-ACC-0003D', 'MTG-1146 - Grinding Wheel 100x6.0mm (Defective)', 'ACC', 'MXT', 'Piece/s', 'Active', 'MXT-ACC-0003'),
('MXT-ACC-0004D', 'MTC-1840 - Continuous Rim 4"/ 105x109x16mm (Defective)', 'ACC', 'MXT', 'Piece/s', 'Active', 'MXT-ACC-0004'),
('MXT-ACC-0005D', 'MXT-4012 - Max-Cut 4"/100x1.2mm (Defective)', 'ACC', 'MXT', 'Piece/s', 'Active', 'MXT-ACC-0005'),
('MXT-ACC-0006D', 'MTC-1025 - Cutting Wheel 100x2.5mm (Defective)', 'ACC', 'MXT', 'Piece/s', 'Active', 'MXT-ACC-0006'),
('MXT-ACC-0007D', 'MXH-2301 - Hss Drill Bit 1.0mm (Defective)', 'ACC', 'MXT', 'Piece/s', 'Active', 'MXT-ACC-0007'),
('MXT-ACC-0008D', 'MXH-2415 - Hss Drill Bit 1.5mm (Defective)', 'ACC', 'MXT', 'Piece/s', 'Active', 'MXT-ACC-0008'),
('MXT-ACC-0009D', 'MXH-2502 - Hss Drill Bit 2.0mm (Defective)', 'ACC', 'MXT', 'Piece/s', 'Active', 'MXT-ACC-0009'),
('MXT-ACC-0010D', 'MXH-2625 - Hss Drill Bit 2.5mm (Defective)', 'ACC', 'MXT', 'Piece/s', 'Active', 'MXT-ACC-0010'),
('MXT-ACC-0011D', 'MXH-2703 - Hss Drill Bit 3.0mm (Defective)', 'ACC', 'MXT', 'Piece/s', 'Active', 'MXT-ACC-0011'),
('MXT-PWT-0001D', 'MXT-2000K - Hot Air Gun 2000W (Defective)', 'PWT', 'MXT', 'Piece/s', 'Active', 'MXT-PWT-0001'),
('MXT-PWT-0002D', 'MTJ-2655A - Jigsaw 400W (Defective)', 'PWT', 'MXT', 'Piece/s', 'Active', 'MXT-PWT-0002'),
('MXT-PWT-0003D', 'MTS-3020 - Sprayer 300W (Defective)', 'PWT', 'MXT', 'Piece/s', 'Active', 'MXT-PWT-0003'),
('MXT-PWT-0004D', 'MAG-101 - Angle Grinder 500W (Defective)', 'PWT', 'MXT', 'Piece/s', 'Active', 'MXT-PWT-0004'),
('MXT-PWT-0005D', 'MAG-200 - Angle Grinder 730W (Defective)', 'PWT', 'MXT', 'Piece/s', 'Active', 'MXT-PWT-0005'),
('MXT-PWT-0006D', 'MTP-7120 - Polisher 1200W (Defective)', 'PWT', 'MXT', 'Piece/s', 'Active', 'MXT-PWT-0006'),
('MXT-PWT-0007D', 'MSD-0645- Electric Drill 420W (Defective)', 'PWT', 'MXT', 'Piece/s', 'Active', 'MXT-PWT-0007'),
('MXT-PWT-0008D', 'MSD-1055VSR - Hammer Drill 550W (Defective)', 'PWT', 'MXT', 'Piece/s', 'Active', 'MXT-PWT-0008'),
('MXT-PWT-0009D', 'MSD-1365VSR - Hammer Drill 650W (Defective)', 'PWT', 'MXT', 'Piece/s', 'Active', 'MXT-PWT-0009'),
('SSS-PWT-0001D', 'SWG-190 - Welding Generator Gasoline 686x550x (Defective)', 'PWT', 'SSS', 'Piece/s', 'Active', 'SSS-PWT-0001'),
('SSS-PWT-0002D', 'SDGW-70-0PT - Welding Generator Diesel 740x49 (Defective)', 'PWT', 'SSS', 'Piece/s', 'Active', 'SSS-PWT-0002'),
('SSS-PWT-0003D', 'SDGL-10S3 - Diesel Generator 1680x790x960mm (Defective)', 'PWT', 'SSS', 'Piece/s', 'Active', 'SSS-PWT-0003'),
('SSS-PWT-0004D', 'SDG-15S - Diesel Generator 1680x760x960mm (Defective)', 'PWT', 'SSS', 'Piece/s', 'Active', 'SSS-PWT-0004'),
('SSS-PWT-0005D', 'SDG-25SIE - Diesel Generator 2010x860x1070mm (Defective)', 'PWT', 'SSS', 'Piece/s', 'Active', 'SSS-PWT-0005'),
('SSS-PWT-0006D', 'SDG-30SIE - Diesel Generator 2010x860x1070mm (Defective)', 'PWT', 'SSS', 'Piece/s', 'Active', 'SSS-PWT-0006'),
('SSS-PWT-0007D', 'SDG-35SIE - Diesel Generator 2010x860x1070mm (Defective)', 'PWT', 'SSS', 'Piece/s', 'Active', 'SSS-PWT-0007'),
('SSS-PWT-0008D', 'SDG-65-0PT - Portable Diesel Generator 720x49 (Defective)', 'PWT', 'SSS', 'Piece/s', 'Active', 'SSS-PWT-0008'),
('SSS-PWT-0009D', 'SDG-396-LN - Portable Diesel Generator 980x56 (Defective)', 'PWT', 'SSS', 'Piece/s', 'Active', 'SSS-PWT-0009'),
('SSS-PWT-0010D', 'SGG-1000 - Portable Gasoline Generator 460x36 (Defective)', 'PWT', 'SSS', 'Piece/s', 'Active', 'SSS-PWT-0010'),
('SSS-PWT-0011D', 'SGG-3100 - Portable Gasoline Generator 593x46 (Defective)', 'PWT', 'SSS', 'Piece/s', 'Active', 'SSS-PWT-0011'),
('SSS-PWT-0012D', 'SGG-396-0PT - Portable Gasoline Generator 683 (Defective)', 'PWT', 'SSS', 'Piece/s', 'Active', 'SSS-PWT-0012'),
('SSS-PWT-0013D', 'SGG-2000i - Portable Inverter Generator 48.6x (Defective)', 'PWT', 'SSS', 'Piece/s', 'Active', 'SSS-PWT-0013'),
('SSS-PWT-0014D', 'RMC-051 - Single Low Bed Cylinder 43mm 30mm (Defective)', 'PWT', 'SSS', 'Piece/s', 'Active', 'SSS-PWT-0014'),
('SSS-PWT-0015D', 'RMC-101 - Single Low Bed Cylinder 47mm 43mm (Defective)', 'PWT', 'SSS', 'Piece/s', 'Active', 'SSS-PWT-0015'),
('SSS-PWT-0016D', 'RMC-201 - Single Low Bed Cylinder 52mm 60mm (Defective)', 'PWT', 'SSS', 'Piece/s', 'Active', 'SSS-PWT-0016'),
('SSS-PWT-0017D', 'RMC-1001 - Single Low Bed Cylinder 86mm 130mm (Defective)', 'PWT', 'SSS', 'Piece/s', 'Active', 'SSS-PWT-0017'),
('SSS-PWT-0018D', 'RMC-2001 - Single Low Bed Cylinder100mm 189mm (Defective)', 'PWT', 'SSS', 'Piece/s', 'Active', 'SSS-PWT-0018'),
('SSS-PWT-0019D', 'RSC-0050 - Single Cylinder133mm 30mm (Defective)', 'PWT', 'SSS', 'Piece/s', 'Active', 'SSS-PWT-0019'),
('SSS-PWT-0020D', 'RSC1050 - Single Cylinder 139mm 43mm (Defective)', 'PWT', 'SSS', 'Piece/s', 'Active', 'SSS-PWT-0020'),
('TFM-ACC-0001D', 'MC0941 - CINA 350 Gas Nozzle (Defective)', 'ACC', 'TFM', 'Piece/s', 'Active', 'TFM-ACC-0001'),
('TFM-ACC-0002D', 'ME0421 - CINA 350 Diffuser (Defective)', 'ACC', 'TFM', 'Piece/s', 'Active', 'TFM-ACC-0002'),
('TFM-ACC-0003D', 'MC1104P - CINA 350 Insulator Nut PANA (Defective)', 'ACC', 'TFM', 'Piece/s', 'Active', 'TFM-ACC-0003'),
('TFM-ACC-0004D', 'ME0426P - CINA 350 Tip Holder of Torch Head (Defective)', 'ACC', 'TFM', 'Piece/s', 'Active', 'TFM-ACC-0004'),
('TFM-ACC-0005D', 'MF0299P - CINA 350 Swan Neck Torch Head PANA (Defective)', 'ACC', 'TFM', 'Piece/s', 'Active', 'TFM-ACC-0005'),
('TFM-ACC-0006D', 'MF0298P - CINA 350 Separable Torch Head PANA (Defective)', 'ACC', 'TFM', 'Piece/s', 'Active', 'TFM-ACC-0006'),
('TFM-ACC-0007D', 'GM0574 - Liner 1-1.4 3m EURO (Defective)', 'ACC', 'TFM', 'Piece/s', 'Active', 'TFM-ACC-0007'),
('TFM-ACC-0008D', 'GM0575 - Liner 1-1.4 4m EURO (Defective)', 'ACC', 'TFM', 'Piece/s', 'Active', 'TFM-ACC-0008'),
('TFM-ACC-0009D', 'FB0319 - Joint with Spring (Defective)', 'ACC', 'TFM', 'Piece/s', 'Active', 'TFM-ACC-0009'),
('TFM-ACC-0010D', 'EA0342 - Spring Cable Support (Defective)', 'ACC', 'TFM', 'Piece/s', 'Active', 'TFM-ACC-0010'),
('TFM-ACC-0011D', 'MC0930 - CINA 200 Gas Nozzle (Defective)', 'ACC', 'TFM', 'Piece/s', 'Active', 'TFM-ACC-0011'),
('TFM-ACC-0012D', 'MF0293 - CINA 200 Torch Head (Defective)', 'ACC', 'TFM', 'Piece/s', 'Active', 'TFM-ACC-0012'),
('TFM-ACC-0013D', 'BW0237 - Front Cable Rubber Support (Defective)', 'ACC', 'TFM', 'Piece/s', 'Active', 'TFM-ACC-0013'),
('TFM-ACC-0014D', 'GM0510 - Red Liner 1-1.2 3m/Euro (Defective)', 'ACC', 'TFM', 'Piece/s', 'Active', 'TFM-ACC-0014'),
('TFM-ACC-0015D', 'GM0511 - Red Liner 1-1.2 4m/Euro (Defective)', 'ACC', 'TFM', 'Piece/s', 'Active', 'TFM-ACC-0015'),
('TFM-ACC-0016D', 'MD0291-08 - Contact Tip 0.8 (Defective)', 'ACC', 'TFM', 'Piece/s', 'Active', 'TFM-ACC-0016'),
('TFM-ACC-0017D', 'MD0291-10 - Contact Tip 1.0 (Defective)', 'ACC', 'TFM', 'Piece/s', 'Active', 'TFM-ACC-0017'),
('TFM-ACC-0018D', 'MD0291-12 - Contact Tip 1.2 (Defective)', 'ACC', 'TFM', 'Piece/s', 'Active', 'TFM-ACC-0018'),
('TFM-ACC-0019D', 'MD0291-16 - Contact Tip 1.6mm (Defective)', 'ACC', 'TFM', 'Piece/s', 'Active', 'TFM-ACC-0019'),
('TFM-ACC-0020D', 'MD0291-80 - Contact Tip 1.0 (Cu, Cr, Zr) (Defective)', 'ACC', 'TFM', 'Piece/s', 'Active', 'TFM-ACC-0020'),
('TKU-ACC-0001D', 'A-1 - Asphat Cutter 540mm (Defective)', 'ACC', 'TKU', 'Piece/s', 'Active', 'TKU-ACC-0001'),
('TKU-ACC-0002D', 'A-4 - Asphat Cutter 505mm (Defective)', 'ACC', 'TKU', 'Piece/s', 'Active', 'TKU-ACC-0002'),
('TKU-ACC-0003D', 'C-1 - Chisel (Narrow) 610mm (Defective)', 'ACC', 'TKU', 'Piece/s', 'Active', 'TKU-ACC-0003'),
('TKU-ACC-0004D', 'C-2 - Chisel (Narrow) 610mm (Defective)', 'ACC', 'TKU', 'Piece/s', 'Active', 'TKU-ACC-0004'),
('TKU-ACC-0005D', 'C-9 - Chisel (Narrow) 475mm (Defective)', 'ACC', 'TKU', 'Piece/s', 'Active', 'TKU-ACC-0005'),
('TKU-ACC-0006D', 'D-1 - Digger Chisel 570mm (Defective)', 'ACC', 'TKU', 'Piece/s', 'Active', 'TKU-ACC-0006'),
('TKU-ACC-0007D', 'D-4 - Digger Chisel 500mm (Defective)', 'ACC', 'TKU', 'Piece/s', 'Active', 'TKU-ACC-0007'),
('TKU-ACC-0008D', 'DW1 - Digger Spade 545mm (Defective)', 'ACC', 'TKU', 'Piece/s', 'Active', 'TKU-ACC-0008'),
('TKU-ACC-0009D', 'DW4 - Digger Spade 490mm (Defective)', 'ACC', 'TKU', 'Piece/s', 'Active', 'TKU-ACC-0009'),
('TKU-ACC-0010D', 'M-1 - Moil Point 620mm (Defective)', 'ACC', 'TKU', 'Piece/s', 'Active', 'TKU-ACC-0010'),
('TKU-HDT-0001D', 'AF-5A - Air Saw/Cutter 5mm (Defective)', 'PWT', 'TKU', 'Piece/s', 'Active', 'TKU-HDT-0001'),
('TKU-HDT-0002D', 'AF-10S - Air Saw/Cutter 10mm (Defective)', 'PWT', 'TKU', 'Piece/s', 'Active', 'TKU-HDT-0002'),
('TKU-HDT-0003D', 'APS-30 - Air Saw/Cutter 30mm (Defective)', 'PWT', 'TKU', 'Piece/s', 'Active', 'TKU-HDT-0003'),
('TKU-HDT-0004D', 'TCD-20 - Concrete Breaker (Defective)', 'PWT', 'TKU', 'Piece/s', 'Active', 'TKU-HDT-0004'),
('TKU-HDT-0005D', 'TAG-40SA - Angle Grinder 100x16mm (Defective)', 'PWT', 'TKU', 'Piece/s', 'Active', 'TKU-HDT-0005'),
('TKU-HDT-0006D', 'MG-20 - Die Grinder (Defective)', 'PWT', 'TKU', 'Piece/s', 'Active', 'TKU-HDT-0006'),
('TKU-HDT-0007D', 'TSG-3F - Straight Grinder 3" (Defective)', 'PWT', 'TKU', 'Piece/s', 'Active', 'TKU-HDT-0007'),
('TKU-HDT-0008D', 'MI-1310 - Impact Wrench 3/8" Straight Body 10 (Defective)', 'PWT', 'TKU', 'Piece/s', 'Active', 'TKU-HDT-0008'),
('TKU-HDT-0009D', 'TH-5S - Rock Drill  (Defective)', 'PWT', 'TKU', 'Piece/s', 'Active', 'TKU-HDT-0009'),
('TKU-HDT-0010D', 'MS-4125B - Sander and Polisher 3" -5" (Defective)', 'PWT', 'TKU', 'Piece/s', 'Active', 'TKU-HDT-0010');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `empID` int(5) NOT NULL,
  `empFirstName` varchar(45) NOT NULL,
  `empLastName` varchar(45) NOT NULL,
  `empExtensionName` varchar(45) DEFAULT NULL,
  `empMidName` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empID`, `empFirstName`, `empLastName`, `empExtensionName`, `empMidName`, `status`) VALUES
(1, 'Miguel', 'Arimbuyutan', 'Mike', 'Fernandez', 'Active'),
(2, 'Cynthia', 'Buizn', '-', 'Cargamento', 'Active'),
(3, 'Haneyly Faye Anne', 'Del Rosario', 'Haney', 'Calindas', 'Active'),
(4, 'Emelita', 'Flores', '-', 'Labita', 'Active'),
(5, 'Kevin', 'Flores', '-', 'Labita', 'Active'),
(6, 'Kier', 'Flores', '-', 'Labita', 'Active'),
(7, 'Teodelio', 'Galope', 'TJ', 'Costales', 'Active'),
(8, 'Christian', 'Granzon', 'King', 'Dulay', 'Active'),
(9, 'Dave', 'Jarilla', 'Travis', 'Zeta', 'Active'),
(10, 'Christopher', 'Landicho', 'Chris', 'Nadera', 'Active'),
(11, 'Ronald', 'Landicho', 'Moe', 'Nadera', 'Active'),
(12, 'Kharol', 'Limpayos', '-', 'Dolpa', 'Active'),
(13, 'Kenneth', 'Llaneras', '-', 'Eguia', 'Active'),
(14, 'Calixto', 'Mislang', 'Calex', 'Samson', 'Active'),
(15, 'Raymond', 'Plmos', 'Mon', 'Lopez', 'Active'),
(16, 'Julius', 'Rilloraza', '-', 'Resari', 'Active'),
(17, 'Maria Christina', 'Tayaban', 'Tintin', 'Morales', 'Active'),
(18, 'Jovin', 'Tuazon', '-', 'Doroteo', 'Active'),
(19, 'Romel', 'Vargas', 'James', 'Mapalo', 'Active'),
(20, 'Gerome', 'Visalo', '-', 'Labita', 'Active'),
(26, 'William', 'Egtapen', 'Cheeselegs', 'G', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `incoming`
--

CREATE TABLE `incoming` (
  `inID` int(5) NOT NULL,
  `inQty` int(5) NOT NULL,
  `inDate` date NOT NULL,
  `receiptNo` varchar(25) NOT NULL,
  `receiptDate` date DEFAULT NULL,
  `supplier` varchar(45) DEFAULT NULL,
  `inRemarks` varchar(25) DEFAULT 'None',
  `status` varchar(45) DEFAULT 'Complete',
  `partialRcptNo` varchar(45) DEFAULT 'None',
  `partialRcptDate` date DEFAULT NULL,
  `empID` int(5) NOT NULL,
  `prodID` varchar(25) NOT NULL,
  `userID` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incoming`
--

INSERT INTO `incoming` (`inID`, `inQty`, `inDate`, `receiptNo`, `receiptDate`, `supplier`, `inRemarks`, `status`, `partialRcptNo`, `partialRcptDate`, `empID`, `prodID`, `userID`) VALUES
(1, 75, '2017-03-02', 'RE2183', '2017-03-01', 'Alphine', 'None', 'Complete', NULL, NULL, 15, 'AFR-ACC-0001', NULL),
(2, 75, '2017-03-02', 'RE2183', '2017-03-01', 'Alphine', 'None', 'Complete', NULL, NULL, 15, 'AFR-ACC-0002', NULL),
(3, 75, '2017-03-02', 'RE2183', '2017-03-01', 'Alphine', 'None', 'Complete', NULL, NULL, 15, 'AFR-ACC-0003', NULL),
(4, 75, '2017-03-02', 'RE2183', '2017-03-01', 'Alphine', 'None', 'Complete', NULL, NULL, 15, 'AFR-ACC-0004', NULL),
(5, 75, '2017-03-02', 'RE2183', '2017-03-01', 'Alphine', 'None', 'Complete', NULL, NULL, 15, 'AFR-ACC-0005', NULL),
(6, 150, '2017-03-02', 'RE2183', '2017-03-01', 'Alphine', 'None', 'Complete', NULL, NULL, 15, 'AFR-ACC-0006', NULL),
(7, 150, '2017-03-02', 'RE2183', '2017-03-01', 'Alphine', 'None', 'Complete', NULL, NULL, 15, 'AFR-ACC-0007', NULL),
(8, 150, '2017-03-02', 'RE2183', '2017-03-01', 'Alphine', 'None', 'Complete', NULL, NULL, 15, 'AFR-ACC-0008', NULL),
(9, 150, '2017-03-02', 'RE2183', '2017-03-01', 'Alphine', 'None', 'Complete', NULL, NULL, 15, 'AFR-ACC-0009', NULL),
(10, 150, '2017-03-02', 'RE2183', '2017-03-01', 'Alphine', 'None', 'Complete', NULL, NULL, 15, 'AFR-ACC-0010', NULL),
(11, 100, '2017-03-02', 'RE2183', '2017-03-01', 'Alphine', 'None', 'Complete', NULL, NULL, 15, 'AFR-PWT-0001', NULL),
(12, 100, '2017-03-02', 'RE2183', '2017-03-01', 'Alphine', 'None', 'Complete', NULL, NULL, 15, 'AFR-PWT-0002', NULL),
(13, 100, '2017-03-02', 'RE2183', '2017-03-01', 'Alphine', 'None', 'Complete', NULL, NULL, 15, 'AFR-PWT-0003', NULL),
(14, 100, '2017-03-02', 'RE2183', '2017-03-01', 'Alphine', 'None', 'Complete', NULL, NULL, 15, 'AFR-PWT-0004', NULL),
(15, 100, '2017-03-02', 'RE2183', '2017-03-01', 'Alphine', 'None', 'Complete', NULL, NULL, 15, 'AFR-PWT-0005', NULL),
(16, 100, '2017-03-02', 'N8203', '2017-03-01', 'Amity', 'None', 'Complete', NULL, NULL, 19, 'MXS-PWT-0001', NULL),
(17, 30, '2017-03-02', 'N8203', '2017-03-01', 'Amity', 'None', 'Complete', NULL, NULL, 19, 'MXS-PWT-0002', NULL),
(18, 30, '2017-03-02', 'N8203', '2017-03-01', 'Amity', 'None', 'Complete', NULL, NULL, 19, 'MXS-PWT-0003', NULL),
(19, 30, '2017-03-02', 'N8203', '2017-03-01', 'Amity', 'None', 'Complete', NULL, NULL, 19, 'MXS-PWT-0004', NULL),
(20, 30, '2017-03-02', 'N8203', '2017-03-01', 'Amity', 'None', 'Complete', NULL, NULL, 19, 'MXS-PWT-0005', NULL),
(21, 30, '2017-03-02', 'N8203', '2017-03-01', 'Amity', 'None', 'Complete', NULL, NULL, 19, 'MXS-PWT-0006', NULL),
(22, 30, '2017-03-02', 'N8203', '2017-03-01', 'Amity', 'None', 'Complete', NULL, NULL, 19, 'MXS-PWT-0007', NULL),
(23, 30, '2017-03-02', 'N8203', '2017-03-01', 'Amity', 'None', 'Complete', NULL, NULL, 19, 'MXS-PWT-0008', NULL),
(24, 30, '2017-03-02', 'N8203', '2017-03-01', 'Amity', 'None', 'Complete', NULL, NULL, 19, 'MXS-PWT-0009', NULL),
(25, 30, '2017-03-02', 'N8203', '2017-03-01', 'Amity', 'None', 'Complete', NULL, NULL, 19, 'MXS-PWT-0010', NULL),
(26, 30, '2017-03-02', 'L2938', '2017-03-01', 'Philman', 'None', 'Complete', NULL, NULL, 12, 'LTS-ACC-0001', NULL),
(27, 30, '2017-03-02', 'L2938', '2017-03-01', 'Philman', 'None', 'Complete', NULL, NULL, 12, 'LTS-ACC-0002', NULL),
(28, 30, '2017-03-02', 'L2938', '2017-03-01', 'Philman', 'None', 'Complete', NULL, NULL, 12, 'LTS-ACC-0003', NULL),
(29, 30, '2017-03-02', 'L2938', '2017-03-01', 'Philman', 'None', 'Complete', NULL, NULL, 12, 'LTS-ACC-0004', NULL),
(30, 30, '2017-03-02', 'L2938', '2017-03-01', 'Philman', 'None', 'Complete', NULL, NULL, 12, 'LTS-ACC-0005', NULL),
(31, 50, '2017-03-02', 'L2938', '2017-03-01', 'Philman', 'None', 'Complete', NULL, NULL, 12, 'LTS-ACC-0006', NULL),
(32, 50, '2017-03-02', 'L2938', '2017-03-01', 'Philman', 'None', 'Complete', NULL, NULL, 12, 'LTS-ACC-0007', NULL),
(33, 50, '2017-03-02', 'L2938', '2017-03-01', 'Philman', 'None', 'Complete', NULL, NULL, 12, 'LTS-ACC-0008', NULL),
(34, 50, '2017-03-02', 'L2938', '2017-03-01', 'Philman', 'None', 'Complete', NULL, NULL, 12, 'LTS-ACC-0009', NULL),
(35, 50, '2017-03-02', 'L2938', '2017-03-01', 'Philman', 'None', 'Complete', NULL, NULL, 12, 'LTS-ACC-0010', NULL),
(36, 50, '2017-03-02', 'LP019', '2017-03-01', 'Beesin', 'None', 'Complete', NULL, NULL, 12, 'TFM-ACC-0001', NULL),
(37, 50, '2017-03-02', 'LP019', '2017-03-01', 'Beesin', 'None', 'Complete', NULL, NULL, 6, 'TFM-ACC-0002', NULL),
(38, 50, '2017-03-02', 'LP019', '2017-03-01', 'Beesin', 'None', 'Complete', NULL, NULL, 6, 'TFM-ACC-0003', NULL),
(39, 50, '2017-03-02', 'LP019', '2017-03-01', 'Beesin', 'None', 'Complete', NULL, NULL, 6, 'TFM-ACC-0004', NULL),
(40, 50, '2017-03-02', 'LP019', '2017-03-01', 'Beesin', 'None', 'Complete', NULL, NULL, 6, 'TFM-ACC-0005', NULL),
(41, 30, '2017-03-02', 'LP019', '2017-03-01', 'Beesin', 'None', 'Complete', NULL, NULL, 6, 'TFM-ACC-0006', NULL),
(42, 30, '2017-03-02', 'LP019', '2017-03-01', 'Beesin', 'None', 'Complete', NULL, NULL, 6, 'TFM-ACC-0007', NULL),
(43, 30, '2017-03-02', 'LP019', '2017-03-01', 'Beesin', 'None', 'Complete', NULL, NULL, 6, 'TFM-ACC-0008', NULL),
(44, 30, '2017-03-02', 'LP019', '2017-03-01', 'Beesin', 'None', 'Complete', NULL, NULL, 6, 'TFM-ACC-0009', NULL),
(45, 30, '2017-03-02', 'LP019', '2017-03-01', 'Beesin', 'None', 'Complete', NULL, NULL, 6, 'TFM-ACC-0010', NULL),
(46, 50, '2017-03-02', 'LP019', '2017-03-01', 'Beesin', 'None', 'Complete', NULL, NULL, 6, 'TFM-ACC-0011', NULL),
(47, 50, '2017-03-02', 'LP019', '2017-03-01', 'Beesin', 'None', 'Complete', NULL, NULL, 6, 'TFM-ACC-0012', NULL),
(48, 50, '2017-03-02', 'LP019', '2017-03-01', 'Beesin', 'None', 'Complete', NULL, NULL, 6, 'TFM-ACC-0013', NULL),
(49, 50, '2017-03-02', 'LP019', '2017-03-01', 'Beesin', 'None', 'Complete', NULL, NULL, 6, 'TFM-ACC-0014', NULL),
(50, 50, '2017-03-02', 'LP019', '2017-03-01', 'Beesin', 'None', 'Complete', NULL, NULL, 6, 'TFM-ACC-0015', NULL),
(51, 50, '2017-03-02', 'OL023', '2017-03-01', 'Elcabo Trading', 'None', 'Complete', NULL, NULL, 14, 'TKU-ACC-0001', NULL),
(52, 50, '2017-03-02', 'OL023', '2017-03-01', 'Elcabo Trading', 'None', 'Complete', NULL, NULL, 14, 'TKU-ACC-0002', NULL),
(53, 50, '2017-03-02', 'OL023', '2017-03-01', 'Elcabo Trading', 'None', 'Complete', NULL, NULL, 14, 'TKU-ACC-0003', NULL),
(54, 50, '2017-03-02', 'OL023', '2017-03-01', 'Elcabo Trading', 'None', 'Complete', NULL, NULL, 14, 'TKU-ACC-0004', NULL),
(55, 50, '2017-03-02', 'OL023', '2017-03-01', 'Elcabo Trading', 'None', 'Complete', NULL, NULL, 14, 'TKU-ACC-0005', NULL),
(56, 40, '2017-03-02', 'OL023', '2017-03-01', 'Elcabo Trading', 'None', 'Complete', NULL, NULL, 14, 'TKU-ACC-0006', NULL),
(57, 40, '2017-03-02', 'OL023', '2017-03-01', 'Elcabo Trading', 'None', 'Complete', NULL, NULL, 14, 'TKU-ACC-0007', NULL),
(58, 40, '2017-03-02', 'OL023', '2017-03-01', 'Elcabo Trading', 'None', 'Complete', NULL, NULL, 14, 'TKU-ACC-0008', NULL),
(59, 40, '2017-03-02', 'OL023', '2017-03-01', 'Elcabo Trading', 'None', 'Complete', NULL, NULL, 14, 'TKU-ACC-0009', NULL),
(60, 40, '2017-03-02', 'OL023', '2017-03-01', 'Elcabo Trading', 'None', 'Complete', NULL, NULL, 14, 'TKU-ACC-0010', NULL),
(61, 15, '2017-03-03', 'PL92H', '2017-03-03', 'Ohayo', 'None', 'Complete', NULL, NULL, 6, 'SSS-PWT-0001', NULL),
(62, 15, '2017-03-03', 'PL92H', '2017-03-03', 'Ohayo', 'None', 'Complete', NULL, NULL, 6, 'SSS-PWT-0002', NULL),
(63, 15, '2017-03-03', 'PL92H', '2017-03-03', 'Ohayo', 'None', 'Complete', NULL, NULL, 6, 'SSS-PWT-0003', NULL),
(64, 15, '2017-03-03', 'PL92H', '2017-03-03', 'Ohayo', 'None', 'Complete', NULL, NULL, 6, 'SSS-PWT-0004', NULL),
(65, 15, '2017-03-03', 'PL92H', '2017-03-03', 'Ohayo', 'None', 'Complete', NULL, NULL, 6, 'SSS-PWT-0005', NULL),
(66, 15, '2017-03-03', 'PL92H', '2017-03-03', 'Ohayo', 'None', 'Complete', NULL, NULL, 6, 'SSS-PWT-0006', NULL),
(67, 15, '2017-03-03', 'PL92H', '2017-03-03', 'Ohayo', 'None', 'Complete', NULL, NULL, 6, 'SSS-PWT-0007', NULL),
(68, 15, '2017-03-03', 'PL92H', '2017-03-03', 'Ohayo', 'None', 'Complete', NULL, NULL, 6, 'SSS-PWT-0008', NULL),
(69, 15, '2017-03-03', 'PL92H', '2017-03-03', 'Ohayo', 'None', 'Complete', NULL, NULL, 6, 'SSS-PWT-0009', NULL),
(70, 15, '2017-03-03', 'PL92H', '2017-03-03', 'Ohayo', 'None', 'Complete', NULL, NULL, 6, 'SSS-PWT-0010', NULL),
(71, 15, '2017-03-03', 'PL92H', '2017-03-03', 'Ohayo', 'None', 'Complete', NULL, NULL, 6, 'SSS-PWT-0011', NULL),
(72, 15, '2017-03-03', 'PL92H', '2017-03-03', 'Ohayo', 'None', 'Complete', NULL, NULL, 6, 'SSS-PWT-0012', NULL),
(73, 15, '2017-03-03', 'PL92H', '2017-03-03', 'Ohayo', 'None', 'Complete', NULL, NULL, 6, 'SSS-PWT-0013', NULL),
(74, 15, '2017-03-03', 'PL92H', '2017-03-03', 'Ohayo', 'None', 'Complete', NULL, NULL, 6, 'SSS-PWT-0014', NULL),
(75, 15, '2017-03-03', 'PL92H', '2017-03-03', 'Ohayo', 'None', 'Complete', NULL, NULL, 6, 'SSS-PWT-0015', NULL),
(76, 15, '2017-03-03', 'PL92H', '2017-03-03', 'Ohayo', 'None', 'Complete', NULL, NULL, 6, 'SSS-PWT-0016', NULL),
(77, 15, '2017-03-03', 'PL92H', '2017-03-03', 'Ohayo', 'None', 'Complete', NULL, NULL, 6, 'SSS-PWT-0017', NULL),
(78, 15, '2017-03-03', 'PL92H', '2017-03-03', 'Ohayo', 'None', 'Complete', NULL, NULL, 6, 'SSS-PWT-0018', NULL),
(79, 15, '2017-03-03', 'PL92H', '2017-03-03', 'Ohayo', 'None', 'Complete', NULL, NULL, 6, 'SSS-PWT-0019', NULL),
(80, 15, '2017-03-03', 'PL92H', '2017-03-03', 'Ohayo', 'None', 'Complete', NULL, NULL, 6, 'SSS-PWT-0020', NULL),
(81, 40, '2017-03-03', 'BH923', '2017-03-03', 'New Royal', 'None', 'Complete', NULL, NULL, 7, 'DCA-PWT-0001', NULL),
(82, 40, '2017-03-03', 'BH923', '2017-03-03', 'New Royal', 'None', 'Complete', NULL, NULL, 7, 'DCA-PWT-0002', NULL),
(83, 40, '2017-03-03', 'BH923', '2017-03-03', 'New Royal', 'None', 'Complete', NULL, NULL, 7, 'DCA-PWT-0003', NULL),
(84, 40, '2017-03-03', 'BH923', '2017-03-03', 'New Royal', 'None', 'Complete', NULL, NULL, 7, 'DCA-PWT-0004', NULL),
(85, 40, '2017-03-03', 'BH923', '2017-03-03', 'New Royal', 'None', 'Complete', NULL, NULL, 7, 'DCA-PWT-0005', NULL),
(86, 40, '2017-03-03', 'BH923', '2017-03-03', 'New Royal', 'None', 'Complete', NULL, NULL, 7, 'DCA-PWT-0006', NULL),
(87, 40, '2017-03-03', 'BH923', '2017-03-03', 'New Royal', 'None', 'Complete', NULL, NULL, 7, 'DCA-PWT-0007', NULL),
(88, 40, '2017-03-03', 'BH923', '2017-03-03', 'New Royal', 'None', 'Complete', NULL, NULL, 7, 'DCA-PWT-0008', NULL),
(89, 40, '2017-03-03', 'BH923', '2017-03-03', 'New Royal', 'None', 'Complete', NULL, NULL, 7, 'DCA-PWT-0009', NULL),
(90, 40, '2017-03-03', 'BH923', '2017-03-03', 'New Royal', 'None', 'Complete', NULL, NULL, 7, 'DCA-PWT-0010', NULL),
(91, 40, '2017-03-03', 'BH923', '2017-03-03', 'New Royal', 'None', 'Complete', NULL, NULL, 7, 'DCA-PWT-0011', NULL),
(92, 40, '2017-03-03', 'BH923', '2017-03-03', 'New Royal', 'None', 'Complete', NULL, NULL, 7, 'DCA-PWT-0012', NULL),
(93, 40, '2017-03-03', 'BH923', '2017-03-03', 'New Royal', 'None', 'Complete', NULL, NULL, 7, 'DCA-PWT-0013', NULL),
(94, 40, '2017-03-03', 'BH923', '2017-03-03', 'New Royal', 'None', 'Complete', NULL, NULL, 7, 'DCA-PWT-0014', NULL),
(95, 40, '2017-03-03', 'BH923', '2017-03-03', 'New Royal', 'None', 'Complete', NULL, NULL, 7, 'DCA-PWT-0015', NULL),
(96, 40, '2017-03-03', 'BH923', '2017-03-03', 'New Royal', 'None', 'Complete', NULL, NULL, 7, 'DCA-PWT-0016', NULL),
(97, 40, '2017-03-03', 'BH923', '2017-03-03', 'New Royal', 'None', 'Complete', NULL, NULL, 7, 'DCA-PWT-0017', NULL),
(98, 40, '2017-03-03', 'BH923', '2017-03-03', 'New Royal', 'None', 'Complete', NULL, NULL, 7, 'DCA-PWT-0018', NULL),
(99, 40, '2017-03-03', 'BH923', '2017-03-03', 'New Royal', 'None', 'Complete', NULL, NULL, 7, 'DCA-PWT-0019', NULL),
(100, 40, '2017-03-03', 'BH923', '2017-03-03', 'New Royal', 'None', 'Complete', NULL, NULL, 7, 'DCA-PWT-0020', NULL),
(101, 40, '2017-03-03', 'MLI83', '2017-03-03', 'Century Trace', 'None', 'Complete', NULL, NULL, 14, 'LTS-HDT-0001', NULL),
(102, 40, '2017-03-03', 'MLI83', '2017-03-03', 'Century Trace', 'None', 'Complete', NULL, NULL, 14, 'LTS-HDT-0002', NULL),
(103, 40, '2017-03-03', 'MLI83', '2017-03-03', 'Century Trace', 'None', 'Complete', NULL, NULL, 14, 'LTS-HDT-0003', NULL),
(104, 40, '2017-03-03', 'MLI83', '2017-03-03', 'Century Trace', 'None', 'Complete', NULL, NULL, 14, 'LTS-HDT-0004', NULL),
(105, 40, '2017-03-03', 'MLI83', '2017-03-03', 'Century Trace', 'None', 'Complete', NULL, NULL, 14, 'LTS-HDT-0005', NULL),
(106, 40, '2017-03-03', 'MLI83', '2017-03-03', 'Century Trace', 'None', 'Complete', NULL, NULL, 14, 'LTS-HDT-0006', NULL),
(107, 40, '2017-03-03', 'MLI83', '2017-03-03', 'Century Trace', 'None', 'Complete', NULL, NULL, 14, 'LTS-HDT-0007', NULL),
(108, 40, '2017-03-03', 'MLI83', '2017-03-03', 'Century Trace', 'None', 'Complete', NULL, NULL, 14, 'LTS-HDT-0008', NULL),
(109, 40, '2017-03-03', 'MLI83', '2017-03-03', 'Century Trace', 'None', 'Complete', NULL, NULL, 14, 'LTS-HDT-0009', NULL),
(110, 40, '2017-03-03', 'MLI83', '2017-03-03', 'Century Trace', 'None', 'Complete', NULL, NULL, 14, 'LTS-HDT-0010', NULL),
(111, 100, '2017-03-03', 'N712H', '2017-03-03', 'Golden Field', 'None', 'Complete', NULL, NULL, 13, 'MXT-ACC-0001', NULL),
(112, 100, '2017-03-03', 'N712H', '2017-03-03', 'Golden Field', 'None', 'Complete', NULL, NULL, 13, 'MXT-ACC-0002', NULL),
(113, 100, '2017-03-03', 'N712H', '2017-03-03', 'Golden Field', 'None', 'Complete', NULL, NULL, 13, 'MXT-ACC-0003', NULL),
(114, 100, '2017-03-03', 'N712H', '2017-03-03', 'Golden Field', 'None', 'Complete', NULL, NULL, 13, 'MXT-ACC-0004', NULL),
(115, 100, '2017-03-03', 'N712H', '2017-03-03', 'Golden Field', 'None', 'Complete', NULL, NULL, 13, 'MXT-ACC-0005', NULL),
(116, 100, '2017-03-03', 'N712H', '2017-03-03', 'Golden Field', 'None', 'Complete', NULL, NULL, 13, 'MXT-ACC-0006', NULL),
(117, 100, '2017-03-03', 'N712H', '2017-03-03', 'Golden Field', 'None', 'Complete', NULL, NULL, 13, 'MXT-ACC-0007', NULL),
(118, 100, '2017-03-03', 'N712H', '2017-03-03', 'Golden Field', 'None', 'Complete', NULL, NULL, 13, 'MXT-ACC-0008', NULL),
(119, 100, '2017-03-03', 'N712H', '2017-03-03', 'Golden Field', 'None', 'Complete', NULL, NULL, 13, 'MXT-ACC-0009', NULL),
(120, 100, '2017-03-03', 'N712H', '2017-03-03', 'Golden Field', 'None', 'Complete', NULL, NULL, 13, 'MXT-ACC-0010', NULL),
(121, 30, '2017-03-03', 'N712H', '2017-03-03', 'Golden Field', 'None', 'Complete', NULL, NULL, 13, 'MXT-PWT-0001', NULL),
(122, 30, '2017-03-03', 'N712H', '2017-03-03', 'Golden Field', 'None', 'Complete', NULL, NULL, 13, 'MXT-PWT-0002', NULL),
(123, 30, '2017-03-03', 'N712H', '2017-03-03', 'Golden Field', 'None', 'Complete', NULL, NULL, 13, 'MXT-PWT-0003', NULL),
(124, 30, '2017-03-03', 'N712H', '2017-03-03', 'Golden Field', 'None', 'Complete', NULL, NULL, 13, 'MXT-PWT-0004', NULL),
(125, 30, '2017-03-03', 'N712H', '2017-03-03', 'Golden Field', 'None', 'Complete', NULL, NULL, 13, 'MXT-PWT-0005', NULL),
(126, 30, '2017-03-03', 'N712H', '2017-03-03', 'Golden Field', 'None', 'Complete', NULL, NULL, 13, 'MXT-PWT-0006', NULL),
(127, 30, '2017-03-03', 'N712H', '2017-03-03', 'Golden Field', 'None', 'Complete', NULL, NULL, 13, 'MXT-PWT-0007', NULL),
(128, 30, '2017-03-03', 'N712H', '2017-03-03', 'Golden Field', 'None', 'Complete', NULL, NULL, 13, 'MXT-PWT-0008', NULL),
(129, 30, '2017-03-03', 'N712H', '2017-03-03', 'Golden Field', 'None', 'Complete', NULL, NULL, 13, 'MXT-PWT-0009', NULL),
(130, 30, '2017-03-03', 'N712H', '2017-03-03', 'Golden Field', 'None', 'Complete', NULL, NULL, 13, 'MXT-PWT-0010', NULL),
(131, 30, '2017-03-03', 'K87Hk', '2017-03-03', 'Vanity', 'None', 'Complete', NULL, NULL, 13, 'AFR-PWT-0001', NULL),
(132, 30, '2017-03-03', 'K87Hk', '2017-03-03', 'Vanity', 'None', 'Complete', NULL, NULL, 13, 'AFR-PWT-0002', NULL),
(133, 30, '2017-03-03', 'K87Hk', '2017-03-03', 'Vanity', 'None', 'Complete', NULL, NULL, 13, 'AFR-PWT-0003', NULL),
(134, 30, '2017-03-03', 'K87Hk', '2017-03-03', 'Vanity', 'None', 'Complete', NULL, NULL, 13, 'AFR-PWT-0004', NULL),
(135, 30, '2017-03-03', 'K87Hk', '2017-03-03', 'Vanity', 'None', 'Complete', NULL, NULL, 13, 'AFR-PWT-0005', NULL),
(136, 50, '2017-03-04', 'YDHL927', '2017-03-03', 'Quantech', 'None', 'Complete', NULL, NULL, 1, 'TKU-HDT-0010', NULL),
(137, 50, '2017-03-04', 'YDHL927', '2017-03-04', 'Quantech', 'None', 'Complete', NULL, NULL, 1, 'TKU-HDT-0009', NULL),
(138, 50, '2017-03-04', 'YDHL927', '2017-03-04', 'Quantech', 'None', 'Complete', NULL, NULL, 1, 'TKU-HDT-0008', NULL),
(139, 50, '2017-03-04', 'YDHL927', '2017-03-04', 'Quantech', 'None', 'Complete', NULL, NULL, 1, 'TKU-HDT-0007', NULL),
(140, 50, '2017-03-04', 'YDHL927', '2017-03-04', 'Quantech', 'None', 'Complete', NULL, NULL, 1, 'TKU-HDT-0006', NULL),
(141, 50, '2017-03-04', 'YDHL927', '2017-03-04', 'Quantech', 'None', 'Complete', NULL, NULL, 1, 'TKU-HDT-0005', NULL),
(142, 50, '2017-03-04', 'YDHL927', '2017-03-04', 'Quantech', 'None', 'Complete', NULL, NULL, 1, 'TKU-HDT-0004', NULL),
(143, 50, '2017-03-04', 'YDHL927', '2017-03-04', 'Quantech', 'None', 'Complete', NULL, NULL, 1, 'TKU-HDT-0003', NULL),
(144, 50, '2017-03-04', 'YDHL927', '2017-03-04', 'Quantech', 'None', 'Complete', NULL, NULL, 1, 'TKU-HDT-0002', NULL),
(145, 50, '2017-03-04', 'YDHL927', '2017-03-04', 'Quantech', 'None', 'Complete', NULL, NULL, 1, 'TKU-HDT-0001', NULL),
(146, 150, '2017-03-04', 'MP018', '2017-03-04', 'Hans Corp', 'None', 'Complete', NULL, NULL, 2, 'AFR-ACC-0010', NULL),
(147, 100, '2017-03-04', 'MP018', '2017-03-04', 'Hans Corp', 'None', 'Complete', NULL, NULL, 2, 'AFR-ACC-0011', NULL),
(148, 100, '2017-03-04', 'MP018', '2017-03-04', 'Hans Corp', 'None', 'Complete', NULL, NULL, 2, 'AFR-ACC-0012', NULL),
(149, 100, '2017-03-04', 'MP018', '2017-03-04', 'Hans Corp', 'None', 'Complete', NULL, NULL, 2, 'AFR-ACC-0013', NULL),
(150, 100, '2017-03-04', 'MP018', '2017-03-04', 'Hans Corp', 'None', 'Complete', NULL, NULL, 2, 'AFR-ACC-0014', NULL),
(151, 100, '2017-03-04', 'MP018', '2017-03-04', 'Hans Corp', 'None', 'Complete', NULL, NULL, 2, 'AFR-ACC-0015', NULL),
(152, 150, '2017-03-04', '79NJK', '2017-03-04', 'Seaking', 'None', 'Complete', NULL, NULL, 7, 'DGR-ACC-0001', NULL),
(153, 150, '2017-03-04', '79NJK', '2017-03-04', 'Seaking', 'None', 'Complete', NULL, NULL, 7, 'DGR-ACC-0002', NULL),
(154, 150, '2017-03-04', '79NJK', '2017-03-04', 'Seaking', 'None', 'Complete', NULL, NULL, 7, 'DGR-ACC-0003', NULL),
(155, 150, '2017-03-04', '79NJK', '2017-03-04', 'Seaking', 'None', 'Complete', NULL, NULL, 7, 'DGR-ACC-0004', NULL),
(156, 150, '2017-03-04', '79NJK', '2017-03-04', 'Seaking', 'None', 'Complete', NULL, NULL, 7, 'DGR-ACC-0005', NULL),
(157, 150, '2017-03-04', '79NJK', '2017-03-04', 'Seaking', 'None', 'Complete', NULL, NULL, 7, 'DGR-ACC-0006', NULL),
(158, 150, '2017-03-04', '79NJK', '2017-03-04', 'Seaking', 'None', 'Complete', NULL, NULL, 7, 'DGR-ACC-0007', NULL),
(159, 150, '2017-03-04', '79NJK', '2017-03-04', 'Seaking', 'None', 'Complete', NULL, NULL, 7, 'DGR-ACC-0008', NULL),
(160, 150, '2017-03-04', '79NJK', '2017-03-04', 'Seaking', 'None', 'Complete', NULL, NULL, 7, 'DGR-ACC-0009', NULL),
(161, 150, '2017-03-04', '79NJK', '2017-03-04', 'Seaking', 'None', 'Complete', NULL, NULL, 7, 'DGR-ACC-0010', NULL),
(162, 150, '2017-03-04', '79NJK', '2017-03-04', 'Seaking', 'None', 'Complete', NULL, NULL, 7, 'DGR-ACC-0011', NULL),
(163, 150, '2017-03-04', '79NJK', '2017-03-04', 'Seaking', 'None', 'Complete', NULL, NULL, 7, 'DGR-ACC-0012', NULL),
(164, 150, '2017-03-04', '79NJK', '2017-03-04', 'Seaking', 'None', 'Complete', NULL, NULL, 7, 'DGR-ACC-0013', NULL),
(165, 150, '2017-03-04', '79NJK', '2017-03-04', 'Seaking', 'None', 'Complete', NULL, NULL, 7, 'DGR-ACC-0014', NULL),
(166, 150, '2017-03-04', '79NJK', '2017-03-04', 'Seaking', 'None', 'Complete', NULL, NULL, 7, 'DGR-ACC-0015', NULL),
(167, 150, '2017-03-04', '79NJK', '2017-03-04', 'Seaking', 'None', 'Complete', NULL, NULL, 7, 'DGR-ACC-0016', NULL),
(168, 150, '2017-03-04', '79NJK', '2017-03-04', 'Seaking', 'None', 'Complete', NULL, NULL, 7, 'DGR-ACC-0017', NULL),
(169, 150, '2017-03-04', '79NJK', '2017-03-04', 'Seaking', 'None', 'Complete', NULL, NULL, 7, 'DGR-ACC-0018', NULL),
(170, 150, '2017-03-04', '79NJK', '2017-03-04', 'Seaking', 'None', 'Complete', NULL, NULL, 7, 'DGR-ACC-0019', NULL),
(171, 150, '2017-03-04', '79NJK', '2017-03-04', 'Seaking', 'None', 'Complete', NULL, NULL, 7, 'DGR-ACC-0020', NULL),
(172, 40, '2017-03-04', 'JL021', '2017-03-04', 'Tramat Enterprises', 'None', 'Complete', NULL, NULL, 7, 'MXS-PWT-0011', NULL),
(173, 40, '2017-03-04', 'JL021', '2017-03-04', 'Tramat Enterprises', 'None', 'Complete', NULL, NULL, 7, 'MXS-PWT-0012', NULL),
(174, 40, '2017-03-04', 'JL021', '2017-03-04', 'Tramat Enterprises', 'None', 'Complete', NULL, NULL, 7, 'MXS-PWT-0013', NULL),
(175, 40, '2017-03-04', 'JL021', '2017-03-04', 'Tramat Enterprises', 'None', 'Complete', NULL, NULL, 7, 'MXS-PWT-0014', NULL),
(176, 40, '2017-03-04', 'JL021', '2017-03-04', 'Tramat Enterprises', 'None', 'Complete', NULL, NULL, 7, 'MXS-PWT-0015', NULL),
(177, 40, '2017-03-04', 'JL021', '2017-03-04', 'Tramat Enterprises', 'None', 'Complete', NULL, NULL, 7, 'MXS-PWT-0016', NULL),
(178, 40, '2017-03-04', 'JL021', '2017-03-04', 'Tramat Enterprises', 'None', 'Complete', NULL, NULL, 7, 'MXS-PWT-0017', NULL),
(179, 40, '2017-03-04', 'JL021', '2017-03-04', 'Tramat Enterprises', 'None', 'Complete', NULL, NULL, 7, 'MXS-PWT-0018', NULL),
(180, 40, '2017-03-04', 'JL021', '2017-03-04', 'Tramat Enterprises', 'None', 'Complete', NULL, NULL, 7, 'MXS-PWT-0019', NULL),
(181, 40, '2017-03-04', 'JL021', '2017-03-04', 'Tramat Enterprises', 'None', 'Complete', NULL, NULL, 7, 'MXS-PWT-0020', NULL),
(182, 100, '2017-03-04', 'HJL32', '2017-03-04', 'VDH', 'None', 'Complete', NULL, NULL, 7, 'TFM-ACC-0016', NULL),
(183, 100, '2017-03-04', 'HJL32', '2017-03-04', 'VDH', 'None', 'Complete', NULL, NULL, 7, 'TFM-ACC-0017', NULL),
(184, 100, '2017-03-04', 'HJL32', '2017-03-04', 'VDH', 'None', 'Complete', NULL, NULL, 7, 'TFM-ACC-0018', NULL),
(185, 100, '2017-03-04', 'HJL32', '2017-03-04', 'VDH', 'None', 'Complete', NULL, NULL, 7, 'TFM-ACC-0019', NULL),
(186, 100, '2017-03-04', 'HJL32', '2017-03-04', 'VDH', 'None', 'Complete', NULL, NULL, 7, 'TFM-ACC-0020', NULL),
(187, 200, '2017-03-07', 'HI203', '2017-03-07', 'VDH', 'None', 'Complete', NULL, NULL, 9, 'MXT-ACC-0011', NULL),
(188, 200, '2017-03-07', 'HI203', '2017-03-07', 'VDH', 'None', 'Complete', 'None', NULL, 9, 'MXT-ACC-0012', NULL),
(189, 200, '2017-03-07', 'HI203', '2017-03-07', 'VDH', 'None', 'Complete', 'None', NULL, 9, 'MXT-ACC-0013', NULL),
(190, 200, '2017-03-07', 'HI203', '2017-03-07', 'VDH', 'None', 'Complete', 'None', NULL, 9, 'MXT-ACC-0014', NULL),
(191, 200, '2017-03-07', 'HI203', '2017-03-07', 'VDH', 'None', 'Complete', 'None', NULL, 9, 'MXT-ACC-0015', NULL),
(192, 100, '2017-03-10', 'NK9223', '2017-03-10', 'VDH', 'None', 'Complete', NULL, NULL, 5, 'DGR-ACC-0019', NULL),
(193, 100, '2017-03-10', 'NK9223', '2017-03-10', 'VDH', 'None', 'Complete', NULL, NULL, 5, 'DGR-ACC-0020', NULL),
(194, 100, '2017-03-10', 'NK9223', '2017-03-10', 'VDH', 'None', 'Complete', NULL, NULL, 5, 'DGR-ACC-0016', NULL),
(195, 100, '2017-03-10', 'NK9223', '2017-03-10', 'VDH', 'None', 'Complete', NULL, NULL, 5, 'DGR-ACC-0017', NULL),
(196, 100, '2017-03-10', 'NK9223', '2017-03-10', 'VDH', 'None', 'Complete', NULL, NULL, 5, 'DGR-ACC-0018', NULL),
(197, 100, '2017-03-10', 'HP9810', '2017-03-10', 'Justino', 'None', 'Complete', NULL, NULL, 1, 'SSS-PWT-0014', NULL),
(198, 100, '2017-03-10', 'HP9810', '2017-03-10', 'Justino', 'None', 'Complete', NULL, NULL, 1, 'SSS-PWT-0015', NULL),
(199, 100, '2017-03-10', 'HP9810', '2017-03-10', 'Justino', 'None', 'Complete', NULL, NULL, 1, 'SSS-PWT-0016', NULL),
(200, 100, '2017-03-10', 'HP9810', '2017-03-10', 'Justino', 'None', 'Complete', NULL, NULL, 1, 'SSS-PWT-0017', NULL),
(201, 100, '2017-03-10', 'HP9810', '2017-03-10', 'Justino', 'None', 'Complete', NULL, NULL, 1, 'SSS-PWT-0018', NULL),
(202, 40, '2017-03-10', 'KHD923', '2017-03-10', 'Justino', 'None', 'Complete', NULL, NULL, 1, 'MXS-PWT-0011', NULL),
(203, 40, '2017-03-10', 'KHD923', '2017-03-10', 'Justino', 'None', 'Complete', NULL, NULL, 1, 'MXT-PWT-0005', NULL),
(204, 40, '2017-03-10', 'KHD923', '2017-03-10', 'Justino', 'None', 'Complete', NULL, NULL, 1, 'MXS-PWT-0013', NULL),
(205, 40, '2017-03-10', 'KHD923', '2017-03-10', 'Justino', 'None', 'Complete', NULL, NULL, 1, 'MXS-PWT-0012', NULL),
(206, 40, '2017-03-10', 'KHD923', '2017-03-10', 'Justino', 'None', 'Complete', NULL, NULL, 1, 'MXS-PWT-0014', NULL),
(207, 50, '2017-03-12', 'N294N', '2017-03-12', 'Elektrower', 'None', 'Complete', NULL, NULL, 1, 'AFR-ACC-0001', NULL),
(208, 50, '2017-03-12', 'N294N', '2017-03-12', 'Elektrower', 'None', 'Complete', NULL, NULL, 1, 'AFR-ACC-0002', NULL),
(209, 50, '2017-03-12', 'N294N', '2017-03-12', 'Elektrower', 'None', 'Complete', NULL, NULL, 1, 'AFR-ACC-0003', NULL),
(210, 50, '2017-03-12', 'N294N', '2017-03-12', 'Elektrower', 'None', 'Complete', NULL, NULL, 1, 'AFR-ACC-0004', NULL),
(211, 50, '2017-03-12', 'N294N', '2017-03-12', 'Elektrower', 'None', 'Complete', NULL, NULL, 1, 'AFR-ACC-0005', NULL),
(212, 40, '2017-03-13', 'N0241', '2017-03-13', 'Elektrower', 'None', 'Complete', NULL, NULL, 6, 'LTS-ACC-0006', NULL),
(213, 40, '2017-03-13', 'N0241', '2017-03-13', 'Elektrower', 'None', 'Complete', NULL, NULL, 6, 'LTS-ACC-0007', NULL),
(214, 40, '2017-03-13', 'N0241', '2017-03-13', 'Elektrower', 'None', 'Complete', NULL, NULL, 6, 'LTS-ACC-0008', NULL),
(215, 40, '2017-03-13', 'N0241', '2017-03-13', 'Elektrower', 'None', 'Complete', NULL, NULL, 6, 'LTS-ACC-0009', NULL),
(216, 40, '2017-03-13', 'N0241', '2017-03-13', 'Elektrower', 'None', 'Complete', NULL, NULL, 6, 'LTS-ACC-0010', NULL),
(217, 50, '2017-03-18', '65465', '2017-03-05', 'Elektrower', 'None', 'Complete', NULL, NULL, 1, 'AFR-ACC-0001', NULL),
(218, 25, '2017-03-18', '65465', '2017-03-18', 'Elektrower', 'None', 'Complete', NULL, NULL, 1, 'AFR-ACC-0006', NULL),
(219, 50, '2017-03-18', 'N23u', '2017-03-18', 'Elektrower', 'None', 'Complete', NULL, NULL, 9, 'AFR-ACC-0002', NULL),
(220, 50, '2017-03-18', 'N23u', '2017-03-18', 'Elektrower', 'None', 'Complete', NULL, NULL, 9, 'AFR-ACC-0003', NULL),
(221, 50, '2017-03-18', 'N23u', '2017-03-18', 'Elektrower', 'None', 'Complete', NULL, NULL, 9, 'AFR-ACC-0004', NULL),
(222, 50, '2017-03-18', 'N23u', '2017-03-18', 'Elektrower', 'None', 'Complete', NULL, NULL, 9, 'AFR-ACC-0005', NULL),
(223, 30, '2017-03-20', '7128B', '2017-03-20', 'Tramat Enterprises', 'None', 'Complete', NULL, NULL, 12, 'SSS-PWT-0001', NULL),
(224, 30, '2017-03-20', '7128B', '2017-03-20', 'Tramat Enterprises', 'None', 'Complete', NULL, NULL, 12, 'SSS-PWT-0002', NULL),
(225, 30, '2017-03-20', '7128B', '2017-03-20', 'Tramat Enterprises', 'None', 'Complete', NULL, NULL, 12, 'SSS-PWT-0003', NULL),
(226, 30, '2017-03-20', '7128B', '2017-03-20', 'Tramat Enterprises', 'None', 'Complete', NULL, NULL, 12, 'SSS-PWT-0004', NULL),
(227, 30, '2017-03-20', '7128B', '2017-03-20', 'Tramat Enterprises', 'None', 'Complete', NULL, NULL, 12, 'SSS-PWT-0005', NULL),
(228, 30, '2017-03-20', '7128B', '2017-03-20', 'Tramat Enterprises', 'None', 'Complete', NULL, NULL, 12, 'SSS-PWT-0006', NULL),
(229, 30, '2017-03-20', '7128B', '2017-03-20', 'Tramat Enterprises', 'None', 'Complete', NULL, NULL, 12, 'SSS-PWT-0007', NULL),
(230, 30, '2017-03-20', '7128B', '2017-03-20', 'Tramat Enterprises', 'None', 'Complete', NULL, NULL, 12, 'SSS-PWT-0008', NULL),
(231, 50, '2017-04-01', 'A8161', '2017-04-01', 'ASCD/Harrows', 'None', 'Complete', NULL, NULL, 10, 'MXS-PWT-0001', NULL),
(232, 50, '2017-04-01', 'A8161', '2017-04-01', 'ASCD/Harrows', 'None', 'Complete', NULL, NULL, 10, 'MXS-PWT-0002', NULL),
(233, 50, '2017-04-01', 'A8161', '2017-04-01', 'ASCD/Harrows', 'None', 'Complete', NULL, NULL, 10, 'MXS-PWT-0003', NULL),
(234, 50, '2017-04-01', 'A8161', '2017-04-01', 'ASCD/Harrows', 'None', 'Complete', NULL, NULL, 10, 'MXS-PWT-0004', NULL),
(235, 50, '2017-04-01', 'A8161', '2017-04-01', 'ASCD/Harrows', 'None', 'Complete', NULL, NULL, 10, 'MXS-PWT-0005', NULL),
(236, 40, '2017-04-01', 'A8161', '2017-04-01', 'ASCD/Harrows', 'None', 'Complete', NULL, NULL, 10, 'MXS-PWT-0006', NULL),
(237, 40, '2017-04-01', 'A8161', '2017-04-01', 'ASCD/Harrows', 'None', 'Complete', NULL, NULL, 10, 'MXS-PWT-0007', NULL),
(238, 40, '2017-04-01', 'A8161', '2017-04-01', 'ASCD/Harrows', 'None', 'Complete', NULL, NULL, 10, 'MXS-PWT-0008', NULL),
(239, 40, '2017-04-02', 'T0819', '2017-04-02', 'Atlas Copco/ Hilti', 'None', 'Complete', NULL, NULL, 14, 'DGR-ACC-0001', NULL),
(240, 40, '2017-04-02', 'T0819', '2017-04-02', 'Atlas Copco/ Hilti', 'None', 'Complete', NULL, NULL, 14, 'DGR-ACC-0002', NULL),
(241, 30, '2017-04-02', 'T0819', '2017-04-02', 'Atlas Copco/ Hilti', 'None', 'Complete', NULL, NULL, 14, 'DGR-ACC-0003', NULL),
(242, 30, '2017-04-02', 'T0819', '2017-04-02', 'Atlas Copco/ Hilti', 'None', 'Complete', NULL, NULL, 14, 'DGR-ACC-0004', NULL),
(243, 30, '2017-04-02', 'T0819', '2017-04-02', 'Atlas Copco/ Hilti', 'None', 'Complete', NULL, NULL, 14, 'DGR-ACC-0005', NULL),
(244, 30, '2017-04-02', 'T0819', '2017-04-02', 'Atlas Copco/ Hilti', 'None', 'Complete', NULL, NULL, 14, 'DGR-ACC-0006', NULL),
(245, 30, '2017-04-02', 'T0819', '2017-04-02', 'Atlas Copco/ Hilti', 'None', 'Complete', NULL, NULL, 14, 'DGR-ACC-0007', NULL),
(246, 25, '2017-04-04', 'P0637', '2017-04-04', 'Beesin', 'None', 'Complete', NULL, NULL, 20, 'LTS-HDT-0001', NULL),
(247, 25, '2017-04-04', 'P0637', '2017-04-04', 'Beesin', 'None', 'Complete', NULL, NULL, 20, 'LTS-HDT-0002', NULL),
(248, 25, '2017-04-04', 'P0637', '2017-04-04', 'Beesin', 'None', 'Complete', NULL, NULL, 20, 'LTS-HDT-0003', NULL),
(249, 25, '2017-04-04', 'P0637', '2017-04-04', 'Beesin', 'None', 'Complete', NULL, NULL, 20, 'LTS-HDT-0004', NULL),
(250, 25, '2017-04-04', 'P0637', '2017-04-04', 'Beesin', 'None', 'Complete', NULL, NULL, 20, 'LTS-HDT-0005', NULL),
(251, 30, '2017-04-06', 'O0526', '2017-04-06', 'Black and Decker', 'None', 'Complete', 'None', NULL, 6, 'TKU-HDT-0001', NULL),
(252, 30, '2017-04-06', 'O0526', '2017-04-06', 'Black and Decker', 'None', 'Complete', 'None', NULL, 6, 'TKU-HDT-0002', NULL),
(253, 30, '2017-04-06', 'O0526', '2017-04-06', 'Black and Decker', 'None', 'Complete', 'None', NULL, 6, 'TKU-HDT-0003', NULL),
(254, 30, '2017-04-06', 'O0526', '2017-04-06', 'Black and Decker', 'None', 'Complete', 'None', NULL, 6, 'TKU-HDT-0004', NULL),
(255, 30, '2017-04-06', 'O0526', '2017-04-06', 'Black and Decker', 'None', 'Complete', 'None', NULL, 6, 'TKU-HDT-0005', NULL),
(256, 30, '2017-04-07', '7201P', '2017-04-07', 'Ben/ Alex Uy', 'None', 'Complete', 'None', NULL, 8, 'AFR-PWT-0001', NULL),
(257, 30, '2017-04-07', '7201P', '2017-04-07', 'Ben/ Alex Uy', 'None', 'Complete', 'None', NULL, 8, 'AFR-PWT-0002', NULL),
(258, 30, '2017-04-07', '7201P', '2017-04-07', 'Ben/ Alex Uy', 'None', 'Complete', 'None', NULL, 8, 'AFR-PWT-0003', NULL),
(259, 30, '2017-04-07', '7201P', '2017-04-07', 'Ben/ Alex Uy', 'None', 'Complete', 'None', NULL, 8, 'AFR-PWT-0004', NULL),
(260, 30, '2017-04-07', '7201P', '2017-04-07', 'Ben/ Alex Uy', 'None', 'Complete', 'None', NULL, 8, 'AFR-PWT-0005', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invID` int(11) UNSIGNED NOT NULL,
  `invDate` date DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `physicalQty` int(5) DEFAULT NULL,
  `beginningQty` int(11) DEFAULT NULL,
  `inQty` int(11) DEFAULT NULL,
  `outQty` int(11) DEFAULT NULL,
  `endingQty` int(11) DEFAULT NULL,
  `remarks` varchar(45) DEFAULT NULL,
  `prodID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invID`, `invDate`, `qty`, `physicalQty`, `beginningQty`, `inQty`, `outQty`, `endingQty`, `remarks`, `prodID`) VALUES
(1, '2017-04-12', 120, NULL, 0, 175, 55, NULL, NULL, 'AFR-ACC-0001'),
(2, '2017-04-12', 120, NULL, 0, 175, 55, NULL, NULL, 'AFR-ACC-0002'),
(3, '2017-04-12', 135, NULL, 0, 175, 40, NULL, NULL, 'AFR-ACC-0003'),
(4, '2017-04-12', 175, NULL, 0, 175, NULL, NULL, NULL, 'AFR-ACC-0004'),
(5, '2017-04-12', 175, NULL, 0, 175, NULL, NULL, NULL, 'AFR-ACC-0005'),
(6, '2017-03-31', 145, NULL, 0, 175, 30, NULL, NULL, 'AFR-ACC-0006'),
(7, '2017-03-31', 120, NULL, 0, 150, 30, NULL, NULL, 'AFR-ACC-0007'),
(8, '2017-03-31', 150, NULL, 0, 150, NULL, NULL, NULL, 'AFR-ACC-0008'),
(9, '2017-03-31', 130, NULL, 0, 150, 20, NULL, NULL, 'AFR-ACC-0009'),
(10, '2017-03-31', 300, NULL, 0, 300, NULL, NULL, NULL, 'AFR-ACC-0010'),
(11, '2017-03-31', 100, NULL, 0, 100, NULL, NULL, NULL, 'AFR-ACC-0011'),
(12, '2017-03-31', 100, NULL, 0, 100, NULL, NULL, NULL, 'AFR-ACC-0012'),
(13, '2017-03-31', 100, NULL, 0, 100, NULL, NULL, NULL, 'AFR-ACC-0013'),
(14, '2017-03-31', 100, NULL, 0, 100, NULL, NULL, NULL, 'AFR-ACC-0014'),
(15, '2017-03-31', 100, NULL, 0, 100, NULL, NULL, NULL, 'AFR-ACC-0015'),
(16, '2017-03-31', 120, NULL, 0, 160, 40, NULL, NULL, 'AFR-PWT-0001'),
(17, '2017-03-31', 120, NULL, 0, 160, 40, NULL, NULL, 'AFR-PWT-0002'),
(18, '2017-03-31', 120, NULL, 0, 160, 40, NULL, NULL, 'AFR-PWT-0003'),
(19, '2017-03-31', 120, NULL, 0, 160, 40, NULL, NULL, 'AFR-PWT-0004'),
(20, '2017-03-31', 120, NULL, 0, 160, 40, NULL, NULL, 'AFR-PWT-0005'),
(21, '2017-03-31', 30, NULL, 0, 40, 10, NULL, NULL, 'DCA-PWT-0001'),
(22, '2017-03-31', 30, NULL, 0, 40, 10, NULL, NULL, 'DCA-PWT-0002'),
(23, '2017-03-31', 30, NULL, 0, 40, 10, NULL, NULL, 'DCA-PWT-0003'),
(24, '2017-03-31', 30, NULL, 0, 40, 10, NULL, NULL, 'DCA-PWT-0004'),
(25, '2017-03-31', 30, NULL, 0, 40, 10, NULL, NULL, 'DCA-PWT-0005'),
(26, '2017-03-31', 40, NULL, 0, 40, NULL, NULL, NULL, 'DCA-PWT-0006'),
(27, '2017-03-31', 40, NULL, 0, 40, NULL, NULL, NULL, 'DCA-PWT-0007'),
(28, '2017-03-31', 40, NULL, 0, 40, NULL, NULL, NULL, 'DCA-PWT-0008'),
(29, '2017-03-31', 30, NULL, 0, 40, 10, NULL, NULL, 'DCA-PWT-0009'),
(30, '2017-03-31', 40, NULL, 0, 40, NULL, NULL, NULL, 'DCA-PWT-0010'),
(31, '2017-03-31', 30, NULL, 0, 40, 10, NULL, NULL, 'DCA-PWT-0011'),
(32, '2017-03-31', 40, NULL, 0, 40, NULL, NULL, NULL, 'DCA-PWT-0012'),
(33, '2017-03-31', 40, NULL, 0, 40, NULL, NULL, NULL, 'DCA-PWT-0013'),
(34, '2017-03-31', 40, NULL, 0, 40, NULL, NULL, NULL, 'DCA-PWT-0014'),
(35, '2017-03-31', 40, NULL, 0, 40, NULL, NULL, NULL, 'DCA-PWT-0015'),
(36, '2017-03-31', 40, NULL, 0, 40, NULL, NULL, NULL, 'DCA-PWT-0016'),
(37, '2017-03-31', 40, NULL, 0, 40, NULL, NULL, NULL, 'DCA-PWT-0017'),
(38, '2017-03-31', 40, NULL, 0, 40, NULL, NULL, NULL, 'DCA-PWT-0018'),
(39, '2017-03-31', 40, NULL, 0, 40, NULL, NULL, NULL, 'DCA-PWT-0019'),
(40, '2017-03-31', 40, NULL, 0, 40, NULL, NULL, NULL, 'DCA-PWT-0020'),
(41, '2017-03-31', 75, NULL, 0, 190, 115, NULL, NULL, 'DGR-ACC-0001'),
(42, '2017-03-31', 125, NULL, 0, 190, 65, NULL, NULL, 'DGR-ACC-0002'),
(43, '2017-03-31', 115, NULL, 0, 180, 65, NULL, NULL, 'DGR-ACC-0003'),
(44, '2017-03-31', 115, NULL, 0, 180, 65, NULL, NULL, 'DGR-ACC-0004'),
(45, '2017-03-31', 115, NULL, 0, 180, 65, NULL, NULL, 'DGR-ACC-0005'),
(46, '2017-03-31', 150, NULL, 0, 180, 30, NULL, NULL, 'DGR-ACC-0006'),
(47, '2017-03-31', 150, NULL, 0, 180, 30, NULL, NULL, 'DGR-ACC-0007'),
(48, '2017-03-31', 120, NULL, 0, 150, 30, NULL, NULL, 'DGR-ACC-0008'),
(49, '2017-03-31', 120, NULL, 0, 150, 30, NULL, NULL, 'DGR-ACC-0009'),
(50, '2017-03-31', 120, NULL, 0, 150, 30, NULL, NULL, 'DGR-ACC-0010'),
(51, '2017-03-31', 150, NULL, 0, 150, NULL, NULL, NULL, 'DGR-ACC-0011'),
(52, '2017-03-31', 150, NULL, 0, 150, NULL, NULL, NULL, 'DGR-ACC-0012'),
(53, '2017-03-31', 150, NULL, 0, 150, NULL, NULL, NULL, 'DGR-ACC-0013'),
(54, '2017-03-31', 110, NULL, 0, 150, 40, NULL, NULL, 'DGR-ACC-0014'),
(55, '2017-03-31', 150, NULL, 0, 150, NULL, NULL, NULL, 'DGR-ACC-0015'),
(56, '2017-03-31', 190, NULL, 0, 250, 60, NULL, NULL, 'DGR-ACC-0016'),
(57, '2017-03-31', 190, NULL, 0, 250, 60, NULL, NULL, 'DGR-ACC-0017'),
(58, '2017-03-31', 190, NULL, 0, 250, 60, NULL, NULL, 'DGR-ACC-0018'),
(59, '2017-03-31', 190, NULL, 0, 250, 60, NULL, NULL, 'DGR-ACC-0019'),
(60, '2017-03-31', 190, NULL, 0, 250, 60, NULL, NULL, 'DGR-ACC-0020'),
(61, '2017-03-31', 30, NULL, 0, 30, NULL, NULL, NULL, 'LTS-ACC-0001'),
(62, '2017-03-31', 30, NULL, 0, 30, NULL, NULL, NULL, 'LTS-ACC-0002'),
(63, '2017-03-31', 30, NULL, 0, 30, NULL, NULL, NULL, 'LTS-ACC-0003'),
(64, '2017-03-31', 30, NULL, 0, 30, NULL, NULL, NULL, 'LTS-ACC-0004'),
(65, '2017-03-31', 5, NULL, 0, 30, 25, NULL, NULL, 'LTS-ACC-0005'),
(66, '2017-03-31', 90, NULL, 0, 90, NULL, NULL, NULL, 'LTS-ACC-0006'),
(67, '2017-03-31', 75, NULL, 0, 90, 15, NULL, NULL, 'LTS-ACC-0007'),
(68, '2017-03-31', 75, NULL, 0, 90, 15, NULL, NULL, 'LTS-ACC-0008'),
(69, '2017-03-31', 75, NULL, 0, 90, 15, NULL, NULL, 'LTS-ACC-0009'),
(70, '2017-03-31', 90, NULL, 0, 90, NULL, NULL, NULL, 'LTS-ACC-0010'),
(71, '2017-03-31', 50, NULL, 0, 65, 15, NULL, NULL, 'LTS-HDT-0001'),
(72, '2017-03-31', 50, NULL, 0, 65, 15, NULL, NULL, 'LTS-HDT-0002'),
(73, '2017-03-31', 50, NULL, 0, 65, 15, NULL, NULL, 'LTS-HDT-0003'),
(74, '2017-03-31', 45, NULL, 0, 65, 20, NULL, NULL, 'LTS-HDT-0004'),
(75, '2017-03-31', 40, NULL, 0, 65, 25, NULL, NULL, 'LTS-HDT-0005'),
(76, '2017-03-31', 30, NULL, 0, 40, 10, NULL, NULL, 'LTS-HDT-0006'),
(77, '2017-03-31', 30, NULL, 0, 40, 10, NULL, NULL, 'LTS-HDT-0007'),
(78, '2017-03-31', 30, NULL, 0, 40, 10, NULL, NULL, 'LTS-HDT-0008'),
(79, '2017-03-31', 40, NULL, 0, 40, NULL, NULL, NULL, 'LTS-HDT-0009'),
(80, '2017-03-31', 40, NULL, 0, 40, NULL, NULL, NULL, 'LTS-HDT-0010'),
(81, '2017-03-31', 110, NULL, 0, 150, 40, NULL, NULL, 'MXS-PWT-0001'),
(82, '2017-03-31', 40, NULL, 0, 80, 40, NULL, NULL, 'MXS-PWT-0002'),
(83, '2017-03-31', 40, NULL, 0, 80, 40, NULL, NULL, 'MXS-PWT-0003'),
(84, '2017-03-31', 40, NULL, 0, 80, 40, NULL, NULL, 'MXS-PWT-0004'),
(85, '2017-03-31', 20, NULL, 0, 80, 60, NULL, NULL, 'MXS-PWT-0005'),
(86, '2017-03-31', 70, NULL, 0, 70, NULL, NULL, NULL, 'MXS-PWT-0006'),
(87, '2017-03-31', 70, NULL, 0, 70, NULL, NULL, NULL, 'MXS-PWT-0007'),
(88, '2017-03-31', 70, NULL, 0, 70, NULL, NULL, NULL, 'MXS-PWT-0008'),
(89, '2017-03-31', 30, NULL, 0, 30, NULL, NULL, NULL, 'MXS-PWT-0009'),
(90, '2017-03-31', 30, NULL, 0, 30, NULL, NULL, NULL, 'MXS-PWT-0010'),
(91, '2017-03-31', 80, NULL, 0, 80, NULL, NULL, NULL, 'MXS-PWT-0011'),
(92, '2017-03-31', 20, NULL, 0, 80, 60, NULL, NULL, 'MXS-PWT-0012'),
(93, '2017-03-31', 80, NULL, 0, 80, NULL, NULL, NULL, 'MXS-PWT-0013'),
(94, '2017-03-31', 80, NULL, 0, 80, NULL, NULL, NULL, 'MXS-PWT-0014'),
(95, '2017-03-31', 30, NULL, 0, 40, 10, NULL, NULL, 'MXS-PWT-0015'),
(96, '2017-03-31', 30, NULL, 0, 40, 10, NULL, NULL, 'MXS-PWT-0016'),
(97, '2017-03-31', 30, NULL, 0, 40, 10, NULL, NULL, 'MXS-PWT-0017'),
(98, '2017-03-31', 40, NULL, 0, 40, NULL, NULL, NULL, 'MXS-PWT-0018'),
(99, '2017-03-31', 40, NULL, 0, 40, NULL, NULL, NULL, 'MXS-PWT-0019'),
(100, '2017-03-31', 40, NULL, 0, 40, NULL, NULL, NULL, 'MXS-PWT-0020'),
(101, '2017-03-31', 70, NULL, 0, 100, 30, NULL, NULL, 'MXT-ACC-0001'),
(102, '2017-03-31', 70, NULL, 0, 100, 30, NULL, NULL, 'MXT-ACC-0002'),
(103, '2017-03-31', 70, NULL, 0, 100, 30, NULL, NULL, 'MXT-ACC-0003'),
(104, '2017-03-31', 55, NULL, 0, 100, 45, NULL, NULL, 'MXT-ACC-0004'),
(105, '2017-03-31', 70, NULL, 0, 100, 30, NULL, NULL, 'MXT-ACC-0005'),
(106, '2017-03-31', 95, NULL, 0, 100, 5, NULL, NULL, 'MXT-ACC-0006'),
(107, '2017-03-31', 80, NULL, 0, 100, 20, NULL, NULL, 'MXT-ACC-0007'),
(108, '2017-03-31', 100, NULL, 0, 100, NULL, NULL, NULL, 'MXT-ACC-0008'),
(109, '2017-03-31', 100, NULL, 0, 100, NULL, NULL, NULL, 'MXT-ACC-0009'),
(110, '2017-03-31', 100, NULL, 0, 100, NULL, NULL, NULL, 'MXT-ACC-0010'),
(111, '2017-03-31', 200, NULL, 0, 200, NULL, NULL, NULL, 'MXT-ACC-0011'),
(112, '2017-03-31', 20, NULL, 0, 30, 10, NULL, NULL, 'MXT-PWT-0001'),
(113, '2017-03-31', 30, NULL, 0, 30, NULL, NULL, NULL, 'MXT-PWT-0002'),
(114, '2017-03-31', 20, NULL, 0, 30, 10, NULL, NULL, 'MXT-PWT-0003'),
(115, '2017-03-31', 30, NULL, 0, 30, NULL, NULL, NULL, 'MXT-PWT-0004'),
(116, '2017-03-31', 60, NULL, 0, 70, 10, NULL, NULL, 'MXT-PWT-0005'),
(117, '2017-03-31', 30, NULL, 0, 30, NULL, NULL, NULL, 'MXT-PWT-0006'),
(118, '2017-03-31', 20, NULL, 0, 30, 10, NULL, NULL, 'MXT-PWT-0007'),
(119, '2017-03-31', 30, NULL, 0, 30, NULL, NULL, NULL, 'MXT-PWT-0008'),
(120, '2017-03-31', 30, NULL, 0, 30, NULL, NULL, NULL, 'MXT-PWT-0009'),
(121, '2017-03-31', 45, NULL, 0, 45, NULL, NULL, NULL, 'SSS-PWT-0001'),
(122, '2017-03-31', 45, NULL, 0, 45, NULL, NULL, NULL, 'SSS-PWT-0002'),
(123, '2017-03-31', 45, NULL, 0, 45, NULL, NULL, NULL, 'SSS-PWT-0003'),
(124, '2017-03-31', 45, NULL, 0, 45, NULL, NULL, NULL, 'SSS-PWT-0004'),
(125, '2017-03-31', 40, NULL, 0, 45, 5, NULL, NULL, 'SSS-PWT-0005'),
(126, '2017-03-31', 45, NULL, 0, 45, NULL, NULL, NULL, 'SSS-PWT-0006'),
(127, '2017-03-31', 40, NULL, 0, 45, 5, NULL, NULL, 'SSS-PWT-0007'),
(128, '2017-03-31', 40, NULL, 0, 45, 5, NULL, NULL, 'SSS-PWT-0008'),
(129, '2017-03-31', 10, NULL, 0, 15, 5, NULL, NULL, 'SSS-PWT-0009'),
(130, '2017-03-31', 10, NULL, 0, 15, 5, NULL, NULL, 'SSS-PWT-0010'),
(131, '2017-03-31', 10, NULL, 0, 15, 5, NULL, NULL, 'SSS-PWT-0011'),
(132, '2017-03-31', 15, NULL, 0, 15, NULL, NULL, NULL, 'SSS-PWT-0012'),
(133, '2017-03-31', 15, NULL, 0, 15, NULL, NULL, NULL, 'SSS-PWT-0013'),
(134, '2017-03-31', 90, NULL, 0, 115, 25, NULL, NULL, 'SSS-PWT-0014'),
(135, '2017-03-31', 80, NULL, 0, 115, 35, NULL, NULL, 'SSS-PWT-0015'),
(136, '2017-03-31', 90, NULL, 0, 115, 25, NULL, NULL, 'SSS-PWT-0016'),
(137, '2017-03-31', 90, NULL, 0, 115, 25, NULL, NULL, 'SSS-PWT-0017'),
(138, '2017-03-31', 90, NULL, 0, 115, 25, NULL, NULL, 'SSS-PWT-0018'),
(139, '2017-03-31', 15, NULL, 0, 15, NULL, NULL, NULL, 'SSS-PWT-0019'),
(140, '2017-03-31', 15, NULL, 0, 15, NULL, NULL, NULL, 'SSS-PWT-0020'),
(141, '2017-03-31', 50, NULL, 0, 50, NULL, NULL, NULL, 'TFM-ACC-0001'),
(142, '2017-03-31', 50, NULL, 0, 50, NULL, NULL, NULL, 'TFM-ACC-0002'),
(143, '2017-03-31', 45, NULL, 0, 50, 5, NULL, NULL, 'TFM-ACC-0003'),
(144, '2017-03-31', 50, NULL, 0, 50, NULL, NULL, NULL, 'TFM-ACC-0004'),
(145, '2017-03-31', 50, NULL, 0, 50, NULL, NULL, NULL, 'TFM-ACC-0005'),
(146, '2017-03-31', 30, NULL, 0, 30, NULL, NULL, NULL, 'TFM-ACC-0006'),
(147, '2017-03-31', 30, NULL, 0, 30, NULL, NULL, NULL, 'TFM-ACC-0007'),
(148, '2017-03-31', 20, NULL, 0, 30, 10, NULL, NULL, 'TFM-ACC-0008'),
(149, '2017-03-31', 20, NULL, 0, 30, 10, NULL, NULL, 'TFM-ACC-0009'),
(150, '2017-03-31', 20, NULL, 0, 30, 10, NULL, NULL, 'TFM-ACC-0010'),
(151, '2017-03-31', 50, NULL, 0, 50, NULL, NULL, NULL, 'TFM-ACC-0011'),
(152, '2017-03-31', 40, NULL, 0, 50, 10, NULL, NULL, 'TFM-ACC-0012'),
(153, '2017-03-31', 50, NULL, 0, 50, NULL, NULL, NULL, 'TFM-ACC-0013'),
(154, '2017-03-31', 40, NULL, 0, 50, 10, NULL, NULL, 'TFM-ACC-0014'),
(155, '2017-03-31', 50, NULL, 0, 50, NULL, NULL, NULL, 'TFM-ACC-0015'),
(156, '2017-03-31', 100, NULL, 0, 100, NULL, NULL, NULL, 'TFM-ACC-0016'),
(157, '2017-03-31', 100, NULL, 0, 100, NULL, NULL, NULL, 'TFM-ACC-0017'),
(158, '2017-03-31', 90, NULL, 0, 100, 10, NULL, NULL, 'TFM-ACC-0018'),
(159, '2017-03-31', 100, NULL, 0, 100, NULL, NULL, NULL, 'TFM-ACC-0019'),
(160, '2017-03-31', 90, NULL, 0, 100, 10, NULL, NULL, 'TFM-ACC-0020'),
(161, '2017-03-31', 50, NULL, 0, 50, NULL, NULL, NULL, 'TKU-ACC-0001'),
(162, '2017-03-31', 50, NULL, 0, 50, NULL, NULL, NULL, 'TKU-ACC-0002'),
(163, '2017-03-31', 20, NULL, 0, 50, 30, NULL, NULL, 'TKU-ACC-0003'),
(164, '2017-03-31', 50, NULL, 0, 50, NULL, NULL, NULL, 'TKU-ACC-0004'),
(165, '2017-03-31', 50, NULL, 0, 50, NULL, NULL, NULL, 'TKU-ACC-0005'),
(166, '2017-03-31', 25, NULL, 0, 40, 15, NULL, NULL, 'TKU-ACC-0006'),
(167, '2017-03-31', 40, NULL, 0, 40, NULL, NULL, NULL, 'TKU-ACC-0007'),
(168, '2017-03-31', 40, NULL, 0, 40, NULL, NULL, NULL, 'TKU-ACC-0008'),
(169, '2017-03-31', 30, NULL, 0, 40, 10, NULL, NULL, 'TKU-ACC-0009'),
(170, '2017-03-31', 40, NULL, 0, 40, NULL, NULL, NULL, 'TKU-ACC-0010'),
(171, '2017-03-31', 55, NULL, 0, 80, 25, NULL, NULL, 'TKU-HDT-0001'),
(172, '2017-03-31', 55, NULL, 0, 80, 25, NULL, NULL, 'TKU-HDT-0002'),
(173, '2017-03-31', 55, NULL, 0, 80, 25, NULL, NULL, 'TKU-HDT-0003'),
(174, '2017-03-31', 55, NULL, 0, 80, 25, NULL, NULL, 'TKU-HDT-0004'),
(175, '2017-03-31', 55, NULL, 0, 80, 25, NULL, NULL, 'TKU-HDT-0005'),
(176, '2017-03-31', 40, NULL, 0, 50, 10, NULL, NULL, 'TKU-HDT-0006'),
(177, '2017-03-31', 40, NULL, 0, 50, 10, NULL, NULL, 'TKU-HDT-0007'),
(178, '2017-03-31', 40, NULL, 0, 50, 10, NULL, NULL, 'TKU-HDT-0008'),
(179, '2017-03-31', 40, NULL, 0, 50, 10, NULL, NULL, 'TKU-HDT-0009'),
(180, '2017-03-31', 50, NULL, 0, 50, NULL, NULL, NULL, 'TKU-HDT-0010');

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
  `status` varchar(45) DEFAULT 'Active',
  `branchID` int(5) NOT NULL,
  `empID` int(5) NOT NULL,
  `prodID` varchar(25) NOT NULL,
  `userID` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outgoing`
--

INSERT INTO `outgoing` (`outID`, `outQty`, `outDate`, `outRemarks`, `receiptNo`, `status`, `branchID`, `empID`, `prodID`, `userID`) VALUES
(1, 20, '2017-03-02', 'None', 'OUT-00001', 'Active', 1, 15, 'AFR-ACC-0001', NULL),
(2, 20, '2017-03-02', 'None', 'OUT-00001', 'Active', 1, 15, 'AFR-ACC-0002', NULL),
(3, 20, '2017-03-02', 'None', 'OUT-00001', 'Active', 1, 15, 'AFR-ACC-0003', NULL),
(4, 30, '2017-03-02', 'None', 'OUT-00001', 'Active', 1, 15, 'AFR-ACC-0006', NULL),
(5, 30, '2017-03-02', 'None', 'OUT-00001', 'Active', 1, 15, 'AFR-ACC-0007', NULL),
(6, 10, '2017-03-02', 'None', 'OUT-00002', 'Active', 2, 15, 'DCA-PWT-0011', NULL),
(7, 15, '2017-03-02', 'None', 'OUT-00002', 'Active', 2, 15, 'AFR-ACC-0001', NULL),
(8, 15, '2017-03-02', 'None', 'OUT-00002', 'Active', 2, 15, 'AFR-ACC-0002', NULL),
(9, 10, '2017-03-02', 'None', 'OUT-00002', 'Active', 2, 15, 'DCA-PWT-0009', NULL),
(10, 20, '2017-03-02', 'None', 'OUT-00002', 'Active', 2, 15, 'AFR-ACC-0009', NULL),
(11, 5, '2017-03-05', 'None', 'OUT-00003', 'Active', 4, 9, 'MXT-ACC-0006', NULL),
(12, 10, '2017-03-05', 'None', 'OUT-00003', 'Active', 4, 9, 'TFM-ACC-0010', NULL),
(13, 10, '2017-03-05', 'None', 'OUT-00003', 'Active', 4, 9, 'TFM-ACC-0009', NULL),
(14, 15, '2017-03-05', 'None', 'OUT-00003', 'Active', 4, 9, 'TKU-ACC-0003', NULL),
(15, 15, '2017-03-05', 'None', 'OUT-00003', 'Active', 4, 9, 'TKU-ACC-0006', NULL),
(16, 5, '2017-03-05', 'None', 'OUT-00004', 'Active', 3, 8, 'LTS-HDT-0004', NULL),
(17, 25, '2017-03-05', 'None', 'OUT-00004', 'Active', 3, 8, 'LTS-ACC-0005', NULL),
(18, 5, '2017-03-05', 'None', 'OUT-00004', 'Active', 3, 8, 'SSS-PWT-0005', NULL),
(19, 20, '2017-03-06', 'None', 'OUT-00004', 'Active', 3, 8, 'MXT-ACC-0007', NULL),
(20, 20, '2017-03-06', 'None', 'OUT-00005', 'Active', 4, 7, 'MXS-PWT-0005', NULL),
(21, 15, '2017-03-06', 'None', 'OUT-00005', 'Active', 4, 7, 'MXT-ACC-0004', NULL),
(22, 10, '2017-03-06', 'None', 'OUT-00005', 'Active', 4, 7, 'TKU-HDT-0001', NULL),
(23, 5, '2017-03-06', 'None', 'OUT-00005', 'Active', 4, 7, 'TFM-ACC-0003', NULL),
(24, 15, '2017-03-06', 'None', 'OUT-00005', 'Active', 4, 7, 'TKU-ACC-0003', NULL),
(25, 10, '2017-03-07', 'None', 'OUT-00006', 'Active', 5, 9, 'TKU-ACC-0009', NULL),
(26, 40, '2017-03-07', 'None', 'OUT-00006', 'Active', 5, 9, 'DGR-ACC-0014', NULL),
(27, 10, '2017-03-07', 'None', 'OUT-00006', 'Active', 5, 9, 'TFM-ACC-0008', NULL),
(28, 10, '2017-03-07', 'None', 'OUT-00006', 'Active', 5, 9, 'SSS-PWT-0015', NULL),
(29, 30, '2017-03-12', 'None', 'OUT-00007', 'Active', 3, 10, 'DGR-ACC-0016', NULL),
(30, 30, '2017-03-12', 'None', 'OUT-00007', 'Active', 3, 10, 'DGR-ACC-0017', NULL),
(31, 30, '2017-03-12', 'None', 'OUT-00007', 'Active', 3, 10, 'DGR-ACC-0018', NULL),
(32, 30, '2017-03-12', 'None', 'OUT-00007', 'Active', 3, 10, 'DGR-ACC-0019', NULL),
(33, 30, '2017-03-12', 'None', 'OUT-00007', 'Active', 3, 10, 'DGR-ACC-0020', NULL),
(34, 10, '2017-03-12', 'None', 'OUT-00007', 'Active', 3, 10, 'MXS-PWT-0015', NULL),
(35, 10, '2017-03-12', 'None', 'OUT-00007', 'Active', 3, 10, 'MXS-PWT-0016', NULL),
(36, 10, '2017-03-12', 'None', 'OUT-00007', 'Active', 3, 10, 'MXS-PWT-0017', NULL),
(37, 10, '2017-03-12', 'None', 'OUT-00008', 'Active', 4, 10, 'LTS-HDT-0005', NULL),
(38, 10, '2017-03-12', 'None', 'OUT-00008', 'Active', 4, 10, 'LTS-HDT-0006', NULL),
(39, 10, '2017-03-12', 'None', 'OUT-00008', 'Active', 4, 10, 'LTS-HDT-0007', NULL),
(40, 10, '2017-03-12', 'None', 'OUT-00008', 'Active', 4, 10, 'LTS-HDT-0008', NULL),
(41, 20, '2017-03-12', 'None', 'OUT-00008', 'Active', 4, 10, 'MXS-PWT-0012', NULL),
(42, 20, '2017-03-12', 'None', 'OUT-00008', 'Active', 4, 10, 'MXS-PWT-0012', NULL),
(43, 20, '2017-03-12', 'None', 'OUT-00008', 'Active', 4, 10, 'MXS-PWT-0012', NULL),
(44, 10, '2017-03-14', 'None', 'OUT-00009', 'Active', 2, 14, 'TFM-ACC-0012', NULL),
(45, 10, '2017-03-14', 'None', 'OUT-00009', 'Active', 2, 14, 'TFM-ACC-0014', NULL),
(46, 10, '2017-03-14', 'None', 'OUT-00009', 'Active', 2, 14, 'TFM-ACC-0018', NULL),
(47, 10, '2017-03-14', 'None', 'OUT-00009', 'Active', 2, 14, 'TFM-ACC-0020', NULL),
(48, 15, '2017-03-14', 'None', 'OUT-00010', 'Active', 4, 17, 'LTS-ACC-0007', NULL),
(49, 15, '2017-03-14', 'None', 'OUT-00010', 'Active', 4, 17, 'LTS-ACC-0008', NULL),
(50, 15, '2017-03-14', 'None', 'OUT-00010', 'Active', 4, 17, 'LTS-ACC-0009', NULL),
(51, 30, '2017-03-17', 'None', 'OUT-00011', 'Active', 4, 11, 'AFR-PWT-0001', NULL),
(52, 30, '2017-03-17', 'None', 'OUT-00011', 'Active', 4, 11, 'AFR-PWT-0002', NULL),
(53, 30, '2017-03-17', 'None', 'OUT-00011', 'Active', 4, 11, 'AFR-PWT-0003', NULL),
(54, 30, '2017-03-17', 'None', 'OUT-00011', 'Active', 4, 11, 'AFR-PWT-0004', NULL),
(55, 30, '2017-03-17', 'None', 'OUT-00011', 'Active', 4, 11, 'AFR-PWT-0005', NULL),
(56, 30, '2017-03-17', 'None', 'OUT-00012', 'Active', 1, 11, 'DGR-ACC-0016', NULL),
(57, 30, '2017-03-17', 'None', 'OUT-00012', 'Active', 1, 11, 'DGR-ACC-0017', NULL),
(58, 30, '2017-03-17', 'None', 'OUT-00012', 'Active', 1, 11, 'DGR-ACC-0018', NULL),
(59, 30, '2017-03-17', 'None', 'OUT-00012', 'Active', 1, 11, 'DGR-ACC-0019', NULL),
(60, 30, '2017-03-17', 'None', 'OUT-00012', 'Active', 1, 11, 'DGR-ACC-0020', NULL),
(61, 30, '2017-03-20', 'None', 'OUT-00013', 'Active', 2, 14, 'MXT-ACC-0001', NULL),
(62, 30, '2017-03-20', 'None', 'OUT-00013', 'Active', 2, 14, 'MXT-ACC-0002', NULL),
(63, 30, '2017-03-20', 'None', 'OUT-00013', 'Active', 2, 14, 'MXT-ACC-0003', NULL),
(64, 30, '2017-03-20', 'None', 'OUT-00013', 'Active', 2, 14, 'MXT-ACC-0004', NULL),
(65, 30, '2017-03-20', 'None', 'OUT-00013', 'Active', 2, 14, 'MXT-ACC-0005', NULL),
(66, 10, '2017-03-20', 'None', 'OUT-00013', 'Active', 2, 14, 'DCA-PWT-0001', NULL),
(67, 10, '2017-03-20', 'None', 'OUT-00013', 'Active', 2, 14, 'DCA-PWT-0002', NULL),
(68, 10, '2017-03-20', 'None', 'OUT-00013', 'Active', 2, 14, 'DCA-PWT-0003', NULL),
(69, 10, '2017-03-20', 'None', 'OUT-00013', 'Active', 2, 14, 'DCA-PWT-0004', NULL),
(70, 10, '2017-03-20', 'None', 'OUT-00013', 'Active', 2, 14, 'DCA-PWT-0005', NULL),
(71, 20, '2017-03-22', 'None', 'OUT-00014', 'Active', 2, 7, 'AFR-ACC-0001', NULL),
(72, 20, '2017-03-22', 'None', 'OUT-00014', 'Active', 2, 7, 'AFR-ACC-0002', NULL),
(73, 20, '2017-03-22', 'None', 'OUT-00014', 'Active', 2, 7, 'AFR-ACC-0003', NULL),
(74, 10, '2017-03-22', 'None', 'OUT-00014', 'Active', 2, 7, 'MXT-PWT-0001', NULL),
(75, 10, '2017-03-22', 'None', 'OUT-00014', 'Active', 2, 7, 'MXT-PWT-0003', NULL),
(76, 10, '2017-03-22', 'None', 'OUT-00014', 'Active', 2, 7, 'MXT-PWT-0005', NULL),
(77, 10, '2017-03-22', 'None', 'OUT-00014', 'Active', 2, 7, 'MXT-PWT-0007', NULL),
(78, 5, '2017-03-22', 'None', 'OUT-00014', 'Active', 2, 7, 'SSS-PWT-0007', NULL),
(79, 5, '2017-03-22', 'None', 'OUT-00014', 'Active', 2, 7, 'SSS-PWT-0008', NULL),
(80, 5, '2017-03-22', 'None', 'OUT-00014', 'Active', 2, 7, 'SSS-PWT-0009', NULL),
(81, 5, '2017-03-22', 'None', 'OUT-00014', 'Active', 2, 7, 'SSS-PWT-0010', NULL),
(82, 5, '2017-03-22', 'None', 'OUT-00014', 'Active', 2, 7, 'SSS-PWT-0011', NULL),
(83, 25, '2017-03-26', 'None', 'OUT-00015', 'Active', 5, 13, 'DGR-ACC-0001', NULL),
(84, 25, '2017-03-26', 'None', 'OUT-00015', 'Active', 5, 13, 'DGR-ACC-0002', NULL),
(85, 25, '2017-03-26', 'None', 'OUT-00015', 'Active', 5, 13, 'DGR-ACC-0003', NULL),
(86, 25, '2017-03-26', 'None', 'OUT-00015', 'Active', 5, 13, 'DGR-ACC-0004', NULL),
(87, 25, '2017-03-26', 'None', 'OUT-00015', 'Active', 5, 13, 'DGR-ACC-0005', NULL),
(88, 30, '2017-03-26', 'None', 'OUT-00015', 'Active', 1, 13, 'DGR-ACC-0001', NULL),
(89, 30, '2017-03-26', 'None', 'OUT-00015', 'Active', 1, 13, 'DGR-ACC-0002', NULL),
(90, 30, '2017-03-26', 'None', 'OUT-00015', 'Active', 1, 13, 'DGR-ACC-0003', NULL),
(91, 30, '2017-03-26', 'None', 'OUT-00015', 'Active', 1, 13, 'DGR-ACC-0004', NULL),
(92, 30, '2017-03-26', 'None', 'OUT-00015', 'Active', 1, 13, 'DGR-ACC-0005', NULL),
(93, 30, '2017-03-26', 'None', 'OUT-00015', 'Active', 1, 13, 'DGR-ACC-0006', NULL),
(94, 30, '2017-03-26', 'None', 'OUT-00015', 'Active', 1, 13, 'DGR-ACC-0007', NULL),
(95, 30, '2017-03-26', 'None', 'OUT-00015', 'Active', 1, 13, 'DGR-ACC-0008', NULL),
(96, 30, '2017-03-26', 'None', 'OUT-00015', 'Active', 1, 13, 'DGR-ACC-0009', NULL),
(97, 30, '2017-03-26', 'None', 'OUT-00015', 'Active', 1, 13, 'DGR-ACC-0010', NULL),
(98, 10, '2017-03-26', 'None', 'OUT-00016', 'Active', 5, 14, 'TKU-HDT-0002', NULL),
(99, 10, '2017-03-26', 'None', 'OUT-00016', 'Active', 5, 14, 'TKU-HDT-0003', NULL),
(100, 10, '2017-03-26', 'None', 'OUT-00016', 'Active', 5, 14, 'TKU-HDT-0004', NULL),
(101, 10, '2017-03-26', 'None', 'OUT-00016', 'Active', 5, 14, 'TKU-HDT-0005', NULL),
(102, 10, '2017-03-26', 'None', 'OUT-00016', 'Active', 5, 14, 'TKU-HDT-0006', NULL),
(103, 10, '2017-03-26', 'None', 'OUT-00016', 'Active', 5, 14, 'TKU-HDT-0007', NULL),
(104, 10, '2017-03-26', 'None', 'OUT-00016', 'Active', 5, 14, 'TKU-HDT-0008', NULL),
(105, 10, '2017-03-26', 'None', 'OUT-00016', 'Active', 5, 14, 'TKU-HDT-0009', NULL),
(106, 25, '2017-03-26', 'None', 'OUT-00016', 'Active', 5, 14, 'SSS-PWT-0014', NULL),
(107, 25, '2017-03-26', 'None', 'OUT-00016', 'Active', 5, 14, 'SSS-PWT-0015', NULL),
(108, 25, '2017-03-26', 'None', 'OUT-00016', 'Active', 5, 14, 'SSS-PWT-0016', NULL),
(109, 25, '2017-03-26', 'None', 'OUT-00016', 'Active', 5, 14, 'SSS-PWT-0017', NULL),
(110, 25, '2017-03-26', 'None', 'OUT-00016', 'Active', 5, 14, 'SSS-PWT-0018', NULL),
(111, 25, '2017-04-14', 'None', 'OUT-00017', 'Active', 2, 8, 'MXS-PWT-0001', NULL),
(112, 25, '2017-04-14', 'None', 'OUT-00017', 'Active', 2, 8, 'MXS-PWT-0002', NULL),
(113, 25, '2017-04-14', 'None', 'OUT-00017', 'Active', 2, 8, 'MXS-PWT-0003', NULL),
(114, 25, '2017-04-14', 'None', 'OUT-00017', 'Active', 2, 8, 'MXS-PWT-0004', NULL),
(115, 25, '2017-04-14', 'None', 'OUT-00017', 'Active', 2, 8, 'MXS-PWT-0005', NULL),
(116, 10, '2017-04-03', 'None', 'OUT-00018', 'Active', 3, 7, 'DGR-ACC-0001', NULL),
(117, 10, '2017-04-03', 'None', 'OUT-00018', 'Active', 3, 7, 'DGR-ACC-0002', NULL),
(118, 10, '2017-04-03', 'None', 'OUT-00018', 'Active', 3, 7, 'DGR-ACC-0003', NULL),
(119, 10, '2017-04-03', 'None', 'OUT-00018', 'Active', 3, 7, 'DGR-ACC-0004', NULL),
(120, 10, '2017-04-03', 'None', 'OUT-00018', 'Active', 3, 7, 'DGR-ACC-0005', NULL),
(121, 15, '2017-04-05', 'None', 'OUT-00019', 'Active', 1, 19, 'LTS-HDT-0001', NULL),
(122, 15, '2017-04-05', 'None', 'OUT-00019', 'Active', 1, 19, 'LTS-HDT-0002', NULL),
(123, 15, '2017-04-05', 'None', 'OUT-00019', 'Active', 1, 19, 'LTS-HDT-0003', NULL),
(124, 15, '2017-04-05', 'None', 'OUT-00019', 'Active', 1, 19, 'LTS-HDT-0004', NULL),
(125, 15, '2017-04-05', 'None', 'OUT-00019', 'Active', 1, 19, 'LTS-HDT-0005', NULL),
(126, 15, '2017-04-09', 'None', 'OUT-00020', 'Active', 5, 13, 'MXS-PWT-0001', NULL),
(127, 15, '2017-04-09', 'None', 'OUT-00020', 'Active', 5, 13, 'MXS-PWT-0002', NULL),
(128, 15, '2017-04-09', 'None', 'OUT-00020', 'Active', 5, 13, 'MXS-PWT-0003', NULL),
(129, 15, '2017-04-09', 'None', 'OUT-00020', 'Active', 5, 13, 'MXS-PWT-0004', NULL),
(130, 15, '2017-04-09', 'None', 'OUT-00020', 'Active', 5, 13, 'MXS-PWT-0005', NULL),
(131, 10, '2017-04-09', 'None', 'OUT-00020', 'Active', 5, 13, 'DGR-ACC-0001', NULL),
(132, 10, '2017-04-09', 'None', 'OUT-00020', 'Active', 5, 13, 'DGR-ACC-0001', NULL),
(133, 10, '2017-04-09', 'None', 'OUT-00020', 'Active', 5, 13, 'DGR-ACC-0001', NULL),
(134, 10, '2017-04-09', 'None', 'OUT-00020', 'Active', 5, 13, 'DGR-ACC-0001', NULL),
(135, 10, '2017-04-09', 'None', 'OUT-00020', 'Active', 5, 13, 'DGR-ACC-0001', NULL),
(136, 15, '2017-04-11', 'None', 'OUT-00021', 'Active', 2, 9, 'TKU-HDT-0001', NULL),
(137, 15, '2017-04-11', 'None', 'OUT-00021', 'Active', 2, 9, 'TKU-HDT-0002', NULL),
(138, 15, '2017-04-11', 'None', 'OUT-00021', 'Active', 2, 9, 'TKU-HDT-0003', NULL),
(139, 15, '2017-04-11', 'None', 'OUT-00021', 'Active', 2, 9, 'TKU-HDT-0004', NULL),
(140, 15, '2017-04-11', 'None', 'OUT-00021', 'Active', 2, 9, 'TKU-HDT-0005', NULL),
(141, 10, '2017-04-12', 'None', 'OUT-00022', 'Active', 2, 8, 'AFR-PWT-0001', NULL),
(142, 10, '2017-04-12', 'None', 'OUT-00022', 'Active', 2, 8, 'AFR-PWT-0002', NULL),
(143, 10, '2017-04-12', 'None', 'OUT-00022', 'Active', 2, 8, 'AFR-PWT-0003', NULL),
(144, 10, '2017-04-12', 'None', 'OUT-00022', 'Active', 2, 8, 'AFR-PWT-0004', NULL),
(145, 10, '2017-04-12', 'None', 'OUT-00022', 'Active', 2, 8, 'AFR-PWT-0005', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodID` varchar(25) NOT NULL,
  `prodName` varchar(100) NOT NULL,
  `categoryID` varchar(25) NOT NULL,
  `brandID` varchar(25) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `reorderLevel` int(5) NOT NULL,
  `unitType` varchar(45) CHARACTER SET big5 NOT NULL,
  `status` varchar(45) DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodID`, `prodName`, `categoryID`, `brandID`, `price`, `reorderLevel`, `unitType`, `status`) VALUES
('AFR-ACC-0001', '1901012025 - Hss Co-Eco Cutter 12x25', 'ACC', 'AFR', '1300.00', 30, 'Piece/s', 'Active'),
('AFR-ACC-0002', '1901013025 - Hss Co-Eco Cutter 13x25', 'ACC', 'AFR', '1400.00', 30, 'Piece/s', 'Active'),
('AFR-ACC-0003', '1901013525 - Hss Co-Eco Cutter 13.5x25', 'ACC', 'AFR', '1500.00', 30, 'Piece/s', 'Active'),
('AFR-ACC-0004', '1901014025 - Hss Co-Eco Cutter 14x25', 'ACC', 'AFR', '1500.00', 30, 'Piece/s', 'Active'),
('AFR-ACC-0005', '1901015025 - Hss Co-Eco Cutter 15x25', 'ACC', 'AFR', '1625.00', 30, 'Piece/s', 'Active'),
('AFR-ACC-0006', '1926500 - Ejector Pin 6.35x77', 'ACC', 'AFR', '650.00', 30, 'Piece/s', 'Active'),
('AFR-ACC-0007', '1935500 - Ejector Pin 6.35x87', 'ACC', 'AFR', '820.00', 30, 'Piece/s', 'Active'),
('AFR-ACC-0008', '1950500 - Ejector Pin 6.35x102', 'ACC', 'AFR', '850.00', 30, 'Piece/s', 'Active'),
('AFR-ACC-0009', '2001502 - Ejector Pin 8x160', 'ACC', 'AFR', '650.00', 30, 'Piece/s', 'Active'),
('AFR-ACC-0010', '2001501 - Ejector Pin 8x102', 'ACC', 'AFR', '820.00', 30, 'Piece/s', 'Active'),
('AFR-ACC-0011', '2003012035 - Tct Cutter 12x35', 'ACC', 'AFR', '4530.00', 25, 'Piece/s', 'Active'),
('AFR-ACC-0012', '2003012050 - Tct Cutter12x50', 'ACC', 'AFR', '5120.00', 25, 'Piece/s', 'Active'),
('AFR-ACC-0013', '2003013035 - Tct Cutter13x35', 'ACC', 'AFR', '4530.00', 25, 'Piece/s', 'Active'),
('AFR-ACC-0014', '2003013050 - Tct Cutter13x50', 'ACC', 'AFR', '5120.00', 25, 'Piece/s', 'Active'),
('AFR-ACC-0015', '2003014035 - Tct Cutter14x35', 'ACC', 'AFR', '4530.00', 25, 'Piece/s', 'Active'),
('AFR-PWT-0001', 'RB35X - Magnetic Drill 1100W 120mm', 'PWT', 'AFR', '63000.00', 15, 'Piece/s', 'Active'),
('AFR-PWT-0002', 'RB50X - Magnetic Drill 1200W 100mm', 'PWT', 'AFR', '115000.00', 15, 'Piece/s', 'Active'),
('AFR-PWT-0003', 'RB80X - Magnetic Drill 1800W 100mm', 'PWT', 'AFR', '145000.00', 15, 'Piece/s', 'Active'),
('AFR-PWT-0004', '60RL-E - Magnetic Drill 1800W 60mm', 'PWT', 'AFR', '175000.00', 15, 'Piece/s', 'Active'),
('AFR-PWT-0005', '100RL-E - Magnetic Drill 1800W 116mm', 'PWT', 'AFR', '200000.00', 15, 'Piece/s', 'Active'),
('DCA-PWT-0001', 'ADJZ09-10A - Cordless Driver Drill 12V/1.5Ah 10 mm', 'PWT', 'DCA', '8600.00', 15, 'Piece/s', 'Active'),
('DCA-PWT-0002', ' ADJZ13A - Cordless Driver Hammer Drill 18V/3Ahx2 13 mm ', 'PWT', 'DCA', '21250.00', 15, 'Piece/s', 'Active'),
('DCA-PWT-0003', 'ADPL02-8A - Cordless Impact Driver 12V/1.5Ahx2/', 'PWT', 'DCA', '9500.00', 15, 'Piece/s', 'Active'),
('DCA-PWT-0004', 'ADPB16A - Cordless Impact Wrench 18V/3Ahx2 ', 'PWT', 'DCA', '19500.00', 15, 'Piece/s', 'Active'),
('DCA-PWT-0005', 'ADMD12 - Cordless Multi-tool12V/1.5Ahx2 ', 'PWT', 'DCA', '13650.00', 10, 'Piece/s', 'Active'),
('DCA-PWT-0006', 'AJG04-355 - Electric Cut Off Machine 355x3x25.4mm 2000W ', 'PWT', 'DCA', '12450.00', 10, 'Piece/s', 'Active'),
('DCA-PWT-0007', 'AMY02-185 - Electric Circular Saw 1100W 64mm', 'PWT', 'DCA', '5950.00', 10, 'Piece/s', 'Active'),
('DCA-PWT-0008', 'AMY235 - Electric Circular Saw 1520W 84mm', 'PWT', 'DCA', '9850.00', 10, 'Piece/s', 'Active'),
('DCA-PWT-0009', 'AJX255 - Electric Mitre Saw 1650W 255mm', 'PWT', 'DCA', '19500.00', 10, 'Piece/s', 'Active'),
('DCA-PWT-0010', 'AJH32 - Electric Nibbler 620W 3.2mm 2.5mm 120mm 128mm', 'PWT', 'DCA', '12375.00', 10, 'Piece/s', 'Active'),
('DCA-PWT-0011', 'AZG6 - Percussion Hammer 900W', 'PWT', 'DCA', '12200.00', 10, 'Piece/s', 'Active'),
('DCA-PWT-0012', 'AZG10 - Percussion Hammer 1500W', 'PWT', 'DCA', '24350.00', 10, 'Piece/s', 'Active'),
('DCA-PWT-0013', 'AZG15 - Percussion Hammer 1240W', 'PWT', 'DCA', '24900.00', 10, 'Piece/s', 'Active'),
('DCA-PWT-0014', 'APB20C - Electric Wrench 340W 12.7x12.7mm', 'PWT', 'DCA', '7500.00', 10, 'Piece/s', 'Active'),
('DCA-PWT-0015', 'AJJ32 - Electric Shear 620W 3.2mm 2.5mm 50mm', 'PWT', 'DCA', '9375.00', 10, 'Piece/s', 'Active'),
('DCA-PWT-0016', 'AJF30 - Reciprocating Saw 590W 30mm 90mm 90mm', 'PWT', 'DCA', '6875.00', 10, 'Piece/s', 'Active'),
('DCA-PWT-0017', 'AML02-404 - Electric Chain Saw 1300W 405mm', 'PWT', 'DCA', '12800.00', 10, 'Piece/s', 'Active'),
('DCA-PWT-0018', 'AQF32 - Electric Blower 680W', 'PWT', 'DCA', '3500.00', 10, 'Piece/s', 'Active'),
('DCA-PWT-0019', 'AMB82 - Electric Planer 500W 82mm 1m', 'PWT', 'DCA', '3650.00', 10, 'Piece/s', 'Active'),
('DCA-PWT-0020', 'AMB02-82 - Electric Planer 570W 82mm 1m', 'PWT', 'DCA', '4100.00', 10, 'Piece/s', 'Active'),
('DGR-ACC-0001', '264D03 - Masonry Drill Bit  Pro-Thread Straight Shank 3.0mm', 'ACC', 'DGR', '89.00', 30, 'Piece/s', 'Active'),
('DGR-ACC-0002', '264D04 - Masonry Drill Bit Pro-Thread Straight Shank 4.0mm', 'ACC', 'DGR', '99.00', 30, 'Piece/s', 'Active'),
('DGR-ACC-0003', '264D04.5 - Masonry Drill Bit Pro-Thread Straight Shank 4.5mm', 'ACC', 'DGR', '115.00', 30, 'Piece/s', 'Active'),
('DGR-ACC-0004', '264D05 - Masonry Drill Bit Pro-Thread Straight Shank 5.0mm', 'ACC', 'DGR', '119.00', 30, 'Piece/s', 'Active'),
('DGR-ACC-0005', '264D05.5 - Masonry Drill Bit Pro-Thread Straight Shank 5.5mm', 'ACC', 'DGR', '129.00', 30, 'Piece/s', 'Active'),
('DGR-ACC-0006', '426D06 - Diamond Core Drilling Blue Ceram 6.0mm', 'ACC', 'DGR', '1800.00', 30, 'Piece/s', 'Active'),
('DGR-ACC-0007', '426D06.5 - Diamond Core Drilling Blue Ceram 6.5mm', 'ACC', 'DGR', '2000.00', 30, 'Piece/s', 'Active'),
('DGR-ACC-0008', '426D07 - Diamond Core Drilling Blue Ceram 7.0mm', 'ACC', 'DGR', '2100.00', 30, 'Piece/s', 'Active'),
('DGR-ACC-0009', '426D08 - Diamond Core Drilling Blue Ceram 8.0mm', 'ACC', 'DGR', '2200.00', 30, 'Piece/s', 'Active'),
('DGR-ACC-0010', '426D10 - Diamond Core Drilling Blue Ceram 10.0mm', 'ACC', 'DGR', '2300.00', 30, 'Piece/s', 'Active'),
('DGR-ACC-0011', '726D01 - Hss Metal Drill Bits Pro 1.0x10', 'ACC', 'DGR', '250.00', 30, 'Piece/s', 'Active'),
('DGR-ACC-0012', '726D04.5 - Hss Metal Drill Bits Pro 4.5x10', 'ACC', 'DGR', '460.00', 30, 'Piece/s', 'Active'),
('DGR-ACC-0013', '726D05 - Hss Metal Drill Bits Pro 5.0x10', 'ACC', 'DGR', '510.00', 30, 'Piece/s', 'Active'),
('DGR-ACC-0014', '726D05.2 - Hss Metal Drill Bits Pro 5.2x10', 'ACC', 'DGR', '670.00', 30, 'Piece/s', 'Active'),
('DGR-ACC-0015', '726D05.5 - Hss Metal Drill Bits Pro 5.5x10', 'ACC', 'DGR', '680.00', 30, 'Piece/s', 'Active'),
('DGR-ACC-0016', '650D25 - Holesaw Cobalt Bi-Metal 25mm', 'ACC', 'DGR', '1400.00', 25, 'Piece/s', 'Active'),
('DGR-ACC-0017', '650D27 - Holesaw Cobalt Bi-Metal 27mm', 'ACC', 'DGR', '1450.00', 25, 'Piece/s', 'Active'),
('DGR-ACC-0018', '650D29 - Holesaw Cobalt Bi-Metal 29mm', 'ACC', 'DGR', '1500.00', 25, 'Piece/s', 'Active'),
('DGR-ACC-0019', '650D30 - Holesaw Cobalt Bi-Metal 30mm', 'ACC', 'DGR', '1510.00', 25, 'Piece/s', 'Active'),
('DGR-ACC-0020', '650D32 - Holesaw Cobalt Bi-Metal 32mm', 'ACC', 'DGR', '1520.00', 25, 'Piece/s', 'Active'),
('LTS-ACC-0001', 'LAG115N38 - Carbon Brush 3.25x0.8x0.5mm', 'ACC', 'LTS', '90.00', 20, 'Piece/s', 'Active'),
('LTS-ACC-0002', 'LID10REN22 - Carbon Brush 3.75x0.75x0.5mm', 'ACC', 'LTS', '90.00', 20, 'Piece/s', 'Active'),
('LTS-ACC-0003', 'LID13REN23 - Carbon Brush 3.25x0.90x0.5mm', 'ACC', 'LTS', '90.00', 20, 'Piece/s', 'Active'),
('LTS-ACC-0004', 'LPK180N32 - Carbon Brush 2x1x0.75mm', 'ACC', 'LTS', '150.00', 20, 'Piece/s', 'Active'),
('LTS-ACC-0005', 'LID13REP21 - Carbon Brush', 'ACC', 'LTS', '20.00', 20, 'Piece/s', 'Active'),
('LTS-ACC-0006', 'LAG115CH-45 - Carbon Brush', 'ACC', 'LTS', '110.00', 20, 'Piece/s', 'Active'),
('LTS-ACC-0007', 'LAG115SSN29 - Carbon Brush 3.25x0.80x0.5', 'ACC', 'LTS', '90.00', 20, 'Piece/s', 'Active'),
('LTS-ACC-0008', 'LAG115Z1.38 - Carbon Brush', 'ACC', 'LTS', '50.00', 20, 'Piece/s', 'Active'),
('LTS-ACC-0009', 'LAT2026.2.32 - Carbon Brush 3.25x0.55x0.5mm', 'ACC', 'LTS', '90.00', 20, 'Piece/s', 'Active'),
('LTS-ACC-0010', 'LCOM355H.43 - Carbon Brush', 'ACC', 'LTS', '235.00', 20, 'Piece/s', 'Active'),
('LTS-HDT-0001', 'LDG101 - Air Duster', 'HDT', 'LTS', '260.00', 10, 'Piece/s', 'Active'),
('LTS-HDT-0002', 'LDG101AD - Air Duster', 'HDT', 'LTS', '290.00', 10, 'Piece/s', 'Active'),
('LTS-HDT-0003', 'LDG102 - Air Duster Heavy Duty', 'HDT', 'LTS', '250.00', 10, 'Piece/s', 'Active'),
('LTS-HDT-0004', 'LAL3001M - Aluminum Level 12"/300MM', 'HDT', 'LTS', '250.00', 15, 'Piece/s', 'Active'),
('LTS-HDT-0005', 'LAL4501M - Aluminum Level 18"/450MM', 'HDT', 'LTS', '340.00', 15, 'Piece/s', 'Active'),
('LTS-HDT-0006', 'LAL6001M - Aluminum Level 24"/600MM', 'HDT', 'LTS', '380.00', 15, 'Piece/s', 'Active'),
('LTS-HDT-0007', 'LAL9001M - Aluminum Level 36"/900MM', 'HDT', 'LTS', '480.00', 15, 'Piece/s', 'Active'),
('LTS-HDT-0008', 'LAS250L - Aviation Snip 10"', 'HDT', 'LTS', '400.00', 15, 'Piece/s', 'Active'),
('LTS-HDT-0009', 'LAS250R - Aviation Snip 10"', 'HDT', 'LTS', '400.00', 15, 'Piece/s', 'Active'),
('LTS-HDT-0010', 'LAS250S - Aviation Snip 10"', 'HDT', 'LTS', '400.00', 15, 'Piece/s', 'Active'),
('MXS-PWT-0001', 'MAB-650 - Air Blower 600W', 'PWT', 'MXS', '3299.00', 20, 'Piece/s', 'Active'),
('MXS-PWT-0002', 'MSD-720AC - Hole Gun 720W ', 'PWT', 'MXS', '3299.00', 20, 'Piece/s', 'Active'),
('MXS-PWT-0003', 'MSD-1063VSR - Hammer 630W', 'PWT', 'MXS', '3499.00', 20, 'Piece/s', 'Active'),
('MXS-PWT-0004', 'MSD-1385VSR - Hammer 850W', 'PWT', 'MXS', '4499.00', 20, 'Piece/s', 'Active'),
('MXS-PWT-0005', 'MCH-1200 - Chipping Hammer 1200W', 'PWT', 'MXS', '18099.00', 20, 'Piece/s', 'Active'),
('MXS-PWT-0006', 'MRH-2400B - Rotary Hammer 750W', 'PWT', 'MXS', '7499.00', 20, 'Piece/s', 'Active'),
('MXS-PWT-0007', 'MRH-3200 - Rotary Hammer 1100W', 'PWT', 'MXS', '19999.00', 20, 'Piece/s', 'Active'),
('MXS-PWT-0008', 'MRH-3800 - Rotary Hammer 1350W', 'PWT', 'MXS', '36999.00', 20, 'Piece/s', 'Active'),
('MXS-PWT-0009', 'MSB-1650 - Concrete Breaker 1700W', 'PWT', 'MXS', '45999.00', 20, 'Piece/s', 'Active'),
('MXS-PWT-0010', 'MSB-2060 - Demolition Hammer 2100W', 'PWT', 'MXS', '84999.00', 20, 'Piece/s', 'Active'),
('MXS-PWT-0011', 'MSG-5402 - Angle Grinder 600W', 'PWT', 'MXS', '3099.00', 15, 'Piece/s', 'Active'),
('MXS-PWT-0012', 'MSG-5410 - Angle Grinder 800W', 'PWT', 'MXS', '3699.00', 15, 'Piece/s', 'Active'),
('MXS-PWT-0013', 'MSG-5420P - Angle Grinder 850W', 'PWT', 'MXS', '4299.00', 15, 'Piece/s', 'Active'),
('MXS-PWT-0014', 'MLG-5755 - Angle Grinder 2400W', 'PWT', 'MXS', '6999.00', 15, 'Piece/s', 'Active'),
('MXS-PWT-0015', 'MBG-6250 - Bench Grinder 250W', 'PWT', 'MXS', '4999.00', 15, 'Piece/s', 'Active'),
('MXS-PWT-0016', 'MBG-8550 - Bench Grinder 370W', 'PWT', 'MXS', '5999.00', 15, 'Piece/s', 'Active'),
('MXS-PWT-0017', 'MDG-147DAC - Die Grinder 170W', 'PWT', 'MXS', '3799.00', 15, 'Piece/s', 'Active'),
('MXS-PWT-0018', 'MST-750 - Straight Grinder 710W', 'PWT', 'MXS', '5899.00', 15, 'Piece/s', 'Active'),
('MXS-PWT-0019', 'MSS-2009 - Cut-Off Saw 1600W', 'PWT', 'MXS', '29500.00', 10, 'Piece/s', 'Active'),
('MXS-PWT-0020', 'MSS-2008 - Steel Slicer Saw 2800W', 'PWT', 'MXS', '11999.00', 10, 'Piece/s', 'Active'),
('MXT-ACC-0001', 'MXA-1075 - Knotted Twist Cup Brush 3"x1.25mm', 'ACC', 'MXT', '150.00', 25, 'Piece/s', 'Active'),
('MXT-ACC-0002', 'MCW-4060 - Cup Wheel 4"', 'ACC', 'MXT', '600.00', 20, 'Piece/s', 'Active'),
('MXT-ACC-0003', 'MTG-1146 - Grinding Wheel 100x6.0mm', 'ACC', 'MXT', '43.00', 20, 'Piece/s', 'Active'),
('MXT-ACC-0004', 'MTC-1840 - Continuous Rim 4"/ 105x109x16mm', 'ACC', 'MXT', '280.00', 20, 'Piece/s', 'Active'),
('MXT-ACC-0005', 'MXT-4012 - Max-Cut 4"/100x1.2mm', 'ACC', 'MXT', '350.00', 20, 'Piece/s', 'Active'),
('MXT-ACC-0006', 'MTC-1025 - Cutting Wheel 100x2.5mm', 'ACC', 'MXT', '38.00', 20, 'Piece/s', 'Active'),
('MXT-ACC-0007', 'MXH-2301 - Hss Drill Bit 1.0mm', 'ACC', 'MXT', '20.00', 30, 'Piece/s', 'Active'),
('MXT-ACC-0008', 'MXH-2415 - Hss Drill Bit 1.5mm', 'ACC', 'MXT', '24.00', 30, 'Piece/s', 'Active'),
('MXT-ACC-0009', 'MXH-2502 - Hss Drill Bit 2.0mm', 'ACC', 'MXT', '26.00', 30, 'Piece/s', 'Active'),
('MXT-ACC-0010', 'MXH-2625 - Hss Drill Bit 2.5mm', 'ACC', 'MXT', '28.00', 30, 'Piece/s', 'Active'),
('MXT-ACC-0011', 'MXH-2703 - Hss Drill Bit 3.0mm', 'ACC', 'MXT', '30.00', 30, 'Piece/s', 'Active'),
('MXT-PWT-0001', 'MXT-2000K - Hot Air Gun 2000W', 'PWT', 'MXT', '2599.00', 15, 'Piece/s', 'Active'),
('MXT-PWT-0002', 'MTJ-2655A - Jigsaw 400W', 'PWT', 'MXT', '2699.00', 15, 'Piece/s', 'Active'),
('MXT-PWT-0003', 'MTS-3020 - Sprayer 300W', 'PWT', 'MXT', '5099.00', 15, 'Piece/s', 'Active'),
('MXT-PWT-0004', 'MAG-101 - Angle Grinder 500W', 'PWT', 'MXT', '2099.00', 15, 'Piece/s', 'Active'),
('MXT-PWT-0005', 'MAG-200 - Angle Grinder 730W', 'PWT', 'MXT', '2599.00', 15, 'Piece/s', 'Active'),
('MXT-PWT-0006', 'MTP-7120 - Polisher 1200W', 'PWT', 'MXT', '6299.00', 15, 'Piece/s', 'Active'),
('MXT-PWT-0007', 'MSD-0645- Electric Drill 420W', 'PWT', 'MXT', '2399.00', 15, 'Piece/s', 'Active'),
('MXT-PWT-0008', 'MSD-1055VSR - Hammer Drill 550W', 'PWT', 'MXT', '2599.00', 15, 'Piece/s', 'Active'),
('MXT-PWT-0009', 'MSD-1365VSR - Hammer Drill 650W', 'PWT', 'MXT', '3199.00', 15, 'Piece/s', 'Active'),
('SSS-PWT-0001', 'SWG-190 - Welding Generator Gasoline 686x550x570mm', 'PWT', 'SSS', '68000.00', 10, 'Piece/s', 'Active'),
('SSS-PWT-0002', 'SDGW-70-0PT - Welding Generator Diesel 740x495x655mm', 'PWT', 'SSS', '74000.00', 10, 'Piece/s', 'Active'),
('SSS-PWT-0003', 'SDGL-10S3 - Diesel Generator 1680x790x960mm', 'PWT', 'SSS', '265000.00', 10, 'Piece/s', 'Active'),
('SSS-PWT-0004', 'SDG-15S - Diesel Generator 1680x760x960mm', 'PWT', 'SSS', '330000.00', 10, 'Piece/s', 'Active'),
('SSS-PWT-0005', 'SDG-25SIE - Diesel Generator 2010x860x1070mm', 'PWT', 'SSS', '570000.00', 10, 'Piece/s', 'Active'),
('SSS-PWT-0006', 'SDG-30SIE - Diesel Generator 2010x860x1070mm', 'PWT', 'SSS', '620000.00', 10, 'Piece/s', 'Active'),
('SSS-PWT-0007', 'SDG-35SIE - Diesel Generator 2010x860x1070mm', 'PWT', 'SSS', '650000.00', 10, 'Piece/s', 'Active'),
('SSS-PWT-0008', 'SDG-65-0PT - Portable Diesel Generator 720x492x650mm', 'PWT', 'SSS', '55000.00', 10, 'Piece/s', 'Active'),
('SSS-PWT-0009', 'SDG-396-LN - Portable Diesel Generator 980x565x780mm', 'PWT', 'SSS', '85000.00', 10, 'Piece/s', 'Active'),
('SSS-PWT-0010', 'SGG-1000 - Portable Gasoline Generator 460x360x420mm', 'PWT', 'SSS', '18000.00', 10, 'Piece/s', 'Active'),
('SSS-PWT-0011', 'SGG-3100 - Portable Gasoline Generator 593x465x458mm', 'PWT', 'SSS', '27000.00', 10, 'Piece/s', 'Active'),
('SSS-PWT-0012', 'SGG-396-0PT - Portable Gasoline Generator 683x540x555mm', 'PWT', 'SSS', '45000.00', 10, 'Piece/s', 'Active'),
('SSS-PWT-0013', 'SGG-2000i - Portable Inverter Generator 48.6x43mm', 'PWT', 'SSS', '35000.00', 10, 'Piece/s', 'Active'),
('SSS-PWT-0014', 'RMC-051 - Single Low Bed Cylinder 43mm 30mm', 'PWT', 'SSS', '3250.00', 10, 'Piece/s', 'Active'),
('SSS-PWT-0015', 'RMC-101 - Single Low Bed Cylinder 47mm 43mm', 'PWT', 'SSS', '5220.00', 10, 'Piece/s', 'Active'),
('SSS-PWT-0016', 'RMC-201 - Single Low Bed Cylinder 52mm 60mm', 'PWT', 'SSS', '6050.00', 10, 'Piece/s', 'Active'),
('SSS-PWT-0017', 'RMC-1001 - Single Low Bed Cylinder 86mm 130mm', 'PWT', 'SSS', '15200.00', 10, 'Piece/s', 'Active'),
('SSS-PWT-0018', 'RMC-2001 - Single Low Bed Cylinder100mm 189mm', 'PWT', 'SSS', '42110.00', 10, 'Piece/s', 'Active'),
('SSS-PWT-0019', 'RSC-0050 - Single Cylinder133mm 30mm', 'PWT', 'SSS', '3250.00', 10, 'Piece/s', 'Active'),
('SSS-PWT-0020', 'RSC1050 - Single Cylinder 139mm 43mm', 'PWT', 'SSS', '5100.00', 10, 'Piece/s', 'Active'),
('TFM-ACC-0001', 'MC0941 - CINA 350 Gas Nozzle', 'ACC', 'TFM', '270.00', 15, 'Piece/s', 'Active'),
('TFM-ACC-0002', 'ME0421 - CINA 350 Diffuser', 'ACC', 'TFM', '40.00', 15, 'Piece/s', 'Active'),
('TFM-ACC-0003', 'MC1104P - CINA 350 Insulator Nut PANA', 'ACC', 'TFM', '200.00', 15, 'Piece/s', 'Active'),
('TFM-ACC-0004', 'ME0426P - CINA 350 Tip Holder of Torch Head', 'ACC', 'TFM', '265.00', 15, 'Piece/s', 'Active'),
('TFM-ACC-0005', 'MF0299P - CINA 350 Swan Neck Torch Head PANA', 'ACC', 'TFM', '465.00', 15, 'Piece/s', 'Active'),
('TFM-ACC-0006', 'MF0298P - CINA 350 Separable Torch Head PANA', 'ACC', 'TFM', '730.00', 15, 'Piece/s', 'Active'),
('TFM-ACC-0007', 'GM0574 - Liner 1-1.4 3m EURO', 'ACC', 'TFM', '250.00', 15, 'Piece/s', 'Active'),
('TFM-ACC-0008', 'GM0575 - Liner 1-1.4 4m EURO', 'ACC', 'TFM', '330.00', 15, 'Piece/s', 'Active'),
('TFM-ACC-0009', 'FB0319 - Joint with Spring', 'ACC', 'TFM', '140.00', 15, 'Piece/s', 'Active'),
('TFM-ACC-0010', 'EA0342 - Spring Cable Support', 'ACC', 'TFM', '50.00', 15, 'Piece/s', 'Active'),
('TFM-ACC-0011', 'MC0930 - CINA 200 Gas Nozzle', 'ACC', 'TFM', '220.00', 15, 'Piece/s', 'Active'),
('TFM-ACC-0012', 'MF0293 - CINA 200 Torch Head', 'ACC', 'TFM', '385.00', 15, 'Piece/s', 'Active'),
('TFM-ACC-0013', 'BW0237 - Front Cable Rubber Support', 'ACC', 'TFM', '30.00', 15, 'Piece/s', 'Active'),
('TFM-ACC-0014', 'GM0510 - Red Liner 1-1.2 3m/Euro', 'ACC', 'TFM', '245.00', 15, 'Piece/s', 'Active'),
('TFM-ACC-0015', 'GM0511 - Red Liner 1-1.2 4m/Euro', 'ACC', 'TFM', '325.00', 15, 'Piece/s', 'Active'),
('TFM-ACC-0016', 'MD0291-08 - Contact Tip 0.8', 'ACC', 'TFM', '63.00', 30, 'Piece/s', 'Active'),
('TFM-ACC-0017', 'MD0291-10 - Contact Tip 1.0', 'ACC', 'TFM', '63.00', 30, 'Piece/s', 'Active'),
('TFM-ACC-0018', 'MD0291-12 - Contact Tip 1.2', 'ACC', 'TFM', '63.00', 30, 'Piece/s', 'Active'),
('TFM-ACC-0019', 'MD0291-16 - Contact Tip 1.6mm', 'ACC', 'TFM', '63.00', 30, 'Piece/s', 'Active'),
('TFM-ACC-0020', 'MD0291-80 - Contact Tip 1.0 (Cu, Cr, Zr)', 'ACC', 'TFM', '63.00', 30, 'Piece/s', 'Active'),
('TKU-ACC-0001', 'A-1 - Asphat Cutter 540mm', 'ACC', 'TKU', '4500.00', 20, 'Piece/s', 'Active'),
('TKU-ACC-0002', 'A-4 - Asphat Cutter 505mm', 'ACC', 'TKU', '4300.00', 20, 'Piece/s', 'Active'),
('TKU-ACC-0003', 'C-1 - Chisel (Narrow) 610mm', 'ACC', 'TKU', '2900.00', 25, 'Piece/s', 'Active'),
('TKU-ACC-0004', 'C-2 - Chisel (Narrow) 610mm', 'ACC', 'TKU', '2800.00', 25, 'Piece/s', 'Active'),
('TKU-ACC-0005', 'C-9 - Chisel (Narrow) 475mm', 'ACC', 'TKU', '1900.00', 25, 'Piece/s', 'Active'),
('TKU-ACC-0006', 'D-1 - Digger Chisel 570mm', 'ACC', 'TKU', '7200.00', 25, 'Piece/s', 'Active'),
('TKU-ACC-0007', 'D-4 - Digger Chisel 500mm', 'ACC', 'TKU', '7200.00', 25, 'Piece/s', 'Active'),
('TKU-ACC-0008', 'DW1 - Digger Spade 545mm', 'ACC', 'TKU', '7600.00', 25, 'Piece/s', 'Active'),
('TKU-ACC-0009', 'DW4 - Digger Spade 490mm', 'ACC', 'TKU', '7600.00', 25, 'Piece/s', 'Active'),
('TKU-ACC-0010', 'M-1 - Moil Point 620mm', 'ACC', 'TKU', '2600.00', 30, 'Piece/s', 'Active'),
('TKU-HDT-0001', 'AF-5A - Air Saw/Cutter 5mm', 'PWT', 'TKU', '32000.00', 20, 'Piece/s', 'Active'),
('TKU-HDT-0002', 'AF-10S - Air Saw/Cutter 10mm', 'PWT', 'TKU', '42000.00', 20, 'Piece/s', 'Active'),
('TKU-HDT-0003', 'APS-30 - Air Saw/Cutter 30mm', 'PWT', 'TKU', '80000.00', 20, 'Piece/s', 'Active'),
('TKU-HDT-0004', 'TCD-20 - Concrete Breaker', 'PWT', 'TKU', '85000.00', 25, 'Piece/s', 'Active'),
('TKU-HDT-0005', 'TAG-40SA - Angle Grinder 100x16mm', 'PWT', 'TKU', '21000.00', 25, 'Piece/s', 'Active'),
('TKU-HDT-0006', 'MG-20 - Die Grinder', 'PWT', 'TKU', '8500.00', 25, 'Piece/s', 'Active'),
('TKU-HDT-0007', 'TSG-3F - Straight Grinder 3"', 'PWT', 'TKU', '31000.00', 25, 'Piece/s', 'Active'),
('TKU-HDT-0008', 'MI-1310 - Impact Wrench 3/8" Straight Body 10mm', 'PWT', 'TKU', '15000.00', 25, 'Piece/s', 'Active'),
('TKU-HDT-0009', 'TH-5S - Rock Drill ', 'PWT', 'TKU', '86000.00', 25, 'Piece/s', 'Active'),
('TKU-HDT-0010', 'MS-4125B - Sander and Polisher 3" -5"', 'PWT', 'TKU', '11000.00', 25, 'Piece/s', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `purchaseorders`
--

CREATE TABLE `purchaseorders` (
  `poID` int(6) NOT NULL,
  `poNumber` varchar(45) DEFAULT NULL,
  `poDate` date DEFAULT NULL,
  `qtyOrder` int(5) DEFAULT NULL,
  `supplier` varchar(45) DEFAULT NULL,
  `prodID` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchaseorders`
--

INSERT INTO `purchaseorders` (`poID`, `poNumber`, `poDate`, `qtyOrder`, `supplier`, `prodID`) VALUES
(1, 'PO-00001', '2017-02-28', 75, 'Alphine', 'AFR-ACC-0001'),
(2, 'PO-00001', '2017-02-28', 75, 'Alphine', 'AFR-ACC-0002'),
(3, 'PO-00001', '2017-02-28', 75, 'Alphine', 'AFR-ACC-0003'),
(4, 'PO-00001', '2017-02-28', 75, 'Alphine', 'AFR-ACC-0004'),
(5, 'PO-00001', '2017-02-28', 75, 'Alphine', 'AFR-ACC-0005'),
(6, 'PO-00001', '2017-02-28', 150, 'Alphine', 'AFR-ACC-0006'),
(7, 'PO-00001', '2017-02-28', 150, 'Alphine', 'AFR-ACC-0007'),
(8, 'PO-00001', '2017-02-28', 150, 'Alphine', 'AFR-ACC-0008'),
(9, 'PO-00001', '2017-02-28', 150, 'Alphine', 'AFR-ACC-0009'),
(10, 'PO-00001', '2017-02-28', 150, 'Alphine', 'AFR-ACC-0010'),
(11, 'PO-00001', '2017-02-28', 100, 'Alphine', 'AFR-PWT-0001'),
(12, 'PO-00001', '2017-02-28', 100, 'Alphine', 'AFR-PWT-0002'),
(13, 'PO-00001', '2017-02-28', 100, 'Alphine', 'AFR-PWT-0003'),
(14, 'PO-00001', '2017-02-28', 100, 'Alphine', 'AFR-PWT-0004'),
(15, 'PO-00001', '2017-02-28', 100, 'Alphine', 'AFR-PWT-0005'),
(16, 'PO-00002', '2017-02-28', 100, 'Amity', 'MXS-PWT-0001'),
(17, 'PO-00002', '2017-02-28', 30, 'Amity', 'MXS-PWT-0002'),
(18, 'PO-00002', '2017-02-28', 30, 'Amity', 'MXS-PWT-0003'),
(19, 'PO-00002', '2017-02-28', 30, 'Amity', 'MXS-PWT-0004'),
(20, 'PO-00002', '2017-02-28', 30, 'Amity', 'MXS-PWT-0005'),
(21, 'PO-00002', '2017-02-28', 30, 'Amity', 'MXS-PWT-0006'),
(22, 'PO-00002', '2017-02-28', 30, 'Amity', 'MXS-PWT-0007'),
(23, 'PO-00002', '2017-02-28', 30, 'Amity', 'MXS-PWT-0008'),
(24, 'PO-00002', '2017-02-28', 30, 'Amity', 'MXS-PWT-0009'),
(25, 'PO-00002', '2017-02-28', 30, 'Amity', 'MXS-PWT-0010'),
(26, 'PO-00003', '2017-02-28', 30, 'Philman', 'LTS-ACC-0001'),
(27, 'PO-00003', '2017-02-28', 30, 'Philman', 'LTS-ACC-0002'),
(28, 'PO-00003', '2017-02-28', 30, 'Philman', 'LTS-ACC-0003'),
(29, 'PO-00003', '2017-02-28', 30, 'Philman', 'LTS-ACC-0004'),
(30, 'PO-00003', '2017-02-28', 30, 'Philman', 'LTS-ACC-0005'),
(31, 'PO-00003', '2017-02-28', 50, 'Philman', 'LTS-ACC-0006'),
(32, 'PO-00003', '2017-02-28', 50, 'Philman', 'LTS-ACC-0007'),
(33, 'PO-00003', '2017-02-28', 50, 'Philman', 'LTS-ACC-0008'),
(34, 'PO-00003', '2017-02-28', 50, 'Philman', 'LTS-ACC-0009'),
(35, 'PO-00003', '2017-02-28', 50, 'Philman', 'LTS-ACC-0010'),
(36, 'PO-00004', '2017-02-28', 50, 'Beesin', 'TFM-ACC-0001'),
(37, 'PO-00004', '2017-02-28', 50, 'Beesin', 'TFM-ACC-0002'),
(38, 'PO-00004', '2017-02-28', 50, 'Beesin', 'TFM-ACC-0003'),
(39, 'PO-00004', '2017-02-28', 50, 'Beesin', 'TFM-ACC-0004'),
(40, 'PO-00004', '2017-02-28', 50, 'Beesin', 'TFM-ACC-0005'),
(41, 'PO-00004', '2017-02-28', 30, 'Beesin', 'TFM-ACC-0006'),
(42, 'PO-00004', '2017-02-28', 30, 'Beesin', 'TFM-ACC-0007'),
(43, 'PO-00004', '2017-02-28', 30, 'Beesin', 'TFM-ACC-0008'),
(44, 'PO-00004', '2017-02-28', 30, 'Beesin', 'TFM-ACC-0009'),
(45, 'PO-00004', '2017-02-28', 30, 'Beesin', 'TFM-ACC-0010'),
(46, 'PO-00004', '2017-02-28', 50, 'Beesin', 'TFM-ACC-0011'),
(47, 'PO-00004', '2017-02-28', 50, 'Beesin', 'TFM-ACC-0012'),
(48, 'PO-00004', '2017-02-28', 50, 'Beesin', 'TFM-ACC-0013'),
(49, 'PO-00004', '2017-02-28', 50, 'Beesin', 'TFM-ACC-0014'),
(50, 'PO-00004', '2017-02-28', 50, 'Beesin', 'TFM-ACC-0015'),
(51, 'PO-00005', '2017-02-28', 50, 'Elcabo Trading', 'TKU-ACC-0001'),
(52, 'PO-00005', '2017-02-28', 50, 'Elcabo Trading', 'TKU-ACC-0002'),
(53, 'PO-00005', '2017-02-28', 50, 'Elcabo Trading', 'TKU-ACC-0003'),
(54, 'PO-00005', '2017-02-28', 50, 'Elcabo Trading', 'TKU-ACC-0004'),
(55, 'PO-00005', '2017-02-28', 50, 'Elcabo Trading', 'TKU-ACC-0005'),
(56, 'PO-00005', '2017-02-28', 40, 'Elcabo Trading', 'TKU-ACC-0006'),
(57, 'PO-00005', '2017-02-28', 40, 'Elcabo Trading', 'TKU-ACC-0007'),
(58, 'PO-00005', '2017-02-28', 40, 'Elcabo Trading', 'TKU-ACC-0008'),
(59, 'PO-00005', '2017-02-28', 40, 'Elcabo Trading', 'TKU-ACC-0009'),
(60, 'PO-00005', '2017-02-28', 40, 'Elcabo Trading', 'TKU-ACC-0010'),
(61, 'PO-00006', '2017-02-28', 15, 'Ohayo', 'SSS-PWT-0001'),
(62, 'PO-00006', '2017-02-28', 15, 'Ohayo', 'SSS-PWT-0002'),
(63, 'PO-00006', '2017-02-28', 15, 'Ohayo', 'SSS-PWT-0003'),
(64, 'PO-00006', '2017-02-28', 15, 'Ohayo', 'SSS-PWT-0004'),
(65, 'PO-00006', '2017-02-28', 15, 'Ohayo', 'SSS-PWT-0005'),
(66, 'PO-00006', '2017-02-28', 15, 'Ohayo', 'SSS-PWT-0006'),
(67, 'PO-00006', '2017-02-28', 15, 'Ohayo', 'SSS-PWT-0007'),
(68, 'PO-00006', '2017-02-28', 15, 'Ohayo', 'SSS-PWT-0008'),
(69, 'PO-00006', '2017-02-28', 15, 'Ohayo', 'SSS-PWT-0009'),
(70, 'PO-00006', '2017-02-28', 15, 'Ohayo', 'SSS-PWT-0010'),
(71, 'PO-00006', '2017-02-28', 15, 'Ohayo', 'SSS-PWT-0011'),
(72, 'PO-00006', '2017-02-28', 15, 'Ohayo', 'SSS-PWT-0012'),
(73, 'PO-00006', '2017-02-28', 15, 'Ohayo', 'SSS-PWT-0013'),
(74, 'PO-00006', '2017-02-28', 15, 'Ohayo', 'SSS-PWT-0014'),
(75, 'PO-00006', '2017-02-28', 15, 'Ohayo', 'SSS-PWT-0015'),
(76, 'PO-00006', '2017-02-28', 15, 'Ohayo', 'SSS-PWT-0016'),
(77, 'PO-00006', '2017-02-28', 15, 'Ohayo', 'SSS-PWT-0017'),
(78, 'PO-00006', '2017-02-28', 15, 'Ohayo', 'SSS-PWT-0018'),
(79, 'PO-00006', '2017-02-28', 15, 'Ohayo', 'SSS-PWT-0019'),
(80, 'PO-00006', '2017-02-28', 15, 'Ohayo', 'SSS-PWT-0020'),
(81, 'PO-00007', '2017-02-28', 40, 'New Royal', 'DCA-PWT-0001'),
(82, 'PO-00007', '2017-02-28', 40, 'New Royal', 'DCA-PWT-0002'),
(83, 'PO-00007', '2017-02-28', 40, 'New Royal', 'DCA-PWT-0003'),
(84, 'PO-00007', '2017-02-28', 40, 'New Royal', 'DCA-PWT-0004'),
(85, 'PO-00007', '2017-02-28', 40, 'New Royal', 'DCA-PWT-0005'),
(86, 'PO-00007', '2017-02-28', 40, 'New Royal', 'DCA-PWT-0006'),
(87, 'PO-00007', '2017-02-28', 40, 'New Royal', 'DCA-PWT-0007'),
(88, 'PO-00007', '2017-02-28', 40, 'New Royal', 'DCA-PWT-0008'),
(89, 'PO-00007', '2017-02-28', 40, 'New Royal', 'DCA-PWT-0009'),
(90, 'PO-00007', '2017-02-28', 40, 'New Royal', 'DCA-PWT-0010'),
(91, 'PO-00007', '2017-02-28', 40, 'New Royal', 'DCA-PWT-0011'),
(92, 'PO-00007', '2017-02-28', 40, 'New Royal', 'DCA-PWT-0012'),
(93, 'PO-00007', '2017-02-28', 40, 'New Royal', 'DCA-PWT-0013'),
(94, 'PO-00007', '2017-02-28', 40, 'New Royal', 'DCA-PWT-0014'),
(95, 'PO-00007', '2017-02-28', 40, 'New Royal', 'DCA-PWT-0015'),
(96, 'PO-00007', '2017-02-28', 40, 'New Royal', 'DCA-PWT-0016'),
(97, 'PO-00007', '2017-02-28', 40, 'New Royal', 'DCA-PWT-0017'),
(98, 'PO-00007', '2017-02-28', 40, 'New Royal', 'DCA-PWT-0018'),
(99, 'PO-00007', '2017-02-28', 40, 'New Royal', 'DCA-PWT-0019'),
(100, 'PO-00007', '2017-02-28', 40, 'New Royal', 'DCA-PWT-0020'),
(101, 'PO-00008', '2017-02-28', 40, 'Century Trace', 'LTS-HDT-0001'),
(102, 'PO-00008', '2017-02-28', 40, 'Century Trace', 'LTS-HDT-0002'),
(103, 'PO-00008', '2017-02-28', 40, 'Century Trace', 'LTS-HDT-0003'),
(104, 'PO-00008', '2017-02-28', 40, 'Century Trace', 'LTS-HDT-0004'),
(105, 'PO-00008', '2017-02-28', 40, 'Century Trace', 'LTS-HDT-0005'),
(106, 'PO-00008', '2017-02-28', 40, 'Century Trace', 'LTS-HDT-0006'),
(107, 'PO-00008', '2017-02-28', 40, 'Century Trace', 'LTS-HDT-0007'),
(108, 'PO-00008', '2017-02-28', 40, 'Century Trace', 'LTS-HDT-0008'),
(109, 'PO-00008', '2017-02-28', 40, 'Century Trace', 'LTS-HDT-0009'),
(110, 'PO-00008', '2017-02-28', 40, 'Century Trace', 'LTS-HDT-0010'),
(111, 'PO-00009', '2017-02-28', 100, 'Golden Field', 'MXT-ACC-0001'),
(112, 'PO-00009', '2017-02-28', 100, 'Golden Field', 'MXT-ACC-0002'),
(113, 'PO-00009', '2017-02-28', 100, 'Golden Field', 'MXT-ACC-0003'),
(114, 'PO-00009', '2017-02-28', 100, 'Golden Field', 'MXT-ACC-0004'),
(115, 'PO-00009', '2017-02-28', 100, 'Golden Field', 'MXT-ACC-0005'),
(116, 'PO-00009', '2017-02-28', 100, 'Golden Field', 'MXT-ACC-0006'),
(117, 'PO-00009', '2017-02-28', 100, 'Golden Field', 'MXT-ACC-0007'),
(118, 'PO-00009', '2017-02-28', 100, 'Golden Field', 'MXT-ACC-0008'),
(119, 'PO-00009', '2017-02-28', 100, 'Golden Field', 'MXT-ACC-0009'),
(120, 'PO-00009', '2017-02-28', 100, 'Golden Field', 'MXT-ACC-0010'),
(121, 'PO-00009', '2017-02-28', 30, 'Golden Field', 'MXT-PWT-0001'),
(122, 'PO-00009', '2017-02-28', 30, 'Golden Field', 'MXT-PWT-0002'),
(123, 'PO-00009', '2017-02-28', 30, 'Golden Field', 'MXT-PWT-0003'),
(124, 'PO-00009', '2017-02-28', 30, 'Golden Field', 'MXT-PWT-0004'),
(125, 'PO-00009', '2017-02-28', 30, 'Golden Field', 'MXT-PWT-0005'),
(126, 'PO-00009', '2017-02-28', 30, 'Golden Field', 'MXT-PWT-0006'),
(127, 'PO-00009', '2017-02-28', 30, 'Golden Field', 'MXT-PWT-0007'),
(128, 'PO-00009', '2017-02-28', 30, 'Golden Field', 'MXT-PWT-0008'),
(129, 'PO-00009', '2017-02-28', 30, 'Golden Field', 'MXT-PWT-0009'),
(130, 'PO-00009', '2017-02-28', 30, 'Golden Field', 'MXT-PWT-0010'),
(131, 'PO-00010', '2017-02-28', 30, 'Vanity', 'AFR-PWT-0001'),
(132, 'PO-00010', '2017-02-28', 30, 'Vanity', 'AFR-PWT-0002'),
(133, 'PO-00010', '2017-02-28', 30, 'Vanity', 'AFR-PWT-0003'),
(134, 'PO-00010', '2017-02-28', 30, 'Vanity', 'AFR-PWT-0004'),
(135, 'PO-00010', '2017-02-28', 30, 'Vanity', 'AFR-PWT-0005'),
(136, 'PO-00011', '2017-02-28', 50, 'Quantech', 'TKU-HDT-0010'),
(137, 'PO-00011', '2017-02-28', 50, 'Quantech', 'TKU-HDT-0009'),
(138, 'PO-00011', '2017-02-28', 50, 'Quantech', 'TKU-HDT-0008'),
(139, 'PO-00011', '2017-02-28', 50, 'Quantech', 'TKU-HDT-0007'),
(140, 'PO-00011', '2017-02-28', 50, 'Quantech', 'TKU-HDT-0006'),
(141, 'PO-00011', '2017-02-28', 50, 'Quantech', 'TKU-HDT-0005'),
(142, 'PO-00011', '2017-02-28', 50, 'Quantech', 'TKU-HDT-0004'),
(143, 'PO-00011', '2017-02-28', 50, 'Quantech', 'TKU-HDT-0003'),
(144, 'PO-00011', '2017-02-28', 50, 'Quantech', 'TKU-HDT-0002'),
(145, 'PO-00011', '2017-02-28', 50, 'Quantech', 'TKU-HDT-0001'),
(146, 'PO-00012', '2017-02-28', 150, 'Hans Corp', 'AFR-ACC-0010'),
(147, 'PO-00012', '2017-02-28', 100, 'Hans Corp', 'AFR-ACC-0011'),
(148, 'PO-00012', '2017-02-28', 100, 'Hans Corp', 'AFR-ACC-0012'),
(149, 'PO-00012', '2017-02-28', 100, 'Hans Corp', 'AFR-ACC-0013'),
(150, 'PO-00012', '2017-02-28', 100, 'Hans Corp', 'AFR-ACC-0014'),
(151, 'PO-00012', '2017-02-28', 100, 'Hans Corp', 'AFR-ACC-0015'),
(152, 'PO-00013', '2017-02-28', 150, 'Seaking', 'DGR-ACC-0001'),
(153, 'PO-00013', '2017-02-28', 150, 'Seaking', 'DGR-ACC-0002'),
(154, 'PO-00013', '2017-02-28', 150, 'Seaking', 'DGR-ACC-0003'),
(155, 'PO-00013', '2017-02-28', 150, 'Seaking', 'DGR-ACC-0004'),
(156, 'PO-00013', '2017-02-28', 150, 'Seaking', 'DGR-ACC-0005'),
(157, 'PO-00013', '2017-02-28', 150, 'Seaking', 'DGR-ACC-0006'),
(158, 'PO-00013', '2017-02-28', 150, 'Seaking', 'DGR-ACC-0007'),
(159, 'PO-00013', '2017-02-28', 150, 'Seaking', 'DGR-ACC-0008'),
(160, 'PO-00013', '2017-02-28', 150, 'Seaking', 'DGR-ACC-0009'),
(161, 'PO-00013', '2017-02-28', 150, 'Seaking', 'DGR-ACC-0010'),
(162, 'PO-00013', '2017-02-28', 150, 'Seaking', 'DGR-ACC-0011'),
(163, 'PO-00013', '2017-02-28', 150, 'Seaking', 'DGR-ACC-0012'),
(164, 'PO-00013', '2017-02-28', 150, 'Seaking', 'DGR-ACC-0013'),
(165, 'PO-00013', '2017-02-28', 150, 'Seaking', 'DGR-ACC-0014'),
(166, 'PO-00013', '2017-02-28', 150, 'Seaking', 'DGR-ACC-0015'),
(167, 'PO-00013', '2017-02-28', 150, 'Seaking', 'DGR-ACC-0016'),
(168, 'PO-00013', '2017-02-28', 150, 'Seaking', 'DGR-ACC-0017'),
(169, 'PO-00013', '2017-02-28', 150, 'Seaking', 'DGR-ACC-0018'),
(170, 'PO-00013', '2017-02-28', 150, 'Seaking', 'DGR-ACC-0019'),
(171, 'PO-00013', '2017-02-28', 150, 'Seaking', 'DGR-ACC-0020'),
(172, 'PO-00014', '2017-02-28', 40, 'Tramat Enterprises', 'MXS-PWT-0011'),
(173, 'PO-00014', '2017-02-28', 40, 'Tramat Enterprises', 'MXS-PWT-0012'),
(174, 'PO-00014', '2017-02-28', 40, 'Tramat Enterprises', 'MXS-PWT-0013'),
(175, 'PO-00014', '2017-02-28', 40, 'Tramat Enterprises', 'MXS-PWT-0014'),
(176, 'PO-00014', '2017-02-28', 40, 'Tramat Enterprises', 'MXS-PWT-0015'),
(177, 'PO-00014', '2017-02-28', 40, 'Tramat Enterprises', 'MXS-PWT-0016'),
(178, 'PO-00014', '2017-02-28', 40, 'Tramat Enterprises', 'MXS-PWT-0017'),
(179, 'PO-00014', '2017-02-28', 40, 'Tramat Enterprises', 'MXS-PWT-0018'),
(180, 'PO-00014', '2017-02-28', 40, 'Tramat Enterprises', 'MXS-PWT-0019'),
(181, 'PO-00014', '2017-02-28', 40, 'Tramat Enterprises', 'MXS-PWT-0020'),
(182, 'PO-00015', '2017-02-28', 100, 'VDH', 'TFM-ACC-0016'),
(183, 'PO-00015', '2017-02-28', 100, 'VDH', 'TFM-ACC-0017'),
(184, 'PO-00015', '2017-02-28', 100, 'VDH', 'TFM-ACC-0018'),
(185, 'PO-00015', '2017-02-28', 100, 'VDH', 'TFM-ACC-0019'),
(186, 'PO-00015', '2017-02-28', 100, 'VDH', 'TFM-ACC-0020'),
(187, 'PO-00016', '2017-02-28', 200, 'VDH', 'MXT-ACC-0011'),
(188, 'PO-00016', '2017-02-28', 200, 'VDH', 'MXT-ACC-0012'),
(189, 'PO-00016', '2017-02-28', 200, 'VDH', 'MXT-ACC-0013'),
(190, 'PO-00016', '2017-02-28', 200, 'VDH', 'MXT-ACC-0014'),
(191, 'PO-00016', '2017-02-28', 200, 'VDH', 'MXT-ACC-0015'),
(192, 'PO-00017', '2017-03-05', 100, 'VDH', 'DGR-ACC-0019'),
(193, 'PO-00017', '2017-03-05', 100, 'VDH', 'DGR-ACC-0020'),
(194, 'PO-00017', '2017-03-05', 100, 'VDH', 'DGR-ACC-0016'),
(195, 'PO-00017', '2017-03-05', 100, 'VDH', 'DGR-ACC-0017'),
(196, 'PO-00017', '2017-03-05', 100, 'VDH', 'DGR-ACC-0018'),
(197, 'PO-00018', '2017-03-05', 100, 'Justino', 'SSS-PWT-0014'),
(198, 'PO-00018', '2017-03-05', 100, 'Justino', 'SSS-PWT-0015'),
(199, 'PO-00018', '2017-03-05', 100, 'Justino', 'SSS-PWT-0016'),
(200, 'PO-00018', '2017-03-05', 100, 'Justino', 'SSS-PWT-0017'),
(201, 'PO-00018', '2017-03-05', 100, 'Justino', 'SSS-PWT-0018'),
(202, 'PO-00018', '2017-03-05', 40, 'Justino', 'MXS-PWT-0011'),
(203, 'PO-00018', '2017-03-05', 40, 'Justino', 'MXT-PWT-0005'),
(204, 'PO-00018', '2017-03-05', 40, 'Justino', 'MXS-PWT-0013'),
(205, 'PO-00018', '2017-03-05', 40, 'Justino', 'MXS-PWT-0012'),
(206, 'PO-00018', '2017-03-05', 40, 'Justino', 'MXS-PWT-0014'),
(207, 'PO-00019', '2017-03-05', 50, 'Elektrower', 'AFR-ACC-0001'),
(208, 'PO-00019', '2017-03-05', 50, 'Elektrower', 'AFR-ACC-0002'),
(209, 'PO-00019', '2017-03-05', 50, 'Elektrower', 'AFR-ACC-0003'),
(210, 'PO-00019', '2017-03-05', 50, 'Elektrower', 'AFR-ACC-0004'),
(211, 'PO-00019', '2017-03-05', 50, 'Elektrower', 'AFR-ACC-0005'),
(212, 'PO-00019', '2017-03-05', 40, 'Elektrower', 'LTS-ACC-0006'),
(213, 'PO-00019', '2017-03-05', 40, 'Elektrower', 'LTS-ACC-0007'),
(214, 'PO-00019', '2017-03-05', 40, 'Elektrower', 'LTS-ACC-0008'),
(215, 'PO-00019', '2017-03-05', 40, 'Elektrower', 'LTS-ACC-0009'),
(216, 'PO-00019', '2017-03-05', 40, 'Elektrower', 'LTS-ACC-0010'),
(217, 'PO-00019', '2017-03-05', 50, 'Elektrower', 'AFR-ACC-0001'),
(218, 'PO-00019', '2017-03-05', 25, 'Elektrower', 'AFR-ACC-0006'),
(219, 'PO-00019', '2017-03-05', 50, 'Elektrower', 'AFR-ACC-0002'),
(220, 'PO-00019', '2017-03-05', 50, 'Elektrower', 'AFR-ACC-0003'),
(221, 'PO-00019', '2017-03-05', 50, 'Elektrower', 'AFR-ACC-0004'),
(222, 'PO-00019', '2017-03-05', 50, 'Elektrower', 'AFR-ACC-0005'),
(223, 'PO-00020', '2017-03-05', 30, 'Tramat Enterprises', 'SSS-PWT-0001'),
(224, 'PO-00020', '2017-03-05', 30, 'Tramat Enterprises', 'SSS-PWT-0002'),
(225, 'PO-00020', '2017-03-05', 30, 'Tramat Enterprises', 'SSS-PWT-0003'),
(226, 'PO-00020', '2017-03-05', 30, 'Tramat Enterprises', 'SSS-PWT-0004'),
(227, 'PO-00020', '2017-03-05', 30, 'Tramat Enterprises', 'SSS-PWT-0005'),
(228, 'PO-00020', '2017-03-05', 30, 'Tramat Enterprises', 'SSS-PWT-0006'),
(229, 'PO-00020', '2017-03-05', 30, 'Tramat Enterprises', 'SSS-PWT-0007'),
(230, 'PO-00020', '2017-03-05', 30, 'Tramat Enterprises', 'SSS-PWT-0008'),
(231, 'PO-00021', '2017-03-25', 50, 'ASCD/Harrows', 'MXS-PWT-0001'),
(232, 'PO-00021', '2017-03-25', 50, 'ASCD/Harrows', 'MXS-PWT-0002'),
(233, 'PO-00021', '2017-03-25', 50, 'ASCD/Harrows', 'MXS-PWT-0003'),
(234, 'PO-00021', '2017-03-25', 50, 'ASCD/Harrows', 'MXS-PWT-0004'),
(235, 'PO-00021', '2017-03-25', 50, 'ASCD/Harrows', 'MXS-PWT-0005'),
(236, 'PO-00021', '2017-03-25', 40, 'ASCD/Harrows', 'MXS-PWT-0006'),
(237, 'PO-00021', '2017-03-25', 40, 'ASCD/Harrows', 'MXS-PWT-0007'),
(238, 'PO-00021', '2017-03-25', 40, 'ASCD/Harrows', 'MXS-PWT-0008'),
(239, 'PO-00022', '2017-03-25', 40, 'Atlas Copco/ Hilti', 'DGR-ACC-0001'),
(240, 'PO-00022', '2017-03-25', 40, 'Atlas Copco/ Hilti', 'DGR-ACC-0002'),
(241, 'PO-00022', '2017-03-25', 30, 'Atlas Copco/ Hilti', 'DGR-ACC-0003'),
(242, 'PO-00022', '2017-03-25', 30, 'Atlas Copco/ Hilti', 'DGR-ACC-0004'),
(243, 'PO-00022', '2017-03-25', 30, 'Atlas Copco/ Hilti', 'DGR-ACC-0005'),
(244, 'PO-00022', '2017-03-25', 30, 'Atlas Copco/ Hilti', 'DGR-ACC-0006'),
(245, 'PO-00022', '2017-03-25', 30, 'Atlas Copco/ Hilti', 'DGR-ACC-0007'),
(246, 'PO-00023', '2017-03-25', 25, 'Beesin', 'LTS-HDT-0001'),
(247, 'PO-00023', '2017-03-25', 25, 'Beesin', 'LTS-HDT-0002'),
(248, 'PO-00023', '2017-03-25', 25, 'Beesin', 'LTS-HDT-0003'),
(249, 'PO-00023', '2017-03-25', 25, 'Beesin', 'LTS-HDT-0004'),
(250, 'PO-00023', '2017-03-25', 25, 'Beesin', 'LTS-HDT-0005'),
(251, 'PO-00024', '2017-03-25', 30, 'Black and Decker', 'TKU-HDT-0001'),
(252, 'PO-00024', '2017-03-25', 30, 'Black and Decker', 'TKU-HDT-0002'),
(253, 'PO-00024', '2017-03-25', 30, 'Black and Decker', 'TKU-HDT-0003'),
(254, 'PO-00024', '2017-03-25', 30, 'Black and Decker', 'TKU-HDT-0004'),
(255, 'PO-00024', '2017-03-25', 30, 'Black and Decker', 'TKU-HDT-0005'),
(256, 'PO-00025', '2017-03-25', 30, 'Ben/ Alex Uy', 'AFR-PWT-0001'),
(257, 'PO-00025', '2017-03-25', 30, 'Ben/ Alex Uy', 'AFR-PWT-0002'),
(258, 'PO-00025', '2017-03-25', 30, 'Ben/ Alex Uy', 'AFR-PWT-0003'),
(259, 'PO-00025', '2017-03-25', 30, 'Ben/ Alex Uy', 'AFR-PWT-0004'),
(260, 'PO-00025', '2017-03-25', 30, 'Ben/ Alex Uy', 'AFR-PWT-0005');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `returnID` int(5) NOT NULL,
  `returnDate` date NOT NULL,
  `returnQty` int(5) NOT NULL,
  `returnType` varchar(45) NOT NULL,
  `returnRemark` text NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'Active',
  `prodID` varchar(45) NOT NULL,
  `branchID` varchar(45) DEFAULT NULL,
  `receiptNo` varchar(45) DEFAULT NULL,
  `userID` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`returnID`, `returnDate`, `returnQty`, `returnType`, `returnRemark`, `status`, `prodID`, `branchID`, `receiptNo`, `userID`) VALUES
(1, '2017-03-02', 5, 'Supplier Return', 'Damaged upon Delivery', 'Active', 'MXS-PWT-0005', '4', 'RET-00001', NULL),
(2, '2017-03-06', 5, 'Supplier Return', 'Damaged upon Delivery', 'Active', 'TKU-ACC-0003', '4', 'RET-00002', NULL),
(3, '2017-03-07', 5, 'Supplier Return', 'Damaged upon Delivery', 'Active', 'DCA-PWT-0011', '2', 'RET-00003', NULL),
(4, '2017-03-08', 5, 'Warehouse Return', 'Not Sold', 'Active', 'AFR-ACC-0001', '1', 'RET-00004', NULL),
(5, '2017-03-15', 10, 'Warehouse Return', 'Not Sold', 'Active', 'DCA-PWT-0009', '2', 'RET-00005', NULL),
(6, '2017-03-20', 10, 'Warehouse Return', 'Not Sold', 'Active', 'TFM-ACC-0010', '4', 'RET-00006', NULL),
(7, '2017-04-01', 5, 'Warehouse Return', 'Not Sold', 'Active', 'MXT-ACC-0006', '4', 'RET-00007', NULL),
(8, '2017-04-01', 10, 'Warehouse Return', 'Not Sold', 'Active', 'SSS-PWT-0005', '3', 'RET-00008', NULL),
(9, '2017-04-04', 10, 'Supplier Return', 'Damaged upon Delivery', 'Active', 'DGR-ACC-0001', '1', 'RET-00009', NULL),
(10, '2017-04-05', 10, 'Supplier Return', 'Damaged upon Delivery', 'Active', 'DGR-ACC-0002', '1', 'RET-00010', NULL),
(11, '2017-04-05', 10, 'Supplier Return', 'Damaged upon Delivery', 'Active', 'DGR-ACC-0003', '1', 'RET-00011', NULL),
(12, '2017-04-09', 5, 'Supplier Return', 'Damaged upon Delivery', 'Active', 'LTS-HDT-0001', '1', 'RET-00012', NULL),
(13, '2017-04-09', 5, 'Warehouse Return', 'Not Sold', 'Active', 'SSS-PWT-0007', '2', 'RET-00013', NULL),
(14, '2017-04-09', 5, 'Warehouse Return', 'Not Sold', 'Active', 'SSS-PWT-0008', '2', 'RET-00014', NULL),
(15, '2017-04-11', 10, 'Warehouse Return', 'Not Sold', 'Active', 'TKU-HDT-0002', '5', 'RET-00015', NULL),
(16, '2017-04-11', 10, 'Warehouse Return', 'Not Sold', 'Active', 'TKU-HDT-0003', '5', 'RET-00016', NULL),
(17, '2017-04-12', 5, 'Supplier Return', 'Damaged upon Delivery', 'Active', 'MXS-PWT-0001', '5', 'RET-00017', NULL),
(18, '2017-04-12', 10, 'Supplier Return', 'Damaged upon Delivery', 'Active', 'MXS-PWT-0002', '5', 'RET-00018', NULL),
(19, '2017-04-12', 5, 'Supplier Return', 'Damaged upon Delivery', 'Active', 'MXS-PWT-0003', '5', 'RET-00019', NULL),
(20, '2017-04-12', 10, 'Warehouse Return', 'Not Sold', 'Active', 'MXS-PWT-0004', '5', 'RET-00020', NULL);

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
  `user_role` text NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `password`, `user_role`, `status`) VALUES
(1, 'denne', 'bosch123', 'admin', 'Active'),
(2, 'denielle', 'hitachi123', 'admin', 'Active'),
(3, 'haney', 'dewatt123', 'user', 'Active'),
(4, 'kharol', 'agp123', 'user', 'Active');

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
-- Indexes for table `defectives`
--
ALTER TABLE `defectives`
  ADD PRIMARY KEY (`defectProdID`);

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
-- Indexes for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  ADD PRIMARY KEY (`poID`);

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
-- AUTO_INCREMENT for table `archive`
--
ALTER TABLE `archive`
  MODIFY `archiveID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `empID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `incoming`
--
ALTER TABLE `incoming`
  MODIFY `inID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;
--
-- AUTO_INCREMENT for table `outgoing`
--
ALTER TABLE `outgoing`
  MODIFY `outID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT for table `purchaseorders`
--
ALTER TABLE `purchaseorders`
  MODIFY `poID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;
--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `returnID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
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
