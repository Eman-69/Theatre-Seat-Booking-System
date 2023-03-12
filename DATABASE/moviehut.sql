-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2023 at 09:19 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moviehut`
--

-- --------------------------------------------------------

--
-- Table structure for table `finaltable`
--

CREATE TABLE `finaltable` (
  `fno` int(11) NOT NULL,
  `tno` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `seatno` int(3) NOT NULL,
  `price` float NOT NULL,
  `dayofbill` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `finaltable`
--

INSERT INTO `finaltable` (`fno`, `tno`, `email`, `seatno`, `price`, `dayofbill`) VALUES
(1, 'd124', 'emmanuelpoulose@gmail.com', 5, 200, '2022-12-19'),
(2, 'd124', 'emmanuelpoulose@gmail.com', 4, 200, '2022-12-19'),
(3, 'd212', 'emmanuelpoulose@gmail.com', 12, 300, '2022-12-19'),
(4, 'd212', 'emmanuelpoulose@gmail.com', 10, 300, '2022-12-19'),
(5, 'd212', 'emmanuelpoulose@gmail.com', 8, 300, '2022-12-19'),
(6, 'd521', 'emmanuelpoulose@gmail.com', 18, 200, '2022-12-19'),
(7, 'd521', 'emmanuelpoulose@gmail.com', 4, 200, '2022-12-19'),
(8, 'd313', 'keerthananayak82@gmail.com', 11, 300, '2022-12-21'),
(9, 'd313', 'keerthananayak82@gmail.com', 10, 300, '2022-12-21'),
(10, 'd313', 'ramyashreeaile76@gmail.com', 9, 300, '2022-12-21'),
(11, 'd313', 'ramyashreeaile76@gmail.com', 8, 300, '2022-12-21'),
(12, 'd313', 'ramyashreeaile76@gmail.com', 7, 300, '2022-12-21'),
(13, 'd313', 'ramyashreeaile76@gmail.com', 6, 300, '2022-12-21');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `mname` varchar(256) NOT NULL,
  `imdb` float NOT NULL,
  `mid` varchar(256) NOT NULL,
  `img` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`mname`, `imdb`, `mid`, `img`) VALUES
('Kantara', 9, 'm1', 'kantara'),
('Black Panther:Wakanda Forever', 7.4, 'm2', 'wakandaforever'),
('Black Adam', 6.9, 'm3', 'blackadam'),
('Yashodha', 8.7, 'm4', 'yashoda'),
('Drishyam 2 Hindi', 8.8, 'm5', 'drishyam2'),
('Raana', 9.6, 'm6', 'raana');

-- --------------------------------------------------------

--
-- Table structure for table `timeline`
--

CREATE TABLE `timeline` (
  `tno` varchar(256) NOT NULL,
  `mid` varchar(256) NOT NULL,
  `weekday` int(10) NOT NULL,
  `time` time NOT NULL,
  `screen` int(2) NOT NULL,
  `seats_avail` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timeline`
--

INSERT INTO `timeline` (`tno`, `mid`, `weekday`, `time`, `screen`, `seats_avail`) VALUES
('d111', 'm3', 0, '10:00:00', 1, 100),
('d112', 'm2', 0, '14:00:00', 1, 100),
('d113', 'm1', 0, '17:00:00', 1, 100),
('d114', 'm1', 0, '21:00:00', 1, 100),
('d121', 'm6', 0, '10:00:00', 2, 60),
('d122', 'm5', 0, '14:00:00', 2, 60),
('d123', 'm4', 0, '17:00:00', 2, 60),
('d124', 'm2', 0, '21:00:00', 2, 58),
('d211', 'm2', 1, '10:00:00', 1, 100),
('d212', 'm1', 1, '14:00:00', 1, 97),
('d213', 'm3', 1, '17:00:00', 1, 100),
('d214', 'm3', 1, '21:00:00', 1, 100),
('d221', 'm5', 1, '10:00:00', 2, 60),
('d222', 'm6', 1, '14:00:00', 2, 60),
('d223', 'm5', 1, '17:00:00', 2, 60),
('d224', 'm2', 1, '21:00:00', 2, 60),
('d311', 'm3', 2, '10:00:00', 1, 100),
('d312', 'm2', 2, '14:00:00', 1, 100),
('d313', 'm1', 2, '17:00:00', 1, 94),
('d314', 'm4', 2, '21:00:00', 1, 100),
('d321', 'm4', 2, '10:00:00', 2, 60),
('d322', 'm6', 2, '14:00:00', 2, 60),
('d323', 'm5', 2, '17:00:00', 2, 60),
('d324', 'm5', 2, '21:00:00', 2, 60),
('d411', 'm1', 3, '10:00:00', 1, 100),
('d412', 'm2', 3, '14:00:00', 1, 100),
('d413', 'm3', 3, '17:00:00', 1, 100),
('d414', 'm3', 3, '21:00:00', 1, 100),
('d421', 'm4', 3, '10:00:00', 2, 60),
('d422', 'm5', 3, '14:00:00', 2, 60),
('d423', 'm6', 3, '17:00:00', 2, 60),
('d424', 'm1', 3, '21:00:00', 2, 60),
('d511', 'm5', 4, '10:00:00', 1, 100),
('d512', 'm4', 4, '14:00:00', 1, 100),
('d513', 'm6', 4, '17:00:00', 1, 100),
('d514', 'm5', 4, '21:00:00', 1, 100),
('d521', 'm1', 4, '10:00:00', 2, 58),
('d522', 'm3', 4, '14:00:00', 2, 60),
('d523', 'm2', 4, '17:00:00', 2, 60),
('d524', 'm4', 4, '21:00:00', 2, 60),
('d611', 'm2', 5, '10:00:00', 1, 100),
('d612', 'm1', 5, '14:00:00', 1, 100),
('d613', 'm3', 5, '17:00:00', 1, 100),
('d614', 'm3', 5, '21:00:00', 1, 100),
('d621', 'm4', 5, '10:00:00', 2, 60),
('d622', 'm6', 5, '14:00:00', 2, 60),
('d623', 'm5', 5, '17:00:00', 2, 60),
('d624', 'm2', 5, '21:00:00', 2, 60),
('d711', 'm1', 6, '10:00:00', 1, 100),
('d712', 'm2', 6, '14:00:00', 1, 100),
('d713', 'm3', 6, '17:00:00', 1, 100),
('d714', 'm1', 6, '21:00:00', 1, 100),
('d721', 'm5', 6, '10:00:00', 2, 60),
('d722', 'm4', 6, '14:00:00', 2, 60),
('d723', 'm6', 6, '17:00:00', 2, 60),
('d724', 'm2', 6, '21:00:00', 2, 60);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fname` varchar(256) NOT NULL,
  `lname` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` bigint(11) NOT NULL,
  `password` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `email`, `phone`, `password`) VALUES
('Aston', 'FErnandes', '4nm20ai009@nmamit.in', 9900561034, 'aston'),
('raseem', '', '4nm20cs107@nmamit.in', 8904190858, '12345678'),
('Emmanuel', 'Joshy', 'emmanuelpoulose@gmail.com', 9900561034, 'password'),
('keerthana', 'nayak', 'keerthananayak82@gmail.com', 8762691505, 'kiru@26'),
('Ramya', 'Shree', 'ramyashreeaile76@gmail.com', 7338527643, 'emmanuel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `finaltable`
--
ALTER TABLE `finaltable`
  ADD PRIMARY KEY (`fno`),
  ADD KEY `tno` (`tno`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `timeline`
--
ALTER TABLE `timeline`
  ADD PRIMARY KEY (`tno`),
  ADD KEY `mid` (`mid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `finaltable`
--
ALTER TABLE `finaltable`
  MODIFY `fno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `finaltable`
--
ALTER TABLE `finaltable`
  ADD CONSTRAINT `finaltable_ibfk_1` FOREIGN KEY (`tno`) REFERENCES `timeline` (`tno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `finaltable_ibfk_2` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `timeline`
--
ALTER TABLE `timeline`
  ADD CONSTRAINT `timeline_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `movie` (`mid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
