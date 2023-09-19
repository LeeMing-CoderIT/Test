-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 29, 2023 lúc 01:43 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ltmt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dssp`
--

CREATE TABLE `dssp` (
  `ID_SP` int(11) NOT NULL,
  `Name_SP` varchar(50) NOT NULL,
  `SLConLai` int(11) NOT NULL,
  `SLDaBan` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Image_SP` varchar(255) NOT NULL,
  `MoTa` text NOT NULL,
  `TysoGiamGia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dssp`
--

INSERT INTO `dssp` (`ID_SP`, `Name_SP`, `SLConLai`, `SLDaBan`, `Price`, `Image_SP`, `MoTa`, `TysoGiamGia`) VALUES
(1, 'Cam vàng', 1099, 201, 6, 'SP1.jpg', 'Rất tốt cho sức khỏe, giàu vitamin', 12),
(2, 'Việt quất', 1999, 301, 12, 'SP2.jpg', 'đồ ăn cao cấp nhiều vitamin\r\n', 15),
(3, 'Chuối không hạt', 1499, 101, 22, 'SP3.jpg', 'thơm ngon bổ dưỡng', 18),
(4, 'Táo đỏ', 4999, 1001, 14, 'SP4.jpg', 'tươi ngon hết chỗ chê', 20),
(5, 'Xoài Cát chín', 1199, 101, 25, 'SP5.jpg', 'ngọt thôi rồi quá tuyệt vời', 0),
(6, 'Dâu Tây(Mỹ)', 2999, 1201, 15, 'SP6.jpg', 'Nhập khẩu an toàn ngon tươi sạch', 0),
(10, 'Anh đào', 1999, 1, 8, 'SP8.jpg', 'Sản phẩm nhập khẩu từ nhật', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dstk`
--

CREATE TABLE `dstk` (
  `ID_TK` int(11) NOT NULL,
  `Name_TK` varchar(50) NOT NULL,
  `Password_TK` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dstk`
--

INSERT INTO `dstk` (`ID_TK`, `Name_TK`, `Password_TK`) VALUES
(4, 'admin', 'minhbn'),
(5, 'leminh123', 'minhbn'),
(6, 'ledat1', 'minhbn'),
(7, 'huynam', 'minhbn'),
(8, 'datle', 'minhbn'),
(9, 'minhbn', 'minhbn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsuser`
--

CREATE TABLE `dsuser` (
  `ID_User` int(11) NOT NULL,
  `Name_User` varchar(50) NOT NULL,
  `Sex` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Date` date NOT NULL,
  `PhoneNumber` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Avt` varchar(50) NOT NULL,
  `Wallet` double NOT NULL,
  `Chucvu` varchar(50) NOT NULL,
  `Name_TK` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `dsuser`
--

INSERT INTO `dsuser` (`ID_User`, `Name_User`, `Sex`, `Address`, `Date`, `PhoneNumber`, `Email`, `Avt`, `Wallet`, `Chucvu`, `Name_TK`) VALUES
(1, 'Lê Quí Minh', 'Nam', 'Hà Nội', '2003-06-25', '0977359210', 'cmnr@gmail.com', 'avt_leminh.jpg', 0, 'Admin', 'admin'),
(2, 'Nguyễn Nam', 'Nam', 'Hải Phòng', '2023-05-25', '0999999999', 'minhbndamchethuynam@gmail.com', '', 818, 'Khách hàng', 'leminh123'),
(3, 'Lê Văn Đạt', 'Nam', 'Hà Nội', '2010-06-28', '0147852369', 'levandat@gmail.com', '', 0, 'Khách hàng', 'ledat1'),
(4, 'Nguyễn Huy Nam', 'Nam', 'Bắc Ninh', '2023-05-10', '0235689741', 'minhbndamchethuynam@gmail.com', '', 0, 'Khách hàng', 'huynam');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `ID` int(11) NOT NULL,
  `ID_SP` int(11) NOT NULL,
  `SL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`ID`, `ID_SP`, `SL`) VALUES
(35, 5, 3),
(36, 2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `ID` int(11) NOT NULL,
  `Name_TK` varchar(50) NOT NULL,
  `CacSP` varchar(255) NOT NULL,
  `TongTien` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`ID`, `Name_TK`, `CacSP`, `TongTien`) VALUES
(1, 'leminh123', 'Chuối không hạt-4,Cam vàng-2,Dâu Tây(Mỹ)-1', 115),
(2, 'leminh123', 'Chuối không hạt-4,Cam vàng-2,Dâu Tây(Mỹ)-1', 115),
(3, 'leminh123', 'Xoài Cát chín-1,Dâu Tây(Mỹ)-2', 55),
(6, 'leminh123', 'Việt quất-4,Chuối không hạt-2', 77),
(7, 'leminh123', 'Xoài Cát chín-1,Chuối không hạt-1', 43.04);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luutien`
--

CREATE TABLE `luutien` (
  `name` varchar(50) NOT NULL,
  `sotien` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `luutien`
--

INSERT INTO `luutien` (`name`, `sotien`) VALUES
('admin', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ni_contact`
--

CREATE TABLE `ni_contact` (
  `ID` int(11) NOT NULL,
  `Fullname` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(50) NOT NULL,
  `Mess` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ni_contact`
--

INSERT INTO `ni_contact` (`ID`, `Fullname`, `Email`, `Phone`, `Mess`) VALUES
(2, 'Lê Quí Minh', 'minhbn123@gmail.com', '0977359210', 'Yêu cầu viết đơn thôi việc cho bạn Đức Anh'),
(3, 'Lê Quí Minh', 'minhbndamchethuynam@gmail.com', '0977359210', 'Đuổi việc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `yeucaunaptien`
--

CREATE TABLE `yeucaunaptien` (
  `ID` int(11) NOT NULL,
  `Name_TK` varchar(50) NOT NULL,
  `STK` varchar(50) NOT NULL,
  `SoTien` int(50) NOT NULL,
  `TB` int(1) NOT NULL,
  `Xacnhan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `yeucaunaptien`
--

INSERT INTO `yeucaunaptien` (`ID`, `Name_TK`, `STK`, `SoTien`, `TB`, `Xacnhan`) VALUES
(1, 'admin', '123456789', 0, 0, 'đã'),
(2, 'leminh123', '00225544876', 0, 0, 'đã'),
(3, 'admin', '123123', 0, 0, 'đã'),
(4, 'admin', '123123', 0, 0, 'đã'),
(5, 'leminh123', '11111111', 0, 0, 'đã'),
(6, 'admin', '147856', 0, 0, 'đã'),
(7, 'admin', '147865254785', 0, 0, 'đã'),
(8, 'admin', '542', 0, 1, 'chưa'),
(9, 'leminh123', '11111111', 2000, 1, 'chưa');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dssp`
--
ALTER TABLE `dssp`
  ADD PRIMARY KEY (`ID_SP`);

--
-- Chỉ mục cho bảng `dstk`
--
ALTER TABLE `dstk`
  ADD PRIMARY KEY (`ID_TK`);

--
-- Chỉ mục cho bảng `dsuser`
--
ALTER TABLE `dsuser`
  ADD PRIMARY KEY (`ID_User`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `ni_contact`
--
ALTER TABLE `ni_contact`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `yeucaunaptien`
--
ALTER TABLE `yeucaunaptien`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dssp`
--
ALTER TABLE `dssp`
  MODIFY `ID_SP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `dstk`
--
ALTER TABLE `dstk`
  MODIFY `ID_TK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `dsuser`
--
ALTER TABLE `dsuser`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `ni_contact`
--
ALTER TABLE `ni_contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `yeucaunaptien`
--
ALTER TABLE `yeucaunaptien`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
