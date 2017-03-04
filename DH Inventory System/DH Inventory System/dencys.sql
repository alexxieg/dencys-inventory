-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2017 at 06:45 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dencys`
--
CREATE DATABASE IF NOT EXISTS `dencys` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `dencys`;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `branchID` int(5) NOT NULL,
  `location` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`branchID`)
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

CREATE TABLE IF NOT EXISTS `employee` (
  `empID` int(5) NOT NULL,
  `empName` varchar(50) NOT NULL,
  PRIMARY KEY (`empID`)
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

CREATE TABLE IF NOT EXISTS `incoming` (
  `inID` int(5) NOT NULL AUTO_INCREMENT,
  `inQty` int(5) NOT NULL,
  `inDate` date NOT NULL,
  `receiptNo` varchar(25) NOT NULL,
  `receiptDate` date DEFAULT NULL,
  `inRemarks` text NOT NULL,
  `empID` int(5) NOT NULL,
  `prodID` varchar(10) NOT NULL,
  `supID` int(5) NOT NULL,
  PRIMARY KEY (`inID`),
  KEY `FKINPROD_idx` (`prodID`),
  KEY `FKINPROD` (`prodID`),
  KEY `FKINEMP_idx` (`empID`),
  KEY `FKINSUP_idx` (`supID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

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

CREATE TABLE IF NOT EXISTS `inventory` (
  `invID` int(11) NOT NULL AUTO_INCREMENT,
  `qty` int(11) DEFAULT NULL,
  `phyCount` int(5) DEFAULT NULL,
  `prodID` varchar(10) NOT NULL,
  PRIMARY KEY (`invID`),
  KEY `FKINVPROD_idx` (`prodID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invID`, `qty`, `phyCount`, `prodID`) VALUES
(1, 15, NULL, 'AGPPT001'),
(2, 20, NULL, 'AGPPT002'),
(3, 20, NULL, 'AGPPT003'),
(4, 10, NULL, 'AGPPT004'),
(5, 25, NULL, 'AGPPT005'),
(6, 5, NULL, 'AGPPT006'),
(7, 15, NULL, 'AGPPT007'),
(8, 15, NULL, 'AGPPT008'),
(9, 15, NULL, 'AGPPT009'),
(10, 10, NULL, 'AGPPT010'),
(11, 10, NULL, 'AGPPT011'),
(12, 10, NULL, 'AGPPT012'),
(13, 15, NULL, 'HTCPT001'),
(14, 15, NULL, 'HTCPT002'),
(15, 25, NULL, 'HTCPT003'),
(16, 10, NULL, 'HTCPT004'),
(17, 15, NULL, 'HTCPT005'),
(18, 15, NULL, 'HTCPT006'),
(19, 15, NULL, 'HTCPT007'),
(20, 15, NULL, 'HTCPT008');

-- --------------------------------------------------------

--
-- Table structure for table `outgoing`
--

CREATE TABLE IF NOT EXISTS `outgoing` (
  `outID` int(5) NOT NULL AUTO_INCREMENT,
  `outQty` int(5) NOT NULL,
  `outDate` date NOT NULL,
  `outRemarks` text NOT NULL,
  `branchID` int(5) NOT NULL,
  `empID` int(5) NOT NULL,
  `prodID` varchar(10) NOT NULL,
  PRIMARY KEY (`outID`),
  KEY `FKOUTPROD_idx` (`prodID`),
  KEY `FKOUTEMP_idx` (`empID`),
  KEY `FKOUTBR_idx` (`branchID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

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

CREATE TABLE IF NOT EXISTS `product` (
  `prodID` varchar(10) NOT NULL,
  `prodName` varchar(100) NOT NULL,
  `model` varchar(45) DEFAULT NULL,
  `type` varchar(25) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `price` decimal(11,0) NOT NULL,
  `reorderLevel` int(5) NOT NULL,
  PRIMARY KEY (`prodID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodID`, `prodName`, `model`, `type`, `brand`, `price`, `reorderLevel`) VALUES
('AGPPT001', 'Bucket Mixer 1000W', 'AM5000 ', 'Powertools', 'AGP', '60000', 5),
('AGPPT002', 'Turbine Paint 1400W', 'T328 ', 'Powertools', 'AGP', '45150', 5),
('AGPPT003', 'Concrete Vibrator', 'VR600 ', 'Powertools', 'AGP', '35150', 5),
('AGPPT004', 'Concrete Vibrator', 'VRN1400 ', 'Powertools', 'AGP', '48800', 5),
('AGPPT005', 'Wall Chaser 1800W', 'CS180 ', 'Powertools', 'AGP', '41750', 5),
('AGPPT006', 'Drain Cleaning Machine 800W', 'D65', 'Powertools', 'AGP', '97600', 5),
('AGPPT007', 'Wet/Dry Vacuum Dust Extractor 1200W', 'DE25 ', 'Powertools', 'AGP', '46250', 5),
('AGPPT008', 'Die Grinder (Low Speed Mode) 1200W', 'DG50L ', 'Powertools', 'AGP', '18500', 5),
('AGPPT009', 'Stone Grinder 1200W', 'EP5LFB ', 'Powertools', 'AGP', '42200', 5),
('AGPPT010', 'Electric Mixer/Drill 1100W', 'EV21 ', 'Powertools', 'AGP', '11800', 5),
('AGPPT011', 'Airless Sprayer Elect Piston Pump', 'PM021 ', 'Powertools', 'AGP', '137500', 5),
('AGPPT012', 'Straight Grinder 1600W', 'SG6 ', 'Powetools', 'AGP', '20950', 5),
('HTCPT001', 'Rotary Hammer Hex 2-Mode 38MM 950W', 'DH38SS ', 'Powertools', 'Hitachi', '15000', 5),
('HTCPT002', 'Drill Press', 'B16RM ', 'Powertools', 'Hitachi', '22500', 5),
('HTCPT003', 'Compound Miter Saw 10" 255MM 1520W', 'C10FCE2', 'Powertools', 'Hitachi', '10200', 5),
('HTCPT004', 'Slide Compound Miter Saw 1600W', 'C12RSH ', 'Powertools', 'Hitachi', '38500', 5),
('HTCPT005', 'Brushcutter Bike Type Handle 1.31KW', 'CG40EAS ', 'Powertools', 'Hitachi', '10500', 25),
('HTCPT006', 'Jigsaw Variable Speed w/ Pendulum 720W 110MM', 'CJ110MV ', 'Powertools', 'Hitachi', '5400', 5),
('HTCPT007', 'Drill Variable Speed Reversible 3/8" 10MM', 'D10MV ', 'Powertools', 'Hitachi', '2500', 25),
('HTCPT008', 'Drill Variable Speed Reversible 10MM 3/8"', 'D10VST ', 'Powertools', 'Hitachi', '1700', 25),
('LTSAC001', 'Masonry Drill Bit 3MM 1/8"', 'LMDB030', 'Accessories', 'Lotus', '20', 25),
('LTSAC002', 'Masonry Drill Bit 4MM 5/32"', 'LMDB040', 'Accessories', 'Lotus', '30', 50),
('LTSAC003', 'Masonry Drill Bit 5MM 3/16"', 'LMDB050', 'Accessories', 'Lotus', '40', 50),
('LTSAC004', 'Masonry Drill Bit  6MM 1/4"', 'LMDB060', 'Accessories', 'Lotus', '50', 50),
('LTSAC005', 'Masonry Drill Bit 6.5MM 1/4"', 'LMDB065', 'Accessories', 'Lotus', '50', 25),
('LTSAC006', 'Masonry Drill Bit 7MM 9/32"', 'LMDB070', 'Accessories', 'Lotus', '50', 25),
('LTSAC007', 'Masonry Drill Bit 8MM 5/16"', 'LMDB080', 'Accessories', 'Lotus', '60', 25),
('LTSAC008', 'Masonry Drill Bit 9MM 11/32"', 'LMDB090', 'Accessories', 'Lotus', '70', 25),
('LTSAC009', 'Masonry Drill Bit 10MM 3/8"', 'LMDB100', 'Accessories', 'Lotus', '80', 25),
('LTSAC010', 'Masonry Drill Bit 11MM 7/16"', 'LMDB110', 'Accessories', 'Lotus', '80', 25),
('LTSAC011', 'Masonry Drill Bit 13MM 1/2"', 'LMDB130', 'Accessories', 'Lotus', '90', 25),
('LTSAC012', 'Masonry Drill Bit 16MM 5/8"', 'LMDB160', 'Accessories', 'Lotus', '140', 25),
('LTSAC013', 'Masonry drill bit 19MM 3/4"', 'LMDB190', 'Accessories', 'Lotus', '190', 25),
('LTSAC014', 'Hss-Cobalt Drill Bit Tube 3mm 7/64"', 'LCDB030B', 'Accessories', 'Lotus', '380', 20),
('LTSAC015', 'Hss-Cobalt Drill Bit Tube 3.2mm 1/8"', 'LCDB032B', 'Accessories', 'Lotus', '420', 20),
('LTSAC016', 'Hss-Cobalt Drill Bit Tube 3.5mm 9/64"', 'LCDB035B', 'Accessories', 'Lotus', '460', 20),
('LTSAC017', 'Hss-Cobalt Drill Bit Tube 4mm 5/32"', 'LCDB040B', 'Accessories', 'Lotus', '400', 20),
('LTSAC018', 'Hss-Cobalt Drill Bit Tube 5mm 3/16"', 'LCDB050B', 'Accessories', 'Lotus', '900', 20),
('LTSAC019', 'Hss-Cobalt Drill Bit Tube 5.5mm 7/32"', 'LCDB055B', 'Accessories', 'Lotus', '950', 20),
('LTSAC020', 'Hss-Cobalt Drill Bit Tube 6mm 15/64"', 'LCDB060B', 'Accessories', 'Lotus', '1500', 20),
('LTSAC021', 'Hss-Cobalt Drill Bit 7/64"', 'LCDB030', 'Accessories', 'Lotus', '45', 10),
('LTSAC022', 'Hss-Cobalt Drill Bit 1/8"', 'LCDB032', 'Accessories', 'Lotus', '50', 10),
('LTSAC023', 'Hss-Cobalt Drill Bit 5/32"', 'LCDB040', 'Accessories', 'Lotus', '60', 10),
('LTSAC024', 'Hss-Cobalt Drill Bit 3/16"', 'LCDB050', 'Accessories', 'Lotus', '90', 10),
('LTSAC025', 'Hss-Cobalt Drill Bit 7/32"', 'LCDB055', 'Accessories', 'Lotus', '110', 10),
('LTSAC026', 'Hss-Cobalt Drill Bit 15/16"', 'LCDB060', 'Accessories', 'Lotus', '100', 10),
('LTSAC027', 'Hss-Cobalt Drill Bit 5/16"', 'LCDB080', 'Accessories', 'Lotus', '230', 10),
('LTSAC028', 'Hss-Cobalt Drill Bit 11/32"', 'LCDB090', 'Accessories', 'Lotus', '270', 10),
('LTSAC029', 'Hss-Cobalt Drill Bit 23/64"', 'LCDB095', 'Accessories', 'Lotus', '250', 10),
('LTSAC030', 'Hss-Cobalt Drill Bit 3/8"', 'LCDB0100', 'Accessories', 'Lotus', '390', 10),
('LTSAC031', 'Hss-Cobalt Drill Bit 1/2"', 'LCDB0130', 'Accessories', 'Lotus', '620', 10),
('LTSAC032', 'Hss-g(Grounded) Drill Bit 1.mm 3/64"', 'LHDB015', 'Accessories', 'Lotus', '35', 40),
('LTSAC033', 'Hss-g(Grounded) Drill Bit 2mm 5/64"', 'LHDB020', 'Accessories', 'Lotus', '40', 40),
('LTSAC034', 'Hss-g(Grounded) Drill Bit 2.5mm 3/32"', 'LHDB025', 'Accessories', 'Lotus', '40', 40),
('LTSAC035', 'Hss-g(Grounded) Drill Bit 3mm 7/64"', 'LHDB030', 'Accessories', 'Lotus', '40', 40),
('LTSAC036', 'Hss-g(Grounded) Drill Bit 3.2mm 1/18"', 'LHDB032', 'Accessories', 'Lotus', '40', 40),
('LTSAC037', 'Hss-g(Grounded) Drill Bit 3.5mm 9/64"', 'LHDB035', 'Accessories', 'Lotus', '45', 40),
('LTSAC038', 'Hss-g(Grounded) Drill Bit 4mm 5/32"', 'LHDB040', 'Accessories', 'Lotus', '50', 50),
('LTSAC039', 'Hss-g(Grounded) Drill Bit 5mm 3/16"', 'LHDB050', 'Accessories', 'Lotus', '55', 50),
('LTSAC040', 'Hss-g(Grounded) Drill Bit 6mm 15/64"', 'LHDB060', 'Accessories', 'Lotus', '65', 50),
('LTSAC041', 'Hss-g(Grounded) Drill Bit 6.5mm 1/4"', 'LHDB065', 'Accessories', 'Lotus', '100', 50),
('LTSAC042', 'Hss-g(Grounded) Drill Bit 7mm 17/64"', 'LHDB070', 'Accessories', 'Lotus', '130', 25),
('LTSAC043', 'Hss-g(Grounded) Drill Bit 8mm 5/16"', 'LHDB080', 'Accessories', 'Lotus', '90', 25),
('LTSAC044', 'Hss-g(Grounded) Drill Bit 9.5mm 23/64"', 'LHDB095', 'Accessories', 'Lotus', '110', 25),
('LTSAC045', 'Hss-g(Grounded) Drill Bit 10mm 3/8"', 'LHDB100', 'Accessories', 'Lotus', '250', 25),
('LTSAC046', 'Hss-g(Grounded) Drill Bit 11mm 7/16"', 'LHDB110', 'Accessories', 'Lotus', '220', 20),
('LTSAC047', 'Hss-g(Grounded) Drill Bit 13mm 1/2"', 'LHDB130', 'Accessories', 'Lotus', '420', 20),
('LTSAC048', 'Carbon Brush 3.25x0.8x0.5mm', 'LAG115N38', 'Accessories', 'Lotus', '90', 20),
('LTSAC049', 'Carbon Brush 3.75x0.75x0.5mm', 'LID10REN22', 'Accessories', 'Lotus', '90', 20),
('LTSAC050', 'Carbon Brush 3.25x0.90x0.5mm', 'LID13REN23', 'Accessories', 'Lotus', '90', 20),
('LTSAC051', 'Carbon Brush 2x1x0.75mm', 'LPK180N32', 'Accessories', 'Lotus', '150', 20),
('LTSAC052', 'Carbon Brush', 'LID13REP21', 'Accessories', 'Lotus', '20', 20),
('LTSAC053', 'Carbon Brush', 'LAG115CH-45', 'Accessories', 'Lotus', '110', 20),
('LTSAC054', 'Carbon Brush 3.25x0.80x0.5', 'LAG115SSN29', 'Accessories', 'Lotus', '90', 20),
('LTSAC055', 'Carbon Brush', 'LAG115Z1.38', 'Accessories', 'Lotus', '50', 40),
('LTSAC056', 'Carbon Brush 3.25x0.55x0.5mm', 'LAT2026.2.32', 'Accessories', 'Lotus', '90', 40),
('LTSAC057', 'Carbon Brush', 'LCOM355H.43', 'Accessories', 'Lotus', '235', 40),
('LTSAC058', 'Carbon Brush', 'LCS185.70', 'Accessories', 'Lotus', '120', 40),
('LTSAC059', 'Carbon Brush 4x0.75x0.50mm', 'LJS65JD.2.3', 'Accessories', 'Lotus', '60', 40),
('LTSAC060', 'Carbon Brush 3.5x0.90x0.5mm', 'LPB600.2.23', 'Accessories', 'Lotus', '160', 40),
('LTSAC061', 'Carbon Brush 3.5x1x0.5mm', 'LPL822.2.26', 'Accessories', 'Lotus', '90', 40),
('LTSAC062', 'Carbon Brush 3x0.5x0.6mm', 'LRT170C.11', 'Accessories', 'Lotus', '110', 40),
('LTSAC063', 'Diamond Cutter Dry 4"X20/16mm', 'LDD105DS', 'Accessories', 'Lotus', '290', 30),
('LTSAC064', 'Diamond Cutter Dry 7"X25/22mm', 'LDD180DS', 'Accessories', 'Lotus', '840', 25),
('LTSAC065', 'Diamond Cutter Dry 14''X26/27mm', 'LDD350DS', 'Accessories', 'Lotus', '4000', 20),
('LTSAC066', 'Diamond Cutter Segmented 4"X20/16mm', 'LDD4DECO', 'Accessories', 'Lotus', '150', 30),
('LTSAC067', 'Diamond Cutter Segmented 7"X25/22mm', 'LDD7DECO', 'Accessories', 'Lotus', '380', 35),
('LTSAC068', 'Diamond Cutter Turbo Rim 4"X20/16mm', 'LDD4TECO', 'Accessories', 'Lotus', '160', 50),
('LTSAC069', 'Diamond Cutter Wet/Continous Rim 4"X20/16mm', 'LDD105WS', 'Accessories', 'Lotus', '280', 50),
('LTSAC070', 'Diamond Cutter Wet/Continous Rim 7"X25/22mm', 'LDD180WS', 'Accessories', 'Lotus', '750', 15),
('LTSAC071', 'Diamond Cutter Turbo(Ultra Thin) 4"X20/16mm', 'LDT105DT', 'Accessories', 'Lotus', '400', 20),
('LTSAC072', 'Diamond Cutter Turbo Rim 4"X20/16mm', 'LDT105DS', 'Accessories', 'Lotus', '300', 20),
('LTSAC073', 'Diamond Cutter Turbo Rim 7"X25/22mm', 'LDT180DS', 'Accessories', 'Lotus', '760', 10),
('LTSAC074', 'Tct Saw Blades 10"X30T', 'LTCT1030', 'Accessories', 'Lotus', '1200', 20),
('LTSAC075', 'Tct Saw Blades 12"X30T', 'LTCT1230', 'Accessories', 'Lotus', '1880', 20),
('LTSAC076', 'Tct Saw Blades 14"X30T', 'LTCT1430', 'Accessories', 'Lotus', '1980', 20),
('LTSAC077', 'Tct Saw Blades 16"X30T', 'LTCT1630', 'Accessories', 'Lotus', '2675', 15),
('LTSAC078', 'Tct Saw Blades 18"X30T', 'LTCT1830', 'Accessories', 'Lotus', '3375', 15),
('LTSAC079', 'Tct Saw Blades 4"X40T', 'LWC100', 'Accessories', 'Lotus', '300', 50),
('LTSAC080', 'Tct Saw Blades 7"X40T', 'LTCT740', 'Accessories', 'Lotus', '500', 40),
('LTSAC081', 'Tct Saw Blades 10"X40T', 'LTCT1040', 'Accessories', 'Lotus', '1300', 20),
('LTSAC082', 'Tct Saw Blades 12"X40T', 'LTCT1240', 'Accessories', 'Lotus', '2000', 20),
('LTSAC083', 'Tct Saw Blades 14"X40T', 'LTCT1440', 'Accessories', 'Lotus', '2200', 20),
('LTSAC084', 'Tct Saw Blades 16"X40T', 'LTCT1640', 'Accessories', 'Lotus', '2895', 20),
('LTSAC085', 'Tct Saw Blades 18"X40T', 'LTCT1840', 'Accessories', 'Lotus', '3595', 25),
('LTSAC086', 'Tct Saw Blades 10"X100T', 'LTCT10100', 'Accessories', 'Lotus', '2200', 25),
('LTSHT001', 'Flashlight+Key Chain 2.25"', 'LTFL500', 'Hand Tools', 'Lotus', '70', 15),
('LTSHT002', 'Flashlight 3 LED 5.5"', 'LTFL1400', 'Hand Tools', 'Lotus', '120', 15),
('LTSHT003', ' Flashlight 7 LED 28 LM 7.5"', 'LTFL2000D', 'Hand Tools', 'Lotus', '170', 15),
('LTSHT004', 'Flashlight 9 LED 4"', 'LFL3131', 'Hand Tools', 'Lotus', '200', 15),
('LTSHT005', 'Adjustable Wrench 6"', 'LAW006S', 'Hand Tools', 'Lotus', '190', 15),
('LTSHT006', 'Adjustable Wrench 8"', 'LAW008S', 'Hand Tools', 'Lotus', '270', 15),
('LTSHT007', 'Adjustable Wrench 10"', 'LAW010S', 'Hand Tools', 'Lotus', '390', 15),
('LTSHT008', 'Adjustable Wrench 12"', 'LAW012S', 'Hand Tools', 'Lotus', '530', 15),
('LTSHT009', 'Aluminum Level 12"/300MM', 'LAL3001M', 'Hand Tools', 'Lotus', '250', 15),
('LTSHT010', 'Aluminum Level 18"/450MM', 'LAL4501M', 'Hand Tools', 'Lotus', '340', 15),
('LTSHT011', 'Aluminum Level 24"/600MM', 'LAL6001M', 'Hand Tools', 'Lotus', '380', 15),
('LTSHT012', 'Aluminum Level 36"/900MM', 'LAL9001M', 'Hand Tools', 'Lotus', '480', 15),
('LTSHT013', 'Aviation Snip 10"', 'LAS250L', 'Hand Tools', 'Lotus', '400', 15),
('LTSHT014', 'Aviation Snip 10"', 'LAS250R', 'Hand Tools', 'Lotus', '400', 15),
('LTSHT015', 'Aviation Snip 10"', 'LAS250S', 'Hand Tools', 'Lotus', '400', 15),
('LTSHT016', 'Box Wrench Economy 8X9mm', 'LBW089DF', 'Hand Tools', 'Lotus', '120', 10),
('LTSHT017', 'Box Wrench Economy 10X11mm', 'LBW1011DF', 'Hand Tools', 'Lotus', '130', 10),
('LTSHT018', 'Box Wrench Economy 10X12mm', 'LBW1012DF', 'Hand Tools', 'Lotus', '140', 10),
('LTSHT019', 'Box Wrench Economy 11X13mm', 'LBW1113DF', 'Hand Tools', 'Lotus', '160', 10),
('LTSHT020', 'Box Wrench Economy 12X13mm', 'LBW1213DF', 'Hand Tools', 'Lotus', '170', 10),
('LTSHT021', 'Box Wrench Economy 12X14mm', 'LBW1214DF', 'Hand Tools', 'Lotus', '180', 10),
('LTSHT022', 'Box Wrench Economy 14X15mm', 'LBW1415DF', 'Hand Tools', 'Lotus', '190', 10),
('LTSHT023', 'Box Wrench Economy 16X17mm', 'LBW1617DF', 'Hand Tools', 'Lotus', '200', 10),
('LTSHT024', 'Box Wrench Economy 17X19mm', 'LBW1719DF', 'Hand Tools', 'Lotus', '250', 10),
('LTSHT025', 'Box Wrench Economy 18X19mm', 'LBW1819DF', 'Hand Tools', 'Lotus', '260', 10),
('LTSHT026', 'Box Wrench Economy 20X22mm', 'LBW2022DF', 'Hand Tools', 'Lotus', '270', 10),
('LTSHT027', 'Box Wrench Economy 21X23mm', 'LBW2123DF', 'Hand Tools', 'Lotus', '300', 10),
('LTSHT028', 'Combination Wrench Economy 8mm', 'LCW008DF', 'Hand Tools', 'Lotus', '90', 10),
('LTSHT029', 'Combination Wrench Economy 10mm', 'LCW010DF', 'Hand Tools', 'Lotus', '100', 10),
('LTSHT030', 'Combination Wrench Economy 12mm', 'LCW012DF', 'Hand Tools', 'Lotus', '110', 10),
('LTSHT031', 'Combination Wrench Economy 14mm', 'LCW014DF', 'Hand Tools', 'Lotus', '130', 10),
('LTSHT032', 'Combination Wrench Economy 17mm', 'LCW017DF', 'Hand Tools', 'Lotus', '180', 10),
('LTSHT033', 'Combination Wrench Economy 19mm', 'LCW019DF', 'Hand Tools', 'Lotus', '200', 10),
('LTSHT034', 'Open Wrench Economy 6X7mm', 'LOW067DF', 'Hand Tools', 'Lotus', '65', 10),
('LTSHT035', 'Open Wrench Economy 8X9mm', 'LOW089DF', 'Hand Tools', 'Lotus', '70', 10),
('LTSHT036', 'Open Wrench Economy 10X11mm', 'LOW1011DF', 'Hand Tools', 'Lotus', '75', 10),
('LTSHT037', 'Open Wrench Economy 10X12mm', 'LOW1012DF', 'Hand Tools', 'Lotus', '90', 10),
('LTSHT038', 'Open Wrench Economy 11X13mm', 'LOW1113DF', 'Hand Tools', 'Lotus', '85', 10),
('LTSHT039', 'Open Wrench Economy 12X13mm', 'LOW1213DF', 'Hand Tools', 'Lotus', '90', 10),
('LTSHT040', 'Open Wrench Economy 12X14mm', 'LOW1214DF', 'Hand Tools', 'Lotus', '95', 10),
('LTSHT041', 'Open Wrench Economy 14X15mm', 'LOW1415DF', 'Hand Tools', 'Lotus', '120', 10),
('LTSHT042', 'Open Wrench Economy 16X17mm', 'LOW1617DF', 'Hand Tools', 'Lotus', '120', 10),
('LTSHT043', 'Open Wrench Economy 18X19mm', 'LOW1819DF', 'Hand Tools', 'Lotus', '130', 10),
('LTSHT044', 'Open Wrench Economy 20X22mm', 'LOW2022DF', 'Hand Tools', 'Lotus', '150', 10),
('LTSHT045', 'Open Wrench Economy 21X23mm', 'LOW2123DF', 'Hand Tools', 'Lotus', '190', 10),
('LTSHT046', 'Box Wrench Set Economy 6-22mm', 'LBW622DF', 'Hand Tools', 'Lotus', '1350', 5),
('LTSHT047', 'Box Wrench Set Economy 6-32mm', 'LBW632DF', 'Hand Tools', 'Lotus', '3380', 5),
('LTSHT048', 'Box Wrench Set Professional 6-22mm', 'LBW622P', 'Hand Tools', 'Lotus', '1850', 5),
('LTSHT049', 'Combination Wrench Set Economy 8-22mm', 'LCW819SS-8', 'Hand Tools', 'Lotus', '1400', 5),
('LTSHT050', 'Combination Wrench Set Economy 8-24mm', 'LCW011DF', 'Hand Tools', 'Lotus', '2000', 5),
('LTSHT051', 'Combination Wrench Set Economy 8-24mm', 'LCW824SS', 'Hand Tools', 'Lotus', '2000', 5),
('LTSHT052', 'Combination Wrench Set Professional ', 'LCW011P', 'Hand Tools', 'Lotus', '2100', 5),
('LTSHT053', 'Combination Wrench Set Economy 8-19mm', 'LCW819SS', 'Hand Tools', 'Lotus', '750', 5),
('LTSHT054', 'Combination Wrench Set Professional', 'LCW014PS', 'Hand Tools', 'Lotus', '4000', 5),
('LTSHT055', 'Open Wrench Set Economy 6-17mm', 'LOW617DF', 'Hand Tools', 'Lotus', '770', 5),
('LTSHT056', 'Open Wrench Set Economy 6-22mm', 'LOW622DF', 'Hand Tools', 'Lotus', '1100', 5),
('LTSHT057', 'Open Wrench Set Professional 6-22mm', 'LOW622P', 'Hand Tools', 'Lotus', '1180', 5),
('LTSHT058', 'Claw Hammer Fiber Glass 21mm/28oz', 'LCH008E', 'Hand Tools', 'Lotus', '180', 10),
('LTSHT059', 'Claw Hammer Fiber Glass 27mm/8oz', 'LCH016E', 'Hand Tools', 'Lotus', '270', 10),
('LTSHT060', 'Claw Hammer Wood 21mm/8oz', 'LCH008W', 'Hand Tools', 'Lotus', '180', 10),
('LTSHT061', 'Claw Hammer Wood 27mm/16oz', 'LCH016W', 'Hand Tools', 'Lotus', '230', 10),
('LTSHT062', 'Claw Hammer Wood Plain 27mm/16oz', 'LCH016WP', 'Hand Tools', 'Lotus', '200', 10),
('LTSHT063', 'Bent Nose Plier(External) 7"', 'LBEP175', 'Hand Tools', 'Lotus', '420', 10),
('LTSHT064', 'Bent Nose Plier(Internal) 7"', 'LBIP175', 'Hand Tools', 'Lotus', '420', 10),
('LTSHT065', 'Bent Tip Plier Mini 4"', 'LEBP100M', 'Hand Tools', 'Lotus', '140', 10),
('LTSHT066', 'Combination Plier 6"', 'LCP150DF', 'Hand Tools', 'Lotus', '150', 10),
('LTSHT067', 'Combination Plier 7"', 'LCP175DF', 'Hand Tools', 'Lotus', '180', 10),
('LTSHT068', 'Combination Plier 8"', 'LCP200DF', 'Hand Tools', 'Lotus', '200', 10),
('LTSHT069', 'Combination Plier Professional 6"', 'LCP150P', 'Hand Tools', 'Lotus', '190', 10),
('LTSHT070', 'Combination Plier Professional 7" ', 'LCP175P', 'Hand Tools', 'Lotus', '210', 10),
('LTSHT071', 'Combination Plier Professional 8"', 'LCP200P', 'Hand Tools', 'Lotus', '250', 10),
('LTSHT072', 'Computer Plier', 'LCT800', 'Hand Tools', 'Lotus', '300', 10),
('LTSHT073', 'Diagonal Plier 5"', 'LDCP125DF', 'Hand Tools', 'Lotus', '130', 10),
('LTSHT074', 'Diagonal Plier 6"', 'LDCP150DF', 'Hand Tools', 'Lotus', '150', 10),
('LTSHT075', 'Diagonal Plier 7"', 'LDCP175DF', 'Hand Tools', 'Lotus', '160', 10),
('LTSHT076', 'Diagonal Plier 8"', 'LDCP200DF', 'Hand Tools', 'Lotus', '190', 10),
('LTSHT077', 'Diagonal Plier Mini 4"', 'LEDP100M', 'Hand Tools', 'Lotus', '140', 10),
('LTSHT078', 'Diagonal Plier Professional 5"', 'LDCP125P', 'Hand Tools', 'Lotus', '190', 10),
('LTSHT079', 'Diagonal Plier Professional 6"', 'LDCP150P', 'Hand Tools', 'Lotus', '200', 10),
('LTSHT080', 'Diagonal Plier Professional 7"', 'LDCP175P', 'Hand Tools', 'Lotus', '230', 10),
('LTSHT081', ' Long Nose Plier 5"', 'LLNP125DF', 'Hand Tools', 'Lotus', '140', 10),
('LTSHT082', 'Long Nose Plier 6"', 'LLNP150DF', 'Hand Tools', 'Lotus', '150', 10),
('LTSHT083', 'Long Nose Plier 7"', 'LLNP175DF', 'Hand Tools', 'Lotus', '170', 10),
('LTSHT084', 'Long Nose Plier 8"', 'LLNP200DF', 'Hand Tools', 'Lotus', '180', 10),
('LTSHT085', 'Long Nose Plier Mini 5"', 'LELNP100M', 'Hand Tools', 'Lotus', '140', 10),
('LTSHT086', ' Long Nose Plier Professional 5"', 'LLNP125P', 'Hand Tools', 'Lotus', '200', 10),
('LTSHT087', 'Long Nose Plier Professional 6"', 'LLNP150P', 'Hand Tools', 'Lotus', '210', 10),
('LTSHT088', ' Long Nose Plier Professional 7"', 'LLNP175P', 'Hand Tools', 'Lotus', '220', 10),
('LTSHT089', 'Long Nose Plier Professional 8"', 'LLNP200P', 'Hand Tools', 'Lotus', '230', 10),
('LTSHT090', ' Slip Joint Plier 6"', 'LSJP150', 'Hand Tools', 'Lotus', '130', 10),
('LTSHT091', 'Slip Joint Plier 8"', 'LSJP200', 'Hand Tools', 'Lotus', '170', 10),
('LTSHT092', 'Slip Joint Plier 10"', 'LSJP250', 'Hand Tools', 'Lotus', '230', 10),
('LTSHT093', 'Snap Ring Plier Set 8 in 1', 'LRP811', 'Hand Tools', 'Lotus', '600', 10),
('LTSHT094', 'Water Pump Plier 10"', 'LWPP250', 'Hand Tools', 'Lotus', '340', 10),
('LTSHT095', 'Water Pump Plier 12"', 'LWPP300', 'Hand Tools', 'Lotus', '395', 10),
('LTSHT096', 'Glue Gun', 'LGG301E', 'Hand Tools', 'Lotus', '320', 10),
('LTSHT097', 'Glue Gun', 'LGG160E', 'Hand Tools', 'Lotus', '200', 10),
('LTSHT098', 'Hacksaw Frame Mini 10"', 'LHF100', 'Hand Tools', 'Lotus', '110', 10),
('LTSHT099', 'Hacksaw Frame(High Tension) 12"', 'LHF300', 'Hand Tools', 'Lotus', '500', 5),
('LTSHT100', 'Hacksaw Frame(Square) 12"', 'LHF302', 'Hand Tools', 'Lotus', '300', 5),
('LTSHT101', 'Hacksaw Frame(Tubular) 12"', 'LHF304', 'Hand Tools', 'Lotus', '200', 5),
('LTSHT102', 'Hacksaw Frame(Economy) 12"', 'LHF308', 'Hand Tools', 'Lotus', '160', 5),
('LTSHT103', 'Hand Saw FastCut 6 TPI 16"', 'LHS016W', 'Hand Tools', 'Lotus', '320', 5),
('LTSHT104', 'Hand Saw FastCut 6 TPI 18"', 'LHS018W', 'Hand Tools', 'Lotus', '340', 5),
('LTSHT105', 'Hand Saw FastCut 6 TPI 20"', 'LHS020W', 'Hand Tools', 'Lotus', '400', 5),
('LTSHT106', 'Hand Saw FineCut 7TPI 16"', 'LHS400-16', 'Hand Tools', 'Lotus', '260', 10),
('LTSHT107', 'Hand Saw FineCut 7TPI 18"', 'LHS450-18', 'Hand Tools', 'Lotus', '280', 10),
('LTSHT108', 'Hand Saw FineCut 7TPI 20"', 'LHS500-20', 'Hand Tools', 'Lotus', '290', 10),
('LTSHT109', 'Hand Saw FineCut 7TPI 22"', 'LHS550-22', 'Hand Tools', 'Lotus', '320', 10),
('LTSHT110', 'Hand Saw JetCut 7TPI 18"', 'LHS4040-18', 'Hand Tools', 'Lotus', '330', 10),
('LTSHT111', 'Hand Saw JetCut 7TPI 20"', 'LHS4040-20', 'Hand Tools', 'Lotus', '410', 10),
('LTSHT112', 'Hand Saw FineCut (PVC) 7TPI 16"', 'LHS016', 'Hand Tools', 'Lotus', '300', 10),
('LTSHT113', 'Hand Saw FineCut (PVC) 7TPI 18"', 'LHS018', 'Hand Tools', 'Lotus', '350', 10),
('LTSHT114', 'Hand Saw FineCut (PVC) 7TPI 20"', 'LHS020', 'Hand Tools', 'Lotus', '400', 10),
('LTSHT115', 'Hand Saw FineCut (PVC) 7TPI 22"', 'LHS022', 'Hand Tools', 'Lotus', '430', 10),
('LTSHT116', 'Snap Off Knife(Basic) 6"', 'LUC870', 'Hand Tools', 'Lotus', '40', 10),
('LTSHT117', 'Snap Off Knife(Standard) 6.5"', 'LCK004', 'Hand Tools', 'Lotus', '100', 10),
('LTSHT118', 'Snap Off Knife 6.5"', 'LCK009', 'Hand Tools', 'Lotus', '160', 15),
('LTSHT119', 'Snap Off Knife 7"', 'LUC331', 'Hand Tools', 'Lotus', '150', 15),
('LTSHT120', 'Snap Off Knife 7"', 'LUC332', 'Hand Tools', 'Lotus', '150', 15),
('LTSHT121', 'Locking Plier(Vise Grip) Straight Jaw 7"', 'LVG007S', 'Hand Tools', 'Lotus', '295', 10),
('LTSHT122', 'Locking Plier(Vise Grip) Straight Jaw 10"', 'LVG010S', 'Hand Tools', 'Lotus', '350', 10),
('LTSHT123', 'Locking Plier(Vise Grip) Curved Jaw 7"', 'LVG007', 'Hand Tools', 'Lotus', '220', 10),
('LTSHT124', 'Locking Plier(Vise Grip) Curved Jaw 10"', 'LVG010', 'Hand Tools', 'Lotus', '300', 10),
('LTSHT125', 'Gun Tacker 2 Way Economic', 'LGT2707', 'Hand Tools', 'Lotus', '400', 10),
('LTSHT126', 'Gun Tacker 3 Way Professional ', 'LGT3716', 'Hand Tools', 'Lotus', '800', 10),
('LTSHT127', 'Gun Tacker 4 Way Professional ', 'LGT055', 'Hand Tools', 'Lotus', '1100', 10),
('LTSHT128', 'Hand Riveter(Swivel Head) 360 11"', 'LHR901', 'Hand Tools', 'Lotus', '650', 10),
('LTSHT129', 'Hand Riveter 10"', 'LHR708', 'Hand Tools', 'Lotus', '300', 10),
('LTSHT130', 'Hand Riveter 9"', 'LHR709', 'Hand Tools', 'Lotus', '350', 10),
('LTSHT131', 'Air Duster Heavy Duty', 'LDG102', 'Hand Tools', 'Lotus', '250', 10),
('LTSHT132', 'Air Duster', 'LDG101', 'Hand Tools', 'Lotus', '260', 10),
('LTSHT133', 'Air Duster', 'LDG101AD', 'Hand Tools', 'Lotus', '290', 10),
('LTSHT134', 'Screwdriver Professional(Positive) 7"', 'LSGP3163P', 'Hand Tools', 'Lotus', '70', 5),
('LTSHT135', 'Screwdriver Professional(Positive) 7.5"', 'LSGP184P', 'Hand Tools', 'Lotus', '60', 5),
('LTSHT136', 'Screwdriver Professional(Positive) 8"', 'LSGP3164P', 'Hand Tools', 'Lotus', '75', 5),
('LTSHT137', 'Screwdriver Professional(Positive) 9.5"', 'LSGP186P', 'Hand Tools', 'Lotus', '65', 5),
('LTSHT138', 'Screwdriver Professional(Positive) 9.75"', 'LSGP3166P', 'Hand Tools', 'Lotus', '80', 5),
('LTSHT139', 'Screwdriver Professional(Positive) 4.25"', 'LSGP1411P', 'Hand Tools', 'Lotus', '70', 5),
('LTSHT140', 'Screwdriver Professional(Positive) 8.25"', 'LSGP144P', 'Hand Tools', 'Lotus', '90', 5),
('LTSHT141', 'Screwdriver Professional(Positive) 9.5"', 'LSGP145P', 'Hand Tools', 'Lotus', '95', 5),
('LTSHT142', 'Screwdriver Professional(Positive) 10"', 'LSGP146P', 'Hand Tools', 'Lotus', '100', 5),
('LTSHT143', 'Screwdriver Professional(Positive) 12.5"', 'LSGP5168P', 'Hand Tools', 'Lotus', '140', 5);

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE IF NOT EXISTS `returns` (
  `returnID` int(5) NOT NULL AUTO_INCREMENT,
  `returnDate` date NOT NULL,
  `returnQty` int(5) NOT NULL,
  `status` varchar(25) NOT NULL,
  `returnRemark` text NOT NULL,
  `prodID` varchar(10) NOT NULL,
  PRIMARY KEY (`returnID`),
  KEY `FKRETPROD_idx` (`prodID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

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

CREATE TABLE IF NOT EXISTS `suppliers` (
  `supID` int(5) NOT NULL,
  `supplier_name` varchar(50) NOT NULL,
  PRIMARY KEY (`supID`)
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

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(5) NOT NULL AUTO_INCREMENT,
  `userName` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `password`) VALUES
(1, 'admin1', 'bosch123'),
(2, 'admin2', 'hitachi123'),
(3, 'user1', 'dewatt123'),
(4, 'user2', 'agp123');

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
