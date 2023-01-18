-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 05, 2023 at 10:02 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pixlogix`
--

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `country_name` varchar(75) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country_name`) VALUES
(1, 'India'),
(2, 'Pakistan'),
(4, 'Srilanka');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_name` varchar(75) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `country_id`, `state_name`) VALUES
(1, 1, 'Gujarat'),
(2, 1, 'Rajasthan'),
(3, 1, 'Madhyapradesh'),
(4, 1, 'Delhi'),
(5, 1, 'Kolkata'),
(6, 1, 'Utter pradesh'),
(7, 1, 'Kerala'),
(8, 1, 'Arunachal Pradesh'),
(9, 1, 'Tamilnadu'),
(10, 2, 'Panjab'),
(11, 2, 'Karachi'),
(12, 4, 'Colambo');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile` varchar(250) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `profile_picture` varchar(250) DEFAULT NULL,
  `state` varchar(75) NOT NULL,
  `country` varchar(75) NOT NULL,
  `address` varchar(250) NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `hobbies` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `mobile`, `date_of_birth`, `profile_picture`, `state`, `country`, `address`, `gender`, `hobbies`) VALUES
(68, 'rkyouin', 'kishanramani9099@gmail.com', '09327243458', '2023-01-12', '1672908791-image_2a9cfc62-070a-4137-9302-a378ed47e81920220221_170111.jpg', '1', '1', 'Bandhiya road near government hospital VI ghoghavader ta Gondal di Rajkot pin 360311', 'Male', 'Reading,Singing,Programing'),
(67, 'rkyouin1', 'kishanramani9099@gmail.com1', '09327243458', '2023-01-12', '1672908333-image_c10a3ac2-3b81-4cbe-9f0b-775b5b84e43420221110_163158.jpg', '1', '1', 'Bandhiya road near government hospital VI ghoghavader ta Gondal di Rajkot pin 360311', 'Male', 'Reading,Singing,Programing'),
(66, 'rkyouin55', 'kishanramani9099@hgmail.com', '09327243458', '2023-01-12', '1672908387-Scan_20221122_132016.jpg', '1', '1', 'Bandhiya road near government hospital VI ghoghavader ta Gondal di Rajkot pin 360311', 'Male', 'Reading,Singing,Programing'),
(69, 'rkyouin', 'kishanramani9099@gmail.com', '09327243458', '2023-01-12', '1672908513-hue.png', '1', '1', 'Bandhiya road near government hospital VI ghoghavader ta Gondal di Rajkot pin 360311', 'Male', 'Reading,Singing,Programing'),
(70, 'rkyouin', 'kishanramani9099@gmail.com', '09327243458', '2023-01-12', '1672908535-sprite-skin-flat.png', '1', '1', 'Bandhiya road near government hospital VI ghoghavader ta Gondal di Rajkot pin 360311', 'Male', 'Reading,Singing,Programing'),
(71, 'rkyouinffg', 'kishanramani9099@gmail.comt', '09327243458', '2023-01-12', '1672908649-face21.jpg', '1', '1', 'Bandhiya road near government hospital VI ghoghavader ta Gondal di Rajkot pin 360311', 'Male', 'Reading,Singing,Programing'),
(72, 'rkyouinb66664', 'kishanramani9099@gm6ail.com', '09327243458', '2023-01-12', '1672908677-login-bg.jpg', '1', '1', 'Bandhiya road near government hospital VI ghoghavader ta Gondal di Rajkot pin 360311', 'Male', 'Reading,Singing,Programing'),
(73, 'rkyouin556', 'kishanramani906699@gmail.com', '09327243458', '2023-01-12', '1672908704-12.jpg', '1', '1', 'Bandhiya road near government hospital VI ghoghavader ta Gondal di Rajkot pin 360311', 'Male', 'Reading,Singing,Programing'),
(74, 'rky5ouin', 'kishanramani90g99@gmail.com', '09327243458', '2023-01-12', '1672908725-banner_8.jpg', '1', '1', 'Bandhiya road near government hospital VI ghoghavader ta Gondal di Rajkot pin 360311', 'Male', 'Reading,Singing,Programing'),
(76, 'rkytouin', 'kishanramani90f99@gmail.com', '09327243458', '2023-01-12', '1672908746-6.jpg', '1', '1', 'Bandhiya road near government hospital VI ghoghavader ta Gondal di Rajkot pin 360311', 'Male', 'Reading,Singing,Programing'),
(77, 'Rrkyouin', 'kishanramanvi9099@gmail.com', '09327243458', '2023-01-12', '1672908767-1667545793.jpg', '1', '1', 'Bandhiya road near government hospital VI ghoghavader ta Gondal di Rajkot pin 360311', 'Male', 'Reading,Singing,Programing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
