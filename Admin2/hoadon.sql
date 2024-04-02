-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 20, 2024 lúc 04:28 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doancuoiki2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `masohd` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaydat` date NOT NULL,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`masohd`, `makh`, `ngaydat`, `tongtien`) VALUES
(106, 12, '2024-02-19', 2500000),
(107, 12, '2024-02-19', 2000000),
(108, 12, '2024-02-19', 450000),
(109, 11, '2024-02-20', 2500000),
(110, 11, '2024-02-20', 3000000),
(111, 11, '2024-02-20', 2000000),
(112, 11, '2024-02-20', 4500000),
(113, 11, '2024-02-21', 2500000),
(114, 11, '2024-02-21', 2000000),
(115, 11, '2024-02-21', 4500000),
(116, 11, '2024-02-21', 6000000),
(117, 11, '2024-02-21', 6000000),
(118, 11, '2024-02-21', 6000000),
(119, 11, '2024-02-21', 4500000),
(120, 11, '2024-02-21', 2000000),
(121, 11, '2024-02-21', 2600000),
(122, 11, '2024-02-21', 2500000),
(123, 11, '2024-02-21', 2000000),
(124, 11, '2024-02-21', 500000),
(125, 11, '2024-02-21', 6000000),
(126, 12, '2024-02-23', 6000000),
(127, 11, '2024-02-24', 500000),
(128, 12, '2024-02-28', 2000000),
(129, 12, '2024-02-28', 2000000),
(130, 13, '2024-02-29', 8000000),
(131, 13, '2024-03-01', 3000002),
(132, 13, '2024-03-01', 2000000),
(133, 13, '2024-03-01', 500000),
(134, 13, '2024-03-01', 500000),
(135, 13, '2024-03-01', 2000000),
(136, 13, '2024-03-01', 2000000),
(137, 13, '2024-03-01', 2000000),
(138, 13, '2024-03-01', 4000000),
(139, 13, '2024-03-01', 4000000),
(140, 13, '2024-03-01', 6000000),
(141, 13, '2024-03-01', 2000000),
(142, 13, '2024-03-01', 2000000),
(143, 13, '2024-03-01', 4000000),
(144, 13, '2024-03-13', 1950000),
(145, 13, '2024-03-13', 1000000),
(146, 13, '2024-03-14', 950000),
(147, 13, '2024-03-14', 650000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`masohd`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `masohd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
