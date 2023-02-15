-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2021 at 08:52 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_pass`, `created_at`) VALUES
(1, 'admin1', 'admin1@gmail.com', '$2y$10$tHH0WgfMPjP1/dtdY9JgXOl31h1dHY7YD/fYstcEq4DPh4.1P43fq', '2021-11-23 15:02:41'),
(3, 'admin2', 'admin2@gmail.com', '$2y$10$JZgHEBTrd0qxC4wSGLUawufodKIJyDiTglyuCTZx.X7Oe1VOVw.wG', '2021-11-23 16:26:45'),
(4, 'abrar', 'nurulabrar2369@gmail.com', '$2y$10$ZB1lh7vXFcV9KGh4F5g6Wezroe6xn3CJ1qrNsi8qUMFyXACmGBal.', '2021-11-24 10:24:39');

-- --------------------------------------------------------

--
-- Table structure for table `announce`
--

CREATE TABLE `announce` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announce`
--

INSERT INTO `announce` (`id`, `title`, `img`, `created_at`) VALUES
(13, 'Books are on the way to me', '10-best-600-2.jpg', '2021-11-24 12:25:49'),
(14, 'title2', 'istockphoto-1222550815-170667a.jpg', '2021-11-24 12:25:24');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_desc` text NOT NULL,
  `price` int(11) NOT NULL,
  `book_pic` varchar(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `published_year` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `book_desc`, `price`, `book_pic`, `stock`, `published_year`, `created_at`) VALUES
(12, 'Habibi (Pantheon Graphic Library)', 'From the internationally acclaimed author of Blankets (“A triumph for the genre.”—Library Journal), a highly anticipated new graphic novel.       ', 450, 'unnamed-6.jpg', 1, 2021, '2021-12-08 13:00:37'),
(13, 'The Ickabog', 'From J.K. Rowling, a warm, fast-paced, funny fairy tale of a fearsome monster, thrilling adventure, and hope against all odds.\r\n\r\nOnce upon a time there was a tiny kingdom called Cornucopia, as rich in happiness as it was in gold, and famous for its food. From the delicate cream cheeses of Kurdsburg to the Hopes-of-Heaven pastries of Chouxville, each was so delicious that people wept with joy as they ate them.', 500, 'jpg-scaled.jpg', 6, 2012, '2021-12-08 11:21:30'),
(16, 'Percy Jackson Full Series (6 Books)', 'Percy Jackson And The Lightning Thief\r\nPercy Jackson And The Greek Gods\r\nPercy Jackson And The Titan Curse\r\nPercy Jackson And The Sea Of Monsters\r\nPercy Jackson And The Battle Of The Labyrinth\r\nPercy Jackson And The Last Olympian   ', 1500, 'Percy-Jackson-Series-scaled.jpg', 14, 2008, '2021-12-08 11:30:29');

-- --------------------------------------------------------

--
-- Table structure for table `books_genre`
--

CREATE TABLE `books_genre` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books_genre`
--

INSERT INTO `books_genre` (`id`, `book_id`, `genre_id`) VALUES
(14, 12, 38),
(15, 13, 39),
(19, 16, 36);

-- --------------------------------------------------------

--
-- Table structure for table `books_writers`
--

CREATE TABLE `books_writers` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books_writers`
--

INSERT INTO `books_writers` (`id`, `book_id`, `writer_id`) VALUES
(22, 12, 9),
(23, 13, 11),
(24, 12, 10),
(27, 16, 15);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(2, 'Science');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `book_id`, `user_name`, `comment`, `created_at`) VALUES
(1, 6, 13, 'ab4', 'Liked that book.', '2021-12-14 08:03:47'),
(2, 7, 13, 'ab7', 'That was awesome', '2021-12-14 08:09:52'),
(4, 6, 13, 'ab4', 'aa', '2021-12-14 19:19:06'),
(5, 6, 13, 'ab4', 'Oh liked that too.', '2021-12-15 11:32:47'),
(6, 6, 12, 'ab4', 'Nice one', '2021-12-15 12:01:16');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(36, 'Comic'),
(37, 'Action and Adventure'),
(38, 'Islamic'),
(39, 'Novel');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(11) NOT NULL,
  `order_name` varchar(255) NOT NULL,
  `order_address` text NOT NULL,
  `order-phone` varchar(12) NOT NULL,
  `status` varchar(20) NOT NULL,
  `ordered_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `writers_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `upass` varchar(255) NOT NULL,
  `uaddress` text NOT NULL,
  `uphone` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `uname`, `uemail`, `upass`, `uaddress`, `uphone`, `created_at`) VALUES
(1, 'ab', 'ab@gmail.com', '$2y$10$M260c3IV3Sl9aGT9gx7fVe6LMEyrHjxMrd/EHWztb8g6Fd2ITmLuO', 'H97,R17', '01964613773', '2021-12-15 11:20:08'),
(2, 'maruf', 'maruf@gmail.com', '$2y$10$X761lRZBTcgUPIQ2cM1/aeEIs1y52AJhTq2QEPQWeN5kACr8pleeK', 'H:88R:45', '01744441145', '2021-12-15 11:20:32'),
(3, 'abrar1', 'ab1@gmail.com', '$2y$10$yB5Mmix81a15BBLeeyYeIeWJgsDmW8gw/uJ/MEr0zxWlXuRVFJQfe', 'h15', '14789658665', '2021-12-15 11:20:45'),
(4, 'ovi', 'ovi@gmail.com', '$2y$10$LDt4qqSsX08oHU8ke3Z4peBbw.YQhBQ1hUELauduotFV0I5Ju1jmy', 'h4587', '0', '2021-11-10 06:51:52'),
(5, 'ab3', 'ab3@gmail.com', '$2y$10$N9Rxv6zNu.gB8VZLG7INZushrMAqOlu./FVrCjFLxYciR/nPGqbve', 'H458, R58', '0', '2021-11-17 11:09:52'),
(6, 'ab4', 'ab4@gmail.com', '$2y$10$xLWHaskvBkzkNSI0iK6cNuuJxLUVoyI2a3CCvriJb2x.jHWLhptY6', 'h45,r58', '01736225146', '2021-12-15 11:20:56'),
(7, 'ab7', 'ab7@gmail.com', '$2y$10$PAjWt136izFiyw7jAIYohOBugdsWr6wXHhUhaXvCmgbgjWHCkqVWG', 'H47', '01589745896', '2021-12-15 11:21:04');

-- --------------------------------------------------------

--
-- Table structure for table `writers`
--

CREATE TABLE `writers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `writers`
--

INSERT INTO `writers` (`id`, `name`) VALUES
(8, 'Maruf'),
(9, 'Ovi'),
(10, 'Abrar'),
(11, 'J. K. Rowling'),
(12, 'Nayma'),
(13, 'Nazy'),
(15, 'Rick Riordan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `announce`
--
ALTER TABLE `announce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `books_genre`
--
ALTER TABLE `books_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Test` (`book_id`),
  ADD KEY `test2` (`genre_id`);

--
-- Indexes for table `books_writers`
--
ALTER TABLE `books_writers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test1` (`book_id`),
  ADD KEY `test3` (`writer_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test7` (`book_id`),
  ADD KEY `test8` (`user_id`),
  ADD KEY `test9` (`user_name`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test4` (`user_id`),
  ADD KEY `test5` (`writers_id`),
  ADD KEY `test6` (`book_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uemail` (`uemail`),
  ADD KEY `uname` (`uname`);

--
-- Indexes for table `writers`
--
ALTER TABLE `writers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `announce`
--
ALTER TABLE `announce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `books_genre`
--
ALTER TABLE `books_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `books_writers`
--
ALTER TABLE `books_writers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `writers`
--
ALTER TABLE `writers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books_genre`
--
ALTER TABLE `books_genre`
  ADD CONSTRAINT `Test` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test2` FOREIGN KEY (`genre_id`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `books_writers`
--
ALTER TABLE `books_writers`
  ADD CONSTRAINT `test1` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test3` FOREIGN KEY (`writer_id`) REFERENCES `writers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `test7` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test8` FOREIGN KEY (`user_id`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test9` FOREIGN KEY (`user_name`) REFERENCES `user` (`uname`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `test4` FOREIGN KEY (`user_id`) REFERENCES `user` (`uid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test5` FOREIGN KEY (`writers_id`) REFERENCES `writers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `test6` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
