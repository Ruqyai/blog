-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2017 at 09:09 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_bin NOT NULL,
  `body` text COLLATE utf8_bin NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `title`, `body`, `created`, `modified`) VALUES
(1, 1, 1, 'nice', 'Designed for all ages in mind', '2017-07-03 18:51:00', '2017-07-12 23:34:35'),
(3, 2, 1, 'COVERS WHAT YOU NEED', 'Full integration with Google Drive allowing our users accounts to be connected to their Google accounts to open, edit, download, and share their files with single sign-on', '2017-07-06 13:31:30', '2017-07-06 13:31:30'),
(4, 1, 1, 'WHAT YOU NEED', 'From the first day until graduation', '2017-07-06 14:00:14', '2017-07-06 14:00:14'),
(5, 1, 2, 'nice', 'From the first day until graduation', '2017-07-06 14:04:23', '2017-07-06 14:04:23'),
(6, 1, 2, 'good', 'In the class, at home or on the go!', '2017-07-06 14:05:35', '2017-07-06 14:05:35'),
(7, 1, 1, 'good', 'In the class, at home or on the go!', '2017-07-06 14:07:01', '2017-07-06 14:07:01'),
(29, 2, 1, 'very nice', 'Flexible to customize and adapt to our clients needs and requests with no additional costs.', '2017-07-12 00:59:23', '2017-07-12 00:59:23'),
(30, 3, 1, 'qwerty', 'Our support team is ready 24/7 to respond to any issue facing our users.', '2017-07-12 10:43:25', '2017-07-12 10:43:25'),
(31, 3, 3, 'good', 'Free semi-annual automatic updates to keep up with technologies and education standards.', '2017-07-12 10:44:20', '2017-07-12 10:44:20'),
(32, 1, 3, 'very nice', 'Our support team is ready 24/7 to respond to any issue facing our users.', '2017-07-12 10:44:50', '2017-07-12 10:44:50');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `body` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `created`, `modified`, `user_id`) VALUES
(1, 'Classera', 'E-learning is a great tool only if it is done right. Classera defines three characteristics that leave a true impact on the learning ecosystem.', '2017-07-11 10:16:36', '2017-07-12 19:43:09', 1),
(2, 'On the Cloud', 'We based our solutions on state of the art technologies in cloud computing to provide our users with the best level of service, adhering to international standards in safety, privacy, and confidentiality of information. We guarantee fast access from anywhere in the world with less effort.', '2017-07-11 13:54:11', '2017-07-11 13:54:11', 1),
(3, 'Secure and Reliable', 'We are committed to providing a safe environment that ensures the preservation of all user data in the highest safety, privacy, and confidentiality standards. All our user transactions are encrypted using the latest security standards (SSL) and all their data are backed up regularly for ensuring data recovery.', '2017-07-11 15:33:55', '2017-07-11 15:33:55', 2),
(16, 'International & Compatible', 'We are global and efficient, shown by how Classera has been deployed in one of the top 100 U.S. schools, our solutions are also customizable to fit other regions. We provide full support for Arabic language, mathematical symbols, Hijri date and other features needed for different locales.', '2017-07-11 15:52:41', '2017-07-11 15:52:41', 2),
(17, 'Classera API', 'Classera APIs allows other applications to access Classera features or data to read/update user information and interact smoothly with Classera regardless of the programming language used.', '2017-07-11 17:35:22', '2017-07-11 17:35:22', 1),
(18, 'Google Drive Integration', 'Full integration with Google Drive allowing our users accounts to be connected to their Google accounts to open, edit, download, and share their files with single sign-on.', '2017-07-11 17:38:20', '2017-07-11 17:38:20', 2),
(19, 'Activation And Training', 'We provide actual follow-ups on a periodical basis to make sure each of our service reaches maximum activation and utilization.', '2017-07-11 17:53:06', '2017-07-11 17:53:06', 3),
(20, 'Continuous Development', 'Free semi-annual automatic updates to keep up with technologies and education standards.', '2017-07-11 17:54:04', '2017-07-11 17:54:04', 3),
(21, 'Client Specific Customization', 'Flexible to customize and adapt to our clients needs and requests with no additional costs.', '2017-07-11 18:01:37', '2017-07-11 18:01:37', 3),
(23, 'Online Support', 'Our support team is ready 24/7 to respond to any issue facing our users.', '2017-07-11 18:06:28', '2017-07-11 18:06:28', 3),
(24, 'EASY TO USE', 'Designed for all ages in mind', '2017-07-11 18:56:47', '2017-07-11 18:56:47', 3),
(25, 'In the class', 'In the class, at home or on the go!', '2017-07-11 18:57:37', '2017-07-11 18:57:37', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(1, 'Ruqiya', '$2a$10$UKKPOaUJA8ZsyppqyPFhme3Jq4.56njIZK.17M/Sen62mUfqZQjlK', 'admin', '2017-07-09 05:00:00', '2017-07-09 15:00:00'),
(3, 'Ahamed', '$2a$10$Qzhq97CKZyCnbIvvWrx0WOKb8Gsjbm/5l9sFhapfFffvyjVGiGKaO', 'author', '2017-07-09 20:27:50', '2017-07-09 20:27:50'),
(4, 'Bin Safi', '$2a$10$oMKgcsObMljiZHlL/xaPZ.7Fptah12SZhTMLQxblakfAhLZaIDSiW', 'admin', '2017-07-09 20:41:35', '2017-07-09 20:41:35'),
(5, 'Ruqi', '$2a$10$xQ83KUp1eRzSD5L5VNCDy.0ReWhNwc8xG8plNKs5.Tq7O5Ht91T4G', 'admin', '2017-07-12 23:52:19', '2017-07-13 00:09:13'),
(6, 'Ruq', '$2a$10$OF0twyR9HoT9EHDR6u8K/O.nf2yRcNHxOvHzs/hlh0bzA1F/Bf5Ja', 'author', '2017-07-13 00:09:19', '2017-07-13 00:09:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
