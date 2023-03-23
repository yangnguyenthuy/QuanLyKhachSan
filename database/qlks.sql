-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 07:36 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

create Database qlks;
use qlks;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlks`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdatdichvu`
--

CREATE TABLE `chitietdatdichvu` (
  `MaCTDDV` int(11) NOT NULL,
  `MaDV` int(11) NOT NULL,
  `MaDP` int(11) NOT NULL,
  `TrangThai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chitietdatphong`
--

CREATE TABLE `chitietdatphong` (
  `MaCTDP` int(11) NOT NULL,
  `TenKhach` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `CMND` varchar(255) NOT NULL,
  `MaDP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `datphong`
--

CREATE TABLE `datphong` (
  `MaDP` int(11) NOT NULL,
  `Phong` varchar(255) NOT NULL,
  `NgayDat` varchar(255) NOT NULL,
  `NgayNhanPhong` varchar(255) NOT NULL,
  `NgayTraPhong` varchar(255) NOT NULL,
  `TrangThai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dichvu`
--

CREATE TABLE `dichvu` (
  `MaDV` int(11) NOT NULL,
  `TenDV` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `GiaDV` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `MaHD` int(11) NOT NULL,
  `NgayLap` varchar(255) NOT NULL,
  `TongTriGia` float NOT NULL,
  `TrangThai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MaDP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phiphatsinh`
--

CREATE TABLE `phiphatsinh` (
  `MaPPS` int(11) NOT NULL,
  `MaDV` int(11) NOT NULL,
  `MaDP` int(11) NOT NULL,
  `NgayPhatSinh` varchar(255) NOT NULL,
  `TrangThai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phong`
--

CREATE TABLE `phong` (
  `MaPhong` int(11) NOT NULL,
  `SoPhong` int(11) NOT NULL,
  `Tang` int(11) NOT NULL,
  `LoaiPhong` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `GiaPhong` float NOT NULL,
  `TrangThai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTK` int(11) NOT NULL,
  `TaiKhoan` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `TenNV` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `DiaChi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Email` varchar(255) NOT NULL,
  `SDT` varchar(255) NOT NULL,
  `Role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TrangThai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdatdichvu`
--
ALTER TABLE `chitietdatdichvu`
  ADD PRIMARY KEY (`MaCTDDV`),
  ADD KEY `MaDP` (`MaDP`),
  ADD KEY `MaDV` (`MaDV`);

--
-- Indexes for table `chitietdatphong`
--
ALTER TABLE `chitietdatphong`
  ADD PRIMARY KEY (`MaCTDP`),
  ADD KEY `MaDP` (`MaDP`);

--
-- Indexes for table `datphong`
--
ALTER TABLE `datphong`
  ADD PRIMARY KEY (`MaDP`);

--
-- Indexes for table `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`MaDV`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`MaHD`),
  ADD KEY `MaDP` (`MaDP`);

--
-- Indexes for table `phiphatsinh`
--
ALTER TABLE `phiphatsinh`
  ADD PRIMARY KEY (`MaPPS`),
  ADD KEY `MaDV` (`MaDV`),
  ADD KEY `MaDP` (`MaDP`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`MaPhong`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietdatdichvu`
--
ALTER TABLE `chitietdatdichvu`
  MODIFY `MaCTDDV` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chitietdatphong`
--
ALTER TABLE `chitietdatphong`
  MODIFY `MaCTDP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `datphong`
--
ALTER TABLE `datphong`
  MODIFY `MaDP` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dichvu`
--
ALTER TABLE `dichvu`
  MODIFY `MaDV` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phiphatsinh`
--
ALTER TABLE `phiphatsinh`
  MODIFY `MaPPS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phong`
--
ALTER TABLE `phong`
  MODIFY `MaPhong` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTK` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdatdichvu`
--
ALTER TABLE `chitietdatdichvu`
  ADD CONSTRAINT `chitietdatdichvu_ibfk_1` FOREIGN KEY (`MaDP`) REFERENCES `datphong` (`MaDP`),
  ADD CONSTRAINT `chitietdatdichvu_ibfk_2` FOREIGN KEY (`MaDV`) REFERENCES `dichvu` (`MaDV`);

--
-- Constraints for table `chitietdatphong`
--
ALTER TABLE `chitietdatphong`
  ADD CONSTRAINT `chitietdatphong_ibfk_1` FOREIGN KEY (`MaDP`) REFERENCES `datphong` (`MaDP`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MaDP`) REFERENCES `datphong` (`MaDP`);

--
-- Constraints for table `phiphatsinh`
--
ALTER TABLE `phiphatsinh`
  ADD CONSTRAINT `phiphatsinh_ibfk_1` FOREIGN KEY (`MaDV`) REFERENCES `dichvu` (`MaDV`),
  ADD CONSTRAINT `phiphatsinh_ibfk_2` FOREIGN KEY (`MaDP`) REFERENCES `datphong` (`MaDP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
