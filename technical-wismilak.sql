-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2025 at 03:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `technical-wismilak`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` varchar(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `deleted_at`) VALUES
('B01', 'Evo', NULL),
('B02', 'Diplomat', NULL),
('B03', 'Galan', NULL),
('B04', 'Wismilak Kretek', NULL),
('B05', 'abcd', NULL),
('B07', 'aa', NULL),
('B08', 'aaa', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` varchar(3) NOT NULL,
  `name` varchar(10) NOT NULL,
  `address` text NOT NULL,
  `rayon_id` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `address`, `rayon_id`) VALUES
('C01', 'Ani', 'Jl Bluru Kidul No.5', 'R01'),
('C02', 'Budi', 'Jl Asem No. 2', 'R02'),
('C03', 'Charlie', 'Jl Kartini No. 3', 'R03'),
('C04', 'Dani', 'Jl Batu Pualam No. 7', 'R04'),
('C05', 'abcd', 'aaa', 'R01'),
('C06', 'Itin', 'aa', 'R01');

-- --------------------------------------------------------

--
-- Table structure for table `custtime`
--

CREATE TABLE `custtime` (
  `Month` varchar(2) DEFAULT NULL,
  `Quarter` int(11) DEFAULT NULL,
  `Year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `custtime`
--

INSERT INTO `custtime` (`Month`, `Quarter`, `Year`) VALUES
('01', 1, 2024),
('02', 1, 2024),
('03', 1, 2024),
('04', 2, 2024);

-- --------------------------------------------------------

--
-- Table structure for table `rayon`
--

CREATE TABLE `rayon` (
  `id` varchar(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sales_area` varchar(50) NOT NULL,
  `regional` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rayon`
--

INSERT INTO `rayon` (`id`, `name`, `sales_area`, `regional`) VALUES
('R01', 'Sidoarjo', 'Area Surabaya', 'RE4'),
('R02', 'Bantul', 'Area Jogja', 'RE3'),
('R03', 'Sukabumi', 'Area Bandung', 'RE2'),
('R04', 'Martapura', 'Area Banjarbaru', 'RE5');

-- --------------------------------------------------------

--
-- Table structure for table `salesman`
--

CREATE TABLE `salesman` (
  `id` varchar(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tipe` enum('Grosir','Retail') NOT NULL,
  `rayon_id` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesman`
--

INSERT INTO `salesman` (`id`, `name`, `tipe`, `rayon_id`) VALUES
('S01', 'Fariz', 'Grosir', 'R01'),
('S02', 'Fathir', 'Grosir', 'R01'),
('S03', 'Afir', 'Retail', 'R03'),
('S04', 'Selena', 'Retail', 'R04'),
('S05', 'abcd', 'Grosir', 'R02');

-- --------------------------------------------------------

--
-- Table structure for table `salesorder`
--

CREATE TABLE `salesorder` (
  `id` varchar(3) NOT NULL,
  `date` date NOT NULL,
  `tipe` enum('Cash','Kredit') NOT NULL,
  `brand_id` varchar(3) NOT NULL,
  `customer_id` varchar(3) NOT NULL,
  `rayon_id` varchar(3) NOT NULL,
  `salesman_id` varchar(3) NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_qty` enum('pack') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesorder`
--

INSERT INTO `salesorder` (`id`, `date`, `tipe`, `brand_id`, `customer_id`, `rayon_id`, `salesman_id`, `quantity`, `unit_qty`) VALUES
('001', '2024-01-05', 'Cash', 'B01', 'C01', 'R01', 'S01', 10, 'pack'),
('002', '2024-01-09', 'Cash', 'B01', 'C01', 'R01', 'S01', 3, 'pack'),
('003', '2024-01-20', 'Kredit', 'B01', 'C02', 'R02', 'S02', 5, 'pack'),
('004', '2024-01-07', 'Cash', 'B01', 'C01', 'R01', 'S01', 8, 'pack'),
('005', '2024-01-25', 'Kredit', 'B02', 'C04', 'R04', 'S04', 15, 'pack'),
('006', '2024-02-05', 'Cash', 'B03', 'C01', 'R01', 'S01', 40, 'pack'),
('007', '2024-02-09', 'Cash', 'B01', 'C01', 'R01', 'S01', 30, 'pack'),
('008', '2024-02-20', 'Kredit', 'B02', 'C02', 'R02', 'S02', 50, 'pack'),
('009', '2024-02-07', 'Cash', 'B01', 'C03', 'R03', 'S03', 28, 'pack'),
('010', '2024-02-25', 'Kredit', 'B02', 'C04', 'R04', 'S04', 35, 'pack'),
('011', '2024-03-05', 'Cash', 'B03', 'C01', 'R01', 'S01', 20, 'pack'),
('012', '2024-03-09', 'Cash', 'B01', 'C01', 'R01', 'S01', 30, 'pack'),
('013', '2024-03-20', 'Kredit', 'B02', 'C02', 'R02', 'S02', 15, 'pack'),
('014', '2024-03-07', 'Cash', 'B01', 'C03', 'R03', 'S03', 18, 'pack'),
('015', '2024-03-25', 'Kredit', 'B02', 'C04', 'R04', 'S04', 25, 'pack'),
('016', '2024-04-05', 'Cash', 'B01', 'C01', 'R01', 'S01', 26, 'pack'),
('017', '2024-04-09', 'Cash', 'B01', 'C01', 'R01', 'S01', 33, 'pack'),
('018', '2024-04-20', 'Kredit', 'B04', 'C02', 'R02', 'S02', 45, 'pack'),
('019', '2024-04-07', 'Cash', 'B03', 'C03', 'R03', 'S03', 28, 'pack'),
('020', '2024-04-25', 'Kredit', 'B02', 'C04', 'R04', 'S04', 35, 'pack'),
('021', '2024-05-05', 'Kredit', 'B04', 'C01', 'R01', 'S01', 46, 'pack'),
('022', '2024-05-09', 'Cash', 'B01', 'C01', 'R01', 'S01', 53, 'pack'),
('023', '2024-05-20', 'Kredit', 'B03', 'C02', 'R02', 'S02', 75, 'pack'),
('024', '2024-05-07', 'Kredit', 'B03', 'C03', 'R03', 'S03', 68, 'pack'),
('025', '2024-05-25', 'Cash', 'B01', 'C04', 'R04', 'S04', 75, 'pack'),
('026', '2024-06-05', 'Cash', 'B04', 'C01', 'R01', 'S01', 21, 'pack'),
('027', '2024-06-09', 'Cash', 'B01', 'C01', 'R01', 'S01', 36, 'pack'),
('028', '2024-06-20', 'Cash', 'B03', 'C02', 'R02', 'S02', 26, 'pack'),
('029', '2024-06-07', 'Cash', 'B03', 'C03', 'R03', 'S03', 24, 'pack'),
('030', '2024-06-25', 'Cash', 'B01', 'C04', 'R04', 'S04', 22, 'pack'),
('031', '2024-07-05', 'Cash', 'B01', 'C01', 'R01', 'S01', 20, 'pack'),
('032', '2024-07-09', 'Cash', 'B04', 'C01', 'R01', 'S01', 30, 'pack'),
('033', '2024-07-20', 'Kredit', 'B01', 'C02', 'R02', 'S02', 15, 'pack'),
('034', '2024-07-07', 'Cash', 'B03', 'C03', 'R03', 'S03', 18, 'pack'),
('035', '2024-07-25', 'Kredit', 'B02', 'C04', 'R04', 'S04', 25, 'pack'),
('036', '2024-08-05', 'Cash', 'B03', 'C01', 'R01', 'S01', 26, 'pack'),
('037', '2024-08-09', 'Cash', 'B01', 'C01', 'R01', 'S01', 33, 'pack'),
('038', '2024-08-20', 'Kredit', 'B02', 'C02', 'R02', 'S02', 45, 'pack'),
('039', '2024-08-07', 'Cash', 'B03', 'C03', 'R03', 'S03', 28, 'pack'),
('040', '2024-08-25', 'Kredit', 'B02', 'C04', 'R04', 'S04', 35, 'pack'),
('041', '2024-09-05', 'Kredit', 'B01', 'C01', 'R01', 'S01', 46, 'pack'),
('042', '2024-09-09', 'Cash', 'B01', 'C01', 'R01', 'S01', 53, 'pack'),
('043', '2024-09-20', 'Kredit', 'B02', 'C02', 'R02', 'S02', 75, 'pack'),
('044', '2024-09-07', 'Kredit', 'B03', 'C03', 'R03', 'S03', 68, 'pack'),
('045', '2024-09-25', 'Cash', 'B01', 'C04', 'R04', 'S04', 75, 'pack'),
('046', '2024-10-05', 'Cash', 'B02', 'C01', 'R01', 'S01', 21, 'pack'),
('047', '2024-10-09', 'Cash', 'B04', 'C01', 'R01', 'S01', 36, 'pack'),
('048', '2024-10-20', 'Cash', 'B03', 'C02', 'R02', 'S02', 26, 'pack'),
('049', '2024-10-07', 'Cash', 'B01', 'C03', 'R03', 'S03', 24, 'pack'),
('050', '2024-10-25', 'Cash', 'B01', 'C04', 'R04', 'S04', 22, 'pack'),
('051', '2025-06-03', 'Cash', 'B01', 'C05', 'R01', 'S01', 4, 'pack'),
('052', '2025-06-03', 'Kredit', 'B07', 'C05', 'R02', 'S05', 4, 'pack');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_rayon` (`rayon_id`);

--
-- Indexes for table `rayon`
--
ALTER TABLE `rayon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salesman`
--
ALTER TABLE `salesman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_salesman_rayon` (`rayon_id`);

--
-- Indexes for table `salesorder`
--
ALTER TABLE `salesorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer_id` (`customer_id`),
  ADD KEY `fk_rayon_id` (`rayon_id`),
  ADD KEY `fk_salesman_id` (`salesman_id`),
  ADD KEY `fk_brand_id` (`brand_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_customer_rayon` FOREIGN KEY (`rayon_id`) REFERENCES `rayon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salesman`
--
ALTER TABLE `salesman`
  ADD CONSTRAINT `fk_salesman_rayon` FOREIGN KEY (`rayon_id`) REFERENCES `rayon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `salesorder`
--
ALTER TABLE `salesorder`
  ADD CONSTRAINT `fk_brand_id` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_customer_id` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rayon_id` FOREIGN KEY (`rayon_id`) REFERENCES `rayon` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_salesman_id` FOREIGN KEY (`salesman_id`) REFERENCES `salesman` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
