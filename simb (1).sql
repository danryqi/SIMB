-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 19, 2024 at 07:52 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simb`
--

-- --------------------------------------------------------

--
-- Table structure for table `kejadian`
--

CREATE TABLE `kejadian` (
  `id` int NOT NULL,
  `jan` int NOT NULL DEFAULT '0',
  `feb` int NOT NULL DEFAULT '0',
  `mar` int NOT NULL DEFAULT '0',
  `apr` int NOT NULL DEFAULT '0',
  `mei` int NOT NULL DEFAULT '0',
  `jun` int NOT NULL DEFAULT '0',
  `jul` int NOT NULL DEFAULT '0',
  `agu` int NOT NULL DEFAULT '0',
  `sep` int NOT NULL DEFAULT '0',
  `okt` int NOT NULL DEFAULT '0',
  `nov` int NOT NULL DEFAULT '0',
  `des` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kejadian`
--

INSERT INTO `kejadian` (`id`, `jan`, `feb`, `mar`, `apr`, `mei`, `jun`, `jul`, `agu`, `sep`, `okt`, `nov`, `des`) VALUES
(1, 13, 20, 23, 12, 32, 12, 11, 35, 12, 15, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `korban`
--

CREATE TABLE `korban` (
  `bulan` varchar(10) NOT NULL,
  `meninggal` int NOT NULL DEFAULT '0',
  `selamat` int NOT NULL DEFAULT '0',
  `luka` int NOT NULL DEFAULT '0',
  `hilang` int NOT NULL DEFAULT '0',
  `total` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `korban`
--

INSERT INTO `korban` (`bulan`, `meninggal`, `selamat`, `luka`, `hilang`, `total`) VALUES
('Januari', 20, 12, 19, 11, 52),
('Februari', 0, 20, 6, 9, 35),
('Maret', 0, 0, 0, 0, 0),
('April', 10, 0, 0, 0, 10),
('Mei', 0, 0, 0, 0, 0),
('Juni', 0, 0, 0, 0, 0),
('Juli', 0, 0, 0, 0, 0),
('Agustus', 0, 0, 0, 0, 0),
('September', 0, 0, 0, 0, 0),
('Oktober', 0, 0, 0, 0, 0),
('November', 0, 0, 0, 0, 0),
('Desember', 0, 0, 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kejadian`
--
ALTER TABLE `kejadian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kejadian`
--
ALTER TABLE `kejadian`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
