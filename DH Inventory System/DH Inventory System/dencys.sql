-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2017 at 05:17 PM
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
  `prodID` varchar(25) NOT NULL,
  `supID` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incoming`
--

INSERT INTO `incoming` (`inID`, `inQty`, `inDate`, `receiptNo`, `receiptDate`, `inRemarks`, `empID`, `prodID`, `supID`) VALUES
(2, 20, '2017-01-08', '4464', '2017-01-09', '5 missing', 5, 'LTS-AD-002', 2),
(3, 15, '2017-01-20', '3245', '2017-01-21', 'None', 4, 'LTS-AD-003', 3),
(4, 20, '2017-01-21', 'n7452', '2017-01-21', 'None', 8, 'LTS-AS-001', 4),
(5, 10, '2017-01-25', 'r5123', '2017-01-25', '3 missing', 3, 'LTS-AW-001', 5),
(6, 10, '2017-01-25', '6484', '2017-01-26', 'None', 7, 'LTS-AW-002', 6),
(7, 20, '2017-02-01', '6251', '2017-02-01', 'None', 5, 'LTS-BWE-001', 7),
(8, 15, '2017-02-10', 'c5292', '2017-02-10', 'None', 1, 'LTS-BWE-001', 8),
(9, 25, '2017-02-13', '6273', '2017-02-14', '5 missing', 6, 'LTS-BWE-002', 9),
(10, 20, '2017-02-15', 'g6272', '2017-02-15', 'None', 2, 'LTS-AD-003', 10);

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
(1, 20, NULL, 'LTS-AD-001', NULL),
(2, 20, NULL, 'LTS-AD-002', NULL),
(3, 20, NULL, 'LTS-AD-003', NULL),
(4, 10, NULL, 'LTS-AL-001', NULL),
(5, 25, NULL, 'LTS-AL-002', NULL),
(6, 5, NULL, 'LTS-AL-003', NULL),
(7, 15, NULL, 'LTS-AL-004', NULL),
(8, 15, NULL, 'LTS-AS-001', NULL),
(9, 15, NULL, 'LTS-AS-002', NULL),
(10, 10, NULL, 'LTS-AS-003', NULL),
(11, 10, NULL, 'LTS-AW-001', NULL),
(12, 10, NULL, 'LTS-AW-002', NULL),
(13, 15, NULL, 'LTS-AW-004', NULL),
(14, 15, NULL, 'LTS-BNPE-001', NULL),
(15, 25, NULL, 'LTS-BNPI-001', NULL),
(16, 10, NULL, 'LTS-BTPM-001', NULL),
(17, 15, NULL, 'LTS-BWE-001', NULL),
(18, 15, NULL, 'LTS-BWE-002', NULL),
(19, 15, NULL, 'LTS-BWE-003', NULL),
(20, 15, NULL, 'LTS-BWE-004', NULL);

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
(1, 5, '2017-01-05', 'None', 2, 2, 'LTS-BWE-001'),
(2, 5, '2017-01-05', 'None', 3, 3, 'LTS-BWE-002'),
(3, 5, '2017-01-06', 'None', 2, 4, 'LTS-AD-001'),
(4, 5, '2017-01-07', 'None', 1, 5, 'LTS-AD-002'),
(5, 10, '2017-01-08', 'None', 3, 3, 'LTS-AW-004'),
(6, 15, '2017-01-09', 'None', 4, 1, 'LTS-AD-003'),
(7, 5, '2017-01-10', 'None', 2, 4, 'LTS-AW-001'),
(8, 10, '2017-01-15', 'None', 3, 2, 'LTS-BWE-002'),
(9, 5, '2017-01-18', 'None', 4, 1, 'LTS-AL-001'),
(10, 5, '2017-01-20', 'None', 1, 5, 'LTS-AL-002'),
(11, 10, '2017-01-25', 'None', 3, 6, 'LTS-AS-001'),
(12, 15, '2017-01-30', 'None', 2, 7, 'LTS-AS-003');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodID` varchar(25) NOT NULL,
  `prodName` varchar(100) NOT NULL,
  `model` varchar(45) DEFAULT NULL,
  `type` varchar(25) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `price` decimal(11,0) NOT NULL,
  `reorderLevel` int(5) NOT NULL,
  `unitType` varchar(45) CHARACTER SET big5 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodID`, `prodName`, `model`, `type`, `brand`, `price`, `reorderLevel`, `unitType`) VALUES
('LTS-AD-001', 'Air Duster', 'LDG101', 'Hand Tools', 'Lotus', '260', 10, 'Piece/s'),
('LTS-AD-002', 'Air Duster', 'LDG101AD', 'Hand Tools', 'Lotus', '290', 10, 'Piece/s'),
('LTS-AD-003', 'Air Duster Heavy Duty', 'LDG102', 'Hand Tools', 'Lotus', '250', 10, 'Piece/s'),
('LTS-AL-001', 'Aluminum Level 12"/300MM', 'LAL3001M', 'Hand Tools', 'Lotus', '250', 15, 'Piece/s'),
('LTS-AL-002', 'Aluminum Level 18"/450MM', 'LAL4501M', 'Hand Tools', 'Lotus', '340', 15, 'Piece/s'),
('LTS-AL-003', 'Aluminum Level 24"/600MM', 'LAL6001M', 'Hand Tools', 'Lotus', '380', 15, 'Piece/s'),
('LTS-AL-004', 'Aluminum Level 36"/900MM', 'LAL9001M', 'Hand Tools', 'Lotus', '480', 15, 'Piece/s'),
('LTS-AS-001', 'Aviation Snip 10"', 'LAS250L', 'Hand Tools', 'Lotus', '400', 15, 'Piece/s'),
('LTS-AS-002', 'Aviation Snip 10"', 'LAS250R', 'Hand Tools', 'Lotus', '400', 15, 'Piece/s'),
('LTS-AS-003', 'Aviation Snip 10"', 'LAS250S', 'Hand Tools', 'Lotus', '400', 15, 'Piece/s'),
('LTS-AW-001', 'Adjustable Wrench 8"', 'LAW008S', 'Hand Tools', 'Lotus', '270', 15, 'Piece/s'),
('LTS-AW-002', 'Adjustable Wrench 10"', 'LAW010S', 'Hand Tools', 'Lotus', '390', 15, 'Piece/s'),
('LTS-AW-004', 'Adjustable Wrench 12"', 'LAW012S', 'Hand Tools', 'Lotus', '530', 15, 'Piece/s'),
('LTS-BNPE-001', 'Bent Nose Plier(External) 7"', 'LBEP175', 'Hand Tools', 'Lotus', '420', 10, 'Piece/s'),
('LTS-BNPI-001', 'Bent Nose Plier(Internal) 7"', 'LBIP175', 'Hand Tools', 'Lotus', '420', 10, 'Piece/s'),
('LTS-BTPM-001', 'Bent Tip Plier Mini 4"', 'LEBP100M', 'Hand Tools', 'Lotus', '140', 10, 'Piece/s'),
('LTS-BWE-001', 'Box Wrench Economy 8X9mm', 'LBW089DF', 'Hand Tools', 'Lotus', '120', 10, 'Piece/s'),
('LTS-BWE-002', 'Box Wrench Economy 10X11mm', 'LBW1011DF', 'Hand Tools', 'Lotus', '130', 10, 'Piece/s'),
('LTS-BWE-003', 'Box Wrench Economy 10X12mm', 'LBW1012DF', 'Hand Tools', 'Lotus', '140', 10, 'Piece/s'),
('LTS-BWE-004', 'Box Wrench Economy 11X13mm', 'LBW1113DF', 'Hand Tools', 'Lotus', '160', 10, 'Piece/s'),
('LTS-BWE-005', 'Box Wrench Economy 12X13mm', 'LBW1213DF', 'Hand Tools', 'Lotus', '170', 10, 'Piece/s'),
('LTS-BWE-006', 'Box Wrench Economy 12X14mm', 'LBW1214DF', 'Hand Tools', 'Lotus', '180', 10, 'Piece/s'),
('LTS-BWE-007', 'Box Wrench Economy 14X15mm', 'LBW1415DF', 'Hand Tools', 'Lotus', '190', 10, 'Piece/s'),
('LTS-BWE-008', 'Box Wrench Economy 16X17mm', 'LBW1617DF', 'Hand Tools', 'Lotus', '200', 10, 'Piece/s'),
('LTS-BWE-009', 'Box Wrench Economy 17X19mm', 'LBW1719DF', 'Hand Tools', 'Lotus', '250', 10, 'Piece/s'),
('LTS-BWE-010', 'Box Wrench Economy 18X19mm', 'LBW1819DF', 'Hand Tools', 'Lotus', '260', 10, 'Piece/s'),
('LTS-BWE-011', 'Box Wrench Economy 20X22mm', 'LBW2022DF', 'Hand Tools', 'Lotus', '270', 10, 'Piece/s'),
('LTS-BWE-012', 'Box Wrench Economy 21X23mm', 'LBW2123DF', 'Hand Tools', 'Lotus', '300', 10, 'Piece/s'),
('LTS-BWSE-001', 'Box Wrench Set Economy 6-22mm', 'LBW622DF', 'Hand Tools', 'Lotus', '1350', 5, 'Set/s'),
('LTS-BWSE-002', 'Box Wrench Set Economy 6-32mm', 'LBW632DF', 'Hand Tools', 'Lotus', '3380', 5, 'Set/s'),
('LTS-BWSP-001', 'Box Wrench Set Professional 6-22mm', 'LBW622P', 'Hand Tools', 'Lotus', '1850', 5, 'Set/s'),
('LTS-CB-001', 'Carbon Brush 3.25x0.8x0.5mm', 'LAG115N38', 'Accessories', 'Lotus', '90', 20, 'Piece/s'),
('LTS-CB-002', 'Carbon Brush 3.75x0.75x0.5mm', 'LID10REN22', 'Accessories', 'Lotus', '90', 20, 'Piece/s'),
('LTS-CB-003', 'Carbon Brush 3.25x0.90x0.5mm', 'LID13REN23', 'Accessories', 'Lotus', '90', 20, 'Piece/s'),
('LTS-CB-004', 'Carbon Brush 2x1x0.75mm', 'LPK180N32', 'Accessories', 'Lotus', '150', 20, 'Piece/s'),
('LTS-CB-005', 'Carbon Brush', 'LID13REP21', 'Accessories', 'Lotus', '20', 20, 'Piece/s'),
('LTS-CB-006', 'Carbon Brush', 'LAG115CH-45', 'Accessories', 'Lotus', '110', 20, 'Piece/s'),
('LTS-CB-007', 'Carbon Brush 3.25x0.80x0.5', 'LAG115SSN29', 'Accessories', 'Lotus', '90', 20, 'Piece/s'),
('LTS-CB-008', 'Carbon Brush', 'LAG115Z1.38', 'Accessories', 'Lotus', '50', 40, 'Piece/s'),
('LTS-CB-009', 'Carbon Brush 3.25x0.55x0.5mm', 'LAT2026.2.32', 'Accessories', 'Lotus', '90', 40, 'Piece/s'),
('LTS-CB-010', 'Carbon Brush', 'LCOM355H.43', 'Accessories', 'Lotus', '235', 40, 'Piece/s'),
('LTS-CB-011', 'Carbon Brush', 'LCS185.70', 'Accessories', 'Lotus', '120', 40, 'Piece/s'),
('LTS-CB-012', 'Carbon Brush 4x0.75x0.50mm', 'LJS65JD.2.3', 'Accessories', 'Lotus', '60', 40, 'Piece/s'),
('LTS-CB-013', 'Carbon Brush 3.5x0.90x0.5mm', 'LPB600.2.23', 'Accessories', 'Lotus', '160', 40, 'Piece/s'),
('LTS-CB-014', 'Carbon Brush 3.5x1x0.5mm', 'LPL822.2.26', 'Accessories', 'Lotus', '90', 40, 'Piece/s'),
('LTS-CB-015', 'Carbon Brush 3x0.5x0.6mm', 'LRT170C.11', 'Accessories', 'Lotus', '110', 40, 'Piece/s'),
('LTS-CHFG-001', 'Claw Hammer Fiber Glass 21mm/28oz', 'LCH008E', 'Hand Tools', 'Lotus', '180', 10, 'Piece/s'),
('LTS-CHFG-002', 'Claw Hammer Fiber Glass 27mm/8oz', 'LCH016E', 'Hand Tools', 'Lotus', '270', 10, 'Piece/s'),
('LTS-CHW-001', 'Claw Hammer Wood 21mm/8oz', 'LCH008W', 'Hand Tools', 'Lotus', '180', 10, 'Piece/s'),
('LTS-CHW-002', 'Claw Hammer Wood 27mm/16oz', 'LCH016W', 'Hand Tools', 'Lotus', '230', 10, 'Piece/s'),
('LTS-CHWP-001', 'Claw Hammer Wood Plain 27mm/16oz', 'LCH016WP', 'Hand Tools', 'Lotus', '200', 10, 'Piece/s'),
('LTS-CP-001', 'Combination Plier 6"', 'LCP150DF', 'Hand Tools', 'Lotus', '150', 10, 'Piece/s'),
('LTS-CP-002', 'Combination Plier 7"', 'LCP175DF', 'Hand Tools', 'Lotus', '180', 10, 'Piece/s'),
('LTS-CP-003', 'Combination Plier 8"', 'LCP200DF', 'Hand Tools', 'Lotus', '200', 10, 'Piece/s'),
('LTS-CP-004', 'Computer Plier', 'LCT800', 'Hand Tools', 'Lotus', '300', 10, 'Piece/s'),
('LTS-CPP-001', 'Combination Plier Professional 6"', 'LCP150P', 'Hand Tools', 'Lotus', '190', 10, 'Piece/s'),
('LTS-CPP-002', 'Combination Plier Professional 7" ', 'LCP175P', 'Hand Tools', 'Lotus', '210', 10, 'Piece/s'),
('LTS-CPP-003', 'Combination Plier Professional 8"', 'LCP200P', 'Hand Tools', 'Lotus', '250', 10, 'Piece/s'),
('LTS-CWE-001', 'Combination Wrench Economy 8mm', 'LCW008DF', 'Hand Tools', 'Lotus', '90', 10, 'Piece/s'),
('LTS-CWE-002', 'Combination Wrench Economy 10mm', 'LCW010DF', 'Hand Tools', 'Lotus', '100', 10, 'Piece/s'),
('LTS-CWE-003', 'Combination Wrench Economy 12mm', 'LCW012DF', 'Hand Tools', 'Lotus', '110', 10, 'Piece/s'),
('LTS-CWE-004', 'Combination Wrench Economy 14mm', 'LCW014DF', 'Hand Tools', 'Lotus', '130', 10, 'Piece/s'),
('LTS-CWE-005', 'Combination Wrench Economy 17mm', 'LCW017DF', 'Hand Tools', 'Lotus', '180', 10, 'Piece/s'),
('LTS-CWE-006', 'Combination Wrench Economy 19mm', 'LCW019DF', 'Hand Tools', 'Lotus', '200', 10, 'Piece/s'),
('LTS-CWSE-001', 'Combination Wrench Set Economy 8-22mm', 'LCW819SS-8', 'Hand Tools', 'Lotus', '1400', 5, 'Set/s'),
('LTS-CWSE-002', 'Combination Wrench Set Economy 8-24mm', 'LCW011DF', 'Hand Tools', 'Lotus', '2000', 5, 'Set/s'),
('LTS-CWSE-003', 'Combination Wrench Set Economy 8-24mm', 'LCW824SS', 'Hand Tools', 'Lotus', '2000', 5, 'Set/s'),
('LTS-CWSE-004', 'Combination Wrench Set Economy 8-19mm', 'LCW819SS', 'Hand Tools', 'Lotus', '750', 5, 'Set/s'),
('LTS-CWSP-001', 'Combination Wrench Set Professional ', 'LCW011P', 'Hand Tools', 'Lotus', '2100', 5, 'Set/s'),
('LTS-CWSP-002', 'Combination Wrench Set Professional', 'LCW014PS', 'Hand Tools', 'Lotus', '4000', 5, 'Set/s'),
('LTS-DCD-001', 'Diamond Cutter Dry 4"X20/16mm', 'LDD105DS', 'Accessories', 'Lotus', '290', 30, 'Piece/s'),
('LTS-DCD-002', 'Diamond Cutter Dry 7"X25/22mm', 'LDD180DS', 'Accessories', 'Lotus', '840', 25, 'Piece/s'),
('LTS-DCD-003', 'Diamond Cutter Dry 14\'X26/27mm', 'LDD350DS', 'Accessories', 'Lotus', '4000', 20, 'Piece/s'),
('LTS-DCS-001', 'Diamond Cutter Segmented 4"X20/16mm', 'LDD4DECO', 'Accessories', 'Lotus', '150', 30, 'Piece/s'),
('LTS-DCS-002', 'Diamond Cutter Segmented 7"X25/22mm', 'LDD7DECO', 'Accessories', 'Lotus', '380', 35, 'Piece/s'),
('LTS-DCTR-001', 'Diamond Cutter Turbo Rim 4"X20/16mm', 'LDD4TECO', 'Accessories', 'Lotus', '160', 50, 'Piece/s'),
('LTS-DCTR-002', 'Diamond Cutter Turbo Rim 4"X20/16mm', 'LDT105DS', 'Accessories', 'Lotus', '300', 20, 'Piece/s'),
('LTS-DCTR-003', 'Diamond Cutter Turbo Rim 7"X25/22mm', 'LDT180DS', 'Accessories', 'Lotus', '760', 10, 'Piece/s'),
('LTS-DCTUT-001', 'Diamond Cutter Turbo(Ultra Thin) 4"X20/16mm', 'LDT105DT', 'Accessories', 'Lotus', '400', 20, 'Piece/s'),
('LTS-DCWCR-001', 'Diamond Cutter Wet/Continous Rim 4"X20/16mm', 'LDD105WS', 'Accessories', 'Lotus', '280', 50, 'Piece/s'),
('LTS-DCWCR-002', 'Diamond Cutter Wet/Continous Rim 7"X25/22mm', 'LDD180WS', 'Accessories', 'Lotus', '750', 15, 'Piece/s'),
('LTS-DP-001', 'Diagonal Plier 5"', 'LDCP125DF', 'Hand Tools', 'Lotus', '130', 10, 'Piece/s'),
('LTS-DP-002', 'Diagonal Plier 6"', 'LDCP150DF', 'Hand Tools', 'Lotus', '150', 10, 'Piece/s'),
('LTS-DP-003', 'Diagonal Plier 7"', 'LDCP175DF', 'Hand Tools', 'Lotus', '160', 10, 'Piece/s'),
('LTS-DP-004', 'Diagonal Plier 8"', 'LDCP200DF', 'Hand Tools', 'Lotus', '190', 10, 'Piece/s'),
('LTS-DPM-001', 'Diagonal Plier Mini 4"', 'LEDP100M', 'Hand Tools', 'Lotus', '140', 10, 'Piece/s'),
('LTS-DPP-001', 'Diagonal Plier Professional 5"', 'LDCP125P', 'Hand Tools', 'Lotus', '190', 10, 'Piece/s'),
('LTS-DPP-002', 'Diagonal Plier Professional 6"', 'LDCP150P', 'Hand Tools', 'Lotus', '200', 10, 'Piece/s'),
('LTS-DPP-003', 'Diagonal Plier Professional 7"', 'LDCP175P', 'Hand Tools', 'Lotus', '230', 10, 'Piece/s'),
('LTS-FL-001', 'Flashlight+Key Chain 2.25"', 'LTFL500', 'Hand Tools', 'Lotus', '70', 15, 'Piece/s'),
('LTS-FL-002', 'Flashlight 3 LED 5.5"', 'LTFL1400', 'Hand Tools', 'Lotus', '120', 15, 'Piece/s'),
('LTS-FL-003', 'Flashlight 7 LED 28 LM 7.5"', 'LTFL2000D', 'Hand Tools', 'Lotus', '170', 15, 'Piece/s'),
('LTS-FL-004', 'Flashlight 9 LED 4"', 'LFL3131', 'Hand Tools', 'Lotus', '200', 15, 'Piece/s'),
('LTS-GG-001', 'Glue Gun', 'LGG301E', 'Hand Tools', 'Lotus', '320', 10, 'Piece/s'),
('LTS-GG-002', 'Glue Gun', 'LGG160E', 'Hand Tools', 'Lotus', '200', 10, 'Piece/s'),
('LTS-GTWE-001', 'Gun Tacker 2 Way Economic', 'LGT2707', 'Hand Tools', 'Lotus', '400', 10, 'Piece/s'),
('LTS-GTWP-001', 'Gun Tacker 3 Way Professional ', 'LGT3716', 'Hand Tools', 'Lotus', '800', 10, 'Piece/s'),
('LTS-GTWP-002', 'Gun Tacker 4 Way Professional ', 'LGT055', 'Hand Tools', 'Lotus', '1100', 10, 'Piece/s'),
('LTS-HCDB-001', 'Hss-Cobalt Drill Bit 7/64"', 'LCDB030', 'Accessories', 'Lotus', '45', 10, 'Piece/s'),
('LTS-HCDB-002', 'Hss-Cobalt Drill Bit 1/8"', 'LCDB032', 'Accessories', 'Lotus', '50', 10, 'Piece/s'),
('LTS-HCDB-003', 'Hss-Cobalt Drill Bit 5/32"', 'LCDB040', 'Accessories', 'Lotus', '60', 10, 'Piece/s'),
('LTS-HCDB-004', 'Hss-Cobalt Drill Bit 3/16"', 'LCDB050', 'Accessories', 'Lotus', '90', 10, 'Piece/s'),
('LTS-HCDB-005', 'Hss-Cobalt Drill Bit 7/32"', 'LCDB055', 'Accessories', 'Lotus', '110', 10, 'Piece/s'),
('LTS-HCDB-006', 'Hss-Cobalt Drill Bit 15/16"', 'LCDB060', 'Accessories', 'Lotus', '100', 10, 'Piece/s'),
('LTS-HCDB-007', 'Hss-Cobalt Drill Bit 5/16"', 'LCDB080', 'Accessories', 'Lotus', '230', 10, 'Piece/s'),
('LTS-HCDB-008', 'Hss-Cobalt Drill Bit 11/32"', 'LCDB090', 'Accessories', 'Lotus', '270', 10, 'Piece/s'),
('LTS-HCDB-009', 'Hss-Cobalt Drill Bit 23/64"', 'LCDB095', 'Accessories', 'Lotus', '250', 10, 'Piece/s'),
('LTS-HCDB-010', 'Hss-Cobalt Drill Bit 3/8"', 'LCDB0100', 'Accessories', 'Lotus', '390', 10, 'Piece/s'),
('LTS-HCDB-011', 'Hss-Cobalt Drill Bit 1/2"', 'LCDB0130', 'Accessories', 'Lotus', '620', 10, 'Piece/s'),
('LTS-HCDBT-001', 'Hss-Cobalt Drill Bit Tube 3mm 7/64"', 'LCDB030B', 'Accessories', 'Lotus', '380', 20, 'Piece/s'),
('LTS-HCDBT-002', 'Hss-Cobalt Drill Bit Tube 3.2mm 1/8"', 'LCDB032B', 'Accessories', 'Lotus', '420', 20, 'Piece/s'),
('LTS-HCDBT-003', 'Hss-Cobalt Drill Bit Tube 3.5mm 9/64"', 'LCDB035B', 'Accessories', 'Lotus', '460', 20, 'Piece/s'),
('LTS-HCDBT-004', 'Hss-Cobalt Drill Bit Tube 4mm 5/32"', 'LCDB040B', 'Accessories', 'Lotus', '400', 20, 'Piece/s'),
('LTS-HCDBT-005', 'Hss-Cobalt Drill Bit Tube 5mm 3/16"', 'LCDB050B', 'Accessories', 'Lotus', '900', 20, 'Piece/s'),
('LTS-HCDBT-006', 'Hss-Cobalt Drill Bit Tube 5.5mm 7/32"', 'LCDB055B', 'Accessories', 'Lotus', '950', 20, 'Piece/s'),
('LTS-HCDBT-007', 'Hss-Cobalt Drill Bit Tube 6mm 15/64"', 'LCDB060B', 'Accessories', 'Lotus', '1500', 20, 'Piece/s'),
('LTS-HF-001', 'Hacksaw Frame Mini 10"', 'LHF100', 'Hand Tools', 'Lotus', '110', 10, 'Piece/s'),
('LTS-HF-002', 'Hacksaw Frame(High Tension) 12"', 'LHF300', 'Hand Tools', 'Lotus', '500', 5, 'Piece/s'),
('LTS-HF-003', 'Hacksaw Frame(Square) 12"', 'LHF302', 'Hand Tools', 'Lotus', '300', 5, 'Piece/s'),
('LTS-HF-004', 'Hacksaw Frame(Tubular) 12"', 'LHF304', 'Hand Tools', 'Lotus', '200', 5, 'Piece/s'),
('LTS-HF-005', 'Hacksaw Frame(Economy) 12"', 'LHF308', 'Hand Tools', 'Lotus', '160', 5, 'Piece/s'),
('LTS-HGDB-001', 'Hss-g(Grounded) Drill Bit 1.mm 3/64"', 'LHDB015', 'Accessories', 'Lotus', '35', 40, 'Piece/s'),
('LTS-HGDB-002', 'Hss-g(Grounded) Drill Bit 2mm 5/64"', 'LHDB020', 'Accessories', 'Lotus', '40', 40, 'Piece/s'),
('LTS-HGDB-003', 'Hss-g(Grounded) Drill Bit 2.5mm 3/32"', 'LHDB025', 'Accessories', 'Lotus', '40', 40, 'Piece/s'),
('LTS-HGDB-004', 'Hss-g(Grounded) Drill Bit 3mm 7/64"', 'LHDB030', 'Accessories', 'Lotus', '40', 40, 'Piece/s'),
('LTS-HGDB-005', 'Hss-g(Grounded) Drill Bit 3.2mm 1/18"', 'LHDB032', 'Accessories', 'Lotus', '40', 40, 'Piece/s'),
('LTS-HGDB-006', 'Hss-g(Grounded) Drill Bit 3.5mm 9/64"', 'LHDB035', 'Accessories', 'Lotus', '45', 40, 'Piece/s'),
('LTS-HGDB-007', 'Hss-g(Grounded) Drill Bit 4mm 5/32"', 'LHDB040', 'Accessories', 'Lotus', '50', 50, 'Piece/s'),
('LTS-HGDB-008', 'Hss-g(Grounded) Drill Bit 5mm 3/16"', 'LHDB050', 'Accessories', 'Lotus', '55', 50, 'Piece/s'),
('LTS-HGDB-009', 'Hss-g(Grounded) Drill Bit 6mm 15/64"', 'LHDB060', 'Accessories', 'Lotus', '65', 50, 'Piece/s'),
('LTS-HGDB-010', 'Hss-g(Grounded) Drill Bit 6.5mm 1/4"', 'LHDB065', 'Accessories', 'Lotus', '100', 50, 'Piece/s'),
('LTS-HGDB-011', 'Hss-g(Grounded) Drill Bit 7mm 17/64"', 'LHDB070', 'Accessories', 'Lotus', '130', 25, 'Piece/s'),
('LTS-HGDB-012', 'Hss-g(Grounded) Drill Bit 8mm 5/16"', 'LHDB080', 'Accessories', 'Lotus', '90', 25, 'Piece/s'),
('LTS-HGDB-013', 'Hss-g(Grounded) Drill Bit 9.5mm 23/64"', 'LHDB095', 'Accessories', 'Lotus', '110', 25, 'Piece/s'),
('LTS-HGDB-014', 'Hss-g(Grounded) Drill Bit 10mm 3/8"', 'LHDB100', 'Accessories', 'Lotus', '250', 25, 'Piece/s'),
('LTS-HGDB-015', 'Hss-g(Grounded) Drill Bit 11mm 7/16"', 'LHDB110', 'Accessories', 'Lotus', '220', 20, 'Piece/s'),
('LTS-HGDB-016', 'Hss-g(Grounded) Drill Bit 13mm 1/2"', 'LHDB130', 'Accessories', 'Lotus', '420', 20, 'Piece/s'),
('LTS-HR-001', 'Hand Riveter(Swivel Head) 360 11"', 'LHR901', 'Hand Tools', 'Lotus', '650', 10, 'Piece/s'),
('LTS-HR-002', 'Hand Riveter 10"', 'LHR708', 'Hand Tools', 'Lotus', '300', 10, 'Piece/s'),
('LTS-HR-003', 'Hand Riveter 9"', 'LHR709', 'Hand Tools', 'Lotus', '350', 10, 'Piece/s'),
('LTS-HSFAC-001', 'Hand Saw FastCut 6 TPI 16"', 'LHS016W', 'Hand Tools', 'Lotus', '320', 5, 'Piece/s'),
('LTS-HSFAC-002', 'Hand Saw FastCut 6 TPI 18"', 'LHS018W', 'Hand Tools', 'Lotus', '340', 5, 'Piece/s'),
('LTS-HSFAC-003', 'Hand Saw FastCut 6 TPI 20"', 'LHS020W', 'Hand Tools', 'Lotus', '400', 5, 'Piece/s'),
('LTS-HSFIC-001', 'Hand Saw FineCut 7TPI 16"', 'LHS400-16', 'Hand Tools', 'Lotus', '260', 10, 'Piece/s'),
('LTS-HSFIC-002', 'Hand Saw FineCut 7TPI 18"', 'LHS450-18', 'Hand Tools', 'Lotus', '280', 10, 'Piece/s'),
('LTS-HSFIC-003', 'Hand Saw FineCut 7TPI 20"', 'LHS500-20', 'Hand Tools', 'Lotus', '290', 10, 'Piece/s'),
('LTS-HSFIC-004', 'Hand Saw FineCut 7TPI 22"', 'LHS550-22', 'Hand Tools', 'Lotus', '320', 10, 'Piece/s'),
('LTS-HSJC-001', 'Hand Saw JetCut 7TPI 18"', 'LHS4040-18', 'Hand Tools', 'Lotus', '330', 10, 'Piece/s'),
('LTS-HSJC-002', 'Hand Saw JetCut 7TPI 20"', 'LHS4040-20', 'Hand Tools', 'Lotus', '410', 10, 'Piece/s'),
('LTS-HSPVC-001', 'Hand Saw FineCut (PVC) 7TPI 16"', 'LHS016', 'Hand Tools', 'Lotus', '300', 10, 'Piece/s'),
('LTS-HSPVC-002', 'Hand Saw FineCut (PVC) 7TPI 18"', 'LHS018', 'Hand Tools', 'Lotus', '350', 10, 'Piece/s'),
('LTS-HSPVC-003', 'Hand Saw FineCut (PVC) 7TPI 20"', 'LHS020', 'Hand Tools', 'Lotus', '400', 10, 'Piece/s'),
('LTS-HSPVC-004', 'Hand Saw FineCut (PVC) 7TPI 22"', 'LHS022', 'Hand Tools', 'Lotus', '430', 10, 'Piece/s'),
('LTS-LNP-001', 'Long Nose Plier 5"', 'LLNP125DF', 'Hand Tools', 'Lotus', '140', 10, 'Piece/s'),
('LTS-LNP-002', 'Long Nose Plier 6"', 'LLNP150DF', 'Hand Tools', 'Lotus', '150', 10, 'Piece/s'),
('LTS-LNP-003', 'Long Nose Plier 7"', 'LLNP175DF', 'Hand Tools', 'Lotus', '170', 10, 'Piece/s'),
('LTS-LNP-004', 'Long Nose Plier 8"', 'LLNP200DF', 'Hand Tools', 'Lotus', '180', 10, 'Piece/s'),
('LTS-LNP-005', 'Long Nose Plier Mini 5"', 'LELNP100M', 'Hand Tools', 'Lotus', '140', 10, 'Piece/s'),
('LTS-LNPP-001', 'Long Nose Plier Professional 5"', 'LLNP125P', 'Hand Tools', 'Lotus', '200', 10, 'Piece/s'),
('LTS-LNPP-002', 'Long Nose Plier Professional 6"', 'LLNP150P', 'Hand Tools', 'Lotus', '210', 10, 'Piece/s'),
('LTS-LNPP-003', 'Long Nose Plier Professional 7"', 'LLNP175P', 'Hand Tools', 'Lotus', '220', 10, 'Piece/s'),
('LTS-LNPP-004', 'Long Nose Plier Professional 8"', 'LLNP200P', 'Hand Tools', 'Lotus', '230', 10, 'Piece/s'),
('LTS-LPVCJ-001', 'Locking Plier(Vise Grip) Curved Jaw 7"', 'LVG007', 'Hand Tools', 'Lotus', '220', 10, 'Piece/s'),
('LTS-LPVCJ-002', 'Locking Plier(Vise Grip) Curved Jaw 10"', 'LVG010', 'Hand Tools', 'Lotus', '300', 10, 'Piece/s'),
('LTS-LPVSJ-001', 'Locking Plier(Vise Grip) Straight Jaw 7"', 'LVG007S', 'Hand Tools', 'Lotus', '295', 10, 'Piece/s'),
('LTS-LPVSJ-002', 'Locking Plier(Vise Grip) Straight Jaw 10"', 'LVG010S', 'Hand Tools', 'Lotus', '350', 10, 'Piece/s'),
('LTS-MDB-001', 'Masonry Drill Bit 3MM 1/8"', 'LMDB030', 'Accessories', 'Lotus', '20', 25, 'Piece/s'),
('LTS-MDB-002', 'Masonry Drill Bit 4MM 5/32"', 'LMDB040', 'Accessories', 'Lotus', '30', 50, 'Piece/s'),
('LTS-MDB-003', 'Masonry Drill Bit  6MM 1/4"', 'LMDB060', 'Accessories', 'Lotus', '50', 50, 'Piece/s'),
('LTS-MDB-004', 'Masonry Drill Bit 6.5MM 1/4"', 'LMDB065', 'Accessories', 'Lotus', '50', 25, 'Piece/s'),
('LTS-MDB-005', 'Masonry Drill Bit 7MM 9/32"', 'LMDB070', 'Accessories', 'Lotus', '50', 25, 'Piece/s'),
('LTS-MDB-006', 'Masonry Drill Bit 8MM 5/16"', 'LMDB080', 'Accessories', 'Lotus', '60', 25, 'Piece/s'),
('LTS-MDB-007', 'Masonry Drill Bit 9MM 11/32"', 'LMDB090', 'Accessories', 'Lotus', '70', 25, 'Piece/s'),
('LTS-MDB-008', 'Masonry Drill Bit 10MM 3/8"', 'LMDB100', 'Accessories', 'Lotus', '80', 25, 'Piece/s'),
('LTS-MDB-009', 'Masonry Drill Bit 11MM 7/16"', 'LMDB110', 'Accessories', 'Lotus', '80', 25, 'Piece/s'),
('LTS-MDB-010', 'Masonry Drill Bit 13MM 1/2"', 'LMDB130', 'Accessories', 'Lotus', '90', 25, 'Piece/s'),
('LTS-MDB-011', 'Masonry Drill Bit 16MM 5/8"', 'LMDB160', 'Accessories', 'Lotus', '140', 25, 'Piece/s'),
('LTS-MDB-012', 'Masonry Drill Bit 19MM 3/4"', 'LMDB190', 'Accessories', 'Lotus', '190', 25, 'Piece/s'),
('LTS-OWE-001', 'Open Wrench Economy 6X7mm', 'LOW067DF', 'Hand Tools', 'Lotus', '65', 10, 'Piece/s'),
('LTS-OWE-002', 'Open Wrench Economy 8X9mm', 'LOW089DF', 'Hand Tools', 'Lotus', '70', 10, 'Piece/s'),
('LTS-OWE-003', 'Open Wrench Economy 10X11mm', 'LOW1011DF', 'Hand Tools', 'Lotus', '75', 10, 'Piece/s'),
('LTS-OWE-004', 'Open Wrench Economy 10X12mm', 'LOW1012DF', 'Hand Tools', 'Lotus', '90', 10, 'Piece/s'),
('LTS-OWE-005', 'Open Wrench Economy 11X13mm', 'LOW1113DF', 'Hand Tools', 'Lotus', '85', 10, 'Piece/s'),
('LTS-OWE-006', 'Open Wrench Economy 12X13mm', 'LOW1213DF', 'Hand Tools', 'Lotus', '90', 10, 'Piece/s'),
('LTS-OWE-007', 'Open Wrench Economy 12X14mm', 'LOW1214DF', 'Hand Tools', 'Lotus', '95', 10, 'Piece/s'),
('LTS-OWE-008', 'Open Wrench Economy 14X15mm', 'LOW1415DF', 'Hand Tools', 'Lotus', '120', 10, 'Piece/s'),
('LTS-OWE-009', 'Open Wrench Economy 16X17mm', 'LOW1617DF', 'Hand Tools', 'Lotus', '120', 10, 'Piece/s'),
('LTS-OWE-010', 'Open Wrench Economy 18X19mm', 'LOW1819DF', 'Hand Tools', 'Lotus', '130', 10, 'Piece/s'),
('LTS-OWE-011', 'Open Wrench Economy 20X22mm', 'LOW2022DF', 'Hand Tools', 'Lotus', '150', 10, 'Piece/s'),
('LTS-OWE-012', 'Open Wrench Economy 21X23mm', 'LOW2123DF', 'Hand Tools', 'Lotus', '190', 10, 'Piece/s'),
('LTS-OWSE-001', 'Open Wrench Set Economy 6-17mm', 'LOW617DF', 'Hand Tools', 'Lotus', '770', 5, 'Set/s'),
('LTS-OWSE-002', 'Open Wrench Set Economy 6-22mm', 'LOW622DF', 'Hand Tools', 'Lotus', '1100', 5, 'Set/s'),
('LTS-OWSP-001', 'Open Wrench Set Professional 6-22mm', 'LOW622P', 'Hand Tools', 'Lotus', '1180', 5, 'Set/s'),
('LTS-SDPP-001', 'Screwdriver Professional(Positive) 7"', 'LSGP3163P', 'Hand Tools', 'Lotus', '70', 5, 'Piece/s'),
('LTS-SDPP-002', 'Screwdriver Professional(Positive) 7.5"', 'LSGP184P', 'Hand Tools', 'Lotus', '60', 5, 'Piece/s'),
('LTS-SDPP-003', 'Screwdriver Professional(Positive) 8"', 'LSGP3164P', 'Hand Tools', 'Lotus', '75', 5, 'Piece/s'),
('LTS-SDPP-004', 'Screwdriver Professional(Positive) 9.5"', 'LSGP186P', 'Hand Tools', 'Lotus', '65', 5, 'Piece/s'),
('LTS-SDPP-005', 'Screwdriver Professional(Positive) 9.75"', 'LSGP3166P', 'Hand Tools', 'Lotus', '80', 5, 'Piece/s'),
('LTS-SDPP-006', 'Screwdriver Professional(Positive) 4.25"', 'LSGP1411P', 'Hand Tools', 'Lotus', '70', 5, 'Piece/s'),
('LTS-SDPP-007', 'Screwdriver Professional(Positive) 8.25"', 'LSGP144P', 'Hand Tools', 'Lotus', '90', 5, 'Piece/s'),
('LTS-SDPP-008', 'Screwdriver Professional(Positive) 9.5"', 'LSGP145P', 'Hand Tools', 'Lotus', '95', 5, 'Piece/s'),
('LTS-SDPP-009', 'Screwdriver Professional(Positive) 10"', 'LSGP146P', 'Hand Tools', 'Lotus', '100', 5, 'Piece/s'),
('LTS-SDPP-010', 'Screwdriver Professional(Positive) 12.5"', 'LSGP5168P', 'Hand Tools', 'Lotus', '140', 5, 'Piece/s'),
('LTS-SJP-001', 'Slip Joint Plier 6"', 'LAW006S', 'Hand Tools', 'Lotus', '190', 15, 'Piece/s'),
('LTS-SJP-002', 'Slip Joint Plier 6"', 'LSJP150', 'Hand Tools', 'Lotus', '130', 10, 'Piece/s'),
('LTS-SJP-003', 'Slip Joint Plier 8"', 'LSJP200', 'Hand Tools', 'Lotus', '170', 10, 'Piece/s'),
('LTS-SJP-004', 'Slip Joint Plier 10"', 'LSJP250', 'Hand Tools', 'Lotus', '230', 10, 'Piece/s'),
('LTS-SOK-001', 'Snap Off Knife(Basic) 6"', 'LUC870', 'Hand Tools', 'Lotus', '40', 10, 'Piece/s'),
('LTS-SOK-002', 'Snap Off Knife(Standard) 6.5"', 'LCK004', 'Hand Tools', 'Lotus', '100', 10, 'Piece/s'),
('LTS-SOK-003', 'Snap Off Knife 6.5"', 'LCK009', 'Hand Tools', 'Lotus', '160', 15, 'Piece/s'),
('LTS-SOK-004', 'Snap Off Knife 7"', 'LUC331', 'Hand Tools', 'Lotus', '150', 15, 'Piece/s'),
('LTS-SOK-005', 'Snap Off Knife 7"', 'LUC332', 'Hand Tools', 'Lotus', '150', 15, 'Piece/s'),
('LTS-SRPS-001', 'Snap Ring Plier Set 8 in 1', 'LRP811', 'Hand Tools', 'Lotus', '600', 10, 'Set/s'),
('LTS-TSB-001', 'Tct Saw Blades 10"X30T', 'LTCT1030', 'Accessories', 'Lotus', '1200', 20, 'Piece/s'),
('LTS-TSB-002', 'Tct Saw Blades 12"X30T', 'LTCT1230', 'Accessories', 'Lotus', '1880', 20, 'Piece/s'),
('LTS-TSB-003', 'Tct Saw Blades 14"X30T', 'LTCT1430', 'Accessories', 'Lotus', '1980', 20, 'Piece/s'),
('LTS-TSB-004', 'Tct Saw Blades 16"X30T', 'LTCT1630', 'Accessories', 'Lotus', '2675', 15, 'Piece/s'),
('LTS-TSB-005', 'Tct Saw Blades 18"X30T', 'LTCT1830', 'Accessories', 'Lotus', '3375', 15, 'Piece/s'),
('LTS-TSB-006', 'Tct Saw Blades 4"X40T', 'LWC100', 'Accessories', 'Lotus', '300', 50, 'Piece/s'),
('LTS-TSB-007', 'Tct Saw Blades 7"X40T', 'LTCT740', 'Accessories', 'Lotus', '500', 40, 'Piece/s'),
('LTS-TSB-008', 'Tct Saw Blades 10"X40T', 'LTCT1040', 'Accessories', 'Lotus', '1300', 20, 'Piece/s'),
('LTS-TSB-009', 'Tct Saw Blades 12"X40T', 'LTCT1240', 'Accessories', 'Lotus', '2000', 20, 'Piece/s'),
('LTS-TSB-010', 'Tct Saw Blades 14"X40T', 'LTCT1440', 'Accessories', 'Lotus', '2200', 20, 'Piece/s'),
('LTS-TSB-011', 'Tct Saw Blades 16"X40T', 'LTCT1640', 'Accessories', 'Lotus', '2895', 20, 'Piece/s'),
('LTS-TSB-012', 'Tct Saw Blades 18"X40T', 'LTCT1840', 'Accessories', 'Lotus', '3595', 25, 'Piece/s'),
('LTS-TSB-013', 'Tct Saw Blades 10"X100T', 'LTCT10100', 'Accessories', 'Lotus', '2200', 25, 'Piece/s'),
('LTS-WPP-001', 'Water Pump Plier 10"', 'LWPP250', 'Hand Tools', 'Lotus', '340', 10, 'Piece/s'),
('LTS-WPP-002', 'Water Pump Plier 12"', 'LWPP300', 'Hand Tools', 'Lotus', '395', 10, 'Piece/s');

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
  `prodID` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`returnID`, `returnDate`, `returnQty`, `status`, `returnRemark`, `prodID`) VALUES
(1, '2017-01-15', 1, 'In Storage', 'none', 'LTS-AD-001'),
(2, '2017-01-15', 1, 'In Storage', 'none', 'LTS-AW-002'),
(3, '2017-01-20', 1, 'Returned', 'none', 'LTS-BWE-001'),
(4, '2017-01-31', 2, 'Returned', 'none', 'LTS-AL-003'),
(5, '2017-02-02', 1, 'In Storage', 'none', 'LTS-AD-002'),
(11, '2017-03-07', 1, 'In Storage', 'none', 'LTS-AL-002');

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
  MODIFY `outID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `returnID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
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
  ADD CONSTRAINT `FKINSUP` FOREIGN KEY (`supID`) REFERENCES `suppliers` (`supID`);

--
-- Constraints for table `outgoing`
--
ALTER TABLE `outgoing`
  ADD CONSTRAINT `FKOUTBR` FOREIGN KEY (`branchID`) REFERENCES `branch` (`branchID`),
  ADD CONSTRAINT `FKOUTEMP` FOREIGN KEY (`empID`) REFERENCES `employee` (`empID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
