-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2017 at 05:31 AM
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
  `prodID` varchar(10) NOT NULL,
  `supID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incoming`
--

INSERT INTO `incoming` (`inID`, `inQty`, `inDate`, `receiptNo`, `receiptDate`, `inRemarks`, `empID`, `prodID`, `supID`) VALUES
(1, 10, '2017-01-05', 'n5646', '2017-01-05', 'None', 5, 'AGPPT001', 1),
(2, 20, '2017-01-08', '4464', '2017-01-09', '5 missing', 5, 'HTCPT007', 2),
(3, 15, '2017-01-20', '3245', '2017-01-21', 'None', 4, 'AGPPT002', 3),
(4, 20, '2017-01-21', 'n7452', '2017-01-21', 'None', 8, 'AGPPT005', 4),
(5, 10, '2017-01-25', 'r5123', '2017-01-25', '3 missing', 3, 'HTCPT003', 5),
(6, 10, '2017-01-25', '6484', '2017-01-26', 'None', 7, 'AGPPT006', 6),
(7, 20, '2017-02-01', '6251', '2017-02-01', 'None', 5, 'HTCPT002', 7),
(8, 15, '2017-02-10', 'c5292', '2017-02-10', 'None', 1, 'HTCPT004', 8),
(9, 25, '2017-02-13', '6273', '2017-02-14', '5 missing', 6, 'AGPPT006', 9),
(10, 20, '2017-02-15', 'g6272', '2017-02-15', 'None', 2, 'AGPPT006 ', 10);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invID` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `prodID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invID`, `qty`, `prodID`) VALUES
(1, 15, 'AGPPT001'),
(2, 20, 'AGPPT002'),
(3, 20, 'AGPPT003'),
(4, 10, 'AGPPT004'),
(5, 25, 'AGPPT005'),
(6, 5, 'AGPPT006'),
(7, 15, 'AGPPT007'),
(8, 15, 'AGPPT008'),
(9, 15, 'AGPPT009'),
(10, 10, 'AGPPT010'),
(11, 10, 'AGPPT011'),
(12, 10, 'AGPPT012'),
(13, 15, 'HTCPT001'),
(14, 15, 'HTCPT002'),
(15, 25, 'HTCPT003'),
(16, 10, 'HTCPT004'),
(17, 15, 'HTCPT005'),
(18, 15, 'HTCPT006'),
(19, 15, 'HTCPT007'),
(20, 15, 'HTCPT008');

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
  `prodID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `outgoing`
--

INSERT INTO `outgoing` (`outID`, `outQty`, `outDate`, `outRemarks`, `branchID`, `empID`, `prodID`) VALUES
(1, 5, '2017-01-05', 'None', 2, 2, 'AGPPT001'),
(2, 5, '2017-01-05', 'None', 3, 3, 'AGPPT002'),
(3, 5, '2017-01-06', 'None', 2, 4, 'HTCPT001'),
(4, 5, '2017-01-07', 'None', 1, 5, 'AGPPT002'),
(5, 10, '2017-01-08', 'None', 3, 3, 'AGPPT005'),
(6, 15, '2017-01-09', 'None', 4, 1, 'HTCPT004'),
(7, 5, '2017-01-10', 'None', 2, 4, 'AGPPT008'),
(8, 10, '2017-01-15', 'None', 3, 2, 'AGPPT011'),
(9, 5, '2017-01-18', 'None', 4, 1, 'HTCPT002'),
(10, 5, '2017-01-20', 'None', 1, 5, 'HTCPT003'),
(11, 10, '2017-01-25', 'None', 3, 6, 'AGPPT007'),
(12, 15, '2017-01-30', 'None', 2, 7, 'AGPPT009');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodID` varchar(10) NOT NULL,
  `prodName` varchar(100) NOT NULL,
  `type` varchar(25) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `price` decimal(11,0) NOT NULL,
  `reorderLevel` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodID`, `prodName`, `type`, `brand`, `price`, `reorderLevel`) VALUES
('AGPPT001', 'AGP AM5000 Bucket Mixer 1000W', 'Powertools', 'AGP', '60000', 5),
('AGPPT002', 'T328 Turbine Paint 1400W', 'Powertools', 'AGP', '45150', 5),
('AGPPT003', 'VR600 Concrete Vibrator', 'Powertools', 'AGP', '35150', 5),
('AGPPT004', 'VRN1400 Concrete Vibrator', 'Powertools', 'AGP', '48800', 5),
('AGPPT005', 'CS180 Wall Chaser 1800W', 'Powertools', 'AGP', '41750', 5),
('AGPPT006', 'D65 Drain Cleaning Machine 800W', 'Powertools', 'AGP', '97600', 5),
('AGPPT007', 'DE25 Wet/Dry Vacuum Dust Extractor 1200W', 'Powertools', 'AGP', '46250', 5),
('AGPPT008', 'DG50L Die Grinder (Low Speed Mode) 1200W', 'Powertools', 'AGP', '18500', 5),
('AGPPT009', 'EP5LFB Stone Grinder 1200W', 'Powertools', 'AGP', '42200', 5),
('AGPPT010', 'EV21 Electric Mixer/Drill 1100W', 'Powertools', 'AGP', '11800', 5),
('AGPPT011', 'PM021 Airless Sprayer Elect Piston Pump', 'Powertools', 'AGP', '137500', 5),
('AGPPT012', 'SG6 Straight Grinder 1600W', 'Powetools', 'AGP', '20950', 5),
('HTCPT001', 'DH38SS Rotary Hammer Hex 2-Mode 38MM 950W', 'Powertools', 'Hitachi', '15000', 5),
('HTCPT002', 'B16RM Drill Press', 'Powertools', 'Hitachi', '22500', 5),
('HTCPT003', 'C10FCE2 Compound Miter Saw 10" 255MM 1520W', 'Powertools', 'Hitachi', '10200', 5),
('HTCPT004', 'C12RSH Slide Compound Miter Saw 1600W', 'Powertools', 'Hitachi', '38500', 5),
('HTCPT005', 'CG40EAS Brushcutter Bike Type Handle 1.31KW', 'Powertools', 'Hitachi', '10500', 25),
('HTCPT006', 'CJ110MV Jigsaw Variable Speed w/ Pendulum 720W 110MM', 'Powertools', 'Hitachi', '5400', 5),
('HTCPT007', 'D10MV Drill Variable Speed Reversible 3/8" 10MM', 'Powertools', 'Hitachi', '2500', 25),
('HTCPT008', 'D10VST Drill Variable Speed Reversible 10MM 3/8"', 'Powertools', 'Hitachi', '1700', 25);

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `returnID` int(5) NOT NULL,
  `returnDate` date NOT NULL,
  `returnQty` int(5) NOT NULL,
  `status` varchar(25) NOT NULL,
  `returnRemark` text NOT NULL,
  `prodID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`returnID`, `returnDate`, `returnQty`, `status`, `returnRemark`, `prodID`) VALUES
(1, '2017-01-15', 1, 'In Storage', 'none', 'HTCPT004'),
(2, '2017-01-15', 1, 'In Storage', 'none', 'HTCPT002'),
(3, '2017-01-20', 1, 'Returned', 'none', 'AGPPT012'),
(4, '2017-01-31', 2, 'Returned', 'none', 'AGPPT003'),
(5, '2017-02-02', 1, 'In Storage', 'none', 'AGPPT011'),
(6, '2017-02-03', 3, 'In Storage', 'none', 'AGPPT005'),
(7, '2017-02-06', 2, 'Returned', 'none', 'HTCPT003'),
(8, '2017-02-11', 1, 'Returned', 'none', 'HTCPT006'),
(9, '2017-02-22', 1, 'In Storage', 'none', 'AGPPT001'),
(10, '2017-02-25', 2, 'Returned', 'none', 'HTCPT005');

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
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `password`) VALUES
(1, 'admin1', 'bosch123'),
(2, 'admin2', 'hitachi123'),
(3, 'user1', 'dewatt123'),
(4, 'user2', 'agp123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`branchID`);

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
  ADD KEY `FKINEMP_idx` (`empID`),
  ADD KEY `FKINSUP_idx` (`supID`);

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
  ADD PRIMARY KEY (`returnID`),
  ADD KEY `FKRETPROD_idx` (`prodID`);

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
  MODIFY `inID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `outgoing`
--
ALTER TABLE `outgoing`
  MODIFY `outID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `returnID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
  ADD CONSTRAINT `FKINEMP` FOREIGN KEY (`empID`) REFERENCES `employee` (`empID`),
  ADD CONSTRAINT `FKINPROD` FOREIGN KEY (`prodID`) REFERENCES `product` (`prodID`),
  ADD CONSTRAINT `FKINSUP` FOREIGN KEY (`supID`) REFERENCES `suppliers` (`supID`);

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `FKINVPROD` FOREIGN KEY (`prodID`) REFERENCES `product` (`prodID`);

--
-- Constraints for table `outgoing`
--
ALTER TABLE `outgoing`
  ADD CONSTRAINT `FKOUTBR` FOREIGN KEY (`branchID`) REFERENCES `branch` (`branchID`),
  ADD CONSTRAINT `FKOUTEMP` FOREIGN KEY (`empID`) REFERENCES `employee` (`empID`),
  ADD CONSTRAINT `FKOUTPROD` FOREIGN KEY (`prodID`) REFERENCES `product` (`prodID`);

--
-- Constraints for table `returns`
--
ALTER TABLE `returns`
  ADD CONSTRAINT `FKRETPROD` FOREIGN KEY (`prodID`) REFERENCES `product` (`prodID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
