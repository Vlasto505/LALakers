-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2025 at 09:39 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lakers`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `Message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `Message`) VALUES
(2, 'Vlasto Jdiaw', 'vlastislav.srnka@student.ukf.s', 'lkoldw'),
(4, 'Stefko', 'dwa@adwa', 'dwadkjiuhiuhi'),
(9, 'Vlastislav Srnka', 'dwa@a', 'dwad');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Lebron James', 'uploads/1747676777_lebron.jpg', '2019-20 champion, 2019–20 Finals MVP', '2025-05-19 19:46:17', '2025-05-19 19:46:17'),
(2, 'Wilt Chamberlain', 'uploads/1747676958_wilt.jpg', '5 championships, Hall of Fame class of 1959', '2025-05-19 19:49:18', '2025-05-19 19:49:18'),
(3, 'James Worthy', 'uploads/1747677000_james.jpg', '3 championships, 1987-88 Finals MVP, Hall of Fame class of 2003', '2025-05-19 19:50:00', '2025-05-19 19:50:00'),
(4, 'Elgin Baylor', 'uploads/1747677033_elgin.jpg', '11-time All-Star, 1958-59 Rookie of the Year, Hall of Fame class of 1977', '2025-05-19 19:50:33', '2025-05-19 19:50:33'),
(5, 'Jerry West', 'uploads/1747677056_jerry.jpg', '1971-72 Champion, 1968-69 Finals MVP, Hall of Fame class of 1980', '2025-05-19 19:50:56', '2025-05-19 19:50:56'),
(6, 'Shaquille O\'Neal', 'uploads/1747677095_shaq.jpg', '3 Championships, 3 Finals MVPs, 1999-00 MVP, Hall of Fame class of 2016', '2025-05-19 19:51:35', '2025-05-19 19:51:35'),
(7, 'Kareem Abdul-Jabbar', 'uploads/1747677117_kareem.jpg', '5 championships, 1984-85 Finals MVP, 3 MVPs, Hall of Fame class of 1995', '2025-05-19 19:51:57', '2025-05-19 19:51:57'),
(8, 'Kobe Bryant', 'uploads/1747677138_kobe.jpg', '5 championships, 2 Finals MVPs, 2007-08 MVP, Hall of Fame class of 2020', '2025-05-19 19:52:18', '2025-05-19 19:52:18'),
(9, 'Magic Johnson', 'uploads/1747677159_magic.jpg', '5 championships, 3 Finals MVPs, 3 MVPs, Hall of Fame class of 2002', '2025-05-19 19:52:39', '2025-05-19 19:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `platform` enum('twitter','facebook','linkedin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `socials`
--

INSERT INTO `socials` (`id`, `player_id`, `platform`) VALUES
(1, 1, 'twitter'),
(2, 1, 'facebook'),
(3, 3, 'linkedin'),
(4, 4, 'twitter'),
(5, 4, 'linkedin'),
(6, 5, 'linkedin'),
(7, 6, 'twitter'),
(8, 6, 'facebook'),
(9, 7, 'twitter'),
(10, 8, 'twitter'),
(11, 8, 'linkedin'),
(12, 8, 'facebook'),
(21, 9, 'twitter'),
(22, 9, 'linkedin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'Vlasto', '$2y$10$6UU0QyTLjUDmtBDO6xT/xuTBWri0m0RVSH6WWyhIWvkPetP2u8UXa', 'user', '2025-06-11 11:31:51'),
(2, 'Admin', '$2y$10$qnlNIR.X6E5Kr.dAk2cVhuYqHooqNGG.6JuBEmsud8gfth3WDkfwq', 'admin', '2025-06-11 11:32:50'),
(4, 'Stefko', '$2y$10$APC0qYtB2INgFYa0pXb9/.7HQjeM0BcspFfP38lXeO88u.HHZATEW', 'user', '2025-06-11 15:38:37'),
(5, 'Milan', '$2y$10$c70CHrXSbMiaL9GYVbAs5OgFjLc7/e3KrTURU0/a6xabVFiOXHA/W', 'admin', '2025-06-11 18:56:10'),
(6, 'Boris', '$2y$10$uUjh3qFDM6k1hqdJMwt/auGqqZQiFYzC1h/9ZdA/dNyIMGr6yy/6K', 'user', '2025-06-11 19:13:27'),
(8, 'Andrej', '$2y$10$1O6Tyv3GskgOazgLjEKiFOpRjkmSBERFL.SV8Jvot6RIlTRkRo6Tq', 'user', '2025-06-11 19:14:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `socials`
--
ALTER TABLE `socials`
  ADD CONSTRAINT `socials_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
