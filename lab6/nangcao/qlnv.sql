-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2021 at 04:31 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlnv`
--

-- --------------------------------------------------------

--
-- Table structure for table `loainv`
--

CREATE TABLE `loainv` (
  `MaLoai` varchar(5) NOT NULL,
  `TenLoai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `loainv`
--

INSERT INTO `loainv` (`MaLoai`, `TenLoai`) VALUES
('ML001', 'Hành chính'),
('ML002', 'Kiểm toán'),
('ML003', 'Sản xuất');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` varchar(5) NOT NULL,
  `Ho` varchar(30) NOT NULL,
  `Ten` varchar(30) NOT NULL,
  `NgaySinh` date NOT NULL,
  `GioiTinh` bit(1) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `Anh` varchar(100) NOT NULL,
  `MaLoai` varchar(5) NOT NULL,
  `MaPhong` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `Ho`, `Ten`, `NgaySinh`, `GioiTinh`, `DiaChi`, `Anh`, `MaLoai`, `MaPhong`) VALUES
('NV001', 'Nguyễn Thị', 'Diễn', '2000-08-08', b'1', '252-KB Cù Lao Thượng, Vĩnh Thọ, Nha Trang, Khánh Hòa', '1.jpg', 'ML001', 'P002'),
('NV002', 'Nguyễn Thị', 'Thanh Tuyền', '2000-05-02', b'1', 'Đoàn Trần Nghiệp, Vĩnh Phước, Nha Trang, Khánh Hòa', '2.jpg', 'ML002', 'P001'),
('NV003', 'Hồ', 'Văn An', '2000-05-25', b'0', 'Vĩnh Hải, Nha Trang, Khánh Hòa', '3.jpg', 'ML003', 'P003');

-- --------------------------------------------------------

--
-- Table structure for table `phongban`
--

CREATE TABLE `phongban` (
  `MaPhong` varchar(5) NOT NULL,
  `TenPhong` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `phongban`
--

INSERT INTO `phongban` (`MaPhong`, `TenPhong`) VALUES
('P001', 'Ban hành chính'),
('P002', 'Ban ngân sách'),
('P003', 'Ban sản xuất');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loainv`
--
ALTER TABLE `loainv`
  ADD PRIMARY KEY (`MaLoai`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD KEY `MaLoai` (`MaLoai`),
  ADD KEY `MaPhong` (`MaPhong`);

--
-- Indexes for table `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`MaPhong`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`MaLoai`) REFERENCES `loainv` (`MaLoai`),
  ADD CONSTRAINT `nhanvien_ibfk_2` FOREIGN KEY (`MaPhong`) REFERENCES `phongban` (`MaPhong`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
