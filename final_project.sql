-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2021 lúc 11:31 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'ADIDAS'),
(4, 'BITIS'),
(3, 'CONVERSE'),
(11, 'Dior'),
(6, 'MLD'),
(2, 'NIKE'),
(5, 'VANS');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `comm_id` int(11) NOT NULL,
  `prd_id` int(11) NOT NULL,
  `comm_name` varchar(255) NOT NULL,
  `comm_mail` varchar(255) NOT NULL,
  `comm_date` datetime NOT NULL,
  `comm_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`comm_id`, `prd_id`, `comm_name`, `comm_mail`, `comm_date`, `comm_details`) VALUES
(32, 28, 'quan', 'quann285@gmail.com', '2021-11-29 16:02:26', ' wow'),
(33, 28, 'quan', 'quann285@gmail.com', '2021-11-29 16:03:59', ' wow');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `prd_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `prd_name` varchar(255) NOT NULL,
  `prd_image` varchar(255) NOT NULL,
  `prd_price` int(11) UNSIGNED NOT NULL,
  `prd_warranty` varchar(255) NOT NULL,
  `prd_accessories` varchar(255) NOT NULL,
  `prd_new` varchar(255) NOT NULL,
  `prd_promotion` varchar(255) NOT NULL,
  `prd_status` int(1) NOT NULL,
  `prd_featured` int(1) NOT NULL,
  `prd_details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`prd_id`, `cat_id`, `prd_name`, `prd_image`, `prd_price`, `prd_warranty`, `prd_accessories`, `prd_new`, `prd_promotion`, `prd_status`, `prd_featured`, `prd_details`) VALUES
(1, 1, 'Adidas EQT-size 42', 'Adidas-EQT-den-xanh.png', 950000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 0, 'no'),
(2, 1, 'Adidas Prophere-size 41', 'Adidas-Prophere-den-cam.png', 1300000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 1, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(3, 1, 'Adidas Prophere Triple-size 42', 'Adidas-Prophere-Triple-den.png', 1500000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 0, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(4, 1, 'Adidas UltraBoost 20-size 43', 'Adidas-Ultra-Boost-20-xam.png', 2000000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(5, 1, 'Adidas Alphabounce Beyond-size 42', 'Alphabounce-Beyond-Full-Den.png', 2200000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(6, 1, 'Adidas Falcon Triple White-size 42', 'Falcon-Triple-White-trang.png', 3000000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 1, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(7, 2, 'Nike AIR FORCE 1 -size 40', 'AIR-FORCE-1-trang-xanh.png', 1500000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 1, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(8, 2, 'Nike Air Jordan 1-size 41', 'Air-Jordan-1.png', 5000000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(9, 2, 'Nike Air Jordan 1-size 40', 'Air-Jordan-1-xam.png', 3000000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(10, 2, 'Nike Air Jordan 4-size 42', 'Air-Jordan-4.png', 2000000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 0, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(11, 2, 'Nike Air Max 270-size 39', 'Air-Max-270.png', 2000000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 1, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(12, 2, 'Nike Jordan 1-size 41', 'Jordan-1.png', 8000000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(13, 3, 'Converse Chuck 70-size 41', 'Converse-Chuck-70-den.png', 2000000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(14, 3, 'Converse Chuck Taylor-size 42', 'Converse-Chuck-Taylor-tim.png', 1900000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(15, 3, 'Converse-size 39', 'Converse-trang-kem.png', 10000000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 0, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(16, 3, 'Converse Chuck70 flower-size 41', 'CV-Chuck-70-hoa.png', 2000000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 1, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(17, 3, 'Converse Chuck 70-size 40', 'CV-Chuck-70-vang.png', 1800000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(18, 3, 'Converse Chuck Taylor- size 40', 'CV-Chuck-Taylor-trang.png', 1900000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(19, 4, 'Bitis Hunter x1-size 39', 'Hunter-cam.png', 1200000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(20, 4, 'Bitis Hunter x2-size 42', 'Hunter-den.png', 1200000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 0, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(21, 4, 'Bitis Hunter x3-size 42', 'Hunter-den-cam.png', 1300000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(22, 4, 'Bitis Hunter x4-size 43', 'Hunter-den-trang.png', 1300000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(23, 4, 'Bitis Hunter x5-size 42', 'Hunter-xanh-cam.png', 1500000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(24, 4, 'Bitis Hunter x6-size 40', 'Hunter-trang.png', 1200000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(25, 8, 'Vans Old School-size 40', 'Van-trang.png', 1000000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 0, 1, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(26, 5, 'Vans Old School-size 42', 'Old-School-den.png', 1100000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 1, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(27, 5, 'Vans Classic Slip On-size 41', 'Vans-Classic-Slip-On-den.png', 1200000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(28, 5, 'Vans Slip On caro-size 40', 'Vans-Slip-On-caro.png', 1000000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(29, 5, 'Vans Old School-size 42', 'van-vang.png', 1200000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(30, 5, 'Vans Old School caro-size 40', 'Old-School-caro.png', 1000000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 0, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(31, 6, 'MLB boston-size 40', 'Mlb-boston.png', 1400000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(32, 6, 'MLB LA-size 42', 'MLB-LA.png', 1400000, '1 week', 'Box, shoelaces, keychain', 'Sneaker new 100%', 'shoe cleaning', 1, 0, 'We are updating this product with detailed content, you can go directly to the store to see the product because our products are always available.'),
(34, 6, 'MLB x6', 'Mlb-boston.png', 1200000, '1 week', 'Box', '100%', 'cleaning', 1, 0, 'no');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_full` varchar(255) NOT NULL,
  `user_mail` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_full`, `user_mail`, `user_pass`, `user_level`) VALUES
(1, 'Admin', 'admin@gmail.com', '123456', 1),
(2, 'Quan', 'quan@gmail.com', '123456', 2),
(7, 'dan', 'dan@gmail.com', '123456', 2),
(8, 'thao', 'thao@gmail.com', '123456', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comm_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prd_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_mail` (`user_mail`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `prd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
