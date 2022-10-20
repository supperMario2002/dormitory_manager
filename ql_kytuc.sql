-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2022 lúc 06:22 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_kytuc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `f_electric` smallint(6) NOT NULL,
  `l_electric` smallint(6) NOT NULL,
  `price_electric` double NOT NULL,
  `f_water` smallint(6) NOT NULL,
  `l_water` smallint(6) NOT NULL,
  `price_water` double NOT NULL,
  `date_founded` date NOT NULL,
  `status` tinyint(2) NOT NULL,
  `describes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `describes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'người quản lý',
  `student_num` tinyint(2) NOT NULL,
  `status` tinyint(2) DEFAULT NULL,
  `describes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `cccd` varchar(25) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sex` tinyint(2) NOT NULL COMMENT '0:nam 1:nu',
  `date_birth` date NOT NULL,
  `adddress` text NOT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `class` varchar(20) NOT NULL,
  `faculty` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sex` tinyint(2) DEFAULT NULL COMMENT '0:nam 1:nu',
  `date_birth` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(250) NOT NULL,
  `phone` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bill_room` (`room_id`),
  ADD KEY `fk_bill_user` (`user_id`);

--
-- Chỉ mục cho bảng `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_s` (`room_id`),
  ADD KEY `fk_sa` (`user_id`),
  ADD KEY `fk_saa` (`student_id`);

--
-- Chỉ mục cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_room_user` (`user_id`);

--
-- Chỉ mục cho bảng `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `fk_bill_room` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bill_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `fk_s` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sa` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_saa` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `fk_room_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
