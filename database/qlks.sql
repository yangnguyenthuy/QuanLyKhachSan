-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2023 at 09:08 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

CREATE qlks;
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
  `MaDV` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `LoaiDV` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TenDV` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `GiaDV` float NOT NULL,
  `MoTa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TrangThai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'Enable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dichvu`
--

INSERT INTO `dichvu` (`MaDV`, `LoaiDV`, `TenDV`, `GiaDV`, `MoTa`, `TrangThai`) VALUES
('DV001', 'Thư giãn', 'Spa', 500000, 'Thư giãn gân cốt', 'Enable'),
('DV002', 'Thư giãn', 'Xem kịch', 500000, 'Xem kịch giải trí', 'Disable');

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
  `SoPhong` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `LoaiPhong` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TenPhong` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TienIchPhong` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SoNguoiToiDa` int(11) NOT NULL,
  `GiaPhong` float NOT NULL,
  `TrangThai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'Empty',
  `DienTich` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Giuong` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MoTa1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `MoTa2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Hinh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phong`
--

INSERT INTO `phong` (`MaPhong`, `SoPhong`, `LoaiPhong`, `TenPhong`, `TienIchPhong`, `SoNguoiToiDa`, `GiaPhong`, `TrangThai`, `DienTich`, `Giuong`, `MoTa1`, `MoTa2`, `Hinh`) VALUES
(1, 'SP001', 'Standard', 'Phòng Standard', 'Có wifi, tivi, máy lạnh,...', 2, 400, 'Empty', '30 ft', 'King', '', '', 'room-1.jpg'),
(2, 'SP002', 'Standard', 'Phòng Standard', 'Có wifi, tivi, máy lạnh,...', 2, 400, 'Disable', '30 ft', 'King', 'Phòng tiện ích đầy đủ', '', 'room-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTK` int(255) NOT NULL,
  `MaNV` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TaiKhoan` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `TenNV` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `CMND` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SDT` varchar(255) NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `Role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TrangThai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'Enable'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`MaTK`, `MaNV`, `TaiKhoan`, `MatKhau`, `TenNV`, `CMND`, `SDT`, `Email`, `Role`, `TrangThai`) VALUES
(1, 'NV001', 'admin', 'admin', 'Yang Nguyên Thụy', '0987654321', '0987654321', 'nguyenthuy@gmail.com', 'Admin', 'Enable'),
(2, 'NV002', 'TestMem', '123456789', 'Test Member', '0123456789', '0987654321', 'test@gmail.com', 'Admin', 'Enable');

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
  MODIFY `MaPhong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTK` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdatdichvu`
--
ALTER TABLE `chitietdatdichvu`
  ADD CONSTRAINT `chitietdatdichvu_ibfk_1` FOREIGN KEY (`MaDP`) REFERENCES `datphong` (`MaDP`);

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
  ADD CONSTRAINT `phiphatsinh_ibfk_2` FOREIGN KEY (`MaDP`) REFERENCES `datphong` (`MaDP`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
