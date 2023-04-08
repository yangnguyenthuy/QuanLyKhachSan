-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1

-- Generation Time: Apr 07, 2023 at 12:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

CREATE Database qlks;
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

-- Table structure for table `checkin`
--

CREATE TABLE `checkin` (
  `MaCheckIn` int(11) NOT NULL,
  `HoTenKH` varchar(255) NOT NULL,
  `SDT` varchar(255) NOT NULL,
  `NgayCheckIn` varchar(255) NOT NULL,
  `NgayCheckOut` varchar(255) NOT NULL,
  `MaPhong` int(11) NOT NULL,
  `MaHD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `checkin`
--

INSERT INTO `checkin` (`MaCheckIn`, `HoTenKH`, `SDT`, `NgayCheckIn`, `NgayCheckOut`, `MaPhong`, `MaHD`) VALUES
(1, 'Phạm Hữu Trí', '0987654321', '4/7/2023', '', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `datdichvu`
--

CREATE TABLE `datdichvu` (
  `MaDatDV` int(11) NOT NULL,
  `MaHD` int(11) NOT NULL,
  `MaDV` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datdichvu`
--

INSERT INTO `datdichvu` (`MaDatDV`, `MaHD`, `MaDV`) VALUES
(7, 1, 'DV001'),
(8, 1, 'DV002');
-- --------------------------------------------------------

--
-- Table structure for table `datphong`
--

CREATE TABLE `datphong` (
  `MaDP` int(11) NOT NULL,
  `HoTen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `CMND` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `SDT` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `NgayNhanPhong` varchar(255) NOT NULL,
  `NgayTraPhong` varchar(255) NOT NULL,
  `TrangThai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'Wait',
  `MaPhong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datphong`
--

INSERT INTO `datphong` (`MaDP`, `HoTen`, `CMND`, `SDT`, `NgayNhanPhong`, `NgayTraPhong`, `TrangThai`, `MaPhong`) VALUES
(1, 'Yang Nguyên Thụy', '090987654321', '0987654321', '2/4/2023', '10/4/2023', 'Confirm', 1),
(2, 'Phạm Hữu Trí', '0987654321', '0987654321', '2023-04-04', '2023-04-18', 'Confirm', 2),
(4, 'Phạm Hữu Trí', '0123456789', '0987654321', '2023-04-18', '2023-04-25', 'Cancel', 3);
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
  `SoHD` varchar(255) NOT NULL,
  `NgayLap` varchar(255) NOT NULL,
  `TongTriGia` float NOT NULL DEFAULT 0,
  `TrangThai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL DEFAULT 'Chờ thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHD`, `SoHD`, `NgayLap`, `TongTriGia`, `TrangThai`) VALUES
(1, 'HD1', '4/7/2023', 1400000, 'Chờ thanh toán');

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
(1, 'SP001', 'Standard', 'Phòng Standard', 'Có wifi, tivi, máy lạnh,...', 2, 400000, 'Occupied', '30 ft', 'King', '', '', 'room-1.jpg'),
(2, 'SP002', 'Standard', 'Phòng Standard', 'Có wifi, tivi, máy lạnh,...', 2, 400000, 'Occupied', '30 ft', 'King', 'Phòng tiện ích đầy đủ', '', 'room-2.jpg'),
(3, 'SP003', 'Standard', 'Phòng Standard', 'Có wifi, tivi, máy lạnh,...', 2, 400000, 'Empty', '30 ft', 'King', 'Phòng tiện ích đầy đủ', '', 'room-3.jpg'),
(4, 'SP004', 'Standard', 'Phòng Standard', 'Có wifi, tivi, máy lạnh,...', 2, 400000, 'Empty', '30 ft', 'King', 'Phòng tiện ích đầy đủ', '', 'room-4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `quyen`
--

CREATE TABLE `quyen` (
  `MaQuyen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `TenQuyen` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quyen`
--

INSERT INTO `quyen` (`MaQuyen`, `TenQuyen`) VALUES
('AD001', 'Admin'),
('KD001', 'Phòng Kinh Doanh');

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

-- Indexes for table `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`MaCheckIn`),
  ADD KEY `MaPhong` (`MaPhong`);

--
-- Indexes for table `datdichvu`
--
ALTER TABLE `datdichvu`
  ADD PRIMARY KEY (`MaDatDV`),
  ADD KEY `MaHD` (`MaHD`),
  ADD KEY `MaDV` (`MaDV`);


--
-- Indexes for table `datphong`
--
ALTER TABLE `datphong`

  ADD PRIMARY KEY (`MaDP`),
  ADD KEY `MaPhong` (`MaPhong`);


--
-- Indexes for table `dichvu`
--
ALTER TABLE `dichvu`
  ADD PRIMARY KEY (`MaDV`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`

  ADD PRIMARY KEY (`MaHD`);

--
-- Indexes for table `phong`
--
ALTER TABLE `phong`
  ADD PRIMARY KEY (`MaPhong`);

--
-- Indexes for table `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`MaQuyen`);


--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTK`);

--
-- AUTO_INCREMENT for dumped tables
--

--

-- AUTO_INCREMENT for table `checkin`
--
ALTER TABLE `checkin`
  MODIFY `MaCheckIn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `datdichvu`
--
ALTER TABLE `datdichvu`
  MODIFY `MaDatDV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;


--
-- AUTO_INCREMENT for table `datphong`
--
ALTER TABLE `datphong`
  MODIFY `MaDP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `MaHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `phong`
--
ALTER TABLE `phong`
  MODIFY `MaPhong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTK` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--

-- Constraints for table `checkin`
--
ALTER TABLE `checkin`
  ADD CONSTRAINT `checkin_ibfk_1` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`);

--
-- Constraints for table `datdichvu`
--
ALTER TABLE `datdichvu`
  ADD CONSTRAINT `datdichvu_ibfk_1` FOREIGN KEY (`MaHD`) REFERENCES `hoadon` (`MaHD`),
  ADD CONSTRAINT `datdichvu_ibfk_2` FOREIGN KEY (`MaDV`) REFERENCES `dichvu` (`MaDV`);

--
-- Constraints for table `datphong`
--
ALTER TABLE `datphong`
  ADD CONSTRAINT `datphong_ibfk_1` FOREIGN KEY (`MaPhong`) REFERENCES `phong` (`MaPhong`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
