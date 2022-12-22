-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2022 at 05:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ql_kytuc`
--

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` int(11) NOT NULL,
  `student_id` varchar(250) NOT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date DEFAULT NULL,
  `method_payment` tinyint(2) DEFAULT NULL COMMENT '0: tiền mặt\r\n1: chuyển khoản',
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0: Chưa Thanh toán\r\n1: Đã thanh toán',
  `liquidation` date DEFAULT NULL COMMENT 'null là chưa thanh lý'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`id`, `student_id`, `room_id`, `user_id`, `date_start`, `date_end`, `method_payment`, `status`, `liquidation`) VALUES
(3, '201112', 5, 40, '2022-11-27', '2022-11-27', 0, 1, '2022-12-22'),
(4, '201113', 5, 40, '2022-11-27', '2022-11-27', 0, 1, '2022-12-22'),
(5, '201114', 5, 40, '2022-11-27', '2022-11-27', 0, 0, NULL),
(6, '201115', 5, 40, '2022-11-27', '2022-11-27', 0, 0, NULL),
(7, '201116', 5, 40, '2022-11-27', '2022-11-27', 0, 0, NULL),
(8, '201117', 10, 40, '2022-11-27', '2022-11-27', 0, 0, NULL),
(9, '201118', 11, 40, '2022-11-27', '2022-11-27', 0, 0, NULL),
(10, '201119', 11, 40, '2022-11-27', '2022-11-27', 0, 0, NULL),
(11, '201120', 11, 40, '2022-11-27', '2022-11-27', 0, 0, NULL),
(12, '201121', 11, 40, '2022-11-27', '2022-11-27', 0, 0, NULL),
(13, '201122', 12, 40, '2022-11-27', '2022-11-27', 0, 0, NULL),
(15, '2011113', 10, 40, '2022-12-15', '2022-12-15', NULL, 1, '2022-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `electric_water`
--

CREATE TABLE `electric_water` (
  `id` int(11) NOT NULL,
  `e_first` int(11) NOT NULL,
  `e_last` int(11) NOT NULL,
  `price_per_e` int(11) NOT NULL,
  `w_first` int(11) NOT NULL,
  `w_last` int(11) NOT NULL,
  `price_per_w` int(11) NOT NULL,
  `rooms_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `payment` tinyint(2) DEFAULT NULL COMMENT '1: tiền mặt \r\n0: chuyển khoản',
  `status` tinyint(1) NOT NULL COMMENT '0: Chưa thanh toán\r\n1: Đã thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `electric_water`
--

INSERT INTO `electric_water` (`id`, `e_first`, `e_last`, `price_per_e`, `w_first`, `w_last`, `price_per_w`, `rooms_id`, `start_date`, `end_date`, `payment`, `status`) VALUES
(1, 1, 2, 3, 4, 5, 6, 5, '2022-11-25', '2022-11-25', 0, 1),
(2, 1, 2, 3, 4, 5, 6, 5, '2022-11-25', '2022-11-25', 1, 1),
(3, 121, 2222, 3, 4, 5, 5, 5, '2022-11-25', '2022-11-25', 0, 0),
(5, 1, 1, 1, 1, 1, 1, 5, '2022-11-25', '2022-11-25', NULL, 0),
(6, 1, 1, 1, 1, 1, 1, 5, '2022-11-25', '2022-11-25', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `student_id` varchar(250) NOT NULL,
  `status` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoices_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `noti`
--

CREATE TABLE `noti` (
  `id` int(11) NOT NULL,
  `message` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL COMMENT '0: đạng thường\r\n1: khần cấp'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `student_id` varchar(250) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL COMMENT '0: đã gửi\r\n1: đang xử lý\r\n2: đã xử lý '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `user_id`, `student_id`, `title`, `message`, `created_at`, `status`) VALUES
(4, NULL, '201113', 'Tìm đối ', 'Hí anh zai', '2022-12-22 13:48:42', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `max_num` tinyint(2) NOT NULL,
  `user_id` int(11) NOT NULL COMMENT 'người quản lý',
  `status` tinyint(2) DEFAULT NULL COMMENT '1: hoạt động\r\n0: bảo trì',
  `area` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0: khu dành cho nam\r\n1: dành cho nữ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_name`, `price`, `max_num`, `user_id`, `status`, `area`) VALUES
(5, 'A100', 90000, 6, 42, 1, 0),
(10, 'A101', 100, 2, 40, 1, 0),
(11, 'A102', 100000, 6, 40, 1, 0),
(12, 'A103', 500000, 6, 40, 0, 0),
(14, 'B100', 1000000000, 12, 42, 0, 0),
(15, 'A1111', 2, 9, 58, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `describe` text DEFAULT NULL,
  `price` int(11) NOT NULL,
  `status` tinyint(2) NOT NULL COMMENT '0: đóng\r\n1: Hoạt động'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `describe`, `price`, `status`) VALUES
(1, 'Đổ rác VIP 1', 'Đổ rác thuê cho sinh viên ở ký túc xá gói Vip1', 12000, 1),
(2, 'Dịch vụ giặt quần áo', 'Giặt quần áo cho sinh viên', 20000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) DEFAULT NULL COMMENT 'Nếu là tài khoản cho sinh viên thì username sẽ là mã sinh viên',
  `password` varchar(250) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `sex` tinyint(2) DEFAULT NULL COMMENT '0:nam 1:nu',
  `date_birth` date DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `avatar_url` text DEFAULT '\'avatar-default.png\'',
  `role` int(11) DEFAULT 1 COMMENT '0: Admin\r\n1: Sinh viên',
  `status` tinyint(2) DEFAULT 1 COMMENT '0: khóa\r\n1: Mở',
  `color_scheme` tinyint(2) DEFAULT 0 COMMENT '0: nền trắng\r\n1: nền đen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `sex`, `date_birth`, `address`, `email`, `phone`, `avatar_url`, `role`, `status`, `color_scheme`) VALUES
(40, 'admin', '202cb962ac59075b964b07152d234b70', 'Lương Văn Hòa ', 0, '2022-11-27', 'Tân Thành - Kiên Thành', 'hoa@gmail.com', '0972798037', '978gái xinh 1.1.jpg', 0, 1, 0),
(42, 'khanh', 'c4ca4238a0b923820dcc509a6f75849b', 'Đỗ Kim Khánh', 0, '0000-00-00', 'Hà Nội', 'toiroiluomoi123@gmail.com', '0357143496', '724avt_khanh.jpg', 0, 1, 0),
(47, '201112', '2502552352d455b1280a579f4b80100d', 'Đỗ Kim Khánh', 0, '2022-11-27', 'Hà Nội', 'khanhthanchet@gmail.com', '0357143496', '55avt_khanh.jpg', 1, 1, 0),
(48, '201113', '895182ccc51b4ef371103e8de2a907c0', 'Lưu Quang Vinh', 0, '2022-11-27', 'Lạng Sơn', 'vinh@gmail.com', '0357143496', '6avt_vinh.jpg', 1, 1, 0),
(49, '201114', 'd719a83da23531fb2fb0d5bd855e0157', 'Trần Ngọc Thắng', 0, '2022-11-27', 'Hà Nội', 'thang@gmail.com', '0357143496', '11avt_chuot.jpg', 1, 1, 0),
(50, '201115', '42c55c938c96383782711ae995fcc022', 'Nguyễn Đình Khang An', 0, '2022-11-27', 'Hà Nội', 'an@gmail.com', '0357143496', '762avt_an.jpg', 1, 1, 0),
(51, '201116', 'adc9c219fe1fad6bef407187644e574e', 'Nguyễn Quốc Bình', 0, '2022-11-27', 'Hà Nội', 'binh@gmail.com', '0357143496', '303avt_binh.jpg', 1, 1, 0),
(52, '201117', '09c637b7d1feae416d0cd653c8711d3b', 'Lã Thế Anh', 0, '2022-11-27', 'Phú Thọ', 'anh@gmail.com', '0357143496', '998avt3.jpg', 1, 1, 0),
(53, '201118', 'd7e02e3a1890333a48640f920fd16660', 'Nguyễn Thu Thảo', 1, '2022-11-27', 'Bắc Giang', 'thao@gmail.com', '0357143496', '2692.jpg', 1, 1, 0),
(54, '201119', '359f44359c9f35cee7d23ab4bfa97c21', 'elon must', 0, '2022-11-27', 'Bắc Giang', 'tesla@gmail.com', '0357143496', '770avt9.jpg', 1, 1, 0),
(55, '201120', 'c497a5bfa0f37be9136a2b5120ff9c37', 'Mai Như Quềnh', 1, '2022-11-27', 'Thái Nguyên', 'quenh@gmail.com', '0357143496', '765avt1.jpg', 1, 1, 0),
(56, '201121', '9825ff3d33f2a80714dcbef048153758', 'Bingchiling', 1, '2022-11-27', 'Bắc Giang', 'bing@gmail.com', '0972798037', '351avt3.jpg', 1, 1, 0),
(57, '201122', '0c34a9f036ac28ed72b9ad882acfcf43', 'Nguyễn Thị Nở', 0, '2022-11-27', 'Bắc Giang', 'no@gmail.com', '0357143496', '622avt5.jpg', 1, 1, 0),
(58, 'admin3', '202cb962ac59075b964b07152d234b70', 'Trần Ngọc Thắng', 0, '2022-11-27', 'Hà Nội', 'hoa@gmail.com', '0357143496', '807avt4.jpg', 0, 0, 1),
(64, '201111', 'bfdea6d37022bdbf00aea5b2e77061fd', 'Lương Văn Hòa ', 0, '2022-12-15', 'ewrw', '123@gmail.comr', '09727980375', 'avatar-default.png', 1, 1, 0),
(68, '2011113', 'de9bb7ec491ecb5bcca062d24c44b038', 'Lương Văn Hòa ', 0, '2022-12-15', 'sad', '123@gmail.coma', '0972798037', 'avatar-default.png', 1, 1, 0),
(69, '20111133', '5db99c6989ce93c98edb8aacee1b97cd', 'Lương Văn Hòa  123', 0, '2022-12-22', '123', 'toiroiluomoi123@gmail.com2', '0357143496', '662gái xinh 1.1.jpg', 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_s` (`room_id`),
  ADD KEY `fk_sa` (`user_id`),
  ADD KEY `fk_saa` (`student_id`);

--
-- Indexes for table `electric_water`
--
ALTER TABLE `electric_water`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ew_roms` (`rooms_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_id` (`invoices_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `noti`
--
ALTER TABLE `noti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_ibfk_1` (`student_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `room_name` (`room_name`),
  ADD KEY `fk_room_user` (`user_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_roleUser` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `electric_water`
--
ALTER TABLE `electric_water`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `noti`
--
ALTER TABLE `noti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_s` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_sa` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `electric_water`
--
ALTER TABLE `electric_water`
  ADD CONSTRAINT `fk_ew_roms` FOREIGN KEY (`rooms_id`) REFERENCES `rooms` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `invoices_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`invoices_id`) REFERENCES `invoices` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `invoice_details_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`username`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `fk_room_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
