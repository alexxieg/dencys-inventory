-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2017 at 03:18 PM
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
('AGP', 'AGP'),
('BND', 'Black and Decker'),
('BRM', 'Bernmann'),
('BSH', 'Bosch'),
('BZW', 'Benz Werks'),
('DCA', 'DCA'),
('DML', 'Dremel'),
('DWT', 'Dewalt'),
('GFD', 'Greenfield'),
('HND', 'Honda'),
('HTC', 'Hitachi'),
('IWN', 'Irwin'),
('JSE', 'Johnson Elektrik'),
('KEN', 'Ken'),
('LTS', 'Lotus'),
('MKT', 'Makita'),
('MTC', 'Maktec'),
('MWK', 'Milwaukee'),
('RXN', 'Rexon'),
('RYC', 'Royce'),
('SKL', 'Skil'),
('SLY', 'Stanley'),
('STL', 'Stihl'),
('TTR', 'Tatara'),
('UNS', 'Unistar'),
('VRX', 'Vorex'),
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
  `empName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`empID`, `empName`) VALUES
(1, 'Emily'),
(2, 'Caley'),
(3, 'Dionisio'),
(4, 'Nancy'),
(5, 'Rommel'),
(6, 'Jovin'),
(7, 'Manuel'),
(8, 'Cristine'),
(9, 'Julius'),
(10, 'Kenneth'),
(11, 'Dave'),
(12, 'Vangie'),
(13, 'Kevin'),
(14, 'Mike'),
(15, 'Raymond'),
(16, 'Ronald'),
(17, 'Gerome'),
(18, 'Christoper'),
(19, 'Cynthia'),
(20, 'Enrico'),
(21, 'Haneyly'),
(22, 'TJ'),
(23, 'Christian'),
(24, 'Kier'),
(25, 'Kharol');

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
  `inRemarks` text NOT NULL,
  `empID` int(5) NOT NULL,
  `prodID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incoming`
--

INSERT INTO `incoming` (`inID`, `inQty`, `inDate`, `receiptNo`, `receiptDate`, `inRemarks`, `empID`, `prodID`) VALUES
(2, 20, '2017-01-08', '4464', '2017-01-09', '5 missing', 5, 'LTS-HDT-0002'),
(3, 15, '2017-01-20', '3245', '2017-01-21', 'None', 4, 'LTS-HDT-0003'),
(4, 20, '2017-01-21', 'n7452', '2017-01-21', 'None', 8, 'LTS-ACC-0001'),
(5, 10, '2017-01-25', 'r5123', '2017-01-25', '3 missing', 3, 'LTS-ACC-0002');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invID` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `phyCount` int(5) DEFAULT NULL,
  `prodID` varchar(25) NOT NULL,
  `initialQty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invID`, `qty`, `phyCount`, `prodID`, `initialQty`) VALUES
(1, 20, NULL, 'LTS-HDT-0001', NULL),
(2, 20, NULL, 'LTS-HDT-0002', NULL),
(3, 20, NULL, 'LTS-HDT-0003', NULL),
(4, 10, NULL, 'LTS-HDT-0004', NULL),
(5, 25, NULL, 'LTS-HDT-0005', NULL),
(6, 5, NULL, 'LTS-HDT-0006', NULL),
(7, 15, NULL, 'LTS-HDT-0007', NULL),
(8, 15, NULL, 'LTS-HDT-0008', NULL),
(9, 15, NULL, 'LTS-HDT-0009', NULL),
(10, 10, NULL, 'LTS-HDT-0010', NULL),
(11, 10, NULL, 'LTS-ACC-0001', NULL),
(12, 10, NULL, 'LTS-ACC-0002', NULL),
(13, 15, NULL, 'LTS-ACC-0003', NULL),
(14, 15, NULL, 'LTS-ACC-0004', NULL),
(15, 25, NULL, 'LTS-ACC-0005', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `outgoing`
--

CREATE TABLE `outgoing` (
  `outID` int(5) NOT NULL,
  `outQty` int(5) NOT NULL,
  `outDate` date NOT NULL,
  `outRemarks` text NOT NULL,
  `branchID` int(5) NOT NULL,
  `empID` int(5) NOT NULL,
  `prodID` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outgoing`
--

INSERT INTO `outgoing` (`outID`, `outQty`, `outDate`, `outRemarks`, `branchID`, `empID`, `prodID`) VALUES
(1, 5, '2017-01-05', 'None', 2, 2, 'LTS-HDT-0001'),
(2, 5, '2017-01-05', 'None', 3, 3, 'LTS-HDT-0002'),
(3, 5, '2017-01-06', 'None', 2, 4, 'LTS-HDT-003'),
(4, 5, '2017-01-07', 'None', 1, 5, 'LTS-ACC-0001'),
(5, 10, '2017-01-08', 'None', 3, 3, 'LTS-ACC-0003');

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
  `price` decimal(11,0) NOT NULL,
  `reorderLevel` int(5) NOT NULL,
  `unitType` varchar(45) CHARACTER SET big5 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodID`, `prodName`, `model`, `categoryID`, `brandID`, `price`, `reorderLevel`, `unitType`) VALUES
('DCA-PWT-0001', 'Cordless Driver Drill 12V/1.5Ah 10 mm 0-700 r/min 10mm', 'ADJZ09-10A', 'PWT', 'DCA', '8600', 10, 'Piece/s'),
('DCA-PWT-0002', 'Cordless Driver Hammer Drill 18V/3Ahx2 13 mm 36000BPM 400 r/min 2000 r/min 13 mm 38 mm 25+2 70N.m 2.', 'ADJZ13A', 'PWT', 'DCA', '21250', 10, 'Piece/s'),
('DCA-PWT-0003', 'Cordless Impact Driver 12V/1.5Ahx2 0-2400 r/min 0-3000 /min 100N.m', 'ADPL02-8A', 'PWT', 'DCA', '9500', 10, 'Piece/s'),
('DCA-PWT-0004', 'Cordless Impact Wrench 18V/3Ahx2 0-2200r/min 3200/min 230N.m', 'ADPB16A', 'PWT', 'DCA', '19500', 10, 'Piece/s'),
('DCA-PWT-0005', 'Cordless Multi-tool12V/1.5Ahx2 5000-20000/min 2-4-6-8-10-12 3 3 ', 'ADMD12', 'PWT', 'DCA', '13650', 10, 'Piece/s'),
('DCA-PWT-0006', 'Electric Cut Off Machine 355x3x25.4mm 2000W 3800r/min', 'AJG04-355', 'PWT', 'DCA', '12450', 10, 'Piece/s'),
('DCA-PWT-0007', 'Electric Circular Saw 1100W 5600r/min 64mm', 'AMY02-185', 'PWT', 'DCA', '5950', 10, 'Piece/s'),
('DCA-PWT-0008', 'Electric Circular Saw 1520W 4100r/min 84mm', 'AMY235', 'PWT', 'DCA', '9850', 10, 'Piece/s'),
('DCA-PWT-0009', 'Electric Mitre Saw 1650W 4600r/min 255mm', 'AJX255', 'PWT', 'DCA', '19500', 10, 'Piece/s'),
('DCA-PWT-0010', 'Electric Nibbler620W 1300/min 3.2mm 2.5mm 120mm 128mm', 'AJH32', 'PWT', 'DCA', '12375', 10, 'Piece/s'),
('DCA-PWT-0011', 'Electric Wrench 620W 1700r/min 1600/min M16-M22mm 19x19mm 588N.m ', 'APB22C', 'PWT', 'DCA', '12000', 10, 'Piece/s'),
('DCA-PWT-0012', 'Heat Gun 2000W 50-480C 50-600 C 210-250L/min 340-380L/min', 'AQB2000', 'PWT', 'DCA', '2500', 10, 'Piece/s'),
('DCA-PWT-0013', 'Jig Saw 580W 500-3100/min 0-45 10mm 85mm', 'AMQ85', 'PWT', 'DCA', '7500', 10, 'Piece/s'),
('DCA-PWT-0014', 'Cordless Cleaner 12V/1.5Ah 1.2  m/min 1.8 Kpa 20 min', 'ADXC12B', 'PWT', 'DCA', '13000', 10, 'Piece/s'),
('DCA-PWT-0015', 'Trimmer350W 30000r/min 6.35mm', 'AMP02-6', 'PWT', 'DCA', '2900', 10, 'Piece/s'),
('DCA-PWT-0016', 'Wood Router 1240W 12.7mm 24000r/min', 'AMR05-12', 'PWT', 'DCA', '8200', 10, 'Piece/s'),
('DCA-PWT-0017', 'Wood Router 1050W 12.7mm 23000r/min', 'AMR03-12', 'PWT', 'DCA', '7800', 10, 'Piece/s'),
('DCA-PWT-0018', 'Wood Router1650W 12.7mm 22000r/min', 'AMR04-12', 'PWT', 'DCA', '11500', 10, 'Piece/s'),
('LTS-ACC-0001', 'Carbon Brush 3.25x0.8x0.5mm', 'LAG115N38', 'ACC', 'LTS', '90', 20, 'Piece/s'),
('LTS-ACC-0002', 'Carbon Brush 3.75x0.75x0.5mm', 'LID10REN22', 'ACC', 'LTS', '90', 20, 'Piece/s'),
('LTS-ACC-0003', 'Carbon Brush 3.25x0.90x0.5mm', 'LID13REN23', 'ACC', 'LTS', '90', 20, 'Piece/s'),
('LTS-ACC-0004', 'Carbon Brush 2x1x0.75mm', 'LPK180N32', 'ACC', 'LTS', '150', 20, 'Piece/s'),
('LTS-ACC-0005', 'Carbon Brush', 'LID13REP21', 'ACC', 'LTS', '20', 20, 'Piece/s'),
('LTS-ACC-0006', 'Carbon Brush', 'LAG115CH-45', 'ACC', 'LTS', '110', 20, 'Piece/s'),
('LTS-ACC-0007', 'Carbon Brush 3.25x0.80x0.5', 'LAG115SSN29', 'ACC', 'LTS', '90', 20, 'Piece/s'),
('LTS-ACC-0008', 'Carbon Brush', 'LAG115Z1.38', 'ACC', 'LTS', '50', 40, 'Piece/s'),
('LTS-ACC-0009', 'Carbon Brush 3.25x0.55x0.5mm', 'LAT2026.2.32', 'ACC', 'LTS', '90', 40, 'Piece/s'),
('LTS-ACC-0010', 'Carbon Brush', 'LCOM355H.43', 'ACC', 'LTS', '235', 40, 'Piece/s'),
('LTS-ACC-0011', 'Carbon Brush', 'LCS185.70', 'ACC', 'LTS', '120', 40, 'Piece/s'),
('LTS-ACC-0012', 'Carbon Brush 4x0.75x0.50mm', 'LJS65JD.2.3', 'ACC', 'LTS', '60', 40, 'Piece/s'),
('LTS-ACC-0013', 'Carbon Brush 3.5x0.90x0.5mm', 'LPB600.2.23', 'ACC', 'LTS', '160', 40, 'Piece/s'),
('LTS-ACC-0014', 'Carbon Brush 3.5x1x0.5mm', 'LPL822.2.26', 'ACC', 'LTS', '90', 40, 'Piece/s'),
('LTS-ACC-0015', 'Carbon Brush 3x0.5x0.6mm', 'LRT170C.11', 'ACC', 'LTS', '110', 40, 'Piece/s'),
('LTS-HDT-0001', 'Air Duster', 'LDG101', 'HDT', 'LTS', '260', 10, 'Piece/s'),
('LTS-HDT-0002', 'Air Duster', 'LDG101AD', 'HDT', 'LTS', '290', 10, 'Piece/s'),
('LTS-HDT-0003', 'Air Duster Heavy Duty', 'LDG102', 'HDT', 'Lotus', '250', 10, 'Piece/s'),
('LTS-HDT-0004', 'Aluminum Level 12"/300MM', 'LAL3001M', 'HDT', 'Lotus', '250', 15, 'Piece/s'),
('LTS-HDT-0005', 'Aluminum Level 18"/450MM', 'LAL4501M', 'HDT', 'Lotus', '340', 15, 'Piece/s'),
('LTS-HDT-0006', 'Aluminum Level 24"/600MM', 'LAL6001M', 'HDT', 'Lotus', '380', 15, 'Piece/s'),
('LTS-HDT-0007', 'Aluminum Level 36"/900MM', 'LAL9001M', 'HDT', 'Lotus', '480', 15, 'Piece/s'),
('LTS-HDT-0008', 'Aviation Snip 10"', 'LAS250L', 'HDT', 'Lotus', '400', 15, 'Piece/s'),
('LTS-HDT-0009', 'Aviation Snip 10"', 'LAS250R', 'HDT', 'Lotus', '400', 15, 'Piece/s'),
('LTS-HDT-0010', 'Aviation Snip 10"', 'LAS250S', 'HDT', 'Lotus', '400', 15, 'Piece/s'),
('LTS-HDT-0011', 'Adjustable Wrench 8"', 'LAW008S', 'HDT', 'Lotus', '270', 15, 'Piece/s'),
('LTS-HDT-0012', 'Adjustable Wrench 10"', 'LAW010S', 'HDT', 'Lotus', '390', 15, 'Piece/s'),
('LTS-HDT-0013', 'Adjustable Wrench 12"', 'LAW012S', 'HDT', 'Lotus', '530', 15, 'Piece/s'),
('LTS-HDT-0014', 'Bent Nose Plier(External) 7"', 'LBEP175', 'HDT', 'Lotus', '420', 10, 'Piece/s'),
('LTS-HDT-0015', 'Bent Nose Plier(Internal) 7"', 'LBIP175', 'HDT', 'Lotus', '420', 10, 'Piece/s');

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
-- AUTO_INCREMENT for table `incoming`
--
ALTER TABLE `incoming`
  MODIFY `inID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `outgoing`
--
ALTER TABLE `outgoing`
  MODIFY `outID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `returnID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `incoming`
--
ALTER TABLE `incoming`
  ADD CONSTRAINT `FKINEMP` FOREIGN KEY (`empID`) REFERENCES `employee` (`empID`);

--
-- Constraints for table `outgoing`
--
ALTER TABLE `outgoing`
  ADD CONSTRAINT `FKOUTBR` FOREIGN KEY (`branchID`) REFERENCES `branch` (`branchID`),
  ADD CONSTRAINT `FKOUTEMP` FOREIGN KEY (`empID`) REFERENCES `employee` (`empID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
