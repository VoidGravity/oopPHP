-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 16, 2023 at 12:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobez`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `employee_description` varchar(250) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `position` varchar(75) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `user_id`, `job_id`, `employee_description`, `status`, `position`) VALUES
(1, 1, 1, 'this is a place holder desciption', 'active', 'full stack'),
(2, 1, 1, 'this is a place holder desciption', 'active', 'full stack'),
(3, 2, 2, 'this is a place holder desciption', 'active', 'full TIME'),
(4, 3, 3, 'this is a place holder desciption', 'active', 'full stack'),
(6, 1, 1, 'this is a place holder desciption', 'active', 'full stack'),
(7, 2, 2, 'this is a place holder desciption', 'active', 'full TIME'),
(8, 3, 3, 'this is a place holder desciption', 'active', 'full stack'),
(9, 3, 3, 'this is a place holder desciption', 'active', 'SOFTWARE ENGENiEER'),
(11, 1, 1, 'this is a place holder desciption', 'active', 'full stack'),
(12, 2, 2, 'this is a place holder desciption', 'active', 'full TIME'),
(13, 3, 3, 'this is a place holder desciption', 'active', 'full stack'),
(14, 3, 3, 'this is a place holder desciption', 'active', 'SOFTWARE ENGENiEER'),
(15, 3, 5, 'this is a place holder desciption', 'active', 'full stack'),
(16, 3, 1, 'this is a place holder desciption', 'active', 'brgag'),
(17, 3, 2, 'this is a place holder desciption', 'active', 'Ghost worker'),
(18, 3, 4, 'this is a place holder desciption', 'active', 'Hard worker'),
(19, 1, 1, 'Sapiente voluptatem', NULL, 'Ex omnis reprehender'),
(20, 1, 1, 'Sequi maiores cupidi', 'active', 'Et expedita harum es');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `location` varchar(50) DEFAULT NULL,
  `status` enum('Open','Closed') DEFAULT 'Open',
  `date_created` date DEFAULT NULL,
  `image_path` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `title`, `description`, `company`, `location`, `status`, `date_created`, `image_path`, `user_id`) VALUES
(1, 'updated title', 'updated desc', 'Tech Co', 'City A', 'Open', '2009-02-17', '../assets/styles/dashboard/imagqrcode.png', 2),
(2, 'Graphic Designer', 'Another job description...', 'Tech Co', 'City A', 'Open', '2009-02-17', '../assets/styles/dashboard/imagqrcode.png', 1),
(3, 'Voluptatem nihil dol', 'Animi sunt consequa', 'Cochran Wong Inc', 'Suscipit omnis tempo', '', '2023-12-15', '../assets/styles/dashboard/imagqrcode.png', NULL),
(4, 'Voluptatem nihil dol', 'Animi sunt consequa', 'Cochran Wong Inc', 'Suscipit omnis tempo', '', '2023-12-15', '../assets/styles/dashboard/imagqrcode.png', NULL),
(5, 'Provident inventore', 'Consequatur ut culp', 'Rowe and Price LLC', 'Commodo in reprehend', '', '2023-12-15', '../assets/styles/dashboard/imagqrcode.png', NULL),
(7, 'Proident proident ', 'Molestias quas iusto', 'Brooks and Larson LLC', 'Sed ipsa fuga Assu', '', '2023-12-15', '../assets/styles/dashboard/imagqrcode.png', 2),
(8, 'Proident proident ', 'Molestias quas iusto', 'Brooks and Larson LLC', 'Sed ipsa fuga Assu', '', '2023-12-15', '../assets/styles/dashboard/imagqrcode.png', 2),
(9, 'Quod reprehenderit e', 'Est veniam facilis ', 'Knox and Strickland Co', 'Laborum mollitia vol', '', '2023-12-15', '../assets/styles/dashboard/imagqrcode.png', 2),
(10, 'Perferendis sint off', 'Quis veritatis dolor', 'Spears Fischer Trading', 'Voluptatem Perferen', '', '2023-12-15', '../assets/styles/dashboard/imagqrcode.png', 2),
(11, 'Perferendis sint off', 'Quis veritatis dolor', 'Spears Fischer Trading', 'Voluptatem Perferen', '', '2023-12-15', '../assets/styles/dashboard/imagqrcode.png', 2),
(12, 'Aliquip expedita vol', 'Irure possimus eius', 'Moore Horne Plc', 'Quis ratione consequ', '', '2023-12-15', '../assets/styles/dashboard/imagqrcode.png', 2),
(13, 'Aliquip expedita vol', 'Irure possimus eius', 'Moore Horne Plc', 'Quis ratione consequ', '', '2023-12-15', '../assets/styles/dashboard/imagqrcode.png', 2),
(14, 'Dolor in vel elit o', 'Veniam reprehenderi', 'Russell Harrison LLC', 'In maxime et veniam', '', '2023-12-15', '../assets/styles/dashboard/imagNew Project (4).png', 2),
(17, 'Voluptate aliquip de', 'Doloremque assumenda', 'Newton Mclaughlin LLC', 'Esse et id quae temp', '', '2023-12-15', '../assets/styles/dashboard/imagNew Project (4).png', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role_name`) VALUES
(1, 'admin', 'admin@example.com', 'hashed_password', 'admin'),
(2, 'client1', 'client1@example.com', 'hashed_password', 'candidat'),
(3, 'freelancer1', 'freelancer1@example.com', 'hashed_password', 'admin'),
(26, '1', '1', '$2y$10$jbNvjqv8ez7MaFSvEqx6u.Xl.sD4BbYtPp5CgxeaeHya46iBRjPc2', ''),
(27, '1', '1', '$2y$10$5fYABXIhOYgr.2cu1761D.AfxruiypP6g/jWI43XFzqyBAoqscnnO', ''),
(28, '1', '1', '$2y$10$219RpLa.819UFYdBu0Ejz.svXEhDLfuCKno4bT8.it7x3BlVryYg2', ''),
(29, '2', '2', '$2y$10$OteTXmMTm/oK6O8hFo1QEu0i308LlyDnPafJYBRvI.A52FwFMymEC', ''),
(30, '3', 'abdellahbardichwork@gmail.com', '$2y$10$xfacXuR4cdFNeU73zsuoe.dvjJf7oKHwlGSHomy0i4aS.88ENgdvS', ''),
(31, 'abde', 'abdellahbardichwork@gmail.com', '$2y$10$R1i2xgQdm0QClU456UuwGOL/FcbgmAUxpfp4Y0pBtx1WNcI.PXWvK', ''),
(32, 'abde1', 'abdellahbardichwork@gmail.com', '$2y$10$D8yuujVL4mkYHQYbRsQlwe8meP7Wbvso83GxBj0vrrcU2VgIsM.Wu', 'admin'),
(33, 'admin', 'abdellahbardichwork@gmail.com', '$2y$10$c75PRPiSpu/syS/AsCrN2OlKu6pB4QUHCqFY1Lz5eaGMABW77hh9e', 'admin'),
(34, 'admin', 'abdellahbardichwork@gmail.com', '$2y$10$QEFt6zG6RtSrWLk50B00/eVU9DwGbERQKWqV2lrt5wZ/8MA7TP.vq', 'candidat'),
(35, 'testtest', 'abdellahbardichwork@gmail.com', '$2y$10$FiS8uMMIs7YZMmvQczDZuuHFHB2BcRTUTkopy6.zrJbMkcl183cO6', 'admin'),
(36, 'user', 'abdellahbardichwork@gmail.com', '$2y$10$FXyZKaqvmNXtohgWs2me7e24g5z8J5s9S.0QVQgcYBt.Ud53NHpBW', 'candidat'),
(37, 'test2', 'abdellahbardichwork@gmail.com', '$2y$10$sD5EcCOzOVaTpSDsqhlciuGCVaBCIx1wdkKydyzyk/S4tNXqkCDIC', 'candidat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `job_id` (`job_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`job_id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
